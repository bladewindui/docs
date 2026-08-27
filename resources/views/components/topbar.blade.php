@props(['showSearch' => false])

<header class="fixed inset-x-0 top-0 z-40 border-b border-white/10 bg-[#080b14]/95 px-5 py-4 text-white shadow-lg shadow-slate-950/10 backdrop-blur-xl sm:px-8 lg:px-10">
    <div class="mx-auto flex max-w-[1400px] items-center justify-between gap-5">
        <div class="flex min-w-0 items-center gap-4">
            <a href="/" class="shrink-0" aria-label="BladewindUI home">
                <img src="/assets/images/bw-logo-white.png" alt="BladewindUI" class="h-6 w-auto sm:h-7" />
            </a>
            <span class="hidden h-5 w-px bg-white/15 sm:block"></span>
            <a href="/install" class="hidden rounded-full bg-white/8 px-3 py-1.5 text-xs font-semibold text-slate-300 transition hover:bg-white/12 hover:text-white sm:inline-flex">Documentation</a>
        </div>
        <div class="flex items-center gap-4 sm:gap-5">
            @if($showSearch)
                <button type="button" data-docs-search-open class="inline-flex h-9 items-center gap-2 rounded-full border border-white/10 bg-white/5 px-2.5 text-slate-300 transition hover:border-white/15 hover:bg-white/10 hover:text-white sm:px-3" aria-label="Search documentation" aria-controls="docs-search-dialog" aria-haspopup="dialog">
                    <x-bladewind::icon name="magnifying-glass" class="!size-4" />
                    <span class="hidden text-xs font-medium sm:inline">Search docs</span>
                    <kbd class="hidden rounded-md border border-white/10 bg-white/5 px-1.5 py-0.5 text-[10px] font-semibold text-slate-500 md:inline">⌘K</kbd>
                </button>
            @endif
            <div class="hidden items-center gap-2 text-[11px] font-semibold text-slate-500 lg:flex"><span>LTR</span><x-bladewind::toggle name="rtltr" onclick="switchDirection(dom_el('input[name=rtltr]'))" class="rtl:peer-checked:after:translate-x-full!" /><span>RTL</span></div>
            <div class="docs-header-tools flex items-center gap-5"><x-topright /></div>
            <button type="button" aria-label="Open navigation" class="grid size-9 place-items-center rounded-full border border-white/10 bg-white/5 text-slate-300 transition hover:bg-white/10 hover:text-white lg:hidden" onclick="animateCss('.navigation','slideInRight')"><x-bladewind::icon name="bars-3" class="!size-5" /></button>
        </div>
    </div>
</header>
