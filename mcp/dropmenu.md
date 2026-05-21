---
title: Dropmenu Component
component: x-bladewind::dropmenu
url: /component/dropmenu
---

# Dropmenu

Useful for displaying menu items in a dropdown. This is very different from the [Select component](/component/select). The Select component can pass values as a form element. The Dropmenu does not pass values around and is mostly useful for accessing quick actions.

```blade
<x-bladewind::dropmenu>
    <x-bladewind::dropmenu.item>Invite to Project</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Assign Task</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Send Message</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

By default the Dropmenu is triggered using the `horizontal ellipsis` icon found on [Heroicons](https://heroicons.com/). You can trigger the menu using any other icon from Heroicons or using any other element. To use an icon as the trigger, the trick is to append the word **-icon** to the end of the name of the icon defined on Heroicons.

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

It is also possible to modify the trigger css. This css applies to any item you specify as the trigger but most useful if you specify an icon as the trigger. This is achieved by defining TailwindCSS classes for the `trigger_css` attribute.

```blade
<x-bladewind::dropmenu trigger="musical-note-icon"
     trigger_css="bg-pink-600 text-white p-2 rounded-full !h-10 !w-10">
    <x-bladewind::dropmenu.item>Add to playlist</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Play again</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

### trigger_on

By default the Dropmenu is displayed when you click on the trigger. It is possible to change this behaviour by defining the `trigger_on` attribute. There are only two available options: `click` and `mouseover`.

```blade
<x-bladewind::dropmenu trigger="musical-note-icon"
    trigger_css="bg-green-600 text-white p-2 rounded-full !h-10 !w-10"
    trigger_on="mouseover">
    <x-bladewind::dropmenu.item>Add to playlist</x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item>Play again</x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

### Non Icon Triggers

To trigger the Dropmenu using any HTML element other than an icon, you will need to define the trigger as a slot.

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

The Dropmenu items are the actual line items within your Dropmenu. Each item can contain any piece of HTML code so you completely have control over what action is assigned to each menu item. BladewindUI does not interfere. For convenience, you can specify an `onclick` attribute.

Dropmenu Items can contain HTML so their content is all up to you.

```blade
<x-bladewind::dropmenu trigger="light-bulb-icon"
    trigger_css="bg-yellow-400 text-yellow-800 p-2 rounded-full !h-10 !w-10">
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

It is possible to define a header for your Dropmenu component. There can be several headers in a Dropmenu. The header is still a `x-bladewind::dropmenu.item` component so can contain any HTML. The only difference between this and other items is there is no hover effect, the cursor displayed is the default pointer and there is a divider separating the header from the next menu item. To define a Dropmenu item as a header, set `header="true"`.

```blade
<x-bladewind::dropmenu.item header="true">
    // define heading here
</x-bladewind::dropmenu.item>
```

### Icons

Even though it is possible to define your own icon as part of the Dropmenu item's content, there is a shortcut that allows you to define any of the icons available on [Heroicons](https://heroicons.com). This makes use of the BladewindUI [Icon component](/component/icon). This is useful only if you have menu items that fit on one line and you want to prefix each line with an icon. To define a Dropmenu item with an icon, set the `icon` attribute with any icon name from Heroicons. Unlike the icon used in the `trigger` attribute of the Dropmenu component, items do not require the **-icon** at the end of the icon name.

```blade
<x-bladewind::dropmenu.item icon="square-pencil">
    Edit Profile
</x-bladewind::dropmenu.item>
```

By default, icons are positioned on the left of the menu item content. To switch the icon position to the right of the menu item content, set `icon_right="true"`. Setting the attribute on the `x-bladewind::dropmenu` component will shift all menu items in the menu to the right. Alternatively, you can set the attribute on one or more menu items within the Dropmenu component.

