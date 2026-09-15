---
title: Select Component
component: x-bladewind::select
url: /component/select
---

# Select

Select single or multiple values from a list, built from a PHP array or manually defined items. Supports search, flags, images, descriptions, filtering between selects, and empty states.

If you have multiple select components on a page, give each one a unique name — failing to do so causes erratic behaviour. If no name is specified, the component sets a unique one.

## Basic Usage

The `data` attribute drives the component. It expects an array with `label` and `value` keys by default.

```php
$countries = [
    [ 'label' => 'Benin',         'value' => 'bj' ],
    [ 'label' => 'Burkina Faso',  'value' => 'bf' ],
    [ 'label' => 'Ghana',         'value' => 'gh' ],
    [ 'label' => 'Nigeria',       'value' => 'ng' ],
    [ 'label' => 'Kenya',         'value' => 'ke' ]
];
```

```blade
<x-bladewind::select
    name="country"
    :data="$countries" />
```

Data can also be passed as a JSON-encoded string instead of a bound array, using `data` (no colon) instead of `:data`:

```blade
<x-bladewind::select
    name="country"
    data="{{ json_encode($countries) }}" />
```

### Change Placeholder Text

```blade
<x-bladewind::select
    name="country2"
    placeholder="What is your nationality"
    :data="$countries" />
```

### Use Labels Instead of Placeholders

Placeholders behave like input placeholders and disappear once a value is entered. Labels stay visible even after a value is selected. Set the `label` attribute to use labels; when both `placeholder` and `label` are set, `label` wins.

```blade
<x-bladewind::select name="labels" required="true" :data="$countries"
    label="Where are you from?"/>

<x-bladewind::select name="clear_labels" label="Where are you from?"
    :data="$countries" />
```

### Setting the Value and Label Keys

If your array doesn't use `label`/`value` keys, point the component at the keys you do have with `label_key` and `value_key`.

```php
$countries = [
    [ 'country' => 'Benin',         'code' => 'bj' ],
    [ 'country' => 'Burkina Faso',  'code' => 'bf' ],
    [ 'country' => 'Ghana',         'code' => 'gh' ],
    [ 'country' => 'Nigeria',       'code' => 'ng' ],
    [ 'country' => 'Kenya',         'code' => 'ke' ]
];
```

```blade
<x-bladewind::select
    name="country_mixed"
    label_key="country"
    value_key="code"
    :data="$countries" />
```

### Selecting a Value By Default

Like a native `<select>`, an item can be preselected on page load — useful when editing records.

```blade
<x-bladewind::select
    name="country-select"
    selected_value="gh"
    placeholder="What is your nationality"
    :data="$countries" />
```

### Required Field

Setting a select as required appends a red asterisk to the placeholder text.

```blade
<x-bladewind::select
    name="country-select2"
    required="true"
    placeholder="What is your nationality"
    :data="$countries" />
```

### Disabled Select

A disabled select has 50% opacity and a cursor indicating it cannot be accessed.

```blade
<x-bladewind::select
    name="country-dis"
    disabled="true"
    placeholder="What is your nationality"
    :data="$countries" />
```

### Readonly Select

A readonly select is visible but cannot be opened to view its items.

```blade
<x-bladewind::select
    name="country-ro"
    readonly="true"
    placeholder="What is your nationality"
    :data="$countries" />
```

## With Descriptions

A second line of context can be added under each label using `description_key` (the array key holding the description). For manual selects (`data="manual"`), use the `description` attribute on each item instead. Descriptions only display in the item list, not on the selected value.

```blade
<x-bladewind::select
    name="country"
    label_key="country"
    value_key="code"
    flag_key="code"
    description_key="description"
    :data="$countries" />
```

## With Country Flags

Display flags next to each option, rendered from the country's ISO code (ported from Semantic UI's flags feature). Set `flag_key` to the array key holding the ISO codes.

```blade
<x-bladewind::select
    name="country"
    label_key="country"
    value_key="code"
    flag_key="code"
    :data="$countries" />
```

For flags to render, include this stylesheet — it is deliberately not compiled into core BladewindUI CSS since not everyone needs flags:

```blade
<link href="{{ asset('vendor/bladewind/css/flags.css') }}" rel="stylesheet" />
```

## With Images

Display an image next to each option (e.g. employee pictures) by setting `image_key` to the array key holding image URLs.

```php
$staff = [
    [ 'id' => '1001', 'name' => 'Adam Nsiah', 'picture' => '/path/to/the/image/file' ],
    // ...
];
```

```blade
<x-bladewind::select
    name="staff"
    placeholder="Assign task to"
    label_key="name"
    value_key="id"
    image_key="picture"
    :data="$staff" />
```

