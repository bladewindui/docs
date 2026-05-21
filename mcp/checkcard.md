---
title: CheckCard Component
component: x-bladewind::checkcards
url: /component/checkcard
---

# CheckCard

This component is simply a prettier version of checkboxes. Define content in a card that needs to be checkable and give it a `value`. This value is what will be passed when the form is selected. In its simplest form this is just a card with content you provide.

The selectable card takes up the width of its parent element. If you don't want the cards to take up the entire width you will need to restrict this using flex or grids.

## Basic Usage

```blade
<x-bladewind::checkcards name="hosting">
    <x-bladewind::checkcards.card value="dOcean">
        DigitalOcean
    </x-bladewind::checkcards.card>
</x-bladewind::checkcards>
```

For convenience the component provides a `title` attribute that can also be passed in as a slot if you prefer some more customized styling of the title.

```blade
<x-bladewind::checkcards name="hosting-3" max="3">
    <div class="grid grid-cols-2 gap-4">
        <x-bladewind::checkcards.card value="AWS"
            title="Amazon Web Services">
            A subsidiary of Amazon that provides on-demand ...
        </x-bladewind::checkcards.card>
    ...
    </div>
</x-bladewind::checkcards>
```

### Compact Mode

```blade
<x-bladewind::checkcards name="hosting-compact" compact="true">
    <x-bladewind::checkcards.card value="dOcean">
        DigitalOcean
    </x-bladewind::checkcards.card>
</x-bladewind::checkcards>
```

## Max Selection

By default only one card can be selected at a time. You can increase this by setting the `max` attribute to a positive integer greater than zero. The example below sets `max="3"`, meaning only 3 cards can be selected.

```blade
<x-bladewind::checkcards name="hosting-small" max="3">
    <div class="grid grid-cols-3 gap-4">
        <x-bladewind::checkcards.card name="hosting" value="AWS">
            Amazon Web Services
        </x-bladewind::checkcards.card>

        <x-bladewind::checkcards.card name="hosting" value="azure">
            Microsoft Azure
        </x-bladewind::checkcards.card>

        <x-bladewind::checkcards.card name="hosting" value="dOcean">
            DigitalOcean
        </x-bladewind::checkcards.card>
    ...
    </div>
</x-bladewind::checkcards>
```

### Max Selection Error Messages

If the user tries to select a card when the max has already been selected, you can either display an error message or say nothing. By default no error message is displayed. To display errors you will need to set `show_error="true"`. The error message is displayed in the [Notification](/component/notification) component. Ensure this component is included on any page where you want to use Checkable cards with errors. The actual error message to display can be defined by setting the `error_heading` and `error_message` attributes. If you don't specify these two attributes, the defaults will be used.

```blade
<x-bladewind::checkcards
    name="hosting-auto"
    show_error="true"
    max="3"
    auto_select_new="false">
    <div class="grid grid-cols-3 gap-4">
        <x-bladewind::checkcards.card name="hosting" value="AWS">
            Amazon Web Services
        </x-bladewind::checkcards.card>
    ...
    </div>
</x-bladewind::checkcards>
```

## Automatically Select New Cards

From the max selection example above, you will notice every time three cards are selected, clicking on a fourth card automatically clears the third card that was previously selected. This is the default behaviour, to always preserve the number of cards you want selected without blocking the user. If you prefer to prevent users from selecting new cards when the max has been reached, set `auto_select_new="false"`. Users will now need to unselect one card to make room for a new selection.

```blade
<x-bladewind::checkcards
    name="hosting-auto"
    show_error="true"
    max="3"
    auto_select_new="false">
    <div class="grid grid-cols-3 gap-4">
        <x-bladewind::checkcards.card name="hosting" value="AWS">
            Amazon Web Services
        </x-bladewind::checkcards.card>
    ...
    </div>
</x-bladewind::checkcards>
```

## Icons and Avatars

By design the Checkcard component simply makes it easy for you to have checkboxes designed as cards. The content of the card solely relies on you. However, for convenience, the component allows you to specify an icon to use in the card. This uses the [Icon](/component/icon) component with some features stripped out. To use an icon, simply specify the name of the icon you want to use in the `icon` attribute. The `icon_css` attribute allows you to specify additional CSS classes for the icon.

The colour of the icon is determined by the value of the `color` attribute. The default value is `primary`. You can specify any of the [colours](/customize/colours) available in BladewindUI.

```blade
<x-bladewind::checkcards name="hosting-icons">
    <div class="grid grid-cols-2 gap-4">
        <x-bladewind::checkcards.card
            value="AWS" title="AWS"
            icon="cloud-arrow-up">
            A copy of your messages will be backed up to Amazon Web Services ...
        </x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card value="gdrive" title="Google Drive"
            icon="circle-stack">
            A copy of your messages will be backed up to Google Drive ...
        </x-bladewind::checkcards.card>
    </div>
</x-bladewind::checkcards>
```

### Avatars

Avatars can be used instead of icons. This also relies on a stripped down version of the BladewindUI [Avatar](/component/avatar) component. When an avatar name is three characters or less, a label is used instead of an image. The colour of the avatar is determined by the value of the `color` attribute. The default value is `primary`. You can specify any of the [colours](/customize/colours) available in BladewindUI.

