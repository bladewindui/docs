<x-app>
    <x-slot:title>File Preview Component</x-slot:title>
    <x-slot:page_title>File Preview</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::file-preview</code> is the read-only display counterpart to
        <a href="/component/filepicker">Filepicker</a> — a compact row showing a thumbnail or file-type icon, the
        filename, its size, and download/remove actions. Use it for a list of already-uploaded files: attachments on
        a record, documents in a table row, files a Filepicker has already accepted.
    </p>

    <div class="max-w-md space-y-2">
        <x-bladewind::file-preview name="Quarterly report.pdf" size="2621440" url="#" />
        <x-bladewind::file-preview name="team-photo.jpg" size="843200" thumbnail="https://bladewindui.com/assets/images/bw-logo.png" url="#" />
        <x-bladewind::file-preview name="budget.xlsx" size="51200" url="#" />
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::file-preview name="Quarterly report.pdf" size="2621440" url="/files/1" /&gt;
            &lt;x-bladewind::file-preview name="team-photo.jpg" size="843200" thumbnail="/thumbs/team-photo.jpg" url="/files/2" /&gt;
            &lt;x-bladewind::file-preview name="budget.xlsx" size="51200" url="/files/3" /&gt;
        </code>
    </pre>
    <p>
        <code class="inline">size</code> is plain bytes — the component formats it into B/KB/MB/GB itself. Without a
        <code class="inline">thumbnail</code>, the icon is derived from the filename's extension (PDF, Word, Excel,
        images, video, audio, archives, and code files all get a distinct icon; anything unrecognised falls back to a
        generic document icon).
    </p>

    <h2 id="remove">Removing a file</h2>
    <p>
        A remove control shows by default and removes the preview from the DOM directly — nothing to wire up for the
        common case of client-side removal from a list the user is still assembling. Pass
        <code class="inline">on-remove</code> with your own JavaScript (for example, an endpoint call) to handle it
        yourself instead; doing so replaces the default behaviour entirely, the same pattern
        <a href="/component/tag">Tag</a>'s dismiss button uses.
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::file-preview name="report.pdf" on-remove="deleteAttachment(1)" /&gt;
        </code>
    </pre>
    <p>
        Set <code class="inline">removable="false"</code> to drop the control entirely — useful for a purely
        informational list the viewer cannot edit.
    </p>

    <h2 id="download">Download</h2>
    <p>
        A download link shows automatically whenever <code class="inline">url</code> is set. Set
        <code class="inline">downloadable="false"</code> to keep the link out even when a URL is present.
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
            <td><em>(blank)</em></td>
            <td>Filename to display, and the source of the extension-derived icon.</td>
        </tr>
        <tr>
            <td>size</td>
            <td><em>(blank)</em></td>
            <td>File size in bytes. A non-numeric value hides the size line.</td>
        </tr>
        <tr>
            <td>url</td>
            <td><em>(blank)</em></td>
            <td>Link used by the download action.</td>
        </tr>
        <tr>
            <td>thumbnail</td>
            <td><em>(blank)</em></td>
            <td>An image URL shown in place of the generic file-type icon.</td>
        </tr>
        <tr>
            <td>icon</td>
            <td><em>derived</em></td>
            <td>Overrides the extension-derived icon with any Heroicons name.</td>
        </tr>
        <tr>
            <td>removable</td>
            <td>true</td>
            <td>Shows the remove control.</td>
        </tr>
        <tr>
            <td>downloadable</td>
            <td>true</td>
            <td>Shows the download link when a <code class="inline">url</code> is set.</td>
        </tr>
        <tr>
            <td>onRemove</td>
            <td><em>(blank)</em></td>
            <td>Raw JS run on remove, replacing the default (remove the preview from the DOM).</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > file-preview.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#remove">Removing a file</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#download">Download</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-file-preview');
        </script>
    </x-slot>
</x-app>
