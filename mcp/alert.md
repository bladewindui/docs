---
title: Alert Component
component: x-bladewind::alert
url: /component/alert
---

# Alert

The alert component displays inline messages intended to get the attention of your end users. It comes in two shades, faint and dark (not to be confused with dark mode), and four prebuilt types: `info`, `error`, `warning`, and `success`, each with their own default icon. For a more attention-seeking, floating alert, see the Notification component.

## Basic Usage

```blade
<x-bladewind::alert>
    Your subscription is expiring in 19 days.
    <a href="#">Renew now</a>
</x-bladewind::alert>
```

## Faint Coloured Alerts

By default alerts render in a faint shade. The four prebuilt types are `info` (default), `error`, `warning`, and `success`.

```blade
<x-bladewind::alert>Your subscription is expiring in 19 days. <a href="#">Renew now</a></x-bladewind::alert>

<x-bladewind::alert type="error">You do not have permission to upload files</x-bladewind::alert>

<x-bladewind::alert type="warning">Well, this is your first warning. Do that again and I'll wipe your hard disk</x-bladewind::alert>

<x-bladewind::alert type="success">Files were successfully uploaded</x-bladewind::alert>
```

## Dark Coloured Alerts

Set `shade="dark"` to get darker colours for any alert type.

```blade
<x-bladewind::alert shade="dark">
    Your subscription is expiring in 19 days.
    <a href="#" class="!text-white/70">Renew now</a>
</x-bladewind::alert>

<x-bladewind::alert type="error" shade="dark">You do not have permission to upload files</x-bladewind::alert>

<x-bladewind::alert type="warning" shade="dark">Well, this is your first warning. Do that again and I'll wipe your hard disk</x-bladewind::alert>

<x-bladewind::alert type="success" shade="dark">Files were successfully uploaded</x-bladewind::alert>
```

## Without Icons

By default the alert shows a close icon and a type icon. Both can be turned off independently with `show_icon="false"` and `show_close_icon="false"`.

```blade
<x-bladewind::alert shade="dark" show_icon="false" show_close_icon="false">
    Your subscription is expiring in 19 days.
    <a href="#" class="!text-white/70">Renew now</a>
</x-bladewind::alert>

<x-bladewind::alert type="error" shade="dark" show_close_icon="false">You do not have permission to upload files</x-bladewind::alert>

<x-bladewind::alert type="warning" shade="dark" show_icon="false">Well, this is your first warning.</x-bladewind::alert>
```

## More Colours

The Alert component can be displayed in any of the colours defined in the BladewindUI palette, in both `dark` and `faint` shades: `pink`, `cyan`, `purple`, `gray`, `violet`, `indigo`, `fuchsia`, `orange`, `transparent`, and more.

```blade
<x-bladewind::alert color="pink">I am a pink alert. How do I look?</x-bladewind::alert>
<x-bladewind::alert color="pink" shade="dark">I am a pink alert. Dark version. How do I look?</x-bladewind::alert>

<x-bladewind::alert color="cyan">I am a cyan alert. How do I look?</x-bladewind::alert>
<x-bladewind::alert color="purple">I am a purple alert. How do I look?</x-bladewind::alert>
<x-bladewind::alert color="gray">I am a gray alert. How do I look?</x-bladewind::alert>
<x-bladewind::alert color="violet">I am a violet alert. How do I look?</x-bladewind::alert>
<x-bladewind::alert color="indigo">I am a indigo alert. How do I look?</x-bladewind::alert>
<x-bladewind::alert color="fuchsia">I am a fuchsia alert. How do I look?</x-bladewind::alert>
<x-bladewind::alert color="orange">I am a orange alert. How do I look?</x-bladewind::alert>
<x-bladewind::alert color="transparent">I am a transparent alert. How do I look?</x-bladewind::alert>
```

## Other Icons & Avatars

The four prebuilt alerts (error, warning, info, success) have their own icons; all others do not. Set the `icon` attribute to any Heroicons icon name to display one.

```blade
<x-bladewind::alert color="indigo" icon="bell-alert">No more alarm snoozing. Wake up!</x-bladewind::alert>

<x-bladewind::alert color="indigo" shade="dark" icon="currency-dollar">
    Your BladewindUI subscription is expiring soon. Pay up!
</x-bladewind::alert>
```

If the default icon size does not suit your needs, set `icon_avatar_css` to your preferred TailwindCSS classes.

```blade
<x-bladewind::alert color="cyan" shade="dark" icon="currency-dollar" icon_avatar_css="!h-16 !w-16 opacity-60">
    <div><strong>Subscription overdue</strong></div>
    Your BladewindUI subscription is overdue by 3 months. Please pay before the 30th of this month to
    avoid losing your information.
</x-bladewind::alert>
```

It is also possible to use an avatar instead of an icon, using the Avatar component. The default avatar size is `tiny`; other sizes are available via the `size` attribute.

```blade
<x-bladewind::alert color="violet" shade="dark" avatar="/path/to/image.jpg">
    Jane has been added to your friends list
</x-bladewind::alert>

<x-bladewind::alert color="cyan" shade="dark" avatar="/path/to/image.png" size="regular" show_ring="true">
    <div><strong>New friend request</strong></div>
    Jane C. Doe wants to connect as a friend in your professional network.
    <div class="text-sm opacity-70">2 days ago</div>
</x-bladewind::alert>
```

Alerts are commonly combined with the Dropmenu component to build a notifications list, using `color="transparent"` so each alert blends into the dropdown.

```blade
<x-bladewind::dropmenu trigger="bell-alert-icon" hide_after_click="false">
    <x-bladewind::dropmenu.item header="true">
        <div>You have 5 new notifications</div>
    </x-bladewind::dropmenu.item>
    <x-bladewind::dropmenu.item hover="false">
        <x-bladewind::alert color="transparent" icon="calendar" show_close_icon="false">
            <div><strong>Meeting starts in 5 minutes</strong></div>
            Functional specification meeting
        </x-bladewind::alert>
    </x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| type | info | `info` \| `error` \| `warning` \| `success` |
| shade | faint | `faint` \| `dark` |
| show_close_icon | true | Whether the close icon is shown. Must be set as a string, not a boolean. `true` \| `false` |
| show_icon | true | Whether the alert type icon is displayed. Must be set as a string, not a boolean. `true` \| `false` |
| color | *blank* | Additional colours for the alert background. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `black` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| icon | *blank* | Icon to display as a prefix to the alert message. Any Heroicons icon name. |
| avatar | *blank* | Url to an avatar, displayed as a prefix using the Avatar component. |
| icon_avatar_css | *blank* | Additional css applied to the avatar or icon prefix. Any TailwindCSS classes. |
| size | tiny | Size of the avatar, inherited from the Avatar component. |
| show_ring | false | Whether the avatar displays a ring around it. `true` \| `false` |
| class | *blank* | Any additional css classes, e.g. `class="rounded-lg"`. |

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
    avatar="/path/to/image.jpg"
    size="small"
    class="rounded-lg shadow-sm">
    Stay safe. Wash your hands for 20 seconds
</x-bladewind::alert>
```
