---
title: Popover Component
component: x-bladewind::popover
url: /component/popover
---

# Popover

Displays a floating content panel that opens on click or hover. Unlike a [tooltip](/component/tooltip), a popover can contain rich markup — links, lists, images, or custom HTML — not just a line of text. The trigger defaults to an information-circle icon, but it can be swapped for any other icon or fully custom markup.

## Basic Usage

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

When an icon isn't enough, pass any HTML as the trigger via `<x-slot:trigger>`. This allows a button, badge, avatar, or any other element to serve as the popover trigger.

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

Set `title` to show an optional heading above the popover content, separated from it by a subtle border.

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

The panel can appear above, below, to the left, or to the right of its trigger. Default is `bottom`.

```blade
<x-bladewind::popover position="top" title="Top">...</x-bladewind::popover>
<x-bladewind::popover position="bottom" title="Bottom">...</x-bladewind::popover>
<x-bladewind::popover position="left" title="Left">...</x-bladewind::popover>
<x-bladewind::popover position="right" title="Right">...</x-bladewind::popover>
```

## Trigger Event

The popover opens on `click` by default. Set `trigger_on="mouseover"` to open it on hover instead.

```blade
<x-bladewind::popover triggerOn="mouseover" title="Hover triggered">
    <p>This popover opened on mouseover.</p>
</x-bladewind::popover>
```

## Width

The panel defaults to `280` pixels wide. Adjust `width` to suit content, e.g. wider panels for rich content like user cards.

```blade
<x-bladewind::popover width="360" title="Wider popover">
    <p>This popover is 360px wide, giving more room for longer content.</p>
</x-bladewind::popover>
```

## Popovers In Scrolling Containers

The panel is positioned against its trigger rather than laid out inside it, so it isn't cut off by whatever the trigger sits in. This matters most for tables: a wide table needing a horizontally scrolling wrapper used to clip vertically as well, swallowing any popover opened from inside it. No extra configuration is required — the panel keeps the requested `position`, flips vertically when the viewport can't hold it on the requested side, and follows its trigger when an inner scrolling container (not just the page) is scrolled.

The panel is repositioned, not moved elsewhere in the page. It stays inside the popover component, so CSS selecting it through an ancestor still matches.

## JavaScript API

Each popover creates a `BladewindPopover` instance assigned to a variable named after the component's `name`, callable directly from your own scripts or inline handlers. If setting `name` yourself, use only letters, numbers, and underscores since hyphens are invalid in a JavaScript identifier; the auto-generated default already follows this rule.

| Method | Description |
|---|---|
| `name.show()` | Open the popover and position it against its trigger. |
| `name.hide()` | Close the popover. |
| `name.toggle()` | Open or close the popover based on its current state. |

```js
user_menu.show();
user_menu.hide();
user_menu.toggle();
```

## Using Popover Inside Livewire

The popover tracks whether it's open or closed outside of the DOM that Livewire manages, so a Livewire re-render unrelated to the popover resets it to closed. If this happens, wrap the trigger and the popover in `wire:ignore` so Livewire leaves that part of the page alone. The component also guards against a Livewire re-render creating a second copy of itself, so re-rendering won't leave duplicate click listeners behind.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | auto-generated | Unique name identifying the popover instance. A random name is generated if none is provided. |
| trigger | information-circle-icon | Icon to use as the trigger. Must be a Heroicons name suffixed with `-icon` (e.g. `bell-icon`). Ignored when `<x-slot:trigger>` is provided. |
| trigger_css | blank | Additional CSS classes for the trigger wrapper element. |
| trigger_on | click | DOM event that opens the popover. `click` \| `mouseover` |
| position | bottom | Where the panel appears relative to the trigger. `top` \| `bottom` \| `left` \| `right` |
| title | blank | Optional heading displayed above the popover content, separated by a border. |
| width | 280 | Width of the popover panel in pixels. Numeric value. |
| class | blank | Additional CSS classes for the popover panel container. |
| nonce | null | CSP nonce applied to inline script tags. Can be set globally in `config/bladewind.php` under `script.nonce`. |
| modular | false | Appends `type="module"` to the inline script tags. `true` \| `false` |

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
