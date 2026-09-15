<x-app>
    <x-slot:title>Progress Circle Component</x-slot:title>
    <x-slot:page_title>Progress Circle</x-slot:page_title>

    <p>
         Display progress in a circular form based on a specified percentage.
        There is a subtle animation that can be turned off by setting <code class="text-red-500 inline">animate="false"</code>.
    </p>
    <p>
        <x-bladewind::alert show_close_icon="false">
            This component borrows code from <a href="https://github.com/nikitahl" target="_blank">Nikitahl</a> available <a href="https://github.com/nikitahl/svg-circle-progress-generator" target="_blank">here</a>
        </x-bladewind::alert>
    </p>
    <p class="mt-14 text-center">
        <x-bladewind::progress-circle percentage="45" />
    </p>
    @php
        $progressUcircleExample1 = <<<'HTML'
            <x-bladewind::progress-circle percentage="45" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUcircleExample1"></x-bladewind::code-block>

    <p>
       By default the progress circle label is not displayed. That can be changed by setting <code class="inline text-red-500">show_label="true"</code>.
        The label (the percentage value) is then displayed but without the percentage sign. To display the percentage sign set the attribute <code class="inline text-red-500">show_percent="true"</code>.
    </p>
    <p class="mt-14 text-center">
        <x-bladewind::progress-circle percentage="58" show_label="true" />
        <x-bladewind::progress-circle percentage="58" show_label="true" show_percent="true" />
    </p>
    @php
        $progressUcircleExample2 = <<<'HTML'
            <x-bladewind::progress-circle percentage="58" show_label="true" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUcircleExample2"></x-bladewind::code-block>
    @php
        $progressUcircleExample3 = <<<'HTML'
            <x-bladewind::progress-circle
                percentage="58"
                show_label="true"
                show_percent="true" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3,4" :code="$progressUcircleExample3"></x-bladewind::code-block>

    <h2 id="colours">Different Colours</h2>
    <p>
        You can display a progress circle in nine different colours by setting the <code class="inline text-red-500">color</code> attribute to the preferred colour.
        Like most BladewindUI components that have colour options, there are two shades, <code class="inline">faint</code> and <code class="inline">dark</code>. The default shade is <code class="inline">faint</code> and the default colour is <code class="inline">blue</code>
    </p>
    <h3 id="faint">Faint Colours</h3>
    <div class="grid grid-cols-3 gap-4">
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="red" /> <br />Red</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="yellow" /> <br />Yellow</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="green" /> <br />Green</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="pink" /> <br />Pink</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="cyan" /> <br />Cyan</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="gray" /> <br />Gray</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="purple" /> <br />Purple</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="orange" /> <br />Orange</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="blue" /> <br />Blue</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="violet" /> <br />Violet</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="indigo" /> <br />Indigo</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" color="fuchsia" /> <br />Fuchsia</div>
    </div>
    <p>
        @php
        $progressUcircleExample4 = <<<'HTML'
            <x-bladewind::progress-circle percentage="10" color="red" />
            ...
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUcircleExample4"></x-bladewind::code-block>
    </p>

    <h3 id="dark">Dark Colours</h3>
    <div class="grid grid-cols-3 gap-4">
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="red" /> <br />Red</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="yellow" /> <br />Yellow</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="green" /> <br />Green</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="pink" /> <br />Pink</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="cyan" /> <br />Cyan</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="gray" /> <br />Gray</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="purple" /> <br />Purple</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="orange" /> <br />Orange</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="blue" /> <br />Blue</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="violet" /> <br />Violet</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="indigo" /> <br />Indigo</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="65" shade="dark" color="fuchsia" /> <br />Fuchsia</div>
    </div>
    <p>
        @php
        $progressUcircleExample5 = <<<'HTML'
            <x-bladewind::progress-circle
                percentage="10"
                shade="dark"
                color="red" />

            ...
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3" :code="$progressUcircleExample5"></x-bladewind::code-block>
    </p>
    <h2 id="sizes">Different Sizes</h2>
    <p>
        The progress circle comes in five prebuilt sizes with <code class="inline">medium</code> being the default size.
        To change the size of the circle set the <code class="text-red-500 inline">size</code> attribute. The available sizes are
        <code class="inline">tiny</code>, <code class="inline">small</code>, <code class="inline">medium</code>, <code class="inline">big</code>, <code class="inline">large</code>
    </p>
    <div class="grid grid-cols-3 gap-4">
        <div class="text-center"><x-bladewind::progress-circle percentage="73" size="tiny" /> <br />Tiny</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="73" size="small" /> <br />Small</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="73" size="medium" /> <br />Medium</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="73" size="big" /> <br />Big</div>
        <div class="text-center"><x-bladewind::progress-circle percentage="73" size="large" /> <br />Large</div>
    </div>
    <p>
        @php
        $progressUcircleExample6 = <<<'HTML'
            <x-bladewind::progress-circle
                size="tiny"
                percentage="10" />

            ...
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$progressUcircleExample6"></x-bladewind::code-block>
    </p>
