<x-app>
    <x-bladewind::notification />
    <x-slot:title>Select Component</x-slot:title>
    <x-slot:page_title>Select</x-slot:page_title>
    <p>
        Select single or multiple values from a list.
    </p>

    <p>
        <x-bladewind::alert type="error" show_close_icon="false">
            If you have multiple select components on a page, it is important to give each one a <b>unique</b> name. Failure to do this will result in erratic behaviour of the component.
            If you specify no name, the component sets a unique name.
        </x-bladewind::alert>
    </p>
    <p>
        @php
            $countries = [
                [ 'label' => 'Benin', 'value' => 'bj' ],
                [ 'label' => 'Burkina Faso', 'value' => 'bf' ],
                [ 'label' => 'Ghana', 'value' => 'gh' ],
                [ 'label' => 'Nigeria', 'value' => 'ng' ],
                [ 'label' => 'Kenya', 'value' => 'ke' ]
            ];
            $countries_mixed_keys = [
                [ 'country' => 'Benin', 'code' => 'bj' ],
                [ 'country' => 'Burkina Faso', 'code' => 'bf' ],
                [ 'country' => 'Ghana', 'code' => 'gh' ],
                [ 'country' => 'Nigeria', 'code' => 'ng' ],
                [ 'country' => 'Kenya', 'code' => 'ke' ]
            ];
            $staff = [
                [
                    'id' => '1001',
                    'name' => 'Adam Nsiah',
                    'picture' => 'https://lh3.googleusercontent.com/a-/AOh14GhSotQTt_njzqqq-265MKM5z5iPP9m-_A2myyrGXQ=s288-p-rw-no',
                ],
                [
                    'id' => '1005',
                    'name' => 'Alfred Rowe',
                    'picture' => 'data:image/jpeg;base64,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',
                ],
                [
                    'id' => '1002',
                    'name' => 'Abdul Razak Ibrahim',
                    'picture' => 'data:image/jpeg;base64,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',
                ],
                [
                    'id' => '1003',
                    'name' => 'Michael K. Ocansey',
                    'picture' => 'https://gravatar.com/userimage/39184104/59e28edd323d0bca5bb9d125d564ae12.jpeg?size=256',
                ],
                [
                    'id' => '1004',
                    'name' => 'Michael Sarpong',
                    'picture' => 'data:image/jpeg;base64,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',
                ],
            ];
        @endphp
    </p>

    <h2 id="basic">Basic Usage</h2>

    <p>
        The <code class="inline text-red-500">data</code> attribute is what really drives the BladewindUI select component.
        This attribute expects an <code class="inline text-red-500">array</code> to be passed to it. Let's look at the basic structure of such an array using a list of five countries.
        We will build on this array structure as we go further in this documentation.
    </p>

    <pre class="language-js line-numbers">
        <code>
        &lt;?php
            $countries = [
                [ 'label' => 'Benin',         'value' => 'bj' ],
                [ 'label' => 'Burkina Faso',  'value' => 'bf' ],
                [ 'label' => 'Ghana',         'value' => 'gh' ],
                [ 'label' => 'Nigeria',       'value' => 'ng' ],
                [ 'label' => 'Kenya',         'value' => 'ke' ]
            ];
        </code>
    </pre>

    <p>
        This structure is all you need to render a BladewindUI select.
        The default array keys used to render the select are <code class="inline text-red-500">label</code> and <code class="inline text-red-500">value</code>.
    </p>
    <p class="flex space-x-1">
        <x-bladewind::select name="country" :data="$countries" data="{{ json_encode($countries) }}" />
    </p>
<pre class="language-markup line-numbers" data-line="3">
<code>
&lt;x-bladewind::select
    name="country"
    :data="$countries" /&gt;
</code>
</pre>

    <p>
        <x-bladewind::alert show_close_icon="false">
        Below is an alternative way to pass <code class="inline">data</code> to the component. Note there is no colon before the data attribute and in this case the data is passed as a json encoded string.
        </x-bladewind::alert>
    </p>

<pre class="language-markup line-numbers" data-line="3">
<code>
    &lt;x-bladewind::select
        name="country"
        data="&#123;&#123; json_encode($countries) }}" /&gt;
</code>
</pre>

    <h3 id="placeholder">Change Placeholder Text</h3>
    <p>
        <x-bladewind::select name="country2" placeholder="What is your nationality" :data="$countries" />
    </p>
<pre class="language-markup line-numbers" data-line="3">
<code>
    &lt;x-bladewind::select
        name="country2"
        placeholder="What is your nationality"
        :data="$countries" /&gt;
</code>
</pre>
    <h3 id="use-labels">Use labels instead of placeholders</h3>
    <p>
        Placeholders in the Select component behave just like placeholders in input fields.
        They tell the user what to enter into the field. Once the user enters a value, the placeholder is gone.
        Labels on the other hand are always visible even after the user has selected a value from the Select component.
        The BladewindUI Select defaults to using placeholders. To use labels, set the <code class="inline text-red-500">label</code> attribute.
        When both a placeholder and label are defined, the label takes precedence.
    </p>
    <p><x-bladewind::select name="labels" :data="$countries" data="{{ json_encode($countries) }}" label="Where are you from?" required="true" /></p>
<pre class="language-html line-numbers">
<code>
&lt;x-bladewind::select name="labels" required="true" :data="$countries"
    label="Where are you from?"/&gt;
</code>
</pre>
    <p><x-bladewind::select name="clear_labels" :data="$countries" data="{{ json_encode($countries) }}" clearable="true" label="Where are you from?" /></p>
<pre class="language-html line-numbers">
<code>
&lt;x-bladewind::select name="clear_labels" label="Where are you from?"
    :data="$countries" /&gt;
</code>
</pre>
    <h3 id="keys">Setting the value and label keys</h3>
    <p>
        It is not feasible to always rewrite your arrays to use the <code class="inline">value</code> and <code class="inline">label</code> keys expected by the component. There is a solution.
        Assuming we changed our array to the structure below.
    </p>

    <pre class="language-js line-numbers">
        <code>
        &lt;?php
            $countries = [
                [ 'country' => 'Benin',         'code' => 'bj' ],
                [ 'country' => 'Burkina Faso',  'code' => 'bf' ],
                [ 'country' => 'Ghana',         'code' => 'gh' ],
                [ 'country' => 'Nigeria',       'code' => 'ng' ],
                [ 'country' => 'Kenya',         'code' => 'ke' ]
            ];
        </code>
    </pre>

    <p>
        We changed our array keys from <code class="inline">label</code> and <code class="inline">value</code> to <code class="inline">country</code> and <code class="inline">code</code>. To render the select now, you just need to set the <code class="inline text-red-500">label_key</code> and <code class="inline text-red-500">value_key</code> attributes.
        Using our array above we will end up with <code class="inline text-red-500">label_key="country"</code> and <code class="inline text-red-500">value_key="code"</code>.
    </p>

<pre class="language-markup line-numbers" data-line="3,4">
<code>
    &lt;x-bladewind::select
        name="country_mixed"
        label_key="country"
        value_key="code"
        :data="$countries" /&gt;
</code>
</pre>
    <p>
        <x-bladewind::select name="country_mixed" label_key="country" value_key="code" data="{{json_encode($countries_mixed_keys)}}" />
    </p>
    <p>
        Just for some perspective, what we are trying to mimic here is the html implementation of a <code class="inline text-red-500">select</code> form element.
    </p>
<pre class="language-markup line-numbers">
<code>
    &lt;select name="country"...&gt;
        &lt;option value="gh"&gt;Ghana&lt;/option&gt;
    &lt;/select&gt;
</code>
</pre>

    <h3 id="default">Selecting a Value By Default</h3>
    <p>
        Like with the regular HTML &lt;select&gt; field, it is possible to have an item selected by default when the page loads. Useful when editing records.
    </p>
    <p>
        <x-bladewind::select name="country-select" placeholder="What is your nationality" data="{{json_encode($countries)}}" selected_value="gh" />
    </p>
<pre class="language-markup line-numbers" data-line="3">
<code>
    &lt;x-bladewind::select
        name="country-select"
        selected_value="gh"
        placeholder="What is your nationality"
        :data="$countries" /&gt;
</code>
</pre>
    <h3 id="required">Required Field</h3>
    <p>
        Setting a select as required appends a red asterisk to the placeholder text.
    </p>
    <div class="required-select">
        <x-bladewind::select name="country-select2" placeholder="What is your nationality" required="true" data="{{json_encode($countries)}}" />
        <x-bladewind::button type="secondary" onclick="validateForm('.required-select')">Validate Field</x-bladewind::button>
    </div>
