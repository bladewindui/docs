<x-app>
    <x-slot:title>Toggle Component</x-slot:title>
    <x-slot:page_title>Toggle</x-slot:page_title>

    <p>
        Display a toggle input. Under the hood, the toggle component is a checkbox spiced up nicely.
    </p>
    <p><x-bladewind::toggle /></p>
    @php
        $toggleExample1 = <<<'HTML'
            <x-bladewind::toggle  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample1"></x-bladewind::code-block>
    <p>
        You can display the toggle component with a label that can be positioned either on the left or right of the component.
        The default position is left but can easily be flipped to the right by setting the attribute <code class="inline text-red-500">label_position="right"</code>.
        Clicking on the label toggles the component.
    </p>
    <p><x-bladewind::toggle label="Send me quarterly newsletters" /></p>
    @php
        $toggleExample2 = <<<'HTML'
            <x-bladewind::toggle label="Send me quarterly newsletters"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample2"></x-bladewind::code-block>
    <p><x-bladewind::toggle label="Send me quarterly newsletters" label_position="right" /></p>
    @php
        $toggleExample3 = <<<'HTML'
            <x-bladewind::toggle
                label="Send me quarterly newsletters"
                label_position="right"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3" :code="$toggleExample3"></x-bladewind::code-block>

    <p>
        The toggle component by default is displayed as an inline-flex element to enable you sit multiple toggles side by side.
        If you prefer your toggles to fill up their parent containers and be justified with the label, set <code class="inline text-red-500">justified="true"</code>.
    </p>
    <p><x-bladewind::toggle label="Send me quarterly newsletters" justified="true" /></p>
    @php
        $toggleExample4 = <<<'HTML'
            <x-bladewind::toggle
                label="Send me quarterly newsletters"
                justified="true"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3" :code="$toggleExample4"></x-bladewind::code-block>

    <h2 id="thin-thicker-bar">Thin and Thicker Bars</h2>
    <p>
        The toggle component can have a thinner bar like is seen on most Android devices and thicker bar as seen on iOS.
        Set <code class="inline text-red-500">bar="thin"</code> or <code class="inline text-red-500">bar="thicker"</code>. The default bar is set at <code class="inline text-red-500">bar="thick"</code>.
    </p>
    <p><x-bladewind::toggle label="Send me quarterly newsletters" bar="thin" /></p>
    @php
        $toggleExample5 = <<<'HTML'
            <x-bladewind::toggle
                label="Send me quarterly newsletters"
                bar="thin"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3" :code="$toggleExample5"></x-bladewind::code-block>
    <p><x-bladewind::toggle label="Send me quarterly newsletters" bar="thicker" /></p>
    @php
        $toggleExample6 = <<<'HTML'
            <x-bladewind::toggle
                label="Send me quarterly newsletters"
                bar="thicker"  />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3" :code="$toggleExample6"></x-bladewind::code-block>

    <h2 id="checked">Checked and Disabled</h2>
    <p>
        The toggle component can be checked and/or disabled by default. To check the component set <code class="inline text-red-500">checked="true"</code>. To mark the toggle as disabled, set <code class="inline text-red-500">disabled="true"</code>.
    </p>
    <p><x-bladewind::toggle label="I am checked at birth" checked="true" /></p>
    @php
        $toggleExample7 = <<<'HTML'
            <x-bladewind::toggle
                checked="true"
                label="I am checked at birth" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$toggleExample7"></x-bladewind::code-block>
    <p><x-bladewind::toggle label="You can't push me around" disabled="true" /></p>
    @php
        $toggleExample8 = <<<'HTML'
            <x-bladewind::toggle
                disabled="true"
                label="I am checked at birth" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$toggleExample8"></x-bladewind::code-block>
    <p><x-bladewind::toggle label="I am checked but you still can't push me around" disabled="true" checked="true" /></p>
    @php
        $toggleExample9 = <<<'HTML'
            <x-bladewind::toggle
                checked="true" disabled="true"
                label="I am checked at birth" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$toggleExample9"></x-bladewind::code-block>

    <h2 id="colours">Different Colours</h2>
    <p>
        There are nine colours to pick from when the toggle component is active or checked. To set your preferred colour set the <code class="inline text-red-500">color</code> attribute.
    </p>
    <p>
        <x-bladewind::toggle color="red" checked="true" /> &nbsp;&nbsp; <x-bladewind::toggle color="yellow" checked="true" /> &nbsp;&nbsp;
        <x-bladewind::toggle color="green" checked="true" /> &nbsp;&nbsp; <x-bladewind::toggle color="pink" checked="true" /> &nbsp;&nbsp;
        <x-bladewind::toggle color="cyan" checked="true" /> &nbsp;&nbsp; <x-bladewind::toggle color="gray" checked="true" /> &nbsp;&nbsp;
        <x-bladewind::toggle color="purple" checked="true" /> &nbsp;&nbsp; <x-bladewind::toggle color="orange" checked="true" /> &nbsp;&nbsp;
        <x-bladewind::toggle checked="true" /> &nbsp;&nbsp;
    </p>
    <p>@php
        $toggleExample10 = <<<'HTML'
            <x-bladewind::toggle color="red" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample10"></x-bladewind::code-block></p>
    <p>@php
        $toggleExample11 = <<<'HTML'
            <x-bladewind::toggle color="yellow" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample11"></x-bladewind::code-block></p>
    <p>@php
        $toggleExample12 = <<<'HTML'
            <x-bladewind::toggle color="green" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample12"></x-bladewind::code-block></p>
    <p>@php
        $toggleExample13 = <<<'HTML'
            <x-bladewind::toggle color="pink" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample13"></x-bladewind::code-block></p>
    <p>@php
        $toggleExample14 = <<<'HTML'
            <x-bladewind::toggle color="cyan" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample14"></x-bladewind::code-block></p>
    <p>@php
        $toggleExample15 = <<<'HTML'
            <x-bladewind::toggle color="gray" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample15"></x-bladewind::code-block></p>
    <p>@php
        $toggleExample16 = <<<'HTML'
            <x-bladewind::toggle color="purple" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample16"></x-bladewind::code-block></p>
    <p>@php
        $toggleExample17 = <<<'HTML'
            <x-bladewind::toggle color="orange" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample17"></x-bladewind::code-block></p>
    <p>@php
        $toggleExample18 = <<<'HTML'
            <x-bladewind::toggle color="blue" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$toggleExample18"></x-bladewind::code-block></p>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Toggle component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>bw-toggle</td>
            <td>Unique name to identify the component and access its value when submitted.</td>
        </tr>
        <tr>
            <td>label</td>
            <td><em>blank</em></td>
            <td>Clickable label to display next to the toggle component</td>
        </tr>
        <tr>
            <td>label_position</td>
            <td>left</td>
            <td>Specifies where the label should be positioned. <br /><code class="inline">left</code> <code class="inline">right</code></td>
        </tr>
        <tr>
            <td>disabled</td>
            <td>false</td>
            <td>Specifies if the toggle is disabled or not. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>checked</td>
            <td>false</td>
            <td>Specifies if the toggle is checked or not. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>color</td>
            <td>primary</td>
            <td>There are nine colors to choose from. <br />
                <code class="inline">red</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">pink</code>
                <code class="inline">cyan</code> <code class="inline">purple</code> <code class="inline">gray</code> <code class="inline">orange</code></td>
        </tr>
        <tr>
            <td>justified</td>
            <td>false</td>
            <td>Specifies if the label and toggle are spread out to evenly fill up the parent container. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>bar</td>
            <td>thick</td>
            <td>Specifies the size for the slider bar. <br /><code class="inline">thin</code> <code class="inline">thick</code> <code class="inline">thicker</code></td>
        </tr>
        <tr>
            <td>onclick</td>
            <td>javascript:void(0)</td>
            <td>Javascript function to call when the toggle is clicked. This is fired both when the toggle is checked or not. You will need to programmatically determine if the toggle is checked or not.</td>
        </tr>
    </x-bladewind::table>

    <h3>Toggle with all attributes defined</h3>
    @php
        $toggleExample19 = <<<'HTML'
            <x-bladewind::toggle
                color="purple"
                label="Send me quarterly newsletters"
                label_position="right"
                name="subscribe"
                justified="false"
                disabled="false"
                bar="thin"
                checked="false"
                onclick="alert('hey there')" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$toggleExample19"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > toggle.blade.php</code>
    </x-bladewind::alert>
    <p>&nbsp;</p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#thin-thicker-bar">Thin & thicker bars</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#checked">Checked and disabled</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#colours">Different colours</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-toggle');
        </script>
    </x-slot>
</x-app>
