---
title: Notification Component
component: x-bladewind::notification
url: /component/notification
---

# Notification

Unlike the [Alert](/component/alert) component, notifications are not permanently visible on screen and are useful for giving users transient feedback. The Notification component is triggered entirely from JavaScript.

## Basic Usage

Include the component once anywhere on the page, ideally in a layout shared across the app.

```blade
<x-bladewind::notification />
```

Trigger a notification with the JavaScript helper function:

```js
showNotification(title, message, type, dismiss_in);
```

| Parameter | Required? | Description |
|---|---|---|
| title | optional | Brief title of the notification. |
| message | required | Message displayed in the body of the notification. Can be brief or descriptive. |
| type | optional | Type of notification. Default is `success`. `success` \| `info` \| `warning` \| `error`. Determines color and icon. |
| dismiss_in | optional | Number of seconds before the notification auto-dismisses if not closed manually. Default is 15. Value is in seconds, not milliseconds. |

```js
showNotification('Delete Successful', 'Your file was deleted successfully');
```

## Notification Types

```blade
<x-bladewind::button
    onclick="showNotification('Download Successful', 'Your download completed successfully')">success</x-bladewind::button>

<x-bladewind::button
    onclick="showNotification('Delete Failed', 'Your message could not be deleted. Try again', 'error')">error</x-bladewind::button>

<x-bladewind::button
    onclick="showNotification('Low Disk Space', `You have used 20gb of your 25gb storage space. <a href='#'>Upgrade soon</a>`, 'warning')">warning</x-bladewind::button>

<x-bladewind::button
    onclick="showNotification('Invitation Accepted', `Samuel just accepted your invitation to join BladewindUI Inc. <a href='#'>Say Hello</a>`, 'info')">info</x-bladewind::button>
```

Multiple notifications can be triggered at once. They stack in chronological order, with the latest on top.

## Targeting Existing Notifications

By default, each call to `showNotification()` creates a new notification. For events that might fire repeatedly in quick succession (e.g. a file picker rejecting a file type), this can stack duplicate messages. Pass a `name` as the sixth argument to reuse an existing notification of that name instead of creating a new one.

```blade
<x-bladewind::button
    onclick="showNotification('Delete Failed', 'Your message could not be deleted. Try again', 'error', 15, 'regular', 'same_one')">Same Notification</x-bladewind::button>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| position | top-right | Where the notification is displayed. `top-right` \| `bottom-right` \| `top-left` \| `bottom-left` |
| nonce | null | Nonce for content security policies on inline scripts. Can be set globally via `config/bladewind.php` under `script`. |

## Full Example

```blade
<x-bladewind::notification position="top-right" />
```
