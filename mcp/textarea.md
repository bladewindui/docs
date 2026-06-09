---
title: Textarea Component
component: x-bladewind::textarea
url: /component/textarea
---

# Textarea

Displays a textarea. By default the textarea is displayed with three rows. You can increase the number of rows by setting the `rows` attribute. Example, `rows="5"`.

## Add Placeholder Text

```blade
<x-bladewind::textarea placeholder="Comment" />
```

## With Labels

You can display the BladewindUI textarea with labels. Labels present themselves as placeholders but jump to the top border of the textarea when that field has focus. This is a nice way to build compact looking forms without having form labels in the way. If you prefer to create and style your own form labels, simply ignore the `label` attribute and use the `placeholder` attribute instead.

```blade
<x-bladewind::textarea label="Comment" />
```

## Required Fields

This either adds a red asterisk sign to the placeholder text or a red star to the label of the textarea field.

```blade
<x-bladewind::textarea required="true" label="Comment" />
```

See component/textarea documentation on [Validating Required Fields](https://bladewindui.com/component/textbox#validate).

## Events

You can append any of the available HTML event attributes (*onclick, onblur, onfocus, onmouseover, onmouseout, onkeyup, onkeydown* etc) to the component, just like you would to a regular `<textarea ...` tag. The border of the textarea below turns red onfocus and to gray onblur.

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

The textarea can display simple toolbar by setting `toolbar="true"`. The toolbar assets are included from the [Quill website](https://quilljs.com).

```blade
<x-bladewind::textarea
    placeholder="Comment" toolbar="true"></x-bladewind::textarea>
```

The formatting options listed on the toolbar are `bold`, `italic`, `underline`, `align`, `indent`, `link`, `color`, `background`, `list`, `image`, `blockquote`, `code-block` and `clean`. To remove some of the formatting options from the toolbar, set the `except` attribute and provide a comma separated list of the formatting options to remove.

```blade
<x-bladewind::textarea
    except="align, indent, color, background"
    placeholder="Comment" toolbar="true"></x-bladewind::textarea>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| `name` | `textarea-uniqid()` | Unique name to identify the textarea element by. Useful for retrieving value from the textarea when it is submitted in a form. The component by default uses a random name prefixed with 'textarea-'. |
| `label` | *blank* | Label that describes the textarea element. Example: Full name |
| `error_message` | *blank* | Error message to display when field is required but blank. |
| `error_heading` | `Error` | Error heading to display in notification component when field is required but blank. This is used when `show_error_inline=true`. |
| `show_error_inline` | `false` | Specifies if the error message is displayed inline (beneath the field) or in a notification component. `true` `false` |
| `required` | `false` | Specifies if the textarea element is required or not. When required, a red asterisk is displayed next to the placeholder or label. `true` `false` |
| `add_clearing` | `true` | Specifies if an 8px margin should be added to the bottom of the element. This ensures your form fields are evenly spaced by default. `true` `false` |
| `toolbar` | `false` | Display a simple [Quill](https://quilljs.com) toolbar on top of the textarea. `true` `false` |
| `except` | *blank* | Define formatting options to exclude from the toolbar. Accepts a comma separated list of options. |
| `placeholder` | *blank* | Placeholder text to display in the textarea element. |
| `rows` | `3` | Specifies the height of the textarea in rows. Can be any positive whole number. This is ignored when in toolbar mode. |
| `selected_value` | *blank* | Default value to display in the textarea element. Useful when in edit mode. |
| `nonce` | `null` | Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your `nonce` value in the `config/bladewind.php` file under the "script" key. This value will be used everywhere nonce is required. |

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
    selected_value="" /></x-bladewind::textarea>
```
