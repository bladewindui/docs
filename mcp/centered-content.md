---
title: Centered Content Component
component: x-bladewind::centered-content
url: /component/centered-content
---

# Centered Content

Center content within a container. This container could be any block level element, say a `div`.

There are different sizes for the centered content component which are too wide for this documentation space. Try them out in your layouts to see how they look.

## Basic Usage

```blade
<x-bladewind::centered-content size="tiny">

    <x-bladewind::card>
        this content is centered in this column
    </x-bladewind::card>

</x-bladewind::centered-content>
```

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
| size | `xl` | Size of the centered container. Available values: `tiny` `small` `medium` `big` `xl` `xxl` `omg` |

## Full Example

```blade
<x-bladewind::centered-content
    size="medium"/>
```
