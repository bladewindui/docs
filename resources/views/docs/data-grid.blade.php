<x-app>
    <x-slot:title>Data Grid Component</x-slot:title>
    <x-slot:page_title>Data Grid</x-slot:page_title>

    <p>Data Grid is a higher-level companion to <a href="/component/table">Table</a>: an accessible data grid with column sorting, searching, row selection, sticky headers, and both client-side and server-driven state, all built in rather than assembled by hand. It renders a native <code class="inline">&lt;table&gt;</code>, so every interaction, sorting, selecting, paging, searching, happens through real, independently keyboard-operable controls rather than a hand-rolled widget.</p>

    @php
        $statusColors = [
            'paid' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-500/10 dark:text-emerald-400',
            'pending' => 'bg-amber-100 text-amber-700 dark:bg-amber-500/10 dark:text-amber-400',
            'refunded' => 'bg-slate-200 text-slate-600 dark:bg-slate-500/10 dark:text-slate-400',
        ];
        $statusPill = function ($value) use ($statusColors) {
            $class = $statusColors[$value] ?? $statusColors['pending'];
            return '<span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium '.$class.'">'.ucfirst($value).'</span>';
        };

        $customerNames = [
            'Kofi Addo', 'Akosua Owusu', 'Ama Mensah', 'Yaw Boateng', 'Efua Asante',
            'Kwame Nkrumah Jr.', 'Abena Darko', 'Kwabena Osei', 'Adjoa Frimpong', 'Kojo Asante',
            'Akua Sarpong', 'Yaa Amponsah', 'Kwesi Appiah', 'Afia Boadu', 'Kwaku Antwi', 'Esi Danso',
        ];
        $statusCycle = ['paid', 'paid', 'paid', 'pending', 'paid', 'refunded', 'pending', 'paid', 'paid', 'pending'];

        $orders = [];
        foreach (range(1, 34) as $i) {
            $orders[] = [
                'id' => $i,
                'reference' => 'ORD-'.(1040 + $i),
                'customer' => $customerNames[($i - 1) % count($customerNames)],
                'status' => $statusCycle[($i - 1) % count($statusCycle)],
                'total' => (($i * 3697) % 18000) + 2500,
                'placed_at' => now()->subDays(34 - $i)->format('M j, Y'),
            ];
        }

        $orderColumns = [
            ['key' => 'reference', 'label' => 'Reference', 'sortable' => true],
            ['key' => 'customer', 'label' => 'Customer', 'sortable' => true],
            ['key' => 'status', 'label' => 'Status', 'align' => 'center', 'format' => $statusPill],
            ['key' => 'total', 'label' => 'Total', 'align' => 'right', 'sortable' => true,
                'format' => fn ($v) => '$'.number_format($v / 100, 2)],
        ];
    @endphp

    <x-bladewind::data-grid name="orders-grid" label="Orders" searchable="true" selectable="true"
        sortable="true" paginated="true" page-size="10" :columns="$orderColumns" :rows="$orders" />

    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid
    name="orders-grid"
    label="Orders"
    searchable="true"
    selectable="true"
    sortable="true"
    paginated="true"
    page-size="10"
    :columns="[
        ['key' => 'reference', 'label' => 'Reference', 'sortable' => true],
        ['key' => 'customer', 'label' => 'Customer', 'sortable' => true],
        ['key' => 'status', 'label' => 'Status', 'align' => 'center', 'format' => $statusPill],
        ['key' => 'total', 'label' => 'Total', 'align' => 'right', 'sortable' => true,
            'format' => fn ($value) => '$'.number_format($value / 100, 2)],
    ]"
    :rows="$orders" /&gt;</code></pre>
    <p>The example above uses 34 orders, enough for four real pages at the default page size, so paging, sorting, and searching all have something genuine to work against instead of a handful of rows that fit on one screen anyway.</p>

    <h2 id="columns">Columns and Rows</h2>
    <p>Each column accepts <code class="inline">key</code>, <code class="inline">label</code>, <code class="inline">align</code>, <code class="inline">width</code>, <code class="inline">sortable</code>, <code class="inline">class</code>, and two callbacks: <code class="inline">format($value, $row)</code> for display, and <code class="inline">sort($value, $row)</code> for when the sortable value should differ from the displayed one. <code class="inline">rows</code> is an array of associative arrays or objects; a row's identity comes from <code class="inline">row-key</code>, which defaults to <code class="inline">id</code>.</p>

    <h3 id="column-shorthand">Shorthand Column Syntax</h3>
    <p>Writing out <code class="inline">['key' => 'name', 'label' => 'Name']</code> for every column is tedious when you just want the label auto-generated from the key. Pass a plain array of key strings instead, and the grid title-cases each key and swaps underscores for spaces to build the label.</p>
    <p>Shorthand columns skip the <code class="inline">format</code> and <code class="inline">sort</code> callbacks entirely, so cells render whatever raw value the field holds. That is fine for text and status fields, and the reason the example below leaves <code class="inline">total</code> out: an unformatted amount in cents is not something you would want to ship.</p>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="short-columns" label="Reviewers"
    :columns="['reference', 'customer', 'status']"
    :rows="$orders" /&gt;</code></pre>
    <x-bladewind::data-grid name="short-columns" label="Reviewers" :columns="['reference', 'customer', 'status']" :rows="array_slice($orders, 0, 4)" />
    <p>You can also pass an associative array of <code class="inline">key => label</code> pairs when you only need to rename a column, without the full array shape.</p>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="aliased-columns" label="Reviewers"
    :columns="['reference' => 'Order #', 'customer' => 'Placed By', 'status' => 'State']"
    :rows="$orders" /&gt;</code></pre>
    <x-bladewind::data-grid name="aliased-columns" label="Reviewers" :columns="['reference' => 'Order #', 'customer' => 'Placed By', 'status' => 'State']" :rows="array_slice($orders, 0, 4)" />

    <h3 id="column-format">Formatting a Column</h3>
    <p><code class="inline">format($value, $row)</code> receives the raw cell value and the full row, and its return value is rendered as raw HTML rather than escaped text. That means a format callback can return a styled badge, an icon, or a link, not just a plain string. The Status column in the orders grid above uses exactly this to render a colour-coded pill:</p>
    <pre class="language-php line-numbers"><code>$statusColors = [
    'paid' => 'bg-emerald-100 text-emerald-700',
    'pending' => 'bg-amber-100 text-amber-700',
    'refunded' => 'bg-slate-200 text-slate-600',
];

