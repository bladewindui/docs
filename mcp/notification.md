---
title: Notification Component
component: x-bladewind::notification
url: /component/notification
---

# Notification

Unlike the [Alert](/component/alert) component, the notification component is not permanently visible and is useful when you want to provide feedback to your users. The BladewindUI Notification component is solely triggered via JavaScript.

Include the component anywhere on your page — ideally in a shared layout so it is available globally.

## Basic Usage

```blade
<x-bladewind::notification />
```

Trigger a notification using the JavaScript helper function:

```js
showNotification(title, message, type, dismiss_in);
```

| Parameter | Required | Description |
|---|---|---|
| title | optional | Brief title of the notification |
| message | required | Message to display in the body |
| type | optional | `success` (default) \| `info` \| `warning` \| `error` |
| dismiss_in | optional | Seconds before auto-dismiss. Default is 15 |

```js
showNotification('Delete Successful', 'Your file was deleted successfully');

showNotification('Delete Failed', 'Your message could not be deleted. Try again', 'error');

showNotification('Low Disk Space', 'You have used 20gb of your 25gb storage space.', 'warning');

showNotification('Invitation Accepted', 'Samuel just accepted your invitation.', 'info');
```

## Multiple Notifications

Multiple notifications can be triggered and are displayed as a stack, with the latest on top.

## Targeting Existing Notifications

By default, each `showNotification()` call creates a new notification. To prevent duplicate notifications (e.g., repeated file type errors), give the notification a `name` as the 6th parameter. BladewindUI will re-render the existing notification instead of creating a new one.

```js
showNotification(
    'Delete Failed',
    'Your message could not be deleted. Try again',
    'error',
    15,
    'regular',
    'same_one'
);
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| position | top-right | Where to display notifications. `top-right` \| `bottom-right` \| `top-left` \| `bottom-left` |
| nonce | null | Nonce value for Content Security Policy |

## Full Example

```blade
<x-bladewind::notification position="top-right" />
```
