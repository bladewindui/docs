---
title: Empty State Component
component: x-bladewind::empty-state
url: /component/empty-state
---

# Empty State

Display this when there is nothing to display, instead of a blank page. The component is kept minimal since every application has its own specific empty state requirements.

## Basic Usage

```blade
<x-bladewind::empty-state
    message="Awesome! You have no documents to approve."
    button_label="Go to Dashboard"
    onclick="alert('you clicked me')">
</x-bladewind::empty-state>
```

This uses the default bundled empty state image, available at `public/vendor/bladewind/images/empty-state.svg`.

## Custom Images

Set the `image` attribute to use your own image. BladewindUI looks for the file relative to the `public` directory.

```blade
<x-bladewind::empty-state
    message="You have not saved any gists to your GitHub account"
    image="/assets/images/no-code.svg"
    button_label="Create Gist"
    onclick="alert('you clicked me')"></x-bladewind::empty-state>
```

## Headings

Set `heading` to let the user know immediately what's happening, without reading the full message.

```blade
<x-bladewind::empty-state
    message="You have not saved any gists to your GitHub account"
    image="/assets/images/no-code.svg"
    button_label="Create Gist"
    heading="Create Gists Now"
    onclick="alert('you clicked me')">
</x-bladewind::empty-state>
```

## Custom Content

Ignore the attributes entirely and put your own content inside the component. Set `show_image="false"` to suppress the default image.

```blade
<x-bladewind::empty-state show_image="false">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto text-red-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571..." />
    </svg>
    <div class="pb-3">You have no biometric data available</div>
    <x-bladewind::button color="red" size="small">
        Add biometric info
    </x-bladewind::button>
</x-bladewind::empty-state>
```

## No Call to Action

Leave out `button_label` (or set it to an empty string) for an empty state with no action, such as a "Recent Activities" section.

```blade
<x-bladewind::card title="Recent Activities" css="w-3/4 mx-auto">
    <x-bladewind::empty-state
        image="/assets/images/no-activity.svg"
        message="Your recent activities list will take shape as<br/> soon as your organization has some activity">
    </x-bladewind::empty-state>
</x-bladewind::card>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| image | /vendor/bladewind/images/empty-state.svg | Image to display. |
| show_image | true | Whether the image should be displayed. Set `false` to control the entire content yourself. `true` \| `false` |
| image_size | medium | Size of the image. `small` \| `medium` \| `large` \| `xl` \| `omg` |
| for_select | false | Whether this empty state is used by a select component. When `true`, it's hidden and only shown by the select component referencing its `name`. `true` \| `false` |
| button_label | *blank* | Text on the call to action button. |
| onclick | *blank* | Action to run when the button is clicked, e.g. `onclick="location.href='/dashboard'"` or a JS helper call. |
| heading | *blank* | Empty state heading. |
| message | *blank* | Empty state message. |
| class | bw-empty-state | Any additional CSS classes. |
| image_css | *blank* | Any additional CSS classes applied to the image. |

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
