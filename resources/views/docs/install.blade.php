<x-app>
    <x-slot:title>Getting Started</x-slot:title>
    <x-slot:page_title>Getting Started</x-slot:page_title>

    <p>
        BladewindUI is a collection of UI components built with TailwindCSS, Laravel Blade templates, and vanilla JavaScript.
        Every component is simple to use and ships with sensible defaults you can override per-project.
    </p>

    <h3 id="requirements">Requirements</h3 id="requirements">
    <div class="pl-5">
    <li>PHP &gt;= 8.0</li>
    <li class="py-2">Laravel &gt;= 9.x</li>
    <li>TailwindCSS >= 4.x</li>
    </div>

    <h2 id="install">Installation Options</h2>
    <p>
        There are three ways to install BladewindUI depending on how much of the library you need.
    </p>

    <h3 id="install-all">Install everything </h3>
    <p>
        Pull in every component at once. This is the easiest way to get started and is ideal for new projects or if you want to explore the full library.
    </p>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind</code></pre>

    <h3 id="install-group">Install a component group</h3>
    <p>
        Components are organised into three groups. Install a group when you only need a logical subset of BladewindUI.
        See the <a href="#groups">component groups</a> section below for exactly which components each group contains.
    </p>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind-forms</code></pre>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind-content</code></pre>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind-navigation</code></pre>

    <h3 id="install-single">Install a single component</h3>
    <p>
        The library also allows users to pick only the components they need.
        This is ideal for existing projects where you want to introduce BladewindUI gradually, or if you only need one or two components.
    </p>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind-table</code></pre>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind-accordion</code></pre>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind-datepicker</code></pre>
    <p>
        All shared dependencies—such as the Icon, Spinner, and core helper utilities—are automatically installed by Composer when you require any BladewindUI package. You do not need to install or configure these dependencies yourself; Composer’s dependency resolution ensures everything required is available and up to date.
    </p>

    <h2 id="setup">First-time Setup</h2>
    <p>
        After installing, publish the compiled CSS, JavaScript, and language files to your project's <code class="inline">public</code> directory.
    </p>
    <pre class="lang-bash command-line"><code>php artisan vendor:publish --tag=bladewind-public --force</code></pre>
{{--    <pre class="lang-bash command-line"><code>php artisan vendor:publish --tag=bladewind-lang --force</code></pre>--}}

    <x-bladewind::alert show_close_icon="false" type="warning">
        Always republish assets when you update to a new version of BladewindUI — CSS and JS are updated regularly. See <a href="#update">Updating BladewindUI</a> below.
    </x-bladewind::alert>

    <br />
    <p>
        Add the stylesheet to the <code class="inline">&lt;head&gt;</code> of your layout file.
        Your own CSS should come <em>after</em> the BladewindUI stylesheet so your customisations take effect.
    </p>
    <pre class="language-markup">
        <code>
            &lt;link href="&#123;&#123; asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" /&gt;
        </code>
    </pre>
    <p>
        Add the JavaScript anywhere before the closing <code class="inline">&lt;/body&gt;</code> tag.
    </p>
    <pre class="language-markup">
        <code>
            &lt;script src="&#123;&#123; asset('vendor/bladewind/js/helpers.js') }}"&gt;&lt;/script&gt;
        </code>
    </pre>
    <p>You are ready to use any BladewindUI component in your application.</p>
    <br />
    <p class="text-center">
        <x-bladewind::button>Save User</x-bladewind::button>
    </p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button&gt;Save User&lt;/x-bladewind::button&gt;
        </code>
    </pre>

    <p>
        <x-bladewind::alert show_close_icon="false">
            You can define your primary, secondary, and dark-mode colours in your project's <code class="inline">tailwind.config.js</code> file.
            More on <a href="/customize/colours">customising colours</a> here.
        </x-bladewind::alert>
    </p>

    <h2 id="publishing">Publishing Components</h2>
    <p>
        The double-colon syntax (<code class="inline">x-bladewind::button</code>) serves views directly from the package's
        <code class="inline">vendor</code> directory. To use the dot syntax instead, publish the component views to your own
        <code class="inline">resources/views/components/bladewind</code> directory:
    </p>
    <pre class="lang-bash command-line"><code>php artisan vendor:publish --tag=bladewind-components --force</code></pre>
    <p>You can then call components using the dot syntax:</p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind.button&gt;Save User&lt;/x-bladewind.button&gt;
        </code>
    </pre>
    <x-bladewind::alert show_close_icon="false">
        If you use the dot syntax, republish the component views after every BladewindUI update.
    </x-bladewind::alert>

    <h2 id="groups">Component Groups</h2>
    <p>
        Components are organised into groups. Each group is a Composer metapackage — it contains no code of its own,
        just a list of dependencies. Installing a group is identical to installing every component in that group
        individually. Components can also be installed as standalone packages outside any group.
    </p>

    <h3 id="standalone">Standalone Packages</h3>
    <p>
        These components are not bundled into any group. They are pulled in automatically as dependencies by other
        components that need them, but you can also require them directly.
    </p>
    <x-bladewind::table>
        <x-slot name="header">
            <th>Component</th>
            <th>Composer package</th>
            <th>Includes</th>
        </x-slot>
        <tr>
            <td>Core</td>
            <td><code class="inline">mkocansey/bladewind-core</code></td>
            <td>Shared helpers, CSS variables, helpers.js</td>
        </tr>
        <tr>
            <td><a href="/component/icon">Icon</a></td>
            <td><code class="inline">mkocansey/bladewind-icon</code></td>
            <td>SVG icon wrapper (Heroicons)</td>
        </tr>
        <tr>
            <td><a href="/component/button">Button</a></td>
            <td><code class="inline">mkocansey/bladewind-button</code></td>
            <td>Button, Circle Button</td>
        </tr>
        <tr>
            <td><a href="/component/modal">Modal</a></td>
            <td><code class="inline">mkocansey/bladewind-modal</code></td>
            <td>Modal, Modal Icon</td>
        </tr>
        <tr>
            <td><a href="/component/alert">Alert</a></td>
            <td><code class="inline">mkocansey/bladewind-alert</code></td>
            <td>Alert, Notification, Bell</td>
        </tr>
        <tr>
            <td><a href="/component/spinner">Spinner</a></td>
            <td><code class="inline">mkocansey/bladewind-spinner</code></td>
            <td>Spinner, Shimmer, Processing, Process Complete</td>
        </tr>
        <tr>
            <td><a href="/component/table">Table</a></td>
            <td><code class="inline">mkocansey/bladewind-table</code></td>
            <td>Table, Table Icons</td>
        </tr>
    </x-bladewind::table>

    <h3 id="group-forms">Forms Group &mdash; <code class="inline">mkocansey/bladewind-forms</code></h3>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind-forms</code></pre>
    <x-bladewind::table>
        <x-slot name="header">
            <th>Component</th>
            <th>Composer package</th>
            <th>Includes</th>
        </x-slot>
        <tr>
            <td><a href="/component/input">Input</a></td>
            <td><code class="inline">mkocansey/bladewind-input</code></td>
            <td>Input, Error</td>
        </tr>
        <tr>
            <td><a href="/component/textarea">Textarea</a></td>
            <td><code class="inline">mkocansey/bladewind-textarea</code></td>
            <td>Textarea</td>
        </tr>
        <tr>
            <td><a href="/component/select">Select</a></td>
            <td><code class="inline">mkocansey/bladewind-select</code></td>
            <td>Select, Select Item</td>
        </tr>
        <tr>
            <td><a href="/component/checkbox">Checkbox</a></td>
            <td><code class="inline">mkocansey/bladewind-checkbox</code></td>
            <td>Checkbox</td>
        </tr>
        <tr>
            <td><a href="/component/radio-button">Radio Button</a></td>
            <td><code class="inline">mkocansey/bladewind-radio</code></td>
            <td>Radio Button</td>
        </tr>
        <tr>
            <td><a href="/component/toggle">Toggle</a></td>
            <td><code class="inline">mkocansey/bladewind-toggle</code></td>
            <td>Toggle</td>
        </tr>
        <tr>
            <td><a href="/component/datepicker">Datepicker</a></td>
            <td><code class="inline">mkocansey/bladewind-datepicker</code></td>
            <td>Datepicker</td>
        </tr>
        <tr>
            <td><a href="/component/timepicker">Timepicker</a></td>
            <td><code class="inline">mkocansey/bladewind-timepicker</code></td>
            <td>Timepicker</td>
        </tr>
        <tr>
            <td><a href="/component/colorpicker">Colorpicker</a></td>
            <td><code class="inline">mkocansey/bladewind-colorpicker</code></td>
            <td>Colorpicker</td>
        </tr>
        <tr>
            <td><a href="/component/filepicker">Filepicker</a></td>
            <td><code class="inline">mkocansey/bladewind-filepicker</code></td>
            <td>Filepicker (powered by FilePond)</td>
        </tr>
        <tr>
            <td><a href="/component/slider">Slider</a></td>
            <td><code class="inline">mkocansey/bladewind-slider</code></td>
            <td>Slider</td>
        </tr>
        <tr>
            <td><a href="/component/checkcard">Checkcards</a></td>
            <td><code class="inline">mkocansey/bladewind-checkcards</code></td>
            <td>Checkcards, Checkcard</td>
        </tr>
        <tr>
            <td><a href="/component/number">Number</a></td>
            <td><code class="inline">mkocansey/bladewind-number</code></td>
            <td>Number stepper</td>
        </tr>
        <tr>
            <td><a href="/component/verification-code">Verification Code</a></td>
            <td><code class="inline">mkocansey/bladewind-code</code></td>
            <td>Verification Code / OTP input</td>
        </tr>
    </x-bladewind::table>

    <h3 id="group-content">Content Group &mdash; <code class="inline">mkocansey/bladewind-content</code></h3>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind-content</code></pre>
    <x-bladewind::table>
        <x-slot name="header">
            <th>Component</th>
            <th>Composer package</th>
            <th>Includes</th>
        </x-slot>
        <tr>
            <td><a href="/component/card">Card</a></td>
            <td><code class="inline">mkocansey/bladewind-card</code></td>
            <td>Card, Contact Card</td>
        </tr>
        <tr>
            <td><a href="/component/avatar">Avatar</a></td>
            <td><code class="inline">mkocansey/bladewind-avatar</code></td>
            <td>Avatar, Avatars</td>
        </tr>
        <tr>
            <td><a href="/component/accordion">Accordion</a></td>
            <td><code class="inline">mkocansey/bladewind-accordion</code></td>
            <td>Accordion, Accordion Item</td>
        </tr>
        <tr>
            <td><a href="/component/tag">Tag</a></td>
            <td><code class="inline">mkocansey/bladewind-tag</code></td>
            <td>Tag, Tags</td>
        </tr>
        <tr>
            <td><a href="/component/timeline">Timeline</a></td>
            <td><code class="inline">mkocansey/bladewind-timeline</code></td>
            <td>Timeline, Timelines</td>
        </tr>
        <tr>
            <td><a href="/component/statistic">Statistic</a></td>
            <td><code class="inline">mkocansey/bladewind-statistic</code></td>
            <td>Statistic</td>
        </tr>
        <tr>
            <td><a href="/component/rating">Rating</a></td>
            <td><code class="inline">mkocansey/bladewind-rating</code></td>
            <td>Rating</td>
        </tr>
        <tr>
            <td><a href="/component/horizontal-line-graph">Horizontal Line Graph</a></td>
            <td><code class="inline">mkocansey/bladewind-horizontal-line-graph</code></td>
            <td>Horizontal Line Graph</td>
        </tr>
        <tr>
            <td><a href="/component/empty-state">Empty State</a></td>
            <td><code class="inline">mkocansey/bladewind-empty-state</code></td>
            <td>Empty State</td>
        </tr>
        <tr>
            <td><a href="/component/centered-content">Centered Content</a></td>
            <td><code class="inline">mkocansey/bladewind-centered-content</code></td>
            <td>Centered Content</td>
        </tr>
        <tr>
            <td><a href="/component/chart">Chart</a></td>
            <td><code class="inline">mkocansey/bladewind-chart</code></td>
            <td>Chart (line, bar, pie, donut)</td>
        </tr>
        <tr>
            <td><a href="/component/progress-bar">Progress</a></td>
            <td><code class="inline">mkocansey/bladewind-progress</code></td>
            <td>Progress Bar, Progress Circle</td>
        </tr>
        <tr>
            <td><a href="/component/list-view">List View</a></td>
            <td><code class="inline">mkocansey/bladewind-listview</code></td>
            <td>List View, List View Item</td>
        </tr>
    </x-bladewind::table>

    <h3 id="group-navigation">Navigation Group &mdash; <code class="inline">mkocansey/bladewind-navigation</code></h3>
    <pre class="lang-bash command-line"><code>composer require mkocansey/bladewind-navigation</code></pre>
    <x-bladewind::table>
        <x-slot name="header">
            <th>Component</th>
            <th>Composer package</th>
            <th>Includes</th>
        </x-slot>
        <tr>
            <td><a href="/component/tab">Tab</a></td>
            <td><code class="inline">mkocansey/bladewind-tab</code></td>
            <td>Tab, Tab Body, Tab Content, Tab Heading</td>
        </tr>
        <tr>
            <td><a href="/component/dropmenu">Dropmenu</a></td>
            <td><code class="inline">mkocansey/bladewind-dropmenu</code></td>
            <td>Dropmenu, Dropmenu Item</td>
        </tr>
        <tr>
            <td><a href="/component/theme-switcher">Theme Switcher</a></td>
            <td><code class="inline">mkocansey/bladewind-theme-switcher</code></td>
            <td>Theme Switcher (light / dark)</td>
        </tr>
    </x-bladewind::table>

    <h2 id="how-groups-work">How Groups Work</h2>
    <p>
        The three group packages (<code class="inline">bladewind-forms</code>, <code class="inline">bladewind-content</code>,
        <code class="inline">bladewind-navigation</code>) contain <strong>no code</strong> — they are pure Composer metapackages
        whose only job is to pull in the right leaf packages. This means:
    </p>
    <ul class="list-disc pl-6 space-y-2 my-4">
        <li>Installing <code class="inline">mkocansey/bladewind-content</code> is identical to installing every content leaf package individually.</li>
        <li>Uninstalling a group and requiring just one leaf package (e.g. <code class="inline">mkocansey/bladewind-accordion</code>) is clean and leaves nothing behind.</li>
        <li>Each leaf package registers its own Laravel service provider, so components are auto-discovered whether you install them individually or as part of a group.</li>
    </ul>

    <h2 id="customising">Customising Defaults</h2>
    <p>
        Every attribute in every component has a project-level default you can override once and have it apply everywhere.
        Publish the config file (available when using the full <code class="inline">mkocansey/bladewind</code> package):
    </p>
    <pre class="lang-bash command-line"><code>php artisan vendor:publish --tag=bladewind-config</code></pre>
    <p>
        This creates <code class="inline">config/bladewind.php</code> in your project. Edit any value there and all component
        instances will follow suit — no need to set the attribute on every tag.
        See the full <a href="/customize">customisation guide</a> for details.
    </p>

    <h2 id="update">Updating BladewindUI</h2>
    <p>
        Run <code class="inline">composer update</code> to pull in the latest version.
    </p>
    <pre class="lang-bash command-line"><code>composer update</code></pre>
    <p>
        Then republish the public assets to pick up any CSS or JavaScript changes:
    </p>
    <pre class="lang-bash command-line"><code>php artisan vendor:publish --tag=bladewind-public --force</code></pre>
    <p>
        If you are using the dot syntax, also republish the component views:
    </p>
    <pre class="lang-bash command-line"><code>php artisan vendor:publish --tag=bladewind-components --force</code></pre>

    <p>
        To automate both publish steps after every <code class="inline">composer update</code>, add the following to your
        <code class="inline">composer.json</code> under <code class="inline">scripts</code>:
    </p>
    <pre class="lang-js line-numbers" data-line="5,6">
        <code>
        "scripts": {
            "post-update-cmd": [
                "@php artisan vendor:publish --tag=laravel-assets --ansi",
                "@php artisan vendor:publish --tag=bladewind-public --force",
                // add this line only if you also publish component views
                "@php artisan vendor:publish --tag=bladewind-components --force"
            ]
        }
        </code>
    </pre>
    <x-bladewind::alert show_close_icon="false" type="warning">
        Any changes you have made to published BladewindUI component view files will be overwritten when you republish the components.
    </x-bladewind::alert>

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#requirements">Requirements</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#install">Install</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#install-all">Install everything</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#install-group">Install a group</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#install-single">Install a single component</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#setup">First-time setup</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#publishing">Publishing components</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#groups">Component groups</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#standalone">Standalone</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#group-forms">Forms</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#group-content">Content</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#group-navigation">Navigation</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#how-groups-work">How groups work</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#customising">Customising defaults</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#update">Updating BladewindUI</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.installation');
        </script>
    </x-slot>

</x-app>
