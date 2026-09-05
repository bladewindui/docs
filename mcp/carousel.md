---
title: Carousel Component
component: x-bladewind::carousel
url: /component/carousel
---

# Carousel

`x-bladewind::carousel` and `x-bladewind::carousel.slide` step through a set of slides one at a time. Each slide can hold anything, an image, a card, a testimonial, a promo banner. Visitors can move between slides with the arrow buttons, the dot indicators, the left and right arrow keys, or by swiping on a touch screen.

```blade
<x-bladewind::carousel height="220px">
    <x-bladewind::carousel.slide>
        ...
    </x-bladewind::carousel.slide>
    <x-bladewind::carousel.slide>
        ...
    </x-bladewind::carousel.slide>
    <x-bladewind::carousel.slide>
        ...
    </x-bladewind::carousel.slide>
</x-bladewind::carousel>
```

## Autoplay

Set `autoplay="true"` to advance slides automatically on an `interval`, given in milliseconds. Autoplay pauses while the pointer is over the carousel, and is switched off entirely for a visitor whose system has requested reduced motion.

```blade
<x-bladewind::carousel height="220px" autoplay="true" interval="3000">
    ...
</x-bladewind::carousel>
```

## Without Looping

By default the carousel loops, so the next arrow from the last slide returns to the first. Set `loop="false"` to stop at either end instead, disabling the corresponding arrow.

```blade
<x-bladewind::carousel height="220px" loop="false">
    ...
</x-bladewind::carousel>
```

## Without Arrows Or Indicators

Set `arrows="false"` or `indicators="false"` to hide either control. Swiping and the arrow keys keep working either way.

```blade
<x-bladewind::carousel height="220px" arrows="false" indicators="false">
    ...
</x-bladewind::carousel>
```

## Attributes

### Carousel

| Attribute | Default | Description |
|---|---|---|
| arrows | true | Shows previous/next arrow buttons. `true` \| `false` |
| indicators | true | Shows a row of dot indicators, one per slide. `true` \| `false` |
| autoplay | false | Advances slides automatically. Disabled for a visitor whose system requests reduced motion. `true` \| `false` |
| interval | 5000 | Milliseconds between slides when autoplay is on. |
| loop | true | Wraps from the last slide back to the first, and vice versa. `true` \| `false` |
| swipe | true | Enables touch and pointer swiping to change slides. `true` \| `false` |
| height | _blank_ | Any valid CSS height value, for example `"320px"`. The carousel takes the height of its tallest slide when left blank. |
| class | _blank_ | Additional CSS classes for the wrapper element. |

### Slide

| Attribute | Default | Description |
|---|---|---|
| class | _blank_ | Additional CSS classes for the slide. |
