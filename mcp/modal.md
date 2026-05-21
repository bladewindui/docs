---
title: Modal Component
component: x-bladewind::modal
url: /component/modal
---

# Modal

The modal component is useful for displaying content that is overlayed on the primary page content.

## Default Modal

Modals are mostly displayed when an action is triggered, say when a button is clicked. All BladewindUI modals are invoked via a javascript helper function bundled with the component: `showModal('name-of-modal');`. Like with all BladewindUI components, the syntax for cooking up a modal is very simple.

> IMPORTANT: BladewindUI Modals are created, targeted and invoked using the `name` attribute. You can have several modals on the same page but it is very important to provide unique names for each modal.

Clicking on the backdrop of the modal or on the cancel button will by default dismiss the modal. The `hideModal('name-of-modal');` helper function is called to dismiss modals. It is possible to prevent the backdrop or the cancel button from closing the modal. See the Non-dismissed modal section below.

```blade
<x-bladewind::button
    show_close_icon="true"
    onclick="showModal('tnc-agreement')">
    Basic modal
</x-bladewind::button>

<x-bladewind::button
    onclick="showModal('tnc-agreement-titled')">
    Basic modal with a title
</x-bladewind::button>

<x-bladewind::modal
    name="tnc-agreement">
    Please agree to the terms and conditions of
    the agreement before proceeding.
</x-bladewind::modal>

<x-bladewind::modal
    name="tnc-agreement-titled"
    title="Agree or Disagree">
    Please agree to the terms and conditions of
    the agreement before proceeding.
</x-bladewind::modal>
```

## Different Types

The BladewindUI modal component comes prebuilt with some default types for the common use cases. This can be achieved by setting the `type` attribute on the modal component. The default `type=""`. All the type attribute does is append the appropriate icons that match the type of modal.

### Info Modal

Set `type="info"` on the modal component. The default icon changes to a blue info icon.

```blade
<x-bladewind::button onclick="showModal('info')">
    Info Modal
</x-bladewind::button>

<x-bladewind::modal
    type="info"
    title="General Info"
    name="info">
    We really think you should buy some Bitcoin
    despite it's ups and downs. What sayeth thou?
</x-bladewind::modal>
```

### Error Modal

Set `type="error"` on the modal component. The default icon changes to a red exclamation mark.

```blade
<x-bladewind::button onclick="showModal('error')">
    Error Modal
</x-bladewind::button>

<x-bladewind::modal
    type="error"
    title="Delete Not Allowed"
    name="error">
    You do not have permissions to delete this user.
</x-bladewind::modal>
```

### Warning Modal

Set `type="warning"` on the modal component. The default icon changes to a yellow bell icon.

```blade
<x-bladewind::button onclick="showModal('warning')">
    Warning Modal
</x-bladewind::button>

<x-bladewind::modal
    type="warning"
    title="First warning"
    name="warning">
    Hmmm...This is your first warning.
    Two more warnings and you are off this platform.
</x-bladewind::modal>
```

### Success Modal

Set `type="success"` on the modal component. The default icon changes to a green thumbs up icon.

```blade
<x-bladewind::button onclick="showModal('success')">
    Success Modal
</x-bladewind::button>

<x-bladewind::modal
    type="success"
    title="User Deleted"
    name="success">
    Yayy.. User deleted successfully
</x-bladewind::modal>
```

### Stretched Action Buttons

Some users prefer to have their action buttons span the entire width of the modal. Set `stretched_action_buttons="true"` on the modal component.

```blade
<x-bladewind::button onclick="showModal('stretched')">
    Stretched Buttons Modal
</x-bladewind::button>

<x-bladewind::modal
    title="Stretched Buttons"
    stretched_action_buttons="true"
    name="stretched">
    The action buttons in this modal have been stretched.
    This means each button gets its own line.
</x-bladewind::modal>
```

## Backdrop Blur Intensity

The backdrop can be customized to have different intensities of the blur by specifying `blur_size`. The available values are `none`, `small`, `medium`, `large`, `xl`, `xxl`, `omg`.

```blade
<x-bladewind::button onclick="showModal('noblur')">
    No Blur
</x-bladewind::button>

<x-bladewind::modal
    title="See Through Me"
    blur_size="none"
    name="noblur">
    The backdrop of this modal is not blurred.
    You can see all the content behind the backdrop.
</x-bladewind::modal>
```

## Using Different Icons

