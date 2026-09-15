---
title: Calendar Component
component: x-bladewind::calendar
url: /component/calendar
---

# Calendar

Calendar shows events across a month, a week, or a day. It differs from the Datepicker, which is a small popup for picking a single date in a form. Use Calendar when you want to show a schedule, a set of events, or a range of days someone can look at and pick from directly.

The component requires a `name` (used internally and for JavaScript helper functions) and a `label` (announced to screen readers). Everything else, including the events list, is optional.

## Basic Usage

```blade
<x-bladewind::calendar name="team-calendar" label="Team calendar" :events="$teamEvents" />
```

```php
$teamEvents = [
    ['date' => now()->startOfMonth()->addDays(4)->toDateString(), 'label' => 'Sprint planning', 'type' => 'info'],
    ['date' => now()->startOfMonth()->addDays(11)->toDateString(), 'end' => now()->startOfMonth()->addDays(13)->toDateString(), 'label' => 'Team offsite', 'type' => 'success'],
    ['date' => now()->format('Y-m-d').' 09:00', 'end' => now()->format('Y-m-d').' 10:00', 'label' => 'Standup', 'type' => 'info'],
];
```

## Views

The `view` attribute controls how much of the calendar is shown: `month` (default), `week`, or `day`. Three header buttons let visitors switch views if you don't fix one. The `date` attribute (format `Y-m-d`) tells Calendar which day to center on, defaulting to today.

Week view and day view are a full hour-by-hour schedule, similar to Outlook or Google Calendar's week/day views, sharing the same grid — day view is simply narrowed to one column instead of seven.

Set `highlight-today="true"` to tint today's date in month view, or today's whole column in week and day view.

```blade
<x-bladewind::calendar name="highlight-today-demo" label="Highlighted calendar" view="week" highlight-today="true" :events="$teamEvents" />
```

## Selection

The `selectable` attribute controls whether dates can be selected:

- `none` — the default. Dates cannot be selected.
- `single` — selects one date at a time; choosing another replaces the current selection.
- `multiple` — selects multiple dates; clicking a selected date again removes it.

Use `selected` to define dates selected initially — a single `Y-m-d` date, a comma-separated list, or an array.

When selection is enabled, Calendar automatically creates hidden form fields using the `name` attribute (`[]` appended for multiple selections), so selected dates are submitted automatically with the surrounding form.

```blade
<x-bladewind::calendar
    name="availability"
    label="Mark your availability"
    selectable="multiple"
    :selected="[now()->addDays(2)->toDateString(), now()->addDays(5)->toDateString()]" />
```

Calendar does not support picking a start and end date together as one continuous range — use Datepicker's `range` option for that. Calendar is for looking at a whole month or week and picking individual days out of it.

## Events

Give Calendar its events through the `events` attribute, an array of small arrays each describing one event.

| Field | Description |
|---|---|
| `label` | Text shown for the event |
| `type` | Controls its colour. `info` \| `success` \| `warning` \| `danger` |
| `href` | Optional. Makes the event a clickable link to that address. |
| `date` | The date the event occurs or is displayed on |
| `end` | Date on which a multi-day event ends |
| `description` | Optional. Turns the event's marker into a button that opens a details drawer instead of a plain link or text. |

### Event Dates

If `date` is just a day, e.g. `2026-08-14`, the event is all-day and shows as a small coloured marker on that day in month view. Setting `end` as a day too stretches the event across every day from `date` to `end` (e.g. a multi-day conference or leave).

If `date` includes a time, e.g. `2026-08-14 15:00`, the event is timed, meant for meetings and appointments. If `end` is also set with a time on the same day, that defines the duration; otherwise Calendar assumes one hour. Timed events show in month view as a marker with the start time in front of the label (e.g. "3:00pm Kenya project review"), but only get positioned on a real hour-by-hour timeline in week or day view.

Since a day cell in month view is small, only a limited number of markers show per day, controlled by `max-events-per-day` (default 3). Extra events are tucked behind a real, keyboard-reachable "+N more" button.

### Event Details Drawer

Give an event a `description` and its marker becomes a button. Clicking it opens a drawer showing the event's date/time, label, description, and (if `href` is set) a "View full details" link. This happens automatically for any event with a description, in month, week, and day view. The drawer stays inside the calendar's own box, doesn't dim the rest of the calendar, and can be dismissed with Escape or its close button.

```blade
<x-bladewind::calendar
    name="team-calendar"
    :events="[
        [
            'date' => '2026-08-14 11:00',
            'end' => '2026-08-14 11:30',
            'label' => 'Design review',
            'type' => 'info',
            'href' => '/component/calendar',
            'description' => 'Walk through the new event details drawer with the team.',
        ],
    ]" />
```

## Week and Day View

Switching to week view replaces the month grid with a detailed weekly schedule: seven day columns, hours running vertically from midnight to midnight. All-day and multi-day events appear in a dedicated row at the top, separate from timed events. Day view uses the same layout focused on a single, wider day column.

Overlapping events are displayed side by side rather than hidden behind each other. Week and day view don't open at midnight — they automatically scroll to a practical morning hour.

```blade
<x-bladewind::calendar name="week-demo" label="Week demo calendar" view="week" :events="$teamEvents" />

<x-bladewind::calendar name="day-demo" label="Day demo calendar" view="day" :date="$weekAnchor->toDateString()" :events="$weekEvents" />
```

## Restricting Dates

`min-date` and `max-date` set the earliest and latest dates a visitor can navigate to or select — useful for a booking calendar that shouldn't allow past dates. `disabled-dates` turns off specific individual dates within that range, e.g. public holidays. Disabled dates are still shown and reachable with arrow keys, but cannot be selected.

