---
title: Timepicker Component
component: x-bladewind::timepicker
url: /component/timepicker
---

# Timepicker

Displays a timepicker in two styles, popup (default) or inline.

## Basic Usage

```blade
<x-bladewind::timepicker />
```

```blade
<x-bladewind::timepicker style="inline" />
```

## Time Formats

By default the timepicker displays 12 hour time (hours 1–12 with an AM/PM suffix). Set `format="24"` for 24 hour time, which removes the AM/PM suffix and displays hours 00–23 with double digits.

```blade
<x-bladewind::timepicker format="24" />
<x-bladewind::timepicker style="inline" format="24" />
```

## Required Fields

An asterisk is appended to the placeholder text when `required="true"`.

```blade
<x-bladewind::timepicker required="true" />
<x-bladewind::timepicker label="HH:MM" required="true" />
<x-bladewind::timepicker style="inline" required="true" />
```

## Default Values

Set `selected_value` to prepopulate the timepicker with a default time, useful in edit mode. The format of the value depends on the `format` attribute.

```blade
<x-bladewind::timepicker selected_value="3:25PM" />
<x-bladewind::timepicker selected_value="03:25" format="24" />
<x-bladewind::timepicker style="inline" selected_value="3:25PM" />

<x-bladewind::timepicker
    required="true"
    style="inline"
    format="24"
    selected_value="03:25" />
```

## Form Values

Specify a `name` for your timepicker in a form; a random name is generated if none is set. If named `event_time`, the submitted value is retrieved like this:

```php
// if format="12" (default)
$request->event_time; // outputs 1:25PM

// if format="24"
$request->event_time; // outputs 01:25
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | bw-timepicker | Name accessible when the input is submitted in the form. |
| format | 12 | Time format. `12` \| `24` |
| selected_value | *blank* | Default time in edit mode. |
| hour_label | HH | Label for the hour dropdown. |
| minute_label | MM | Label for the minute dropdown. |
| format_label | -- | Applies only to the inline style. Label for the time format dropdown. |
| placeholder | HH:MM | Applies only to the popup style. Placeholder text. |
| label | *blank* | Applies only to the popup style. Behaves like the Input component's label. |
| style | popup | How to display the timepicker. `popup` \| `inline` |
| required | false | Whether the placeholder text has an asterisk appended. Set as a string, not boolean. `true` \| `false` |
| nonce | null | Nonce for content security policies on inline scripts. Can be set globally via `config/bladewind.php` under `script`. |

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

## Using Timepicker Inside Livewire

When a time is set or cleared, the value field dispatches a real, native `change` event, so Livewire's `wire:model` picks it up without any extra work. The bindings driving the timepicker are safe to re-run, so a Livewire re-render will not leave behind duplicate listeners.
