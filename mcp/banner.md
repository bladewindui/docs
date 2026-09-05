---
title: Banner Component
component: x-bladewind::banner
url: /component/banner
---

# Banner

The banner component is a page-level or global announcement bar. Where the Alert component sits inline next to the content it relates to, a banner spans the full width of its container, typically at the very top of a page, and stays there for as long as it is relevant. Use it for things everyone visiting the page should notice, such as planned maintenance, an outage that is being worked on, a new feature announcement, or a policy change.

```blade
<x-bladewind::banner>
    Scheduled maintenance runs tonight from 11pm to 1am. Some features may be unavailable.
</x-bladewind::banner>
```

## Tones

There are five tones to choose from, each with a matching colour and default icon.

```blade
<x-bladewind::banner tone="success">Your changes were published successfully.</x-bladewind::banner>
<x-bladewind::banner tone="warning">Your trial ends in 3 days. Add a payment method to keep your account active.</x-bladewind::banner>
<x-bladewind::banner tone="error">Payment failed. Please update your billing details to avoid service interruption.</x-bladewind::banner>
<x-bladewind::banner tone="primary">A new version of the dashboard is available.</x-bladewind::banner>
```

## Title

Give a banner a short bold `title` above its message when the message alone needs more emphasis.

```blade
<x-bladewind::banner tone="warning" title="Action needed">
    Your account will be suspended on March 4, 2027 unless you verify your email address.
</x-bladewind::banner>
```

## Actions

Give a banner an `actions` slot for one or more buttons or links, shown beside the message.

```blade
<x-bladewind::banner tone="primary">
    A new version of the dashboard is available.
    <x-slot:actions>
        <x-bladewind::button size="small" color="white">Learn more</x-bladewind::button>
        <x-bladewind::button size="small">Refresh now</x-bladewind::button>
    </x-slot:actions>
</x-bladewind::banner>
```

## Dismissibility

Banners show a close icon by default. Set `dismissible="false"` when the announcement is important enough that visitors should not be able to hide it.

```blade
<x-bladewind::banner tone="error" dismissible="false">
    The payments system is currently down. We are working on a fix.
</x-bladewind::banner>
```

## Persistence

Dismissing a banner is normally only remembered for the current page view. Give the banner a `persist_key` and its dismissal is remembered in the visitor's browser via `localStorage`, so it stays gone on later visits too. Pick a key that will not clash with any other banner on the site, and change it whenever the announcement itself changes, so returning visitors see the new one.

```blade
<x-bladewind::banner tone="info" persist_key="banner-demo-2027-03">
    We have a new look. Let us know what you think.
</x-bladewind::banner>
```

## Icons

Each tone shows a matching default icon. Set `icon` to use any icon name from [Heroicons](https://heroicons.com) instead, or set `show_icon="false"` to hide it altogether.

```blade
<x-bladewind::banner tone="primary" icon="gift">A new feature just shipped. Take a look.</x-bladewind::banner>
<x-bladewind::banner tone="info" show_icon="false">This banner has no icon.</x-bladewind::banner>
```

## Rounded Corners

By default a banner has square corners, since it usually spans the full width of the page. Set `rounded="true"` when placing it inside a narrower container instead.

```blade
<x-bladewind::banner tone="success" rounded="true">Your export is ready to download.</x-bladewind::banner>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| tone | info | `info` \| `success` \| `warning` \| `error` \| `primary` |
| title | _blank_ | An optional bold heading shown above the message. |
| show_icon | true | Determines if the tone's icon is displayed. `true` \| `false` |
| icon | _blank_ | Use any icon name from [Heroicons](https://heroicons.com) instead of the tone's default icon. |
| dismissible | true | Determines if a close icon is shown so visitors can hide the banner. `true` \| `false` |
| persist_key | _blank_ | Remembers a dismissal in the visitor's browser under this key, so the banner stays hidden on later visits. Leave blank and the banner shows again on every page load. |
| rounded | false | Determines if the banner has rounded corners. `true` \| `false` |
| actions | _none_ | A named slot for one or more buttons or links, shown beside the message. |
| class | _blank_ | Any additional CSS classes you wish to add. |
