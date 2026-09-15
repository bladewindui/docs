<x-app>
    <x-slot name="title">Timepicker Component</x-slot>
    <h1 class="page-title">Timepicker</h1>
            <p>
                Display a timepicker. There are two styles to choose from. Popup and inline. The default is popup.
            </p>

            <x-bladewind::timepicker/>

    @php
        $timepickerExample1 = <<<'HTML'
            <x-bladewind::timepicker  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample1"></x-bladewind::code-block>
            <br />
            <x-bladewind::timepicker style="inline"  />
            @php
        $timepickerExample2 = <<<'HTML'
            <x-bladewind::timepicker style="inline"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample2"></x-bladewind::code-block>

            <h3>Time Formats</h3>
            <p>
                By default the timepicker displays time in the 12 hour format. This format has hours from 1 to 12 and an AM/PM suffix.
                To change this to a 24 hour format, set <code class="inline text-red-500">format="24"</code>. The 24 hour time format gets rid
                of AM/PM suffix and displays the hours from 00 to 23. Note how the hours in 24 hour format are double digits.
            </p>

            <x-bladewind::timepicker format="24" />
            @php
        $timepickerExample3 = <<<'HTML'
            <x-bladewind::timepicker format="24"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample3"></x-bladewind::code-block>
            <br />
            <x-bladewind::timepicker style="inline" format="24" />
            @php
        $timepickerExample4 = <<<'HTML'
            <x-bladewind::timepicker style="inline" format="24"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample4"></x-bladewind::code-block>
            <h3>Required Fields</h3>
            <p>An asterisk is appended to the placeholder text when <code class="inline text-red-500">required="true"</code>.</p>

            <x-bladewind::timepicker required="true"  /> &nbsp;&nbsp;&nbsp;
            <x-bladewind::timepicker label="HH:MM" required="true"  />
            @php
        $timepickerExample5 = <<<'HTML'
            <x-bladewind::timepicker required="true"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample5"></x-bladewind::code-block>
            @php
        $timepickerExample6 = <<<'HTML'
            <x-bladewind::timepicker label="HH:MM" required="true"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample6"></x-bladewind::code-block>
    <br />
            <x-bladewind::timepicker style="inline" required="true"  />
            @php
        $timepickerExample7 = <<<'HTML'
            <x-bladewind::timepicker style="inline" required="true"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample7"></x-bladewind::code-block>

            <h3>Default Values</h3>
            <p>
                There are times you will want the timepicker to be prepopulated with a default time. This is useful when in edit mode.
                To achieve this, set the <code class="text-red-500 inline">selected</code> attribute to the time you will like to display.
                The format of the time you set will depend on the <code class="text-red-500 inline">format</code> defined on the timepicker.
            </p>
            <x-bladewind::timepicker selected_value="3:25PM"  />
            <x-bladewind::timepicker selected_value="03:25" format="24" />
            @php
        $timepickerExample8 = <<<'HTML'
            <x-bladewind::timepicker selected_value="3:25PM"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample8"></x-bladewind::code-block>
            @php
        $timepickerExample9 = <<<'HTML'
            <x-bladewind::timepicker selected_value="03:25" format="24" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample9"></x-bladewind::code-block>
            <br />
            <x-bladewind::timepicker style="inline" selected_value="3:25PM"  />
            <x-bladewind::timepicker style="inline" format="24" selected_value="03:25"  />
            <x-bladewind::timepicker required="true" style="inline" format="24" selected_value="03:25"  />
            @php
        $timepickerExample10 = <<<'HTML'
            <x-bladewind::timepicker style="inline" selected_value="3:25PM"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample10"></x-bladewind::code-block>
            @php
        $timepickerExample11 = <<<'HTML'
            <x-bladewind::timepicker style="inline" format="24" selected_value="03:25"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample11"></x-bladewind::code-block>
