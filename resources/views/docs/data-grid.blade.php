<x-app>
    <x-slot:title>Data Grid Component</x-slot:title>
    <x-slot:page_title>Data Grid</x-slot:page_title>

    <p>Data Grid is a higher-level companion to <a href="/component/table">Table</a>: an accessible data grid with column sorting, filtering, row selection, sticky headers, and both client-side and server-driven state. It renders a native <code class="inline">&lt;table&gt;</code>, so every interaction &mdash; sorting, selecting, paging, searching &mdash; happens through real, independently keyboard-operable controls.</p>

    @php
        $orderColumns = [
            ['key' => 'reference', 'label' => 'Reference', 'sortable' => true],
            ['key' => 'customer', 'label' => 'Customer', 'sortable' => true],
            ['key' => 'total', 'label' => 'Total', 'align' => 'right', 'sortable' => true, 'format' => fn ($v) => '$'.number_format($v / 100, 2)],
        ];
        $orders = [
            ['id' => 1, 'reference' => 'ORD-1048', 'customer' => 'Kofi Addo', 'total' => 84000],
            ['id' => 2, 'reference' => 'ORD-1049', 'customer' => 'Akosua Owusu', 'total' => 31500],
            ['id' => 3, 'reference' => 'ORD-1050', 'customer' => 'Ama Mensah', 'total' => 156000],
            ['id' => 4, 'reference' => 'ORD-1051', 'customer' => 'Yaw Boateng', 'total' => 42500],
            ['id' => 5, 'reference' => 'ORD-1052', 'customer' => 'Efua Asante', 'total' => 9800],
        ];
    @endphp

    <x-bladewind::data-grid name="orders-grid" label="Orders" searchable="true" selectable="true"
        paginated="true" page-size="3" :columns="$orderColumns" :rows="$orders" />

    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::data-grid
    name="orders-grid"
    label="Orders"
    searchable="true"
    selectable="true"
    paginated="true"
    page-size="10"
    :columns="[
        ['key' => 'reference', 'label' => 'Reference', 'sortable' => true],
        ['key' => 'customer', 'label' => 'Customer', 'sortable' => true],
        ['key' => 'total', 'label' => 'Total', 'align' => 'right', 'sortable' => true,
            'format' => fn ($value) => '$'.number_format($value / 100, 2)],
    ]"
    :rows="$orders" /&gt;</code></pre>

    <h2 id="columns">Columns and Rows</h2>
    <p>Each column accepts <code class="inline">key</code>, <code class="inline">label</code>, <code class="inline">align</code>, <code class="inline">width</code>, <code class="inline">sortable</code>, <code class="inline">class</code>, and a <code class="inline">format($value, $row)</code> callback for display &mdash; the same shape as Table's column model. <code class="inline">rows</code> is an array of associative arrays or objects; a row's identity comes from <code class="inline">row-key</code>, which defaults to <code class="inline">id</code>.</p>
    <p>Skip <code class="inline">columns</code> and <code class="inline">rows</code> for a fully custom layout: a <code class="inline">header</code> slot for <code class="inline">&lt;th&gt;</code> content and the default slot for hand-written <code class="inline">&lt;tr&gt;</code> rows.</p>

    <h2 id="sorting">Sorting</h2>
    <p>Set <code class="inline">sortable="true"</code> on the grid to make every column sortable, or set it per column as in the example above. Clicking a header cycles none &rarr; ascending &rarr; descending &rarr; none. When a column's display is formatted (like the currency total above), sorting still compares the underlying raw value &mdash; add a <code class="inline">sort($value, $row)</code> callback when the sortable value should differ from both the raw and formatted value.</p>
    <x-bladewind::alert show_close_icon="false"><code class="inline">client-sort</code> defaults to <code class="inline">true</code> and reorders rows in the browser. Set it to <code class="inline">false</code> for a server-driven grid: clicking a header only updates the indicator and emits <code class="inline">bladewind:data-grid:sort-change</code>, leaving reordering to the application.</x-bladewind::alert>

    <h2 id="searching">Searching</h2>
    <p><code class="inline">searchable="true"</code> renders a toolbar search field. <code class="inline">client-search</code> defaults to <code class="inline">true</code> and filters rows by their rendered cell text; try searching for a customer name above. Set <code class="inline">client-search="false"</code> to filter server-side instead &mdash; the grid emits <code class="inline">bladewind:data-grid:search</code> with the query on every keystroke and renders no filtering itself.</p>

    <h2 id="selection">Row Selection</h2>
    <p><code class="inline">selectable="true"</code> adds a selection column. <code class="inline">selection-mode</code> is <code class="inline">multiple</code> (checkboxes, with a tri-state select-all in the header, scoped to the current page or search results) or <code class="inline">single</code> (radio buttons). Pass <code class="inline">selected</code> with an array of row keys to preselect rows. A selection bar appears above the grid once anything is selected, with a clear-selection control and an optional <code class="inline">bulk-actions</code> slot for custom buttons.</p>
    <x-bladewind::data-grid name="assignee-grid" label="Assign reviewer" selectable="true" selection-mode="single"
        :columns="[['key' => 'name', 'label' => 'Reviewer']]"
        :rows="[['id' => 'ama', 'name' => 'Ama Mensah'], ['id' => 'kofi', 'name' => 'Kofi Addo'], ['id' => 'yaw', 'name' => 'Yaw Boateng']]" />

    <h2 id="pagination">Pagination and Server-Driven State</h2>
    <p>Set <code class="inline">paginated="true"</code> with <code class="inline">page-size</code> for client-side pagination, as in the first example &mdash; the grid renders its own prev/next footer and keeps it in sync with sorting and searching. Pass a Laravel paginator through <code class="inline">paginator</code> instead for real server-side pagination: the grid renders Pagination's standard page links, and <code class="inline">rows</code> should be the paginator's current-page items.</p>
    <pre class="language-markup"><code>&lt;x-bladewind::data-grid name="orders-grid" :columns="$columns" :rows="$orders-&gt;items()" :paginator="$orders" /&gt;</code></pre>
    <p>Set <code class="inline">loading="true"</code> (or call <code class="inline">setDataGridLoading(name, true)</code>) while an application fetches new rows for a server-driven grid. The table dims and shows a progress indicator, and screen readers see <code class="inline">aria-busy="true"</code>.</p>

    <h2 id="appearance">Appearance</h2>
    <p><code class="inline">striped</code>, <code class="inline">bordered</code>, and <code class="inline">dense</code> control visual density. <code class="inline">sticky</code> keeps the header pinned while the body scrolls, and defaults to <code class="inline">true</code>; set <code class="inline">height</code> to cap the grid at a fixed height with an internal scrollbar.</p>
    <div class="dark rounded-xl bg-dark-900 p-6">
        <x-bladewind::data-grid name="dense-grid" label="Compact orders" striped="true" dense="true" height="12rem"
            :columns="$orderColumns" :rows="$orders" />
    </div>

    <h2 id="events">Events</h2>
    <p>Before events are cancelable. Call <code class="inline">preventDefault()</code> to stop the related change. All event names start with <code class="inline">bladewind:data-grid:</code>.</p>
    <x-bladewind::table><x-slot:header><th>Event suffix</th><th>When it runs</th></x-slot:header>
        <tr><td><code class="inline">before-sort-change</code>, <code class="inline">sort-change</code></td><td>Before and after a column's sort state changes.</td></tr>
        <tr><td><code class="inline">before-select-change</code>, <code class="inline">select-change</code></td><td>Before and after row selection changes. Preventing the before event reverts the checkbox or radio.</td></tr>
        <tr><td><code class="inline">before-page-change</code>, <code class="inline">page-change</code></td><td>Before and after the current client page changes.</td></tr>
        <tr><td><code class="inline">search</code></td><td>On every keystroke in the search field, with the current query.</td></tr>
    </x-bladewind::table>

    <h2 id="attributes">Full List of Attributes</h2>
    <x-bladewind::table><x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>name</td><td>Generated</td><td>Unique public helper and DOM scope.</td></tr>
        <tr><td>label</td><td>Data grid</td><td>Accessible table name.</td></tr>
        <tr><td>columns</td><td>[]</td><td>Column model. Omit with <code class="inline">rows</code> for a custom layout.</td></tr>
        <tr><td>rows</td><td>null</td><td>Array of associative arrays or objects to render.</td></tr>
        <tr><td>row-key</td><td>id</td><td>Field used as each row's unique identity.</td></tr>
        <tr><td>selectable</td><td>false</td><td>Adds a selection column.</td></tr>
        <tr><td>selection-mode</td><td>multiple</td><td>multiple (checkboxes) or single (radios).</td></tr>
        <tr><td>selected</td><td>[]</td><td>Row keys to preselect.</td></tr>
        <tr><td>sortable</td><td>false</td><td>Makes every column sortable. A column's own <code class="inline">sortable</code> key wins per-column.</td></tr>
        <tr><td>sort-key</td><td>null</td><td>Column key to render as initially sorted.</td></tr>
        <tr><td>sort-direction</td><td>null</td><td>asc or desc, paired with sort-key.</td></tr>
        <tr><td>client-sort</td><td>true</td><td>Reorders rows in the browser when false, only the indicator updates.</td></tr>
        <tr><td>searchable</td><td>false</td><td>Renders the toolbar search field.</td></tr>
        <tr><td>search-placeholder</td><td>Search…</td><td>Search field placeholder text.</td></tr>
        <tr><td>client-search</td><td>true</td><td>Filters rows in the browser when false, only the search event fires.</td></tr>
        <tr><td>paginated</td><td>false</td><td>Enables client pagination, or is implied by passing paginator.</td></tr>
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
        <tr><td>toolbar</td><td>Content appended after the search field.</td></tr>
        <tr><td>bulk-actions</td><td>Custom buttons in the selection bar.</td></tr>
        <tr><td>header</td><td>Custom <code class="inline">&lt;th&gt;</code> content, used instead of <code class="inline">columns</code>.</td></tr>
        <tr><td>default</td><td>Custom <code class="inline">&lt;tr&gt;</code> rows, used instead of <code class="inline">rows</code>.</td></tr>
    </x-bladewind::table>

    <h2 id="javascript-api">JavaScript API</h2>
    <p>Helpers return true on success or when the requested state already applies. They return false for a missing target or a canceled event.</p>
    <pre class="language-javascript"><code>sortDataGrid('orders-grid', 'total', 'desc');
setDataGridPage('orders-grid', 2);
selectAllDataGridRows('orders-grid', true);
clearDataGridSelection('orders-grid');
dataGridSelectedKeys('orders-grid');
setDataGridLoading('orders-grid', true);
resetDataGrid('orders-grid');</code></pre>

    <x-bladewind::alert show_close_icon="false">The source files for this component are available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; data-grid</code></x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#columns">Columns and rows</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sorting">Sorting</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#searching">Searching</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#selection">Row selection</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#pagination">Pagination and server-driven state</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#appearance">Appearance</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#events">Events</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full List of Attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#slots">Slots</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#javascript-api">JavaScript API</a></div>
    </x-slot:side_nav>
    <x-slot:scripts><script>selectNavigationItem('.component-data-grid');</script></x-slot:scripts>
</x-app>