$columns = [
    // ...
    [
        'key' => 'status',
        'label' => 'Status',
        'align' => 'center',
        'format' => function ($value) use ($statusColors) {
            $class = $statusColors[$value] ?? $statusColors['pending'];
            return '&lt;span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium '.$class.'"&gt;'
                .ucfirst($value).'&lt;/span&gt;';
        },
    ],
];</code></pre>
    <x-bladewind::alert type="warning" show_close_icon="false">Because <code class="inline">format</code> output is not escaped, never feed it raw user input without sanitising first. Build the HTML yourself around a trusted value, as above, or run untrusted text through <code class="inline">e()</code> before it goes into the string.</x-bladewind::alert>

    <h3 id="column-sort">Custom Sort Values</h3>
    <p>Sorting compares the raw cell value by default, before <code class="inline">format</code> runs. That is correct for the currency column above, since <code class="inline">total</code> is already an integer number of cents. It breaks down for a column whose sortable order should not match either the raw value or the formatted text, a date stored as a display string, or a status that should sort by severity rather than alphabetically. Give the column its own <code class="inline">sort($value, $row)</code> callback to override just the comparison value.</p>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="status-priority" label="Orders by priority" sortable="true"
    :columns="[
        ['key' => 'reference', 'label' => 'Reference'],
        ['key' => 'status', 'label' => 'Status', 'align' => 'center',
            'format' => $statusPill,
            'sort' => fn ($value) => ['refunded' => 0, 'pending' => 1, 'paid' => 2][$value] ?? 1],
    ]"
    :rows="$orders" /&gt;</code></pre>
    @php
        $priorityColumns = [
            ['key' => 'reference', 'label' => 'Reference'],
            ['key' => 'customer', 'label' => 'Customer'],
            ['key' => 'status', 'label' => 'Status', 'align' => 'center', 'format' => $statusPill,
                'sort' => fn ($v) => ['refunded' => 0, 'pending' => 1, 'paid' => 2][$v] ?? 1],
        ];
    @endphp
    <x-bladewind::data-grid name="status-priority" label="Orders by priority" sortable="true" paginated="true" page-size="8" :columns="$priorityColumns" :rows="$orders" />
    <br />
    <p>Click the Status header above: refunded orders sort first, then pending, then paid, even though the visible text is a badge rather than the plain word the sort actually compares.</p>

    <h3 id="row-key">Row Identity</h3>
    <p>Every row needs a stable, unique key so selection, sorting, and pagination can track it across re-renders. By default the grid reads <code class="inline">id</code> off each row. Set <code class="inline">row-key</code> when your data's identifier is called something else, an order reference, a UUID column, a database primary key with a different name.</p>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="by-reference" label="Orders" row-key="reference"
    :columns="$orderColumns" :rows="$orders" /&gt;</code></pre>

    <h2 id="sorting">Sorting</h2>
    <p>Set <code class="inline">sortable="true"</code> on the grid to make every column sortable, or set <code class="inline">sortable</code> per column, as the Reference and Customer columns do in the first example on this page. Clicking a header cycles none, ascending, descending, none again.</p>
    <x-bladewind::alert show_close_icon="false"><code class="inline">client-sort</code> defaults to <code class="inline">true</code> and reorders rows in the browser. Set it to <code class="inline">false</code> for a server-driven grid: clicking a header only updates the arrow indicator and emits <code class="inline">bladewind:data-grid:sort-change</code>, leaving the actual reordering to the application.</x-bladewind::alert>

    <h3 id="default-sort">Sorting on Load</h3>
    <p>Pass <code class="inline">sort-key</code> and <code class="inline">sort-direction</code> to render the grid already sorted, useful for a grid that should default to showing the newest or highest-value rows first without the user having to click anything.</p>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="highest-value-first" label="Orders by value"
    sortable="true" sort-key="total" sort-direction="desc"
    :columns="$orderColumns" :rows="$orders" /&gt;</code></pre>
    <x-bladewind::data-grid name="highest-value-first" label="Orders by value" sortable="true" sort-key="total" sort-direction="desc" paginated="true" page-size="6" :columns="$orderColumns" :rows="$orders" />

    <h3 id="server-sort">Server-Driven Sorting</h3>
    <p>With <code class="inline">client-sort="false"</code>, clicking a sortable header does not touch the DOM. It fires a cancelable <code class="inline">before-sort-change</code> followed by <code class="inline">sort-change</code>, with the column key and the new direction in the event detail. Handle it, refetch the sorted page from your backend, and re-render the grid, the same pattern used by the search and pagination events further down this page.</p>
    <pre class="language-js line-numbers"><code>document.addEventListener('bladewind:data-grid:sort-change', (event) =&gt; {
    if (event.detail.name !== 'orders-grid') return;
    const { key, direction } = event.detail;
    setDataGridLoading('orders-grid', true);
    fetch(`/orders?sort=${key}&amp;direction=${direction}`)
        .then((response) =&gt; response.text())
        .then((html) =&gt; {
            document.getElementById('orders-grid-wrapper').innerHTML = html;
        });
});</code></pre>

    <h2 id="searching">Searching</h2>
    <p><code class="inline">searchable="true"</code> renders a toolbar search field. <code class="inline">client-search</code> defaults to <code class="inline">true</code> and filters rows by their rendered cell text as you type. Try searching for a customer name in the first example on this page, or for a status like <em>refunded</em>.</p>
    <p>Customise the placeholder with <code class="inline">search-placeholder</code>:</p>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="orders-grid" searchable="true" search-placeholder="Search by reference or customer…"
    :columns="$orderColumns" :rows="$orders" /&gt;</code></pre>

    <h3 id="server-search">Server-Driven Searching</h3>
    <p>Set <code class="inline">client-search="false"</code> to filter server-side instead. The grid renders no filtering itself, it emits <code class="inline">bladewind:data-grid:search</code> with the current query on every keystroke, so debounce it yourself before hitting your backend.</p>
    <pre class="language-js line-numbers"><code>let searchTimer;
