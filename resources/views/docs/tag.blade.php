<x-app>
    <x-bladewind::notification />
    <x-slot:title>Tag Component</x-slot:title>
    <x-slot:page_title>Tag</x-slot:page_title>

    <p>Tags, sometimes referred to as labels allow you to logically group items or indicate statuses of items.  You can also use tags to list selections. They are very simple to use.</p>
    <p><x-bladewind::tag label="pending" /></p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::tag label="pending"  /&gt;
        </code>
    </pre>
    <h2 id="faint">Faint Coloured</h2>

    <p>The BladewindUI tag component allows you to specify different colours. The tags by default are faint in colour with blue being the default colour.
    There are nine colour options to pick from.</p>
    <p>
        <x-bladewind::tag label="primary" color="primary" /> &nbsp;
        <x-bladewind::tag label="red" color="red" /> &nbsp;
        <x-bladewind::tag label="yellow" color="yellow" /> &nbsp;
        <x-bladewind::tag label="green" color="green" /> &nbsp;
        <x-bladewind::tag label="blue" color="blue" /> &nbsp;
        <x-bladewind::tag label="pink" color="pink" /> &nbsp;
        <x-bladewind::tag label="cyan" color="cyan" /> &nbsp;
        <x-bladewind::tag label="orange" color="orange" /> &nbsp;
        <x-bladewind::tag label="gray" color="gray" /> &nbsp;
        <x-bladewind::tag label="purple" color="purple" /> &nbsp;
        <x-bladewind::tag label="violet" color="violet" /> &nbsp;
        <x-bladewind::tag label="indigo" color="indigo" /> &nbsp;
        <x-bladewind::tag label="fuchsia" color="fuchsia" /> &nbsp;
    </p>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tag label="pending" color="color-name" /&gt;
        </code>
    </pre>
    <pre class="language-markup line-numbers">
        <code>
          &lt;x-bladewind::tag label="pending" color="pink" /&gt;
        </code>
    </pre>

    <h2 id="dark">Dark Coloured</h2>
    <p>Dark colours in this case have nothing to do with dark mode. These are just a deeper shade of the tag colours. You can get darker shaded tags by setting <code class="inline text-red-500">shade="dark"</code> </p>
    <p>
        <x-bladewind::tag label="primary" shade="dark" color="primary" /> &nbsp;
        <x-bladewind::tag label="red" shade="dark" color="red" /> &nbsp;
        <x-bladewind::tag label="yellow" shade="dark" color="yellow" /> &nbsp;
        <x-bladewind::tag label="green" shade="dark" color="green" /> &nbsp;
        <x-bladewind::tag label="blue" shade="dark" color="blue" /> &nbsp;
        <x-bladewind::tag label="pink" shade="dark" color="pink" /> &nbsp;
        <x-bladewind::tag label="cyan" shade="dark" color="cyan" /> &nbsp;
        <x-bladewind::tag label="orange" shade="dark" color="orange" /> &nbsp;
        <x-bladewind::tag label="gray" shade="dark" color="gray" /> &nbsp;
        <x-bladewind::tag label="purple" shade="dark" color="purple" /> &nbsp;
        <x-bladewind::tag label="violet" shade="dark" color="violet" /> &nbsp;
        <x-bladewind::tag label="indigo" shade="dark" color="indigo" /> &nbsp;
        <x-bladewind::tag label="fuchsia" shade="dark" color="fuchsia" /> &nbsp;
    </p>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tag label="pending" shade="dark" color="color-name" /&gt;
        </code>
    </pre>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tag label="pending" shade="dark" color="purple" /&gt;
        </code>
    </pre>

    <h2 id="closable">With Close Icons</h2>
    <p>
    Tags can also have close icons. That will be useful if you use tags to display user selections and want a way to remove a user’s selection from the list. By default tags do not show the close icon.
    To activate close icons, set <code class="inline text-red-500">can_close="true"</code>. The default action when the close icon is clicked is to remove the tag that was clicked.
    </p>
    <p><x-bladewind::tag label="pending" can_close="true" />  &nbsp;  <x-bladewind::tag label="pending" can_close="true" color="pink" /></p>
    <pre class="language-markup line-numbers" data-line="2,5">
        <code>
            &lt;x-bladewind::tag label="pending"
                can_close="true" /&gt;

            &lt;x-bladewind::tag label="pending"
                can_close="true"
                color="pink" /&gt;
        </code>
    </pre>

    <p>
    The default action when the close icon is clicked is to remove the tag that was clicked.
    To run your own code when the close icon is clicked, provide a javascript function to the <code class="inline text-red-500">onclick</code> attribute.
    You may need to use the <code class="inline text-red-500">id</code> attribute to provide unique identifiers for your tags.
    By default each tag has a random generated <code class="inline text-red-500">id</code> prefixed with <code class="inline">bw-</code> to prevent numeric only IDs from breaking.
    You can turn off the prefixing of IDs by setting <code class="inline text-red-500">add_id_prefix="false"</code>
    </p>
    <p>
        <x-bladewind::tag label="marketing" can_close="true" add_id_prefix="false" id="a1001" onclick="alert('you clicked on '+ dom_el('#a1001').innerText)" />  &nbsp;
        <x-bladewind::tag label="accounting" can_close="true" color="pink" class="a1002"  onclick="alert('you clicked on '+ dom_el('.a1002').innerText)" />
    </p>

    <pre class="language-markup line-numbers" data-line="4">
        <code>
            &lt;x-bladewind::tag
                label="marketing"
                can_close="true"
                add_id_prefix="false"
                id="a1001"
                onclick="alert('you clicked on '+ dom_el('#a1001').innerText)" /&gt;

            &lt;x-bladewind::tag
                label="accounting"
                can_close="true"
                color="pink"
                class="a1002"
                onclick="alert('you clicked on '+ dom_el('.a1002').innerText)" /&gt;
        </code>
    </pre>
    <h2 id="tiny">Tiny Tags</h2>
    <p>
        Sometimes you need to display tags as hints. For example in a menu bar you may want users to know which features are new by displaying a colourful but tiny <em>new</em> tag next to each new menu item.
        Setting the <code class="inline text-red-500">tiny="true"</code> attribute will serve such aa purpose. Specifying this attribute on a <code class="inline">x-bladewind::tags</code> component will apply the size to all tags
        defined within the component. However, specifying the attribute on a <code class="inline">x-bladewind::tag</code> component will only apply it to that single tag.
    </p>
    <p><x-bladewind::tag label="just added" tiny="true" color="pink" />  &nbsp;
        <x-bladewind::tag label="new" tiny="true" color="purple" shade="dark" uppercasing="false" />
    </p>
    <pre class="language-markup line-numbers" data-line="4,6">
        <code>
            &lt;x-bladewind::tag label="just added" tiny="true" color="pink" /&gt;
        </code>
    </pre>
    <pre class="language-markup line-numbers" data-line="4,6">
        <code>&lt;x-bladewind::tag label="new" tiny="true" color="purple"
            shade="dark"
            uppercasing="false"/&gt;
        </code>
    </pre>

    <h2 id="rounded">Rounded Tags</h2>
    <p>
        There are cases where you have a rounded elements theme running through your app and will prefer to have rounded tags.
        Yes you can!. To make tags rounded set <code class="inline text-red-500">rounded="true"</code>.
    </p>
    <p><x-bladewind::tag label="pending" rounded="true" />  &nbsp;  <x-bladewind::tag label="pending" can_close="true" color="pink" rounded="true" /></p>
    <pre class="language-markup line-numbers" data-line="2,5">
        <code>
            &lt;x-bladewind::tag label="pending"
                rounded="true" /&gt;

            &lt;x-bladewind::tag label="pending"
                can_close="true"
                rounded="true"
                color="pink" /&gt;
        </code>
    </pre>
    <h2 id="outline">Outline Tags</h2>
    <p>
        What if you prefer to have no background colours on your tags. Just a border outline with your chosen colour. Simply set <code class="inline text-red-500">outline="true"</code>.
        The outline border colour is also affected by the shade you set. So light shades have a lighter outline. Dark shades have a darker outline.
    </p>
    <p><x-bladewind::tag label="pending" outline="true" color="pink" />  &nbsp;  <x-bladewind::tag label="pending" can_close="true" color="pink" outline="true" shade="dark" /></p>
    <pre class="language-markup line-numbers" data-line="4,6">
        <code>
            &lt;x-bladewind::tag label="pending" outline="true" color="pink" /&gt;

            &lt;x-bladewind::tag label="pending" can_close="true"
                outline="true"
                color="pink"
                shade="dark" /&gt;
        </code>
    </pre>
    <h2 id="selectable">Selectable Tags</h2>
    <p>
        Selectable tags allow you to use tags in forms. You can think of them in this case as a different kind of checkboxes.
        Tags automatically become selectable when you specify the <code class="inline text-red-500">name</code> and
        <code class="inline text-red-500">value</code> attributes.
    </p>
    <p>
        <x-bladewind::alert show_close_icon="false">
            By default, selectable tags use the faint colour of
            whatever colour you specify, and, on hover/selection display the darker shade of the specified colour.
        </x-bladewind::alert>
        <br />
        <x-bladewind::alert show_close_icon="false">
            Selectable tags can also not be closed. <b>can_close="false"</b>
        </x-bladewind::alert>
    </p>
    <p>
        Hidden input fields are created for distinct tag names. Values of the selected tags are then written the hidden input fields making them accessible when the form is submitted. For example:
        if we have 3 tags with the name <strong>location</strong>, this input field will be created <code class="inline">&lt;input type="hidden" name="location" /&gt;</code>.
        When any location is selected, the value will be written into the hidden location input field. Multiple values are written as a comma separated list.
    </p>
    <b>What's in your tech stack?</b>
    <div class="pb-8">
        <x-bladewind::tags color="orange" name="stack" required="true" max="3" error_message="You can select only up to 3 tech stacks" error_heading="Check selection!">
            <x-bladewind::tag label="laravel" value="laravel" />
            <x-bladewind::tag label="javascript" value="js" />
            <x-bladewind::tag label="node js" value="node js" />
            <x-bladewind::tag label="tailwindcss" value="tailwind" />
            <x-bladewind::tag label="c-sharp" value="cs" />
        </x-bladewind::tags>
    </div>
    <pre class="language-markup line-numbers" data-line="1,3,5">
        <code>
            &lt;x-bladewind::tags
                color="orange"
                name="stack"
                required="true"
                max="3"
                error_message="You can select only up to 3 tech stacks"
                error_heading="Check selection!"&gt;

                &lt;x-bladewind::tag label="laravel" value="laravel" /&gt;
                &lt;x-bladewind::tag label="javascript" value="js" /&gt;
                &lt;x-bladewind::tag label="node js" value="node js" /&gt;
                &lt;x-bladewind::tag label="tailwindcss" value="tailwind" /&gt;
                &lt;x-bladewind::tag label="c-sharp" value="cs" /&gt;

            &lt;/x-bladewind::tags&gt;
        </code>
    </pre>
    <br />
    <p>
        Note the tags are wrapped in a parent <code class="inline">&lt;x-bladewind::tags&gt;...&lt;/x-bladewind::tags&gt;</code> component.
        The above example also introduces a restriction on how many tags can be selected from the list. This is achieved by
        setting the <code class="inline text-red-500">max</code> attribute on the <code class="inline">tags</code> component.
        Where a <code class="inline text-red-500">max</code> attribute is used, it is necessary to define
        the <code class="inline text-red-500">error_message</code> and <code class="inline text-red-500">error_heading</code> attributes.
        This is the message to be displayed if a user tries to select more than the maximum tags allowed.
    </p>
    <p>
        <x-bladewind::alert show_close_icon="false">
            You will need to have <b>&lt;x-bladewind::notification /&gt;</b> on the page for error messages to be displayed.
        </x-bladewind::alert>
    </p>
    <b>Where are you hosting apps?</b>
    <div class="pb-8">
        <x-bladewind::tags color="green" name="host">
            <x-bladewind::tag label="digital ocean" value="do" />
            <x-bladewind::tag label="amazon web services" value="aws" />
            <x-bladewind::tag label="microsoft azure" value="azure" />
            <x-bladewind::tag label="google cloud" value="google" />
        </x-bladewind::tags>
    </div>
    <pre class="language-markup line-numbers" data-line="1">
        <code>
            &lt;x-bladewind::tags color="green" name="host"&gt;
                &lt;x-bladewind::tag label="digital ocean" value="do" /&gt;
                &lt;x-bladewind::tag label="amazon web services" value="aws" /&gt;
                &lt;x-bladewind::tag label="microsoft azure" value="azure" /&gt;
                &lt;x-bladewind::tag label="google cloud" value="google" /&gt;
            &lt;/x-bladewind::tags&gt;
        </code>
    </pre>
    <br /> <b>What are your interests?</b>
    <div class="pb-8">
        <x-bladewind::tags color="gray" name="interests">
            <x-bladewind::tag label="artificial intelligence" value="AI" />
            <x-bladewind::tag label="blockchain" value="blockchain" />
            <x-bladewind::tag label="cryptocurrency" value="crypto" />
            <x-bladewind::tag label="software engineering" value="software" />
        </x-bladewind::tags>
    </div>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tags color="gray" name="interests"&gt;
                &lt;x-bladewind::tag label="artificial intelligence" value="AI" /&gt;
                &lt;x-bladewind::tag label="blockchain" value="blockchain" /&gt;
                &lt;x-bladewind::tag label="cryptocurrency" value="crypto" /&gt;
                &lt;x-bladewind::tag label="software engineering" value="software" /&gt;
            &lt;/x-bladewind::tags&gt;
        </code>
    </pre>
    <br />
    <b>What is your gender?</b>
    <div class="pb-8">
        <x-bladewind::tags color="blue" name="gender" max="1" error_message="You can select just one gender" error_heading="Yoh!" rounded="true">
            <x-bladewind::tag label="Male"  value="male" />
            <x-bladewind::tag label="female"  value="female" />
            <x-bladewind::tag label="other"  value="other" />
            <x-bladewind::tag label="don't ask"  value="shoosh" />
        </x-bladewind::tags>
    </div>
    <pre class="language-markup line-numbers" data-line="1,5">
        <code>
            &lt;x-bladewind::tags
                color="blue"
                name="gender"
                max="1"
                rounded="true"
                class="space-x-2"
                error_message="You can select just one gender"
                error_heading="Yoh!"&gt;

                &lt;x-bladewind::tag label="Male" value="male" /&gt;
                &lt;x-bladewind::tag label="female" value="female" /&gt;
                &lt;x-bladewind::tag label="other" value="other" /&gt;
                &lt;x-bladewind::tag label="don't ask" value="shoosh" /&gt;

            &lt;/x-bladewind::tags&gt;
        </code>
    </pre>
    <br />
    <b>What do you do on friday evenings?</b>
    <p>
        The example below has three values selected by default.
    </p>
    <div class="pb-8">
        <x-bladewind::tags color="red" name="fridays" selected_value="hangout,club,sleep">
            <x-bladewind::tag label="hangout with friends" value="hangout" />
            <x-bladewind::tag label="go clubbing" value="club" />
            <x-bladewind::tag label="watch movies" value="movies" />
            <x-bladewind::tag label="just chill" value="chill" />
            <x-bladewind::tag label="sleeeeep" value="sleep" />
        </x-bladewind::tags>
    </div>
    <pre class="language-markup line-numbers" data-line="4">
        <code>
            &lt;x-bladewind::tags
                color="red"
                name="fridays"
                class="space-x-2"
                selected_value="hangout,club,sleep"&gt;

                &lt;x-bladewind::tag label="hangout with friends" value="hangout" /&gt;
                &lt;x-bladewind::tag label="go clubbing" value="club" /&gt;
                &lt;x-bladewind::tag label="watch movies" value="movies" /&gt;
                &lt;x-bladewind::tag label="just chill" value="chill" /&gt;
                &lt;x-bladewind::tag label="sleeeeep" value="sleep" /&gt;

            &lt;/x-bladewind::tags&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Tag component.</p>
    @include('docs/announcement')
    <h3>Tags Component</h3>
    <p>Only used when defining selectable tags.</p>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>null</td>
            <td>The name used when defining selectable tags. This name can be retrieved when the form is submitted.</td>
        </tr>
        <tr>
            <td>color</td>
            <td>blue</td>
            <td>
                There are nine colors to choose from. <br /><br />
                <code class="inline">red</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">pink</code>
                <code class="inline">cyan</code> <code class="inline">purple</code> <code class="inline">gray</code> <code class="inline">orange</code>
            </td>
        </tr>
        <tr>
            <td>max</td>
            <td>null</td>
            <td>How many tags can be selected. By default there is no limit.<br /> <br /><code class="inline">any positive number</code> </td>
        </tr>
        <tr>
            <td>required</td>
            <td>false</td>
            <td>Determines if selectable tags are required when displayed in a form.<br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>selected_value</td>
            <td><em>empty string</em></td>
            <td>In edit mode you will want selected tags to be highlighted by default. Set the values as a comma separated list.</td>
        </tr>
        <tr>
            <td>error_heading</td>
            <td>Error</td>
            <td>Heading to display in the notification when displaying an error message. </td>
        </tr>
        <tr>
            <td>error_message</td>
            <td><em>empty string</em></td>
            <td>Message to display when <code class="inline">max</code> is set and user selection exceeds the max allowed.</td>
        </tr>
        <tr>
            <td>rounded</td>
            <td>false</td>
            <td>Determines if the tag is fully rounded or not. By default tags have a very subtle roundness. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>tiny</td>
            <td>false</td>
            <td>Determines if the size of all the tags in the group is tiny. There are just two sizes, tiny and regular. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>uppercasing</td>
            <td>true</td>
            <td>Determines if the text for all the tags in the group is uppercased. If <code class="inline">false</code>, the text text will be displayed as you entered it. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>shade</td>
            <td>faint</td>
            <td>Determines if the tags should have a faint or darker color shade.<br /> <br /><code class="inline">faint</code> <code class="inline">dark</code></td>
        </tr>
        <tr>
            <td>outline</td>
            <td>false</td>
            <td>Determines if the tag is only outlined with <code class="inline">color</code> above. Outline tags have no background colour. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td>space-x-2 space-y-2</td>
            <td>Any additional CSS you wish to add to the tags container. Useful if you want to space out the tags for example. Whatever you set overwrites the default so you may need to include classes for spacing.</td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>

    <h3>Tag Component</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>label</td>
            <td><em>blank</em></td>
            <td>The text to display on the tag.</td>
        </tr>
        <tr>
            <td>color</td>
            <td>blue</td>
            <td>
                There are nine colors to choose from. <br /><br />
                <code class="inline">red</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">pink</code>
                <code class="inline">cyan</code> <code class="inline">purple</code> <code class="inline">gray</code> <code class="inline">orange</code>
            </td>
        </tr>
        <tr>
            <td>shade</td>
            <td>faint</td>
            <td>Determines if the tags should have a faint or darker color shade.<br /> <br /><code class="inline">faint</code> <code class="inline">dark</code></td>
        </tr>
        <tr>
            <td>can_close</td>
            <td>false</td>
            <td>Determines if the tag should display a close icon or not. The value should be passed as a string, not boolean.<br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>id</td>
            <td>uniqid()</td>
            <td>Unique id for the tag. This id can then be accessed via javascript. By default tag IDs have a prefix of <code class="inline">bw-</code></td>
        </tr>
        <tr>
            <td>add_id_prefix</td>
            <td>true</td>
            <td>Determines if the <code class="inline">bw-</code> prefix should be added to tag IDs. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>rounded</td>
            <td>false</td>
            <td>Determines if the tag is fully rounded or not. By default tags have a very subtle roundness. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>outline</td>
            <td>false</td>
            <td>Determines if the tag is only outlined with <code class="inline">color</code> above. Outline tags have no background colour. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>tiny</td>
            <td>false</td>
            <td>Determines if the tag size is tiny. There are just tiny and the regular size. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>uppercasing</td>
            <td>true</td>
            <td>Determines if the tag text is all uppercase. If <code class="inline">false</code>, the text text will be displayed as you entered it. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>onclick</td>
            <td><em>blank</em></td>
            <td>Javascript function to execute when the close icon is clicked. </td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-tag</td>
            <td>Any additional CSS you wish to add.</td>
        </tr>
    </x-bladewind::table>

    <h3 class="pb-2 ">Tags with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tags
                name="stack"
                color="orange"
                required="true"
                rounded="true"
                max="3"
                tiny="false"
                uppercasing="false"
                selected_value="laravel,js"
                error_message="You can select only up to 3 tech stacks"
                error_heading="Check selection!"&gt;
        </code>
    </pre>
    <h3 class="pb-2 ">Tag with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tag
                label="accounting"
                can_close="true"
                color="pink"
                class="a1002"
                id="a1002"
                rounded="true"
                outline="true"
                add_id_prefix="false"
                shade="dark"
                tiny="false"
                uppercasing="false"
                onclick="alert('you clicked on '+ dom_el('.a1002').innerText)" /&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source files for this component are available in <code class="inline">resources > views > components > bladewind > tags.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > tag.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#faint">Faint coloured</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#dark">Dark coloured</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#closable">With close icons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#tiny">Tiny</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#rounded">Rounded</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#outline">Outlined</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#selectable">Selectable tags</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-tag');
        </script>
    </x-slot>
</x-app>
