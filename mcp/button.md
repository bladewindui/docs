---
title: Button Component
component: x-bladewind::button
url: /component/button
---

# Button

The button component renders clickable buttons with configurable type, size, colour, radius, icons, spinners, and states. The primary and secondary colours are picked from what's defined in your project's `app.css` `@theme` block; if not set, buttons default to the library's blue.

## Basic Usage

```blade
<x-bladewind::button>Subscribe Now</x-bladewind::button>
```

By default the component uses a `<button>` tag. To render an `<a>` tag instead, set `tag="a"`.

```blade
<x-bladewind::button tag="a" href="/">Subscribe Now</x-bladewind::button>
```

Set `uppercasing="false"` to stop the button text being rendered all uppercase.

```blade
<x-bladewind::button uppercasing="false">Subscribe Now</x-bladewind::button>
```

## Button Types

BladewindUI buttons come in four types: primary, secondary, circular, and outline (outline applies to all three others).

### Primary Buttons

Depend on the primary colour defined in your project's Tailwind config.

```blade
<x-bladewind::button>Primary Button</x-bladewind::button>
<x-bladewind::button outline="true">Primary Button</x-bladewind::button>
```

### Secondary Buttons

Depend on the secondary colour defined in your project's Tailwind config.

```blade
<x-bladewind::button type="secondary">Secondary Button</x-bladewind::button>
<x-bladewind::button type="secondary" outline="true">Secondary Button</x-bladewind::button>
```

### Circular Buttons

The circular button variant accepts only icons.

```blade
<x-bladewind::button.circle icon="bell-alert" />
<x-bladewind::button.circle outline="true" icon="bell-alert" />
```

Circular buttons set `type="circular"` internally, so a secondary circular button isn't directly possible. As a workaround, set `color="secondary"`.

```blade
<x-bladewind::button.circle color="secondary" outline icon="bell-alert" />
```

### Outline Buttons

Set `outline="true"` to render outline-only buttons. The outline picks up the `color` attribute for primary buttons; secondary buttons use their one colour. All other attributes (like `radius`) are preserved — only the background colour is lost.

```blade
<x-bladewind::button radius="full" outline="true" color="cyan">Cyan outline</x-bladewind::button>
<x-bladewind::button radius="full" outline="true" type="secondary">Secondary outline</x-bladewind::button>
```

By default outline buttons use a `border-2` width. Change it with `border_width` (unprefixed Tailwind border width).

```blade
<x-bladewind::button outline="true" border_width="2">Border 2</x-bladewind::button>
<x-bladewind::button outline="true" border_width="4">Border 4</x-bladewind::button>
<x-bladewind::button outline="true" border_width="8">Border 8</x-bladewind::button>
```

## Button States

### No Focus Rings

```blade
<x-bladewind::button show_focus_ring="false">No focus ring</x-bladewind::button>
```

### Different Focus Ring Widths

```blade
<x-bladewind::button>Default</x-bladewind::button>
<x-bladewind::button ring_width="1">Ring 1</x-bladewind::button>
<x-bladewind::button ring_width="2">Ring 2</x-bladewind::button>
<x-bladewind::button ring_width="4">Ring 4</x-bladewind::button>
<x-bladewind::button ring_width="8">Ring 8</x-bladewind::button>
```

### Disabled Button

```blade
<x-bladewind::button disabled="true">Disabled</x-bladewind::button>
<x-bladewind::button disabled="true" type="secondary">Disabled secondary</x-bladewind::button>
<x-bladewind::button disabled="true" outline="true">Disabled outline</x-bladewind::button>
```

### Different Sizes

Available sizes: `tiny`, `small`, `regular` (default), `medium`, `big`.

```blade
<x-bladewind::button size="tiny">tiny</x-bladewind::button>
<x-bladewind::button size="small">small</x-bladewind::button>
<x-bladewind::button>default</x-bladewind::button>
<x-bladewind::button size="medium">medium</x-bladewind::button>
<x-bladewind::button size="big">big</x-bladewind::button>
```

### Different Radii

The default is a full radius (very rounded). Change it with the `radius` attribute.

```blade
<x-bladewind::button radius="none">none</x-bladewind::button>
<x-bladewind::button radius="small">small</x-bladewind::button> {{-- this is the default --}}
<x-bladewind::button radius="medium">medium</x-bladewind::button>
<x-bladewind::button radius="full">full</x-bladewind::button>
```

## With Spinners

Buttons can show a spinner (via the Spinner component) to indicate progress. Set `has_spinner="true"` to enable it; the spinner is hidden by default. Set `show_spinner="true"` to make it visible from the start.