The default types use predefined icons. You may want to use your own icons in the modal component. Set the `icon` attribute to any icon name on [Heroicons](https://heroicons.com). This modal icon is displayed using the BladewindUI [Icon](/component/icon) component. Use the `icon_css` attribute to apply extra styling to the custom icon.

```blade
<x-bladewind::button onclick="showModal('iconic')">
    Custom Icon Modal
</x-bladewind::button>

<x-bladewind::modal
    icon="folder-arrow-down"
    icon_css="bg-gray-500 text-white p-2.5 rounded-full"
    title="Large File Size"
    name="info">
    The file you are trying to download is very big.
    Do you still want to continue with the download?
</x-bladewind::modal>
```

You may want to use a custom icon but with one of the predefined states. Simply set both the `type` and `icon` attributes.

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

> On mobile the modal has just one size.

The BladewindUI modal component comes with a size option that allows your content to breathe in the modals. Set the `size` attribute on the modal component. The default `size="small"`. All sizes are the same on mobile.

| Size | CSS Class |
|---|---|
| tiny | `sm:w-72` |
| small | `sm:w-96` |
| medium | `sm:w-[32rem]` |
| large | `sm:w-[60rem]` |
| xl | `sm:w-[86rem]` |
| omg | `max-w-screen` |

```blade
<x-bladewind::modal
    size="tiny"
    title="Tiny Modal"
    name="tiny-modal">
    I am the tiniest in the modal family. Don't hate.
</x-bladewind::modal>

<x-bladewind::modal
    size="small"
    title="Small Modal"
    name="small-modal">
    I am the smallest in the modal family. Don't hate.
</x-bladewind::modal>

<x-bladewind::modal
    title="Medium Modal"
    size="medium"
    name="medium-modal">
    I am the medium sized modal.
    Also the default if you do not set a size.
</x-bladewind::modal>

<x-bladewind::modal
    size="large"
    title="Large Modal"
    name="large-modal">
    I am the large modal. If I am not large enough to contain
    your needs, check out my xl brother.
</x-bladewind::modal>

<x-bladewind::modal
    size="xl"
    title="XL Modal"
    name="xl-modal">
    I am the extra large modal.
</x-bladewind::modal>

<x-bladewind::modal
    size="omg"
    title="Full Width Modal"
    name="omg-modal">
    I am the full width modal. My nickname is OMG.
</x-bladewind::modal>
```

## Action Buttons

The modal component by default shows a `Cancel` and `Okay` button. Both buttons by default close the modal when clicked. It is possible to show either of the buttons or even none of the buttons.

If you don't want your buttons to say **Cancel** and **Okay**, set the `cancel_button_label` and `ok_button_label` attributes to whatever text you want the buttons to display.

To hide the `cancel` button, set `cancel_button_label=""`. When the button label is blank, the button won't be displayed. To hide the okay button, set `ok_button_label=""`.

### No Cancel Button

```blade
<x-bladewind::button onclick="showModal('no-cancel')">
    No cancel button
</x-bladewind::button>

<x-bladewind::modal
    title="No Cancel Button"
    name="no-cancel"
    cancel_button_label="">
    I have no cancel button. Just okay and that is fine.
</x-bladewind::modal>
```

### No Okay Button

```blade
<x-bladewind::button onclick="showModal('no-okay')">
    No okay button
</x-bladewind::button>

<x-bladewind::modal
    title="No Okay Button"
    name="no-okay"
    ok_button_label="">
    I have no okay button.
    Just cancel this thing and let's all go home.
</x-bladewind::modal>
```

### Hiding Both Action Buttons

Set `show_action_buttons="false"` to hide both action buttons. A no-action-buttons modal can be useful if you want to have a form in a modal with its own button that submits the form.

```blade
<x-bladewind::button onclick="showModal('no-action-buttons')">
    No action buttons
</x-bladewind::button>

<x-bladewind::modal
    title="No Action Buttons"
    name="no-action-buttons"
    show_action_buttons="false">
    I have no action buttons. Only the backdrop can close me now.
</x-bladewind::modal>
```

### Action Button Actions

By default both action buttons close the modal. To change these default actions, set the `cancel_button_action` and `ok_button_action` attributes. The default values are `cancel_button_action="close"` and `ok_button_action="close"`. The attributes expect javascript functions as the values.

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

By default, the modal is dismissed after clicking any of the action buttons. Setting `close_after_action="false"` will ensure the modal stays open after clicking any of the action buttons.

### Close Icon

To close a modal using a close icon placed in the top right, set `show_close_icon="true"`.

### Alignment of the Action Buttons

By default the action buttons are right aligned but left aligned if the modal `size="tiny"`. To change the alignment of the action buttons, set the `align_buttons` attribute to either `left`, `center` or `right`.

## Non-Dismissible Modal

By default the modal component can be closed using the backdrop or any of the action buttons. To prevent dismissal, set `backdrop_can_close="false"`. If you are using the modals with the action buttons you will also need to set the actions of each button.

```blade
<x-bladewind::modal
    show_action_buttons="false"
    backdrop_can_close="false"
    name="lock-screen">

    <div class="flex mx-auto justify-center my-2">
        <x-bladewind.avatar class="" image="/path/to/the/image/file" />
    </div>
    <div class="my-4">
        You will need to unlock the screen to continue using this application.
    </div>

    <x-bladewind.input
        placeholder="Enter your password to unlock"
        type="password" />

    <x-bladewind::button class="w-full">Check password</x-bladewind::button>

</x-bladewind::modal>
```

## Submitting Form Using Action Button

### Validate and Submit Form

```blade
// the modal and its form
<x-bladewind::modal
    backdrop_can_close="false"
    name="form-mode"
    ok_button_action="saveProfile()"
    ok_button_label="Update"
    close_after_action="false"
    >

    <form method="post" action="" class="profile-form">
        @csrf
        <b class="mt-0">Edit Your Profile</b>
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

## JavaScript

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

### Using Ajax

The next example submits the form via Ajax and makes use of the [Process Indicator](/component/process-indicator) component to show progress.

```blade
<x-bladewind::modal
    backdrop_can_close="false"
    name="form-mode-ajax"
    ok_button_action="saveProfileAjax()"
    ok_button_label="Update"
    close_after_action="false">

    <form method="get" action="" class="profile-form-ajax">
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

`hide()`, `unhide()`, `hideModalActionButtons()`, `serialize()` and `validateForm()` are all [helper functions](/extra/helper-functions) available in BladewindUI.

### Submit Button in Form

The third option is to hide the Okay button of the modal and let the submit button sit in the form itself.

```blade
<x-bladewind::modal
    backdrop_can_close="false"
    name="form-mode-simple"
    ok_button_label=""
    >

    <form method="get" action="" class="profile-form-simple"
          onsubmit="return saveProfileSimple()">
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

## Replacing Placeholders

There are times you will want to replace placeholders in the content of your modals. An example is when you are deleting a record and want the user to confirm. With placeholders your message could become: **Do you really want to delete :name as an admin?**

```blade
<x-bladewind::modal
    name="placeholder-example"
    title="Confirm"
    type="error">
    Hey :auth_user, to delete <b>:name</b>,
    first delete all the pictures they have uploaded
</x-bladewind::modal>
```

```blade
<x-bladewind::table>
    ...
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
            })">Delete</x-bladewind::button></td>
    </tr>
    ...
