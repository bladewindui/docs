---
title: Sortable Component
component: x-bladewind::sortable
url: /component/sortable
---

# Sortable

Display a drag-and-drop sortable list, powered by [SortableJS](https://sortablejs.github.io/Sortable/). Wrap a set of `x-bladewind::sortable.item` elements with `x-bladewind::sortable` to let users drag and reorder them with the mouse or touch.

```blade
<x-bladewind::sortable>
    <x-bladewind::sortable.item>Tomatoes</x-bladewind::sortable.item>
    <x-bladewind::sortable.item>Onions</x-bladewind::sortable.item>
    <x-bladewind::sortable.item>Garlic</x-bladewind::sortable.item>
</x-bladewind::sortable>
```

## Drag Handle

By default the entire item surface is draggable. If your list items contain interactive elements (links, buttons, inputs), set `hasHandle="true"` to restrict dragging to a dedicated handle icon instead. Customise the icon with `handleIcon` — any Heroicon name.

```blade
<x-bladewind::sortable hasHandle="true" handleIcon="bars-3">
    <x-bladewind::sortable.item>Tomatoes</x-bladewind::sortable.item>
    <x-bladewind::sortable.item>Onions</x-bladewind::sortable.item>
</x-bladewind::sortable>
```

## Sharing Items Between Lists

Set `type="shared"` and give two or more lists the same `group` name to let users drag items from one list into another. Lists with `type="simple"` (the default) are isolated — items can only be reordered within the same list.

```blade
<x-bladewind::sortable type="shared" group="fruits">
    <x-bladewind::sortable.item>Apple</x-bladewind::sortable.item>
    <x-bladewind::sortable.item>Mango</x-bladewind::sortable.item>
</x-bladewind::sortable>

<x-bladewind::sortable type="shared" group="fruits">
    <x-bladewind::sortable.item>Banana</x-bladewind::sortable.item>
</x-bladewind::sortable>
```

Set `clone="true"` on a shared list if you want dragging an item into another list to leave a copy behind instead of moving it.

## Multi-select Drag

Set `multidrag="true"` to let users Ctrl/Cmd + click to select several items and drag them together as a group. `multidrag` and `swap` cannot be combined — `multidrag` wins if both are set.

```blade
<x-bladewind::sortable multidrag="true">
    <x-bladewind::sortable.item>Tomatoes</x-bladewind::sortable.item>
    <x-bladewind::sortable.item>Onions</x-bladewind::sortable.item>
    <x-bladewind::sortable.item>Garlic</x-bladewind::sortable.item>
</x-bladewind::sortable>
```

## Swap Mode

Set `swap="true"` to swap the dropped item with the item it lands on, instead of shifting every item in between. Useful for grid layouts where you only want to exchange two positions.

```blade
<x-bladewind::sortable swap="true">
    <x-bladewind::sortable.item>Tomatoes</x-bladewind::sortable.item>
    <x-bladewind::sortable.item>Onions</x-bladewind::sortable.item>
</x-bladewind::sortable>
```

## Locking Individual Items

Add a CSS class to the items you want to lock, then pass that class name to the `filter` attribute on the parent list (space or comma separated for multiple classes).

```blade
<x-bladewind::sortable filter="locked">
    <x-bladewind::sortable.item class="locked">Tomatoes (locked)</x-bladewind::sortable.item>
    <x-bladewind::sortable.item>Onions</x-bladewind::sortable.item>
</x-bladewind::sortable>
```

## Disabling Sorting

Set `sortable="false"` to disable reordering entirely within a list while still allowing the list to participate as a shared drop target.

## Submitting & Saving the Order

Reordering happens in the browser, so to persist the new order you must capture it. Give each `x-bladewind::sortable.item` a `value` (rendered as `data-id`, typically your model id), then use one of the two approaches below.

### Submitting with a form

Add `inputName` to the list. The component renders a hidden `<input>` with that name and keeps it in sync with the current order as a JSON array of each item's `value`. It submits with the rest of your form like any other field.

```blade
<form method="post" action="/tasks/reorder">
    @csrf
    <x-bladewind::sortable inputName="task_order" hasHandle="true">
        @foreach($tasks as $task)
            <x-bladewind::sortable.item value="{{ $task->id }}">{{ $task->title }}</x-bladewind::sortable.item>
        @endforeach
    </x-bladewind::sortable>
    <x-bladewind::button can_submit="true" label="Save order" />
</form>
```

On the server the field arrives as a JSON array of ids in their new order:

```php
$order = json_decode($request->input('task_order')); // ["30", "10", "20"]

foreach ($order as $position => $id) {
    Task::where('id', $id)->update(['position' => $position]);
}
```

### Saving with AJAX

To save without submitting a form, point `onSorted` at a JavaScript function. It is called after every reorder with the current order array and the original event.

```blade
<x-bladewind::sortable onSorted="saveOrder">
    @foreach($tasks as $task)
        <x-bladewind::sortable.item value="{{ $task->id }}">{{ $task->title }}</x-bladewind::sortable.item>
    @endforeach
</x-bladewind::sortable>
```

```javascript
function saveOrder(order, event) {
    fetch('/tasks/reorder', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ task_order: order })
    });
}
```

Each list is also exposed as a JavaScript variable named after its `name`, so you can call SortableJS methods directly — for example `ingredients.toArray()` returns the current order at any time. Note that `toArray()` only reports items that have a `value`, so give every item you intend to persist a `value`.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | _auto-generated_ | Unique name for the list, used as the CSS hook and JS variable name. A random name is generated if none is provided. |
| type | `simple` | `simple` lists only sort within themselves. `shared` lists can exchange items with other lists in the same `group`. |
| group | `null` | Group name used by `shared` lists. Lists sharing the same group name can exchange items. Ignored for `simple` lists. |
| clone | `false` | Leave a copy behind when dragging an item into another (shared) list instead of moving it. `true` \| `false` |
| sortable | `true` | Enable or disable sorting of items within the list. `true` \| `false` |
| hasHandle | `false` | Drag items by a dedicated handle instead of the whole item surface. `true` \| `false` |
| handleIcon | `bars-3` | Heroicon name used for the drag handle when `hasHandle` is `true`. |
| filter | `null` | Space or comma separated class names whose items cannot be dragged, e.g. `filter="locked pinned"`. |
| multidrag | `false` | Select (Ctrl/Cmd + click) and drag multiple items at once. `true` \| `false` |
| swap | `false` | Swap items on drop instead of shifting them. Not combinable with `multidrag` — `multidrag` wins if both are set. `true` \| `false` |
| animation | `150` | Reorder animation duration in milliseconds. Set to `0` to disable the animation. |
| inputName | `null` | Renders a hidden `<input>` with this name, kept in sync with the order as a JSON array of each item's `value`. Submit it with your form. |
| onSorted | `null` | Name of a JavaScript function called after every reorder as `(order, event)`. Useful for saving via AJAX. |
| class | _blank_ | Any additional CSS classes to apply to the list (`<ul>`) element. |
| nonce | `null` | CSP nonce value applied to the inline script tags. You can set a global default in `config/bladewind.php` under the `script.nonce` key. |
| modular | `false` | Appends `type="module"` to the inline script tags. `true` \| `false` |

### Sortable Item Attributes

`x-bladewind::sortable.item` accepts a `value` attribute and a `class` attribute. The `value` (rendered as `data-id`) is the identifier reported when capturing the list order — see [Submitting & Saving the Order](#submitting--saving-the-order). The `class` attribute is for any additional CSS you wish to apply to the item (`<li>`) element. The handle icon shown inside an item is inherited from the parent `x-bladewind::sortable`'s `hasHandle` and `handleIcon` attributes — you don't set those on the item itself.

## Full Example

```blade
<x-bladewind::sortable
    name="ingredients"
    type="shared"
    group="kitchen"
    clone="false"
    sortable="true"
    hasHandle="true"
    handleIcon="bars-3"
    filter="locked"
    multidrag="false"
    swap="false"
    animation="200"
    inputName="ingredient_order"
    onSorted="saveOrder">
    <x-bladewind::sortable.item value="1">Tomatoes</x-bladewind::sortable.item>
    <x-bladewind::sortable.item value="2" class="locked">Onions</x-bladewind::sortable.item>
</x-bladewind::sortable>
```
