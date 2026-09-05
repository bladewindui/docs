<x-app>
    <x-slot:title>Meter Component</x-slot:title>
    <x-slot:page_title>Meter</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::meter</code> visualises a bounded measurement — disk usage, a score, a
        signal strength — as opposed to <a href="/component/progress-bar">Progress Bar</a>'s task completion. Give it
        <code class="inline">low</code> and <code class="inline">high</code> boundaries and it colours itself
        semantically: green for the good zone, red for the bad one, yellow for the zone in between. A real, visually
        hidden <code class="inline">&lt;meter&gt;</code> element carries the actual accessible semantics; the coloured
        bar is purely decorative.
    </p>

    <div class="max-w-sm">
        <x-bladewind::meter value="72" max="100" low="30" high="70" label="Battery"/>
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::meter value="72" max="100" low="30" high="70" label="Battery" /&gt;
        </code>
    </pre>
    <p>
        With no <code class="inline">optimum</code>, higher values are assumed to be better: the zone above
        <code class="inline">high</code> is green, below <code class="inline">low</code> is red, and the band between
        is yellow.
    </p>

    <h2 id="optimum">When lower is better</h2>
    <p>
        Some measurements go the other way — an error rate, latency, CPU load. Set <code class="inline">optimum</code>
        to a value inside the zone that should read as "good"; the meter works out which end is bad from there.
    </p>

    <div class="max-w-sm space-y-4">
        <x-bladewind::meter value="8" max="100" low="20" high="60" optimum="0" label="Error rate"/>
        <x-bladewind::meter value="85" max="100" low="20" high="60" optimum="0" label="Error rate (unhealthy)"/>
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::meter value="8" max="100" low="20" high="60" optimum="0" label="Error rate" /&gt;
        </code>
    </pre>

    <h2 id="no-zones">Without zones</h2>
    <p>
        Omit <code class="inline">low</code>/<code class="inline">high</code> for a plain bounded bar with no
        semantic colouring — a single neutral colour, still a real measurement rather than a completion percentage.
    </p>

    <div class="max-w-sm">
        <x-bladewind::meter value="640" max="1000" label="Storage used (MB)"/>
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::meter value="640" max="1000" label="Storage used (MB)" /&gt;
        </code>
    </pre>

    <h2 id="sizes">Sizes</h2>
    <p>Set <code class="inline">size</code> to <code class="inline">tiny</code>, <code class="inline">small</code>, <code class="inline">medium</code> (default), or <code class="inline">large</code>.</p>

    <div class="max-w-sm space-y-3">
        <x-bladewind::meter value="60" max="100" low="30" high="70" size="tiny" show-value="false"/>
        <x-bladewind::meter value="60" max="100" low="30" high="70" size="small" show-value="false"/>
        <x-bladewind::meter value="60" max="100" low="30" high="70" size="medium" show-value="false"/>
        <x-bladewind::meter value="60" max="100" low="30" high="70" size="large" show-value="false"/>
    </div>

    <h2 id="attributes">Full List Of Attributes</h2>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>value</td>
            <td>0</td>
            <td>The current measurement.</td>
        </tr>
        <tr>
            <td>min / max</td>
            <td>0 / 100</td>
            <td>The measurement's bounds.</td>
        </tr>
        <tr>
            <td>low / high</td>
            <td><em>(none)</em></td>
            <td>Zone boundaries. Both must be set to enable semantic colouring.</td>
        </tr>
        <tr>
            <td>optimum</td>
            <td><em>(none)</em></td>
            <td>A value inside the zone that should read as "good". Defaults to the high zone.</td>
        </tr>
        <tr>
            <td>label</td>
            <td><em>(blank)</em></td>
            <td>Label shown above the bar.</td>
        </tr>
        <tr>
            <td>showValue</td>
            <td>true</td>
            <td>Shows "value / max" above the bar.</td>
        </tr>
        <tr>
            <td>size</td>
            <td>medium</td>
            <td><code class="inline">tiny</code> | <code class="inline">small</code> | <code class="inline">medium</code> | <code class="inline">large</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > meter.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#optimum">When lower is better</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#no-zones">Without zones</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sizes">Sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-meter');
        </script>
    </x-slot>
</x-app>
