---
title: Number Component
component: x-bladewind::number
url: /component/number
---

# Number

Displays a numeric stepper that lets users increment and decrease a number in a user-friendly way. It extends the BladewindUI [Input](/component/input) component by adding prefix/suffix increment icons and setting `numeric="true"`, so several Input attributes are also available here.

## Basic Usage

```blade
<x-bladewind::number />

<x-bladewind::number step="10" />
```

## Different Sizes

All Input component sizes are available; the up and down arrows adjust to match.

```blade
<x-bladewind::number size="small" />
<x-bladewind::number size="regular" />
<x-bladewind::number size="medium" />
<x-bladewind::number size="big" />
```

## Button Transparency

The up and down buttons are transparent by default. Set `transparent_icons="false"` for them to look like proper buttons (sets the Input component's `transparent_prefix="false"` and `transparent_suffix="false"` internally).

```blade
<x-bladewind::number transparent_icons="false" />
<x-bladewind::number transparent_icons="false" size="big" />
```

## Labels

The component initializes with `selected_value="0"` by default. Setting `label` moves the label text to the top border of the field.

```blade
<x-bladewind::number label="quantity" />
```

Traditional placeholders don't work in the number component. To avoid an initial value, set `selected_value=""` alongside `label`, and the label is displayed as a placeholder.

```blade
<x-bladewind::number selected_value="" label="quantity" />
```

## Minimum and Maximum Limits

Set `min` and `max` to constrain the range. The component enforces these limits both on click and on manual typing: clicking increment at the max keeps the value unchanged, and typing a value beyond the limit resets it to the limit.

```blade
<x-bladewind::number min="18" max="60" label="Your age" />
```

## Form Values

The `name` given to the component is what's available when the form is submitted. A random name is generated if none is specified.

```php
$request->age;
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | 'input-'.uniqid() | Name accessible when the form is submitted. |
| with_dots | true | Whether decimal values are allowed. `true` \| `false` |
| selected_value | null | Default value, useful in edit mode. |
| label | blank | Label displayed in or above the component. |
| min | 0 | Minimum value allowed. |
| max | 100 | Maximum value allowed. |
| transparent_icons | true | Whether the up/down icons are transparent or have a background color. `true` \| `false` |
| icon_type | outline | Style of the up/down arrow icons. `outline` \| `solid` |
| size | medium | Size of the component. `small` \| `regular` \| `medium` \| `big` |
| required | false | Whether an asterisk is appended to the field. `true` \| `false` |
| step | 1 | Amount the value increases or decreases per click. |
| class | blank | Extra CSS classes for the input field, e.g. to adjust width. |
| nonce | null | Nonce for content security policies on inline scripts. Can be set globally via `config/bladewind.php` under `script`. |

## Full Example

```blade
<x-bladewind::number
    name="age"
    icon_type="outline"
    required="false"
    label="Age"
    size="big"
    transparent_icons="true"
    min="18"
    max="65"
    step="10"
    with_dots="false"
    selected_value="12" />
```
