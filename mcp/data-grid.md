---
title: Data Grid Component
component: x-bladewind::data-grid
url: /component/data-grid
---

# Data Grid

Data Grid is a higher-level companion to [Table](/component/table): an accessible data grid with column sorting, searching, row selection, sticky headers, and both client-side and server-driven state, all built in rather than assembled by hand. It renders a native `<table>`, so every interaction (sorting, selecting, paging, searching) happens through real, independently keyboard-operable controls rather than a hand-rolled widget.

## Basic Usage

```blade
<x-bladewind::data-grid
    name="orders-grid"
    label="Orders"
    searchable="true"
    selectable="true"
    sortable="true"
    paginated="true"
    page-size="10"
    :columns="[
        ['key' => 'reference', 'label' => 'Reference', 'sortable' => true],
        ['key' => 'customer', 'label' => 'Customer', 'sortable' => true],
        ['key' => 'status', 'label' => 'Status', 'align' => 'center', 'format' => $statusPill],
        ['key' => 'total', 'label' => 'Total', 'align' => 'right', 'sortable' => true,
            'format' => fn ($value) => '$'.number_format($value / 100, 2)],
    ]"
    :rows="$orders" />
```

## Columns and Rows

Each column accepts `key`, `label`, `align`, `width`, `sortable`, `class`, and two callbacks: `format($value, $row)` for display, and `sort($value, $row)` for when the sortable value should differ from the displayed one. `rows` is an array of associative arrays or objects; a row's identity comes from `row-key`, which defaults to `id`.

### Shorthand Column Syntax

Pass a plain array of key strings instead of full column definitions, and the grid title-cases each key and swaps underscores for spaces to build the label. Shorthand columns skip the `format` and `sort` callbacks, so cells render the raw value, fine for text and status fields, but not for something like an unformatted amount in cents.

```blade
<x-bladewind::data-grid name="short-columns" label="Reviewers"
    :columns="['reference', 'customer', 'status']"
    :rows="$orders" />
```

Pass an associative array of `key => label` pairs instead when you only need to rename a column:

```blade
<x-bladewind::data-grid name="aliased-columns" label="Reviewers"
    :columns="['reference' => 'Order #', 'customer' => 'Placed By', 'status' => 'State']"
    :rows="$orders" />
```

### Formatting a Column

`format($value, $row)` receives the raw cell value and the full row, and its return value is rendered as raw HTML rather than escaped text, so it can return a styled badge, icon, or link:

```php
$statusColors = [
    'paid' => 'bg-emerald-100 text-emerald-700',
    'pending' => 'bg-amber-100 text-amber-700',
    'refunded' => 'bg-slate-200 text-slate-600',
];

$columns = [
    // ...
    [
        'key' => 'status',
        'label' => 'Status',
        'align' => 'center',
        'format' => function ($value) use ($statusColors) {
            $class = $statusColors[$value] ?? $statusColors['pending'];
            return '<span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium '.$class.'">'
                .ucfirst($value).'</span>';
        },
    ],
];
```

Because `format` output is not escaped, never feed it raw user input without sanitising first. Build the HTML around a trusted value, or run untrusted text through `e()` before it goes into the string.

### Custom Sort Values

Sorting compares the raw cell value by default, before `format` runs. That breaks down for a column whose sortable order should not match the raw or formatted value, e.g. a status that should sort by severity rather than alphabetically. Give the column its own `sort($value, $row)` callback to override the comparison value:

```blade
<x-bladewind::data-grid name="status-priority" label="Orders by priority" sortable="true"
    :columns="[
        ['key' => 'reference', 'label' => 'Reference'],
        ['key' => 'status', 'label' => 'Status', 'align' => 'center',
            'format' => $statusPill,
            'sort' => fn ($value) => ['refunded' => 0, 'pending' => 1, 'paid' => 2][$value] ?? 1],
    ]"
    :rows="$orders" />
```

### Row Identity

Every row needs a stable, unique key so selection, sorting, and pagination can track it across re-renders. The grid reads `id` off each row by default. Set `row-key` when your data's identifier is called something else.

```blade
<x-bladewind::data-grid name="by-reference" label="Orders" row-key="reference"
    :columns="$orderColumns" :rows="$orders" />
```

## Sorting

Set `sortable="true"` on the grid to make every column sortable, or set `sortable` per column. Clicking a header cycles none, ascending, descending, none again.

