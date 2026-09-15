---
title: Table Component
component: x-bladewind::table
url: /component/table
---

# Table

Displays tabular data. A BladewindUI table consists of two parts: the table header (a `header` slot) and the table body (regular `<tr>`/`<td>` markup, or dynamic data via the `data` attribute).

The table component requires its corresponding JavaScript file. Publish it with `php artisan vendor:publish --tag=bladewind-public`; it lands at `public/vendor/bladewind/js/table.js`.

## Basic Usage

```blade
<x-bladewind::table>
    <x-slot name="header">
        <th>Name</th>
        <th>Department</th>
        <th>Email</th>
    </x-slot>
    <tr>
        <td>Alfred Rowe</td>
        <td>Outsourcing</td>
        <td>alfred@therowe.com</td>
    </tr>
    <tr>
        <td>Michael K. Ocansey</td>
        <td>Tech</td>
        <td>kabutey@gmail.com</td>
    </tr>
</x-bladewind::table>
```

By default no border is drawn around the table. Set `has_border="true"` to add one.

## No Gaps

Rows display with wide gaps by default, and a hover effect highlights each row's left and right borders. Both can be adjusted. Set `divider="thin"` to remove the wide gaps between rows.

```blade
<x-bladewind::table divider="thin">
    ...
</x-bladewind::table>
```

## No Divider

Set `divided="false"` to turn off divider lines completely.

```blade
<x-bladewind::table divided="false">
    ...
</x-bladewind::table>
```

## No Hover Effect

Set `has_hover="false"` to remove the border highlight effect on row hover.

```blade
<x-bladewind::table has_hover="false" divider="thin">
    ...
</x-bladewind::table>
```

## Compact

Set `compact="true"` to tighten row spacing.

```blade
<x-bladewind::table compact="true" divider="thin">
    ...
</x-bladewind::table>
```

## Striped Table

Set `striped="true"` to give the table striped rows.

```blade
<x-bladewind::table striped="true" divider="thin">
    ...
</x-bladewind::table>
```

## Celled Table

Set `celled="true"` to give every cell all-round borders, like an Excel spreadsheet.

```blade
<x-bladewind::table celled="true" divider="thin">
    ...
</x-bladewind::table>
```

## Cells for Totals

Apply the `double-underline` class to a `<td>` to double-underline a total value.

```blade
<tr>
    <td colspan="2" class="text-right"></td>
    <td class="double-underline text-right">
        7,300.00
    </td>
</tr>
```

## Table With Drop Shadow

Set `has_shadow="true"` for a subtle drop shadow.

```blade
<x-bladewind::table has_shadow="true" striped="true" divider="thin">
    ...
</x-bladewind::table>
```

## Selectable Rows

Set `selectable="true"` to let users click rows to select them. Clicking a row toggles its selection; clicking an already-selected row deselects it. The cursor becomes `cursor-pointer`. Ctrl+Click / Shift+Click shortcuts are not supported.

```blade
<x-bladewind::table selectable="true" divider="thin">
    <x-slot name="header">
        <th>Item</th>
        <th>Quantity</th>
        <th>Unit Price (GHS)</th>
    </x-slot>
    <tr>
        <td>Office furniture</td>
        <td class="text-center">2</td>
        <td class="text-right">4,300.00</td>
    </tr>
    ...
</x-bladewind::table>
```

### Checkable

Set `checkable="true"` (with `selectable="true"`) to add a checkbox as the first column of every row. If a heading exists, a master checkbox is also injected in the header's first column — checking or unchecking it toggles every row; it shows a partial-selected state when only some rows are checked.

To read the selected rows, give each `<tr>` a unique `data-id="your-uuid-value"` and give the table a `name`. That name becomes the name of a hidden input holding a comma-separated list of selected row IDs.

```blade
<x-bladewind::table selectable="true" checkable="true" divider="thin"
    name="office_supplies">
    <x-slot name="header">
        <th>Item</th>
        <th>Quantity</th>
        <th>Unit Price (GHS)</th>
    </x-slot>
    <tr data-id="1">
        <td>Office furniture</td>
        <td class="text-center">2</td>
        <td class="text-right">4,300.00</td>
    </tr>
    ...
</x-bladewind::table>
```

