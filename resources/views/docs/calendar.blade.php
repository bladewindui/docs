<x-app>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <x-slot:title>Datepicker Component</x-slot:title>
    <x-slot:page_title>Datepicker</x-slot:page_title>
    <x-bladewind::notification />

    <p>
        Display a calendar so user can select a date. The calendar component is locale friendly. Months and days are translated.
    </p>
    <p>
        <x-bladewind::alert show_close_icon="false" type="error">
            This component requires the AlpineJS library to work. Ensure you include the script below if you don't have AlpineJS already in your project.
        </x-bladewind::alert>
    </p>
    <pre class="lang-markup">
        <code>
            &lt;script src="//unpkg.com/alpinejs" defer&gt;&lt;/script&gt;
        </code>
    </pre>
    <p>
        <x-bladewind::alert show_close_icon="false" type="info">
            This component builds on the code by <a href="https://tailwindcomponents.com/u/mithicher" target="_blank">mithicher</a> available <a href="https://tailwindcomponents.com/component/datepicker-with-tailwindcss-and-alpinejs" target="_blank">here</a>
        </x-bladewind::alert>
    </p>
    <x-bladewind::datepicker name="invoice_date_2"   />

    <script>
        const inputElement = document.querySelector('input[x-ref="invoice_date_2"]');
        // inputElement._x_model.set('New value');
    </script>

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

    <h2 id="range">Range Datepicker</h2>
    <p>
        This range datepicker isn't your typical date range selection you will find on airline websites.
        This option simply saves you from manually embedding the datepicker two times.
        Specifying <code class="inline text-red-500">type="range"</code> will create two separate datepicker boxes for start and end dates.
    </p>
    <x-bladewind::datepicker type="range"  />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker type="range"  /&gt;
        </code>
    </pre>

    <p>
        The default placeholder texts for the range datepicker are <b>From</b> and <b>To</b>. These can however, be modified using the <code class="inline text-red-500">date_from_label</code> and <code class="inline text-red-500">date_to_label</code> attributes. These attributes only work if <code class="inline text-red-500">type="range"</code>.
        Also, we introduced <code class="text-red-500 inline">stacked="true"</code> to stack the datepickers vertically.</p>
    <div class="max-w-sm">
        <x-bladewind::datepicker type="range" stacked="true" date_from_label="start date" date_to_label="end date"  />
    </div>
    <br />
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker
                type="range"
                date_from_label="start date"
                date_to_label="end date" /&gt;
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

    <h3 id="validation">Validating The Range Picker</h3>
    <p>
        The date range picker comes with optional date validation. This validation only checks to ensure the
        end date is not less than the start date. To enforce validation of the date range picker, set
        <code class="inline text-red-500">validate="true"</code>. This is only applied if <code class="inline text-red-500">type="range"</code>.
    </p>
    <p>
        When you activate validation,
        you will need to provide the message to be displayed when a user selects an end date
        that is less than the start date. This is provided as an option to make it translatable.
        Set <code class="text-red-500 inline">validation_message="your message here"</code>
    </p>
    <p>
        <x-bladewind::datepicker type="range" date_from_label="task starts" date_to_label="task due" date-from-name="validate1" date-to-name="validate2"
                                 validate="true" validation_message="Seriously!, you know your task cannot end before you even got started"  />
    </p>
    <pre class="language-markup line-numbers" data-line="5">
<code>
&lt;x-bladewind::datepicker
    type="range"
    date_from_label="task starts"
    date_to_label="task due"
    validate="true"
    validation_message="Seriously!, you know your task cannot end before you even got started"  /&gt;
