---
title: Radio Button Component
component: x-bladewind::radio
url: /component/radio-button
---

# Radio Button

Displays a radio button with or without a label. The default color is blue, with nine other colors available.

## Basic Usage

```blade
<x-bladewind::radio name="tnc" />
```

## Grouping Radio Buttons

Give each radio in a group the same `name` so only one can be selected at a time.

```blade
<x-bladewind::radio label="Action" name="genre" />
<x-bladewind::radio label="Comedy" name="genre" />
<x-bladewind::radio label="Drama" name="genre" />
<x-bladewind::radio label="Thriller" name="genre" />
```

## Checked and Disabled States

```blade
<x-bladewind::radio label="I am checked by default" checked="true" name="check_me" />

<x-bladewind::radio label="I am disabled" disabled="true" />

<x-bladewind::radio label="I am checked and disabled" disabled="true" checked="true" />
```

## Coloured Radio Buttons

Radios come in twelve colors to fit various design color schemes.

```blade
<x-bladewind::radio color="red" checked="true" label="I am a red radio" />
<x-bladewind::radio color="yellow" checked="true" label="I am a yellow radio" />
<x-bladewind::radio color="green" checked="true" label="I am a green radio" />
<x-bladewind::radio color="pink" checked="true" label="I am a pink radio" />
<x-bladewind::radio color="cyan" checked="true" label="I am a cyan radio" />
<x-bladewind::radio color="black" checked="true" label="I am a black radio" />
<x-bladewind::radio color="purple" checked="true" label="I am a purple radio" />
<x-bladewind::radio color="orange" checked="true" label="I am a orange radio" />
<x-bladewind::radio color="blue" checked="true" label="I am a blue radio" />
<x-bladewind::radio color="violet" checked="true" label="I am a violet radio" />
<x-bladewind::radio color="indigo" checked="true" label="I am a indigo radio" />
<x-bladewind::radio color="fuchsia" checked="true" label="I am a fuchsia radio" />
```

## Radio Buttons and Forms

Give each radio a `name` and `value` so the selected value can be retrieved when the form is submitted. Note that if the user doesn't select any radio in a group, the name may be omitted entirely from the submitted payload.

```blade
<x-bladewind::radio
    name="notify_me"
    value="1"
    label="Send me weekly newsletters" />
```

## Laravel Form State

When validation fails, Laravel redirects back with submitted values flashed to the session and messages in `$errors`. The Radio component can read both for you, so you no longer write `old('...')` and an error block on every field.

```blade
<x-bladewind::radio
    name="plan"
    value="pro"
    label="Pro"
    fill_from_old="true"
    show_validation_error="true" />
```

`fill_from_old` repopulates the field from `old()`. `show_validation_error` gives the field its error state and renders `$errors->first()` underneath it. Add `error_bag` if validating into a named bag. Only the radio whose value was previously submitted comes back selected.

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
| name | radio | Name accessible when the radio button is submitted in the form. Also used as part of the CSS classes. |
| label | blank | Text displayed next to the radio button. |
| value | blank | Value set on the radio button's `value` attribute, useful when editing a form. |
| checked | false | Whether the radio button is checked. Set as a string, not boolean. `true` \| `false` |
| disabled | false | Whether the radio button is disabled. Set as a string, not boolean. `true` \| `false` |
| add_clearing | true | Adds a bottom margin to separate the radio from the next form element. Set as a string, not boolean. `true` \| `false` |
| class | bw-radio button | Additional CSS classes. |
| color | blue | `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| label_css | mr-6 | Styling applied to the radio button label. |
| fill_from_old | false | Repopulate the field from `old()` after a failed Laravel validation redirect. Defaults to `bladewind.forms.fill_from_old`. `true` \| `false` |
| show_validation_error | false | Give the field its error state and render `$errors->first()` beneath it. Defaults to `bladewind.forms.show_validation_error`. `true` \| `false` |
| error_bag | null | Error bag to read from when `show_validation_error` is on. Leave unset for Laravel's default bag. |

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
