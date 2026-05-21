---
title: Tag Component
component: x-bladewind::tag
url: /component/tag
---

# Tag

Tags, sometimes referred to as labels allow you to logically group items or indicate statuses of items. You can also use tags to list selections. They are very simple to use.

```blade
<x-bladewind::tag label="pending" />
```

## Faint Coloured

The BladewindUI tag component allows you to specify different colours. The tags by default are faint in colour with blue being the default colour. There are nine colour options to pick from.

```blade
<x-bladewind::tag label="pending" color="color-name" />
```

Available colours: `primary` `red` `yellow` `green` `blue` `pink` `cyan` `orange` `gray` `purple` `violet` `indigo` `fuchsia`

## Dark Coloured

Dark colours in this case have nothing to do with dark mode. These are just a deeper shade of the tag colours. You can get darker shaded tags by setting `shade="dark"`.

```blade
<x-bladewind::tag label="pending" shade="dark" color="color-name" />
```

## With Close Icons

Tags can also have close icons. That will be useful if you use tags to display user selections and want a way to remove a user's selection from the list. By default tags do not show the close icon. To activate close icons, set `can_close="true"`. The default action when the close icon is clicked is to remove the tag that was clicked.

```blade
<x-bladewind::tag label="pending"
    can_close="true" />

<x-bladewind::tag label="pending"
    can_close="true"
    color="pink" />
```

To run your own code when the close icon is clicked, provide a javascript function to the `onclick` attribute. You may need to use the `id` attribute to provide unique identifiers for your tags. By default each tag has a randomly generated `id` prefixed with `bw-` to prevent numeric only IDs from breaking. You can turn off the prefixing of IDs by setting `add_id_prefix="false"`.

```blade
<x-bladewind::tag
    label="marketing"
    can_close="true"
    add_id_prefix="false"
    id="a1001"
    onclick="alert('you clicked on '+ dom_el('#a1001').innerText)" />

<x-bladewind::tag
    label="accounting"
    can_close="true"
    color="pink"
    class="a1002"
    onclick="alert('you clicked on '+ dom_el('.a1002').innerText)" />
```

## Tiny Tags

Sometimes you need to display tags as hints. For example in a menu bar you may want users to know which features are new by displaying a colourful but tiny _new_ tag next to each new menu item. Setting the `tiny="true"` attribute will serve such a purpose. Specifying this attribute on a `x-bladewind::tags` component will apply the size to all tags defined within the component. However, specifying the attribute on a `x-bladewind::tag` component will only apply it to that single tag.

```blade
<x-bladewind::tag label="just added" tiny="true" color="pink" />
```

```blade
<x-bladewind::tag label="new" tiny="true" color="purple"
    shade="dark"
    uppercasing="false"/>
```

## Rounded Tags

There are cases where you have a rounded elements theme running through your app and will prefer to have rounded tags. To make tags rounded set `rounded="true"`.

```blade
<x-bladewind::tag label="pending"
    rounded="true" />

<x-bladewind::tag label="pending"
    can_close="true"
    rounded="true"
    color="pink" />
```

## Outline Tags

What if you prefer to have no background colours on your tags — just a border outline with your chosen colour. Simply set `outline="true"`. The outline border colour is also affected by the shade you set. So light shades have a lighter outline. Dark shades have a darker outline.

```blade
<x-bladewind::tag label="pending" outline="true" color="pink" />

<x-bladewind::tag label="pending" can_close="true"
    outline="true"
    color="pink"
    shade="dark" />
```

## Selectable Tags

Selectable tags allow you to use tags in forms. You can think of them in this case as a different kind of checkboxes. Tags automatically become selectable when you specify the `name` and `value` attributes.

Hidden input fields are created for distinct tag names. Values of the selected tags are then written to the hidden input fields making them accessible when the form is submitted. For example: if we have 3 tags with the name **location**, this input field will be created `<input type="hidden" name="location" />`. When any location is selected, the value will be written into the hidden location input field. Multiple values are written as a comma separated list.

Note the tags are wrapped in a parent `<x-bladewind::tags>...</x-bladewind::tags>` component. You can restrict how many tags can be selected from the list using the `max` attribute on the `tags` component. Where a `max` attribute is used, it is necessary to define the `error_message` and `error_heading` attributes. This is the message to be displayed if a user tries to select more than the maximum tags allowed.

