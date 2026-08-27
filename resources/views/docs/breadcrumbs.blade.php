<x-app>
    <x-slot:title>Breadcrumbs Component</x-slot:title>
    <x-slot:page_title>Breadcrumbs</x-slot:page_title>

    <p>Breadcrumbs show where the current page sits inside your application. The component uses a semantic navigation landmark, an ordered list, native links, and <code class="inline">aria-current="page"</code> for the current page.</p>

    <p>Add linked items first and mark the page being viewed with the <code class="inline">current</code> attribute.</p>
    <div class="rounded-xl border border-slate-200 p-5 dark:border-slate-700">
        <x-bladewind::breadcrumbs aria-label="Breadcrumb">
            <x-bladewind::breadcrumbs.item href="/" icon="home">Home</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="/components">Components</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item current>Breadcrumbs</x-bladewind::breadcrumbs.item>
        </x-bladewind::breadcrumbs>
    </div>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::breadcrumbs aria-label="Breadcrumb"&gt;
    &lt;x-bladewind::breadcrumbs.item href="/" icon="home"&gt;Home&lt;/x-bladewind::breadcrumbs.item&gt;
    &lt;x-bladewind::breadcrumbs.item href="/components"&gt;Components&lt;/x-bladewind::breadcrumbs.item&gt;
    &lt;x-bladewind::breadcrumbs.item current&gt;Breadcrumbs&lt;/x-bladewind::breadcrumbs.item&gt;
&lt;/x-bladewind::breadcrumbs&gt;</code></pre>

    <h2 id="links-current">Linked And Current Items</h2>
    <p>An item with an <code class="inline">href</code> renders as a native link. An item without one renders as text. A current item is text by default. Add an <code class="inline">href</code> when the current page must also be a link.</p>
    <div class="rounded-xl border border-slate-200 p-5 dark:border-slate-700">
        <x-bladewind::breadcrumbs aria-label="Customer path">
            <x-bladewind::breadcrumbs.item href="/">Home</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item>Customers</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="/component/breadcrumbs" current>Customer details</x-bladewind::breadcrumbs.item>
        </x-bladewind::breadcrumbs>
    </div>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::breadcrumbs aria-label="Customer path"&gt;
    &lt;x-bladewind::breadcrumbs.item href="/"&gt;Home&lt;/x-bladewind::breadcrumbs.item&gt;
    &lt;x-bladewind::breadcrumbs.item&gt;Customers&lt;/x-bladewind::breadcrumbs.item&gt;
    &lt;x-bladewind::breadcrumbs.item href="/customers/42" current&gt;Customer details&lt;/x-bladewind::breadcrumbs.item&gt;
&lt;/x-bladewind::breadcrumbs&gt;</code></pre>

    <h2 id="icons">Icons</h2>
    <p>Use <code class="inline">icon</code>, <code class="inline">icon-type</code>, and <code class="inline">icon-dir</code> on any item. These follow the <a href="/component/icon">Icon component</a> contract. <code class="inline">icon-dir=""</code> uses the default Icon directory. Set it to a directory under <code class="inline">public</code> when loading a custom SVG. A home icon is commonly added to the first item.</p>
    <div class="rounded-xl border border-slate-200 p-5 dark:border-slate-700">
        <x-bladewind::breadcrumbs aria-label="Settings path">
            <x-bladewind::breadcrumbs.item href="/" icon="home">Home</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="/settings" icon="cog-6-tooth">Settings</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item current icon="user-circle" icon-type="solid">Profile</x-bladewind::breadcrumbs.item>
        </x-bladewind::breadcrumbs>
    </div>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::breadcrumbs&gt;
    &lt;x-bladewind::breadcrumbs.item href="/" icon="home"&gt;Home&lt;/x-bladewind::breadcrumbs.item&gt;
    &lt;x-bladewind::breadcrumbs.item href="/settings" icon="cog-6-tooth"&gt;Settings&lt;/x-bladewind::breadcrumbs.item&gt;
    &lt;x-bladewind::breadcrumbs.item current icon="user-circle" icon-type="solid"&gt;Profile&lt;/x-bladewind::breadcrumbs.item&gt;
