<x-app>
    <x-slot:title>Drawer Component</x-slot:title>
    <x-slot:page_title>Drawer</x-slot:page_title>

    <p>
        Display supporting content in a panel that enters from any edge of the viewport.
        Drawers work well for filters, forms, record details, and short workflows that should not replace the current page.
    </p>

    <x-bladewind::button onclick="showDrawer('customer-details')">Open drawer</x-bladewind::button>
    <x-bladewind::drawer name="customer-details" size="medium" :show-close-button="false">
        <div class="relative rounded-2xl bg-white p-6 text-center shadow dark:bg-dark-800">
            <button type="button" aria-label="Close drawer" onclick="hideDrawer('customer-details')" class="absolute right-4 top-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-200">
                <x-bladewind::icon name="x-mark" class="!size-5" />
            </button>
            <div class="relative mx-auto w-fit">
                <x-bladewind::avatar image="/assets/images/audrey.jpeg" size="big" />
                <span class="absolute bottom-0 right-0 grid size-6 place-items-center rounded-full bg-green-500 text-white ring-2 ring-white dark:ring-dark-800">
                    <x-bladewind::icon name="check" class="!size-4" />
                </span>
            </div>
            <p class="!mb-0 !mt-4 text-lg font-bold text-gray-900 dark:text-white">Victoria Ferguson</p>
            <p class="!mt-1 text-gray-400">victoria@ferguson.eu</p>

            <div class="mt-6 flex items-center justify-center divide-x divide-gray-200 dark:divide-dark-600">
                <div class="px-6">
                    <p class="!mb-0 text-xs uppercase text-gray-400">Role</p>
                    <p class="!mt-1 flex items-center justify-center gap-1 font-bold text-gray-900 dark:text-white">
                        Admin <x-bladewind::icon name="pencil" class="!size-3.5 text-gray-400" />
                    </p>
                </div>
                <div class="px-6">
                    <p class="!mb-0 text-xs uppercase text-gray-400">Team</p>
                    <p class="!mt-1 flex items-center justify-center gap-1 font-bold text-gray-900 dark:text-white">
                        Product <x-bladewind::icon name="pencil" class="!size-3.5 text-gray-400" />
                    </p>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-center gap-4">
                <a href="mailto:victoria@ferguson.eu" class="grid size-11 place-items-center rounded-full bg-indigo-500 text-white hover:bg-indigo-400"><x-bladewind::icon name="envelope" class="!size-5" /></a>
                <button type="button" class="grid size-11 place-items-center rounded-full bg-blue-500 text-white hover:bg-blue-400"><x-bladewind::icon name="chat-bubble-oval-left" class="!size-5" /></button>
                <a href="tel:+15551234567" class="grid size-11 place-items-center rounded-full bg-green-500 text-white hover:bg-green-400"><x-bladewind::icon name="phone" class="!size-5" /></a>
            </div>
        </div>

        <dl class="mt-6 space-y-4 text-sm">
            <div><dt class="text-gray-400">Address</dt><dd class="font-bold text-gray-900 dark:text-white">99 Meadow City</dd></div>
            <div><dt class="text-gray-400">Zip code</dt><dd class="font-bold text-gray-900 dark:text-white">60584-3274</dd></div>
            <div><dt class="text-gray-400">City</dt><dd class="font-bold text-gray-900 dark:text-white">San Francisco</dd></div>
            <div><dt class="text-gray-400">Country</dt><dd class="font-bold text-gray-900 dark:text-white">United States of America</dd></div>
        </dl>
    </x-bladewind::drawer>

    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::drawer name="customer-details" position="right" size="medium" show-close-button="false"&gt;
    &lt;div class="relative rounded-2xl bg-white p-6 text-center shadow dark:bg-dark-800"&gt;
        &lt;button type="button" onclick="hideDrawer('customer-details')" class="absolute right-4 top-4 text-gray-400"&gt;
            &lt;x-bladewind::icon name="x-mark" /&gt;
        &lt;/button&gt;

        &lt;div class="relative mx-auto w-fit"&gt;
            &lt;x-bladewind::avatar image="/path/to/image" size="big" /&gt;
            &lt;span class="absolute bottom-0 right-0 rounded-full bg-green-500 text-white ring-2 ring-white"&gt;
                &lt;x-bladewind::icon name="check" /&gt;
            &lt;/span&gt;
        &lt;/div&gt;

        &lt;p class="font-bold"&gt;Victoria Ferguson&lt;/p&gt;
        &lt;p class="text-gray-400"&gt;victoria@ferguson.eu&lt;/p&gt;

        &lt;!-- role / team, then mail / chat / phone action buttons --&gt;
    &lt;/div&gt;

    &lt;!-- address details list --&gt;
