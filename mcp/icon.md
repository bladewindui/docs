---
title: Icon Component
component: x-bladewind::icon
url: /component/icon
---

# Icon

Display icons from Heroicons, or your own SVG. Both solid and outline Heroicon styles are supported; outline is the default. To use a Heroicon, enter its name exactly as defined on the Heroicons website.

## Basic Usage

```blade
<x-bladewind::icon name="swatch" />
```

By default icons are sized `h-6 w-6`. Override size and colour with standard TailwindCSS classes — any TailwindCSS class can be added to the icon.

```blade
<x-bladewind::icon name="video-camera-slash" class="!h-16 !w-16 text-amber-500" />

<x-bladewind::icon name="microphone" class="!h-14 !w-14 !text-white bg-pink-400 p-4 rounded-full cursor-pointer hover:bg-pink-500" />

<x-bladewind::icon name="speaker-wave" class="!h-14 !w-14 text-cyan-500 p-3 animate-bounce rounded-md cursor-pointer bg-white border-2 border-cyan-500 hover:bg-cyan-500 hover:text-white" />
```

## Solid Icons

Set `type="solid"` to use the solid version of a Heroicon instead of the default outline.

```blade
<x-bladewind::icon name="swatch" type="solid" />

<x-bladewind::icon
    name="video-camera-slash"
    type="solid"
    class="!h-16 !w-16 text-amber-500" />
```

## SVG Icons

Paste a raw SVG tag into the `name` attribute to render your own icon instead of a Heroicon. Use single quotes around `name` when doing this, since the SVG markup itself contains double quotes.

```blade
<x-bladewind::icon name='<svg class="h-24 w-24 inline-block dark:!fill-dark-100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.72 9.56H5.78C3.7 9.56 2 7.86003 2 5.78003C2 3.70003 3.7 2 5.78 2H7.67001..." stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>' />
```

### SVG Image Files

BladewindUI serves Heroicon icons from `public/vendor/bladewind/icons/[solid, outline]`. You can place your own SVG files in either directory and reference them by file name (without `.svg`) in `name`; use `type="solid"` to load from the solid directory.

```blade
<x-bladewind::icon name="discount-shape" class="!h-24 !w-24 !fill-yellow-500 !stroke-yellow-300" />

<x-bladewind::icon
    name="message-notif"
    type="solid"
    class="!h-24 !w-24 !fill-green-300 !stroke-green-500" />
```

Some TailwindCSS `fill` and `stroke` classes may not behave as expected on SVGs that aren't from Heroicons.

## Custom SVG Directory

Files in the default BladewindUI icon directories can be overwritten on a Bladewind update when you republish public files. Place custom icons in your own `public` directory instead and set the `dir` attribute.

```blade
<x-bladewind::icon
    name="discount-circle"
    dir="assets/images"
    class="h-24 w-24" />
```

## Sizing Icons

Use the `size` attribute rather than reaching for a utility class. It accepts a named size, or any Tailwind sizing utility verbatim for something in between.

```blade
<x-bladewind::icon name="user" size="tiny" />
<x-bladewind::icon name="user" size="small" />
<x-bladewind::icon name="user" size="regular" />
<x-bladewind::icon name="user" size="medium" /> {{-- the default --}}
<x-bladewind::icon name="user" size="big" />
<x-bladewind::icon name="user" size="large" />
<x-bladewind::icon name="user" size="size-[18px]" />
```

A `size-`, `h-`, or `w-` class in the `class` attribute still wins over `size`, since that was the only way to size an icon before this attribute existed.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | *blank* | Name of the icon (as defined on Heroicons) to display, or a raw SVG tag. |
| type | outline | Type of icon to display. `outline` \| `solid` |
| class | h-6 w-6 inline-block | CSS classes for the icon. Accepts any TailwindCSS classes applicable to SVGs. |
| size | *blank* | Size of the icon. Named size or any Tailwind sizing utility, used verbatim. `tiny` (size-3) \| `small` (size-4) \| `regular` (size-5) \| `medium` (size-6) \| `big` (size-8) \| `large` (size-10). A `size-`, `h-`, or `w-` class in `class` takes precedence over this. |

## Full Example

```blade
<x-bladewind::icon
    name="video-camera-slash"
    type="solid"
    dir="assets/images"
    class="h-16 w-16 text-amber-500" />
```