## Searchable Select

For long lists, set `searchable="true"` to add a search box above the items. This is off by default. If there is no data to display, the search bar is automatically hidden.

```blade
<x-bladewind::select
     name="country4"
     searchable="true"
     label_key="country"
     value_key="code"
     flag_key="code"
     :data="$countries" />
```

## Empty Select

When there is no data (e.g. from an API or database query that returned nothing), the component displays the message in `empty_placeholder` as a select item.

```blade
<x-bladewind::select name="empty_users" searchable="true" :data="$users" />
```

### Display as Empty State

Instead of a single line message, you can render the BladewindUI [Empty State](/component/empty-state) component. Define an empty state elsewhere on the page, give it a name, set `for_select="true"` on it so it isn't rendered inline, then point the select at it with `empty_state_from`.

```blade
<x-bladewind::empty-state
    name="no_docs"
    for_select="true"
    message="Awesome! You have no documents to approve.">
</x-bladewind::empty-state>

<x-bladewind::select searchable="true" :data="$users"
    empty_state_from="no_docs" />
```

## Select Multiple Items

Set `multiple="true"` to allow selecting more than one item. Unlike a single select, a multiple select does not close automatically after a selection — click elsewhere on the page to close it. Left/right navigation arrows appear when some selected items are out of view (or scroll with two fingers).

```blade
<x-bladewind::select
    name="country-multi"
    searchable="true"
    label_key="country"
    value_key="code"
    flag_key="code"
    multiple="true"
    label="Select a country"
    max_selectable="3"
    :data="$countries" />
```

`max_selectable` caps how many items can be selected (default `-1`, no limit). `max_error_message` sets the message shown when the limit is exceeded.

### Automatic Selection of Items

Preselect multiple items (e.g. in edit mode) by passing a comma-separated list to `selected_value`.

```blade
<x-bladewind::select
    name="country-multi2"
    searchable="true"
    selected_value="gh, gm, ci, bf"
    label_key="country"
    value_key="code"
    flag_key="code"
    multiple="true"
    :data="$countries" />
```

## Manually Building a Select

When data isn't coming from an API or array (e.g. a short, fixed list like gender), set `data="manual"` and declare each option as a child `x-bladewind::select.item`.

```blade
<x-bladewind::select name="gender" placeholder="Select Gender" data="manual">
    <x-bladewind::select.item label="Male" value="male" />
    <x-bladewind::select.item label="Female" value="female" />
    <x-bladewind::select.item label="Prefer not to say" value="other" />
</x-bladewind::select>
```

Manual selects support all the same features as array-based selects, including search and multiple selection, and can mix flags and images:

```blade
<x-bladewind::select
     name="tags"
     placeholder="Tags for this music"
     multiple="true"
     searchable="true" data="manual">

     <x-bladewind::select.item label="Pop" value="pop" image="/path/to/image" />
     <x-bladewind::select.item label="Hip" value="hip" flag="gh" />
     <x-bladewind::select.item label="Trendy" value="trendy" flag="ng" />
     <x-bladewind::select.item label="GenZ" value="genz" image="/path/to/image" />
     <x-bladewind::select.item label="Trance" value="trance" />
     <x-bladewind::select.item label="For Coder's" value="devs" />

</x-bladewind::select>
```

## Get Value of Selected Item(s)

Every select creates a hidden input, `<input type="hidden" name="the-select-name-you-provided" />`, whose value updates on selection using whatever you set as `value_key`. Access it after form submission the normal Laravel way:

```js
$request->get('country');
$request->input('country');
$request->country;
```

A multiple select generates a comma-separated list of values, e.g. `<input type="hidden" name="country_multi" value="gh,ci,bf,gm" />`.

## Execute Custom Functions

Run a JavaScript function in addition to the default behavior by setting `onselect="function_name"` (name only, no parentheses). The function receives `(value, label, all_values)` — `all_values` is a comma-separated list, useful for multiple selects.

```blade
<x-bladewind::select name="cusfxns" placeholder="Your country" data="manual" onselect="prependDialingCode">
    <x-bladewind::select.item label="Burkina Faso" value="bf" />
    <x-bladewind::select.item label="Ghana" value="gh" />
    <x-bladewind::select.item label="Nigeria" value="ng" />
</x-bladewind::select>
```

```js
const dialing_codes = {
    'gh' : '+233',
    'ng' : '+234',
    'bf' : '+226'
}
prependDialingCode = (value) => {
    dom_el('.mobile-prefix').innerText = eval(`dialing_codes.${value}`);
}
```

## Manipulate Selects from JavaScript

