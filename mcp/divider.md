---
title: Divider Component
component: x-bladewind::divider
url: /component/divider
---

# Divider

A horizontal or vertical rule for separating layout regions — sections of a form, rows in a list, or items in a
toolbar. It ranges from a plain line to a line split by a centered label, and can be purely decorative or a real
`role="separator"` a screen reader announces.

## Basic Usage

```blade
<x-bladewind::divider />
```

## Label

Pass `label` to split the line around centered text — the familiar "or" divider between a form and an alternate
action. A label only applies to a horizontal divider — it is ignored on a vertical one.

```blade
<x-bladewind::divider label="OR" />
```

## Orientation

Set `orientation="vertical"` to separate content side-by-side, such as items in a toolbar. A vertical divider
stretches to fill its container's height, so give the container a defined height.

```blade
<div class="flex items-center h-6">
    <span>Edit</span>
    <x-bladewind::divider orientation="vertical" />
    <span>Duplicate</span>
</div>
```

## Spacing

`spacing` controls the margin either side of the line: `none`, `small`, `medium` (default), or `large`.

```blade
<x-bladewind::divider spacing="large" />
```

## Colour

`color` tints the line and label with any accepted BladewindUI colour instead of the neutral slate default.

```blade
<x-bladewind::divider label="Section" color="primary" />
```

## Decorative vs semantic

By default a divider is purely visual: it renders `role="none"` and `aria-hidden="true"`, so assistive technology
skips it. Set `decorative="false"` when the divider marks a real boundary a screen reader should announce, which
renders `role="separator"` and `aria-orientation` instead.

```blade
<x-bladewind::divider decorative="false" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| orientation | horizontal | `horizontal` \| `vertical` |
| label | _(blank)_ | Optional centered text. Horizontal only. |
| spacing | medium | `none` \| `small` \| `medium` \| `large` |
| color | _(blank)_ | Any accepted BladewindUI colour. Blank uses the neutral slate default. |
| decorative | true | false renders a semantic `role="separator"` instead of a purely visual, hidden rule. |
| class | _(blank)_ | Additional CSS classes for the wrapper element. |
