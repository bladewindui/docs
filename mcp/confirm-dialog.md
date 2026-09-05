---
title: Confirm Dialog Component
component: x-bladewind::confirm-dialog
url: /component/confirm-dialog
---

# Confirm Dialog

A purpose-built confirmation modal for destructive or consequential actions — deleting a record, cancelling a
subscription, discarding unsaved work. It composes `x-bladewind::modal` rather than duplicating it, and adds a tone
that picks a sensible icon and confirm colour, a backdrop that will not dismiss it by accident, and an async pending
state for the confirm action itself.

## Basic Usage

```blade
<x-bladewind::confirm-dialog name="deleteUser" title="Delete this user?">
    This will permanently remove the user and everything associated with their account. This cannot be undone.
</x-bladewind::confirm-dialog>
<x-bladewind::button onclick="showModal('deleteUser')">Delete user</x-bladewind::button>
```

Like Modal, a confirm dialog is opened by name with the `showModal()` helper — give it a unique `name` and call
`showModal('name')` from anywhere on the page.

## Tone

`tone` picks the icon and the confirm button's colour in one attribute: `danger` (default, for destructive actions),
`warning`, `info`, or `primary` (no icon, the button's default colour — for a consequential but non-destructive
confirmation).

```blade
<x-bladewind::confirm-dialog name="leavePage" tone="warning" title="Leave without saving?">
    Your changes have not been saved yet.
</x-bladewind::confirm-dialog>
```

## An async confirm action

Pass `onConfirm` as a raw JavaScript expression, wrapped internally in a function that may return a `Promise`. While
that promise is pending, both buttons disable and the confirm button shows a spinner. Resolving it closes the dialog;
rejecting it re-enables the buttons and leaves the dialog open, so you can surface your own error state before the
user retries.

```blade
<x-bladewind::confirm-dialog
    name="deleteUser"
    title="Delete this user?"
    onConfirm="deleteUser(:userId)">
    This will permanently remove the user. This cannot be undone.
</x-bladewind::confirm-dialog>

<script>
    function deleteUser(id) {
        return fetch(`/users/${id}`, { method: 'DELETE' });
    }
</script>
```

Set `close-after-confirm="false"` if you would rather close the dialog yourself — for example from inside the
`onConfirm` promise's own `.then()`, after also updating the rest of the page.

## Backdrop

Unlike a plain Modal, the backdrop cannot dismiss a confirm dialog by default — a destructive action should be
explicitly confirmed or cancelled, not accidentally dismissed by a stray click. Set `backdrop-can-close="true"` to
restore Modal's usual behaviour.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | _(auto-generated)_ | Unique identifier used by `showModal()` / `hideModal()`. |
| title | Are you sure? | Dialog heading. |
| tone | danger | `danger` \| `warning` \| `info` \| `primary` |
| confirmLabel | Confirm | Label on the confirm button. |
| cancelLabel | Cancel | Label on the cancel button. |
| onConfirm | _(blank)_ | Raw JS expression run on confirm, wrapped in a function that may return a Promise. Blank makes Confirm a plain close. |
| closeAfterConfirm | true | Close the dialog once `onConfirm`'s promise resolves. |
| backdropCanClose | false | Unlike Modal, defaults to false. |
| size | small | Any Modal size: `tiny` \| `small` \| `medium` \| `big` \| `large` \| `xl` \| `omg` |
| icon | _(blank)_ | Overrides the icon `tone` would otherwise pick, using any Heroicons name. |
