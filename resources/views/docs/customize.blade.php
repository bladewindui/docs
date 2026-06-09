<x-app>
    <x-slot:title>Customizing BladewindUI</x-slot:title>
    <x-slot:page_title>Customizing BladewindUI</x-slot:page_title>
    <p>
        BladewindUI is designed to work seamlessly with your existing project components. Once installed, all BladewindUI
        components are served directly from your project’s vendor directory.  Each component resides in its own Composer
        package, such as <code class="inline">vendor/mkocansey/bladewind-button</code> or
        <code class="inline">vendor/mkocansey/bladewind-table</code>. However, they all share
        the same <code class="inline text-red-400">bladewind::</code> view namespace.  This Laravel convention means you’ll need to type the <code class="inline text-red-400">&lt;x-bladewind</code> prefix every time you use a BladewindUI component.
    </p>
    <pre class="language-markup">
        <code>
            &lt;<b>x-bladewind</b>::button&gt;Save User&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <p>
        Once you <a href="/#publishing">publish</a> the BladewindUI components, the files get moved to your project's <code class="inline">resources > views > components > <span class="text-red-400">bladewind</span></code> directory.
        You can then use the dot, instead of the colon syntax to access a component.
    </p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind.button&gt;Save User&lt;/x-bladewind.button&gt;
        </code>
    </pre>
    <h2 id="noprefix">Getting rid of the <b class="font-bold">bladewind</b> prefix </h2>
    <p>It is possible to get rid of the bladewind prefix entirely. </p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind.button&gt;Save User&lt;/x-bladewind.button&gt;

            // or

            &lt;x-bladewind::button&gt;Save User&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    becomes
    <pre class="language-markup">
        <code>
            &lt;x.button&gt;Save User&lt;/x-button&gt;
        </code>
    </pre>
    <p>
        To achieve this, you should have already <a href="/#publishing">published the Bladewind components</a>. Next you will move all the blade files in <code class="inline">resources > views > components > bladewind</code> into <code class="inline">resources > views > components</code>.
        You can then delete the <span>bladewind</span> folder from your <code class="inline">resources > views > components</code> folder since it should technically be empty at this point.
    </p>
    <p>
        <x-bladewind::alert type="warning" show_close_icon="false">
            Please note that any existing components in your <code class="text-sm">resources > views > components</code> directory with the same name as what you are moving from the <code class="text-sm">resources > views > components > bladewind</code> directory, will be overwritten.
        </x-bladewind::alert>
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
     <pre class="lang-bash command-line"><code>php artisan vendor:publish --tag=bladewind-public --force</code></pre>
     <p>
         <x-bladewind::alert type="info" show_close_icon="false">
             To prevent any changes you made earlier from being overwritten by updates, we advise you to make all changes that overwrite Bladewind css classes in your project's css file instead of editing the Bladewind css file directly. Your project's css file should always be included <b>after</b> the Bladewind css file.
         </x-bladewind::alert>
     </p>
    <h2 id="datepicker-translations">Changing Datepicker Translations</h2>
    <p>
        The <a href="/component/datepicker">Datepicker component</a> is wired to speak a couple of languages. The language files are part of the <code class="inline">bladewind-core</code> package and are served from
        <code class="inline">
            vendor > mkocansey > bladewind-core > lang
        </code>. Currently the available languages contributed by the community are English, French, Italian, Arabic, German, Chinese, Spanish and Indonesian. You can add more languages as you see fit or even modify the existing translations. If you want to do this for just your project you will first need to publish the language files by running the command below from the root of your project.
        You can <a href="/contribute">contribute</a> a new language translation.
    </p>
    <pre class="lang-bash command-line"><code>php artisan vendor:publish --tag=bladewind-lang --force</code></pre><br />
    <p>
        The language files will now be available in your project's <code class="inline">lang > vendor > bladewind</code> directory. You can now add more languages or edit the language files that were published.
    </p>

    <h2 id="defaults">Setting Global Defaults</h2>
    <p>
        The BladewindUI library has made some default UI decisions which may be different from what you need in your projects. For example, all <a href="/component/tag">Tag</a> and <a href="/component/button">Button</a>
        component texts are always uppercase. To make them lowercase, you will need to set <code class="inline text-red-500">uppercasing="false"</code>.
        If you need all your buttons in lowercase, that means you will be typing a lot of <code class="inline text-red-500">uppercasing="false"</code>.
        Now what if you also need all your buttons to be <b>small</b> and to have <b>no focus rings</b>, your code every time will be
    </p>
    <pre class="lang-markup">
        <code> &lt;x-bladewind::button show_focus_ring="false" size="small" uppercasing="false"&gt
            Save
        &lt;/x-bladewind::button&gt;</code>
    </pre>
    <p>
        This is tedious. Won't it be great to just type the code below to get a button looking the way you'd want for your project?
    </p>
    <pre class="lang-markup">
        <code> &lt;x-bladewind::button&gtSave&lt;/x-bladewind::button&gt;</code>
    </pre>
    <p>
        To achieve this, create a <code class="inline">config/bladewind.php</code> file in the root of your project. If you installed the full
        <code class="inline">mkocansey/bladewind</code> package you can have Laravel generate this file for you:
    </p>
    <pre class="lang-bash"><code>php artisan vendor:publish --tag=bladewind-config --force</code></pre>
    <p>
        If you installed individual component packages (e.g. <code class="inline">mkocansey/bladewind-button</code>) the <code class="inline">bladewind-config</code>
        publish tag is not available. Simply create the file manually instead:
    </p>
    <pre class="lang-bash"><code>touch config/bladewind.php</code></pre>
    <p>
        Either way, you will end up with a <code class="inline">config/bladewind.php</code> file you can edit.
        You only need to define the components and attributes you want to change. You do not have to copy the full default configuration.
        Every BladewindUI component is defined as an array key with some default values. Whatever attributes you wish to define as a default should be
        defined within its corresponding tag's array key. The code below is for the above example where we want all our buttons to be small, have no
        focus rings and not be uppercase.
    </p>
    <p>
    <pre class="lang-php">
    <code>
        // config/bladewind.php

    ...

    /*
    |--------------------------------------------------------------------------
    | Button component
    |--------------------------------------------------------------------------
    */
    'button' => [
        'size' => 'small',
        'show_focus_ring' => false,
        'uppercasing' => false,
        'radius' => 'medium',
        'tag' => 'button',

        // define default attributes for all circular buttons
        'circle' => [
            'size' => 'regular',
        ]
    ],
    ...
    </code>
    </pre>
    </p>
    <x-bladewind::alert type="warning" show_close_icon="false">
        It is very important to ensure the attribute spelling as defined in the docs matches what you define in the config file.
        Example, we have in the docs show_focus_ring. The same attribute must be defined in the config file.
    </x-bladewind::alert>
    <br />
    <x-bladewind::alert type="error" show_close_icon="false">
        Remember to always to clear your configuration cache if you make any changes to the configuration file by running the command below from the root of your project.
    </x-bladewind::alert>
    <pre class="lang-bash"><code>php artisan config:clear</code></pre>
    <br />
    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#noprefix">Remove bladewind prefix</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#change-it-all">Change everything</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#datepicker-translations">Translating the Datepicker</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#defaults">Setting global defaults</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.customization');
        </script>
    </x-slot>
</x-app>
