---
title: Tag Component
component: x-bladewind::tag
url: /component/tag
---

# Tag

Tags (also called labels) let you logically group items or indicate the status of an item, and can also be used to build a list of selections. There are two related components: `x-bladewind::tag` for a single tag, and `x-bladewind::tags` as a wrapping container when tags are selectable.

## Basic Usage

```blade
<x-bladewind::tag label="pending" />
```

## Faint Coloured

Tags are faint in colour by default, with blue as the default colour. There are nine colour options.

```blade
<x-bladewind::tag label="primary" color="primary" />
<x-bladewind::tag label="red" color="red" />
<x-bladewind::tag label="yellow" color="yellow" />
<x-bladewind::tag label="green" color="green" />
<x-bladewind::tag label="blue" color="blue" />
<x-bladewind::tag label="pink" color="pink" />
<x-bladewind::tag label="cyan" color="cyan" />
<x-bladewind::tag label="orange" color="orange" />
<x-bladewind::tag label="gray" color="gray" />
<x-bladewind::tag label="purple" color="purple" />
<x-bladewind::tag label="violet" color="violet" />
<x-bladewind::tag label="indigo" color="indigo" />
<x-bladewind::tag label="fuchsia" color="fuchsia" />
```

## Dark Coloured

"Dark" here has nothing to do with dark mode — it's a deeper shade of the tag colour. Set `shade="dark"` for a darker shaded tag.

```blade
<x-bladewind::tag label="pending" shade="dark" color="purple" />
```

## With Close Icons

Tags can show a close icon, useful for removing user selections from a list. By default the close icon is hidden; set `can_close="true"` to show it. Clicking the close icon removes the tag by default.

```blade
<x-bladewind::tag label="pending" can_close="true" />
<x-bladewind::tag label="pending" can_close="true" color="pink" />
```

To run your own code when the close icon is clicked, provide a JavaScript function to the `onclick` attribute. You may need the `id` attribute to give tags unique identifiers. By default each tag gets a random ID prefixed with `bw-` to prevent numeric-only IDs from breaking; turn off the prefix with `add_id_prefix="false"`.

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

Set `tiny="true"` to display tags as small hints, useful for flagging new features next to menu items. Setting `tiny` on `x-bladewind::tags` applies it to all tags in the group; setting it on a single `x-bladewind::tag` applies it only to that tag.

```blade
<x-bladewind::tag label="just added" tiny="true" color="pink" />
<x-bladewind::tag label="new" tiny="true" color="purple" shade="dark" uppercasing="false" />
```

## Rounded Tags

Set `rounded="true"` for fully rounded tags, useful if a rounded theme runs through your app.

```blade
<x-bladewind::tag label="pending" rounded="true" />
<x-bladewind::tag label="pending" can_close="true" color="pink" rounded="true" />
```

## Outline Tags

Set `outline="true"` for a tag with no background colour, just a border outline in the chosen colour. The outline colour is also affected by `shade` — light shades give a lighter outline, dark shades a darker one.

```blade
<x-bladewind::tag label="pending" outline="true" color="pink" />
<x-bladewind::tag label="pending" can_close="true" color="pink" outline="true" shade="dark" />
```

## Selectable Tags

Tags automatically become selectable when you specify the `name` and `value` attributes, letting you use them as a different kind of checkbox in forms. By default, selectable tags use the faint colour you specify, and show the darker shade on hover/selection. Selectable tags cannot be closed (`can_close="false"`).

Hidden input fields are created for distinct tag names, and selected values are written into them as a comma separated list. For example, three tags named `location` create `<input type="hidden" name="location" />`, and selecting a value writes it there.

```blade
<x-bladewind::tags color="orange" name="stack" required="true" max="3" error_message="You can select only up to 3 tech stacks" error_heading="Check selection!">
    <x-bladewind::tag label="laravel" value="laravel" />
    <x-bladewind::tag label="javascript" value="js" />
    <x-bladewind::tag label="node js" value="node js" />
    <x-bladewind::tag label="tailwindcss" value="tailwind" />
    <x-bladewind::tag label="c-sharp" value="cs" />
</x-bladewind::tags>
```

