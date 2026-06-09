<x-meta>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <x-slot name="title">Super simple but elegant Laravel blade-based UI component library using TailwindCSS and vanilla Javascript</x-slot>
</x-meta>
<x-bladewind::notification />
<body class="text-gray-500/80 bg-slate-100 dark:bg-gradient-to-b from-slate-900 to-slate-800 dark:text-slate-400">
    <div class="md:hidden block absolute right-6 top-6" onclick="animateCss('.navigation','slideInRight');">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </div>

    <nav class="w-[280px] z-50 py-6 bg-white/95 border-l border-gray-200 fixed right-0 top-0 h-screen shadow-2xl
            hidden sm:hidden dark:bg-dark-900 dark:border-gray-800 shadow-blue-300 dark:shadow-slate-800 overflow-y-scroll navigation">
        <div class="text-right cursor-pointer"
             onclick="animateCss('.navigation','slideOutRight').then((message) => { hide('.navigation'); });">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline mr-4" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        @include('docs/nav')
    </nav>

    <div class="bg-gradient-to-tr from-purple-600 via-blue-800 to-pink-500 sm:px-10 px-5 pb-10 shadow-sm dark:from-dark-700 dark:via-black dark:to-violet-950">
        <div class="sm:max-w-7xl mx-auto flex justify-between items-center py-7">
            <div>
                <img src="/assets/images/bw-logo-white.png" alt="logo" class="h-7 mx-auto opacity-80" />
            </div>
            <div class="hidden md:flex justify-end items-center space-x-5">
                <x-topright />
                <a href="/install">
                    <x-bladewind::button radius="full"  size="small" color="black">Get Started</x-bladewind::button>
                </a>
            </div>
        </div>
        <div class="sm:text-6xl tracking-wide font-bold text-3xl sm:max-w-5xl mx-auto text-fuchsia-100 dark:text-dark-200 text-center px-6 pt-10 md:px-3 md:pt-20 font-bladewind">
            Beautifully crafted UI components for your Laravel applications.
        </div>
        <div class="sm:text-2xl text-sm font-light tracking-wide sm:max-w-3xl mx-auto text-center text-slate-100 dark:text-dark-400 sm:py-8 px-5 pt-3 pb-6">
            With over 40 components at your disposal, you can build experiences like what is shown in the demo below in no time. Even works seamlessly with most of Laravel's starter kits.
        </div>
        <div class="text-center sm:py-6 px-6 hidden">
            <x-bladewind::button radius="full" color="orange" tag="a" href="/install" size="big" class="font-bladewind w-full md:w-fit">Get Started Now</x-bladewind::button>
        </div>

        <div class="hidden sm:block">
        <div class="relative mx-auto flex w-full justify-center overflow-hidden p-8">
            <div style="--fade-distance: 20px; --fade-duration: 1.2s" class="relative w-full max-w-7xl rounded-xl bg-default animate-fadeInUp delay-500">
                <div class="pointer-events-none absolute inset-0 m-3 rounded-3xl border border-white/20 bg-default/20 mix-blend-plus-lighter animate-fadeInDown delay-700"></div>
                <div class="relative z-10 min-h-[700px] rounded-md bg-gray-200 dark:bg-dark-800 animate-fadeInLeft delay-1000 m-8">
                    @include('docs.demo-topbar')
                    <div class="p-6">
                        @include('docs.demo-dashboard')
                        @include('docs.demo-employees')
                        @include('docs.demo-jobs')
                        @include('docs.demo-signup')
                        @include('docs.demo-signin')
                    </div>
                    <x-bladewind::modal title="Send Birthday Wishes" name="birthday-wishes-modal" ok-button-label="Send Wishes"
                                        ok-button-action="showNotification('Wishes sent successfully', 'The wishes have been sent successfully to the birthday fella! They sure will feel happy', 'success')">
                        <div class="space-y-4 pt-4">
                            <p class="text-gray-600 dark:text-dark-300">Enter your custom message for <b>:name</b>.</p>
                            <x-bladewind::textarea :toolbar="true" except="align, indent, color, background" name="wishes" placeholder="Type your wishes here...">
                                <x-slot:selectedValue>
                                    This day comes once every every and it ought to be a special one. Wishing you the very best day today and make sure you have a blast 💥 🚀! I owe you a pizza 🍕, just one slice 😁. Find me after work.</x-slot:selectedValue>
                            </x-bladewind::textarea>
                        </div>
                    </x-bladewind::modal>
                    <x-bladewind::modal title="Send a Message" name="chat-modal" ok-button-label="Send message"
                                        ok-button-action="showNotification('Message sent successfully', 'The message has been sent successfully. If you scheduled this, we got you covered.', 'success')">
                        <div class="space-y-4 pt-4">
                            <x-bladewind::input label="Subject" name="subject" prefix="chat-bubble-bottom-center" :prefix-is-icon="true" />
                            <x-bladewind::textarea :toolbar="true" except="align, indent, color, background" name="chat" placeholder="Type your message here..."></x-bladewind::textarea>
                            <x-bladewind::timepicker label="Send at" />
                        </div>
                    </x-bladewind::modal>
                    <x-bladewind::modal name="phone-modal" size="omg" show_action_buttons="false">
                        <div class="space-y-4 text-8xl font-bold text-center">
                            +233.244.987.654
                        </div>
                    </x-bladewind::modal>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="bg-purple-200 sm:px-10 sm:py-20 py-10 px-4 shadow-sm dark:bg-dark-700 border-t-8 border-purple-300">
        <div class="text-3xl font-bladewind font-semibold tracking-tight sm:text-6xl sm:max-w-4xl mx-auto text-slate-700 dark:text-dark-300 text-center px-5">
            One line of code unpacks a ton of useful features.
        </div>
        <div class="text-sm sm:text-2xl tracking-wide font-light sm:max-w-xl mx-auto sm:pt-6 pt-2 text-center text-slate-500 dark:text-dark-400 px-4 sm:px-0">
            This library follows the Laravel way of simplicity and development fun.
        </div>
        <div class="max-w-3xl mx-auto sm:pt-10 pt-4">
            <pre class="language-markup"><code>&lt;x-bladewind::avatar image="/assets/images/edwin.jpeg" /&gt;</code></pre>
            <pre class="language-markup"><code>&lt;x-bladewind::toggle bar="thicker" /&gt;</code></pre>
            <pre class="language-markup"><code>&lt;x-bladewind::alert&gt;Your storage is 80% full&lt;/x:bladewind::alert&gt;</code></pre>
            <pre class="language-markup"><code>&lt;x-bladewind::datepicker type="range" /&gt;</code></pre>
            <pre class="language-markup"><code>&lt;x-bladewind::filepicker accepted_file_types="images/*" /&gt;</code></pre>
            <div class="text-center sm:pt-6">
                <x-bladewind::button radius="full" color="orange" tag="a" href="/install" size="big" class="font-bladewind hidden md:inline-block">Get Started Now</x-bladewind::button>
            </div>
        </div>
    </div>
