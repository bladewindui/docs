---
title: Checkcard Component
component: x-bladewind::checkcards
url: /component/checkcard
---

# Checkcard

A prettier version of checkboxes. Define content in a card that needs to be checkable and give it a `value` — this is what gets passed when the form is submitted.

## Basic Usage

```blade
<x-bladewind::checkcards name="hosting">
    <x-bladewind::checkcards.card value="dOcean">
        DigitalOcean
    </x-bladewind::checkcards.card>
</x-bladewind::checkcards>
```

Set `compact="true"` on the parent for less padding around each card.

```blade
<x-bladewind::checkcards name="hosting-compact" compact="true">
    <x-bladewind::checkcards.card value="dOcean">
        DigitalOcean
    </x-bladewind::checkcards.card>
</x-bladewind::checkcards>
```

For convenience the card also accepts a `title` attribute (or you can pass a title as your own markup for more customized styling).

```blade
<x-bladewind::checkcards name="hosting-3">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-bladewind::checkcards.card value="AWS" title="Amazon Web Services">
            A subsidiary of Amazon that provides on-demand cloud computing platforms & APIs on a metered, pay-as-you-go basis
        </x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="Azure" title="Microsoft Azure">
            The cloud computing platform developed by Microsoft.
        </x-bladewind::checkcards.card>
    </div>
</x-bladewind::checkcards>
```

The card takes up the full width of its parent element. Restrict this with flex or grid layout if you don't want full-width cards.

## Max Selection

By default only one card can be selected at a time. Set `max` to a positive integer greater than zero to allow more.

```blade
<x-bladewind::checkcards name="hosting-max" max="3">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <x-bladewind::checkcards.card value="AWS">Amazon Web Services</x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="Azure">Microsoft Azure</x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="DO">DigitalOcean</x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="GC">Google Cloud</x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="cloudy">Cloudinary</x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="cf">Cloudflare</x-bladewind::checkcards.card>
    </div>
</x-bladewind::checkcards>
```

### Max Selection Error Messages

By default, selecting past the max shows no error. Set `show_error="true"` to display one, using the Notification component (include it on any page using checkcards with errors). Customize the message with `error_heading` and `error_message`.

```blade
<x-bladewind::checkcards name="hosting-errors" max="3" show_error="true">
    ...
</x-bladewind::checkcards>
```

## Automatically Select New Cards

By default, selecting a new card past the max automatically clears the oldest selected card, preserving the number of selected cards without blocking the user. Set `auto_select_new="false"` to instead prevent new selections until the user manually deselects one.

```blade
<x-bladewind::checkcards name="hosting-auto" max="3" show_error="true" auto_select_new="false">
    ...
</x-bladewind::checkcards>
```

## Icons and Avatars

Specify an icon using the `icon` attribute (uses the Icon component with some features stripped out); `icon_css` adds extra CSS classes to the icon. The icon colour is set via `color` (default `primary`), accepting any of the BladewindUI colours.

```blade
<x-bladewind::checkcards name="hosting-icons">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-bladewind::checkcards.card value="AWS" title="AWS" icon="cloud-arrow-up">
            A copy of your messages will be backed up to Amazon Web Services.
        </x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="gdrive" title="Google Drive" icon="circle-stack">
            A copy of your messages will be backed up to Google Drive.
        </x-bladewind::checkcards.card>
    </div>
</x-bladewind::checkcards>
```

### Avatars

Avatars can be used instead of icons (uses a stripped-down Avatar component). When an avatar name is three characters or less, a label is used instead of an image. Colour is set via `color` on the parent.

```blade
<x-bladewind::checkcards name="hosting-avatar" max="2">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-bladewind::checkcards.card value="mike" title="Michael Ocansey" avatar="/assets/images/me.jpeg">
            Follow Michael K. Ocansey to know when they post any new articles and code snippets.
        </x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="francis" title="Francis Appiah" avatar="/assets/images/francis.png">
            Follow Francis Appiah to know when they post any new articles and code snippets.
        </x-bladewind::checkcards.card>
    </div>
</x-bladewind::checkcards>
```

## Colours

The border colour is set via `border_color` on the parent. The colour of icons and avatar labels is set via `color`. The checkmark icon colour matches the border colour.

