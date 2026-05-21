---
title: Alert Component
component: x-bladewind::alert
url: /component/alert
---

# Alert

The alert component displays inline messages intended to get the attention of your users. Alerts come in two shade variants — `faint` (default) and `dark` — and four prebuilt types: `info`, `error`, `warning`, and `success`. Each prebuilt type has a default icon. Custom colours, icons, and avatars are also supported.

For floating/overlay alerts, see the [Notification](/component/notification) component instead.

## Basic Usage

```blade
<x-bladewind::alert>
    Your subscription is expiring in 19 days. <a href="#">Renew now</a>
</x-bladewind::alert>

<x-bladewind::alert type="error">
    You do not have permission to upload files
</x-bladewind::alert>

<x-bladewind::alert type="warning">
    Well, this is your first warning.
</x-bladewind::alert>

<x-bladewind::alert type="success">
    Files were successfully uploaded
</x-bladewind::alert>
```

## Shades

Set `shade="dark"` for a darker background variant.

```blade
<x-bladewind::alert shade="dark">
    Your subscription is expiring in 19 days.
</x-bladewind::alert>

<x-bladewind::alert type="error" shade="dark">
    You do not have permission to upload files
</x-bladewind::alert>
```

## Hiding Icons

By default, alerts show both a type icon and a close icon. Both can be hidden independently.

```blade
{{-- hide the close icon only --}}
<x-bladewind::alert show_close_icon="false">
    Message here
</x-bladewind::alert>

{{-- hide the type icon only --}}
<x-bladewind::alert show_icon="false">
    Message here
</x-bladewind::alert>

{{-- hide both icons --}}
<x-bladewind::alert show_icon="false" show_close_icon="false">
    Message here
</x-bladewind::alert>
```

## Custom Colours

All BladewindUI palette colours are supported on both `faint` and `dark` shades.

```blade
<x-bladewind::alert color="pink">I am a pink alert.</x-bladewind::alert>
<x-bladewind::alert color="pink" shade="dark">I am a pink alert. Dark version.</x-bladewind::alert>
<x-bladewind::alert color="cyan">I am a cyan alert.</x-bladewind::alert>
<x-bladewind::alert color="purple">I am a purple alert.</x-bladewind::alert>
<x-bladewind::alert color="orange">I am an orange alert.</x-bladewind::alert>
<x-bladewind::alert color="violet">I am a violet alert.</x-bladewind::alert>
<x-bladewind::alert color="indigo">I am an indigo alert.</x-bladewind::alert>
<x-bladewind::alert color="fuchsia">I am a fuchsia alert.</x-bladewind::alert>
<x-bladewind::alert color="gray">I am a gray alert.</x-bladewind::alert>
<x-bladewind::alert color="transparent">I am a transparent alert.</x-bladewind::alert>
```

## Custom Icons

The four prebuilt alert types have their own icons. For other colours or types, set the `icon` attribute to any [Heroicons](https://heroicons.com) name.

```blade
<x-bladewind::alert color="indigo" icon="bell-alert">
    No more alarm snoozing. Wake up!
</x-bladewind::alert>

<x-bladewind::alert color="indigo" shade="dark" icon="currency-dollar">
    Your BladewindUI subscription is expiring soon. Pay up!
</x-bladewind::alert>
```

To adjust the icon size, use `icon_avatar_css` with TailwindCSS classes.

```blade
<x-bladewind::alert color="cyan" shade="dark" icon="currency-dollar"
    icon_avatar_css="!h-16 !w-16 opacity-60">
    <div><strong>Subscription overdue</strong></div>
    Your BladewindUI subscription is overdue by 3 months.
</x-bladewind::alert>
```

## Avatars

Use an image as a prefix instead of an icon by setting the `avatar` attribute to an image URL. Avatars are rendered using the [Avatar](/component/avatar) component.

```blade
<x-bladewind::alert color="violet" shade="dark" avatar="/images/jane.jpg">
    Jane has been added to your friends list
</x-bladewind::alert>

{{-- with a ring and larger size --}}
<x-bladewind::alert color="cyan" shade="dark"
    avatar="/images/jane.jpg"
    size="regular"
    show_ring="true">
    <div><strong>New friend request</strong></div>
    Jane C. Doe wants to connect as a friend in your professional network.
    <div class="text-sm opacity-70">2 days ago</div>
</x-bladewind::alert>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| type | info | `info` \| `error` \| `warning` \| `success` |
| shade | faint | `faint` \| `dark` |
| color | _(blank)_ | Override colour: `primary` `blue` `red` `yellow` `green` `purple` `pink` `orange` `black` `cyan` `violet` `indigo` `fuchsia` `gray` `transparent` |
| show_close_icon | true | Show the dismiss (×) icon. String, not boolean. `true` \| `false` |
| show_icon | true | Show the type icon. String, not boolean. `true` \| `false` |
| icon | _(blank)_ | Any [Heroicons](https://heroicons.com) icon name |
| avatar | _(blank)_ | URL to an image to display as a prefix |
| icon_avatar_css | _(blank)_ | Additional TailwindCSS classes for the icon or avatar |
| size | tiny | Avatar size (inherits from Avatar component): `tiny` `small` `regular` `medium` `big` |
| show_ring | false | Show a ring around the avatar. `true` \| `false` |
| class | _(blank)_ | Additional CSS classes applied to the alert wrapper |

## Full Example

```blade
<x-bladewind::alert
    type="warning"
    shade="dark"
    show_close_icon="false"
    show_icon="false"
    color="pink"
    icon="briefcase"
    icon_avatar_css="bg-slate-800"
    show_ring="true"
    avatar="/assets/images/me.jpg"
    size="small"
    class="rounded-lg shadow-sm">
    Stay safe. Wash your hands for 20 seconds
</x-bladewind::alert>
```