document.addEventListener('bladewind:data-grid:search', (event) =&gt; {
    if (event.detail.name !== 'orders-grid') return;
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() =&gt; {
        setDataGridLoading('orders-grid', true);
        fetch(`/orders?q=${encodeURIComponent(event.detail.query)}`)
            .then((response) =&gt; response.text())
            .then((html) =&gt; {
                document.getElementById('orders-grid-wrapper').innerHTML = html;
            });
    }, 300);
});</code></pre>

    <h2 id="selection">Row Selection</h2>
    <p><code class="inline">selectable="true"</code> adds a selection column. <code class="inline">selection-mode</code> is <code class="inline">multiple</code> (checkboxes, with a tri-state select-all in the header, scoped to the current page or search results) or <code class="inline">single</code> (radio buttons). A selection bar appears above the grid once anything is selected, with a clear-selection control and an optional <code class="inline">bulk-actions</code> slot for custom buttons.</p>

    <h3 id="multiple-selection">Multiple Selection</h3>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="bulk-orders" label="Orders" selectable="true" selection-mode="multiple"
    paginated="true" page-size="8" :columns="$orderColumns" :rows="$orders" /&gt;</code></pre>
    <x-bladewind::data-grid name="bulk-orders" label="Orders" selectable="true" selection-mode="multiple" paginated="true" page-size="8" :columns="$orderColumns" :rows="$orders" />

    <h3 id="single-selection">Single Selection</h3>
    <p>Use <code class="inline">selection-mode="single"</code> for pick-one flows, choosing a reviewer to assign, picking a default address, selecting one plan.</p>
    <x-bladewind::data-grid name="assignee-grid" label="Assign reviewer" selectable="true" selection-mode="single"
        :columns="[['key' => 'name', 'label' => 'Reviewer'], ['key' => 'department', 'label' => 'Department']]"
        :rows="[
            ['id' => 'ama', 'name' => 'Ama Mensah', 'department' => 'Support'],
            ['id' => 'kofi', 'name' => 'Kofi Addo', 'department' => 'Engineering'],
            ['id' => 'yaw', 'name' => 'Yaw Boateng', 'department' => 'Finance'],
        ]" />

    <h3 id="preselected">Preselected Rows</h3>
    <p>Pass <code class="inline">selected</code> with an array of row keys to render the grid with some rows already checked, useful for an edit form that reopens with a saved set of chosen rows.</p>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="preselected-orders" label="Orders" selectable="true"
    :selected="['3', '7', '12']"
    :columns="$orderColumns" :rows="$orders" /&gt;</code></pre>
    <x-bladewind::data-grid name="preselected-orders" label="Orders" selectable="true" :selected="['3', '7', '12']" paginated="true" page-size="6" :columns="$orderColumns" :rows="$orders" />

    <h3 id="bulk-actions">Bulk Actions</h3>
    <p>The <code class="inline">bulk-actions</code> slot renders inside the selection bar, next to the clear-selection control, and only appears once at least one row is selected. Pair it with <code class="inline">dataGridSelectedKeys()</code> to read the current selection when a bulk action fires.</p>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="orders-with-actions" label="Orders" selectable="true"
    :columns="$orderColumns" :rows="$orders"&gt;
    &lt;x-slot:bulk-actions&gt;
        &lt;x-bladewind::button size="small" onclick="alert('Exporting: ' + dataGridSelectedKeys('orders-with-actions').join(', '))"&gt;Export&lt;/x-bladewind::button&gt;
        &lt;x-bladewind::button size="small" type="red" onclick="alert('Deleting: ' + dataGridSelectedKeys('orders-with-actions').join(', '))"&gt;Delete&lt;/x-bladewind::button&gt;
    &lt;/x-slot:bulk-actions&gt;
