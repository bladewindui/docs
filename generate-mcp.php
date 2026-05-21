#!/usr/bin/env php
<?php

/**
 * BladewindUI MCP Documentation Generator
 *
 * Converts a BladewindUI doc blade file into a clean MCP-readable markdown file.
 *
 * Usage:
 *   php generate-mcp.php <component-name> [--dry-run] [--update-index]
 *
 * Examples:
 *   php generate-mcp.php button
 *   php generate-mcp.php horizontal-line-graph
 *   php generate-mcp.php my-new-component --update-index
 *   php generate-mcp.php button --dry-run
 *
 * Environment:
 *   ANTHROPIC_API_KEY  required — your Anthropic API key
 */

// ── Config ──────────────────────────────────────────────────────────────────

$BLADE_DIR = __DIR__ . '/resources/views/docs';
$MCP_DIR   = __DIR__ . '/mcp';
$MODEL     = 'claude-opus-4-7';

// Blade files where the filename differs from the component slug
$FILENAME_OVERRIDES = [
    'empty-state' => 'emptystate',
];

// ── Argument parsing ─────────────────────────────────────────────────────────

$args        = array_slice($argv, 1);
$dryRun      = in_array('--dry-run', $args);
$updateIndex = in_array('--update-index', $args);
$args        = array_filter($args, fn($a) => !str_starts_with($a, '--'));
$args        = array_values($args);

if (count($args) === 0) {
    fwrite(STDERR, "Usage: php generate-mcp.php <component-name> [--dry-run] [--update-index]\n");
    exit(1);
}

$componentSlug = strtolower(trim($args[0]));

// ── Locate the blade file ────────────────────────────────────────────────────

$apiKey = getenv('ANTHROPIC_API_KEY');
if (!$apiKey) {
    fwrite(STDERR, "Error: ANTHROPIC_API_KEY environment variable is not set.\n");
    exit(1);
}

$bladeName     = $FILENAME_OVERRIDES[$componentSlug] ?? $componentSlug;
$bladeCandidates = [
    "$BLADE_DIR/{$bladeName}.blade.php",
    "$BLADE_DIR/" . str_replace('-', '', $bladeName) . ".blade.php",
    "$BLADE_DIR/" . str_replace('-', '_', $bladeName) . ".blade.php",
];

$bladePath = null;
foreach ($bladeCandidates as $candidate) {
    if (file_exists($candidate)) {
        $bladePath = $candidate;
        break;
    }
}

if (!$bladePath) {
    fwrite(STDERR, "Error: Could not find blade file for '{$componentSlug}'.\n");
    fwrite(STDERR, "Tried:\n");
    foreach ($bladeCandidates as $c) {
        fwrite(STDERR, "  $c\n");
    }
    exit(1);
}

$outputPath = "$MCP_DIR/{$componentSlug}.md";

echo "Source : $bladePath\n";
echo "Output : $outputPath\n";
if ($dryRun) echo "(dry-run — no files will be written)\n";
echo "\n";

// ── Read source ──────────────────────────────────────────────────────────────

$bladeContent = file_get_contents($bladePath);
$fileSize     = strlen($bladeContent);
echo "Source size: " . number_format($fileSize) . " bytes\n";

// ── System prompt ────────────────────────────────────────────────────────────

$systemPrompt = <<<'SYSTEM'
You are a technical documentation converter for BladewindUI, a Laravel Blade component library.

Your job is to convert a BladewindUI documentation blade file into a clean, MCP-readable Markdown file. The output will be consumed by an MCP server to help AI assistants understand how to use each component.

## Output format

Always produce exactly this structure:

```
---
title: [Component Name] Component
component: x-bladewind::[component-tag]
url: /component/[slug]
---

# [Component Name]

[1-2 sentence description of what the component does and when to use it]

## Basic Usage

```blade
[minimal working example]
```

## [Section Heading]

[prose explaining the feature]

```blade
[code example(s)]
```

...more sections as needed...

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | default | Description. `value1` \| `value2` |

## Full Example

```blade
[complete example with all attributes shown]
```
```

## Rules

1. **Code blocks**: Use ` ```blade ` for Blade/HTML examples, ` ```php ` for PHP, ` ```js ` for JavaScript. Never use ` ```markup ` or ` ```html `.

2. **HTML entity decoding**: All `<pre><code>` blocks in the source use HTML entities. Decode them in the output:
   - `&lt;` → `<`
   - `&gt;` → `>`
   - `&amp;` → `&`
   - `&#123;` → `{`
   - `&#125;` → `}`

