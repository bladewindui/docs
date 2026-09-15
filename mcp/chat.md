---
title: Chat Component
component: x-bladewind::chat
url: /component/chat
---

# Chat

`x-bladewind::chat` and `x-bladewind::chat.message` build a message thread. A message sits on the left as one received from someone else, or on the right, in your brand colour, as one sent by the current user. Each message can carry a sender name, an avatar, a timestamp, a delivery state, and attachments.

```blade
<x-bladewind::chat>
    <x-bladewind::chat.message sender="Jane Cooper" time="10:02 AM">
        Hey, are we still on for the call this afternoon?
    </x-bladewind::chat.message>
    <x-bladewind::chat.message outgoing="true" time="10:04 AM" status="read">
        Yes, 3pm works for me. I will send the link shortly.
    </x-bladewind::chat.message>
    <x-bladewind::chat.message sender="Jane Cooper" time="10:05 AM">
        Perfect, see you then.
    </x-bladewind::chat.message>
</x-bladewind::chat>
```

## Grouping Consecutive Messages

Set `grouped="true"` on a message that follows another one from the same sender. It hides the repeated avatar and sender name and pulls the message closer to the one above it.

```blade
<x-bladewind::chat.message sender="Jane Cooper" time="10:02 AM">
    Quick update on the proposal.
</x-bladewind::chat.message>
<x-bladewind::chat.message sender="Jane Cooper" time="10:02 AM" grouped="true">
    I have added the pricing section you asked for.
</x-bladewind::chat.message>
```

## Delivery Status

Set `status` on an outgoing message to show how far it got: `sending` `sent` `delivered` `read` or `failed`. It is only shown on outgoing messages, since a received message has no delivery state of its own to report.

```blade
<x-bladewind::chat.message outgoing="true" status="sending">Uploading the file now.</x-bladewind::chat.message>
<x-bladewind::chat.message outgoing="true" status="sent">Here you go.</x-bladewind::chat.message>
<x-bladewind::chat.message outgoing="true" status="delivered">Let me know if it opens fine.</x-bladewind::chat.message>
<x-bladewind::chat.message outgoing="true" status="read">Great, thanks!</x-bladewind::chat.message>
<x-bladewind::chat.message outgoing="true" status="failed">This one did not go through.</x-bladewind::chat.message>
```

## Attachments

Give a message an `attachments` slot for files, images, or anything else it carries.

```blade
<x-bladewind::chat.message sender="Jane Cooper" time="2:14 PM">
    Here is the signed contract.
    <x-slot:attachments>
        <a href="#">contract-signed.pdf</a>
    </x-slot:attachments>
</x-bladewind::chat.message>
```

## Scrollable Thread

Set `height` on the thread to cap it at a fixed height with its own scrollbar, useful when the chat sits inside a fixed-height panel instead of growing the page.

```blade
<x-bladewind::chat height="220px">
    ...
</x-bladewind::chat>
```

## Attributes

### Chat

| Attribute | Default | Description |
|---|---|---|
| height | _blank_ | Any valid CSS height value, for example `"400px"`. The thread grows with its content when left blank. |
| class | _blank_ | Additional CSS classes for the wrapper element. |

### Chat Message

| Attribute | Default | Description |
|---|---|---|
| outgoing | false | Right-aligns the bubble as a message sent by the current user. `true` \| `false` |
| sender | _blank_ | The sender's name, shown above an ungrouped incoming message and used for the avatar's initials fallback. |
| avatar | _blank_ | URL to the sender's avatar image. |
| time | _blank_ | A timestamp shown beneath the bubble. |
| status | _blank_ | Delivery state, shown only when `outgoing` is true. `sending` \| `sent` \| `delivered` \| `read` \| `failed` |
| grouped | false | Hides the avatar and sender name for a message following another from the same sender. `true` \| `false` |
| show_avatar | true | Determines if incoming messages show an avatar at all. `true` \| `false` |
| attachments | _none_ | A named slot for files, images, or anything else the message carries. |
| class | _blank_ | Additional CSS classes for the message row. |