This renders a hidden `<input type="hidden" name="office_supplies" class="office_supplies" />` right after the table. Access it via JavaScript or on form submission:

```js
// domEl(), domEls() and hide() are BladewindUI helper functions
deleteRows = () => {
    const selectedRows = domEl('input.office_supplies').value.split(',');
    const tableRows = domEls('table.office_supplies tr');
    tableRows.forEach(row => {
        if (selectedRows.indexOf(row.getAttribute('data-id')) !== -1) {
            hide(row, true);
            hide('.office-supplies-actions');
            domEl('input.office_supplies').value = '';
        }
    });
}
```

To preselect rows on load (e.g. edit mode), set `selected_value` to a comma-separated list of row IDs.

```blade
<x-bladewind::table selectable="true" divider="thin"
    checkable="true"
    selected_value="2,4,19,23"
    name="office_supplies">
    ...
</x-bladewind::table>
```

## Display a Table From Dynamic Data

Rather than manually building rows, pass an array to the `data` attribute (as a bound array with `:data`, or JSON-encoded as `data`). The component builds table headings from the array keys.

```php
$staff = [
    [ 'id' => 1, 'first_name' => 'Michael', 'last_name' => 'Ocansey', 'department' => 'Engineering', 'marital_status' => 1 ],
    [ 'id' => 2, 'first_name' => 'Alfred',  'last_name' => 'Rowe',    'department' => 'Engineering', 'marital_status' => 1 ],
    [ 'id' => 3, 'first_name' => 'Abigail', 'last_name' => 'Edwin',   'department' => 'Engineering', 'marital_status' => 0 ],
];
```

```blade
<x-bladewind::table :data="$staff" />
```

Or with JSON-encoded data:

```blade
<x-bladewind::table data="{{ json_encode($staff) }}" />
```

All standard table attributes (hover, gaps, striped, etc.) apply to dynamic tables too.

### Excluding and Including Columns

Column headings are derived from array keys, with underscores turned into spaces (`first_name` becomes `first name`). Use `exclude_columns` to hide specific columns, or `include_columns` to specify only the columns to display. `include_columns` takes precedence — if both are set, `exclude_columns` is ignored.

These two attributes subtract from the columns the table works out from the array keys. If you'd rather declare columns up front with alignment, width, and formatting, see [Defining Columns](#columns) — the two approaches are alternatives, not to be combined.

```blade
<x-bladewind::table
    exclude_columns="id, marital_status"
    :data="$staff" />
```

### Displaying Action Icons

