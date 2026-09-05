---
title: Context Menu Component
component: x-bladewind::context-menu
url: /component/context-menu
---

# Context Menu

`x-bladewind::context-menu` gives any region a right-click action menu — a table row, a card, a canvas element,
anything. It follows the same visual language as Dropmenu, but opens at the pointer instead of anchored to a trigger,
and adds nested submenus, disabled items, and separators. Placement is always viewport-aware: the menu (and any
submenu) flips away from whichever edge it would otherwise overflow.

## Basic Usage

```blade
<x-bladewind::context-menu name="basicMenu">
    <x-slot:region>
        <div>Right-click anywhere in this box</div>
    </x-slot:region>

    <x-bladewind::context-menu.item icon="pencil-square">Edit</x-bladewind::context-menu.item>
    <x-bladewind::context-menu.item icon="document-duplicate">Duplicate</x-bladewind::context-menu.item>
    <x-bladewind::context-menu.item divider="true" />
    <x-bladewind::context-menu.item icon="trash" tone="danger">Delete</x-bladewind::context-menu.item>
</x-bladewind::context-menu>
```

The `region` slot is the area that responds to a right-click (or the keyboard context-menu key — both dispatch the
same browser `contextmenu` event, so no separate keyboard wiring is needed to trigger it). Every other child is a
menu item, in the order they should appear.

## Disabled items

Set `disabled="true"` on an item to grey it out and remove it from pointer and keyboard interaction entirely — it is
skipped by arrow-key navigation and cannot be clicked or activated.

```blade
<x-bladewind::context-menu.item icon="lock-closed" disabled="true">Restricted action</x-bladewind::context-menu.item>
```

## Tone

`tone="danger"` tints an item's label and icon red, for destructive actions. The default is `normal`.

## Nested submenus

Give an item a `submenu` slot containing further `x-bladewind::context-menu.item` elements to turn it into a submenu
trigger. A submenu opens on hover, click, or the right arrow key, and can itself contain another submenu — nesting is
unlimited. The left arrow key or Escape closes the deepest open submenu and returns focus to its parent item.

```blade
<x-bladewind::context-menu.item icon="folder-plus">
    New
    <x-slot:submenu>
        <x-bladewind::context-menu.item icon="document">File</x-bladewind::context-menu.item>
        <x-bladewind::context-menu.item icon="folder">Folder</x-bladewind::context-menu.item>
    </x-slot:submenu>
</x-bladewind::context-menu.item>
```

## Keyboard support

| Key | Action |
|---|---|
| Down / Up | Move focus to the next or previous enabled item. |
| Right | Open the focused item's submenu, if it has one. |
| Left | Close the current submenu and refocus its parent item. |
| Enter / Space | Activate the focused item, or open its submenu. |
| Home / End | Jump to the first or last enabled item. |
| Escape | Close the current submenu, or the whole menu if none is open. |

## Attributes

### Context Menu

| Attribute | Default | Description |
|---|---|---|
| name | _(auto-generated)_ | Uniquely identifies this instance in the DOM and its JavaScript. |
| disableNative | true | false lets the browser's own context menu show and disables this component entirely. |
| padded | true | Padding inside the menu list. |
| class | _(blank)_ | Additional CSS classes for the menu list. |

### Context Menu Item

| Attribute | Default | Description |
|---|---|---|
| icon | _(blank)_ | Any Heroicons name. |
| disabled | false | Greys the item out and removes it from pointer and keyboard interaction. |
| tone | normal | `normal` \| `danger` |
| divider | false | Renders a separator line instead of an item; ignores every other prop. |
| submenu | _(none)_ | A named slot of further items, turning this item into a submenu trigger. |