&lt;/x-bladewind::data-grid&gt;</code></pre>
    <x-bladewind::data-grid name="orders-with-actions" label="Orders" selectable="true" paginated="true" page-size="6" :columns="$orderColumns" :rows="$orders">
        <x-slot:bulk-actions>
            <x-bladewind::button size="small" onclick="alert('Exporting: ' + dataGridSelectedKeys('orders-with-actions').join(', '))">Export</x-bladewind::button>
            <x-bladewind::button size="small" type="red" onclick="alert('Deleting: ' + dataGridSelectedKeys('orders-with-actions').join(', '))">Delete</x-bladewind::button>
        </x-slot:bulk-actions>
    </x-bladewind::data-grid>
    <br />
    <p>Select a couple of rows above, then try the Export and Delete buttons that appear in the selection bar.</p>

    <h2 id="pagination">Pagination and Server-Driven State</h2>
    <p>Set <code class="inline">paginated="true"</code> with <code class="inline">page-size</code> for client-side pagination, as in the orders grid at the top of this page. The grid renders its own previous and next footer and keeps it in sync with sorting and searching, page one always reflects whatever the current sort and search produce.</p>

    <h3 id="client-pagination">Client-Side Pagination at Scale</h3>
    <p>Client pagination still ships every row to the browser and pages through them there, which is fine for a few hundred rows but the wrong tool once a dataset grows past what is reasonable to send on every page load. The grid below pages through the same 34-row order list at a smaller page size, six pages of six rows each, to show the previous and next controls disabling correctly at both ends.</p>
    <x-bladewind::data-grid name="small-pages" label="Orders, six per page" paginated="true" page-size="6" :columns="$orderColumns" :rows="$orders" />

    <h3 id="server-pagination">Server-Driven Pagination</h3>
    <p>Pass a real Laravel paginator through <code class="inline">paginator</code> instead of setting <code class="inline">paginated</code> directly, the grid detects it and switches into server mode on its own, rendering Pagination's standard page links. <code class="inline">rows</code> should be the paginator's current-page items, not the full dataset.</p>
    <pre class="language-php line-numbers"><code>// in your controller or route closure
