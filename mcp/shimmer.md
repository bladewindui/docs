---
title: Shimmer Component
component: x-bladewind::shimmer
url: /component/shimmer
---

# Shimmer

Shimmers (loading placeholders) give users a visual cue that content is loading. The component is intentionally simple: you specify a width and height and stack as many shimmers as needed to build the loading layout you want.

## Basic Usage

```blade
<x-bladewind::shimmer />
```

## Circular Shimmers

Use the `circle` attribute to create a circular shimmer, useful for avatars or icons.

```blade
<x-bladewind::shimmer circle="true" />
```

## Building Layouts

Combine shimmers of different widths and heights to depict loading content such as contact cards.

```blade
<x-bladewind::card class="sm:w-1/3">
    <x-bladewind::shimmer :circle="true" align="center" />
    <x-bladewind::shimmer height="h-5" />
    <x-bladewind::shimmer />
    <x-bladewind::shimmer />
    <x-bladewind::shimmer />
</x-bladewind::card>

<x-bladewind::card class="sm:w-2/3">
    <div class="flex gap-4">
        <div><x-bladewind::shimmer :circle="true" class="size-40" /></div>
        <div class="grow">
            <x-bladewind::shimmer height="h-5" />
            <x-bladewind::shimmer class="w-[90%]" />
            <x-bladewind::shimmer class="w-[80%]" />
            <x-bladewind::shimmer />
        </div>
    </div>
</x-bladewind::card>
```

If a shimmer is at full width (`w-full`), use the `align` attribute to position it `center` or `right` within its parent. By default the shimmer is `w-full` and aligned `left` when width is not `w-full`.

## Alternating Animation

By default the shimmer animates left to right. Set `animation="alternate"` to make it animate back and forth (left to right, then right to left).

```blade
<x-bladewind::shimmer animation="alternate" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| circle | false | Display the shimmer as a circle. `true` \| `false` |
| duration | 1.5s | How long the animation takes to complete (its speed) — larger values are slower. Must include `s` for seconds. |
| width | w-full | How wide the shimmer is. Must be a valid Tailwind CSS width, e.g. `w-90`, `w-[100px]`, `w-[80%]`. |
| height | h-2.5 | Height of the shimmer. Must be a valid Tailwind CSS height, e.g. `h-10`, `h-[10px]`, `h-[2%]`. |
| class | *blank* | Additional CSS classes to add. |
| animation | normal | Direction of the animation. `normal` \| `alternate` |
| align | left | Alignment of the shimmer within its parent when not full width. `left` \| `center` \| `right` |

## Full Example

```blade
<x-bladewind::shimmer
    animation="alternate"
    circle="true"
    duration="3s"
    width="w-90"
    height="h-90"
    align="right" />
```
