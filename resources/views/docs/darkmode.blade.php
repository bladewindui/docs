<x-app>
    <x-slot:title>Customizing Dark Mode</x-slot:title>
    <x-slot:page_title>Dark Mode Support</x-slot:page_title>

    <p>
        BladewindUI ships with support for dark mode for all components. The dark mode colour palette is defined
        in its <code class="inline">tailwind.css</code> file as shown below.
    </p>
    <p>

    </p>
    <pre class="language-js line-numbers">
    <code>
    // your-project/vendor/mkocansey/bladewind/tailwind.css
    @theme {
        ...
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
    <br />

    <p>
        BladewindUI does not use specific colours for its dark mode definitions, instead, it uses the <code class="inline">dark</code> alias, thus, any colour defined for the <code class="inline">dark</code> your project's <code class="inline">@theme</code> block in <code class="inline">app.css</code> file will be used.
    </p>
<p>
    To change the colour used for dark mode, simply define overwriting values in your project's <code class="inline">app.css</code>.
</p>
    <pre class="language-js line-numbers" data-line="5">
    <code>
        // your-project/resources/css/app.css
        @theme {
            ...
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
            ...
        }
    </code>
    </pre>
    <br />

    <h2 id="selector">Base Colour and DarkMode Selector</h2>
    <h3>Base Colour</h3>
    <p>
        Considering every user can have their own base colour when building for dark mode support, the BladewindUI components had to make an assumption
        of a base dark mode colour and build on top of that. We built on top the colour scale of <code class="inline">bg-dark-700 (#262a2f)</code>.
        This means, in dark mode, we assume your main container has a background colour of <code class="inline">bg-dark-700</code>.
        Where <code class="inline">dark</code> is replaced with the colour defined in your project's <code class="inline">@theme</code> block in <code class="inline">app.css</code>.
    </p>
    <h3>darkMode Selector</h3>
    <p>
        The dark mode classes in BladewindUI are compiled using the <code class="inline">class</code> selector by setting <code class="inline">@variant dark (&:where(.dark, .dark *))</code>.
        It is important to set <code class="inline">@custom-variant dark (&:where(.dark, .dark *));</code> in your project's <code class="inline">app.css</code> to ensure the styles take effect.
        The styles will likely not work if your dark mode is based on <code class="inline">prefers-color-scheme</code>.
    </p>
    <br />
    <x-bladewind::alert show_close_icon="false">
        You might encounter compilation errors if you do not define your dark mode colours as <a href="/customize/colours">described here</a>.
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#selector">Base colour and darkMode selector</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.darkmode');
        </script>
    </x-slot>
</x-app>
