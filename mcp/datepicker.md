---
title: Datepicker Component
component: x-bladewind::datepicker
url: /component/datepicker
---

# Datepicker

Display a datepicker so user can select a date. The datepicker component is locale friendly. Months and days of the week are translated.

## Basic Usage

```blade
<x-bladewind::datepicker  />
```

By default the datepicker fills up the width of its parent container. You can however specify a width of your choice using the datepicker's `css` attribute.

You can also change the placeholder text from the default `Select a date`.

```blade
<div class="w-40">
    <x-bladewind::datepicker placeholder="Invoice Date"  />
</div>
```

## Range Calendar

The range datepicker allows you to select a range of dates by setting `range="true"`. In the input field, the range of dates selected are separated with a dash (-). For example, a selected date range will be displayed in the input as **2025-01-10 - 2025-01-31**.

```blade
<x-bladewind::datepicker range="true"  />
```

### Show As a Required Field

An asterisk is appended to the placeholder text when `required="true"`.

```blade
<x-bladewind::datepicker required="true"  />
```

## Date Formats

You can specify how you want dates selected in the datepicker to be displayed. There are four options to pick from. The default format is `format="yyyy-mm-dd"`. When using a range datepicker, the format you specify is applied to both datepickers.

```blade
<x-bladewind::datepicker name="date1" type="range" format="dd-mm-yyyy" />
```

```blade
<x-bladewind::datepicker name="date2" format="mm-dd-yyyy" />
```

```blade
<x-bladewind::datepicker name="date3" format="D d M, Y" type="range" />
```

```blade
<x-bladewind::datepicker name="date4" format="yyyy-mm-dd" />
```

## With Default Values

There are times you will want the datepicker to load prepopulated with a default value. This is useful when in edit mode or when using filters and you want to show the user what dates they filtered by.

```blade
<x-bladewind::datepicker selected_value="2021-12-03"  />
```

It is possible to have default dates for a range datepicker also.

```blade
<x-bladewind::datepicker range="true" selected_value="2021-12-03 - 2022-01-03"  />
```

## Min and Max Dates

Setting minimum and maximum dates restrict the datepicker to display dates only within these specified dates. The `min_date` attribute allows you to set the accepted minimum date. Any dates before this date will be disabled and grayed out. The `max_date` attribute allows you to set the accepted maximum date. Any dates after this date will be disabled and grayed out.

```blade
<x-bladewind::datepicker min_date="{{date('Y-m-d')}}" />
```

```blade
<x-bladewind::datepicker max_date="{{date('Y-m-t')}}" />
```

```blade
<x-bladewind::datepicker min_date="{{date('Y-m-01')}}" max_date="{{date('Y-m-t')}}" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | bw-datepicker | This name can be accessed when the input is submitted in the form. The name is also available as part of the css classes. |
| range | false | Allow range selection. `true` \| `false` |
| selected_value | _(blank)_ | In case you are editing a form, the value passed will be set on the value attribute of the datepicker input. |
| min_date | _(blank)_ | Restrict the date to start from this. Any dates before this will be disabled and grayed out. |
| max_date | _(blank)_ | Restrict the date to end at this. Any dates after this will be disabled and grayed out. |
| format | yyyy-mm-dd | How date should be formatted. `yyyy-mm-dd` \| `dd-mm-yyyy` \| `mm-dd-yyyy` \| `yyyy/mm/dd` \| `dd/mm/yyyy` \| `mm/dd/yyyy` \| `D d M, Y` |
| placeholder | Select a date | Placeholder text to display. |
| label | Select a date | Label text to display. |
| required | false | Determines if the placeholder text should have an asterisk appended to it or not. `true` \| `false` |
| week_starts | sunday | Choose between Sunday and Monday as the first day of the week. `sunday` \| `monday` |
| class | bw-datepicker | Any additional css classes can be added using this attribute. |
| size | medium | Sizing of the input to match button sizes. `tiny` \| `small` \| `regular` \| `big` |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts. |

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
