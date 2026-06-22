---
title: Customizing BladewindUI
url: /customize
---

# Customizing BladewindUI

BladewindUI is designed to work seamlessly with your existing project components. Once installed, all BladewindUI components are served directly from your project's vendor directory. Each component resides in its own Composer package, such as `vendor/mkocansey/bladewind-button` or `vendor/mkocansey/bladewind-table`. However, they all share the same `bladewind::` view namespace. This Laravel convention means you'll need to type the `<x-bladewind` prefix every time you use a BladewindUI component.

```blade
<x-bladewind::button>Save User</x-bladewind::button>
```

Once you [publish](/install#publishing-components) the BladewindUI components, the files get moved to your project's `resources/views/components/bladewind` directory. You can then use the dot, instead of the colon, syntax to access a component.

```blade
<x-bladewind.button>Save User</x-bladewind.button>
```

## Getting rid of the bladewind prefix

It is possible to get rid of the `bladewind` prefix entirely.

```blade
<x-bladewind.button>Save User</x-bladewind.button>

{{-- or --}}

<x-bladewind::button>Save User</x-bladewind::button>
```

becomes

```blade
<x-button>Save User</x-button>
```

To achieve this, you should have already [published the BladewindUI components](/install#publishing-components). Next, move all the blade files in `resources/views/components/bladewind` into `resources/views/components`. You can then delete the `bladewind` folder since it should technically be empty at this point.

> **Warning:** Any existing components in your `resources/views/components` directory with the same name as what you are moving from the `resources/views/components/bladewind` directory will be overwritten.

## You can change everything

Truly, you can! These components are in essence just Laravel blade templates that sit right in your project. If there are any implementations you are unhappy with, simply locate the particular blade template and dissect it at will. At the end of every component documentation page, you will find the name of the blade file that defines that component.

> Most BladewindUI updates we roll out may affect the blade, css, and js files.

Updates that touch the css and js files require the library's assets to be republished. Run the command below to republish the library's css and js files.

```bash
php artisan vendor:publish --tag=bladewind-public --force
```

> To prevent any changes you made earlier from being overwritten by updates, make all changes that overwrite BladewindUI css classes in your project's css file instead of editing the BladewindUI css file directly. Your project's css file should always be included **after** the BladewindUI css file.

## Changing Datepicker Translations

The [Datepicker component](/component/datepicker) is wired to speak a couple of languages. The language files are part of the `bladewind-core` package and are served from `vendor/mkocansey/bladewind-core/lang`. Currently the available languages contributed by the community are English, French, Italian, Arabic, German, Chinese, Spanish, and Indonesian. You can add more languages as you see fit or even modify the existing translations. To do this for just your project, first publish the language files by running the command below from the root of your project.

```bash
php artisan vendor:publish --tag=bladewind-lang --force
```

The language files will now be available in your project's `lang/vendor/bladewind` directory. You can now add more languages or edit the language files that were published.

## Setting Global Defaults

BladewindUI has made some default UI decisions which may differ from what you need in your projects. For example, all [Tag](/component/tag) and [Button](/component/button) component texts are always uppercase. To make them lowercase, you would set `uppercasing="false"`. If you need all your buttons in lowercase, that means typing a lot of `uppercasing="false"`. Now what if you also need all your buttons to be **small** and to have **no focus rings**? Your code every time would be:

```blade
<x-bladewind::button show_focus_ring="false" size="small" uppercasing="false">
    Save
</x-bladewind::button>
```

This is tedious. Wouldn't it be great to just type the code below to get a button looking the way you'd want for your project?

```blade
<x-bladewind::button>Save</x-bladewind::button>
```

To achieve this, create a `config/bladewind.php` file in the root of your project. If you installed the full `mkocansey/bladewind` package you can have Laravel generate this file for you:

```bash
php artisan vendor:publish --tag=bladewind-config --force
```

If you installed individual component packages (e.g. `mkocansey/bladewind-button`) the `bladewind-config` publish tag is not available. Simply create the file manually instead:

```bash
touch config/bladewind.php
```

Either way, you will end up with a `config/bladewind.php` file you can edit. You only need to define the components and attributes you want to change — you do not have to copy the full default configuration. Every BladewindUI component is defined as an array key with some default values. Whatever attributes you wish to define as a default should be defined within its corresponding tag's array key. The code below is for the above example where we want all our buttons to be small, have no focus rings, and not be uppercase.

```php
// config/bladewind.php

return [
    // ...

    /*
    |--------------------------------------------------------------------------
    | Button component
    |--------------------------------------------------------------------------
    */
    'button' => [
        'size' => 'small',
        'show_focus_ring' => false,
        'uppercasing' => false,
        'radius' => 'medium',
        'tag' => 'button',

        // define default attributes for all circular buttons
        'circle' => [
            'size' => 'regular',
        ],
    ],

    // ...
];
```

> **Warning:** Ensure the attribute spelling as defined in the docs matches what you define in the config file. For example, the docs use `show_focus_ring` — the same attribute must be defined in the config file.

> **Error:** Always clear your configuration cache if you make any changes to the configuration file by running the command below from the root of your project.

```bash
php artisan config:clear
```
