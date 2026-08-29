<x-app>
    <x-slot:title>Sidebar Navigation Component</x-slot:title>
    <x-slot:page_title>Sidebar</x-slot:page_title>

    <p>Sidebar provides structured application navigation with named sections, nested groups, explicit active state, desktop collapse, and a Bladewind Drawer on mobile. It uses one navigation tree for both presentations, so item state, group state, IDs, and the accessible navigation landmark stay synchronized.</p>

    <x-bladewind::card has-shadow="false" class="mt-6 !p-0 overflow-hidden">
        <div class="flex min-h-[620px] bg-slate-50 dark:bg-dark-900">
            <x-bladewind::sidebar name="workspace-navigation" label="Workspace navigation" active="orders" collapsible="true" mobile="drawer">
                <x-slot:header>
                    <a href="#workspace" class="flex items-center gap-3 font-semibold text-slate-900 dark:text-white">
                        <span class="grid size-9 place-items-center rounded-lg bg-primary-600 text-white"><x-bladewind::icon name="building-office-2" class="!size-5" /></span>
                        <span>Acme Workspace</span>
                    </a>
                </x-slot:header>

                <x-bladewind::sidebar.group name="workspace" label="Workspace" icon="squares-2x2" expanded="true">
                    <x-bladewind::sidebar.item name="overview" label="Overview" href="#overview" icon="home" />
                    <x-bladewind::sidebar.item name="orders" label="Orders" href="#orders" icon="shopping-bag" description="Review fulfilment" badge="12" badge-label="12 open orders" />
                    <x-bladewind::sidebar.item name="customers" label="Customers" href="#customers" icon="users" />
                </x-bladewind::sidebar.group>

                <x-bladewind::sidebar.group name="settings" label="Settings" icon="cog-6-tooth">
                    <x-bladewind::sidebar.item name="profile" label="Profile" href="#profile" />
                    <x-bladewind::sidebar.item name="security" label="Security" href="#security" disabled="true" />
                </x-bladewind::sidebar.group>

                <x-slot:footer>
                    <div class="flex items-center gap-3"><x-bladewind::avatar image="/assets/images/audrey.jpeg" name="Ama Mensah" size="small" /><div class="min-w-0"><p class="truncate text-sm font-semibold">Ama Mensah</p><p class="truncate text-xs text-slate-500">Workspace owner</p></div></div>
                </x-slot:footer>
            </x-bladewind::sidebar>

            <div class="min-w-0 flex-1 p-6 sm:p-8">
                <div class="mb-6 flex items-center justify-between gap-4"><div><p class="text-sm text-slate-500">Monday, 28 August</p><h3 class="text-2xl font-semibold text-slate-900 dark:text-white">Orders</h3></div><x-bladewind::button icon="bars-3" aria-label="Open workspace navigation" onclick="openSidebar('workspace-navigation')">Menu</x-bladewind::button></div>
                <div class="grid gap-4 sm:grid-cols-3"><x-bladewind::card has-shadow="false"><p class="text-sm text-slate-500">Open orders</p><p class="mt-2 text-3xl font-semibold">12</p></x-bladewind::card><x-bladewind::card has-shadow="false"><p class="text-sm text-slate-500">Ready to ship</p><p class="mt-2 text-3xl font-semibold">7</p></x-bladewind::card><x-bladewind::card has-shadow="false"><p class="text-sm text-slate-500">Attention needed</p><p class="mt-2 text-3xl font-semibold">2</p></x-bladewind::card></div>
                <x-bladewind::card has-shadow="false" class="mt-4"><div class="flex items-center justify-between"><div><h4 class="font-semibold">Today&apos;s fulfilment</h4><p class="mt-1 text-sm text-slate-500">Orders due before the 4:00 PM collection.</p></div><x-bladewind::tag label="On schedule" color="green" /></div><div class="mt-5 space-y-3"><div class="flex items-center justify-between rounded-lg bg-slate-50 p-3 dark:bg-dark-800"><span>ORD-1048, Kofi Addo</span><strong>GHS 840</strong></div><div class="flex items-center justify-between rounded-lg bg-slate-50 p-3 dark:bg-dark-800"><span>ORD-1049, Akosua Owusu</span><strong>GHS 315</strong></div></div></x-bladewind::card>
            </div>
        </div>
    </x-bladewind::card>

    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::sidebar name="workspace-navigation" label="Workspace navigation" active="orders" collapsible="true" mobile="drawer"&gt;
    &lt;x-slot:header&gt;Acme Workspace&lt;/x-slot:header&gt;
    &lt;x-bladewind::sidebar.group name="workspace" label="Workspace" icon="squares-2x2" expanded="true"&gt;
        &lt;x-bladewind::sidebar.item name="overview" label="Overview" href="/dashboard" icon="home" /&gt;
        &lt;x-bladewind::sidebar.item name="orders" label="Orders" href="/orders" icon="shopping-bag" description="Review fulfilment" badge="12" /&gt;
        &lt;x-bladewind::sidebar.item name="customers" label="Customers" href="/customers" icon="users" /&gt;
    &lt;/x-bladewind::sidebar.group&gt;
    &lt;x-slot:footer&gt;&lt;x-bladewind::avatar image="/images/avatar.png" name="Ama Mensah" /&gt;&lt;/x-slot:footer&gt;
