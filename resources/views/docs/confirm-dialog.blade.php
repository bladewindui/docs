<x-app>
    <x-slot:title>Confirm Dialog Component</x-slot:title>
    <x-slot:page_title>Confirm Dialog</x-slot:page_title>

    <p>
        A purpose-built confirmation modal for destructive or consequential actions — deleting a record, cancelling a
        subscription, discarding unsaved work. It composes <a href="/component/modal">Modal</a> rather than
        duplicating it, and adds what a plain modal does not: a tone that picks a sensible icon and confirm colour for
        you, a backdrop that will not dismiss it by accident, and an async pending state for the confirm action
        itself.
    </p>

    <x-bladewind::confirm-dialog name="deleteUser" title="Delete this user?">
        This will permanently remove the user and everything associated with their account. This cannot be undone.
    </x-bladewind::confirm-dialog>
    <x-bladewind::button onclick="showModal('deleteUser')">Delete user</x-bladewind::button>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::confirm-dialog name="deleteUser" title="Delete this user?"&gt;
                This will permanently remove the user and everything associated with their account. This cannot be undone.
            &lt;/x-bladewind::confirm-dialog&gt;
            &lt;x-bladewind::button onclick="showModal('deleteUser')"&gt;Delete user&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <p>
        Like Modal, a confirm dialog is opened by name with the <code class="inline">showModal()</code> helper — give
        it a unique <code class="inline">name</code> and call <code class="inline">showModal('name')</code> from
        anywhere on the page.
    </p>

    <h2 id="tone">Tone</h2>
    <p>
        <code class="inline">tone</code> picks the icon and the confirm button's colour in one attribute:
        <code class="inline">danger</code> (default, for destructive actions), <code class="inline">warning</code>,
        <code class="inline">info</code>, or <code class="inline">primary</code> (no icon, the button's default
        colour — for a consequential but non-destructive confirmation).
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::confirm-dialog name="leavePage" tone="warning" title="Leave without saving?"&gt;
                Your changes have not been saved yet.
            &lt;/x-bladewind::confirm-dialog&gt;
        </code>
    </pre>

    <h2 id="async">An async confirm action</h2>
    <p>
        Pass <code class="inline">onConfirm</code> as a raw JavaScript expression, wrapped internally in a function
        that may return a <code class="inline">Promise</code>. While that promise is pending, both buttons disable
        and the confirm button shows a spinner. Resolving it closes the dialog; rejecting it re-enables the buttons
        and leaves the dialog open, so you can surface your own error state before the user retries.
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::confirm-dialog
                name="deleteUser"
                title="Delete this user?"
                onConfirm="deleteUser(:userId)"&gt;
                This will permanently remove the user. This cannot be undone.
            &lt;/x-bladewind::confirm-dialog&gt;

            &lt;script&gt;
                function deleteUser(id) {
                    return fetch(`/users/${id}`, { method: 'DELETE' });
                }
            &lt;/script&gt;
        </code>
    </pre>
    <p>
        Set <code class="inline">close-after-confirm="false"</code> if you would rather close the dialog yourself —
        for example from inside the <code class="inline">onConfirm</code> promise's own <code class="inline">.then()</code>,
        after also updating the rest of the page.
    </p>

    <h2 id="backdrop">Backdrop</h2>
    <p>
        Unlike a plain Modal, the backdrop cannot dismiss a confirm dialog by default — a destructive action should be
        explicitly confirmed or cancelled, not accidentally dismissed by a stray click. Set
        <code class="inline">backdrop-can-close="true"</code> to restore Modal's usual behaviour.
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
            <td>Unique identifier used by <code class="inline">showModal()</code> / <code class="inline">hideModal()</code>.</td>
        </tr>
        <tr>
            <td>title</td>
            <td>Are you sure?</td>
            <td>Dialog heading.</td>
        </tr>
        <tr>
            <td>tone</td>
            <td>danger</td>
            <td><code class="inline">danger</code> | <code class="inline">warning</code> | <code class="inline">info</code> | <code class="inline">primary</code></td>
        </tr>
        <tr>
            <td>confirmLabel</td>
            <td>Confirm</td>
            <td>Label on the confirm button.</td>
        </tr>
        <tr>
            <td>cancelLabel</td>
            <td>Cancel</td>
            <td>Label on the cancel button.</td>
        </tr>
        <tr>
            <td>onConfirm</td>
            <td><em>(blank)</em></td>
            <td>Raw JS expression run on confirm, wrapped in a function that may return a Promise. Blank makes Confirm a plain close.</td>
        </tr>
        <tr>
            <td>closeAfterConfirm</td>
            <td>true</td>
            <td>Close the dialog once <code class="inline">onConfirm</code>'s promise resolves.</td>
        </tr>
        <tr>
            <td>backdropCanClose</td>
            <td>false</td>
            <td>Unlike Modal, defaults to false.</td>
        </tr>
        <tr>
            <td>size</td>
            <td>small</td>
            <td>Any Modal size: <code class="inline">tiny</code> | <code class="inline">small</code> | <code class="inline">medium</code> | <code class="inline">big</code> | <code class="inline">large</code> | <code class="inline">xl</code> | <code class="inline">omg</code></td>
        </tr>
        <tr>
            <td>icon</td>
            <td><em>(blank)</em></td>
            <td>Overrides the icon <code class="inline">tone</code> would otherwise pick, using any <a href="https://heroicons.com/" target="_blank">Heroicons</a> name.</td>
        </tr>
    </x-bladewind::table>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#tone">Tone</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#async">An async confirm action</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#backdrop">Backdrop</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-confirm-dialog');
        </script>
    </x-slot>
</x-app>
