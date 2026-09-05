<x-app>
    <x-slot:title>Transfer List Component</x-slot:title>
    <x-slot:page_title>Transfer List</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::transfer-list</code> moves items between two panels — "Available" and
        "Selected" — with per-panel search and select-all, arrow controls in the middle, and a double-click on any
        row as a shortcut for moving just that one item. It submits as a normal array field: only items currently in
        the "Selected" panel are enabled, so the form only ever sends what is actually selected.
    </p>

    <x-bladewind::transfer-list
        name="roles"
        :items="[
            ['value' => 1, 'label' => 'Editor'],
            ['value' => 2, 'label' => 'Viewer'],
            ['value' => 3, 'label' => 'Admin'],
            ['value' => 4, 'label' => 'Billing Manager'],
            ['value' => 5, 'label' => 'Support Agent'],
        ]"
        :selected="[2]"
    />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::transfer-list
                name="roles"
                :items="[
                    ['value' => 1, 'label' => 'Editor'],
                    ['value' => 2, 'label' => 'Viewer'],
                    ['value' => 3, 'label' => 'Admin'],
                    ['value' => 4, 'label' => 'Billing Manager'],
                    ['value' => 5, 'label' => 'Support Agent'],
                ]"
                :selected="[2]"
            /&gt;
        </code>
    </pre>
    <p>
        <code class="inline">items</code> accepts an array or a JSON string; each item needs at least a
        <code class="inline">value</code> and a <code class="inline">label</code> key (override the key names with
        <code class="inline">valueKey</code>/<code class="inline">labelKey</code>, exactly like <a href="/component/select">Select</a>).
        <code class="inline">selected</code> lists which values start in the right-hand panel. On submit, this
        example sends <code class="inline">roles[]</code> for every item currently on the right.
    </p>

    <h2 id="keys">Custom value/label keys</h2>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::transfer-list
                name="roles"
                :items="[['id' => 1, 'name' => 'Editor'], ['id' => 2, 'name' => 'Viewer']]"
                value-key="id"
                label-key="name"
            /&gt;
        </code>
    </pre>

    <h2 id="labels">Panel labels and size</h2>
    <p>
        Override the panel headings with <code class="inline">availableLabel</code>/<code class="inline">selectedLabel</code>,
        and each panel's height (in pixels) with <code class="inline">height</code>.
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::transfer-list
                name="roles"
                :items="$items"
                available-label="Not assigned"
                selected-label="Assigned"
                height="180"
            /&gt;
        </code>
    </pre>

    <h2 id="search">Search</h2>
    <p>
        Each panel gets its own search box by default, filtering that panel's rows as you type. Set
        <code class="inline">searchable="false"</code> to remove both boxes — worth doing once a list is short enough
        that scanning it is faster than typing.
    </p>

    <h2 id="attributes">Full List Of Attributes</h2>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td><em>auto-generated</em></td>
            <td>Field name the selected values submit under, as <code class="inline">name[]</code>.</td>
        </tr>
        <tr>
            <td>items</td>
            <td><em>[]</em></td>
            <td>Array or JSON string of items, each with a value and a label key.</td>
        </tr>
        <tr>
            <td>valueKey</td>
            <td>value</td>
            <td>Key read as each item's value.</td>
        </tr>
        <tr>
            <td>labelKey</td>
            <td>label</td>
            <td>Key read as each item's display label.</td>
        </tr>
        <tr>
            <td>selected</td>
            <td><em>[]</em></td>
            <td>Values that start in the "Selected" panel.</td>
        </tr>
        <tr>
            <td>availableLabel</td>
            <td>Available</td>
            <td>Left panel heading.</td>
        </tr>
        <tr>
            <td>selectedLabel</td>
            <td>Selected</td>
            <td>Right panel heading.</td>
        </tr>
        <tr>
            <td>searchable</td>
            <td>true</td>
            <td>Shows a per-panel search box.</td>
        </tr>
        <tr>
            <td>height</td>
            <td>260</td>
            <td>Height, in pixels, of each panel.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > transfer-list.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#keys">Custom value/label keys</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#labels">Panel labels and size</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#search">Search</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-transfer-list');
        </script>
    </x-slot>
</x-app>
