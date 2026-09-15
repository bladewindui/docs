---
title: Drawer Component
component: x-bladewind::drawer
url: /component/drawer
---

# Drawer

Display supporting content in a panel that enters from any edge of the viewport. Drawers work well for filters, forms, record details, and short workflows that should not replace the current page.

## Basic Usage

```blade
<x-bladewind::button onclick="showDrawer('customer-details')">Open drawer</x-bladewind::button>
<x-bladewind::drawer name="customer-details" position="right" size="medium" show-close-button="false">
    <div class="relative rounded-2xl bg-white p-6 text-center shadow dark:bg-dark-800">
        <button type="button" onclick="hideDrawer('customer-details')" class="absolute right-4 top-4 text-gray-400">
            <x-bladewind::icon name="x-mark" />
        </button>

        <div class="relative mx-auto w-fit">
            <x-bladewind::avatar image="/path/to/image" size="big" />
            <span class="absolute bottom-0 right-0 rounded-full bg-green-500 text-white ring-2 ring-white">
                <x-bladewind::icon name="check" />
            </span>
        </div>

        <p class="font-bold">Victoria Ferguson</p>
        <p class="text-gray-400">victoria@ferguson.eu</p>

        <!-- role / team, then mail / chat / phone action buttons -->
    </div>

    <!-- address details list -->
</x-bladewind::drawer>
```

## Positions

Use `left`, `right`, `top`, or `bottom`. These are physical viewport edges, so left and right remain predictable in RTL pages.

```blade
<x-bladewind::drawer name="filters" position="left" title="Filters">...</x-bladewind::drawer>
<x-bladewind::drawer name="details" position="right" title="Details">...</x-bladewind::drawer>
<x-bladewind::drawer name="notice" position="top" title="Notice">...</x-bladewind::drawer>
<x-bladewind::drawer name="actions" position="bottom" title="Actions">...</x-bladewind::drawer>
```

## Sizes

Sizes are adapted to the drawer direction: left and right drawers change width, top and bottom drawers change height. Available values are `tiny`, `small`, `medium`, `big`, `large`, `xl`, and `omg`.

```blade
<x-bladewind::drawer name="profile" size="large" title="Profile">...</x-bladewind::drawer>
```

## Modal and Non-modal Behaviour

A drawer is modal by default: it has a backdrop, traps focus, and prevents background scrolling. Set `modal="false"` for supporting content that should leave the page interactive.

```blade
<x-bladewind::drawer name="help" title="Help" modal="false">...</x-bladewind::drawer>
```

## Header and Footer Slots

Use the named header and footer slots to customize those regions while keeping the drawer layout and scrolling behavior.

```blade
<x-bladewind::drawer name="edit-customer">
    <x-slot:header>Custom header</x-slot:header>
    Form content
    <x-slot:footer>Custom footer</x-slot:footer>
</x-bladewind::drawer>
```

## Icons and Close Controls

Set `icon`, `icon-type`, and `icon-dir` using the Icon component contract. Set `show-close-button="false"` when another clear close action is present.

```blade
<x-bladewind::drawer name="security" title="Security settings"
    icon="shield-check" icon-type="solid" show-close-button="false">...</x-bladewind::drawer>
```

## Backdrop and Escape Options

Backdrop clicks and the Escape key close a modal drawer by default. Disable either behavior for a workflow that requires an explicit decision, and always provide a visible close action.

```blade
<x-bladewind::drawer name="approval" title="Approve request"
    backdrop-can-close="false" escape-can-close="false">
    ...
    <x-slot:footer>
        <x-bladewind::button onclick="hideDrawer('approval')">Cancel</x-bladewind::button>
    </x-slot:footer>
</x-bladewind::drawer>
```

## Programmatic Show, Hide, and Toggle

The three public helpers accept the drawer name and return `false` when no matching state change can be made.

```js
showDrawer('customer-details');
hideDrawer('customer-details');
toggleDrawer('customer-details');
```

The drawer also emits `bladewind:drawer-opened` and `bladewind:drawer-closed` events. Each event bubbles and includes the drawer name in `event.detail.name`.

## Long and Scrollable Content

The body region scrolls independently while the header and footer remain visible.

## Responsive, Dark Mode, and RTL

On narrow screens, side drawers never exceed the viewport width. The component uses the active dark theme automatically and respects reduced motion preferences. Left and right refer to physical edges in both LTR and RTL documents.

## Accessibility and Focus Management

Modal drawers render with dialog semantics and `aria-modal="true"`. The title labels the drawer and the description is connected with `aria-describedby`. If there is no title, provide `aria-label` or `aria-labelledby`.

Opening moves focus to the first focusable control, or to the panel when there are no controls. Modal focus stays inside the active drawer. Closing restores focus to the control that opened it. When drawers are stacked, Escape affects only the top drawer.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | generated | Unique drawer name used by the JavaScript helpers. |
| title | _(blank)_ | Visible title and accessible name. |
| description | _(blank)_ | Supporting text connected to the drawer description. |
| position | right | Physical edge: `left`, `right`, `top`, or `bottom`. |
| size | medium | `tiny` \| `small` \| `medium` \| `big` \| `large` \| `xl` \| `omg` |
| modal | true | Enable backdrop, focus trap, and scroll locking. |
| open | false | Render the drawer open initially. |
| show-close-button | true | Show the header close control. |
| close-label | Close drawer | Accessible label for the close control. |
| backdrop-can-close | true | Allow backdrop clicks to close a modal drawer. |
| escape-can-close | true | Allow Escape to close the active drawer. |
| icon | _(blank)_ | Header icon name. |
| icon-type | outline | Icon type passed to the Icon component. |
| icon-dir | _(blank)_ | Custom icon directory passed to the Icon component. |

## Slots

| Slot | Description |
|---|---|
| default | Drawer body content. |
| body | Named alternative to the default body slot. |
| header | Custom header content. The configured close button remains available. |
| footer | Footer actions or supporting content. |

## JavaScript API

| Function or event | Description |
|---|---|
| `showDrawer(name)` | Open a drawer, record the trigger, move focus, and lock scroll when modal. |
| `hideDrawer(name)` | Close a drawer and restore focus. |
| `toggleDrawer(name)` | Open or close a drawer based on its current state. |
| `bladewind:drawer-opened` | Bubbling event emitted after opening. |
| `bladewind:drawer-closed` | Bubbling event emitted after closing. |

## Using Drawer Inside Livewire

Whether the drawer is open or closed lives in the drawer's own DOM rather than in Livewire's component state. If a Livewire component re-renders this markup for a reason that has nothing to do with the drawer, it silently closes. This matters most for a drawer that can stay open for a while, such as a filter panel or a form, inside a component that can also re-render for other reasons. In that situation, wrap the drawer in `wire:ignore` so Livewire leaves it alone.

## Full Example

```blade
<x-bladewind::drawer
    name="customer-profile"
    title="Customer profile"
    description="Review the customer record before saving changes."
    position="right"
    size="large"
    modal="true"
    open="false"
    show-close-button="true"
    close-label="Close customer profile"
    backdrop-can-close="false"
    escape-can-close="false"
    icon="user-circle"
    icon-type="solid"
    icon-dir=""
    class="customer-profile-drawer">
    Customer profile content
</x-bladewind::drawer>
```
