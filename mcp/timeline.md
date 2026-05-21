---
title: Timeline Component
component: x-bladewind::timeline
url: /component/timeline
---

# Timeline

Display information in chronological order using a feed-like view. The `date` attribute accepts any string. Two components work together: `x-bladewind::timelines` (optional wrapper) and `x-bladewind::timeline` (individual items).

## Basic Usage

```blade
<x-bladewind::timeline date="10 days ago" content="You signed up" />
<x-bladewind::timeline date="8 days ago" content="Customer rep assigned" />
<x-bladewind::timeline date="8 days ago" content="Customer rep called" />
<x-bladewind::timeline content="Account is being reviewed" />
<x-bladewind::timeline content="Account activated" />
```

## Bigger Anchors

```blade
<x-bladewind::timeline anchor="big" date="10 days ago" content="You signed up" />
```

## Completed State

Set `completed="true"` to show filled circles. When `anchor="big"`, a checkmark is also displayed.

```blade
<x-bladewind::timeline completed="true" date="10 days ago" content="You signed up" />
<x-bladewind::timeline completed="true" anchor="big" date="8 days ago" content="Customer rep assigned" />
```

## Stacked Timelines

Use `x-bladewind::timelines` as a wrapper to apply shared attributes to all children. When `stacked="true"`, dates appear above content rather than beside it.

```blade
<x-bladewind::timelines stacked="true">

    <x-bladewind::timeline date="just now" content="database server restarted" />

    <x-bladewind::timeline date="30 minutes ago">
        <x-slot:content>
            <a>2 endpoints</a> are failing on bladewindui-data EC2 bucket.
            You may want to login and check the logs
        </x-slot:content>
    </x-bladewind::timeline>

    <x-bladewind::timeline date="Yesterday" content="Data recovery completed with 2 errors" />

</x-bladewind::timelines>
```

Set `completed="true"` on the wrapper to mark all items as complete:

```blade
<x-bladewind::timelines stacked="true" completed="true" anchor="big">
    <x-bladewind::timeline date="just now" content="database server restarted" />
    ...
    {{-- override for a specific item --}}
    <x-bladewind::timeline date="Yesterday" content="Data recovery" completed="false" />
</x-bladewind::timelines>
```

## Anchor Icons and Avatars

Icons and avatars only work when `anchor="big"`.

```blade
{{-- per-item icons --}}
<x-bladewind::timelines anchor="big" completed="true">
    <x-bladewind::timeline date="10 days ago" content="You signed up" icon="bell-alert" />
    <x-bladewind::timeline date="8 days ago" content="Customer rep assigned" icon="bolt" />
    <x-bladewind::timeline content="Account is being reviewed" icon="key" completed="false" />
</x-bladewind::timelines>

{{-- avatars --}}
<x-bladewind::timelines anchor="big">
    <x-bladewind::timeline date="10 days ago" content="You signed up" avatar="/assets/images/pic1.jpg" />
    <x-bladewind::timeline date="8 days ago" content="Customer rep assigned" avatar="/assets/images/pic2.jpg" />
</x-bladewind::timelines>
```

## Positioning

Only `x-bladewind::timelines` can be positioned. Default is `center`.

```blade
<x-bladewind::timelines position="left" anchor="big">
    ...
</x-bladewind::timelines>
```

## Left Alignment (Stacked Only)

In a centered stacked timeline, individual items can be flipped to the left:

```blade
<x-bladewind::timelines stacked="true">
    <x-bladewind::timeline date="just now" content="server restarted" align_left="true" />
    <x-bladewind::timeline date="30 minutes ago" content="endpoints failing" />
</x-bladewind::timelines>
```

## No Trailing Line

Add `last="true"` to the last item to remove the trailing connector line.

```blade
<x-bladewind::timeline content="Account activated" last="true" />
```

## Colours

```blade
<x-bladewind::timeline date="10 days ago" content="You signed up" color="pink" completed="true" />
<x-bladewind::timeline date="8 days ago" content="Customer rep assigned" color="orange" />
<x-bladewind::timeline content="Account is being reviewed" color="purple" />
```

Available colours: `blue` `red` `yellow` `green` `purple` `pink` `orange` `black` `cyan` `violet` `indigo` `fuchsia`

## Attributes

### `x-bladewind::timelines` (wrapper)

| Attribute | Default | Description |
|---|---|---|
| stacked | false | Stack dates above content. `true` \| `false` |
| completed | false | Mark all items as completed. `true` \| `false` |
| anchor | small | Anchor size. `small` \| `big` |
| anchor_css | _(blank)_ | Additional TailwindCSS for the anchor |
| icon | _(blank)_ | Heroicons icon name for all anchors |
| icon_css | _(blank)_ | Additional TailwindCSS for the icon |
| date_css | _(blank)_ | Additional TailwindCSS for dates |
| position | center | Group position in parent. `left` \| `center` |
| color | blue | Colour for all items in the group |

### `x-bladewind::timeline` (item)

| Attribute | Default | Description |
|---|---|---|
| date | _(blank)_ | Date string displayed left of or above content |
| date_css | _(blank)_ | Additional TailwindCSS for the date |
| content | _(blank)_ | Also `label`. The event content or description |
| completed | false | Mark this item as completed. `true` \| `false` |
| stacked | false | Stack date above content. `true` \| `false` |
| anchor | small | Anchor size. `small` \| `big` |
| anchor_css | _(blank)_ | Additional TailwindCSS for the anchor |
| icon | _(blank)_ | Heroicons icon name for this item's anchor |
| icon_css | _(blank)_ | Additional TailwindCSS for the icon |
| avatar | _(blank)_ | Image URL to use as the anchor |
| avatar_css | _(blank)_ | Additional TailwindCSS for the avatar |
| last | false | Remove the trailing connector line. `true` \| `false` |
| align_left | false | Flip a stacked item to left alignment. `true` \| `false` |
| color | blue | Colour for this item |

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
    completed="true">

    <x-bladewind::timeline
        stacked="true"
        anchor="big"
        color="pink"
        icon="briefcase"
        date="9 days ago"
        date_css="tracking-wider"
        align_left="true"
        avatar="/assets/images/me.jpg"
        content="I am a timeline"
        completed="true" />

</x-bladewind::timelines>
```
