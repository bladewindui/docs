---
title: Verification Code Component
component: x-bladewind::code
url: /component/verification-code
---

# Verification Code

Displays a set of input fields to accept a verification code from a user. It is common place on websites these days to send verification codes via email or mobile. These codes range from four to six digits. The default number of digits displayed by the component is four (4). In this documentation, we may interchange the words PIN, PIN code and verification code. We mean the same thing.

## Basic Usage

```blade
<x-bladewind::code  />
```

```blade
<x-bladewind::code size="big"  />
```

The verification code component allows you to specify how many boxes you want to display by specifying the `total_digits` attribute. There is no restriction on the maximum value you can specify. In a finance app, you could use this to collect account numbers.

```blade
<x-bladewind::code total_digits="5"  />
```

If you don't want the code being entered to be visible, set the `mask="true"` attribute.

```blade
<x-bladewind::code mask="true"  />
```

## Access the Verification Code

What happens after the user enters their verification code? The component creates a hidden input field with the name that was passed as the `name` attribute.

```blade
<x-bladewind::code name="pin_code"  />
```

The above will create the input fields for the verification codes and create the hidden input below:

```blade
<input type="hidden" name="pin_code" class="pin_code ..." id="pin_code"  />
```

You can access the value of `pin_code` either via Javascript or via PHP if you intend to post it in a form to your backend. The `onverify` attribute allows you to specify a function that should be called when the user has entered a value into the last verification code field. This should just be the function name without parentheses and parameters. If you wish to call `verifyPin()` after the user enters the code, just type `onverify="verifyPin"`. The component passes the code entered by the user to your function, as well as the name of the component, so your function declaration needs to expect one or two parameters.

```blade
<x-bladewind::code onverify="checkPin" />

<script>
    checkPin = (code) => {
        alert(`You entered: ${code}`);
    }
</script>
```

## Clear PIN/Code

There are cases where you will want to clear the verification code input field probably because the user entered a wrong pin and you want them to try entering the pin again. `clearPin(name)` is a Bladewind helper function that easily lets you reset your verification codes.

```blade
<x-bladewind::code name="clear_me" onverify="checkPinAndClear" />
```

```blade
<script>
    checkPinAndClear = (code) => {
        if(code !== 2024) {
            clearPin('clear_me');
            showNotification('Wrong Code', 'Please enter your code again', 'error');
        }
    }
</script>
```

## Displaying Errors

The verification code component comes with a hidden field that has the error message to display when validation fails for the code the user entered. To allow for translatable messages, the error message is defined on the component using the `error_message` attribute.

```blade
<x-bladewind::code
    name="pcode"
    error_message="Yoh! check your code"
    onverify="checkPinShowError" />
```

```blade
<script>
    checkPinShowError = (code) => {
        if( code !== 2024) {
            clearPin('pcode');
            showPinError('pcode');
        }
    }
</script>
```

The error message is displayed by invoking the Javascript helper function `showPinError(name)`. It accepts the name provided to the code component as a parameter. The error message is automatically hidden by calling the `hidePinError(name)` Javascript helper function. The second parameter to this function is what controls the automatic hiding of the error message. If you do not want to automatically close the error message, set the parameter to false.

```blade
<script>
    checkPinShowError = (code) => {
        ...
        // the error message will not hide after 10 seconds
        showPinError('pcode', false);
        ...
    }
</script>
```

## Show the Spinner

The verification code component comes with a hidden spinner that can be made visible by invoking the `showSpinner(name)` Javascript helper function. It accepts the name provided to the code component as a parameter. The verification code spinner can be useful if your verification is done via an ajax call to an API that may take a second or two. Showing the spinner will let the user know you are performing an action.

```blade
<x-bladewind::code name="spin_me" onverify="validatePin"  />
```

```blade
<script>
    validatePin = (code, name) => {
        showSpinner(name);
        ajaxCall('/verify/pin', `code=${code}`, ...
    }
</script>
```

