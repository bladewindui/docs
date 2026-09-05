<x-app>
    <x-slot:title>Banner Component</x-slot:title>
    <x-slot:page_title>Banner</x-slot:page_title>

    <p>
        The banner component is a page-level or global announcement bar. Where the <a href="/component/alert">Alert</a>
        component is meant to sit inline next to the content it relates to, a banner spans the full width of its
        container, typically at the very top of a page, and stays there for as long as it is relevant. Use it for
        things everyone visiting the page should notice: planned maintenance, an outage that is being worked on, a
        new feature announcement, or a policy change.
    </p>
    <p>
        There are five tones to choose from: <code class="inline">info</code> <code class="inline">success</code>
        <code class="inline">warning</code> <code class="inline">error</code> and <code class="inline">primary</code>.
        Each tone comes with a matching colour and a default icon, and each banner can be dismissed unless you turn
        that off.
    </p>

    <h2 id="basic">Basic Usage</h2>
    <x-bladewind::banner class="mb-3">
        Scheduled maintenance runs tonight from 11pm to 1am. Some features may be unavailable.
    </x-bladewind::banner>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::banner&gt;
                Scheduled maintenance runs tonight from 11pm to 1am. Some features may be unavailable.
            &lt;/x-bladewind::banner&gt;
        </code>
    </pre>

    <h2 id="tones">Tones</h2>
    <p>Set <code class="inline">tone</code> to match the seriousness of what you are announcing.</p>
    <x-bladewind::banner tone="success" class="mb-3">Your changes were published successfully.</x-bladewind::banner>
    <x-bladewind::banner tone="warning" class="mb-3">Your trial ends in 3 days. Add a payment method to keep your account active.</x-bladewind::banner>
    <x-bladewind::banner tone="error" class="mb-3">Payment failed. Please update your billing details to avoid service interruption.</x-bladewind::banner>
    <x-bladewind::banner tone="primary">A new version of the dashboard is available.</x-bladewind::banner>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::banner tone="success"&gt;Your changes were published successfully.&lt;/x-bladewind::banner&gt;
            &lt;x-bladewind::banner tone="warning"&gt;Your trial ends in 3 days. Add a payment method to keep your account active.&lt;/x-bladewind::banner&gt;
            &lt;x-bladewind::banner tone="error"&gt;Payment failed. Please update your billing details to avoid service interruption.&lt;/x-bladewind::banner&gt;
            &lt;x-bladewind::banner tone="primary"&gt;A new version of the dashboard is available.&lt;/x-bladewind::banner&gt;
        </code>
    </pre>

    <h2 id="title">Title</h2>
    <p>Give a banner a short bold <code class="inline">title</code> above its message when the message alone needs more emphasis.</p>
    <x-bladewind::banner tone="warning" title="Action needed">
        Your account will be suspended on March 4, 2027 unless you verify your email address.
    </x-bladewind::banner>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::banner tone="warning" title="Action needed"&gt;
                Your account will be suspended on March 4, 2027 unless you verify your email address.
            &lt;/x-bladewind::banner&gt;
        </code>
    </pre>

    <h2 id="actions">Actions</h2>
    <p>Give a banner an <code class="inline">actions</code> slot for one or more buttons or links, shown beside the message.</p>
    <x-bladewind::banner tone="primary">
        A new version of the dashboard is available.
        <x-slot:actions>
            <x-bladewind::button size="small" color="white">Learn more</x-bladewind::button>
            <x-bladewind::button size="small">Refresh now</x-bladewind::button>
        </x-slot:actions>
    </x-bladewind::banner>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::banner tone="primary"&gt;
                A new version of the dashboard is available.
                &lt;x-slot:actions&gt;
                    &lt;x-bladewind::button size="small" color="white"&gt;Learn more&lt;/x-bladewind::button&gt;
                    &lt;x-bladewind::button size="small"&gt;Refresh now&lt;/x-bladewind::button&gt;
                &lt;/x-slot:actions&gt;
            &lt;/x-bladewind::banner&gt;
        </code>
    </pre>

    <h2 id="dismiss">Dismissibility</h2>
    <p>
        Banners show a close icon by default. Click it and the banner is removed from the page. Set
        <code class="inline">dismissible="false"</code> when the announcement is important enough that visitors
        should not be able to hide it.
    </p>
    <x-bladewind::banner tone="error" dismissible="false">
        The payments system is currently down. We are working on a fix.
    </x-bladewind::banner>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::banner tone="error" dismissible="false"&gt;
                The payments system is currently down. We are working on a fix.
            &lt;/x-bladewind::banner&gt;
        </code>
    </pre>

    <h2 id="persistence">Persistence</h2>
    <p>
        Dismissing a banner is normally only remembered for the current page view. Reload the page and it comes
        back. Give the banner a <code class="inline">persist_key</code> and its dismissal is remembered in the
        visitor's browser, so it stays gone on later visits too. Pick a key that will not clash with any other
        banner on your site, and change it whenever the announcement itself changes, so returning visitors see the
        new one.
    </p>
    <x-bladewind::banner tone="info" persist_key="banner-demo-2027-03">
        We have a new look. Let us know what you think.
    </x-bladewind::banner>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::banner tone="info" persist_key="banner-demo-2027-03"&gt;
                We have a new look. Let us know what you think.
            &lt;/x-bladewind::banner&gt;
        </code>
    </pre>

    <h2 id="icons">Icons</h2>
    <p>
        Each tone shows a matching default icon. Set <code class="inline">icon</code> to use any icon name from
        <a href="https://heroicons.com" target="_blank">Heroicons</a> instead, or set
        <code class="inline">show_icon="false"</code> to hide it altogether.
    </p>
    <x-bladewind::banner tone="primary" icon="gift" class="mb-3">A new feature just shipped. Take a look.</x-bladewind::banner>
    <x-bladewind::banner tone="info" show_icon="false">This banner has no icon.</x-bladewind::banner>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::banner tone="primary" icon="gift"&gt;A new feature just shipped. Take a look.&lt;/x-bladewind::banner&gt;
            &lt;x-bladewind::banner tone="info" show_icon="false"&gt;This banner has no icon.&lt;/x-bladewind::banner&gt;
        </code>
    </pre>

    <h2 id="rounded">Rounded Corners</h2>
    <p>
        By default a banner has square corners, since it usually spans the full width of the page. Set
        <code class="inline">rounded="true"</code> when you are placing it inside a narrower container instead.
    </p>
    <x-bladewind::banner tone="success" rounded="true">Your export is ready to download.</x-bladewind::banner>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::banner tone="success" rounded="true"&gt;Your export is ready to download.&lt;/x-bladewind::banner&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>tone</td>
            <td>info</td>
            <td><code class="inline">info</code> <code class="inline">success</code> <code class="inline">warning</code> <code class="inline">error</code> <code class="inline">primary</code></td>
        </tr>
        <tr>
            <td>title</td>
            <td><em>blank</em></td>
            <td>An optional bold heading shown above the message.</td>
        </tr>
        <tr>
            <td>show_icon</td>
            <td>true</td>
            <td>Determines if the tone's icon is displayed. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>icon</td>
            <td><em>blank</em></td>
            <td>Use any icon name from <a href="https://heroicons.com" target="_blank">Heroicons</a> instead of the tone's default icon.</td>
        </tr>
        <tr>
            <td>dismissible</td>
            <td>true</td>
            <td>Determines if a close icon is shown so visitors can hide the banner. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>persist_key</td>
            <td><em>blank</em></td>
            <td>Remembers a dismissal in the visitor's browser under this key, so the banner stays hidden on later visits. Leave blank and the banner shows again on every page load.</td>
        </tr>
        <tr>
            <td>rounded</td>
            <td>false</td>
            <td>Determines if the banner has rounded corners. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>actions</td>
            <td><em>none</em></td>
            <td>A named slot for one or more buttons or links, shown beside the message.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional CSS classes you wish to add.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > banner.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#basic">Basic usage</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#tones">Tones</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#title">Title</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#actions">Actions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#dismiss">Dismissibility</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#persistence">Persistence</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#icons">Icons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#rounded">Rounded corners</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-banner');
        </script>
    </x-slot:scripts>
</x-app>
