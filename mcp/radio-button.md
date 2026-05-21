---
title: Radio Button Component
component: x-bladewind::radio
url: /component/radio-button
---

# Radio Button

Display a radio button with or without a label. The default radio button colour is blue but there are nine colours available to choose from.

```blade
<x-bladewind::radio name="tnc" />
```

Radio buttons are often used in groups. Give each radio in a group the same `name` to make them mutually exclusive.

```blade
<x-bladewind::radio label="Action" name="genre" />
<x-bladewind::radio label="Comedy" name="genre" />
<x-bladewind::radio label="Drama" name="genre" />
<x-bladewind::radio label="Thriller" name="genre" />
```

A radio button can be checked by default using `checked="true"`.

```blade
<x-bladewind::radio
    label="I am checked by default"
    checked="true"
    name="check_me" />
```

Radio buttons can also be disabled.

```blade
<x-bladewind::radio
    label="I am disabled"
    disabled="true" />
```

## Coloured Radio Buttons

Like most of the BladewindUI components, radios also come in twelve colours to enable the components sit better in most designs with various colour schemes.

```blade
<x-bladewind::radio color="red" checked="true" label="I am a red radio" />
<x-bladewind::radio color="yellow" label="I am a yellow radio" />
<x-bladewind::radio color="green" label="I am a green radio" />
<x-bladewind::radio color="pink" label="I am a pink radio" />
<x-bladewind::radio color="cyan" label="I am a cyan radio" />
<x-bladewind::radio color="black" label="I am a black radio" />
<x-bladewind::radio color="purple" label="I am a purple radio" />
<x-bladewind::radio color="orange" label="I am an orange radio" />
<x-bladewind::radio color="blue" label="I am a blue radio" />
<x-bladewind::radio color="violet" label="I am a violet radio" />
<x-bladewind::radio color="indigo" label="I am an indigo radio" />
<x-bladewind::radio color="fuchsia" label="I am a fuchsia radio" />
```

### Radio Buttons and Forms

When using radio buttons with forms, it is always good practice to give the radio button a name and value. That way, when the form is submitted, the value of the radio button can be retrieved from its name. It is important to note that, in some cases, if the user does not select the radio button, the name of the radio button will be ignored completely from your payload.

```blade
<x-bladewind::radio
    name="notify_me"
    value="1"
    label="Send me weekly newsletters" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | radio | This name can be accessed when the radio button is submitted in the form. The name is also available as part of the css classes. |
| label | _blank_ | Text to be displayed next to the radio button. |
| value | _blank_ | In case you are editing a form, the value passed will be set on the value attribute of the radio button. |
| checked | false | Determines if the radio button is checked or not. Value needs to be set as a string not boolean. `true` \| `false` |
| disabled | false | Determines if the radio button is disabled or not. Value needs to be set as a string not boolean. `true` \| `false` |
| add_clearing | true | Adds a margin to the bottom of the radio button to separate it from the next form element. `true` \| `false` |
| class | bw-radio button | Any additional css classes can be added using this attribute. |
| color | blue | There are twelve colors to choose from. `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| label_css | mr-6 | Applies styling to the radio button label. |

## Full Example

```blade
<x-bladewind::radio
    label="I agree to the terms and conditions"
    checked="false"
    disabled="false"
    color="pink"
    name="tnc"
    value="yes"
    class="shadow-sm" />
```
