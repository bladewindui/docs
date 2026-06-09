<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Remote MCP (Model Context Protocol) server for BladewindUI documentation.
 *
 * Implements the MCP Streamable HTTP transport (spec 2025-11-25).
 * Endpoint: POST /mcp/server
 *
 * Capabilities exposed:
 *   resources — one resource per mcp/*.md file (readable by URI)
 *   tools     — list_components, get_component_docs, search_components
 */
class McpController extends Controller
{
    private const string PROTOCOL_VERSION = '2025-11-25';
    private const string SERVER_NAME      = 'bladewindui-docs';
    private const string SERVER_VERSION   = '1.0.0';
    private const string URI_SCHEME       = 'bladewindui://docs/';

    private string $mcpDir;

    public function __construct()
    {
        $this->mcpDir = base_path('mcp');
    }

    // ── Entry point ───────────────────────────────────────────────────────────

    public function handle(Request $request): JsonResponse|Response
    {
        $body = $request->json()->all();

        // Batch request (array of messages)
        if (array_is_list($body) && count($body) > 0 && is_array($body[0])) {
            $responses = array_values(
                array_filter(array_map([$this, 'dispatch'], $body))
            );
            return response()->json($responses);
        }

        // Single request
        $result = $this->dispatch($body);

        // Notifications have no id and require no response body
        if ($result === null) {
            return response()->noContent();
        }

        return response()->json($result);
    }

    // ── Dispatcher ────────────────────────────────────────────────────────────

    private function dispatch(array $message): ?array
    {
        $id     = $message['id']     ?? null;
        $method = $message['method'] ?? '';
        $params = $message['params'] ?? [];

        // JSON-RPC notifications (no id) must not receive a response
        if ($id === null && !str_starts_with($method, 'initialize')) {
            return null;
        }

        return match ($method) {
            'initialize'              => $this->initialize($id, $params),
            'notifications/initialized' => null,
            'ping'                    => $this->pong($id),
            'resources/list'          => $this->resourcesList($id, $params),
            'resources/read'          => $this->resourcesRead($id, $params),
            'tools/list'              => $this->toolsList($id),
            'tools/call'              => $this->toolsCall($id, $params),
            default                   => $this->methodNotFound($id, $method),
        };
    }

    // ── MCP methods ───────────────────────────────────────────────────────────

    private function initialize(mixed $id, array $params): array
    {
        return $this->result($id, [
            'protocolVersion' => self::PROTOCOL_VERSION,
            'capabilities'    => [
                'resources' => ['subscribe' => false, 'listChanged' => false],
                'tools'     => new \stdClass(),
            ],
            'serverInfo' => [
                'name'    => self::SERVER_NAME,
                'version' => self::SERVER_VERSION,
            ],
            'instructions' => implode(' ', [
                'This MCP server exposes the BladewindUI component library documentation.',
                'Use resources/list to discover all available components.',
                'Use resources/read with a bladewindui://docs/{component} URI to read a component\'s full docs.',
                'Use the search_components tool to find components by keyword.',
            ]),
        ]);
    }

    private function pong(mixed $id): array
    {
        return $this->result($id, new \stdClass());
    }

    private function resourcesList(mixed $id, array $params): array
    {
        $files = $this->getMarkdownFiles();
        $resources = [];

        // Index first
        if (isset($files['index'])) {
            $resources[] = [
                'uri'         => self::URI_SCHEME . 'index',
                'name'        => 'BladewindUI Component Index',
                'description' => 'Index of all BladewindUI components with their tags and doc links.',
                'mimeType'    => 'text/markdown',
            ];
        }

        // One resource per component file
        foreach ($files as $slug => $path) {
            if ($slug === 'index') continue;

            $title = $this->extractTitle($path) ?? $this->slugToTitle($slug);

            $resources[] = [
                'uri'         => self::URI_SCHEME . $slug,
                'name'        => $title,
                'description' => "BladewindUI {$title} documentation — usage, examples, and attribute reference.",
                'mimeType'    => 'text/markdown',
            ];
        }

        return $this->result($id, ['resources' => $resources]);
    }

