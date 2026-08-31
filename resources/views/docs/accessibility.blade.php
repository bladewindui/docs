<x-app>
    <x-slot:title>Accessibility</x-slot:title>
    <x-slot:page_title>Accessibility</x-slot:page_title>

    <p>
        BladewindUI components carry their own ARIA roles and keyboard handling. You do not
        switch this on and there is no accessible variant of a component to reach for. A
        <a href="/component/tab">Tab</a> is a real tablist, a
        <a href="/component/toggle">Toggle</a> announces itself as a switch, and an
        <a href="/component/accordion">Accordion</a> header answers to
        <code class="inline">Enter</code> and <code class="inline">Space</code> because it is a
        real disclosure button rather than a div that happens to be clickable.
    </p>
    <p>
        This page describes what you get, and the few places where only you can supply the
        missing piece.
    </p>

    <h2 id="keyboard">Keyboard Support</h2>
    <p>
        Every component below is reachable with <code class="inline">Tab</code> and operable
        without a mouse.
    </p>
    <x-bladewind::table striped="true" has_shadow="false">
        <x-slot name="header">
            <th>Component</th>
            <th>Keys</th>
            <th>Behaviour</th>
        </x-slot>
        <tr>
            <td><a href="/component/select">Select</a></td>
            <td><code class="inline">&uarr;</code> <code class="inline">&darr;</code> <code class="inline">Home</code> <code class="inline">End</code> <code class="inline">Enter</code> <code class="inline">Esc</code> <code class="inline">Tab</code></td>
            <td>
                Arrows move the highlight, <code class="inline">Home</code> and
                <code class="inline">End</code> jump to the ends of the list,
                <code class="inline">Enter</code> selects, and
                <code class="inline">Esc</code> or <code class="inline">Tab</code> closes.
                Typing jumps to the first item that starts with what you typed.
            </td>
        </tr>
        <tr>
            <td><a href="/component/tab">Tab</a></td>
            <td><code class="inline">&larr;</code> <code class="inline">&rarr;</code> <code class="inline">Home</code> <code class="inline">End</code></td>
            <td>
                Left and right move between tabs and wrap around at the ends.
                Only the selected tab sits in the page tab order, so
                <code class="inline">Tab</code> moves past the tab strip rather than
                through every tab in it. Disabled tabs are skipped.
            </td>
        </tr>
        <tr>
            <td><a href="/component/accordion">Accordion</a></td>
            <td><code class="inline">Enter</code> <code class="inline">Space</code></td>
            <td>Opens and closes the section the header belongs to.</td>
        </tr>
        <tr>
            <td><a href="/component/checkcard">Checkcards</a></td>
            <td><code class="inline">Enter</code> <code class="inline">Space</code></td>
            <td>Selects the focused card. These were previously reachable only with a mouse.</td>
        </tr>
        <tr>
            <td><a href="/component/rating">Rating</a></td>
            <td><code class="inline">&larr;</code> <code class="inline">&rarr;</code> <code class="inline">&uarr;</code> <code class="inline">&darr;</code> <code class="inline">Home</code> <code class="inline">End</code></td>
            <td>
                Right and up step the rating up, left and down step it down, and
                <code class="inline">Home</code> and <code class="inline">End</code> jump to
                0 and 5. Only a clickable rating is focusable. See
                <a href="#rating">Rating</a> below.
            </td>
        </tr>
        <tr>
            <td><a href="/component/dropmenu">Dropmenu</a></td>
            <td><code class="inline">Enter</code> <code class="inline">Space</code></td>
            <td>Opens the menu from the trigger.</td>
        </tr>
        <tr>
            <td><a href="/component/slider">Slider</a></td>
            <td><code class="inline">&larr;</code> <code class="inline">&rarr;</code></td>
            <td>
                Handled by the browser. The slider is a native range input, so it was
                always operable. What it lacked was a name, which
                <code class="inline text-red-500">aria_label</code> now supplies.
            </td>
        </tr>
    </x-bladewind::table>

    <h2 id="roles">What Each Component Reports</h2>
    <p>
        Roles and states are kept in step with what is actually on screen. Opening an accordion
        section updates its <code class="inline">aria-expanded</code>, switching a tab updates
        <code class="inline">aria-selected</code>, and moving the highlight in a select updates
        <code class="inline">aria-activedescendant</code>. They cannot drift from the visible
        state, including when opening one accordion item closes another.
    </p>
    <x-bladewind::table striped="true" has_shadow="false">
        <x-slot name="header">
            <th>Component</th>
            <th>Reported as</th>
        </x-slot>
        <tr>
            <td>Select</td>
            <td>
                A <code class="inline">combobox</code> trigger with
                <code class="inline">aria-expanded</code>, <code class="inline">aria-required</code>
                and <code class="inline">aria-disabled</code>, over a
                <code class="inline">listbox</code> of <code class="inline">option</code>s.
                The empty-state item is marked disabled so it is not offered as a choice.
            </td>
        </tr>
        <tr>
            <td>Dropmenu</td>
            <td>
                A <code class="inline">button</code> trigger with
                <code class="inline">aria-haspopup="menu"</code>, over a
                <code class="inline">menu</code> of <code class="inline">menuitem</code>s.
                Headers are presentational and dividers are separators.
            </td>
        </tr>
        <tr>
            <td>Tab</td>
            <td><code class="inline">tablist</code>, <code class="inline">tab</code> and <code class="inline">tabpanel</code>, each tab tied to its panel both ways.</td>
        </tr>
        <tr>
            <td>Accordion</td>
            <td>A <code class="inline">button</code> header with <code class="inline">aria-expanded</code>, controlling a labelled <code class="inline">region</code>.</td>
        </tr>
        <tr>
            <td>Toggle</td>
            <td><code class="inline">switch</code> with <code class="inline">aria-checked</code>. It was always a real checkbox, so it was operable; it just announced itself as the wrong kind of control.</td>
        </tr>
        <tr>
            <td>Checkcards</td>
            <td>A <code class="inline">group</code> of <code class="inline">checkbox</code> cards, each with <code class="inline">aria-checked</code>.</td>
        </tr>
        <tr>
            <td>Rating</td>
            <td><code class="inline">slider</code> when clickable, <code class="inline">img</code> with a text alternative when not. See below.</td>
        </tr>
        <tr>
            <td>Alert</td>
            <td>
                Errors and warnings are an assertive <code class="inline">alert</code>.
                Info and success are a polite <code class="inline">status</code>, so a success
                message does not interrupt whatever is being read.
            </td>
        </tr>
        <tr>
            <td>Notification</td>
            <td>A polite <code class="inline">status</code> region on the container, since notifications are injected after the page has settled.</td>
        </tr>
    </x-bladewind::table>

    <h2 id="rating">Read-only And Clickable Ratings</h2>
    <p>
        A rating is two different controls depending on
        <code class="inline text-red-500">clickable</code>, and it reports itself accordingly.
    </p>
    <p>
        A clickable rating is a focusable slider with
        <code class="inline">aria-valuemin</code>, <code class="inline">aria-valuemax</code> and
        <code class="inline">aria-valuenow</code>, operable with the arrow keys listed above.
        A read-only rating is not focusable, because there is nothing to operate. It is
        exposed as an image with a text alternative, so it reads as "4 out of 5" rather than
        as five anonymous stars.
    </p>

    <h2 id="your-part">What You Need To Supply</h2>
    <p>
        Three things cannot be worked out from the markup, because only you know the answer.
    </p>

    <h3 id="icon-triggers">Icon-only dropmenu triggers</h3>
    <p>
        The common dropmenu trigger is a bare icon, which reaches a screen reader as nothing at
        all. Give it a name with <code class="inline text-red-500">trigger_label</code>.
    </p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::dropmenu trigger_label="Row actions"&gt;...&lt;/x-bladewind::dropmenu&gt;
        </code>
    </pre>

    <h3 id="icon-buttons">Icon-only buttons</h3>
    <p>
        A button with no visible text takes its accessible name from
        <code class="inline text-red-500">title</code>, which is the attribute most people
        already set on these. An explicit <code class="inline">aria-label</code> always wins if
        you would rather be exact.
    </p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button.circle title="Delete user" /&gt;

            &lt;x-bladewind::button.circle aria-label="Delete user" /&gt;
        </code>
    </pre>
    <x-bladewind::alert type="warning" show_close_icon="false">
        A button with neither a title nor an <code class="inline">aria-label</code> and no
        visible text ships as an unlabelled control. Nothing can be derived from an icon name.
    </x-bladewind::alert>

    <h3 id="slider-label">Sliders</h3>
    <p>
        <a href="/component/slider">Slider</a> takes an
        <code class="inline text-red-500">aria_label</code>. It defaults to a translatable
        string, which is better than nothing but says nothing about what the slider adjusts.
        Set it where you have more than one on a page.
    </p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::slider aria_label="Maximum price" /&gt;
        </code>
    </pre>

    <h2 id="scripts">Keyboard Support Needs The JavaScript</h2>
    <p>
        Roles and states are rendered into the markup and are there whatever else happens. The
        key handling is not: it lives in <code class="inline">helpers.js</code>, which every
        component assumes, and in the per component scripts. If a component is reachable but
        does not answer to the keys above, check that
        <code class="inline">@@bladewindScripts</code> is in your layout. See
        <a href="/install#setup">First-time setup</a>.
    </p>
    <x-bladewind::alert show_close_icon="false">
        Under a strict Content Security Policy this still works. No component attaches its
        behaviour with an inline <code class="inline">onclick</code>. See
        <a href="/install#csp">Content Security Policy</a>.
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#keyboard">Keyboard support</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#roles">What each component reports</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#rating">Read-only and clickable ratings</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#your-part">What you need to supply</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#icon-triggers">Icon-only dropmenu triggers</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#icon-buttons">Icon-only buttons</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#slider-label">Sliders</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#scripts">Keyboard support needs the JavaScript</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.extra-accessibility');
        </script>
    </x-slot>
</x-app>
