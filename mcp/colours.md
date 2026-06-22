---
title: Theme Colours
url: /customize/colours
---

# Theme Colours

BladewindUI ships with twelve colours from the TailwindCSS palette. The default colour used for the BladewindUI components is **blue**.

The available colours are: Blue, Red, Amber, Emerald, Purple, Orange, Slate, Pink, Cyan, Violet, Indigo, and Fuchsia. BladewindUI uses **Emerald** for its green and **Amber** for its yellow.

The default colour for all BladewindUI components is blue. If your primary theme is different, you can override it in a few steps. This assumes you have some basic knowledge of [Tailwind CSS](https://tailwindcss.com).

## How Colours Work in Tailwind v4

Tailwind CSS v4 moves all configuration out of `tailwind.config.js` and into your CSS file using the `@theme` directive. Colours are expressed as CSS custom properties following the naming pattern `--color-{name}-{shade}`.

BladewindUI internally uses `primary` as the colour key for all component accents. Here is what the library's default theme definition looks like:

```css
/* vendor/mkocansey/bladewind — default theme */
@theme {
    /* primary → blue (default) */
    --color-primary-50:  #eff6ff;
    --color-primary-100: #dbeafe;
    --color-primary-200: #bfdbfe;
    --color-primary-300: #93c5fd;
    --color-primary-400: #60a5fa;
    --color-primary-500: #3b82f6;
    --color-primary-600: #2563eb;
    --color-primary-700: #1d4ed8;
    --color-primary-800: #1e40af;
    --color-primary-900: #1e3a8a;
    --color-primary-950: #172554;

    /* dark colour scale */
    --color-dark-100: #f0f1f2;
    --color-dark-200: #d2d4d7;
    --color-dark-300: #a7aaad;
    --color-dark-400: #6c7075;
    --color-dark-500: #4a4e53;
    --color-dark-600: #33373c;
    --color-dark-700: #262a2f;
    --color-dark-800: #1C1F24;
    --color-dark-900: #101114;
    --color-dark-950: #0a0b0d;
}
```

## Changing the Primary Colour

To override the primary colour, redefine the `--color-primary-*` variables in your own `app.css` file after importing Tailwind. Your values will win because they appear later in the cascade.

This documentation website uses indigo as its primary colour:

```css
/* resources/css/app.css */
@import "tailwindcss";

@theme {
    /* Override primary with indigo */
    --color-primary-50:  #eef2ff;
    --color-primary-100: #e0e7ff;
    --color-primary-200: #c7d2fe;
    --color-primary-300: #a5b4fc;
    --color-primary-400: #818cf8;
    --color-primary-500: #6366f1;
    --color-primary-600: #4f46e5;
    --color-primary-700: #4338ca;
    --color-primary-800: #3730a3;
    --color-primary-900: #312e81;
    --color-primary-950: #1e1b4b;
}
```

You can use any hex, rgb, hsl, or oklch value. If you prefer a custom palette that does not map to a Tailwind built-in scale, simply supply your own hex values:

```css
@theme {
    /* Custom purple palette */
    --color-primary-100: #f3e8ff;
    --color-primary-200: #e9d5ff;
    --color-primary-300: #d8b4fe;
    --color-primary-400: #c084fc;
    --color-primary-500: #a855f7;
    --color-primary-600: #9333ea;
    --color-primary-700: #7e22ce;
    --color-primary-800: #6d28d9;
    --color-primary-900: #4c1d95;
}
```

All BladewindUI components read from the `primary` scale, so every component updates automatically without any further changes.

## Dark Mode

BladewindUI ships dark-mode variants for every component. In Tailwind v4, class-based dark mode is configured with `@custom-variant` instead of the old `darkMode: 'class'` config key. Add this line once in your `app.css`, above your `@theme` block:

```css
/* resources/css/app.css */
@import "tailwindcss";

@custom-variant dark (&:where(.dark, .dark *));
```

Then toggle the `dark` class on your `<html>` element to switch modes. BladewindUI's [Theme Switcher](/component/theme-switcher) component handles this for you automatically. See the [Dark Mode guide](/customize/darkmode) for the full details.

## Debug Compilation Issues

> Consider the information below if your styles don't seem to be compiling or components appear unstyled.

In Tailwind v4, class scanning is automatic for files inside your project. However, BladewindUI component files live inside `vendor/mkocansey/bladewind` and are not scanned by default. You need to add an `@source` directive so Tailwind knows to look there:

```css
/* resources/css/app.css */
@import "tailwindcss";

/* Tell Tailwind to scan vendor BladewindUI files */
@source "../../vendor/mkocansey/bladewind/**/*.blade.php";
@source "../../public/vendor/bladewind/js/*.js";
```

The paths are relative to your CSS file. If your `app.css` is at `resources/css/app.css`, two levels of `../../` will reach the project root. Adjust the depth if your CSS file is located elsewhere.
