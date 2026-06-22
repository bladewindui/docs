---
title: Dark Mode Support
url: /customize/darkmode
---

# Dark Mode Support

BladewindUI ships with support for dark mode for all components. The dark mode colour palette is defined in its `tailwind.css` file as shown below.

```css
// your-project/vendor/mkocansey/bladewind/tailwind.css
@theme {
    /* ... */
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

BladewindUI does not use specific colours for its dark mode definitions. Instead, it uses the `dark` alias, so any colour defined for `dark` in your project's `@theme` block in `app.css` will be used.

To change the colour used for dark mode, simply define overwriting values in your project's `app.css`.

```css
// your-project/resources/css/app.css
@theme {
    /* ... */
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
    /* ... */
}
```

## Base Colour and darkMode Selector

### Base Colour

Considering every user can have their own base colour when building for dark mode support, BladewindUI components had to make an assumption of a base dark mode colour and build on top of that. We built on top of the colour scale of `bg-dark-700 (#262a2f)`. This means, in dark mode, we assume your main container has a background colour of `bg-dark-700`, where `dark` is replaced with the colour defined in your project's `@theme` block in `app.css`.

### darkMode Selector

The dark mode classes in BladewindUI are compiled using the `class` selector by setting `@variant dark (&:where(.dark, .dark *))`. It is important to set `@custom-variant dark (&:where(.dark, .dark *));` in your project's `app.css` to ensure the styles take effect. The styles will likely not work if your dark mode is based on `prefers-color-scheme`.

```css
/* resources/css/app.css */
@import "tailwindcss";

@custom-variant dark (&:where(.dark, .dark *));
```

Then toggle the `dark` class on your `<html>` element to switch modes. BladewindUI's [Theme Switcher](/component/theme-switcher) component handles this for you automatically.

> You might encounter compilation errors if you do not define your dark mode colours as [described in the Colours guide](/customize/colours).
