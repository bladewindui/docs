<x-meta>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <x-slot name="title">Elegant Laravel Blade components for teams that ship</x-slot>
    <style>
        .home-shell { background: #f8fafc; color: #0f172a; }
        .home-hero { background: radial-gradient(circle at 76% 18%, rgba(129,92,246,.3), transparent 28rem), radial-gradient(circle at 8% 85%, rgba(14,165,233,.16), transparent 24rem), #080b14; }
        .home-grid { background-image: linear-gradient(rgba(255,255,255,.045) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.045) 1px,transparent 1px); background-size:48px 48px; mask-image:linear-gradient(to bottom,black 15%,transparent 95%); }
        .home-glow { box-shadow:0 35px 100px rgba(79,70,229,.26); }
        .home-code { font-family:'Anonymous Pro',monospace; }
        .home-kicker { letter-spacing:.18em; }
        .home-card { transition:transform .25s ease,box-shadow .25s ease,border-color .25s ease; }
        .home-card:hover { transform:translateY(-4px); box-shadow:0 24px 55px rgba(15,23,42,.1); border-color:#c7d2fe; }
        .dark .home-card:hover { box-shadow:none; border-color:#475569; }
        .home-marquee { scrollbar-width:none; }
        .home-marquee::-webkit-scrollbar { display:none; }
        .home-header-tools > a[href="#"] { display:none !important; }
        .dark .home-shell { background:#080b14; color:#e2e8f0; }
        .dark .home-light { background:#0f172a; }
        .dark .home-light h2 { color:#f8fafc !important; }
        .dark .home-light > div > div > p, .dark .home-light p { color:#94a3b8; }
        .dark .home-card:not(.home-card-dark) { background:#111827; border-color:#334155; }
        .dark .home-card:not(.home-card-dark) h3 { color:#f8fafc !important; }
        .dark .home-card:not(.home-card-dark) p { color:#94a3b8; }
        .dark .home-card:not(.home-card-dark) [class*="border-slate-1"], .dark .home-card:not(.home-card-dark) [class*="border-slate-2"] { border-color:#334155; }
        .dark .home-card:not(.home-card-dark) [class*="bg-slate-50"] { background:#0f172a; }
        .dark .home-card:not(.home-card-dark) [class*="text-slate-8"] { color:#e2e8f0; }
        .dark .home-component-link { background:#111827; border-color:#334155; color:#cbd5e1; }
        .dark .home-component-link > span { background:#1e293b; }
        @media (prefers-reduced-motion:no-preference) { .home-float { animation:home-float 5s ease-in-out infinite; } @keyframes home-float { 0%,100%{transform:translateY(0) rotate(-1deg)} 50%{transform:translateY(-10px) rotate(1deg)} } }
    </style>
</x-meta>
<x-bladewind::notification />

<body class="home-shell antialiased">
<nav class="navigation fixed right-0 top-0 z-50 hidden h-screen w-[290px] overflow-y-auto border-l border-slate-200 bg-white px-2 py-6 shadow-2xl dark:border-slate-800 dark:bg-slate-950 sm:hidden">
    <button type="button" class="mb-5 ml-auto mr-3 grid size-10 place-items-center rounded-full bg-slate-100 text-slate-700" aria-label="Close navigation" onclick="animateCss('.navigation','slideOutRight').then(() => hide('.navigation'))">
        <x-bladewind::icon name="x-mark" class="!size-5" />
    </button>
    @include('docs/nav')
</nav>

<main>
    <section class="home-hero relative isolate overflow-hidden text-white">
        <div class="home-grid pointer-events-none absolute inset-0"></div>
        <div class="pointer-events-none absolute -right-32 top-36 size-[34rem] rounded-full border border-violet-400/10"></div>
        <div class="pointer-events-none absolute -right-12 top-56 size-[22rem] rounded-full border border-violet-400/10"></div>

        <header class="relative z-20 mx-auto flex max-w-7xl items-center justify-between px-5 py-6 sm:px-8 lg:px-10">
            <a href="/" aria-label="BladewindUI home"><img src="/assets/images/bw-logo-white.png" alt="BladewindUI" class="h-7 w-auto" /></a>
            <div class="flex items-center gap-3 sm:gap-5">
                <a href="/components" class="hidden text-sm font-medium text-slate-300 transition hover:text-white md:block">Components</a>
                <a href="/mcp" class="hidden text-sm font-medium text-slate-300 transition hover:text-white md:block">MCP server</a>
                <div class="home-header-tools flex items-center gap-5"><x-topright /></div>
                <a href="/install" class="hidden rounded-full bg-white px-4 py-2 text-sm font-semibold text-slate-950 transition hover:bg-indigo-100 sm:inline-flex">Get started</a>
                <button type="button" aria-label="Open navigation" class="grid size-10 place-items-center rounded-full border border-white/15 bg-white/5 text-white sm:hidden" onclick="animateCss('.navigation','slideInRight')"><x-bladewind::icon name="bars-3" class="!size-5" /></button>
            </div>
        </header>

        <div class="relative z-10 mx-auto grid max-w-7xl items-center gap-16 px-5 pb-20 pt-14 sm:px-8 sm:pb-28 sm:pt-20 lg:grid-cols-[1.02fr_.98fr] lg:px-10 lg:pb-32 lg:pt-24">
            <div>
                <a href="/mcp" class="mb-7 inline-flex items-center gap-2 rounded-full border border-indigo-300/20 bg-indigo-300/10 px-3 py-1.5 text-xs font-semibold text-indigo-100 backdrop-blur">
                    <span class="size-1.5 rounded-full bg-cyan-300 shadow-[0_0_12px_#67e8f9]"></span>Now with an MCP server<x-bladewind::icon name="arrow-right" class="!size-3.5" />
                </a>
                <h1 class="max-w-3xl text-5xl font-semibold leading-[.98] tracking-[-.045em] text-white sm:text-6xl lg:text-7xl xl:text-[5.35rem]">Laravel interfaces, <span class="bg-gradient-to-r from-indigo-300 via-violet-300 to-pink-300 bg-clip-text text-transparent">beautiful by default.</span></h1>
                <p class="mt-7 max-w-xl text-lg leading-8 text-slate-300 sm:text-xl">A thoughtfully crafted collection of Blade components for building polished applications without leaving the Laravel workflow you know.</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="/install" class="inline-flex items-center justify-center gap-2 rounded-full bg-indigo-500 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-950/40 transition hover:bg-indigo-400">Start building<x-bladewind::icon name="arrow-right" class="!size-4" /></a>
                    <a href="/components" class="inline-flex items-center justify-center gap-2 rounded-full border border-white/15 bg-white/5 px-6 py-3.5 text-sm font-bold text-white backdrop-blur transition hover:bg-white/10">Explore components</a>
                </div>
                <div class="mt-10 flex flex-wrap items-center gap-x-7 gap-y-3 text-sm text-slate-400">
                    @foreach(['Tailwind CSS','Vanilla JavaScript','Free and open source'] as $point)<span class="inline-flex items-center gap-2"><x-bladewind::icon name="check" class="!size-4 text-emerald-400" />{{ $point }}</span>@endforeach
                </div>
            </div>

            <div class="relative hidden lg:block">
                <div class="home-glow overflow-hidden rounded-3xl border border-white/10 bg-slate-950/80 p-2 backdrop-blur-xl">
                    <div class="flex items-center gap-2 border-b border-white/10 px-4 py-3"><span class="size-2.5 rounded-full bg-rose-400"></span><span class="size-2.5 rounded-full bg-amber-300"></span><span class="size-2.5 rounded-full bg-emerald-400"></span><span class="ml-3 text-xs text-slate-500">dashboard.blade.php</span></div>
                    <div class="home-code space-y-1.5 px-5 py-6 text-[13px] leading-6 text-slate-300">
                        <p><span class="text-pink-400">&lt;x-bladewind::card</span> <span class="text-cyan-300">title</span>=<span class="text-amber-200">&quot;Monthly revenue&quot;</span><span class="text-pink-400">&gt;</span></p>
                        <p class="pl-5"><span class="text-pink-400">&lt;x-bladewind::statistic</span></p>
                        <p class="pl-10"><span class="text-cyan-300">number</span>=<span class="text-amber-200">&quot;48,290&quot;</span></p>
                        <p class="pl-10"><span class="text-cyan-300">percentage-change</span>=<span class="text-amber-200">&quot;12.8&quot;</span></p>
                        <p class="pl-10"><span class="text-cyan-300">icon</span>=<span class="text-amber-200">&quot;banknotes&quot;</span> <span class="text-pink-400">/&gt;</span></p>
                        <p class="pl-5"><span class="text-pink-400">&lt;x-bladewind::progress-bar</span> <span class="text-cyan-300">percentage</span>=<span class="text-amber-200">&quot;72&quot;</span> <span class="text-pink-400">/&gt;</span></p>
                        <p><span class="text-pink-400">&lt;/x-bladewind::card&gt;</span></p>
                    </div>
                </div>
                <div class="home-float absolute -bottom-20 -left-12 w-[88%] rounded-3xl border border-slate-200 bg-white p-6 text-slate-900 shadow-2xl shadow-black/30">
                    <div class="flex items-start justify-between"><div><p class="text-xs font-semibold uppercase tracking-[.18em] text-slate-400">Monthly revenue</p><p class="mt-2 text-4xl font-semibold tracking-tight">$48,290</p></div><div class="grid size-11 place-items-center rounded-2xl bg-indigo-50 text-indigo-600"><x-bladewind::icon name="banknotes" class="!size-6" /></div></div>
                    <div class="mt-6 flex items-center gap-3"><div class="h-2 flex-1 overflow-hidden rounded-full bg-slate-100"><div class="h-full w-[72%] rounded-full bg-gradient-to-r from-indigo-500 to-violet-500"></div></div><span class="text-xs font-semibold text-emerald-600">+12.8%</span></div>
                    <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4 text-xs text-slate-500"><span>Updated just now</span><span class="font-semibold text-indigo-600">View report →</span></div>
                </div>
            </div>
        </div>

        <div class="relative z-10 border-t border-white/10 bg-white/[.025]"><div class="mx-auto grid max-w-7xl grid-cols-2 divide-x divide-white/10 px-5 sm:grid-cols-4 sm:px-8 lg:px-10">
            @foreach([['40+','Production-ready components'],['1 line','To render a polished UI'],['RTL','And dark mode included'],['MIT','Open-source license']] as $stat)
                <div class="border-t border-white/10 px-5 py-6 first:border-t-0 sm:border-t-0"><p class="text-2xl font-semibold">{{ $stat[0] }}</p><p class="mt-1 text-xs text-slate-400">{{ $stat[1] }}</p></div>
            @endforeach
        </div></div>
    </section>

    <section class="home-light px-5 py-20 sm:px-8 sm:py-28 lg:px-10">
        <div class="mx-auto max-w-7xl">
            <div class="max-w-3xl"><p class="home-kicker text-xs font-bold uppercase text-indigo-600 dark:text-indigo-300">A better starting point</p><h2 class="mt-4 !pt-0 text-4xl font-semibold tracking-[-.035em] !text-slate-950 dark:!text-white sm:text-5xl">Spend time on your product, not on rebuilding interface basics.</h2><p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600 dark:text-slate-300">BladewindUI gives Laravel teams a consistent, accessible foundation that remains easy to customize.</p></div>
            <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                <a href="/component/table" class="home-card rounded-3xl border border-slate-200 bg-white p-7 lg:col-span-2">
                    <div class="flex items-start justify-between"><div><p class="text-xs font-bold uppercase tracking-[.18em] text-indigo-600 dark:text-indigo-300">Data display</p><h3 class="mt-2 !text-2xl !font-semibold !text-slate-950 dark:!text-white">Tables that already feel finished</h3></div><span class="grid size-10 place-items-center rounded-full bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-300"><x-bladewind::icon name="arrow-up-right" class="!size-4" /></span></div>
                    <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200"><div class="grid grid-cols-[1.4fr_1fr_.7fr] bg-slate-50 px-4 py-3 text-[11px] font-bold uppercase tracking-wider text-slate-400"><span>Customer</span><span>Plan</span><span>Status</span></div>
                    @foreach([['Olivia Martin','Business','Active'],['Jackson Lee','Startup','Active'],['Sophia Brown','Trial','Pending']] as $customer)<div class="grid grid-cols-[1.4fr_1fr_.7fr] items-center border-t border-slate-100 px-4 py-3 text-sm"><span class="font-medium text-slate-800">{{ $customer[0] }}</span><span class="text-slate-500">{{ $customer[1] }}</span><span><span class="rounded-full {{ $customer[2] === 'Active' ? 'bg-emerald-50 text-emerald-700' : 'bg-amber-50 text-amber-700' }} px-2 py-1 text-[11px] font-semibold">{{ $customer[2] }}</span></span></div>@endforeach</div>
                </a>
                <a href="/customize/darkmode" class="home-card home-card-dark relative overflow-hidden rounded-3xl border border-slate-800 bg-slate-950 p-7 text-white"><div class="absolute -right-16 -top-16 size-48 rounded-full bg-violet-600/25 blur-3xl"></div><p class="relative text-xs font-bold uppercase tracking-[.18em] text-violet-300">Theme ready</p><h3 class="relative mt-2 !text-2xl !font-semibold !text-white">Dark mode without the afterthought.</h3><p class="relative mt-4 leading-7 text-slate-400">Every component ships with carefully considered dark styles.</p><div class="relative mt-10 rounded-2xl border border-white/10 bg-white/5 p-4"><div class="flex items-center gap-3"><div class="grid size-10 place-items-center rounded-full bg-violet-500/20 text-violet-300"><x-bladewind::icon name="moon" class="!size-5" /></div><div><p class="text-sm font-semibold">Night shift</p><p class="text-xs text-slate-500">Theme enabled</p></div><div class="ml-auto h-6 w-11 rounded-full bg-violet-500 p-1"><div class="ml-auto size-4 rounded-full bg-white"></div></div></div></div></a>
                @foreach([['/customize','swatch','bg-pink-50 text-pink-600','Make it unmistakably yours.','Tune colours, sizes, shadows and behaviour while keeping a stable API.'],['/extra/accessibility','eye','bg-cyan-50 text-cyan-600','Inclusive from the start.','Keyboard-friendly patterns, readable contrast and semantic foundations.'],['/customize/colours','paint-brush','bg-indigo-50 text-indigo-600','A coherent design language.','One system across forms, feedback, navigation and data.']] as $card)
                    <a href="{{ $card[0] }}" class="home-card rounded-3xl border border-slate-200 bg-white p-7"><div class="grid size-11 place-items-center rounded-2xl {{ $card[2] }}"><x-bladewind::icon :name="$card[1]" class="!size-6" /></div><h3 class="mt-7 !text-2xl !font-semibold !text-slate-950 dark:!text-white">{{ $card[3] }}</h3><p class="mt-3 leading-7 text-slate-600 dark:text-slate-300">{{ $card[4] }}</p></a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="overflow-hidden bg-[#0b1020] px-5 py-20 text-white sm:px-8 sm:py-28 lg:px-10"><div class="mx-auto grid max-w-7xl items-center gap-14 lg:grid-cols-2">
        <div><p class="home-kicker text-xs font-bold uppercase text-cyan-300">Feels like Laravel</p><h2 class="mt-4 !pt-0 text-4xl font-semibold tracking-[-.035em] !text-white sm:text-5xl">Small markup.<br />Serious capability.</h2><p class="mt-5 max-w-xl text-lg leading-8 text-slate-400">Use expressive Blade tags, pass the data you already have, and let the component handle the details.</p>
            <div class="mt-9 space-y-4"><div class="flex gap-3"><span class="mt-1 grid size-6 shrink-0 place-items-center rounded-full bg-emerald-400/15 text-emerald-300"><x-bladewind::icon name="check" class="!size-3.5" /></span><p class="text-slate-300"><strong class="text-white">Install what you need.</strong> Use the full library or individual component packages.</p></div><div class="flex gap-3"><span class="mt-1 grid size-6 shrink-0 place-items-center rounded-full bg-emerald-400/15 text-emerald-300"><x-bladewind::icon name="check" class="!size-3.5" /></span><p class="text-slate-300"><strong class="text-white">No frontend framework required.</strong> Laravel, Tailwind and vanilla JavaScript are enough.</p></div></div>
            <a href="/install" class="mt-9 inline-flex items-center gap-2 font-semibold text-cyan-300 hover:text-cyan-200">Read the installation guide <x-bladewind::icon name="arrow-right" class="!size-4" /></a>
        </div>
        <div class="overflow-hidden rounded-3xl border border-white/10 bg-slate-950 shadow-2xl"><div class="flex items-center justify-between border-b border-white/10 px-5 py-4"><span class="text-xs text-slate-500">resources/views/dashboard.blade.php</span><span class="rounded-full bg-emerald-400/10 px-2 py-1 text-[10px] font-bold uppercase tracking-wider text-emerald-300">Blade</span></div>
            <pre class="home-code !m-0 !rounded-none !bg-transparent p-6 !text-sm leading-7"><code><span class="text-pink-400">&lt;x-bladewind::alert</span>
    <span class="text-cyan-300">type</span>=<span class="text-amber-200">&quot;success&quot;</span>
    <span class="text-cyan-300">shade</span>=<span class="text-amber-200">&quot;faint&quot;</span><span class="text-pink-400">&gt;</span>
    Payment received successfully.
<span class="text-pink-400">&lt;/x-bladewind::alert&gt;</span>

<span class="text-pink-400">&lt;x-bladewind::datepicker</span>
    <span class="text-cyan-300">type</span>=<span class="text-amber-200">&quot;range&quot;</span>
    <span class="text-cyan-300">label</span>=<span class="text-amber-200">&quot;Reporting period&quot;</span> <span class="text-pink-400">/&gt;</span></code></pre>
        </div>
    </div></section>

    <section class="px-5 py-20 sm:px-8 sm:py-28 lg:px-10"><div class="mx-auto max-w-7xl"><div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-indigo-600 via-violet-600 to-fuchsia-600 px-6 py-10 text-white shadow-2xl shadow-indigo-200 dark:shadow-none sm:px-12 sm:py-14 lg:px-16"><div class="absolute right-0 top-0 size-80 translate-x-1/3 -translate-y-1/3 rounded-full border-[60px] border-white/10"></div><div class="relative grid items-center gap-10 lg:grid-cols-[1fr_auto]"><div class="max-w-3xl"><div class="mb-5 inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1.5 text-xs font-bold uppercase tracking-[.16em]"><x-bladewind::icon name="sparkles" class="!size-4" /> Built for AI workflows</div><h2 class="!pt-0 text-4xl font-semibold tracking-[-.035em] !text-white sm:text-5xl">Your coding assistant can speak BladewindUI.</h2><p class="mt-5 max-w-2xl text-lg leading-8 text-indigo-100">Connect the MCP server so tools like Claude Desktop, Cursor and VS Code Copilot can find components, verify attributes and generate accurate examples.</p></div><a href="/mcp" class="inline-flex items-center justify-center gap-2 rounded-full bg-white px-6 py-3.5 text-sm font-bold text-indigo-700 shadow-xl transition hover:bg-indigo-50 dark:shadow-none">Connect the MCP server <x-bladewind::icon name="arrow-right" class="!size-4" /></a></div></div></div></section>

    @php
        $homePlans = [
            ['label' => 'Startup', 'value' => 'startup'],
            ['label' => 'Business', 'value' => 'business'],
            ['label' => 'Enterprise', 'value' => 'enterprise'],
        ];
        $homeChartData = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            'datasets' => [
                ['type' => 'bar', 'label' => 'Signups', 'data' => [30, 45, 42, 55, 60], 'backgroundColor' => 'rgba(99, 102, 241, 0.35)', 'borderColor' => 'rgb(99, 102, 241)'],
                ['type' => 'line', 'label' => 'Revenue', 'data' => [22, 28, 38, 40, 52], 'borderColor' => '#ec4899', 'borderWidth' => 2, 'fill' => false],
            ],
        ];
    @endphp
    <section class="home-light border-y border-slate-200 bg-white py-16 dark:border-slate-800 sm:py-20"><div class="mx-auto max-w-7xl px-5 sm:px-8 lg:px-10"><div class="flex items-end justify-between gap-5"><div><p class="home-kicker text-xs font-bold uppercase text-indigo-600 dark:text-indigo-300">Explore the library</p><h2 class="mt-3 !pt-0 text-3xl font-semibold tracking-tight !text-slate-950 dark:!text-white sm:text-4xl">52 components, organized the way you build.</h2></div><a href="/components" class="hidden text-sm font-semibold text-indigo-600 hover:text-indigo-500 dark:text-indigo-300 sm:block">View all components →</a></div>

        <div class="mt-10 grid gap-5 md:grid-cols-2">
            <div class="home-card rounded-3xl border border-slate-200 bg-white p-7 dark:border-slate-800 dark:bg-slate-900">
                <div class="flex items-center gap-4"><div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-indigo-50 text-indigo-600 dark:bg-indigo-400/10 dark:text-indigo-300"><x-bladewind::icon name="pencil-square" class="!size-5" /></div><div><h3 class="!text-lg !font-semibold !text-slate-950 dark:!text-white">Forms and input</h3><p class="text-xs text-slate-500 dark:text-slate-400">16 components</p></div></div>
                <div class="mt-6 space-y-4 rounded-2xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-800 dark:bg-slate-950">
                    <x-bladewind::input label="Workspace name" placeholder="Acme Studio" prefix="building-office" :prefix-is-icon="true" :add-clearing="false" />
                    <div class="grid grid-cols-2 gap-4"><x-bladewind::select name="home-plan" placeholder="Choose a plan" :data="$homePlans" :add-clearing="false" /><x-bladewind::datepicker placeholder="Start date" /></div>
                    <div class="flex items-center gap-6"><x-bladewind::toggle label="Remember me" label-position="right" /><x-bladewind::checkbox label="I agree to the terms" /></div>
                </div>
                <div class="mt-5 flex flex-wrap gap-2">@foreach(['Filepicker','Slider','Timepicker'] as $chip)<span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600 dark:bg-slate-800 dark:text-slate-300">{{ $chip }}</span>@endforeach<a href="/components" class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 dark:bg-indigo-400/10 dark:text-indigo-300">+8 more</a></div>
            </div>
            <div class="home-card rounded-3xl border border-slate-200 bg-white p-7 dark:border-slate-800 dark:bg-slate-900">
                <div class="flex items-center gap-4"><div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-pink-50 text-pink-600 dark:bg-pink-400/10 dark:text-pink-300"><x-bladewind::icon name="bell-alert" class="!size-5" /></div><div><h3 class="!text-lg !font-semibold !text-slate-950 dark:!text-white">Feedback and status</h3><p class="text-xs text-slate-500 dark:text-slate-400">9 components</p></div></div>
                <div class="mt-6 space-y-4 rounded-2xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-800 dark:bg-slate-950">
                    <x-bladewind::alert type="success" shade="faint">Payment received successfully.</x-bladewind::alert>
                    <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                        <div><div class="mb-2 flex justify-between text-xs"><span class="text-slate-500">Satisfaction</span><span class="font-semibold text-slate-800 dark:text-slate-200">87%</span></div><x-bladewind::progress-bar percentage="87" color="green" /></div>
                        <div><div class="mb-2 flex justify-between text-xs"><span class="text-slate-500">Uptime</span><span class="font-semibold text-slate-800 dark:text-slate-200">99%</span></div><x-bladewind::progress-bar percentage="99" color="violet" /></div>
                        <div><div class="mb-2 flex justify-between text-xs"><span class="text-slate-500">Adoption</span><span class="font-semibold text-slate-800 dark:text-slate-200">64%</span></div><x-bladewind::progress-bar percentage="64" color="cyan" /></div>
                        <div><div class="mb-2 flex justify-between text-xs"><span class="text-slate-500">Churn risk</span><span class="font-semibold text-slate-800 dark:text-slate-200">18%</span></div><x-bladewind::progress-bar percentage="18" color="pink" /></div>
                    </div>
                </div>
                <div class="mt-5 flex flex-wrap gap-2">@foreach(['Tag','Rating','Spinner'] as $chip)<span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600 dark:bg-slate-800 dark:text-slate-300">{{ $chip }}</span>@endforeach<a href="/components" class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 dark:bg-indigo-400/10 dark:text-indigo-300">+4 more</a></div>
            </div>
            <div class="home-card rounded-3xl border border-slate-200 bg-white p-7 dark:border-slate-800 dark:bg-slate-900">
                <div class="flex items-center gap-4"><div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-cyan-50 text-cyan-600 dark:bg-cyan-400/10 dark:text-cyan-300"><x-bladewind::icon name="table-cells" class="!size-5" /></div><div><h3 class="!text-lg !font-semibold !text-slate-950 dark:!text-white">Data and content</h3><p class="text-xs text-slate-500 dark:text-slate-400">12 components</p></div></div>
                <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-800 dark:bg-slate-950"><x-bladewind::chart :data="$homeChartData" show_legend="false" /></div>
                <div class="mt-5 flex flex-wrap gap-2">@foreach(['Table','Card','Avatar','Statistic'] as $chip)<span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600 dark:bg-slate-800 dark:text-slate-300">{{ $chip }}</span>@endforeach<a href="/components" class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 dark:bg-indigo-400/10 dark:text-indigo-300">+7 more</a></div>
            </div>
            <div class="home-card rounded-3xl border border-slate-200 bg-white p-7 dark:border-slate-800 dark:bg-slate-900">
                <div class="flex items-center gap-4"><div class="grid size-11 shrink-0 place-items-center rounded-2xl bg-violet-50 text-violet-600 dark:bg-violet-400/10 dark:text-violet-300"><x-bladewind::icon name="squares-2x2" class="!size-5" /></div><div><h3 class="!text-lg !font-semibold !text-slate-950 dark:!text-white">Navigation and overlays</h3><p class="text-xs text-slate-500 dark:text-slate-400">15 components</p></div></div>
                <div class="mt-6 rounded-2xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-800 dark:bg-slate-950">
                    <x-bladewind::breadcrumbs aria-label="Breadcrumb"><x-bladewind::breadcrumbs.item href="/" icon="home">Home</x-bladewind::breadcrumbs.item><x-bladewind::breadcrumbs.item href="/components">Components</x-bladewind::breadcrumbs.item></x-bladewind::breadcrumbs>
                    <div class="mt-4"><x-bladewind::accordion>
                        <x-bladewind::accordion.item title="What is BladewindUI?"><p>BladewindUI is a Blade component library for Laravel teams. It gives you production-ready, accessible components that are easy to theme, so you can focus on your product instead of rebuilding interface basics.</p></x-bladewind::accordion.item>
                        <x-bladewind::accordion.item title="Does it work with dark mode?"><p>Yes. Every component ships with carefully considered dark styles out of the box, and a theme switcher component lets visitors pick light, dark or system appearance.</p></x-bladewind::accordion.item>
                        <x-bladewind::accordion.item title="Do I need a frontend framework?"><p>No. BladewindUI is built with Blade, Tailwind CSS and vanilla JavaScript, so it fits naturally into any Laravel project without React, Vue or Alpine.</p></x-bladewind::accordion.item>
                    </x-bladewind::accordion></div>
                </div>
                <div class="mt-5 flex flex-wrap gap-2">@foreach(['Modal','Tab','Tooltip','Drawer','Command Palette'] as $chip)<span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600 dark:bg-slate-800 dark:text-slate-300">{{ $chip }}</span>@endforeach<a href="/components" class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 dark:bg-indigo-400/10 dark:text-indigo-300">+8 more</a></div>
            </div>
        </div>
    </div></section>

    <section class="bg-slate-950 px-5 py-20 text-center text-white sm:px-8 sm:py-28"><div class="mx-auto max-w-3xl"><p class="home-kicker text-xs font-bold uppercase text-indigo-300">Build the part that matters</p><h2 class="mt-4 !pt-0 text-4xl font-semibold tracking-[-.04em] !text-white sm:text-6xl">Your next Laravel interface can start here.</h2><p class="mx-auto mt-6 max-w-xl text-lg leading-8 text-slate-400">Install BladewindUI, choose your components, and turn your product idea into a polished experience.</p><div class="mt-9 flex flex-col justify-center gap-3 sm:flex-row"><a href="/install" class="rounded-full bg-indigo-500 px-7 py-3.5 text-sm font-bold text-white transition hover:bg-indigo-400">Get started for free</a><a href="https://github.com/bladewindui/ui" target="_blank" class="rounded-full border border-white/15 px-7 py-3.5 text-sm font-bold text-white transition hover:bg-white/5">View on GitHub</a></div></div></section>
</main>

<x-site-footer />
</body>
</html>
