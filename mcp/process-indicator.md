---
title: Process Indicator Component
component: x-bladewind::processing
url: /component/process-indicator
---

# Process Indicator

Show that a process is in progress and display the outcome when it completes. Best used inside a [Modal](/component/modal). There are two sub-components:

- `x-bladewind::processing` — shown while a process is running
- `x-bladewind::process-complete` — shown when the process finishes (pass or fail)

## Basic Usage

```blade
{{-- show process running --}}
<x-bladewind::processing
    name="processing-delete"
    message="Deleting pending payment"
    hide="false" />

{{-- show when process passes --}}
<x-bladewind::process-complete
    name="delete-payment-yes"
    process_completed_as="passed"
    button_label="Done"
    button_action="hideModal('delete-paymentz')"
    message="Pending payment was deleted successfully" />

{{-- show when process fails --}}
<x-bladewind::process-complete
    name="delete-payment-no"
    process_completed_as="failed"
    button_label="Done"
    button_action="hideModal('delete-paymentz')"
    message="Pending payment could not be deleted" />
```

## Full Flow Example

A typical pattern wraps all three parts inside a modal, then uses JavaScript to show the right element based on the API result.

```blade
<x-bladewind::modal name="delete-paymentz" show_action_buttons="false">
    <x-bladewind::processing
        name="processing-delete"
        message="Deleting pending payment"
        hide="false" />

    <x-bladewind::process-complete
        name="delete-payment-yes"
        process_completed_as="passed"
        button_label="Done"
        button_action="alert('passed'); hideModal('delete-paymentz')"
        message="Pending payment was deleted successfully" />

    <x-bladewind::process-complete
        name="delete-payment-no"
        process_completed_as="failed"
        button_label="Done"
        button_action="alert('failed'); hideModal('delete-paymentz')"
        message="Pending payment could not be deleted" />
</x-bladewind::modal>
```

```js
deletePayment = (mode) => {
    hideHideables();
    showModal('delete-paymentz');
    unhide('.processing-delete');

    setTimeout(function() {
        hideHideables();
        (mode == 'pass')
            ? unhide('.delete-payment-yes')
            : unhide('.delete-payment-no');
    }, 3000);
}

hideHideables = () => {
    hide('.processing-delete');
    hide('.delete-payment-yes');
    hide('.delete-payment-no');
}
```

`hide()`, `unhide()`, and `showModal()` are BladewindUI JavaScript helpers.

## Attributes

### `x-bladewind::processing`

| Attribute | Default | Description |
|---|---|---|
| name | processing | Unique name for this component |
| message | _(blank)_ | Message displayed below the spinner |
| hide | true | Hidden by default. `true` \| `false` |

### `x-bladewind::process-complete`

| Attribute | Default | Description |
|---|---|---|
| name | process-complete | Unique name for this component |
| process_completed_as | passed | Determines the icon shown. `passed` shows green thumbs-up; `failed` shows red thumbs-down. `passed` \| `failed` |
| message | _(blank)_ | Message displayed below the icon |
| button_label | _(blank)_ | Label for the call-to-action button |
| button_action | _(blank)_ | JavaScript to call when the button is clicked |
| hide | true | Hidden by default. `true` \| `false` |
