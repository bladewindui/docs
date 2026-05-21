---
title: Avatar Component
component: x-bladewind::avatar
url: /component/avatar
---

# Avatar

The avatar component allows you to display a rounded picture at different sizes. This component can be useful for displaying pictures of logged-in users, a contact list, directory of employees, etc. The avatar component can either display a single image or a horizontal stack of images. A default placeholder image is used when the `image` attribute is either blank or not specified.

## Single Avatar

```blade
<x-bladewind::avatar image="/path/to/the/image/file" />
```

## Different Sizes

You can specify a size for the avatar. The default size is `regular`.

```blade
<x-bladewind::avatar
    image="/path/to/the/image/file"
    size="tiny" />

<x-bladewind::avatar
    image="/path/to/the/image/file"
    size="small" />

<x-bladewind::avatar
    image="/path/to/the/image/file"
    size="medium" />

// this is the default
<x-bladewind::avatar
    image="/path/to/the/image/file" />

<x-bladewind::avatar
    image="/path/to/the/image/file"
    size="big" />

<x-bladewind::avatar
    image="/path/to/the/image/file"
    size="huge" />

<x-bladewind::avatar
    image="/path/to/the/image/file"
    size="omg" />
```

## Stacked Avatars

Stacked avatars are a series of avatars overlapping each other. The component will not restrict you from stacking avatars of different sizes but, for a more appealing visual effect, stacking images of the same size is advised. You can achieve 'stackability' by using the `x-bladewind::avatars` component and setting `stacked="true"`.

```blade
<x-bladewind::avatars stacked="true">
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
</x-bladewind::avatars>
```

### Plus More

There are cases where you have several avatars but only want to display a specific number and indicate how many more there are. You can achieve this by setting the `plus` attribute to any positive whole number. Setting the `plus` attribute automatically sets `stacked="true"`. BladewindUI also allows you to specify an action for your "plus more" avatar by specifying the `plus_action` attribute. This accepts a Javascript function.

```blade
<x-bladewind::avatars
    plus="95"
    plus_action="alert('show more avatars')">
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
    <x-bladewind::avatar image="/path/to/the/image/file" />
</x-bladewind::avatars>
```

## Dot Indicator

Avatars can be displayed with a status indicator. These statuses could be online, offline, invisible. To show a dot indicator on an avatar simply set `dotted="true"`.

```blade
<x-bladewind::avatar
    dotted="true"
    image="/path/to/the/image/file" />
```

By default the dot indicator is displayed at the base of the avatar. To change the position to the top of the avatar, set the `dot_position="top"` attribute.

```blade
<x-bladewind::avatar
    dotted="true"
    dot_position="top"
    image="/path/to/the/image/file" />
```

The dot is available in different colours. Set the `dot_color` attribute to any of the colours compiled into BladewindUI.

```blade
<x-bladewind::avatars dotted="true">
    <x-bladewind::avatar dot_color="primary" image="..." />
    <x-bladewind::avatar dot_color="gray" image="..." />
    <x-bladewind::avatar dot_color="red" image="..." />
</x-bladewind::avatars>
```

## Labels

You may have seen on websites where the initials of your name are displayed if you have not set a profile image. You can achieve this by specifying a value for the `label` attribute. A label is also displayed when the `image` specified is three or less characters long.

```blade
<x-bladewind::avatar dotted="true" label="MO" />
```

```blade
<x-bladewind::avatar label="MK" />
```

```blade
<x-bladewind::avatar image="PP" />
```

Stacked avatars with labels and dot indicators:

```blade
<x-bladewind::avatars stacked="true" dotted="true" plus="34">
    <x-bladewind::avatar label="SF" />
    <x-bladewind::avatar label="ZH" />
    <x-bladewind::avatar label="RB" />
</x-bladewind::avatars>
```

Avatars with custom background and dot colours:

```blade
<x-bladewind::avatars dotted="true" class="space-x-4">
    <x-bladewind::avatar label="SF" bg_color="orange" dot_color="orange" />
    <x-bladewind::avatar label="ZH" bg_color="blue" dot_color="blue" />
    <x-bladewind::avatar label="RB" bg_color="purple" dot_color="purple" />
</x-bladewind::avatars>
```

## Attributes

### Avatars Component Attributes

| Attribute | Default | Description |
|---|---|---|
| size | regular | Specifies the size of all the avatars in the group. `tiny` \| `small` \| `medium` \| `regular` \| `big` \| `huge` \| `omg` |
| stacked | false | Specifies if the avatars are displayed as a stack. `true` \| `false` |
| dotted | false | Specifies if the avatars have dot indicators. `true` \| `false` |
| dot_color | green | Specifies what colour to use as the dot indicator. Only relevant if _dotted=true_. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `gray` \| `cyan` |
| dot_position | bottom | Specifies where the dot indicator should be placed. Only relevant if _dotted=true_. `top` \| `bottom` |
| show_ring | true | By default avatars show a ring around them. Setting this can turn it off or back on. `true` \| `false` |
| plus | null | Display a last avatar with +XX in the box indicating how many more avatars there are. Must be a positive integer greater than zero. |
| plus_action | null | The Javascript action to perform when the +XX avatar is clicked. |
| bg_color | null | Display background colour when displaying avatars as labels. This sets the ring colour too. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `black` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| class | mr-2 mt-2 | Any additional css classes can be added using this attribute. This only affects the avatars container. |

### Avatar Component Attributes

| Attribute | Default | Description |
|---|---|---|
| image | _public/vendor/bladewind/images/avatar.png_ | The url to the image file. By default a generic headshot image is used if no url is passed. The image will be displayed as a label if it is three characters long or less. |
| alt | image | The text to display as the value for the image's alt attribute. |
| size | regular | Specifies the size of the avatar. `tiny` \| `small` \| `medium` \| `regular` \| `big` \| `huge` \| `omg` |
| stacked | false | Specifies if the avatar images are displayed as a stack. `true` \| `false` |
| dotted | false | Specifies if the avatar images have dot indicators. `true` \| `false` |
| dot_color | green | Specifies what colour to use as the dot indicator. Only relevant if _dotted=true_. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `gray` \| `cyan` |
| dot_position | bottom | Specifies where the dot indicator should be placed. Only relevant if _dotted=true_. `top` \| `bottom` |
| label | null | Text to display in place of an image. Usually two characters. |
| show_ring | true | By default avatars show a ring around them. Setting this can turn it off or back on. `true` \| `false` |
| class | mr-2 mt-2 | Any additional css classes can be added using this attribute. |

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
```

```blade
<x-bladewind::avatar
    image="/path/to/the/image/file"
    alt="company logo"
    size="big"
    stacked="true"
    dotted="true"
    bg_color="cyan"
    show_ring="false",
    dot_color="red",
    dot_position="top"
    class="ring-blue-200 ring-offset-2" />
```
