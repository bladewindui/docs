---
title: Progress Bar Component
component: x-bladewind::progress-bar
url: /component/progress-bar
---

# Progress Bar

Display progress as a horizontal bar filled to a given percentage. Includes a subtle fill animation. The default colour is blue (primary).

## Basic Usage

```blade
<x-bladewind::progress-bar percentage="36" />
```

## Percentage Label

```blade
{{-- label inside the bar --}}
<x-bladewind::progress-bar percentage="36" show_percentage_label="true" />

{{-- label outside the bar (default position: top left) --}}
<x-bladewind::progress-bar
    percentage="36"
    show_percentage_label="true"
    show_percentage_label_inline="false" />

{{-- label outside, positioned top center --}}
<x-bladewind::progress-bar
    percentage="53"
    show_percentage_label="true"
    show_percentage_label_inline="false"
    percentage_label_position="top center" />

{{-- with a suffix --}}
<x-bladewind::progress-bar
    percentage="75"
    show_percentage_label="true"
    show_percentage_label_inline="false"
    percentage_suffix="complete" />
```

Available `percentage_label_position` values: `top-left` `top-center` `top-right` `bottom-left` `bottom-center` `bottom-right`

## Colours

Set `color` to any supported colour. Two shades are available via `shade`: `faint` (default) and `dark`.

```blade
{{-- faint shades --}}
<x-bladewind::progress-bar percentage="10" color="red" />
<x-bladewind::progress-bar percentage="20" color="yellow" />
<x-bladewind::progress-bar percentage="30" color="green" />
<x-bladewind::progress-bar percentage="40" color="pink" />
<x-bladewind::progress-bar percentage="50" color="cyan" />
<x-bladewind::progress-bar percentage="60" color="gray" />
<x-bladewind::progress-bar percentage="70" color="purple" />
<x-bladewind::progress-bar percentage="80" color="orange" />
<x-bladewind::progress-bar percentage="80" color="violet" />
<x-bladewind::progress-bar percentage="80" color="indigo" />
<x-bladewind::progress-bar percentage="80" color="fuchsia" />

{{-- dark shades --}}
<x-bladewind::progress-bar percentage="50" color="red" shade="dark" />
<x-bladewind::progress-bar percentage="20" color="yellow" shade="dark" />
```

## Striped and Animated

```blade
<x-bladewind::progress-bar percentage="60" color="red" shade="dark" striped="true" />

<x-bladewind::progress-bar
    percentage="50"
    color="violet"
    shade="dark"
    striped="true"
    animated="true" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| percentage | 0 | Fill percentage: 0–100 |
| color | primary | Bar colour: `primary` `red` `yellow` `green` `blue` `pink` `cyan` `purple` `gray` `orange` `violet` `indigo` `fuchsia` |
| shade | faint | Colour shade: `faint` \| `dark` |
| show_percentage_label | false | Show the percentage label. `true` \| `false` |
| show_percentage_label_inline | true | Show label inside the bar. `true` \| `false` |
| percentage_label_position | top-left | Label placement when outside the bar. `top-left` \| `top-center` \| `top-right` \| `bottom-left` \| `bottom-center` \| `bottom-right` |
| percentage_prefix | _(blank)_ | Text before the percentage label |
| percentage_suffix | _(blank)_ | Text after the percentage label |
| percentage_label_opacity | 100 | Opacity of the percentage label (TailwindCSS opacity value without the `opacity-` prefix) |
| striped | false | Striped bar. `true` \| `false` |
| animated | false | Animate the stripes (requires `striped="true"`). `true` \| `false` |
| class | bw-progress-bar | Additional CSS classes |

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
