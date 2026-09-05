<x-app>
    <x-slot:title>Password Meter Component</x-slot:title>
    <x-slot:page_title>Password Meter</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::password-meter</code> watches an existing password field and shows a
        rules-based strength reading as the user types — a segmented bar plus a text label, live-updated on every
        keystroke. It is a standalone companion, not a wrapper: point it at any password field with
        <code class="inline">for</code>, BladewindUI's own or otherwise.
    </p>

    <div class="max-w-sm">
        <x-bladewind::input type="password" name="password" label="Password" viewable="true" />
        <x-bladewind::password-meter for="password" />
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::input type="password" name="password" label="Password" viewable="true" /&gt;
            &lt;x-bladewind::password-meter for="password" /&gt;
        </code>
    </pre>
    <p>
        <code class="inline">for</code> is the watched field's <code class="inline">name</code> (or, failing that, its
        <code class="inline">id</code>) — exactly what you already passed the field itself, nothing extra to keep in
        sync.
    </p>

    <h2 id="scoring">How strength is scored</h2>
    <p>
        A password earns up to four points: one for reaching <code class="inline">minLength</code> characters
        (8 by default), a second for reaching <code class="inline">strongLength</code> (12 by default), and up to two
        more for character variety — lowercase, uppercase, digits, and symbols each count, capped at two points so
        length still matters. Four points is "Strong", one is "Weak", and an empty field shows nothing at all.
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::password-meter for="password" min-length="10" strong-length="16" /&gt;
        </code>
    </pre>

    <h2 id="label">Hiding the label</h2>
    <p>
        The bar is always shown; set <code class="inline">show-label="false"</code> to drop the text readout beside
        it and rely on the bar's colour alone.
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::password-meter for="password" show-label="false" /&gt;
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
            <td>for</td>
            <td><em>required</em></td>
            <td>The <code class="inline">name</code> (or <code class="inline">id</code>) of the password field to watch.</td>
        </tr>
        <tr>
            <td>showLabel</td>
            <td>true</td>
            <td>Shows the "Weak" / "Fair" / "Good" / "Strong" text readout.</td>
        </tr>
        <tr>
            <td>minLength</td>
            <td>8</td>
            <td>Character count that earns the first length point.</td>
        </tr>
        <tr>
            <td>strongLength</td>
            <td>12</td>
            <td>Character count that earns the second length point.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > password-meter.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#scoring">How strength is scored</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#label">Hiding the label</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-password-meter');
        </script>
    </x-slot>
</x-app>
