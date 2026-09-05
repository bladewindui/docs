<x-app>
    <x-slot:title>Inline Edit Component</x-slot:title>
    <x-slot:page_title>Inline Edit</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::inline-edit</code> shows a value as plain text until the user clicks it (or
        its edit icon), then swaps in a text field with Save and Cancel controls. With no
        <code class="inline">onSave</code>, it saves optimistically — the display updates the instant Save is
        clicked, and a hidden field carries the current value for a normal form submission alongside the rest of the
        page.
    </p>

    <x-bladewind::inline-edit name="project_name" value="Q3 Marketing Campaign"/>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::inline-edit name="project_name" value="Q3 Marketing Campaign" /&gt;
        </code>
    </pre>
    <p>
        Click the text (or its pencil icon) to edit, <code class="inline">Enter</code> to save,
        <code class="inline">Escape</code> or the × button to cancel. An empty value shows
        <code class="inline">placeholder</code> in a muted, italic style instead of nothing.
    </p>

    <h2 id="async">An async save</h2>
    <p>
        Pass <code class="inline">onSave</code> as a raw JavaScript expression, wrapped internally in a function that
        receives <code class="inline">(newValue, oldValue)</code> and may return a <code class="inline">Promise</code>.
        While that promise is pending, the field and both controls disable and the save button shows a spinner.
        Resolving it updates the display to the new value; rejecting it shows the rejection's message (or a generic
        one) and leaves edit mode open so the user can fix the value and retry.
    </p>

    <x-bladewind::inline-edit name="project_name_async" value="Q3 Marketing Campaign" on-save="renameProject(1, newValue)"/>
    <script>
        function renameProject(id, name) {
            return new Promise((resolve) => setTimeout(resolve, 600));
        }
    </script>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::inline-edit name="project_name" value="Q3 Marketing Campaign" on-save="renameProject(1, newValue)" /&gt;

            &lt;script&gt;
                function renameProject(id, name) {
                    return fetch(`/projects/${id}`, {
                        method: 'PATCH',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ name }),
                    }).then((response) => {
                        if (! response.ok) throw new Error('Could not rename the project');
                    });
                }
            &lt;/script&gt;
        </code>
    </pre>

    <h2 id="required">Required and validation</h2>
    <p>
        Set <code class="inline">required="true"</code> to block saving an empty value; the field shows
        <code class="inline">requiredMessage</code> instead and stays in edit mode. Any rejection from
        <code class="inline">onSave</code> — for a server-side validation failure, say — surfaces the same way.
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::inline-edit name="project_name" required="true" required-message="A project needs a name" /&gt;
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
            <td>name</td>
            <td><em>auto-generated</em></td>
            <td>Name of the hidden field the current value submits under.</td>
        </tr>
        <tr>
            <td>value</td>
            <td><em>(blank)</em></td>
            <td>Current value.</td>
        </tr>
        <tr>
            <td>placeholder</td>
            <td>Click to edit</td>
            <td>Shown, in a muted style, when the value is empty. Also the input's placeholder while editing.</td>
        </tr>
        <tr>
            <td>required</td>
            <td>false</td>
            <td>Blocks saving an empty value.</td>
        </tr>
        <tr>
            <td>requiredMessage</td>
            <td>This field is required</td>
            <td>Shown when a required save is blocked.</td>
        </tr>
        <tr>
            <td>maxlength</td>
            <td><em>(none)</em></td>
            <td>Maximum characters accepted by the input.</td>
        </tr>
        <tr>
            <td>onSave</td>
            <td><em>(blank)</em></td>
            <td>Raw JS expression receiving (newValue, oldValue), optionally returning a Promise. Blank saves optimistically.</td>
        </tr>
        <tr>
            <td>saveLabel / cancelLabel / editLabel</td>
            <td>Save / Cancel / Edit</td>
            <td>Accessible labels for the three controls.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > inline-edit.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#async">An async save</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#required">Required and validation</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-inline-edit');
        </script>
    </x-slot>
</x-app>
