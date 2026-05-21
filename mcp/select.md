---
title: Select Component
component: x-bladewind::select
url: /component/select
---

# Select

Select single or multiple values from a list.

If you have multiple select components on a page, it is important to give each one a **unique** name. Failure to do this will result in erratic behaviour of the component. If you specify no name, the component sets a unique name.

## Basic Usage

The `data` attribute is what really drives the BladewindUI select component. This attribute expects an `array` to be passed to it. The default array keys used to render the select are `label` and `value`.

```blade
<?php
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

Below is an alternative way to pass `data` to the component. Note there is no colon before the data attribute and in this case the data is passed as a json encoded string.

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

Placeholders tell the user what to enter into the field and disappear once the user selects a value. Labels on the other hand are always visible. The BladewindUI Select defaults to using placeholders. To use labels, set the `label` attribute. When both a placeholder and label are defined, the label takes precedence.

```blade
<x-bladewind::select name="labels" required="true" :data="$countries"
    label="Where are you from?"/>
```

### Setting the Value and Label Keys

It is not feasible to always rewrite your arrays to use the `value` and `label` keys expected by the component. Use the `label_key` and `value_key` attributes to map your own keys.

```blade
<x-bladewind::select
    name="country_mixed"
    label_key="country"
    value_key="code"
    :data="$countries" />
```

### Selecting a Value By Default

Like with the regular HTML `<select>` field, it is possible to have an item selected by default when the page loads. Useful when editing records.

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

A disabled select has a 50% opacity and a cursor indicating the field cannot be accessed.

```blade
<x-bladewind::select
    name="country-dis"
    disabled="true"
    placeholder="What is your nationality"
    :data="$countries" />
```

### Readonly Select

A readonly select is quite visible but cannot be opened to view the list of items.

```blade
<x-bladewind::select
    name="country-ro"
    readonly="true"
    placeholder="What is your nationality"
    :data="$countries" />
```

## With Country Flags

This is a simple way for users displaying lists of countries to show flags next to each country name. This implementation was ported from [Semantic UI library's flags](https://semantic-ui.com/elements/flag.html) feature. Flags are rendered using the country's ISO code. You will need to specify the `flag_key` attribute on the select — this should be the name of the key in your array that has the country codes.

```blade
<x-bladewind::select
    name="country"
    label_key="country"
    value_key="code"
    flag_key="code"
    :data="$countries" />
```

For flags to work you will need to include the following stylesheet. It is deliberately not compiled into the core BladewindUI css because not everyone needs flags.

```blade
<link href="{{ asset('vendor/bladewind/css/flags.css') }}" rel="stylesheet" />
```

## With Images

You may wish to include images in your select list. Specify the `image_key` attribute on the select — this should be the name of the key in your array that has the image urls.

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

Set `searchable="true"` to make the Select component searchable. This is turned off by default.

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

When pulling dynamic data from APIs or a database, you will not always have data available. In cases like this the Select component will display the message in the `empty_placeholder` attribute. If you set `searchable="true"` but there is no data to display, the search bar will automatically be hidden.

```blade
<x-bladewind::select name="empty_users" searchable="true" :data="$users" />
```

### Display as Empty State

It is possible to leverage the BladewindUI [Empty State](/component/empty-state) component to display the empty message. Set the `empty_state_from` attribute to the name of an empty state component defined on the same page with `for_select="true"`.

```blade
<x-bladewind::empty-state
    name="no_docs"
    for_select="true"
    message="Awesome! You have no documents to approve.">
</x-bladewind::empty-state>
```

```blade
<x-bladewind::select searchable="true" :data="$users"
    empty_state_from="no_docs" />
```

## Select Multiple Items

Set `multiple="true"` to allow selecting more than one item. Unlike the single select, multiple selects do not automatically close when you select items. To close a multiple select just click anywhere on the page outside the component.

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

If you try to select more than the value set in `max_selectable`, the selection will be blocked. The default value is -1, which means there is no limit on selection. You can set `max_error_message` to customize the error message shown when the limit is reached.

### Automatic Selection of Items

You can auto-select items by default using `selected_value` as a comma-separated list.

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

There could be cases when your data will not come from an API call or array. Set `data="manual"` and use the child `x-bladewind::select.item` component to build the options.

```blade
<x-bladewind::select name="gender" placeholder="Select Gender" data="manual">
    <x-bladewind::select.item label="Male" value="male" />
    <x-bladewind::select.item label="Female" value="female" />
    <x-bladewind::select.item label="Prefer not to say" value="other" />
