<?php

namespace App\Services;

use Illuminate\Routing\ViewController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Throwable;

class DocsSearchIndex
{
    /**
     * @return array<int, array{title: string, section: ?string, url: string, excerpt: string, category: string, searchable: string}>
     */
    public function records(): array
    {
        $pages = $this->discoverPages();
        $fingerprint = sha1(json_encode(array_map(
            fn (array $page) => [$page['uri'], $page['view'], $page['modified']],
            $pages,
        ), JSON_THROW_ON_ERROR));

        return Cache::remember("docs-search-index:{$fingerprint}", now()->addDay(), fn () => $this->build($pages));
    }

    /**
     * @return array<int, array{title: string, section: ?string, url: string, excerpt: string, category: string, score: int}>
     */
    public function search(string $query, int $limit = 12): array
    {
        $query = $this->normalise($query);

        if (mb_strlen($query) < 2) {
            return [];
        }

        $tokens = array_values(array_filter(explode(' ', $query), fn (string $token) => mb_strlen($token) > 1));
        $results = [];

        foreach ($this->records() as $record) {
            $score = $this->score($record, $query, $tokens);

            if ($score === 0) {
                continue;
            }

            $results[] = [
                'title' => $record['title'],
                'section' => $record['section'],
                'url' => $record['url'],
                'excerpt' => $this->excerpt($record['excerpt'], $query, $tokens),
                'category' => $record['category'],
                'score' => $score,
            ];
        }

        usort($results, fn (array $left, array $right) => ($right['score'] <=> $left['score']) ?: ($left['title'] <=> $right['title']));

        $perPage = [];
        $filtered = [];

        foreach ($results as $result) {
            $pageUrl = Str::before($result['url'], '#');
            $perPage[$pageUrl] = ($perPage[$pageUrl] ?? 0) + 1;

            if ($perPage[$pageUrl] > 3) {
                continue;
            }

            $filtered[] = $result;

            if (count($filtered) === $limit) {
                break;
            }
        }

        return $filtered;
    }

    /**
     * @return array<int, array{uri: string, view: string, path: string, modified: int}>
     */
    private function discoverPages(): array
    {
        $pages = [];
        $seenViews = [];

        foreach (Route::getRoutes()->getRoutes() as $route) {
            if (! in_array('GET', $route->methods(), true) || $route->getAction('controller') !== '\\'.ViewController::class) {
                continue;
            }

            $view = $route->defaults['view'] ?? null;

            if (! is_string($view) || ! Str::startsWith($view, 'docs/') || in_array($view, ['docs/index', 'docs/components'], true) || isset($seenViews[$view])) {
                continue;
            }

            try {
                $path = View::getFinder()->find($view);
            } catch (Throwable) {
                continue;
            }

            $seenViews[$view] = true;
            $pages[] = [
                'uri' => '/'.ltrim($route->uri(), '/'),
                'view' => $view,
                'path' => $path,
                'modified' => filemtime($path) ?: 0,
            ];
        }

        usort($pages, fn (array $left, array $right) => $left['uri'] <=> $right['uri']);

        return $pages;
    }

    /**
     * @param  array<int, array{uri: string, view: string, path: string, modified: int}>  $pages
     * @return array<int, array{title: string, section: ?string, url: string, excerpt: string, category: string, searchable: string}>
     */
    private function build(array $pages): array
    {
        $records = [];

        foreach ($pages as $page) {
            $source = file_get_contents($page['path']);

            if ($source === false) {
                continue;
            }

            $source = $this->removeNonSearchableContent($source);
            $title = $this->pageTitle($source, $page['uri']);
            $category = $this->category($page['uri']);
            $headings = $this->headings($source);
            $firstHeadingOffset = $headings[0]['offset'] ?? strlen($source);
            $intro = $this->plainText(substr($source, 0, $firstHeadingOffset));

            $records[] = $this->record($title, null, $page['uri'], $intro, $category);

            foreach ($headings as $index => $heading) {
                $nextOffset = $headings[$index + 1]['offset'] ?? strlen($source);
                $content = $this->plainText(substr($source, $heading['end'], $nextOffset - $heading['end']));
                $url = $page['uri'].($heading['id'] ? '#'.$heading['id'] : '');
                $records[] = $this->record($title, $heading['text'], $url, $content, $category);
            }
        }

        return $records;
    }

    private function removeNonSearchableContent(string $source): string
    {
        $patterns = [
            '/<pre\b[^>]*>.*?<\/pre>/is',
            '/<script\b[^>]*>.*?<\/script>/is',
            '/<x-slot:(side_nav|scripts)\b[^>]*>.*?<\/x-slot:\1>/is',
            '/@php.*?@endphp/is',
            '/{{--.*?--}}/s',
        ];

        return preg_replace($patterns, ' ', $source) ?? $source;
    }

