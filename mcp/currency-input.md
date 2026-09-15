---
title: Currency Input Component
component: x-bladewind::currency-input
url: /component/currency-input
---

# Currency Input

`x-bladewind::currency-input` wraps Input's existing money-masking (thousands separators, a fixed decimal precision)
and adds the one thing that mask alone cannot: the correct currency symbol, in the correct position, with separators
written the way the given locale actually writes them.

## Basic Usage

```blade
<x-bladewind::currency-input name="price" label="Price" />
```

The default `currency` is `USD` and the default `locale` is `en-US`, both overridable globally via
`config('bladewind.currency_input')`.

## Currency and locale

Set `currency` to any ISO 4217 code. When PHP's `intl` extension is installed, `locale` (a BCP 47 tag) decides where
the symbol sits and which characters separate thousands and decimals — for example, French writes `1 234,56 €` where
U.S. English writes `$1,234.56`, for the same amount in the same currency.

```blade
<x-bladewind::currency-input name="price_eur" label="Euro (French formatting)" currency="EUR" locale="fr-FR" />
<x-bladewind::currency-input name="price_jpy" label="Japanese Yen (no decimals)" currency="JPY" locale="ja-JP" />
```

Without the `intl` extension, every currency still gets a sensible symbol (a small built-in table covers the common
ones; anything else falls back to the currency code itself) and the correct number of decimal places — zero for
currencies like `JPY` that have no minor unit, two for everything else — always shown as a prefix with `.` and `,`
separators.

## Overriding individual parts

Any part of the derived format can be set explicitly, which always wins over whatever `currency`/`locale` would
otherwise produce: `symbol`, `symbolPosition` (`prefix` or `suffix`), `decimalSeparator`, `thousandsSeparator`, and
`precision`.

```blade
<x-bladewind::currency-input name="price_custom" label="Custom symbol" symbol="US$" symbol-position="suffix" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| currency | USD | Any ISO 4217 currency code. |
| locale | en-US | A BCP 47 locale tag. Only affects output when PHP's intl extension is installed. |
| symbol | _(derived)_ | Overrides the currency symbol entirely. |
| symbolPosition | _(derived)_ | `prefix` \| `suffix` |
| decimalSeparator | _(derived)_ | Character separating the decimal part. |
| thousandsSeparator | _(derived)_ | Character grouping thousands. |
| precision | _(derived)_ | Number of decimal places. 0 disables decimals entirely. |
| label | _(blank)_ | Label displayed on the field. |
| required | false | Marks the field as required. |
| size | regular | Any Input size. |
