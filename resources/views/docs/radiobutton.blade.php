<x-app>
    <x-slot:title>Radio Button Component</x-slot:title>
    <x-slot:page_title>Radio Button</x-slot:page_title>

    <p>
        Display a radio button with or without a label.
        The default radio button colour is blue but there are nine colours available to choose from.
    </p>

    <x-bladewind::radio name="tnc" />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::radio name="tnc"  /&gt;
        </code>
    </pre>

    <h3>What kind of movies do you like?</h3>
    <x-bladewind::radio label="Action" name="genre"  />
    <x-bladewind::radio label="Comedy" name="genre"  />
    <x-bladewind::radio label="Drama" name="genre"  />
    <x-bladewind::radio label="Thriller" name="genre" />

<pre class="language-markup line-numbers">
<code>
    &lt;x-bladewind::radio label="Action" name="genre"  /&gt;
    &lt;x-bladewind::radio label="Comedy" name="genre"  /&gt;
    &lt;x-bladewind::radio label="Drama" name="genre"  /&gt;
    &lt;x-bladewind::radio label="Thriller" name="genre" /&gt;
</code>
</pre>

    <x-bladewind::radio label="I am checked by default" checked="true" name="check_me"  />

<pre class="language-markup line-numbers" data-line="3">
<code>
    &lt;x-bladewind::radio
        label="I am checked by default"
        checked="true"
        name="check_me"  /&gt;
</code>
</pre>

    <x-bladewind::radio label="I am disabled" disabled="true"  /> &nbsp;&nbsp;
    <x-bladewind::radio label="I am checked and disabled" disabled="true" checked="true"  />

<pre class="language-markup line-numbers" data-line="3">
<code>
    &lt;x-bladewind::radio
        label="I am disabled"
        disabled="true"  /&gt;
</code>
</pre>

    <h2 id="coloured">Coloured Checkboxes</h2>
    <p>
        Like most of the BladewindUI components, radios also come in nine colours to enable the components sit better in most designs with various colour schemes.
    </p>
    <div class="grid grid-cols-3 gap-2">
        <x-bladewind::radio color="red" checked="true" label="I am a red radio" />
        <x-bladewind::radio color="yellow" label="I am a yellow radio" />
        <x-bladewind::radio color="green" label="I am a green radio" />
        <x-bladewind::radio color="pink" label="I am a pink radio" />
        <x-bladewind::radio color="cyan" label="I am a cyan radio" />
        <x-bladewind::radio color="black" label="I am a black radio" />
        <x-bladewind::radio color="purple" label="I am a purple radio" />
        <x-bladewind::radio color="orange" label="I am a orange radio" />
        <x-bladewind::radio color="blue" label="I am a blue radio" />
        <x-bladewind::radio color="violet" label="I am a violet radio" />
        <x-bladewind::radio color="indigo" label="I am a indigo radio" />
        <x-bladewind::radio color="fuchsia" label="I am a fuchsia radio" />
    </div>

    <pre class="language-markup line-numbers" data-line="2,7,12,17,23,28,33,38,43,49,54,59">
        <code>
            &lt;x-bladewind::radio
                color="red"
                checked="true"
                label="I am a red radio" /&gt;

            &lt;x-bladewind::radio
                color="yellow"
                checked="true"
                label="I am a yellow radio" /&gt;

            &lt;x-bladewind::radio
                color="green"
                checked="true"
                label="I am a green radio" /&gt;

            &lt;x-bladewind::radio
                color="pink"
                checked="true"
                label="I am a pink radio" /&gt;

            &lt;x-bladewind::radio
                color="cyan"
                checked="true"
                label="I am a cyan radio" /&gt;

            &lt;x-bladewind::radio
                color="black"
                checked="true"
                label="I am a black radio" /&gt;

            &lt;x-bladewind::radio
                color="purple"
                checked="true"
                label="I am a purple radio" /&gt;

            &lt;x-bladewind::radio
                color="orange"
                checked="true"
                label="I am a orange radio" /&gt;

            &lt;x-bladewind::radio
                color="blue"
                checked="true"
                label="I am a blue radio" /&gt;

            &lt;x-bladewind::radio
                color="violet"
                checked="true"
                label="I am a violet radio" /&gt;

            &lt;x-bladewind::radio
                color="indigo"
                checked="true"
                label="I am a indigo radio" /&gt;

            &lt;x-bladewind::radio
                color="fuchsia"
                checked="true"
                label="I am a fuchsia radio" /&gt;
        </code>
    </pre>

    <h3>Radio buttons and forms</h3>
    <p>
        When using radio buttons with forms, it is always good practice to give the radio button a name and value.
        That way, when the form is submitted, the value of the radio button can be retrieved from its name. It is important to
        note that, in some cases, if the user does not select the radio button, the name of the radio button will be ignored completely from your payload.
    </p>

    <x-bladewind::radio name="notify_me" value="1" label="Send me weekly newsletters" />
    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::radio
            name="notify_me"
            value="1"
            label="Send me weekly newsletters" /&gt;
        </code>
    </pre>
    <h2 id="form-state">Laravel Form State</h2>
    <p>
        When validation fails, Laravel redirects back with the submitted values flashed to the
        session and the messages in <code class="inline">$errors</code>. The Radio component
        can read both for you, so you no longer write <code class="inline">@{{ old('...') }}</code>
        and an error block on every single field.
    </p>
    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::radio
    name="plan"
    value="pro"
    label="Pro"
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
        Only the radio whose value was previously submitted comes back selected.
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
    <p>The table below shows a comprehensive list of all the attributes available for the Radio Button component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>radio</td>
            <td>This name can be accessed when the radio button is submitted in the form. The name is also available as part of the css classes.</td>
        </tr>
        <tr>
            <td>label</td>
            <td><em>blank</em></td>
            <td>Text to be displayed next to the radio button.</td>
        </tr>
        <tr>
            <td>value</td>
            <td><em>blank</em></td>
            <td>In case you are editing a form, the value passed will be set on the value attribute of the radio button.
            <code class="inline text-red-500">&lt;input type="radio" <b>value=""</b> ../&gt;</code></td>
        </tr>
        <tr>
            <td>checked</td>
            <td>false</td>
            <td>Determines if the radio button is checked or not. Value needs to be set as a string not boolean.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>disabled</td>
            <td>false</td>
            <td>Determines if the radio button is disabled or not. Value needs to be set as a string not boolean.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>add_clearing</td>
            <td>true</td>
            <td>Adds a margin to the bottom of the radio button to separate it from the next form element. Value needs to be set as a string not boolean.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-radio button</td>
            <td>Any additional css classes can be added using this attribute.</td>
        </tr>
        <tr>
            <td>color</td>
            <td>blue</td>
            <td>There are twelve colors to choose from. <br /><code class="inline">red</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">pink</code>
                <code class="inline">cyan</code> <code class="inline">purple</code> <code class="inline">gray</code> <code class="inline">orange</code>
                <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code></td>
        </tr>
        <tr>
            <td>label_css</td>
            <td>mr-6</td>
            <td>Applies styling to the radio button label.</td>
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

    <h3>Radio button with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::radio
                label="I agree to the terms and conditions"
                checked="false"
                disabled="false"
                color="pink"
                name="tnc"
                value="yes"
                class="shadow-sm" /&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > radio.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#coloured">Coloured Checkboxes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#form-state">Laravel form state</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-radio-button');
        </script>
    </x-slot:scripts>
</x-app>
