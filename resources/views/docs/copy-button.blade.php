<x-app>
    <x-slot:title>Copy Button Component</x-slot:title>
    <x-slot:page_title>Copy Button</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::copy-button</code> copies a value — or its own wrapped content — to the
        clipboard on click, briefly swapping its icon to a checkmark and announcing success or failure to assistive
        technology.
    </p>

    <div class="flex items-center gap-2 rounded-lg border border-gray-200 dark:border-dark-600 px-3 py-2 font-mono text-sm w-fit">
        <x-bladewind::copy-button>npm install bladewindui</x-bladewind::copy-button>
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::copy-button&gt;npm install bladewindui&lt;/x-bladewind::copy-button&gt;
        </code>
    </pre>
    <p>
        With no <code class="inline">value</code>, the button copies its own slot's trimmed text — the display and
        the copied value never drift apart because there is only one string to keep in sync.
    </p>

    <h2 id="icon-only">Icon-only, with an explicit value</h2>
    <p>
        Pass <code class="inline">value</code> directly for an icon-only trigger next to something that isn't itself
        plain copyable text — a masked API key, a formatted table cell, and so on.
    </p>

    <div class="flex items-center gap-2">
        <code class="text-sm">sk_live_••••••••1234</code>
        <x-bladewind::copy-button value="sk_live_a1b2c3d4e5f61234" copy-label="Copy API key"/>
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;code&gt;sk_live_••••••••1234&lt;/code&gt;
            &lt;x-bladewind::copy-button value="sk_live_a1b2c3d4e5f61234" copy-label="Copy API key" /&gt;
        </code>
    </pre>

    <h2 id="labelled">A labelled button</h2>
    <p>
        Add <code class="inline">label</code> for a full text-and-icon button instead of an icon-only trigger — only
        takes effect when there is no wrapped slot content.
    </p>

    <x-bladewind::copy-button value="1234-5678-9012" label="Copy code"/>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::copy-button value="1234-5678-9012" label="Copy code" /&gt;
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
            <td>value</td>
            <td><em>(none)</em></td>
            <td>Text to copy. Defaults to the default slot's trimmed text.</td>
        </tr>
        <tr>
            <td>label</td>
            <td><em>(blank)</em></td>
            <td>Text label on the button. Ignored when the slot has content.</td>
        </tr>
        <tr>
            <td>copyLabel</td>
            <td>Copy</td>
            <td>Accessible label for the trigger button.</td>
        </tr>
        <tr>
            <td>copiedMessage</td>
            <td>Copied</td>
            <td>Announced to screen readers after a successful copy.</td>
        </tr>
        <tr>
            <td>failedMessage</td>
            <td>Could not copy</td>
            <td>Announced to screen readers if the copy fails.</td>
        </tr>
        <tr>
            <td>timeout</td>
            <td>1500</td>
            <td>Milliseconds before the success icon reverts to the default clipboard icon.</td>
        </tr>
        <tr>
            <td>size</td>
            <td>small</td>
            <td><code class="inline">tiny</code> | <code class="inline">small</code> | <code class="inline">regular</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > copy-button.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#icon-only">Icon-only, with an explicit value</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#labelled">A labelled button</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-copy-button');
        </script>
    </x-slot>
</x-app>
