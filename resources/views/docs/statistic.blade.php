<x-app>
    <x-slot:title>Statistic Component</x-slot:title>
    <x-slot:page_title>Statistic</x-slot:page_title>

    <p>
        Display numeric summaries. These are mostly used on dashboards but can really be used anywhere. The statistic component like most BladewindUI components takes up the width of its parent element and expects a label and a number.</p>
        <p>The component only displays the number passed to it with no alteration. You are therefore responsible for thousand separator and decimal formats in your numbers. </p>
        <div class="grid grid-cols-2">
            <x-bladewind::statistic number="34,500,100" label="Total payments" />
            <div></div>
        </div>
        <pre class="language-markup">
            <code>
                &lt;x-bladewind::statistic number="34,500,100" label="Total payments" /&gt;
            </code>
        </pre>
        <p>By default the label is placed above the number. If you prefer to display it below the number set <code class="inline text-red-500">label_position="bottom"</code>.</p>
        <div class="grid grid-cols-2">
            <x-bladewind::statistic number="34,500,100" label="Total payments" label_position="bottom" />
            <div></div>
        </div>
        <pre class="language-markup line-numbers" data-line="2">
            <code>
                &lt;x-bladewind::statistic
                    label_position="bottom"
                    number="34,500,100"
                    label="Total payments" /&gt;
            </code>
        </pre>

        <h2 id="icons">With Icons</h2>
        <p>
            The statistic component can be displayed with an icon. This is setup as a slot so you can either use svg icons or image files.
            Icons can either be placed on the left or the right of the number and label. The default position is left. To flip the icon to the right set <code class="inline text-red-500">icon_position="right"</code>
        </p>
        <div class="grid grid-cols-2 gap-6">
            <x-bladewind::statistic number="34,500,100" label="Total payments">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 p-2 text-white rounded-full bg-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                    </svg>
                </x-slot>
            </x-bladewind::statistic>
            <x-bladewind::statistic number="34,500,100" label="Total payments" icon_position="right">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 p-2 text-white rounded-full bg-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                    </svg>
                </x-slot>
            </x-bladewind::statistic>
        </div>
        <pre class="language-markup line-numbers" data-line="5">
            <code>
                &lt;x-bladewind::statistic
                    number="34,500,100"
                    label="Total payments"&gt;

                    &lt;x-slot name="icon"&gt;
                        &lt;svg class="h-16 w-16 p-2 text-white rounded-full bg-blue-500"...&gt;
                        ...
                        &lt;/svg&gt;
                    &lt;/x-slot&gt;

                &lt;/x-bladewind::statistic&gt;
            </code>
        </pre>
        <pre class="language-markup line-numbers" data-line="2,6">
            <code>
                &lt;x-bladewind::statistic
                    icon_position="right"
                    number="34,500,100"
                    label="Total payments"&gt;

                    &lt;x-slot name="icon"&gt;
                        &lt;svg class="h-16 w-16 p-2 text-white rounded-full bg-orange-500"...&gt;
                        ...
                        &lt;/svg&gt;
                    &lt;/x-slot&gt;

                &lt;/x-bladewind::statistic&gt;
            </code>
        </pre>

        <h2 id="currency">With Currency</h2>
        <p>
            There are instances where the statistic you’re displaying has to do with amounts. Amounts are usually displayed with currency symbols.
            If you need to display your amount with a currency symbol, set a value for the <code class="inline text-red-500">currency</code> attribute.
            Currencies are displayed at a font size a step smaller than the amount. The currency symbol can be placed either on the left or right of the
            amount. The default placement is on the left of the amount. To change the position of the currency, set the <code class="inline text-red-500">currency_position</code>
            attribute to either <code class="inline">left</code> or <code class="inline">right</code>.
            An alternative way to display currency symbols when dealing with amounts is to just add the currency to the label as seen in the second example below. This will be the preference
            for those who want to let the amount stand alone.
        </p>
        <div class="grid grid-cols-2 gap-6">
            <x-bladewind::statistic currency="GHS" number="34,500,100" label="Total payments" />
            <x-bladewind::statistic number="34,500,100" label="Total payments (GHS)" icon_position="right" />
        </div>
        <pre class="language-markup line-numbers" data-line="2">
            <code>
                &lt;x-bladewind::statistic
                    currency="GHS"
                    number="34,500,100"
                    label="Total payments" /&gt;
            </code>
        </pre>
        <h2 id="spinner">With Spinners</h2>
        <p>
            In some cases you may not have access to your statistic numbers when the page loads. This usually is the case if you get your values from an API.
            In other cases, your users may filter your dashboard content, resulting in the need to repopulate your statistics. Spinners are useful visual cues in such scenarios to inform your users you're working on fetching the numbers.
            To display spinners on the statistics component, set <code class="inline text-red-500">show_spinner="true"</code>. The spinner is displayed in the number field. If you have a number, the spinner will be displayed before the number.
        </p>
        <div class="grid grid-cols-2 gap-6">
            <x-bladewind::statistic label="Total payments" show_spinner="true" />
            <x-bladewind::statistic number="34,500,100" label="Total payments (GHS)" show_spinner="true" />
        </div>
        <pre class="language-markup line-numbers" data-line="2">
            <code>
                &lt;x-bladewind::statistic
                    show_spinner="true"
                    label="Total payments" /&gt;
            </code>
        </pre>
    <p>
        You will need to programmatically get rid of the spinner once you have received your number and updated your number field.
        To be able to access various elements that make up the statistic, it is important to give the statistic a name. This can be done using the <code class="inline text-red-500">class</code>
        attribute. Assuming we named our statistic component <code class="inline text-red-500">total-payments</code>, the code below will be the resulting HTML for the component.
    </p>
    <pre class="language-markup line-numbers" data-line="1">
        <code>
            &lt;div class="bw-statistic total-payments ..."&gt;
                &lt;div class="flex space-x-4"&gt;
                    &lt;div class="grow-0 icon"&gt;
                        // icon is displayed here
                    &lt;/div&gt;
                    &lt;div class="grow number"&gt;
                        &lt;div class="uppercase ... label"&gt;
                        // label is displayed here
                        &lt;/div&gt;
                        &lt;div class="text-3xl ..."&gt;
                            &lt;svg class="bw-spinner"&gt;.
                                // spinner is displayed here
                            &lt;/svg&gt;
                            &lt;span class="text-gray-300 text-2xl"&gt;
                                // currency is displayed here
                            &lt;/span&gt;
                            &lt;span class="figure tracking-wider"&gt;
                                // number is displayed here
                            &lt;/span&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        </code>
    </pre>
    <p>
        From the above html code, to hide the spinner your javascript will be similar to
    </p>
    <pre class="language-markup line-numbers" data-line="2">
        <code>
            &lt;script&gt;
                loadTotalPayment = () => {
                    ...
                    // do all your magic then call this helper function
                    // to hide the spinner
                    hide('.total-payments .bw-spinner');
                }
            &lt;/script&gt;
        </code>
    </pre>

    <h2 id="kpi">Trends, Tones And Progress</h2>
    <p>
        A statistic is rarely just a number. It usually needs to say whether the number is
        good news, which way it is moving, and how far along something is. Those live on the
        component rather than in your markup, so the same figure reads the same way on every
        page.
    </p>
    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::statistic
    label="Revenue"
    number="12,400"
    currency="GHS"
    direction="up"
    note="up 12% on last month" /&gt;
        </code>
    </pre>
    <p>
        <code class="inline">direction</code> draws a trend arrow beside the figure and colours
        it: <code class="inline">up</code> is good, <code class="inline">down</code> is bad,
        <code class="inline">flat</code> is neutral. The <code class="inline">note</code> takes
        the same colour.
    </p>

    <h3 id="invert-direction">When Down Is Good</h3>
    <p>
        Plenty of metrics improve by falling &mdash; arrears, churn, cost per unit, response
        time. Set <code class="inline">invert_direction</code> and a downward arrow turns green
        instead of red.
    </p>
    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::statistic
    label="Arrears"
    number="1,204"
    direction="down"
    invert_direction="true"
    note="down 8% this week" /&gt;
        </code>
    </pre>

    <h3 id="tones">Tones</h3>
    <p>
        <code class="inline">tone</code> sets the colour explicitly and always wins over the
        direction. Available tones are <code class="inline">neutral</code>,
        <code class="inline">positive</code>, <code class="inline">negative</code>,
        <code class="inline">warning</code> and <code class="inline">info</code>.
    </p>
    <x-bladewind::alert type="info" show_close_icon="false">
        The tone &rarr; colour map is owned by BladewindUI, on purpose. Keeping it in the
        component is what stops the same neutral sentence rendering as a warning on one page
        and as description on another.
    </x-bladewind::alert>

    <h3 id="hints-progress">Hints And Progress Bars</h3>
    <p>
        <code class="inline">hint</code> adds a small marker beside the label with explanatory
        text on hover &mdash; useful when a metric needs defining and the label has no room.
        <code class="inline">progress</code> takes a number from 0 to 100 and draws a bar in
        place of the note, tinted with the same tone. Out-of-range values are clamped and a
        non-numeric one is ignored.
    </p>
    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::statistic
    label="Collections"
    number="72%"
    hint="Invoices settled within 30 days"
    tone="positive"
    progress="72"
    progress_label="of monthly target" /&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Statistic component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>label</td>
            <td><em>blank</em></td>
            <td>A string that best describes the statistic.</td>
        </tr>
        <tr>
            <td>number</td>
            <td><em>blank</em></td>
            <td>A number to display as the statistic.</td>
        </tr>
        <tr>
            <td>currency</td>
            <td><em>blank</em></td>
            <td>In cases where the statistic being displayed is an amount, a currency can be defined.</td>
        </tr>
        <tr>
            <td>currency_position</td>
            <td>left</td>
            <td>Only applicable when <code class="inline text-red-500">currency</code> has a value. <br /><code class="inline">left</code> <code class="inline">right</code></td>
        </tr>
        <tr>
            <td>label_position</td>
            <td>top</td>
            <td>Should the label be displayed above or below the number. <br /><code class="inline">top</code> <code class="inline">bottom</code></td>
        </tr>
        <tr>
            <td>has_shadow</td>
            <td>true</td>
            <td>Should the static component be displayed with a shadow. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>has_border</td>
            <td>true</td>
            <td>Should the static component be displayed with a border. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>show_spinner</td>
            <td>false</td>
            <td>Should the static component be displayed with a <a href="/component/spinner">Spinner</a>. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>icon</td>
            <td><em>blank</em></td>
            <td>SVG icon or image icon to display. Needs to be defined as a slot. See examples above.</td>
        </tr>
        <tr>
            <td>icon_position</td>
            <td>left</td>
            <td>Only applicable when <code class="inline text-red-500">icon</code> has a value. <br /><code class="inline">left</code> <code class="inline">right</code></td>
        </tr>
        <tr>
            <td>url</td>
            <td>null</td>
            <td>Url to visit when the card is clicked. When you specify a url like <b>"/some-url"</b> , it will be opened using the Bladewind <code class="inline">redirect()</code> Javascript helper function.
                Specifying a function call like <b>"performSomeAction(some_id)"</b> will trigger <code class="inline">javascript:performSomeAction(some_id)</code> when the link is clicked.
                Finally, a url like <b>"https://mydomain.com/some-url" will be opened with <code class="inline">window.open()</code>.</td>
        </tr>
        <tr>
            <td>radius</td>
            <td>small</td>
            <td>Increases the roundness of the card. <br /><code class="inline">none</code>  <code class="inline">small</code><code class="inline">medium</code>  <code class="inline">large</code>  <code class="inline">xl</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-spinner</td>
            <td>Any additional CSS you wish to add. You can add css to help you uniquely identify a statistic.</td>
        </tr>
        <tr>
            <td>tone</td>
            <td>neutral</td>
            <td>Named tone for the note and the trend arrow. The colour map is owned by the component. <br /><code class="inline">neutral</code> <code class="inline">positive</code> <code class="inline">negative</code> <code class="inline">warning</code> <code class="inline">info</code></td>
        </tr>
        <tr>
            <td>direction</td>
            <td><em>blank</em></td>
            <td>Draws a trend arrow beside the figure and colours it by meaning. <br /><code class="inline">up</code> <code class="inline">down</code> <code class="inline">flat</code></td>
        </tr>
        <tr>
            <td>invert_direction</td>
            <td>false</td>
            <td>For metrics where down is good &mdash; arrears, churn, cost per unit. Swaps which direction reads as positive. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>note</td>
            <td><em>blank</em></td>
            <td>A short sentence under the figure, coloured by the tone (or by the direction when no tone is set).</td>
        </tr>
        <tr>
            <td>hint</td>
            <td><em>blank</em></td>
            <td>Explanatory text shown on hover beside the label.</td>
        </tr>
        <tr>
            <td>progress</td>
            <td><em>null</em></td>
            <td>A number from 0 to 100. Draws a progress bar in place of the note, tinted with the tone. Values outside the range are clamped; a non-numeric value is ignored.</td>
        </tr>
        <tr>
            <td>progress_label</td>
            <td><em>blank</em></td>
            <td>Caption shown above the progress bar, with the percentage on the right.</td>
        </tr>
    </x-bladewind::table>
    <h3 class="pb-2 ">Statistic with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::statistic
                label="Total payments"
                label_position="bottom"
                number="34,500,100"
                currency="XOF"
                currency_position="right"
                icon_position="right"
                has_shadow="false"
                has_border="false"
                show_spinner="true"
                class="m-0"&gt;

                &lt;x-slot name="icon"&gt;
                    &lt;svg&gt;...&lt;/svg&gt;
                &lt;/x-slot&gt;

            &lt;/x-bladewind::statistic&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > statistic.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#icons">With icons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#currency">With currency</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#spinner">With spinners</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#kpi">Trends, tones and progress</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-statistic');
        </script>
    </x-slot>
</x-app>