3. **Consolidate colour examples**: Instead of one code block per colour, show one block listing all colours as separate component calls. Do not repeat the same structure 10 times.

4. **Omit**: `@include`, live component previews (non-code blade tags), `<x-slot:side_nav>`, `<x-slot name="scripts">`, `@php` blocks that just set up demo data, `x-bladewind::alert` tips (convert to prose instead), layout boilerplate.

5. **Attribute tables**: Extract from the blade's `<x-bladewind::table>` attributes sections. Use pipe-escaped values like `true` \| `false`. Wrap option values in backticks.

6. **Two sub-components**: If the doc covers multiple sub-components (e.g. `processing` + `process-complete`), include both attribute tables under separate `###` headings.

7. **Frontmatter**: Derive `title`, `component`, and `url` from the page title and component tags in the source. The `url` is always `/component/[slug]`.

8. **Be concise**: Write clear, direct prose. No filler sentences.

9. **Output only markdown**: Do not include any explanation, preamble, or closing commentary. Output the markdown document and nothing else.
SYSTEM;

// ── User prompt ───────────────────────────────────────────────────────────────

$componentTitle = ucwords(str_replace('-', ' ', $componentSlug));

$userPrompt = <<<PROMPT
Convert the following BladewindUI documentation blade file for the **{$componentTitle}** component into a clean MCP markdown file.

The component slug is `{$componentSlug}`, so the frontmatter url should be `/component/{$componentSlug}`.

Source file:
```
{$bladeContent}
```
PROMPT;

// ── Call Claude API ───────────────────────────────────────────────────────────

echo "Calling Claude API ({$MODEL})...\n";

$payload = json_encode([
    'model'      => $MODEL,
    'max_tokens' => 8192,
    'system'     => $systemPrompt,
    'messages'   => [
        ['role' => 'user', 'content' => $userPrompt],
    ],
]);

$ch = curl_init('https://api.anthropic.com/v1/messages');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $payload,
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'x-api-key: ' . $apiKey,
        'anthropic-version: 2023-06-01',
    ],
    CURLOPT_TIMEOUT        => 300,
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError) {
    fwrite(STDERR, "cURL error: $curlError\n");
    exit(1);
}

if ($httpCode !== 200) {
    fwrite(STDERR, "API error (HTTP $httpCode):\n$response\n");
    exit(1);
}

$data = json_decode($response, true);

if (!isset($data['content'][0]['text'])) {
    fwrite(STDERR, "Unexpected API response structure:\n$response\n");
    exit(1);
}

$markdown = trim($data['content'][0]['text']);

$inputTokens  = $data['usage']['input_tokens'] ?? '?';
$outputTokens = $data['usage']['output_tokens'] ?? '?';
echo "Tokens: {$inputTokens} in / {$outputTokens} out\n\n";

// ── Write output ──────────────────────────────────────────────────────────────

if ($dryRun) {
    echo "── Generated markdown (dry-run) ──────────────────────────────────────\n";
    echo $markdown . "\n";
    echo "──────────────────────────────────────────────────────────────────────\n";
    exit(0);
}

if (!is_dir($MCP_DIR)) {
    mkdir($MCP_DIR, 0755, true);
}

file_put_contents($outputPath, $markdown . "\n");
echo "Written: $outputPath\n";

// ── Update index.md ───────────────────────────────────────────────────────────

if ($updateIndex) {
    $indexPath = "$MCP_DIR/index.md";

    if (!file_exists($indexPath)) {
        echo "Warning: index.md not found at $indexPath — skipping index update.\n";
    } else {
        $indexContent = file_get_contents($indexPath);

        // Extract component tag from the generated markdown frontmatter
        preg_match('/^component:\s*(.+)$/m', $markdown, $tagMatch);
        $componentTag = trim($tagMatch[1] ?? "x-bladewind::{$componentSlug}");

        $newRow = "| {$componentTitle} | `{$componentTag}` | [{$componentSlug}.md]({$componentSlug}.md) |";

        if (str_contains($indexContent, "{$componentSlug}.md")) {
            echo "Index: entry for '{$componentSlug}' already exists — skipping.\n";
        } else {
            // Append before the final newline of the table
            $indexContent = rtrim($indexContent) . "\n" . $newRow . "\n";
            file_put_contents($indexPath, $indexContent);
            echo "Index: added entry for '{$componentSlug}'.\n";
        }
    }
}

echo "\nDone.\n";
