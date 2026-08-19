<x-app>
    <x-slot:title>Checkbox Component</x-slot:title>
    <x-slot:page_title>Checkbox</x-slot:page_title>

    <p>
        Display a checkbox with or without a label. The default checkbox colour is blue but there are nine colours available to choose from.
    </p>

    <x-bladewind::checkbox  />

<pre class="language-markup">
<code>
    &lt;x-bladewind::checkbox  /&gt;
</code>
</pre>
    <br />

    <x-bladewind::checkbox label="I agree to the terms and conditions"  />

    <pre class="language-markup">
        <code>
            &lt;x-bladewind::checkbox label="I agree to the terms and conditions"  /&gt;
        </code>
    </pre>

    <br />
    <x-bladewind::checkbox label="I agree to the &nbsp;<a href='/terms'>terms and conditions</a>"  />

<pre class="language-markup line-numbers">
<code>
&lt;x-bladewind::checkbox
    label="I agree to the &lt;a href='/terms'&gt;terms and conditions&lt;/a&gt;"  /&gt;
</code>
</pre>
<br />
    <x-bladewind::checkbox label="I am checked by default" checked="true"  />
    <pre class="language-markup line-numbers" data-line="3">
        <code>
            <code>
            &lt;x-bladewind::checkbox
                label="I am checked by default"
                checked="true"  /&gt;
        </code>
        </code>
    </pre>
<br />
    <x-bladewind::checkbox label="I am disabled" disabled="true"  /> &nbsp;&nbsp;
    <x-bladewind::checkbox label="I am checked and disabled" disabled="true" checked="true"  />
    <pre class="language-markup line-numbers" data-line="3">
        <code>
            <code>
            &lt;x-bladewind::checkbox
                label="I am disabled"
                disabled="true"  /&gt;
        </code>
        </code>
    </pre>

    <h2 id="coloured">Coloured Checkboxes</h2>
    <p>
        Like most of the BladewindUI components, checkboxes also come in nine colours to enable the components sit better in most designs with various colour schemes.
    </p>
    <div class="grid grid-cols-3 gap-2">

            <x-bladewind::checkbox color="red" checked="true" label="I am a red checkbox" />
            <x-bladewind::checkbox color="yellow" checked="true" label="I am a yellow checkbox" />
            <x-bladewind::checkbox color="green" checked="true" label="I am a green checkbox" />

            <x-bladewind::checkbox color="pink" checked="true" label="I am a pink checkbox" />
            <x-bladewind::checkbox color="cyan" checked="true" label="I am a cyan checkbox" />
            <x-bladewind::checkbox color="black" checked="true" label="I am a black checkbox" />

            <x-bladewind::checkbox color="purple" checked="true" label="I am a purple checkbox" />
            <x-bladewind::checkbox color="orange" checked="true" label="I am a orange checkbox" />
            <x-bladewind::checkbox color="blue" checked="true" label="I am a blue checkbox" />

            <x-bladewind::checkbox color="violet" checked="true" label="I am a violet checkbox" />
            <x-bladewind::checkbox color="indigo" checked="true" label="I am a indigo checkbox" />
            <x-bladewind::checkbox color="fuchsia" checked="true" label="I am a fuchsia checkbox" />
    </div>

    <pre class="language-markup line-numbers" data-line="2,7,12,17,22,27,32,37,42">
        <code>
            &lt;x-bladewind::checkbox
                color="red"
                checked="true"
                label="I am a red checkbox" /&gt;

            &lt;x-bladewind::checkbox
                color="yellow"
                checked="true"
                label="I am a yellow checkbox" /&gt;

            &lt;x-bladewind::checkbox
                color="green"
                checked="true"
                label="I am a green checkbox" /&gt;

            &lt;x-bladewind::checkbox
                color="pink"
                checked="true"
                label="I am a pink checkbox" /&gt;

            &lt;x-bladewind::checkbox
                color="cyan"
                checked="true"
                label="I am a cyan checkbox" /&gt;

            &lt;x-bladewind::checkbox
                color="black"
                checked="true"
                label="I am a black checkbox" /&gt;

            &lt;x-bladewind::checkbox
                color="purple"
                checked="true"
                label="I am a purple checkbox" /&gt;

            &lt;x-bladewind::checkbox
                color="orange"
                checked="true"
                label="I am a orange checkbox" /&gt;

            &lt;x-bladewind::checkbox
                color="blue"
                checked="true"
                label="I am a blue checkbox" /&gt;
        </code>
    </pre>
    <h3>Checkboxes and forms</h3>
    <p>
        When using checkboxes with forms, it is always good practice to give the checkbox a name and value.
        That way, when the form is submitted, the value of the checkbox can be retrieved from its name. It is important to
        note that, in some cases, if the user does not select the checkbox, the name of the checkbox will be ignored completely from your payload.
    </p>

    <x-bladewind::checkbox name="notify_me" value="1" label="Send me weekly newsletters" />
    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::checkbox
            name="notify_me"
            value="1"
            label="Send me weekly newsletters" /&gt;
        </code>
    </pre>

    <h2 id="form-state">Laravel Form State</h2>
    <p>
        When validation fails, Laravel redirects back with the submitted values flashed to the
        session and the messages in <code class="inline">$errors</code>. The Checkbox component
        can read both for you, so you no longer write <code class="inline">@{{ old('...') }}</code>
        and an error block on every single field.
    </p>
    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::checkbox
    name="terms"
    value="yes"
    label="I agree to the terms"
    fill_from_old="true"
    show_validation_error="true" /&gt;
        </code>
    </pre>
    <p>
        <code class="inline">fill_from_old</code> repopulates the field from
        <code class="inline">old()</code>. <code class="inline">show_validation_error</code> gives
        the field its error state and renders <code class="inline">$errors-&gt;first()</code>
        underneath it. Add <code class="inline">error_bag</code> if you validate into a named bag.
    </p>
    <p>
        Checkboxes need a little more care than a text field, and the component handles it for you.
        An unticked box submits nothing at all, so "this field is missing from the old input" only
        means <em>unchecked</em> once a submission has actually bounced back. On a form's first
        render there is no old input, and a box you set with
        <code class="inline">checked="true"</code> stays checked. For a group of checkboxes sharing
        one name, only the boxes whose values were submitted come back ticked.
    </p>
    <x-bladewind::alert type="warning" show_close_icon="false">
        Both are <b>off by default</b>. If your form already prints its own validation messages,
        switching this on without removing them would print every message twice.
    </x-bladewind::alert>

    <h3 id="form-state-globally">Turning it on for every form</h3>
    <p>
        Rather than setting the attributes field by field, set them once in your
        <code class="inline">config/bladewind.php</code> and every form component follows.
    </p>
    <pre class="language-php line-numbers">
        <code>
