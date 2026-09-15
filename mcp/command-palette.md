---
title: Command Palette Component
component: x-bladewind::command-palette
url: /component/command-palette
---

# Command Palette

Command Palette provides a fast, searchable way to find and run actions using the keyboard. Open it with a configurable shortcut or a helper method, then type to filter available actions. Actions can be organized into groups, and the palette supports full keyboard navigation, asynchronous results, and dark mode.

## Basic Usage

```blade
<x-bladewind::button onclick="openCommandPalette('app-commands')">
    Search commands
</x-bladewind::button>

<x-bladewind::command-palette name="app-commands"
    label="Command palette" placeholder="Search for a command or page…">
    <x-bladewind::command-palette.group name="navigate" label="Navigate">
        <x-bladewind::command-palette.item name="dashboard"
            label="Dashboard"
            description="Overview of your workspace"
            href="#dashboard"
            icon="home" />
        <x-bladewind::command-palette.item name="orders"
            label="Orders"
            description="Review recent orders"
            href="#orders"
            icon="shopping-bag" />
        <x-bladewind::command-palette.item name="customers"
            label="Customers"
            href="#customers" icon="users" />
    </x-bladewind::command-palette.group>
</x-bladewind::command-palette>
```

## Opening the Palette

Command Palette renders hidden and is not tied to a trigger button by default. Open it with its keyboard shortcut (`Ctrl`+`K`, or `⌘`+`K` on macOS), or call `openCommandPalette(name)` from any element. The shortcut works even while focus sits inside another field on the page, matching the convention shared by editors, chat apps, and issue trackers.

## Searching and Grouped Results

As you type, Command Palette filters items by their label, description, and optional `keywords` attribute. Matching is case-insensitive and works on partial text. Groups are automatically hidden when none of their items match. A `keywords` value can match even when the words do not appear in the visible label.

For server-side search, Command Palette emits `bladewind:command-palette:search` with the current query on every keystroke; listen for this event to fetch and display matching results asynchronously. While results are loading, set `loading="true"` or call `setCommandPaletteLoading(name, true)`. The built-in empty state stays hidden until loading completes.

## Keyboard Behavior

Focus stays in the search field the entire time the palette is open. Navigation moves a highlighted state between items instead of moving real focus, so screen readers track the current option through `aria-activedescendant` on the search field.

| Key | Behavior |
|---|---|
| Up Arrow or Down Arrow | Move the highlight to the previous or next visible, enabled item. |
| Home or End | Jump the highlight to the first or last visible item. |
| Enter | Activate the highlighted item. |
| Escape | Close the palette and restore focus to whatever opened it. |
| Tab | Cycles between the search field and the close button while the palette is open. |

## Links, Actions, and Disabled Items

An item with `href` renders as a link and navigates normally. An item without `href` renders as a button, for actions handled entirely in JavaScript through the `select` event. Disabled items stay visible but cannot be highlighted or activated.

## Dark Mode

Command Palette follows the page dark class and keeps the backdrop, panel, highlighted item, description, and shortcut key contrast readable.

## Events

Before events are cancelable; call `preventDefault()` to stop the related change. All event names start with `bladewind:command-palette:`. Item events include the item name and, for links, the destination.

| Event suffix | When it runs |
|---|---|
| `before-open`, `before-close` | Before the palette opens or closes. |
| `opened`, `closed` | After the palette finishes opening or closing. |
| `before-select` | Before an item is activated. Preventing this stops navigation and the close-on-select behavior. |
| `select` | After an item is activated. |
| `search` | On every keystroke in the search field, with the current query. |

## JavaScript API

Helpers return `true` on success or when the requested state already applies, and `false` for a missing target or a canceled event.

```js
openCommandPalette('app-commands');
closeCommandPalette('app-commands');
toggleCommandPalette('app-commands');
resetCommandPalette('app-commands');
setCommandPaletteLoading('app-commands', true);
```

## Using Command Palette Inside Livewire

Whether the palette is open, and the current search filter, live in the palette's own DOM rather than in Livewire's component state. If a Livewire component re-renders this markup for a reason unrelated to the palette, it resets to closed. If the palette lives inside a component that can re-render for other reasons, wrap it in `wire:ignore`. The bindings that drive the palette are delegated and safe to re-run, so a re-render will not leave behind duplicate listeners.

## Attributes

### Command Palette Attributes

| Attribute | Default | Description |
|---|---|---|
| name | Generated | Unique public helper and DOM scope. |
| label | Command palette | Accessible dialog and listbox name. |
| placeholder | Search for a command… | Search field placeholder text. |
| search-label | Same as label | Accessible name for the search field. |
| shortcut | mod+k | Global open/close shortcut. `mod` resolves to Ctrl or Cmd. Empty disables the shortcut. |
| size | medium | `tiny` \| `small` \| `medium` \| `big` \| `large` \| `xl` \| `omg` |
| open | false | Initial open state. |
| loading | false | Shows the loading row and suppresses the empty state. |
| empty-text | No results found. | Text shown when nothing matches. |
| loading-text | Loading… | Text shown while loading is true. |
| close-on-select | true | Closes the palette after an item is activated. |
| backdrop-can-close | true | Allows a backdrop click to close the palette. |
| escape-can-close | true | Allows Escape to close the palette. |
| close-label | Close command palette | Accessible label for the close button. |

### Command Palette Group Attributes

| Attribute | Default | Description |
|---|---|---|
| name | Required | Name scoped to its Command Palette. |
| label | Required | Visible and accessible section heading. |

### Command Palette Item Attributes

| Attribute | Default | Description |
|---|---|---|
| name | Required | Event identifier for the item. |
| label | empty | Visible and accessible label, and part of the search text. |
| description | null | Secondary text, also matched while searching. |
| icon | null | Heroicon name. |
| icon-type | outline | Icon type. |
| icon-dir | empty | Custom icon directory. |
| shortcut | null | Display-only key combination, e.g. `Ctrl+N`. Rendered as individual `<kbd>` keys. |
| keywords | empty | Extra terms matched while searching but not displayed. |
| href | null | Link destination. Omit for a button action handled through the `select` event. |
| disabled | false | Removes the item from highlighting and activation. |
| external | false | Adds external link semantics and indicator. |
| target | null | Link target. |

## Slots

| Slot | Description |
|---|---|
| command-palette default | Command palette groups and items. |
| command-palette footer | Content appended after the built-in keyboard hints in the footer. |
| group default | Items belonging to the group. |
| item default | Custom item copy while Command Palette keeps the option and search semantics. |

## Full Example

```blade
<x-bladewind::command-palette
    name="app-commands"
    label="Command palette"
    placeholder="Search for a command or page…"
    search-label="Command palette"
    shortcut="mod+k"
    size="medium"
    open="false"
    loading="false"
    empty-text="No results found."
    loading-text="Loading…"
    close-on-select="true"
    backdrop-can-close="true"
    escape-can-close="true"
    close-label="Close command palette"
    class="app-command-palette"
    data-region="app">
    <x-bladewind::command-palette.group name="actions" label="Actions">
        <x-bladewind::command-palette.item name="new-order" label="Create order" description="Start a manual order" icon="plus-circle" icon-type="outline" icon-dir="" shortcut="Ctrl+N" keywords="add new" href="/orders/new" disabled="false" external="false" target="_self" class="new-order-item" data-area="orders" />
    </x-bladewind::command-palette.group>
    <x-slot:footer>Signed in as Ama Mensah</x-slot:footer>
</x-bladewind::command-palette>
```
