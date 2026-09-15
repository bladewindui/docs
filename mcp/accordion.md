---
title: Accordion Component
component: x-bladewind::accordion
url: /component/accordion
---

# Accordion

The accordion component lets users expand or collapse sections of content, keeping information compact and accessible. Each section has a clickable header that toggles the visibility of its content.

## Basic Usage

```blade
<x-bladewind::accordion>
    <x-bladewind::accordion.item title="What is BladewindUI?">
        <p>
            BladewindUI is a collection of super simple but elegant Laravel blade-based UI components using TailwindCSS and vanilla Javascript.
        </p>
    </x-bladewind::accordion.item>
    <x-bladewind::accordion.item title="How can I install the latest version of the library?">
        <div>
            At the root of your Laravel project, type the following composer command in your terminal to pull in the package.
            <pre><code>composer require bladewindui/ui</code></pre>
        </div>
    </x-bladewind::accordion.item>
    <x-bladewind::accordion.item title="How can I customize the library for my theme?">
        <div>
            BladewindUI has been designed to not interfere with the existing components in your project.
        </div>
    </x-bladewind::accordion.item>
</x-bladewind::accordion>
```

## Custom Title Slot

If the title of your accordion item is not a simple string, define the content in a `title` slot instead of the `title` attribute.

```blade
<x-bladewind::accordion>
    <x-bladewind::accordion.item>
        <x-slot:title>
            <div class="inline-flex">
                <div><img src="/path/to/icon.png" class="size-10 rounded-full border-2 border-gray-200 p-1" alt="logo"/></div>
                <div class="ml-2">
                    <div>What is BladewindUI library?</div>
                    <div class="text-sm font-normal opacity-45 -mt-1.5">version 2.8.0</div>
                </div>
            </div>
        </x-slot:title>
        <p>
            BladewindUI is a collection of super simple but elegant Laravel blade-based UI components.
        </p>
    </x-bladewind::accordion.item>
</x-bladewind::accordion>
```

## Open Multiple Accordion Items

By default only one accordion item can stay open at a time. Set `can_open_multiple="true"` to allow any closed item to open without closing the others.

```blade
<x-bladewind::accordion can_open_multiple="true">
    <x-bladewind::accordion.item title="What is BladewindUI?">
        ...
    </x-bladewind::accordion.item>
</x-bladewind::accordion>
```

## Ungrouped Accordions

The examples above group accordion items in one card, separated by lines. To make each item stand alone, set `grouped="false"`.

```blade
<x-bladewind::accordion grouped="false">
    <x-bladewind::accordion.item title="What is BladewindUI?">
        ...
    </x-bladewind::accordion.item>
</x-bladewind::accordion>
```

## Colourful Accordions

You can set the background colour of the accordion with the `color` attribute. This only takes effect when `grouped="false"`.

```blade
<x-bladewind::accordion grouped="false" color="yellow">
    <x-bladewind::accordion.item title="What is BladewindUI?">
        ...
    </x-bladewind::accordion.item>
</x-bladewind::accordion>

<x-bladewind::accordion grouped="false" color="pink">
    <x-bladewind::accordion.item title="What is BladewindUI?">
        ...
    </x-bladewind::accordion.item>
</x-bladewind::accordion>
```

## Attributes

### Accordion Component

| Attribute | Default | Description |
|---|---|---|
| grouped | true | Whether the accordion items are grouped within one card container, divided by lines. `true` \| `false` |
| can_open_multiple | false | Whether the accordion allows opening items without first closing what is open. `true` \| `false` |
| color | *blank* | The accordion background. Applies when `grouped="false"`. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `black` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| no_padding | false | Whether there should be air around the accordion group. `true` \| `false` |
| content_can_close | true | Whether clicking the accordion content closes it when open. `true` \| `false` |
| class | *blank* | Any additional css classes, e.g. `class="rounded-2xl"`. |

### Accordion Item Component

| Attribute | Default | Description |
|---|---|---|
| open | false | Whether the accordion item is open or closed by default. `true` \| `false` |
| title | *blank* | Label to display as the title of the accordion. |
| color | *blank* | The accordion background. Applies when `grouped="false"`. `primary` \| `blue` \| `red` \| `yellow` \| `green` \| `purple` \| `pink` \| `orange` \| `black` \| `cyan` \| `violet` \| `indigo` \| `fuchsia` |
| class | *blank* | Any additional css classes, e.g. `class="rounded-2xl"`. |
| no_padding | false | Whether there should be air around the accordion item. `true` \| `false` |
| content_can_close | true | Whether clicking the accordion content closes it when open. `true` \| `false` |
| nonce | null | Nonce value for content security policies applied to inline scripts. Can be set globally via the `script` key in `config/bladewind.php`. |

## Full Example

```blade
<x-bladewind::accordion
    grouped="false"
    can_open_multiple="false"
    color="pink"
    class="rounded-lg shadow-sm">
    <x-bladewind::accordion.item
        color="blue"
        open="false"
        title="What is BladewindUI?"
        class="shadow">
        ...
    </x-bladewind::accordion.item>
</x-bladewind::accordion>
```