```blade
<x-bladewind::button has_spinner="true" show_spinner="true">Saving...</x-bladewind::button>
```

To trigger the spinner on click, set `name` and use the `showButtonSpinner()` helper in `onclick`.

```blade
<x-bladewind::button
    has_spinner="true"
    name="save-user"
    onclick="showButtonSpinner('.save-user')">
    Click for my spinner
</x-bladewind::button>
```

## With Icons

Set `icon` to any Heroicons icon name. Icons are positioned left by default; set `icon_right="true"` to position on the right. Note: if both `icon_right="true"` and `has_spinner="true"` are set, the icon is ignored because the spinner takes the right position.

```blade
<x-bladewind::button icon="arrow-path">Refresh page</x-bladewind::button>
<x-bladewind::button icon="arrow-path" icon_right="true">Refresh page</x-bladewind::button>
```

## Form Submission

By default the button renders as `<button type="button">`, which does not submit forms. Set `can_submit="true"` to render `<button type="submit">`.

```blade
<form action="" method="get">
    <x-bladewind::input placeholder="First name" name="first_name" required="true" />
    <x-bladewind::input name="email" placeholder="Email" type="email" />
    <x-bladewind::button can_submit="true" class="mx-auto block mt-2 w-full">click me to submit</x-bladewind::button>
</form>
```

## Coloured Button

Only primary buttons can take on different colours. Set `color` to override the default primary colour.

```blade
<x-bladewind::button color="red">Red button</x-bladewind::button>
<x-bladewind::button color="red" outline="true">Red outline</x-bladewind::button>
<x-bladewind::button.circle color="red" icon="bell-alert" />
<x-bladewind::button.circle color="red" icon="bell-alert" outline="true" />
```

The precompiled colours are `red`, `yellow`, `green`, `pink`, `purple`, `gray`, `black`, `orange`, `indigo`, `fuchsia`, `violet`, `cyan`, `blue`. The default `blue` colour is tied to `primary: colors.blue` in `tailwind.config.js`; define a different primary colour there and the default will pick it up.

## Button Events

The button component translates to a regular HTML `<button>` tag, so any HTML button event attribute (`onclick`, `onblur`, `onmouseover`, `onmouseout`, etc) can be appended and will fire.

```blade
<x-bladewind::button onclick="alert('you clicked me')">I have an onclick</x-bladewind::button>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| type | primary | `primary` \| `secondary` |
| size | regular | Matches input field sizes for consistency. `tiny` \| `small` \| `regular` \| `medium` \| `big` |
| name | *blank* | Added to the button's `class` attribute for convenience, accessible via JavaScript or CSS. |
| has_spinner | false | Whether the button includes a spinner. Must be a string, not boolean. `true` \| `false` |
| show_spinner | false | Only applies if `has_spinner="true"`. Sets the spinner's default visibility. Must be a string, not boolean. `true` \| `false` |
| color | primary | Colour of the button. Defaults to the primary colour defined in `tailwind.config.js` (blue by default). `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `black` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| uppercasing | true | Whether button text is all uppercase. `true` \| `false` |
| can_submit | false | Renders `<button type="submit">` instead of `<button type="button">`. `true` \| `false` |
| disabled | false | Whether the button is disabled. `true` \| `false` |
| show_focus_ring | true | Whether a ring is shown around the button on focus. `true` \| `false` |
| icon | *blank* | Any Heroicons icon name. |
| icon_right | false | Whether the icon is positioned right of the button text. Only applies if `icon` is set. `true` \| `false` |
| tag | button | HTML tag used to create the button. `button` \| `a` |
| radius | full | How rounded the button looks. `none` \| `small` \| `medium` \| `full` |
| outline | false | Whether the button is outline-only, losing its background colour. `true` \| `false` |
| border_width | 2 | Only used if `outline=true`. `2` \| `4` \| `8` |
| ring_width | *blank* | Width of the focus ring. `1` \| `2` \| `4` \| `8` |
| button_text_css | *blank* | Overrides the button text colour. Any precompiled or project-defined TailwindCSS style. |

## Full Example

```blade
<x-bladewind::button
    type="secondary"
    size="big"
    name="btn-subscribe"
    has_spinner="true"
    show_spinner="false"
    disabled="false"
    class="mt-0"
    tag="a"
    outline="true"
    border_width="2"
    show_focus_ring="false"
    radius="medium"
    icon="lock-closed"
    icon_right="false"
    button_text_css="font-bold text-black"
    can_submit="false">
    ...
</x-bladewind::button>
```