&lt;/x-bladewind::sidebar&gt;</code></pre>

    <h2 id="sections-active">Navigation Sections and Active State</h2>
    <p>Groups create named navigation sections. Set <code class="inline">active</code> on the Sidebar to one item name. This value is the canonical active state and takes precedence over item-level <code class="inline">active</code> values. If the Sidebar has no active value, the first enabled item marked active wins. Sidebar does not inspect the current request URL.</p>
    <x-bladewind::alert show_close_icon="false">Only the selected destination receives <code class="inline">aria-current="page"</code>. Set <code class="inline">multiple-active="true"</code> only when the application intentionally has several current destinations.</x-bladewind::alert>

    <h2 id="nested">Nested and Collapsible Navigation</h2>
    <p>Groups can contain items and other groups. The example below uses three practical navigation levels. An active descendant opens every ancestor. A collapsed group hides its descendants from visual and keyboard navigation without deleting their state.</p>
    <div class="h-[470px] max-w-sm"><x-bladewind::sidebar name="nested-navigation" label="Administration navigation" active="roles" mobile="none">
        <x-slot:header><strong>Administration</strong></x-slot:header>
        <x-bladewind::sidebar.group name="organization" label="Organization" icon="building-office-2" expanded="true">
            <x-bladewind::sidebar.item name="teams" label="Teams" href="#teams" icon="user-group" />
            <x-bladewind::sidebar.group name="access" label="Access control" icon="key">
                <x-bladewind::sidebar.group name="permissions" label="Permissions">
                    <x-bladewind::sidebar.item name="roles" label="Roles and permissions" href="#roles" description="Manage policy assignments" badge="4" />
                    <x-bladewind::sidebar.item name="audit" label="Access audit" href="#audit" />
                </x-bladewind::sidebar.group>
            </x-bladewind::sidebar.group>
        </x-bladewind::sidebar.group>
    </x-bladewind::sidebar></div>

    <h2 id="desktop">Desktop Expanded and Collapsed States</h2>
    <p>Set <code class="inline">collapsible="true"</code> to allow compact icon-only presentation. The optional collapse control is shown by default for a collapsible Sidebar. Labels remain available through accessible names and native tooltips. Nested destinations stay in the navigation tree and group state is preserved.</p>
    <div class="flex flex-wrap gap-3"><x-bladewind::button onclick="collapseSidebar('workspace-navigation')">Collapse workspace</x-bladewind::button><x-bladewind::button type="secondary" onclick="expandSidebar('workspace-navigation')">Expand workspace</x-bladewind::button><x-bladewind::button type="secondary" onclick="toggleSidebar('workspace-navigation')">Toggle workspace</x-bladewind::button></div>

    <h2 id="mobile">Mobile Drawer Presentation</h2>
    <p><code class="inline">mobile="drawer"</code> is the default. Below 1024 pixels, <code class="inline">openSidebar()</code> moves the same Sidebar into the existing Bladewind Drawer. Drawer supplies Escape dismissal, backdrop dismissal, focus trapping, focus restoration, and body scroll locking. The Sidebar returns to its desktop host after close.</p>
    <p><code class="inline">close-on-navigate</code> defaults to true. It closes the mobile Drawer after an enabled item is activated. Persistence and route matching are not enabled automatically. Set <code class="inline">mobile="none"</code> when no mobile presentation is needed.</p>

    <h2 id="placement">Left and Right Placement</h2>
    <p><code class="inline">left</code> and <code class="inline">right</code> are physical edges in desktop and mobile layouts. <code class="inline">start</code> and <code class="inline">end</code> follow the computed text direction. This makes logical placement suitable when one layout serves both left-to-right and right-to-left languages.</p>
    <div class="grid gap-5 lg:grid-cols-2"><x-bladewind::card has-shadow="false"><h3 class="mb-4 font-semibold">Left placement</h3><div class="h-80"><x-bladewind::sidebar name="left-example" label="Left navigation" placement="left" mobile="none"><x-bladewind::sidebar.item name="home" label="Home" href="#left-home" icon="home" active="true" /><x-bladewind::sidebar.item name="reports" label="Reports" href="#left-reports" icon="chart-bar" /></x-bladewind::sidebar></div></x-bladewind::card><x-bladewind::card has-shadow="false"><h3 class="mb-4 font-semibold">Right placement</h3><div class="flex h-80 justify-end"><x-bladewind::sidebar name="right-example" label="Right navigation" placement="right" mobile="none"><x-bladewind::sidebar.item name="inbox" label="Inbox" href="#right-inbox" icon="inbox" badge="8" active="true" /><x-bladewind::sidebar.item name="archive" label="Archive" href="#right-archive" icon="archive-box" /></x-bladewind::sidebar></div></x-bladewind::card></div>

    <h2 id="multiple">Multiple Independent Sidebars</h2>
    <p>Every helper resolves one named instance. Groups with the same name can safely exist in separate Sidebars because state and persistence are scoped to the Sidebar root.</p>
    <pre class="language-javascript"><code>collapseSidebar('project-navigation');
