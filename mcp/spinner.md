---
title: Spinner Component
component: x-bladewind::spinner
url: /component/spinner
---

# Spinner

Display a spinning icon.

```blade
<x-bladewind::spinner />
```

## Different Colours

The spinner supports multiple colours. The default colour is `gray`.

```blade
<x-bladewind::spinner />
<x-bladewind::spinner color="primary" />
<x-bladewind::spinner color="red" />
<x-bladewind::spinner color="yellow" />
<x-bladewind::spinner color="green" />
<x-bladewind::spinner color="blue" />
<x-bladewind::spinner color="purple" />
<x-bladewind::spinner color="pink" />
<x-bladewind::spinner color="orange" />
<x-bladewind::spinner color="cyan" />
<x-bladewind::spinner color="violet" />
<x-bladewind::spinner color="indigo" />
<x-bladewind::spinner color="fuchsia" />
```

## Different Sizes

There are five sizes available. The default size is `small`.

```blade
<x-bladewind::spinner size="small" />
<x-bladewind::spinner size="medium" />
<x-bladewind::spinner size="big" />
<x-bladewind::spinner size="xl" />
<x-bladewind::spinner size="omg" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| size | small | The size of the spinner. `small` \| `medium` \| `big` \| `xl` \| `omg` |
| color | gray | Set the colour of the spinner. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `gray` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| class | bw-spinner | Any additional css you wish to add. |

## Full Example

```blade
<x-bladewind::spinner
    size="medium"
    color="blue"
    class="m-0" />
```
