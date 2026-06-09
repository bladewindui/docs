---
title: Card Component
component: x-bladewind::card
url: /component/card
---

# Card

This component makes it easy to display content in a card layout. What you get by default is a very basic card. Considering different people have very different card needs, the content of the card is absolutely up to the user. There is provision for some very specific card use cases: you can specify if the card has a header and a footer. There are also contact cards which are very specific for displaying contact details.

## Basic Card

This just gives you the card frame with the option to define a heading text or card title.

```blade
<x-bladewind::card>
    // the card content goes here
</x-bladewind::card>
```

```blade
<x-bladewind::card title="recent activity">
    // the card content goes here
</x-bladewind::card>
```

## Different Radii

The card component comes with predefined radii which correspond to specific TailwindCSS classes for roundness. The default value is `small` which corresponds to Tailwind's `rounded-lg` class. To change the card's border radius, specify the `radius` attribute.

```blade
<x-bladewind::card radius="none">
    // content
</x-bladewind::card>
```

```blade
<x-bladewind::card radius="small">
    // content
</x-bladewind::card>
```

```blade
<x-bladewind::card radius="medium">
    // content
</x-bladewind::card>
```

```blade
<x-bladewind::card radius="large">
    // content
</x-bladewind::card>
```

```blade
<x-bladewind::card radius="xl">
    // content
</x-bladewind::card>
```

If you need to completely overwrite the radius of the card, you can specify any of the Tailwind classes used for roundness in the `class` attribute.

## Practical Examples

### Invoice Table

Below is an example of an invoice table sitting in a basic BladewindUI Card.

```blade
<x-bladewind::card title="invoice details">

    <x-bladewind.table striped="true">
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
        ...
    </x-bladewind.table>

</x-bladewind::card>
```

### Huge Navigation Items

Below is an example of a grid-based navigation that uses cards for its menu items. The hover effect is achieved by adding additional TailwindCSS classes to the `class` attribute of the card.

```blade
<div class="grid grid-cols-3 gap-5">

    <x-bladewind::card class="cursor-pointer hover:shadow-gray-300">
        <svg ...>...</svg>
        <span class="text-center ...">Projects</span>
    </x-bladewind::card>

    <x-bladewind::card class="cursor-pointer hover:shadow-gray-300">
        <svg...>...</svg>
        <span class="text-center ...">Tasks</span>
    </x-bladewind::card>

    <x-bladewind::card class="cursor-pointer hover:shadow-gray-300">
        <svg...>...</svg>
        <span class="text-center ...">Ideas</span>
    </x-bladewind::card>

</div>
```

### Contact List

Below is an example of a contact list using the `compact` mode.

```blade
<div class="grid grid-cols-2 gap-3">

    <x-bladewind::card compact="true">
        <div class="flex items-center">
            <div>
                <x-bladewind.avatar image="/path/to/the/image/file" />
            </div>
            <div class="grow pl-2 pt-1">
                <b>Michael K. Ocansey</b>
                <div class="text-sm">Senior Developer</div>
                <div class="text-sm">Tech Team</div>
            </div>
            <div>
                <a href="">
                    <svg>
                        ...
                    </svg>
                </a>
            </div>
        </div>
    </x-bladewind::card>

    <x-bladewind::card compact="true">
        ...
    </x-bladewind::card>

</div>
```

## Contact Card

This card component is very specific to rendering contacts. It saves you from having to manually build a contact card. A default avatar is used if one is not provided.

```blade
<x-bladewind.contact-card
    name="Michael K. Ocansey"
    mobile="+233.123.456.789"
    image="/path/to/the/image/file"
    position="Senior Copywriter"
    email="mike@bladewindui.com"
    birthday="01-May-2000" />
```

Setting `centered="true"` reformats the contact card and vertically aligns and centers the content.

## Header and Footer

You can specify a header and footer for the card component. This is set up as a slot so there is really no restriction to what goes inside the header and footer. Headers and footers are independent so you don't need to explicitly specify both. When the `header` slot is set, the main body of the card loses all its padding so you will need to style the card body as you wish.

```blade
<x-bladewind::card>

    <x-slot:header>
        <div class="flex px-4 pt-2 pb-3">
            <x-bladewind.avatar
                size="small"
                image="/path/to/the/image/file" />
            <div class="pl-2">
                <span class="block...">mkocansey</span>
                <span class="block...">Greater Accra, Accra</span>
            </div>
        </div>
    </x-slot:header>

    <img src="/path/to/the/image/file" />

    <x-slot:footer>
        <div class="flex justify-between p-4">
            <div class="flex space-x-4">
                <x-bladewind.icon name="heart" class="h-8 w-8..." />
                <x-bladewind.icon name="chat-bubble-oval-left-ellipsis" class="h-8 w-8..." />
                <x-bladewind.icon name="arrow-uturn-left" class="h-8 w-8..." />
            </div>
            <div>
                <svg> ... </svg>
            </div>
        </div>
    </x-slot:footer>

</x-bladewind::card>
```

## Attributes

### Card Component Attributes

| Attribute | Default | Description |
|---|---|---|
| title | _blank_ | Any title provided will become the card heading. |
| header | _blank_ | Once a header slot is defined, the card splits into two uneven horizontal parts. The content of the header slot will be displayed first. |
| footer | _blank_ | Once a footer slot is defined, the content of the slot gets fixed to the base of the card as a footer. |
| compact | false | This controls how much padding is in the card. Setting this to `true` will reduce the padding. Only works if header and footer are not set. `true` \| `false` |
| no_padding | false | This completely removes the padding within the card. Content will touch the edges of the card. `true` \| `false` |
| has_shadow | true | This controls if the card should have a shadow effect. `true` \| `false` |
| has_hover | false | Displays an extra shadow on hover of the card. `true` \| `false` |
| url | null | Url to visit when the card is clicked. A path like `"/some-url"` uses the Bladewind `redirect()` helper. A function call like `"performSomeAction(some_id)"` triggers `javascript:performSomeAction(some_id)`. A full URL like `"https://..."` uses `window.open()`. |
| radius | small | Increases the roundness of the card. `none` \| `small` \| `medium` \| `large` \| `xl` |
| class | bw-card | Any additional css classes can be added using this attribute. |

### Contact Card Component Attributes

| Attribute | Default | Description |
|---|---|---|
| name | _blank_ | Name of the contact. |
| department | _blank_ | Department of the contact. |
| position | _blank_ | Designation or position of the contact. |
| image | _bladewind/images/avatar.png_ | Picture of the contact. |
| email | _blank_ | Email of the contact. |
| birthday | _blank_ | Birthday of the contact. |
| mobile | _blank_ | Mobile of the contact. |
| has_shadow | true | This controls if the card should have a shadow effect. `true` \| `false` |
| has_hover | false | Displays an extra shadow on hover of the card. `true` \| `false` |
| centered | false | Displays contact card vertically. `true` \| `false` |
| no_padding | false | This completely removes the padding within the card. `true` \| `false` |
| url | null | Url to visit when the card is clicked. Same URL behavior as the Card component. |
| class | bw-contact-card | Any additional css classes can be added using this attribute. |

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
```

```blade
<x-bladewind.contact-card
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

</x-bladewind.contact-card>
```