@php
        $timepickerExample12 = <<<'HTML'
            <x-bladewind::timepicker
                required="true"
                style="inline"
                format="24"
                selected_value="03:25"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample12"></x-bladewind::code-block>

        <h3>Form Values</h3>
    <p>
        Typically in a form, you should specify a <code class="inline">name</code> for your timepicker component. A default random name is generated if no name is specified.
        Let's assume in our
        form the timepicker is named <code class="inline">event_time</code>. An input is created with the name specified. In this case
        <code class="inline">event_time</code>.
    </p>
    <p>
        When your form is submitted, you will be able to retrieve the time as shown below.
    </p>
    @php
        $timepickerExample13 = <<<'HTML'
            // if format="12" (default)
            $request->event_time; // outputs 1:25PM

            // if format="24"
            $request->event_time; // outputs 01:25
            HTML;
    @endphp
    <x-bladewind::code-block language="php" line_numbers="true" :code="$timepickerExample13"></x-bladewind::code-block>

            <p>&nbsp;</p>
            <h2>Full List Of Attributes</h2>
            <p>The table below shows a comprehensive list of all the attributes available for the timepicker component.</p>
            @include('docs/announcement')
            <x-bladewind::table striped="true">
                <x-slot name="header">
                    <th>Option</th>
                    <th>Default</th>
                    <th>Available Values</th>
                </x-slot>
                <tr>
                    <td>name</td>
                    <td>bw-timepicker</td>
                    <td>This name can be accessed when the input is submitted in the form.</td>
                </tr>
                <tr>
                    <td>format</td>
                    <td>12</td>
                    <td>The format time should be displayed in. <code class="inline">12</code> <code class="inline">24</code></td>
                </tr>
                <tr>
                    <td>selected_value</td>
                    <td><em>blank</em></td>
                    <td>In edit mode, the value passed will be set as the default time.</td>
                </tr>
                <tr>
                    <td>hour_label</td>
                    <td>HH</td>
                    <td>Label to display for the hour dropdown.</td>
                </tr>
                <tr>
                    <td>minute_label</td>
                    <td>MM</td>
                    <td>Label to display for the minute dropdown.</td>
                </tr>
                <tr>
                    <td>format_label</td>
                    <td>--</td>
                    <td>This applies only if using the inline timepicker. Label to display for the time format dropdown.</td>
                </tr>
                <tr>
                    <td>placeholder</td>
                    <td>HH:MM</td>
                    <td>This applies only if using the popup style. Placeholder to display in the input field.</td>
                </tr>
                <tr>
                    <td>label</td>
                    <td><em>blank</em></td>
                    <td>This applies only if using the popup style. Label to display in the input field. The label behaves just like in the BladewindUI <a href="/component/input">Input component</a></td>
                </tr>
                <tr>
                    <td>style</td>
                    <td>popup</td>
                    <td>Determines how to display the timepicker.<br> <code class="inline">popup</code> <code class="inline">inline</code> </td>
                </tr>
                <tr>
                    <td>required</td>
                    <td>false</td>
                    <td>Determines if the placeholder text should have an asterisk appended to it or not. Value needs to be set as a string not boolean.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
                </tr>
                <tr>
                    <td>nonce</td>
                    <td>null</td>
                    <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
                </tr>
            </x-bladewind::table>
            <p>&nbsp;</p>
            <h3 class="pb-2 ">Timepicker with all attributes defined</h3>
@php
        $timepickerExample14 = <<<'HTML'
            <x-bladewind.timepicker
                name="start_time"
                format="24"
                required="false"
                hour_label="hh"
                minute_label="mm"
                format_label="AM/PM"
                placeholder="Start Time"
                label="Start Time"
                style="inline"
                selected_value="12:35AM" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$timepickerExample14"></x-bladewind::code-block>

    <p>&nbsp;</p>
    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > timepicker.blade.php</code>
    </x-bladewind::alert><br/>
    <x-bladewind::alert show_close_icon="false">
        The source language (translation) files for this component are available in <code class="inline">lang/[lang]/timepicker.php</code>
    </x-bladewind::alert><br />
    <h2 id="livewire">Using Timepicker Inside Livewire</h2>
    <p>
        When a time is set or cleared, the value field dispatches a real, native <code class="inline">change</code> event, so
        Livewire's <code class="inline">wire:model</code> picks it up without any extra work on your part. The bindings that drive
        the timepicker are safe to re-run, so a Livewire re-render will not leave behind duplicate listeners.
    </p>
    <p>&nbsp;</p>
    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#livewire">Using Timepicker inside Livewire</a></div>
    </x-slot:side_nav>
    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-timepicker');
        </script>
    </x-slot>
</x-app>