$staff = Staff::query()-&gt;orderBy('company_name')-&gt;paginate(8);
return view('staff.index', ['staff' =&gt; $staff]);</code></pre>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="staff-directory" label="Staff directory" row-key="member_id"
    :columns="[
        ['key' =&gt; 'company_name', 'label' =&gt; 'Company', 'sortable' =&gt; true],
        ['key' =&gt; 'first_name', 'label' =&gt; 'Contact', 'format' =&gt; fn ($v, $row) =&gt; $row['first_name'].' '.$row['last_name']],
        ['key' =&gt; 'mobile', 'label' =&gt; 'Mobile'],
        ['key' =&gt; 'email', 'label' =&gt; 'Email'],
    ]"
    :rows="$staff-&gt;items()"
    :paginator="$staff" /&gt;</code></pre>
    @php
        $staffAll = collect(include resource_path('views/docs/users.php'));
        $staffPage = \Illuminate\Pagination\Paginator::resolveCurrentPage('staff_page') ?: 1;
        $staffPerPage = 8;
        $staffPaginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $staffAll->forPage($staffPage, $staffPerPage)->values(),
            $staffAll->count(),
            $staffPerPage,
            $staffPage,
            ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(), 'pageName' => 'staff_page']
        );
        $staffColumns = [
            ['key' => 'company_name', 'label' => 'Company', 'sortable' => true],
            ['key' => 'first_name', 'label' => 'Contact', 'format' => fn ($v, $row) => $row['first_name'].' '.$row['last_name']],
            ['key' => 'mobile', 'label' => 'Mobile'],
            ['key' => 'email', 'label' => 'Email'],
        ];
    @endphp
    <x-bladewind::data-grid name="staff-directory" label="Staff directory" row-key="member_id"
        :columns="$staffColumns" :rows="$staffPaginator->items()" :paginator="$staffPaginator" />
    <br />
    <p>This one is not a simulation. The 222-record directory behind it lives in a plain PHP file on the server, and the page links above genuinely reload the page with a real, different set of 8 records each time, exactly what a database-backed grid would do.</p>
    <x-bladewind::alert type="warning" show_close_icon="false">A grid built from a real paginator ignores <code class="inline">sortable</code> and <code class="inline">searchable</code> client-side behaviour for the same reason client pagination does not apply here: the rows in the DOM are only ever one page's worth. Wire header clicks and the search field to your query string or an event listener instead, the same pattern shown under <a href="#server-sort">server-driven sorting</a> and <a href="#server-search">server-driven searching</a> above.</x-bladewind::alert>

    <h3 id="loading">Loading State</h3>
    <p>Set <code class="inline">loading="true"</code>, or call <code class="inline">setDataGridLoading(name, true)</code>, while an application fetches new rows for a server-driven grid. The table dims and shows a progress indicator, and screen readers see <code class="inline">aria-busy="true"</code>.</p>
    <x-bladewind::data-grid name="loading-demo" label="Orders" :columns="$orderColumns" :rows="array_slice($orders, 0, 5)" />
    <br />
    <p class="text-center">
        <x-bladewind::button size="small" onclick="setDataGridLoading('loading-demo', true); setTimeout(() => setDataGridLoading('loading-demo', false), 5000)">Simulate a 5 second fetch</x-bladewind::button>
    </p>

    <h2 id="appearance">Appearance</h2>
    <p><code class="inline">striped</code>, <code class="inline">bordered</code>, and <code class="inline">dense</code> control visual density. <code class="inline">sticky</code> keeps the header pinned while the body scrolls, and defaults to <code class="inline">true</code>. Set <code class="inline">height</code> to cap the grid at a fixed height with an internal scrollbar rather than letting it grow with the row count.</p>

    <h3 id="striped-appearance">Striped</h3>
    <x-bladewind::data-grid name="striped-grid" label="Orders" striped="true" :columns="$orderColumns" :rows="array_slice($orders, 0, 6)" />
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="striped-grid" label="Orders" striped="true" :columns="$orderColumns" :rows="$orders" /&gt;</code></pre>

    <h3 id="bordered-appearance">Bordered</h3>
    <x-bladewind::data-grid name="bordered-grid" label="Orders" bordered="true" :columns="$orderColumns" :rows="array_slice($orders, 0, 6)" />
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="bordered-grid" label="Orders" bordered="true" :columns="$orderColumns" :rows="$orders" /&gt;</code></pre>

    <h3 id="sticky-header">Sticky Header</h3>
    <p><code class="inline">sticky</code> pins the header row while the body scrolls, and defaults to <code class="inline">true</code>. It only has something to do once the grid has a <code class="inline">height</code> short enough that the rows actually scroll, so the two go together. Scroll inside the grid below and the header stays put.</p>
    <x-bladewind::data-grid name="sticky-grid" label="Orders" height="12rem" :columns="$orderColumns" :rows="$orders" />
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="sticky-grid" label="Orders" height="12rem" :columns="$orderColumns" :rows="$orders" /&gt;</code></pre>
    <p>Set <code class="inline">sticky="false"</code> to let the header scroll away with the rest of the content instead, useful if the grid already sits inside its own scroll container that provides a sticky header at a higher level.</p>
    <x-bladewind::data-grid name="non-sticky-grid" label="Orders" height="12rem" sticky="false" :columns="$orderColumns" :rows="$orders" />
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="non-sticky-grid" label="Orders" height="12rem" sticky="false" :columns="$orderColumns" :rows="$orders" /&gt;</code></pre>

    <h3 id="dense-sticky">Dense, With a Fixed Scrollable Height</h3>
    <p><code class="inline">dense</code> and a fixed <code class="inline">height</code> pair well for a compact grid embedded inside a card or a dashboard widget, where the header should stay visible while the body scrolls internally instead of pushing the rest of the page down.</p>
    <div class="dark rounded-xl bg-dark-900 p-6">
        <x-bladewind::data-grid name="dense-grid" label="Compact orders" striped="true" dense="true" height="14rem"
            :columns="$orderColumns" :rows="$orders" />
    </div>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="dense-grid" label="Compact orders"
    striped="true" dense="true" height="14rem"
    :columns="$orderColumns" :rows="$orders" /&gt;</code></pre>

    <h2 id="toolbar">Toolbar</h2>
    <p>The <code class="inline">toolbar</code> slot renders next to the search field, for controls that apply to the grid as a whole rather than to a selection, an export button, a view switcher, a status filter.</p>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="orders-with-toolbar" label="Orders" searchable="true"
    :columns="$orderColumns" :rows="$orders"&gt;
    &lt;x-slot:toolbar&gt;
        &lt;x-bladewind::button size="small" onclick="alert('Exporting all orders as CSV')"&gt;Export CSV&lt;/x-bladewind::button&gt;
    &lt;/x-slot:toolbar&gt;
