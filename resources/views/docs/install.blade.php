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
    @php
        $installExample1 = <<<'HTML'
            composer require bladewindui/ui
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample1"></x-bladewind::code-block>

    <h3 id="install-group">Install a component group</h3>
    <p>
        Components are organised into three groups. Install a group when you only need a logical subset of BladewindUI.
        See the <a href="#groups">component groups</a> section below for exactly which components each group contains.
    </p>
    @php
        $installExample2 = <<<'HTML'
            composer require bladewindui/forms
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample2"></x-bladewind::code-block>
    @php
        $installExample3 = <<<'HTML'
            composer require bladewindui/content
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample3"></x-bladewind::code-block>
    @php
        $installExample4 = <<<'HTML'
            composer require bladewindui/navigation
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample4"></x-bladewind::code-block>

    <h3 id="install-single">Install a single component</h3>
    <p>
        The library also allows users to pick only the components they need.
        This is ideal for existing projects where you want to introduce BladewindUI gradually, or if you only need one or two components.
    </p>
    @php
        $installExample5 = <<<'HTML'
            composer require bladewindui/table
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample5"></x-bladewind::code-block>
    @php
        $installExample6 = <<<'HTML'
            composer require bladewindui/accordion
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample6"></x-bladewind::code-block>
    @php
        $installExample7 = <<<'HTML'
            composer require bladewindui/datepicker
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample7"></x-bladewind::code-block>
    <p>
        All shared dependencies, such as the Icon, Spinner, and core helper utilities, are automatically installed by Composer when you require any BladewindUI package. You do not need to install or configure these dependencies yourself; Composer’s dependency resolution ensures everything required is available and up to date.
    </p>

    <h2 id="setup">First-time Setup</h2>
    <p>
        After installing, publish the compiled CSS, JavaScript, and language files to your project's <code class="inline">public</code> directory.
    </p>
    @php
        $installExample8 = <<<'HTML'
            php artisan vendor:publish --tag=bladewind-public --force
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample8"></x-bladewind::code-block>
{{--    @php
        $installExample9 = <<<'HTML'
            php artisan vendor:publish --tag=bladewind-lang --force
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample9"></x-bladewind::code-block>--}}

    <x-bladewind::alert show_close_icon="false" type="warning">
        Always republish assets when you update to a new version of BladewindUI. CSS and JS are updated regularly. See <a href="#update">Updating BladewindUI</a> below.
    </x-bladewind::alert>

    <br />
    <p>
        Add the stylesheet to the <code class="inline">&lt;head&gt;</code> of your layout file.
        Your own CSS should come <em>after</em> the BladewindUI stylesheet so your customisations take effect.
    </p>
    @php
        $installExample10 = <<<'HTML'
            <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$installExample10"></x-bladewind::code-block>

    <h3 id="no-preflight">If your app already has its own Tailwind build</h3>
    <p>
        The stylesheet above ships Tailwind's Preflight, a global reset including
        <code class="inline">*,::before,::after &#123; border: 0 solid }</code>. That is the right
        thing for a page whose only stylesheet is BladewindUI, and the wrong thing for an app
        that already compiles its own Tailwind: the document gets reset twice, in an order
        nobody controls. Use the Preflight-free variant instead.
    </p>
    @php
        $installExample11 = <<<'HTML'
            <link href="{{ asset('vendor/bladewind/css/bladewind-ui-no-preflight.min.css') }}" rel="stylesheet" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$installExample11"></x-bladewind::code-block>
    <p>
        The component rules in the two files are identical, because both are built from one
        shared source, so they cannot drift. The variant only drops the global reset. Tailwind's
        forms base styles stay in, because the components are built on them.
    </p>
    <x-bladewind::alert show_close_icon="false">
        Load one or the other, never both. If you are not sure which you need, start with
        <code class="inline">bladewind-ui.min.css</code>; reach for the variant only if adding
        BladewindUI visibly changes your own components.
    </x-bladewind::alert>
    <p>
        Add the JavaScript anywhere before the closing <code class="inline">&lt;/body&gt;</code> tag.
        The <code class="inline">@@bladewindScripts</code> directive emits the tags for you.
    </p>
    @php
        $installExample12 = <<<'HTML'
            BWATSIGNPLACEHOLDERBWATSIGNPLACEHOLDERbladewindScripts
            HTML;
        $installExample12 = str_replace('BWATSIGNPLACEHOLDER', '@', $installExample12);
    @endphp
    <x-bladewind::code-block language="markup" :code="$installExample12"></x-bladewind::code-block>
    <p>
        That gives you <code class="inline">helpers.js</code>, which every component assumes.
        Components with their own JavaScript take their name as an argument:
    </p>
    @php
        $installExample13 = <<<'HTML'
            BWATSIGNPLACEHOLDERBWATSIGNPLACEHOLDERbladewindScripts('select', 'dropmenu', 'datepicker')
            HTML;
        $installExample13 = str_replace('BWATSIGNPLACEHOLDER', '@', $installExample13);
    @endphp
    <x-bladewind::code-block language="markup" :code="$installExample13"></x-bladewind::code-block>
    <p>
        Recognised names are <code class="inline">select</code>,
        <code class="inline">dropmenu</code>, <code class="inline">datepicker</code>,
        <code class="inline">table</code>, <code class="inline">notification</code>,
        <code class="inline">mask</code>, <code class="inline">animations</code>,
        <code class="inline">sortable</code> and <code class="inline">tooltip</code>. An
        unrecognised name is ignored rather than
        breaking the page, and a nonce set in
        <code class="inline">config('bladewind.script.nonce')</code> is applied to every tag.
    </p>
    <x-bladewind::alert show_close_icon="false">
        Chart, Filepicker and the image cropper are not in that list on purpose. Those
        components load their own dependencies when they render, so a page that does not use
        them never fetches them.
    </x-bladewind::alert>
    <p>
        Writing the tags by hand still works, if you prefer:
    </p>
    @php
        $installExample14 = <<<'HTML'
            <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$installExample14"></x-bladewind::code-block>
    <p>
        Helper functions such as <code class="inline">showModal()</code> and
        <code class="inline">hideModal()</code> are available on
        <code class="inline">window</code>, so you can call them from your own scripts and
        inline handlers without any extra wiring.
    </p>
    <p>You are ready to use any BladewindUI component in your application.</p>
    <br />
    <p class="text-center">
        <x-bladewind::button>Save User</x-bladewind::button>
    </p>
    @php
        $installExample15 = <<<'HTML'
            <x-bladewind::button>Save User</x-bladewind::button>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$installExample15"></x-bladewind::code-block>

    <p>
        <x-bladewind::alert show_close_icon="false">
            You can define your primary, secondary, and dark-mode colours in your project's <code class="inline">tailwind.config.js</code> file.
            More on <a href="/customize/colours">customising colours</a> here.
        </x-bladewind::alert>
    </p>

    <h2 id="csp">Content Security Policy</h2>
    <p>
        BladewindUI works under a strict <code class="inline">script-src</code> without
        <code class="inline">'unsafe-inline'</code>. No component attaches its behaviour with
        an inline <code class="inline">onclick</code> or similar. Those are bound as
        delegated listeners instead, which a CSP allows.
    </p>
    <p>
        Set your nonce once and every script tag the library emits carries it:
    </p>
    @php
        $installExample16 = <<<'HTML'
                // config/bladewind.php

            'script' => [
                'nonce' => fn () => request()->attributes->get('csp-nonce'),
            ],
            HTML;
    @endphp
    <x-bladewind::code-block language="php" :code="$installExample16"></x-bladewind::code-block>
    <p>
        Individual components also take a <code class="inline">nonce</code> attribute if you
        would rather pass it per component.
    </p>
    <x-bladewind::alert type="warning" show_close_icon="false">
        One thing still needs <code class="inline">'unsafe-inline'</code>: attributes where
        <em>you</em> supply the JavaScript. <code class="inline">onclick</code> on a button,
        <code class="inline">action</code> on an icon, <code class="inline">url</code> on a
        card, <code class="inline">click</code> on a table action icon. Passing a string
        of JavaScript is inherently inline, so the library renders it as given. Use a delegated
        listener of your own if you need those under a strict policy.
    </x-bladewind::alert>

    <h2 id="publishing">Publishing Components</h2>
    <p>
        The double-colon syntax (<code class="inline">x-bladewind::button</code>) serves views directly from the package's
        <code class="inline">vendor</code> directory. To use the dot syntax instead, publish the component views to your own
        <code class="inline">resources/views/components/bladewind</code> directory:
    </p>
    @php
        $installExample17 = <<<'HTML'
            php artisan vendor:publish --tag=bladewind-components --force
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample17"></x-bladewind::code-block>
    <p>You can then call components using the dot syntax:</p>
    @php
        $installExample18 = <<<'HTML'
            <x-bladewind.button>Save User</x-bladewind.button>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$installExample18"></x-bladewind::code-block>
    <x-bladewind::alert show_close_icon="false">
        If you use the dot syntax, republish the component views after every BladewindUI update.
    </x-bladewind::alert>

    <h2 id="groups">Component Groups</h2>
    <p>
        Components are organised into groups. Each group is a Composer metapackage: it contains no code of its own,
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
            <td><a href="/component/breadcrumbs">Breadcrumbs</a></td>
            <td><code class="inline">bladewindui/breadcrumbs</code></td>
            <td>Breadcrumbs, Breadcrumbs Item</td>
        </tr>
        <tr>
            <td><a href="/component/stepper">Stepper</a></td>
            <td><code class="inline">bladewindui/stepper</code></td>
            <td>Stepper, Stepper Item, Stepper Content</td>
        </tr>
        <tr>
            <td><a href="/component/sidebar">Sidebar</a></td>
            <td><code class="inline">bladewindui/sidebar</code></td>
            <td>Sidebar, Sidebar Group, Sidebar Item</td>
        </tr>
        <tr>
            <td><a href="/component/command-palette">Command Palette</a></td>
            <td><code class="inline">bladewindui/command-palette</code></td>
            <td>Command Palette, Command Palette Group, Command Palette Item</td>
        </tr>
        <tr>
            <td>Core</td>
            <td><code class="inline">bladewindui/core</code></td>
            <td>Shared helpers, CSS variables, helpers.js</td>
        </tr>
        <tr>
            <td><a href="/component/icon">Icon</a></td>
            <td><code class="inline">bladewindui/icon</code></td>
            <td>SVG icon wrapper (Heroicons)</td>
        </tr>
        <tr>
            <td><a href="/component/button">Button</a></td>
            <td><code class="inline">bladewindui/button</code></td>
            <td>Button, Circle Button</td>
        </tr>
        <tr>
            <td><a href="/component/modal">Modal</a></td>
            <td><code class="inline">bladewindui/modal</code></td>
            <td>Modal, Modal Icon</td>
        </tr>
        <tr>
            <td><a href="/component/drawer">Drawer</a></td>
            <td><code class="inline">bladewindui/drawer</code></td>
            <td>Drawer</td>
        </tr>
        <tr>
            <td><a href="/component/alert">Alert</a></td>
            <td><code class="inline">bladewindui/alert</code></td>
            <td>Alert, Notification, Bell</td>
        </tr>
        <tr>
            <td><a href="/component/spinner">Spinner</a></td>
            <td><code class="inline">bladewindui/spinner</code></td>
            <td>Spinner, Shimmer, Processing, Process Complete</td>
        </tr>
        <tr>
            <td><a href="/component/table">Table</a></td>
            <td><code class="inline">bladewindui/table</code></td>
            <td>Table, Table Icons</td>
        </tr>
        <tr>
            <td><a href="/component/data-grid">Data Grid</a></td>
            <td><code class="inline">bladewindui/data-grid</code></td>
            <td>Data Grid</td>
        </tr>
        <tr>
            <td><a href="/component/calendar">Calendar</a></td>
            <td><code class="inline">bladewindui/calendar</code></td>
            <td>Calendar</td>
        </tr>
    </x-bladewind::table>

    <h3 id="group-forms">Forms Group: <code class="inline">bladewindui/forms</code></h3>
    @php
        $installExample19 = <<<'HTML'
            composer require bladewindui/forms
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample19"></x-bladewind::code-block>
    <x-bladewind::table>
        <x-slot name="header">
            <th>Component</th>
            <th>Composer package</th>
            <th>Includes</th>
        </x-slot>
        <tr>
            <td><a href="/component/input">Input</a></td>
            <td><code class="inline">bladewindui/input</code></td>
            <td>Input, Error</td>
        </tr>
        <tr>
            <td><a href="/component/textarea">Textarea</a></td>
            <td><code class="inline">bladewindui/textarea</code></td>
            <td>Textarea</td>
        </tr>
        <tr>
            <td><a href="/component/select">Select</a></td>
            <td><code class="inline">bladewindui/select</code></td>
            <td>Select, Select Item</td>
        </tr>
        <tr>
            <td><a href="/component/checkbox">Checkbox</a></td>
            <td><code class="inline">bladewindui/checkbox</code></td>
            <td>Checkbox</td>
        </tr>
        <tr>
            <td><a href="/component/radio-button">Radio Button</a></td>
            <td><code class="inline">bladewindui/radio</code></td>
            <td>Radio Button</td>
        </tr>
        <tr>
            <td><a href="/component/toggle">Toggle</a></td>
            <td><code class="inline">bladewindui/toggle</code></td>
            <td>Toggle</td>
        </tr>
        <tr>
            <td><a href="/component/datepicker">Datepicker</a></td>
            <td><code class="inline">bladewindui/datepicker</code></td>
            <td>Datepicker</td>
        </tr>
        <tr>
            <td><a href="/component/timepicker">Timepicker</a></td>
            <td><code class="inline">bladewindui/timepicker</code></td>
            <td>Timepicker</td>
        </tr>
        <tr>
            <td><a href="/component/colorpicker">Colorpicker</a></td>
            <td><code class="inline">bladewindui/colorpicker</code></td>
            <td>Colorpicker</td>
        </tr>
        <tr>
            <td><a href="/component/filepicker">Filepicker</a></td>
            <td><code class="inline">bladewindui/filepicker</code></td>
            <td>Filepicker (powered by FilePond)</td>
        </tr>
        <tr>
            <td><a href="/component/slider">Slider</a></td>
            <td><code class="inline">bladewindui/slider</code></td>
            <td>Slider</td>
        </tr>
        <tr>
            <td><a href="/component/checkcard">Checkcards</a></td>
            <td><code class="inline">bladewindui/checkcards</code></td>
            <td>Checkcards, Checkcard</td>
        </tr>
        <tr>
            <td><a href="/component/number">Number</a></td>
            <td><code class="inline">bladewindui/number</code></td>
            <td>Number stepper</td>
        </tr>
        <tr>
            <td><a href="/component/verification-code">Verification Code</a></td>
            <td><code class="inline">bladewindui/code</code></td>
            <td>Verification Code / OTP input</td>
        </tr>
    </x-bladewind::table>

    <h3 id="group-content">Content Group: <code class="inline">bladewindui/content</code></h3>
    @php
        $installExample20 = <<<'HTML'
            composer require bladewindui/content
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample20"></x-bladewind::code-block>
    <x-bladewind::table>
        <x-slot name="header">
            <th>Component</th>
            <th>Composer package</th>
            <th>Includes</th>
        </x-slot>
        <tr>
            <td><a href="/component/card">Card</a></td>
            <td><code class="inline">bladewindui/card</code></td>
            <td>Card, Contact Card</td>
        </tr>
        <tr>
            <td><a href="/component/avatar">Avatar</a></td>
            <td><code class="inline">bladewindui/avatar</code></td>
            <td>Avatar, Avatars</td>
        </tr>
        <tr>
            <td><a href="/component/accordion">Accordion</a></td>
            <td><code class="inline">bladewindui/accordion</code></td>
            <td>Accordion, Accordion Item</td>
        </tr>
        <tr>
            <td><a href="/component/tag">Tag</a></td>
            <td><code class="inline">bladewindui/tag</code></td>
            <td>Tag, Tags</td>
        </tr>
        <tr>
            <td><a href="/component/timeline">Timeline</a></td>
            <td><code class="inline">bladewindui/timeline</code></td>
            <td>Timeline, Timelines</td>
        </tr>
        <tr>
            <td><a href="/component/statistic">Statistic</a></td>
            <td><code class="inline">bladewindui/statistic</code></td>
            <td>Statistic</td>
        </tr>
        <tr>
            <td><a href="/component/rating">Rating</a></td>
            <td><code class="inline">bladewindui/rating</code></td>
            <td>Rating</td>
        </tr>
        <tr>
            <td><a href="/component/horizontal-line-graph">Horizontal Line Graph</a></td>
            <td><code class="inline">bladewindui/horizontal-line-graph</code></td>
            <td>Horizontal Line Graph</td>
        </tr>
        <tr>
            <td><a href="/component/empty-state">Empty State</a></td>
            <td><code class="inline">bladewindui/empty-state</code></td>
            <td>Empty State</td>
        </tr>
        <tr>
            <td><a href="/component/centered-content">Centered Content</a></td>
            <td><code class="inline">bladewindui/centered-content</code></td>
            <td>Centered Content</td>
        </tr>
        <tr>
            <td><a href="/component/chart">Chart</a></td>
            <td><code class="inline">bladewindui/chart</code></td>
            <td>Chart (line, bar, pie, donut)</td>
        </tr>
        <tr>
            <td><a href="/component/progress-bar">Progress</a></td>
            <td><code class="inline">bladewindui/progress</code></td>
            <td>Progress Bar, Progress Circle</td>
        </tr>
        <tr>
            <td><a href="/component/list-view">List View</a></td>
            <td><code class="inline">bladewindui/listview</code></td>
            <td>List View, List View Item</td>
        </tr>
        <tr>
            <td><a href="/component/drawer">Drawer</a></td>
            <td><code class="inline">bladewindui/drawer</code></td>
            <td>Drawer</td>
        </tr>
    </x-bladewind::table>

    <h3 id="group-navigation">Navigation Group: <code class="inline">bladewindui/navigation</code></h3>
    @php
        $installExample21 = <<<'HTML'
            composer require bladewindui/navigation
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample21"></x-bladewind::code-block>
    <x-bladewind::table>
        <x-slot name="header">
            <th>Component</th>
            <th>Composer package</th>
            <th>Includes</th>
        </x-slot>
        <tr>
            <td><a href="/component/breadcrumbs">Breadcrumbs</a></td>
            <td><code class="inline">bladewindui/breadcrumbs</code></td>
            <td>Breadcrumbs, Breadcrumbs Item</td>
        </tr>
        <tr>
            <td><a href="/component/stepper">Stepper</a></td>
            <td><code class="inline">bladewindui/stepper</code></td>
            <td>Stepper, Stepper Item, Stepper Content</td>
        </tr>
        <tr>
            <td><a href="/component/sidebar">Sidebar</a></td>
            <td><code class="inline">bladewindui/sidebar</code></td>
            <td>Sidebar, Sidebar Group, Sidebar Item</td>
        </tr>
        <tr>
            <td><a href="/component/command-palette">Command Palette</a></td>
            <td><code class="inline">bladewindui/command-palette</code></td>
            <td>Command Palette, Command Palette Group, Command Palette Item</td>
        </tr>
        <tr>
            <td><a href="/component/tab">Tab</a></td>
            <td><code class="inline">bladewindui/tab</code></td>
            <td>Tab, Tab Body, Tab Content, Tab Heading</td>
        </tr>
        <tr>
            <td><a href="/component/dropmenu">Dropmenu</a></td>
            <td><code class="inline">bladewindui/dropmenu</code></td>
            <td>Dropmenu, Dropmenu Item</td>
        </tr>
        <tr>
            <td><a href="/component/theme-switcher">Theme Switcher</a></td>
            <td><code class="inline">bladewindui/theme-switcher</code></td>
            <td>Theme Switcher (light / dark)</td>
        </tr>
    </x-bladewind::table>

    <h2 id="how-groups-work">How Groups Work</h2>
    <p>
        The three group packages (<code class="inline">bladewindui/forms</code>, <code class="inline">bladewindui/content</code>,
        <code class="inline">bladewindui/navigation</code>) contain <strong>no code</strong>: they are pure Composer metapackages
        whose only job is to pull in the right leaf packages. This means:
    </p>
    <ul class="list-disc pl-6 space-y-2 my-4">
        <li>Installing <code class="inline">bladewindui/content</code> is identical to installing every content leaf package individually.</li>
        <li>Uninstalling a group and requiring just one leaf package (e.g. <code class="inline">bladewindui/accordion</code>) is clean and leaves nothing behind.</li>
        <li>Each leaf package registers its own Laravel service provider, so components are auto-discovered whether you install them individually or as part of a group.</li>
    </ul>

    <h2 id="customising">Customising Defaults</h2>
    <p>
        Every attribute in every component has a project-level default you can override once and have it apply everywhere.
        Publish the config file (available when using the full <code class="inline">bladewindui/ui</code> package):
    </p>
    @php
        $installExample22 = <<<'HTML'
            php artisan vendor:publish --tag=bladewind-config
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample22"></x-bladewind::code-block>
    <p>
        This creates <code class="inline">config/bladewind.php</code> in your project. Edit any value there and all component
        instances will follow suit. No need to set the attribute on every tag.
        See the full <a href="/customize">customisation guide</a> for details.
    </p>

    <h2 id="update">Updating BladewindUI</h2>
    <p>
        Run <code class="inline">composer update</code> to pull in the latest version.
    </p>
    @php
        $installExample23 = <<<'HTML'
            composer update
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample23"></x-bladewind::code-block>
    <p>
        Then republish the public assets to pick up any CSS or JavaScript changes:
    </p>
    @php
        $installExample24 = <<<'HTML'
            php artisan vendor:publish --tag=bladewind-public --force
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample24"></x-bladewind::code-block>
    <p>
        If you are using the dot syntax, also republish the component views:
    </p>
    @php
        $installExample25 = <<<'HTML'
            php artisan vendor:publish --tag=bladewind-components --force
            HTML;
    @endphp
    <x-bladewind::code-block language="bash" :code="$installExample25"></x-bladewind::code-block>

    <p>
        To automate both publish steps after every <code class="inline">composer update</code>, add the following to your
        <code class="inline">composer.json</code> under <code class="inline">scripts</code>:
    </p>
    @php
        $installExample26 = <<<'HTML'
            "scripts": {
                "post-update-cmd": [
                    "BWATSIGNPLACEHOLDERphp artisan vendor:publish --tag=laravel-assets --ansi",
                    "BWATSIGNPLACEHOLDERphp artisan vendor:publish --tag=bladewind-public --force",
                    // add this line only if you also publish component views
                    "BWATSIGNPLACEHOLDERphp artisan vendor:publish --tag=bladewind-components --force"
                ]
            }
            HTML;
        $installExample26 = str_replace('BWATSIGNPLACEHOLDER', '@', $installExample26);
    @endphp
    <x-bladewind::code-block language="javascript" line_numbers="true" highlight_lines="5,6" :code="$installExample26"></x-bladewind::code-block>
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
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#no-preflight">Apps with their own Tailwind</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#csp">Content Security Policy</a></div>
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
