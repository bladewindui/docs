@props(['onWhite' => false])

<footer class="border-t px-5 py-8 text-slate-500 sm:px-8 lg:px-10 {{ $onWhite ? 'border-slate-200 bg-white dark:border-white/10 dark:bg-slate-950' : 'border-white/10 bg-slate-950' }}">
    <div class="mx-auto flex max-w-7xl flex-col gap-5 text-xs sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-4">
            @if($onWhite)
                <img src="/assets/images/bw-logo.png" alt="BladewindUI" class="h-5 w-auto dark:hidden" />
                <img src="/assets/images/bw-logo-white.png" alt="BladewindUI" class="hidden h-5 w-auto opacity-60 dark:block" />
            @else
                <img src="/assets/images/bw-logo-white.png" alt="BladewindUI" class="h-5 w-auto opacity-60" />
            @endif
            <span>{{ \Composer\InstalledVersions::getPrettyVersion('bladewindui/ui') }}</span>
        </div>
        <div class="flex flex-wrap gap-5">
            <a href="/install" class="transition hover:text-slate-950 dark:hover:text-white {{ $onWhite ? '' : 'hover:!text-white' }}">Documentation</a>
            <a href="/mcp" class="transition hover:text-slate-950 dark:hover:text-white {{ $onWhite ? '' : 'hover:!text-white' }}">MCP server</a>
            <a href="/contribute" class="transition hover:text-slate-950 dark:hover:text-white {{ $onWhite ? '' : 'hover:!text-white' }}">Contribute</a>
            <a href="https://github.com/bladewindui/ui" target="_blank" class="transition hover:text-slate-950 dark:hover:text-white {{ $onWhite ? '' : 'hover:!text-white' }}">GitHub</a>
        </div>
    </div>
</footer>
