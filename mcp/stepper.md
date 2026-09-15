---
title: Stepper Component
component: x-bladewind::stepper
url: /component/stepper
---

# Stepper

Stepper guides people through a named sequence of related tasks. Each step can reveal its own content panel, which makes the component suitable for account setup, checkout, onboarding, reviews, and other multi-stage forms. The root `current` value is the canonical initial selection.

## Basic Usage

```blade
<x-bladewind::stepper name="account-setup" current="profile" aria-label="Account setup progress">
    <x-bladewind::stepper.item name="account" label="Account" state="complete" />
    <x-bladewind::stepper.item name="profile" label="Profile" description="Personal details" />
    <x-bladewind::stepper.item name="security" label="Security" />
    <x-bladewind::stepper.content name="account" has-border="false">
        <x-bladewind::card has-shadow="false">Account details</x-bladewind::card>
    </x-bladewind::stepper.content>
    <x-bladewind::stepper.content name="profile" has-border="false">
        <x-bladewind::card has-shadow="false">Profile form</x-bladewind::card>
    </x-bladewind::stepper.content>
    <x-bladewind::stepper.content name="security" has-border="false">
        <x-bladewind::card has-shadow="false">Security options</x-bladewind::card>
    </x-bladewind::stepper.content>
</x-bladewind::stepper>
```

## Visual Styles

Use `style` to change how the sequence is presented without changing its content, state, events, or keyboard behavior. Circles is the default and works with both orientations.

| Style | Horizontal | Vertical | Behavior |
|---|---|---|---|
| `circles` | Yes | Yes | Default numbered or icon indicators with connecting lines. |
| `chevrons` | Yes | No | Horizontal-only segmented path. Vertical requests fall back to circles. |
| `bars` | Yes | Yes | Top bars horizontally and side bars vertically. |
| `line` | Yes | Yes | Compact dots on a horizontal or vertical line. |

```blade
<x-bladewind::stepper name="chevron-application" current="application" style="chevrons" linear="false">
    <x-bladewind::stepper.item name="job" label="Job details" state="complete" />
    <x-bladewind::stepper.item name="application" label="Application form" />
    <x-bladewind::stepper.item name="preview" label="Preview" />
</x-bladewind::stepper>

<x-bladewind::stepper name="bar-application" current="form" style="bars" linear="false">...</x-bladewind::stepper>
<x-bladewind::stepper name="line-contract" current="payment" style="line" linear="false">...</x-bladewind::stepper>
```

Chevrons create a connected, bordered path that suits short application and onboarding flows. Bars provide strong stage emphasis with compact labels and work well above full-width forms. Line uses smaller markers for a quiet progress treatment, useful when the form content should carry most of the visual weight.

## Horizontal Stepper

Horizontal is the default orientation and works well when step names are short and the available width is generous. Labels sit below their indicators so connectors remain centred on the circles and never pass through text. When the sequence cannot fit, only the step list scrolls horizontally.

## Vertical Stepper

Use `orientation="vertical"` for narrow regions, longer descriptions, and forms with substantial content. The connector follows the centre of each indicator while the label and description remain in a separate text column.

```blade
<x-bladewind::stepper name="vertical-example" current="review" orientation="vertical" aria-label="Application progress">
    <x-bladewind::stepper.item name="details" label="Your details" description="Contact and identity information" state="complete" />
    <x-bladewind::stepper.item name="review" label="Review" description="Check the supplied information" />
    <x-bladewind::stepper.item name="submit" label="Submit" />
</x-bladewind::stepper>
```

## Step States

Available states are `complete`, `current`, `upcoming`, `error`, and `disabled`. Complete and error indicators include icons and screen-reader state text, so meaning does not depend on colour.

```blade
<x-bladewind::stepper name="states-example" current="current" linear="false">
    <x-bladewind::stepper.item name="complete" label="Complete" state="complete" />
    <x-bladewind::stepper.item name="current" label="Current" />
    <x-bladewind::stepper.item name="upcoming" label="Upcoming" />
    <x-bladewind::stepper.item name="error" label="Error" state="error" />
    <x-bladewind::stepper.item name="disabled" label="Disabled" disabled="true" />
</x-bladewind::stepper>
```

## Numbered and Icon Steps

Numbers are shown by default and are assigned in list order. Set an explicit `number`, or use `icon`, `icon-type`, and `icon-dir` on an item.

