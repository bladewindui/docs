---
title: Input Component
component: x-bladewind::input
url: /component/input
---

# Input

Displays a text input element, also known as a text box. It wraps the native HTML `<input>` so all standard input attributes and types are available, with `text` as the default type.

## Basic Usage

```blade
<x-bladewind::input />
```

## Password Input

Behaves like a regular HTML password input, masking any value entered.

```blade
<x-bladewind::input type="password" />
```

### Reveal Passwords

Set `viewable="true"` to let the user reveal the password by clicking an eye icon appended as a suffix. Clicking again hides it. The eye only appears when `type="password"`.

```blade
<x-bladewind::input type="password" viewable="true" />
```

## Numeric Input

Set `numeric="true"` to accept only numeric values, useful for phone numbers, age, or amounts. The decimal point is disallowed by default; enable it with `with_dots="true"`.

```blade
<x-bladewind::input numeric="true" />
```

### Minimum & Maximum Values

Restrict the numeric range with `min` and `max`.

```blade
<x-bladewind::input
    placeholder="Minimum is 3"
    name="input-min"
    numeric="true"
    min="3"
    error_message="Minimum value must be 3"
    show_error_inline="true" />

<x-bladewind::input
    placeholder="Maximum is 12"
    name="input-max"
    numeric="true"
    max="12"
    error_message="Maximum value must be 12" />
```

## Input Masking

Masking guides users into a fixed format as they type: phone numbers, dates, credit cards, money, and more. BladewindUI's masking is modelled on the Alpine.js mask plugin. Build a template with wildcards; every other character is a literal inserted automatically.

| Wildcard | Matches |
|---|---|
| `9` | Any digit (0-9) |
| `a` | Any letter (a-z, A-Z) |
| `*` | Any alphanumeric character |

Pass the template to the `mask` attribute. As the user types, literal characters (spaces, dashes, slashes, brackets) are added automatically.

```blade
<x-bladewind::input name="phone" mask="(999) 999-9999" />

<x-bladewind::input name="dob" mask="99/99/9999" placeholder="MM/DD/YYYY" />

<x-bladewind::input name="postcode" mask="a9a 9a9" placeholder="A9A 9A9" />

<x-bladewind::input name="key" mask="****-****-****-****" placeholder="XXXX-XXXX-XXXX-XXXX" />
```

### Dynamic Masks

Sometimes the format depends on what has been typed. The `dynamicMask` attribute chooses a different mask template as the user types.

BladewindUI ships with a built-in `creditCard` dynamic mask. It detects the card type from the number and switches between American Express (4-6-5), Diners Club (4-6-4), and the standard Visa / Mastercard / Discover format (4-4-4-4), no JavaScript required.

```blade
<x-bladewind::input name="card" dynamicMask="creditCard" />
```

For custom dynamic masks, point `dynamicMask` at the name of a global JavaScript function that receives the current value and returns a mask template. The example below expands a US ZIP code to ZIP+4 once more than five digits are entered.

```blade
<x-bladewind::input name="zip" dynamicMask="zipCode" />
```

```js
function zipCode(input) {
    const digits = input.replace(/\D/g, '');
    return digits.length <= 5
        ? '99999'           // ZIP
        : '99999-9999';     // ZIP+4
}
```

A global function with the same name as a built-in (e.g. your own `creditCard`) takes precedence, so you can override built-ins when needed.

### Money Inputs

Set `money="true"` to format the field as an amount: thousands are grouped and decimal places are fixed. Customise separators and precision with `moneyThousandsSeparator`, `moneyDecimalSeparator`, and `moneyPrecision` (set precision to `0` to disable decimals).

```blade
<x-bladewind::input name="price" money="true" />

<x-bladewind::input
    name="price_eu"
    money="true"
    moneyThousandsSeparator="."
    moneyDecimalSeparator=","
    moneyPrecision="2" />
```

Masking forces the field to `type="text"` so formatted values (separators and letters) are preserved, so you don't need to set `numeric="true"` on a masked field.

## Inputs With Labels

Labels present themselves as placeholders but jump to the top border of the textbox when it has focus, making compact forms without labels getting in the way. To style your own labels, ignore `label` and use `placeholder` instead.

```blade
<x-bladewind::input label="Full name" />
```

### What Happens When Both Placeholder and Label Are Set

The `label` attribute replaces `placeholder` visually: the label sits where the placeholder text is displayed and covers it up. If the placeholder is longer than the label, part of it can stick out. Set `show_placeholder_always="true"` to keep the placeholder visible alongside the label.

