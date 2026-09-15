---
title: Statistic Component
component: x-bladewind::statistic
url: /component/statistic
---

# Statistic

Displays a numeric summary, mostly used on dashboards. Takes up the width of its parent element and expects a `label` and a `number`. The component displays the number as-is, with no alteration — you are responsible for thousand separators and decimal formatting.

## Basic Usage

```blade
<x-bladewind::statistic number="34,500,100" label="Total payments" />
```

By default the label sits above the number. Set `label_position="bottom"` to place it below.

```blade
<x-bladewind::statistic
    label_position="bottom"
    number="34,500,100"
    label="Total payments" />
```

## With Icons

Icons are set up as a slot, so you can use SVG icons or image files. They can be placed left (default) or right of the number and label — set `icon_position="right"` to flip them.

```blade
<x-bladewind::statistic
    number="34,500,100"
    label="Total payments">

    <x-slot name="icon">
        <svg class="h-16 w-16 p-2 text-white rounded-full bg-blue-500">
        ...
        </svg>
    </x-slot>

</x-bladewind::statistic>
```

## With Currency

For amounts, set the `currency` attribute to display a currency symbol at a font size a step smaller than the number. It defaults to the left of the amount; set `currency_position="right"` to move it. Alternatively, append the currency to the label if you want the amount to stand alone.

```blade
<x-bladewind::statistic
    currency="GHS"
    number="34,500,100"
    label="Total payments" />
```

## With Spinners

When numbers aren't available yet (e.g. waiting on an API, or refreshing filtered dashboard content), set `show_spinner="true"` to display a spinner in the number field, before the number if one is present.

```blade
<x-bladewind::statistic
    show_spinner="true"
    label="Total payments" />
```

To hide the spinner once your number is ready, give the statistic a unique class (e.g. `total-payments`) and target its spinner from JavaScript:

```blade
<div class="bw-statistic total-payments ...">
    <div class="flex space-x-4">
        <div class="grow-0 icon"><!-- icon --></div>
        <div class="grow number">
            <div class="uppercase ... label"><!-- label --></div>
            <div class="text-3xl ...">
                <svg class="bw-spinner"><!-- spinner --></svg>
                <span class="text-gray-300 text-2xl"><!-- currency --></span>
                <span class="figure tracking-wider"><!-- number --></span>
            </div>
        </div>
    </div>
</div>
```

```js
loadTotalPayment = () => {
    // do all your magic then call this helper function
    // to hide the spinner
    hide('.total-payments .bw-spinner');
}
```

## Trends, Tones and Progress

A statistic often needs to convey whether a number is good news, which way it's moving, and how far along something is. These live on the component, so the same figure reads consistently everywhere.

```blade
<x-bladewind::statistic
    label="Revenue"
    number="12,400"
    currency="GHS"
    direction="up"
    note="up 12% on last month" />
```

`direction` draws a trend arrow beside the figure and colours it: `up` is good, `down` is bad, `flat` is neutral. `note` takes the same colour.

### When Down Is Good

Many metrics improve by falling — arrears, churn, cost per unit, response time. Set `invert_direction="true"` to make a downward arrow read as green instead of red.

```blade
<x-bladewind::statistic
    label="Arrears"
    number="1,204"
    direction="down"
    invert_direction="true"
    note="down 8% this week" />
```

### Tones

`tone` sets the colour explicitly and always overrides `direction`. Available tones: `neutral`, `positive`, `negative`, `warning`, `info`. Keeping the tone-to-colour map inside the component prevents the same neutral sentence rendering as a warning on one page and as plain description on another.

### Hints and Progress Bars

`hint` adds a small marker beside the label with explanatory text on hover — useful when a metric needs defining but the label has no room. `progress` takes a number from 0 to 100 and draws a bar in place of the note, tinted with the current tone. Out-of-range values are clamped; a non-numeric value is ignored.

```blade
<x-bladewind::statistic
    label="Collections"
    number="72%"
    hint="Invoices settled within 30 days"
    tone="positive"
    progress="72"
    progress_label="of monthly target" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| label | *blank* | A string that best describes the statistic. |
| number | *blank* | The number to display as the statistic. |
| currency | *blank* | Currency symbol to display, when the statistic is an amount. |
| currency_position | left | Only applies when `currency` has a value. `left` \| `right` |
| label_position | top | Whether the label displays above or below the number. `top` \| `bottom` |
| has_shadow | true | Whether the component is displayed with a shadow. `true` \| `false` |
| has_border | true | Whether the component is displayed with a border. `true` \| `false` |
| show_spinner | false | Whether to display a [Spinner](/component/spinner). `true` \| `false` |
| icon | *blank* | SVG icon or image icon to display. Must be defined as a slot. |
| icon_position | left | Only applies when `icon` has a value. `left` \| `right` |
| url | null | URL to visit when the card is clicked. A path like `/some-url` opens via the Bladewind `redirect()` JS helper. A function call like `performSomeAction(some_id)` triggers `javascript:performSomeAction(some_id)`. A full URL like `https://mydomain.com/some-url` opens with `window.open()`. |
| radius | small | Roundness of the card. `none` \| `small` \| `medium` \| `large` \| `xl` |
| class | bw-spinner | Additional CSS classes to add, e.g. to uniquely identify a statistic. |
| tone | neutral | Named tone for the note and trend arrow; the colour map is owned by the component. `neutral` \| `positive` \| `negative` \| `warning` \| `info` |
| direction | *blank* | Draws a trend arrow beside the figure, coloured by meaning. `up` \| `down` \| `flat` |
| invert_direction | false | For metrics where down is good (arrears, churn, cost per unit) — swaps which direction reads as positive. `true` \| `false` |
| note | *blank* | Short sentence under the figure, coloured by the tone (or direction when no tone is set). |
| hint | *blank* | Explanatory text shown on hover beside the label. |
| progress | null | A number from 0 to 100. Draws a progress bar in place of the note, tinted with the tone. Out-of-range values are clamped; non-numeric values are ignored. |
| progress_label | *blank* | Caption shown above the progress bar, with the percentage on the right. |

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
