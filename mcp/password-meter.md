---
title: Password Meter Component
component: x-bladewind::password-meter
url: /component/password-meter
---

# Password Meter

`x-bladewind::password-meter` watches an existing password field and shows a rules-based strength reading as the
user types — a segmented bar plus a text label, live-updated on every keystroke. It is a standalone companion, not a
wrapper: point it at any password field with `for`, BladewindUI's own or otherwise.

## Basic Usage

```blade
<x-bladewind::input type="password" name="password" label="Password" viewable="true" />
<x-bladewind::password-meter for="password" />
```

`for` is the watched field's `name` (or, failing that, its `id`) — exactly what you already passed the field itself,
nothing extra to keep in sync.

## How strength is scored

A password earns up to four points: one for reaching `minLength` characters (8 by default), a second for reaching
`strongLength` (12 by default), and up to two more for character variety — lowercase, uppercase, digits, and symbols
each count, capped at two points so length still matters. Four points is "Strong", one is "Weak", and an empty field
shows nothing at all.

```blade
<x-bladewind::password-meter for="password" min-length="10" strong-length="16" />
```

## Hiding the label

The bar is always shown; set `show-label="false"` to drop the text readout beside it and rely on the bar's colour
alone.

```blade
<x-bladewind::password-meter for="password" show-label="false" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| for | _(required)_ | The `name` (or `id`) of the password field to watch. |
| showLabel | true | Shows the "Weak" / "Fair" / "Good" / "Strong" text readout. |
| minLength | 8 | Character count that earns the first length point. |
| strongLength | 12 | Character count that earns the second length point. |
| class | _(blank)_ | Additional CSS classes for the wrapper element. |
