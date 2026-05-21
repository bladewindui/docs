---
title: Number Component
component: x-bladewind::number
url: /component/number
---

# Number

Display a number input that allows incrementing and decrementing values via up/down buttons. Extends the BladewindUI [Input](/component/input) component using prefix/suffix icons and `numeric="true"`.

## Basic Usage

```blade
<x-bladewind::number />

{{-- increment/decrement by 10 --}}
<x-bladewind::number step="10" />
```

## Sizes

Available sizes: `small`, `regular`, `medium` (default), `big`. Sizes match the Input component sizes.

```blade
<x-bladewind::number size="small" />
<x-bladewind::number size="regular" />
<x-bladewind::number size="medium" />
<x-bladewind::number size="big" />
```

## Button Transparency

By default the increment/decrement buttons are transparent. Set `transparent_icons="false"` to give them a solid background.

```blade
<x-bladewind::number transparent_icons="false" />
<x-bladewind::number transparent_icons="false" size="big" />
```

## Labels

Setting a `label` on a number with a default value (`selected_value`) moves the label to the top border of the field. Setting `selected_value=""` displays the label as a placeholder.

```blade
{{-- label at top border --}}
<x-bladewind::number label="quantity" />

{{-- label as placeholder --}}
<x-bladewind::number selected_value="" label="quantity" />
```

## Minimum and Maximum Limits

```blade
<x-bladewind::number min="18" max="60" label="Your age" />
```

The component enforces limits — clicking past `max` does nothing, and manually typing out-of-range values resets them to the limit.

## Form Values

The `name` attribute is submitted with the form. A random name is used if none is specified.

```php
$request->age; // if name="age"
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | random | Name submitted with the form |
| label | _(blank)_ | Label displayed in or above the component |
| selected_value | null | Default value (edit mode) |
| min | 0 | Minimum allowed value |
| max | 100 | Maximum allowed value |
| step | 1 | Increment/decrement amount |
| size | medium | `small` \| `regular` \| `medium` \| `big` |
| transparent_icons | true | Transparent increment/decrement buttons. `true` \| `false` |
| icon_type | outline | Arrow icon style. `outline` \| `solid` |
| with_dots | true | Allow decimal values. `true` \| `false` |
| required | false | Append asterisk to label. `true` \| `false` |
| class | _(blank)_ | Additional CSS classes for the input field |
| nonce | null | Nonce value for Content Security Policy |

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