&lt;/x-bladewind::breadcrumbs&gt;</code></pre>

    <h2 id="separators">Separator Options</h2>
    <p>The default is a chevron. Use <code class="inline">slash</code>, <code class="inline">dot</code>, or short custom text without changing item markup.</p>
    <div class="space-y-6 rounded-xl border border-slate-200 p-5 dark:border-slate-700">
        @foreach(['chevron', 'slash', 'dot', '|'] as $separator)
            <x-bladewind::breadcrumbs :separator="$separator" :aria-label="ucfirst($separator).' separator'">
                <x-bladewind::breadcrumbs.item href="/">Home</x-bladewind::breadcrumbs.item>
                <x-bladewind::breadcrumbs.item href="/components">Components</x-bladewind::breadcrumbs.item>
                <x-bladewind::breadcrumbs.item current>{{ ucfirst($separator) }}</x-bladewind::breadcrumbs.item>
            </x-bladewind::breadcrumbs>
        @endforeach
    </div>
    <pre class="language-markup"><code>&lt;x-bladewind::breadcrumbs separator="slash"&gt;...&lt;/x-bladewind::breadcrumbs&gt;
&lt;x-bladewind::breadcrumbs separator="dot"&gt;...&lt;/x-bladewind::breadcrumbs&gt;
&lt;x-bladewind::breadcrumbs separator="|"&gt;...&lt;/x-bladewind::breadcrumbs&gt;</code></pre>

    <h2 id="sizes">Sizes</h2>
    <p>Available sizes are <code class="inline">tiny</code>, <code class="inline">small</code>, <code class="inline">regular</code>, <code class="inline">medium</code>, <code class="inline">big</code>, and <code class="inline">large</code>. The default is <code class="inline">regular</code>.</p>
    <div class="space-y-6 rounded-xl border border-slate-200 p-5 dark:border-slate-700">
        @foreach(['tiny', 'small', 'regular', 'medium', 'big', 'large'] as $size)
            <x-bladewind::breadcrumbs :size="$size" :aria-label="ucfirst($size).' breadcrumbs'">
                <x-bladewind::breadcrumbs.item href="/" icon="home">Home</x-bladewind::breadcrumbs.item>
                <x-bladewind::breadcrumbs.item href="/components">Components</x-bladewind::breadcrumbs.item>
                <x-bladewind::breadcrumbs.item current>{{ ucfirst($size) }}</x-bladewind::breadcrumbs.item>
            </x-bladewind::breadcrumbs>
        @endforeach
    </div>
    <pre class="language-markup"><code>&lt;x-bladewind::breadcrumbs size="medium"&gt;...&lt;/x-bladewind::breadcrumbs&gt;</code></pre>

    <h2 id="long-trails">Long And Collapsed Trails</h2>
    <p>Trails with four or more items collapse their middle items below 640 pixels. The first and current items stay visible. Every hidden destination stays in the document and keyboard tab order. Focusing a hidden link reveals it. Set <code class="inline">collapse="false"</code> to keep the full trail visible.</p>
    <div class="max-w-full overflow-hidden rounded-xl border border-slate-200 p-5 dark:border-slate-700">
        <x-bladewind::breadcrumbs aria-label="Order path">
            <x-bladewind::breadcrumbs.item href="/" icon="home">Home</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="/sales">Sales</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="/sales/orders">Orders and fulfilment</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="/sales/orders/1042">Order 1042 with a very long customer reference</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item current>Shipment details</x-bladewind::breadcrumbs.item>
        </x-bladewind::breadcrumbs>
    </div>
    <pre class="language-markup"><code>&lt;x-bladewind::breadcrumbs collapse="false"&gt;...&lt;/x-bladewind::breadcrumbs&gt;</code></pre>

    <h2 id="dark-rtl">Dark Mode And RTL</h2>
    <p>Colours follow the page theme. RTL pages inherit their direction from the document. You can also set <code class="inline">dir="rtl"</code> on one breadcrumb. Chevron separators reverse automatically.</p>
    <div class="dark rounded-xl bg-slate-950 p-5" dir="rtl">
        <x-bladewind::breadcrumbs aria-label="مسار الصفحة">
            <x-bladewind::breadcrumbs.item href="/" icon="home">الرئيسية</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="/components">المكونات</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item current>مسار التنقل</x-bladewind::breadcrumbs.item>
        </x-bladewind::breadcrumbs>
    </div>
    <pre class="language-markup"><code>&lt;x-bladewind::breadcrumbs dir="rtl" aria-label="مسار الصفحة"&gt;...&lt;/x-bladewind::breadcrumbs&gt;</code></pre>

    <h2 id="accessibility">Accessibility</h2>
    <ul>
        <li>Give the landmark a short <code class="inline">aria-label</code>. The default is <code class="inline">Breadcrumb</code>.</li>
        <li>Mark one item as <code class="inline">current</code>.</li>
        <li>Use labels that make sense without surrounding content.</li>
        <li>Separators and the overflow marker are hidden from assistive technology.</li>
        <li>Linked items use native anchors and need no custom keyboard script.</li>
    </ul>

    <h2 id="breadcrumbs-props">Breadcrumbs Attributes</h2>
    <x-bladewind::table hover_effect="false" divider="thin">
        <x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>separator</td><td>chevron</td><td><code class="inline">chevron</code>, <code class="inline">slash</code>, <code class="inline">dot</code>, or custom text.</td></tr>
        <tr><td>size</td><td>regular</td><td><code class="inline">tiny</code>, <code class="inline">small</code>, <code class="inline">regular</code>, <code class="inline">medium</code>, <code class="inline">big</code>, or <code class="inline">large</code>.</td></tr>
        <tr><td>collapse</td><td>true</td><td>Collapses middle items on small screens when there are four or more items.</td></tr>
        <tr><td>aria-label</td><td>Breadcrumb</td><td>Accessible name for the navigation landmark.</td></tr>
        <tr><td>class</td><td></td><td>Classes merged onto the <code class="inline">nav</code>.</td></tr>
        <tr><td>Any HTML attribute</td><td></td><td>Forwarded to the <code class="inline">nav</code>, including <code class="inline">dir</code>, <code class="inline">id</code>, and data attributes.</td></tr>
    </x-bladewind::table>

    <h2 id="item-props">Breadcrumbs Item Attributes</h2>
    <x-bladewind::table hover_effect="false" divider="thin">
        <x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>href</td><td>null</td><td>Destination URL. Without it the item renders as text.</td></tr>
        <tr><td>current</td><td>false</td><td>Adds <code class="inline">aria-current="page"</code> and current styling.</td></tr>
        <tr><td>icon</td><td>null</td><td>Icon name from the Icon component.</td></tr>
        <tr><td>icon-type</td><td>outline</td><td><code class="inline">outline</code> or <code class="inline">solid</code>.</td></tr>
        <tr><td>icon-dir</td><td><em>blank</em></td><td>Directory under <code class="inline">public</code> containing a custom SVG. A blank value uses the default Icon directory.</td></tr>
        <tr><td>class</td><td></td><td>Classes merged onto the link or text element.</td></tr>
        <tr><td>Any HTML attribute</td><td></td><td>Forwarded to the link or text element, including <code class="inline">title</code>, <code class="inline">rel</code>, and data attributes.</td></tr>
    </x-bladewind::table>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#links-current">Links and current</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#icons">Icons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#separators">Separators</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sizes">Sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#long-trails">Long trails</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#dark-rtl">Dark mode and RTL</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#accessibility">Accessibility</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#breadcrumbs-props">Breadcrumbs attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#item-props">Item attributes</a></div>
    </x-slot:side_nav>
    <x-slot:scripts><script>selectNavigationItem('.component-breadcrumbs');</script></x-slot:scripts>
</x-app>
