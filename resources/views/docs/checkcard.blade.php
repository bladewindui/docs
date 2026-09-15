<x-app>
    <x-slot:title>CheckCard Component</x-slot:title>
    <x:slot:page_title>CheckCard</x:slot:page_title>
    <x-bladewind::notification />

    <p>
        This component is simply a prettier version of checkboxes. Define content in a card that needs to be checkable and give it a <code class="inline text-red-500">value</code>.
        This value is what will be passed when the form is selected. In its simplest form this is just a card with content you provide.
    </p>

    <x-bladewind::checkcards name="hosting">
        <x-bladewind::checkcards.card value="dOcean">
            DigitalOcean
        </x-bladewind::checkcards.card>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample1 = <<<'HTML'
            <x-bladewind::checkcards name="hosting">
                <x-bladewind::checkcards.card value="dOcean">
                    DigitalOcean
                </x-bladewind::checkcards.card>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$checkcardExample1"></x-bladewind::code-block>
    <br />
    <x-bladewind::checkcards name="hosting-compact" compact="true">
        <x-bladewind::checkcards.card value="dOcean">
            DigitalOcean
        </x-bladewind::checkcards.card>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample2 = <<<'HTML'
            <x-bladewind::checkcards name="hosting-compact" compact="true">
                <x-bladewind::checkcards.card value="dOcean">
                    DigitalOcean
                </x-bladewind::checkcards.card>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$checkcardExample2"></x-bladewind::code-block>
    <br />
    <p>
        For convenience the component provides a <code class="inline text-red-500">title</code> attribute that can also be passed in as a slot if you prefer some more customized styling of the title.
    </p>

    <x-bladewind::checkcards name="hosting-3">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-bladewind::checkcards.card name="hosting" value="AWS" title="Amazon Web Services">
                A subsidiary of Amazon that provides on-demand cloud computing platforms & APIs on a metered, pay-as-you-go basis
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card name="hosting" value="Azure" title="Microsoft Azure">
                The cloud computing platform developed by Microsoft. It has management, access and development of applications...
            </x-bladewind::checkcards.card>
        </div>
    </x-bladewind::checkcards>

    <br />
    @php
        $checkcardExample3 = <<<'HTML'
            <x-bladewind::checkcards name="hosting-3" max="3">
                <div class="grid grid-cols-2 gap-4">
                    <x-bladewind::checkcards.card value="AWS"
                        title="Amazon Web Services">
                        A subsidiary of Amazon that provides on-demand ...
                    </x-bladewind::checkcards.card>
                ...
                </div>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="4" :code="$checkcardExample3"></x-bladewind::code-block>

    <p>
        The selectable card takes up the width of its parent element. If you don't want the cards to take up the entire width you will need to restrict this using flex or grids.
    </p>

    <x-bladewind::checkcards name="hosting-small">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <x-bladewind::checkcards.card value="AWS">
                Amazon Web Services
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="Azure">
                Microsoft Azure
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="DO">
                DigitalOcean
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="GC">
                Google Cloud
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="cloudy">
                Cloudinary
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="cf">
                Cloudflare
            </x-bladewind::checkcards.card>
        </div>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample4 = <<<'HTML'
            <x-bladewind::checkcards name="hosting-small" max="3">
                <div class="grid grid-cols-3 gap-4">
                    <x-bladewind::checkcards.card name="hosting" value="AWS">
                        Amazon Web Services
                    </x-bladewind::checkcards.card>

                    <x-bladewind::checkcards.card name="hosting" value="azure">
                        Microsoft Azure
                    </x-bladewind::checkcards.card>

                    <x-bladewind::checkcards.card name="hosting" value="dOcean">
                        DigitalOcean
                    </x-bladewind::checkcards.card>
                ...
                </div>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$checkcardExample4"></x-bladewind::code-block>
    <h2 id="max">Max Selection</h2>
    <p>
        By default only one card can be selected at a time. You can increase this by setting the
        <code class="inline text-red-500">max</code> attribute to a positive integer greater than zero. The example below sets <code class="inline text-red-500">max="3"</code>,
        meaning only 3 cards can be selected.
    </p>

    <x-bladewind::checkcards name="hosting-max" max="3">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <x-bladewind::checkcards.card value="AWS">
                Amazon Web Services
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="Azure">
                Microsoft Azure
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="DO">
                DigitalOcean
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="GC">
                Google Cloud
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="cloudy">
                Cloudinary
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="cf">
                Cloudflare
            </x-bladewind::checkcards.card>
        </div>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample5 = <<<'HTML'
            <x-bladewind::checkcards name="hosting-small" max="3">
                <div class="grid grid-cols-3 gap-4">
                    <x-bladewind::checkcards.card name="hosting" value="AWS">
                        Amazon Web Services
                    </x-bladewind::checkcards.card>

                    <x-bladewind::checkcards.card name="hosting" value="azure">
                        Microsoft Azure
                    </x-bladewind::checkcards.card>

                    <x-bladewind::checkcards.card name="hosting" value="dOcean">
                        DigitalOcean
                    </x-bladewind::checkcards.card>
                ...
                </div>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$checkcardExample5"></x-bladewind::code-block>

    <h3 id="max-errors">Max Selection Error Messages</h3>
    <p>
        If the user tries to select a card when the max has already been selected, you can either display an error message or say nothing. By default no error message is displayed.
        To display errors you will need to set <code class="inline text-red-500">show_error="true"</code>. The error message is displayed in the <a href="/component/notification">Notification</a> component.
        Ensure this component is included on any page where you want to use Checkable cards with errors. The actual error message to display can be defined by setting the
        <code class="inline text-red-500">error_heading</code> and <code class="inline text-red-500">error_message</code> attributes. If you don't specify these two attributes, the defaults will be used.
    </p>

    <x-bladewind::checkcards name="hosting-errors" max="3" show_error="true">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <x-bladewind::checkcards.card value="AWS">
                Amazon Web Services
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="Azure">
                Microsoft Azure
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="DO">
                DigitalOcean
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="GC">
                Google Cloud
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="cloudy">
                Cloudinary
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="cf">
                Cloudflare
            </x-bladewind::checkcards.card>
        </div>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample6 = <<<'HTML'
            <x-bladewind::checkcards name="hosting-small" max="3">
                <div class="grid grid-cols-3 gap-4">
                    <x-bladewind::checkcards.card name="hosting" value="AWS">
                        Amazon Web Services
                    </x-bladewind::checkcards.card>

                    <x-bladewind::checkcards.card name="hosting" value="azure">
                        Microsoft Azure
                    </x-bladewind::checkcards.card>

                    <x-bladewind::checkcards.card name="hosting" value="dOcean">
                        DigitalOcean
                    </x-bladewind::checkcards.card>
                ...
                </div>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$checkcardExample6"></x-bladewind::code-block>
    <h2 id="auto">Automatically Select New Cards</h2>
    <p>
        From the max selection example above, you will notice every time three cards are selected, clicking on a fourth card automatically clears the third card that was previously selected.
        This is the default behaviour, to always preserve the number of cards you want selected without blocking the user. If you prefer to prevent users from selecting new cards when
        the max has been reached, set <code class="inline text-red-500">auto_select_new="false"</code>. Users will now need to unselect one card to make room for a new selection.
    </p>

    <x-bladewind::checkcards name="hosting-auto" max="3" show_error="true" auto_select_new="false">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <x-bladewind::checkcards.card value="AWS">
                Amazon Web Services
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="Azure">
                Microsoft Azure
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="DO">
                DigitalOcean
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="GC">
                Google Cloud
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="cloudy">
                Cloudinary
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="cf">
                Cloudflare
            </x-bladewind::checkcards.card>
        </div>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample7 = <<<'HTML'
            <x-bladewind::checkcards
                name="hosting-auto"
                show_error="true"
                max="3"
                auto_select_new="false">
                <div class="grid grid-cols-3 gap-4">
                    <x-bladewind::checkcards.card name="hosting" value="AWS">
                        Amazon Web Services
                    </x-bladewind::checkcards.card>

                    <x-bladewind::checkcards.card name="hosting" value="azure">
                        Microsoft Azure
                    </x-bladewind::checkcards.card>

                    <x-bladewind::checkcards.card name="hosting" value="dOcean">
                        DigitalOcean
                    </x-bladewind::checkcards.card>
                ...
                </div>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3,5" :code="$checkcardExample7"></x-bladewind::code-block>

    <h2 id="icons-avatars">Icons and Avatars</h2>
    <p>
        By design the Checkcard component simply makes it easy for you to have checkboxes designed as cards.
        The content of the card solely relies on you. However, for convenience, the component allows you to specify
        an icon to use in the card. This uses the <a href="/component/icon">Icon</a> component with some features stripped out.
        To use an icon, simply specify the name of the icon you want to use in the <code class="inline text-red-500">icon</code> attribute.
        The <code class="inline text-red-500">icon_css</code> attribute allows you to specify additional CSS classes for the icon.

    </p>
    <p>
        The colour of the icon is determined by the value of the <code class="inline text-red-500">color</code> attribute. The default value is <code class="inline">primary</code>.
        You can specify any of the <a href="/customize/colours">colours</a>
        available in BladewindUI.
    </p>

    <x-bladewind::checkcards name="hosting-icons">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-bladewind::checkcards.card value="AWS" title="AWS" icon="cloud-arrow-up">
                A copy of your messages will be backed up to Amazon Web Services. You can retrieve them when setting up a new device.
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="gdrive" title="Google Drive" icon="circle-stack">
                A copy of your messages will be backed up to Google Drive. You can retrieve them when setting up a new device.
            </x-bladewind::checkcards.card>
        </div>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample8 = <<<'HTML'
            <x-bladewind::checkcards name="hosting-icons">
                <div class="grid grid-cols-2 gap-4">
                    <x-bladewind::checkcards.card
                        value="AWS" title="AWS"
                        icon="cloud-arrow-up">
                        A copy of your messages will be backed up to Amazon Web Services ...
                    </x-bladewind::checkcards.card>
                    <x-bladewind::checkcards.card value="gdrive" title="Google Drive"
                        icon="circle-stack">
                        A copy of your messages will be backed up to Google Drive ...
                    </x-bladewind::checkcards.card>
                </div>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="5,9" :code="$checkcardExample8"></x-bladewind::code-block>
    <h3>Avatars</h3>
    <p>
       Avatars can be used instead of icons. This also relies on a stripped down version of the BladewindUI <a href="/component/avatar">Avatar</a> component.
        When an avatar name is three characters or less, a label is used instead of an image.
        The colour of the avatar is determined by the value of the <code class="inline text-red-500">color</code> attribute. The default value is <code class="inline">primary</code>.
        You can specify any of the <a href="/customize/colours">colours</a> available in BladewindUI.
    </p>

    <x-bladewind::checkcards name="hosting-avatar" max="2">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-bladewind::checkcards.card value="mike" title="Michael Ocansey" avatar="/assets/images/me.jpeg">
                Follow Michael K. Ocansey to know when they post any new articles and code snippets.
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="francis" title="Francis Appiah" avatar="/assets/images/francis.png">
                Follow Francis Appiah to know when they post any new articles and code snippets.
            </x-bladewind::checkcards.card>
        </div>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample9 = <<<'HTML'
            <x-bladewind::checkcards name="hosting-avatar" max="2">
                <div class="grid grid-cols-2 gap-4">
                    <x-bladewind::checkcards.card
                        value="mike" title="Michael Ocansey"
                        avatar="/assets/images/me.jpeg">
                        Follow Michael K. Ocansey to know when they post a...
                    </x-bladewind::checkcards.card>
                    <x-bladewind::checkcards.card
                        value="francis"
                        title="Francis Appiah"
                        avatar="/assets/images/francis.png">
                        Follow Francis Appiah to know when they post any new ...
                    </x-bladewind::checkcards.card>
                </div>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="5,11" :code="$checkcardExample9"></x-bladewind::code-block>
    <h2 id="colours">Colours</h2>
    <p>
        The border colour can be changed by setting the <code class="inline text-red-500">border_color</code> attribute.
        The colour of icons and avatar labels can also be changed by setting the <code class="inline text-red-500">color</code> attribute.
        You can specify any of the <a href="/customize/colours">colours</a> available in BladewindUI.
        The checkmark icon colour changes to match the colour of the border.
    </p>
    <x-bladewind::checkcards name="hosting-colours" border_color="red">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-bladewind::checkcards.card value="AWS" title="AWS" icon="cloud-arrow-up">
                Your messages will be backed up to Amazon Web Services.
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="gdrive" title="Google Drive" icon="circle-stack">
                Your messages will be backed up to Google Drive.
            </x-bladewind::checkcards.card>
        </div>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample10 = <<<'HTML'
            <x-bladewind::checkcards name="hosting-colours"
                border_color="red">
                <div class="grid grid-cols-2 gap-4">
                    <x-bladewind::checkcards.card
                        value="AWS" title="AWS" icon="cloud-arrow-up">
                        Your messages will be backed up to Amazon Web Services.
                    </x-bladewind::checkcards.card>
                    ...
                </div>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$checkcardExample10"></x-bladewind::code-block>
    <br />
    <x-bladewind::checkcards name="hosting-colours2" border_color="orange" color="orange">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-bladewind::checkcards.card value="AWS" title="AWS" icon="cloud-arrow-up">
                Your messages will be backed up to Amazon Web Services.
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="gdrive" title="Google Drive" icon="circle-stack">
                Your messages will be backed up to Google Drive.
            </x-bladewind::checkcards.card>
        </div>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample11 = <<<'HTML'
            <x-bladewind::checkcards name="hosting-colours"
                border_color="orange" color="orange">
                <div class="grid grid-cols-2 gap-4">
                    <x-bladewind::checkcards.card
                        value="AWS" title="AWS" icon="cloud-arrow-up">
                        Your messages will be backed up to Amazon Web Services.
                    </x-bladewind::checkcards.card>
                    ...
                </div>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$checkcardExample11"></x-bladewind::code-block>
    <br />
    <x-bladewind::checkcards name="hosting-avatar2" max="2" border_color="purple" color="purple">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-bladewind::checkcards.card value="mike" title="Michael Ocansey" avatar="MO">
                Follow Michael K. Ocansey to know when they post any new articles and code snippets.
            </x-bladewind::checkcards.card>
            <x-bladewind::checkcards.card value="francis" title="Francis Appiah" avatar="FA">
                Follow Francis Appiah to know when they post any new articles and code snippets.
            </x-bladewind::checkcards.card>
        </div>
    </x-bladewind::checkcards>
    <br />
    @php
        $checkcardExample12 = <<<'HTML'
            <x-bladewind::checkcards name="hosting-avatar2" max="2"
                 border_color="purple" color="purple">
                <div class="grid grid-cols-2 gap-4">
                    <x-bladewind::checkcards.card
                        value="mike" title="Michael Ocansey"
                        avatar="MO">
                        Follow Michael K. Ocansey to know when they post a...
                    </x-bladewind::checkcards.card>
                    ...
                </div>
            </x-bladewind::checkcards>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$checkcardExample12"></x-bladewind::code-block>
    <h2 id="forms">Form Submission</h2>
    <p>
        Checkable cards can be used within forms as a substitute for checkboxes or radio buttons. The <code class="inline text-red-500">name</code> specified
        is what will be accessed when the form is submitted. Selecting multiple values results in a comma separated list being passed when the form is submitted.
    </p>
    <p>
        Using the <b>hosting</b> name from our examples above, after submitting the form the value of the hosting checkcards can be accessed using any of the following ways permitted in Laravel.
    </p>

    @php
        $checkcardExample13 = <<<'HTML'
            $request->get('hosting');
            $request->input('hosting');
            $request->hosting;
            HTML;
    @endphp
    <x-bladewind::code-block language="javascript" line_numbers="true" :code="$checkcardExample13"></x-bladewind::code-block>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Checkcard component.</p>
    @include('docs/announcement')
    <h3>Checkcards Component</h3>
    <p>This is the parent tag for defining Checkcards.</p>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>null</td>
            <td>Name to be accessed when checkcard selections are submitted in a form.</td>
        </tr>
        <tr>
            <td>color</td>
            <td>gray</td>
            <td>
                There are several colors to choose from. <br /><br />
                <code class="inline">primary</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">pink</code>
                <code class="inline">cyan</code> <code class="inline">purple</code> <code class="inline">gray</code> <code class="inline">orange</code> <code class="inline">indigo</code>
                <code class="inline">fuchsia</code> <code class="inline">violet</code>
            </td>
        </tr>
        <tr>
            <td>max</td>
            <td>1</td>
            <td>How many checkcards can be selected at a time.<br /> <br /><code class="inline">any positive number > 0</code> </td>
        </tr>
        <tr>
            <td>required</td>
            <td>false</td>
            <td>Determines if checkcards are required when displayed in a form.<br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>selected_value</td>
            <td><em>empty string</em></td>
            <td>In edit mode you will want selected checkcards to be selected by default. Set the values as a comma separated list.</td>
        </tr>
        <tr>
            <td>error_message</td>
            <td><em>empty string</em></td>
            <td>Message to display when <code class="inline">max</code> is set and user selection exceeds the max allowed.</td>
        </tr>
        <tr>
            <td>error_heading</td>
            <td>Error</td>
            <td>Heading to display in the notification when displaying an error message. </td>
        </tr>
        <tr>
            <td>icon</td>
            <td>null</td>
            <td>Display an icon prefix. You can use any icon from Heroicons.</td>
        </tr>
        <tr>
            <td>avatar</td>
            <td>null</td>
            <td>Display an avatar as an image or label. If this is less than 4 characters, the avatar will be displayed as a label.</td>
        </tr>
        <tr>
            <td>avatar_size</td>
            <td>medium</td>
            <td>Determine size of the avatar to display. <br /><br /><code class="inline">tiny</code> <code class="inline">small</code>
                <code class="inline">medium</code> <code class="inline">regular</code><code class="inline">big</code> <code class="inline">huge</code><code class="inline">omg</code> </td>
        </tr>
        <tr>
            <td>compact</td>
            <td>false</td>
            <td>Should the checkcards be displayed with less padding around them.<br /> <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>border_color</td>
            <td>gray</td>
            <td>What colour should the border of the card be. <br /><br />
                <code class="inline">blue</code> <code class="inline">red</code>
                <code class="inline">yellow</code> <code class="inline">green</code><code class="inline">purple</code> <code class="inline">pink</code>
                <code class="inline">orange</code> <code class="inline">gray</code> <code class="inline">cyan</code>
                <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code>
            </td>
        </tr>
        <tr>
            <td>border_width</td>
            <td>2</td>
            <td>How thick should the border of the card be. <br /><br /><code class="inline">2</code> <code class="inline">4</code> <code class="inline">8</code></td>
        </tr>
        <tr>
            <td>radius</td>
            <td>medium</td>
            <td>Determines the roundness of the card. <br /><br /><code class="inline">none</code> <code class="inline">small</code><code class="inline">medium</code> <code class="inline">full</code></td>
        </tr>
        <tr>
            <td>show_error</td>
            <td>false</td>
            <td>Should error messages be displayed when user has selected <code class="inline">max</code> cards. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>align_items</td>
            <td>top</td>
            <td>Determines alignment of avatar/icons. Outline tags have no background colour. <br /><br /><code class="inline">top</code> <code class="inline">center</code></td>
        </tr>
        <tr>
            <td>auto_select_new</td>
            <td>true</td>
            <td>Determines if selecting a new card unselects the last card. This ensures the user always selects <code class="inline">max</code> cards without displaying an error. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional CSS you wish to add to the checkcards container.</td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>

    <h3>Checkcard Component</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional CSS to append to the card.</td>
        </tr>
        <tr>
            <td>title</td>
            <td><em>blank</em></td>
            <td>
                The text to display as title of the card.
            </td>
        </tr>
        <tr>
            <td>value</td>
            <td><em>blank</em></td>
            <td>Value to pass when card is selected and form is submitted.</td>
        </tr>
        <tr>
            <td>icon</td>
            <td>null</td>
            <td>Display an icon prefix. You can use any icon from Heroicons.</td>
        </tr>
        <tr>
            <td>avatar</td>
            <td>null</td>
            <td>Display an avatar as an image or label. If this is less than 4 characters, the avatar will be displayed as a label.</td>
        </tr>
        <tr>
            <td>avatar_size</td>
            <td>medium</td>
            <td>Determine size of the avatar to display. <br /><br /><code class="inline">tiny</code> <code class="inline">small</code>
                <code class="inline">medium</code> <code class="inline">regular</code><code class="inline">big</code> <code class="inline">huge</code><code class="inline">omg</code> </td>
        </tr>
        <tr>
            <td>icon_css</td>
            <td><em>blank</em></td>
            <td>Addition CSS to append to the icon</td>
        </tr>
    </x-bladewind::table>

    <h3 class="pb-2 ">Checkcards with all attributes defined</h3>
    @php
        $checkcardExample14 = <<<'HTML'
            <x-bladewind::checkcards
                name="hosting"
                icon="calculator",
                avatar="OK",
                avatar_size="medium",
                class="",
                required="false",
                max="3",
                compact="false",
                color="primary",
                radius="medium",
                border_width="2",
                border_color="gray",
                align_items="top",
                show_error="false",
                auto_select_new="true",
                selected_value="azure,google"
                error_message="You can select only up to 3 companies"
                error_heading="Check selection!">
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$checkcardExample14"></x-bladewind::code-block>
    <h3 class="pb-2 ">Checkcard with all attributes defined</h3>
    @php
        $checkcardExample15 = <<<'HTML'
            <x-bladewind::checkcards.card
                title="Amazon Web Services"
                value="aws"
                icon="calculator",
                avatar="OK",
                avatar_size="medium",
                class=""
                icon_css="size-13" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$checkcardExample15"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for the card component is available in <code class="inline">resources > views > components > bladewind > checkcards > index.blade.php</code>
    </x-bladewind::alert><br />
    <x-bladewind::alert show_close_icon="false">
        The source file for the contact card component is available in <code class="inline">resources > views > components > bladewind > checkcards > card.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#max">Max selection</a></div>
        <div class="flex items-center ml-5"><div class="dot"></div><a href="#max-errors">Display errors</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#auto">Auto select new</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#icons-avatars">Icons & avatars</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#colours">Colours</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#forms">Form submission</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>
    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-checkcard');
        </script>
    </x-slot:scripts>
</x-app>
