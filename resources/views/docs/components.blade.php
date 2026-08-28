@php
    $groups = [
        [
            'name' => 'Forms and input',
            'description' => 'Collect, validate and submit user input with consistent controls.',
            'icon' => 'pencil-square',
            'icon_class' => 'bg-indigo-50 text-indigo-600 dark:bg-indigo-400/10 dark:text-indigo-300',
            'items' => [
                ['Button', 'button', 'Trigger actions with primary, secondary, outline and icon styles.'],
                ['Checkbox', 'checkbox', 'Let users select one or more options clearly.'],
                ['CheckCard', 'checkcard', 'Turn rich content cards into selectable controls.'],
                ['Colorpicker', 'colorpicker', 'Choose colours through a compact visual control.'],
                ['Datepicker', 'datepicker', 'Select single dates, ranges and preset periods.'],
                ['Filepicker', 'filepicker', 'Handle drag-and-drop and conventional file selection.'],
                ['Input', 'input', 'Capture text with labels, icons, prefixes and validation.'],
                ['Input Group', 'input-group', 'Combine related controls into one cohesive field.'],
                ['Number', 'number', 'Capture numeric values with controlled stepping.'],
                ['Radio Button', 'radio-button', 'Choose a single option from a visible group.'],
                ['Select', 'select', 'Search and choose from single or multiple options.'],
                ['Slider', 'slider', 'Select a value or range on a visual scale.'],
                ['Textarea', 'textarea', 'Collect longer content with an optional toolbar.'],
                ['Timepicker', 'timepicker', 'Choose a time through an accessible interface.'],
                ['Toggle', 'toggle', 'Switch settings on or off with immediate feedback.'],
                ['Verification Code', 'verification-code', 'Capture OTP and verification digits cleanly.'],
            ],
        ],
        [
            'name' => 'Feedback and status',
            'description' => 'Communicate progress, outcomes and important changes.',
            'icon' => 'bell-alert',
            'icon_class' => 'bg-pink-50 text-pink-600 dark:bg-pink-400/10 dark:text-pink-300',
            'items' => [
                ['Alert', 'alert', 'Surface contextual information in multiple semantic styles.'],
                ['Bell', 'bell', 'Display notification counts and recent activity.'],
                ['Notification', 'notification', 'Show transient success, warning and error messages.'],
                ['Progress Bar', 'progress-bar', 'Represent completion with a horizontal progress track.'],
                ['Progress Circle', 'progress-circle', 'Show compact progress in a circular format.'],
                ['Rating', 'rating', 'Display and collect star-based ratings.'],
                ['Shimmer', 'shimmer', 'Provide skeleton loading states while content arrives.'],
                ['Spinner', 'spinner', 'Indicate short-running asynchronous activity.'],
                ['Tag', 'tag', 'Label statuses, categories and compact metadata.'],
            ],
        ],
        [
            'name' => 'Data and content',
            'description' => 'Present people, metrics and structured information beautifully.',
            'icon' => 'table-cells',
            'icon_class' => 'bg-cyan-50 text-cyan-600 dark:bg-cyan-400/10 dark:text-cyan-300',
            'items' => [
                ['Avatar', 'avatar', 'Represent people and teams with images or initials.'],
                ['Card', 'card', 'Group related content and actions in a flexible surface.'],
                ['Chart', 'chart', 'Visualize application data with configurable charts.'],
                ['Empty State', 'empty-state', 'Guide users when there is no content to display.'],
                ['Horizontal Line Graph', 'horizontal-line-graph', 'Compare values through compact horizontal bars.'],
                ['Icon', 'icon', 'Use the full Heroicons collection through Blade.'],
                ['List View', 'list-view', 'Display structured records in scannable rows.'],
                ['Statistic', 'statistic', 'Highlight important metrics and percentage changes.'],
                ['Table', 'table', 'Build searchable, sortable and responsive data tables.'],
                ['Timeline', 'timeline', 'Present events and milestones in chronological order.'],
            ],
        ],
        [
            'name' => 'Navigation and overlays',
            'description' => 'Structure workflows and reveal content at the right moment.',
            'icon' => 'squares-2x2',
            'icon_class' => 'bg-violet-50 text-violet-600 dark:bg-violet-400/10 dark:text-violet-300',
            'items' => [
                ['Breadcrumbs', 'breadcrumbs', 'Show page location with accessible and responsive navigation trails.'],
                ['Accordion', 'accordion', 'Organize dense information into expandable sections.'],
                ['Centered Content', 'centered-content', 'Center focused content within the viewport.'],
                ['Dropmenu', 'dropmenu', 'Present compact menus from any trigger.'],
                ['Drawer', 'drawer', 'Reveal supporting content from any viewport edge.'],
                ['Modal', 'modal', 'Focus attention on confirmations, forms and details.'],
                ['Popover', 'popover', 'Reveal contextual content beside a trigger.'],
                ['Process Indicator', 'process-indicator', 'Show progress through a multi-step workflow.'],
                ['Stepper', 'stepper', 'Guide users through named linear or non-linear workflows.'],
                ['Sortable', 'sortable', 'Reorder items through intuitive drag-and-drop.'],
                ['Tab', 'tab', 'Switch between related panels without leaving the page.'],
                ['Theme Switcher', 'theme-switcher', 'Offer light, dark and system appearance modes.'],
                ['Tooltip', 'tooltip', 'Explain controls with concise contextual labels.'],
            ],
        ],
    ];
    $componentCount = collect($groups)->sum(fn ($group) => count($group['items']));
