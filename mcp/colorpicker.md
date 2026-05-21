---
title: Colorpicker Component
component: x-bladewind::colorpicker
url: /component/colorpicker
---

# Colorpicker

Display a colour picker so users can select a colour. There are two types of colour pickers. The default HTML colour picker is the default displayed by this component. Once you pass a comma separated string of colours, a custom colour picker is displayed instead.

## Basic Usage

```blade
<x-bladewind::colorpicker  />
```

Once you pass a comma separated string of colours, a custom colour picker is displayed instead. These must be HEX colours including the '#' sign. This is useful if you are building a theme based web app that allows users to select their preferred theme for example.

```blade
<x-bladewind::colorpicker
 colors="#fff999, #cccccc, #999222, #787623, #78fcc3, #333678, #878987, #098765"/>
```

## Show Selected Value

By default the colorpicker does not show the value of the selected colour. It only changes the colour of the box to what has been selected. To show the selected value set `show_value="true"`.

```blade
<x-bladewind::colorpicker show_value="true" />
```

## Sizes

The colorpicker comes in different sizes to match with input fields. In case the component is being used in a form with other fields. The default size is regular.

```blade
<x-bladewind::colorpicker size="small"  />
```

```blade
<x-bladewind::colorpicker size="regular"  />
```

```blade
<x-bladewind::colorpicker size="medium"  />
```

```blade
<x-bladewind::colorpicker size="big"  />
```

In order to access selected colour values when a form is submitted, provide a `name` for your colorpicker. BladewindUI provides a random unique name when no name is provided.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | random | This name can be accessed when the colorpicker is submitted in a form. |
| selected_value | #000000 | The default colour to show in the colorpicker. Also used when editing an already saved value. |
| show_value | false | Determines if the component should show the selected colour value. `true` \| `false` |
| class | _(blank)_ | Any additional css classes can be added using this attribute. |
| colors | _(blank)_ | Comma separated list of colours to display instead of the default colour palette. |
| size | regular | Size of the colorpicker. Values match the various input size values. `small` \| `regular` \| `medium` \| `big` |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts. |

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