```blade
<x-bladewind::input
    name="mobile" label="Mobile" placeholder="000.0000.000" show_placeholder_always="true" />
```

## Required Fields

Setting `required="true"` adds a red asterisk to the placeholder text or a red star to the label.

```blade
<x-bladewind::input required="true" label="Full name" />
```

## Events

Any HTML event attribute (`onclick`, `onblur`, `onfocus`, `onmouseover`, `onmouseout`, `onkeyup`, `onkeydown`, etc.) can be appended to the component just like a regular `<input>` tag.

```blade
<x-bladewind::input
    name="events"
    label="Full name"
    required="true"
    onfocus="changeCss('.events', '!border-2,!border-red-400')"
    onblur="changeCss('.events', '!border-2,!border-red-400', 'remove')" />
```

### Validating Required Fields

BladewindUI ships with a JavaScript helper, `validateForm(element)`, for validating input and textarea fields with `required="true"`. Error messages can be displayed inline or via the [Notification](/component/notification) component. Set `error_message` on a field to show a message when the field is empty and validation runs; set `show_error_inline="true"` to render that message beneath the field instead of via the notification.

```blade
<x-bladewind::notification />

<x-bladewind::card>
    <form method="get" class="signup-form">
        <h1>Create Account</h1>

        <x-bladewind::input
            name="fname"
            required="true"
            label="Full Name"
            error_message="You will need to enter your full name" />

        <div class="flex gap-4">
            <x-bladewind::input
                name="email"
                required="true"
                label="Email" />

            <x-bladewind::input
                name="mobile"
                label="Mobile"
                numeric="true" />
        </div>

        <x-bladewind::textarea
            required="true"
            name="bio"
            error_message="Yoh! write something nice about yourself"
            show_error_inline="true"
            label="Describe yourself"></x-bladewind::textarea>

        <div class="text-center">
            <x-bladewind::button
                name="btn-save"
                has_spinner="true"
                type="primary"
                can_submit="true"
                class="mt-3">
                Sign Up Today
            </x-bladewind::button>
        </div>
    </form>
</x-bladewind::card>
```

```js
// domEl(), validateForm(), hide() and unhide() are helper functions available in BladewindUI

domEl('.signup-form').addEventListener('submit', function (e){
    e.preventDefault();
    signUp();
});

signUp = () => {
    (validateForm('.signup-form')) ?
        unhide('.btn-save .bw-spinner') : // do this if validated
        hide('.btn-save .bw-spinner'); // do this if not validated
}
```

## Manipulating Inputs Using JavaScript

BladewindUI uses the `name` attribute defined on an input as part of its `class` attribute, making it easy to target fields in JavaScript based on user selections.

For example, a form that only reveals guardian fields for users under 18:

```blade
<div class="flex gap-4">
    <x-bladewind::input name="full_name" required="true" label="Full name" />
    <x-bladewind::input name="age_camp" label="How old are you?"
        required="true" numeric="true" with_dots="true" />
</div>
<b class="guardian-info py-2 block hidden">Who is your guardian?</b>
<div class="guardian flex gap-4 hidden">
    <x-bladewind::input name="guardian_name_camp" required="true" label="Guardian's Name" />
    <x-bladewind::input name="guardian_email_camp"
        label="Guardian's email"
        onkeyup="showAddress(this.value)" />
</div>
<x-bladewind::input name="guardian_address" placeholder="Guardian's address" class="hidden" />
```

The rendered `age_camp` input carries the name in its class, so it can be targeted directly:

```blade
<input
    class="bw-input peer required age_camp placeholder-transparent dark:placeholder-transparent"
    type="text"
    id="age_camp"
    name="age_camp"
    value=""
    autocomplete="off"
    placeholder="How old are you?" />
```

```js
// domEl, unhide and hide are helper functions in BladewindUI
domEl('.age_camp').addEventListener('keyup', (el) => {
    if(el.target.value !== ''  && el.target.value < 18 ){
        unhide('.guardian-info');
        unhide('.guardian');
    } else {
        hide('.guardian-info');
        hide('.guardian');
    }
})

showAddress = (value) => {
    if(value !== '') unhide('.guardian_address');
}
```

To manipulate BladewindUI input elements using JavaScript, target them using the name defined either in the class or id attributes.

## Prefixes and Suffixes

Prefix or append content to an input field, for example a `https://` prefix on a URL field, or an `@` prefix for social handles. Prefixes and suffixes support text and [icons](/component/icon).

### Prefixes

Prefixes work even when the input has a label.

```blade
<x-bladewind::input name="site" label="website address" prefix="https://" />
```

They also work with a placeholder instead of a label.

