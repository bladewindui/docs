<x-app>
    <x-slot name="title">Number Component</x-slot>
    <h1 class="page-title">Number</h1>
            <p>
                Display a number component that allows you to increment and decrease the number in a user-friendly way.
            </p>

            <x-bladewind::number />
            <div class="mb-2"></div>
            <x-bladewind::number step="10" />

            @php
        $numberExample1 = <<<'HTML'
            <x-bladewind::number  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample1"></x-bladewind::code-block>
            @php
        $numberExample2 = <<<'HTML'
            <x-bladewind::number step="10"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample2"></x-bladewind::code-block>
    <br />
            <p>
                The Number component simply extends the BladewindUI <a href="/component/input">Input</a> component by making use of prefix and suffix icons as well as setting <code class="inline text-red-500">numeric="true"</code>.
                For this reason, a couple of the Input component attributes are available to the Number component.
            </p>
    <h2 id="sizes">Different Sizes</h2>
    <p>
        All the input component sizes are available to the number component. The up and down arrows are adjusted to match the input size.
        The number component sizes are also uniform with the input component sizes.
    </p>
    <div class="space-y-2">
        <div><x-bladewind::number size="small" /></div>
        <div><x-bladewind::number size="regular" /></div>
        <div><x-bladewind::number size="medium" /></div>
        <div><x-bladewind::number size="big" /></div>
    </div>
    @php
        $numberExample3 = <<<'HTML'
            <x-bladewind::number size="small" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample3"></x-bladewind::code-block>
    @php
        $numberExample4 = <<<'HTML'
            <x-bladewind::number size="regular" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample4"></x-bladewind::code-block>
    @php
        $numberExample5 = <<<'HTML'
            <x-bladewind::number size="medium" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample5"></x-bladewind::code-block>
    @php
        $numberExample6 = <<<'HTML'
            <x-bladewind::number size="big" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample6"></x-bladewind::code-block>

    <h2 id="button-bg">Button Transparency</h2>
    <p>
        By default the up and down buttons for increasing and decreasing the number are transparent within the Input fields.
        If you prefer to have them looking like proper buttons, set <code class="inline text-red-500">transparent_icons="false"</code>.
        This simply sets the Input component's <code class="inline text-red-500">transparent_prefix="false"</code> and
        <code class="inline text-red-500">transparent_suffix="false"</code> in the background.
    </p>

    <x-bladewind::number transparent_icons="false" />
    <div></div>
    <x-bladewind::number transparent_icons="false" size="big" />
    @php
        $numberExample7 = <<<'HTML'
            <x-bladewind::number transparent_icons="false" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample7"></x-bladewind::code-block>
    @php
        $numberExample8 = <<<'HTML'
            <x-bladewind::number transparent_icons="false" size="big" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample8"></x-bladewind::code-block>
    <h2 id="place-labels">Labels</h2>
    <p>
        It will make sense for users to know what it is you want them to increment or decrease. A field with no label will be quite
        hard to decipher. By default the number component is initialized to a <code class="inline text-red-500">selected_value="0"</code>.
        Setting a label in this case will move the label text to the top border of the input field.
    </p>
    <x-bladewind::number label="quantity" />
    @php
        $numberExample9 = <<<'HTML'
            <x-bladewind::number label="quantity"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample9"></x-bladewind::code-block>
    <br />
    <p>
        If you don't need to initialize your number component with a default value, you can set
        <code class="inline text-red-500">selected_value=""</code> and set the <code class="inline text-red-500">label</code>.
        The label will be displayed as a placeholder.
    </p>
    <p>
        <x-bladewind::alert type="info" show_close_icon="false">Traditional placeholders don't work in the number component.</x-bladewind::alert>
    </p>
    <x-bladewind::number selected_value="" label="quantity" />
    @php
        $numberExample10 = <<<'HTML'
            <x-bladewind::number selected_value="" label="quantity"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample10"></x-bladewind::code-block>
    <h2 id="min-max">Minimum and Maximum Limits</h2>
    <p>
        Clicking on the up arrow will keep increasing the numbers until you get tired of clicking. You will typically not want that to
        happen in your UIs. There's usually a minimum and maximum limit you want your users to click within. For example, when ordering a product the minimum will
        be 1 and maximum will be the total number of the product available in stock.
    </p>
    <p>
        You can achieve this by setting the <code class="inline text-red-500">min</code> and <code class="inline text-red-500">max</code> attributes on the component.
        The component handles validation and forces the user to stay within limits. If your <code class="inline text-red-500">max="12"</code> and the user clicks on the increment
        icon when at 12, the value will not be incremented. Even if the user manually types any number greater than 12, the component will reset the value to the max. The same applies
        when a minimum value is set.
    </p>
    <x-bladewind::number min="18" max="60" label="Your age" />
    @php
        $numberExample11 = <<<'HTML'
            <x-bladewind::number min="18" max="60" label="Your age"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample11"></x-bladewind::code-block>

    <h2 id="forms">Form Values</h2>
    <p>
        The <code class="inline text-red-500">name</code> you give the component is what will be available when your form is submitted.
        A default random name is generated if no name is specified.
        Let's assume in our form the number field is named <code class="inline">age</code>.
    </p>
    <p>
        When your form is submitted, you will be able to retrieve the time as shown below.
    </p>
    @php
        $numberExample12 = <<<'HTML'
            $request->age;
            HTML;
    @endphp
    <x-bladewind::code-block language="php" line_numbers="true" :code="$numberExample12"></x-bladewind::code-block>

            <p>&nbsp;</p>
            <h2>Full List Of Attributes</h2>
            <p>The table below shows a comprehensive list of all the attributes available for the number component.</p>
            @include('docs/announcement')
            <x-bladewind::table striped="true">
                <x-slot name="header">
                    <th>Option</th>
                    <th>Default</th>
                    <th>Available Values</th>
                </x-slot>
                <tr>
                    <td>name</td>
                    <td>'input-'.uniqid()</td>
                    <td>This name can be accessed when the input is submitted in the form.</td>
                </tr>
                <tr>
                    <td>with_dots</td>
                    <td>true</td>
                    <td>Should decimal values be allowed. <code class="inline">true</code> <code class="inline">false</code></td>
                </tr>
                <tr>
                    <td>selected_value</td>
                    <td>null</td>
                    <td>In edit mode, the value passed will be set as the default.</td>
                </tr>
                <tr>
                    <td>label</td>
                    <td><em>blank</em></td>
                    <td>Label to display in or above the component.</td>
                </tr>
                <tr>
                    <td>min</td>
                    <td>0</td>
                    <td>Minimum value allowed.</td>
                </tr>
                <tr>
                    <td>max</td>
                    <td>100</td>
                    <td>Maximum value allowed.</td>
                </tr>
                <tr>
                    <td>transparent_icons</td>
                    <td>true</td>
                    <td>Determines if up and down icons should be transparent or have a background colour.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
                </tr>
                <tr>
                    <td>icon_type</td>
                    <td>outline</td>
                    <td>The up and down arrows can either be outline or solid icons.<br> <code class="inline">outline</code> <code class="inline">solid</code> </td>
                </tr>
                <tr>
                    <td>size</td>
                    <td>medium</td>
                    <td>How big should the component be either as a standalone or in relation to other form fields.<br> <code class="inline">small</code> <code class="inline">regular</code> <code class="inline">small</code> <code class="inline">big</code> </td>
                </tr>
                <tr>
                    <td>required</td>
                    <td>false</td>
                    <td>Determines if the field should have an asterisk appended to it or not. <br> <code class="inline">true</code> <code class="inline">false</code> </td>
                </tr>
                <tr>
                    <td>step</td>
                    <td>1</td>
                    <td>By how what number should the value of the component be increased or decreased. </td>
                </tr>
                <tr>
                    <td>class</td>
                    <td><em>blank</em></td>
                    <td>Any extra css to apply to the input field. Useful if for example you need more room for the numbers. You can set the width. </td>
                </tr>
                <tr>
                    <td>nonce</td>
                    <td>null</td>
                    <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
                </tr>
            </x-bladewind::table>
            <p>&nbsp;</p>
            <h3 class="pb-2 ">Number with all attributes defined</h3>
@php
        $numberExample13 = <<<'HTML'
            <x-bladewind::number
                name="age"
                icon_type="outline"
                required="false"
                label="Age"
                size="big"
                transparent_icons="true"
                min="18"
                max="65"
                step="10"
                with_dots="false"
                selected_value="12" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$numberExample13"></x-bladewind::code-block>

    <p>&nbsp;</p>
    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > number.blade.php</code>
    </x-bladewind::alert><br/>
    <p>&nbsp;</p>
    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#sizes">Different sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#button-bg">Button transparency</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#place-labels">Placeholders & labels</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#min-max">Min & max limits</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>
    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-number');
        </script>
    </x-slot>
</x-app>