&lt;/x-bladewind::data-grid&gt;</code></pre>
    <x-bladewind::data-grid name="orders-with-toolbar" label="Orders" searchable="true" paginated="true" page-size="6" :columns="$orderColumns" :rows="$orders">
        <x-slot:toolbar>
            <x-bladewind::button size="small" onclick="alert('Exporting all orders as CSV')">Export CSV</x-bladewind::button>
        </x-slot:toolbar>
    </x-bladewind::data-grid>

    <h2 id="custom-layout">Custom Layout</h2>
    <p>Skip <code class="inline">columns</code> and <code class="inline">rows</code> entirely for a fully custom layout: a <code class="inline">header</code> slot for <code class="inline">&lt;th&gt;</code> content, and the default slot for hand-written <code class="inline">&lt;tr&gt;</code> rows. This is the escape hatch for a table body that does not fit the column model at all, merged cells, a summary row, a layout the grid was never meant to describe.</p>
    <x-bladewind::alert type="warning" show_close_icon="false">A custom layout opts out of the grid's own sorting, searching, and pagination automation, since those all work against the <code class="inline">columns</code> and <code class="inline">rows</code> the grid normalises internally. You are responsible for reimplementing any of that behaviour yourself against your hand-written markup.</x-bladewind::alert>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="custom-orders" label="Orders summary"&gt;
    &lt;x-slot:header&gt;
        &lt;th&gt;Reference&lt;/th&gt;
        &lt;th&gt;Customer&lt;/th&gt;
        &lt;th class="text-right"&gt;Total&lt;/th&gt;
    &lt;/x-slot:header&gt;

    &lt;tr&gt;
        &lt;td&gt;ORD-1041&lt;/td&gt;
        &lt;td&gt;Kofi Addo&lt;/td&gt;
        &lt;td class="text-right"&gt;$84.00&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr class="font-semibold"&gt;
        &lt;td colspan="2"&gt;Total&lt;/td&gt;
        &lt;td class="text-right"&gt;$84.00&lt;/td&gt;
    &lt;/tr&gt;
