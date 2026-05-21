---
title: Progress Circle Component
component: x-bladewind::progress-circle
url: /component/progress-circle
---

# Progress Circle

Display progress in a circular form based on a specified percentage. There is a subtle animation that can be turned off by setting `animate="false"`.

This component borrows code from [Nikitahl](https://github.com/nikitahl) available [here](https://github.com/nikitahl/svg-circle-progress-generator).

```blade
<x-bladewind::progress-circle percentage="45" />
```

By default the progress circle label is not displayed. That can be changed by setting `show_label="true"`. The label (the percentage value) is then displayed but without the percentage sign. To display the percentage sign set the attribute `show_percent="true"`.

```blade
<x-bladewind::progress-circle percentage="58" show_label="true" />

<x-bladewind::progress-circle
    percentage="58"
    show_label="true"
    show_percent="true" />
```

## Different Colours

You can display a progress circle in nine different colours by setting the `color` attribute to the preferred colour. Like most BladewindUI components that have colour options, there are two shades, `faint` and `dark`. The default shade is `faint` and the default colour is `blue`.

### Faint Colours

```blade
<x-bladewind::progress-circle percentage="65" color="red" />
<x-bladewind::progress-circle percentage="65" color="yellow" />
<x-bladewind::progress-circle percentage="65" color="green" />
<x-bladewind::progress-circle percentage="65" color="pink" />
<x-bladewind::progress-circle percentage="65" color="cyan" />
<x-bladewind::progress-circle percentage="65" color="gray" />
<x-bladewind::progress-circle percentage="65" color="purple" />
<x-bladewind::progress-circle percentage="65" color="orange" />
<x-bladewind::progress-circle percentage="65" color="blue" />
<x-bladewind::progress-circle percentage="65" color="violet" />
<x-bladewind::progress-circle percentage="65" color="indigo" />
<x-bladewind::progress-circle percentage="65" color="fuchsia" />
```

### Dark Colours

```blade
<x-bladewind::progress-circle percentage="65" shade="dark" color="red" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="yellow" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="green" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="pink" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="cyan" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="gray" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="purple" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="orange" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="blue" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="violet" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="indigo" />
<x-bladewind::progress-circle percentage="65" shade="dark" color="fuchsia" />
```

## Different Sizes

The progress circle comes in five prebuilt sizes with `medium` being the default size. To change the size of the circle set the `size` attribute. The available sizes are `tiny`, `small`, `medium`, `big`, `large`.

```blade
<x-bladewind::progress-circle
    size="tiny"
    percentage="10" />
```

## Custom Sizes

It is quite difficult to determine the perfect circle size that'll fit designs we don't even know about. For this reason Bladewind allows you to specify a custom size for this component if the prebuilt sizes don't suit your needs. Set the `size` attribute to any number above 50.

The prebuilt sizes and their corresponding pixel values are:

| Size | Value |
|---|---|
| tiny | 50 |
| small | 80 |
| medium | 120 |
| big | 200 |
| large | 300 |

```blade
<x-bladewind::progress-circle
    size="400"
    percentage="89" />
```

You will notice from the example above the circle width is quite thin for a circle that big. To increase the width of the circle set the `circle_width` attribute to a reasonable value. The default value for custom circles is `10`.

```blade
<x-bladewind::progress-circle
    size="400"
    circle_width="50"
    percentage="89" />
```

Things get a bit quirky when you need to display labels in custom circles. Because the circle size is unknown, it is a bit tricky to properly centre the label in the circle. There are additional attributes to help position the label properly in the circle.

```blade
<x-bladewind::progress-circle
    percentage="73"
    size="400"
    circle_width="50"
    text_size="50"
    align="100"
    valign="0"
    show_label="true"
    show_percent="true"
/>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| percentage | 0 | Any value between 0 and 100. |
| color | blue | There are twelve colors to choose from. `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| size | medium | The available sizes are: `tiny` \| `small` \| `medium` \| `big` \| `large` \| `custom` |
| show_label | false | Should the percentage label be displayed. `true` \| `false` |
| show_percent | false | Should the percentage sign be displayed. `true` \| `false` |
| animate | true | Should the progress circle be animated when loaded. `true` \| `false` |
| shade | faint | Works with `color` to determine how faint or dark the progress circle colours are. `faint` \| `dark` |
| text_size | 30 | Controls how big the text should be. You can think of this as font size. Value can be any positive number. |
| align | 40 | Controls the position of the text horizontally. You will need to keep tweaking this value until the text sits in a position you desire. |
| valign | 0 | Controls the position of the text vertically. 0 keeps the text in the centre of the circle. Negative values will position the text towards the top of the circle. |
| circle_width | 30 | Controls the thickness of the circle. Value can be any positive number. |

## Full Example

```blade
<x-bladewind::progress-circle
    percentage="50"
    color="red"
    show_label="false"
    show_percent="false"
    animate="true"
    size="medium"
    circle_width="50"
    text_size="50"
    align="100"
    valign="0"
    shade="faint" />
```
