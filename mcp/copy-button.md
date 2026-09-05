---
title: Copy Button Component
component: x-bladewind::copy-button
url: /component/copy-button
---

# Copy Button

`x-bladewind::copy-button` copies a value — or its own wrapped content — to the clipboard on click, briefly swapping
its icon to a checkmark and announcing success or failure to assistive technology.

## Basic Usage

```blade
<x-bladewind::copy-button>npm install bladewindui</x-bladewind::copy-button>
```

With no `value`, the button copies its own slot's trimmed text — the display and the copied value never drift apart
because there is only one string to keep in sync.

## Icon-only, with an explicit value

Pass `value` directly for an icon-only trigger next to something that isn't itself plain copyable text — a masked
API key, a formatted table cell, and so on.

```blade
<code>sk_live_••••••••1234</code>
<x-bladewind::copy-button value="sk_live_a1b2c3d4e5f61234" copy-label="Copy API key" />
```

## A labelled button

Add `label` for a full text-and-icon button instead of an icon-only trigger — only takes effect when there is no
wrapped slot content.

```blade
<x-bladewind::copy-button value="1234-5678-9012" label="Copy code" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| value | _(none)_ | Text to copy. Defaults to the default slot's trimmed text. |
| label | _(blank)_ | Text label on the button. Ignored when the slot has content. |
| copyLabel | Copy | Accessible label for the trigger button. |
| copiedMessage | Copied | Announced to screen readers after a successful copy. |
| failedMessage | Could not copy | Announced to screen readers if the copy fails. |
| timeout | 1500 | Milliseconds before the success icon reverts to the default clipboard icon. |
| size | small | `tiny` \| `small` \| `regular` |
| class | _(blank)_ | Additional CSS classes for the wrapper element. |
