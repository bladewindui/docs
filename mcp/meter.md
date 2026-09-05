---
title: Meter Component
component: x-bladewind::meter
url: /component/meter
---

# Meter

`x-bladewind::meter` visualises a bounded measurement — disk usage, a score, a signal strength — as opposed to
Progress Bar's task completion. Give it `low` and `high` boundaries and it colours itself semantically: green for
the good zone, red for the bad one, yellow for the zone in between. A real, visually hidden `<meter>` element
carries the actual accessible semantics; the coloured bar is purely decorative.

## Basic Usage

```blade
<x-bladewind::meter value="72" max="100" low="30" high="70" label="Battery" />
```

With no `optimum`, higher values are assumed to be better: the zone above `high` is green, below `low` is red, and
the band between is yellow.

## When lower is better

Some measurements go the other way — an error rate, latency, CPU load. Set `optimum` to a value inside the zone that
should read as "good"; the meter works out which end is bad from there.

```blade
<x-bladewind::meter value="8" max="100" low="20" high="60" optimum="0" label="Error rate" />
```

## Without zones

Omit `low`/`high` for a plain bounded bar with no semantic colouring — a single neutral colour, still a real
measurement rather than a completion percentage.

```blade
<x-bladewind::meter value="640" max="1000" label="Storage used (MB)" />
```

## Sizes

Set `size` to `tiny`, `small`, `medium` (default), or `large`.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| value | 0 | The current measurement. |
| min / max | 0 / 100 | The measurement's bounds. |
| low / high | _(none)_ | Zone boundaries. Both must be set to enable semantic colouring. |
| optimum | _(none)_ | A value inside the zone that should read as "good". Defaults to the high zone. |
| label | _(blank)_ | Label shown above the bar. |
| showValue | true | Shows "value / max" above the bar. |
| size | medium | `tiny` \| `small` \| `medium` \| `large` |
| class | _(blank)_ | Additional CSS classes for the wrapper element. |
