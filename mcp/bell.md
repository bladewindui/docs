---
title: Bell Component
component: x-bladewind::bell
url: /component/bell
---

# Bell

The bell component displays a bell icon with an optional pending-notifications dot indicator. It's a visually pleasing way to tell users where to find notifications and whether they have anything unread. By default the dot indicator is shown, meaning there are notifications to read.

## Basic Usage

```blade
<x-bladewind::bell />
```

## No Dot Indicator

Set `show_dot="false"` to hide the dot indicator. This should usually be the case once all notifications have been read.

```blade
<x-bladewind::bell show_dot="false" />
```

## Animated Dot Indicator

The dot indicator can have a "ping" animation to draw attention to the bell. Set `animate_dot="true"`. It is not animated by default.

```blade
<x-bladewind::bell animate_dot="true" />
```

## Inverted Bell

By default the bell is designed to sit on a white background. When using it on a dark background, set `invert="true"` to display the bell as white.

```blade
<x-bladewind::bell invert="true" />
```

## Different Sizes

The bell component exists in two sizes, `small` (default) and `big`.

```blade
<x-bladewind::bell size="small" /> {{-- default, can be omitted --}}
<x-bladewind::bell size="big" />
```

## Different Colours

The default dot indicator colour is blue. To match your app's theme, set the `color` attribute to any of the supported colours.

```blade
<x-bladewind::bell color="primary" />
<x-bladewind::bell color="red" />
<x-bladewind::bell color="yellow" />
<x-bladewind::bell color="green" />
<x-bladewind::bell color="pink" />
<x-bladewind::bell color="cyan" />
<x-bladewind::bell color="black" />
<x-bladewind::bell color="purple" />
<x-bladewind::bell color="orange" />
```

## Events

The bell is usually accessed via onclick or onmouseover events, which can be added to the component like any other HTML tag. Alternatively, wrap the bell in another HTML tag that accepts click and hover events.

A common pattern wraps the Bell component in the Dropmenu component, which uses the List View component to display a list of notifications.

```blade
<x-bladewind::dropmenu>
    <x-slot name="trigger">
        <x-bladewind::bell />
    </x-slot>
    <x-bladewind::dropmenu.item>
        <x-bladewind::listview transparent="true">
            <x-bladewind::listview.item>
                <x-bladewind::avatar size="small" image="..." />
                <div class="mx-1 pt-1">
                    <div class="text-sm">
                        <span class="font-medium">Michael</span> assigned <a href="#">a task</a> to you
                        <div class="text-xs">3 hours ago</div>
                    </div>
                </div>
            </x-bladewind::listview.item>
        </x-bladewind::listview>
    </x-bladewind::dropmenu.item>
</x-bladewind::dropmenu>
```

### Onclick, Onmouseover, On-anything

If you prefer your own notification layout, or want to redirect users to a notifications page, define any HTML event attribute directly on the Bell.

```blade
<x-bladewind::bell onmouseover="alert('the mouse was over me')" />
<x-bladewind::bell onclick="alert('do something on click')" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| color | blue | Colour of the dot indicator. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `pink` \| `cyan` \| `black` \| `purple` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| animate_dot | false | Whether the dot should be animated. |
| size | small | Size of the bell. `small` \| `big` |
| show_dot | true | Whether the dot indicator is displayed by default. `true` \| `false` |
| invert | false | Whether the bell should be displayed as white. `true` \| `false` |

## Full Example

```blade
<x-bladewind::bell
    color="pink"
    show_dot="false"
    animate_dot="true"
    invert="true"
    size="big" />
```