expandSidebarGroup('account-navigation', 'settings');</code></pre>

    <h2 id="persistence">Persistent State</h2>
    <p>Persistence is opt-in. Set <code class="inline">persist="true"</code> for desktop collapse state and <code class="inline">persist-groups="true"</code> for expanded groups. The default key is <code class="inline">bladewind:sidebar:{name}</code>. Supply <code class="inline">storage-key</code> when an application needs a different namespace. Invalid or unavailable browser storage is ignored safely.</p>
    <pre class="language-markup"><code>&lt;x-bladewind::sidebar name="admin-navigation" persist="true" persist-groups="true" storage-key="acme:admin-sidebar"&gt;
    ...
&lt;/x-bladewind::sidebar&gt;</code></pre>

    <h2 id="large-trees">Long Labels and Large Navigation Sets</h2>
    <p>Long labels wrap inside the available width. Full-height and content-height Sidebars cap themselves at the viewport and keep scrolling inside the navigation region. The header and footer remain sticky while a large tree scrolls.</p>
    <div class="h-[430px] max-w-sm"><x-bladewind::sidebar name="large-navigation" label="Large report navigation" mobile="none"><x-slot:header><strong>Regional reports</strong></x-slot:header><x-bladewind::sidebar.group name="reports" label="Reports" expanded="true">@foreach(range(1, 14) as $report)<x-bladewind::sidebar.item :name="'report-'.$report" :label="'Regional operations and customer success report '.$report" :href="'#report-'.$report" icon="document-text" />@endforeach</x-bladewind::sidebar.group><x-slot:footer><x-bladewind::tag label="14 reports" color="blue" /></x-slot:footer></x-bladewind::sidebar></div>

    <h2 id="dark-mode">Dark Mode</h2>
    <p>Sidebar follows the page dark class and keeps active, hover, focus, border, description, and badge contrast readable. Drawer uses the same dark theme because it receives the original Sidebar DOM.</p>
    <div class="dark h-80 max-w-sm bg-dark-900"><x-bladewind::sidebar name="dark-navigation" label="Dark navigation" mobile="none"><x-bladewind::sidebar.item name="dashboard" label="Dashboard" href="#dark-dashboard" icon="squares-2x2" active="true" /><x-bladewind::sidebar.item name="billing" label="Billing" href="#dark-billing" icon="credit-card" description="Plans and invoices" /></x-bladewind::sidebar></div>

    <h2 id="rtl">RTL Behavior</h2>
    <p>Set <code class="inline">dir="rtl"</code> on the Sidebar or an ancestor. Logical start and end placement reverse automatically. Indentation, alignment, and horizontal keyboard behavior follow the computed direction. In RTL, Left Arrow opens or enters a group and Right Arrow closes or returns to its parent.</p>
    <div dir="rtl" class="h-80 max-w-sm"><x-bladewind::sidebar name="rtl-navigation" label="التنقل في الحساب" placement="start" mobile="none"><x-bladewind::sidebar.group name="account" label="الحساب" icon="user" expanded="true"><x-bladewind::sidebar.item name="profile" label="الملف الشخصي" href="#rtl-profile" active="true" /><x-bladewind::sidebar.item name="security" label="الأمان" href="#rtl-security" /></x-bladewind::sidebar.group></x-bladewind::sidebar></div>

    <h2 id="accessibility">Accessibility and Keyboard Guidance</h2>
    <p>Sidebar renders one labelled navigation landmark with semantic lists. Active links use <code class="inline">aria-current="page"</code>. Group buttons use <code class="inline">aria-expanded</code> and <code class="inline">aria-controls</code>. Disabled items cannot receive focus or activate.</p>
    <x-bladewind::table><x-slot:header><th>Key</th><th>Behavior</th></x-slot:header><tr><td>Enter or Space</td><td>Activate a group button or button-like item.</td></tr><tr><td>Up Arrow or Down Arrow</td><td>Move through visible enabled controls.</td></tr><tr><td>Home or End</td><td>Move to the first or last visible control.</td></tr><tr><td>Right Arrow</td><td>Open or enter a group in LTR. Close or return in RTL.</td></tr><tr><td>Left Arrow</td><td>Close or return in LTR. Open or enter in RTL.</td></tr><tr><td>Escape</td><td>Close the mobile Drawer and restore focus to its trigger.</td></tr></x-bladewind::table>

    <h2 id="events">Events</h2>
    <p>Before events are cancelable. Call <code class="inline">preventDefault()</code> to stop the related state change or navigation action. Details include <code class="inline">sidebarName</code>, <code class="inline">presentation</code>, <code class="inline">placement</code>, <code class="inline">source</code>, and <code class="inline">triggeringElement</code>. State events add previous and next state. Group and item events add their names.</p>
    <x-bladewind::table><x-slot:header><th>Event suffix</th><th>When it runs</th></x-slot:header><tr><td><code class="inline">before-open</code>, <code class="inline">before-close</code></td><td>Before mobile Drawer presentation changes.</td></tr><tr><td><code class="inline">opened</code>, <code class="inline">closed</code></td><td>After Drawer finishes the change.</td></tr><tr><td><code class="inline">before-collapse</code>, <code class="inline">before-expand</code></td><td>Before desktop compact state changes.</td></tr><tr><td><code class="inline">collapsed</code>, <code class="inline">expanded</code></td><td>After desktop compact state changes.</td></tr><tr><td><code class="inline">group:before-change</code>, <code class="inline">group:changed</code></td><td>Before and after a named group changes.</td></tr><tr><td><code class="inline">item-activate</code></td><td>When a button-like item is activated.</td></tr><tr><td><code class="inline">before-navigate</code></td><td>Before a link continues and configured mobile auto-close runs.</td></tr></x-bladewind::table>

    <h2 id="attributes">Full List of Attributes</h2>
    <h3>Sidebar Attributes</h3>
    <x-bladewind::table><x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header><tr><td>name</td><td>Generated</td><td>Unique public helper and state scope.</td></tr><tr><td>label</td><td>Sidebar navigation</td><td>Accessible navigation name.</td></tr><tr><td>active</td><td>null</td><td>Canonical active item name.</td></tr><tr><td>placement</td><td>left</td><td>left, right, start, or end.</td></tr><tr><td>mobile</td><td>drawer</td><td>drawer or none.</td></tr><tr><td>mobile-size</td><td>small</td><td>Existing Drawer size.</td></tr><tr><td>collapsible</td><td>false</td><td>Enables desktop compact mode.</td></tr><tr><td>collapsed</td><td>false</td><td>Initial desktop state.</td></tr><tr><td>show-collapse-control</td><td>true</td><td>Shows the control when collapsible.</td></tr><tr><td>close-on-navigate</td><td>true</td><td>Closes mobile Drawer after activation.</td></tr><tr><td>persist</td><td>false</td><td>Persists desktop collapsed state.</td></tr><tr><td>persist-groups</td><td>false</td><td>Persists group state.</td></tr><tr><td>storage-key</td><td>Derived from name</td><td>Sidebar-specific localStorage key.</td></tr><tr><td>height</td><td>full</td><td>full or content.</td></tr><tr><td>multiple-active</td><td>false</td><td>Allows several explicit active items only when root active is omitted.</td></tr><tr><td>collapse-label</td><td>Collapse navigation</td><td>Accessible collapse control label.</td></tr><tr><td>expand-label</td><td>Expand navigation</td><td>Accessible expand control label.</td></tr><tr><td>close-label</td><td>Close navigation</td><td>Accessible mobile close label.</td></tr></x-bladewind::table>
    <h3>Sidebar Group Attributes</h3>
    <x-bladewind::table><x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header><tr><td>name</td><td>Required</td><td>Name scoped to its Sidebar.</td></tr><tr><td>label</td><td>Required</td><td>Visible and accessible section label.</td></tr><tr><td>icon</td><td>null</td><td>Heroicon name.</td></tr><tr><td>icon-type</td><td>outline</td><td>Icon type.</td></tr><tr><td>icon-dir</td><td>empty</td><td>Custom icon directory.</td></tr><tr><td>expanded</td><td>false</td><td>Initial expanded state.</td></tr><tr><td>disabled</td><td>false</td><td>Prevents group activation.</td></tr></x-bladewind::table>
    <h3>Sidebar Item Attributes</h3>
    <x-bladewind::table><x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header><tr><td>name</td><td>Required</td><td>Active state and event identifier.</td></tr><tr><td>label</td><td>empty</td><td>Visible and accessible label.</td></tr><tr><td>href</td><td>null</td><td>Link destination. Omit for a button action.</td></tr><tr><td>icon</td><td>null</td><td>Heroicon name.</td></tr><tr><td>icon-type</td><td>outline</td><td>Icon type.</td></tr><tr><td>icon-dir</td><td>empty</td><td>Custom icon directory.</td></tr><tr><td>description</td><td>null</td><td>Secondary item text.</td></tr><tr><td>badge</td><td>null</td><td>Counter or status value.</td></tr><tr><td>badge-label</td><td>Derived</td><td>Screen reader meaning for the badge.</td></tr><tr><td>active</td><td>false</td><td>Explicit active state when root active is omitted.</td></tr><tr><td>disabled</td><td>false</td><td>Removes activation and focus.</td></tr><tr><td>external</td><td>false</td><td>Adds external link semantics and indicator.</td></tr><tr><td>target</td><td>null</td><td>Link target.</td></tr></x-bladewind::table>

    <h2 id="slots">Slots</h2>
    <x-bladewind::table><x-slot:header><th>Slot</th><th>Description</th></x-slot:header><tr><td>sidebar header</td><td>Brand, workspace switcher, or composed header content.</td></tr><tr><td>sidebar default</td><td>Sidebar groups and items.</td></tr><tr><td>sidebar footer</td><td>Account, status, or footer actions.</td></tr><tr><td>group default</td><td>Nested groups and items.</td></tr><tr><td>item default</td><td>Custom item copy while Sidebar keeps icon, badge, and action semantics.</td></tr></x-bladewind::table>

    <h2 id="javascript-api">JavaScript API</h2>
    <p>Helpers return true on success or when the requested state already applies. They return false for missing, disabled, unsupported, or canceled targets.</p>
    <pre class="language-javascript"><code>openSidebar('workspace-navigation');