```blade
<x-bladewind::stepper name="numbered-example" current="second">
    <x-bladewind::stepper.item name="first" label="First" number="1" state="complete" />
    <x-bladewind::stepper.item name="second" label="Second" number="2" />
    <x-bladewind::stepper.item name="third" label="Third" number="3" />
</x-bladewind::stepper>

<x-bladewind::stepper name="icons-example" current="profile">
    <x-bladewind::stepper.item name="account" label="Account" icon="user" state="complete" />
    <x-bladewind::stepper.item name="profile" label="Profile" icon="identification" icon-type="solid" />
    <x-bladewind::stepper.item name="security" label="Security" icon="shield-check" />
</x-bladewind::stepper>
```

## Labels and Descriptions

Every step requires a short label. Descriptions are optional. Long text wraps without expanding the page.

## Linear Wizard

Linear mode is enabled by default and is appropriate when each stage depends on the one before it. Users can return to completed steps, but direct activation cannot skip ahead to an inaccessible step. Run application validation first, then call `nextStepperStep()` when the current panel is valid.

```blade
<x-bladewind::stepper name="linear-wizard" current="profile">
    <x-bladewind::stepper.item name="account" label="Account" state="complete" />
    <x-bladewind::stepper.item name="profile" label="Profile" />
    <x-bladewind::stepper.item name="security" label="Security" />
</x-bladewind::stepper>
<x-bladewind::button type="secondary" onclick="previousStepperStep('linear-wizard')">Previous</x-bladewind::button>
<x-bladewind::button onclick="nextStepperStep('linear-wizard')">Continue</x-bladewind::button>
```

## Non-linear and Clickable Workflow

Set `linear="false"` when the stages are independent and users may complete them in any order. Enabled indicators can then open their associated panels directly. Set root or item `clickable="false"` when a stage should be displayed but must be opened by application logic.

```blade
<x-bladewind::stepper name="free-wizard" current="plan" linear="false">
    <x-bladewind::stepper.item name="plan" label="Plan" />
    <x-bladewind::stepper.item name="billing" label="Billing" />
    <x-bladewind::stepper.item name="members" label="Members" clickable="false" />
</x-bladewind::stepper>
```

## Indicator-only Usage

Content panels are recommended for complete wizard interfaces. You may omit them when Stepper only communicates the status of a process that is rendered elsewhere; the indicators, states, events, and keyboard behavior continue to work.

```blade
<x-bladewind::stepper name="delivery" current="dispatch">
    <x-bladewind::stepper.item name="paid" label="Paid" state="complete" />
    <x-bladewind::stepper.item name="dispatch" label="Dispatch" />
    <x-bladewind::stepper.item name="delivered" label="Delivered" />
</x-bladewind::stepper>
```

## Content Panels

A `stepper.content` name connects a panel to the item with the same name. Place one panel beside every item when building a wizard. Only the current panel is visible and keyboard reachable; the others are hidden and inert until selected.

Stepper content is a semantic panel, not a Card dependency, which keeps the standalone Stepper package small. Its panel has a border by default. Set `has-border="false"` when Card or another composed component provides the visible border. Compose Bladewind Card, Input, Textarea, Select, Alert, and other components inside the panel as needed.

```blade
<x-bladewind::stepper.content name="profile" has-border="false">
    <x-bladewind::card has-shadow="false">
        <x-bladewind::input label="Display name" />
        <x-bladewind::textarea label="Biography" />
    </x-bladewind::card>
</x-bladewind::stepper.content>
```

## Previous, Next, Direct Navigation, and Reset

Use the public helpers from buttons, form handlers, or other application code. All helpers return `true` on success and `false` when the stepper, step, or requested movement is unavailable. A successful move updates the indicator, panel, ARIA relationships, state, and focus together.

```js
previousStepperStep('account-setup');
nextStepperStep('account-setup');
showStepperStep('account-setup', 'security');
resetStepper('account-setup');
```

## Validation Event

Listen for the cancelable `bladewind:stepper:before-change` event and call `preventDefault()` when the current panel is invalid. The Stepper owns navigation state but does not impose form rules, so validation remains application-owned.

```js
document.querySelector('[data-name="account-setup"]')
    .addEventListener('bladewind:stepper:before-change', (event) => {
        if (!profileFormIsValid()) event.preventDefault();
    });
```

## Multiple Steppers

Each helper resolves one named root. State, panels, focus, and events do not leak between instances. Use a unique root name for every Stepper, even when the step names inside them are identical.

## Responsive Behavior, Dark Mode, and RTL

Horizontal lists scroll inside the component on narrow screens, while content panels remain within the page width. Vertical layouts stay fluid. Colours follow the active theme. In RTL, horizontal ordering and Left and Right Arrow behavior follow visual direction. Reduced-motion preferences remove transition timing without disabling navigation.