<pre class="language-markup line-numbers" data-line="3">
<code>
    &lt;x-bladewind::select
        name="country-select2"
        required="true"
        placeholder="What is your nationality"
        :data="$countries" /&gt;
</code>
</pre>
    <h3 id="disabled">Disabled Select</h3>
    <p>
        A disabled select has a 50% opacity and a cursor indicating the field cannot be accessed.
    </p>
    <p>
        <x-bladewind::select name="country-dis" placeholder="What is your nationality" disabled="true" data="{{json_encode($countries)}}" />
    </p>
<pre class="language-markup line-numbers" data-line="3">
<code>
&lt;x-bladewind::select
    name="country-dis"
    disabled="true"
    placeholder="What is your nationality"
    :data="$countries" /&gt;
</code>
</pre>
    <h3 id="readonly">Readonly Select</h3>
    <p>
        A readonly select is quite visible but cannot be opened to view the list of items.
    </p>
    <p>
        <x-bladewind::select name="country-ro" placeholder="What is your nationality" readonly="true" data="{{json_encode($countries)}}" selected-value="gh" />
    </p>
<pre class="language-markup line-numbers" data-line="3">
<code>
&lt;x-bladewind::select
    name="country-ro"
    readonly="true"
    placeholder="What is your nationality"
    :data="$countries" /&gt;
</code>
</pre>

    <h2 id="flags">With Country Flags</h2>
    <p>
        This is just a simple way for users who are displaying list of countries to display flags next to each country name.
        This implementation was ported from <a href="https://semantic-ui.com/elements/flag.html" target="_blank">Semantic UI library's flags</a> feature.
        Flags are rendered using the country's ISO code. Example: Ghana has an ISO code of GH. Nigeria has an ISO code of NG.
        You will need to specify the <code class="inline text-red-500">flag_key</code> attribute on the select. This should be the name of the key in your array that has the country codes.
    </p>
    <p>
        Still working with our <code class="inline text-red-500">$countries</code> array from above, our select code will now be
    </p>
    <link href="{{ asset('vendor/bladewind/css/flags.css') }}" rel="stylesheet" />
    <p>
        <x-bladewind::select name="country3" data="{{json_encode($countries)}}" flag_key="value" />
    </p>
<pre class="language-markup line-numbers" data-line="5">
<code>
&lt;x-bladewind::select
    name="country"
    label_key="country"
    value_key="code"
    flag_key="code"
    :data="$countries" /&gt;
</code>
</pre>

    <x-bladewind::alert show_close_icon="false">
        For flags to work you will need to include the following stylesheet. It is deliberately not compiled into the core BladewindUI css because not everyone needs flags.
        <code class="inline">&lt;link href="&#123;&#123; asset('vendor/bladewind/css/flags.css') }}" rel="stylesheet" /&gt;</code>
    </x-bladewind::alert>

    <h2 id="images">With Images</h2>
    <p>
        You may wish to include images in your select list. For example, your app allows you to assign tasks to employees. You may want your employee list to have the pictures of each person next to their name.
        You will need to specify the <code class="inline text-red-500">image_key</code> attribute on the select. This should be the name of the key in your array that has the image urls.
    </p>
    <p>
        Let us create a new array of employees with the needed information.
    </p>
    <pre class="language-js line-numbers" data-line="7,12,17,22,27">
        <code>
        &lt;?php
            $staff =
            [
                [
                    'id' => '1001',
                    'name' => 'Adam Nsiah',
                    'picture' => '/path/to/the/image/file'
                ],
                [
                    'id' => '1005',
                    'name' => 'Alfred Rowe',
                    'picture' => '/path/to/the/image/file'
                ],
                [
                    'id' => '1002',
                    'name' => 'Abdul Razak Ibrahim',
                    'picture' => '/path/to/the/image/file'
                ],
                [
                    'id' => '1003',
                    'name' => 'Michael K. Ocansey',
                    'picture' => '/path/to/the/image/file'
                ],
                [
                    'id' => '1004',
                    'name' => 'Michael Sarpong',
                    'picture' => '/path/to/the/image/file'
                ],
            ]
        </code>
    </pre>
    <br />
    <p>
        <x-bladewind::select
            name="staff"
            :data="$staff"
            label_key="name"
            value_key="id"
            placeholder="Assign task to"
            image_key="picture" />
    </p>
<pre class="language-markup line-numbers" data-line="5">
<code>
&lt;x-bladewind::select
    name="staff"
    placeholder="Assign task to"
    label_key="name"
    value_key="id"
    image_key="picture"
    :data="$staff" /&gt;
</code>
</pre>

    <h2 id="searchable">Searchable Select</h2>
    <p>
        Assuming we had a very long list of items in our select, say all countries of the world, or list of employees, it will be tedious to scroll down the list to find what you are looking for.
        Set the following attribute <code class="inline text-red-500">searchable="true"</code> to make the Select component searchable. This is turned off by default.
    </p>
    <p>
        Let's now increase our list of countries from five to ten. The new array will be:
    </p>
    @php
        $countries = [
            [ 'label' => 'Benin', 'value' => 'bj', 'url' => 'https://en.wikipedia.org/wiki/Benin' ],
            [ 'label' => 'Burkina Faso', 'value' => 'bf', 'url' => 'https://en.wikipedia.org/wiki/Burkina_Faso' ],
            [ 'label' => 'Cameroon', 'value' => 'cm', 'url' => 'https://en.wikipedia.org/wiki/Cameroon' ],
            [ 'label' => 'Congo', 'value' => 'cd', 'url' => 'https://en.wikipedia.org/wiki/Congo' ],
            [ 'label' => 'Gambia', 'value' => 'gm', 'url' => 'https://en.wikipedia.org/wiki/Gambia' ],
            [ 'label' => 'Ghana', 'value' => 'gh', 'url' => 'https://en.wikipedia.org/wiki/Ghana' ],
            [ 'label' => 'Ivory Coast', 'value' => 'ci', 'url' => 'https://en.wikipedia.org/wiki/Ivory_Coast' ],
            [ 'label' => 'Nigeria', 'value' => 'ng', 'url' => '#basic' ],
            [ 'label' => 'Kenya', 'value' => 'ke', 'url' => 'https://en.wikipedia.org/wiki/Kenya' ],
            [ 'label' => 'Togo', 'value' => 'tg', 'url' => 'https://en.wikipedia.org/wiki/Togo' ],
        ];
    @endphp
    <pre class="language-js line-numbers">
        <code>
        &lt;?php
            $countries = [
                [ 'country' => 'Benin',         'code' => 'bj' ],
                [ 'country' => 'Burkina Faso',  'code' => 'bf' ],
                [ 'country' => 'Cameroon',      'code' => 'cm' ],
                [ 'country' => 'Congo',         'code' => 'cd' ],
                [ 'country' => 'Gambia',        'code' => 'gm' ],
                [ 'country' => 'Ghana',         'code' => 'gh' ],
                [ 'country' => 'Ivory Coast',   'code' => 'ci' ],
                [ 'country' => 'Nigeria',       'code' => 'ng' ],
                [ 'country' => 'Kenya',         'code' => 'ke' ]
                [ 'country' => 'Togo',          'code' => 'tg' ],
            ];
        </code>
    </pre>
<br />
    <p>
        <x-bladewind::select name="country4" searchable="true" data="{{json_encode($countries)}}" flag_key="value" />
    </p>
<pre class="language-markup line-numbers" data-line="3">
<code>
&lt;x-bladewind::select
     name="country4"
     searchable="true"
     label_key="country"
     value_key="code"
     flag_key="code"
     :data="$countries" /&gt;
