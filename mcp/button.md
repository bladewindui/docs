---
title: Button Component
component: x-bladewind::button
url: /component/button
---

# Button

The button component renders as an HTML `<button>` tag by default. Primary and secondary colours are derived from what you define as `primary` and `secondary` in your `tailwind.config.js`. Buttons come in four types: primary, secondary, circular, and outline. All types support multiple sizes, colours, icons, and spinners.

## Basic Usage

```blade
<x-bladewind::button>Subscribe Now</x-bladewind::button>

{{-- preserve casing --}}
<x-bladewind::button uppercasing="false">Subscribe Now</x-bladewind::button>

{{-- render as an <a> tag --}}
<x-bladewind::button tag="a" href="/pricing">Subscribe Now</x-bladewind::button>
```

## Button Types

### Primary

```blade
<x-bladewind::button>Primary Button</x-bladewind::button>
<x-bladewind::button outline="true">Primary Outline</x-bladewind::button>
```

### Secondary

```blade
<x-bladewind::button type="secondary">Secondary Button</x-bladewind::button>
<x-bladewind::button type="secondary" outline="true">Secondary Outline</x-bladewind::button>
```

### Circular

Circular buttons accept icons only.

```blade
<x-bladewind::button.circle icon="bell-alert" />
<x-bladewind::button.circle outline="true" icon="bell-alert" />

{{-- secondary circular (use color instead of type) --}}
<x-bladewind::button.circle color="secondary" outline icon="bell-alert" />
```

### Outline

Set `outline="true"` on any button to strip the background and keep only the border.

```blade
<x-bladewind::button outline="true" color="cyan" radius="full">Cyan Outline</x-bladewind::button>
<x-bladewind::button type="secondary" outline="true" radius="full">Secondary Outline</x-bladewind::button>

{{-- custom border width (default is 2) --}}
<x-bladewind::button outline="true" border_width="4">Border 4</x-bladewind::button>
<x-bladewind::button outline="true" border_width="8">Border 8</x-bladewind::button>
```

## Sizes

Available sizes: `tiny`, `small`, `regular` (default), `medium`, `big`. Sizes apply to both regular and circular buttons.

```blade
<x-bladewind::button size="tiny">Tiny</x-bladewind::button>
<x-bladewind::button size="small">Small</x-bladewind::button>
<x-bladewind::button>Regular (default)</x-bladewind::button>
<x-bladewind::button size="medium">Medium</x-bladewind::button>
<x-bladewind::button size="big">Big</x-bladewind::button>
```

## Radii

```blade
<x-bladewind::button radius="none">None</x-bladewind::button>
<x-bladewind::button radius="small">Small</x-bladewind::button>
<x-bladewind::button radius="medium">Medium</x-bladewind::button>
<x-bladewind::button radius="full">Full</x-bladewind::button>
```

## Disabled

```blade
<x-bladewind::button disabled="true">Disabled</x-bladewind::button>
<x-bladewind::button disabled="true" type="secondary">Disabled Secondary</x-bladewind::button>
<x-bladewind::button disabled="true" outline>Disabled Outline</x-bladewind::button>
```

## Focus Rings

```blade
{{-- hide focus ring --}}
<x-bladewind::button show_focus_ring="false">No Focus Ring</x-bladewind::button>

{{-- custom ring width --}}
<x-bladewind::button ring_width="1">Ring 1</x-bladewind::button>
<x-bladewind::button ring_width="4">Ring 4</x-bladewind::button>
```

## Spinners

Set `has_spinner="true"` to include a spinner (hidden by default). Use `show_spinner="true"` to make it visible on load. To trigger the spinner on click, set a `name` and call `showButtonSpinner()` in `onclick`.

```blade
{{-- spinner visible by default --}}
<x-bladewind::button has_spinner="true" show_spinner="true">Saving...</x-bladewind::button>

{{-- spinner triggered on click --}}
<x-bladewind::button
    has_spinner="true"
    name="save-user"
    onclick="showButtonSpinner('.save-user')">
    Save User
</x-bladewind::button>
```

## Icons

Set `icon` to any [Heroicons](https://heroicons.com) name. Icons default to the left; use `icon_right="true"` to move them right. Note: `icon_right` is ignored when `has_spinner="true"`.

```blade
<x-bladewind::button icon="arrow-path">Refresh Page</x-bladewind::button>
<x-bladewind::button icon="arrow-path" icon_right="true">Refresh Page</x-bladewind::button>

<x-bladewind::button type="secondary" icon="arrow-small-right" icon_right="true">
    Next Chapter
</x-bladewind::button>
```

## Form Submission

By default the button renders as `<button type="button">` and will not submit forms. Set `can_submit="true"` to render as `<button type="submit">`.

```blade
<x-bladewind::button can_submit="true">Submit Form</x-bladewind::button>
```

## Custom Colours

Only primary buttons support custom colours. Useful when you need a colour that differs from your project's primary (e.g. red delete buttons).

```blade
<x-bladewind::button color="red">Red Button</x-bladewind::button>
<x-bladewind::button color="red" outline>Red Outline</x-bladewind::button>
```

Available colours: `primary` `blue` `red` `yellow` `green` `purple` `pink` `orange` `black` `cyan` `violet` `indigo` `fuchsia` `gray`

## Button Events

Any HTML button event attribute can be passed directly to the component.

```blade
<x-bladewind::button onclick="alert('you clicked me')">Click Me</x-bladewind::button>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| type | primary | `primary` \| `secondary` |
| size | regular | `tiny` \| `small` \| `regular` \| `medium` \| `big` |
| name | _(blank)_ | Added to the button's `class` for JS/CSS targeting |
| color | primary | Button colour. See available colours above |
| outline | false | Show as outline only (no background). `true` \| `false` |
| border_width | 2 | Outline border width. `2` \| `4` \| `8` |
| radius | full | `none` \| `small` \| `medium` \| `full` |
| disabled | false | Disable the button. `true` \| `false` |
| tag | button | HTML tag to use. `button` \| `a` |
| can_submit | false | Render as `type="submit"`. `true` \| `false` |
| has_spinner | false | Include a spinner. `true` \| `false` |
| show_spinner | false | Show spinner on load. Only when `has_spinner="true"`. `true` \| `false` |
| icon | _(blank)_ | Any Heroicons icon name |
| icon_right | false | Position icon to the right. Ignored when `has_spinner="true"`. `true` \| `false` |
| show_focus_ring | true | Show focus ring. `true` \| `false` |
| ring_width | _(blank)_ | Focus ring width: `1` \| `2` \| `4` \| `8` |
| uppercasing | true | Uppercase button text. `true` \| `false` |
| button_text_css | _(blank)_ | TailwindCSS classes to override button text colour |

## Full Example

```blade
<x-bladewind::button
    type="secondary"
    size="big"
    name="btn-subscribe"
    has_spinner="true"
    show_spinner="false"
    disabled="false"
    tag="a"
    outline="true"
    border_width="2"
    show_focus_ring="false"
    radius="medium"
    icon="lock-closed"
    icon_right="false"
    button_text_css="font-bold text-black"
    can_submit="false">
    Subscribe
</x-bladewind::button>
```
