---
title: Theme Switcher Component
component: x-bladewind::theme-switcher
url: /component/theme-switcher
---

# Theme Switcher

Lets users switch between light, dark, and system themes without you building the switching mechanism yourself. Only one theme switcher should exist on a page.

## Basic Usage

```blade
<x-bladewind::theme-switcher />
```

There are a few customizations available; see the attributes below, and refer to the dark mode customization page for more.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| icon_right | true | Whether icons are placed on the left or right of the text. `true` \| `false` |
| icon_type | *blank* | Uses outline Heroicons by default; set to use solid icons instead. See the Icon component. |
| icon_dir | *blank* | Directory to load custom icons from instead of the Heroicons defaults. See the Icon component. |
| light_icon | sun | Icon displayed next to "Light". Any Heroicons icon or custom icon. |
| dark_icon | moon | Icon displayed next to "Dark". Any Heroicons icon or custom icon. |
| system_icon | computer-desktop | Icon displayed next to "System". Any Heroicons icon or custom icon. |
| light_text | Light | Word displayed next to the light icon. Translatable at the app level. |
| dark_text | Dark | Word displayed next to the dark icon. Translatable at the app level. |
| system_text | System | Word displayed next to the system icon. Translatable at the app level; some prefer "Auto". |
| nonce | null | Nonce for content security policies on inline scripts. Can be set globally via `config/bladewind.php` under `script`. |

## Full Example

```blade
<x-bladewind::theme-switcher
    icon_right="false"
    icon_dir="assets/icons"
    icon_type="solid"
    light_text="Light Mode"
    light_icon="bulb"
    dark_text="Dark Mode"
    dark_icon="sun-shades"
    system_text="Auto Mode"
    system_icon="day-night" />
```