</code>
</pre>

    <h2 id="empty">Empty Select</h2>
    <p>
        When pulling dynamic data in from APIs or a database, you will not always have data available. In cases like this the Select component will display the
        message displayed in the <code class="inline text-red-500">empty_placeholder</code> attribute. This message is displayed as a select item so you will only see it when you click on the Select component.
        If you set <code class="inline text-red-500">searchable="true"</code> but there is no data to display, the search bar will automatically be hidden.
    </p>
    @php
        $users = [];
    @endphp
    <pre class="language-php line-numbers">
        <code>
        &lt;?php $users = []; ?&gt;
        </code>
    </pre>
    <p>
        <x-bladewind::select name="empty_users" searchable="true" :data="$users" />
    </p>
    <pre class="language-markup line-numbers" data-line="3">
        <code>
            &lt;x-bladewind::select name="empty_users" searchable="true" :data="$users" /&gt;
        </code>
    </pre>
    <h3>Display as Empty State</h3>
    <p>
        As seen from the example above, the empty message is displayed as a single line in a select item. It is possible to
        leverage the BladewindUI <a href="/component/empty-state">Empty State</a> component to display the empty message.
        This can be achieved by setting the <code class="inline text-red-500">empty_state_from</code> attribute. You should already have
        defined the empty state on the same page as your select component and given it a name.
    </p>
    <p>
        <code class="inline text-red-500">empty_state_from="no_users"</code> means there is an empty state with the name <code class="inline">no_users</code>.
        The select component will look for this empty state component and display its content anytime it needs to display an empty (no content) state. To ensure the
        empty state component is not displayed on the page, set <code class="inline text-red-500">for_select="true"</code> on the empty state component.
    </p>
    <div class="grid grid-cols-2 gap-6">
        <x-bladewind::empty-state
            name="no_docs"
            for_select="true"
            message="Awesome! You have no documents to approve.">
        </x-bladewind::empty-state>
        <x-bladewind::empty-state
            name="no_users"
            for_select="true"
            message="There are currently no users in your workspace. We need to fix that"
            button_label="Add User"
            image="/assets/images/user.png"
            onclick="showModal('new-user')">
        </x-bladewind::empty-state>
    </div>
    <div class="grid grid-cols-2 gap-6">
        <div>
            <x-bladewind::select searchable="true" :data="$users" empty_state_from="no_docs" />
        </div>
        <div>
            <x-bladewind::select searchable="true" :data="$users" empty_state_from="no_users" />
        </div>
    </div>
    <x-bladewind::modal backdrop_can_close="false" name="new-user" ok_button_label="Save">
        <b>Add New User</b>
        <div class="grid grid-cols-2 gap-4 mt-6">
            <x-bladewind::input required="true" name="first_name" label="First name" error_message="Please enter your first name" />
            <x-bladewind::input required="true" name="last_name" label="Last name" error_message="Please enter your last name" />
        </div>
        <x-bladewind::input required="true" name="email" label="Email address" error_message="Please enter your email" />
        <x-bladewind::input numeric="true" name="mobile" label="Mobile" />
    </x-bladewind::modal>

<pre class="language-markup line-numbers" data-line="2,3">
<code>
&lt;x-bladewind::empty-state
    name="no_docs"
    for_select="true"
    message="Awesome! You have no documents to approve."&gt;
&lt;/x-bladewind::empty-state&gt;
</code>
</pre>
<pre class="language-markup line-numbers" data-line="2">
<code>
&lt;x-bladewind::select searchable="true" :data="$users"
    empty_state_from="no_docs" /&gt;
</code>
</pre>
    <br />
<pre class="language-markup line-numbers" data-line="2,3">
<code>
&lt;x-bladewind::empty-state
    name="no_users"
    for_select="true"
    message="There are currently no users in your workspace. We need to fix that"
    button_label="Add User"
    image="/assets/images/user.png"
    onclick="showModal('new-user')"&gt;&lt;/x-bladewind::empty-state&gt;
</code>
</pre>
<pre class="language-markup line-numbers" data-line="2">
<code>
&lt;x-bladewind::select searchable="true" :data="$users"
    empty_state_from="no_users" /&gt;
</code>
</pre>
    <h2 id="multiple">Select Multiple Items</h2>
    <p>
        There are instances where you need to select more than one item from the select component. This is possible by setting the attribute
        <code class="inline text-red-500">multiple="true"</code>. Unlike the single select, multiple selects do not automatically close when you select items.
        This is because we technically do not know how many items you are selecting and if you are done.
        To close a multiple select just click anywhere on the page outside the component.
    </p>
    <p>
        Left and right navigation arrows are displayed only when some of the selected items are out of view. You can ignore the arrows and scroll left and right using your mouse.
        This will be a 2 finger scroll on Macs.
    </p>
    <p>
        <x-bladewind::select name="country-multi" multiple="true" searchable="true" :data="$countries" flag_key="value" max-selectable="3" label="Select a country" />
    </p>
<pre class="language-markup line-numbers" data-line="7">
<code>
&lt;x-bladewind::select
    name="country-multi"
    searchable="true"
    label_key="country"
    value_key="code"
    flag_key="code"
    multiple="true"
    label="Select a country"
    max_selectable="3"
    :data="$countries" /&gt;
</code>
</pre>
    <p>
        If you try to select more than 3 items from the select component above, you will not be able to.
        This is achieved by setting the
        <code class="inline text-red-500">max_selectable</code> attribute. The default value is -1, which means there is no limit on selection.
        Once you set a positive integer, the restriction on selection will be applied. You can set what error message should be displayed when the user tries to select more than is allowed.
        You can set the <code class="inline text-red-500">max_error_message</code> attribute.
    </p>
    <h3 id="automatic">Automatic Selection of Items</h3>
    <p>
        You can auto select some of the items in the component by default, for example when in edit mode. To select multiple items, you will need to specify them as a comma separated list.
    </p>
    <p>
        <x-bladewind::select name="country-multi2" multiple="true" searchable="true" data="{{json_encode($countries)}}" flag_key="value" selected_value="gh, gm, ci, bf" />
    </p>
<pre class="language-markup line-numbers" data-line="4">
<code>
&lt;x-bladewind::select
    name="country-multi2"
    searchable="true"
    selected_value="gh, gm, ci, bf"
    label_key="country"
    value_key="code"
    flag_key="code"
    multiple="true"
    :data="$countries" /&gt;
