<x-app>
    <x-slot:title>Progress Bar Component</x-slot:title>
    <x-slot:page_title>Progress Bar</x-slot:page_title>

    <p>
         Display progress.
        The progress bar expects a percentage. The bar will then fill up to the percentage specified. There is a subtle animation when the bar is filling up to its desired percentage. The default progress bar color is blue.
    </p>

    <p class="mt-14">
        <x-bladewind::progress-bar percentage="36" />
    </p>
    @php
        $progressUbarExample1 = <<<'HTML'
            <x-bladewind::progress-bar percentage="36" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample1"></x-bladewind::code-block>

    <p>
        The progress bar percentage is not displayed by default. To display it, set the attribute <code class="inline text-red-500">show_percentage_label="true"</code>.
        The progress bar percentage will then be displayed but within the bar.
    </p>
    <p class="mt-14">
        <x-bladewind::progress-bar percentage="36" show_percentage_label="true" />
    </p>
    @php
        $progressUbarExample2 = <<<'HTML'
            <x-bladewind::progress-bar percentage="36" show_percentage_label="true" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample2"></x-bladewind::code-block>

    <p>
        If you prefer to have the percentage out of the bar, set <code class="inline text-red-500">show_percentage_label_inline="false"</code>.
        With the percentage now out of the bar, you can specify if it
        should be placed above or below the bar. The default is top left. To change the positioning of the  percentage label, you need to set the
        <code class="inline text-red-500">percentage_label_position</code> attribute. The available options are <code class="inline">top left</code>
        <code class="inline">top center</code> <code class="inline">top right</code> <code class="inline">bottom left</code> <code class="inline">bottom center</code>
        <code class="inline">bottom right</code>.
    </p>
    <p class="mt-14">
        <x-bladewind::progress-bar percentage="36" show_percentage_label="true" show_percentage_label_inline="false" />
    </p>
    <p class="mt-14">
        <x-bladewind::progress-bar percentage="53" show_percentage_label="true" show_percentage_label_inline="false" percentage_label_position="top center" />
    </p>
    @php
        $progressUbarExample3 = <<<'HTML'
            <x-bladewind::progress-bar
                percentage="53"
                show_percentage_label_inline="false"
                percentage_label_position="top center"
                show_percentage_label="true" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="4" :code="$progressUbarExample3"></x-bladewind::code-block>
    <p class="mt-14">
        <x-bladewind::progress-bar percentage="75" show_percentage_label="true" show_percentage_label_inline="false" percentage_label_position="top right" />
    </p>

    @php
        $progressUbarExample4 = <<<'HTML'
            <x-bladewind::progress-bar
                percentage="75"
                show_percentage_label_inline="false"
                percentage_label_position="top right"
                show_percentage_label="true" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="4" :code="$progressUbarExample4"></x-bladewind::code-block>
    <p>
        You may want to append a suffix or prepend a prefix to the percentage label to achieve things like <code class="inline">53% complete</code> or <code class="inline">Upload in progress: 53% complete</code>.
        Depending on your needs you can set <code class="inline text-red-500">percentage_prefix</code> and/or <code class="inline text-red-500">percentage_suffix</code>.
    </p>
    <p class="mt-14">
        <x-bladewind::progress-bar percentage="75" show_percentage_label="true"
            show_percentage_label_inline="false" percentage_suffix="complete" />
    </p>

    @php
        $progressUbarExample5 = <<<'HTML'
            <x-bladewind::progress-bar
                percentage="75"
                show_percentage_label_inline="false"
                percentage_suffix="complete"
                show_percentage_label="true" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="4" :code="$progressUbarExample5"></x-bladewind::code-block>

    <h2 id="colours">Different Colours</h2>
    <p>
        You can display a progress bar in nine different colours by setting the color attribute on the progress bar, like this, <code class="inline text-red-500">color="red"</code>.
        Like most BladewindUI components that have colour options, there are two shades, <code class="inline">faint</code>, and <code class="inline">dark</code>. The default shade is <code class="inline">faint</code>
    </p>
    <h3 id="faint">Faint Colours</h3>
    <p><x-bladewind::progress-bar percentage="10" color="red" /></p>
        @php
        $progressUbarExample6 = <<<'HTML'
            <x-bladewind::progress-bar percentage="10" color="red" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample6"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="20" color="yellow" /></p>
    @php
        $progressUbarExample7 = <<<'HTML'
            <x-bladewind::progress-bar percentage="20" color="yellow"/>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample7"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="30" color="green" /></p>
    @php
        $progressUbarExample8 = <<<'HTML'
            <x-bladewind::progress-bar percentage="30" color="green" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample8"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="40" color="pink" /></p>
    @php
        $progressUbarExample9 = <<<'HTML'
            <x-bladewind::progress-bar percentage="40" color="pink" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample9"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="50" color="cyan" /></p>
    @php
        $progressUbarExample10 = <<<'HTML'
            <x-bladewind::progress-bar percentage="50" color="cyan" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample10"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="60" color="gray" /></p>
    @php
        $progressUbarExample11 = <<<'HTML'
            <x-bladewind::progress-bar percentage="60" color="gray" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample11"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="70" color="purple" /></p>
    @php
        $progressUbarExample12 = <<<'HTML'
            <x-bladewind::progress-bar percentage="70" color="purple" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample12"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="80" color="orange" /></p>
    @php
        $progressUbarExample13 = <<<'HTML'
            <x-bladewind::progress-bar percentage="80" color="orange" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample13"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="80" color="violet" /></p>
    @php
        $progressUbarExample14 = <<<'HTML'
            <x-bladewind::progress-bar percentage="80" color="violet" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample14"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="80" color="fuchsia" /></p>
    @php
        $progressUbarExample15 = <<<'HTML'
            <x-bladewind::progress-bar percentage="80" color="fuchsia" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample15"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="80" color="indigo" /></p>
    @php
        $progressUbarExample16 = <<<'HTML'
            <x-bladewind::progress-bar percentage="80" color="indigo" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample16"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="90" /></p>
    @php
        $progressUbarExample17 = <<<'HTML'
            <x-bladewind::progress-bar percentage="90" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample17"></x-bladewind::code-block>
    <h3 id="dark">Dark Colours</h3>
    <p><x-bladewind::progress-bar percentage="50" color="red" shade="dark" /></p>
        @php
        $progressUbarExample18 = <<<'HTML'
            <x-bladewind::progress-bar percentage="50" shade="dark" color="red" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample18"></x-bladewind::code-block>
    </p>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="20" shade="dark" color="yellow" /></p>
        @php
        $progressUbarExample19 = <<<'HTML'
            <x-bladewind::progress-bar percentage="20" shade="dark" color="yellow" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample19"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="30" shade="dark" color="green" /></p>
        @php
        $progressUbarExample20 = <<<'HTML'
            <x-bladewind::progress-bar percentage="30" shade="dark" color="green" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample20"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="40" shade="dark" color="pink" /></p>
        @php
        $progressUbarExample21 = <<<'HTML'
            <x-bladewind::progress-bar percentage="40" shade="dark" color="pink" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample21"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="50" shade="dark" color="cyan" /></p>
        @php
        $progressUbarExample22 = <<<'HTML'
            <x-bladewind::progress-bar percentage="50" shade="dark" color="cyan" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample22"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="60" shade="dark" color="gray" /></p>
        @php
        $progressUbarExample23 = <<<'HTML'
            <x-bladewind::progress-bar percentage="60" shade="dark" color="gray" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample23"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="70" shade="dark" color="purple" /></p>
        @php
        $progressUbarExample24 = <<<'HTML'
            <x-bladewind::progress-bar percentage="70" shade="dark" color="purple" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample24"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="80" shade="dark" color="orange" /></p>
    @php
        $progressUbarExample25 = <<<'HTML'
            <x-bladewind::progress-bar percentage="80" shade="dark" color="orange" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample25"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="80" shade="dark" color="violet" /></p>
    @php
        $progressUbarExample26 = <<<'HTML'
            <x-bladewind::progress-bar percentage="80" shade="dark" color="violet" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample26"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="80" shade="dark" color="indigo" /></p>
    @php
        $progressUbarExample27 = <<<'HTML'
            <x-bladewind::progress-bar percentage="80" shade="dark" color="indigo" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample27"></x-bladewind::code-block>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="80" shade="dark" color="fuchsia" /></p>
    @php
        $progressUbarExample28 = <<<'HTML'
            <x-bladewind::progress-bar percentage="80" shade="dark" color="fuchsia" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample28"></x-bladewind::code-block>
    <div class="h-3"></div>
    <x-bladewind::progress-bar percentage="60" shade="dark" />
    @php
        $progressUbarExample29 = <<<'HTML'
            <x-bladewind::progress-bar percentage="90" shade="dark" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample29"></x-bladewind::code-block>
    <h2 id="striped">Striped and Animated</h2>
    <div class="h-3"></div>
    <p><x-bladewind::progress-bar percentage="60" shade="dark" color="red" striped="true" /></p>
    @php
        $progressUbarExample30 = <<<'HTML'
            <x-bladewind::progress-bar percentage="60" shade="dark" color="red" striped="true" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$progressUbarExample30"></x-bladewind::code-block>
    <div class="h-3"></div>
    <x-bladewind::progress-bar percentage="50" color="violet" shade="dark" animated="true" striped="true" />
