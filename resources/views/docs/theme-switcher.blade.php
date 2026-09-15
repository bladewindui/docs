<x-app>
    <x-slot:title>Theme Switcher Component</x-slot:title>
    <x-slot:page_title>Theme Switcher</x-slot:page_title>

    <p>
        It is common practice these days to build web sites/apps that allow users to switch between dark and light modes.
        This is one of those Bladewind components that takes away the headache of building your own theme switching mechanism.
    </p>

    <p>
        There can be only one theme switcher on a page. The Bladwind docs uses the theme switcher in the top right corner of the website.
    </p>
    @php
        $themeUswitcherExample1 = <<<'HTML'
            <x-bladewind::theme-switcher  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$themeUswitcherExample1"></x-bladewind::code-block>
    <p>
        There are a few customizations available. See the full list of attributes below. Also refer to our <a href="/customize#dark-mode">dark mode customization page</a> for more.
    </p>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Textarea component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>icon_right</td>
            <td>true</td>
            <td>
                Should the icons be placed on the left or right of the text.
                <br /><br /> <code class="inline">true</code> <code class="inline">false</code>
            </td>
        </tr>
        <tr>
            <td>icon_type</td>
            <td><em>blank</em></td>
            <td>By default the outline icons from Heroicons are used. You can use the solid icons if you prefer.
                See details about this on the <a href="/component/icon#solid-icons">Icon component</a> page.
            </td>
        </tr>
        <tr>
            <td>icon_dir</td>
            <td><em>blank</em></td>
            <td>If you plan on using custom icons instead of the defaults from Heroicons, specify the directory these icons will be loaded from.
                See details about this on the <a href="/component/icon#custom-dir">Icon component</a> page.
            </td>
        </tr>
        <tr>
            <td>light_icon</td>
            <td>sun</td>
            <td>The icon displayed next to the word, Light. Use any icon from Heroicons or your <a href="/component/icon#custom-dir">custom icons</a>.</td>
        </tr>
        <tr>
            <td>dark_icon</td>
            <td>moon</td>
            <td>The icon displayed next to the word, Dark. Use any icon from Heroicons or your <a href="/component/icon#custom-dir">custom icons</a>.</td>
        </tr>
        <tr>
            <td>system_icon</td>
            <td>computer-desktop</td>
            <td>The icon displayed next to the word, System. Use any icon from Heroicons or your <a href="/component/icon#custom-dir">custom icons</a>.</td>
        </tr>
        <tr>
            <td>light_text</td>
            <td>Light</td>
            <td>Word displayed next to the light icon. This is provided as an option to make this translatable at your app level.</td>
        </tr>
        <tr>
            <td>dark_text</td>
            <td>Dark</td>
            <td>Word displayed next to the dark icon. This is provided as an option to make this translatable at your app level.</td>
        </tr>
        <tr>
            <td>system_text</td>
            <td>System</td>
            <td>Word displayed next to the system icon. This is provided as an option to make this translatable at your app level. Some people prefer to use 'Auto'.</td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>
    <p>&nbsp;</p>
    <h3 class="pb-2 ">Theme Switcher with all attributes defined</h3>
    @php
        $themeUswitcherExample2 = <<<'HTML'
            <x-bladewind::theme-switcher
                icon_right="false"
                icon_dir="assets/icons"
                icon_type="solid"
                light_text="Light Mode"
                light_icon="bulb
                dark_text="Dark Mode"
                dark_icon="sun-shades"
                system_text="Auto Mode"
                system_icon="day-night" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$themeUswitcherExample2"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > theme-switcher.blade.php</code>
    </x-bladewind::alert>
    <p>&nbsp;</p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-theme-switcher');
        </script>
    </x-slot>
</x-app>
