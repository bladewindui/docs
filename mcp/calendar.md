---
title: Datepicker Component
component: x-bladewind::datepicker
url: /component/calendar
---

# Datepicker

Display a calendar so user can select a date. The calendar component is locale friendly. Months and days are translated.

> **This component requires the AlpineJS library to work.** Ensure you include the script below if you don't have AlpineJS already in your project.

```blade
<script src="//unpkg.com/alpinejs" defer></script>
```

```blade
<x-bladewind::datepicker  />
```

By default the datepicker fills up the width of its parent container. You can however specify a width of your choice using a wrapper element with a width class.

You can also change the placeholder text from the default `Select a date`.

```blade
<div class="w-40">
    <x-bladewind::datepicker placeholder="Invoice Date"  />
</div>
```

## Range Datepicker

This range datepicker isn't your typical date range selection you will find on airline websites. This option simply saves you from manually embedding the datepicker two times. Specifying `type="range"` will create two separate datepicker boxes for start and end dates.

```blade
<x-bladewind::datepicker type="range"  />
```

The default placeholder texts for the range datepicker are **From** and **To**. These can however, be modified using the `date_from_label` and `date_to_label` attributes. These attributes only work if `type="range"`. Also, we introduced `stacked="true"` to stack the datepickers vertically.

```blade
<x-bladewind::datepicker
    type="range"
    date_from_label="start date"
    date_to_label="end date" />
```

### Show As a Required Field

An asterisk is appended to the placeholder text when `required="true"`.

```blade
<x-bladewind::datepicker required="true"  />
```

### Validating The Range Picker

The date range picker comes with optional date validation. This validation only checks to ensure the end date is not less than the start date. To enforce validation of the date range picker, set `validate="true"`. This is only applied if `type="range"`.

When you activate validation, you will need to provide the message to be displayed when a user selects an end date that is less than the start date. This is provided as an option to make it translatable. Set `validation_message="your message here"`.

```blade
<x-bladewind::datepicker
    type="range"
    date_from_label="task starts"
    date_to_label="task due"
    validate="true"
    validation_message="Seriously!, you know your task cannot end before you even got started"  />
```

By default, the error validation message is displayed in the BladewindUI notification component. You will need to ensure you have the `x-bladewind.notification` component on your page for the error message to be visible. If you prefer to display the error message inline, under the date fields, simply set `show_error_inline="true"`.

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
<x-bladewind::datepicker default_date="2021-12-03"  />
```

It is possible to have default dates for a range datepicker also.

```blade
<x-bladewind::datepicker
    type="range"
    default_date_from="2021-12-03"
    default_date_to="2022-01-03"  />
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
| type | single | `single` \| `range` |
| default_date | _blank_ | In case you are editing a form, the value passed will be set on the value attribute of the datepicker input. |
| default_date_from | _blank_ | Default date to set for the _From_ date when using the range datepicker. |
| default_date_to | _blank_ | Default date to set for the _To_ date when using the range datepicker. |
| min_date | _blank_ | Restrict the date to start from this. Any dates before this will be disabled and grayed out. |
| max_date | _blank_ | Restrict the date to end at this. Any dates after this will be disabled and grayed out. |
| date_from_label | From | Placeholder text to display for the `From` date. Applicable only to range datepickers. |
| date_to_label | To | Placeholder text to display for the `To` date. Applicable only to range datepickers. |
| format | yyyy-mm-dd | How date should be formatted. `yyyy-mm-dd` \| `dd-mm-yyyy` \| `mm-dd-yyyy` \| `D d M, Y` |
| placeholder | Select a date | Placeholder text to display. |
| required | false | Determines if the placeholder text should have an asterisk appended to it or not. `true` \| `false` |
| onblur | _blank_ | Custom function to call when the datepicker loses focus. |
| week_starts | sun | Choose between Sunday and Monday as the first day of the week. `sun` \| `mon` |
| class | bw-datepicker | Any additional css classes can be added using this attribute. |
| validate | false | Applied if `type="range"` to enforce if the start date should not be greater than the end date. `true` \| `false` |
| validation_message | Your end date cannot be less than your start date | Applied if `type="range"`. Message to display if there is a validation error. |
| show_error_inline | false | Applied if `type="range"` to specify how the error should be displayed. `true` \| `false` |
| use_placeholder | true | Applied if `type="range"` to specify if the placeholder should be explicitly used instead of labels. `true` \| `false` |
| stacked | true | Applied if `type="range"` to specify if the datepickers should be stacked vertically. `true` \| `false` |
| size | medium | Sizing of the input to match button sizes. `tiny` \| `small` \| `regular` \| `big` |

## Full Example

```blade
<x-bladewind::datepicker
    name="invoice_date"
    type="single"
    required="false"
    placeholder="Invoice Date"
    date_from=""
    date_to=""
    default_date=""
    has_label="true"
    validate="false"
    show_error_inline="true"
    stacked="true"
    use_placeholder="false"
    validation_message="end date before start date! Really?"
    onblur="copyDate('copy_from', 'copy_to')"
    week_starts="mon"
    class="shadow-sm" />
```