The tags are wrapped in a parent `<x-bladewind::tags>...</x-bladewind::tags>` component. The `max` attribute restricts how many tags can be selected; when `max` is used, `error_message` and `error_heading` must also be defined — this is the message shown if a user selects more than the maximum allowed. `<x-bladewind::notification />` must be present on the page for error messages to display.

```blade
<x-bladewind::tags color="green" name="host">
    <x-bladewind::tag label="digital ocean" value="do" />
    <x-bladewind::tag label="amazon web services" value="aws" />
    <x-bladewind::tag label="microsoft azure" value="azure" />
    <x-bladewind::tag label="google cloud" value="google" />
</x-bladewind::tags>

<x-bladewind::tags color="blue" name="gender" max="1" error_message="You can select just one gender" error_heading="Yoh!" rounded="true">
    <x-bladewind::tag label="Male" value="male" />
    <x-bladewind::tag label="female" value="female" />
    <x-bladewind::tag label="other" value="other" />
    <x-bladewind::tag label="don't ask" value="shoosh" />
</x-bladewind::tags>

<x-bladewind::tags color="red" name="fridays" selected_value="hangout,club,sleep">
    <x-bladewind::tag label="hangout with friends" value="hangout" />
    <x-bladewind::tag label="go clubbing" value="club" />
    <x-bladewind::tag label="watch movies" value="movies" />
    <x-bladewind::tag label="just chill" value="chill" />
    <x-bladewind::tag label="sleeeeep" value="sleep" />
</x-bladewind::tags>
```

Use `selected_value` as a comma separated list to pre-select tags, useful in edit mode.

## Attributes

### Tags Component

Only used when defining selectable tags.

| Attribute | Default | Description |
|---|---|---|
| name | null | The name used when defining selectable tags. Retrievable when the form is submitted. |
| color | blue | Nine colours to choose from. `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` |
| max | null | How many tags can be selected. No limit by default. `any positive number` |
| required | false | Whether selectable tags are required in a form. `true` \| `false` |
| selected_value | *empty string* | Comma separated list of values to pre-select, useful in edit mode. |
| error_heading | Error | Heading for the notification shown when displaying an error message. |
| error_message | *empty string* | Message shown when `max` is set and the user selection exceeds it. |
| rounded | false | Whether the tag is fully rounded (tags have subtle roundness by default). `true` \| `false` |
| tiny | false | Whether all tags in the group are tiny. `true` \| `false` |
| uppercasing | true | Whether tag text in the group is uppercased. `true` \| `false` |
| shade | faint | Faint or darker colour shade. `faint` \| `dark` |
| outline | false | Whether the tag is outlined only, with no background colour. `true` \| `false` |
| class | space-x-2 space-y-2 | Additional CSS for the tags container. Overwrites the default, so include spacing classes if needed. |
| nonce | null | Nonce for content security policies on inline scripts. Can be set globally via `config/bladewind.php` under `script`. |

### Tag Component

| Attribute | Default | Description |
|---|---|---|
| label | *blank* | The text to display on the tag. |
| color | blue | Nine colours to choose from. `red` \| `yellow` \| `green` \| `blue` \| `pink` \| `cyan` \| `purple` \| `gray` \| `orange` |
| shade | faint | Faint or darker colour shade. `faint` \| `dark` |
| can_close | false | Whether the tag shows a close icon. Pass as a string, not boolean. `true` \| `false` |
| id | uniqid() | Unique id for the tag, accessible via JavaScript. Prefixed with `bw-` by default. |
| add_id_prefix | true | Whether the `bw-` prefix is added to tag IDs. `true` \| `false` |
| rounded | false | Whether the tag is fully rounded. `true` \| `false` |
| outline | false | Whether the tag is outlined only, with no background colour. `true` \| `false` |
| tiny | false | Whether the tag size is tiny. `true` \| `false` |
| uppercasing | true | Whether the tag text is uppercased. `true` \| `false` |
| onclick | *blank* | JavaScript function to execute when the close icon is clicked. |
| class | bw-tag | Additional CSS to apply. |

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
    <x-bladewind::tag label="laravel" value="laravel" />
    <x-bladewind::tag label="javascript" value="js" />
</x-bladewind::tags>

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
```
