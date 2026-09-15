---
title: Process Indicator Component
component: x-bladewind::processing, x-bladewind::process-complete
url: /component/process-indicator
---

# Process Indicator

Shows that a process is in progress, and its outcome, either passed or failed. Works within a page but looks best inside a [Modal](/component/modal). There are three parts: `processing`, and two `process-complete` states (`passed` and `failed`).

## Basic Usage

```blade
<x-bladewind::processing name="processing" message="Deleting pending payment" hide="false" />

<x-bladewind::process-complete name="delete-yes" process_completed_as="passed" button_label="Done"
    button_action="alert('i passed')" message="Pending payment was deleted successfully" hide="false" />

<x-bladewind::process-complete name="delete-no" process_completed_as="failed" button_label="Done"
    button_action="alert('i failed')" message="Pending payment could not be deleted" hide="false" />
```

## Full Flow Example

A typical flow combines all three parts inside a modal, driven by JavaScript. This example simulates deleting a pending payment.

```blade
<x-bladewind::button
    onclick="deletePayment('pass')"
    size="small">Delete Payment and Pass</x-bladewind::button>

<x-bladewind::button onclick="deletePayment('fail')" size="small">Delete Payment and Fail</x-bladewind::button>

<x-bladewind::modal name="delete-paymentz" show_action_buttons="false">

    <!-- shows that the process is in progress -->
    <x-bladewind::processing
        name="processing-delete"
        message="Deleting pending payment"
        hide="false" />

    <!-- shown when the process completes with a pass -->
    <x-bladewind::process-complete
        name="delete-payment-yes"
        process_completed_as="passed"
        button_label="Done"
        button_action="alert('i passed... closing modal now'); hideModal('delete-paymentz')"
        message="Pending payment was deleted successfully" />

    <!-- shown when the process completes with a failure -->
    <x-bladewind::process-complete
        name="delete-payment-no"
        process_completed_as="failed"
        button_label="Done"
        button_action="alert('i failed... closing modal now'); hideModal('delete-paymentz')"
        message="Pending payment could not be deleted" />

</x-bladewind::modal>
```

```js
deletePayment = (mode) => {
    // it is preferred to hide all three elements
    // and show only the element that needs to be shown
    hideHideables();

    // show the modal and the processing delete element
    // showModal() and unhide() are helper functions
    // available in BladewindUI
    showModal('delete-paymentz');
    unhide('.processing-delete');

    // this example only shows a specific outcome after 3 seconds
    // based on which button was clicked. In your apps you will
    // typically display an outcome based on an API return value.
    setTimeout(function() {
        hideHideables();

        // determine which process outcome to show
        (mode == 'pass') ?
            unhide('.delete-payment-yes') :
            unhide('.delete-payment-no');
    }, 3000);
}

hideHideables = () => {
    // hide() is a helper function available in BladewindUI
    hide('.processing-delete');
    hide('.delete-payment-yes');
    hide('.delete-payment-no');
}
```

The buttons call `deletePayment(mode)`, which hides all three elements, opens the modal, shows the processing indicator, then after a delay hides everything again and reveals the matching pass/fail outcome.

## Attributes

### Processing Component

| Attribute | Default | Description |
|---|---|---|
| name | processing | Unique name for the processing component. Prevents erratic behaviour when multiple process indicators exist on the same page. |
| hide | true | Whether the processing component is hidden by default. `true` \| `false` |
| message | blank | Message displayed below the spinning icon. |

### Process Complete Component

| Attribute | Default | Description |
|---|---|---|
| name | process-complete | Unique name for the process complete component. Prevents erratic behaviour when multiple exist on the same page. |
| process_completed_as | passed | Determines which icon to display. `passed` shows a green thumbs up; `failed` shows a red thumbs down. `passed` \| `failed` |
| message | blank | Message displayed below the thumbs up/down icon. |
| button_label | blank | Label for the call-to-action button shown when the process completes. |
| button_action | blank | JavaScript function called when the call-to-action button is clicked. |
| hide | true | Whether the process complete component is hidden by default. `true` \| `false` |

## Full Example

```blade
<x-bladewind::processing
    name="processing-delete"
    message="Deleting pending payment"
    hide="false" />

<!-- shown when process completes with a pass -->
<x-bladewind::process-complete
    name="delete-payment-yes"
    process_completed_as="passed"
    hide="false"
    button_label="Done"
    button_action="hideModal('delete-paymentz')"
    message="Pending payment was deleted successfully" />

<!-- shown when process completes with a failure -->
<x-bladewind::process-complete
    name="delete-payment-no"
    process_completed_as="failed"
    hide="false"
    button_label="Done"
    button_action="hideModal('delete-paymentz')"
    message="Pending payment could not be deleted" />
```
