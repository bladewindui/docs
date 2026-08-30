<x-app>
    <x-slot:title>Roadmap</x-slot:title>
    <x-slot:page_title>Roadmap</x-slot:page_title>
    <p>
        There's a heap of goodies yet to be added to BladewindUI.
        The timeline focuses more on releases instead of release dates. Users are encouraged to <a href="/contribute">contribute</a> to move us closer to releases quicker.
    </p><h1 class="w-0 h-0" id="250"></h1>
    <p>
        <x-bladewind::alert show_close_icon="false" type="info">
            The roadmap below is very flexible and not cast in stone. Contributors can pick and work now on features scheduled for later releases.
        </x-bladewind::alert>
    </p>
    <x-bladewind::timelines position="left" anchor="big" stacked>
        <x-bladewind::timeline date="all completed" completed>
            <x-slot:content>
                <ul class="list-outside list-disc leading-8 ml-3 text-base">
                    <li>See <a href="https://github.com/bladewindui/ui/releases" target="_blank">release notes</a> for all completed versions</li>
                </ul>
            </x-slot:content>
        </x-bladewind::timeline>

        <x-bladewind::timeline date="2.6.0">
            <x-slot:content>
                <ul class="list-outside list-disc leading-8 ml-3 text-base">
                    <li>Add drag-n-drop to <a href="/component/filepicker">File Picker</a> with ability to upload multiple files.</li>
                    <li>Add a Pagination component.</li>
                    <li>Add a basic toolbar to the <a href="/component/textarea">Textarea</a> component.</li>
                    <li>Add option for column headings in the <a href="/component/table">Table</a> component to be sticky.</li>
                    <li>Add column divider option to the <a href="/component/table">Table</a> component.</li>
                    <li><a href="/component/table">Table</a> component should allow grouping of rows by a heading.<h1 class="w-0 h-0" id="26x"></h1></li>
                    <li>Add table border option to the <a href="/component/table">Table</a> component.</li>
                    <li><a href="/component/table">Table</a> component should allow for selectable rows. Clicking selects the entire row.</li>
                </ul>
            </x-slot:content>
        </x-bladewind::timeline>

        <x-bladewind::timeline date="2.6.x">
            <x-slot:content>
                <ul class="list-outside list-disc leading-8 ml-3 text-base">
                    <li>Fix any issues from 2.6.0 release.</li>
                    <li><a href="/component/progress-bar">Progress Bar</a> component should have an animated progression.</li>
                    <li><a href="/component/progress-bar">Progress Bar</a> component should allow striped bars.<h1 class="w-0 h-0" id="270"></h1></li>
                    <li>Add GitHub tab style to the <a href="/component/tab">Tab</a> component.</li>
                </ul>
            </x-slot:content>
        </x-bladewind::timeline>

        <x-bladewind::timeline date="2.7.0">
            <x-slot:content>
                <ul class="list-outside list-disc leading-8 ml-3 text-base">
                    <li>Add Vertical and Horizontal step components.</li>
                    <li>Add Placeholder component.</li>
                    <li>The <a href="/component/avatar">Avatar</a> component borders/rings should be customizable.<h1 class="w-0 h-0" id="27x"></h1></li>
                    <li>The <a href="/component/avatar">Avatar</a> component should alternatively show labels (if image is missing).</li>
                </ul>
            </x-slot:content>
        </x-bladewind::timeline>

        <x-bladewind::timeline date="2.7.x">
            <x-slot:content>
                <ul class="list-outside list-disc leading-8 ml-3 text-base">
                    <li>Fix any issues from 2.7.0 release.</li>
                    <li>The <a href="/component/verification-code">Verification Code</a> or OTP component should allow masking of input.</li>
                    <li>Provide more options for how much blur should be behind a <a href="/component/modal">Modal</a> component.<h1 class="w-0 h-0" id="280"></h1></li>
                    <li>Refactor the <a href="/component/tab">Dropmenu</a> component and make it more user friendly.</li>
                </ul>
            </x-slot:content>
        </x-bladewind::timeline>

        <x-bladewind::timeline date="2.8.0">
            <x-slot:content>
                <ul class="list-outside list-disc leading-8 ml-3 text-base">
                    <li>Add Color picker component.</li>
                    <li>Refactor the <a href="/component/datepicker">Datepicker</a> component.</li>
                    <li>Refactor the <a href="/component/timepicker">Timepicker</a> component.</li>
                    <li>Add Number (increment/decrement) component.</li>
                    <li>Items in the <a href="/component/select">Select</a> component should accept a second line. A label and its description.<h1 class="w-0 h-0" id="28x"></h1></li>
                    <li>The <a href="/component/select">Select</a> component should provide an optional default state (with an action) if there are no items to select.</li>
                </ul>
            </x-slot:content>
        </x-bladewind::timeline>

        <x-bladewind::timeline date="2.8.x">
            <x-slot:content>
                <ul class="list-outside list-disc leading-8 ml-3 text-base">
                    <li>Fix any issues from 2.8.0 release.</li>
                    <li>Provide more options for how much blur should be behind a <a href="/component/modal">Modal</a> component.<h1 class="w-0 h-0" id="300"></h1></li>
                    <li><a href="/component/tag">Tag</a> component should have smaller versions.</li>
                    <li>Refactor the <a href="/component/tab">Dropmenu</a> component and make it more user friendly.</li>
                </ul>
            </x-slot:content>
        </x-bladewind::timeline>

        <x-bladewind::timeline date="3.0.0">
            <x-slot:content>
                <ul class="list-outside list-disc leading-8 ml-3 text-base">
                    <li>Add Livewire support.</li>
                    <li>Introduce ready to use layouts.</li>
                    <li>Remove support for Laravel 8 users.</li>
                    <li>Deprecate a couple of attributes in various components.</li>
                    <li>The Select component will completely replace the Dropdown component.</li>
                    <li>Add a Range Slider component.</li>
                    <li>Add a Time Picker component.</li>
                    <li>Add an Accordion component.</li>
                </ul>
            </x-slot:content>
        </x-bladewind::timeline>

    </x-bladewind::timelines>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#260">2.6.0</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#26x">2.6.x</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#270">2.7.0</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#27x">2.7.x</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#280">2.8.0</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#28x">2.8.x</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#300">3.0.0</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.roadmap');
        </script>
    </x-slot>
</x-app>
