<x-app>
    <x-slot:title>Command Palette Component</x-slot:title>
    <x-slot:page_title>Command Palette</x-slot:page_title>

    <p>
        Command Palette provides a fast, searchable way to find and run actions using the keyboard. Open it with a configurable shortcut or helper method, then start typing to filter available actions.
        Actions can be organized into groups, and the palette supports full keyboard navigation, asynchronous results, and dark mode.
    </p>

    <x-bladewind::button icon="magnifying-glass" onclick="openCommandPalette('app-commands')">Search commands<span class="ml-3 hidden rounded border border-white/30 px-1.5 py-0.5 text-xs opacity-80 sm:inline">&#8984;K</span></x-bladewind::button>

    <x-bladewind::command-palette name="app-commands" label="Command palette" placeholder="Search for a command or page…">
        <x-bladewind::command-palette.group name="navigate" label="Navigate">
            <x-bladewind::command-palette.item name="dashboard" label="Dashboard" description="Overview of your workspace" href="#dashboard" icon="home" />
            <x-bladewind::command-palette.item name="orders" label="Orders" description="Review recent orders" href="#orders" icon="shopping-bag" />
            <x-bladewind::command-palette.item name="customers" label="Customers" href="#customers" icon="users" />
        </x-bladewind::command-palette.group>
        <x-bladewind::command-palette.group name="actions" label="Actions">
            <x-bladewind::command-palette.item name="new-order" label="Create order" icon="plus-circle" shortcut="Ctrl+N" keywords="add new" />
            <x-bladewind::command-palette.item name="invite" label="Invite teammate" icon="user-plus" keywords="team member add" />
            <x-bladewind::command-palette.item name="logout" label="Sign out" icon="arrow-right-on-rectangle" />
        </x-bladewind::command-palette.group>
    </x-bladewind::command-palette>

    <pre class="language-markup line-numbers"><code>
&lt;x-bladewind::button onclick="openCommandPalette('app-commands')"&gt;
    Search commands
&lt;/x-bladewind::button&gt;</code></pre>

    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::command-palette name="app-commands"
    label="Command palette" placeholder="Search for a command or page…"&gt;
    &lt;x-bladewind::command-palette.group name="navigate" label="Navigate"&gt;
        &lt;x-bladewind::command-palette.item name="dashboard"
            label="Dashboard"
            description="Overview of your workspace"
            href="#dashboard"
            icon="home" /&gt;
        &lt;x-bladewind::command-palette.item name="orders"
            label="Orders"
            description="Review recent orders"
            href="#orders"
            icon="shopping-bag" /&gt;
        &lt;x-bladewind::command-palette.item name="customers"
            label="Customers"
            href="#customers" icon="users" /&gt;
    &lt;/x-bladewind::command-palette.group&gt;
    ...