</x-bladewind::select>
```

The manual Select can inherit all the cool features of an array-based Select — searchable or multiple selection, with flags and images.

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

Every BladewindUI select component creates a hidden form field `<input type="hidden" name="the-select-name-you-provided" />`. When you select an item, the hidden input field is updated with the value. You can access the value in Laravel via:

```blade
$request->get('country');
$request->input('country');
$request->country;
```

The **multiple select** generates a comma separated list of values. For example: `<input type="hidden" name="country_multi" value="gh,ci,bf,gm" />`.

## Execute Custom Functions

It is possible to execute a JavaScript custom function when an item is selected. Set `onselect="function_name"` — just the name without parenthesis. The value and label of the selected item are passed to the custom function as `onselect="prependDialingCode(value, label, all_values)"`. The third parameter `all_values` is useful for multiple selects.

```blade
<x-bladewind::select
    name="cusfxns"
    placeholder="Your country"
    data="manual"
    onselect="prependDialingCode">

    <x-bladewind::select.item label="Burkina Faso" value="bf" />
    <x-bladewind::select.item label="Ghana" value="gh" />
    <x-bladewind::select.item label="Nigeria" value="ng" />

</x-bladewind::select>
```

```blade
// javascript
const dialing_codes = {
    'gh' : '+233',
    'ng' : '+234',
    'bf' : '+226'
}

prependDialingCode = (value) => {
    domEl('.mobile-prefix').innerText = eval(`dialing_codes.${value}`);
}
```

## Manipulate Selects from JavaScript

When you create a Select component and provide a name, BladewindUI initializes the component in JavaScript using that name, prefixed with `bw_` and with dashes replaced by underscores.

```blade
// the following component declaration
<x-bladewind::select name="country-multiple" placeholder="Select a country" />
```

```blade
// will be initialized in JavaScript as
const bw_country_multiple = new BladewindSelect('country_multiple', 'Select a country');
```

The following methods are available on the component from JavaScript:

| Method | Description |
|---|---|
| enable | Enables the select and makes it clickable. `bw_country_multiple.enable();` |
| disable | Disables the select and makes it non-clickable. `bw_country_multiple.disable();` |
| reset | Removes any selected values from the component and empties the hidden input field. `bw_country_multiple.reset();` |
| selectByValue(value) | Select one of the component values by value. `bw_country_multiple.selectByValue('gh');` |
| filter(element, value) | Filter the items in `element` based on `value`. `bw_continents.filter('countries', 'AF');` |
| clearFilter(element, value) | Clear all filtering in `element`. `bw_countries.clearFilter('countries');` |

## Filtering

### Dynamically Filter a Table Based on Selected Values

Use the `onselect` attribute to pass a JavaScript function that filters DOM elements based on the selected values.

```blade
<x-bladewind::select
    name="department"
    onselect="filterEmployees"
    placeholder="filter by department"
    data="manual"
    multiple="true">
    <x-bladewind::select.item label="Field Workers" value="field" />
    <x-bladewind::select.item label="Finance" value="finance" />
    <x-bladewind::select.item label="Tech" value="tech" />
    <x-bladewind::select.item label="Marketing" value="marketing" />
    <x-bladewind::select.item label="Operations" value="operations" />
</x-bladewind::select>
```

```blade
filterEmployees = (value, label, all_values) => {
    let employee_cards = domEls('.bw-contact-card');
    let keywords = all_values.replaceAll(',','|');
    let regex = new RegExp( `(${keywords})`, 'ig' );
    employee_cards.forEach((el) => {
        (! el.innerText.match(regex) ) ? hide(el, true) : unhide(el, true);
    });
}
```

### Filter a Select Component Based on Another Select

Use `filter` and `filter_by` attributes to filter one select based on another. `filter` is the name of the target select to be filtered. `filter_by` is the key in the target select's data that should match the value of the source select.

```blade
<!-- the continents select component -->
<x-bladewind::select name="continent" placeholder="Select Continent"
    filter="continent-country"
    data="manual">
    <x-bladewind::select.item label="Africa" value="af" />
    <x-bladewind::select.item label="Asia" value="as" />
    <x-bladewind::select.item label="Europe" value="eu" />
    <x-bladewind::select.item label="North America" value="na" />
