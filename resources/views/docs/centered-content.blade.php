<x-app>
    <x-slot:title>Centered Content Component</x-slot:title>
    <x-slot:page_title>Centered Content</x-slot:page_title>
    <p>
        Center content within a container. This container could be any block level element, say a <code class="inline">div</code>
    </p>

    <x-bladewind::centered-content size="tiny">
        <x-bladewind::card>
            this card is centered in this column
        </x-bladewind::card>
    </x-bladewind::centered-content>

    @php
        $centeredUcontentExample1 = <<<'HTML'
            <x-bladewind::centered-content size="tiny">

                <x-bladewind::card>
                    this content is centered in this column
                </x-bladewind::card>

            </x-bladewind::centered-content>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="1" :code="$centeredUcontentExample1"></x-bladewind::code-block>

    <p>
        There are different sizes for the centered content component which are too wide for this documentation space. Try them out in your layouts to see how they look.
    </p>
    <x-bladewind::centered-content size="small">
        <x-bladewind::card>
            this card is centered in this column
        </x-bladewind::card>
    </x-bladewind::centered-content>

    @php
        $centeredUcontentExample2 = <<<'HTML'
            <x-bladewind::centered-content size="small">

                <x-bladewind::card>
                    this content is centered in this column
                </x-bladewind::card>

            </x-bladewind::centered-content>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="1" :code="$centeredUcontentExample2"></x-bladewind::code-block>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Centered Content component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>size</td>
            <td>xl</td>
            <td><code class="inline">tiny</code>  <code class="inline">small</code> <code class="inline">medium</code> <code class="inline">big</code> <code class="inline">xl</code> <code class="inline">xxl</code> <code class="inline">omg</code></td>
        </tr>
    </x-bladewind::table>
    <h3>Centered Content with all attributes defined</h3>
    @php
        $centeredUcontentExample3 = <<<'HTML'
            <x-bladewind::centered-content
                size="medium"/>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$centeredUcontentExample3"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > centered-content.blade.php</code>
    </x-bladewind::alert>


    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-centered-content');
        </script>
    </x-slot>
</x-app>
