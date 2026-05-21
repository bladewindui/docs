---
title: Accordion Component
component: x-bladewind::accordion
url: /component/accordion
---

# Accordion

The accordion component allows users to expand or collapse sections of content. It's commonly used to organize information in a compact, accessible way. Each section typically has a header that can be clicked to toggle the visibility of its associated content.

## Basic Usage

Each accordion item requires a `title` attribute for the clickable header. The body content is placed inside the item tags.

```blade
<x-bladewind::accordion>
    <x-bladewind::accordion.item title="What is BladewindUI?">
        <p>
            BladewindUI is a collection...
        </p>
    </x-bladewind::accordion.item>
    <x-bladewind::accordion.item title="How can I install the latest version of the library?">
        <div>
            At the root of your Laravel...
        </div>
    </x-bladewind::accordion.item>
    <x-bladewind::accordion.item title="How can I customize the library for my theme?">
        <div>
            BladewindUI has been designed ...
        </div>
    </x-bladewind::accordion.item>
</x-bladewind::accordion>
```

## Custom Title Slot

If the title of your accordion item is not a simple string, you can define your content in a title slot.

```blade
<x-bladewind::accordion>
    <x-bladewind::accordion.item>
        <x-slot:title>
            <div class="inline-flex">
                <div><img src="/assets/images/icon.png" class="size-10..." alt="logo"/></div>
                <div class="ml-2">
                    <div>What is BladewindUI library?</div>
                    <div class="text-sm ...">version 2.8.0</div>
                </div>
            </div>
        </x-slot:title>
        <p>
            BladewindUI is a collection...
        </p>
    </x-bladewind::accordion.item>
    ...
</x-bladewind::accordion>
```

## Open Multiple Accordion Items

By default only one accordion can stay open at any point in time. You can disable this feature by setting `can_open_multiple="true"`. Now any closed accordion that is clicked will be opened. Likewise, any accordion that is open will be closed when clicked.

```blade
<x-bladewind::accordion
    can_open_multiple="true">
    <x-bladewind::accordion.item title="What is BladewindUI?">
        <p>
            BladewindUI is a collection...
        </p>
    </x-bladewind::accordion.item>
    <x-bladewind::accordion.item title="How can I install the latest version of the library?">
        <div>
            At the root of your Laravel...
        </div>
    </x-bladewind::accordion.item>
    <x-bladewind::accordion.item title="How can I customize the library for my theme?">
        <div>
            BladewindUI has been designed ...
        </div>
    </x-bladewind::accordion.item>
</x-bladewind::accordion>
```

## Ungrouped Accordions

The examples above showed the accordion items within one card element, each separated by a line. To separate accordion items so they stand alone, set `grouped="false"`.

```blade
<x-bladewind::accordion
    grouped="false">
    <x-bladewind::accordion.item title="What is BladewindUI?">
        <p>
            BladewindUI is a collection...
        </p>
    </x-bladewind::accordion.item>
    <x-bladewind::accordion.item title="How can I install the latest version of the library?">
        <div>
            At the root of your Laravel...
        </div>
    </x-bladewind::accordion.item>
    <x-bladewind::accordion.item title="How can I customize the library for my theme?">
        <div>
            BladewindUI has been designed ...
        </div>
    </x-bladewind::accordion.item>
</x-bladewind::accordion>
```

## Colourful Accordions

You can define the background colour of the accordion by setting the `color` attribute. This is only enforced if `grouped="false"`. Available colours include: `primary`, `blue`, `red`, `yellow`, `green`, `purple`, `pink`, `orange`, `black`, `cyan`, `violet`, `indigo`, `fuchsia`.

```blade
<x-bladewind::accordion
    grouped="false"
    color="yellow">
    <x-bladewind::accordion.item title="What is BladewindUI?">
        <p>
            BladewindUI is a collection...
        </p>
    </x-bladewind::accordion.item>
...
</x-bladewind::accordion>
```

## Attributes

### Accordion Component

| Attribute | Default | Description |
|---|---|---|
| grouped | true | Should the accordion items be grouped within one card container. If `true`, the accordions are divided by lines and grouped in one big container. `true` \| `false` |
| can_open_multiple | false | Should the accordion allow opening of items without first closing what is open. `true` \| `false` |
| color | _blank_ | The accordion background. Applicable when `grouped="false"`. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `black` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| no_padding | false | Specifies if there should be air around the accordion group. `true` \| `false` |
| content_can_close | true | Determines if clicking on the accordion content will close it when it is open. `true` \| `false` |
| class | _blank_ | Any additional css classes can be added using this attribute. For example to make your accordion more rounded you can add `class="rounded-2xl"`. |

### Accordion Item Component

| Attribute | Default | Description |
|---|---|---|
| open | false | Should the accordion items be opened or closed by default. `true` \| `false` |
| title | _blank_ | Label to display as the title of the accordion. |
| color | _blank_ | The accordion background. Applicable when `grouped="false"`. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `black` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| class | _blank_ | Any additional css classes can be added using this attribute. |
| no_padding | false | Specifies if there should be air around each accordion item. `true` \| `false` |
| content_can_close | true | Determines if clicking on the accordion content will close it when it is open. `true` \| `false` |
| nonce | null | Used when implementing context security policies and require to pass a nonce to inline scripts. |

## Full Example

```blade
<x-bladewind::accordion
    grouped="false"
    can_open_multiple="false"
    color="pink"
    class="rounded-lg shadow-sm">
...
</x-bladewind::accordion>
```

```blade
<x-bladewind::accordion.item
    color="blue"
    open="false"
    title="What is BladewindUI?"
    class="shadow">
...
</x-bladewind::accordion.item>
```
