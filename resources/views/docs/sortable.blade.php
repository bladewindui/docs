<x-app>
    <x-slot:title>Sortable Component</x-slot:title>
    <x-slot:page_title>Sortable</x-slot:page_title>

    <p>
        Display a drag-and-drop sortable list, powered by <a href="https://sortablejs.github.io/Sortable/" target="_blank">SortableJS</a>.
        Wrap a set of <code class="inline">&lt;x-bladewind::sortable.item&gt;</code> elements with <code class="inline">&lt;x-bladewind::sortable&gt;</code>
        to let users drag and reorder them with the mouse or touch.
    </p>

    <x-bladewind::sortable>
        <x-bladewind::sortable.item>Tomatoes</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Onions</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Garlic</x-bladewind::sortable.item>
    </x-bladewind::sortable>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::sortable&gt;
                &lt;x-bladewind::sortable.item&gt;Tomatoes&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Onions&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Garlic&lt;/x-bladewind::sortable.item&gt;
            &lt;/x-bladewind::sortable&gt;
        </code>
    </pre>

    <h2 id="drag-handle">Drag Handle</h2>
    <p>
        By default the entire item surface is draggable. If your list items contain interactive elements (links, buttons, inputs),
        set <code class="inline text-red-500">hasHandle="true"</code> to restrict dragging to a dedicated handle icon instead.
        Customise the icon with <code class="inline text-red-500">handleIcon</code> — any Heroicon name.
    </p>

    <x-bladewind::sortable hasHandle="true">
        <x-bladewind::sortable.item>Tomatoes</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Onions</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Garlic</x-bladewind::sortable.item>
    </x-bladewind::sortable>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::sortable hasHandle="true"&gt;
                &lt;x-bladewind::sortable.item&gt;Tomatoes&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Onions&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Garlic&lt;/x-bladewind::sortable.item&gt;
            &lt;/x-bladewind::sortable&gt;
        </code>
    </pre>
    <p>
        Use <code class="inline text-red-500">handleIcon="ellipsis-vertical"</code> (or any other Heroicon name) to change the handle icon.
    </p>

    <h2 id="shared-lists">Sharing Items Between Lists</h2>
    <p>
        Set <code class="inline text-red-500">type="shared"</code> and give two or more lists the same <code class="inline text-red-500">group</code>
        name to let users drag items from one list into another. Lists with <code class="inline">type="simple"</code> (the default) are
        isolated — items can only be reordered within the same list.
    </p>

    <div class="grid grid-cols-2 gap-6">
        <x-bladewind::sortable type="shared" group="fruits">
            <x-bladewind::sortable.item>Apple</x-bladewind::sortable.item>
            <x-bladewind::sortable.item>Mango</x-bladewind::sortable.item>
        </x-bladewind::sortable>
        <x-bladewind::sortable type="shared" group="fruits">
            <x-bladewind::sortable.item>Banana</x-bladewind::sortable.item>
        </x-bladewind::sortable>
    </div>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::sortable type="shared" group="fruits"&gt;
                &lt;x-bladewind::sortable.item&gt;Apple&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Mango&lt;/x-bladewind::sortable.item&gt;
            &lt;/x-bladewind::sortable&gt;

            &lt;x-bladewind::sortable type="shared" group="fruits"&gt;
                &lt;x-bladewind::sortable.item&gt;Banana&lt;/x-bladewind::sortable.item&gt;
            &lt;/x-bladewind::sortable&gt;
        </code>
    </pre>
    <p>
        Set <code class="inline text-red-500">clone="true"</code> on a shared list if you want dragging an item into another list to leave
        a copy behind instead of moving it.
    </p>

    <h2 id="multidrag">Multi-select Drag</h2>
    <p>
        Set <code class="inline text-red-500">multidrag="true"</code> to let users <kbd>Ctrl</kbd> / <kbd>Cmd</kbd> + click to select
        several items and drag them together as a group.
    </p>

    <x-bladewind::sortable multidrag="true">
        <x-bladewind::sortable.item>Tomatoes</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Onions</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Garlic</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Peppers</x-bladewind::sortable.item>
    </x-bladewind::sortable>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::sortable multidrag="true"&gt;
                &lt;x-bladewind::sortable.item&gt;Tomatoes&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Onions&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Garlic&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Peppers&lt;/x-bladewind::sortable.item&gt;
            &lt;/x-bladewind::sortable&gt;
        </code>
    </pre>
    <x-bladewind::alert type="info" show_close_icon="false">
        <code class="inline">multidrag</code> and <code class="inline">swap</code> cannot be combined — if both are set, <code class="inline">multidrag</code> takes priority.
    </x-bladewind::alert>

    <h2 id="swap">Swap Mode</h2>
    <p>
        Set <code class="inline text-red-500">swap="true"</code> to swap the dropped item with the item it lands on, instead of shifting
        every item in between. Useful for grid layouts where you only want to exchange two positions.
    </p>

    <x-bladewind::sortable swap="true">
        <x-bladewind::sortable.item>Tomatoes</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Onions</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Garlic</x-bladewind::sortable.item>
    </x-bladewind::sortable>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::sortable swap="true"&gt;
                &lt;x-bladewind::sortable.item&gt;Tomatoes&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Onions&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Garlic&lt;/x-bladewind::sortable.item&gt;
            &lt;/x-bladewind::sortable&gt;
        </code>
    </pre>

    <h2 id="filter">Locking Individual Items</h2>
    <p>
        Some items in a list may need to stay put. Add a CSS class to the items you want to lock, then pass that class name to the
        <code class="inline text-red-500">filter</code> attribute on the parent list (space or comma separated for multiple classes).
    </p>

    <x-bladewind::sortable filter="locked">
        <x-bladewind::sortable.item class="locked bg-slate-50 dark:bg-dark-700">Tomatoes (locked)</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Onions</x-bladewind::sortable.item>
        <x-bladewind::sortable.item>Garlic</x-bladewind::sortable.item>
    </x-bladewind::sortable>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::sortable filter="locked"&gt;
                &lt;x-bladewind::sortable.item class="locked"&gt;Tomatoes (locked)&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Onions&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item&gt;Garlic&lt;/x-bladewind::sortable.item&gt;
            &lt;/x-bladewind::sortable&gt;
        </code>
    </pre>

    <h2 id="disable-sort">Disabling Sorting</h2>
    <p>
        Set <code class="inline text-red-500">sortable="false"</code> to disable reordering entirely within a list while still allowing
        the list to participate as a shared drop target, or simply to render a static list using the same markup as a regular sortable list.
    </p>

    <h2 id="save-order">Submitting &amp; Saving the Order</h2>
    <p>
        Reordering happens in the browser, so to persist the new order you need to capture it. Give each
        <code class="inline">&lt;x-bladewind::sortable.item&gt;</code> a <code class="inline text-red-500">value</code> (rendered as
        <code class="inline">data-id</code> — typically your model id), then choose one of the approaches below.
    </p>

    <h3 class="pb-2">Submitting with a form</h3>
    <p>
        Add the <code class="inline text-red-500">inputName</code> attribute to the list. The component renders a hidden
        <code class="inline">&lt;input&gt;</code> with that name and keeps it in sync with the current order as a JSON array of each item's
        <code class="inline">value</code>. It submits with the rest of your form like any other field.
    </p>
    <pre class="language-markup line-numbers">
        <code>
            &lt;form method="post" action="/tasks/reorder"&gt;
                @@csrf
                &lt;x-bladewind::sortable inputName="task_order" hasHandle="true"&gt;
                    @@foreach($tasks as $task)
                        &lt;x-bladewind::sortable.item value="@{{ $task->id }}"&gt;@{{ $task->title }}&lt;/x-bladewind::sortable.item&gt;
                    @@endforeach
                &lt;/x-bladewind::sortable&gt;
                &lt;x-bladewind::button can_submit="true" label="Save order" /&gt;
            &lt;/form&gt;
        </code>
    </pre>
    <p>On the server the field arrives as a JSON array of ids in their new order:</p>
    <pre class="language-php line-numbers">
        <code>
            $order = json_decode($request->input('task_order')); // ["30", "10", "20"]

            foreach ($order as $position =&gt; $id) {
                Task::where('id', $id)-&gt;update(['position' =&gt; $position]);
            }
        </code>
    </pre>

    <h3 class="pb-2">Saving with AJAX</h3>
    <p>
        To save without submitting a form, point the <code class="inline text-red-500">onSorted</code> attribute at a JavaScript function.
        It is called after every reorder with the current order array and the original event.
    </p>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::sortable onSorted="saveOrder"&gt;
                @@foreach($tasks as $task)
                    &lt;x-bladewind::sortable.item value="@{{ $task->id }}"&gt;@{{ $task->title }}&lt;/x-bladewind::sortable.item&gt;
                @@endforeach
            &lt;/x-bladewind::sortable&gt;
        </code>
    </pre>
    <pre class="language-js line-numbers">
        <code>
            function saveOrder(order, event) {
                fetch('/tasks/reorder', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ task_order: order })
                });
            }
        </code>
    </pre>
    <x-bladewind::alert type="info" show_close_icon="false">
        Each list is also exposed as a JavaScript variable named after its <code class="inline">name</code>, so you can call SortableJS
        methods directly — for example <code class="inline">ingredients.toArray()</code> returns the current order at any time.
    </x-bladewind::alert>
    <x-bladewind::alert show_close_icon="false">
        <code class="inline">toArray()</code> only reports items that have a <code class="inline">value</code>, so give every item you intend to
        persist a <code class="inline">value</code>.
    </x-bladewind::alert>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Sortable component.</p>
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
            <td>Unique name for the list, used as the CSS hook and JS variable name. A random name is generated if none is provided.</td>
        </tr>
        <tr>
            <td>type</td>
            <td>simple</td>
            <td>
                <code class="inline">simple</code> lists only sort within themselves.<br />
                <code class="inline">shared</code> lists can exchange items with other lists in the same <code class="inline">group</code>.
            </td>
        </tr>
        <tr>
            <td>group</td>
            <td>null</td>
            <td>Group name used by <code class="inline">shared</code> lists. Lists sharing the same group name can exchange items. Ignored for <code class="inline">simple</code> lists.</td>
        </tr>
        <tr>
            <td>clone</td>
            <td>false</td>
            <td>Leave a copy behind when dragging an item into another (shared) list instead of moving it.<br />
                <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>sortable</td>
            <td>true</td>
            <td>Enable or disable sorting of items within the list.<br />
                <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>hasHandle</td>
            <td>false</td>
            <td>Drag items by a dedicated handle instead of the whole item surface.<br />
                <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>handleIcon</td>
            <td>bars-3</td>
            <td>Heroicon name used for the drag handle when <code class="inline">hasHandle</code> is <code class="inline">true</code>.</td>
        </tr>
        <tr>
            <td>filter</td>
            <td>null</td>
            <td>Space or comma separated class names whose items cannot be dragged, e.g. <code class="inline">filter="locked pinned"</code>.</td>
        </tr>
        <tr>
            <td>multidrag</td>
            <td>false</td>
            <td>Select (Ctrl/Cmd + click) and drag multiple items at once.<br />
                <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>swap</td>
            <td>false</td>
            <td>Swap items on drop instead of shifting them. Not combinable with <code class="inline">multidrag</code> — <code class="inline">multidrag</code> wins if both are set.<br />
                <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>animation</td>
            <td>150</td>
            <td>Reorder animation duration in milliseconds. Set to <code class="inline">0</code> to disable the animation.</td>
        </tr>
        <tr>
            <td>inputName</td>
            <td>null</td>
            <td>Renders a hidden <code class="inline">&lt;input&gt;</code> with this name, kept in sync with the order as a JSON array of each item's <code class="inline">value</code>. Submit it with your form.</td>
        </tr>
        <tr>
            <td>onSorted</td>
            <td>null</td>
            <td>Name of a JavaScript function called after every reorder as <code class="inline">(order, event)</code>. Useful for saving via AJAX.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional CSS classes to apply to the list (<code class="inline">&lt;ul&gt;</code>) element.</td>
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

    <p>&nbsp;</p>
    <h3 class="pb-2">Sortable Item Attributes</h3>
    <p>
        <code class="inline">&lt;x-bladewind::sortable.item&gt;</code> accepts a <code class="inline text-red-500">value</code> attribute and a
        <code class="inline text-red-500">class</code> attribute. The <code class="inline">value</code> (rendered as
        <code class="inline">data-id</code>) is the identifier reported when capturing the list order — see
        <a href="#save-order">Submitting &amp; Saving the Order</a>. The <code class="inline">class</code> attribute is for any additional CSS
        you wish to apply to the item (<code class="inline">&lt;li&gt;</code>) element. The handle icon shown inside an item is inherited from
        the parent <code class="inline">&lt;x-bladewind::sortable&gt;</code>'s <code class="inline">hasHandle</code> and
        <code class="inline">handleIcon</code> attributes — you don't set those on the item itself.
    </p>

    <h3 class="pb-2">Sortable with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::sortable
                name="ingredients"
                type="shared"
                group="kitchen"
                clone="false"
                sortable="true"
                hasHandle="true"
                handleIcon="bars-3"
                filter="locked"
                multidrag="false"
                swap="false"
                animation="200"
                inputName="ingredient_order"
                onSorted="saveOrder"&gt;
                &lt;x-bladewind::sortable.item value="1"&gt;Tomatoes&lt;/x-bladewind::sortable.item&gt;
                &lt;x-bladewind::sortable.item value="2" class="locked"&gt;Onions&lt;/x-bladewind::sortable.item&gt;
            &lt;/x-bladewind::sortable&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; sortable &gt; index.blade.php</code>
    </x-bladewind::alert>
    <p>&nbsp;</p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#drag-handle">Drag handle</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#shared-lists">Sharing items between lists</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#multidrag">Multi-select drag</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#swap">Swap mode</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#filter">Locking individual items</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#disable-sort">Disabling sorting</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#save-order">Submitting &amp; saving the order</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-sortable');
        </script>
    </x-slot>
</x-app>