<div class="bg-blue-200 sm:px-10 sm:py-16 px-6 py-8 shadow-sm dark:bg-dark-800 border-t-8 border-blue-300">
    <div class="text-3xl sm:text-6xl font-semibold sm:max-w-4xl mx-auto tracking-tight text-slate-700 dark:text-dark-200 text-center px-5 font-bladewind">
        Only install the components you need. Not everything.
    </div>
    <div class="text-sm sm:text-xl font-light sm:max-w-2xl mx-auto sm:py-8 pt-4 pb-6 text-center text-slate-500 dark:text-dark-400 px-4 tracking-wide font-bladewind">
        All components are standalone composer packages and can be installed separately. Dependencies are automatically carried along.
        <pre class="language-php !text-center"><code>composer require mkocansey/bladewind-table</code></pre>
    </div>

    <div class="sm:max-w-7xl home-nav mx-auto pt-4 pb-6 sm:grid-cols-5 grid grid-cols-2 sm:gap-6 gap-3">
        @include('docs.components-list', [ 'class' => 'home'])
    </div>
</div>
<div class="bg-yellow-200 sm:px-10 sm:py-16 px-6 py-8 shadow-sm dark:bg-dark-800 border-t-8 border-yellow-300">
    <div class="text-3xl sm:text-6xl font-semibold sm:max-w-4xl mx-auto text-slate-700 dark:text-dark-200 text-center px-5 font-bladewind">
        Now with an MCP Server to support your favourite AI tools.
    </div>
    <div class="text-sm sm:text-xl font-light sm:max-w-2xl mx-auto sm:py-8 pt-4 pb-6 text-center text-slate-500 dark:text-dark-400 px-4 tracking-wide font-bladewind">
        This means tools like Claude Desktop, Cursor, and VS Code Copilot can answer questions about BladewindUI components, generate correct usage examples, and look up attribute names and defaults
    </div>