@endphp

<x-meta>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <x-slot name="title">Explore all {{ $componentCount }} Laravel Blade components</x-slot>
    <style>
        .catalogue-card { transition: transform .2s ease, border-color .2s ease, box-shadow .2s ease; }
        .catalogue-card:hover { transform: translateY(-3px); box-shadow: 0 18px 40px rgba(15,23,42,.09); }
        .catalogue-grid { background-image: radial-gradient(circle at 1px 1px, rgba(99,102,241,.14) 1px, transparent 0); background-size: 28px 28px; }
        .catalogue-header-tools > a[href="#"] { display:none !important; }
        .dark .catalogue-card:hover { box-shadow: 0 18px 45px rgba(0,0,0,.28); }
    </style>
</x-meta>

<body class="min-h-screen bg-slate-50 text-slate-700 dark:bg-[#080b14] dark:text-slate-300">
    <nav class="navigation fixed right-0 top-0 z-50 hidden h-screen w-[300px] overflow-y-auto border-l border-slate-200 bg-white px-3 py-6 shadow-2xl dark:border-slate-800 dark:bg-slate-950 lg:hidden">
        <button type="button" aria-label="Close navigation" class="mb-5 ml-auto mr-2 grid size-10 place-items-center rounded-full bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-200" onclick="animateCss('.navigation','slideOutRight').then(() => hide('.navigation'))">
            <x-bladewind::icon name="x-mark" class="!size-5" />
        </button>
        <div class="docs-nav">@include('docs/nav')</div>
    </nav>

    <header class="fixed inset-x-0 top-0 z-40 border-b border-white/10 bg-[#080b14]/95 px-5 py-4 text-white shadow-lg shadow-slate-950/10 backdrop-blur-xl sm:px-8 lg:px-10">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-5">
            <a href="/" aria-label="BladewindUI home"><img src="/assets/images/bw-logo-white.png" alt="BladewindUI" class="h-6 w-auto sm:h-7" /></a>
            <div class="flex items-center gap-4 sm:gap-5">
                <a href="/components" class="hidden text-sm font-semibold text-white md:block">Components</a>
                <a href="/install" class="hidden text-sm font-medium text-slate-400 transition hover:text-white md:block">Documentation</a>
                <div class="catalogue-header-tools flex items-center gap-5"><x-topright /></div>
                <button type="button" aria-label="Open navigation" class="grid size-9 place-items-center rounded-full border border-white/10 bg-white/5 text-slate-300 transition hover:bg-white/10 hover:text-white lg:hidden" onclick="animateCss('.navigation','slideInRight')"><x-bladewind::icon name="bars-3" class="!size-5" /></button>
            </div>
        </div>
    </header>

    <main>
        <section class="catalogue-grid relative overflow-hidden border-b border-slate-200 bg-white px-5 pb-20 pt-36 dark:border-slate-800 dark:bg-slate-950 sm:px-8 sm:pb-24 sm:pt-40 lg:px-10">
            <div class="pointer-events-none absolute left-1/2 top-8 size-[38rem] -translate-x-1/2 rounded-full bg-indigo-300/20 blur-3xl dark:bg-indigo-600/10"></div>
            <div class="relative mx-auto max-w-4xl text-center">
                <div class="mx-auto mb-6 inline-flex items-center gap-2 rounded-full border border-indigo-200 bg-indigo-50 px-3 py-1.5 text-xs font-bold text-indigo-700 dark:border-indigo-400/15 dark:bg-indigo-400/10 dark:text-indigo-300">
                    <span class="size-1.5 rounded-full bg-indigo-500"></span>{{ $componentCount }} components and counting
                </div>
                <h1 class="text-5xl font-semibold leading-[1.02] tracking-[-.045em] text-slate-950 dark:text-white sm:text-6xl lg:text-7xl">Everything your Laravel interface needs.</h1>
                <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-slate-600 dark:text-slate-400">Explore production-ready Blade components built to look polished, work together and remain easy to customize.</p>

                <label for="component-search" class="relative mx-auto mt-9 block max-w-xl text-left">
                    <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-slate-400"><x-bladewind::icon name="magnifying-glass" class="!size-5" /></span>
                    <input id="component-search" type="search" autocomplete="off" placeholder="Search components..." class="h-14 w-full rounded-2xl border border-slate-200 bg-white pl-12 pr-4 text-sm text-slate-800 shadow-xl shadow-slate-200/50 outline-none transition placeholder:text-slate-400 focus:border-indigo-400 focus:ring-4 focus:ring-indigo-100 dark:border-slate-700 dark:bg-slate-900 dark:text-white dark:shadow-black/20 dark:focus:border-indigo-500 dark:focus:ring-indigo-500/10" />
                </label>
                <p id="component-search-status" class="mt-3 h-5 text-xs text-slate-400" aria-live="polite"></p>
            </div>
        </section>

        <section class="px-5 py-16 sm:px-8 sm:py-20 lg:px-10">
            <div class="mx-auto max-w-7xl">
                <div class="grid gap-5 lg:grid-cols-3">
                    <div class="rounded-3xl border border-slate-200 bg-white p-7 dark:border-slate-800 dark:bg-slate-900 lg:col-span-2">
                        <div class="flex items-center justify-between"><div><p class="text-xs font-bold uppercase tracking-[.18em] text-indigo-600 dark:text-indigo-300">Live preview</p><h2 class="mt-2 text-2xl font-semibold tracking-tight text-slate-950 dark:text-white">Sensible defaults. Flexible details.</h2></div><span class="hidden rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 dark:bg-emerald-400/10 dark:text-emerald-300 sm:block">Blade native</span></div>
                        <div class="mt-8 grid items-center gap-5 rounded-2xl border border-slate-200 bg-slate-50 p-5 dark:border-slate-800 dark:bg-slate-950 sm:grid-cols-[1fr_auto]">
                            <x-bladewind::input label="Workspace name" placeholder="Acme Studio" prefix="building-office" :prefix-is-icon="true" :add-clearing="false" />
                            <x-bladewind::button radius="medium">Create workspace</x-bladewind::button>
                        </div>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-7 dark:border-slate-800 dark:bg-slate-900">
                        <p class="text-xs font-bold uppercase tracking-[.18em] text-violet-600 dark:text-violet-300">One design language</p>
                        <div class="mt-7 flex items-center justify-between"><div class="flex -space-x-2"><x-bladewind::avatar image="/assets/images/audrey.jpeg" stacked size="small" /><x-bladewind::avatar image="/assets/images/francis.png" stacked size="small" /><x-bladewind::avatar image="/assets/images/sarpong.png" stacked size="small" /></div><x-bladewind::tag label="Active team" color="green" /></div>
                        <div class="mt-8"><div class="mb-2 flex justify-between text-xs"><span class="text-slate-500">Setup progress</span><span class="font-semibold text-slate-800 dark:text-slate-200">72%</span></div><x-bladewind::progress-bar percentage="72" color="violet" /></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="px-5 pb-24 sm:px-8 sm:pb-32 lg:px-10">
            <div class="mx-auto max-w-7xl">
                @foreach($groups as $group)
                    <section data-component-group class="mb-16 last:mb-0">
                        <div class="mb-7 flex items-start gap-4">
                            <div class="grid size-11 shrink-0 place-items-center rounded-2xl {{ $group['icon_class'] }}"><x-bladewind::icon :name="$group['icon']" class="!size-5" /></div>
                            <div><h2 class="text-2xl font-semibold tracking-tight text-slate-950 dark:text-white sm:text-3xl">{{ $group['name'] }}</h2><p class="mt-1 text-sm text-slate-500 dark:text-slate-400">{{ $group['description'] }}</p></div>
                        </div>
                        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach($group['items'] as $item)
                                <a data-component-card data-search="{{ strtolower($item[0].' '.$item[2].' '.$group['name']) }}" href="/component/{{ $item[1] }}" class="catalogue-card group rounded-2xl border border-slate-200 bg-white p-5 hover:border-indigo-300 dark:border-slate-800 dark:bg-slate-900 dark:hover:border-indigo-500/60">
                                    <div class="flex items-start justify-between gap-4"><h3 class="text-base font-semibold text-slate-900 transition group-hover:text-indigo-600 dark:text-slate-100 dark:group-hover:text-indigo-300">{{ $item[0] }}</h3><span class="grid size-8 shrink-0 place-items-center rounded-full bg-slate-100 text-slate-400 transition group-hover:bg-indigo-50 group-hover:text-indigo-600 dark:bg-slate-800 dark:group-hover:bg-indigo-400/10 dark:group-hover:text-indigo-300"><x-bladewind::icon name="arrow-up-right" class="!size-4" /></span></div>
                                    <p class="mt-3 text-sm leading-6 text-slate-500 dark:text-slate-400">{{ $item[2] }}</p>
                                </a>
                            @endforeach
                        </div>
                    </section>
                @endforeach

                <div id="component-empty-state" class="hidden rounded-3xl border border-dashed border-slate-300 px-6 py-16 text-center dark:border-slate-700"><div class="mx-auto grid size-12 place-items-center rounded-2xl bg-slate-100 text-slate-400 dark:bg-slate-800"><x-bladewind::icon name="magnifying-glass" class="!size-6" /></div><h2 class="mt-5 text-xl font-semibold text-slate-900 dark:text-white">No components found</h2><p class="mt-2 text-sm text-slate-500">Try a broader search term.</p></div>
            </div>
        </section>

        <section class="bg-slate-950 px-5 py-20 text-center text-white sm:px-8 lg:px-10"><div class="mx-auto max-w-2xl"><h2 class="text-4xl font-semibold tracking-[-.035em] sm:text-5xl">Ready to build?</h2><p class="mt-5 text-lg text-slate-400">Install the complete library or only the standalone components your project needs.</p><a href="/install" class="mt-8 inline-flex items-center gap-2 rounded-full bg-indigo-500 px-6 py-3.5 text-sm font-bold text-white transition hover:bg-indigo-400">Read the installation guide <x-bladewind::icon name="arrow-right" class="!size-4" /></a></div></section>
    </main>

    <x-site-footer />

    <script>
        switchDirection = (el) => {
            changeCss('.bw-tgl-sp-rtltr', 'rtl:flex-row-reverse');
            el.checked ? domEl('html').setAttribute('dir', 'rtl') : domEl('html').setAttribute('dir', 'ltr');
        };

        const componentSearch = document.getElementById('component-search');
        const componentCards = [...document.querySelectorAll('[data-component-card]')];
        const componentGroups = [...document.querySelectorAll('[data-component-group]')];
        const searchStatus = document.getElementById('component-search-status');
        const emptyState = document.getElementById('component-empty-state');

        componentSearch.addEventListener('input', (event) => {
            const query = event.target.value.trim().toLowerCase();
            let visibleCount = 0;
            componentCards.forEach(card => {
                const matches = !query || card.dataset.search.includes(query);
                card.classList.toggle('hidden', !matches);
                if (matches) visibleCount++;
            });
            componentGroups.forEach(group => {
                const hasVisibleCards = [...group.querySelectorAll('[data-component-card]')].some(card => !card.classList.contains('hidden'));
                group.classList.toggle('hidden', !hasVisibleCards);
            });
            searchStatus.textContent = query ? `${visibleCount} component${visibleCount === 1 ? '' : 's'} found` : '';
            emptyState.classList.toggle('hidden', visibleCount !== 0);
        });
    </script>
</body>
</html>
