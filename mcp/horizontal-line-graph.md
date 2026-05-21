---
title: Horizontal Line Graph Component
component: x-bladewind::horizontal-line-graph
url: /component/horizontal-line-graph
---

# Horizontal Line Graph

Displays a labelled horizontal bar filled to a given percentage. Structurally similar to — and rendered using — the [Progress Bar](/component/progress-bar) component. The default colour is blue.

## Basic Usage

```blade
<x-bladewind::horizontal-line-graph
    label="Women Farmers: "
    percentage="55.8" />
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

Set `color` to any supported colour. Two shades are available via `shade`: `faint` (default) and `dark`.

```blade
{{-- faint shades --}}
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="40" color="red" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="50" color="yellow" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="60" color="green" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="70" color="pink" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="80" color="cyan" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="30" color="gray" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="45" color="purple" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="55" color="orange" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="65" color="violet" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="75" color="indigo" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="85" color="fuchsia" />

{{-- dark shades --}}
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="40" color="red" shade="dark" />
<x-bladewind::horizontal-line-graph label="Women Farmers: " percentage="50" color="cyan" shade="dark" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| percentage | 0 | Fill percentage: any value between 0 and 100 |
| label | _(blank)_ | Label displayed above the bar |
| color | primary | Bar colour: `primary` `red` `yellow` `green` `blue` `pink` `cyan` `purple` `gray` `orange` `violet` `indigo` `fuchsia` |
| shade | faint | Colour shade: `faint` \| `dark` |
| percentage_label_opacity | 50 | Opacity of the percentage label (TailwindCSS opacity value without the `opacity-` prefix) |
| class | bw-horizontal-line-graph | Additional CSS classes |

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
