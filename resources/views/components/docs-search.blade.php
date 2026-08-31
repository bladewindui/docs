<div id="docs-search-dialog" class="fixed inset-0 z-[70] hidden" role="dialog" aria-modal="true" aria-labelledby="docs-search-title">
    <button type="button" data-docs-search-close class="absolute inset-0 size-full cursor-default bg-slate-950/70 backdrop-blur-sm" aria-label="Close documentation search"></button>

    <div class="relative mx-auto mt-3 w-[calc(100%-1.5rem)] max-w-2xl overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-slate-950/25 dark:border-slate-700 dark:bg-slate-900 sm:mt-[8vh] sm:w-[calc(100%-3rem)]">
        <div class="border-b border-slate-200 p-4 dark:border-slate-800 sm:p-5">
            <div class="flex items-center gap-3">
                <x-bladewind::icon name="magnifying-glass" class="!size-5 shrink-0 text-slate-400" />
                <label id="docs-search-title" for="docs-search-input" class="sr-only">Search documentation</label>
                <input id="docs-search-input" type="search" autocomplete="off" placeholder="Search components, guides and examples..." class="h-10 min-w-0 flex-1 border-0 bg-transparent p-0 text-base text-slate-900 outline-none ring-0 placeholder:text-slate-400 focus:border-0 focus:outline-none focus:ring-0 dark:text-white dark:placeholder:text-slate-500" />
                <button type="button" data-docs-search-close class="grid size-8 shrink-0 place-items-center rounded-full bg-slate-100 text-slate-500 transition hover:bg-slate-200 hover:text-slate-700 dark:bg-slate-800 dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white" aria-label="Close search">
                    <x-bladewind::icon name="x-mark" class="!size-4" />
                </button>
            </div>
        </div>

        <div class="min-h-72 max-h-[min(65vh,34rem)] overflow-y-auto p-3 sm:p-4">
            <div id="docs-search-welcome" class="grid min-h-64 place-items-center px-6 text-center">
                <div>
                    <div class="mx-auto grid size-12 place-items-center rounded-2xl bg-indigo-50 text-indigo-600 dark:bg-indigo-400/10 dark:text-indigo-300"><x-bladewind::icon name="book-open" class="!size-6" /></div>
                    <p class="mt-4 text-sm font-semibold text-slate-800 dark:text-slate-200">Search the complete documentation</p>
                    <p class="mt-1 text-xs leading-5 text-slate-500">Find components, attributes, setup guides and section-level answers.</p>
                </div>
            </div>

            <div id="docs-search-loading" class="hidden min-h-64 place-items-center text-center">
                <div><x-bladewind::spinner size="small" /><p class="mt-3 text-xs text-slate-500">Searching documentation…</p></div>
            </div>

            <div id="docs-search-empty" class="hidden min-h-64 place-items-center px-6 text-center">
                <div>
                    <div class="mx-auto grid size-12 place-items-center rounded-2xl bg-slate-100 text-slate-400 dark:bg-slate-800 dark:text-slate-500"><x-bladewind::icon name="magnifying-glass" class="!size-6" /></div>
                    <p class="mt-4 text-sm font-semibold text-slate-800 dark:text-slate-200">No results found</p>
                    <p class="mt-1 text-xs text-slate-500">Try a component name, attribute or broader phrase.</p>
                </div>
            </div>

            <div id="docs-search-error" class="hidden min-h-64 place-items-center px-6 text-center">
                <div><p class="text-sm font-semibold text-red-600 dark:text-red-300">Search is temporarily unavailable</p><p class="mt-1 text-xs text-slate-500">Please try again in a moment.</p></div>
            </div>

            <div id="docs-search-results" class="hidden space-y-1" role="listbox" aria-label="Documentation search results"></div>
            <p id="docs-search-status" class="sr-only" aria-live="polite"></p>
        </div>

        <div class="hidden items-center justify-between border-t border-slate-200 px-5 py-3 text-[10px] font-medium text-slate-400 dark:border-slate-800 sm:flex">
            <span><kbd class="rounded border border-slate-200 bg-slate-50 px-1.5 py-0.5 dark:border-slate-700 dark:bg-slate-800">↑</kbd> <kbd class="rounded border border-slate-200 bg-slate-50 px-1.5 py-0.5 dark:border-slate-700 dark:bg-slate-800">↓</kbd> to navigate</span>
            <span><kbd class="rounded border border-slate-200 bg-slate-50 px-1.5 py-0.5 dark:border-slate-700 dark:bg-slate-800">Enter</kbd> to open · <kbd class="rounded border border-slate-200 bg-slate-50 px-1.5 py-0.5 dark:border-slate-700 dark:bg-slate-800">Esc</kbd> to close</span>
        </div>
    </div>
</div>