</code>
</pre>

    <h2 id="non-dynamic">Manually Building a Select</h2>
    <p>
        There could be cases when your data will not come from an API call or array. You may want to manually build the Select options.
        Say for gender, you simply want 3 options. Male, female, other. It is possible to make these items into an array but honestly
        array-ing simple things like this can get tedious --fast. The Select component has a child component that allows you to do this.
    </p>
    <p>
        Let us consider the example below. The important trade-off here is to set <code class="inline text-red-500">data="manual"</code>.
    </p>
    <pre class="language-markup line-numbers">
        <code>
           &lt;x-bladewind::select name="gender" placeholder="Select Gender" data="manual"&gt;
                &lt;x-bladewind::select.item label="Male" value="male" /&gt;
                &lt;x-bladewind::select.item label="Female" value="female" /&gt;
                &lt;x-bladewind::select.item label="Prefer not to say" value="other" /&gt;
           &lt;/x-bladewind::select&gt;
        </code>
    </pre>
    <p>
        <x-bladewind::select name="gender" placeholder="Select Gender" data="manual">
            <x-bladewind::select.item label="Male" value="male" />
            <x-bladewind::select.item label="Female" value="female" />
            <x-bladewind::select.item label="Prefer not to say" value="other" />
        </x-bladewind::select>
    </p>
    <p>
        The manual Select can inherit all the cool features of an array-based Select. Can be searchable or even multiple selection.
    </p>
    <pre class="language-markup line-numbers">
        <code>
           &lt;x-bladewind::select
                name="tags"
                placeholder="Tags for this music"
                multiple="true"
                searchable="true" data="manual"&gt;

                &lt;x-bladewind::select.item label="Pop" value="pop" image="/path/to/image" /&gt;
                &lt;x-bladewind::select.item label="Hip" value="hip" flag="gh" /&gt;
                &lt;x-bladewind::select.item label="Trendy" value="trendy" flag="ng" /&gt;
                &lt;x-bladewind::select.item label="GenZ" value="genz" image="/path/to/image" /&gt;
                &lt;x-bladewind::select.item label="Trance" value="trance" /&gt;
                &lt;x-bladewind::select.item label="For Coder's" value="devs" /&gt;

           &lt;/x-bladewind::select&gt;
        </code>
    </pre>
    <p>
        <x-bladewind::select name="tags" placeholder="Tags for this music" multiple="true" searchable="true" data="manual">
            <x-bladewind::select.item label="Pop" value="pop" image="{{ asset('assets/images/edwin.jpeg') }}" />
            <x-bladewind::select.item label="Hip" value="hip" flag="gh" />
            <x-bladewind::select.item label="Trendy" value="trendy" flag="ng" />
            <x-bladewind::select.item label="GenZ" value="genz" image="{{ asset('assets/images/audrey.jpeg') }}" />
            <x-bladewind::select.item label="Trance" value="trance" />
            <x-bladewind::select.item label="For Coder's" value="devs" />
        </x-bladewind::select>
    </p>
    <p>
        The example above allows for multiple selection of items, it's searchable and mixes flags and images, just to show you
        that all features are possible even when manually building the Select items.
    </p>

    <h2 id="onselect">Get Value of Selected Item(s)</h2>
    <p>
    Every BladewindUI select component you display creates as part of the select html the following hidden form field
    <code class="inline text-red-500">&lt;input type="hidden" name="the-select-name-you-provided" /&gt;</code>. When you select an item from the select, the hidden input field is updated with the value of what you selected. The value will be whatever you specified as your <code class="inline">value_key</code>. When you submit a form that has any BladewindUI select, you can access the value of the select by specifying the name you used on the select. Consider the example below.
    </p>
    <pre class="language-markup line-numbers">
        <code>
            &lt;form ...&gt;
            ...
            &lt;x-bladewind::select name="country" ... /&gt;
            &lt;/form&gt;
        </code>
    </pre>
    <p>
    After submitting the form the value of the country select can be accessed using any of the following ways permitted in Laravel.
    </p>

    <pre class="language-js line-numbers">
        <code>
            $request->get('country');
            $request->input('country');
            $request->country;
        </code>
    </pre>
    <br />
    <x-bladewind::alert type="info" show_close_icon="false">
        The <b>multiple select</b> generates a comma separated list of values.
        Selecting multiple countries from our country example above will result in the following input field. <br /><br />
        <code class="inline text-red-500">&lt;input type="hidden" name="country_multi" value="gh,ci,bf,gm" /&gt;</code>
    </x-bladewind::alert>

    <h2 id="custom-functions">Execute Custom Functions</h2>
    <p>
        It is possible to execute a JavaScript custom function when an item is selected.
        The custom function is executed <b>in addition</b> to the default BladewindUI action of writing the selected value to a hidden field. Building on our countries example above, let's say you want to prepend a mobile number field with the dialing code
        of the selected country. This can be done via a custom function. You can define a custom function by setting <code class="inline text-red-500">onselect="function_name"</code>.
        You only need to specify the name of the function without parenthesis and parameters. Example: <code class="inline text-red-500">onselect="prependDialingCode"</code>.
    </p>
    <p>
        The value and label of the <b>selected item</b> are passed to the custom function and executed like so: <code class="inline text-red-500">onselect="prependDialingCode(value, label, all_values)"</code>.
        The third parameter <code class="inline">all_values</code> is useful when you are expecting multiple values to be selected. All the selected values are passed as a comma separated list.
        Your function therefore needs to be defined with three parameters (if you intend to use all three). Let's consider a more detailed example below (where we only make use of the <code class="inline">value</code> parameter).
    </p>
    <script>
        const dialing_codes = {
            'gh' : '+233',
            'ng' : '+234',
            'bf' : '+226'
        }
        prependDialingCode = (value) => {
            dom_el('.mobile-prefix').innerText = eval(`dialing_codes.${value}`);
        }
    </script>

    <div class="grid grid-cols-2 gap-4">
        <x-bladewind::select name="cusfxns" placeholder="Your country" data="manual" onselect="prependDialingCode">
            <x-bladewind::select.item label="Burkina Faso" value="bf" />
            <x-bladewind::select.item label="Ghana" value="gh" />
            <x-bladewind::select.item label="Nigeria" value="ng" />
        </x-bladewind::select>
        <x-bladewind::input name="mobile" numeric="true" prefix="+xxx" suffix="device-phone-mobile" suffix_is_icon="true" transparent_prefix="false" placeholder="Mobile" />
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;div class="grid grid-cols-2 gap-4"&gt;

                &lt;x-bladewind::select
                    name="cusfxns"
                    placeholder="Your country"
                    data="manual"
                    onselect="prependDialingCode"&gt;

                    &lt;x-bladewind::select.item label="Burkina Faso" value="bf" /&gt;
                    &lt;x-bladewind::select.item label="Ghana" value="gh" /&gt;
                    &lt;x-bladewind::select.item label="Nigeria" value="ng" /&gt;

                &lt;/x-bladewind::select&gt;

                &lt;x-bladewind::input
                    name="mobile"
                    numeric="true"
                    prefix="+xxx"
                    suffix="device-phone-mobile"
                    suffix_is_icon="true"
                    transparent_prefix="false"
                    placeholder="Mobile" /&gt;
            &lt;/div&gt;

        </code>
    </pre>
    <pre class="language-js line-numbers">
        <code>
            // javascript
            const dialing_codes = {
                'gh' : '+233',
                'ng' : '+234',
                'bf' : '+226'
            }

            prependDialingCode = (value) => {
                domEl('.mobile-prefix').innerText = eval(`dialing_codes.${value}`);
            }
        </code>
    </pre>
    <p>
        The input field above has <code class="text-red-500 inline">name="mobile"</code> and also has a <code class="text-red-500 inline">prefix="+xxx"</code>.
        Bladewind names all prefixes after their input element so, the prefix field in the mobile input will have <code class="inline">class="mobile-prefix"</code>. Even though
        Bladewind passes both 'value' and 'label' to custom functions specified  on Selects, in this example the <code class="inline">prependDialingCode</code>
        function only accepts 'value' because the 'label' is not needed.
    </p>

    <h2 id="js-manipulations">Manipulate Selects from JavaScript</h2>
    <p>
        There are those moments when you need to interact with a Select component from JavaScript. The Bladewind Select component exposes 3 methods that help you to do just that.
        When you create a Select component and provide a name, BladewindUI initializes the component in JavaScript using the name you provided.
    </p>
    <pre class="language-markup">
        <code>
            // the following component declaration
            &lt;x-bladewind::select name="country-multiple" placeholder="Select a country" /&gt;
        </code>
    </pre>
    <pre class="language-js">
        <code>
            // will be initialized in JavaScript as
            const bw_country_multiple = new BladewindSelect('country_multiple', 'Select a country');
        </code>
    </pre>
    <p>
        Note how the name passed to the component has been prefixed with <code class="inline text-red-500">bw_</code>
        and all dashes <code class="inline">'-'</code> replaced with underscores <code class="inline">'_'</code>. This variable is now accessible to you in JavaScript and represents the Select component.
    </p>
    <p>
        The following methods can be performed on the Select component now, from JavaScript...
    </p>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Method</th>
            <th>Description</th>
        </x-slot>
        <tr>
            <td>enable</td>
            <td>Enables the select and makes it clickable. <br /><br />
            <code class="inline">bw_country_multiple.enable();</code></td>
        </tr>
        <tr>
            <td>disable</td>
            <td>Disables the select and makes it non-clickable. There is a known issue with this when used on multiple select components that already have values selected. The user can click on the close icons next to the selected values to remove them.
                <br /><br /><code class="inline">bw_country_multiple.disable();</code></td>
        </tr>
        <tr>
            <td>reset</td>
            <td>Removes any selected values from the component. This also empties the hidden input field associated with the component.
                <br /><br /><code class="inline">bw_country_multiple.reset();</code></td>
        </tr>
        <tr>
            <td>selectByValue(value)</td>
            <td>Select one of the component values. The value you pass needs to exist in the Select's list of items else the command will simply be ignored.
                This does not work for multiple values yet. You can use it on a multiple select to select multiple values but you will need to call the method multiple times.
                <br /><br />
                <code class="inline">bw_country_multiple::selectByValue('gh');</code>
                <code class="inline">bw_country_multiple::selectByValue('ng');</code>
            </td>
        </tr>
        <tr>
            <td>filter(element, value)</td>
            <td>Filter the items in &lt;element&gt; based on &lt;value&gt;. <code class="inline">element</code> is the name of the target select component to be filtered. By default, one select component triggers filtering on another select component.
                However, a component can trigger filtering on itself if the value is not coming from another select component.
                <br /><br />
                <code class="inline">bw_continents.filter('countries', 'AF');</code>
                <code class="inline">bw_countries.filter('countries', 'EU');</code>
            </td>
        </tr>
        <tr>
            <td>clearFilter(element, value)</td>
            <td>Clear all filtering in &lt;element&gt; based on &lt;value&gt;. The component is reset if &lt;value&gt; is blank.
                <br /><br />
                <code class="inline">bw_continents.clearFilter('countries', 'AF');</code>
                <code class="inline">bw_countries.clearFilter('countries');</code>
            </td>
        </tr>
       {{-- <tr>
            <td>addItem(element, label, value)</td>
            <td>Add an item to the element.
                <br /><br />
                <code class="inline">bw_countries.addItem('Liberia', 'LR');</code>
            </td>
        </tr>--}}
    </x-bladewind::table>
    <h3 id="example">A Practical Example</h3>
    <p>
        <x-bladewind::select name="from-js" placeholder="Your country" data="manual">
            <x-bladewind::select.item label="Burkina Faso" value="bf" />
            <x-bladewind::select.item label="Ghana" value="gh" />
            <x-bladewind::select.item label="Nigeria" value="ng" />
        </x-bladewind::select>
    </p>
    <div class="space-x-4 text-center">
        <x-bladewind::button size="small" type="secondary" onclick="bw_from_js.selectByValue('gh')">Select Ghana</x-bladewind::button>
        <x-bladewind::button size="small" type="secondary" onclick="bw_from_js.selectByValue('ng')">Select Nigeria</x-bladewind::button>
        <x-bladewind::button size="small" type="secondary" onclick="bw_from_js.disable()">Disable</x-bladewind::button>
        <x-bladewind::button size="small" type="secondary" onclick="bw_from_js.reset()">Reset</x-bladewind::button>
        <x-bladewind::button size="small" type="secondary" onclick="bw_from_js.enable()">Enable</x-bladewind::button>
    </div>
