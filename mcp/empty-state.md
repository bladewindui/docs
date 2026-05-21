---
title: Empty State Component
component: x-bladewind::empty-state
url: /component/empty-state
---

# Empty State

Display this when there is nothing to display. This prevents your users from seeing boring blank pages. The empty state component is intentionally minimal, bearing in mind that different applications have different empty state requirements.

A default SVG image is bundled with BladewindUI at `public/vendor/bladewind/images/empty-state.svg` and used when no `image` attribute is specified.

## Basic Usage

```blade
<x-bladewind::empty-state
    message="Awesome! You have no documents to approve."
    button_label="Go to Dashboard"
    onclick="alert('you clicked me')">
</x-bladewind::empty-state>
```

## Custom Image

```blade
<x-bladewind::empty-state
    message="You have not saved any gists to your GitHub account"
    image="/assets/images/no-code.svg"
    button_label="Create Gist"
    onclick="alert('you clicked me')">
</x-bladewind::empty-state>
```

## With a Heading

```blade
<x-bladewind::empty-state
    message="You have not saved any gists to your GitHub account"
    heading="Create Gists Already"
    image="/assets/images/no-code.svg"
    button_label="Create Gist"
    onclick="alert('you clicked me')">
</x-bladewind::empty-state>
```

## Custom Content (No Image)

Set `show_image="false"` to take full control of the empty state content via the default slot.

```blade
<x-bladewind::empty-state show_image="false">
    <svg>...</svg>
    <p class="pt-2">You have no biometric data available</p>
    <x-bladewind::button color="red" size="small">
        Add biometric info
    </x-bladewind::button>
</x-bladewind::empty-state>
```

## Without a Call to Action

Omit `button_label` (or set it to an empty string) to display an empty state with no action button.

```blade
<x-bladewind::card title="Recent Activities" css="w-3/4 mx-auto">
    <x-bladewind::empty-state
        image="/assets/images/no-activity.svg"
        message="Your recent activities list will take shape as soon as your organization has some activity">
    </x-bladewind::empty-state>
</x-bladewind::card>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| image | /vendor/bladewind/images/empty-state.svg | Image to display |
| show_image | true | Show or hide the image. Set to `false` to control all content via slot. `true` \| `false` |
| image_size | medium | Size of the image. `small` \| `medium` \| `large` \| `xl` \| `omg` |
| for_select | false | Set to `true` when used inside a Select component. `true` \| `false` |
| heading | _(blank)_ | Optional heading displayed above the message |
| message | _(blank)_ | Main message text |
| button_label | _(blank)_ | Text for the call to action button. Omit to hide the button |
| onclick | _(blank)_ | JavaScript to execute when the button is clicked |
| image_css | _(blank)_ | Additional TailwindCSS classes for the image |
| class | bw-empty-state | Additional CSS classes for the wrapper |

## Full Example

```blade
<x-bladewind::empty-state
    message="Hey!! You cleaned up your inbox nicely"
    button_label="Compose a message"
    onclick="goToRoute('new-message')"
    image="/assets/images/empty-inbox.png"
    show_image="true"
    heading="Nothing to see here"
    size="xl"
    image_css="!h-32"
    class="shadow-sm">
</x-bladewind::empty-state>
```
