---
title: Slider Component
component: x-bladewind::slider
url: /component/slider
---

# Slider

Select numeric values from a slider, a more convenient alternative to increment/decrement arrows or manual entry.

Give your slider a name if you intend to read its selected value on form submission or via ajax. If you have multiple sliders on the same page, each needs a unique name — BladewindUI uses random names if you don't specify any.

## Basic Usage

```blade
<x-bladewind::slider />
```

## Different Colours

The slider supports the standard set of BladewindUI colours. The default is your project's primary colour from the TailwindCSS config. Set `color` to change it. The `selected` attribute sets the slider's default (or previously selected) value — useful in edit mode.

```blade
<x-bladewind::slider selected="50" color="cyan" />
<x-bladewind::slider selected="30" color="pink" />
<x-bladewind::slider selected="70" color="indigo" />
```

## Step

By default the slider increments by 1. Set `step` to a positive number greater than 1 to change the increment.

```blade
<x-bladewind::slider selected="10" step="5" />
```

## Min and Max Values

By default the slider ranges from 0 to 100. Change this with the `min` and `max` attributes (positive numbers) — for example, to restrict selection to an age range.

```blade
<x-bladewind::slider min="18" max="35" />
```

## Range Selection

Set `range="true"` to display two markers, letting users select a minimum and maximum value (for example, restricting content to ages 4 to 9).

```blade
<x-bladewind::slider range="true" selected="20" max_selected="60" />
```

Note: the range selection mode currently has known bugs.

## Form Submission

The `name` you give the slider is used when the form is submitted. For a slider named `age`, the generated hidden input looks like:

```blade
<input type="hidden"
       name="age"
       id="age"
       class="slider-selection-age-input bw-slider-age"
       value="50" />
```

When using a range slider with two values selected, the value is comma-separated:

```blade
<input type="hidden"
       name="age"
       id="age"
       class="slider-selection-age-input bw-slider-age"
       value="10,50" />
```

## Using Slider Inside Livewire

As the slider is dragged, the hidden value field dispatches a real, native `change` event, so Livewire's `wire:model` picks it up without extra work. The slider's handlers are assigned as a single property rather than added as separate listeners, so a Livewire re-render replaces that assignment instead of stacking duplicates.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | bw_*uniqid()* | Unique name for the slider. Used to read its value when a form is submitted. |
| color | primary | There are twelve colours to choose from. `primary` \| `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| show_values | true | Whether the selected value label should be displayed. `true` \| `false` |
| range | false | Whether the slider shows two markers instead of one. `true` \| `false` |
| min | 0 | Minimum value the slider starts from. A positive number greater than or equal to zero. |
| max | 100 | Maximum value the slider ends at. A positive number greater than zero. |
| step | 1 | Increment/decrement amount. A positive number greater than zero. |
| selected | 0 | Sets the slider to a previously selected value (edit mode), or its default value. Clamped to `max` if greater than `max`. |
| max_selected | *blank* | Only applies when `range="true"`. Sets (and defaults) the value for the second marker. |
| class | bw-slider-container | Additional CSS classes to add. |
| nonce | null | Used when implementing content security policies that require a nonce for inline scripts. For convenience, set your `nonce` value in `config/bladewind.php` under the `script` key; it will be used everywhere a nonce is required. |
| aria_label | Value | Accessible name for the range input. A slider with no name is announced as an anonymous control. |

## Full Example

```blade
<x-bladewind::slider
    min="5"
    max="50"
    color="red"
    show_values="false"
    step="5"
    range="true"
    selected="34"
    max_selected="45"
    class="m-0" />
```
