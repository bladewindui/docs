---
title: Datepicker Component
component: x-bladewind::datepicker
url: /component/datepicker
---

# Datepicker

Display a datepicker so users can select a date. It is locale friendly: months and days of the week are translated.

## Basic Usage

```blade
<x-bladewind::datepicker />
```

By default the datepicker fills the width of its parent container; restrict this with a wrapping element or the component's `css` attribute. Change the placeholder text from the default "Select a date" with `placeholder`.

```blade
<div class="w-40">
    <x-bladewind::datepicker placeholder="Invoice Date" has_label="true" />
</div>
```

## Range Calendar

Set `range="true"` to select a range of dates. In the input field, the two dates are separated with a dash, e.g. `2025-01-10 - 2025-01-31`.

```blade
<x-bladewind::datepicker range="true" />
```

### Show as a Required Field

An asterisk is appended to the placeholder text when `required="true"`.

```blade
<x-bladewind::datepicker required="true" />
```

## Date Formats

Specify how dates should display. The default format is `yyyy-mm-dd`. For a range datepicker, the format applies to both dates.

```blade
<x-bladewind::datepicker name="date1" type="range" format="dd-mm-yyyy" />
<x-bladewind::datepicker name="date2" format="mm-dd-yyyy" />
<x-bladewind::datepicker name="date3" format="D d M, Y" type="range" />
<x-bladewind::datepicker name="date4" format="yyyy-mm-dd" />
```

## With Default Values

Useful in edit mode or when showing users what dates they filtered by.

```blade
<x-bladewind::datepicker class="!w-44" selected_value="2021-12-03" />

<x-bladewind::datepicker range="true" selected_value="2025-02-03 - 2025-02-23" />
```

## Min and Max Dates

`min_date` restricts selection to dates on or after it; `max_date` restricts to dates on or before it. Dates outside the range are disabled and grayed out.

```blade
<x-bladewind::datepicker min_date="{{ date('Y-m-d') }}" />

<x-bladewind::datepicker max_date="{{ date('Y-m-t') }}" />

<x-bladewind::datepicker min_date="{{ date('Y-m-01') }}" max_date="{{ date('Y-m-t') }}" />
```

## Laravel Form State

When validation fails, Laravel redirects back with the submitted values flashed to the session and the messages in `$errors`. The Datepicker component can read both for you, so you no longer write `old('...')` and an error block on every field.

```blade
<x-bladewind::datepicker
    name="starts_on"
    label="Start date"
    fill_from_old="true"
    show_validation_error="true" />
```

`fill_from_old` repopulates the field from `old()`. `show_validation_error` gives the field its error state and renders `$errors->first()` underneath it. Add `error_bag` if you validate into a named bag.

Both are off by default. If your form already prints its own validation messages, switching this on without removing them would print every message twice.

### Turning It On for Every Form

```php
// config/bladewind.php
'forms' => [
    'fill_from_old' => true,
    'show_validation_error' => true,
    'error_bag' => null,
],
```

An attribute on a single field always wins over the config, so you can opt one field out with `show_validation_error="false"`.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | bw-datepicker | Accessed when the input is submitted in the form. Also used as part of the CSS classes. |
| range | false | Allow range selection. `true` \| `false` |
| selected_value | *blank* | Value set on the input, useful when editing a form. |
| min_date | *blank* | Dates before this are disabled and grayed out. |
| max_date | *blank* | Dates after this are disabled and grayed out. |
| format | yyyy-mm-dd | How the date should be formatted. `yyyy-mm-dd` \| `dd-mm-yyyy` \| `mm-dd-yyyy` \| `yyyy/mm/dd` \| `dd/mm/yyyy` \| `mm/dd/yyyy` \| `D d M, Y` |
| placeholder | Select a date | Placeholder text to display. |
| label | Select a date | Label text to display. |
| required | false | Append an asterisk to the placeholder text. `true` \| `false` |
| week_starts | sunday | First day of the week. `sunday` \| `monday` |
| class | bw-datepicker | Any additional CSS classes. |
| nonce | null | Nonce value for content security policies applied to inline scripts. Can also be set globally via `config/bladewind.php` under the "script" key. |
| size | medium | Sizing of the input to match button sizes. `tiny` \| `small` \| `regular` \| `big` |
| fill_from_old | false | Repopulate from `old()` after a failed validation redirect. Defaults to `bladewind.forms.fill_from_old`. `true` \| `false` |
| show_validation_error | false | Give the field its error state and render `$errors->first()` beneath it. Defaults to `bladewind.forms.show_validation_error`. `true` \| `false` |
| error_bag | null | Which error bag to read when `show_validation_error` is on. Leave unset for Laravel's default bag. |

## Using Datepicker Inside Livewire

When a date is picked, the field dispatches a real, native `change` event, so Livewire's `wire:model` picks up the selection without extra work. The calendar popup tracks its open/closed state outside of the DOM Livewire manages, so an unrelated re-render resets the popup to closed — wrap the field in `wire:ignore` if this happens. The component also guards against a Livewire re-render building a second calendar popup.

## Full Example

```blade
<x-bladewind::datepicker
    name="invoice_date"
    range="true"
    required="false"
    placeholder="Invoice Date"
    selected_value=""
    format="dd/mm/yyyy"
    min_date="01/11/2025"
    max_date="01/12/2025"
    week_starts="monday"
    size="big"
    class="shadow-sm" />
```
