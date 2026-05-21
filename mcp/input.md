---
title: Input Component
component: x-bladewind::input
url: /component/input
---

# Input

Displays a text input element. This is also commonly known as a text box. This component works for all the possible values of `<input type="" .../>`. The default is `input type="text"`. This Bladewind component simply wraps the HTML input so you are free to use all the various [input attributes](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input#attributes) available in HTML.

```blade
<x-bladewind::input />
```

## Password Input

This behaves just like the regular HTML password input. Nothing fancy. Any values entered into this field are masked.

```blade
<x-bladewind::input type="password" />
```

### Reveal Passwords

The component allows you to specify if the user should be able to view the password they entered by clicking on an eye. This can be achieved by setting `viewable="true"`. The eye is appended as a suffix to the input. Clicking on the eye when the password is revealed, hides the password. The eye icon will be displayed ONLY if the input `type="password"`. It will be ignored in all other cases.

```blade
<x-bladewind::input type="password" viewable="true" />
```

## Numeric Input

This accepts only numeric values. Useful when entering phone numbers, age or amounts. By default the decimal point is not allowed as it is technically not a number. In cases where you need decimals, use the attribute `with_dots="true"`.

```blade
<x-bladewind::input numeric="true" />
```

### Minimum & Maximum Values

You may want users to enter a minimum or maximum number when using the numeric input. For example, let's say employees cannot request more than 5 days off per leave request. Your input could restrict the maximum number of days off to 5 when a user is filling the form.

```blade
<x-bladewind::input
    placeholder="Minimum is 3"
    name="input-min"
    numeric="true"
    min="3"
    error_message="Minimum value must be 3"
    show_error_inline="true" />
```

```blade
<x-bladewind::input
    placeholder="Maximum is 12"
    name="input-max"
    numeric="true"
    max="12"
    error_message="Maximum value must be 12" />
```

## Inputs With Labels

You can display the BladewindUI textbox with labels. Labels present themselves as placeholders but jump to the top border of the textbox when that field has focus. This is a nice way to build compact looking forms without having form labels in the way. If you prefer to create and style your own form labels, simply ignore the `label` attribute and use the `placeholder` attribute instead.

```blade
<x-bladewind::input label="Full name" />
```

### Placeholder Text

```blade
<x-bladewind::input placeholder="Full name" />
```

### What Happens When Both Placeholder and Label are Set

The `label` attribute actually replaces `placeholder`. In most common cases input labels are displayed above the input box and don't interfere with the input's placeholder text. However, the label for Bladewind's Textbox component is designed to sit in the same spot where the placeholder text is displayed and covers it up. Having a placeholder text that is longer than your label text results in some parts of the placeholder text sticking out under the label. If you want the placeholder to still be shown even when there is a label, set `show_placeholder_always="true"`.

```blade
<x-bladewind::input
    name="mobile" label="Mobile" placeholder="000.0000.000" />
```

## Required Fields

This either adds a red asterisk sign to the placeholder text or a red star to the label of the input field.

```blade
<x-bladewind::input required="true" label="Full name" />
```

## Events

You can append any of the available HTML event attributes (_onclick, onblur, onfocus, onmouseover, onmouseout, onkeyup, onkeydown_ etc) to the component, just like you would to a regular `<input ...` tag.

```blade
<x-bladewind::input
    name="events"
    label="Full name"
    required="true"
    onfocus="changeCss('.events', '!border-2,!border-red-400')"
    onblur="changeCss('.events', '!border-2,!border-red-400', 'remove')" />
```

### Validating Required Fields

Bladewind comes with a very handy Javascript helper function (`validateForm(element)`) for validating input and textarea fields that have the attribute `required='true"` set. Error messages can either be displayed inline or using the [Bladewind notification](/component/notification) component.

The `error_message` attribute defines what will be displayed if the field is empty when the form is validated. The `show_error_inline="true"` attribute will display the error message beneath the field it was set on.

```blade
<x-bladewind::notification />

<x-bladewind::card>
    <form method="get" class="signup-form">
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

## JavaScript

```js
// domEl, unhide and hide are helper functions in BladewindUI
domEl('.signup-form').addEventListener('submit', function (e){
    e.preventDefault();
    signUp();
});

signUp = () => {
    (validateForm('.signup-form')) ?
        unhide('.btn-save .bw-spinner') :
        hide('.btn-save .bw-spinner');
}
```

## Manipulating Inputs Using Javascript

There are several instances where you will want to manipulate input fields for different reasons. Most times, manipulating an input field will be dependent on a user's selection. This can be achieved in Javascript since BladewindUI uses the `name` attribute defined on an input as part of its `class` attribute.

The name you provided to the Input component has been used as part of the `class` names of the component. This makes it easy for you to access the component in Javascript.

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

To manipulate BladewindUI input elements using Javascript, simply target them using the name defined either in the class or id attributes.

## Prefixes and Suffixes

There are cases where you need to prefix or append something to an input field. For example, you want to prefix a URL input field with 'https://' so your users wouldn't need to type that in every time. Or, when asking your app users for their social media handles you may want to always have the '@' prefix. For now prefixes and suffixes support only text and [icons](/component/icon).

### Prefixes

You can use prefixes even when your input has a label.

```blade
<x-bladewind::input name="site" label="website address" prefix="https://" />
```

```blade
<x-bladewind::input name="site2" placeholder="website address" prefix="https://" />
```

```blade
<x-bladewind::input name="usd" placeholder="0.00" prefix="USD" />
```

```blade
<x-bladewind::input name="twitter" placeholder="Twitter handle" prefix="@" />
```

```blade
<x-bladewind::input name="gh" placeholder="username" prefix="https://github.com/" />
```

### Suffixes

Suffixes get appended to the end of the input field.

```blade
<x-bladewind::input name="space" placeholder="workspace-name" suffix=".slack.com" />
```

```blade
<x-bladewind::input
    name="tnc"
    placeholder="Your bio. Keep it brief and nice"
    suffix='<a href="#">See some good examples</a>' />
```

### Prefix and Suffix Transparency

You can opt for non-transparent prefixes and suffixes by setting the attribute `transparent_prefix="false"` and/or `transparent_suffix="false"`. You can specify both a prefix and suffix on your input fields.

```blade
<x-bladewind::input
    name="usdbg"
    placeholder="0.00"
    prefix="USD"
    transparent_prefix="false"
    numeric />
```

```blade
<x-bladewind::input
    name="spacex"
    placeholder="workspace-name"
    transparent_suffix="false"
    suffix=".slack.com" />
```

```blade
<x-bladewind::input
    name="spacexx"
    prefix="https://"
    transparent_prefix="false"
    placeholder="workspace-name"
    suffix=".slack.com"
    transparent_suffix="false" />
```

## Inputs With Icons

The BladewindUI input field can have an icon for those moments where you want a simple icon to describe the field. This is not a different kind of input field. We simply make use of prefixes and suffixes to achieve this effect. All [Heroicons](https://heroicons.com) names are supported out of the box. You can also specify an SVG tag to be used as an icon.

Since input icons are achieved using prefixes, it is important to add the attribute `prefix_is_icon="true"` if you are using icons as prefixes or `suffix_is_icon="true"` if you are using icons as suffixes. This way Bladewind forces your prefix or suffix to be an icon and not text.

```blade
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
```

## Clearable Inputs

Clearable fields display an x icon when a field has a value entered. Clicking on the x icon deletes the text in the input field. Quite handy and saves users from clicking the backspace several times in say, a search field. This is achieved by setting the `clearable="true"` attribute. If there is a table that shares the same name as the input field, it will be reset as well.

```blade
<x-bladewind::input placeholder="I am clearable" clearable />
```

## Input Field Sizes

The input field comes in sizes to match the various button sizes. This is useful if you wish to have an input field and a button on one line. Set the `size` attribute to achieve this. The `tiny` size is not supported for input fields.

```blade
<x-bladewind::input label="I am small" size="small" />
```

```blade
<x-bladewind::input label="I am regular" />
```

```blade
<x-bladewind::input label="I am medium" size="medium" />
```

```blade
<x-bladewind::input label="I am big" size="big" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | input-uniqid() | Unique name to identify the input element by. Useful for retrieving value from the input when it is submitted in a form. |
| type | text | Accepts list of valid HTML input element types. `text` \| `email` \| `password` \| `search` \| `tel` |
| label | _(blank)_ | Label that describes the input element. Example: Full name |
| numeric | false | Specifies if the input element should accept only numeric characters. `true` \| `false` |
| required | false | Specifies if the input element is required or not. When required, a red asterisk is displayed next to the placeholder or label. `true` \| `false` |
| add_clearing | true | Specifies if an 8px margin should be added to the bottom of the element. `true` \| `false` |
| placeholder | _(blank)_ | Placeholder text to display in the input element. |
| show_placeholder_always | false | Placeholder text is hidden when the label attribute has a value. Setting this to true always shows the placeholder. `true` \| `false` |
| error_message | _(blank)_ | The message to display when the form is validated and field happens to be blank. |
| show_error_inline | false | Error messages can either be displayed inline or using the Notification component (default). `true` \| `false` |
| error_heading | Error | Only used when displaying validation errors using the Notification component. Provides a way to specify a translatable heading for the error. |
| selected_value | _(blank)_ | Default value to display in the input element. Useful when in edit mode. |
| with_dots | true | Mostly relevant if `numeric="true"`. Determines if numeric values can contain dots or not. `true` \| `false` |
| prefix | blank | Specify the prefix for the input field. |
| prefix_is_icon | false | If prefix is specified, is it an icon. By default prefixes are treated as text. `true` \| `false` |
| prefix_icon_type | outline | If an icon is used as a prefix, should it be a solid or outline icon. `outline` \| `solid` |
| transparent_prefix | true | If a prefix is defined, should it have a transparent background or not. `true` \| `false` |
| prefix_icon_div_css | blank | Additional css classes to apply to the DIV containing the prefix if **prefix_is_icon=true**. |
| prefix_icon_css | blank | Additional css classes to apply to the prefix if **prefix_is_icon=true**. |
| suffix | blank | Specify the suffix for the input field. |
| suffix_is_icon | false | If suffix is specified, is it an icon. By default suffixes are treated as text. `true` \| `false` |
| suffix_icon_type | outline | If an icon is used as a suffix, should it be a solid or outline icon. `outline` \| `solid` |
| transparent_suffix | true | If a suffix is defined, should it have a transparent background or not. `true` \| `false` |
| suffix_icon_div_css | blank | Additional css classes to apply to the DIV containing the suffix if **suffix_is_icon=true**. |
| suffix_icon_css | blank | Additional css classes to apply to the suffix if **suffix_is_icon=true**. |
| viewable | false | Works only if **type=password**. Should the password be viewable? If `true`, an eye icon is displayed. `true` \| `false` |
| clearable | false | Appends an 'x' circle for clearing any text that has been entered in the input field. `true` \| `false` |
| size | medium | Sizing of the input to match button sizes. `small` \| `regular` \| `medium` \| `big` |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts. |

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
