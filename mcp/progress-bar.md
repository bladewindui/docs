---
title: Progress Bar Component
component: x-bladewind::progress-bar
url: /component/progress-bar
---

# Progress Bar

Displays progress as a horizontal bar. It expects a percentage, and the bar fills to that percentage with a subtle animation. The default color is blue.

## Basic Usage

```blade
<x-bladewind::progress-bar percentage="36" />
```

## Percentage Label

The percentage isn't displayed by default. Set `show_percentage_label="true"` to display it inside the bar.

```blade
<x-bladewind::progress-bar percentage="36" show_percentage_label="true" />
```

To place the percentage outside the bar, set `show_percentage_label_inline="false"`. With the label out of the bar, position it with `percentage_label_position`: `top left`, `top center`, `top right`, `bottom left`, `bottom center`, `bottom right` (default `top left`).

```blade
<x-bladewind::progress-bar percentage="36" show_percentage_label="true" show_percentage_label_inline="false" />

<x-bladewind::progress-bar
    percentage="53"
    show_percentage_label_inline="false"
    percentage_label_position="top center"
    show_percentage_label="true" />

<x-bladewind::progress-bar
    percentage="75"
    show_percentage_label_inline="false"
    percentage_label_position="top right"
    show_percentage_label="true" />
```

Prepend or append text to the label with `percentage_prefix` and/or `percentage_suffix`, to produce things like "53% complete" or "Upload in progress: 53% complete".

```blade
<x-bladewind::progress-bar
    percentage="75"
    show_percentage_label_inline="false"
    percentage_suffix="complete"
    show_percentage_label="true" />
```

## Different Colours

Set `color` for one of twelve colors. Each has two shades, `faint` (default) and `dark`, controlled via the `shade` attribute.

### Faint Colours

```blade
<x-bladewind::progress-bar percentage="10" color="red" />
<x-bladewind::progress-bar percentage="20" color="yellow" />
<x-bladewind::progress-bar percentage="30" color="green" />
<x-bladewind::progress-bar percentage="40" color="pink" />
<x-bladewind::progress-bar percentage="50" color="cyan" />
<x-bladewind::progress-bar percentage="60" color="gray" />
<x-bladewind::progress-bar percentage="70" color="purple" />
<x-bladewind::progress-bar percentage="80" color="orange" />
<x-bladewind::progress-bar percentage="80" color="violet" />
<x-bladewind::progress-bar percentage="80" color="fuchsia" />
<x-bladewind::progress-bar percentage="80" color="indigo" />
<x-bladewind::progress-bar percentage="90" />
```

### Dark Colours

```blade
<x-bladewind::progress-bar percentage="50" shade="dark" color="red" />
<x-bladewind::progress-bar percentage="20" shade="dark" color="yellow" />
<x-bladewind::progress-bar percentage="30" shade="dark" color="green" />
<x-bladewind::progress-bar percentage="40" shade="dark" color="pink" />
<x-bladewind::progress-bar percentage="50" shade="dark" color="cyan" />
<x-bladewind::progress-bar percentage="60" shade="dark" color="gray" />
<x-bladewind::progress-bar percentage="70" shade="dark" color="purple" />
<x-bladewind::progress-bar percentage="80" shade="dark" color="orange" />
<x-bladewind::progress-bar percentage="80" shade="dark" color="violet" />
<x-bladewind::progress-bar percentage="80" shade="dark" color="indigo" />
<x-bladewind::progress-bar percentage="80" shade="dark" color="fuchsia" />
<x-bladewind::progress-bar percentage="90" shade="dark" />
```

## Striped and Animated

Set `striped="true"` for a striped bar, and add `animated="true"` to animate the stripes.

```blade
<x-bladewind::progress-bar percentage="60" shade="dark" color="red" striped="true" />

<x-bladewind::progress-bar
    percentage="50"
    shade="dark"
    color="violet"
    striped="true"
    animated="true" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| percentage | 0 | Value between 0 and 100. |
| color | primary | `primary` \| `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| show_percentage_label | false | Whether the percentage label is displayed. `true` \| `false` |
| show_percentage_label_inline | true | Whether the percentage label is displayed within the bar. `true` \| `false` |
| percentage_label_position | top-left | Placement of the percentage label. `top-left` \| `top-center` \| `top-right` \| `bottom-left` \| `bottom-center` \| `bottom-right` |
| shade | faint | Works with `color` to determine faintness or darkness. `faint` \| `dark` |
| percentage_prefix | blank | Text displayed before the percentage label. |
| percentage_suffix | blank | Text displayed after the percentage label. |
| percentage_label_opacity | 100 | Opacity of the percentage label, using TailwindCSS opacity scale values (without the `opacity-` prefix). `0` \| `5` \| `10` \| `20` \| `25` \| `30` \| `40` \| `50` \| `60` \| `70` \| `75` \| `80` \| `90` \| `95` \| `100` |
| class | bw-progress-bar | Additional CSS classes. |
| striped | false | Whether the bar is striped. `true` \| `false` |
| animated | false | Whether a striped bar is animated. `true` \| `false` |

## Full Example

```blade
<x-bladewind::progress-bar
    percentage="50"
    color="red"
    show_percentage_label="false"
    show_percentage_label_inline="true"
    percentage_label_position="top-left"
    shade="faint"
    percentage_prefix="uploading content: "
    percentage_suffix="completed"
    striped="true"
    animated="true"
    class="m-0" />
```
