---
title: Checkbox Component
component: x-bladewind::checkbox
url: /component/checkbox
---

# Checkbox

Display a checkbox with or without a label. The default checkbox colour is blue but there are nine colours available to choose from.

## Basic Usage

```blade
<x-bladewind::checkbox  />
```

```blade
<x-bladewind::checkbox label="I agree to the terms and conditions"  />
```

Labels can include HTML such as links:

```blade
<x-bladewind::checkbox
    label="I agree to the <a href='/terms'>terms and conditions</a>"  />
```

Checkboxes can be checked by default:

```blade
<x-bladewind::checkbox
    label="I am checked by default"
    checked="true"  />
```

Checkboxes can be disabled:

```blade
<x-bladewind::checkbox
    label="I am disabled"
    disabled="true"  />
```

## Coloured Checkboxes

Like most of the BladewindUI components, checkboxes also come in nine colours to enable the components sit better in most designs with various colour schemes.

```blade
<x-bladewind::checkbox color="red" checked="true" label="I am a red checkbox" />
<x-bladewind::checkbox color="yellow" checked="true" label="I am a yellow checkbox" />
<x-bladewind::checkbox color="green" checked="true" label="I am a green checkbox" />
<x-bladewind::checkbox color="pink" checked="true" label="I am a pink checkbox" />
<x-bladewind::checkbox color="cyan" checked="true" label="I am a cyan checkbox" />
<x-bladewind::checkbox color="black" checked="true" label="I am a black checkbox" />
<x-bladewind::checkbox color="purple" checked="true" label="I am a purple checkbox" />
<x-bladewind::checkbox color="orange" checked="true" label="I am a orange checkbox" />
<x-bladewind::checkbox color="blue" checked="true" label="I am a blue checkbox" />
<x-bladewind::checkbox color="violet" checked="true" label="I am a violet checkbox" />
<x-bladewind::checkbox color="indigo" checked="true" label="I am a indigo checkbox" />
<x-bladewind::checkbox color="fuchsia" checked="true" label="I am a fuchsia checkbox" />
```

## Checkboxes and Forms

When using checkboxes with forms, it is always good practice to give the checkbox a name and value. That way, when the form is submitted, the value of the checkbox can be retrieved from its name. It is important to note that, in some cases, if the user does not select the checkbox, the name of the checkbox will be ignored completely from your payload.

```blade
<x-bladewind::checkbox
    name="notify_me"
    value="1"
    label="Send me weekly newsletters" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | `checkbox` | This name can be accessed when the checkbox is submitted in the form. The name is also available as part of the css classes |
| label | blank | Text to be displayed next to the checkbox |
| value | blank | In case you are editing a form, the value passed will be set on the value attribute of the checkbox |
| checked | `false` | Specifies whether the checkbox is checked or not. Value needs to be set as a string not boolean. `true` `false` |
| disabled | `false` | Specifies whether the checkbox is disabled or not. Value needs to be set as a string not boolean. `true` `false` |
| add_clearing | `true` | Adds a margin to the bottom of the checkbox to separate it from the next form element. `true` `false` |
| color | `primary` | Color of the checkbox rings. `primary` `red` `yellow` `green` `blue` `black` `cyan` `orange` `purple` `pink` `violet` `indigo` `fuchsia` |
| class | `bw-checkbox` | Any additional css classes can be added using this attribute |
| label_css | `mr-6` | Applies styling to the checkbox label |

## Full Example

```blade
<x-bladewind::checkbox
    label="I agree to the terms and conditions"
    checked="false"
    disabled="false"
    name="tnc"
    value="yes"
    color="pink"
    label_css="font-bold"
    class="shadow-sm" />
```
