---
title: Dropmenu Component
component: x-bladewind::dropmenu
url: /component/dropmenu
---

# Dropmenu

Displays menu items in a dropdown for quick actions. Unlike the Select component, the Dropmenu does not pass values around as a form element.

## Basic Usage

```blade
<x-bladewind::dropmenu>
    <x-bladewind::dropmenu.item>Invite to Project</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Assign Task</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Send Message</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

By default the Dropmenu is triggered by the horizontal ellipsis icon from Heroicons. To trigger it with any other Heroicon, append `-icon` to the icon's name and set it as `trigger`.

```blade
<x-bladewind::dropmenu trigger="musical-note-icon">
    <x-bladewind::dropmenu.item>Add to playlist</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Play again</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>

<x-bladewind::dropmenu trigger="arrow-down-circle-icon">
    <x-bladewind::dropmenu.item>Download file</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Add to library</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>

<x-bladewind::dropmenu trigger="cog-6-tooth-icon">
    <x-bladewind::dropmenu.item>Company settings</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>User settings</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

## Trigger Properties

### trigger_css

Apply TailwindCSS classes to the trigger element, most useful when the trigger is an icon.

```blade
<x-bladewind::dropmenu trigger="musical-note-icon" trigger_css="bg-pink-600 text-white p-2 rounded-full !h-10 !w-10">
    <x-bladewind::dropmenu.item>Add to playlist</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Play again</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

### trigger_on

By default the menu opens on click. Set `trigger_on="mouseover"` to open on hover instead. Available values: `click`, `mouseover`.

```blade
<x-bladewind::dropmenu trigger="musical-note-icon" trigger_css="bg-green-600 text-white p-2 rounded-full !h-10 !w-10" trigger_on="mouseover">
    <x-bladewind::dropmenu.item>Add to playlist</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Play again</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

### Non-Icon Triggers

Define the trigger as a slot to use any HTML element instead of an icon.

```blade
<x-bladewind::dropmenu>
    <x-slot:trigger>
        <x-bladewind::button type="secondary" size="tiny">Options</x-bladewind::button>
    </x-slot:trigger>
    <x-bladewind::dropmenu.item>Add to playlist</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Play again</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>

<x-bladewind::dropmenu>
    <x-slot:trigger>
        <div class="flex space-x-2 items-center shadow px-4 rounded-md">
            <div class="grow">
                <x-bladewind::avatar image="/assets/images/francis.png" />
            </div>
            <div class="grow">
                <div><strong>John C. Doe</strong></div>
                <div class="text-sm">Tech, IT Support</div>
            </div>
            <div>
                <x-bladewind::icon name="chevron-down" class="!h-4 !w-4" />
            </div>
        </div>
    </x-slot:trigger>
    <x-bladewind::dropmenu.item>Deactivate my account</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Delete Profile</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

## Dropmenu Item Actions

Each dropmenu item can contain any HTML, giving you full control over its action. Use the `onclick` attribute for convenience.

```blade
<x-bladewind::dropmenu trigger="light-bulb-icon" trigger_css="bg-yellow-400 text-yellow-800 p-2 rounded-full !h-10 !w-10">
    <x-bladewind::dropmenu.item>
        <a href="/library" target="_blank">Go to Library</a>
    </x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item onclick="showModal('dropmenu-demo')">
        Show a Modal
    </x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

## Headers, Icons and Dividers

### Headers

Set `header="true"` on a `dropmenu.item` to render it as a header — no hover effect, default pointer cursor, and a divider separating it from the next item. Multiple headers are allowed.

```blade
<x-bladewind::dropmenu.item header="true">
    // define heading here
</x-bladewind::dropmenu.item>
```

### Icons

Set `icon` on a `dropmenu.item` to prefix it with a Heroicon (via the Icon component), without the `-icon` suffix needed by the trigger.

```blade
<x-bladewind::dropmenu.item icon="square-pencil">
    Edit Profile
</x-bladewind::dropmenu.item>
```

Icons are positioned on the left by default. Set `icon_right="true"` on the Dropmenu component to shift all item icons to the right, or on individual items to shift just those.

```blade
<x-bladewind::dropmenu icon_right="true">
    <x-bladewind::dropmenu.item>...</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

### Dividers

Set `divider="true"` on an item to render a non-clickable divider line (any text content is ignored).

```blade
<x-bladewind::dropmenu.item divider="true" />
```

Set `divided="true"` on the Dropmenu component itself to separate every item with a thin gray line (by default, items are only distinguishable on mouseover).

```blade
<x-bladewind::dropmenu divided="true">
    ...