`client-sort` defaults to `true` and reorders rows in the browser. Set it to `false` for a server-driven grid: clicking a header only updates the arrow indicator and emits `bladewind:data-grid:sort-change`, leaving the actual reordering to the application.

### Sorting on Load

Pass `sort-key` and `sort-direction` to render the grid already sorted:

```blade
<x-bladewind::data-grid name="highest-value-first" label="Orders by value"
    sortable="true" sort-key="total" sort-direction="desc"
    :columns="$orderColumns" :rows="$orders" />
```

### Server-Driven Sorting

With `client-sort="false"`, clicking a sortable header does not touch the DOM. It fires a cancelable `before-sort-change` followed by `sort-change`, with the column key and new direction in the event detail:

```js
document.addEventListener('bladewind:data-grid:sort-change', (event) => {
    if (event.detail.name !== 'orders-grid') return;
    const { key, direction } = event.detail;
    setDataGridLoading('orders-grid', true);
    fetch(`/orders?sort=${key}&direction=${direction}`)
        .then((response) => response.text())
        .then((html) => {
            document.getElementById('orders-grid-wrapper').innerHTML = html;
        });
});
```

## Searching

`searchable="true"` renders a toolbar search field. `client-search` defaults to `true` and filters rows by their rendered cell text as you type. Customise the placeholder with `search-placeholder`.

```blade
<x-bladewind::data-grid name="orders-grid" searchable="true" search-placeholder="Search by reference or customer…"
    :columns="$orderColumns" :rows="$orders" />
```

### Server-Driven Searching

Set `client-search="false"` to filter server-side instead. The grid renders no filtering itself; it emits `bladewind:data-grid:search` with the current query on every keystroke, so debounce it yourself before hitting your backend:

```js
let searchTimer;
document.addEventListener('bladewind:data-grid:search', (event) => {
    if (event.detail.name !== 'orders-grid') return;
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => {
        setDataGridLoading('orders-grid', true);
        fetch(`/orders?q=${encodeURIComponent(event.detail.query)}`)
            .then((response) => response.text())
            .then((html) => {
                document.getElementById('orders-grid-wrapper').innerHTML = html;
            });
    }, 300);
});
```

## Row Selection

`selectable="true"` adds a selection column. `selection-mode` is `multiple` (checkboxes, with a tri-state select-all in the header, scoped to the current page or search results) or `single` (radio buttons). A selection bar appears above the grid once anything is selected, with a clear-selection control and an optional `bulk-actions` slot for custom buttons.

```blade
<x-bladewind::data-grid name="bulk-orders" label="Orders" selectable="true" selection-mode="multiple"
    paginated="true" page-size="8" :columns="$orderColumns" :rows="$orders" />
```

Use `selection-mode="single"` for pick-one flows, such as choosing a reviewer or a default address.

Pass `selected` with an array of row keys to render the grid with some rows already checked, useful for an edit form reopening with a saved selection:

```blade
<x-bladewind::data-grid name="preselected-orders" label="Orders" selectable="true"
    :selected="['3', '7', '12']"
    :columns="$orderColumns" :rows="$orders" />
```

The `bulk-actions` slot renders inside the selection bar, next to the clear-selection control, and only appears once at least one row is selected. Pair it with `dataGridSelectedKeys()` to read the current selection when a bulk action fires:

```blade
<x-bladewind::data-grid name="orders-with-actions" label="Orders" selectable="true"
    :columns="$orderColumns" :rows="$orders">
    <x-slot:bulk-actions>
        <x-bladewind::button size="small" onclick="alert('Exporting: ' + dataGridSelectedKeys('orders-with-actions').join(', '))">Export</x-bladewind::button>
        <x-bladewind::button size="small" type="red" onclick="alert('Deleting: ' + dataGridSelectedKeys('orders-with-actions').join(', '))">Delete</x-bladewind::button>
    </x-slot:bulk-actions>
</x-bladewind::data-grid>
```

## Pagination and Server-Driven State

Set `paginated="true"` with `page-size` for client-side pagination. The grid renders its own previous and next footer and keeps it in sync with sorting and searching.

Client pagination still ships every row to the browser and pages through them there, fine for a few hundred rows but the wrong tool once a dataset grows past what is reasonable to send on every page load.

Pass a real Laravel paginator through `paginator` instead of setting `paginated` directly; the grid detects it and switches into server mode automatically, rendering standard page links. `rows` should be the paginator's current-page items, not the full dataset:

```php
// in your controller or route closure
$staff = Staff::query()->orderBy('company_name')->paginate(8);
return view('staff.index', ['staff' => $staff]);
```

