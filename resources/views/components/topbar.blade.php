<div class="fixed w-full z-40 py-4 px-6 bg-linear-to-tr from-indigo-700 to-violet-800 dark:border-0 dark:shadow-slate-800 dark:shadow-none shadow-md dark:bg-dark-600 dark:bg-linear-to-r dark:from-dark-800 dark:via-dark-900 dark:to-dark-800 dark:border-b-4 dark:border-dark-600">
{{--<div class="fixed w-full z-40 py-4 px-6 bg-white/90 shadow-2xl shadow-indigo-100 dark:shadow-dark-800/30 border-b border-slate-300/70 dark:border-dark-600/70 dark:bg-dark-700/80">--}}
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between">
            <div onclick="location.href='/'" class="cursor-pointer flex">
                <img src="/assets/images/bw-logo-white.png" alt="logo" class="h-7" />
                <div class="sm:hidden bg-indigo-200 opacity-60 rounded-sm tracking-wider text-[10px] font-semibold text-black absolute left-43.5 top-10 px-1">{{\Composer\InstalledVersions::getPrettyVersion('mkocansey/bladewind')}}</div>
            </div>
            <div class="text-xs sm:rtl:flex-row-reverse sm:flex sm:items-center sm:space-x-2 hidden text-white/50">
                <span>LTR</span> <x-bladewind::toggle name="rtltr" onclick="switchDirection(dom_el('input[name=rtltr]'))" class="rtl:peer-checked:after:translate-x-full!" /> <span>RTL</span>
            </div>
            <div class="flex justify-end items-center space-x-5">
                <x-topright />
            </div>
        </div>
    </div>
</div>
