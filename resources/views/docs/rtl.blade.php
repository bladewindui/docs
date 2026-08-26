<x-app>
    <x-slot:title>Right to Left (RTL) Support</x-slot:title>
    <x-slot:page_title>Right to Left (RTL) Support</x-slot:page_title>
    <p>
         All BladewindUI components that need to be respond to the rtl directive behave appropriately when the rtl
        directive is present on the page the components find themselves on. Below are exmaples of the various components
        and their equivalent display in rtl mode. This page has already set the rtl directive.
    </p>
    <h3>Buttons With Icons</h3>
    <pre class="language-markup">
        <code>
            &lt;<b>x-bladewind</b>::button&gt;Save User&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <p>
        Once you publish the BladewindUI components, the files get moved to the <code class="inline">resources > views > components > <span class="text-red-400">bladewind</span></code> directory.
        You can then use the dot, instead of the colon syntax to access a component.
    </p>
    <pre class="language-markup">
        <code>
            &lt;<b>x-bladewind</b>.button&gt;Save User&lt;/x-bladewind.button&gt;
        </code>
    </pre>
    <h2 id="noprefix">Getting rid of the <b class="font-bold">bladewind</b> prefix </h2>
    <p>
        It is possible to use any of the BladewindUI components without the bladewind prefix. This <code class="inline text-red-400">&lt;x-bladewind.button&gt;Save User&lt;/x-bladewind.button&gt;</code> becomes <code class="inline text-red-400">&lt;x-button&gt;Save User&lt;/x-button&gt;</code>.
        Achieving this is quite easy. This requires that you have run the command to <a href="/#publishing">publish Bladewind components</a> .
        Simply move all the blade files in <code class="inline">resources > views > components > bladewind</code> into <code class="inline">resources > views > components</code>.
        You can then delete the <span>bladewind</span> folder from your <code class="inline">resources > views > components</code> folder since it is technically empty at this point.
    </p>
    <p>
        <x-bladewind::alert type="warning" show_close_icon="false">
            Please note that this will overwrite any files you have in your <code class="text-sm">resources > views > components</code> directory with the same names as what you are copying over from <code class="text-sm">resources > views > components > bladewind</code>
        </x-bladewind::alert>
    </p>
    <h2 id="change-theme">If you are not into the Blues...</h2>
    <p>The default precompiled colour theme used for the BladewindUI components is blue. If your primary theme is not blue, you can change this in a few steps. This assumes you have some knowledge of <a href="https://tailwindcss.com" target="_blank">Tailwind CSS</a>.</p>
    <p>
        BladewindUI defines its dark mode colours, primary and secondary <a href="/component/button">button</a> colours, colours for the <a href="/component/alert">alert</a> and <a href="/component/notification">notification</a> components in its <code class="inline">tailwind.config.js</code> file.
    </p>
    <pre class="language-js line-numbers">
    <code>
        // your-project/vendor/bladewindui/bladewindui/tailwind.config.js
  theme: {
    extend: {
      colors: {
        primary: colors.blue,
        secondary: colors.slate,
        dark: colors.slate,
        success: colors.emerald,
        error: colors.red,
        warning: colors.amber,
        info: colors.blue
      }
},
    </code>
    </pre>
<p>
    To change the colours used above, simply define overwriting values in your project's <code class="inline">tailwind.config.js</code>.
</p>
    <pre class="language-js line-numbers" data-line="5">
    <code>
        // your-project/tailwind.config.js
  theme: {
    extend: {
      colors: {
        primary: colors.indigo,
        secondary: colors.zinc,
        dark: colors.gray,
        success: colors.green,
        error: colors.rose,
        warning: colors.orange,
        info: colors.blue
      }
},
    </code>
    </pre>
    <p>Following the changes above, now all your primary buttons will use the <b>indigo</b> colour palette instead of blue. Dark mode will use the gray palette instead of slate.</p>

    <h3>If you are feeling geeky</h3>
    <p>The changes to the Tailwind config should be enough to get you your right colours. If however, for some reason you are in your geeky elements and prefer to access all the uncompiled BladewindUI CSS files, you can run the command below.</p>
    <pre class="lang-bash command-line"><code>php artisan vendor:publish --provider="Mkocansey\Bladewind\BladewindServiceProvider" --tag=bladewind-assets --force</code></pre>
    <p>
        You should now have in your <code class="inline">public</code> directory, a <code class="inline">vendor > bladewind > <span class=" text-red-400">assets</span></code> folder containing all the uncompiled tailwind css files.
        You can modify these files to suit your theme specification.
        <a href="https://laravel.com/docs/9.x/mix" target="_blank">Refer to this article</a> if you are not familiar with compiling assets in Laravel.
    </p>
    <h2 id="change-it-all">You can change everything</h2>
    <p>Truly, you can! These components are in essence just Laravel blade templates that sit right in your project. If there are any implementations you are unhappy with, simply locate the particular blade template and dissect it at will.
        At the end of every component documentation page, you will find the name of the blade file that defines that component.
    </p>
    <p>
        <x-bladewind::alert type="info" show_close_icon="false">
        Something to keep in mind though. Most Bladewind updates we roll out may affect the blade files, css and js files.
        </x-bladewind::alert>
    </p>
    <p>
        Updates that touch the css and js files require the library's assets to be republished. Run the command below to republish the library's css and js files.
    </p>
     <pre class="lang-bash command-line"><code>php artisan vendor:publish --provider="Mkocansey\Bladewind\BladewindServiceProvider" --tag=bladewind-public --force</code></pre>
     <p>
         <x-bladewind::alert type="info" show_close_icon="false">
             To prevent any changes you made earlier from being overwritten by updates, we advise you to make all changes that overwrite Bladewind css classes in your project's css file instead of editing the Bladewind css file directly. Your project's css file should always be included <b>after</b> the Bladewind css file.
         </x-bladewind::alert>
     </p>
    <h2 id="datepicker-translations">Changing Datepicker Translations</h2>
    <p>
        The <a href="/component/datepicker">Datepicker component</a> is wired to speak a couple of languages. The language files are served from BladewindUI's vendor directory,
        <code class="inline">
            vendor > mkocansey > bladewind > lang
        </code>. Currently, the available languages are English, French, Italian, Arabic, German, Chinese and Indonesian. You can add more languages as you see fit or even modify the existing translations. If you want to do this for just your project you will first need to publish the language files by running the command below from the root of your project.
    </p>
    <pre class="lang-bash command-line"><code>php artisan vendor:publish --provider="Mkocansey\Bladewind\BladewindServiceProvider" --tag=bladewind-lang --force</code></pre><br />
    <p>
        The language files will now be available in your project's <code class="inline">lang > vendor > bladewind</code> directory. You can now add more languages or edit the language files that were published.
    </p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#noprefix">Remove the bladewind prefix</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#change-theme">Change the colour theme</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#change-it-all">Change everything</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#datepicker-translations">Translating the Datepicker</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.rtl');
        </script>
    </x-slot>
</x-app>
