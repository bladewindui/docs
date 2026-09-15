---
title: Kanban Component
component: x-bladewind::kanban
url: /component/kanban
---

# Kanban

`x-bladewind::kanban`, `x-bladewind::kanban.column` and `x-bladewind::kanban.card` build a board of columns holding draggable cards, the pattern behind any task tracker. A card can be dragged with the mouse or a touch screen between columns and within a column, or moved the same way with the keyboard: focus a card and use the arrow keys, up and down to reorder within a column, left and right to move it into the column beside it.

```blade
<x-bladewind::kanban>
    <x-bladewind::kanban.column title="To do" id="todo">
        <x-bladewind::kanban.card value="1">Design the onboarding flow</x-bladewind::kanban.card>
        <x-bladewind::kanban.card value="2">Write the API documentation</x-bladewind::kanban.card>
    </x-bladewind::kanban.column>
    <x-bladewind::kanban.column title="In progress" id="in-progress">
        <x-bladewind::kanban.card value="3">Build the payments webhook</x-bladewind::kanban.card>
    </x-bladewind::kanban.column>
    <x-bladewind::kanban.column title="Done" id="done">
        <x-bladewind::kanban.card value="4">Set up the staging environment</x-bladewind::kanban.card>
    </x-bladewind::kanban.column>
</x-bladewind::kanban>
```

## Reacting To A Move

Set `on_move` on the board to the name of a JavaScript function. It is called after every move, whether by drag or by keyboard, as `(cardId, fromColumnId, toColumnId, newIndex)`. Use it to save the new position with a request to your backend.

```blade
<x-bladewind::kanban on_move="saveCardPosition">
    ...
</x-bladewind::kanban>

<script>
    function saveCardPosition(cardId, fromColumnId, toColumnId, newIndex) {
        fetch('/tasks/' + cardId + '/move', {
            method: 'POST',
            body: JSON.stringify({ column: toColumnId, position: newIndex }),
        });
    }
</script>
```

## Empty State

A column with no cards shows a short message instead of a blank space. Customise it with `empty_text`.

```blade
<x-bladewind::kanban.column title="Backlog" id="backlog" empty_text="Nothing queued up yet">
</x-bladewind::kanban.column>
```

## Loading State

Set `loading="true"` on a column while its cards are still being fetched. It shows a spinner in place of the card list.

```blade
<x-bladewind::kanban.column title="Review" id="review" loading="true">
</x-bladewind::kanban.column>
```

## Column Actions

Give a column an `actions` slot for a control shown beside its title, such as an add-card button.

```blade
<x-bladewind::kanban.column title="To do" id="todo">
    <x-slot:actions>
        <button type="button">
            <x-bladewind::icon name="plus" />
        </button>
    </x-slot:actions>
    <x-bladewind::kanban.card value="1">Design the onboarding flow</x-bladewind::kanban.card>
</x-bladewind::kanban.column>
```

## Attributes

### Kanban

| Attribute | Default | Description |
|---|---|---|
| animation | 150 | Animation speed in milliseconds when a card is dropped. 0 disables it. |
| on_move | _blank_ | Name of a JavaScript function called after every move as `(cardId, fromColumnId, toColumnId, newIndex)`. |
| class | _blank_ | Additional CSS classes for the board's wrapper element. |

### Column

| Attribute | Default | Description |
|---|---|---|
| title | _blank_ | The column's heading. |
| id | a slug of the title | Identifier reported to the move hook. Set it explicitly when the title alone is not a stable, unique key. |
| loading | false | Hides the card list and shows a spinner instead. `true` \| `false` |
| empty_text | No cards | Shown in place of the list when it has no cards and is not loading. |
| actions | _none_ | A named slot rendered beside the title. |
| class | _blank_ | Additional CSS classes for the column. |

### Card

| Attribute | Default | Description |
|---|---|---|
| value | _blank_ | Identifier reported to the move hook, for example a model id. |
| class | _blank_ | Additional CSS classes for the card. |
