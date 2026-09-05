<x-app>
    <x-slot:title>Keyboard Key Component</x-slot:title>
    <x-slot:page_title>Keyboard Key</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::kbd</code> renders a semantic <code class="inline">&lt;kbd&gt;</code>
        element styled as a physical key — for documenting a shortcut in help text, a menu item, or command
        documentation.
    </p>

    <p class="text-sm text-gray-600 dark:text-dark-300">Press <x-bladewind::kbd>Esc</x-bladewind::kbd> to close.</p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;p&gt;Press &lt;x-bladewind::kbd&gt;Esc&lt;/x-bladewind::kbd&gt; to close.&lt;/p&gt;
        </code>
    </pre>

    <h2 id="combos">Key combinations</h2>
    <p>
        Pass <code class="inline">keys</code> as an array (or JSON string) to render a combo — each key in its own
        pill, joined by "+". When <code class="inline">keys</code> is given, it takes priority over the default slot.
    </p>

    <p class="text-sm text-gray-600 dark:text-dark-300 flex items-center gap-2">
        Open the command palette with <x-bladewind::kbd :keys="['Ctrl', 'K']" />
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::kbd :keys="['Ctrl', 'K']" /&gt;
        </code>
    </pre>

    <h2 id="sizes">Sizes</h2>
    <p>Set <code class="inline">size</code> to <code class="inline">tiny</code>, <code class="inline">small</code> (default), or <code class="inline">regular</code>.</p>

    <div class="flex items-center gap-3">
        <x-bladewind::kbd size="tiny">Tab</x-bladewind::kbd>
        <x-bladewind::kbd size="small">Tab</x-bladewind::kbd>
        <x-bladewind::kbd size="regular">Tab</x-bladewind::kbd>
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::kbd size="tiny"&gt;Tab&lt;/x-bladewind::kbd&gt;
            &lt;x-bladewind::kbd size="small"&gt;Tab&lt;/x-bladewind::kbd&gt;
            &lt;x-bladewind::kbd size="regular"&gt;Tab&lt;/x-bladewind::kbd&gt;
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
            <td>keys</td>
            <td><em>(none)</em></td>
            <td>Array or JSON string of key labels for a combo. Takes priority over the default slot.</td>
        </tr>
        <tr>
            <td>size</td>
            <td>small</td>
            <td><code class="inline">tiny</code> | <code class="inline">small</code> | <code class="inline">regular</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the key (or the combo's wrapper, when using <code class="inline">keys</code>).</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > kbd.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#combos">Key combinations</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sizes">Sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-kbd');
        </script>
    </x-slot>
</x-app>