&lt;/x-bladewind::drawer&gt;</code></pre>

    <h2 id="positions">Positions</h2>
    <p>Use <code class="inline">left</code>, <code class="inline">right</code>, <code class="inline">top</code>, or <code class="inline">bottom</code>. These are physical viewport edges, so left and right remain predictable in RTL pages.</p>
    <div class="flex flex-wrap gap-3">
        @foreach(['left', 'right', 'top', 'bottom'] as $edge)
            <x-bladewind::button type="secondary" onclick="showDrawer('drawer-{{ $edge }}')">{{ ucfirst($edge) }}</x-bladewind::button>
            <x-bladewind::drawer name="drawer-{{ $edge }}" title="{{ ucfirst($edge) }} drawer" :position="$edge">
                This drawer enters from the {{ $edge }} edge.
            </x-bladewind::drawer>
        @endforeach
    </div>
    <pre class="language-markup"><code>&lt;x-bladewind::drawer name="filters" position="left" title="Filters"&gt;...&lt;/x-bladewind::drawer&gt;
&lt;x-bladewind::drawer name="details" position="right" title="Details"&gt;...&lt;/x-bladewind::drawer&gt;
&lt;x-bladewind::drawer name="notice" position="top" title="Notice"&gt;...&lt;/x-bladewind::drawer&gt;
&lt;x-bladewind::drawer name="actions" position="bottom" title="Actions"&gt;...&lt;/x-bladewind::drawer&gt;</code></pre>

    <h2 id="sizes">Sizes</h2>
    <p>Sizes are adapted to the drawer direction. Left and right drawers change width. Top and bottom drawers change height. Available values are <code class="inline">tiny</code>, <code class="inline">small</code>, <code class="inline">medium</code>, <code class="inline">big</code>, <code class="inline">large</code>, <code class="inline">xl</code>, and <code class="inline">omg</code>.</p>
    <div class="flex flex-wrap gap-3">
        @foreach(['small', 'medium', 'large'] as $drawerSize)
            <x-bladewind::button type="secondary" onclick="showDrawer('size-{{ $drawerSize }}')">{{ ucfirst($drawerSize) }}</x-bladewind::button>
            <x-bladewind::drawer name="size-{{ $drawerSize }}" title="{{ ucfirst($drawerSize) }} drawer" :size="$drawerSize">The panel uses the {{ $drawerSize }} size.</x-bladewind::drawer>
        @endforeach
    </div>
    <pre class="language-markup"><code>&lt;x-bladewind::drawer name="profile" size="large" title="Profile"&gt;...&lt;/x-bladewind::drawer&gt;</code></pre>

    <h2 id="modal-behaviour">Modal and Non-modal Behaviour</h2>
    <p>A drawer is modal by default. It has a backdrop, traps focus, and prevents background scrolling. Set <code class="inline">modal="false"</code> for supporting content that should leave the page interactive.</p>
    <div class="flex flex-wrap gap-3">
        <x-bladewind::button onclick="showDrawer('modal-example')">Modal</x-bladewind::button>
        <x-bladewind::button type="secondary" onclick="showDrawer('nonmodal-example')">Non-modal</x-bladewind::button>
    </div>
    <x-bladewind::drawer name="modal-example" title="Modal drawer">The page behind this drawer is blocked until it closes.</x-bladewind::drawer>
    <x-bladewind::drawer name="nonmodal-example" title="Non-modal drawer" modal="false">You can still interact with the page behind this drawer.</x-bladewind::drawer>
    <pre class="language-markup"><code>&lt;x-bladewind::drawer name="help" title="Help" modal="false"&gt;...&lt;/x-bladewind::drawer&gt;</code></pre>

    <h2 id="header-footer">Header and Footer Slots</h2>
    <p>Use the named header and footer slots to customize those regions while keeping the drawer layout and scrolling behavior.</p>
    <x-bladewind::button onclick="showDrawer('edit-customer')">Edit customer</x-bladewind::button>
    <x-bladewind::drawer name="edit-customer">
        <x-slot:header><div><p class="!m-0 font-semibold text-gray-900 dark:text-white">Edit customer</p><p class="!m-0 text-sm">Changes are saved to the current workspace.</p></div></x-slot:header>
        <x-bladewind::input label="Full name" value="Ama Mensah" />
        <x-slot:footer><div class="flex justify-end gap-3"><x-bladewind::button type="secondary" onclick="hideDrawer('edit-customer')">Cancel</x-bladewind::button><x-bladewind::button>Save</x-bladewind::button></div></x-slot:footer>
    </x-bladewind::drawer>
    <pre class="language-markup"><code>&lt;x-bladewind::drawer name="edit-customer"&gt;
    &lt;x-slot:header&gt;Custom header&lt;/x-slot:header&gt;
    Form content
    &lt;x-slot:footer&gt;Custom footer&lt;/x-slot:footer&gt;
