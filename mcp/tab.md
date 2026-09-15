---
title: Tab Component
component: x-bladewind::tab
url: /component/tab
---

# Tab

Organize and display data in tabs. The tab component is split into tab headings and tab content. A `name` is required on the tab group — tabs won't render without one.

## Basic Usage

Define a tab group with a `headings` slot containing one or more `x-bladewind::tab.heading` components, and a `x-bladewind::tab.body` containing matching `x-bladewind::tab.content` components. Each heading and its content share the same `name`. The heading you want selected by default (not necessarily the first) needs `active="true"`, and its matching content also needs `active="true"`.

```blade
<x-bladewind::tab name="free-pics">

    <x-slot name="headings">
        <x-bladewind::tab.heading
            name="unsplash-1" label="Lissete Laverde" />

        <x-bladewind::tab.heading
            name="unsplash-2" label="Marko Pavlichenko" />

        <x-bladewind::tab.heading
            name="unsplash-3" active="true" label="Yoonbae Cho" />

        <x-bladewind::tab.heading
            name="unsplash-4" label="Sam Carter" />
    </x-slot>

    <x-bladewind::tab.body>

        <x-bladewind::tab.content name="unsplash-1">
            <img src="/path/to/the/image/file"
                alt="Picture by Lissete Laverde" />
        </x-bladewind::tab.content>

        <x-bladewind::tab.content name="unsplash-2">
            <img src="/path/to/the/image/file"
                alt="Picture by Marko Pavlichenko" />
        </x-bladewind::tab.content>

        <x-bladewind::tab.content name="unsplash-3" active="true">
            <img src="/path/to/the/image/file"
                alt="Picture by Yoonbae Cho" />
        </x-bladewind::tab.content>

        <x-bladewind::tab.content name="unsplash-4">
            <img src="/path/to/the/image/file"
                alt="Picture by Sam Carter" />
        </x-bladewind::tab.content>

    </x-bladewind::tab.body>

</x-bladewind::tab>
```

## Different Colours

The active tab heading and its underline default to blue. There are twelve colours to pick from via the `color` attribute on `<x-bladewind::tab>`.

```blade
<x-bladewind::tab name="red-tab" color="red">
    <x-slot name="headings">
        <x-bladewind::tab.heading
            name="red"
            active="true"
            label="Active Red Tab" />

        <x-bladewind::tab.heading
            name="inactive-red"
            label="The Other Tab" />

    </x-slot>

    <x-bladewind::tab.body>

        <x-bladewind::tab.content
            name="red"
            active="true"></x-bladewind::tab.content>

        <x-bladewind::tab.content
            name="inactive-red"></x-bladewind::tab.content>

    </x-bladewind::tab.body>

</x-bladewind::tab>
```

Available colours: `primary`, `red`, `yellow`, `green`, `blue`, `pink`, `cyan`, `purple`, `gray`, `orange`, `violet`, `indigo`, `fuchsia`.

## Other Tab Styles

Three tab styles are available via the `style` attribute: `simple` (default), `system`, and `pills`.

```blade
<x-bladewind::tab
    name="sys-blue-tab"
    style="system">

    <x-slot:headings>
        <x-bladewind::tab.heading
            name="sys-blue" active="true" label="Blue System Tab" />
        <x-bladewind::tab.heading
            name="inactive-sys-blue" label="The Other Tab" />
    </x-slot:headings>

    <x-bladewind::tab.body>
        <x-bladewind::tab.content
            name="sys-blue" active="true">...</x-bladewind::tab.content>
        <x-bladewind::tab.content
            name="inactive-sys-blue">...</x-bladewind::tab.content>
    </x-bladewind::tab.body>

</x-bladewind::tab>
```

```blade
<x-bladewind::tab
    name="pills-blue-tab"
    style="pills">

    <x-slot:headings>
        <x-bladewind::tab.heading
            name="pills-blue" active="true" label="Blue System Tab" />
        <x-bladewind::tab.heading
            name="inactive-pills-blue" label="The Other Tab" />
    </x-slot:headings>

    <x-bladewind::tab.body>
        <x-bladewind::tab.content
            name="pills-blue" active="true">...</x-bladewind::tab.content>
        <x-bladewind::tab.content
            name="inactive-pills-blue">...</x-bladewind::tab.content>
    </x-bladewind::tab.body>

</x-bladewind::tab>
```

## With Icons

Display icon prefixes in tab headings using the BladewindUI [Icon component](/component/icon) — all Heroicons are supported. Style the icon with `icon_css`. Outline icons are used by default; set `icon_type="solid"` for solid icons. Use `icon_dir` to load custom icons from your own directory.