```blade
<x-bladewind::checkcards name="hosting-colours" border_color="red">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-bladewind::checkcards.card value="AWS" title="AWS" icon="cloud-arrow-up">
            Your messages will be backed up to Amazon Web Services.
        </x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="gdrive" title="Google Drive" icon="circle-stack">
            Your messages will be backed up to Google Drive.
        </x-bladewind::checkcards.card>
    </div>
</x-bladewind::checkcards>

<x-bladewind::checkcards name="hosting-colours2" border_color="orange" color="orange">
    ...
</x-bladewind::checkcards>

<x-bladewind::checkcards name="hosting-avatar2" max="2" border_color="purple" color="purple">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-bladewind::checkcards.card value="mike" title="Michael Ocansey" avatar="MO">
            Follow Michael K. Ocansey to know when they post any new articles and code snippets.
        </x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="francis" title="Francis Appiah" avatar="FA">
            Follow Francis Appiah to know when they post any new articles and code snippets.
        </x-bladewind::checkcards.card>
    </div>
</x-bladewind::checkcards>
```

## Form Submission

Checkable cards substitute for checkboxes or radio buttons in a form. The `name` given is what's accessed on submission; selecting multiple values results in a comma-separated list.

```php
$request->get('hosting');
$request->input('hosting');
$request->hosting;
```

## Attributes

### Checkcards Component

Parent tag for defining Checkcards.

| Attribute | Default | Description |
|---|---|---|
| name | null | Name to access when checkcard selections are submitted in a form. |
| color | gray | `primary` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `indigo` \| `fuchsia` \| `violet` |
| max | 1 | How many checkcards can be selected at once. Any positive number > 0. |
| required | false | Whether checkcards are required in a form. `true` \| `false` |
| selected_value | *empty string* | Comma-separated list of values selected by default, useful in edit mode. |
| error_message | *empty string* | Message shown when selection exceeds `max`. |
| error_heading | Error | Heading shown in the notification when displaying an error message. |
| icon | null | Icon prefix, any icon from Heroicons. |
| avatar | null | Avatar as an image or label. Under 4 characters renders as a label. |
| avatar_size | medium | `tiny` \| `small` \| `medium` \| `regular` \| `big` \| `huge` \| `omg` |
| compact | false | Display the checkcards with less padding. `true` \| `false` |
| border_color | gray | `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `gray` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| border_width | 2 | `2` \| `4` \| `8` |
| radius | medium | Roundness of the card. `none` \| `small` \| `medium` \| `full` |
| show_error | false | Display an error message when the user has selected `max` cards. `true` \| `false` |
| align_items | top | Alignment of avatar/icons. `top` \| `center` |
| auto_select_new | true | Whether selecting a new card unselects the last one, keeping the selection count at `max`. `true` \| `false` |
| class | *blank* | Any additional CSS for the checkcards container. |
| nonce | null | Nonce value for content security policies applied to inline scripts. Can also be set globally via `config/bladewind.php` under the "script" key. |

### Checkcard Component

| Attribute | Default | Description |
|---|---|---|
| class | *blank* | Any additional CSS to append to the card. |
| title | *blank* | Text to display as the card's title. |
| value | *blank* | Value passed when the card is selected and the form is submitted. |
| icon | null | Icon prefix, any icon from Heroicons. |
| avatar | null | Avatar as an image or label. Under 4 characters renders as a label. |
| avatar_size | medium | `tiny` \| `small` \| `medium` \| `regular` \| `big` \| `huge` \| `omg` |
| icon_css | *blank* | Additional CSS to append to the icon. |

## Full Example

```blade
<x-bladewind::checkcards
    name="hosting"
    icon="calculator"
    avatar="OK"
    avatar_size="medium"
    class=""
    required="false"
    max="3"
    compact="false"
    color="primary"
    radius="medium"
    border_width="2"
    border_color="gray"
    align_items="top"
    show_error="false"
    auto_select_new="true"
    selected_value="azure,google"
    error_message="You can select only up to 3 companies"
    error_heading="Check selection!">

    <x-bladewind::checkcards.card
        title="Amazon Web Services"
        value="aws"
        icon="calculator"
        avatar="OK"
        avatar_size="medium"
        class=""
        icon_css="size-13" />
</x-bladewind::checkcards>
```
