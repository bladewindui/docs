---
title: Table Component
component: x-bladewind::table
url: /component/table
---

# Table

Display tabular data. Supports both manually built tables and dynamic tables driven by an array. Dynamic tables support sorting, pagination, searching, grouping, action icons, and custom row clicks.

## Basic Usage

```blade
<x-bladewind::table>
    <x-slot name="header">
        <th>Name</th>
        <th>Department</th>
        <th>Email</th>
    </x-slot>
    <tr>
        <td>Michael Ocansey</td>
        <td>Engineering</td>
        <td>mike@bladewindui.com</td>
    </tr>
</x-bladewind::table>
```

## Styling Options

```blade
{{-- no gaps between rows --}}
<x-bladewind::table has_border="true">...</x-bladewind::table>

{{-- remove row dividers --}}
<x-bladewind::table divided="false">...</x-bladewind::table>

{{-- thin dividers --}}
<x-bladewind::table divider="thin">...</x-bladewind::table>

{{-- no hover effect --}}
<x-bladewind::table has_hover="false">...</x-bladewind::table>

{{-- compact padding --}}
<x-bladewind::table compact="true">...</x-bladewind::table>

{{-- striped rows --}}
<x-bladewind::table striped="true">...</x-bladewind::table>

{{-- celled (borders on all sides, like Excel) --}}
<x-bladewind::table celled="true">...</x-bladewind::table>

{{-- drop shadow --}}
<x-bladewind::table has_shadow="true">...</x-bladewind::table>
```

## Totals Row (Double Underline)

Wrap a totals `<tr>` in `<tfoot>` or add `class="double-underline"` to the cell above totals:

```blade
<x-bladewind::table>
    <x-slot name="header">
        <th>Item</th><th>Amount</th>
    </x-slot>
    <tr><td>Bags</td><td>$150.00</td></tr>
    <tr><td>Shoes</td><td>$350.00</td></tr>
    <tr>
        <td class="double-underline">Total</td>
        <td class="double-underline">$500.00</td>
    </tr>
</x-bladewind::table>
```

## Selectable Rows

```blade
<x-bladewind::table name="office_supplies" selectable="true">
    <x-slot name="header"><th>Item</th><th>Qty</th></x-slot>
    <tr data-id="1"><td>Stapler</td><td>3</td></tr>
    <tr data-id="2"><td>Marker</td><td>6</td></tr>
</x-bladewind::table>
```

Selected row IDs are stored in a hidden input with the table's `name`. Access via JavaScript: `domEl('input.office_supplies').value` returns a comma-separated list of selected `data-id` values.

## Checkable Rows

```blade
<x-bladewind::table name="office_supplies" checkable="true">
    <x-slot name="header"><th>Item</th><th>Qty</th></x-slot>
    <tr data-id="1" data-name="Stapler"><td>Stapler</td><td>3</td></tr>
    <tr data-id="2" data-name="Marker"><td>Marker</td><td>6</td></tr>
</x-bladewind::table>
```

## Dynamic Data

Pass a PHP array via `:data`. Column headings are automatically generated from array keys. Underscores in keys are replaced with spaces.

```blade
<x-bladewind::table :data="$staff" />

{{-- or pass as JSON string --}}
<x-bladewind::table data="{{ json_encode($staff) }}" />
```

### Excluding and Including Columns

```blade
<x-bladewind::table :data="$staff" exclude_columns="id, marital_status" />

{{-- include_columns takes precedence over exclude_columns --}}
<x-bladewind::table :data="$staff" include_columns="first_name, last_name, department" />
```

### Column Aliases

```php
$column_aliases = [
    'id' => 'ref #',
    'marital_status' => 'married?'
];
```

```blade
<x-bladewind::table :data="$staff" :column_aliases="$column_aliases" />
```

### Action Icons

Pass an array of icon definitions. Each icon can have `icon`, `tip`, `color`, `icon_type`, `button_outline`, and `click`. In `click`, use `{key}` placeholders that are replaced with row values.

```php
$action_icons = [
    [
        'icon'  => 'chat-bubble-bottom-center-text',
        'tip'   => 'send message',
        'color' => 'green',
        'icon_type' => 'solid',
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
    :data="$staff"
    divider="thin"
    :action_icons="$action_icons"
    exclude_columns="id, marital_status" />
```

### Row Click Handler

```blade
<x-bladewind::table
    :data="$staff"
    onclick="goToProfile('/user/profile', '{first_name}', '{last_name}')" />
```

Rows with click handlers get `cursor-pointer`. The action icon cell does not inherit the row click.

### No Data Message

```blade
<x-bladewind::table :data="$staff" no_data_message="The staff directory is empty" />

{{-- with column headings visible when empty --}}
<x-bladewind::table
    :data="$no_staff"
    :column_aliases="$column_aliases"
    no_data_message="The staff directory is empty" />

{{-- display as empty state component --}}
<x-bladewind::table
    :data="$no_staff"
    no_data_message="The staff directory is empty"
    message_as_empty_state="true"
    button_label="add staff member" />
```

### Searchable

```blade
<x-bladewind::table
    :data="$staff"
    searchable="true"
    search_placeholder="Find staff members by name..." />
```

Place the search bar in a custom container:

```blade
<div class="flex space-x-4 items-center bg-gray-100 px-3 rounded-lg">
    <div class="put-search-here grow border bg-white rounded-md"></div>
    <x-bladewind::datepicker range="true" />
    <x-bladewind::button>Filter</x-bladewind::button>
</div>

<x-bladewind::table
    :data="$staff"
    searchable="true"
    search_container="put-search-here" />
```

