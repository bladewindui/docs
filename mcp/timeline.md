---
title: Timeline Component
component: x-bladewind::timeline
url: /component/timeline
---

# Timeline

Displays information in chronological order as a feed-like view. Originally designed for a date + event pairing, it can display any information as a feed. The date format is entirely up to you — the component just expects a string in the optional `date` attribute.

## Basic Usage

```blade
<x-bladewind::timeline date="10 days ago" content="You signed up"/>
<x-bladewind::timeline date="8 days ago" content="Customer rep assigned"/>
<x-bladewind::timeline date="8 days ago" content="Customer rep called"/>
<x-bladewind::timeline content="Account is being reviewed"/>
<x-bladewind::timeline content="Account activated"/>
```

## Bigger Anchors

By default each timeline anchors on a small transparent circle. Set `anchor="big"` for bigger circles. You can mix big and small anchors within the same timeline series.

```blade
<x-bladewind::timeline anchor="big" date="10 days ago" content="You signed up"/>
```

## Completed

Set `completed="true"` to mark a timeline event as completed. Completed events show filled circles and a checkmark instead of transparent dots. The checkmark only appears when `anchor="big"`; otherwise it's just a filled circle. You can also use a different icon instead of the checkmark for completed anchors.

```blade
<x-bladewind::timeline completed="true" date="10 days ago" content="You signed up"/>
<x-bladewind::timeline completed="true" anchor="big" date="10 days ago" content="You signed up"/>
```

## Stacked Timelines

By default dates are on the left and events on the right. Set `stacked="true"` to stack dates on top of events instead — content then displays fully to the right of the anchor.

```blade
<x-bladewind::timelines stacked="true">
    <x-bladewind::timeline date="just now" content="database server restarted" />
    <x-bladewind::timeline date="30 minutes ago">
        <x-slot:content>
            <a>2 endpoints</a> are failing on bladewindui-data EC2
            bucket. You may want to login and check the logs
        </x-slot:content>
    </x-bladewind::timeline>
    <x-bladewind::timeline date="1 hour ago">
        <x-slot:content>
            There have been 200 failed log in attempts from
            <a>mike@bladewindui.com</a>. Possibly a DDos attack
            attempt. Secure the server.
        </x-slot:content>
    </x-bladewind::timeline>
    <x-bladewind::timeline date="Yesterday"
        content="Data recovery completed with 2 errors" />
</x-bladewind::timelines>
```

Wrapping timelines in `x-bladewind::timelines` is optional but saves you from repeating `stacked="true"` on every `x-bladewind::timeline`; the alternative is setting it individually on each one.

```blade
<x-bladewind::timelines
    completed="true"
    anchor="big"
    stacked="true">

    <x-bladewind::timeline
        date="just now"
        content="database server restarted" />
    ...
</x-bladewind::timelines>
```

## Anchor Icons and Avatars

Thanks to the Icon component, embedding icons in the Timeline is easy. By default, completed events show a checkmark if `anchor="big"`. Any Heroicons icon can be used as the anchor with `icon="name-of-icon"`. Use different icons per timeline, or set `icon` on the wrapping `x-bladewind::timelines` component to apply the same icon to all. Icons and avatars only work when `anchor="big"`.

```blade
<x-bladewind::timelines anchor="big" completed="true">
    <x-bladewind::timeline
        date="10 days ago"
        content="You signed up"
        icon="bell-alert" />

    <x-bladewind::timeline
        date="8 days ago"
        content="Customer rep assigned"
        icon="bolt" />

    <x-bladewind::timeline
        content="Account is being reviewed"
        icon="key"
        completed="false" />
</x-bladewind::timelines>
```

Using the Avatar component, set `avatar="url-to-image"` to use an avatar as the anchor instead. Avatars use the Avatar component's `size="small"` by default.

```blade
<x-bladewind::timelines>
    <x-bladewind::timeline
        date="10 days ago"
        content="You signed up"
        avatar="/assets/images/pic1.jpg" />

    <x-bladewind::timeline
        date="8 days ago"
        content="Customer rep assigned"
        avatar="/assets/images/pic2.jpg" />
    ...
</x-bladewind::timelines>
```

## Positioning and Aligning Timelines

The Timeline component fills its parent's width and centres itself by default. Dates display on the left and events on the right of the anchor, unless stacked. You can only position an `x-bladewind::timelines` component (not individual timelines), to either `left` or `center`. Positioning looks nicer when timelines are stacked.

```blade
<x-bladewind::timelines
    position="left"
    anchor="big">

    <x-bladewind::timeline
        date="10 days ago"
        content="You signed up"
        avatar="/assets/images/pic1.jpg" />
    ...
</x-bladewind::timelines>
```

Left positioning for stacked timelines fills the entire width of the page; place it in a fixed-width parent element if you don't want that.

