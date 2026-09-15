---
title: Progress Circle Component
component: x-bladewind::progress-circle
url: /component/progress-circle
---

# Progress Circle

Displays progress in circular form based on a specified percentage, with a subtle animation that can be disabled via `animate="false"`. This component borrows code from Nikitahl's svg-circle-progress-generator.

## Basic Usage

```blade
<x-bladewind::progress-circle percentage="45" />
```

## Labels

The percentage label isn't displayed by default. Set `show_label="true"` to show the value without a percentage sign, and `show_percent="true"` to add the sign.

```blade
<x-bladewind::progress-circle percentage="58" show_label="true" />

<x-bladewind::progress-circle percentage="58" show_label="true" show_percent="true" />
```

## Different Colours

Set `color` for one of twelve colors, with two shades, `faint` (default) and `dark`, via `shade`. The default color is `blue`.

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

Five prebuilt sizes are available via `size`, with `medium` as the default: `tiny`, `small`, `medium`, `big`, `large`.

```blade
<x-bladewind::progress-circle percentage="73" size="tiny" />
<x-bladewind::progress-circle percentage="73" size="small" />
<x-bladewind::progress-circle percentage="73" size="medium" />
<x-bladewind::progress-circle percentage="73" size="big" />
<x-bladewind::progress-circle percentage="73" size="large" />
```

## Custom Sizes

Set `size` to any number above 50 for a custom size. Reference for the prebuilt sizes' underlying pixel values:

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

For a large custom circle, increase the ring thickness with `circle_width` (default `10` for custom circles).

```blade
<x-bladewind::progress-circle
    size="400"
    circle_width="50"
    percentage="89" />
```

Centering a label inside a custom-size circle needs extra positioning attributes: `text_size`, `align`, and `valign`.

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
| percentage | 0 | Value between 0 and 100. |
| color | blue | `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| size | medium | `tiny` \| `small` \| `medium` \| `big` \| `large` \| `custom` (or any number above 50 for a custom size) |
| show_label | false | Whether the percentage label is displayed. `true` \| `false` |
| show_percent | false | Whether the percentage sign is displayed. `true` \| `false` |
| animate | true | Whether the circle animates on load. `true` \| `false` |
| shade | faint | Works with `color` to determine faintness or darkness. `faint` \| `dark` |
| text_size | 30 | Font size of the label. Any positive number. |
| align | 40 | Horizontal position of the label text. Tweak until it sits correctly. |
| valign | 0 | Vertical position of the label text. `0` centers it; negative values move it toward the top. |
| circle_width | 30 | Thickness of the circle ring. Any positive number. |

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