@php
        $progressUbarExample31 = <<<'HTML'
            <x-bladewind::progress-bar
                percentage="50"
                shade="dark"
                color="violet"
                striped="true"
                animated="true" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="5,6" :code="$progressUbarExample31"></x-bladewind::code-block>
    {{-- <p>
    <h2>Dynamic Progression </h2>
    </p>
    <p>
    The percentage of the progress bar can be programmatically updated after the bar has been loaded. This might be useful when displaying file upload progress or even progress of dynamic report generation. The use cases are endless.
    </p> --}}

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
            <td>primary</td>
            <td>There are twelve colors to choose from. <br /><br /><code class="inline">primary</code><code class="inline">red</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">pink</code>
                <code class="inline">cyan</code> <code class="inline">purple</code> <code class="inline">gray</code> <code class="inline">orange</code> <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code></td>
        </tr>
        <tr>
            <td>show_percentage_label</td>
            <td>false</td>
            <td>Should the percentage label be displayed. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>show_percentage_label_inline</td>
            <td>true</td>
            <td>Should the percentage label be displayed within the progress bar. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>percentage_label_position</td>
            <td>top-left</td>
            <td>Specifies the placement of the percentage label. <br /><code class="inline">top-left</code> <code class="inline">top-center</code> <code class="inline">top-right</code> <code class="inline">bottom-left</code> <code class="inline">bottom-center</code> <code class="inline">bottom-right</code></td>
        </tr>
        <tr>
            <td>shade</td>
            <td>faint</td>
            <td>Works with <code class="inline">color</code> to determine how faint or dark the progress bar colours are. <br /><code class="inline">faint</code> <code class="inline">dark</code></td>
        </tr>
        <tr>
            <td>percentage_prefix</td>
            <td><em>blank</em></td>
            <td>Specifies what text should be displayed before the percentage label.</td>
        </tr>
        <tr>
            <td>percentage_suffix</td>
            <td><em>blank</em></td>
            <td>Specifies what text should be displayed after the percentage label.</td>
        </tr>
        <tr>
            <td>percentage_label_opacity</td>
            <td>100</td>
            <td>Specifies the opacity of the percentage label. In case you want the percentage label to be displayed a shade less than the prefix or suffix. Available values are what's been defined in the <a href="https://tailwindcss.com/docs/opacity" target="_blank">TailwindCSS docs for opacity</a> without the 'opacity-' prefix.<br/>
            <code class="inline">0</code> <code class="inline">5</code> <code class="inline">10</code> <code class="inline">20</code> <code class="inline">25</code> <code class="inline">30</code> <code class="inline">40</code> <code class="inline">50</code> <code class="inline">60</code> <code class="inline">70</code> <code class="inline">75</code> <code class="inline">80</code> <code class="inline">90</code> <code class="inline">95</code> <code class="inline">100</code>
            </td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-progress-bar</td>
            <td>Any additional css you wish to add.</td>
        </tr>
        <tr>
            <td>striped</td>
            <td>false</td>
            <td>Determines if the progress bar should be striped. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>animated</td>
            <td>false</td>
            <td>Determines if the <b>striped</b> progress bar should be animated. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
    </x-bladewind::table>

    <h3>Progress Bar with all attributes defined</h3>
@php
        $progressUbarExample32 = <<<'HTML'
            <x-bladewind::progress-bar
                percentage="50"
                color="red"
                show_percentage_label="false"
                show_percentage_label_inline="true"
                percentage_label_position="top-left"
                shade="faint"
                percentage_prefix="uploading content: "
                percentage_suffix="completed"
                striped="true"
                animated="true"
                class="m-0" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$progressUbarExample32"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > progress-bar.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#colours">Different colours</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#faint">Faint shade</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#dark">Darker shade</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#striped">Striped & animated</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-progress-bar');
        </script>
    </x-slot>
</x-app>
