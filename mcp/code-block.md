---
title: Code Block Component
component: x-bladewind::code-block
url: /component/code-block
---

# Code Block

The code block component displays a block of source code with syntax highlighting, powered by [Prism](https://prismjs.com). It shows a small header with the language and an optional filename or title, and a copy button that puts the code on the clipboard with one click.

There are two ways to give it code. Pass a `code` attribute with a PHP string, or write the snippet directly between the opening and closing tags using the default slot. The attribute is the easier and safer choice, since Blade escapes it for you automatically. Written as a slot, any `<` `>` or `&` in the code needs to be written as an HTML entity by hand, the same as any other raw `<pre><code>` block.

```blade
<x-bladewind::code-block language="php" code="Route::get('/users', [UserController::class, 'index']);"></x-bladewind::code-block>
```

## Languages

Set `language` to any language Prism supports. This component bundles `markup` `css` `javascript` `php` `bash` `json` `sql` `python` and `yaml`.

```blade
<x-bladewind::code-block language="javascript" code="const total = items.reduce((sum, item) => sum + item.price, 0);"></x-bladewind::code-block>
```

## Title

Give a code block a `title` to show a filename or a short label above the code.

```blade
<x-bladewind::code-block language="php" title="routes/web.php" :code="$routesExample"></x-bladewind::code-block>
```

## Line Numbers

Set `line_numbers="true"` to number every line, useful for longer snippets.

```blade
<x-bladewind::code-block language="php" line_numbers="true" :code="$routesExample"></x-bladewind::code-block>
```

## Highlighting Lines

Set `highlight_lines` to draw attention to specific lines, using Prism's line-highlight syntax: a single line number, a range, or a comma separated mix of both, for example `"2"` or `"3-5,8"`.

```blade
<x-bladewind::code-block language="php" line_numbers="true" highlight_lines="2" :code="$routesExample"></x-bladewind::code-block>
```

## Wrapping Long Lines

A code block scrolls horizontally by default when a line is too long to fit. Set `wrap="true"` to wrap long lines onto the next line instead.

```blade
<x-bladewind::code-block language="bash" wrap="true" code="php artisan make:model Product -mfsc --policy --api"></x-bladewind::code-block>
```

## Copy Action

A copy button is shown by default, in the top right of the header. Set `show_copy="false"` to hide it.

```blade
<x-bladewind::code-block language="json" show_copy="false" code='{"name": "bladewindui/ui", "license": "MIT"}'></x-bladewind::code-block>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| code | _blank_ | The code to display, as a PHP string. Escaped automatically. Leave blank to write the snippet in the default slot instead. |
| language | markup | `markup` \| `css` \| `javascript` \| `php` \| `bash` \| `json` \| `sql` \| `python` \| `yaml` |
| title | _blank_ | An optional filename or label shown in the header. |
| line_numbers | false | Numbers every line. `true` \| `false` |
| highlight_lines | _blank_ | Lines to highlight, using Prism's line-highlight syntax, for example `"2"` or `"3-5,8"`. |
| wrap | false | Wraps long lines instead of scrolling horizontally. `true` \| `false` |
| show_copy | true | Shows a button that copies the code to the clipboard. `true` \| `false` |
| show_language_label | true | Shows the language name in the header. `true` \| `false` |
| class | _blank_ | Any additional CSS classes you wish to add. |

## Note For Package Authors

If the host page already has a global `Prism` object (for example, from its own blog or documentation setup), this component extends it with the extra languages it needs instead of loading a second, conflicting copy of Prism's core.
