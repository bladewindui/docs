---
title: Transfer List Component
component: x-bladewind::transfer-list
url: /component/transfer-list
---

# Transfer List

`x-bladewind::transfer-list` moves items between two panels — "Available" and "Selected" — with per-panel search and
select-all, arrow controls in the middle, and a double-click on any row as a shortcut for moving just that one item.
It submits as a normal array field: only items currently in the "Selected" panel are enabled, so the form only ever
sends what is actually selected.

## Basic Usage

```blade
<x-bladewind::transfer-list
    name="roles"
    :items="[
        ['value' => 1, 'label' => 'Editor'],
        ['value' => 2, 'label' => 'Viewer'],
        ['value' => 3, 'label' => 'Admin'],
    ]"
    :selected="[2]"
/>
```

`items` accepts an array or a JSON string; each item needs at least a `value` and a `label` key (override the key
names with `valueKey`/`labelKey`, exactly like Select). `selected` lists which values start in the right-hand panel.
On submit, this example sends `roles[]` for every item currently on the right.

## Custom value/label keys

```blade
<x-bladewind::transfer-list
    name="roles"
    :items="[['id' => 1, 'name' => 'Editor'], ['id' => 2, 'name' => 'Viewer']]"
    value-key="id"
    label-key="name"
/>
```

## Panel labels and size

Override the panel headings with `availableLabel`/`selectedLabel`, and each panel's height (in pixels) with `height`.

```blade
<x-bladewind::transfer-list
    name="roles"
    :items="$items"
    available-label="Not assigned"
    selected-label="Assigned"
    height="180"
/>
```

## Search

Each panel gets its own search box by default, filtering that panel's rows as you type. Set `searchable="false"` to
remove both boxes — worth doing once a list is short enough that scanning it is faster than typing.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | _(auto-generated)_ | Field name the selected values submit under, as `name[]`. |
| items | [] | Array or JSON string of items, each with a value and a label key. |
| valueKey | value | Key read as each item's value. |
| labelKey | label | Key read as each item's display label. |
| selected | [] | Values that start in the "Selected" panel. |
| availableLabel | Available | Left panel heading. |
| selectedLabel | Selected | Right panel heading. |
| searchable | true | Shows a per-panel search box. |
| height | 260 | Height, in pixels, of each panel. |
| class | _(blank)_ | Additional CSS classes for the wrapper element. |
