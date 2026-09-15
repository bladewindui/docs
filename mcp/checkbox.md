---
title: Checkbox Component
component: x-bladewind::checkbox
url: /component/checkbox
---

# Checkbox

Display a checkbox with or without a label. The default checkbox colour is blue, and nine other colours are available.

## Basic Usage

```blade
<x-bladewind::checkbox />
```

## Labels

Add a `label`, which accepts HTML such as links. Set `checked="true"` to check it by default, and `disabled="true"` to disable it.

```blade
<x-bladewind::checkbox label="I agree to the terms and conditions" />

<x-bladewind::checkbox
    label="I agree to the <a href='/terms'>terms and conditions</a>" />

<x-bladewind::checkbox label="I am checked by default" checked="true" />

<x-bladewind::checkbox label="I am disabled" disabled="true" />
<x-bladewind::checkbox label="I am checked and disabled" disabled="true" checked="true" />
```

## Coloured Checkboxes

Checkboxes come in nine colours so they can fit various colour schemes.

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

Give the checkbox a `name` and `value` so the value can be retrieved from the payload when the form is submitted. Note that an unchecked checkbox is omitted entirely from the payload.

```blade
<x-bladewind::checkbox name="notify_me" value="1" label="Send me weekly newsletters" />
```

## Laravel Form State

When validation fails, Laravel redirects back with the submitted values flashed to the session and the messages in `$errors`. The Checkbox component can read both for you, so you no longer write `old('...')` and an error block on every field.

```blade
<x-bladewind::checkbox
    name="terms"
    value="yes"
    label="I agree to the terms"
    fill_from_old="true"
    show_validation_error="true" />
```

`fill_from_old` repopulates the field from `old()`. `show_validation_error` gives the field its error state and renders `$errors->first()` underneath it. Add `error_bag` if you validate into a named bag.

Checkboxes need a little more care than a text field. An unticked box submits nothing at all, so "this field is missing from the old input" only means unchecked once a submission has actually bounced back. On a form's first render there is no old input, and a box set with `checked="true"` stays checked. For a group of checkboxes sharing one name, only the boxes whose values were submitted come back ticked.

Both `fill_from_old` and `show_validation_error` are off by default. If your form already prints its own validation messages, switching this on without removing them would print every message twice.

### Turning It On for Every Form

Rather than setting the attributes field by field, set them once in `config/bladewind.php` and every form component follows.

```php
// config/bladewind.php
'forms' => [
    'fill_from_old' => true,
    'show_validation_error' => true,
    'error_bag' => null,
],
```

An attribute on a single field always wins over the config, so you can opt one field out with `show_validation_error="false"`.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | checkbox | Accessible when the checkbox is submitted in the form. Also used as part of the CSS classes. |
| label | *blank* | Text to display next to the checkbox. |
| value | *blank* | Value set on the checkbox's value attribute, useful when editing a form. |
| checked | false | Whether the checkbox is checked. `true` \| `false` |
| disabled | false | Whether the checkbox is disabled. `true` \| `false` |
| add_clearing | true | Adds bottom margin to separate from the next form element. `true` \| `false` |
| color | primary | Colour of the checkbox rings. `primary` \| `red` \| `yellow` \| `green` \| `blue` \| `black` \| `cyan` \| `orange` \| `purple` \| `pink` \| `violet` \| `indigo` \| `fuchsia` |
| class | bw-checkbox | Any additional CSS classes. |
| label_css | mr-6 | Styling applied to the checkbox label. |
| fill_from_old | false | Repopulate from `old()` after a failed validation redirect. Defaults to `bladewind.forms.fill_from_old`. `true` \| `false` |
| show_validation_error | false | Give the field its error state and render `$errors->first()` beneath it. Defaults to `bladewind.forms.show_validation_error`. `true` \| `false` |
| error_bag | null | Which error bag to read when `show_validation_error` is on. Leave unset for Laravel's default bag. |

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
