---
title: Verification Code Component
component: x-bladewind::code
url: /component/verification-code
---

# Verification Code

Displays a set of input fields to accept a verification code (PIN/OTP) from a user, typically sent via email or SMS. Codes usually range from four to six digits, with four as the default.

## Basic Usage

```blade
<x-bladewind::code />
```

```blade
<x-bladewind::code size="big" />
```

The component lets you specify how many boxes to display via `total_digits`. There's no maximum restriction, so you could use it to collect longer values like account numbers.

```blade
<x-bladewind::code total_digits="5" />
```

If you don't want the entered code to be visible, set `hide-input="true"`. Each box then behaves like a password field, showing a dot instead of the number typed.

```blade
<x-bladewind::code hide-input="true" />
```

The `mask` attribute did the same thing in earlier versions and still works, but `hide-input` is the name to use going forward — `mask` will be removed in a future major release.

If you want the boxes split into two groups with a separator between them, similar to how a bank card number is shown, set `has-separator="true"`. When the total number of boxes doesn't split evenly, the left group gets the extra box (e.g. seven digits split into four on the left, three on the right).

```blade
<x-bladewind::code total_digits="7" has-separator="true" />
```

`has-separator` and `hide-input` can be combined with each other and with any other attribute.

```blade
<x-bladewind::code total_digits="7" has-separator="true" hide-input="true" />
```

## Access the Verification Code

The component creates a hidden input field with the name passed as the `name` attribute.

```blade
<x-bladewind::code name="pin_code" />
```

The above creates the input fields and a hidden input:

```blade
<input type="hidden" name="pin_code" class="pin_code ..." id="pin_code" />
```

You can access the value of `pin_code` via JavaScript or PHP if posting it in a form. The `onverify` attribute specifies a function to call after the user enters a value into the last input field — just the function name, no parentheses. The component passes the code and the component's name to your function, so your function should expect one or two parameters:

```js
// NOTE: this is not a Bladewind helper function
// it should be a function in your project

verifyPin = (code, name) => {
    // do something here with the code
}
```

Example: enter a code and get notified of what you entered.

```blade
<x-bladewind::code onverify="checkPin" />

<script>
    checkPin = (code) => {
        alert(`You entered: ${code}`);
    }
</script>
```

## Clear PIN/Code

`clearPin(name)` is a Bladewind helper function that resets a verification code's input fields — useful when the user entered a wrong pin and needs to try again, or in an SPA flow where a popup may still hold a previously entered code.

```blade
<x-bladewind::code name="clear_me" onverify="checkPinAndClear" />
```

```js
checkPinAndClear = (code) => {
    if (code !== 2024) {
        clearPin('clear_me');
        showNotification('Wrong Code', 'Please enter your code again', 'error');
    }
}
```

## Displaying Errors

The component has a hidden field holding the error message shown when validation fails. To support translatable messages, it's defined on the component via the `error_message` attribute. The example below expects `2024` as the code.

```blade
<x-bladewind::code name="pcode" error_message="Yoh! check your code" onverify="checkPinShowError" />
```

```js
checkPinShowError = (code) => {
    if (code !== '2024') {
        clearPin('pcode');
        showPinError('pcode');
    }
}
```

The error message is shown by calling `showPinError(name)` and hidden by calling `hidePinError(name)`. The second parameter to `showPinError` controls whether the message auto-hides after 10 seconds — pass `false` to disable that:

```js
showPinError('pcode', false);
```

The error message can also be shown via a notification instead of the inline error, as in the Clear PIN example above — either approach works.

## Show the Spinner

The component has a hidden spinner shown via `showSpinner(name)`, useful when verification happens over an ajax call that may take a moment.

```blade
<x-bladewind::code name="spin_me" onverify="validatePin" />
```

```js
validatePin = (code, name) => {
    showSpinner(name);
    ajaxCall('/verify/pin', `code=${code}`, ...)
}
```

Bladewind can't know how long your ajax call takes, so you hide the spinner yourself by calling `hideSpinner(name)`.

## Show Success Icon

The component also has a hidden checkmark, shown via `showPinSuccess(name)`. In the example below, the spinner shows after the code is entered, then gives way to the checkmark after 5 seconds.

```blade
<x-bladewind::code name="spin_me_yes" onverify="spinAndSucceed" />
```

```js
spinAndSucceed = (code, name) => {
    showSpinner(name);
    setTimeout(() => {
        showPinSuccess(name);
    }, 5000);
}
```

## Countdown To Resend Code

Useful when a user never received their code, or received one that doesn't work and needs a new one. Setting the `timer` attribute (number of seconds) automatically shows a countdown timer.

Bladewind expects an HTML element on the page with `class="bw-code-timer-done"`, ideally hidden — its innerHTML is what displays once the timer finishes, giving you flexibility in how you handle the resend action.

```blade
<div class="bw-code-timer-done hidden">
    <x-bladewind::button name="send-code" size="tiny" type="secondary" has_spinner="true" onclick="sendNewCode()">
        send me another code
    </x-bladewind::button>
</div>

<x-bladewind::code name="time_me" timer="30" />
```

```js
sendNewCode = () => {
    showButtonSpinner('.bw-time_me-pin-timer .done .send-code');
    setTimeout(() => {
        showNotification('Code Sent', 'Please check your email or SMS for a new verification code');
        hideButtonSpinner('.bw-time_me-pin-timer .done .send-code');
        hide('.bw-time_me-pin-timer .done .send-code');
        setFocus('time_me');
    }, 5000);
}
```

Once the countdown finishes, the content of your `bw-code-timer-done` div is copied into a div accessible via `.bw-[name-of-code-field]-pin-timer .done` — e.g. `.bw-time_me-pin-timer .done` for a field named `time_me`.

### Manually Trigger the Timer

You can manually trigger the timer via the `showTimer(name, duration)` helper — for example, only starting a countdown after the user has entered the wrong code once or twice. The example below expects `2024` as the code; enter it wrong twice to trigger the timer.

```blade
<x-bladewind::code name="trigger_me" onverify="triggerTimerManually" />
```

```js
let attempts = 0;
triggerTimerManually = (code, name) => {
    if (parseInt(code) !== 2024) {
        attempts++;
        showPinError(name);
        clearPin(name);
    }
    if (attempts >= 2) showTimer(name, 15);
}
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | pin-code-{uniqid()} | Unique name for the component. The code entered will be available in a hidden input field with this name. |
| total_digits | 4 | Number of input boxes to create for entry of the verification code. No restriction on the value. |
| size | small | Displays the input boxes at either size. `small` \| `big` |
| onverify | _(blank)_ | Function to call after the user finishes entering the code. Just the function name, no parentheses — the code is passed as the argument. |
| error_message | Verification code is invalid | Error message to display when the entered code is invalid. |
| hide_input | false | Whether the text being entered should be hidden like a password field. `true` \| `false` |
| mask | false | Older name for `hide_input`, kept for backward compatibility. Use `hide_input` instead — this attribute will be removed in a future major release. `true` \| `false` |
| has_separator | false | Splits the boxes into two groups with a dash between them. When `total_digits` doesn't split evenly, the left group gets the extra box. `true` \| `false` |
| timer | null | Whether to automatically display a countdown timer for resending the code, in seconds. |
| nonce | null | Used with content security policies that require a nonce on inline scripts. Can also be set globally via the `script` key in `config/bladewind.php`. |

## Full Example

```blade
<x-bladewind::code
    name="pin-code"
    total_digits="5"
    onverify="verifyPin"
    hide_input="false"
    has_separator="false"
    timer="15"
    error_message="please enter the correct code" />
```
