<x-app>
    <x-slot:title>MCP Server</x-slot:title>
    <x-slot:page_title>MCP Server</x-slot:page_title>

    <p>
        The <a href="https://modelcontextprotocol.io" target="_blank">Model Context Protocol</a> (MCP) is an open standard that lets AI assistants
        read structured context from external sources. BladewindUI runs a remote MCP server at
        <code class="inline">https://bladewindui.com/mcp/server</code> that exposes the full component documentation to
        any MCP-compatible AI tool.
    </p>
    <p>
        This means tools like Claude Desktop, Cursor, and VS Code Copilot can answer questions about BladewindUI components,
        generate correct usage examples, and look up attribute names and defaults — with no copy-pasting, no repo cloning,
        and no local setup required.
    </p>

    <h2 id="what-is-available">What Is Available</h2>
    <p>
        The MCP server exposes two types of context:
    </p>
    <ul class="list-disc pl-6 space-y-2">
        <li>
            <strong>Resources</strong> — one resource per component (e.g. <code class="inline">bladewindui://docs/button</code>),
            plus an index at <code class="inline">bladewindui://docs/index</code>.
            Each resource is the full Markdown documentation for that component including usage examples and attribute tables.
        </li>
        <li>
            <strong>Tools</strong> — three callable tools the AI can invoke:
            <code class="inline">list_components</code>, <code class="inline">get_component_docs</code>,
            and <code class="inline">search_components</code>.
        </li>
    </ul>

    <h2 id="claude-desktop">Claude Desktop</h2>
    <p>
        Claude Desktop communicates with MCP servers over stdio, so connecting to a remote HTTP server requires
        a small proxy called <code class="inline">mcp-remote</code>. You will need
        <a href="https://nodejs.org" target="_blank">Node.js</a> installed on your machine.
    </p>
    <p>
        Open your Claude Desktop configuration file:
    </p>
    <ul class="list-disc pl-6 space-y-1">
        <li>macOS: <code class="inline">~/Library/Application Support/Claude/claude_desktop_config.json</code></li>
        <li>Windows: <code class="inline">%APPDATA%\Claude\claude_desktop_config.json</code></li>
    </ul>
    <p>
        Add the following entry inside <code class="inline">mcpServers</code>, replacing <code class="inline">/usr/local/bin/npx</code>
        with the full path to <code class="inline">npx</code> on your machine
        (run <code class="inline">which npx</code> in your terminal to find it):
    </p>
    <pre class="language-js line-numbers">
<code>
{
  "mcpServers": {
    "bladewindui": {
      "command": "/usr/local/bin/npx",
      // "command": "npx", use this on Windows or if npx is in your PATH
      "args": ["-y", "mcp-remote", "https://bladewindui.com/mcp/server"]
    }
  }
}
</code>
    </pre>
    <p>
        Save the file and restart Claude Desktop fully (quit and reopen — do not just close the window).
        Once connected, a hammer icon will appear at the bottom of a new chat showing the available tools.
        You can then ask questions like <em>"Show me all the attributes for the BladewindUI table component"</em>
        or <em>"How do I use the filepicker with automatic uploads?"</em> and Claude will read the answer directly from the docs.
    </p>

    <h2 id="cursor">Cursor</h2>
    <p>
        Open <strong>Cursor Settings → MCP</strong> and click <strong>Add new global MCP server</strong>,
        or edit <code class="inline">~/.cursor/mcp.json</code> directly:
    </p>
    <pre class="language-js line-numbers">
<code>
{
  "mcpServers": {
    "bladewindui": {
      "type": "http",
      "url": "https://bladewindui.com/mcp/server"
    }
  }
}
</code>
    </pre>
    <p>
        For a project-scoped setup — useful when you want every developer on a team to get BladewindUI context automatically —
        create <code class="inline">.cursor/mcp.json</code> at the root of your Laravel project and commit it to version control.
        The format is identical to the global config above.
    </p>

    <h2 id="vscode">VS Code (GitHub Copilot)</h2>
    <p>
        Open <strong>User Settings (JSON)</strong> via <kbd>Cmd/Ctrl + Shift + P</kbd> → <em>Preferences: Open User Settings (JSON)</em> and add:
    </p>
    <pre class="language-js line-numbers">
<code>
{
  "github.copilot.chat.mcpServers": {
    "bladewindui": {
      "type": "http",
      "url": "https://bladewindui.com/mcp/server"
    }
  }
}
</code>
    </pre>

    <h2 id="tools">Available Tools</h2>
    <p>Once connected, the AI can call three tools against the BladewindUI MCP server:</p>

    <x-bladewind::table striped="true" has_shadow="false">
        <x-slot name="header">
            <th>Tool</th>
            <th>Description</th>
            <th>Input</th>
        </x-slot>
        <tr>
            <td nowrap="nowrap"><code class="inline">list_components</code></td>
            <td>Returns every component with its Blade tag and resource URI.</td>
            <td>none</td>
        </tr>
        <tr>
            <td nowrap="nowrap"><code class="inline">get_component_docs</code></td>
            <td>Returns the full documentation for a single component.</td>
            <td><code class="inline">name</code> — component slug, e.g. <code class="inline">button</code></td>
        </tr>
        <tr>
            <td nowrap="nowrap"><code class="inline">search_components</code></td>
            <td>Searches all component docs for a keyword and returns matching excerpts.</td>
            <td><code class="inline">query</code> — keyword or phrase</td>
        </tr>
    </x-bladewind::table>

    <h2 id="example-prompts">Example Prompts</h2>
    <p>Once your editor is connected, try prompts like these in the AI chat:</p>
    <ul class="list-disc pl-6 space-y-2">
        <li><em>"List all BladewindUI components."</em></li>
        <li><em>"How do I use the BladewindUI table component with pagination and sorting?"</em></li>
        <li><em>"What attributes does the filepicker accept?"</em></li>
        <li><em>"Show me a BladewindUI modal that confirms a destructive action."</em></li>
        <li><em>"Search BladewindUI docs for anything related to dark mode."</em></li>
        <li><em>"Generate a BladewindUI dashboard card with a statistic and an icon."</em></li>
    </ul>

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#what-is-available">What is available</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#claude-desktop">Claude Desktop</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#cursor">Cursor</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#vscode">VS Code</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#tools">Available tools</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#example-prompts">Example prompts</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.mcp-server');
        </script>
    </x-slot>
</x-app>