```blade
<x-bladewind::data-grid name="staff-directory" label="Staff directory" row-key="member_id"
    :columns="[
        ['key' => 'company_name', 'label' => 'Company', 'sortable' => true],
        ['key' => 'first_name', 'label' => 'Contact', 'format' => fn ($v, $row) => $row['first_name'].' '.$row['last_name']],
        ['key' => 'mobile', 'label' => 'Mobile'],
        ['key' => 'email', 'label' => 'Email'],
    ]"
    :rows="$staff->items()"
    :paginator="$staff" />
```

A grid built from a real paginator ignores `sortable` and `searchable` client-side behaviour, since the rows in the DOM are only ever one page's worth. Wire header clicks and the search field to your query string or an event listener instead, following the server-driven sorting and searching patterns above.

### Loading State

Set `loading="true"`, or call `setDataGridLoading(name, true)`, while an application fetches new rows for a server-driven grid. The table dims and shows a progress indicator, and screen readers see `aria-busy="true"`.

## Appearance

`striped`, `bordered`, and `dense` control visual density. `sticky` keeps the header pinned while the body scrolls, and defaults to `true`. Set `height` to cap the grid at a fixed height with an internal scrollbar rather than letting it grow with the row count.

```blade
<x-bladewind::data-grid name="striped-grid" label="Orders" striped="true" :columns="$orderColumns" :rows="$orders" />
<x-bladewind::data-grid name="bordered-grid" label="Orders" bordered="true" :columns="$orderColumns" :rows="$orders" />
<x-bladewind::data-grid name="sticky-grid" label="Orders" height="12rem" :columns="$orderColumns" :rows="$orders" />
<x-bladewind::data-grid name="dense-grid" label="Compact orders" striped="true" dense="true" height="14rem"
    :columns="$orderColumns" :rows="$orders" />
```

`sticky` only has something to do once the grid has a `height` short enough that rows actually scroll. Set `sticky="false"` to let the header scroll away with the rest of the content, useful if the grid already sits inside its own scroll container with a sticky header at a higher level.

## Toolbar

The `toolbar` slot renders next to the search field, for controls that apply to the grid as a whole rather than to a selection, e.g. an export button or a status filter.

```blade
<x-bladewind::data-grid name="orders-with-toolbar" label="Orders" searchable="true"
    :columns="$orderColumns" :rows="$orders">
    <x-slot:toolbar>
        <x-bladewind::button size="small" onclick="alert('Exporting all orders as CSV')">Export CSV</x-bladewind::button>
    </x-slot:toolbar>
</x-bladewind::data-grid>
```

## Custom Layout

Skip `columns` and `rows` entirely for a fully custom layout: a `header` slot for `<th>` content, and the default slot for hand-written `<tr>` rows. This is the escape hatch for a table body that does not fit the column model at all, e.g. merged cells or a summary row. A custom layout opts out of the grid's own sorting, searching, and pagination automation, since those work against the `columns` and `rows` the grid normalises internally; you are responsible for reimplementing any of that behaviour against your hand-written markup.

```blade
<x-bladewind::data-grid name="custom-orders" label="Orders summary">
    <x-slot:header>
        <th>Reference</th>
        <th>Customer</th>
        <th class="text-right">Total</th>
    </x-slot:header>

    <tr>
        <td>ORD-1041</td>
        <td>Kofi Addo</td>
        <td class="text-right">$84.00</td>
    </tr>
    <tr class="font-semibold">
        <td colspan="2">Total</td>
        <td class="text-right">$84.00</td>
    </tr>
</x-bladewind::data-grid>
```

## Events

Before events are cancelable. Call `preventDefault()` on the event to stop the related change, useful for confirming a destructive selection change or blocking a sort while a save is in flight. All event names start with `bladewind:data-grid:`.

| Event suffix | When it runs |
|---|---|
| `before-sort-change`, `sort-change` | Before and after a column's sort state changes. |
| `before-select-change`, `select-change` | Before and after row selection changes. Preventing the before event reverts the checkbox or radio. |
| `before-page-change`, `page-change` | Before and after the current client page changes. |
| `search` | On every keystroke in the search field, with the current query. |

```js
document.addEventListener('bladewind:data-grid:before-select-change', (event) => {
    if (event.detail.name !== 'orders-grid') return;
    if (event.detail.selecting && event.detail.row.status === 'refunded') {
        if (!confirm('This order was refunded. Select it anyway?')) {
            event.preventDefault();
        }
    }
});
```

