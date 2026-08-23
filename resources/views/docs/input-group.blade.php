<x-app>
    <x-slot:title>Input Group Component</x-slot:title>
    <x-slot:page_title>Input Group</x-slot:page_title>
    <x-bladewind::notification/>
    <p>
        Attaches controls to each other &mdash; an input with a button on the end, a select in
        front of an input, a search field with a submit. The group owns the corner and border
        work, so you do not have to strip radii off individual controls to make them sit flush.
    </p>

    <p>
        <x-bladewind::input-group>
            <x-bladewind::input name="search_demo" placeholder="Search orders"/>
            <x-bladewind::button class="shrink-control">Search</x-bladewind::button>
        </x-bladewind::input-group>
    </p>

    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::input-group&gt;
    &lt;x-bladewind::input name="search" placeholder="Search orders" /&gt;
    &lt;x-bladewind::button class="shrink-control"&gt;Search&lt;/x-bladewind::button&gt;
&lt;/x-bladewind::input-group&gt;
        </code>
    </pre>

    <p>
        Add <code class="inline">shrink-control</code> to anything that should stay its natural
        width instead of stretching &mdash; usually the attached button.
    </p>

    <h2 id="attached">Attached And Gapped</h2>
    <p>
        By default the controls run flush against each other: inner corners are squared off and
        the doubled border where two controls meet is collapsed. Set
        <code class="inline">attached="false"</code> to keep them apart instead, with each
        control keeping its own shape.
    </p>

    <p>
        <x-bladewind::input-group attached="false">
            <x-bladewind::input name="gapped_demo" placeholder="Search orders"/>
            <x-bladewind::button class="shrink-control">Search</x-bladewind::button>
        </x-bladewind::input-group>
    </p>

    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::input-group attached="false"&gt;
    &lt;x-bladewind::input name="search" placeholder="Search orders" /&gt;
    &lt;x-bladewind::button class="shrink-control"&gt;Search&lt;/x-bladewind::button&gt;
&lt;/x-bladewind::input-group&gt;
        </code>
    </pre>

    <h2 id="what-can-attach">What Can Be Attached</h2>
    <p>
        The group handles the corners of <code class="inline">input</code>,
        <code class="inline">textarea</code>, <code class="inline">select</code> and
        <code class="inline">button</code>. A select in front of an input is a common pairing:
    </p>

    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::input-group&gt;
    &lt;x-bladewind::select name="currency" :data="$currencies" class="shrink-control" /&gt;
    &lt;x-bladewind::input name="amount" placeholder="Amount" /&gt;
&lt;/x-bladewind::input-group&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The group supplies its own bottom margin, so the controls inside it drop theirs. You do
        not need <code class="inline">add_clearing="false"</code> on each one.
    </x-bladewind::alert>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Input Group component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>attached</td>
            <td>true</td>
            <td>
                Run the controls flush against each other, squaring off inner corners and
                collapsing the doubled border where two meet. <code class="inline">false</code>
                spaces them out instead.<br />
                <code class="inline">true</code> <code class="inline">false</code>
            </td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional css classes for the group itself.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > input-group.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#attached">Attached and gapped</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#what-can-attach">What can be attached</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-input-group');
        </script>
    </x-slot>
</x-app>