// config/bladewind.php
'forms' =&gt; [
    'fill_from_old' =&gt; true,
    'show_validation_error' =&gt; true,
    'error_bag' =&gt; null,
],
        </code>
    </pre>
    <p>
        An attribute on a single field always wins over the config, so you can opt one field out
        with <code class="inline">show_validation_error="false"</code>.
    </p>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Checkbox component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>checkbox</td>
            <td>This name can be accessed when the checkbox is submitted in the form. The name is also available as part of the css classes.</td>
        </tr>
        <tr>
            <td>label</td>
            <td><em>blank</em></td>
            <td>Text to be displayed next to the checkbox.</td>
        </tr>
        <tr>
            <td>value</td>
            <td><em>blank</em></td>
            <td>In case you are editing a form, the value passed will be set on the value attribute of the checkbox.
            <code class="inline text-red-500">&lt;input type="checkbox" <b>value=""</b> ../&gt;</code></td>
        </tr>
        <tr>
            <td>checked</td>
            <td>false</td>
            <td>Specifies whether the checkbox is checked or not. Value needs to be set as a string not boolean.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>disabled</td>
            <td>false</td>
            <td>Specifies whether the checkbox is disabled or not. Value needs to be set as a string not boolean.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>add_clearing</td>
            <td>true</td>
            <td>Adds a margin to the bottom of the checkbox to separate it from the next form element. Value needs to be set as a string not boolean.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>color</td>
            <td>primary</td>
            <td>Color of the checkbox rings.<br/><br/>
                <code class="inline">primary</code> <code class="inline">red</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">black</code> <code class="inline">cyan</code>
                <code class="inline">orange</code> <code class="inline">purple</code> <code class="inline">pink</code> <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-checkbox</td>
            <td>Any additional css classes can be added using this attribute.</td>
        </tr>
        <tr>
            <td>label_css</td>
            <td>mr-6</td>
            <td>Applies styling to the checkbox label.</td>
        </tr>
        <tr>
            <td>fill_from_old</td>
            <td>false</td>
            <td>
                Repopulate the field from <code class="inline">old()</code> when Laravel redirects
                back after a failed validation. Defaults to the
                <code class="inline">bladewind.forms.fill_from_old</code> config value.<br />
                <code class="inline">true</code> <code class="inline">false</code>
            </td>
        </tr>
        <tr>
            <td>show_validation_error</td>
            <td>false</td>
            <td>
                Give the field its error state and render <code class="inline">$errors-&gt;first()</code>
                beneath it. Defaults to the
                <code class="inline">bladewind.forms.show_validation_error</code> config value.<br />
                <code class="inline">true</code> <code class="inline">false</code>
            </td>
        </tr>
        <tr>
            <td>error_bag</td>
            <td><em>null</em></td>
            <td>
                Which error bag to read when <code class="inline">show_validation_error</code> is on.
                Leave it unset to use Laravel's default bag.
            </td>
        </tr>
    </x-bladewind::table>

    <h3>Checkbox with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::checkbox
                label="I agree to the terms and conditions"
                checked="false"
                disabled="false"
                name="tnc"
                value="yes"
                color="pink"
                label_css="font-bold"
                class="shadow-sm" /&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > checkbox.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#coloured">Coloured Checkboxes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#form-state">Laravel form state</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-checkbox');
        </script>
    </x-slot>
</x-app>