&lt;/x-bladewind::data-grid&gt;</code></pre>
    <x-bladewind::data-grid name="custom-orders" label="Orders summary">
        <x-slot:header>
            <th>Reference</th>
            <th>Customer</th>
            <th class="text-right">Total</th>
        </x-slot:header>
        <tr>
            <td>ORD-1041</td>
            <td>Kofi Addo</td>
            <td class="text-right">$84.00</td>
        </tr>
        <tr class="font-semibold">
            <td colspan="2">Total</td>
            <td class="text-right">$84.00</td>
        </tr>
    </x-bladewind::data-grid>

    <h2 id="events">Events</h2>
    <p>Before events are cancelable. Call <code class="inline">preventDefault()</code> on the event to stop the related change, useful for confirming a destructive selection change or blocking a sort while a save is in flight. All event names start with <code class="inline">bladewind:data-grid:</code>.</p>
    <x-bladewind::table><x-slot:header><th>Event suffix</th><th>When it runs</th></x-slot:header>
        <tr><td><code class="inline">before-sort-change</code>, <code class="inline">sort-change</code></td><td>Before and after a column's sort state changes.</td></tr>
        <tr><td><code class="inline">before-select-change</code>, <code class="inline">select-change</code></td><td>Before and after row selection changes. Preventing the before event reverts the checkbox or radio.</td></tr>
        <tr><td><code class="inline">before-page-change</code>, <code class="inline">page-change</code></td><td>Before and after the current client page changes.</td></tr>
        <tr><td><code class="inline">search</code></td><td>On every keystroke in the search field, with the current query.</td></tr>
    </x-bladewind::table>
    <p>A practical use for the before events is confirming a change rather than silently accepting it:</p>
    <pre class="language-js line-numbers"><code>document.addEventListener('bladewind:data-grid:before-select-change', (event) =&gt; {
    if (event.detail.name !== 'orders-grid') return;
    if (event.detail.selecting &amp;&amp; event.detail.row.status === 'refunded') {
        if (!confirm('This order was refunded. Select it anyway?')) {
            event.preventDefault();
        }
    }
});</code></pre>

    <h2 id="attributes">Full List of Attributes</h2>
    <x-bladewind::table><x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>name</td><td>Generated</td><td>Unique public helper and DOM scope.</td></tr>
        <tr><td>label</td><td>Data grid</td><td>Accessible table name.</td></tr>
        <tr><td>columns</td><td>[]</td><td>Column model. Omit with rows for a custom layout.</td></tr>
        <tr><td>rows</td><td>null</td><td>Array of associative arrays or objects to render.</td></tr>
        <tr><td>row-key</td><td>id</td><td>Field used as each row's unique identity.</td></tr>
        <tr><td>selectable</td><td>false</td><td>Adds a selection column.</td></tr>
        <tr><td>selection-mode</td><td>multiple</td><td>multiple (checkboxes) or single (radios).</td></tr>
        <tr><td>selected</td><td>[]</td><td>Row keys to preselect.</td></tr>
        <tr><td>sortable</td><td>false</td><td>Makes every column sortable. A column's own sortable key wins per column.</td></tr>
        <tr><td>sort-key</td><td>null</td><td>Column key to render as initially sorted.</td></tr>
        <tr><td>sort-direction</td><td>null</td><td>asc or desc, paired with sort-key.</td></tr>
        <tr><td>client-sort</td><td>true</td><td>Reorders rows in the browser. When false, only the indicator updates and the app must reorder the data.</td></tr>
        <tr><td>searchable</td><td>false</td><td>Renders the toolbar search field.</td></tr>
        <tr><td>search-placeholder</td><td>Search…</td><td>Search field placeholder text.</td></tr>
        <tr><td>client-search</td><td>true</td><td>Filters rows in the browser. When false, only the search event fires.</td></tr>
        <tr><td>paginated</td><td>false</td><td>Enables client pagination. Implied automatically by passing paginator.</td></tr>
        <tr><td>page-size</td><td>25</td><td>Rows per page in client pagination mode.</td></tr>
        <tr><td>paginator</td><td>null</td><td>A Laravel paginator, for server-driven pagination.</td></tr>
        <tr><td>sticky</td><td>true</td><td>Pins the header while the body scrolls.</td></tr>
        <tr><td>loading</td><td>false</td><td>Dims the table and shows a progress indicator.</td></tr>
        <tr><td>empty-text</td><td>No records found.</td><td>Text shown when there are no rows.</td></tr>
        <tr><td>striped</td><td>false</td><td>Alternating row background.</td></tr>
        <tr><td>bordered</td><td>false</td><td>Vertical cell borders.</td></tr>
        <tr><td>dense</td><td>false</td><td>Reduced cell padding.</td></tr>
        <tr><td>height</td><td>null</td><td>Max height for the scrollable body, e.g. 24rem.</td></tr>
        <tr><td>select-all-label</td><td>Select all rows</td><td>Accessible label for the header checkbox.</td></tr>
        <tr><td>clear-selection-label</td><td>Clear selection</td><td>Label for the clear-selection control.</td></tr>
    </x-bladewind::table>

    <h2 id="slots">Slots</h2>
    <x-bladewind::table><x-slot:header><th>Slot</th><th>Description</th></x-slot:header>
        <tr><td>toolbar</td><td>Content appended after the search field. See <a href="#toolbar">Toolbar</a>.</td></tr>
        <tr><td>bulk-actions</td><td>Custom buttons in the selection bar. See <a href="#bulk-actions">Bulk actions</a>.</td></tr>
        <tr><td>header</td><td>Custom &lt;th&gt; content, used instead of columns. See <a href="#custom-layout">Custom layout</a>.</td></tr>
        <tr><td>default</td><td>Custom &lt;tr&gt; rows, used instead of rows. See <a href="#custom-layout">Custom layout</a>.</td></tr>
    </x-bladewind::table>

    <h2 id="javascript-api">JavaScript API</h2>
    <p>Every helper returns <code class="inline">true</code> when it completes, or when the requested state already applies, and <code class="inline">false</code> when the target is missing or a cancelable event was prevented.</p>
    <x-bladewind::table><x-slot:header><th>Function</th><th>What it does</th></x-slot:header>
        <tr><td><code class="inline">sortDataGrid(name, key, direction)</code></td><td>Sorts a client-mode grid by the given column, direction is <code class="inline">'asc'</code>, <code class="inline">'desc'</code>, or <code class="inline">null</code> to clear.</td></tr>
        <tr><td><code class="inline">setDataGridPage(name, page)</code></td><td>Jumps to a page in a client-paginated grid.</td></tr>
        <tr><td><code class="inline">selectAllDataGridRows(name, selected)</code></td><td>Selects or deselects every visible row, matching the header checkbox.</td></tr>
        <tr><td><code class="inline">clearDataGridSelection(name)</code></td><td>Clears the current selection entirely.</td></tr>
        <tr><td><code class="inline">dataGridSelectedKeys(name)</code></td><td>Returns an array of the currently selected row keys.</td></tr>
        <tr><td><code class="inline">setDataGridLoading(name, loading)</code></td><td>Toggles the dimmed, busy loading state. See <a href="#loading">Loading state</a>.</td></tr>
        <tr><td><code class="inline">resetDataGrid(name)</code></td><td>Clears search, sort, selection, and returns to page one, all at once.</td></tr>
    </x-bladewind::table>
    <pre class="language-javascript"><code>sortDataGrid('orders-grid', 'total', 'desc');