```blade
<x-bladewind::input name="site2" placeholder="website address" prefix="https://" />
<x-bladewind::input name="usd" placeholder="0.00" prefix="USD" numeric />
<x-bladewind::input name="twitter" placeholder="Twitter handle" prefix="@" />
<x-bladewind::input name="gh" placeholder="username" prefix="https://github.com/" />
```

### Suffixes

Suffixes get appended to the end of the input field.

```blade
<x-bladewind::input name="space" placeholder="workspace-name" suffix=".slack.com" />

<x-bladewind::input
    name="tnc"
    placeholder="Your bio. Keep it brief and nice"
    suffix='<a href="#">See some good examples</a>' />
```

### Prefix and Suffix Transparency

Opt for non-transparent prefixes and suffixes with `transparent_prefix="false"` and/or `transparent_suffix="false"`. Both a prefix and suffix can be specified together.

```blade
<x-bladewind::input
    name="usdbg"
    placeholder="0.00"
    prefix="USD"
    transparent_prefix="false"
    numeric />

<x-bladewind::input
    name="spacex"
    placeholder="workspace-name"
    transparent_suffix="false"
    suffix=".slack.com" />

<x-bladewind::input
    name="spacexx"
    prefix="https://"
    transparent_prefix="false"
    placeholder="workspace-name"
    suffix=".slack.com"
    transparent_suffix="false" />
```

## Inputs With Icons