    private function pageTitle(string $source, string $uri): string
    {
        if (preg_match('/<x-slot:page_title\b[^>]*>(.*?)<\/x-slot:page_title>/is', $source, $match)) {
            return $this->plainText($match[1]);
        }

        if (preg_match('/<x-slot(?:\s+name="title"|:title)\b[^>]*>(.*?)<\/x-slot(?::title)?>/is', $source, $match)) {
            return $this->plainText($match[1]);
        }

        return Str::headline(Str::afterLast($uri, '/'));
    }

    /**
     * @return array<int, array{text: string, id: ?string, offset: int, end: int}>
     */
    private function headings(string $source): array
    {
        preg_match_all('/<h([2-4])\b([^>]*)>(.*?)<\/h\1>/is', $source, $matches, PREG_OFFSET_CAPTURE);
        $headings = [];

        foreach ($matches[0] as $index => $match) {
            $text = $this->plainText($matches[3][$index][0]);

            if ($text === '') {
                continue;
            }

            preg_match('/\bid=["\']([^"\']+)["\']/i', $matches[2][$index][0], $idMatch);
            $headings[] = [
                'text' => $text,
                'id' => $idMatch[1] ?? null,
                'offset' => $match[1],
                'end' => $match[1] + strlen($match[0]),
            ];
        }

        return $headings;
    }

    /**
     * @return array{title: string, section: ?string, url: string, excerpt: string, category: string, searchable: string}
     */
    private function record(string $title, ?string $section, string $url, string $content, string $category): array
    {
        $excerpt = trim($content) !== '' ? Str::limit($content, 360, '') : ($section ?? $title);

        return [
            'title' => $title,
            'section' => $section,
            'url' => $url,
            'excerpt' => $excerpt,
            'category' => $category,
            'searchable' => $this->normalise(implode(' ', array_filter([$title, $section, $content]))),
        ];
    }

    /**
     * @param  array{title: string, section: ?string, searchable: string}  $record
     * @param  array<int, string>  $tokens
     */
    private function score(array $record, string $query, array $tokens): int
    {
        $title = $this->normalise($record['title']);
        $section = $this->normalise($record['section'] ?? '');
        $searchable = $record['searchable'];
        $score = 0;

        $score += $title === $query ? 140 : (str_contains($title, $query) ? 90 : 0);
        $score += $section === $query ? 120 : (str_contains($section, $query) ? 75 : 0);
        $score += str_contains($searchable, $query) ? 35 : 0;

        if ($record['section'] === null && $title === $query) {
            $score += 120;
        } elseif ($record['section'] === null && str_contains($title, $query)) {
            $score += 60;
        }

        foreach ($tokens as $token) {
            if (! str_contains($searchable, $token)) {
                return 0;
            }

            $score += str_contains($title, $token) ? 18 : 0;
            $score += str_contains($section, $token) ? 12 : 0;
            $score += min(substr_count($searchable, $token), 4);
        }

        return $score;
    }

    /**
     * @param  array<int, string>  $tokens
     */
    private function excerpt(string $content, string $query, array $tokens): string
    {
        $content = trim($content);

        if ($content === '') {
            return '';
        }

        $lower = mb_strtolower($content);
        $position = mb_strpos($lower, $query);

        if ($position === false) {
            foreach ($tokens as $token) {
                $position = mb_strpos($lower, $token);
                if ($position !== false) {
                    break;
                }
            }
        }

        $start = max(0, (int) ($position ?: 0) - 70);
        $excerpt = mb_substr($content, $start, 210);

        return ($start > 0 ? '…' : '').$excerpt.(mb_strlen($content) > $start + 210 ? '…' : '');
    }

    private function plainText(string $content): string
    {
        $content = preg_replace('/{{.*?}}|{!!.*?!!}|@[a-zA-Z_]+(?:\([^)]*\))?/s', ' ', $content) ?? $content;
        $content = html_entity_decode(strip_tags($content), ENT_QUOTES | ENT_HTML5, 'UTF-8');

        return trim(preg_replace('/\s+/u', ' ', $content) ?? $content);
    }

    private function normalise(string $value): string
    {
        return mb_strtolower(trim(preg_replace('/\s+/u', ' ', $value) ?? $value));
    }

    private function category(string $uri): string
    {
        return match (true) {
            Str::startsWith($uri, '/component/') => 'Component',
            Str::startsWith($uri, '/extra/') => 'Extra',
            default => 'Guide',
        };
    }
}
