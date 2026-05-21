---
title: Icon Component
component: x-bladewind::icon
url: /component/icon
---

# Icon

Display icons from [Heroicons](https://heroicons.com) or SVG files. Both solid and outline modes are supported when using icons from Heroicons. The default are outline icons. To display an icon from Heroicons, you will need to enter its name exactly as it is defined on the website.

By default this component sets all icons at `h-6` and `w-6`. You can override the icon size and colours using the standard TailwindCSS classes. You can in fact, add any TailwindCSS class to the icon.

```blade
<x-bladewind::icon name="swatch" />
```

```blade
<x-bladewind::icon
    name="video-camera-slash" class="!h-16 !w-16 text-amber-500" />
```

```blade
<x-bladewind::icon
    name="microphone"
    class="!h-14 !w-14 !text-white bg-pink-400 p-4 rounded-full
            cursor-pointer hover:bg-pink-500 hover:p-3" />
```

```blade
<x-bladewind::icon
    name="speaker-wave"
    class="!h-14 !w-14 text-cyan-500 p-3 animate-bounce rounded-md
            cursor-pointer bg-white border-2 border-cyan-500
            hover:bg-cyan-500 hover:text-white" />
```

## Solid Icons

Icons from Heroicons come in two versions, outline and solid. The BladewindUI Icon component by default uses `outline` versions of the icons. To display solid versions of your icons, you will need to specify the attribute `type="solid"`.

```blade
<x-bladewind::icon name="swatch" type="solid" />
```

```blade
<x-bladewind::icon
    name="video-camera-slash"
    type="solid"
    class="!h-16 !w-16 text-amber-500" />
```

### SVG Icons

So far all our icons have been from Heroicons. What if you have your own SVG icon tags from other websites you want to use? It is possible. Just paste the SVG tag in the `name` attribute of the icon and Bladewind will display it.

Note how the name attribute now uses single quotes and not double quotes.

```blade
<x-bladewind::icon name='<svg class="h-24 w-24 inline-block dark:!fill-dark-100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.72 9.56H5.78..." stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>' />
```

### SVG Image Files

BladewindUI serves all the Heroicon icons from `public > vendor > bladewind > icons > [solid, outline]`. As stated earlier, the default icons served are outlines, so the _outline_ directory is used. When you specify `type="solid"`, the _solid_ directory is used. You can place your own SVG files in either the outline or solid directories and then enter the file name (without .svg) in the name attribute of the component.

```blade
<x-bladewind::icon name="discount-shape"
    class="!h-24 !w-24 !fill-yellow-500 !stroke-yellow-300" />
```

```blade
<x-bladewind::icon
    name="message-notif"
    type="solid"
    class="!h-24 !w-24 !fill-green-300 !stroke-green-500" />
```

## Custom SVG Directory

If you place your icon files in the default BladewindUI directory specified above, it is likely your files will be overwritten anytime there is a Bladewind update and you publish the public files. To ensure you don't lose your custom icons, it is advised you place them in a directory in your `public` directory. You will need to specify the `dir` attribute.

Some TailwindCSS classes may not work on SVG files/icons that are not from Heroicons. SVG [fill](https://tailwindcss.com/docs/fill) and [stroke](https://tailwindcss.com/docs/stroke) classes were not working as expected in some cases.

```blade
<x-bladewind::icon
    name="discount-circle"
    dir="assets/images"
    class="h-24 w-24" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | _(blank)_ | The name of the icon (as defined on [Heroicons](https://heroicons.com)) to display. |
| type | outline | Determines what type of the icon to display. `outline` \| `solid` |
| dir | _(blank)_ | Path within the `public` directory to a custom SVG file directory. |
| class | h-6 w-6 inline-block | CSS classes for styling the icon. Accepts any [TailwindCSS](https://tailwindcss.com) classes applicable to SVGs. |

## Full Example

```blade
<x-bladewind::icon
    name="video-camera-slash"
    type="solid"
    dir="assets/images"
    class="h-16 w-16 text-amber-500" />
```
