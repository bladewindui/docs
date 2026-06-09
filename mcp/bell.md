---
title: Bell Component
component: x-bladewind::bell
url: /component/bell
---

# Bell

The bell component displays a bell icon with an optional 'pending notifications' dot indicator. This is a visually pleasing way of telling your app users where to find notifications and if they have anything unread. By default, the bell displays the dot indicator, meaning there are notifications to be read.

```blade
<x-bladewind::bell />
```

### No Dot Indicator

To display the bell with no dot indicator, set `show_dot="false"`. This hides the dot indicator. This should usually be the case if all notifications have been read.

```blade
<x-bladewind::bell show_dot="false" />
```

### Animated Dot Indicator

The dot indicator can have a 'ping' animation to draw attention to the bell. To animate the dot set `animate_dot="true"`. By default, the dot is not animated.

```blade
<x-bladewind::bell animate_dot="true" />
```

### Inverted Bell

By default, the bell is designed to sit on a white background. When using the bell on a dark background, set the attribute `invert="true"`. This will display the bell as white.

```blade
<x-bladewind::bell invert="true" />
```

## Different Sizes

The bell component exists in two sizes: `small` and `big`. The default size is `small`.

```blade
// size="small" can be omitted since it is the default
<x-bladewind::bell size="small" />
```

```blade
<x-bladewind::bell size="big" />
```

## Different Colours

The default dot indicator displayed next to the bell is blue. This may not match your app's theme, so it is possible to display the dot indicator in different colours by setting the `color` attribute.

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

<x-bladewind::bell color="violet" />

<x-bladewind::bell color="indigo" />

<x-bladewind::bell color="fuchsia" />
```

## Events

In most apps the bell is accessed either using onclick or onmouseover events. You can add these events to the component as you normally would to any tag. Alternatively, you could wrap the bell component in any other HTML tag that accepts click and hover events.

The example below wraps the Bell component in the [Dropmenu](/component/dropmenu) component. The Dropmenu component then uses the [List View](/component/listmenu) component to display a list of notifications.

```blade
<x-bladewind::dropmenu>
    <x-slot name="trigger">
        <x-bladewind::bell />
    </x-slot>
    <x-bladewind.dropmenu.item>
        <x-bladewind.listview transparent="true">

            <x-bladewind.listview.item>
                <x-bladewind.avatar size="small" image="..." />
                <div class="mx-1 pt-1">
                    <div class="text-sm">
                        <span class="font-medium text-slate-900">
                            Michael
                        </span>
                        assigned <a href="#">a task</a> to you
                        <div class="text-xs">3 hours ago</div>
                    </div>
                </div>
            </x-bladewind.listview.item>

            <x-bladewind.listview.item>
                ...
            </x-bladewind.listview.item>

        </x-bladewind.listview>
    </x-bladewind.dropmenu.item>
</x-bladewind.dropmenu>
```

### Onclick, Onmouseover, On-anything

As seen in the example above, the Bell component inherits the default action defined in the Dropmenu component. If you prefer to design your own notification layout or redirect users to a page that lists their notifications, you can define any HTML event attribute on the Bell.

```blade
<x-bladewind::bell
    onmouseover="alert('..')" />
```

```blade
<x-bladewind::bell
    onclick="alert('...')" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| color | _blue_ | The colour of the dot indicator. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `pink` \| `cyan` \| `black` \| `purple` \| `orange` \| `violet` \| `indigo` \| `fuchsia` |
| animate_dot | false | Determines if the dot should be animated or not. |
| size | small | Defines the size of the bell. `small` \| `big` |
| show_dot | true | Defines if the dot indicator should be displayed by default. `true` \| `false` |
| invert | false | Defines if the bell should be displayed as white. `true` \| `false` |

## Full Example

```blade
<x-bladewind::bell
    color="pink"
    show_dot="false"
    animate_dot="true"
    invert="true"
    size="big" />
```
