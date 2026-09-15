---
title: Card Component
component: x-bladewind::card
url: /component/card
---

# Card

The card component displays content in a card layout. The default is a very basic card frame, with content left entirely up to you. It also supports specific use cases like headers/footers and contact cards.

## Basic Usage

```blade
<x-bladewind::card>
    // the card content goes here
</x-bladewind::card>
```

A `title` attribute adds a card heading.

```blade
<x-bladewind::card title="recent activity">
    // the card content goes here
</x-bladewind::card>
```

## Different Radii

The card comes with predefined radii corresponding to specific Tailwind roundness classes. The default is `small` (`rounded-lg`). Change it with the `radius` attribute.

```blade
<x-bladewind::card radius="none">...</x-bladewind::card>
<x-bladewind::card radius="small">...</x-bladewind::card> {{-- default --}}
<x-bladewind::card radius="medium">...</x-bladewind::card>
<x-bladewind::card radius="large">...</x-bladewind::card>
<x-bladewind::card radius="xl">...</x-bladewind::card>
```

To completely override the radius, specify any Tailwind roundness class in the `class` attribute.

## Practical Examples

### Invoice Table

The Table component fits naturally inside a basic Card.

```blade
<x-bladewind::card title="invoice details">
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Item</th>
            <th width="10%" class="text-center">Quantity</th>
            <th width="20%" class="text-right">Price (USD)</th>
        </x-slot>
        <tr>
            <td>Airpods Max (Black)</td>
            <td class="text-center">1</td>
            <td class="text-right">500.00</td>
        </tr>
    </x-bladewind::table>
</x-bladewind::card>
```

### Grid Navigation Items

Adding hover classes to the card's `class` attribute produces a grid of clickable navigation cards.

```blade
<div class="grid grid-cols-3 gap-5">
    <x-bladewind::card class="cursor-pointer hover:shadow-gray-300">
        <svg>...</svg>
        <span class="text-center block font-semibold mt-2">Projects</span>
    </x-bladewind::card>
    <x-bladewind::card class="cursor-pointer hover:shadow-gray-300">
        <svg>...</svg>
        <span class="text-center block font-semibold mt-2">Tasks</span>
    </x-bladewind::card>
</div>
```

### Contact List

`compact="true"` reduces the card's padding, useful for a tight list of rows.

```blade
<x-bladewind::card compact="true">
    <div class="flex items-center">
        <div><x-bladewind::avatar image="..." /></div>
        <div class="grow pl-2 pt-1">
            <b>Michael K. Ocansey</b>
            <div class="text-sm">Senior Developer</div>
            <div class="text-sm">Tech Team</div>
        </div>
        <div>
            <a href="javascript:showModal('delete-contact')">
                <svg class="h-6 w-6 text-red-600 ...">...</svg>
            </a>
        </div>
    </div>
</x-bladewind::card>
```

## Contact Card

A card component specific to rendering contacts, saving you from manually building one. A default avatar is used if one isn't provided.

```blade
<x-bladewind::contact-card
    name="Michael K. Ocansey"
    mobile="+233.123.456.789"
    department="Tech Team"
    position="Senior Dev"
    image="/path/to/the/image/file"
    email="mike@bladewindui.com"
    birthday="01-May-2000" />
```

Set `centered="true"` to vertically align and center the contact card content.

```blade
<x-bladewind::contact-card
    centered="true"
    name="Jane C. Doe"
    mobile="+233.444.456.542"
    image="/path/to/the/image/file"
    position="Senior Medical Officer"
    email="doc@hospital.com"
    birthday="01-May-2000" />
```

## Header and Footer

Cards can define a header and/or footer as slots — there's no restriction on what goes inside them. Headers and footers are independent, so you don't need to specify both. When the `header` slot is set, the main card body loses all its padding, so you'll need to style it yourself.

```blade
<x-bladewind::card>
    <x-slot:header>
        <div class="flex px-4 pt-2 pb-3">
            <x-bladewind::avatar size="small" image="/path/to/the/image/file" />
            <div class="pl-2">
                <span class="block font-semibold">mkocansey</span>
                <span class="block text-xs">Greater Accra, Accra, Ghana</span>
            </div>
        </div>
    </x-slot:header>

    <img src="/path/to/the/image/file" />

    <x-slot:footer>
        <div class="flex justify-between p-4">
            <div class="flex space-x-4">
                <x-bladewind::icon name="heart" class="h-8 w-8 text-gray-500 cursor-pointer" />
                <x-bladewind::icon name="chat-bubble-oval-left-ellipsis" class="h-8 w-8 text-gray-500 cursor-pointer" />
                <x-bladewind::icon name="arrow-uturn-left" class="h-8 w-8 text-gray-500 cursor-pointer" />
            </div>
            <x-bladewind::icon name="bookmark" class="h-8 w-8 text-gray-500 cursor-pointer" />
        </div>
    </x-slot:footer>
</x-bladewind::card>
```

