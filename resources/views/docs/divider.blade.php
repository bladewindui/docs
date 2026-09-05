<x-app>
    <x-slot:title>Divider Component</x-slot:title>
    <x-slot:page_title>Divider</x-slot:page_title>

    <p>
        A horizontal or vertical rule for separating layout regions — sections of a form, rows in a list, or items in a
        toolbar. It ranges from a plain line to a line split by a centered label, and can be purely decorative or a
        real <code class="inline">role="separator"</code> a screen reader announces.
    </p>

    <x-bladewind::divider />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::divider /&gt;
        </code>
    </pre>

    <h2>Label</h2>
    <p>
        Pass <code class="inline">label</code> to split the line around centered text — the familiar "or" divider between
        a form and an alternate action.
    </p>

    <x-bladewind::divider label="OR" />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::divider label="OR" /&gt;
        </code>
    </pre>
    <p>A label only applies to a horizontal divider — it is ignored on a vertical one.</p>

    <h2>Orientation</h2>
    <p>
        Set <code class="inline">orientation</code> to <code class="inline">vertical</code> to separate content
        side-by-side, such as items in a toolbar. A vertical divider stretches to fill its container's height, so give
        the container a defined height.
    </p>

    <div class="flex items-center h-6 text-slate-600 dark:text-dark-300">
        <span>Edit</span>
        <x-bladewind::divider orientation="vertical" />
        <span>Duplicate</span>
        <x-bladewind::divider orientation="vertical" />
        <span>Delete</span>
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;div class="flex items-center h-6"&gt;
                &lt;span&gt;Edit&lt;/span&gt;
                &lt;x-bladewind::divider orientation="vertical" /&gt;
                &lt;span&gt;Duplicate&lt;/span&gt;
                &lt;x-bladewind::divider orientation="vertical" /&gt;
                &lt;span&gt;Delete&lt;/span&gt;
            &lt;/div&gt;
        </code>
    </pre>

    <h2>Spacing</h2>
    <p>
        <code class="inline">spacing</code> controls the margin either side of the line — <code class="inline">none</code>,
        <code class="inline">small</code>, <code class="inline">medium</code> (default), or <code class="inline">large</code>.
    </p>

    <x-bladewind::divider spacing="none" />
    <x-bladewind::divider spacing="small" />
    <x-bladewind::divider spacing="large" />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::divider spacing="none" /&gt;
            &lt;x-bladewind::divider spacing="small" /&gt;
            &lt;x-bladewind::divider spacing="large" /&gt;
        </code>
    </pre>

    <h2>Colour</h2>
    <p>
        <code class="inline">color</code> tints the line and label with any of BladewindUI's accepted colours instead of
        the neutral slate default.
    </p>

    <x-bladewind::divider label="Section" color="primary" />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::divider label="Section" color="primary" /&gt;
        </code>
    </pre>

    <h2>Decorative vs semantic</h2>
    <p>
        By default a divider is purely visual: it renders <code class="inline">role="none"</code> and
        <code class="inline">aria-hidden="true"</code>, so assistive technology skips it entirely. Set
        <code class="inline">decorative="false"</code> when the divider marks a real boundary a screen reader should
        announce — for example, between distinct sections of a long form — which renders
        <code class="inline">role="separator"</code> and <code class="inline">aria-orientation</code> instead.
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::divider decorative="false" /&gt;
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
            <td>orientation</td>
            <td>horizontal</td>
            <td><code class="inline">horizontal</code> | <code class="inline">vertical</code></td>
        </tr>
        <tr>
            <td>label</td>
            <td><em>(blank)</em></td>
            <td>Optional centered text. Horizontal only.</td>
        </tr>
        <tr>
            <td>spacing</td>
            <td>medium</td>
            <td><code class="inline">none</code> | <code class="inline">small</code> | <code class="inline">medium</code> | <code class="inline">large</code></td>
        </tr>
        <tr>
            <td>color</td>
            <td><em>(blank)</em></td>
            <td>Any accepted BladewindUI colour. Blank uses the neutral slate default.</td>
        </tr>
        <tr>
            <td>decorative</td>
            <td>true</td>
            <td>false renders a semantic <code class="inline">role="separator"</code> instead of a purely visual, hidden rule.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>
</x-app>