</x-bladewind::table>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| type | blank | `info` `error` `warning` `success` |
| title | blank | String. Defines the title of the modal |
| name | `'bw-modal-'.uniqid()` | Uniquely identifies a modal. Very important to prevent erratic behaviour |
| ok_button_label | `okay` | Specify the label to be displayed on the primary action button |
| cancel_button_label | `cancel` | Specify the label to be displayed on the secondary action button |
| ok_button_action | `close` | Expects a javascript function that will be called when the primary action button is clicked |
| cancel_button_action | `close` | Expects a javascript function that will be called when the secondary action button is clicked |
| close_after_action | `true` | Specify whether the modal stays open after any of the action buttons are clicked. `true` `false` |
| backdrop_can_close | `true` | Specify whether clicking on the modal backdrop should close the modal. `true` `false` |
| blur_size | `medium` | Specify the intensity of the backdrop blur. `none` `small` `medium` `large` `xl` `omg` |
| show_action_buttons | `true` | Specify whether the action buttons should be displayed. `true` `false` |
| align_buttons | `right` | Specify how the action buttons should be aligned in the modal footer. `left` `center` `right` |
| stretch_action_buttons | `false` | Specify whether the action buttons should stretch the entire width of the modal. `true` `false` |
| size | `big` | Defines the size of the modal. `tiny` `small` `medium` `large` `xl` `omg` |
| show_close_icon | `false` | Display a close icon in the top right corner of the modal window. `true` `false` |
| body_css | blank | Any extra css classes to add to the modal body |
| footer_css | blank | Any extra css classes to add to the modal footer |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts |

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
