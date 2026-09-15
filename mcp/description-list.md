---
title: Description List Component
component: x-bladewind::description-list
url: /component/description-list
---

# Description List

`x-bladewind::description-list` and `x-bladewind::description-list.item` present label and value pairs, such as a profile, a record's details, or an order summary. It renders as a real semantic `<dl>`, stacked on mobile and laid out label-beside-value from the `sm` breakpoint up.

```blade
<x-bladewind::description-list>
    <x-bladewind::description-list.item label="Full name">Jane Cooper</x-bladewind::description-list.item>
    <x-bladewind::description-list.item label="Email address">jane.cooper@example.com</x-bladewind::description-list.item>
    <x-bladewind::description-list.item label="Role">Admin</x-bladewind::description-list.item>
</x-bladewind::description-list>
```

## Action Slots

Give an item an `action` slot for a control shown beside its value, such as an edit link or a copy button.

```blade
<x-bladewind::description-list.item label="Email address">
    jane.cooper@example.com
    <x-slot:action>
        <a href="#">Edit</a>
    </x-slot:action>
</x-bladewind::description-list.item>
```

## Striped Rows

Set `striped` on the list to alternate a subtle background on every row. It propagates from the list to each item automatically.

```blade
<x-bladewind::description-list striped="true">
    <x-bladewind::description-list.item label="Plan">Pro</x-bladewind::description-list.item>
    <x-bladewind::description-list.item label="Renews">March 4, 2027</x-bladewind::description-list.item>
    <x-bladewind::description-list.item label="Seats">12 of 20 used</x-bladewind::description-list.item>
</x-bladewind::description-list>
```

## Attributes

### Description List Component

| Attribute | Default | Description |
|---|---|---|
| divided | true | Determines if a horizontal rule is shown between rows. `true` \| `false` |
| striped | false | Alternates a subtle background on every row. Propagates to items automatically. `true` \| `false` |
| class | _blank_ | Any additional CSS you wish to add to the wrapper element. |

### Description List Item Component

| Attribute | Default | Description |
|---|---|---|
| label | _blank_ | The row's label. |
| action | _none_ | A named slot rendered beside the value. |
| class | _blank_ | Any additional CSS you wish to add to the row. |