```blade
<x-bladewind::dropmenu icon_right="true">
    <x-bladewind::dropmenu.item>
    ...
    </x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

### Dividers

You may want to logically divide your Dropmenu into sections. You can either do that with headers or dividers. A divider is simply a non-clickable line separating menu items. To define a Dropmenu item as a divider, set `divider="true"`. Any text added to the menu item will be ignored.

```blade
<x-bladewind::dropmenu.item divider="true" />
```

By default Dropmenu Items are not divided. You can tell each menu item apart on mouseover. If you prefer to have your menu items separated by a thin gray line you can set `divided="true"` on the Dropmenu component itself (not on the menu items).

```blade
<x-bladewind::dropmenu divided="true">
    ...
</x-bladewind::dropmenu>
```

## Menu Position

The Dropmenu component for now supports two menu positions: left and right. This is achieved by setting the `position` attribute on the Dropmenu component. The default position is `right` so you can ignore this attribute if you intend to use the component as is.

```blade
<x-bladewind::dropmenu position="left">
...
</x-bladewind::dropmenu>

<x-bladewind::dropmenu position="right">
...
</x-bladewind::dropmenu>
```

## Scrollable Menu Items

You could have a long list of menu items in your Dropmenu. If you don't want all items showing, you can set `scrollable="true"` on the Dropmenu component. This will reduce the menu items container to a default height of `200px` and scroll every menu item outside this view area. If the default height does not meet your needs, you can define your own height by setting the `height` attribute. This takes any positive integer without the "px".

```blade
<x-bladewind::dropmenu scrollable="true">
...
</x-bladewind::dropmenu>
```

If you have multiple Dropmenus on your page and experience issues with only the first Dropmenu showing and subsequent ones not showing, set `modular="true"` on the very first Dropmenu component on your page.

## Attributes

### Dropmenu Attributes

| Attribute | Default | Description |
|---|---|---|
| `name` | `uniqid('bw-dropmenu-')` | Optional unique name for the component. Usually useful if you wish to target a menu from CSS to define overwriting styles. |
| `trigger` | `ellipsis-horizontal-icon` | The element to trigger the menu. Usually what a user will click on to show the menu. |
| `trigger_css` | blank | Additional css to apply to the trigger. |
| `trigger_on` | `click` | Which event should trigger the menu. `click` `mouseover` |
| `divided` | `false` | Should menu items have lines dividing them. `true` `false` |
| `scrollable` | `false` | Should menu items scroll after 200px. `true` `false` |
| `height` | `200` | Default height for menu items container. When `scrollable=true`, menu items container will be restricted to this height. Accepts a positive integer. |
| `hide_after_click` | `true` | Should the menu be hidden after clicking on any of the menu items. `true` `false` |
| `icon_right` | `false` | Align the icon to the right of the menu item. Applies to all items in the menu. `true` `false` |
| `class` | blank | Additional css for the menu items container. |
| `position` | `right` | How should the menu items be positioned relative to the trigger. `right` `left` |
| `padded` | `false` | Should the container for the menu items be padded. `true` `false` |
| `modular` | `false` | Determines if script tags used within the component should have `type="module"`. Useful sometimes when working with Vite js. `true` `false` |
| `nonce` | `null` | Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your `nonce` value in the `config/bladewind.php` file under the "script" key. |

### Dropmenu Item Component Attributes

| Attribute | Default | Description |
|---|---|---|
| `icon` | blank | Any Heroicon icon to display as prefix to the menu item. |
| `dir` | blank | Directory to load the icon from. See the [Icon](/component/icon#custom-dir) component for usage. |
| `icon_css` | blank | Additional css to apply to the icon. |
| `icon_right` | `false` | Align the icon to the right of the menu item. Applies to the menu item the attribute is declared on. `true` `false` |
| `divider` | `false` | Is this menu item a divider. `true` `false` |
| `header` | `false` | Is this menu item a header. `true` `false` |
| `hover` | `true` | Should this menu item change its background colour on mouseover. `true` `false` |
| `padded` | `false` | Should the menu item be padded. `true` `false` |
| `class` | blank | Additional css to add to the menu item. |

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
