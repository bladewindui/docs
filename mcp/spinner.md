---
title: Spinner Component
component: x-bladewind::spinner
url: /component/spinner
---

# Spinner

Displays a spinning icon, useful for indicating loading or in-progress states.

## Basic Usage

```blade
<x-bladewind::spinner />
```

## Different Colors

The spinner supports the standard set of BladewindUI colours.

```blade
<x-bladewind::spinner color="primary" />
<x-bladewind::spinner color="red" />
<x-bladewind::spinner color="yellow" />
<x-bladewind::spinner color="green" />
<x-bladewind::spinner color="purple" />
<x-bladewind::spinner color="pink" />
<x-bladewind::spinner color="orange" />
<x-bladewind::spinner color="cyan" />
<x-bladewind::spinner color="violet" />
<x-bladewind::spinner color="indigo" />
<x-bladewind::spinner color="fuchsia" />
```

## Different Sizes

```blade
<x-bladewind::spinner size="medium" />
<x-bladewind::spinner size="big" />
<x-bladewind::spinner size="xl" />
<x-bladewind::spinner size="omg" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| size | small | `small` \| `medium` \| `big` \| `xl` \| `omg` |
| color | gray | Sets the colour of the spinner. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `gray` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| class | bw-spinner | Additional CSS classes to add. |

## Full Example

```blade
<x-bladewind::spinner
    size="medium"
    class="m-0" />
```
