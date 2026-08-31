<x-meta>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <x-slot name="title">{{ $title }}</x-slot>
</x-meta>

<body class="docs-shell min-h-screen bg-slate-50 text-slate-600 dark:bg-[#080b14] dark:text-slate-400">
    @env('production')
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T58CKRW" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    @endenv

    <nav class="navigation fixed right-0 top-0 z-50 hidden h-screen w-[300px] overflow-y-auto border-l border-slate-200 bg-white px-3 py-6 shadow-2xl dark:border-slate-800 dark:bg-slate-950 lg:hidden">
        <button type="button" aria-label="Close navigation" class="mb-5 ml-auto mr-2 grid size-10 place-items-center rounded-full bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200" onclick="animateCss('.navigation','slideOutRight').then(() => hide('.navigation'))">
            <x-bladewind::icon name="x-mark" class="!size-5" />
        </button>
        <div class="docs-nav">@include('docs/nav')</div>
    </nav>

    <x-topbar :show-search="true" />
    <x-docs-search />

    <div class="mx-auto grid min-h-screen max-w-[1480px] gap-8 px-5 pb-20 pt-24 sm:px-8 lg:grid-cols-[230px_minmax(0,1fr)] lg:px-10 xl:grid-cols-[230px_minmax(0,1fr)_220px]">
        <aside class="hidden lg:block">
            <nav class="docs-nav sticky top-24 max-h-[calc(100vh-7rem)] overflow-y-auto pr-4 pb-10">
                @include('docs/nav')
                <a href="https://github.com/sponsors/mkocansey" target="_blank" class="mt-5 flex items-center gap-2 rounded-xl border border-pink-200 bg-pink-50 px-4 py-3 !text-xs !font-semibold text-pink-700 transition hover:border-pink-300 hover:bg-pink-100 dark:border-pink-400/10 dark:bg-pink-400/5 dark:text-pink-300">
                    <x-bladewind::icon name="heart" class="!size-4" /> Sponsor BladewindUI
                </a>
            </nav>
        </aside>

        <main class="min-w-0">
            <article class="docs-article rounded-3xl border border-slate-200/80 bg-white px-5 py-8 shadow-sm shadow-slate-200/40 dark:border-slate-800 dark:bg-slate-900/60 dark:shadow-none sm:px-8 sm:py-10 xl:px-12">
                <div class="mb-5 border-b border-slate-100 pb-4 dark:border-slate-800">
                    <h1 class="page-title">{{ $page_title ?? '' }}</h1>
                </div>
                <div class="adoc">{{ $slot ?? '' }}</div>
            </article>
        </main>

        <aside class="hidden xl:block">
            <nav class="side-nav sticky top-24 max-h-[calc(100vh-7rem)] overflow-y-auto pl-6">
                <h5 class="!m-0 text-[11px] font-bold uppercase tracking-[.18em] text-slate-400 dark:text-slate-500">On this page</h5>
                <div class="mt-5 space-y-2.5 pr-2">{{ $side_nav ?? '' }}</div>
                @include('docs/ads')
            </nav>
        </aside>
    </div>

    <x-site-footer :on-white="true" />

    <script>
        selectNavigationItem = (el) => domEls(el).forEach(element => element.classList.add('active'));
        switchDirection = (el) => {
            changeCss('.bw-tgl-sp-rtltr', 'rtl:flex-row-reverse');
            el.checked ? domEl('html').setAttribute('dir', 'rtl') : domEl('html').setAttribute('dir', 'ltr');
        };
    </script>
    {{ $scripts ?? '' }}
</body>
</html>