## JavaScript API

Every helper returns `true` when it completes, or when the requested state already applies, and `false` when the target is missing or a cancelable event was prevented.

| Function | What it does |
|---|---|
| `sortDataGrid(name, key, direction)` | Sorts a client-mode grid by the given column, direction is `'asc'`, `'desc'`, or `null` to clear. |
| `setDataGridPage(name, page)` | Jumps to a page in a client-paginated grid. |
| `selectAllDataGridRows(name, selected)` | Selects or deselects every visible row, matching the header checkbox. |
| `clearDataGridSelection(name)` | Clears the current selection entirely. |
| `dataGridSelectedKeys(name)` | Returns an array of the currently selected row keys. |
| `setDataGridLoading(name, loading)` | Toggles the dimmed, busy loading state. |
| `resetDataGrid(name)` | Clears search, sort, selection, and returns to page one, all at once. |

```js
sortDataGrid('orders-grid', 'total', 'desc');
setDataGridPage('orders-grid', 2);
selectAllDataGridRows('orders-grid', true);
dataGridSelectedKeys('orders-grid'); // ['3', '7', '12']
clearDataGridSelection('orders-grid');
setDataGridLoading('orders-grid', true);
resetDataGrid('orders-grid');
```

## Using Data Grid Inside Livewire

Client-side sorting, searching, pagination, and row selection all live in the grid's own DOM, in attributes and checkbox state, rather than in Livewire's component state, so those interactions work fine on their own inside a Livewire component. What can catch you out is an unrelated re-render, one that happens for a reason that has nothing to do with the grid: because that state is not mirrored back to Livewire, such a re-render can reset the current page, sort order, or selection. If the grid lives inside a component that re-renders for other reasons, wrap it in `wire:ignore`. Alternatively, set `client-sort="false"` and `client-search="false"` and drive the grid from Livewire using the `before-*` and `*-change` events described above.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | Generated | Unique public helper and DOM scope. |
| label | Data grid | Accessible table name. |
| columns | [] | Column model. Omit with rows for a custom layout. |
| rows | null | Array of associative arrays or objects to render. |
| row-key | id | Field used as each row's unique identity. |
| selectable | false | Adds a selection column. |
| selection-mode | multiple | `multiple` (checkboxes) or `single` (radios). |
| selected | [] | Row keys to preselect. |
| sortable | false | Makes every column sortable. A column's own sortable key wins per column. |
| sort-key | null | Column key to render as initially sorted. |
| sort-direction | null | `asc` or `desc`, paired with sort-key. |
| client-sort | true | Reorders rows in the browser. When false, only the indicator updates and the app must reorder the data. |
| searchable | false | Renders the toolbar search field. |
| search-placeholder | Search… | Search field placeholder text. |
| client-search | true | Filters rows in the browser. When false, only the search event fires. |
| paginated | false | Enables client pagination. Implied automatically by passing paginator. |
| page-size | 25 | Rows per page in client pagination mode. |
| paginator | null | A Laravel paginator, for server-driven pagination. |
| sticky | true | Pins the header while the body scrolls. |
| loading | false | Dims the table and shows a progress indicator. |
| empty-text | No records found. | Text shown when there are no rows. |
| striped | false | Alternating row background. |
| bordered | false | Vertical cell borders. |
| dense | false | Reduced cell padding. |
| height | null | Max height for the scrollable body, e.g. `24rem`. |
| select-all-label | Select all rows | Accessible label for the header checkbox. |
| clear-selection-label | Clear selection | Label for the clear-selection control. |

## Slots

| Slot | Description |
|---|---|
| toolbar | Content appended after the search field. |
| bulk-actions | Custom buttons in the selection bar. |
| header | Custom `<th>` content, used instead of columns. |
| default | Custom `<tr>` rows, used instead of rows. |

## Full Example

```blade
<x-bladewind::data-grid name="complete-orders" label="Orders" row-key="reference"
    searchable="true" search-placeholder="Search orders…"
    selectable="true" selection-mode="multiple"
    sortable="true" striped="true"
    paginated="true" page-size="10"
    :columns="$orderColumns" :rows="$orders">
    <x-slot:toolbar>
        <x-bladewind::button size="small">Export CSV</x-bladewind::button>
    </x-slot:toolbar>
    <x-slot:bulk-actions>
        <x-bladewind::button size="small" type="red">Delete selected</x-bladewind::button>
    </x-slot:bulk-actions>
</x-bladewind::data-grid>
```