&lt;/x-bladewind::command-palette&gt;
        </code>
    </pre>

    <h2 id="opening">Opening the Palette</h2>
    <p>Command Palette renders hidden. It is not tied to a trigger button by default. Open it with its keyboard shortcut, or call <code class="inline">openCommandPalette(name)</code> from any element. Try the demo above with <kbd>Ctrl</kbd> + <kbd>K</kbd> (<kbd>&#8984;</kbd> + <kbd>K</kbd> on macOS).</p>
    <x-bladewind::alert show_close_icon="false">The shortcut works even while focus sits inside another field on the page, which is the convention command palettes across editors, chat apps, and issue trackers already share.</x-bladewind::alert>

    <h2 id="searching">Searching and Grouped Results</h2>
    <p>As you type, Command Palette filters items by their label, description, and optional <code class="inline text-red-500">keywords</code> attribute. Matching is case-insensitive and works on partial text. Groups are automatically hidden when none of their items match.
        For example, try searching for <em>add new</em> in the demo above. It finds Create order through its keywords, even though those words do not appear in the visible label.</p>
    <p>For server-side search, Command Palette emits <code class="inline">bladewind:command-palette:search</code> with the current query on every keystroke. Listen for this event to fetch and display matching results asynchronously.</p>
    <p>While results are loading, set <code class="inline text-red-500">loading="true"</code> or call <code class="inline">setCommandPaletteLoading(name, true)</code>. The built-in empty state remains hidden until loading is complete.</p>

    <h2 id="keyboard">Keyboard Behavior</h2>
    <p>Focus stays in the search field the entire time the palette is open. Navigation moves a highlighted state between items instead of moving real focus, so screen readers track the current option through <code class="inline">aria-activedescendant</code> on the search field.</p>
    <x-bladewind::table><x-slot:header><th>Key</th><th>Behavior</th></x-slot:header>
        <tr><td>Up Arrow or Down Arrow</td><td>Move the highlight to the previous or next visible, enabled item.</td></tr>
        <tr><td>Home or End</td><td>Jump the highlight to the first or last visible item.</td></tr>
        <tr><td>Enter</td><td>Activate the highlighted item.</td></tr>
        <tr><td>Escape</td><td>Close the palette and restore focus to whatever opened it.</td></tr>
        <tr><td>Tab</td><td>Cycles between the search field and the close button while the palette is open.</td></tr>
    </x-bladewind::table>

    <h2 id="items">Links, Actions, and Disabled Items</h2>
    <p>An item with <code class="inline">href</code> renders as a link and navigates normally. An item without <code class="inline text-red-500">href</code> renders as a button, for actions handled entirely in JavaScript through the <code class="inline">select</code> event. Disabled items stay visible but cannot be highlighted or activated.</p>

    <h2 id="dark-mode">Dark Mode</h2>
    <p>Command Palette follows the page dark class and keeps the backdrop, panel, highlighted item, description, and shortcut key contrast readable.</p>
    <div class="dark rounded-xl bg-dark-900 p-6">
        <x-bladewind::button onclick="openCommandPalette('dark-commands')">Open in dark mode</x-bladewind::button>
        <x-bladewind::command-palette name="dark-commands" label="Dark command palette">
            <x-bladewind::command-palette.item name="dark-dashboard" label="Dashboard" href="#dark-dashboard" icon="home" />
            <x-bladewind::command-palette.item name="dark-billing" label="Billing" description="Plans and invoices" href="#dark-billing" icon="credit-card" />
        </x-bladewind::command-palette>
    </div>

    <h2 id="events">Events</h2>
    <p>Before events are cancelable. Call <code class="inline">preventDefault()</code> to stop the related change. All event names start with <code class="inline">bladewind:command-palette:</code>. Item events include the item name and, for links, the destination.</p>
    <x-bladewind::table><x-slot:header><th>Event suffix</th><th>When it runs</th></x-slot:header>
        <tr><td><code class="inline">before-open</code>, <br /><code class="inline">before-close</code></td><td>Before the palette opens or closes.</td></tr>
        <tr><td><code class="inline">opened</code>, <code class="inline">closed</code></td><td>After the palette finishes opening or closing.</td></tr>
        <tr><td><code class="inline">before-select</code></td><td>Before an item is activated. Preventing this stops navigation and the close-on-select behavior.</td></tr>
        <tr><td><code class="inline">select</code></td><td>After an item is activated.</td></tr>
        <tr><td><code class="inline">search</code></td><td>On every keystroke in the search field, with the current query.</td></tr>
    </x-bladewind::table>

    <h2 id="attributes">Full List of Attributes</h2>
    <h3>Command Palette Attributes</h3>
    <x-bladewind::table><x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>name</td><td>Generated</td><td>Unique public helper and DOM scope.</td></tr>
        <tr><td>label</td><td>Command palette</td><td>Accessible dialog and listbox name.</td></tr>
        <tr><td>placeholder</td><td>Search for a command…</td><td>Search field placeholder text.</td></tr>
        <tr><td>search-label</td><td>Same as label</td><td>Accessible name for the search field.</td></tr>
        <tr><td>shortcut</td><td>mod+k</td><td>Global open/close shortcut. <code class="inline">mod</code> resolves to Ctrl or Cmd. Empty disables the shortcut.</td></tr>
        <tr><td>size</td><td>medium</td><td>tiny, small, medium, big, large, xl, or omg.</td></tr>
        <tr><td>open</td><td>false</td><td>Initial open state.</td></tr>
        <tr><td>loading</td><td>false</td><td>Shows the loading row and suppresses the empty state.</td></tr>
        <tr><td>empty-text</td><td>No results found.</td><td>Text shown when nothing matches.</td></tr>
        <tr><td>loading-text</td><td>Loading…</td><td>Text shown while loading is true.</td></tr>
        <tr><td>close-on-select</td><td>true</td><td>Closes the palette after an item is activated.</td></tr>
        <tr><td>backdrop-can-close</td><td>true</td><td>Allows a backdrop click to close the palette.</td></tr>
        <tr><td>escape-can-close</td><td>true</td><td>Allows Escape to close the palette.</td></tr>
        <tr><td>close-label</td><td>Close command palette</td><td>Accessible label for the close button.</td></tr>
    </x-bladewind::table>
    <h3>Command Palette Group Attributes</h3>
    <x-bladewind::table><x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>name</td><td>Required</td><td>Name scoped to its Command Palette.</td></tr>
        <tr><td>label</td><td>Required</td><td>Visible and accessible section heading.</td></tr>
    </x-bladewind::table>
    <h3>Command Palette Item Attributes</h3>
    <x-bladewind::table><x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>name</td><td>Required</td><td>Event identifier for the item.</td></tr>
        <tr><td>label</td><td>empty</td><td>Visible and accessible label, and part of the search text.</td></tr>
        <tr><td>description</td><td>null</td><td>Secondary text, also matched while searching.</td></tr>
        <tr><td>icon</td><td>null</td><td>Heroicon name.</td></tr>
        <tr><td>icon-type</td><td>outline</td><td>Icon type.</td></tr>
        <tr><td>icon-dir</td><td>empty</td><td>Custom icon directory.</td></tr>
        <tr><td>shortcut</td><td>null</td><td>Display-only key combination, for example <code class="inline">Ctrl+N</code>. Rendered as individual <code class="inline">&lt;kbd&gt;</code> keys.</td></tr>
        <tr><td>keywords</td><td>empty</td><td>Extra terms matched while searching but not displayed.</td></tr>
        <tr><td>href</td><td>null</td><td>Link destination. Omit for a button action handled through the <code class="inline">select</code> event.</td></tr>
        <tr><td>disabled</td><td>false</td><td>Removes the item from highlighting and activation.</td></tr>
        <tr><td>external</td><td>false</td><td>Adds external link semantics and indicator.</td></tr>
        <tr><td>target</td><td>null</td><td>Link target.</td></tr>
    </x-bladewind::table>

    <h2 id="slots">Slots</h2>
    <x-bladewind::table><x-slot:header><th>Slot</th><th>Description</th></x-slot:header>
        <tr><td>command-palette default</td><td>Command palette groups and items.</td></tr>
        <tr><td>command-palette footer</td><td>Content appended after the built-in keyboard hints in the footer.</td></tr>
        <tr><td>group default</td><td>Items belonging to the group.</td></tr>
        <tr><td>item default</td><td>Custom item copy while Command Palette keeps the option and search semantics.</td></tr>
    </x-bladewind::table>

    <h2 id="javascript-api">JavaScript API</h2>
    <p>Helpers return true on success or when the requested state already applies. They return false for a missing target or a canceled event.</p>
    <pre class="language-javascript"><code>openCommandPalette('app-commands');
closeCommandPalette('app-commands');
toggleCommandPalette('app-commands');
resetCommandPalette('app-commands');
setCommandPaletteLoading('app-commands', true);</code></pre>

    <h3>Command Palette with all attributes defined</h3>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::command-palette
    name="app-commands"
    label="Command palette"
    placeholder="Search for a command or page…"
    search-label="Command palette"
    shortcut="mod+k"
    size="medium"
    open="false"
    loading="false"
    empty-text="No results found."
    loading-text="Loading…"
    close-on-select="true"
    backdrop-can-close="true"
    escape-can-close="true"
    close-label="Close command palette"
    class="app-command-palette"
    data-region="app"&gt;
    &lt;x-bladewind::command-palette.group name="actions" label="Actions"&gt;
        &lt;x-bladewind::command-palette.item name="new-order" label="Create order" description="Start a manual order" icon="plus-circle" icon-type="outline" icon-dir="" shortcut="Ctrl+N" keywords="add new" href="/orders/new" disabled="false" external="false" target="_self" class="new-order-item" data-area="orders" /&gt;
    &lt;/x-bladewind::command-palette.group&gt;
    &lt;x-slot:footer&gt;Signed in as Ama Mensah&lt;/x-slot:footer&gt;
&lt;/x-bladewind::command-palette&gt;</code></pre>

    <x-bladewind::alert show_close_icon="false">The source files for this component are available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; command-palette</code></x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#opening">Opening the palette</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#searching">Searching and grouped results</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#keyboard">Keyboard behavior</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#items">Links, actions, and disabled items</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#dark-mode">Dark mode</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#events">Events</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full List of Attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#slots">Slots</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#javascript-api">JavaScript API</a></div>
    </x-slot:side_nav>
    <x-slot:scripts><script>selectNavigationItem('.component-command-palette');</script></x-slot:scripts>
</x-app>