```blade
<x-bladewind::tags
    color="orange"
    name="stack"
    required="true"
    max="3"
    error_message="You can select only up to 3 tech stacks"
    error_heading="Check selection!">

    <x-bladewind::tag label="laravel" value="laravel" />
    <x-bladewind::tag label="javascript" value="js" />
    <x-bladewind::tag label="node js" value="node js" />
    <x-bladewind::tag label="tailwindcss" value="tailwind" />
    <x-bladewind::tag label="c-sharp" value="cs" />

</x-bladewind::tags>
```

To have values pre-selected by default (e.g., in edit mode), use the `selected_value` attribute with a comma-separated list of values:

```blade
<x-bladewind::tags
    color="red"
    name="fridays"
    selected_value="hangout,club,sleep">

    <x-bladewind::tag label="hangout with friends" value="hangout" />
    <x-bladewind::tag label="go clubbing" value="club" />
    <x-bladewind::tag label="watch movies" value="movies" />
    <x-bladewind::tag label="just chill" value="chill" />
    <x-bladewind::tag label="sleeeeep" value="sleep" />

</x-bladewind::tags>
```

## Attributes

### Tags Component

Only used when defining selectable tags.

| Attribute | Default | Description |
|---|---|---|
| name | null | The name used when defining selectable tags. This name can be retrieved when the form is submitted. |
| color | blue | There are nine colors to choose from. `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` |
| max | null | How many tags can be selected. By default there is no limit. |
| required | false | Determines if selectable tags are required when displayed in a form. `true` \| `false` |
| selected_value | _empty string_ | In edit mode you will want selected tags to be highlighted by default. Set the values as a comma separated list. |
| error_heading | Error | Heading to display in the notification when displaying an error message. |
| error_message | _empty string_ | Message to display when `max` is set and user selection exceeds the max allowed. |
| rounded | false | Determines if the tag is fully rounded or not. By default tags have a very subtle roundness. `true` \| `false` |
| tiny | false | Determines if the size of all the tags in the group is tiny. There are just two sizes, tiny and regular. `true` \| `false` |
| uppercasing | true | Determines if the text for all the tags in the group is uppercased. `true` \| `false` |
| shade | faint | Determines if the tags should have a faint or darker color shade. `faint` \| `dark` |
| outline | false | Determines if the tag is only outlined with `color` above. Outline tags have no background colour. `true` \| `false` |
| class | space-x-2 space-y-2 | Any additional CSS you wish to add to the tags container. |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts. |

### Tag Component

| Attribute | Default | Description |
|---|---|---|
| label | _blank_ | The text to display on the tag. |
| color | blue | There are nine colors to choose from. `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` |
| shade | faint | Determines if the tags should have a faint or darker color shade. `faint` \| `dark` |
| can_close | false | Determines if the tag should display a close icon or not. `true` \| `false` |
| id | uniqid() | Unique id for the tag. By default tag IDs have a prefix of `bw-`. |
| add_id_prefix | true | Determines if the `bw-` prefix should be added to tag IDs. `true` \| `false` |
| rounded | false | Determines if the tag is fully rounded or not. `true` \| `false` |
| outline | false | Determines if the tag is only outlined with `color` above. `true` \| `false` |
| tiny | false | Determines if the tag size is tiny. `true` \| `false` |
| uppercasing | true | Determines if the tag text is all uppercase. `true` \| `false` |
| onclick | _blank_ | Javascript function to execute when the close icon is clicked. |
| class | bw-tag | Any additional CSS you wish to add. |

## Full Example

```blade
<x-bladewind::tags
    name="stack"
    color="orange"
    required="true"
    rounded="true"
    max="3"
    tiny="false"
    uppercasing="false"
    selected_value="laravel,js"
    error_message="You can select only up to 3 tech stacks"
    error_heading="Check selection!">

    <x-bladewind::tag
        label="accounting"
        can_close="true"
        color="pink"
        class="a1002"
        id="a1002"
        rounded="true"
        outline="true"
        add_id_prefix="false"
        shade="dark"
        tiny="false"
        uppercasing="false"
        onclick="alert('you clicked on '+ dom_el('.a1002').innerText)" />

</x-bladewind::tags>
```