When you create a select with a `name`, BladewindUI initializes it in JavaScript, prefixed with `bw_` and with dashes replaced by underscores. `name="country-multiple"` becomes `bw_country_multiple`.

```js
const bw_country_multiple = new BladewindSelect('country_multiple', 'Select a country');
```

Available methods:

| Method | Description |
|---|---|
| `enable()` | Enables the select and makes it clickable. |
| `disable()` | Disables the select and makes it non-clickable. On multiple selects with existing values, the user can still remove selected values via their close icons. |
| `reset()` | Removes selected values and empties the hidden input. |
| `selectByValue(value)` | Selects one value; ignored if it doesn't exist in the list. Not for multiple values at once — call it repeatedly on a multiple select. |
| `filter(element, value)` | Filters items in `<element>` (the target select's name) based on `<value>`. A component can trigger filtering on itself if the value isn't coming from another select. |
| `clearFilter(element, value)` | Clears filtering in `<element>` based on `<value>`; resets the component if `<value>` is blank. |

```blade
<x-bladewind::button size="small" type="secondary" onclick="bw_from_js.selectByValue('gh')">Select Ghana</x-bladewind::button>
<x-bladewind::button size="small" type="secondary" onclick="bw_from_js.disable()">Disable</x-bladewind::button>
<x-bladewind::button size="small" type="secondary" onclick="bw_from_js.reset()">Reset</x-bladewind::button>
<x-bladewind::button size="small" type="secondary" onclick="bw_from_js.enable()">Enable</x-bladewind::button>
```

## Filtering

### Filter a Select Based on the Value of Another Select

Use `filter` (on the driving select, naming the target select) and `filter_by` (on the target select, naming the array key to filter on).

```blade
<x-bladewind::select name="continent" placeholder="Select Continent" data="manual" filter="continent-country" add_clearing="false">
    <x-bladewind::select.item label="Africa" value="af" />
    <x-bladewind::select.item label="Asia" value="as" />
    <x-bladewind::select.item label="Europe" value="eu" />
    <x-bladewind::select.item label="North America" value="na" />
</x-bladewind::select>

<x-bladewind::select
    name="continent-country"
    placeholder="Select Country"
    searchable="true"
    empty-placeholder="no countries available"
    :data="$countries"
    label_key="name" value_key="value" filter_by="continent_code" add_clearing="false" />
```

`filter_by` adds a `data-filter-value` attribute to each item's HTML, matched against the value selected in the driving select. The key named in `filter_by` must exist in the target select's data array.

### Filter a Select Based on Some Arbitrary Value

Call the exposed `filter()` method directly for runtime filtering not tied to another select — for example, from a link or tag click.

```js
filterCountries = (continent) => {
    bw_continent_and_country2.filter('continent_and_country2');
    bw_continent_and_country2.filter('continent_and_country2', continent);
}
```

## Native Select

Apply the `bw-raw-select` class to a plain HTML `<select>` to match BladewindUI's styling without any of its JavaScript behavior (no search, only what native `<select>` supports).

```blade
<select name="age" class="bw-raw-select">
    <option value="">Are you above 18?</option>
    <option value="yes">Yep! I am</option>
    <option value="no">Nope but tell no one</option>
    <option value="idk">I'd rather not say</option>
</select>
```

## Laravel Form State

When validation fails, Laravel redirects back with flashed input and `$errors`. The select can read both, avoiding manual `old()` and error-block boilerplate.

```blade
<x-bladewind::select
    name="country"
    label="Country"
    :data="$countries"
    fill_from_old="true"
    show_validation_error="true" />
```

`fill_from_old` repopulates the field from `old()`. `show_validation_error` applies the error state and renders `$errors->first()` beneath it. Add `error_bag` if validating into a named bag. Both are off by default — turning them on without removing existing manual error output will print messages twice.

A `multiple` select receives an array back from `old()` and re-selects every previous choice. The error state is applied to the select trigger, since that's the element carrying the border.

### Turning It On Globally

Set defaults once in `config/bladewind.php` instead of per field:

```php
// config/bladewind.php
'forms' => [
    'fill_from_old' => true,
    'show_validation_error' => true,
    'error_bag' => null,
],
```

An attribute set directly on a field always overrides the config.

## Selects in Scrolling Containers

The dropdown list is positioned against the select rather than laid out inside it, so it isn't clipped by a scrolling ancestor (a common case: a wide table needing a horizontally scrolling wrapper, where `overflow-x` also clips vertically). The list opens below the select, flips above when there isn't room, and follows the select on scroll — including when an inner container scrolls, not just the page. The list stays inside the select component in the DOM, so ancestor-based CSS selectors still match it.

## Using Select Inside Livewire

The selected value is written to a hidden field that dispatches a real, native `change` event, so Livewire's `wire:model` picks up a selection without extra work. The dropdown's open/closed state and its search filter live outside the DOM Livewire manages — if a re-render unrelated to the select resets them, wrap the select in `wire:ignore`. The component guards against re-renders creating duplicate click listeners.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | bw-select | Assigned to the hidden input created for the select; used to access its value after form submission. |
| placeholder | Select One | Default text displayed on the select. |
| label | null | Text displayed on the select as a label. |
| onselect | *blank* | Custom function to call when an item is selected, name only, e.g. `assignToProject`. Called as `assignToProject(value, label)`. |
| :data | [] | Array of elements to display. Ignore if using `data` instead. |
| data | [] | JSON-encoded array of elements to display. Ignore if using `:data` instead. |
| value_key | value | Which array key to pick values from. |
| label_key | label | Which array key to pick labels from. |
| flag_key | *blank* | Array key holding country ISO codes, when displaying flags. |
| image_key | *blank* | Array key holding image URLs, when displaying images. |
| data_serialize_as | *blank* | Serialize the select's submitted value under a different request key than `name`. |
| required | false | Appends an asterisk to the placeholder to indicate the field is required. `true` \| `false` |
| selected_value | *blank* | Value(s) to select by default. Comma-separate for multiple, e.g. `"to do, in progress, done"`. |
| searchable | false | Adds a search box above the items. `true` \| `false` |
| disabled | false | Disables the select. `true` \| `false` |
| readonly | false | Makes the select readonly. `true` \| `false` |
| multiple | false | Allows selecting multiple items. `true` \| `false` |
| add_clearing | true | Applies a 12px bottom margin for form spacing. `true` \| `false` |
| max_selectable | -1 | Maximum number of items selectable when `multiple="true"`. -1 means no maximum. |
| max_error | Please select only %s items | Message shown when selection exceeds `max_selectable`. %s is replaced with the limit. |
| filter | *blank* | Name of the select component that should be filtered by this one. |
| filter_by | *blank* | Which key in the target select's data should be used to filter its items. |
| modular | false | Adds `type="module"` to script tags used within the component. `true` \| `false` |
| empty_placeholder | No options available | Text to display when there are no items. |
| empty_state | false | Displays an Empty State component when there are no items. `true` \| `false` |
| empty_state_message | No options available | Message shown in the empty state component. |
| empty_state_button_label | Add | Text for the empty state's action button. Leave blank to hide it. |
| empty_state_onclick | *blank* | JavaScript function to call when the empty state's action button is clicked. |
| empty_state_image | empty-state.svg | Image shown in the empty state component. |
| empty_state_show_image | true | Whether to show an image in the empty state component. `true` \| `false` |
| size | medium | Sizing to match other form components. `small` \| `regular` \| `medium` \| `big` |
| nonce | null | Nonce value for content security policies on inline scripts. Can be set globally via `config/bladewind.php` under `script`. |
| fill_from_old | false | Repopulate the field from `old()` after a failed validation redirect. Defaults to `bladewind.forms.fill_from_old`. `true` \| `false` |
| show_validation_error | false | Apply the error state and render `$errors->first()` beneath the field. Defaults to `bladewind.forms.show_validation_error`. `true` \| `false` |
| error_bag | null | Which error bag to read when `show_validation_error` is on. Defaults to Laravel's default bag. |

### Select Item Attributes

For manually listed items (`x-bladewind::select.item`):

| Attribute | Default | Description |
|---|---|---|
| value | value | Value of the item. |
| label | label | Label of the item. |
| flag | *blank* | ISO code of the country whose flag to display. |
| image | *blank* | URL of image to display for the item. |
| selected | false | Whether the item should be selected by default. `true` \| `false` |
| max_selectable | -1 | Maximum number of items that can be selected. -1 means no maximum. |
| max_error | Please select only %s items | Message shown when selection exceeds `max_selectable`. %s is replaced with the limit. |

## Full Example

```blade
<x-bladewind::select
    name="country"
    placeholder="What is your nationality"
    label="What is your nationality"
    onselect="confirmSelection"
    data="{{ json_encode($countries) }}"
    value_key="code"
    label_key="country"
    flag_key="code"
    image_key=""
    disabled="false"
    readonly="true"
    data_serialize_as="country_id"
    required="true"
    selected_value="1001"
    max_selectable="3"
    searchable="true"
    empty_state="true"
    empty_state_message="Define a user"
    empty_state_onclick="alert('hey')"
    empty_state_button_label="new user"
    empty_state_image=""
    empty_state_show_image="false"
    filter="countries"
    filter_by="continent_id"
/>
```
