<x-app>
    <x-slot:title>Breadcrumbs Component</x-slot:title>
    <x-slot:page_title>Breadcrumbs</x-slot:page_title>

    <p>
        Breadcrumbs are that small trail of links near the top of a page that tells people where they are and how they got there.
        They matter most once a site has more than a couple of levels to it.
        This component builds that trail for you and takes care of the details that are easy to forget.
    </p>

    <p>
        Behind the scenes it wraps everything in a proper navigation region with a plain list inside, so a screen
        reader announces it as a real breadcrumb trail rather than just a row of unrelated text. To build a trail, list
        your items in order, starting from the top of your site and working down to the page someone is looking at right
        now, and add the <code class="inline text-red-500">current</code> attribute to whichever one is that final page.
    </p>
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
    <p>
        To make an item a clickable link, give it an <code class="inline text-red-500">href</code>, otherwise it just shows up as
        plain text. You will usually want to leave the <code class="inline text-red-500">href</code> out for the last item in your
        breadcrumbs trail. That said, there are times when the current page also needs to work as a link, for example if
        clicking it should refresh the page or take someone back to a default view of it. In that case, just add both
        <code class="inline text-red-500">href</code> and <code class="inline text-red-500">current</code> to the same item.
    </p>
    <div class="rounded-xl border border-slate-200 p-5 dark:border-slate-700">
        <x-bladewind::breadcrumbs aria-label="Customer path">
            <x-bladewind::breadcrumbs.item href="#">Home</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="#">Customers</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="#" current>Customer details</x-bladewind::breadcrumbs.item>
        </x-bladewind::breadcrumbs>
    </div>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::breadcrumbs aria-label="Customer path"&gt;
    &lt;x-bladewind::breadcrumbs.item href="/"&gt;Home&lt;/x-bladewind::breadcrumbs.item&gt;
    &lt;x-bladewind::breadcrumbs.item href="/customers"&gt;Customers&lt;/x-bladewind::breadcrumbs.item&gt;
    &lt;x-bladewind::breadcrumbs.item href="/customers/42" current&gt;Customer details&lt;/x-bladewind::breadcrumbs.item&gt;
