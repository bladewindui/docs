---
title: Colorpicker Component
component: x-bladewind::colorpicker
url: /component/colorpicker
---

# Colorpicker

Display a colour picker so users can select a colour. The default is the browser's native HTML colour picker; passing a comma-separated string of HEX colours switches it to a custom colour picker instead.

## Basic Usage

```blade
<x-bladewind::colorpicker />
```

## Custom Colour Palette

Pass a comma-separated string of HEX colours (including the `#` sign) to display a custom colour picker instead of the native one. This is useful for a theme-based web app that lets users pick a preferred theme.

```blade
<x-bladewind::colorpicker
    colors="#fff999, #cccccc, #999222, #787623, #78fcc3, #333678, #878987, #098765" />
```

## Showing the Selected Value

By default the colorpicker only changes the colour of the box to the selection, without displaying the value. Set `show_value="true"` to show it.

```blade
<x-bladewind::colorpicker show_value="true" />
```

## Sizes

The colorpicker comes in different sizes to match input fields, useful when placed alongside other form fields. The default size is `regular`.

```blade
<x-bladewind::colorpicker size="small" />
<x-bladewind::colorpicker size="regular" />
<x-bladewind::colorpicker size="medium" />
<x-bladewind::colorpicker size="big" />
```

## Forms

To access selected colour values when a form is submitted, provide a `name` for the colorpicker. BladewindUI provides a random unique name when none is given.

## Using Colorpicker Inside Livewire

When a colour is picked, the value field dispatches a real, native `change` event, so Livewire's `wire:model` picks it up without any extra work. The bindings that drive the picker are safe to re-run, so a Livewire re-render will not leave behind duplicate listeners.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | random | Accessed when the colorpicker is submitted in a form. |
| selected_value | #000000 | Default colour to show, also used when editing a saved value. |
| show_value | false | Show the selected colour value. `true` \| `false` |
| class | *blank* | Any additional CSS classes. |
| colors | *blank* | Comma-separated list of HEX colours to display instead of the default palette. |
| size | regular | Size of the colorpicker, matching input size values. `small` \| `regular` \| `medium` \| `big` |
| nonce | null | Nonce value for content security policies applied to inline scripts. Can also be set globally via `config/bladewind.php` under the "script" key. |

## Full Example

```blade
<x-bladewind::colorpicker
    name="theme"
    size="medium"
    show_value="true"
    colors="#989098, #cccc44, #323232"
    selected_value="#909090"
    class="shadow-sm" />
```