<script>
    (() => {
        const dialog = document.getElementById('docs-search-dialog');
        const input = document.getElementById('docs-search-input');
        const welcome = document.getElementById('docs-search-welcome');
        const loading = document.getElementById('docs-search-loading');
        const empty = document.getElementById('docs-search-empty');
        const error = document.getElementById('docs-search-error');
        const results = document.getElementById('docs-search-results');
        const status = document.getElementById('docs-search-status');
        const openButtons = document.querySelectorAll('[data-docs-search-open]');
        const closeButtons = dialog.querySelectorAll('[data-docs-search-close]');
        let debounceTimer;
        let requestController;
        let activeIndex = -1;
        let resultLinks = [];
        let previouslyFocused;

        const setPanel = (panel) => {
            [welcome, loading, empty, error, results].forEach(element => {
                element.classList.toggle('hidden', element !== panel);
                if (element === loading || element === empty || element === error) {
                    element.classList.toggle('grid', element === panel);
                }
            });
        };

        const openSearch = (trigger = null) => {
            if (dialog.classList.contains('hidden')) {
                previouslyFocused = trigger ?? document.activeElement;
            }
            dialog.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            window.setTimeout(() => input.focus(), 0);
        };

        const closeSearch = () => {
            dialog.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            activeIndex = -1;
            previouslyFocused?.focus();
        };

        const selectResult = (index) => {
            if (!resultLinks.length) return;
            activeIndex = (index + resultLinks.length) % resultLinks.length;
            resultLinks.forEach((link, linkIndex) => {
                const isActive = linkIndex === activeIndex;
                link.classList.toggle('bg-indigo-50', isActive);
                link.classList.toggle('dark:bg-indigo-400/10', isActive);
                link.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });
            resultLinks[activeIndex].scrollIntoView({ block: 'nearest' });
        };

        const resultElement = (result) => {
            const link = document.createElement('a');
            link.href = result.url;
            link.className = 'group block rounded-2xl px-4 py-3.5 transition hover:bg-slate-50 focus:bg-indigo-50 focus:outline-none dark:hover:bg-slate-800/70 dark:focus:bg-indigo-400/10';
            link.setAttribute('role', 'option');
            link.setAttribute('aria-selected', 'false');

            const heading = document.createElement('div');
            heading.className = 'flex items-start justify-between gap-4';

            const titleWrap = document.createElement('div');
            titleWrap.className = 'min-w-0';
            const title = document.createElement('div');
            title.className = 'truncate text-sm font-semibold text-slate-900 group-hover:text-indigo-700 dark:text-slate-100 dark:group-hover:text-indigo-300';
            title.textContent = result.title;
            titleWrap.appendChild(title);

            if (result.section) {
                const section = document.createElement('div');
                section.className = 'mt-0.5 truncate text-xs font-medium text-indigo-600 dark:text-indigo-300';
                section.textContent = result.section;
                titleWrap.appendChild(section);
            }

            const category = document.createElement('span');
            category.className = 'shrink-0 rounded-full bg-slate-100 px-2 py-1 text-[9px] font-bold uppercase tracking-wider text-slate-500 dark:bg-slate-800 dark:text-slate-400';
            category.textContent = result.category;
            heading.append(titleWrap, category);

            const excerpt = document.createElement('p');
            excerpt.className = 'mt-2 line-clamp-2 text-xs leading-5 text-slate-500 dark:text-slate-400';
            excerpt.textContent = result.excerpt;
            link.append(heading, excerpt);
            return link;
        };

        const runSearch = async () => {
            const query = input.value.trim();
            activeIndex = -1;

            if (query.length < 2) {
                requestController?.abort();
                results.replaceChildren();
                resultLinks = [];
                status.textContent = '';
                setPanel(welcome);
                return;
            }

            requestController?.abort();
            requestController = new AbortController();
            setPanel(loading);

            try {
                const response = await fetch(`/api/docs/search?q=${encodeURIComponent(query)}`, {
                    headers: { Accept: 'application/json' },
                    signal: requestController.signal,
                });

                if (!response.ok) throw new Error('Search request failed');
                const payload = await response.json();
                results.replaceChildren(...payload.results.map(resultElement));
                resultLinks = [...results.querySelectorAll('a')];
                status.textContent = `${resultLinks.length} search ${resultLinks.length === 1 ? 'result' : 'results'} found`;
                setPanel(resultLinks.length ? results : empty);
            } catch (searchError) {
                if (searchError.name !== 'AbortError') {
                    status.textContent = 'Search is temporarily unavailable';
                    setPanel(error);
                }
            }
        };

        openButtons.forEach(button => button.addEventListener('click', event => openSearch(event.currentTarget)));
        closeButtons.forEach(button => button.addEventListener('click', closeSearch));

        input.addEventListener('input', () => {
            window.clearTimeout(debounceTimer);
            debounceTimer = window.setTimeout(runSearch, 180);
        });

        input.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowDown') {
                event.preventDefault();
                selectResult(activeIndex + 1);
            } else if (event.key === 'ArrowUp') {
                event.preventDefault();
                selectResult(activeIndex - 1);
            } else if (event.key === 'Enter' && activeIndex >= 0) {
                event.preventDefault();
                resultLinks[activeIndex].click();
            }
        });

        document.addEventListener('keydown', (event) => {
            if ((event.metaKey || event.ctrlKey) && event.key.toLowerCase() === 'k') {
                event.preventDefault();
                openSearch();
            } else if (event.key === 'Escape' && !dialog.classList.contains('hidden')) {
                closeSearch();
            } else if (event.key === 'Tab' && !dialog.classList.contains('hidden')) {
                const focusable = [...dialog.querySelectorAll('button:not([disabled]), input:not([disabled]), a[href]')]
                    .filter(element => element.offsetParent !== null);
                const first = focusable[0];
                const last = focusable[focusable.length - 1];

                if (event.shiftKey && document.activeElement === first) {
                    event.preventDefault();
                    last.focus();
                } else if (!event.shiftKey && document.activeElement === last) {
                    event.preventDefault();
                    first.focus();
                }
            }
        });
    })();
</script>
