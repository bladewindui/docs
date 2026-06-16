<x-app>
    <x-slot:title>Popover Component</x-slot:title>
    <x-slot:page_title>Popover</x-slot:page_title>

    <p>
        Display a floating content panel that opens on click or hover.
        Unlike a <a href="/component/tooltip">tooltip</a>, a popover can contain rich markup — links, lists, images, or custom HTML — not just a line of text.
        The trigger defaults to an information-circle icon; you can swap it for any other icon or for fully custom markup.
    </p>

    <x-bladewind::popover>
        <p>This is the popover content. You can put <strong>any markup</strong> here.</p>
    </x-bladewind::popover>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::popover&gt;
                &lt;p&gt;This is the popover content. You can put &lt;strong&gt;any markup&lt;/strong&gt; here.&lt;/p&gt;
            &lt;/x-bladewind::popover&gt;
        </code>
    </pre>

    <h2 id="trigger">Trigger Icon</h2>
    <p>
        The default trigger icon is <code class="inline">information-circle</code> (Heroicons). Pass any Heroicons name suffixed with <code class="inline">-icon</code>
        to the <code class="inline text-red-500">trigger</code> attribute to swap it out.
    </p>

    <div class="flex items-center gap-6 py-4">
        <x-bladewind::popover trigger="question-mark-circle-icon">
            <p>This is triggered by a question-mark icon.</p>
        </x-bladewind::popover>
        <x-bladewind::popover trigger="bell-icon">
            <p>This is triggered by a bell icon.</p>
        </x-bladewind::popover>
        <x-bladewind::popover trigger="ellipsis-vertical-icon">
            <p>This is triggered by a vertical ellipsis icon.</p>
        </x-bladewind::popover>
    </div>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::popover trigger="question-mark-circle-icon"&gt;...&lt;/x-bladewind::popover&gt;
            &lt;x-bladewind::popover trigger="bell-icon"&gt;...&lt;/x-bladewind::popover&gt;
            &lt;x-bladewind::popover trigger="ellipsis-vertical-icon"&gt;...&lt;/x-bladewind::popover&gt;
        </code>
    </pre>

    <h2 id="custom-trigger">Custom Trigger Markup</h2>
    <p>
        When an icon is not enough, pass any HTML as the trigger via <code class="inline text-red-500">&lt;x-slot:trigger&gt;</code>.
        This lets you use a button, a badge, an avatar, or any other element as the popover trigger.
    </p>

    <x-bladewind::popover>
        <x-slot:trigger>
            <x-bladewind::button size="small" type="secondary">Options</x-bladewind::button>
        </x-slot:trigger>
        <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-blue-600 hover:underline">Edit record</a></li>
            <li><a href="#" class="text-blue-600 hover:underline">Duplicate</a></li>
            <li><a href="#" class="text-red-500 hover:underline">Delete</a></li>
        </ul>
    </x-bladewind::popover>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::popover&gt;
                &lt;x-slot:trigger&gt;
                    &lt;x-bladewind::button size="small" type="secondary"&gt;Options&lt;/x-bladewind::button&gt;
                &lt;/x-slot:trigger&gt;
                &lt;ul class="space-y-2 text-sm"&gt;
                    &lt;li&gt;&lt;a href="#"&gt;Edit record&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href="#"&gt;Duplicate&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href="#"&gt;Delete&lt;/a&gt;&lt;/li&gt;
                &lt;/ul&gt;
            &lt;/x-bladewind::popover&gt;
        </code>
    </pre>

    <h2 id="title">Title</h2>
    <p>
        An optional heading can be shown above the popover content by setting the <code class="inline text-red-500">title</code> attribute.
        The title is separated from the content by a subtle border.
    </p>

    <x-bladewind::popover title="Account Actions">
        <ul class="space-y-2 text-sm">
            <li><a href="#" class="text-blue-600 hover:underline">Edit profile</a></li>
            <li><a href="#" class="text-blue-600 hover:underline">Change password</a></li>
            <li><a href="#" class="text-red-500 hover:underline">Sign out</a></li>
        </ul>
    </x-bladewind::popover>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::popover title="Account Actions"&gt;
                &lt;ul class="space-y-2 text-sm"&gt;
                    &lt;li&gt;&lt;a href="#"&gt;Edit profile&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href="#"&gt;Change password&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href="#"&gt;Sign out&lt;/a&gt;&lt;/li&gt;
                &lt;/ul&gt;
            &lt;/x-bladewind::popover&gt;
        </code>
    </pre>

    <h2 id="position">Position</h2>
    <p>
        The popover panel can appear above, below, to the left, or to the right of its trigger.
        The default is <code class="inline">bottom</code>.
    </p>

    <div class="flex items-center gap-8 py-4">
        <x-bladewind::popover position="top" title="Top">
            <p class="text-sm">I open above the trigger.</p>
        </x-bladewind::popover>
        <x-bladewind::popover position="bottom" title="Bottom">
            <p class="text-sm">I open below the trigger (default).</p>
        </x-bladewind::popover>
        <x-bladewind::popover position="left" title="Left">
            <p class="text-sm">I open to the left of the trigger.</p>
        </x-bladewind::popover>
        <x-bladewind::popover position="right" title="Right">
            <p class="text-sm">I open to the right of the trigger.</p>
        </x-bladewind::popover>
    </div>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::popover position="top"&gt;...&lt;/x-bladewind::popover&gt;
            &lt;x-bladewind::popover position="bottom"&gt;...&lt;/x-bladewind::popover&gt;
            &lt;x-bladewind::popover position="left"&gt;...&lt;/x-bladewind::popover&gt;
            &lt;x-bladewind::popover position="right"&gt;...&lt;/x-bladewind::popover&gt;
        </code>
    </pre>

    <h2 id="trigger-on">Trigger Event</h2>
    <p>
        By default the popover opens on <code class="inline">click</code>. Set <code class="inline text-red-500">trigger_on="mouseover"</code>
        to open the panel when the user hovers over the trigger element instead.
    </p>

    <x-bladewind::popover triggerOn="mouseover" title="Hover triggered">
        <p class="text-sm">This popover opened on mouseover.</p>
    </x-bladewind::popover>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::popover triggerOn="mouseover"&gt;
                &lt;p&gt;This popover opened on mouseover.&lt;/p&gt;
            &lt;/x-bladewind::popover&gt;
        </code>
    </pre>

    <h2 id="width">Width</h2>
    <p>
        The popover panel defaults to <code class="inline">280</code> pixels wide.
        Adjust the <code class="inline text-red-500">width</code> attribute to suit your content — for example, wider panels for rich content like user cards.
    </p>

    <x-bladewind::popover width="360" title="Wider popover">
        <p class="text-sm">This popover is 360px wide, giving more room for longer content.</p>
    </x-bladewind::popover>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::popover width="360" title="Wider popover"&gt;
                &lt;p&gt;This popover is 360px wide...&lt;/p&gt;
            &lt;/x-bladewind::popover&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Popover component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true" has_shadow="false">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td><em>auto-generated</em></td>
            <td>Unique name used to identify the popover instance. A random name is generated if none is provided.</td>
        </tr>
        <tr>
            <td>trigger</td>
            <td>information-circle-icon</td>
            <td>
                Icon to use as the trigger. Must be a Heroicons name suffixed with <code class="inline">-icon</code> (e.g. <code class="inline">bell-icon</code>).
                Ignored when <code class="inline">&lt;x-slot:trigger&gt;</code> is provided.
            </td>
        </tr>
        <tr>
            <td>trigger_css</td>
            <td><em>blank</em></td>
            <td>Additional CSS classes to apply to the trigger wrapper element.</td>
        </tr>
        <tr>
            <td>trigger_on</td>
            <td>click</td>
            <td>The DOM event that opens the popover.<br />
                <code class="inline">click</code> <code class="inline">mouseover</code></td>
        </tr>
        <tr>
            <td>position</td>
            <td>bottom</td>
            <td>Where the panel appears relative to the trigger.<br />
                <code class="inline">top</code> <code class="inline">bottom</code> <code class="inline">left</code> <code class="inline">right</code></td>
        </tr>
        <tr>
            <td>title</td>
            <td><em>blank</em></td>
            <td>Optional heading displayed above the popover content, separated by a border.</td>
        </tr>
        <tr>
            <td>width</td>
            <td>280</td>
            <td>Width of the popover panel in pixels. Must be a numeric value.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional CSS classes to apply to the popover panel container.</td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>CSP nonce value applied to the inline script tags. You can set a global default in <code class="inline">config/bladewind.php</code> under the <code class="inline">script.nonce</code> key.</td>
        </tr>
        <tr>
            <td>modular</td>
            <td>false</td>
            <td>Appends <code class="inline">type="module"</code> to the inline script tags.<br />
                <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
    </x-bladewind::table>

    <h3 class="pb-2">Popover with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::popover
                name="user-menu"
                trigger="ellipsis-vertical-icon"
                trigger_on="click"
                position="bottom"
                title="User Actions"
                width="300"
                class="rounded-lg"&gt;
                &lt;ul class="space-y-2 text-sm"&gt;
                    &lt;li&gt;&lt;a href="#"&gt;Edit&lt;/a&gt;&lt;/li&gt;
                    &lt;li&gt;&lt;a href="#"&gt;Delete&lt;/a&gt;&lt;/li&gt;
                &lt;/ul&gt;
            &lt;/x-bladewind::popover&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; popover &gt; index.blade.php</code>
    </x-bladewind::alert>
    <p>&nbsp;</p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#trigger">Trigger icon</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#custom-trigger">Custom trigger</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#title">Title</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#position">Position</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#trigger-on">Trigger event</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#width">Width</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-popover');
        </script>
    </x-slot>
</x-app>
