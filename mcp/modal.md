---
title: Modal Component
component: x-bladewind::modal
url: /component/modal
---

# Modal

Displays content overlayed on the primary page content. Modals are invoked with the JavaScript helper `showModal('name-of-modal')` and dismissed with `hideModal('name-of-modal')`.

## Basic Usage

```blade
<x-bladewind::button onclick="showModal('tnc-agreement')">Basic modal</x-bladewind::button>

<x-bladewind::modal name="tnc-agreement" show_close_icon="true">
    Please agree to the terms and conditions of the agreement before proceeding.
</x-bladewind::modal>

<x-bladewind::button onclick="showModal('tnc-agreement-titled')">Basic modal with a title</x-bladewind::button>

<x-bladewind::modal name="tnc-agreement-titled" show_close_icon="true" title="Agree or Disagree">
    Please agree to the terms and conditions of the agreement before proceeding.
</x-bladewind::modal>
```

Modals are targeted and invoked using the `name` attribute. Several modals can exist on the same page, but each must have a unique name.

Clicking the backdrop or the cancel button dismisses the modal by default. This can be prevented; see [Non-Dismissible Modal](#non-dismissible-modal).

## Different Types

Set `type` to append icons matching common use cases: `info`, `error`, `warning`, `success`. The default is blank (no type icon).

```blade
<x-bladewind::modal type="info" title="General Info" name="info">
    We really think you should buy some Bitcoin despite its ups and downs. What sayeth thou?
</x-bladewind::modal>

<x-bladewind::modal type="error" title="Delete Not Allowed" name="error">
    You do not have permissions to delete this user.
</x-bladewind::modal>

<x-bladewind::modal type="warning" title="First warning" name="warning">
    Hmmm...This is your first warning. Two more warnings and you are off this platform.
</x-bladewind::modal>

<x-bladewind::modal type="success" title="User Deleted" name="success">
    Yayy.. User deleted successfully
</x-bladewind::modal>
```

### Stretched Action Buttons

Set `stretch_action_buttons="true"` to make each action button span the full width of the modal, each on its own line.

```blade
<x-bladewind::modal title="Stretched Buttons" name="stretched" stretch_action_buttons="true">
    The action buttons in this modal have been stretched. This means each button gets its own line.
</x-bladewind::modal>
```

## Backdrop Blur Intensity

The backdrop blur can be customized with `blur_size`: `none`, `small`, `medium`, `large`, `xl`, `xxl`, `omg`.

```blade
<x-bladewind::modal title="See Through Me" name="noblur" blur_size="none">
    The backdrop of this modal is not blurred. You can see all the content behind the backdrop.
</x-bladewind::modal>

<x-bladewind::modal title="XXL Blur" name="xxlblur" blur_size="xxl">
    A much more intense blur.
</x-bladewind::modal>
```

## Using Different Icons

Set `icon` to any [Heroicons](https://heroicons.com) name to display a custom icon via the BladewindUI [Icon](/component/icon) component, and pair it with `icon_css` for extra styling.

```blade
<x-bladewind::modal
    icon="folder-arrow-down"
    icon_css="bg-gray-500 text-white p-2.5 rounded-full"
    title="Large File Size"
    name="info">
    The file you are trying to download is very big.
    Do you still want to continue with the download?
</x-bladewind::modal>
```

A custom icon can also be combined with one of the predefined `type` states by setting both `type` and `icon`:

```blade
<x-bladewind::modal
    title="Large File Size"
    type="warning"
    name="iconic-warning"
    icon="folder-arrow-down">
    The file you are trying to download is very big.
    Do you still want to continue with the download?
</x-bladewind::modal>
```

## Different Sizes

On mobile the modal always renders at a single size. Set `size` to control desktop width. Default is `big`.

| Size | CSS Class |
|---|---|
| tiny | sm:w-72 |
| small | sm:w-96 |
| medium | sm:w-[32rem] |
| large | sm:w-[60rem] |
| xl | sm:w-[86rem] |
| omg | max-w-screen |

```blade
<x-bladewind::modal size="tiny" title="Tiny Modal" name="tiny-modal">
    I am the tiniest in the modal family.
</x-bladewind::modal>

<x-bladewind::modal size="small" title="Small Modal" name="small-modal">
    I am the smallest in the modal family.
</x-bladewind::modal>

<x-bladewind::modal size="medium" title="Medium Modal" name="medium-modal">
    I am the medium sized modal.
</x-bladewind::modal>

<x-bladewind::modal size="large" title="Large Modal" name="large-modal">
    I am the large modal.
</x-bladewind::modal>

<x-bladewind::modal size="xl" title="XL Modal" name="xl-modal">
    I am the extra large modal.
</x-bladewind::modal>

<x-bladewind::modal size="omg" title="Full Width Modal" name="omg-modal">
    I am the full width modal. My nickname is OMG. I take up the entire screen.
</x-bladewind::modal>
```

## Action Buttons

The modal shows a `Cancel` and `Okay` button by default; both close the modal when clicked. Either or both can be hidden or relabeled.

Set `cancel_button_label` and `ok_button_label` to change button text. Setting either to an empty string hides that button.

```blade
<x-bladewind::modal title="No Cancel Button" name="no-cancel" cancel_button_label="">
    I have no cancel button. Just okay and that is fine.
</x-bladewind::modal>

<x-bladewind::modal title="No Okay Button" name="no-okay" ok_button_label="">
    I have no okay button. Just cancel this thing and let's all go home.
</x-bladewind::modal>
```

### Hiding Both Action Buttons

Instead of blanking both labels, set `show_action_buttons="false"`. Useful for a modal containing its own form with its own submit button.

```blade
<x-bladewind::modal title="No Action Buttons" name="no-action-buttons" show_action_buttons="false">
    I have no action buttons. Only the backdrop can close me now.
</x-bladewind::modal>
```

### Action Button Actions

By default both buttons close the modal (`cancel_button_action="close"` and `ok_button_action="close"`). Both attributes accept a JavaScript function to call instead. Set `close_after_action="false"` to keep the modal open after either button is clicked.

```blade
<x-bladewind::modal
    size="big"
    type="warning"
    title="Confirm User Deletion"
    ok_button_action="alert('as you wish')"
    cancel_button_action="alert('good choice')"
    close_after_action="false"
    name="custom-actions"
    ok_button_label="Yes, delete"
    cancel_button_label="don't delete">
    Are you sure you want to delete this user? This action cannot be undone.
</x-bladewind::modal>
```

### Close Icon

Closing is normally delegated to the Cancel/Close button in the footer. Set `show_close_icon="true"` to also show a close icon in the top-right corner of the modal.

### Alignment of the Action Buttons

Action buttons are right-aligned by default, or left-aligned when `size="tiny"`. Change alignment with `align_buttons`: `left`, `center`, `right`.

```blade
<x-bladewind::modal type="warning" title="Confirm User Deletion" align_buttons="left" name="go-left">
    Are you sure you want to delete this user? This action cannot be undone.
</x-bladewind::modal>
```

## Non-Dismissible Modal

By default the modal can be closed via the backdrop or action buttons. Set `backdrop_can_close="false"` to prevent this until a choice is made or an action performed. If using action buttons, also set their actions explicitly (see [Action Buttons](#action-buttons)).

```blade
<x-bladewind::button onclick="showModal('lock-screen')" icon="lock-closed">lock the screen</x-bladewind::button>

<x-bladewind::modal size="medium" show_action_buttons="false" backdrop_can_close="false" name="lock-screen">
    <div class="flex mx-auto justify-center my-2">
        <x-bladewind::avatar size="big" image="/path/to/the/image/file" />
    </div>
    <div class="my-4">
        You will need to unlock the screen to continue using this application.
    </div>
    <x-bladewind::input placeholder="Enter your password to unlock" type="password" />
    <x-bladewind::button class="w-full">Check password</x-bladewind::button>
</x-bladewind::modal>
```

## Submitting a Form Using an Action Button

There are three common ways to submit a form loaded inside a modal, only when validation passes.

### Option 1: Validate and Submit

Call `saveProfile()` from `ok_button_action`, keep the modal open with `close_after_action="false"`, and let the function validate then submit the form.

```blade
<x-bladewind::modal backdrop_can_close="false" name="form-mode" ok_button_action="saveProfile()" ok_button_label="Update" close_after_action="false">
    <form method="post" action="" class="profile-form">
        @csrf
        <b>Edit Your Profile</b>
        <div class="grid grid-cols-2 gap-4 mt-6">
            <x-bladewind::input required="true" name="first_name"
                error_message="Please enter your first name" label="First name" />

            <x-bladewind::input required="true" name="last_name"
                 error_message="Please enter your last name" label="Last name" />
        </div>
        <x-bladewind::input required="true" name="email"
             error_message="Please enter your email" label="Email address" />

        <x-bladewind::input numeric="true" name="mobile" label="Mobile" />
    </form>
</x-bladewind::modal>
```

```js
// the script called by the Update button
saveProfile = () => {
    if(validateForm('.profile-form')){
        domEl('.profile-form').submit();
    } else {
        return false;
    }
}
```

The button calls `validateForm()` (a BladewindUI helper) against the form's class, then submits it only if required fields are filled.

### Option 2: Using Ajax

Combine the modal with the [Process Indicator](/component/process-indicator) component to show progress while an Ajax request runs.

```blade
<x-bladewind::modal backdrop_can_close="false" name="form-mode-ajax" ok_button_action="saveProfileAjax()" ok_button_label="Update" close_after_action="false">
    <form method="post" action="" class="profile-form-ajax">
        @csrf
        <b>Edit Your Profile</b>
        <div class="grid grid-cols-2 gap-4 mt-6">
            <x-bladewind::input required="true" name="first_name2"
                label="First name" error_message="Please enter your first name" />
            <x-bladewind::input required="true" name="last_name2"
                label="Last name" error_message="Please enter your last name" />
        </div>
        <x-bladewind::input required="true" name="email2"
                label="Email address" error_message="Please enter your email" />
        <x-bladewind::input numeric="true" name="mobile2" label="Mobile" />
    </form>

    <x-bladewind::processing
        name="profile-updating"
        message="Updating your profile." />

    <x-bladewind::process-complete
        name="profile-update-yes"
        process_completed_as="passed"
        button_label="Done"
        button_action="hideModal('form-mode-ajax')"
        message="Profile updated successfully." />
</x-bladewind::modal>
```

```js
// the script called by the Update button
saveProfileAjax = () => {
    if(validateForm('.profile-form-ajax')){
        // show process indicator while you make your ajax call
        unhide('.profile-updating');
        hide('.profile-form-ajax');
        hideModalActionButtons('form-mode-ajax');
        // make the call
        makeAjaxCall(serialize('.profile-form-ajax'));
    } else {
        return false;
    }
}

makeAjaxCall = (formData) => {
    // this is a dummy function but your real function
    // will make a call and post all the data
    setTimeout(() => {
        // do these when your ajax call is done saving your data
        hide('.profile-updating');
        unhide('.profile-update-yes')
    }, 5000);
}
```

When Update is clicked, `saveProfileAjax()` validates the form and, if valid, hides the action buttons and the form, shows the process indicator, and calls `makeAjaxCall()` with the serialized form data. Once the Ajax call completes, hide the process indicator and show the `process-complete` component. Its Done button closes the modal via `button_action="hideModal('form-mode-ajax')"`. Typically you'd use two `process-complete` components, one for failure and one for success. `hide()`, `unhide()`, `hideModalActionButtons()`, `serialize()` and `validateForm()` are all BladewindUI helper functions.

### Option 3: Submit Button in the Form

Hide the Okay button and put the submit button inside the form itself; the modal keeps only a cancel button.

```blade
<x-bladewind::modal backdrop_can_close="false" name="form-mode-simple" ok_button_label="">
    <form method="post" action="" class="profile-form-simple" onsubmit="return saveProfileSimple()">
        @csrf
        <b>Edit Your Profile</b>
        <div class="grid grid-cols-2 gap-4 mt-6">
            <x-bladewind::input required="true" name="first_name3"
                label="First name" error_message="Please enter your first name" />
            <x-bladewind::input required="true" name="last_name3"
                label="Last name" error_message="Please enter your last name" />
        </div>
        <x-bladewind::input required="true" name="email3"
                label="Email address" error_message="Please enter your email" />
        <x-bladewind::input numeric="true" name="mobile3"
                label="Mobile" />
        <x-bladewind::button can_submit="true" class="w-full mt-2">
            Update Profile
        </x-bladewind::button>
    </form>
</x-bladewind::modal>
```

```js
// the script called by the Update button
saveProfileSimple = () => {
    if(validateForm('.profile-form-simple')){
        return domEl('.profile-form-simple').submit();
    }
    return false;
}
```

Note the `return` keyword in `onsubmit="return saveProfileSimple()"` — without it, the form submits even when validation fails. Add `can_submit="true"` to the button so it can submit the form.

## Replacing Placeholders

Replace placeholders in modal content, useful when one modal handles actions for dynamically generated data (e.g. confirming deletion of a specific record). Pass a data object as the second argument to `showModal()`.

```blade
<x-bladewind::table>
    <x-slot name="header">
        <th>Name</th>
        <th>Department</th>
        <th>Email</th>
        <th></th>
    </x-slot>
    <tr>
        <td>Alfred Rowe</td>
        <td>Outsourcing</td>
        <td>alfred@therowe.com</td>
        <td>
            <x-bladewind::button
                size="tiny"
                color="red"
                onclick="showModal('placeholder-example', {
                    auth_user: 'mike',
                    name: 'Alfred Rowe'
                })">Delete</x-bladewind::button>
        </td>
    </tr>
</x-bladewind::table>

<x-bladewind::modal name="placeholder-example" title="Confirm" type="error">
    Hey :auth_user, to delete <b>:name</b>, first delete all the pictures they have uploaded
</x-bladewind::modal>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| type | blank | `info` \| `error` \| `warning` \| `success` |
| title | blank | Title of the modal. |
| name | 'bw-modal-'.uniqid() | Unique identifier for the modal. Important for avoiding erratic behaviour. |
| ok_button_label | okay | Label for the primary action button. |
| cancel_button_label | cancel | Label for the secondary action button. |
| ok_button_action | close | JavaScript function called when the primary action button is clicked. |
| cancel_button_action | close | JavaScript function called when the secondary action button is clicked. |
| close_after_action | true | Whether the modal closes after an action button is clicked. `true` \| `false` |
| backdrop_can_close | true | Whether clicking the backdrop closes the modal. `true` \| `false` |
| blur_size | medium | Intensity of the backdrop blur. `none` \| `small` \| `medium` \| `large` \| `xl` \| `omg` |
| show_action_buttons | true | Whether the action buttons are displayed. `true` \| `false` |
| align_buttons | right | Alignment of the action buttons in the modal footer. `left` \| `center` \| `right` |
| stretch_action_buttons | false | Whether action buttons stretch the full width of the modal, each on its own line. `true` \| `false` |
| size | big | Size of the modal, smallest to largest. `tiny` \| `small` \| `medium` \| `large` \| `xl` \| `omg` |
| show_close_icon | false | Show a close icon in the top-right corner; behaves like the Cancel button. `true` \| `false` |
| body_css | blank | Extra CSS classes for the modal body. |
| footer_css | blank | Extra CSS classes for the modal footer. |
| nonce | null | Nonce for content security policies on inline scripts. Can be set globally via `config/bladewind.php` under `script`. |

## Full Example

```blade
<x-bladewind::modal
    type="warning"
    title="Modal with all features"
    name="full-modal"
    ok_button_label="yes"
    cancel_button_label="no"
    close_after_action="false"
    ok_button_action="alert('say ok')"
    cancel_button_action="alert('say nay')"
    backdrop_can_close="false"
    show_action_buttons="false"
    show_close_icon="true"
    blur_size="xxl"
    size="medium"
    class="shadow-sm">
    ...
</x-bladewind::modal>
```
