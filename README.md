<p><img src="https://img.shields.io/github/license/bladewindui/ui" alt="License" /></p><br />
<p><img src="https://bladewindui.com/assets/images/bw-logo.png" style="height: 30px; margin-bottom:10px" /></p>

This is the Laravel application that powers [bladewindui.com](https://bladewindui.com) — the documentation
site for **BladewindUI**, a collection of UI components written purely using TailwindCSS, Laravel Blade
templates and vanilla JavaScript.

The component library itself lives in a separate repo: **[bladewindui/ui](https://github.com/bladewindui/ui)**.
That is also where installation instructions and the full, always-current component list live, so they
are not repeated here — this README would just go stale a second time. See its
[README](https://github.com/bladewindui/ui#readme) for both, or the live, generated versions at
[bladewindui.com/install](https://bladewindui.com/install) and [bladewindui.com/components](https://bladewindui.com/components).

<br />

## MCP Documentation

The `mcp/` directory contains clean, machine-readable Markdown documentation for every component. These files are intended for consumption by MCP (Model Context Protocol) servers so that AI assistants can understand how to use BladewindUI components.

Each file includes frontmatter, prose descriptions, fenced `blade` code examples, and a full attribute reference table. An index of all components is at `mcp/index.md`.

### Generating MCP docs for new components

When you add a new component to the documentation site, run `generate-mcp.php` to produce its MCP entry automatically.

**Requirements:** PHP 8+, an [Anthropic API key](https://console.anthropic.com/).

```bash
export ANTHROPIC_API_KEY=sk-ant-...
```

**Generate a new entry:**

```bash
php generate-mcp.php <component-name>
```

**Preview without writing files:**

```bash
php generate-mcp.php <component-name> --dry-run
```

**Generate and add to `mcp/index.md`:**

```bash
php generate-mcp.php <component-name> --update-index
```

The script looks for `resources/views/docs/<component-name>.blade.php`. If the blade filename differs from the component slug (e.g. `empty-state` → `emptystate.blade.php`), add an entry to the `$FILENAME_OVERRIDES` map near the top of `generate-mcp.php`.

<br /><br />

## Questions and General Info

If you want to ask anything at all or report a security vulnerability, please e-mail [mike@bladewindui.com](mailto:mike@bladewindui.com) or tweet [@bladewindui](https://twitter.com/bladewindui)

<br />

## License

BladewindUI is an open-sourced library licensed under the [MIT license](https://opensource.org/licenses/MIT).
