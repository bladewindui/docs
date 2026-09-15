---
title: Credit Card Component
component: x-bladewind::credit-card
url: /component/credit-card
---

# Credit Card

`x-bladewind::credit-card` is a flippable credit card input. The front holds the card number, cardholder name, and expiry; a small round button on the card's right edge flips it to the back to enter the security code. The network name is detected live from the number as it is typed, and capped and grouped the way that network actually formats its numbers, four digits at a time for most networks, four-six-five for American Express.

This component is not form-associated on purpose. Card data is sensitive and normally belongs with a payment provider's own tokenization SDK, not a plain form submission. Read the current value with `window.yourCardName.value`, or set `on_change` to a JavaScript function called with the same value whenever it changes.

```blade
<x-bladewind::credit-card cardholder_name="Emma Reid"></x-bladewind::credit-card>
```

## Flipping To The CVC

Click the round button on the card's edge to flip to the back and enter the security code. The same button flips back, and so does the Escape key while flipped.

```blade
<x-bladewind::credit-card flipped="true"></x-bladewind::credit-card>
```

## Pre-Filling Fields

`number`, `cardholder_name`, `expiry_month`, `expiry_year`, and `cvc` are all plain attributes. `number` accepts either raw digits or a masked saved-card value such as `•••• •••• •••• 4242`, preserved as-is for an edit screen rather than reformatted.

```blade
<x-bladewind::credit-card
    cardholder_name="Emma Reid"
    number="4242424242424242"
    expiry_month="07"
    expiry_year="28">
</x-bladewind::credit-card>
```

## Forcing A Network

Leave `brand` unset to auto-detect from the number. Set it explicitly to override, for example a saved card where the network is already known but the full number is not shown.

```blade
<x-bladewind::credit-card brand="visa" number="•••• •••• •••• 4242"></x-bladewind::credit-card>
```

## Theming

Set `color` to any colour in the palette to change the gradient.

```blade
<x-bladewind::credit-card color="green"></x-bladewind::credit-card>
```

Set `variant="outline"` for a bare card silhouette instead of the full-colour gradient face.

```blade
<x-bladewind::credit-card variant="outline" cardholder_name="Emma Reid"></x-bladewind::credit-card>
```

## Inline Card Information

Set `variant="inline"` for the compact layout: card number on one row, expiry and CVC on the next, with no cardholder name field or flip animation.

```blade
<x-bladewind::credit-card variant="inline"></x-bladewind::credit-card>
```

## Validation

With `required="true"`, `window.yourCardName.validate()` checks that every field is complete: a full-length number for the detected network, a non-blank name, a non-expired month/year, and a full-length security code. Add `show_error_inline="true"` and `error_message` to show a message beneath the card when it fails.

```blade
<x-bladewind::credit-card
    name="checkout_card"
    required="true"
    show_error_inline="true"
    error_message="Complete the card details to continue">
</x-bladewind::credit-card>

<script>
    payButton.addEventListener('click', () => {
        if (!window.checkout_card.validate()) return;
        // proceed
    });
</script>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | auto-generated | Used as the JS variable the component is exposed on (`window.{name}`) and to scope its script tags. Not a form field — this component does not submit. |
| cardholder_name | _blank_ | Name printed on the card. |
| number | _blank_ | Card number, auto-grouped per network as the user types. A masked value like `•••• •••• •••• 4242` is preserved as-is. |
| expiry_month / expiry_year | _blank_ | Two-digit month (`01`-`12`) and year. |
| cvc | _blank_ | Security code (3 digits, 4 for American Express). |
| brand | auto-detected | `visa` \| `mastercard` \| `amex` \| `discover` \| `diners` \| `jcb` \| `unionpay` \| `maestro` |
| color | primary | Gradient colour, from the shared palette. Ignored in the outline variant. |
| variant | gradient | `gradient` for the full-colour face, `outline` for a bare silhouette, or `inline` for number/expiry/CVC fields only. |
| flipped | false | Shows the back face. `true` \| `false` |
| disabled | false | Disables every field and hides the flip button. `true` \| `false` |
| readonly | false | Makes every field read-only. `true` \| `false` |
| required | false | Whether `validate()` fails while any field is incomplete. `true` \| `false` |
| error_message | _blank_ | Message shown when validation fails and `show_error_inline` is set. |
| show_error_inline | false | Renders the error message beneath the card. `true` \| `false` |
| on_change | _blank_ | Name of a JavaScript function called with the structured value whenever it changes. |
| class | _blank_ | Additional CSS classes for the wrapper element. |
