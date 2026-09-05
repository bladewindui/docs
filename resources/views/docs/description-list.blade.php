<x-app>
    <x-slot:title>Description List Component</x-slot:title>
    <x-slot:page_title>Description List</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::description-list</code> and
        <code class="inline">x-bladewind::description-list.item</code> present label/value pairs — a profile, a
        record's details, an order summary — as a real semantic <code class="inline">&lt;dl&gt;</code>, stacked on
        mobile and laid out label-beside-value from the <code class="inline">sm</code> breakpoint up.
    </p>

    <x-bladewind::description-list>
        <x-bladewind::description-list.item label="Full name">Jane Cooper</x-bladewind::description-list.item>
        <x-bladewind::description-list.item label="Email address">jane.cooper@example.com</x-bladewind::description-list.item>
        <x-bladewind::description-list.item label="Role">Admin</x-bladewind::description-list.item>
    </x-bladewind::description-list>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::description-list&gt;
                &lt;x-bladewind::description-list.item label="Full name"&gt;Jane Cooper&lt;/x-bladewind::description-list.item&gt;
                &lt;x-bladewind::description-list.item label="Email address"&gt;jane.cooper@example.com&lt;/x-bladewind::description-list.item&gt;
                &lt;x-bladewind::description-list.item label="Role"&gt;Admin&lt;/x-bladewind::description-list.item&gt;
            &lt;/x-bladewind::description-list&gt;
        </code>
    </pre>

    <h2 id="actions">Action slots</h2>
    <p>
        Give an item an <code class="inline">action</code> slot for a control shown beside its value — an edit link,
        a copy button, anything.
    </p>

    <x-bladewind::description-list>
        <x-bladewind::description-list.item label="Email address">
            jane.cooper@example.com
            <x-slot:action>
                <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Edit</a>
            </x-slot:action>
        </x-bladewind::description-list.item>
    </x-bladewind::description-list>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::description-list.item label="Email address"&gt;
                jane.cooper@example.com
                &lt;x-slot:action&gt;
                    &lt;a href="#"&gt;Edit&lt;/a&gt;
                &lt;/x-slot:action&gt;
            &lt;/x-bladewind::description-list.item&gt;
        </code>
    </pre>

    <h2 id="striped">Striped rows</h2>
    <p>
        Set <code class="inline">striped</code> on the list to alternate a subtle background on every row — it
        propagates from the list to each item automatically.
    </p>

    <x-bladewind::description-list striped="true">
        <x-bladewind::description-list.item label="Plan">Pro</x-bladewind::description-list.item>
        <x-bladewind::description-list.item label="Renews">March 4, 2027</x-bladewind::description-list.item>
        <x-bladewind::description-list.item label="Seats">12 of 20 used</x-bladewind::description-list.item>
    </x-bladewind::description-list>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::description-list striped="true"&gt;
                ...
            &lt;/x-bladewind::description-list&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <h3>Description List</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>divided</td>
            <td>true</td>
            <td>Horizontal rule between rows.</td>
        </tr>
        <tr>
            <td>striped</td>
            <td>false</td>
            <td>Alternates a subtle background on every row. Propagates to items automatically.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <h3>Description List Item</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>label</td>
            <td><em>(blank)</em></td>
            <td>The row's label.</td>
        </tr>
        <tr>
            <td>action</td>
            <td><em>(none)</em></td>
            <td>A named slot rendered beside the value.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the row.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > description-list > index.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > description-list > item.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#actions">Action slots</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#striped">Striped rows</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-description-list');
        </script>
    </x-slot>
</x-app>