```blade
<x-bladewind::calendar name="booking" label="Booking calendar" selectable="single"
    :min-date="now()->toDateString()" :max-date="now()->addDays(20)->toDateString()"
    :disabled-dates="[now()->addDays(3)->toDateString(), now()->addDays(4)->toDateString()]" />
```

By default, month view also shows grayed-out days from the previous and next month to keep every row full, controlled by `show-other-month-days` (default `true`). Set to `false` to leave those cells empty instead.

## Fixed Height

Calendar maintains a consistent height across month, week, and day views by default, reserving `40rem` (enough for a six-week month). When a view needs less space, the remainder is left empty rather than shrinking the calendar; when it needs more, the calendar scrolls internally.

```blade
<x-bladewind::calendar name="fixed-height-calendar" label="Fixed-height calendar" height="20rem" :events="$teamEvents" />
```

Set `height=""` (empty) to let Calendar grow and shrink naturally based on content. This height rule also applies per day cell — a busy day never pushes its row taller than neighboring days; its "+N more" button reveals a small scrolling list inside that cell instead.

## Navigation

The Previous, Next, and Today buttons in the header, plus Page Up/Page Down on the keyboard, move Calendar by a day (day view), week (week view), or month (month view). By default this happens instantly in the browser using the events already provided. Set `client-navigation="false"` to hand navigation off to your own server (useful for very large or constantly changing event sets) — with it off, navigating only fires the `before-navigate` and `navigate` events, and your app is responsible for showing the new period.

## Keyboard Interaction

Calendar's grid uses a single Tab stop with arrow-key navigation inside it, rather than tabbing through every day. In week and day view, the same keys move between day headers rather than day cells.

| Key | Action |
|---|---|
| Arrow keys | Move focus by one day, or seven days for up/down. Navigates past the visible edge automatically. |
| Home / End | Jump to the first or last day of the current row. |
| Page Up / Page Down | Go to the previous or next day (day view), week (week view), or month (month view). |
| Shift + Page Up / Page Down | One level further: a week at a time in day view, a month in week view, a year in month view. |
| Enter / Space | Select the focused day, if selection is enabled. |

Every event marker, including timed events on the hour-by-hour grid, is a genuine link or button reachable via Tab.

## JavaScript Events

Calendar fires browser events your own JavaScript can listen for. Events starting with "before" are cancelable via `preventDefault()`. All event names start with `bladewind:calendar:`.

| Event suffix | When it runs |
|---|---|
| `before-navigate`, `navigate` | Just before/after the visible day, week, or month changes. |
| `before-view-change`, `view-change` | Just before/after switching between month, week, and day view. |
| `before-select`, `select` | Just before/after the selected date(s) change. |

## JavaScript API

Each helper returns `true` on success (or if the requested state was already true), and `false` if the calendar wasn't found or a cancelable event's listener called `preventDefault()`.

```js
nextCalendarPeriod('team-calendar');
previousCalendarPeriod('team-calendar');
goToCalendarToday('team-calendar');
goToCalendarMonth('team-calendar', 2026, 12);
setCalendarView('team-calendar', 'week');
selectCalendarDate('team-calendar', '2026-08-14');
clearCalendarSelection('team-calendar');
calendarSelectedDates('team-calendar'); // ['2026-08-14']
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | Generated | Unique identifier used internally and, when selectable, as the posted form field name. |
| label | Calendar | Accessible name announced by screen readers for the grid. |
| view | month | `month` \| `week` \| `day` |
| date | today | Anchor date (`Y-m-d`) for the initially shown month, week, or day. |
| week-starts | sunday | `sunday` \| `monday` |
| selectable | none | `none` \| `single` \| `multiple` |
| selected | [] | Date(s) selected at the start: a `Y-m-d` string, comma-separated string, or array. |
| min-date | null | Earliest date a visitor can navigate to or select. |
| max-date | null | Latest date a visitor can navigate to or select. |
| disabled-dates | [] | Specific dates to turn off regardless of the min/max range. |
| events | [] | Array of event descriptors, each with `date`, `end`, `label`, `type`, and `href` fields. |
| max-events-per-day | 3 | How many event markers a day shows in month view before the rest are tucked behind "+N more". |
| show-other-month-days | true | Whether to fill the grid with dimmed, disabled days from neighboring months. |
| show-week-numbers | false | Whether to show an ISO week number next to each row. |
| highlight-today | false | Whether to tint today's date/column. |
| height | 40rem | Fixed height for the grid, with its own scrollbar if needed. Pass an empty value to size naturally. |
| client-navigation | true | Whether navigating rebuilds the grid in the browser automatically. Set `false` to hand it off to your own server. |
| today-label | Today | Text label for the jump-to-today button. |
| previous-label | Previous | Accessible label for the previous-period button. |
| next-label | Next | Accessible label for the next-period button. |

## Full Example

```blade
<x-bladewind::calendar
    name="team-calendar"
    label="Team calendar"
    view="week"
    date="2026-08-14"
    week-starts="monday"
    selectable="multiple"
    :selected="['2026-08-10', '2026-08-14']"
    min-date="2026-01-01"
    max-date="2026-12-31"
    :disabled-dates="['2026-12-25']"
    :events="[
        [
            'date' => '2026-08-14 15:00',
            'end' => '2026-08-14 16:00',
            'label' => 'Sprint planning',
            'type' => 'info',
            'href' => '/events/sprint-planning',
            'description' => 'Review the roadmap and assign owners for Q3.',
        ],
    ]"
    max-events-per-day="3"
    show-other-month-days="true"
    show-week-numbers="false"
    highlight-today="true"
    height="40rem"
    client-navigation="true"
    today-label="Today"
    previous-label="Previous"
    next-label="Next"
    class="shadow-sm" />
```