<br />
    <p>
        <x-bladewind::select name="multiple-from-js" placeholder="Your country"  multiple="true" data="manual">
            <x-bladewind::select.item label="Burkina Faso" value="bf" />
            <x-bladewind::select.item label="Ghana" value="gh" />
            <x-bladewind::select.item label="Nigeria" value="ng" />
        </x-bladewind::select>
    </p>
    <div class="space-x-4 text-center">
        <x-bladewind::button size="small" type="secondary" onclick="bw_multiple_from_js.selectByValue('gh')">Select Ghana</x-bladewind::button>
        <x-bladewind::button size="small" type="secondary" onclick="bw_multiple_from_js.selectByValue('ng')">Select Nigeria</x-bladewind::button>
        <x-bladewind::button size="small" type="secondary" onclick="bw_multiple_from_js.disable()">Disable</x-bladewind::button>
        <x-bladewind::button size="small" type="secondary" onclick="bw_multiple_from_js.reset()">Reset</x-bladewind::button>
        <x-bladewind::button size="small" type="secondary" onclick="bw_multiple_from_js.enable()">Enable</x-bladewind::button>
    </div>
<br />
    <pre class="language-markup line-numbers" data-line="9,14,19,24,29">
        <code>
            &lt;x-bladewind::select name="from-js" placeholder="Your country" data="manual"&gt;
                &lt;x-bladewind::select.item label="Burkina Faso" value="bf" /&gt;
                &lt;x-bladewind::select.item label="Ghana" value="gh" /&gt;
                &lt;x-bladewind::select.item label="Nigeria" value="ng" /&gt;
            &lt;/x-bladewind::select&gt;

            &lt;div class="space-x-4 text-center"&gt;

                &lt;x-bladewind.button size="small" type="secondary"
                    onclick="bw_from_js.selectByValue('gh')"&gt;
                    Select Ghana
                &lt;/x-bladewind.button&gt;

                &lt;x-bladewind.button size="small" type="secondary"
                    onclick="bw_from_js.selectByValue('ng')"&gt;
                    Select Nigeria
                &lt;/x-bladewind.button&gt;

                &lt;x-bladewind.button size="small" type="secondary"
                    onclick="bw_from_js.disable()"&gt;
                    Disable
                &lt;/x-bladewind.button&gt;

                &lt;x-bladewind.button size="small" type="secondary"
                    onclick="bw_from_js.reset()"&gt;
                    Reset
                &lt;/x-bladewind.button&gt;

                &lt;x-bladewind.button size="small" type="secondary"
                    onclick="bw_from_js.enable()"&gt;
                    Enable
                &lt;/x-bladewind.button&gt;

            &lt;/div&gt;
        </code>
    </pre>

    <h2 id="filtering">Filtering</h2>
    <h3 id="table">Dynamically filter a table based on selected values</h3>
    <p>
        In this next example (<a href="https://github.com/mkocansey/bladewind/issues/154#issuecomment-1742930457" target="_blank">inspired by this comment</a>) we will filter an employee directory based on what departments are selected in the multi select component.
        Each employee card in the employee directory below is generated using the BladewindUI <a href="/component/card#contact">Contact card component</a>.
    </p>
    @php
    $employees = [
        [ 'name' => 'Michael Ocansey', 'email' => 'mike@demo.com', 'position' => 'CTO', 'department' => 'tech', 'dp' => 'me.jpeg', 'mobile' => '+233244123456' ],
        [ 'name' => 'Aaron Mensah', 'email' => 'amenline@demo.com', 'position' => 'Developer', 'department' => 'tech', 'dp' => 'rowe.jpeg', 'mobile' => '+233244123456' ],
        [ 'name' => 'Deborah Mawusi', 'email' => 'deborah@demo.com', 'position' => 'Intern', 'department' => 'tech', 'dp' => 'audrey.jpeg', 'mobile' => '+233244123456' ],
        [ 'name' => 'Stella Asamoah', 'email' => 'stella@demo.com', 'position' => 'Intern', 'department' => 'tech', 'dp' => 'female.png', 'mobile' => '+233244123456' ],
        [ 'name' => 'Samuel Osei-Antwi', 'email' => 'sam@demo.com', 'position' => 'Operations Officer', 'department' => 'operations', 'dp' => 'francis.png', 'mobile' => '+233244123456' ],
        [ 'name' => 'Abigail Aminah', 'email' => 'bertrand@demo.com', 'position' => 'Warehouse Manager', 'department' => 'operations', 'dp' => 'edwin.jpeg', 'mobile' => '+233244123456' ],
        [ 'name' => 'Catherine Gerald', 'email' => 'cathy@demo.com', 'position' => 'Field Supervisor', 'department' => 'field', 'dp' => 'issah.jpg', 'mobile' => '+233244123456' ],
        [ 'name' => 'Blaise Konlan', 'email' => 'blaise@demo.com', 'position' => 'M & E Officer', 'department' => 'field', 'dp' => 'male.png', 'mobile' => '+233244123456' ],
        [ 'name' => 'Francis Asomani', 'email' => 'francis@demo.com', 'position' => 'Finance Manager', 'department' => 'finance', 'dp' => 'male.png', 'mobile' => '+233244123456' ],
        [ 'name' => 'Alfred Armah', 'email' => 'alfred@demo.com', 'position' => 'Finance Officer', 'department' => 'finance', 'dp' => 'male.png', 'mobile' => '+233244123456' ],
        [ 'name' => 'Rembert Annankrah', 'email' => 'rembert@demo.com', 'position' => 'Cash Officer', 'department' => 'finance', 'dp' => 'male.png', 'mobile' => '+233244123456' ],
        [ 'name' => 'Priscilla Mills', 'email' => 'priscilla@demo.com', 'position' => 'Marketing Manager', 'department' => 'marketing', 'dp' => 'female.png', 'mobile' => '+233244123456' ],
    ];
    @endphp

    <div class="bg-slate-100">
        <x-bladewind::select name="department" placeholder="filter by department" data="manual" multiple="true" onselect="filterEmployees">
            <x-bladewind::select.item label="Field Workers" value="field" />
            <x-bladewind::select.item label="Finance" value="finance" />
            <x-bladewind::select.item label="Tech" value="tech" />
            <x-bladewind::select.item label="Marketing" value="marketing" />
            <x-bladewind::select.item label="Operations" value="operations" />
        </x-bladewind::select>
    </div>
    <div class="grid sm:grid-cols-2 gap-4">
        @foreach($employees as $employee)
            @php $dp =  ($employee['dp']!=='') ? "/assets/images/".$employee['dp'] : ''; @endphp
            <x-bladewind::contact-card
                :name="$employee['name']"
                position="{{ ucfirst($employee['department']) }} > {{ $employee['position'] }}"
                :email="$employee['email']"
                :mobile="$employee['mobile']"
                :image="$dp" />
        @endforeach
    </div>
    <script>
        filterEmployees = (value, label, all_values) => {
            let employee_cards = dom_els('.bw-contact-card');
            let keywords = all_values.replaceAll(',','|');
            let regex = new RegExp( `(${keywords})`, 'ig' );
            employee_cards.forEach((el) => {
                (! el.innerText.match(regex) ) ? hide(el, true) : unhide(el, true);
            });
        }
    </script>
    <br />
    <br />
    <p>
        Let's break down the code for the example above. First we build the array of employees. This example uses an
        array. You may have your data coming directly from the database or other.
    </p>
    <pre class="language-js line-numbers">
        <code>
            $employees = [
                [
                    'name' => 'Michael Ocansey',
                    'email' => 'mike@demo.com',
                    'position' => 'CTO',
                    'department' => 'tech',
                    'dp' => 'me.jpeg',
                    'mobile' => '+233244123456'
                ],
                ...
            ];
        </code>
    </pre>
    <p>
        Next, we build our multiple Select component with <a href="#non-dynamic">non-dynamic</a> data.
        Note line 3 where we pass the name of the function responsible for filtering the data to the <code class="inline text-red-500">onselect</code> attribute.
    </p>
    <pre class="language-markup line-numbers" data-line="3">
        <code>
            &lt;x-bladewind::select
                name="department"
                onselect="filterEmployees"
                placeholder="filter by department"
                data="manual"
                multiple="true"&gt;
                &lt;x-bladewind::select.item label="Field Workers" value="field" /&gt;
                &lt;x-bladewind::select.item label="Finance" value="finance" /&gt;
                &lt;x-bladewind::select.item label="Tech" value="tech" /&gt;
                &lt;x-bladewind::select.item label="Marketing" value="marketing" /&gt;
                &lt;x-bladewind::select.item label="Operations" value="operations" /&gt;
            &lt;/x-bladewind::select&gt;
        </code>
    </pre>
    <p>
        We then build the employee records from our array. This example uses the <a href="/component/card#contact">contact card</a> component, but you could use
        the  <a href="/component/table">table component</a> to achieve the same results. How the data is displayed is completely up to you.
    </p>
    <pre class="language-markup line-numbers">
        <code>
            &lt;div class="grid grid-cols-2 gap-4"&gt;
                &commat;foreach($employees as $employee)
                    &commat;php
                        $dp =  ($employee['dp']!=='') ? "/assets/images/".$employee['dp'] : '';
                        $position = ucfirst($employee['department']) . ' > ' . $employee['position'];
                    &commat;endphp
                    &lt;x-bladewind::contact-card
                        :name="$employee['name']"
                        :position="$position"
                        :email="$employee['email']"
                        :mobile="$employee['mobile']"
                        :image="$dp" /&gt;
                &commat;endforeach
            &lt;/div&gt;
        </code>
    </pre>
    <p>
        Finally, the Javascript for filtering the cards. Every BladewindUI  <a href="/component/card#contact">contact card</a> component has the class <code class="inline">bw-contact-card</code>.
        Our Javascript targets this class to access all employee cards. When a department is selected, we search through each card
        and hide any cards that do not contain the selected department(s) in their innerText. Because multiple departments can be selected,
        we need to dynamically build our regular expression for finding the selected departments in the cards.
    </p>
    <pre class="language-js line-numbers">
        <code>
             filterEmployees = (value, label, all_values) => {
                // get all employee cards available in the DOM
                let employee_cards = domEls('.bw-contact-card');

                // replace every , with | so our regex will look like /(tech|finance)/ig
                let keywords = all_values.replaceAll(',','|');

                let regex = new RegExp( `(${keywords})`, 'ig' );

                // go through each card and hide any that doesn't match selection
                employee_cards.forEach((el) => {
                    (! el.innerText.match(regex) ) ? hide(el, true) : unhide(el, true);
                });
            }
        </code>
    </pre>

    <h3 id="another-select">Filter a Select component based on the value of another Select component</h3>
    <p>
        Let's dig right into an example.
        Let's say you have two select components, continents and countries. You want to display a list of countries based on which continent was selected.
        The Select component provides an easy way to handle this kind of filtering, without having to whip up your own Javascript logic.
    </p>
    <p>
        To make this possible we will need to introduce two new attributes. <code class="inline text-red-500">filter</code> and <code class="inline text-red-500">filter_by</code>.
    </p>
    @php
        $countries = [
            [ 'name' => 'Ghana', 'value' => 'gh', 'continent_code' => 'af' ],
            [ 'name' => 'Nigeria', 'value' => 'ng', 'continent_code' => 'af' ],
            [ 'name' => 'Kenya', 'value' => 'ke', 'continent_code' => 'af' ],
            [ 'name' => 'China', 'value' => 'ch', 'continent_code' => 'as' ],
            [ 'name' => 'Thailand', 'value' => 'th', 'continent_code' => 'as' ],
            [ 'name' => 'Japan', 'value' => 'jp', 'continent_code' => 'as' ],
            [ 'name' => 'Canada', 'value' => 'ca', 'continent_code' => 'na' ],
            [ 'name' => 'Jamaica', 'value' => 'jm', 'continent_code' => 'na' ],
            [ 'name' => 'Honduras', 'value' => 'hn', 'continent_code' => 'na' ],
            [ 'name' => 'Netherlands', 'value' => 'nd', 'continent_code' => 'eu' ],
            [ 'name' => 'Norway', 'value' => 'nw', 'continent_code' => 'eu' ],
            [ 'name' => 'Poland', 'value' => 'pl', 'continent_code' => 'eu' ],
        ];
    @endphp

    <x-bladewind::card reduce_padding="true">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <x-bladewind::select name="continent" placeholder="Select Continent" data="manual" filter="continent-country" add_clearing="false">
                <x-bladewind::select.item label="Africa" value="af" />
                <x-bladewind::select.item label="Asia" value="as" />
                <x-bladewind::select.item label="Australia" value="au" />
                <x-bladewind::select.item label="Europe" value="eu" />
                <x-bladewind::select.item label="North America" value="na" />
            </x-bladewind::select>
            <x-bladewind::select
                name="continent-country"
                placeholder="Select Country"
                searchable="true"
                empty-placeholder="no countries available"
                data="{{json_encode($countries)}}"
                label_key="name" value_key="value" filter_by="continent_code" add_clearing="false" />
        </div>
    </x-bladewind::card>
