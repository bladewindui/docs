<x-app>
    <x-slot:title>Datepicker Component</x-slot:title>
    <x-slot:page_title>Datepicker</x-slot:page_title>
    <x-bladewind::notification />

    <p>
        Display a datepicker so user can select a date. The datepicker component is locale friendly. Months and days of the week are translated.
    </p>

    <x-bladewind::datepicker />

    <pre class="language-markup">
        <code>
            &lt;x-bladewind::datepicker  /&gt;
        </code>
    </pre>
    <br />
    <p>
        By default the datepicker fills up the width of its parent container. You can however specify a width of your choice using the datepicker's <code class="inline">css</code> attribute.
    </p>
    <p>You can also change the placeholder text from the default <code class="inline">Select a date</code>.</p>
    <div class="w-40">
        <x-bladewind::datepicker placeholder="Invoice Date" has_label="true"  />
    </div>

    <pre class="language-markup line-numbers" data-line="2">
        <code>
            &lt;div class="w-40"&gt;
                &lt;x-bladewind::datepicker placeholder="Invoice Date"  /&gt;
            &lt;/div&gt;
        </code>
    </pre>

    <h2 id="range">Range Calendar</h2>
    <p>
        The range datepicker allows you to select a range of dates by setting <code class="inline text-red-500">range="true"</code>.
        In the input field, the range of dates selected are separated with a dash (-). For example, a selected date range will be displayed in the input as
        <b>2025-01-10 - 2025-01-31</b>.
    </p>
    <x-bladewind::datepicker range="true"  />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker range="true"  /&gt;
        </code>
    </pre>

    <h3 id="required">Show As a Required Field</h3>
    <p>An asterisk is appended to the placeholder text when <code class="inline text-red-500">required="true"</code>.</p>
    <x-bladewind::datepicker required="true"  />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker required="true"  /&gt;
        </code>
    </pre>

    <h2 id="formats">Date Formats</h2>
    <p>
        You can specify how you want dates selected in the datepicker to be displayed. There are four options to pick from.
        The default format is <code class="inline text-red-500">format="yyyy-mm-dd"</code>. When using a range datepicker, the format you specify is applied to both datepickers.
    </p>
    <x-bladewind::datepicker name="date1" type="range" format="dd-mm-yyyy"  />
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::datepicker name="date1" type="range" format="dd-mm-yyyy" /&gt;
        </code>
    </pre>
    <x-bladewind::datepicker name="date2" format="mm-dd-yyyy"  />
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::datepicker name="date2" format="mm-dd-yyyy" /&gt;
        </code>
    </pre>

    <x-bladewind::datepicker name="date3" format="D d M, Y" type="range"  />
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::datepicker name="date3" format="D d M, Y" type="range" /&gt;
        </code>
    </pre>

    <x-bladewind::datepicker name="date4" format="yyyy-mm-dd"  />
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::datepicker name="date4" format="yyyy-mm-dd" /&gt;
        </code>
    </pre>


    <h2 id="defaults">With Default Values</h2>
    <p>
        There are times you will want the datepicker to load prepopulated with a default value. This is useful when in edit mode or when using filters and you want to show the user what dates they filtered by.
    </p>
    <x-bladewind::datepicker class="!w-44" selected_value="2021-12-03"  />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker selected_value="2021-12-03"  /&gt;
        </code>
    </pre>

    <p>
        It is possible to have default dates for a range datepicker also.
    </p>
    <x-bladewind::datepicker range="true" selected_value="2025-02-03 - 2025-02-23"  />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker range="true" selected_value="2021-12-03 - 2022-01-03"  /&gt;
        </code>
    </pre>

    <h2 id="minmax">Min and Max Dates</h2>
    <p>
        Setting minimum and maximum dates restrict the datepicker to display dates only within these specified dates.
        The <code class="inline text-red-500">min_date</code> attribute allows you to set the accepted minimum date.
        Any dates before this date will be disabled and grayed out. The <code class="inline text-red-500">max_date</code>
        attribute allows you to set the accepted maximum date. Any dates after this date will be disabled and grayed out.
    </p>
    <div class="flex"><x-bladewind::datepicker min_date="{{date('Y-m-d')}}"  /></div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker min_date="{{date('Y-m-d')}}" /&gt;
        </code>
    </pre>
    <br />
    <div class="flex"><x-bladewind::datepicker max_date="{{date('Y-m-t')}}"  /></div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker max_date="{{date('Y-m-t')}}" /&gt;
        </code>
    </pre>

    <br />
    <div class="flex"><x-bladewind::datepicker min_date="{{date('Y-m-01')}}" max_date="{{date('Y-m-t')}}"  /></div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker min_date="{{date('Y-m-01')}}" max_date="{{date('Y-m-t')}}" /&gt;
        </code>
    </pre>
    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Calendar component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>bw-datepicker</td>
            <td>This name can be accessed when the input is submitted in the form. The name is also available as part of the css classes.</td>
        </tr>
        <tr>
            <td>range</td>
            <td>false</td>
            <td>Allow range selection. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>selected_value</td>
            <td><em>blank</em></td>
            <td>In case you are editing a form, the value passed will be set on the value attribute of the datepicker input.
                <code class="inline text-red-500">&lt;input type="text" <b>value=""</b> ../&gt;</code></td>
        </tr>
        <tr>
            <td>min_date</td>
            <td><em>blank</em></td>
            <td>Restrict the date to start from this. Any dates before this will be disabled and grayed out.</td>
        </tr>
        <tr>
            <td>max_date</td>
            <td><em>blank</em></td>
            <td>Restrict the date to end at this. Any dates after this will be disabled and grayed out.</td>
        </tr>
        <tr>
            <td>format</td>
            <td>yyyy-mm-dd</td>
            <td>How date should be formatted.<br /><code class="inline">yyyy-mm-dd</code>
                <code class="inline">dd-mm-yyyy</code> <code class="inline">mm-dd-yyyy</code>
                <code class="inline">yyyy/mm/dd</code>
                <code class="inline">dd/mm/yyyy</code> <code class="inline">mm/dd/yyyy</code>
                <code class="inline">D d M, Y</code></td>
        </tr>
        <tr>
            <td>placeholder</td>
            <td>Select a date</td>
            <td>Placeholder text to display</td>
        </tr>
        <tr>
            <td>label</td>
            <td>Select a date</td>
            <td>Label text to display</td>
        </tr>
        <tr>
            <td>required</td>
            <td>false</td>
            <td>Determines if the placeholder text should have an asterisk appended to it or not. Value needs to be set as a string not boolean.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>week_starts</td>
            <td>sunday</td>
            <td>Choose between Sunday and Monday as the first day of the week. <br> <code class="inline">sunday</code> <code class="inline">monday</code> </td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-datepicker</td>
            <td>Any additional css classes can be added using this attribute.</td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
        <tr>
            <td>size</td>
            <td>medium</td>
            <td>
                Sizing of the input to match button sizes in case you have a datepicker and a button on one line.<br />
                <code class="inline">tiny</code> <code class="inline">small</code><code class="inline">regular</code> <code class="inline">big</code>
            </td>
        </tr>
    </x-bladewind::table>

    <h3>Calendar with all attributes defined</h3>
    <pre class="language-markup line-numbers">
<code>
    &lt;x-bladewind::datepicker
        name="invoice_date"
        range="true"
        required="false"
        placeholder="Invoice Date"
        selected_value=""
        format="dd/mm/yyyy"
        min_date="01/11/2025"
        max_date="01/12/2025"
        week_starts="monday"
        size="big"
        class="shadow-sm" /&gt;
</code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > datepicker.blade.php</code>
    </x-bladewind::alert><br />
    <x-bladewind::alert show_close_icon="false">
        The source language (translation) files for this component are available in <code class="inline">vendor/bladewindui/bladewindui/lang/[lang]/datepicker.php</code>
    </x-bladewind::alert><br />
    <x-bladewind::alert show_close_icon="false">
        The source javascript file for this component is available in <code class="inline">public/vendor/bladewind/js/datepicker.js</code>
    </x-bladewind::alert><br />

    <a href="/customize#datepicker-translations">Read the notes</a> on how to modify the Calendar translations

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#range">Range datepicker</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#required">Show as required</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#formats">Date formats</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#defaults">With default values</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#minmax">Min and max dates</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-datepicker');
        </script>
    </x-slot>
</x-app>
