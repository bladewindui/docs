<x-app>
    <x-slot:title>Input Group Component</x-slot:title>
    <x-slot:page_title>Input Group</x-slot:page_title>
    <x-bladewind::notification/>

    @php
        $currencies = [
            ['label' => 'USD', 'value' => 'usd'],
            ['label' => 'EUR', 'value' => 'eur'],
            ['label' => 'GHS', 'value' => 'ghs'],
        ];

        $countryCodes = [
            ['label' => 'Ghana +233', 'value' => '+233'],
            ['label' => 'Nigeria +234', 'value' => '+234'],
            ['label' => 'Kenya +254', 'value' => '+254'],
        ];
    @endphp

    <p>
        The Input Group component joins related form controls. You can place a button after an
        input, a select before an input, or several controls on one line. The group adjusts the
        corners and borders for you.
    </p>

    <p>
        Place each control inside <code class="inline">x-bladewind::input-group</code>. The
        controls will fill the available width. Add <code class="inline">shrink-control</code>
        to a control that should keep its natural width, such as a button.
    </p>
    <p>
        <x-bladewind::input-group>
            <x-bladewind::input name="search_demo" placeholder="Search orders"/>
            <x-bladewind::button class="shrink-control">Search</x-bladewind::button>
        </x-bladewind::input-group>
    </p>

    @php
        $inputUgroupExample1 = <<<'HTML'
            <x-bladewind::input-group>
                <x-bladewind::input name="search" placeholder="Search orders" />
                <x-bladewind::button class="shrink-control">Search</x-bladewind::button>
            </x-bladewind::input-group>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$inputUgroupExample1"></x-bladewind::code-block>

    <p>
        In this example, the input grows and the Search button keeps its normal width.
    </p>

    <h2 id="select-input">Select And Input</h2>
    <p>
        A select can provide a unit, currency, country, or category for the value entered in the
        input. Add <code class="inline">shrink-control</code> to the select when its list does
        not need the full width.
    </p>

    <p>
        <x-bladewind::input-group>
            <x-bladewind::select name="currency_demo" :data="$currencies" class="shrink-control"/>
            <x-bladewind::input name="amount_demo" numeric="true" placeholder="Amount"/>
        </x-bladewind::input-group>
    </p>

    @php
        $inputUgroupExample2 = <<<'HTML'
            <x-bladewind::input-group>
                <x-bladewind::select
                    name="currency"
                    :data="$currencies"
                    class="shrink-control" />
                <x-bladewind::input
                    name="amount"
                    numeric="true"
                    placeholder="Amount" />
            </x-bladewind::input-group>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$inputUgroupExample2"></x-bladewind::code-block>

    <h2 id="three-controls">Using Three Controls</h2>
    <p>
        An input group can contain more than two controls. This payment example uses a currency
        select, an amount input, and a button.
    </p>

    <p>
        <x-bladewind::input-group>
            <x-bladewind::select name="payment_currency" :data="$currencies" class="shrink-control"/>
            <x-bladewind::input name="payment_amount" numeric="true" placeholder="Amount"/>
            <x-bladewind::button class="shrink-control">Pay</x-bladewind::button>
        </x-bladewind::input-group>
    </p>

    @php
        $inputUgroupExample3 = <<<'HTML'
            <x-bladewind::input-group>
                <x-bladewind::select
                    name="currency"
                    :data="$currencies"
                    class="shrink-control" />
                <x-bladewind::input
                    name="amount"
                    numeric="true"
                    placeholder="Amount" />
                <x-bladewind::button class="shrink-control">Pay</x-bladewind::button>
            </x-bladewind::input-group>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$inputUgroupExample3"></x-bladewind::code-block>

    <h2 id="email-input">Email Input And Button</h2>
    <p>
        Use an email input when the browser should check the address format. Set
        <code class="inline">can_submit="true"</code> on the button when the group is inside a
        form and the button should submit it.
    </p>

    <p>
        <x-bladewind::input-group>
            <x-bladewind::input name="email_demo" type="email" placeholder="Email address"/>
            <x-bladewind::button class="shrink-control">Subscribe</x-bladewind::button>
        </x-bladewind::input-group>
    </p>

    @php
        $inputUgroupExample4 = <<<'HTML'
            <form method="POST" action="/subscribe">
                BWATSIGNPLACEHOLDERBWATSIGNPLACEHOLDERcsrf
                <x-bladewind::input-group>
                    <x-bladewind::input
                        name="email"
                        type="email"
                        placeholder="Email address" />
                    <x-bladewind::button
                        can_submit="true"
                        class="shrink-control">Subscribe</x-bladewind::button>
                </x-bladewind::input-group>
            </form>
            HTML;
        $inputUgroupExample4 = str_replace('BWATSIGNPLACEHOLDER', '@', $inputUgroupExample4);
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$inputUgroupExample4"></x-bladewind::code-block>

    <h2 id="phone-input">Phone Number With Country Code</h2>
    <p>
        A country code select works well with a telephone input. The
        <code class="inline">type="tel"</code> value gives mobile users a phone-friendly
        keyboard.
    </p>

    <p>
        <x-bladewind::input-group>
            <x-bladewind::select name="country_code_demo" :data="$countryCodes" class="shrink-control"/>
            <x-bladewind::input name="phone_demo" type="tel" placeholder="Phone number"/>
        </x-bladewind::input-group>
    </p>

    @php
        $inputUgroupExample5 = <<<'HTML'
            <x-bladewind::input-group>
                <x-bladewind::select
                    name="country_code"
                    :data="$countryCodes"
                    class="shrink-control" />
                <x-bladewind::input
                    name="phone"
                    type="tel"
                    placeholder="Phone number" />
            </x-bladewind::input-group>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$inputUgroupExample5"></x-bladewind::code-block>

    <h2 id="textarea-button">Textarea And Button</h2>
    <p>
        You can attach a button to a textarea. The button stretches to the height of the
        textarea. This layout is useful for a short message or comment form.
    </p>

    <p>
        <x-bladewind::input-group>
            <x-bladewind::textarea name="message_demo" placeholder="Write a short message" rows="2"/>
            <x-bladewind::button class="shrink-control">Send</x-bladewind::button>
        </x-bladewind::input-group>
    </p>

    @php
        $inputUgroupExample6 = <<<'HTML'
            <x-bladewind::input-group>
                <x-bladewind::textarea
                    name="message"
                    placeholder="Write a short message"
                    rows="2" />
                <x-bladewind::button class="shrink-control">Send</x-bladewind::button>
            </x-bladewind::input-group>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$inputUgroupExample6"></x-bladewind::code-block>

    <h2 id="attached">Attached And Gapped</h2>
    <p>
        Controls are attached by default. Their inner corners are square and the border between
        them is collapsed. Set <code class="inline">attached="false"</code> to add a small gap.
        Each control will then keep all of its rounded corners.
    </p>

    <p>
        <x-bladewind::input-group attached="false">
            <x-bladewind::input name="gapped_demo" placeholder="Search orders"/>
            <x-bladewind::button class="shrink-control">Search</x-bladewind::button>
        </x-bladewind::input-group>
    </p>

    @php
        $inputUgroupExample7 = <<<'HTML'
            <x-bladewind::input-group attached="false">
                <x-bladewind::input name="search" placeholder="Search orders" />
                <x-bladewind::button class="shrink-control">Search</x-bladewind::button>
            </x-bladewind::input-group>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$inputUgroupExample7"></x-bladewind::code-block>

    <h2 id="supported-controls">Supported Controls</h2>
    <p>
        The group supports the Bladewind input, textarea, select, and button components. It also
        removes the bottom margin from each child control. The group supplies one bottom margin
        for the full row.
    </p>

    <x-bladewind::alert show_close_icon="false">
        You do not need to set <code class="inline">add_clearing="false"</code> on the controls
        inside an Input Group.
    </x-bladewind::alert>

    <h2 id="good-practices">Good Practices</h2>
    <p>
        Give every field a unique name. Use a clear placeholder or label so users know what to
        enter. Keep each group focused on one task. On small screens, test groups with three or
        more controls to make sure there is enough room.
    </p>
    <p>
        If the group is part of a form, normal validation rules still apply to each field. The
        Input Group only controls the layout. It does not combine the field values or validate
        them.
    </p>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Input Group component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>attached</td>
            <td>true</td>
            <td>
                Joins the controls, removes the inner rounded corners, and collapses the border
                where two controls meet. Set it to <code class="inline">false</code> to add a
                gap.<br />
                <code class="inline">true</code> <code class="inline">false</code>
            </td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional css classes for the group itself.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > input-group.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#select-input">Select and input</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#three-controls">Using three controls</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#email-input">Email input and button</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#phone-input">Phone number</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#textarea-button">Textarea and button</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attached">Attached and gapped</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#supported-controls">Supported controls</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#good-practices">Good practices</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-input-group');
        </script>
    </x-slot>
</x-app>
