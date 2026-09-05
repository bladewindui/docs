<x-app>
    <x-slot:title>Context Menu Component</x-slot:title>
    <x-slot:page_title>Context Menu</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::context-menu</code> gives any region a right-click action menu — a table
        row, a card, a canvas element, anything. It follows the same visual language as
        <a href="/component/dropmenu">Dropmenu</a>, but opens at the pointer instead of anchored to a trigger, and
        adds nested submenus, disabled items, and separators. Placement is always viewport-aware: the menu (and any
        submenu) flips away from whichever edge it would otherwise overflow.
    </p>

    <div class="rounded-lg border border-dashed border-slate-300 dark:border-dark-600 p-8 text-center text-slate-500 dark:text-dark-400">
        <x-bladewind::context-menu name="basicMenu">
            <x-slot:region>
                <div class="select-none">Right-click anywhere in this box</div>
            </x-slot:region>

            <x-bladewind::context-menu.item icon="pencil-square">Edit</x-bladewind::context-menu.item>
            <x-bladewind::context-menu.item icon="document-duplicate">Duplicate</x-bladewind::context-menu.item>
            <x-bladewind::context-menu.item divider="true" />
            <x-bladewind::context-menu.item icon="trash" tone="danger">Delete</x-bladewind::context-menu.item>
        </x-bladewind::context-menu>
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::context-menu name="basicMenu"&gt;
                &lt;x-slot:region&gt;
                    &lt;div&gt;Right-click anywhere in this box&lt;/div&gt;
                &lt;/x-slot:region&gt;

                &lt;x-bladewind::context-menu.item icon="pencil-square"&gt;Edit&lt;/x-bladewind::context-menu.item&gt;
                &lt;x-bladewind::context-menu.item icon="document-duplicate"&gt;Duplicate&lt;/x-bladewind::context-menu.item&gt;
                &lt;x-bladewind::context-menu.item divider="true" /&gt;
                &lt;x-bladewind::context-menu.item icon="trash" tone="danger"&gt;Delete&lt;/x-bladewind::context-menu.item&gt;
            &lt;/x-bladewind::context-menu&gt;
        </code>
    </pre>
    <p>
        The <code class="inline">region</code> slot is the area that responds to a right-click (or the keyboard
        context-menu key — both dispatch the same browser <code class="inline">contextmenu</code> event, so no
        separate keyboard wiring is needed to trigger it). Every other child is a menu item, in the order they should
        appear.
    </p>

    <h2 id="disabled">Disabled items</h2>
    <p>
        Set <code class="inline">disabled="true"</code> on an item to grey it out and remove it from pointer and
        keyboard interaction entirely — it is skipped by arrow-key navigation and cannot be clicked or activated.
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::context-menu.item icon="lock-closed" disabled="true"&gt;Restricted action&lt;/x-bladewind::context-menu.item&gt;
        </code>
    </pre>

    <h2 id="tone">Tone</h2>
    <p>
        <code class="inline">tone="danger"</code> tints an item's label and icon red, for destructive actions like
        the Delete item above. The default is <code class="inline">normal</code>.
    </p>

    <h2 id="submenus">Nested submenus</h2>
    <p>
        Give an item a <code class="inline">submenu</code> slot containing further
        <code class="inline">x-bladewind::context-menu.item</code> elements to turn it into a submenu trigger. A
        submenu opens on hover, click, or <code class="inline">→</code>, and can itself contain another submenu —
        nesting is unlimited. <code class="inline">←</code> or <code class="inline">Escape</code> closes the deepest
        open submenu and returns focus to its parent item.
    </p>

    <div class="rounded-lg border border-dashed border-slate-300 dark:border-dark-600 p-8 text-center text-slate-500 dark:text-dark-400">
        <x-bladewind::context-menu name="submenuExample">
            <x-slot:region>
                <div class="select-none">Right-click for a submenu</div>
            </x-slot:region>

            <x-bladewind::context-menu.item icon="folder-plus">
                New
                <x-slot:submenu>
                    <x-bladewind::context-menu.item icon="document">File</x-bladewind::context-menu.item>
                    <x-bladewind::context-menu.item icon="folder">Folder</x-bladewind::context-menu.item>
                </x-slot:submenu>
            </x-bladewind::context-menu.item>
            <x-bladewind::context-menu.item icon="pencil-square">Rename</x-bladewind::context-menu.item>
        </x-bladewind::context-menu>
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::context-menu.item icon="folder-plus"&gt;
                New
                &lt;x-slot:submenu&gt;
                    &lt;x-bladewind::context-menu.item icon="document"&gt;File&lt;/x-bladewind::context-menu.item&gt;
                    &lt;x-bladewind::context-menu.item icon="folder"&gt;Folder&lt;/x-bladewind::context-menu.item&gt;
                &lt;/x-slot:submenu&gt;
            &lt;/x-bladewind::context-menu.item&gt;
        </code>
    </pre>

    <h2 id="keyboard">Keyboard support</h2>
    <x-bladewind::table hover_effect="false" divider="thin">
        <tr>
            <td><code class="inline">↓</code> / <code class="inline">↑</code></td>
            <td>Move focus to the next or previous enabled item.</td>
        </tr>
        <tr>
            <td><code class="inline">→</code></td>
            <td>Open the focused item's submenu, if it has one.</td>
        </tr>
        <tr>
            <td><code class="inline">←</code></td>
            <td>Close the current submenu and refocus its parent item.</td>
        </tr>
        <tr>
            <td><code class="inline">Enter</code> / <code class="inline">Space</code></td>
            <td>Activate the focused item, or open its submenu.</td>
        </tr>
        <tr>
            <td><code class="inline">Home</code> / <code class="inline">End</code></td>
            <td>Jump to the first or last enabled item.</td>
        </tr>
        <tr>
            <td><code class="inline">Escape</code></td>
            <td>Close the current submenu, or the whole menu if none is open.</td>
        </tr>
    </x-bladewind::table>

    <h2 id="attributes">Full List Of Attributes</h2>
    <h3>Context Menu</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td><em>auto-generated</em></td>
            <td>Uniquely identifies this instance in the DOM and its JavaScript.</td>
        </tr>
        <tr>
            <td>disableNative</td>
            <td>true</td>
            <td>false lets the browser's own context menu show and disables this component entirely — useful for turning the feature off conditionally.</td>
        </tr>
        <tr>
            <td>padded</td>
            <td>true</td>
            <td>Padding inside the menu list.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the menu list.</td>
        </tr>
    </x-bladewind::table>

    <h3>Context Menu Item</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>icon</td>
            <td><em>(blank)</em></td>
            <td>Any <a href="https://heroicons.com/" target="_blank">Heroicons</a> name.</td>
        </tr>
        <tr>
            <td>disabled</td>
            <td>false</td>
            <td>Greys the item out and removes it from pointer and keyboard interaction.</td>
        </tr>
        <tr>
            <td>tone</td>
            <td>normal</td>
            <td><code class="inline">normal</code> | <code class="inline">danger</code></td>
        </tr>
        <tr>
            <td>divider</td>
            <td>false</td>
            <td>Renders a separator line instead of an item; ignores every other prop.</td>
        </tr>
        <tr>
            <td>submenu</td>
            <td><em>(none)</em></td>
            <td>A named slot of further items, turning this item into a submenu trigger.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > context-menu > index.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > context-menu > item.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#disabled">Disabled items</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#tone">Tone</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#submenus">Nested submenus</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#keyboard">Keyboard support</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-context-menu');
        </script>
    </x-slot>
</x-app>
