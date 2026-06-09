---
title: Shimmer Component
component: x-bladewind::shimmer
url: /component/shimmer
---

# Shimmer

Shimmers or loading placeholders are a great visual cue to tell users that content is loading.

```blade
<x-bladewind::shimmer />
```

```blade
<x-bladewind::shimmer animation="alternate" />
```

Shimmers can be used in various ways. For example, you can use them to show a loading state for a list of items, card content, or even a form. You can use the `circle` attribute to create a circular shimmer.

```blade
<x-bladewind::shimmer circle="true" />
```

Since it is impossible to know all the possible layouts users will want to shimmer, the Bladewind Shimmer has been designed to be very simple. You specify your own `width` and `height` and stack up as many shimmers as needed to create the loading layout you want to depict.

In the example below, we have created a shimmer that is depicting two loading contact cards. One vertical, the other horizontal.

```blade
<x-bladewind::card class="sm:w-1/3">
    <x-bladewind::shimmer :circle="true" align="center" />
    <x-bladewind::shimmer height="h-5" />
    <x-bladewind::shimmer />
    <x-bladewind::shimmer />
    <x-bladewind::shimmer />
</x-bladewind::card>
```

```blade
<x-bladewind::card class="sm:w-2/3">
    <div class="flex gap-4">
        <div><x-bladewind::shimmer :circle="true" class="size-40" /></div>
        <div class="grow">
            <x-bladewind::shimmer height="h-5" />
            <x-bladewind::shimmer class="w-[90%]" />
            <x-bladewind::shimmer class="w-[80%]" />
            <x-bladewind::shimmer />
            <x-bladewind::shimmer class="w-[80%]" />
            <x-bladewind::shimmer class="w-[85%]" />
            <x-bladewind::shimmer class="w-[90%]" />
            <x-bladewind::shimmer class="w-[80%]" />
            <x-bladewind::shimmer />
            <x-bladewind::shimmer />
        </div>
    </div>
</x-bladewind::card>
```

If the shimmer is at its full width (`w-full`), you can use the `align` attribute to position the shimmer to the `center` or `right` of its parent container. The shimmer by default is set to `w-full` and aligned to the `left` if width is not `w-full`.

### Alternating Animation

By default the animation moves from left to right. You can change this by setting the `animation` attribute to `alternate`. This will cause the shimmer to animate from left to right and then right to left, creating a back and forth effect.

```blade
<x-bladewind::card class="sm:w-1/3">
    <x-bladewind::shimmer animation="alternate" :circle="true" align="center" />
    <x-bladewind::shimmer animation="alternate" height="h-5" />
    <x-bladewind::shimmer animation="alternate" />
    <x-bladewind::shimmer animation="alternate" />
    <x-bladewind::shimmer animation="alternate" />
</x-bladewind::card>
```

```blade
<x-bladewind::card class="sm:w-2/3">
    <div class="flex gap-4">
        <div><x-bladewind::shimmer animation="alternate" :circle="true" class="size-40" /></div>
        <div class="grow">
            <x-bladewind::shimmer animation="alternate" height="h-5" />
            <x-bladewind::shimmer animation="alternate" class="w-[90%]" />
            <x-bladewind::shimmer animation="alternate" class="w-[80%]" />
            <x-bladewind::shimmer animation="alternate" />
            <x-bladewind::shimmer animation="alternate" class="w-[80%]" />
            <x-bladewind::shimmer animation="alternate" class="w-[85%]" />
            <x-bladewind::shimmer animation="alternate" class="w-[90%]" />
            <x-bladewind::shimmer animation="alternate" class="w-[80%]" />
            <x-bladewind::shimmer animation="alternate" />
            <x-bladewind::shimmer animation="alternate" />
        </div>
    </div>
</x-bladewind::card>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| circle | false | Display the shimmer as a circle. `true` \| `false` |
| duration | 1.5s | How long it takes for the animation to complete. The bigger the value the slower the animation. Must include 's' for seconds. |
| width | w-full | How wide the shimmer goes. Must be a valid TailwindCSS width. Examples: `w-90`, `w-[100px]`, `w-[80%]` |
| height | h-2.5 | Height of the shimmer. Must be a valid TailwindCSS height. Examples: `h-10`, `h-[10px]`, `h-[2%]` |
| class | _blank_ | Any additional css classes can be added using this attribute. |
| animation | normal | Direction of the animation. `normal` \| `alternate` |

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