```blade
<x-bladewind::tab name="tab-icon">
    <x-slot name="headings">
        <x-bladewind::tab.heading name="icon-blue" active="true"
            icon="shopping-cart"
            label="Shopping List" />
        <x-bladewind::tab.heading name="icon-inactive"
            label="Previous Purchases"
            icon="shopping-bag" />
        <x-bladewind::tab.heading name="icon-solid"
            label="Solid Icon"
            icon="shopping-bag"
            icon_type="solid" />
        <x-bladewind::tab.heading name="icon-solid-css" label="Icon Css Applied"
            icon="fire"
            icon_type="solid"
            icon_css="!rounded-full !bg-orange-500 text-white size-6 p-1" />
    </x-slot>
    <x-bladewind::tab.body>
        <x-bladewind::tab.content name="icon-blue" active="true">
            <img src="/path/to/the/image/file"
                 alt="Picture by Lissete Laverde" />
        </x-bladewind::tab.content>
        <x-bladewind::tab.content name="icon-inactive">
            <img src="/path/to/the/image/file" alt="Picture by Sam Carter" />
        </x-bladewind::tab.content>
        <x-bladewind::tab.content name="icon-solid">
            <img src="/path/to/the/image/file" alt="Picture by Lissete Laverde" />
        </x-bladewind::tab.content>
    </x-bladewind::tab.body>
</x-bladewind::tab>
```

## Using Tab Group Inside Livewire

Which tab is active lives in the tab group's own DOM rather than in Livewire's component state. If a Livewire component re-renders this markup for a reason unrelated to the tabs, the active tab resets to its initial value — wrap the tab group in `wire:ignore` if it sits inside such a component. The bindings that drive the tabs are delegated and safe to re-run, so a re-render will not leave behind duplicate listeners.

## Attributes

### Tab Group Component Attributes

| Attribute | Default | Description |
|---|---|---|
| name | *blank* | Unique name to identify the tab component, in case there are multiple tab groups on the same page. |
| style | simple | Choose a tab style. `simple` \| `system` \| `pills` |
| headings | *blank* | Slot that accepts one or more `<x-bladewind::tab.heading>` components. |
| color | blue | There are twelve colours to choose from. `primary` \| `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |

### Tab Heading Component Attributes

| Attribute | Default | Description |
|---|---|---|
| name | tab | Unique name to identify the tab heading. |
| label | tab | Text displayed as the tab heading; what the user clicks to switch tabs. |
| active | false | Whether the tab should be selected by default. `true` \| `false` |
| disabled | false | Whether the tab is disabled by default. Disabled tabs are faded out and do nothing when clicked. `true` \| `false` |
| url | default | By default tabs switch to their matching content. Set this to have the heading load a URL instead (called via `location.href`). |
| icon | null | Icon prefix to display with the tab heading. See the [Icon component](/component/icon) for available icons. |
| icon_css | *blank* | Additional CSS to modify the look of the icon. |
| icon_dir | *blank* | Directory to load custom icons from, instead of Heroicons. See the `dir` attribute in the [Icon component](/component/icon). |
| icon_type | outline | Choose outline or solid icons. `solid` \| `outline` |

### Tab Body Component Attributes

| Attribute | Default | Description |
|---|---|---|
| class | *blank* | Additional Tailwind CSS classes applied to the tab body container that holds all tab contents. |

### Tab Content Component Attributes

| Attribute | Default | Description |
|---|---|---|
| name | tab | Must match the name given to this content's tab heading. |
| active | false | Whether this content is selected by default; must match its heading's `active` state. `true` \| `false` |
| class | *blank* | Additional Tailwind CSS classes applied to this specific tab content container. |

## Full Example

```blade
<x-bladewind::tab name="red-tab" color="red" style="system">
    <x-slot name="headings">

        <x-bladewind::tab.heading
            name="red"
            active="true"
            label="Active Red Tab" />

        <x-bladewind::tab.heading
            name="inactive-red"
            disabled="true"
            active="false"
            url="/profile/settings"
            label="The Other Tab" />

    </x-slot>

    <x-bladewind::tab.body class="p-2">

        <x-bladewind::tab.content
            name="red"
            class="border border-gray-100"
            active="true">...</x-bladewind::tab.content>

        <x-bladewind::tab.content
            name="inactive-red">...</x-bladewind::tab.content>

    </x-bladewind::tab.body>

</x-bladewind::tab>
```