### Grouping Rows

```blade
<x-bladewind::table :data="$staff" groupby="department" />
```

### Sorting

```blade
<x-bladewind::table :data="$staff" sortable="true" />

{{-- restrict sortable columns --}}
<x-bladewind::table
    :data="$staff"
    sortable="true"
    sortable_columns="first_name, last_name" />
```

### Pagination

```blade
<x-bladewind::table
    :data="$staff"
    paginated="true"
    page_size="25"
    show_row_numbers="true"
    default_page="1" />
```

Pagination styles: `arrows` (default), `dropdown`, `numbers`.

```blade
<x-bladewind::table
    :data="$staff"
    paginated="true"
    pagination_style="numbers"
    show_total="true"
    total_label="Showing :a to :b of :c records" />
```

Placeholders in `total_label`: `:a` = start row, `:b` = end row, `:c` = total records.

### Custom Layout (Pagination with Manual Rows)

```blade
<x-bladewind::table
    layout="custom"
    :paginated="true"
    :page_size="$page_size = 5"
    :data="$users"
    :default_page="$default_page = 1">

    <x-slot:header>
        <th>ID</th>
        <th>User Details</th>
        <th>Contact Details</th>
    </x-slot:header>

    <tbody>
        @foreach($users as $user)
            <tr {{ pagination_row($loop->iteration, $page_size, $default_page) }}>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['first_name'] }} {{ $user['last_name'] }}</td>
                <td>{{ $user['email'] }}</td>
            </tr>
        @endforeach
    </tbody>
</x-bladewind::table>
```

`pagination_row($row_number, $page_size, $default_page)` generates the `data-id`, `data-page`, and `class="hidden"` attributes needed by the pagination widget.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | random | Table name added to `class` for JS targeting |
| striped | false | Stripe even rows. `true` \| `false` |
| divided | true | Show row divider lines. `true` \| `false` |
| divider | regular | Divider gap size. `regular` \| `thin` |
| has_hover | false | Highlight rows on hover. `true` \| `false` |
| has_shadow | true | Drop shadow. `true` \| `false` |
| has_border | false | Outer border. `true` \| `false` |
| compact | false | Reduce row padding. `true` \| `false` |
| celled | false | Cell borders on all sides. `true` \| `false` |
| transparent | false | Remove background colours. `true` \| `false` |
| uppercasing | true | Uppercase column headings. `true` \| `false` |
| header | _(slot)_ | Slot for `<th>` column headings |
| :data | null | PHP array for dynamic table generation |
| data | null | JSON-encoded array for dynamic table generation |
| layout | auto | Table layout mode. `auto` \| `custom` |
| exclude_columns | null | Comma-separated column keys to exclude |
| include_columns | null | Comma-separated column keys to include (overrides `exclude_columns`) |
| :action_icons | null | Array of action icon definitions per row |
| actions_title | actions | Heading for the action icons column |
| :column_aliases | [] | Array mapping array keys to display names |
| onclick | _(blank)_ | JS function to call on row click (dynamic tables) |
| groupby | _(blank)_ | Array key to group rows by |
| searchable | false | Add a search field above the table. `true` \| `false` |
| search_placeholder | Search table below... | Placeholder for the search input |
| search_container | _(blank)_ | CSS class/id of element to render the search bar into |
| no_data_message | No records to display | Message when no dynamic data exists |
| message_as_empty_state | false | Show no-data message as Empty State component. `true` \| `false` |
| image | empty-state.svg | Image for empty state |
| heading | _(blank)_ | Heading for empty state |
| button_label | _(blank)_ | Empty state call-to-action button label |
| show_image | true | Show empty state image. `true` \| `false` |
| selected_value | null | Comma-separated row IDs to pre-select |
| selectable | false | Enable row selection. `true` \| `false` |
| checkable | false | Enable row checkboxes. `true` \| `false` |
| sortable | false | Enable column sorting. `true` \| `false` |
| sortable_columns | [] | Comma-separated columns to make sortable |
| paginated | false | Enable pagination. `true` \| `false` |
| pagination_style | arrows | Pagination controls style. `arrows` \| `dropdown` \| `numbers` |
| page_size | 25 | Rows per page |
| default_page | 1 | Initial page to display |
| show_row_numbers | false | Show row numbers as first column. `true` \| `false` |
| show_total | true | Show pagination total label. `true` \| `false` |
| show_page_number | true | Show current page number (arrows style). `true` \| `false` |
| show_total_pages | false | Show current/total page fraction. `true` \| `false` |
| total_label | Showing :a to :b of :c records | Pagination total label format |
| limit | null | Cap the total number of rows displayed |
| nonce | null | Nonce value for Content Security Policy |

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
    actions_title="actions"
    no_data_message="The staff directory is empty"
    message_as_empty_state="true"
    button_label="add staff member"
    heading="No Staff"
    groupby="department"
    selected_value="2,3,4"
    onclick="alert('add a staff')"
    sortable="false"
    paginated="false"
    pagination_style="arrows"
    page_size="25"
    show_row_numbers="false"
    show_total="true"
    limit="40"
    layout="custom"
    total_label="Showing :a to :b of :c records"
    has_hover="true">

    <x-slot name="header">
        <th>Name</th>
        <th>Department</th>
    </x-slot>

    <tr>
        <td>...</td>
        <td>...</td>
    </tr>

</x-bladewind::table>
```