## Accessibility and Keyboard Guidance

- Provide a specific `aria-label` for each stepper landmark.
- The current item uses `aria-current="step"`. Disabled items use native and ARIA disabled semantics.
- Left and Right Arrow move focus in horizontal layouts. Up and Down Arrow move focus in vertical layouts.
- Home and End move to the first and last enabled indicators. Disabled steps are skipped.
- Enter and Space activate a focused clickable indicator.
- Initial rendering does not steal focus. Explicit navigation moves focus to the new indicator.

## JavaScript API

| Function or event | Description |
|---|---|
| `showStepperStep(stepperName, stepName)` | Select an accessible step and synchronize its panel. |
| `nextStepperStep(stepperName)` | Move to the next enabled step. On the final step, emit completion. |
| `previousStepperStep(stepperName)` | Move to the previous enabled step. |
| `resetStepper(stepperName)` | Restore initial states and the canonical initial current step. |
| `bladewind:stepper:before-change` | Cancelable bubbling event before navigation. |
| `bladewind:stepper:changed` | Bubbling event after a successful change. |
| `bladewind:stepper:complete` | Bubbling event when Next is called on the final enabled step. |

Navigation event details contain `stepperName`, `previousStep`, `nextStep`, and `direction`.

## Using Stepper Inside Livewire

The current step lives in the stepper's own DOM rather than in Livewire's component state. If a Livewire component re-renders this markup for a reason that has nothing to do with the stepper, the current step resets back to its initial value. If the stepper lives inside a component that can re-render for other reasons, wrap it in `wire:ignore`. The bindings that drive the stepper are delegated and safe to re-run, so a re-render will not leave behind duplicate listeners.

## Attributes

### Stepper Attributes

| Attribute | Default | Description |
|---|---|---|
| name | generated | Unique public name used by helpers and events. |
| current | first enabled step | Canonical initial current step name. |
| orientation | horizontal | `horizontal` or `vertical`. |
| style | circles | `circles`, `chevrons`, `bars`, or `line`. |
| linear | true | Block direct forward navigation when true. |
| clickable | true | Allow enabled indicators to activate steps. |
| show-numbers | true | Show ordered step numbers when an item has no icon. |
| completed-icon | check | Icon used for complete steps. |
| error-icon | exclamation-triangle | Icon used for error steps. |
| aria-label | Progress | Accessible name for the navigation landmark. |
| class | _(blank)_ | Classes merged onto the root nav. |

### Stepper Item Attributes

| Attribute | Default | Description |
|---|---|---|
| name | required | Step name shared with an optional content panel. |
| label | required | Visible step label. |
| description | _(blank)_ | Optional supporting text. |
| state | upcoming | `complete`, `current`, `upcoming`, `error`, or `disabled`. |
| disabled | false | Disable activation and keyboard focus. |
| clickable | root value | Override clickability for this item. |
| number | list position | Explicit indicator number. |
| icon | _(blank)_ | Icon component name. |
| icon-type | outline | `outline` or `solid`. |
| icon-dir | _(blank)_ | Custom public icon directory. |
| class | _(blank)_ | Classes merged onto the indicator button. |

### Stepper Content Attributes

| Attribute | Default | Description |
|---|---|---|
| name | required | Matches the associated item name. |
| has-border | true | Shows the panel border. Set to false when a nested Card supplies the visible border. |
| class | _(blank)_ | Classes merged onto the panel section. |
| Any HTML attribute | | Forwarded through the Blade attribute bag. |

## Slots

| Component and slot | Description |
|---|---|
| stepper default | Stepper items and optional content panels. |
| stepper.item default | Custom indicator content that replaces the number or icon. |
| stepper.content default | Wizard panel content. |

## Full Example

```blade
<x-bladewind::stepper
    name="account-setup"
    current="profile"
    orientation="horizontal"
    style="circles"
    linear="true"
    clickable="true"
    show-numbers="true"
    completed-icon="check"
    error-icon="exclamation-triangle"
    aria-label="Account setup progress"
    class="account-stepper">
    <x-bladewind::stepper.item
        name="profile"
        label="Profile"
        description="Personal details"
        state="current"
        disabled="false"
        clickable="true"
        number="2"
        icon="user"
        icon-type="solid"
        icon-dir=""
        class="profile-step" />
    <x-bladewind::stepper.content name="profile" has-border="false" class="profile-panel">
        <x-bladewind::card has-shadow="false">
            <x-bladewind::input label="Display name" />
        </x-bladewind::card>
    </x-bladewind::stepper.content>
</x-bladewind::stepper>
```
