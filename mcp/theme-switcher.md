---
title: Theme Switcher Component
component: x-bladewind::theme-switcher
url: /component/theme-switcher
---

# Theme Switcher

It is common practice these days to build web sites/apps that allow users to switch between dark and light modes. This is one of those Bladewind components that takes away the headache of building your own theme switching mechanism.

There can be only one theme switcher on a page. The Bladwind docs uses the theme switcher in the top right corner of the website.

```blade
<x-bladewind::theme-switcher />
```

There are a few customizations available. See the full list of attributes below. Also refer to our [dark mode customization page](/customize#dark-mode) for more.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| `icon_right` | `true` | Should the icons be placed on the left or right of the text. `true` `false` |
| `icon_type` | *blank* | By default the outline icons from Heroicons are used. You can use the solid icons if you prefer. See details about this on the [Icon component](/component/icon#solid-icons) page. |
| `icon_dir` | *blank* | If you plan on using custom icons instead of the defaults from Heroicons, specify the directory these icons will be loaded from. See details about this on the [Icon component](/component/icon#custom-dir) page. |
| `light_icon` | `sun` | The icon displayed next to the word, Light. Use any icon from Heroicons or your [custom icons](/component/icon#custom-dir). |
| `dark_icon` | `moon` | The icon displayed next to the word, Dark. Use any icon from Heroicons or your [custom icons](/component/icon#custom-dir). |
| `system_icon` | `computer-desktop` | The icon displayed next to the word, System. Use any icon from Heroicons or your [custom icons](/component/icon#custom-dir). |
| `light_text` | `Light` | Word displayed next to the light icon. This is provided as an option to make this translatable at your app level. |
| `dark_text` | `Dark` | Word displayed next to the dark icon. This is provided as an option to make this translatable at your app level. |
| `system_text` | `System` | Word displayed next to the system icon. This is provided as an option to make this translatable at your app level. Some people prefer to use 'Auto'. |
| `nonce` | `null` | Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your `nonce` value in the `config/bladewind.php` file under the "script" key. This value will be used everywhere nonce is required. |

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