<br />
    <p>
        Let us take a look at the code. We start by defining the array that will populate the continents select component.
    </p>
    <pre class="language-js line-numbers">
        <code>
            // this array populates the country dropdown.
            // all countries in this array are displayed when no continent is selected
            $countries = [
                [ 'name' => 'Ghana', 'value' => 'gh', 'continent_code' => 'af' ],
                [ 'name' => 'Nigeria', 'value' => 'ng', 'continent_code' => 'af' ],
                [ 'name' => 'Kenya', 'value' => 'ke', 'continent_code' => 'af' ],
                [ 'name' => 'China', 'value' => 'ch', 'continent_code' => 'as' ],
                [ 'name' => 'Thailand', 'value' => 'th', 'continent_code' => 'as' ],
                [ 'name' => 'Japan', 'value' => 'jp', 'continent_code' => 'as' ],
                [ 'name' => 'Canada', 'value' => 'ca', 'continent_code' => 'na' ],
                [ 'name' => 'Jamaica', 'value' => 'jm', 'continent_code' => 'na' ],
                [ 'name' => 'Honduras', 'value' => 'hn', 'continent_code' => 'na' ],
                [ 'name' => 'Netherlands', 'value' => 'nd', 'continent_code' => 'eu' ],
                [ 'name' => 'Norway', 'value' => 'nw', 'continent_code' => 'eu' ],
                [ 'name' => 'Poland', 'value' => 'pl', 'continent_code' => 'eu' ],
            ];
        </code>
    </pre>

    <p>
        Next is the continents select component. This time we used a manual select instead of generating this from an array because it is just a list of 4 continents.
        Take note however, of the <code class="inline text-red-500">filter="continent-country"</code> attribute. <code class="inline">continent-country</code> is the name of the select component we want to filter.
    </p>
    <pre class="language-markup line-numbers" data-line="3,5">
        <code>
            &lt;!--- the continents select component. --->
            &lt;x-bladewind::select name="continent" placeholder="Select Continent"
                filter="continent-country"
                data="manual"&gt;
                &lt;x-bladewind::select.item label=Africa" value="af" /&gt;
                &lt;x-bladewind::select.item label="Asia" value="as" /&gt;
                &lt;x-bladewind::select.item label="Europe" value="eu" /&gt;
                &lt;x-bladewind::select.item label="North America" value="na" /&gt;
            &lt;/x-bladewind::select&gt;
        </code>
    </pre>
    <p>
        Next we introduced <code class="inline text-red-500">filter_by="continent_code"</code> when creating our <code class="inline">continent-country</code> select component.
        When this attribute is defined, all BladewindUI does is to add a <code class="inline">data-filter-value</code> attribute to the HTML generated for the Select component's items.
        Whatever value is defined for <code class="inline text-red-500">filter_by</code> must exist as a key in the data you are populating the component with.
        You can tell from our example array above, there is a key called <code class="inline">continent_code</code>.
    </p>
    <p>
        The items in the continents select component have values that match <code class="inline">continent_code</code>.
        For example the line for Africa has a value of <code class="inline">af</code>. Selecting this will filter the countries select component and keep all items whose <code class="inline">continent_code</code> match <code class="inline">af</code>.
    </p>

    <pre class="language-markup line-numbers" data-line="3,7">
        <code>
            &lt;!--- the countries select component. --->
            &lt;x-bladewind::select
                name="continent-country"
                placeholder="Select Country"
                searchable="true"
                data="json_encode($countries)"
                filter_by="continent_code"
                empty-placeholder="no countries available"
                label_key="name"
                value_key="name"&gt;
        </code>
    </pre>

    <h3 id="another-value">Filter a Select component based on some value</h3>
    <p>
        The earlier example filtered our countries select component based on which continent was selected from our continent's select component.
        You may not always want your filtering to be based on a value from one select component but probably just some arbitrary value passed from a link, button or other component.
        The select component exposes a <code class="inline text-red-500">filter()</code> method that allows for runtime filtering.
    </p>

    <x-bladewind::card reduce_padding="true">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <div class="space-x-2 flex items-center">
                <a href="javascript:filterCountries('af')"><x-bladewind::tag label="africa" color="purple" class="cursor-pointer" /></a>
                <a href="javascript:filterCountries('as')"><x-bladewind::tag label="asia" color="purple" class="cursor-pointer" /></a>
                <a href="javascript:filterCountries('eu')"><x-bladewind::tag label="europe" color="purple" class="cursor-pointer" /></a>
                <a href="javascript:filterCountries('na')"><x-bladewind::tag label="north america" color="purple" class="cursor-pointer" /></a>
            </div>
            <x-bladewind::select name="continent-and-country2" placeholder="Select Country" searchable="true" data="{{json_encode($countries)}}" label_key="name" value_key="value" filter_by="continent_code" add_clearing="false" />
        </div>
    </x-bladewind::card>
    <script>
        filterCountries = (continent) => {
            bw_continent_and_country2.filter('continent_and_country2');
            bw_continent_and_country2.filter('continent_and_country2', continent);
        }
    </script>
    <br />
    <p>
        In this example, clicking on a tag filters the list of countries. This is achieved by calling the <code class="inline text-red-500">filter()</code> method on the target select component. Each tag calls a
        <code class="inline">filterCountries()</code> Javascript function, passing the value of the continent as the parameter. Africa for example passes the parameter <code class="inline">af</code> as <code class="inline">filterCountries('af')</code>.
    </p>
    <pre class="language-markup line-numbers" data-line="3,12">
        <code>
            &lt;div class="bg-slate-100 sm:grid sm:grid-cols-2 gap-6 flex items-center"&gt;
                &lt;div class="space-x-2"&gt;
                    &lt;a href="javascript:filterCountries('af')"&gt;
                        &lt;x-bladewind::tag label="africa" color="purple" class="cursor-pointer" /&gt;
                    &lt;/a&gt;
                    &lt;a href="javascript:filterCountries('as')"&gt;
                        &lt;x-bladewind::tag label="asia" color="purple" class="cursor-pointer" /&gt;
                    &lt;/a&gt;
                    ...
                &lt;/div&gt;
                &lt;x-bladewind::select
                    name="continent-country2"
                    placeholder="Select Country"
                    searchable="true"
                    data="json_encode($countries)"
                    label_key="name"
                    value_key="value"
                    filter_by="continent_code" /&gt;
            &lt;/div&gt;
        </code>
    </pre>
    <p>
        Below is the script called by the tags. Note line 3 where we call the <code class="inline">filter()</code> function on the <code class="inline">continent-country2</code> select component.
        We need to prefix the component name with <code class="inline">bw_</code> and also change all dashes in the component name to underscores. <code class="inline">continent-country2</code> becomes <code class="inline">continent_country2</code>.
        Replacing dashes with underscores is not required if you already named your select component with underscores.
    </p>
    <p>
        Also note how in this case we called the <code class="inline">filter()</code> on the same component that we are targeting. This is because we are not triggering the filtering from another select component.
    </p>
    <pre class="language-markup line-numbers">
        <code>
            &lt;script&gt;
                filterCountries = (continent) => {
                    // this is where we actually tell the component to filter
                    bw_continent_country2.filter('continent_country2', continent);
                }
            &lt;/script&gt;
        </code>
    </pre>

    <h2 id="native">Native Select</h2>
    <p>
        It is possible to use the plain old HTML <code class="inline">&lt;select&gt; </code> element and apply the BladewindUI <code class="inline">bw-raw-select</code> class to change the style to look just like all the other BladewindUI form components.
        This option has no searchability and does only what the HTML select element is capable of doing.
    </p>
    <p>
        <select class="bw-select bw-raw-select">
            <option value="">Are you above 18?</option>
            <option value="yes">Yep! I am</option>
            <option value="no">Nope but tell no one</option>
            <option value="idk">I'd rather not say</option>
        </select>
    </p>
    <pre class="language-markup line-numbers">
        <code>
            &lt;select name="age" class="bw-raw-select"&gt;
                &lt;option value=""&gt;Are you above 18?&lt;/option&gt;
                &lt;option value="yes"&gt;Yep! I am&lt;/option&gt;
                &lt;option value="no"&gt;Nope but tell no one&lt;/option&gt;
                &lt;option value="idk"&gt;I'd rather not say&lt;/option&gt;
            &lt;/select&gt;
        </code>
    </pre>
    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Dropdown component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>bw-select</td>
            <td>This name is assigned to the hidden input created for the select. The name is then accessed when the select is submitted in a form.</td>
        </tr>
        <tr>
            <td>placeholder</td>
            <td>Select One</td>
            <td>Default text displayed on the select</td>
        </tr>
        <tr>
            <td>label</td>
            <td>null</td>
            <td>Text displayed on the select <strong>as a label</strong></td>
        </tr>
        <tr>
            <td>onselect</td>
            <td><em>blank</em></td>
            <td>Custom function to call when an item in the select is selected. <b>This should just be the name of the custom function, without parenthesis</b>. For example <code class="inline text-red-500">assignToProject</code>.
            The component appends the selected <em>value</em> and <em>label</em> to the function call as <code class="inline text-red-500">assignToProject(value, label)</code></td>
        </tr>
        <tr>
            <td>:data</td>
            <td>[]</td>
            <td>Array of elements to be displayed in the component. This should be an array. See above examples. Ignore this attribute if you prefer to use <code class="inline">data</code> instead.</td>
        </tr>
        <tr>
            <td>data</td>
            <td>[]</td>
            <td><b>Json encoded</b> array of elements to be displayed in the component. Ignore this attribute if you prefer to use <code class="inline">:data</code> instead..</td>
        </tr>
        <tr>
            <td>value_key</td>
            <td>value</td>
            <td>Which key in your array should the select pick its values from.</td>
        </tr>
        <tr>
            <td>label_key</td>
            <td>label</td>
            <td>Which key in your array should the select pick its values from.</td>
        </tr>
        <tr>
            <td>flag_key</td>
            <td><em>blank</em></td>
            <td>When using the select with flags, which key in your array should the select pick the country ISO codes from. Flags are only rendered using the countries ISO codes.</td>
        </tr>
        <tr>
            <td>image_key</td>
            <td><em>blank</em></td>
            <td>When using the select with images, which key in your array should the select pick its images from.</td>
        </tr>
        <tr>
            <td>data_serialize_as</td>
            <td><em>blank</em></td>
            <td>This is better explained with an example. In a form your select has <code class="inline text-red-500">name="country"</code>. When the form is submitted the select's value can be accessed as <code class="inline text-red-500">$request->country</code>.
            If for some reason you want your select to have its name but pass its value with a different name, set <code class="inline text-red-500">data_serialize_as</code>. Picking up on the example, if we set, <code class="inline text-red-500">data_serialize_as="country_name"</code>, when the form is submitted
            we can access the value of the select as <code class="inline text-red-500">$request->country_name</code>.
            </td>
        </tr>
        <tr>
            <td>required</td>
            <td>false</td>
            <td>Determines if an asterisk should be appended to the placeholder text to indicate the field is required. <br > <code class="inline">true</code> <code class="inline">false</code>.</td>
        </tr>
        <tr>
            <td>selected_value</td>
            <td><em>blank</em></td>
            <td>Determines which value from the array should be selected by default when the select loads. Useful when editing content. If you want an item in your array whose value=13 to be selected, set <code class="inline text-red-500">selected_value="13"</code>.
            You can also set multiple values to be selected <code class="inline text-red-500">selected_value="to do, in progress, done"</code></td>
        </tr>
        <tr>
            <td>searchable</td>
            <td>false</td>
            <td>Makes the select either searchable or not. A search box is placed above the select items when set to <code class="inline">true</code>. <br /><code class="inline">true</code> <code class="inline">false</code>.</td>
        </tr>
        <tr>
            <td>disabled</td>
            <td>false</td>
            <td>Specifies if select should be disabled or not.<br /> <code class="inline">true</code> <code class="inline">false</code>.</td>
        </tr>
        <tr>
            <td>readonly</td>
            <td>false</td>
            <td>Specifies if select should be readonly or not.<br /> <code class="inline">true</code> <code class="inline">false</code>.</td>
        </tr>
        <tr>
            <td>multiple</td>
            <td>false</td>
            <td>Specifies if multiple items can be selected.<br /> <code class="inline">true</code> <code class="inline">false</code>.</td>
        </tr>
        <tr>
            <td>add_clearing</td>
            <td>true</td>
            <td>Specifies if a 12px margin should be applied to the bottom of the select for spacing. Useful in forms. All BladewindUI form elements have this for uniformity.<br /> <code class="inline">true</code> <code class="inline">false</code>.</td>
        </tr>
        <tr>
            <td>max_selectable</td>
            <td>-1</td>
            <td>What is the maximum number of items that can be selected. -1 means no maximum. This is only applied when <code class="inline">multiple="true"</code> <br /><code class="inline">positive integers</code></td>
        </tr>
        <tr>
            <td>max_error</td>
            <td>Please select only %s items</td>
            <td>Message to display if user tries to select more than is allowed by <code class="inline">true</code>max_selectable</code>. %s is replaced with the number specified in <code class="inline">max_selectable</code></td>
        </tr>
        <tr>
            <td>filter</td>
            <td><em>blank</em></td>
            <td>The name of the select component that needs to be filtered. <a href="#s2sfiltering">See above example</a>.</td>
        </tr>
        <tr>
            <td>filter_by</td>
            <td><em>blank</em></td>
            <td>Which key in the target select component's  <code class="inline">data</code>, should be used in filtering its items.</td>
        </tr>
        <tr>
            <td>modular</td>
            <td>false</td>
            <td>Determines if script tags used within the component should have <code class="inline text-red-500">type="module"</code>. Useful sometimes when working with Vite js.
            <br/><code class="inline">true</code>  <code class="inline">true</code>
            </td>
        </tr>
        <tr>
            <td>empty_placeholder</td>
            <td>No options available</td>
            <td>Text to display when there are no items to display in the Select component.</td>
        </tr>
        <tr>
            <td>empty_state</td>
            <td>false</td>
            <td>Determines if the component should display an empty state if no items are available.
            <br/><code class="inline">true</code>  <code class="inline">true</code>
            </td>
        </tr>
        <tr>
            <td>empty_state_message</td>
            <td>No options available</td>
            <td>Message to display in empty state component if there are no items.</td>
        </tr>
        <tr>
            <td>empty_state_button_label</td>
            <td>Add</td>
            <td>Text to display for empty state action button. Leave this blank to hide the button.</td>
        </tr>
        <tr>
            <td>empty_state_onclick</td>
            <td><em>blank</td>
            <td>Javascript function to call when action button is clicked.</td>
        </tr>
        <tr>
            <td>empty_state_image</td>
            <td>empty-state.svg</td>
            <td>Image to display in the empty state component when there are no items to display. Defaults to the component default.</td>
        </tr>
        <tr>
            <td>empty_state_show_image</td>
            <td>true</td>
            <td>Determines if image should be displayed in the empty state component.
            <br/><code class="inline">true</code>  <code class="inline">true</code>
            </td>
        </tr>
        <tr>
            <td>size</td>
            <td>medium</td>
            <td>
                Sizing of the select to match other input and button sizes.<br />
                <code class="inline">small</code> <code class="inline">regular</code><code class="inline">medium</code> <code class="inline">big</code>
            </td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>


    <h3>Select Item Attributes</h3>
    <p>When manually listing select items, the following attributes are available</p>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>value</td>
            <td>value</td>
            <td>Value of the item.</td>
        </tr>
        <tr>
            <td>label</td>
            <td>label</td>
            <td>Label of the item.</td>
        </tr>
        <tr>
            <td>flag</td>
            <td><em>blank</em></td>
            <td>ISO code of country whose flag to display.</td>
        </tr>
        <tr>
            <td>image</td>
            <td><em>blank</em></td>
            <td>URL of image to display for the item.</td>
        </tr>
        <tr>
            <td>selected</td>
            <td><em>false</em></td>
            <td>Determines if the item should be selected or not.  <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>max_selectable</td>
            <td>-1</td>
            <td>What is the maximum number of items that can be selected. -1 means no maximum.  <br /><code class="inline">positive integers</code></td>
        </tr>
        <tr>
            <td>max_error</td>
            <td>Please select only %s items</td>
            <td>Message to display is user tries to select more than is allowed by <code class="inline">true</code>max_selectable</code>. %s is replaced with the number specified in <code class="inline">max_selectable</code></td>
        </tr>
    </x-bladewind::table>

    <h3>Select with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::select
                name="country"
                placeholder="What is your nationality"
                label="What is your nationality"
                onselect="confirmSelection"
                data="&#123;&#123; json_encode($countries)}} "
                value_key="code"
                label_key="country"
                flag_key="code"
                image_key=""
                disabled="false"
                readonly="true"
                data_serialize_as="country_id"
                required="true"
                selected_value="1001"
                max_selectable="3"
                searchable="true"
                empty_state="true"
                empty_state_message="Define a user"
                empty_state_onclick="alert('hey')"
                empty_state_button_label="new user"
                empty_state_image=""
                empty_state_show_image="false"
                filter="countries"
                filter_by="continent_id"
            /&gt;
        </code>
    </pre>

