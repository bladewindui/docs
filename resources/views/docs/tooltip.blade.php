<x-app>
    <x-slot:title>Tooltip Component</x-slot:title>
    <x-slot:page_title>Tooltip</x-slot:page_title>

    <p>
        Display a small contextual bubble when a user hovers over an element.
        The tooltip component is a pure CSS wrapper — no JavaScript is required.
        Wrap any element with <code class="inline">&lt;x-bladewind::tooltip&gt;</code> and pass the message via the <code class="inline text-red-500">text</code> attribute.
    </p>

    <x-bladewind::tooltip text="This is a tooltip">
        <x-bladewind::button>Hover over me</x-bladewind::button>
    </x-bladewind::tooltip>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tooltip text="This is a tooltip"&gt;
                &lt;x-bladewind::button&gt;Hover over me&lt;/x-bladewind::button&gt;
            &lt;/x-bladewind::tooltip&gt;
        </code>
    </pre>

    <p>
        Any element can be wrapped — a button, an icon, a link, a table cell, or plain text.
        The tooltip bubble appears on hover and disappears when the cursor leaves.
    </p>

    <x-bladewind::tooltip text="View user profile">
        <x-bladewind::icon name="user-circle" class="size-6 text-slate-500 cursor-pointer" />
    </x-bladewind::tooltip>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tooltip text="View user profile"&gt;
                &lt;x-bladewind::icon name="user-circle" class="size-6 text-slate-500 cursor-pointer" /&gt;
            &lt;/x-bladewind::tooltip&gt;
        </code>
    </pre>

    <h2 id="position">Position</h2>
    <p>
        The tooltip bubble can appear above, below, to the left, or to the right of the wrapped element.
        Set the <code class="inline text-red-500">position</code> attribute to control where the bubble appears.
        The default is <code class="inline">top</code>.
    </p>

    <div class="flex items-center gap-6 py-4">
        <x-bladewind::tooltip text="Appears on top" position="top">
            <x-bladewind::button size="small">top</x-bladewind::button>
        </x-bladewind::tooltip>
        <x-bladewind::tooltip text="Appears on the right" position="right">
            <x-bladewind::button size="small">right</x-bladewind::button>
        </x-bladewind::tooltip>
        <x-bladewind::tooltip text="Appears at the bottom" position="bottom">
            <x-bladewind::button size="small">bottom</x-bladewind::button>
        </x-bladewind::tooltip>
        <x-bladewind::tooltip text="Appears on the left" position="left">
            <x-bladewind::button size="small">left</x-bladewind::button>
        </x-bladewind::tooltip>
    </div>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tooltip text="Appears on top" position="top"&gt;...&lt;/x-bladewind::tooltip&gt;
            &lt;x-bladewind::tooltip text="Appears on the right" position="right"&gt;...&lt;/x-bladewind::tooltip&gt;
            &lt;x-bladewind::tooltip text="Appears at the bottom" position="bottom"&gt;...&lt;/x-bladewind::tooltip&gt;
            &lt;x-bladewind::tooltip text="Appears on the left" position="left"&gt;...&lt;/x-bladewind::tooltip&gt;
        </code>
    </pre>

    <h2 id="colour">Colour</h2>
    <p>
        Tooltips come in two colour themes: <code class="inline">dark</code> (default) and <code class="inline">light</code>.
        The dark theme uses a slate-800 background with white text.
        The light theme uses a white background with a border, shadow, and slate-600 text — both adapt correctly in dark mode.
    </p>

    <div class="flex items-center gap-6 py-4">
        <x-bladewind::tooltip text="I am dark (default)" color="dark">
            <x-bladewind::button size="small">dark</x-bladewind::button>
        </x-bladewind::tooltip>
        <x-bladewind::tooltip text="I am light" color="light">
            <x-bladewind::button size="small">light</x-bladewind::button>
        </x-bladewind::tooltip>
    </div>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tooltip text="I am dark (default)" color="dark"&gt;...&lt;/x-bladewind::tooltip&gt;
            &lt;x-bladewind::tooltip text="I am light" color="light"&gt;...&lt;/x-bladewind::tooltip&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Tooltip component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true" has_shadow="false">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>text</td>
            <td><em>blank</em></td>
            <td>The message to display inside the tooltip bubble. No bubble is rendered when this is empty.</td>
        </tr>
        <tr>
            <td>position</td>
            <td>top</td>
            <td>Where the bubble appears relative to the wrapped element.<br />
                <code class="inline">top</code> <code class="inline">bottom</code> <code class="inline">left</code> <code class="inline">right</code></td>
        </tr>
        <tr>
            <td>color</td>
            <td>dark</td>
            <td>Colour theme for the bubble background.<br />
                <code class="inline">dark</code> <code class="inline">light</code></td>
        </tr>
        <tr>
            <td>size</td>
            <td>small</td>
            <td>Controls the text size and padding inside the bubble.<br />
                <code class="inline">tiny</code> <code class="inline">small</code> <code class="inline">regular</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional CSS classes to apply to the tooltip wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <h3 class="pb-2">Tooltip with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tooltip
                text="Delete this record"
                position="right"
                color="light"
                size="regular"
                class="ml-2"&gt;
                &lt;x-bladewind::icon name="trash" class="size-5 text-red-500 cursor-pointer" /&gt;
            &lt;/x-bladewind::tooltip&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; tooltip.blade.php</code>
    </x-bladewind::alert>
    <p>&nbsp;</p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#position">Position</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#colour">Colour</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#size">Size</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-tooltip');
        </script>
    </x-slot>
</x-app>