&lt;/x-bladewind::breadcrumbs&gt;</code></pre>

    <h2 id="icons">Icons</h2>
    <p>
        You can put a small icon next to any item's text using <code class="inline text-red-500">icon</code>, and control how it
        looks with <code class="inline text-red-500">icon-type</code> and <code class="inline text-red-500">icon-dir</code>. These three work
        exactly the way they do on the <a href="/component/icon">Icon component</a> itself, so if you already know
        how to pick an icon and switch between outline and solid there, you already know how it works here too.
        Leave <code class="inline">icon-dir</code> empty and it pulls from the same built in icon set the rest of the
        library uses. Give it a folder name from inside your app's <code class="inline">public</code> directory instead,
        and it will load your own SVG file from there rather than the built in set.
    </p>
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
    <p>
        By default, each item is separated from the next by a chevron. If that is not the look you want, you can swap it
        by setting the <code class="inline text-red-500">separator</code> attribute to any character of your choice. The
        component has <code class="inline">slash</code> and <code class="inline">dot</code> built in.
        Changing the separator only changes what sits between the items. You do not need to touch how the items themselves are written.</p>
    <div class="space-y-6 rounded-xl border border-slate-200 p-5 dark:border-slate-700">
        <x-bladewind::breadcrumbs separator="slash" aria-label="slash separator">
            <x-bladewind::breadcrumbs.item href="#">Home</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="#">Components</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item current>Breadcrumbs</x-bladewind::breadcrumbs.item>
        </x-bladewind::breadcrumbs>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::breadcrumbs separator="slash"&gt;
                ...
            &lt;/x-bladewind::breadcrumbs&gt;
        </code>
    </pre>
    <br />
    <div class="space-y-6 rounded-xl border border-slate-200 p-5 dark:border-slate-700 mt-4">
        <x-bladewind::breadcrumbs separator=">>>" aria-label="slash separator">
            <x-bladewind::breadcrumbs.item href="#">Home</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="#">Components</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item current>Breadcrumbs</x-bladewind::breadcrumbs.item>
        </x-bladewind::breadcrumbs>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::breadcrumbs separator=">>>"&gt;
                ...
            &lt;/x-bladewind::breadcrumbs&gt;
        </code>
    </pre>

    <h2 id="sizes">Sizes</h2>
    <p>
        If the default size does not fit your layout, set <code class="inline text-red-500">size</code> to one of the
        six available sizes, starting at the smallest,<code class="inline">tiny</code>, until the largest,
        <code class="inline">large</code>, with <code class="inline">regular</code> sitting in the middle as the
        default. Pick whichever one reads comfortably next to the rest of your page's text.
    </p>
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
    <p>
        Some pages sit four or more levels deep, and spelling out every single step can make the trail wider than the
        screen, especially on a phone. So once a trail reaches four items or more, this component quietly hides the
        middle ones on narrow screens, keeping only the first item and the current page visible, with a small marker
        in between showing that something has been tucked away. Every hidden link is still sitting in the document though.
        If you would rather always show the full trail no matter how narrow the screen gets, set
        <code class="inline text-red-500">collapse="false"</code> and this behaviour switches off entirely.
    </p>
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
    <p>Colours automatically match whichever theme, light or dark, your page is currently using, so there is no need to style this component separately for dark mode. The same goes for right to left languages such as Arabic or Hebrew. The trail will follow whatever reading direction the surrounding page has already set. If you need one breadcrumb trail to run right to left on its own, separately from the rest of the page, you can also set <code class="inline">dir="rtl"</code> directly on that breadcrumb, and the little chevron separators will flip direction to match automatically.</p>
    <div class="rounded-xl p-5 border border-slate-200 dark:border-slate-700" dir="rtl">
        <x-bladewind::breadcrumbs aria-label="مسار الصفحة">
            <x-bladewind::breadcrumbs.item href="/" icon="home">الرئيسية</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item href="/components">المكونات</x-bladewind::breadcrumbs.item>
            <x-bladewind::breadcrumbs.item current>مسار التنقل</x-bladewind::breadcrumbs.item>
        </x-bladewind::breadcrumbs>
    </div>
    <pre class="language-markup"><code>&lt;x-bladewind::breadcrumbs dir="rtl" aria-label="مسار الصفحة"&gt;...&lt;/x-bladewind::breadcrumbs&gt;</code></pre>

    <h2 id="accessibility">Accessibility</h2>
    <ul>
        <li>Give the trail a short, clear label with <code class="inline">aria-label</code>, something like "Breadcrumb" or a short description of the section it belongs to. A screen reader announces this label, so people know what kind of navigation they have just landed on. Leave it off and it defaults to plain "Breadcrumb".</li>
        <li>Always mark exactly one item, the page someone is currently looking at, with the <code class="inline">current</code> attribute. This tells assistive technology which step in the trail is the current one, the same way bold or coloured text tells a sighted person at a glance.</li>
        <li>Write labels that make sense entirely on their own. Someone using a screen reader might jump straight to this trail without having read the rest of the page first, so a label like "Details" is a lot less useful than something like "Order details".</li>
        <li>The small separators between items, and the marker that appears when items are hidden on a narrow screen, are both hidden from screen readers on purpose. They are purely visual, so there is no reason to make a screen reader announce a chevron or a dot between every single item.</li>
        <li>Every linked item is a genuine anchor tag, the same kind of link used everywhere else on the web. That means people can already tab to it and activate it with the keyboard, so this component does not need to write any custom keyboard handling of its own.</li>
    </ul>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Breadcrumbs component.</p>
    @include('docs/announcement')
    <h3>Breadcrumbs Component</h3>
    <x-bladewind::table hover_effect="false" divider="thin">
        <x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>separator</td><td>chevron</td><td>What to show between each item. Choose <code class="inline">chevron</code> for a small arrow, <code class="inline">slash</code> for a forward slash, <code class="inline">dot</code> for a small dot, or type your own short bit of text instead.</td></tr>
        <tr><td>size</td><td>regular</td><td>How big the whole trail is, from <code class="inline">tiny</code> up to <code class="inline">large</code>, with <code class="inline">regular</code> sitting in the middle as the default.</td></tr>
        <tr><td>collapse</td><td>true</td><td>Whether to hide the middle items on narrow screens once the trail reaches four items or more. Set it to <code class="inline">false</code> to always show every item in full.</td></tr>
        <tr><td>aria-label</td><td>Breadcrumb</td><td>A short label that tells screen readers what this navigation trail is for.</td></tr>
        <tr><td>class</td><td></td><td>Any extra classes you want added onto the trail's outer wrapper.</td></tr>
        <tr><td>Any HTML attribute</td><td></td><td>Anything else you pass, including <code class="inline">dir</code>, <code class="inline">id</code>, or your own data attributes, gets forwarded straight onto the trail's outer wrapper.</td></tr>
    </x-bladewind::table>

    <h3>Breadcrumbs Item Component</h3>
    <x-bladewind::table hover_effect="false" divider="thin">
        <x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>href</td><td>null</td><td>The page this item should link to. Leave it out and the item shows up as plain text instead of a link.</td></tr>
        <tr><td>current</td><td>false</td><td>Marks this item as the page someone is currently looking at. Adds the current styling and tells assistive technology this is where the person is right now.</td></tr>
        <tr><td>icon</td><td>null</td><td>The name of an icon from the Icon component to show next to this item's text.</td></tr>
        <tr><td>icon-type</td><td>outline</td><td>Whether the icon should look outlined or filled in solid. Choose <code class="inline">outline</code> or <code class="inline">solid</code>.</td></tr>
        <tr><td>icon-dir</td><td><em>blank</em></td><td>A folder inside your app's <code class="inline">public</code> directory to load a custom icon from. Leave it blank to use the library's built in icon set instead.</td></tr>
        <tr><td>class</td><td></td><td>Any extra classes you want added onto this item's link or text.</td></tr>
        <tr><td>Any HTML attribute</td><td></td><td>Anything else you pass, including <code class="inline">title</code>, <code class="inline">rel</code>, or your own data attributes, gets forwarded straight onto this item's link or text element.</td></tr>
    </x-bladewind::table>

    <h3>Breadcrumbs with all attributes defined</h3>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::breadcrumbs
    separator="slash"
    size="medium"
    collapse="false"
    aria-label="Order path"
    class="rounded-lg"&gt;
    ...
&lt;/x-bladewind::breadcrumbs&gt;</code></pre>

    <h3>Breadcrumbs Item with all attributes defined</h3>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::breadcrumbs.item
    href="/settings"
    current="true"
    icon="cog-6-tooth"
    icon-type="solid"
    icon-dir="icons/custom"
    class="font-semibold"&gt;
    Settings
&lt;/x-bladewind::breadcrumbs.item&gt;</code></pre>

    <x-bladewind::alert show_close_icon="false">
        The source files for this component are available in <code class="inline">resources > views > components > bladewind > breadcrumbs > [index.blade.php, item.blade.php]</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#links-current">Links and current</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#icons">Icons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#separators">Separators</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sizes">Sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#long-trails">Long trails</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#dark-rtl">Dark mode and RTL</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#accessibility">Accessibility</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>
    <x-slot:scripts><script>selectNavigationItem('.component-breadcrumbs');</script></x-slot:scripts>
</x-app>