</x-bladewind::select>
```

```blade
<!-- the countries select component -->
<x-bladewind::select
    name="continent-country"
    placeholder="Select Country"
    searchable="true"
    data="{{ json_encode($countries) }}"
    filter_by="continent_code"
    empty-placeholder="no countries available"
    label_key="name"
    value_key="value" />
```

### Filter a Select Based on an Arbitrary Value

The select exposes a `filter()` method that allows for runtime filtering from any element such as a link, button, or tag.

```blade
filterCountries = (continent) => {
    // this is where we actually tell the component to filter
    bw_continent_country2.filter('continent_country2', continent);
}
```

## Native Select

It is possible to use the plain old HTML `<select>` element with the `bw-raw-select` class to style it like other BladewindUI form components.

```blade
<select name="age" class="bw-raw-select">
    <option value="">Are you above 18?</option>
    <option value="yes">Yep! I am</option>
    <option value="no">Nope but tell no one</option>
    <option value="idk">I'd rather not say</option>
</select>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | bw-select | Assigned to the hidden input created for the select. Accessed when the select is submitted in a form. |
| placeholder | Select One | Default text displayed on the select. |
| label | null | Text displayed on the select **as a label** (always visible). |
| onselect | _blank_ | Custom function to call when an item is selected. Specify just the function name without parenthesis. |
| :data | [] | Array of elements to display. |
| data | [] | JSON-encoded array of elements to display. |
| value_key | value | Which key in your array the select picks its values from. |
| label_key | label | Which key in your array the select picks its labels from. |
| flag_key | _blank_ | When using flags, which key in your array holds the country ISO codes. |
| image_key | _blank_ | When using images, which key in your array holds the image urls. |
| data_serialize_as | _blank_ | Submit the select's value under a different name than its `name` attribute. |
| required | false | Appends a red asterisk to the placeholder text. `true` \| `false` |
| selected_value | _blank_ | Value(s) to select by default. Accepts comma-separated values for multiple selects. |
| searchable | false | Adds a search box above the select items. `true` \| `false` |
| disabled | false | Disables the select. `true` \| `false` |
| readonly | false | Makes the select readonly. `true` \| `false` |
| multiple | false | Allows multiple items to be selected. `true` \| `false` |
| add_clearing | true | Applies 12px bottom margin for spacing in forms. `true` \| `false` |
| max_selectable | -1 | Maximum number of items that can be selected. -1 means no limit. Only applies when `multiple="true"`. |
| max_error | Please select only %s items | Message shown when user exceeds `max_selectable`. `%s` is replaced with the number. |
| filter | _blank_ | Name of the select component to filter when this select's value changes. |
| filter_by | _blank_ | Key in the target select's data to use for filtering. |
| modular | false | Adds `type="module"` to inline script tags. `true` \| `false` |
| empty_placeholder | No options available | Text displayed when there are no items. |
| empty_state | false | Displays an empty state component when no items are available. `true` \| `false` |
| empty_state_message | No options available | Message for the empty state component. |
| empty_state_button_label | Add | Action button text in the empty state. Leave blank to hide the button. |
| empty_state_onclick | _blank_ | Javascript function to call when the empty state action button is clicked. |
| empty_state_image | empty-state.svg | Image to display in the empty state. |
| empty_state_show_image | true | Whether to show the image in the empty state. `true` \| `false` |
| size | medium | Sizing to match other inputs and buttons. `small` \| `regular` \| `medium` \| `big` |
| nonce | null | Nonce for Content Security Policy inline scripts. Can be set globally in `config/bladewind.php`. |

### Select Item Attributes

When manually listing select items, the following attributes are available on `x-bladewind::select.item`:

| Attribute | Default | Description |
|---|---|---|
| value | value | Value of the item. |
| label | label | Label of the item. |
| flag | _blank_ | ISO code of country whose flag to display. |
| image | _blank_ | URL of image to display for the item. |
| selected | false | Determines if the item should be selected by default. `true` \| `false` |
| max_selectable | -1 | Maximum number of items that can be selected. |
| max_error | Please select only %s items | Message when user exceeds `max_selectable`. |

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