&lt;/x-bladewind::drawer&gt;</code></pre>

    <h2 id="icons-close">Icons and Close Controls</h2>
    <p>Set <code class="inline">icon</code>, <code class="inline">icon-type</code>, and <code class="inline">icon-dir</code> using the Icon component contract. Set <code class="inline">show-close-button="false"</code> when another clear close action is present.</p>
    <x-bladewind::button onclick="showDrawer('icon-drawer')">Open icon drawer</x-bladewind::button>
    <x-bladewind::drawer name="icon-drawer" title="Security settings" icon="shield-check" icon-type="solid" :show-close-button="false">
        <p class="!mt-0">This drawer uses a solid Heroicon and a footer close action.</p>
        <x-slot:footer><x-bladewind::button onclick="hideDrawer('icon-drawer')">Done</x-bladewind::button></x-slot:footer>
    </x-bladewind::drawer>
    <pre class="language-markup"><code>&lt;x-bladewind::drawer name="security" title="Security settings"
    icon="shield-check" icon-type="solid" show-close-button="false"&gt;...&lt;/x-bladewind::drawer&gt;</code></pre>

    <h2 id="dismissal">Backdrop and Escape Options</h2>
    <p>Backdrop clicks and the Escape key close a modal drawer by default. Disable either behavior for a workflow that requires an explicit decision. Always provide a visible close action.</p>
    <pre class="language-markup"><code>&lt;x-bladewind::drawer name="approval" title="Approve request"
    backdrop-can-close="false" escape-can-close="false"&gt;
    ...
    &lt;x-slot:footer&gt;
        &lt;x-bladewind::button onclick="hideDrawer('approval')"&gt;Cancel&lt;/x-bladewind::button&gt;
    &lt;/x-slot:footer&gt;
&lt;/x-bladewind::drawer&gt;</code></pre>

    <h2 id="programmatic-api">Programmatic Show, Hide, and Toggle</h2>
    <p>The three public helpers accept the drawer name and return <code class="inline">false</code> when no matching state change can be made.</p>
    <pre class="language-javascript"><code>showDrawer('customer-details');
