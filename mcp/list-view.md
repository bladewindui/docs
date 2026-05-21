---
title: List View Component
component: x-bladewind::listview
url: /component/list-view
---

# List View

Display a list of items. The list view component mimicks the `<ul><li>...</li></ul>` tags. The component makes use of two tags to render the list of items. Just like when using a `<li></li>`, the user is completely in charge of what content goes in there. All the list view component does is draw fine lines between your items. Every top level block element is flexed into its own column. The first top level block element has no left padding so you'll need to factor that into your design when using this component.

The `<x-bladewind::listview.item>` component creates a flex container.

```blade
<x-bladewind::card no-padding="true">
    <x-bladewind::listview compact="true">
        <x-bladewind::listview.item>
            <x-bladewind::avatar size="small" image="/assets/images/me.jpeg" />
            <div>
                <div class="text-sm font-medium text-slate-900 dark:text-slate-200">Michael K. Ocansey</div>
                <div class="text-sm text-slate-500 truncate">mike@bladewindui.com</div>
            </div>
        </x-bladewind::listview.item>
        <x-bladewind::listview.item>
            <x-bladewind::avatar size="small" image="AJ" bg_color="orange" />
            <div>
                <div class="text-sm font-medium text-slate-900 dark:text-slate-200">Anonymous Jackson</div>
                <div class="text-sm text-slate-500 truncate">fake@person.com</div>
            </div>
        </x-bladewind::listview.item>
        <x-bladewind::listview.item>
            <x-bladewind::avatar size="small" image="/assets/images/issah.jpg" />
            <div>
                <div class="text-sm font-medium text-slate-900 dark:text-slate-200">Catherine Gerald</div>
                <div class="text-sm text-slate-500 truncate">kate.gee@gmail.com</div>
            </div>
        </x-bladewind::listview.item>
    </x-bladewind::listview>
</x-bladewind::card>
```

By default the list view component sits on a white background. You can remove this by setting the `transparent="true"` attribute. You can then set a different background colour using the `class` attribute.

```blade
<x-bladewind::listview transparent="true">

    <x-bladewind::listview.item>

        <x-bladewind::avatar
            size="small"
            image="/path/to/the/image/file" />
        <div class="ml-3">
            <div class="text-sm font-medium text-slate-900">
                Michael K. Ocansey
            </div>
            <div class="text-sm text-slate-500 truncate">
                kabutey@gmail.com
            </div>
        </div>

    </x-bladewind::listview.item>
    ...
</x-bladewind::listview>
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| transparent | false | Should the background of the component be transparent or placed on a white background. `true` \| `false` |
| compact | false | If set to true, the spacing between the list items are reduced from 16px to 8px. `true` \| `false` |
| class | _(blank)_ | Any additional css you wish to add. |

## Full Example

```blade
<x-bladewind::listview compact="true" transparent="true" class="bg-yellow-50">

    <x-bladewind::listview.item>

        <x-bladewind::avatar
            size="small"
            image="/path/to/the/image/file" />
        <div class="ml-3">
            <div class="text-sm font-medium text-slate-900">
                Michael K. Ocansey
            </div>
            <div class="text-sm text-slate-500 truncate">
                kabutey@gmail.com
            </div>
        </div>

    </x-bladewind::listview.item>
    ...
</x-bladewind::listview>
```
