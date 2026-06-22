<x-bladewind::theme-switcher modular="true" class="text-white/50! hover:text-white/70!" />
<a href="https://github.com/mkocansey/bladewind" target="_blank" class="hidden ltr:ml-6 sm:block text-white/50 hover:text-white/70 dark:hover:text-slate-300 rtl:ml-4!"><span class="sr-only">BladewindUI on GitHub</span><svg viewBox="0 0 16 16" class="w-5 h-5" fill="currentColor" aria-hidden="true"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path></svg></a>
<a href="#" onclick="animateCss('.navigation','slideInRight');" class="ml-4 block text-slate-400 hover:text-slate-100 dark:hover:text-slate-300 sm:hidden"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg></a>
<div class="hidden sm:block">
    <x-bladewind::dropmenu modular="true">
        <x-slot:trigger>
            <span class="text-sm border border-transparent text-white/50 bg-white/10 hover:border hover:border-white/15 py-1 px-2 rounded-full">{{\Composer\InstalledVersions::getPrettyVersion('mkocansey/bladewind')}}
            <x-bladewind::icon name="chevron-down" class="!size-4" />
            </span>
        </x-slot:trigger>
        <x-bladewind::dropmenu.item>{{\Composer\InstalledVersions::getPrettyVersion('mkocansey/bladewind')}}</x-bladewind::dropmenu.item>
        <x-bladewind::dropmenu.item onclick="location.href='https://v3.bladewindui.com/install'">3.x</x-bladewind::dropmenu.item>
        <x-bladewind::dropmenu.item onclick="location.href='https://v2.bladewindui.com/install'">2.x</x-bladewind::dropmenu.item>
    </x-bladewind::dropmenu>
</div>
