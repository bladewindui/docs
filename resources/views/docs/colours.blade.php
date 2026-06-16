<x-app>
    <x-slot:title>Customizing Theme Colours</x-slot:title>
    <x-slot:page_title>Theme Colours</x-slot:page_title>

    <p>BladewindUI ships with twelve colours from the TailwindCSS palette. The default colour used for the BladewindUI components is blue.</p>

    <div class="sm:grid-cols-6 grid grid-cols-3 gap-6">
        <div class="space-y-1">
            <div>Blue</div>
            <div class="w-24 bg-blue-500 h-10 rounded-md"></div>
            <div class="w-24 bg-blue-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Red</div>
            <div class="w-24 bg-red-600 h-10 rounded-md"></div>
            <div class="w-24 bg-red-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Amber</div>
            <div class="w-24 bg-amber-500 h-10 rounded-md"></div>
            <div class="w-24 bg-amber-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Emerald</div>
            <div class="w-24 bg-emerald-500 h-10 rounded-md"></div>
            <div class="w-24 bg-emerald-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Purple</div>
            <div class="w-24 bg-purple-500 h-10 rounded-md"></div>
            <div class="w-24 bg-purple-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Orange</div>
            <div class="w-24 bg-orange-500 h-10 rounded-md"></div>
            <div class="w-24 bg-orange-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Slate</div>
            <div class="w-24 bg-slate-500 h-10 rounded-md"></div>
            <div class="w-24 bg-slate-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Pink</div>
            <div class="w-24 bg-pink-500 h-10 rounded-md"></div>
            <div class="w-24 bg-pink-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Cyan</div>
            <div class="w-24 bg-cyan-500 h-10 rounded-md"></div>
            <div class="w-24 bg-cyan-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Violet</div>
            <div class="w-24 bg-violet-500 h-10 rounded-md"></div>
            <div class="w-24 bg-violet-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Indigo</div>
            <div class="w-24 bg-indigo-500 h-10 rounded-md"></div>
            <div class="w-24 bg-indigo-100 h-10 rounded-md"></div>
        </div>
        <div class="space-y-1">
            <div>Fuchsia</div>
            <div class="w-24 bg-fuchsia-500 h-10 rounded-md"></div>
            <div class="w-24 bg-fuchsia-100 h-10 rounded-md"></div>
        </div>
    </div>
    <p>&nbsp;</p>
    <p>
        You can tell from the palette above that BladewindUI uses <strong>Emerald</strong> for its green and <strong>Amber</strong> for its yellow.
        The default colour for all BladewindUI components is blue. If your primary theme is different, you can override it in a few steps.
        This assumes you have some basic knowledge of <a href="https://tailwindcss.com" target="_blank">Tailwind CSS</a>.
    </p>

    <h2 id="how-colours-work">How Colours Work in Tailwind v4</h2>
    <p>
        Tailwind CSS v4 moves all configuration out of <code class="inline">tailwind.config.js</code> and into your CSS file using the
        <code class="inline">@theme</code> directive. Colours are expressed as CSS custom properties following the naming pattern
        <code class="inline">--color-{name}-{shade}</code>.
    </p>
    <p>
        BladewindUI internally uses <code class="inline">primary</code> as the colour key for all component accents.
        Here is what the library's default theme definition looks like:
    </p>
    <pre class="language-css line-numbers" data-line="4">
<code>
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
</code>
    </pre>

    <h2 id="changing-colours">Changing the Primary Colour</h2>
    <p>
        To override the primary colour, redefine the <code class="inline">--color-primary-*</code> variables in your own
        <code class="inline">app.css</code> file after importing Tailwind. Your values will win because they appear later in the cascade.
    </p>
    <p>This documentation website uses indigo as its primary colour:</p>
    <pre class="language-css line-numbers" data-line="5">
<code>
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
</code>
    </pre>
    <p>
        You can use any hex, rgb, hsl, or oklch value. If you prefer a custom palette that does not map to a Tailwind built-in scale,
        simply supply your own hex values:
    </p>
    <pre class="language-css line-numbers">
<code>
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
</code>
    </pre>
    <p>
        All BladewindUI components read from the <code class="inline">primary</code> scale, so every component updates automatically
        without any further changes.
    </p>

    <h2 id="dark-mode">Dark Mode</h2>
    <p>
        BladewindUI ships dark-mode variants for every component. In Tailwind v4, class-based dark mode is configured with
        <code class="inline">@custom-variant</code> instead of the old <code class="inline">darkMode: 'class'</code> config key.
        Add this line once in your <code class="inline">app.css</code>, above your <code class="inline">@theme</code> block:
    </p>
    <pre class="language-css line-numbers">
<code>
/* resources/css/app.css */
@import "tailwindcss";

@custom-variant dark (&:where(.dark, .dark *));
</code>
    </pre>
    <p>
        Then toggle the <code class="inline">dark</code> class on your <code class="inline">&lt;html&gt;</code> element to switch modes.
        BladewindUI's <a href="/component/theme-switcher">Theme Switcher</a> component handles this for you automatically.
    </p>

    <h2 id="debug">Debug Compilation Issues</h2>
    <p>
    <x-bladewind::alert show_close_icon="false">
        Consider the information below if your styles don't seem to be compiling or components appear unstyled.
    </x-bladewind::alert>
    </p>
    <p>
        In Tailwind v4, class scanning is automatic for files inside your project. However, BladewindUI component files live inside
        <code class="inline">vendor/mkocansey/bladewind</code> and are not scanned by default. You need to add an
        <code class="inline">@source</code> directive so Tailwind knows to look there:
    </p>
    <pre class="language-css line-numbers" data-line="5">
<code>
/* resources/css/app.css */
@import "tailwindcss";

/* Tell Tailwind to scan vendor BladewindUI files */
@source "../../vendor/mkocansey/bladewind/**/*.blade.php";
@source "../../public/vendor/bladewind/js/*.js";
</code>
    </pre>
    <p>
        The paths are relative to your CSS file. If your <code class="inline">app.css</code> is at
        <code class="inline">resources/css/app.css</code>, two levels of <code class="inline">../../</code> will reach the project root.
        Adjust the depth if your CSS file is located elsewhere.
    </p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#how-colours-work">How colours work</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#changing-colours">Changing the primary colour</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#dark-mode">Dark mode</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#debug">Debug compile issues</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.colours');
        </script>
    </x-slot>
</x-app>