    private function resourcesRead(mixed $id, array $params): array
    {
        $uri  = $params['uri'] ?? '';
        $slug = str_replace(self::URI_SCHEME, '', $uri);

        if (!$slug || !preg_match('/^[\w-]+$/', $slug)) {
            return $this->error($id, -32602, "Invalid resource URI: {$uri}");
        }

        $path = "{$this->mcpDir}/{$slug}.md";

        if (!file_exists($path)) {
            return $this->error($id, -32002, "Resource not found: {$uri}");
        }

        return $this->result($id, [
            'contents' => [[
                'uri'      => $uri,
                'mimeType' => 'text/markdown',
                'text'     => file_get_contents($path),
            ]],
        ]);
    }

    private function toolsList(mixed $id): array
    {
        return $this->result($id, [
            'tools' => [
                [
                    'name'        => 'list_components',
                    'description' => 'List all available BladewindUI components with their Blade tag and doc URI.',
                    'inputSchema' => [
                        'type'       => 'object',
                        'properties' => new \stdClass(),
                        'required'   => [],
                    ],
                ],
                [
                    'name'        => 'get_component_docs',
                    'description' => 'Get the full documentation for a specific BladewindUI component by name.',
                    'inputSchema' => [
                        'type'       => 'object',
                        'properties' => [
                            'name' => [
                                'type'        => 'string',
                                'description' => 'Component slug, e.g. "button", "table", "horizontal-line-graph".',
                            ],
                        ],
                        'required' => ['name'],
                    ],
                ],
                [
                    'name'        => 'search_components',
                    'description' => 'Search BladewindUI component docs by keyword. Returns matching component names and relevant excerpts.',
                    'inputSchema' => [
                        'type'       => 'object',
                        'properties' => [
                            'query' => [
                                'type'        => 'string',
                                'description' => 'Keyword or phrase to search for, e.g. "pagination", "color", "slot".',
                            ],
                        ],
                        'required' => ['query'],
                    ],
                ],
            ],
        ]);
    }

    private function toolsCall(mixed $id, array $params): array
    {
        $name      = $params['name']      ?? '';
        $arguments = $params['arguments'] ?? [];

        return match ($name) {
            'list_components'    => $this->toolListComponents($id),
            'get_component_docs' => $this->toolGetComponentDocs($id, $arguments),
            'search_components'  => $this->toolSearchComponents($id, $arguments),
            default              => $this->error($id, -32601, "Unknown tool: {$name}"),
        };
    }

    // ── Tool implementations ──────────────────────────────────────────────────

    private function toolListComponents(mixed $id): array
    {
        $files  = $this->getMarkdownFiles();
        $output = [];

        foreach ($files as $slug => $path) {
            if ($slug === 'index') continue;

            $title     = $this->extractTitle($path) ?? $this->slugToTitle($slug);
            $component = $this->extractFrontmatter($path, 'component') ?? "x-bladewind::{$slug}";

            $output[] = "- **{$title}** — `{$component}` — `bladewindui://docs/{$slug}`";
        }

        sort($output);

        return $this->toolResult($id, implode("\n", $output));
    }

    private function toolGetComponentDocs(mixed $id, array $args): array
    {
        $name = trim(strtolower($args['name'] ?? ''));

        if (!$name) {
            return $this->toolError($id, 'The `name` argument is required.');
        }

        $path = "{$this->mcpDir}/{$name}.md";

        if (!file_exists($path)) {
            // Fuzzy fallback: try matching by partial slug
            $files = $this->getMarkdownFiles();
            foreach (array_keys($files) as $slug) {
                if (str_contains($slug, $name) || str_contains($name, $slug)) {
                    $path = $files[$slug];
                    break;
                }
            }
        }

        if (!file_exists($path)) {
            return $this->toolError($id, "No documentation found for component \"{$name}\". Use list_components to see available components.");
        }

        return $this->toolResult($id, file_get_contents($path));
    }

