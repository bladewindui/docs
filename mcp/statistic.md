---
title: Statistic Component
component: x-bladewind::statistic
url: /component/statistic
---

# Statistic

Display numeric summaries — most commonly used on dashboards. The component takes up the full width of its parent element and expects a `label` and a `number`. Numbers are displayed as-is; format thousand separators and decimals yourself.

## Basic Usage

```blade
<x-bladewind::statistic number="34,500,100" label="Total payments" />

{{-- label below the number --}}
<x-bladewind::statistic
    label_position="bottom"
    number="34,500,100"
    label="Total payments" />
```

## With Icons

Icons are defined via the `icon` slot and can be placed on the left (default) or right.

```blade
{{-- icon on the left --}}
<x-bladewind::statistic number="34,500,100" label="Total payments">
    <x-slot name="icon">
        <svg class="h-16 w-16 p-2 text-white rounded-full bg-blue-500" ...>
            ...
        </svg>
    </x-slot>
</x-bladewind::statistic>

{{-- icon on the right --}}
<x-bladewind::statistic icon_position="right" number="34,500,100" label="Total payments">
    <x-slot name="icon">
        <svg class="h-16 w-16 p-2 text-white rounded-full bg-orange-500" ...>
            ...
        </svg>
    </x-slot>
</x-bladewind::statistic>
```

## With Currency

```blade
<x-bladewind::statistic currency="GHS" number="34,500,100" label="Total payments" />

{{-- currency in the label instead --}}
<x-bladewind::statistic number="34,500,100" label="Total payments (GHS)" />
```

The currency symbol is displayed at a smaller font size than the number. Use `currency_position` to place it left (default) or right of the number.

## With Spinners

Show a spinner while fetching the number (e.g., from an API).

```blade
<x-bladewind::statistic label="Total payments" show_spinner="true" />
```

Hide the spinner programmatically once the value loads. Give the statistic a `class` name to target it:

```js
hide('.total-payments .bw-spinner');
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| label | _(blank)_ | Description of the statistic |
| number | _(blank)_ | The number to display |
| label_position | top | Position of label relative to number. `top` \| `bottom` |
| currency | _(blank)_ | Currency symbol to display alongside the number |
| currency_position | left | Position of the currency symbol. `left` \| `right` |
| icon | _(blank)_ | SVG or image icon via slot |
| icon_position | left | Position of the icon. `left` \| `right` |
| show_spinner | false | Show a loading spinner. `true` \| `false` |
| has_shadow | true | Show a drop shadow. `true` \| `false` |
| has_border | true | Show a border. `true` \| `false` |
| url | null | URL or JS function to call on click |
| radius | small | Corner radius. `none` \| `small` \| `medium` \| `large` \| `xl` |
| class | bw-statistic | Additional CSS classes (use to give the component a unique name for JS targeting) |

## Full Example

```blade
<x-bladewind::statistic
    label="Total payments"
    label_position="bottom"
    number="34,500,100"
    currency="XOF"
    currency_position="right"
    icon_position="right"
    has_shadow="false"
    has_border="false"
    show_spinner="true"
    class="m-0">

    <x-slot name="icon">
        <svg>...</svg>
    </x-slot>

</x-bladewind::statistic>
```
