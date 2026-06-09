---
title: Slider Component
component: x-bladewind::slider
url: /component/slider
---

# Slider

Select values from a slider. This provides a convenient way for users to select numeric values instead of clicking increment and decrement arrows or manually entering values.

It is important to give your Slider a name if you intend to get the selected value when a form is submitted or via ajax. If you have multiple sliders on the same page, each slider needs to have a unique name. BladewindUI will use random names if you don't specify any.

```blade
<x-bladewind::slider />
```

## Different Colours

The Slider component supports multiple colours. The default colour is your project's primary colour defined in your TailwindCSS config file. To use a different colour, set the `color` attribute. The `selected` attribute is useful in edit mode to specify the slider number the user already selected. It can also be used to set the default value for the slider.

```blade
<x-bladewind::slider selected="50" color="cyan" />
<x-bladewind::slider selected="30" color="pink" />
<x-bladewind::slider selected="70" color="indigo" />
```

## Step

By default the slider increments by 1 when you slide. You can define the numeric interval between slides by setting the `step` attribute. This must be a positive number greater than 1.

```blade
<x-bladewind::slider selected="10" step="5" />
```

## Min and Max Values

By default the slider is set to a minimum of 0 and maximum of 100. This behaviour can be changed by setting the `min` and `max` attributes. These must be positive numbers.

```blade
<x-bladewind::slider min="18" max="35" />
```

## Range Selection

There are cases where you need to let users select a minimum and maximum value. Setting the slider attribute `range="true"` displays two markers on the slider for users to select two values.

> Note: The range selection slider is currently buggy.

```blade
<x-bladewind::slider range="true" selected="20" max_selected="60" />
```

## Form Submission

The `name` you specify for the slider is what will be passed when your form is submitted. Assuming you named your slider `age`, below is the HTML input field that will be generated.

```blade
<input type="hidden"
       name="age"
       id="age"
       class="slider-selection-age-input bw-slider-age"
       value="50" />
```

```blade
<!-- when using a range slider and two values are selected -->
<input type="hidden"
       name="age"
       id="age"
       class="slider-selection-age-input bw-slider-age"
       value="10,50" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | bw_uniqid() | Unique name for the slider. You can get the slider value from this when a form with a slider is submitted. |
| color | primary | There are twelve colours to choose from. `primary` \| `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| show_values | true | Should the selected values label be displayed. `true` \| `false` |
| range | false | Should the slider show two markers instead of one. `true` \| `false` |
| min | 0 | Minimum value the slider should start from. Needs to be a positive number greater or equal to zero. |
| max | 100 | Maximum value the slider should end at. Needs to be a positive number greater than zero. |
| step | 1 | By what number should the slider values be incremented or decreased. Needs to be a positive number greater than zero. |
| selected | 0 | Used in edit mode to set the slider to the number user selected previously. Also used to set the default value for the slider. The `max` value is used when a `selected` value is greater than the `max` value. |
| max_selected | _blank_ | Applies only if `range="true"`. Sets the slider value for the second marker. Also used to set the default value for the second marker. |
| class | bw-slider-container | Any additional css you wish to add. |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your `nonce` value in the `config/bladewind.php` file under the "script" key. |

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
