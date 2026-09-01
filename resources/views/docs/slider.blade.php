<x-app>
    <x-slot:title>Slider Component</x-slot:title>
    <x-slot:page_title>Slider</x-slot:page_title>

    <p>
         Select values from a slider. This provides a convenient way for users to select numeric values instead of
        clicking increment and decrement arrows or manually entering values.
    </p>
    <p>
        <x-bladewind::alert show_close_icon="false">
            It is important to give your Slider a name if you intend to get the selected value when a form is submitted or via ajax.
            If you have multiple sliders on the same page, each slider needs to have a unique name. BladewindUI will use random names
            if you don't specify any.
        </x-bladewind::alert>
    </p>
    <x-bladewind::slider />
<br />
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::slider /&gt;
        </code>
    </pre>
<h3 id="colours">Different Colours</h3>
    <p>
        The Slider component like most BladewindUI components supports multiple <a href="/customize/colours">colours</a>. The default colour is your project's primary colour defined in your
        TailwindCss config file. To use a different colour, set the <code class="inline text-red-500">color</code> attribute.
        The example below also sets the <code class="inline text-red-500">selected</code> attribute. This is useful in edit mode to specify the slider number the user already selected.
        This can also be used to set the default value for the slider.
    </p>
    <div class="space-y-6">
    <x-bladewind::slider selected="50" color="cyan" />
    <x-bladewind::slider selected="30" color="pink" />
    <x-bladewind::slider selected="70" color="indigo" />
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::slider selected="50" color="cyan" /&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::slider selected="30" color="pink" /&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::slider selected="70" color="indigo" /&gt;
        </code>
    </pre>
    <p>
        The full list of colours is available in the attributes list below.
    </p>
    <h3 id="step">Step</h3>
    <p>
        By default the slider increments by 1 when you slide. You can define the numeric interval between slides by
        setting the <code class="inline text-red-500">step</code> attribute. This must be a positive number greater than 1.
    </p>
    <x-bladewind::slider selected="10" step="5" />
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::slider selected="10" step="5" /&gt;
        </code>
    </pre>
    <h3 id="step">Min and Max Values</h3>
    <p>
        By default the slider is set to a minimum of 0 and maximum of 100. This means you cannot slide beyond 0 or past 100.
        This behaviour can be changed by setting the <code class="inline text-red-500">min</code> and <code class="inline text-red-500">min</code> attributes. These must be positive numbers.
        This is useful for example in a case where you are building a web app for youth and need to ensure they only select  ages between 18 and 35.
    </p>
    <x-bladewind::slider min="18" max="35" />
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::slider min="18" max="35" /&gt;
        </code>
    </pre>
    <h2 id="range">Range Selection</h2>
    <p>
        There are cases where you need to let users select a minimum and maximum value. For example, a video streaming app may want to restrict
        content for kids between a range say 4 to 9. Setting the slider attribute <code class="inline text-red-500">range="true"</code> displays two
        markers on the slider for users to select two values.
    </p>
    <x-bladewind::alert show_close_icon="false" type="error">
        The range selection slider is currently buggy.
    </x-bladewind::alert>
    <br />
    <x-bladewind::slider range="true" selected="20" max_selected="60" />
<pre class="language-markup line-numbers">
<code>
&lt;x-bladewind::slider range="true" selected="20" max_selected="60" /&gt;
</code>
</pre>
    <h2 id="form">Form Submission</h2>
    <p>
        The assumption is you will need to retrieve the value from the slider and do something with it. The <code class="inline text-red-500">name</code> you specify for the slider is what will be passed when your form is submitted.
        Assuming we named our slider <code class="inline">age</code>, below is the HTML input field that will be generated.
    </p>
<pre class="language-markup line-numbers">
<code>
&lt;input type="hidden"
       name="age"
       id="age"
       class="slider-selection-age-input bw-slider-age"
       value="50" /&gt;
</code>
</pre>
<pre class="language-markup line-numbers">
<code>
&lt;!-- when using a range slider and two values are selected --&gt;
&lt;input type="hidden"
       name="age"
       id="age"
       class="slider-selection-age-input bw-slider-age"
       value="10,50" /&gt;
</code>
</pre>
    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Slider component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>bw_<em>uniqid()</em></td>
            <td>Unique name for the slider. You can get the slider value from this when a form with a slider is submitted.</td>
        </tr>
        <tr>
            <td>color</td>
            <td>primary</td>
            <td>There are twelve colours to choose from. <br /><br /><code class="inline">primary</code><code class="inline">red</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">pink</code>
                <code class="inline">cyan</code> <code class="inline">purple</code> <code class="inline">gray</code> <code class="inline">orange</code> <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code></td>
        </tr>
        <tr>
            <td>show_values</td>
            <td>true</td>
            <td>Should the selected values label be displayed. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>range</td>
            <td>false</td>
            <td>Should the slider show two markers instead of one. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>min</td>
            <td>0</td>
            <td>Minimum value the slider should start from. Needs to be a positive number greater or equal to zero.</td>
        </tr>
        <tr>
            <td>max</td>
            <td>100</td>
            <td>Maximum value the slider should end at. Needs to be a positive number greater than zero.</td>
        </tr>
        <tr>
            <td>step</td>
            <td>1</td>
            <td>By what number should the slider values be incremented or decreased. Needs to be a positive number greater than zero.</td>
        </tr>
        <tr>
            <td>selected</td>
            <td>0</td>
            <td>Used in edit mode to set the slider to the number user selected previously. Also used to set the default value for the slider. The <code class="inline">max</code> value is used when a <code class="inline">selected</code> value is greater than the <code class="inline">max</code> value.</td>
        </tr>
        <tr>
            <td>max_selected</td>
            <td><em>blank</em></td>
            <td>Applies only if <code class="inline text-red-500">range="true"</code>. Sets the slider value for the second marker. Also used to set the default value for the second marker.</td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-slider-container</td>
            <td>Any additional css you wish to add.</td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
        <tr>
            <td>aria_label</td>
            <td>Value</td>
            <td>Accessible name for the range input. A slider with no name is announced as an anonymous control.</td>
        </tr>
    </x-bladewind::table>

    <h3>Slider with all attributes defined</h3>
<pre class="language-markup line-numbers">
<code>
&lt;x-bladewind::slider
    min="5"
    max="50"
    color="red"
    show_values="false"
    step="5"
    range="true"
    selected="34"
    max_selected="45"
    class="m-0" /&gt;
</code>
</pre>

    <h2 id="livewire">Using Slider Inside Livewire</h2>
    <p>
        As the slider is dragged, the hidden value field dispatches a real, native <code class="inline">change</code> event, so
        Livewire's <code class="inline">wire:model</code> picks it up without any extra work on your part. The slider's handlers are
        assigned as a single property rather than added as separate listeners, so a Livewire re-render simply replaces that
        assignment instead of stacking up duplicates.
    </p>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > slider.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#range">Range selection</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#form">Form submission</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#livewire">Using Slider inside Livewire</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-slider');
        </script>
    </x-slot>
</x-app>
