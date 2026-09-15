---
title: Avatar Component
component: x-bladewind::avatar
url: /component/avatar
---

# Avatar

The avatar component displays a rounded picture at different sizes. It is useful for showing pictures of logged-in users, contact lists, employee directories, and similar UI. It can display a single image or a horizontal stack of images. A default placeholder image is used when `image` is blank or not specified.

## Basic Usage

```blade
<x-bladewind::avatar image="/path/to/the/image/file" />
```

## Different Sizes

You can specify a size for the avatar. The default size is `regular`.

```blade
<x-bladewind::avatar image="/path/to/the/image/file" size="tiny" />
<x-bladewind::avatar image="/path/to/the/image/file" size="small" />
<x-bladewind::avatar image="/path/to/the/image/file" size="medium" />
<x-bladewind::avatar image="/path/to/the/image/file" /> {{-- default: regular --}}
<x-bladewind::avatar image="/path/to/the/image/file" size="big" />
<x-bladewind::avatar image="/path/to/the/image/file" size="huge" />
<x-bladewind::avatar image="/path/to/the/image/file" size="omg" />
```

## Stacked Avatars

Stacked avatars overlap each other. Use the `x-bladewind::avatars` component and set `stacked="true"`. Stacking avatars of different sizes is not restricted, but stacking images of the same size looks best.

```blade
<x-bladewind::avatars stacked="true">
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
</x-bladewind::avatars>
```

### Plus More

To display a limited number of avatars and indicate how many more exist, set the `plus` attribute to a positive whole number. This automatically sets `stacked="true"`. You can also define an action for the "plus more" avatar with `plus_action`, which accepts a JavaScript function call.

```blade
<x-bladewind::avatars plus="95" plus_action="alert('show more avatars')">
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
</x-bladewind::avatars>
```

## Dot Indicator

Avatars can display a status indicator (online, offline, invisible, etc). Set `dotted="true"` to show a dot indicator.

```blade
<x-bladewind::avatar dotted="true" image="/path/to/the/image/file" />
```

By default the dot is at the base of the avatar. Set `dot_position="top"` to move it to the top.

```blade
<x-bladewind::avatar dotted="true" dot_position="top" image="/path/to/the/image/file" />
```

The dot supports different colours, useful for matching your theme or indicating different statuses. Set `dot_color` to any of the supported colours.

```blade
<x-bladewind::avatars dotted="true">
    <x-bladewind::avatar dot_color="primary" image="..." />
    <x-bladewind::avatar dot_color="gray" image="..." />
    <x-bladewind::avatar dot_color="red" image="..." />
</x-bladewind::avatars>
```

## Labels

If no image is set, you can display initials instead by specifying the `label` attribute. A label is also displayed automatically when `image` is three or fewer characters long.

```blade
<x-bladewind::avatar dotted="true" label="MO" />
<x-bladewind::avatar label="MK" />
<x-bladewind::avatar image="PP" />

<x-bladewind::avatars stacked="true" dotted="true" plus="34">
    <x-bladewind::avatar label="SF" />
    <x-bladewind::avatar label="ZH" />
    <x-bladewind::avatar label="RB" />
</x-bladewind::avatars>

<x-bladewind::avatars dotted="true" class="space-x-4">
    <x-bladewind::avatar label="SF" bg_color="orange" dot_color="orange" />
    <x-bladewind::avatar label="ZH" bg_color="blue" dot_color="blue" />
    <x-bladewind::avatar label="RB" bg_color="purple" dot_color="purple" />
</x-bladewind::avatars>
```

## Attributes

### Avatars Component

| Attribute | Default | Description |
|---|---|---|
| size | regular | Size of all avatars in the group. `tiny` \| `small` \| `medium` \| `regular` \| `big` \| `huge` \| `omg` |
| stacked | false | Whether the avatars are displayed as a stack. `true` \| `false` |
| dotted | false | Whether the avatars have dot indicators. `true` \| `false` |
| dot_color | green | Colour of the dot indicator. Only relevant if `dotted=true`. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `gray` \| `cyan` |
| dot_position | bottom | Where the dot indicator is placed. Only relevant if `dotted=true`. `top` \| `bottom` |
| show_ring | true | Whether avatars show a ring around them. `true` \| `false` |
| plus | null | Displays a last avatar with +XX indicating how many more avatars there are. Must be a positive integer greater than zero. |
| plus_action | null | JavaScript action to perform when the +XX avatar is clicked. |
| bg_color | null | Background colour when displaying avatars as labels. Also sets the ring colour. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `black` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| class | mr-2 mt-2 | Any additional css classes, applied to the avatars container. |

### Avatar Component

| Attribute | Default | Description |
|---|---|---|
| image | *public/vendor/bladewind/images/avatar.png* | Url to the image file. Defaults to a generic headshot image if not passed. Displayed as a label if three characters or fewer. |
| alt | image | Text for the image's alt attribute. |
| size | regular | Size of the avatar. `tiny` \| `small` \| `medium` \| `regular` \| `big` \| `huge` \| `omg` |
| stacked | false | Whether the avatar image is displayed as part of a stack. `true` \| `false` |
| dotted | false | Whether the avatar has a dot indicator. `true` \| `false` |
| dot_color | green | Colour of the dot indicator. Only relevant if `dotted=true`. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `gray` \| `cyan` |
| dot_position | bottom | Where the dot indicator is placed. Only relevant if `dotted=true`. `top` \| `bottom` |
| label | null | Text displayed in place of an image, usually two characters. |
| show_ring | true | Whether the avatar shows a ring around it. `true` \| `false` |
| class | mr-2 mt-2 | Any additional css classes. |

## Full Example

```blade
<x-bladewind::avatars
    size="big"
    show_ring="false"
    dotted="true"
    dot_color="red"
    dot_position="top"
    plus="33"
    plus_action="showMorePictures()"
    stacked="true"
    class="ring-blue-200 ring-offset-2" />

<x-bladewind::avatar
    image="/path/to/the/image/file"
    alt="company logo"
    size="big"
    stacked="true"
    dotted="true"
    bg_color="cyan"
    show_ring="false"
    dot_color="red"
    dot_position="top"
    class="ring-blue-200 ring-offset-2" />
```
