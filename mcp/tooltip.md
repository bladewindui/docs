---
title: Tooltip Component
component: x-bladewind::tooltip
url: /component/tooltip
---

# Tooltip

Displays a small contextual bubble when a user hovers over an element. The tooltip is a pure CSS wrapper — no JavaScript is required for basic rendering. Wrap any element with `<x-bladewind::tooltip>` and pass the message via the `text` attribute.

## Basic Usage

```blade
<x-bladewind::tooltip text="This is a tooltip">
    <x-bladewind::button>Hover over me</x-bladewind::button>
</x-bladewind::tooltip>
```

Any element can be wrapped — a button, an icon, a link, a table cell, or plain text. The bubble appears on hover and disappears when the cursor leaves.

```blade
<x-bladewind::tooltip text="View user profile">
    <x-bladewind::icon name="user-circle" class="size-6 text-slate-500 cursor-pointer" />
</x-bladewind::tooltip>
```

## Position

The bubble can appear above, below, to the left, or to the right of the wrapped element via the `position` attribute. Default is `top`.

```blade
<x-bladewind::tooltip text="Appears on top" position="top">...</x-bladewind::tooltip>
<x-bladewind::tooltip text="Appears on the right" position="right">...</x-bladewind::tooltip>
<x-bladewind::tooltip text="Appears at the bottom" position="bottom">...</x-bladewind::tooltip>
<x-bladewind::tooltip text="Appears on the left" position="left">...</x-bladewind::tooltip>
```

## Colour

Tooltips come in two colour themes: `dark` (default) and `light`. Dark uses a slate-800 background with white text. Light uses a white background with a border, shadow, and slate-600 text — both adapt correctly in dark mode.

```blade
<x-bladewind::tooltip text="I am dark (default)" color="dark">...</x-bladewind::tooltip>
<x-bladewind::tooltip text="I am light" color="light">...</x-bladewind::tooltip>
```

## Tooltips In Scrolling Containers

A tooltip is drawn as its own element attached to the page body and positioned against its trigger, so it's never cut off by whatever the trigger sits inside. This matters most in tables: a wide table needs a horizontally scrolling wrapper, and such a wrapper clips vertically too, which used to swallow tooltips on a table's action icons.

Nothing extra is required of you — this applies to the Tooltip component, to the `tip` on a table's action icons, and to any element you've given a `data-tooltip` attribute by hand.

Tooltips need `tooltip.js`, which the components load for you. If you're using `data-tooltip` on your own markup with no BladewindUI tooltip or table on the page, add `@bladewindScripts('tooltip')` to your layout. Without the script, the tooltip still renders from CSS alone — it's just clipped by scrolling ancestors, as it was before.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| text | *blank* | Message displayed inside the tooltip bubble. No bubble renders when this is empty. |
| position | top | Where the bubble appears relative to the wrapped element. `top` \| `bottom` \| `left` \| `right` |
| color | dark | Colour theme for the bubble background. `dark` \| `light` |
| size | small | Text size and padding inside the bubble. `tiny` \| `small` \| `regular` |
| class | *blank* | Additional CSS classes for the tooltip wrapper element. |

## Full Example

```blade
<x-bladewind::tooltip
    text="Delete this record"
    position="right"
    color="light"
    size="regular"
    class="ml-2">
    <x-bladewind::icon name="trash" class="size-5 text-red-500 cursor-pointer" />
</x-bladewind::tooltip>
```
