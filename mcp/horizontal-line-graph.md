---
title: Horizontal Line Graph Component
component: x-bladewind::horizontal-line-graph
url: /component/horizontal-line-graph
---

# Horizontal Line Graph

Structurally similar to the Progress Bar component (it's rendered using it). The default colour is blue.

## Basic Usage

```blade
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="55.8" />
```

## Practical Example

```blade
<div class="grid grid-cols-2 gap-6">
    <x-bladewind::card title="Mobile Money Penetration">
        <x-bladewind::horizontal-line-graph label="MTN: " percentage="55" color="yellow" />
        <x-bladewind::horizontal-line-graph label="Vodafone: " percentage="30" color="red" class="py-3" />
        <x-bladewind::horizontal-line-graph label="AirtelTigo: " percentage="15" color="blue" />
    </x-bladewind::card>
    <x-bladewind::card title="Farmer age ratio">
        <x-bladewind::horizontal-line-graph label="Above 60: " percentage="33" color="cyan" />
        <x-bladewind::horizontal-line-graph label="Between 40 - 60: " percentage="43" color="purple" class="py-3" />
        <x-bladewind::horizontal-line-graph label="Under 40: " percentage="24" color="gray" />
    </x-bladewind::card>
</div>
```

## Colours

The graph can be displayed in nine different colours via the `color` attribute. There are two shades, `faint` (default) and `dark`, controlled by the `shade` attribute.

```blade
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="10" color="red" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="20" color="yellow" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="30" color="green" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="40" color="pink" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="50" color="cyan" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="60" color="gray" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="70" color="purple" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="80" color="orange" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="80" color="violet" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="80" color="indigo" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="80" color="fuchsia" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="90" />
```

Set `shade="dark"` for the darker variant of each colour:

```blade
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="10" shade="dark" color="red" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="90" shade="dark" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| percentage | 0 | Any value between 0 and 100. |
| color | primary | `primary` \| `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| shade | faint | Works with `color` to control how faint or dark the graph colours are. `faint` \| `dark` |
| label | *blank* | Label to display above the graph. |
| percentage_label_opacity | 50 | Opacity of the percentage label, values from the TailwindCSS opacity scale without the `opacity-` prefix. `0` \| `5` \| `10` \| `20` \| `25` \| `30` \| `40` \| `50` \| `60` \| `70` \| `75` \| `80` \| `90` \| `95` \| `100` |
| class | bw-horizontal-line-graph | Any additional CSS. |

## Full Example

```blade
<x-bladewind::horizontal-line-graph
    label="Women Farmers: "
    percentage="50"
    color="red"
    shade="faint"
    percentage_label_opacity="75"
    class="py-4" />
```
