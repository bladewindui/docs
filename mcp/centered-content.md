---
title: Centered Content Component
component: x-bladewind::centered-content
url: /component/centered-content
---

# Centered Content

Centers content within a container. This container could be any block level element, such as a `div`.

## Basic Usage

```blade
<x-bladewind::centered-content size="tiny">
    <x-bladewind::card>
        this content is centered in this column
    </x-bladewind::card>
</x-bladewind::centered-content>
```

## Sizes

Different sizes are available for the centered content component. Try each in your own layout to see how it looks at full page width.

```blade
<x-bladewind::centered-content size="small">
    <x-bladewind::card>
        this content is centered in this column
    </x-bladewind::card>
</x-bladewind::centered-content>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| size | xl | `tiny` \| `small` \| `medium` \| `big` \| `xl` \| `xxl` \| `omg` |

## Full Example

```blade
<x-bladewind::centered-content
    size="medium" />
```
