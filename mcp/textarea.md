---
title: Textarea Component
component: x-bladewind::textarea
url: /component/textarea
---

# Textarea

Displays a textarea input, optionally with a floating label, a simple rich-text toolbar, and Laravel form-state integration (old input and validation errors).

## Basic Usage

```blade
<x-bladewind::textarea />
```

By default the textarea has three rows; increase it with `rows="5"`.

## Placeholder Text

```blade
<x-bladewind::textarea placeholder="Comment" />
```

## With Labels

Labels present themselves as placeholders but jump to the top border of the textarea when the field has focus, letting you build compact forms without separate form labels. To style your own labels, ignore `label` and use `placeholder` instead.

```blade
<x-bladewind::textarea label="Comment" />
```

## Required Fields

Adds a red asterisk to the placeholder text or label.

```blade
<x-bladewind::textarea required="true" label="Comment" />
```

## Events

You can append any HTML event attribute (`onclick`, `onblur`, `onfocus`, `onmouseover`, `onmouseout`, `onkeyup`, `onkeydown`, etc.) to the component, just like a regular `<textarea>` tag.

```blade
<x-bladewind::textarea
    name="events"
    label="Comment"
    required="true"
    onfocus="changeCss('.events', '!border-2,!border-red-400')"
    onblur="changeCss('.events', '!border-2,!border-red-400', 'remove')">
</x-bladewind::textarea>
```

## Simple Toolbar

Set `toolbar="true"` to display a simple rich-text toolbar, using assets from the [Quill](https://quilljs.com) website.

```blade
<x-bladewind::textarea placeholder="Comment" toolbar="true"></x-bladewind::textarea>
```

Toolbar formatting options: `bold`, `italic`, `underline`, `align`, `indent`, `link`, `color`, `background`, `list`, `image`, `blockquote`, `code-block`, and `clean`. Remove options with a comma separated `except` attribute.

```blade
<x-bladewind::textarea
    except="align, indent, color, background"
    placeholder="Comment" toolbar="true"></x-bladewind::textarea>
```

## Laravel Form State

When validation fails, Laravel redirects back with submitted values flashed to the session and messages in `$errors`. The Textarea component can read both for you, so you no longer need `old('...')` and an error block on every field.

```blade
<x-bladewind::textarea
    name="bio"
    label="Short bio"
    fill_from_old="true"
    show_validation_error="true" />
```

`fill_from_old` repopulates the field from `old()`. `show_validation_error` gives the field its error state and renders `$errors->first()` underneath it. Add `error_bag` if you validate into a named bag.

Both are off by default. If your form already prints its own validation messages, switching this on without removing them would print every message twice.

### Turning It On For Every Form

Rather than setting the attributes field by field, set them once in `config/bladewind.php` and every form component follows.

```php
// config/bladewind.php
'forms' => [
    'fill_from_old' => true,
    'show_validation_error' => true,
    'error_bag' => null,
],
```

An attribute on a single field always wins over the config, so you can opt one field out with `show_validation_error="false"`.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | textarea-uniqid() | Unique name to identify the textarea, used to retrieve its value on form submit. Defaults to a random name prefixed with `textarea-`. |
| label | *blank* | Label describing the textarea. |
| error_message | *blank* | Error message shown when the field is required but blank. |
| error_heading | Error | Error heading shown in the notification component when the field is required but blank. Used when `show_error_inline=true`. |
| show_error_inline | false | Whether the error message is shown inline (beneath the field) or in a notification component. `true` \| `false` |
| required | false | Whether the field is required; shows a red asterisk next to the placeholder or label. `true` \| `false` |
| add_clearing | true | Whether an 8px bottom margin is added, keeping form fields evenly spaced. `true` \| `false` |
| toolbar | false | Displays a simple [Quill](https://quilljs.com) toolbar above the textarea. `true` \| `false` |
| except | *blank* | Comma separated list of formatting options to exclude from the toolbar. |
| placeholder | *blank* | Placeholder text. |
| rows | 3 | Height of the textarea in rows. Ignored in toolbar mode. |
| selected_value | *blank* | Default value, useful in edit mode. |
| nonce | null | Nonce for content security policies on inline scripts. Can be set globally via `config/bladewind.php` under `script`. |
| fill_from_old | false | Repopulate the field from `old()` after failed validation. Defaults to `bladewind.forms.fill_from_old` config. `true` \| `false` |
| show_validation_error | false | Give the field its error state and render `$errors->first()` beneath it. Defaults to `bladewind.forms.show_validation_error` config. `true` \| `false` |
| error_bag | null | Which error bag to read when `show_validation_error` is on. Leave unset for Laravel's default bag. |

## Full Example

```blade
<x-bladewind::textarea
    name="message"
    label="Enter message"
    placeholder=""
    add_clearing="false"
    required="true"
    toolbar="true"
    except="align, bold, italic"
    show_error_inline="false"
    error_heading="Error"
    error_message="A comment is required"
    rows="5"
    selected_value="" ></x-bladewind::textarea>
```