setDataGridPage('orders-grid', 2);
selectAllDataGridRows('orders-grid', true);
dataGridSelectedKeys('orders-grid'); // ['3', '7', '12']
clearDataGridSelection('orders-grid');
setDataGridLoading('orders-grid', true);
resetDataGrid('orders-grid');</code></pre>

    <h2 id="complete-example">Putting It All Together</h2>
    <p>A grid combining most of what is documented above: searchable, multi-select with bulk actions, a toolbar export button, striped rows, and client pagination over the full 34-row order list.</p>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid name="complete-orders" label="Orders" row-key="reference"
    searchable="true" search-placeholder="Search orders…"
    selectable="true" selection-mode="multiple"
    sortable="true" striped="true"
    paginated="true" page-size="10"
    :columns="$orderColumns" :rows="$orders"&gt;
    &lt;x-slot:toolbar&gt;
        &lt;x-bladewind::button size="small"&gt;Export CSV&lt;/x-bladewind::button&gt;
    &lt;/x-slot:toolbar&gt;
    &lt;x-slot:bulk-actions&gt;
        &lt;x-bladewind::button size="small" type="red"&gt;Delete selected&lt;/x-bladewind::button&gt;
    &lt;/x-slot:bulk-actions&gt;
&lt;/x-bladewind::data-grid&gt;</code></pre>
    <x-bladewind::data-grid name="complete-orders" label="Orders" row-key="reference"
        searchable="true" search-placeholder="Search orders…"
        selectable="true" selection-mode="multiple"
        sortable="true" striped="true"
        paginated="true" page-size="10"
        :columns="$orderColumns" :rows="$orders">
        <x-slot:toolbar>
            <x-bladewind::button size="small" onclick="alert('Exporting all orders as CSV')">Export CSV</x-bladewind::button>
        </x-slot:toolbar>
        <x-slot:bulk-actions>
            <x-bladewind::button size="small" type="red" onclick="alert('Deleting: ' + dataGridSelectedKeys('complete-orders').join(', '))">Delete selected</x-bladewind::button>
        </x-slot:bulk-actions>
    </x-bladewind::data-grid>

    <x-bladewind::alert show_close_icon="false">The source files for this component are available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; data-grid</code></x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#columns">Columns and rows</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#column-shorthand">Shorthand columns</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#column-format">Formatting a column</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#column-sort">Custom sort values</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#row-key">Row identity</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sorting">Sorting</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#default-sort">Sorting on load</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#server-sort">Server-driven sorting</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#searching">Searching</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#server-search">Server-driven searching</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#selection">Row selection</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#multiple-selection">Multiple selection</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#single-selection">Single selection</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#preselected">Preselected rows</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#bulk-actions">Bulk actions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#pagination">Pagination and server-driven state</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#client-pagination">Client pagination at scale</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#server-pagination">Server-driven pagination</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#loading">Loading state</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#appearance">Appearance</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#striped-appearance">Striped</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#bordered-appearance">Bordered</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#sticky-header">Sticky header</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#dense-sticky">Dense with fixed height</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#toolbar">Toolbar</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#custom-layout">Custom layout</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#events">Events</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#slots">Slots</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#javascript-api">JavaScript API</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#complete-example">Putting it all together</a></div>
    </x-slot:side_nav>
    <x-slot:scripts><script>selectNavigationItem('.component-data-grid');</script></x-slot:scripts>
</x-app>