<x-bladewind::alert show_close_icon="false">
    The source file for this component is available in <code class="inline">resources > views > components > bladewind > select > index.blade.php</code> and
    <code class="inline">resources > views > components > bladewind > select > item.blade.php</code>
</x-bladewind::alert> <br />
<x-bladewind::alert show_close_icon="false">
    The javascript source file for this component is available in <code class="inline">public/vendor/bladewind/assets/js/select.js</code>
</x-bladewind::alert>

<x-slot:side_nav>
    <div class="flex items-center"><div class="dot"></div><a href="#basic">Basic usage</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#placeholder">Change placeholder text</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#use-labels">Using labels</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#keys">Setting keys to display</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#default">Default values</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#required">Required field</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#disabled">Disabled</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#readonly">Readonly</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#flags">With country flags</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#images">With images</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#searchable">Searchable select</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#empty">Empty select</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#multiple">Multiple select</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#automatic">Automatic selection</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#non-dynamic">Non dynamic items</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#onselect">Get selected values</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#custom-functions">Custom functions</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#js-manipulations">JavaScript manipulations</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#example">A practical example</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#filtering">Filtering</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#table">Dynamically filter a table <br />based on selected values</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#another-select">Filter a Select component <br />based on the value of <br />another Select component</a></div>
    <div class="flex items-center pl-5"><div class="dot"></div><a href="#another-value">Filter a Select component <br />based on some value</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#native">Native select</a></div>
    <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
</x-slot:side_nav>
<x-slot name="scripts">
    <script>
        selectNavigationItem('.component-select');
    </script>
</x-slot>
</x-app>
