---
title: Popover Component
component: x-bladewind::popover
url: /component/popover
---

# Popover

Display a floating content panel that opens on click or hover. Unlike a tooltip, a popover can contain rich markup — links, lists, images, or custom HTML — not just a line of text. The trigger defaults to an information-circle icon; you can swap it for any other icon or for fully custom markup.

## Default Popover

```blade
<x-bladewind::popover>
    <p>This is the popover content. You can put <strong>any markup</strong> here.</p>
</x-bladewind::popover>
```

## Trigger Icon

The default trigger icon is `information-circle` (Heroicons). Pass any Heroicons name suffixed with `-icon` to the `trigger` attribute to swap it out.

```blade
<x-bladewind::popover trigger="question-mark-circle-icon">
    <p>This is triggered by a question-mark icon.</p>
</x-bladewind::popover>

<x-bladewind::popover trigger="bell-icon">
    <p>This is triggered by a bell icon.</p>
</x-bladewind::popover>

<x-bladewind::popover trigger="ellipsis-vertical-icon">
    <p>This is triggered by a vertical ellipsis icon.</p>
</x-bladewind::popover>
```

## Custom Trigger Markup

When an icon is not enough, pass any HTML as the trigger via `<x-slot:trigger>`. This lets you use a button, a badge, an avatar, or any other element as the popover trigger.

```blade
<x-bladewind::popover>
    <x-slot:trigger>
        <x-bladewind::button size="small" type="secondary">Options</x-bladewind::button>
    </x-slot:trigger>
    <ul class="space-y-2 text-sm">
        <li><a href="#">Edit record</a></li>
        <li><a href="#">Duplicate</a></li>
        <li><a href="#">Delete</a></li>
    </ul>
</x-bladewind::popover>
```

## Title

An optional heading can be shown above the popover content by setting the `title` attribute. The title is separated from the content by a subtle border.

```blade
<x-bladewind::popover title="Account Actions">
    <ul class="space-y-2 text-sm">
        <li><a href="#">Edit profile</a></li>
        <li><a href="#">Change password</a></li>
        <li><a href="#">Sign out</a></li>
    </ul>
</x-bladewind::popover>
```

## Position

The popover panel can appear above, below, to the left, or to the right of its trigger. The default is `bottom`.

```blade
<x-bladewind::popover position="top">...</x-bladewind::popover>
<x-bladewind::popover position="bottom">...</x-bladewind::popover>
<x-bladewind::popover position="left">...</x-bladewind::popover>
<x-bladewind::popover position="right">...</x-bladewind::popover>
```

## Trigger Event

By default the popover opens on `click`. Set `trigger_on="mouseover"` to open the panel when the user hovers over the trigger element instead.

```blade
<x-bladewind::popover trigger_on="mouseover">
    <p>This popover opened on mouseover.</p>
</x-bladewind::popover>
```

## Width

The popover panel defaults to `280` pixels wide. Adjust the `width` attribute to suit your content.

```blade
<x-bladewind::popover width="360" title="Wider popover">
    <p>This popover is 360px wide, giving more room for longer content.</p>
</x-bladewind::popover>
```

## JavaScript API

The popover is driven by the `BladewindPopover` class. Each instance exposes `show()`, `hide()`, and `toggle()` methods.

```js
// Show a named popover programmatically
new BladewindPopover('my-popover').show();
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | auto-generated | Unique name used to identify the popover instance. A random name is generated if none is provided. |
| trigger | `information-circle-icon` | Icon to use as the trigger. Must be a Heroicons name suffixed with `-icon` (e.g. `bell-icon`). Ignored when `<x-slot:trigger>` is provided. |
| trigger_css | blank | Additional CSS classes to apply to the trigger wrapper element. |
| trigger_on | `click` | The DOM event that opens the popover. `click` \| `mouseover` |
| position | `bottom` | Where the panel appears relative to the trigger. `top` \| `bottom` \| `left` \| `right` |
| title | blank | Optional heading displayed above the popover content, separated by a border. |
| width | `280` | Width of the popover panel in pixels. Must be a numeric value. |
| class | blank | Any additional CSS classes to apply to the popover panel container. |
| nonce | null | CSP nonce value applied to the inline script tags. You can set a global default in `config/bladewind.php` under the `script.nonce` key. |
| modular | `false` | Appends `type="module"` to the inline script tags. `true` \| `false` |

## Full Example

```blade
<x-bladewind::popover
    name="user-menu"
    trigger="ellipsis-vertical-icon"
    trigger_on="click"
    position="bottom"
    title="User Actions"
    width="300"
    class="rounded-lg">
    <ul class="space-y-2 text-sm">
        <li><a href="#">Edit</a></li>
        <li><a href="#">Delete</a></li>
    </ul>
</x-bladewind::popover>
```