Pass a `:action_icons` array to show action icons on each row. Each entry can define `icon`, `icon_type` (`outline` default or `solid`), `color` (defaults to the [secondary button](/component/button#secondary) colour), `button_outline`, a `tip` tooltip, and a `click` action.

```php
$action_icons = [
    [
        'icon'  => 'chat-bubble-bottom-center-text',
        'tip'   => 'send message',
        'color' => 'green',
        'icon_type' => 'solid', // default is outline
        'button_outline' => false,
        'click' => "sendMessage('{first_name}')",
    ],
    [
        'icon'  => 'pencil-square',
        'click' => "redirect('/user/{id}')",
    ],
    [
        'icon'  => 'trash',
        'color' => 'red',
        'click' => "deleteUser({id}, '{first_name}')",
    ],
];
```

```blade
<x-bladewind::table
    exclude_columns="id, marital_status"
    divider="thin"
    :action_icons="$action_icons"
    :data="$staff" />
```

The `click` value calls a JavaScript function of that name, substituting any `{key}` placeholder with the row's value for that array key (wrap string placeholders in single quotes).

Note: passing `action_icons` as pipe-separated strings (e.g. `"icon:chat | tip:send message | click:..."`) is deprecated as of v4.0.0 — use the array form shown above.

## Passing Custom Functions onClick

Set `onclick` on the table to trigger a JavaScript function when a user clicks anywhere on a row — useful for navigating to a profile page or opening a modal. Any array key can be passed as a `{key}` placeholder.

```blade
<x-bladewind::table :data="$staff"
    onclick="goToProfile('/user/profile', '{first_name}', '{last_name}')" />
```

```js
goToProfile = (url, firstname, lastname) => {
    alert(`You clicked on ${firstname} ${lastname}. Redirecting to ${url}`);
}
```

Rows with a custom click function get `cursor-pointer`. To prevent accidental triggering, the action icons cell does not inherit the row's click function.

### No Data Returned

When dynamic data (from an API or database) returns no records, set `no_data_message` to display a custom message.

```blade
<x-bladewind::table
    no_data_message="The staff directory is empty"
    :data="$staff" />
```

Because column headings are derived from the array's keys, an empty array means no headings are shown alongside the message. Pass `:column_aliases` to still display headings.

```blade
<x-bladewind::table
    has_border="true"
    no_data_message="The staff directory is empty"
    :column_aliases="$column_aliases"
    :data="$staff" />
```

The message can also be rendered using the [Empty State](/component/empty-state) component by setting `message_as_empty_state="true"`. All Empty State attributes are supported except `message` (use `no_data_message` instead) and `class` (the table already uses its own).

```blade
<x-bladewind::table
    :data="$no_staff"
    has_border="true"
    :column_aliases="$column_aliases"
    no_data_message="The staff directory is empty"
    message_as_empty_state="true"
    button_label="add staff member" />
```

### Searchable Table Data

Set `searchable="true"` to place a search field above the table that searches any column. Customize its placeholder with `search_placeholder`. Non-dynamic tables can also be made searchable.

```blade
<x-bladewind::table
    searchable="true"
    :data="$staff"
    divider="thin"
    search_placeholder="Find staff members by name..."
    :action_icons="$action_icons"
    exclude_columns="id, marital_status" />
```

To place the search bar somewhere other than directly above the table (e.g. alongside a filter or date range component), set `search_container` to the id or class name of the target element. The search bar renders transparent so it fits any background.

```blade
<div class="put-search-here"></div>
<x-bladewind::table
    searchable="true"
    :data="$staff"
    divider="thin"
    search_container="put-search-here"
    search_placeholder="Find staff members by name..."
    :action_icons="$action_icons"
    exclude_columns="id, marital_status" />
```

### Aliasing Column Names

Set `:column_aliases` to a keyed array mapping array keys to friendlier column headings.

```php
$column_aliases = [
    'id' => 'ref #',
    'marital_status' => 'married?'
];
```

```blade
<x-bladewind::table
    exclude_columns="id"
    divider="thin"
    :action_icons="$action_icons"
    :column_aliases="$column_aliases"
    :data="$staff" />
```

`selectable="true"` and `checkable="true"` also work on dynamic tables — each row's `data-id` is set automatically from the `id` value in the data array.

### Grouping Rows

Set `groupby` to any key present in your array to group rows under a heading for each distinct value (e.g. group employees by department).

```blade
<x-bladewind::table
    exclude_columns="last_name"
    divider="thin"
    groupby="department"
    :data="$staff" />
```

## Sorting

Set `sortable="true"` on a dynamic table to make every column clickable for sorting; each sortable column shows a filter icon next to its heading.

```blade
<x-bladewind::table
    exclude_columns="member_id, email"
    sortable="true"
    limit="5"
    :data="$users" />
```

To restrict sorting to specific columns, set `sortable_columns` to a comma-separated list of keys.

```blade
<x-bladewind::table
    exclude_columns="member_id, email"
    sortable="true"
    limit="5"
    sortable_columns="first_name, last_name"
    :data="$users" />
```

## Pagination

Set `paginated="true"` on a dynamic table to display pagination controls at the end of the table. Multiple tables on the same page can each be paginated independently. `page_size` sets rows per page (default 25).

```blade
<x-bladewind::table
    exclude_columns="member_id, email"
    paginated="true"
    page_size="5"
    show_row_numbers="true"
    :data="$users" />
```

Set `show_row_numbers="true"` to display row numbers (off by default). Note: row numbers are not reordered to match sorted data — when combined with `sortable="true"`, numbers may appear out of sequence. Also, searching or sorting a paginated table only applies to the current page, not the entire dataset.

Set `default_page` to load a page other than 1 (e.g. jumping to a bookmarked record). If the value exceeds `total_pages`, it falls back to 1.

```blade
<x-bladewind::table
    exclude_columns="member_id, email"
    paginated="true"
    page_size="5"
    show_row_numbers="true"
    default_page="15"
    :data="$users" />
```

### Custom Table Layouts

Pagination is automatic for dynamic data with the default flat layout (every array key becomes a column). For a custom layout that merges columns while keeping pagination, set `paginated="true"`, `layout="custom"`, and pass `:data`, but build the rows yourself, including the pagination component manually.

```blade
<x-bladewind::table
    layout="custom"
    :paginated="true"
    :page_size="$page_size = 5"
    :data="$users"
    :default_page="$default_page = 6">

    <x-slot:header>
        <th>Member ID</th>
        <th>User Details</th>
        <th>Contact Details</th>
    </x-slot:header>

    <tbody>
        @foreach($users as $user)
            @php
                $image = ($loop->even) ? 'male.png' : 'female.png';
            @endphp
            <tr {{ pagination_row($loop->iteration, $page_size, $default_page) }}>
                <td class="!w-1 !pr-0"><div class="pt-3">{{ $user['member_id'] }}</div></td>
                <td>
                    <div class="flex space-x-3">
                        <div><x-bladewind::avatar image="/assets/images/{{ $image }}" size="small" /></div>
                        <div>
                            <div class="text-base font-semibold">{{ $user['first_name'] }} {{ $user['last_name'] }}</div>
                            <div>{{ $user['company_name'] }}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div>{{ $user['mobile'] }}</div>
                    <div><a href="#">{{ $user['email'] }}</a></div>
                </td>
            </tr>
        @endforeach
    </tbody>
</x-bladewind::table>
```

The pagination widget relies on `data-id` and `data-page` attributes on each row. A row not on the `default_page` gets `class="hidden"`. The `pagination_row($row_number, $page_size, $default_page)` helper function generates these attributes for you — `$row_number` starts at 1 (typically `$loop->iteration`), `$page_size` is rows per page, and `$default_page` is the page selected by default.

## Paginating a Laravel Query

Client-side pagination (above) shows and hides rows already in the DOM — it can't work against a `LengthAwarePaginator`. Instead, hand a paginator to the standalone pagination component and it switches to server mode, rendering real links.

```php
// in your controller
$orders = Order::latest()->paginate(request('per_page', 15));
```

```blade
<x-bladewind::pagination :paginator="$orders" :per_page_options="[15, 30, 50]" />
```

This renders three controls: a "showing x to y of z" summary, an optional per-page selector, and windowed page numbers with the first and last page always reachable (an ellipsis fills the gap). Changing the per-page selector returns to page 1. A `simplePaginate()` result only gets previous/next controls, with no numbers or summary, since it doesn't know the total.

### Laravel Pagination Attributes

| Attribute | Default | Description |
|---|---|---|
| paginator | *null* | A Laravel paginator. Passing one switches the component to server mode. Works with `paginate()` and `simplePaginate()`. |
| per_page_options | *empty* | Page sizes offered in a per-page selector, e.g. `[15, 30, 50]`. Leave empty to hide the selector. |
| per_page_name | per_page | The query string parameter the per-page selector writes to. |
| on_each_side | 1 | How many page numbers to show either side of the current one. First and last are always shown. |

## Pagination Styles

Three pagination styles are available via `pagination_style`: `arrows` (default), `dropdown`, and `numbers`.

For the `arrows` style, the current page number displays by default; set `show_total_pages="true"` to show it as a fraction, e.g. `3/20`.

The totals label ("Showing 1 to 5 of 222 records") can be hidden with `show_total="false"` (shown by default). Customize its text with `total_label`, using placeholders `:a` (starting row of current page), `:b` (ending row), and `:c` (total records).

```blade
<x-bladewind::table
    exclude_columns="member_id, email"
    paginated="true"
    page_size="5"
    total_label="Records :a - :b"
    show_row_numbers="true"
    pagination_style="arrows"
    :data="$users"
    show_total_pages="true"/>
```

```blade
<x-bladewind::table ... pagination_style="dropdown" />
<x-bladewind::table ... pagination_style="numbers" />
```

## Defining Columns

Pass `:columns` to give the table a column model, so alignment, width, sorting, and formatting live on the column definition instead of being applied per cell. The `header` and body slots remain available as an escape hatch, and existing tables are unaffected.

```blade
<x-bladewind::table :columns="[
        ['key' => 'when',   'label' => 'When',   'width' => '160px'],
        ['key' => 'amount', 'label' => 'Amount', 'align' => 'right', 'sortable' => true],
    ]" :rows="$rows">
    <x-slot:empty>No transactions yet</x-slot:empty>
</x-bladewind::table>
```

`exclude_columns` and `include_columns` do not apply with `:columns` and are silently ignored — a column appears only because you listed it; drop one by removing it from the array.

### Column Keys

| Key | Purpose |
|---|---|
| key | The array key to read from each row. Required. |
| label | Heading text. Defaults to the key with underscores turned into spaces. |
| align | `left` \| `center` \| `right`. Applied to the heading and every cell in the column. |
| width | Any CSS width, applied to the heading as an inline style. |
| sortable | Makes the column sortable and turns on sorting for the table. |
| format | A callable receiving `($value, $row)` and returning what to render. |
| class | Extra classes for the heading and the column's cells. |

### Shorthands

Most columns need none of the options above, so two shorter forms are accepted:

```blade
{{-- keys only; labels are derived --}}
<x-bladewind::table :columns="['when', 'amount']" :rows="$rows" />

{{-- key => label --}}
<x-bladewind::table :columns="['when' => 'Date placed', 'amount' => 'Total']" :rows="$rows" />
```

### Formatting a Column

`format` receives the whole row as well as the value, so a column can render something the row doesn't literally contain.

```php
$columns = [
    ['key' => 'amount', 'align' => 'right',
     'format' => fn ($value) => 'GHS ' . number_format($value, 2)],

    ['key' => 'first_name', 'label' => 'Name',
     'format' => fn ($value, $row) => $value . ' ' . $row['last_name']],
];
```

A key missing from a row renders an empty cell rather than failing.

### The Empty Slot

When `rows` is empty, the `empty` slot renders in place of the body, spanning the full width of the table including row-number and actions columns. Without the slot, the usual `no_data_message` or empty state is used instead.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | 'tbl-'.uniqid() | Name of the table. Useful for targeting via JavaScript; added to the table's `class` attribute. |
| striped | false | Whether table rows are striped (even rows get the stripe). Pass as a string, not boolean. `true` \| `false` |
| divided | true | Whether rows show divider lines. Pass as a string, not boolean. `true` \| `false` |
| divider | regular | How wide the gaps between table rows are. `regular` \| `thin` |
| has_hover | false | Whether row borders light up on hover. Pass as a string, not boolean. `true` \| `false` |
| has_shadow | true | Whether the table has a drop shadow. Pass as a string, not boolean. `true` \| `false` |
| compact | false | Reduces spacing between rows. `true` \| `false` |
| header *(slot)* | *blank* | Slot holding the table header content. |
| uppercasing | true | Whether table headings are all uppercase. `true` \| `false` |
| :data | null | Array of elements to generate the table from. Ignore if using `data` instead. |
| data | null | JSON-encoded array of elements to generate the table from. Ignore if using `:data` instead. |
| layout | auto | Whether the component automatically builds the table or you build it manually. `auto` \| `custom` |
| exclude_columns | null | Comma-separated list of columns to exclude when generating the table from array keys. |
| include_columns | null | Comma-separated list of columns to include; overrides `exclude_columns` and becomes the only columns used. |
| :action_icons | null | Array of icon actions displayed on each row (dynamic data only). Can also be passed as `action_icons` JSON-encoded. |
| actions_title | actions | Heading of the actions column. |
| :column_aliases | [] | Array mapping data keys to display names. Can also be passed as `column_aliases` JSON-encoded. |
| searchable | false | Whether a search input is placed above the table. `true` \| `false` |
| search_placeholder | Search table below... | Placeholder text for the search input (with `searchable="true"`). |
| search_container | *blank* | Id or class name of an element to render the search bar into, instead of directly above the table. |
| no_data_message | No records to display | Message shown when there is no dynamic data. |
| message_as_empty_state | false | Whether the no-data message renders as an Empty State component. `true` \| `false` |
| image | empty-state.svg | Image shown in the empty state component when no dynamic data is available. |
| heading | *blank* | Heading text in the empty state when no data is available. |
| button_label | *blank* | Label for the empty state's call-to-action button. |
| celled | false | Displays each cell with all-round borders. `true` \| `false` |
| show_image | true | Whether the empty state's image is shown. `true` \| `false` |
| transparent | false | Removes all background colours so the table sits on any dark-mode background. `true` \| `false` |
| onclick | *blank* | Action for the empty state's call-to-action button (dynamic data only). |
| groupby | *blank* | Array key to group rows by. Dynamic tables only. |
| selected_value | null | Comma-separated list of row IDs to select on render. |
| show_row_numbers | false | Shows each row's number as the first column. `true` \| `false` |
| sortable | false | Whether the table is sortable. `true` \| `false` |
| sortable_columns | [] | Comma-separated list of columns clickable for sorting, when you don't want all of them sortable. |
| paginated | false | Whether the table is paginated. `true` \| `false` |
| pagination_style | arrows | How pagination controls are displayed. `arrows` \| `dropdown` \| `numbers` |
| page_size | 25 | Rows displayed per page. |
| show_total | true | Whether the pagination total label is displayed. `true` \| `false` |
| show_page_number | true | With `pagination_style="arrows"`, whether the current page number shows between the prev/next buttons. `true` \| `false` |
| show_total_pages | false | Displays the page number as currentPage/totalPages (e.g. 3/20) instead of just the current page. `true` \| `false` |
| default_page | 1 | Default selected page when `paginated="true"`. |
| limit | null | Total rows to display, capping a larger dataset, e.g. `limit="20"`. |
| total_label | Showing :a to :b of :c records | Format for the pagination total label. Placeholders: `:a` start row, `:b` end row, `:c` total records. |
| nonce | null | CSP nonce for inline scripts. Can be set globally via `config/bladewind.php` under the `script` key. |
| columns | *empty* | Column model: an array of column definitions or one of the two shorthands. Keys: `key, label, align, width, sortable, format, class`. |
| rows | *null* | Rows to render against `columns`. An alias for `data`. |
| empty *(slot)* | *null* | Rendered in place of the table body when there are no rows. Falls back to `no_data_message`. |

## Full Example

```blade
<x-bladewind::table
    striped="true"
    divided="true"
    divider="thin"
    has_shadow="true"
    has_border="true"
    compact="true"
    transparent="true"
    searchable="false"
    search_placeholder=""
    name="staff-table"
    :data="$data"
    :column_aliases="$column_aliases"
    include_columns="first_name, last_name, email"
    exclude_columns="id,picture"
    :action_icons="$action_icons"
    actions_title=""
    no_data_message="The staff directory is empty"
    message_as_empty_state="true"
    button_label="add staff member"
    image="asset('images/no-data.png')"
    heading="No Staff"
    groupby="department"
    selected_value="2,3,4"
    onclick="alert('add a staff')"
    sortable="false"
    paginated="false"
    pagination_style="arrows"
    page_size="25"
    show_row_numbers="false"
    show_page_number="false"
    show_total="true"
    limit="40"
    layout="custom"
    total_label="Showing :a to :b of :c records"
    has_hover="true">

    <x-slot name="header">
        ...
    </x-slot>

    <tr>
    ...
    </tr>

</x-bladewind::table>
```