</div>

<div class="bg-slate-900 sm:px-10 sm:py-20 py-10 px-4">
    <div class="text-3xl font-semibold sm:text-6xl sm:max-w-4xl mx-auto text-slate-200 text-center px-10 font-bladewind">
        BladewindUI components shine even in dark mode.
    </div>
    <div class="text-sm sm:text-2xl font-light sm:max-w-xl mx-auto pt-4 text-center text-slate-300 px-4 sm:px-0 font-bladewind tracking-wide">
        <a href="/customize/darkmode" class="text-yellow-500 hover:text-yellow-700">Customizing</a> dark mode in BladewinUI is as easy as setting your preferred dark colour and voila!
    </div>

    <div class="sm:max-w-7xl home-nav mx-auto pt-16">
        <div class="grid sm:grid-cols-3 grid-cols-1 gap-6">
            <div>
                <x-bladewind::card has_shaodw="false" class="!bg-slate-800 !shadow-none !border-0" title="Your profile">
                    <div class="flex">
                        <div> <x-bladewind::avatar show_ring="false" image="/assets/images/francis.png" stacked="true" size="huge" class="!mx-auto" /></div>
                        <div class="grow pl-10">
                            <div class="text-slate-400 text-2xl tracking-wider">John C. Doe</div>
                            <div class="text-slate-400 text-sm tracking-wider">john.doe@bladewindui.com</div>
                            <div class="-mt-3 -ml-1 mb-6"> <x-bladewind::rating :rating="4" color="purple" /></div>
                            <x-bladewind::button size="small" radius="small" color="purple" icon="pencil-square">Edit Profile</x-bladewind::button>
                        </div>
                    </div>
                </x-bladewind::card>
            </div>
            <div>
                <x-bladewind::card has_shaodw="false" class="!bg-slate-800 !shadow-none  !border-0 mnos" title="Mobile Network Penetration">
                    <div class="py-2">
                    <x-bladewind::horizontal-line-graph label="MTN: " percentage="55" color="yellow" shade="dark" class="text-slate-400" />
                    <x-bladewind::horizontal-line-graph label="Vodafone: " percentage="30" color="red" shade="dark" class="text-slate-400 py-3" />
                    <x-bladewind::horizontal-line-graph label="AirtelTigo: " percentage="65" color="blue" shade="dark" class="text-slate-400" />
                    </div>
                </x-bladewind::card>
            </div>
            <div>
                <x-bladewind::card has_shaodw="false" class="!bg-slate-800  !border-0 !shadow-none" reduce_padding>
                    <x-bladewind::empty-state show_image="false">
                        <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-12 mx-auto text-red-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
                        </svg>
                        </div>
                        <p class="py-5 text-slate-500">You have no biometric data uploaded</p>
                        <x-bladewind::button color="red" size="small" class="mb-1.5">
                            Add biometric info
                        </x-bladewind::button>
                    </x-bladewind::empty-state>
                </x-bladewind::card>
            </div>
        </div>
    </div>
</div>

<div class="w-full py-8 px-5 bg-slate-900 text-slate-400">
    <div class="max-w-7xl mx-auto flex">
        <div class="tracking-wider text-xs grow">
            {{\Composer\InstalledVersions::getPrettyVersion('mkocansey/bladewind')}}
        </div>
        <div class="text-right flex gap-4">
{{--            <iframe src="https://github.com/sponsors/mkocansey/button" title="Sponsor mkocansey" height="32" width="114" style="border: 0; border-radius: 6px;" class="inline-block"></iframe>--}}
            <a href="https://github.com/mkocansey/bladewind" target="_blank" class="text-slate-400 hover:text-slate-500 dark:hover:text-slate-300"><span class="sr-only">BladewindUI on GitHub</span>
                <svg viewBox="0 0 16 16" class="w-5 h-5" fill="currentColor" aria-hidden="true"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path></svg>
            </a>
        </div>
    </div>
</div>
</body>
</html>