<h2 id="custom-size">Custom Sizes</h2>
    <p>
        It is quite difficult to determine the perfect circle size that'll fit designs we don't even know about.
        For this reason Bladewind allows you to specify a custom size for this component if the prebuilt sizes don't suit your needs.
        Set the <code class="text-red-500 inline">size</code> attribute to any number above 50.
        Just to give you some context, the table below is a list of the current sizes and their corresponding values.
    </p>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Size</th>
            <th>Value</th>
        </x-slot>
        <tr>
            <td>tiny</td>
            <td>50</td>
        </tr>
        <tr>
            <td>small</td>
            <td>80</td>
        </tr>
        <tr>
            <td>medium</td>
            <td>120</td>
        </tr>
        <tr>
            <td>big</td>
            <td>200</td>
        </tr>
        <tr>
            <td>large</td>
            <td>300</td>
        </tr>
    </x-bladewind::table>
    <br />
    <p>
        The table above should give you an idea of what values to use for your custom sizes if you probably need something between
        small and medium for example. Or you may need a circle outrageously large like the example below.
    </p>
    <p class="text-center">
        <x-bladewind::progress-circle percentage="73" size="400" />
    </p>
    <p>
    @php
        $progressUcircleExample7 = <<<'HTML'
            <x-bladewind::progress-circle
                size="400"
                percentage="89" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$progressUcircleExample7"></x-bladewind::code-block>
    </p>
    <p>
        You will notice from the example above the circle width is quite thin for a circle that big. To increase the width of the circle set
        the <code class="text-red-500 inline">circle_width</code> attribute to a reasonable value.
        The default value for custom circles is <code class="inline">10</code>.
    </p>
    <p class="text-center">
        <x-bladewind::progress-circle percentage="73" size="400" circle_width="50" />
    </p>
    <p>
    @php
        $progressUcircleExample8 = <<<'HTML'
            <x-bladewind::progress-circle
                size="400"
                circle_width="50"
                percentage="89" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2,3" :code="$progressUcircleExample8"></x-bladewind::code-block>
    </p>
    <p>
        Things get a bit quirky when you need to display labels in custom circles. Again, because the circle size is unknown,
        it is a bit tricky to properly centre the label in the circle. There are additional attributes to help position the
        label properly in the circle. See example below.
    </p>
    <p class="text-center">
        <x-bladewind::progress-circle
            percentage="73" text_size="50" align="100" valign="0"
            size="400" circle_width="50" show_label="true" show_percent="true" />
    </p>
    <p>
    @php
        $progressUcircleExample9 = <<<'HTML'
            <x-bladewind::progress-circle
                percentage="73"
                size="400"
                circle_width="50"
                text_size="50"
                align="100"
                valign="0"
                show_label="true"
                show_percent="true"
            />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="5,6,7" :code="$progressUcircleExample9"></x-bladewind::code-block>
    </p>
    <p>
        See the table below for the definitions of the attributes used above.
    </p>
    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Progress Bar component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>percentage</td>
            <td>0</td>
            <td>Any value between 0 and 100.</td>
        </tr>
        <tr>
            <td>color</td>
            <td>blue</td>
            <td>There are twelve colors to choose from. <br /><code class="inline">red</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">pink</code>
                <code class="inline">cyan</code> <code class="inline">purple</code> <code class="inline">gray</code> <code class="inline">orange</code>
                <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code></td>
        </tr>
        <tr>
            <td>size</td>
            <td>medium</td>
            <td>The available sizes are: <br /><code class="inline">tiny</code> <code class="inline">small</code> <code class="inline">medium</code> <code class="inline">big</code> <code class="inline">large</code>
                <code class="inline">custom</code></td>
        </tr>
        <tr>
            <td>show_label</td>
            <td>false</td>
            <td>Should the percentage label be displayed. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>show_percent</td>
            <td>false</td>
            <td>Should the percentage sign be displayed. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>animate</td>
            <td>true</td>
            <td>Should the progress circle be animated when loaded. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>shade</td>
            <td>faint</td>
            <td>Works with <code class="inline">color</code> to determine how faint or dark the progress circle colours are. <br /><code class="inline">faint</code> <code class="inline">dark</code></td>
        </tr>
        <tr>
            <td>text_size</td>
            <td>30</td>
            <td>Controls how big the text should be. You can think of this as font size. Value can be any positive number</td>
        </tr>
        <tr>
            <td>align</td>
            <td>40</td>
            <td>Controls the position of the text horizontally. You will need to keep tweaking this value until the text sits in a position you desire.</td>
        </tr>
        <tr>
            <td>valign</td>
            <td>0</td>
            <td>Controls the position of the text vertically. 0 keeps the text in the centre of the circle. You will need to keep tweaking this value until the text sits in a position you desire. Negative values will position the text towards the top of the circle.</td>
        </tr>
        <tr>
            <td>circle_width</td>
            <td>30</td>
            <td>Controls the thickness of the circle. Value can be any positive number.</td>
        </tr>
    </x-bladewind::table>

    <h3>Progress Circle with all attributes defined</h3>
@php
        $progressUcircleExample10 = <<<'HTML'
            <x-bladewind::progress-circle
                percentage = "50"
                color = "red",
                show_label = "false",
                show_percent = "false",
                animate = "true",
                size="medium"
                circle_width="50"
                text_size="50"
                align="100"
                valign="0"
                shade = "faint" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$progressUcircleExample10"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > progress-circle.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#colours">Different colours</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#faint">Faint shade</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#dark">Darker shade</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sizes">Different sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#custom-size">Custom sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-progress-circle');
        </script>
    </x-slot>
</x-app>
