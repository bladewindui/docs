---
title: Scheduler Component
component: x-bladewind::scheduler
url: /component/scheduler
---

# Scheduler

The scheduler component lays out a day or a week as an hour grid and places timed events on it, the pattern behind a room booking board, a staff roster, or an appointment calendar. Give it a `date` and, for day view, a list of `resources` such as rooms or staff members. Each resource becomes its own column, and events are placed by their start and end time. Two events that overlap share their column side by side instead of stacking on top of each other.

```blade
<x-bladewind::scheduler
    date="2027-03-10"
    :resources="[
        ['id' => 'room-a', 'label' => 'Room A'],
        ['id' => 'room-b', 'label' => 'Room B'],
        ['id' => 'room-c', 'label' => 'Room C'],
    ]"
    :events="[
        ['id' => 1, 'resource_id' => 'room-a', 'label' => 'Team standup', 'start' => '2027-03-10 09:00', 'end' => '2027-03-10 09:30', 'color' => 'primary'],
        ...
    ]">
</x-bladewind::scheduler>
```

## Week View

Set `view="week"` to show the seven days of the week containing `date` as columns instead. Resources are not used in week view.

```blade
<x-bladewind::scheduler view="week" date="2027-03-10" :events="$events">
</x-bladewind::scheduler>
```

## Visible Hours And Grid Granularity

Set `start_hour` and `end_hour` to the range worth showing, and `slot_minutes` (60, 30, or 15) for finer gridlines.

```blade
<x-bladewind::scheduler
    date="2027-03-10"
    start_hour="12"
    end_hour="16"
    slot_minutes="30"
    :resources="..."
    :events="...">
</x-bladewind::scheduler>
```

## Selection Hooks

Set `on_slot_click` to the name of a JavaScript function to react to a click on an empty slot, called as `(columnId, "H:i")`, where `columnId` is a resource id in day view or a date in week view. Set `on_event_click` to react to a click on an existing event instead, called as `(eventId)`. An event given an `href` renders as a real link and does not fire `on_event_click`.

```blade
<x-bladewind::scheduler
    date="2027-03-10"
    on_slot_click="proposeBooking"
    on_event_click="showBookingDetails"
    :resources="..."
    :events="...">
</x-bladewind::scheduler>

<script>
    function proposeBooking(columnId, time) {
        console.log('Book', columnId, 'at', time);
    }
    function showBookingDetails(eventId) {
        console.log('Show booking', eventId);
    }
</script>
```

## Timezone Label

This component does not convert times itself. Pass event times already converted to the viewer's timezone, and optionally set `timezone` to show a label confirming which one is in use.

```blade
<x-bladewind::scheduler date="2027-03-10" timezone="America/New_York" ...>
</x-bladewind::scheduler>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| view | day | `day` \| `week` |
| date | today | Anchor date (`Y-m-d`). Day view shows just that day; week view shows the week containing it. |
| resources | _empty_ | Day view's columns: `[['id' => 'r1', 'label' => 'Room A'], ...]`. Ignored in week view. |
| events | _empty_ | `['id', 'label', 'start' => 'Y-m-d H:i', 'end' => 'Y-m-d H:i', 'color', 'resource_id', 'href']`. An event outside the visible hour range is clipped to it, not hidden. |
| start_hour | 8 | First visible hour (0-23). |
| end_hour | 18 | Last visible hour, exclusive (1-24). |
| slot_minutes | 30 | Grid line granularity. `60` \| `30` \| `15` |
| week_starts | 1 | First day of the week used by week view. `0` (Sunday) or `1` (Monday) |
| timezone | _blank_ | A display-only label. Convert event times to the viewer's timezone yourself before passing them in. |
| on_slot_click | _blank_ | Name of a JavaScript function called as `(columnId, "H:i")` when an empty slot is clicked. |
| on_event_click | _blank_ | Name of a JavaScript function called as `(eventId)` when an event without an `href` is clicked. |
| class | _blank_ | Additional CSS classes for the wrapper element. |
