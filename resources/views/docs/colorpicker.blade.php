<x-app>
    <x-slot:title>Colorpicker Component</x-slot:title>
    <x-slot:page_title>Colorpicker</x-slot:page_title>
    <x-bladewind::notification />

    <p>
        Display a colour picker so users can select a colour. There are two types of colour pickers. The default HTML colour picker is the default displayed by this component.
        Once you pass a comma separated string of colours, a custom colour picker is displayed instead.
    </p>
    <x-bladewind::colorpicker />

    <pre class="language-markup">
        <code>
            &lt;x-bladewind::colorpicker  /&gt;
        </code>
    </pre>
    <br />
    <p>
        Once you pass a comma separated string of colours, a custom colour picker is displayed instead. These must be HEX colours including the '#' sign.
        This is useful if you are building a theme based web app that allows users to select their preferred theme for example.
    </p>
    <x-bladewind::colorpicker colors="#fff999, #cccccc, #999222, #787623, #78fcc3, #333678, #878987, #098765" />
<pre class="language-markup">
<code>
    &lt;x-bladewind::colorpicker
     colors="#fff999, #cccccc, #999222, #787623, #78fcc3, #333678, #878987, #098765"/&gt;
</code>
</pre>
    <br />
    <p>
        By default the colorpicker does not show the value of the selected colour. It only changes the colour of the box to what has been selected.
        To show the selected value set <code class="inline">show_value="true"</code>.
    </p>
    <x-bladewind::colorpicker show_value="true"  />

    <pre class="language-markup">
        <code>
        &lt;x-bladewind::colorpicker show_value="true" /&gt;
        </code>
    </pre>

    <p>
        The colorpicker comes in different sizes to match with input fields. In case the component is being used in a form with other fields.
        The default size is regular.
    </p>
    <div class="space-x-3">
        <x-bladewind::colorpicker size="small"  />
        <x-bladewind::colorpicker size="regular"  />
        <x-bladewind::colorpicker size="medium"  />
        <x-bladewind::colorpicker size="big"  />
    </div>
<pre class="language-markup">
    <code>
        &lt;x-bladewind::colorpicker size="small"  /&gt;
    </code>
</pre>
<pre class="language-markup">
    <code>
        &lt;x-bladewind::colorpicker size="regular"  /&gt;
    </code>
</pre>
<pre class="language-markup">
    <code>
        &lt;x-bladewind::colorpicker size="medium"  /&gt;
    </code>
</pre>
<pre class="language-markup">
    <code>
        &lt;x-bladewind::colorpicker size="big"  /&gt;
    </code>
</pre>
    <p>
        In order to access selected colour values when a form is submitted, provide a <code class="text-red-400 inline">name</code> for your colorpicker.
        BladewindUI provides a random unique name when no name is provided.
    </p>
    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Colorpicker component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>random</td>
            <td>This name can be accessed when the colorpicker is submitted in a form.</td>
        </tr>
        <tr>
            <td>selected_value</td>
            <td>#000000</td>
            <td>THe default colour to show in the colorpicker. Also used when editing an already saved value.</td>
        </tr>
        <tr>
            <td>show_value</td>
            <td>false</td>
            <td>Determines if the component should show the selected colour value.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional css classes can be added using this attribute.</td>
        </tr>
         <tr>
             <td>colors</td>
             <td><em>blank</em></td>
             <td>Comma separated list of colours to display instead of the default colour palette.</td>
         </tr>
         <tr>
             <td>size</td>
             <td>regular</td>
             <td>Size of the colorpicker. Values match the various input size values. <br /><code class="inline">small</code> <code class="inline">regular</code><code class="inline">medium</code> <code class="inline">big</code></td>
         </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>

    <h3>Colorpicker with all attributes defined</h3>
    <pre class="language-markup line-numbers">
<code>
    &lt;x-bladewind::colorpicker
        name="theme"
        size="medium"
        show_value="true"
        colors="#989098, #cccc44, #323232"
        selected_value="#909090"
        class="shadow-sm" /&gt;
</code>
    </pre>

    <h2 id="livewire">Using Colorpicker Inside Livewire</h2>
    <p>
        When a colour is picked, the value field dispatches a real, native <code class="inline">change</code> event, so Livewire's
        <code class="inline">wire:model</code> picks it up without any extra work on your part. The bindings that drive the picker
        are safe to re-run, so a Livewire re-render will not leave behind duplicate listeners.
    </p>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > colorpicker.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#livewire">Using Colorpicker inside Livewire</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-colorpicker');
        </script>
    </x-slot>
</x-app>