</code>
</pre>

    <p>
        By default, the error validation message is displayed in the BladewindUI notification component. You will need
        to ensure you have the <code class="inline">x-bladewind.notification</code> component on your page for the error message to be visible. If you prefer to display the error
        message inline, under the date fields, simply set <code class="inline text-red-500">show_error_inline="true"</code>
    </p>
    <p>
        The validation is handled by the <a href="/extra/helper-functions#comparedates"><code class="inline">compareDates()</code></a> helper function and returns a boolean (0 or 1).
        False (0) means there was an error. The range datepicker places the start date next to the end date. There are cases where your display will require you to have
        your end date below the start. In this case you will need to use two datepickers. You can still use this helper function to
        validate your start and end dates.
    </p>

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
    <x-bladewind::datepicker css="!w-44" default_date="2021-12-03"  />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker default_date="2021-12-03"  /&gt;
        </code>
    </pre>

    <p>
        It is possible to have default dates for a range datepicker also.
    </p>
    <x-bladewind::datepicker type="range" default_date_from="2021-12-03" default_date_to="2022-01-03"  />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker
                type="range"
                default_date_from="2021-12-03"
                default_date_to="2022-01-03"  /&gt;
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
    <p>The table below shows a comprehensive list of all the attributes available for the Datepicker component.</p>
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
            <td>type</td>
            <td>single</td>
            <td><code class="inline">single</code> <code class="inline">range</code></td>
        </tr>
        <tr>
            <td>default_date</td>
            <td><em>blank</em></td>
            <td>In case you are editing a form, the value passed will be set on the value attribute of the datepicker input.
                <code class="inline text-red-500">&lt;input type="text" <b>value=""</b> ../&gt;</code></td>
        </tr>
        <tr>
            <td>default_date_from</td>
            <td><em>blank</em></td>
            <td>Default date to set for the <em>From</em> date when using the range datepicker.</td>
        </tr>
        <tr>
            <td>default_date_to</td>
            <td><em>blank</em></td>
            <td>Default date to set for the <em>To</em> date when using the range datepicker.</td>
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
            <td>date_from_label</td>
            <td>From</td>
            <td>Placeholder text to display for the <code>From</code> date. Applicable only to range datepickers.</td>
        </tr>
        <tr>
            <td>date_to_label</td>
            <td>To</td>
            <td>Placeholder text to display for the <code>To</code> date. Applicable only to range datepickers.</td>
        </tr>
        <tr>
            <td>format</td>
            <td>yyyy-mm-dd</td>
            <td>How date should be formatted.<code class="inline">yyyy-mm-dd</code>
                <code class="inline">dd-mm-yyyy</code> <code class="inline">mm-dd-yyyy</code>
                <code class="inline">D d M, Y</code></td>
        </tr>
        <tr>
            <td>placeholder</td>
            <td>Select a date</td>
            <td>Placeholder text to display</td>
        </tr>
        <tr>
            <td>required</td>
            <td>false</td>
            <td>Determines if the placeholder text should have an asterisk appended to it or not. Value needs to be set as a string not boolean.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>onblur</td>
            <td><em>blank</td>
            <td>Custom function to call when the datepicker loses focus. This can be the entire function with parameters. Bladewind does not interfere with this.</td>
        </tr>
        <tr>
            <td>week_starts</td>
            <td>sun</td>
            <td>Choose between Sunday and Monday as the first day of the week. The week_starts value defined by the first datepicker on your page is applied to all other datepickers on the page. <br> <code class="inline">sun</code> <code class="inline">mon</code> </td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-datepicker</td>
            <td>Any additonal css classes can be added using this attribute.</td>
        </tr>
        <tr>
            <td>validate</td>
            <td>false</td>
            <td>Applied if <code class="inline text-red-500">type="range"</code> to enforce if the start date should not be greater than the end date. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>validation_message</td>
            <td>Your end date cannot be less than your start date</td>
            <td>Applied if <code class="inline text-red-500">type="range"</code>. Message to display if there is a validation error.</td>
        </tr>
        <tr>
            <td>show_error_inline</td>
            <td>false</td>
            <td>Applied if <code class="inline text-red-500">type="range"</code> to specify how the error should be displayed. By default, it is displayed in the Bladewind <a href=/component/notification"">Notification</a> component. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>use_placeholder</td>
            <td>true</td>
            <td>Applied if <code class="inline text-red-500">type="range"</code> to specify if the placeholder should be explicitly used instead of labels. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>stacked</td>
            <td>true</td>
            <td>Applied if <code class="inline text-red-500">type="range"</code> to specify if the datepickers should be stacked vertically. <br /><code class="inline">true</code> <code class="inline">false</code></td>
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

    <h3>Datepicker with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::datepicker
                name="invoice_date"
                type="single"
                required="false"
                placeholder="Invoice Date"
                date_from=""
                date_to=""
                default_date=""
                has_label="true"
                validate="false"
                show_error_inline="true"
                stacked="true"
                use_placeholder="false"
                validation_message="end date before start date! Really?"
                onblur="copyDate('copy_from', 'copy_to')"
                week_starts="mon"
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
    <x-bladewind::alert show_close_icon="false">
        This component REQUIRES AlpineJs. This is not included in the library so you will need to include this for the datepicker to work.
        <code class="inline">&lt;script defer src="//unpkg.com/alpinejs"&gt;&lt;/script&gt;</code>
    </x-bladewind::alert><br />

    <a href="/customization">Read the notes</a> on how to modify the Datepicker translations.

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#range">Range datepicker</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#required">Show as required</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#validation">Validation</a></div>
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