Since Bladewind does not know how long your Ajax call might take or when your process is complete, it cannot automatically hide the spinner for you. You can do that by calling `hideSpinner(name)`, where `name` is the name of your verification code field.

```blade
<script>
    ...
    hideSpinner('spin_me');
    ...
</script>
```

## Show Success Icon

The verification code component also comes with a hidden checkmark to show when a pin is valid. This can be invoked using the `showPinSuccess(name)` Javascript helper function. It accepts the name provided to the code component as a parameter. In the example below, the spinner shows after the code is entered and disappears to give way to the checkmark after 5 seconds.

```blade
<x-bladewind::code name="spin_me_yes" onverify="spinAndSucceed"  />
```

```blade
<script>
    spinAndSucceed = (code, name) => {
        showSpinner(name);
        setTimeout( () => { showPinSuccess(name); }, 5000);
    }
</script>
```

## Countdown To Resend Code

This can be useful for two scenarios. The user never received the code you sent so they will need to request another. The user received a code that somehow does not seem to work and will need to request for a new one. Specifying a value for the `timer` attribute automatically shows a countdown timer. The attributes accepts number of seconds to countdown to.

Bladewind expects you to have an HTML element on your page with `class="bw-code-timer-done"`. Ideally this should be hidden. The innerHTML (content) of that element is what will be displayed when the timer is done. This approach provides you the flexibility of handling your code resend anyway you want.

```blade
<x-bladewind::code name="time_me" timer="30"  />
```

```blade
<!-- the DIV that contains the content to display when timer is done -->

<div class="bw-code-timer-done hidden">
    <x-bladewind.button
        name="send-code"
        size="tiny"
        type="secondary"
        has_spinner="true"
        onclick="sendNewCode()">
        send me another code
    </x-bladewind.button>
</div>
```

Once the countdown is done, the content of your `bw-code-timer-done` DIV is copied into a DIV that can be accessed using the class `.bw-[name-of-code-field]-pin-timer .done`.

```blade
<script>
    sendNewCode = () => {
       showButtonSpinner('.bw-time_me-timer .done .send-code');
       setTimeout( () => {
           showNotification('Code Sent','Please check your email or SMS for a new verification code');
            hideButtonSpinner('.bw-time_me-pin-timer .done .send-code');
            hide('.bw-time_me-pin-timer .done .send-code')
            setFocus('time_me');
            clearTimeout();
       }, 5000);
    }
</script>
```

### Manually Trigger the Timer

There are cases where you may want to manually trigger the timer. For example, you first want the user to have at least entered the code wrongly once or twice before you trigger a countdown. You can do this by calling the `showTimer(name, duration)` helper function.

```blade
<x-bladewind::code name="trigger_me" onverify="triggerTimerManually"  />
```

```blade
let attempts = 0;
triggerTimerManually = (code, name) => {
    if(parseInt(code) !== 2024) {
        attempts++
        showPinError(name);
        clearPin(name);
    }
    if(attempts >= 2) showTimer(name, 15);
}
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | pin-code-{uniqid()} | Unique name for the component. The code entered by the end user will be available in an input field with the specified name. |
| total_digits | 4 | Determines number of input boxes to be created for entry of the verification code. Any realistic number. |
| size | small | Displays the input boxes at either small or big sizes. `small` \| `big` |
| onverify | _(blank)_ | Function to call after user has finished entering the codes. This should just be the function name without parentheses and parameters. |
| error_message | Verification code is invalid | Error message to display when the verification code entered is invalid. |
| mask | false | Should the text being entered be hidden like a password field. `true` \| `false` |
| timer | null | Determines if the component should automatically display a timer for user to resend verification code. Accepts any positive integer counted in seconds. |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts. |

## Full Example

```blade
<x-bladewind::code
    name="pin-code"
    total_digits="5"
    onverify="verifyPin"
    has_spinner="false"
    mask="false"
    timer="15"
    error_message="please enter the correct code"  />
```