## Padding And Radius

`padding` is a scale rather than a switch, replacing manual `!p-5`-style overrides when `compact` is too tight and the default is too loose.

```blade
<x-bladewind::card padding="none">...</x-bladewind::card>
<x-bladewind::card padding="tiny">...</x-bladewind::card>      {{-- p-2 --}}
<x-bladewind::card padding="small">...</x-bladewind::card>     {{-- p-4 --}}
<x-bladewind::card padding="regular">...</x-bladewind::card>   {{-- p-6, the default --}}
<x-bladewind::card padding="medium">...</x-bladewind::card>    {{-- p-8 --}}
<x-bladewind::card padding="big">...</x-bladewind::card>       {{-- p-10 --}}
<x-bladewind::card padding="large">...</x-bladewind::card>     {{-- p-12 --}}
<x-bladewind::card padding="p-5">...</x-bladewind::card>       {{-- or a utility verbatim --}}
```

`compact` and `no_padding` still behave exactly as before; an explicit `padding` wins over both.

`radius` also supports `none`, `tiny`, `small`, `medium`, `large`, `xl`, `omg`, and `full`. Anything that already looks like a Tailwind radius utility passes straight through, so `radius="rounded-l-none"` works for attaching a card to something on its left.

## Attributes

### Card Component

| Attribute | Default | Description |
|---|---|---|
| title | *blank* | Any title provided becomes the card heading. |
| header | *blank* | Once a header slot is defined, the card splits into two uneven horizontal parts; header content displays first. |
| footer | *blank* | Once a footer slot is defined, its content is fixed to the base of the card. |
| compact | false | Reduces padding in the card. Only applies if header and footer aren't set. `true` \| `false` |
| no_padding | false | Completely removes padding within the card; content touches the edges. `true` \| `false` |
| has_shadow | true | Whether the card has a shadow effect. `true` \| `false` |
| has_hover | false | Displays an extra shadow on hover. `true` \| `false` |
| url | null | Url visited when the card is clicked. A path like `/some-url` uses the `redirect()` JS helper; a function call like `performSomeAction(some_id)` triggers `javascript:performSomeAction(some_id)`; a full url like `https://mydomain.com/some-url` opens with `window.open()`. |
| radius | small | `none` \| `small` \| `medium` \| `large` \| `xl` |
| class | bw-card | Any additional css classes, e.g. `class="!rounded-none"`. |
| padding | *blank* | Padding scale, or any Tailwind padding utility verbatim. Wins over `compact` and `no_padding`. `none` \| `tiny` \| `small` \| `regular` \| `medium` \| `big` \| `large` |

### Contact Card Component

| Attribute | Default | Description |
|---|---|---|
| name | *blank* | Name of the contact. |
| department | *blank* | Department of the contact. |
| position | *blank* | Designation or position of the contact. |
| image | *bladewind/images/avatar.png* | Picture of the contact. |
| email | *blank* | Email of the contact. |
| birthday | *blank* | Birthday of the contact. |
| mobile | *blank* | Mobile of the contact. |
| has_shadow | true | Whether the card has a shadow effect. `true` \| `false` |
| has_hover | false | Displays an extra shadow on hover. `true` \| `false` |
| centered | false | Displays the contact card vertically. `true` \| `false` |
| no_padding | false | Completely removes padding within the card. `true` \| `false` |
| url | null | Url visited when the card is clicked. Same behaviour as the Card component's `url`. |
| class | bw-contact-card | Any additional css classes, e.g. `class="!rounded-none"`. |

## Full Example

```blade
<x-bladewind::card
    title="recent updates"
    has_shadow="true"
    has_hover="false"
    compact="false"
    no_padding="true"
    radius="large"
    url="/user"
    class="!rounded-none">
    <x-slot:header>...</x-slot:header>
    <x-slot:footer>...</x-slot:footer>
    ...
</x-bladewind::card>

<x-bladewind::contact-card
    name="Michael K. Ocansey"
    mobile="+233.123.456.789"
    image="/path/to/the/image/file"
    position="Senior Copywriter"
    email="mike@bladewindui.com"
    department="Tech"
    birthday="01-May-2000"
    has_hover="true"
    centered="true"
    no_padding="true"
    url="viewUserDetails(id)"
    class="!rounded-none">
    // you can define additional content here
    ...
</x-bladewind::contact-card>
```