```blade
<x-bladewind::checkcards name="hosting-avatar" max="2">
    <div class="grid grid-cols-2 gap-4">
        <x-bladewind::checkcards.card
            value="mike" title="Michael Ocansey"
            avatar="/assets/images/me.jpeg">
            Follow Michael K. Ocansey to know when they post a...
        </x-bladewind::checkcards.card>
        <x-bladewind::checkcards.card
            value="francis"
            title="Francis Appiah"
            avatar="/assets/images/francis.png">
            Follow Francis Appiah to know when they post any new ...
        </x-bladewind::checkcards.card>
    </div>
</x-bladewind::checkcards>
```

## Colours

The border colour can be changed by setting the `border_color` attribute. The colour of icons and avatar labels can also be changed by setting the `color` attribute. You can specify any of the [colours](/customize/colours) available in BladewindUI. The checkmark icon colour changes to match the colour of the border.

```blade
<x-bladewind::checkcards name="hosting-colours"
    border_color="orange" color="orange">
    <div class="grid grid-cols-2 gap-4">
        <x-bladewind::checkcards.card
            value="AWS" title="AWS" icon="cloud-arrow-up">
            Your messages will be backed up to Amazon Web Services.
        </x-bladewind::checkcards.card>
        ...
    </div>
</x-bladewind::checkcards>
```

## Form Submission

Checkable cards can be used within forms as a substitute for checkboxes or radio buttons. The `name` specified is what will be accessed when the form is submitted. Selecting multiple values results in a comma separated list being passed when the form is submitted.

Using the **hosting** name from our examples above, after submitting the form the value of the hosting checkcards can be accessed using any of the following ways permitted in Laravel.

```blade
$request->get('hosting');
$request->input('hosting');
$request->hosting;
```

## Attributes

### Checkcards Component

This is the parent tag for defining Checkcards.

| Attribute | Default | Description |
|---|---|---|
| name | null | Name to be accessed when checkcard selections are submitted in a form. |
| color | gray | `primary` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `indigo` \| `fuchsia` \| `violet` |
| max | 1 | How many checkcards can be selected at a time. Any positive number > 0. |
| required | false | Determines if checkcards are required when displayed in a form. `true` \| `false` |
| selected_value | _(empty string)_ | In edit mode you will want selected checkcards to be selected by default. Set the values as a comma separated list. |
| error_message | _(empty string)_ | Message to display when `max` is set and user selection exceeds the max allowed. |
| error_heading | Error | Heading to display in the notification when displaying an error message. |
| icon | null | Display an icon prefix. You can use any icon from Heroicons. |
| avatar | null | Display an avatar as an image or label. If this is less than 4 characters, the avatar will be displayed as a label. |
| avatar_size | medium | Determine size of the avatar to display. `tiny` \| `small` \| `medium` \| `regular` \| `big` \| `huge` \| `omg` |
| compact | false | Should the checkcards be displayed with less padding around them. `true` \| `false` |
| border_color | gray | `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `gray` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| border_width | 2 | How thick should the border of the card be. `2` \| `4` \| `8` |
| radius | medium | Determines the roundness of the card. `none` \| `small` \| `medium` \| `full` |
| show_error | false | Should error messages be displayed when user has selected `max` cards. `true` \| `false` |
| align_items | top | Determines alignment of avatar/icons. `top` \| `center` |
| auto_select_new | true | Determines if selecting a new card unselects the last card. This ensures the user always selects `max` cards without displaying an error. `true` \| `false` |
| class | _(blank)_ | Any additional CSS you wish to add to the checkcards container. |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts. |

### Checkcard Component

| Attribute | Default | Description |
|---|---|---|
| class | _(blank)_ | Any additional CSS to append to the card. |
| title | _(blank)_ | The text to display as title of the card. |
| value | _(blank)_ | Value to pass when card is selected and form is submitted. |
| icon | null | Display an icon prefix. You can use any icon from Heroicons. |
| avatar | null | Display an avatar as an image or label. If this is less than 4 characters, the avatar will be displayed as a label. |
| avatar_size | medium | Determine size of the avatar to display. `tiny` \| `small` \| `medium` \| `regular` \| `big` \| `huge` \| `omg` |
| icon_css | _(blank)_ | Additional CSS to append to the icon. |

## Full Example

```blade
<x-bladewind::checkcards
    name="hosting"
    icon="calculator",
    avatar="OK",
    avatar_size="medium",
    class="",
    required="false",
    max="3",
    compact="false",
    color="primary",
    radius="medium",
    border_width="2",
    border_color="gray",
    align_items="top",
    show_error="false",
    auto_select_new="true",
    selected_value="azure,google"
    error_message="You can select only up to 3 companies"
    error_heading="Check selection!">
```

```blade
<x-bladewind::checkcards.card
    title="Amazon Web Services"
    value="aws"
    icon="calculator",
    avatar="OK",
    avatar_size="medium",
    class=""
    icon_css="size-13" />
```