Input icons are achieved using prefixes and suffixes, not a different kind of field. All [Heroicons](https://heroicons.com) names are supported out of the box, and custom SVG tags can be used too.

Since icons are achieved via prefixes/suffixes, set `prefix_is_icon="true"` or `suffix_is_icon="true"` so BladewindUI looks up an icon by that name instead of rendering it as plain text.

```blade
<x-bladewind::centered-content size="small">
    <x-bladewind::input
        name="fullname"
        placeholder="John T. Doe"
        prefix="user"
        prefix_is_icon="true" />

    <x-bladewind::input
        name="emailic"
        placeholder="me@bladewindui.com"
        prefix="envelope"
        prefix_is_icon="true" />

    <div class="flex gap-4">
        <x-bladewind::input
            name="fon"
            placeholder="0000.000.00"
            prefix="phone"
            prefix_is_icon="true" />

        <x-bladewind::input
            name="passw" type="password"
            placeholder="Password"
            prefix="key"
            prefix_is_icon="true"
            prefix_icon_css="text-orange-500"
            viewable="true" />
    </div>

    <x-bladewind::button class="w-full">Sign Up</x-bladewind::button>
</x-bladewind::centered-content>
```

An SVG tag or custom SVG file can be used as the icon directly:

```blade
<x-bladewind::input
    name="www"
    placeholder="website address"
    prefix_is_icon="true"
    prefix='<svg xmlns="http://www.w3.org/2000/svg" fill="none"
    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
    class="w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
</svg>' />
```

## Clearable Inputs

Clearable fields display an x icon when the field has a value; clicking it clears the text. Set `clearable="true"`. If a table shares the same name as the input, it is reset as well, useful for searchable [tables](/component/table#searchable).

```blade
<x-bladewind::input placeholder="I am clearable" clearable />
```

## Input Field Sizes

The input comes in sizes matching the various button sizes, useful for putting an input and a button on one line. Set the `size` attribute. The `tiny` size is not supported for inputs.

```blade
<x-bladewind::input label="I am small" size="small" />
<x-bladewind::input label="I am regular" />
<x-bladewind::input label="I am medium" size="medium" />
<x-bladewind::input label="I am big" size="big" />
```

## Laravel Form State

When validation fails, Laravel redirects back with submitted values flashed to the session and messages in `$errors`. The Input component can read both, avoiding manual `old('...')` and error blocks on every field.

```blade
<x-bladewind::input
    name="email"
    label="Email address"
    fill_from_old="true"
    show_validation_error="true" />
```

`fill_from_old` repopulates the field from `old()`. `show_validation_error` gives the field its error state and renders `$errors->first()` underneath it. Add `error_bag` if validating into a named bag.

Both are off by default. If your form already prints its own validation messages, switching this on without removing them prints every message twice.

### Turning It On For Every Form

Rather than setting attributes field by field, set them once in `config/bladewind.php` and every form component follows.

```php
// config/bladewind.php
'forms' => [
    'fill_from_old' => true,
    'show_validation_error' => true,
    'error_bag' => null,
],
```

An attribute on a single field always wins over the config, so a field can opt out with `show_validation_error="false"`.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | input-uniqid() | Unique name to identify the input element by. Useful for retrieving the value when the form is submitted. Defaults to a random name prefixed with `input-`. |
| type | text | Valid HTML input element types, e.g. `text` \| `email` \| `password` \| `search` \| `tel`. |
| label | blank | Label that describes the input element. |
| numeric | false | Restrict the input to numeric characters only. `true` \| `false` |
| required | false | Whether the field is required. Displays a red asterisk next to the placeholder or label. `true` \| `false` |
| add_clearing | true | Add an 8px bottom margin so form fields are evenly spaced by default. `true` \| `false` |
| placeholder | blank | Placeholder text. |
| show_placeholder_always | false | Placeholder is normally hidden when `label` has a value; set true to always show it. `true` \| `false` |
| error_message | blank | Message shown when the form is validated and the field is blank. |
| show_error_inline | false | Display error messages inline instead of via the Notification component (default). `true` \| `false` |
| error_heading | Error | Translatable heading for the error, used only when displaying validation errors via the Notification component. |
| selected_value | blank | Default value for the input, useful in edit mode. |
| with_dots | true | Relevant when `numeric="true"`. Whether numeric values may contain dots. `true` \| `false` |
| mask | blank | Static mask template using wildcards `9` (digit), `a` (letter), `*` (alphanumeric). Example: `mask="(999) 999-9999"`. |
| dynamicMask | null | Dynamic mask for formats that change as the user types. Use the built-in `creditCard`, or the name of a global JS function returning a mask template. |
| money | false | Format the field as a money input, grouping thousands and fixing decimal places. `true` \| `false` |
| moneyDecimalSeparator | . | Character separating the decimal part when `money="true"`. |
| moneyThousandsSeparator | , | Character grouping thousands when `money="true"`. |
| moneyPrecision | 2 | Number of decimal places when `money="true"`. Set to `0` to disable decimals. |
| prefix | blank | Prefix for the input field. |
| prefix_is_icon | false | Whether `prefix` is an icon rather than text. `true` \| `false` |
| prefix_icon_type | outline | Style of icon used as a prefix. `outline` \| `solid` |
| transparent_prefix | true | Whether the prefix has a transparent background. `true` \| `false` |
| prefix_icon_div_css | blank | Additional CSS classes for the DIV containing the prefix when `prefix_is_icon=true`. |
| prefix_icon_css | blank | Additional CSS classes for the prefix icon when `prefix_is_icon=true`. |
| suffix | blank | Suffix for the input field. |
| suffix_is_icon | false | Whether `suffix` is an icon rather than text. `true` \| `false` |
| suffix_icon_type | outline | Style of icon used as a suffix. `outline` \| `solid` |
| transparent_suffix | true | Whether the suffix has a transparent background. `true` \| `false` |
| suffix_icon_div_css | blank | Additional CSS classes for the DIV containing the suffix when `suffix_is_icon=true`. |
| suffix_icon_css | blank | Additional CSS classes for the suffix icon when `suffix_is_icon=true`. |
| viewable | false | Works only if `type=password`. Show an eye icon to reveal the password. `true` \| `false` |
| clearable | false | Appends an 'x' circle suffix to clear the entered text. `true` \| `false` |
| size | medium | Sizing to match button sizes. `small` \| `regular` \| `medium` \| `big` |
| nonce | null | Nonce for content security policies on inline scripts. Can also be set globally via `config/bladewind.php` under `script`. |
| fill_from_old | false | Repopulate the field from `old()` after a failed Laravel validation redirect. Defaults to `bladewind.forms.fill_from_old`. `true` \| `false` |
| show_validation_error | false | Give the field its error state and render `$errors->first()` beneath it. Defaults to `bladewind.forms.show_validation_error`. `true` \| `false` |
| error_bag | null | Error bag to read from when `show_validation_error` is on. Leave unset for Laravel's default bag. |

## Full Example

```blade
<x-bladewind::input
    name="pin"
    label="Enter PIN"
    placeholder=""
    type="password"
    numeric="false"
    add_clearing="false"
    required="true"
    error_message="PIN can only be 4 digits"
    show_error_inline="true"
    error_heading="Bugged"
    with_dots="true"
    show_placeholder_always="true"
    selected_value=""
    size="medium"
    prefix="Email"
    transparent_prefix="false"
    prefix_is_icon="false"
    prefix_icon_type="solid"
    prefix_icon_css=""
    suffix="@gmail.com"
    transparent_suffix="false"
    suffix_is_icon="false"
    suffix_icon_type="solid"
    suffix_icon_css=""
    viewable="false"
    clearable="false"
/>
```