</x-bladewind::dropmenu>
```

### Full Example: Headers, Icons and Dividers

```blade
<x-bladewind::dropmenu>
    <x-slot:trigger>
        <div class="flex space-x-2 items-center rounded-md">
            <div class="grow">
                <x-bladewind::avatar image="/assets/images/issah.jpg" />
            </div>
            <div>
                <x-bladewind::icon name="chevron-down" class="!h-4 !w-4" />
            </div>
        </div>
    </x-slot:trigger>

    <x-bladewind::dropmenu.item header="true">
        <div class="grow">
            <div><strong>Jane A. Doe</strong></div>
            <div class="text-sm">@jane-the-coder</div>
            <div class="text-sm">jane@bladewindui.com</div>
        </div>
    </x-bladewind::dropmenu.item>

    <x-bladewind::dropmenu.item icon="pencil-square">
        Edit Profile
    </x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item icon="trash" icon_css="!text-red-300">
        <span class="text-red-500">Delete Profile</span>
    </x-bladewind::dropmenu.item>

    <x-bladewind::dropmenu.item divider />

    <x-bladewind::dropmenu.item icon="computer-desktop">Your Repositories</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item icon="briefcase">Your Projects</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item icon="building-office">Your Organizations</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item icon="star">Your Stars</x-bladewind::dropmenu.item>

    <x-bladewind::dropmenu.item divider />

    <x-bladewind::dropmenu.item hover="false">
        <x-bladewind::button color="indigo" radius="small" size="small" class="w-full">Sign Out</x-bladewind::button>
    </x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

## Menu Position

Set `position` to `left` or `right` (default `right`) to control where menu items appear relative to the trigger.

```blade
<x-bladewind::dropmenu position="left">
    ...
</x-bladewind::dropmenu>
```

## Scrollable Menu Items

Set `scrollable="true"` to cap the menu items container at a default height of `200px` and scroll the rest. Override the height with the `height` attribute (a positive integer, no "px").

```blade
<x-bladewind::dropmenu scrollable>
    ...
</x-bladewind::dropmenu>
```

If you have multiple Dropmenus on one page and only the first shows, set `modular="true"` on the first Dropmenu component on the page.

## JavaScript API

Each dropmenu creates a `BladewindDropmenu` instance assigned to a variable named after its `name` attribute, callable from your own scripts or inline handlers. If you set `name` yourself, use only letters, numbers, and underscores (hyphens are invalid in JS identifiers) — the auto-generated default already follows this rule.

| Method | Description |
|---|---|
| `name.show()` | Open the menu and position it against its trigger. |
| `name.hide()` | Close the menu. |
| `name.toggle()` | Open or close the menu based on its current state. |

```js
profile_menu.show();
profile_menu.hide();
profile_menu.toggle();
```

## Attributes

### Dropmenu Attributes

| Attribute | Default | Description |
|---|---|---|
| name | uniqid('bw-dropmenu-') | Optional unique name, useful to target a menu from CSS. |
| trigger | ellipsis-horizontal-icon | The element that triggers the menu. |
| trigger_css | *blank* | Additional CSS applied to the trigger. |
| trigger_on | click | Event that triggers the menu. `click` \| `mouseover` |
| divided | false | Divide menu items with lines. `true` \| `false` |
| scrollable | false | Scroll menu items after 200px. `true` \| `false` |
| height | 200 | Height for the menu items container when `scrollable=true`. Positive integer. |
| hide_after_click | true | Hide the menu after clicking a menu item. `true` \| `false` |
| icon_right | false | Align icons to the right of every menu item. `true` \| `false` |
| class | *blank* | Additional CSS for the menu items container. |
| position | right | Position of menu items relative to the trigger. `right` \| `left` |
| padded | false | Pad the menu items container. `true` \| `false` |
| modular | false | Whether script tags in the component use `type="module"`. Useful with Vite. `true` \| `false` |
| nonce | null | Nonce value for content security policies applied to inline scripts. Can also be set globally via `config/bladewind.php` under the "script" key. |
| trigger_label | *blank* | Accessible name for the trigger, exposed as `aria-label`. Worth setting when the trigger is icon-only, since it otherwise reaches a screen reader unnamed. |

### Dropmenu Item Component Attributes

| Attribute | Default | Description |
|---|---|---|
| icon | *blank* | Any Heroicon icon to prefix the menu item. |
| dir | *blank* | Directory to load the icon from. See the Icon component. |
| icon_css | *blank* | Additional CSS applied to the icon. |
| icon_right | false | Align the icon to the right, for this item only. `true` \| `false` |
| divider | false | Render this item as a divider. `true` \| `false` |
| header | false | Render this item as a header. `true` \| `false` |
| hover | true | Change background colour on mouseover. `true` \| `false` |
| padded | false | Pad the menu item. `true` \| `false` |
| class | *blank* | Additional CSS for the menu item. |

## Using Dropmenu Inside Livewire

The menu tracks its open/closed state outside of the DOM that Livewire manages, so an unrelated re-render resets it to closed — wrap the trigger and menu in `wire:ignore` if this happens. The component also guards against a Livewire re-render creating a second copy of itself, so re-rendering won't leave behind duplicate click listeners.

## Full Example

```blade
<x-bladewind::dropmenu
    trigger="pencil-square-icon"
    name="profile-menu"
    trigger_css="!bg-yellow-400"
    trigger_on="mouseover"
    divided="true"
    scrollable="true"
    padded="true"
    height="150"
    hide_after_click="true"
    position="left"
    class="mt-0">

    <x-bladewind::dropmenu.item
        icon="pencil-square"
        icon_css="text-red-400"
        divider="false"
        padded="false"
        header="false"
        hover="false"
        class="p-2">
        ...
    </x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```
