---
title: File Preview Component
component: x-bladewind::file-preview
url: /component/file-preview
---

# File Preview

`x-bladewind::file-preview` is the read-only display counterpart to Filepicker — a compact row showing a thumbnail
or file-type icon, the filename, its size, and download/remove actions. Use it for a list of already-uploaded files:
attachments on a record, documents in a table row, files a Filepicker has already accepted.

## Basic Usage

```blade
<x-bladewind::file-preview name="Quarterly report.pdf" size="2621440" url="/files/1" />
<x-bladewind::file-preview name="team-photo.jpg" size="843200" thumbnail="/thumbs/team-photo.jpg" url="/files/2" />
<x-bladewind::file-preview name="budget.xlsx" size="51200" url="/files/3" />
```

`size` is plain bytes — the component formats it into B/KB/MB/GB itself. Without a `thumbnail`, the icon is derived
from the filename's extension (PDF, Word, Excel, images, video, audio, archives, and code files all get a distinct
icon; anything unrecognised falls back to a generic document icon).

## Removing a file

A remove control shows by default and removes the preview from the DOM directly — nothing to wire up for the common
case of client-side removal from a list the user is still assembling. Pass `on-remove` with your own JavaScript (for
example, an endpoint call) to handle it yourself instead; doing so replaces the default behaviour entirely, the same
pattern Tag's dismiss button uses.

```blade
<x-bladewind::file-preview name="report.pdf" on-remove="deleteAttachment(1)" />
```

Set `removable="false"` to drop the control entirely — useful for a purely informational list the viewer cannot edit.

## Download

A download link shows automatically whenever `url` is set. Set `downloadable="false"` to keep the link out even when
a URL is present.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | _(blank)_ | Filename to display, and the source of the extension-derived icon. |
| size | _(blank)_ | File size in bytes. A non-numeric value hides the size line. |
| url | _(blank)_ | Link used by the download action. |
| thumbnail | _(blank)_ | An image URL shown in place of the generic file-type icon. |
| icon | _(derived)_ | Overrides the extension-derived icon with any Heroicons name. |
| removable | true | Shows the remove control. |
| downloadable | true | Shows the download link when a `url` is set. |
| onRemove | _(blank)_ | Raw JS run on remove, replacing the default (remove the preview from the DOM). |
| class | _(blank)_ | Additional CSS classes for the wrapper element. |