closeSidebar('workspace-navigation');
toggleSidebar('workspace-navigation');
collapseSidebar('workspace-navigation');
expandSidebar('workspace-navigation');
toggleSidebarGroup('workspace-navigation', 'settings');
expandSidebarGroup('workspace-navigation', 'settings');
collapseSidebarGroup('workspace-navigation', 'settings');
resetSidebar('workspace-navigation');</code></pre>

    <h3>Sidebar with all attributes defined</h3>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::sidebar
    name="account-navigation"
    label="Account navigation"
    active="billing"
    placement="start"
    mobile="drawer"
    mobile-size="small"
    collapsible="true"
    collapsed="false"
    show-collapse-control="true"
    close-on-navigate="true"
    persist="true"
    persist-groups="true"
    storage-key="acme:account-navigation"
    height="full"
    multiple-active="false"
    collapse-label="Collapse account navigation"
    expand-label="Expand account navigation"
    close-label="Close account navigation"
    class="account-sidebar"
    data-region="account"&gt;
    &lt;x-slot:header&gt;Acme Account&lt;/x-slot:header&gt;
    &lt;x-bladewind::sidebar.group name="settings" label="Settings" icon="cog-6-tooth" icon-type="outline" icon-dir="" expanded="true" disabled="false"&gt;
        &lt;x-bladewind::sidebar.item name="billing" label="Billing" href="/billing" icon="credit-card" icon-type="outline" icon-dir="" description="Plans and invoices" badge="2" badge-label="2 unpaid invoices" active="false" disabled="false" external="false" target="_self" class="billing-link" data-area="finance" /&gt;
    &lt;/x-bladewind::sidebar.group&gt;
    &lt;x-slot:footer&gt;Account footer&lt;/x-slot:footer&gt;
&lt;/x-bladewind::sidebar&gt;</code></pre>

    <x-bladewind::alert show_close_icon="false">The source files for this component are available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; sidebar</code></x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#sections-active">Navigation sections and active state</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#nested">Nested and collapsible navigation</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#desktop">Desktop expanded and collapsed states</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#mobile">Mobile Drawer presentation</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#placement">Left and right placement</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#multiple">Multiple independent Sidebars</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#persistence">Persistent state</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#large-trees">Long labels and large navigation sets</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#dark-mode">Dark mode</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#rtl">RTL behavior</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#accessibility">Accessibility and keyboard guidance</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#events">Events</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full List of Attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#slots">Slots</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#javascript-api">JavaScript API</a></div>
    </x-slot:side_nav>
    <x-slot:scripts><script>selectNavigationItem('.component-sidebar');</script></x-slot:scripts>
</x-app>