hideDrawer('customer-details');
toggleDrawer('customer-details');</code></pre>
    <p>The drawer also emits <code class="inline">bladewind:drawer-opened</code> and <code class="inline">bladewind:drawer-closed</code> events. Each event bubbles and includes the drawer name in <code class="inline">event.detail.name</code>.</p>

    <h2 id="scrolling">Long and Scrollable Content</h2>
    <p>The body region scrolls independently while the header and footer remain visible.</p>
    <x-bladewind::button onclick="showDrawer('long-content')">Open long content</x-bladewind::button>
    <x-bladewind::drawer name="long-content" title="Activity history">
        @foreach(range(1, 18) as $item)<p class="border-b border-gray-100 pb-4 dark:border-dark-600">Activity item {{ $item }} contains enough content to demonstrate body scrolling.</p>@endforeach
        <x-slot:footer><x-bladewind::button onclick="hideDrawer('long-content')">Close</x-bladewind::button></x-slot:footer>
    </x-bladewind::drawer>

    <h2 id="responsive-theme-rtl">Responsive, Dark Mode, and RTL</h2>
    <p>On narrow screens, side drawers never exceed the viewport width. The component uses the active dark theme automatically and respects reduced motion preferences. Left and right refer to physical edges in both LTR and RTL documents.</p>

    <h2 id="accessibility">Accessibility and Focus Management</h2>
    <p>Modal drawers render with dialog semantics and <code class="inline">aria-modal="true"</code>. The title labels the drawer and the description is connected with <code class="inline">aria-describedby</code>. If there is no title, provide <code class="inline">aria-label</code> or <code class="inline">aria-labelledby</code>.</p>
    <p>Opening moves focus to the first focusable control, or to the panel when there are no controls. Modal focus stays inside the active drawer. Closing restores focus to the control that opened it. When drawers are stacked, Escape affects only the top drawer.</p>

    <h2 id="props">Full List of Attributes</h2>
    <x-bladewind::table>
        <x-slot:header><th>Prop</th><th>Default</th><th>Description</th></x-slot:header>
        @foreach([
            ['name', 'generated', 'Unique drawer name used by the JavaScript helpers.'],
            ['title', "''", 'Visible title and accessible name.'],
            ['description', "''", 'Supporting text connected to the drawer description.'],
            ['position', 'right', 'Physical edge: left, right, top, or bottom.'],
            ['size', 'medium', 'tiny, small, medium, big, large, xl, or omg.'],
            ['modal', 'true', 'Enable backdrop, focus trap, and scroll locking.'],
            ['open', 'false', 'Render the drawer open initially.'],
            ['show-close-button', 'true', 'Show the header close control.'],
            ['close-label', 'Close drawer', 'Accessible label for the close control.'],
            ['backdrop-can-close', 'true', 'Allow backdrop clicks to close a modal drawer.'],
            ['escape-can-close', 'true', 'Allow Escape to close the active drawer.'],
            ['icon', "''", 'Header icon name.'],
            ['icon-type', 'outline', 'Icon type passed to the Icon component.'],
            ['icon-dir', "''", 'Custom icon directory passed to the Icon component.'],
        ] as [$prop, $default, $detail])
            <tr><td><code class="inline">{{ $prop }}</code></td><td>{{ $default }}</td><td>{{ $detail }}</td></tr>
        @endforeach
    </x-bladewind::table>

    <h2 id="slots">Slots</h2>
    <x-bladewind::table>
        <x-slot:header><th>Slot</th><th>Description</th></x-slot:header>
        <tr><td><code class="inline">default</code></td><td>Drawer body content.</td></tr>
        <tr><td><code class="inline">body</code></td><td>Named alternative to the default body slot.</td></tr>
        <tr><td><code class="inline">header</code></td><td>Custom header content. The configured close button remains available.</td></tr>
        <tr><td><code class="inline">footer</code></td><td>Footer actions or supporting content.</td></tr>
    </x-bladewind::table>

    <h2 id="javascript-api">JavaScript API</h2>
    <x-bladewind::table>
        <x-slot:header><th>Function or event</th><th>Description</th></x-slot:header>
        <tr><td><code class="inline">showDrawer(name)</code></td><td>Open a drawer, record the trigger, move focus, and lock scroll when modal.</td></tr>
        <tr><td><code class="inline">hideDrawer(name)</code></td><td>Close a drawer and restore focus.</td></tr>
        <tr><td><code class="inline">toggleDrawer(name)</code></td><td>Open or close a drawer based on its current state.</td></tr>
        <tr><td><code class="inline">bladewind:drawer-opened</code></td><td>Bubbling event emitted after opening.</td></tr>
        <tr><td><code class="inline">bladewind:drawer-closed</code></td><td>Bubbling event emitted after closing.</td></tr>
    </x-bladewind::table>

    <h3>Drawer with all attributes defined</h3>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::drawer
    name="customer-profile"
    title="Customer profile"
    description="Review the customer record before saving changes."
    position="right"
    size="large"
    modal="true"
    open="false"
    show-close-button="true"
    close-label="Close customer profile"
    backdrop-can-close="false"
    escape-can-close="false"
    icon="user-circle"
    icon-type="solid"
    icon-dir=""
    class="customer-profile-drawer"&gt;
    Customer profile content
&lt;/x-bladewind::drawer&gt;</code></pre>

    <h2 id="livewire">Using Drawer Inside Livewire</h2>
    <p>
        Whether the drawer is open or closed lives in the drawer's own DOM rather than in Livewire's component state. If a Livewire
        component re-renders this markup for a reason that has nothing to do with the drawer, it silently closes. This matters most
        for a drawer that can stay open for a while, such as a filter panel or a form, inside a component that can also re-render
        for other reasons. In that situation, wrap the drawer in <code class="inline">wire:ignore</code> so Livewire leaves it alone.
    </p>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; drawer.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#positions">Positions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sizes">Sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#modal-behaviour">Modal and non-modal</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#header-footer">Header and footer</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#icons-close">Icons and close controls</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#dismissal">Backdrop and Escape</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#programmatic-api">Programmatic API</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#scrolling">Scrollable content</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#responsive-theme-rtl">Responsive, dark, and RTL</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#accessibility">Accessibility</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#props">Full list of attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#slots">Slots</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#javascript-api">JavaScript API</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#livewire">Using Drawer inside Livewire</a></div>
    </x-slot:side_nav>
    <x-slot:scripts><script>selectNavigationItem('.component-drawer');</script></x-slot:scripts>
</x-app>
