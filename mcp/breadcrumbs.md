---
title: Breadcrumbs Component
component: x-bladewind::breadcrumbs
url: /component/breadcrumbs
---

# Breadcrumbs

Breadcrumbs are the small trail of links near the top of a page that tells people where they are and how they got there. They matter most once a site has more than a couple of levels to it. This component builds that trail for you and takes care of the accessibility details that are easy to forget: it wraps everything in a proper navigation region with a plain list inside, so a screen reader announces it as a real breadcrumb trail rather than a row of unrelated text.

To build a trail, list items in order from the top of the site down to the current page, and add the `current` attribute to the final item.

## Basic Usage

```blade
<x-bladewind::breadcrumbs aria-label="Breadcrumb">
    <x-bladewind::breadcrumbs.item href="/" icon="home">Home</x-bladewind::breadcrumbs.item>
    <x-bladewind::breadcrumbs.item href="/components">Components</x-bladewind::breadcrumbs.item>
    <x-bladewind::breadcrumbs.item current>Breadcrumbs</x-bladewind::breadcrumbs.item>
</x-bladewind::breadcrumbs>
```

## Linked And Current Items

Give an item an `href` to make it a clickable link; otherwise it renders as plain text. Usually the last item has no `href`. If the current page also needs to work as a link (for example, clicking it refreshes the page or resets a view), add both `href` and `current` to the same item.

```blade
<x-bladewind::breadcrumbs aria-label="Customer path">
    <x-bladewind::breadcrumbs.item href="/">Home</x-bladewind::breadcrumbs.item>
    <x-bladewind::breadcrumbs.item href="/customers">Customers</x-bladewind::breadcrumbs.item>
    <x-bladewind::breadcrumbs.item href="/customers/42" current>Customer details</x-bladewind::breadcrumbs.item>
</x-bladewind::breadcrumbs>
```

## Icons

Add a small icon next to any item's text using `icon`, and control its look with `icon-type` and `icon-dir`. These work exactly like the [Icon component](/component/icon). Leave `icon-dir` empty to use the built-in icon set, or give it a folder name inside your app's `public` directory to load your own SVG file from there instead.

```blade
<x-bladewind::breadcrumbs>
    <x-bladewind::breadcrumbs.item href="/" icon="home">Home</x-bladewind::breadcrumbs.item>
    <x-bladewind::breadcrumbs.item href="/settings" icon="cog-6-tooth">Settings</x-bladewind::breadcrumbs.item>
    <x-bladewind::breadcrumbs.item current icon="user-circle" icon-type="solid">Profile</x-bladewind::breadcrumbs.item>
</x-bladewind::breadcrumbs>
```

## Separator Options

By default, each item is separated by a chevron. Swap it by setting `separator` to `slash`, `dot`, or any character of your choice. Changing the separator only changes what sits between items.

```blade
<x-bladewind::breadcrumbs separator="slash">...</x-bladewind::breadcrumbs>
<x-bladewind::breadcrumbs separator=">>>">...</x-bladewind::breadcrumbs>
```

## Sizes

Set `size` to one of six available sizes, from smallest `tiny` up to largest `large`, with `regular` as the default.

```blade
<x-bladewind::breadcrumbs size="medium">...</x-bladewind::breadcrumbs>
```

## Long And Collapsed Trails

Once a trail reaches four items or more, this component quietly hides the middle items on narrow screens, keeping only the first item and the current page visible, with a marker in between showing something has been tucked away. Every hidden link is still in the document. Set `collapse="false"` to always show the full trail regardless of screen width.

```blade
<x-bladewind::breadcrumbs collapse="false">...</x-bladewind::breadcrumbs>
```

## Dark Mode And RTL

Colours automatically match the active theme, and no separate dark-mode styling is needed. The trail follows whatever reading direction the surrounding page has set. Set `dir="rtl"` directly on a breadcrumb to force right-to-left for that trail alone; the chevron separators flip direction to match.

```blade
<x-bladewind::breadcrumbs dir="rtl" aria-label="مسار الصفحة">...</x-bladewind::breadcrumbs>
```

## Accessibility

- Give the trail a short, clear `aria-label`, such as "Breadcrumb" or a description of the section it belongs to. It defaults to "Breadcrumb" if omitted.
- Always mark exactly one item, the current page, with `current`. This tells assistive technology which step is the current one.
- Write labels that make sense on their own, since a screen reader user might jump straight to the trail without reading the rest of the page.
- Separators, and the marker shown when items are hidden, are hidden from screen readers since they are purely visual.
- Every linked item is a genuine anchor tag, so keyboard tabbing and activation work without any custom handling.

## Attributes

### Breadcrumbs Component

| Attribute | Default | Description |
|---|---|---|
| separator | chevron | What to show between items. `chevron` \| `slash` \| `dot`, or your own text. |
| size | regular | `tiny` \| `small` \| `regular` \| `medium` \| `big` \| `large` |
| collapse | true | Hide middle items on narrow screens once the trail reaches four items or more. `true` \| `false` |
| aria-label | Breadcrumb | Screen reader label for the navigation trail. |
| class | _(blank)_ | Extra classes added to the trail's outer wrapper. |
| Any HTML attribute | | Forwarded to the trail's outer wrapper, including `dir`, `id`, or data attributes. |

### Breadcrumbs Item Component

| Attribute | Default | Description |
|---|---|---|
| href | null | Link destination. Omit to render as plain text. |
| current | false | Marks this item as the current page. `true` \| `false` |
| icon | null | Icon name to show next to the item's text. |
| icon-type | outline | `outline` \| `solid` |
| icon-dir | _(blank)_ | Folder inside `public` to load a custom icon from. Blank uses the built-in icon set. |
| class | _(blank)_ | Extra classes added to this item's link or text. |
| Any HTML attribute | | Forwarded to this item's link or text element, including `title`, `rel`, or data attributes. |

## Full Example

```blade
<x-bladewind::breadcrumbs
    separator="slash"
    size="medium"
    collapse="false"
    aria-label="Order path"
    class="rounded-lg">
    <x-bladewind::breadcrumbs.item
        href="/settings"
        current="true"
        icon="cog-6-tooth"
        icon-type="solid"
        icon-dir="icons/custom"
        class="font-semibold">
        Settings
    </x-bladewind::breadcrumbs.item>
</x-bladewind::breadcrumbs>
```
