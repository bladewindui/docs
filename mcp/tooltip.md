---
title: Tooltip Component
component: x-bladewind::tooltip
url: /component/tooltip
---

# Tooltip

Display a small contextual bubble when a user hovers over an element. The tooltip component is a pure CSS wrapper — no JavaScript is required. Wrap any element with `x-bladewind::tooltip` and pass the message via the `text` attribute.

```blade
<x-bladewind::tooltip text="This is a tooltip">
    <x-bladewind::button>Hover over me</x-bladewind::button>
</x-bladewind::tooltip>
```

Any element can be wrapped — a button, an icon, a link, a table cell, or plain text. The tooltip bubble appears on hover and disappears when the cursor leaves.

```blade
<x-bladewind::tooltip text="View user profile">
    <x-bladewind::icon name="user-circle" class="size-6 text-slate-500 cursor-pointer" />
</x-bladewind::tooltip>
```

## Position

The tooltip bubble can appear above, below, to the left, or to the right of the wrapped element. Set the `position` attribute to control where the bubble appears. The default is `top`.

```blade
<x-bladewind::tooltip text="Appears on top" position="top">...</x-bladewind::tooltip>
<x-bladewind::tooltip text="Appears on the right" position="right">...</x-bladewind::tooltip>
<x-bladewind::tooltip text="Appears at the bottom" position="bottom">...</x-bladewind::tooltip>
<x-bladewind::tooltip text="Appears on the left" position="left">...</x-bladewind::tooltip>
```

## Colour

Tooltips come in two colour themes: `dark` (default) and `light`. The dark theme uses a slate-800 background with white text. The light theme uses a white background with a border, shadow, and slate-600 text — both adapt correctly in dark mode.

```blade
<x-bladewind::tooltip text="I am dark (default)" color="dark">...</x-bladewind::tooltip>
<x-bladewind::tooltip text="I am light" color="light">...</x-bladewind::tooltip>
```

## Size

The bubble text can be rendered at three sizes. The default is `small`. Use `tiny` for minimal labels and `regular` for longer descriptive messages.

```blade
<x-bladewind::tooltip text="tiny tooltip" size="tiny">...</x-bladewind::tooltip>
<x-bladewind::tooltip text="small tooltip (default)" size="small">...</x-bladewind::tooltip>
<x-bladewind::tooltip text="regular-sized tooltip" size="regular">...</x-bladewind::tooltip>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| text | _blank_ | The message to display inside the tooltip bubble. No bubble is rendered when this is empty. |
| position | `top` | Where the bubble appears relative to the wrapped element. `top` \| `bottom` \| `left` \| `right` |
| color | `dark` | Colour theme for the bubble background. `dark` \| `light` |
| size | `small` | Controls the text size and padding inside the bubble. `tiny` \| `small` \| `regular` |
| class | _blank_ | Any additional CSS classes to apply to the tooltip wrapper element. |

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