```blade
<x-bladewind::timelines
    position="left"
    stacked="true"
    color="pink">

    <x-bladewind::timeline date="30 minutes ago">
         <x-slot:content>
            <a>2 endpoints</a> are failing on
            bladewindui-data EC2 bucket.
            You may want to login and check the logs
        </x-slot:content>
    </x-bladewind::timeline>
    ...
</x-bladewind::timelines>
```

Alignment only works for stacked timelines and only on the `x-bladewind::timeline` component itself. By default, stacked content is aligned to the right of the anchor; set `align_left="true"` on a specific timeline to flip it left. Left alignment works only when the timeline group has `position="center"`.

```blade
<x-bladewind::timelines position="center">
    <x-bladewind::timeline
        date="just now"
        content="database server restarted"
        align_left="true" />

    <x-bladewind::timeline date="30 minutes ago">
        <x-slot:content>
            <a>2 endpoints</a> are failing on
            bladewindui-data EC2 bucket. You may want to login
            and check the logs
        </x-slot:content>
    </x-bladewind::timeline>

    <x-bladewind::timeline
        date="1 hour ago"
        align_left="true">
        <x-slot:content>
            There have been 200 failed log in attempts from
            <a>mike@bladewindui.com</a>.
            Possibly a DDos attack attempt.
            Secure the server.
        </x-slot:content>
    </x-bladewind::timeline>

    <x-bladewind::timeline
        date="Yesterday"
        content="Data recovery completed with 2 errors" />
</x-bladewind::timelines>
```

## No Trailing Line

Each timeline draws a trailing line after it. To remove it after the last item, set `last="true"` on that timeline, telling the component it's the last item in the list.

```blade
<x-bladewind::timeline
    date="10 days ago"
    content="You signed up" />
...
<x-bladewind::timeline
    content="Account activated"
    last="true" />
```

## Different Colours

Like most other components, timelines support all our colours. Colours apply per-timeline, so a group can mix colours, though typically you'll use one colour per group.

```blade
<x-bladewind::timeline
    date="10 days ago"
    content="You signed up"
    color="pink"
    completed="true" />

<x-bladewind::timeline
    date="8 days ago"
    content="Customer rep assigned"
    color="orange" />

<x-bladewind::timeline
    date="8 days ago"
    content="Customer rep called"
    color="green" />

<x-bladewind::timeline
    content="Account is being reviewed"
    color="purple" />

<x-bladewind::timeline
    content="Account activated"
    color="gray" />
```

## Attributes

### Timeline Group Component

| Attribute | Default | Description |
|---|---|---|
| completed | false | Whether all timelines in the group are completed. `true` \| `false` |
| stacked | false | Whether the date is stacked on top of the content. `true` \| `false` |
| anchor | small | Anchor size. `small` \| `big` |
| anchor_css | *blank* | Additional TailwindCSS classes for the anchor. |
| icon | *blank* | Any Heroicons icon name, applied to all timelines in the group. |
| icon_css | *blank* | Additional TailwindCSS classes for the icon. |
| date_css | *blank* | Additional TailwindCSS classes for the date. |
| position | center | How the timeline group is positioned in its parent. `left` \| `center` |
| color | blue | Timeline colour. `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `black` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |

### Timeline Component

| Attribute | Default | Description |
|---|---|---|
| date | *blank* | String. Date shown left of the anchor or above the content when stacked. |
| date_css | *blank* | Additional TailwindCSS classes for the date. |
| avatar | *blank* | Path to an image to display in the anchor. |
| avatar_css | *blank* | Additional TailwindCSS classes for the avatar. |
| content | *blank* | Also `label`. The content corresponding to the `date`. |
| last | false | Whether this is the last timeline in the group. `true` \| `false` |
| align_left | false | Whether the timeline is left aligned. Only works if `stacked="true"`. `true` \| `false` |
| completed | false | Whether the timeline is completed. `true` \| `false` |
| stacked | false | Whether the date is stacked on top of the content. `true` \| `false` |
| anchor | small | Anchor size. `small` \| `big` |
| anchor_css | *blank* | Additional TailwindCSS classes for the anchor. |
| icon | *blank* | Any Heroicons icon name for this timeline's anchor. |
| icon_css | *blank* | Additional TailwindCSS classes for the icon. |
| color | blue | Timeline colour. `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `black` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |

## Full Example

```blade
<x-bladewind::timelines
    stacked="true"
    anchor="big"
    anchor_css="pl-9"
    color="pink"
    icon="briefcase"
    icon_css="pl-9"
    date_css="tracking-wider"
    position="left"
    completed="true" />

<x-bladewind::timeline
    stacked="true"
    anchor="big"
    anchor_css="pl-9"
    color="pink"
    icon="briefcase"
    icon_css="pl-9"
    date="9 days ago"
    date_css="tracking-wider"
    align_left="true"
    avatar="/assets/images/me.jpg"
    avatar_css="rounded-0"
    content="I am a timeline"
    completed="true" />
```
