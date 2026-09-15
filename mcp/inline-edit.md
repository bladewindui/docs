---
title: Inline Edit Component
component: x-bladewind::inline-edit
url: /component/inline-edit
---

# Inline Edit

`x-bladewind::inline-edit` shows a value as plain text until the user clicks it (or its edit icon), then swaps in a
text field with Save and Cancel controls. With no `onSave`, it saves optimistically — the display updates the
instant Save is clicked, and a hidden field carries the current value for a normal form submission alongside the
rest of the page.

## Basic Usage

```blade
<x-bladewind::inline-edit name="project_name" value="Q3 Marketing Campaign" />
```

Click the text (or its pencil icon) to edit, `Enter` to save, `Escape` or the × button to cancel. An empty value
shows `placeholder` in a muted, italic style instead of nothing.

## An async save

Pass `onSave` as a raw JavaScript expression, wrapped internally in a function that receives `(newValue, oldValue)`
and may return a `Promise`. While that promise is pending, the field and both controls disable and the save button
shows a spinner. Resolving it updates the display to the new value; rejecting it shows the rejection's message (or a
generic one) and leaves edit mode open so the user can fix the value and retry.

```blade
<x-bladewind::inline-edit name="project_name" value="Q3 Marketing Campaign" on-save="renameProject(1, newValue)" />

<script>
    function renameProject(id, name) {
        return fetch(`/projects/${id}`, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name }),
        }).then((response) => {
            if (! response.ok) throw new Error('Could not rename the project');
        });
    }
</script>
```

## Required and validation

Set `required="true"` to block saving an empty value; the field shows `requiredMessage` instead and stays in edit
mode. Any rejection from `onSave` — for a server-side validation failure, say — surfaces the same way.

```blade
<x-bladewind::inline-edit name="project_name" required="true" required-message="A project needs a name" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | _(auto-generated)_ | Name of the hidden field the current value submits under. |
| value | _(blank)_ | Current value. |
| placeholder | Click to edit | Shown, in a muted style, when the value is empty. Also the input's placeholder while editing. |
| required | false | Blocks saving an empty value. |
| requiredMessage | This field is required | Shown when a required save is blocked. |
| maxlength | _(none)_ | Maximum characters accepted by the input. |
| onSave | _(blank)_ | Raw JS expression receiving (newValue, oldValue), optionally returning a Promise. Blank saves optimistically. |
| saveLabel / cancelLabel / editLabel | Save / Cancel / Edit | Accessible labels for the three controls. |
| class | _(blank)_ | Additional CSS classes for the wrapper element. |
