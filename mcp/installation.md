---
title: Installation & Getting Started
url: /install
---

# Getting Started

BladewindUI is a collection of UI components built with TailwindCSS, Laravel Blade templates, and vanilla JavaScript. Every component is simple to use and ships with sensible defaults you can override per-project.

## Requirements

- PHP >= 8.0
- Laravel >= 9.x
- TailwindCSS >= 4.x

## Installation Options

There are three ways to install BladewindUI depending on how much of the library you need.

### Install everything

Pull in every component at once. This is the easiest way to get started and is ideal for new projects or if you want to explore the full library.

```bash
composer require mkocansey/bladewind
```

### Install a component group

Components are organised into three groups. Install a group when you only need a logical subset of BladewindUI. See [Component Groups](#component-groups) below for exactly which components each group contains.

```bash
composer require mkocansey/bladewind-forms
composer require mkocansey/bladewind-content
composer require mkocansey/bladewind-navigation
```

### Install a single component

The library also allows you to pick only the components you need. This is ideal for existing projects where you want to introduce BladewindUI gradually, or if you only need one or two components.

```bash
composer require mkocansey/bladewind-table
composer require mkocansey/bladewind-accordion
composer require mkocansey/bladewind-datepicker
```

All shared dependencies — such as the Icon, Spinner, and core helper utilities — are automatically installed by Composer when you require any BladewindUI package. You do not need to install or configure these dependencies yourself.

## First-time Setup

After installing, publish the compiled CSS, JavaScript, and language files to your project's `public` directory.

```bash
php artisan vendor:publish --tag=bladewind-public --force
```

> **Warning:** Always republish assets when you update to a new version of BladewindUI — CSS and JS are updated regularly. See [Updating BladewindUI](#updating-bladewindui) below.

Add the stylesheet to the `<head>` of your layout file. Your own CSS should come *after* the BladewindUI stylesheet so your customisations take effect.

```blade
<link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
```

Add the JavaScript anywhere before the closing `</body>` tag.

```blade
<script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
```

You are now ready to use any BladewindUI component in your application.

```blade
<x-bladewind::button>Save User</x-bladewind::button>
```

> You can define your primary, secondary, and dark-mode colours in your project's CSS. More on [customising colours](/customize/colours).

## Publishing Components

The double-colon syntax (`x-bladewind::button`) serves views directly from the package's `vendor` directory. To use the dot syntax instead, publish the component views to your own `resources/views/components/bladewind` directory:

```bash
php artisan vendor:publish --tag=bladewind-components --force
```

You can then call components using the dot syntax:

```blade
<x-bladewind.button>Save User</x-bladewind.button>
```

> If you use the dot syntax, republish the component views after every BladewindUI update.

## Component Groups

Components are organised into groups. Each group is a Composer metapackage — it contains no code of its own, just a list of dependencies. Installing a group is identical to installing every component in that group individually. Components can also be installed as standalone packages outside any group.

### Standalone Packages

These components are not bundled into any group. They are pulled in automatically as dependencies by other components that need them, but you can also require them directly.

| Component | Composer package | Includes |
|---|---|---|
| Core | `mkocansey/bladewind-core` | Shared helpers, CSS variables, helpers.js |
| Icon | `mkocansey/bladewind-icon` | SVG icon wrapper (Heroicons) |
| Button | `mkocansey/bladewind-button` | Button, Circle Button |
| Modal | `mkocansey/bladewind-modal` | Modal, Modal Icon |
| Alert | `mkocansey/bladewind-alert` | Alert, Notification, Bell |
| Spinner | `mkocansey/bladewind-spinner` | Spinner, Shimmer, Processing, Process Complete |
| Table | `mkocansey/bladewind-table` | Table, Table Icons |

### Forms Group — `mkocansey/bladewind-forms`

```bash
composer require mkocansey/bladewind-forms
```

| Component | Composer package | Includes |
|---|---|---|
| Input | `mkocansey/bladewind-input` | Input, Error |
| Textarea | `mkocansey/bladewind-textarea` | Textarea |
| Select | `mkocansey/bladewind-select` | Select, Select Item |
| Checkbox | `mkocansey/bladewind-checkbox` | Checkbox |
| Radio Button | `mkocansey/bladewind-radio` | Radio Button |
| Toggle | `mkocansey/bladewind-toggle` | Toggle |
| Datepicker | `mkocansey/bladewind-datepicker` | Datepicker |
| Timepicker | `mkocansey/bladewind-timepicker` | Timepicker |
| Colorpicker | `mkocansey/bladewind-colorpicker` | Colorpicker |
| Filepicker | `mkocansey/bladewind-filepicker` | Filepicker (powered by FilePond) |
| Slider | `mkocansey/bladewind-slider` | Slider |
| Checkcards | `mkocansey/bladewind-checkcards` | Checkcards, Checkcard |
| Number | `mkocansey/bladewind-number` | Number stepper |
| Verification Code | `mkocansey/bladewind-code` | Verification Code / OTP input |

### Content Group — `mkocansey/bladewind-content`

```bash
composer require mkocansey/bladewind-content
```

| Component | Composer package | Includes |
|---|---|---|
| Card | `mkocansey/bladewind-card` | Card, Contact Card |
| Avatar | `mkocansey/bladewind-avatar` | Avatar, Avatars |
| Accordion | `mkocansey/bladewind-accordion` | Accordion, Accordion Item |
| Tag | `mkocansey/bladewind-tag` | Tag, Tags |
| Timeline | `mkocansey/bladewind-timeline` | Timeline, Timelines |
| Statistic | `mkocansey/bladewind-statistic` | Statistic |
| Rating | `mkocansey/bladewind-rating` | Rating |
| Horizontal Line Graph | `mkocansey/bladewind-horizontal-line-graph` | Horizontal Line Graph |
| Empty State | `mkocansey/bladewind-empty-state` | Empty State |
| Centered Content | `mkocansey/bladewind-centered-content` | Centered Content |
| Chart | `mkocansey/bladewind-chart` | Chart (line, bar, pie, donut) |
| Progress | `mkocansey/bladewind-progress` | Progress Bar, Progress Circle |
| List View | `mkocansey/bladewind-listview` | List View, List View Item |
| Sortable | `mkocansey/bladewind-sortable` | Sortable, Sortable Item |
| Popover | `mkocansey/bladewind-popover` | Popover |
| Tooltip | `mkocansey/bladewind-tooltip` | Tooltip |

### Navigation Group — `mkocansey/bladewind-navigation`

```bash
composer require mkocansey/bladewind-navigation
```

| Component | Composer package | Includes |
|---|---|---|
| Tab | `mkocansey/bladewind-tab` | Tab, Tab Body, Tab Content, Tab Heading |
| Dropmenu | `mkocansey/bladewind-dropmenu` | Dropmenu, Dropmenu Item |
| Theme Switcher | `mkocansey/bladewind-theme-switcher` | Theme Switcher (light / dark) |

## How Groups Work

The three group packages (`bladewind-forms`, `bladewind-content`, `bladewind-navigation`) contain **no code** — they are pure Composer metapackages whose only job is to pull in the right leaf packages. This means:

- Installing `mkocansey/bladewind-content` is identical to installing every content leaf package individually.
- Uninstalling a group and requiring just one leaf package (e.g. `mkocansey/bladewind-accordion`) is clean and leaves nothing behind.
- Each leaf package registers its own Laravel service provider, so components are auto-discovered whether you install them individually or as part of a group.

## Customising Defaults

Every attribute in every component has a project-level default you can override once and have it apply everywhere. Publish the config file (available when using the full `mkocansey/bladewind` package):

```bash
php artisan vendor:publish --tag=bladewind-config
```

This creates `config/bladewind.php` in your project. Edit any value there and all component instances will follow suit — no need to set the attribute on every tag. See the full [customisation guide](/customize) for details.

## Updating BladewindUI

Run `composer update` to pull in the latest version.

```bash
composer update
```

Then republish the public assets to pick up any CSS or JavaScript changes:

```bash
php artisan vendor:publish --tag=bladewind-public --force
```

If you are using the dot syntax, also republish the component views:

```bash
php artisan vendor:publish --tag=bladewind-components --force
```

To automate both publish steps after every `composer update`, add the following to your `composer.json` under `scripts`:

```json
"scripts": {
    "post-update-cmd": [
        "@php artisan vendor:publish --tag=laravel-assets --ansi",
        "@php artisan vendor:publish --tag=bladewind-public --force",
        "@php artisan vendor:publish --tag=bladewind-components --force"
    ]
}
```

> **Warning:** Any changes you have made to published BladewindUI component view files will be overwritten when you republish the components.