    private function toolSearchComponents(mixed $id, array $args): array
    {
        $query = trim($args['query'] ?? '');

        if (!$query) {
            return $this->toolError($id, 'The `query` argument is required.');
        }

        $files   = $this->getMarkdownFiles();
        $matches = [];

        foreach ($files as $slug => $path) {
            if ($slug === 'index') continue;

            $content = file_get_contents($path);

            if (!stripos($content, $query) && !stripos($slug, $query)) {
                continue;
            }

            $title = $this->extractTitle($path) ?? $this->slugToTitle($slug);

            // Extract up to 3 context lines around each match
            $excerpts = $this->extractExcerpts($content, $query, 3);

            $matches[] = "### {$title} (`bladewindui://docs/{$slug}`)\n\n" . implode("\n\n---\n\n", $excerpts);
        }

        if (empty($matches)) {
            return $this->toolResult($id, "No components found matching \"{$query}\".");
        }

        $count  = count($matches);
        $header = "Found {$count} component" . ($count !== 1 ? 's' : '') . " matching \"{$query}\":\n\n";

        return $this->toolResult($id, $header . implode("\n\n---\n\n", $matches));
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    /** @return array<string, string>  slug => absolute path */
    private function getMarkdownFiles(): array
    {
        $files = [];

        foreach (glob("{$this->mcpDir}/*.md") as $path) {
            $slug         = basename($path, '.md');
            $files[$slug] = $path;
        }

        ksort($files);

        return $files;
    }

    private function extractFrontmatter(string $path, string $key): ?string
    {
        $content = file_get_contents($path);
        if (preg_match('/^' . preg_quote($key, '/') . ':\s*(.+)$/m', $content, $m)) {
            return trim($m[1]);
        }
        return null;
    }

    private function extractTitle(string $path): ?string
    {
        return $this->extractFrontmatter($path, 'title');
    }

    private function slugToTitle(string $slug): string
    {
        return ucwords(str_replace('-', ' ', $slug));
    }

    /** Return up to $max excerpts (3 lines of context) around each occurrence of $query in $content. */
    private function extractExcerpts(string $content, string $query, int $max): array
    {
        $lines    = explode("\n", $content);
        $excerpts = [];
        $found    = [];

        foreach ($lines as $i => $line) {
            if (count($excerpts) >= $max) break;

            if (!stripos($line . ' ', $query)) continue;

            // Avoid overlapping excerpts
            foreach ($found as $prev) {
                if (abs($i - $prev) < 4) continue 2;
            }

            $found[]    = $i;
            $start      = max(0, $i - 1);
            $end        = min(count($lines) - 1, $i + 1);
            $excerpts[] = '> ' . implode("\n> ", array_slice($lines, $start, $end - $start + 1));
        }

        return $excerpts ?: ['*(no excerpt available)*'];
    }

    // ── JSON-RPC response builders ────────────────────────────────────────────

    private function result(mixed $id, mixed $result): array
    {
        return ['jsonrpc' => '2.0', 'id' => $id, 'result' => $result];
    }

    private function error(mixed $id, int $code, string $message): array
    {
        return ['jsonrpc' => '2.0', 'id' => $id, 'error' => ['code' => $code, 'message' => $message]];
    }

    private function methodNotFound(mixed $id, string $method): array
    {
        return $this->error($id, -32601, "Method not found: {$method}");
    }

    private function toolResult(mixed $id, string $text): array
    {
        return $this->result($id, [
            'content' => [['type' => 'text', 'text' => $text]],
            'isError'  => false,
        ]);
    }

    private function toolError(mixed $id, string $message): array
    {
        return $this->result($id, [
            'content' => [['type' => 'text', 'text' => $message]],
            'isError'  => true,
        ]);
    }
}
