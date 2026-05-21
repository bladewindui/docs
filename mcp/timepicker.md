---
title: Timepicker Component
component: x-bladewind::timepicker
url: /component/timepicker
---

# Timepicker

Display a time picker in two styles: `popup` (default) or `inline`.

## Basic Usage

```blade
{{-- popup (default) --}}
<x-bladewind::timepicker />

{{-- inline --}}
<x-bladewind::timepicker style="inline" />
```

## Time Formats

Default is 12-hour format (1–12 with AM/PM). Set `format="24"` for 24-hour format (00–23, no AM/PM).

```blade
<x-bladewind::timepicker format="24" />
<x-bladewind::timepicker style="inline" format="24" />
```

## Required Fields

```blade
<x-bladewind::timepicker required="true" />
<x-bladewind::timepicker label="HH:MM" required="true" />
```

## Default Values

```blade
{{-- 12-hour format --}}
<x-bladewind::timepicker selected_value="3:25PM" />

{{-- 24-hour format --}}
<x-bladewind::timepicker selected_value="03:25" format="24" />

{{-- inline with pre-selected time --}}
<x-bladewind::timepicker style="inline" selected_value="3:25PM" />

{{-- inline, 24h, required, pre-selected --}}
<x-bladewind::timepicker
    required="true"
    style="inline"
    format="24"
    selected_value="03:25" />
```

## Form Values

Specify a `name` to retrieve the value on form submission. A random name is generated if omitted.

```php
// format="12" (default)
$request->event_time; // outputs: 1:25PM

// format="24"
$request->event_time; // outputs: 01:25
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | bw-timepicker | Name submitted with the form |
| style | popup | Display style. `popup` \| `inline` |
| format | 12 | Time format. `12` \| `24` |
| selected_value | _(blank)_ | Default pre-selected time (edit mode) |
| label | _(blank)_ | Input label (popup style only) |
| placeholder | HH:MM | Input placeholder (popup style only) |
| hour_label | HH | Label for the hour dropdown |
| minute_label | MM | Label for the minute dropdown |
| format_label | -- | Label for the time format dropdown (inline style only) |
| required | false | Append asterisk to placeholder. `true` \| `false` |
| nonce | null | Nonce value for Content Security Policy |

## Full Example

```blade
<x-bladewind::timepicker
    name="start_time"
    format="24"
    required="false"
    hour_label="hh"
    minute_label="mm"
    format_label="AM/PM"
    placeholder="Start Time"
    label="Start Time"
    style="inline"
    selected_value="12:35AM" />
```
