<x-app>
    <x-slot:title>Button Component</x-slot:title>
    <x-slot:page_title>Button</x-slot:page_title>
    <x-bladewind::alert show_close_icon="false">
        The primary and secondary colours for BladewindUI buttons are picked from what is defined in the <code class="inline">@theme</code> block of your project's <code class="inline">app.css</code>. <a href="/customize/colours">More here</a>.
        If you don't set this, your buttons will either default to the library's blue colour default or be transparent.
    </x-bladewind::alert>
<x-bladewind::notification />
    <br />
    <p>
        This documentation website has set the primary colour theme to <b>indigo</b> so all BladewindUI components will use this primary colour to maintain consistency.
    </p>

    <div class="text-center p-4 space-y-2 space-x-4">
        <x-bladewind::button>Subscribe Now</x-bladewind::button>
        <x-bladewind::button uppercasing="false">Subscribe Now</x-bladewind::button>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button&gt;Subscribe Now&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button uppercasing="false"&gt;
                Subscribe Now
            &lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <br />
    <p>
        By default the component uses the <code class="inline">&lt;button&gt;</code> tag to build the button. To use the <code class="inline">&lt;a&gt;</code> tag to build the button, you will need to specify
        the attribute <code class="inline text-red-500">tag="a"</code>.
    </p>
    <div class="text-center p-4">
        <x-bladewind::button tag="a" href="{{ route('home') }}">Subscribe Now</x-bladewind::button>
    </div>
    <pre class="language-markup">
        <code>
            &lt;!--
            // this button is created using the &lt;a&gt; tag
            // you can inspect element on the above button to check
            -->
            &lt;x-bladewind::button tag="a"&gt;subscribe now&lt;/x-bladewind::button&gt;
        </code>
    </pre>

    <h2 id="types">Button Types</h2>
    <p>
        BladewindUI buttons come in four types. We believe these four cover what is required in most projects.
        There are primary, secondary and circular buttons. Outline buttons exist in these three types.
    </p>
    <h3 id="primary">Primary Buttons</h3>
    <p>These buttons depend on the primary colour defined in your project's <code class="inline">tailwind.config.js</code>. <a href="/customize/colours">Please ensure</a> this is defined. </p>
    <div class="text-center space-y-4 space-x-4">
        <x-bladewind::button>Primary Button</x-bladewind::button>
        <x-bladewind::button outline="true">Primary Button</x-bladewind::button>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button&gt;Primary Button&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button outline="true"&gt;Primary Button&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <h3 id="secondary">Secondary Buttons</h3>
    <p>The secondary buttons depend on the secondary colour defined in your project's <code class="inline">tailwind.config.js</code>. <a href="/customize/colours">Please ensure</a> this is defined. </p>
    <div class="text-center space-y-4 space-x-4">
        <x-bladewind::button type="secondary">Secondary Button</x-bladewind::button>
        <x-bladewind::button type="secondary" outline="true">Secondary Button</x-bladewind::button>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button type="secondary"&gt;Secondary Button&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::button type="secondary" outline="true"&gt;
                Secondary Button
            &lt;/x-bladewind::button&gt;
        </code>
    </pre>


    <h3 id="circular">Circular Buttons</h3>
    <p>
        The Bladewind button component provides a circular option that accepts ONLY icons. The <a href="/component/icon">Icon component page</a> describes how to use icon names.
        Just like the non-circular buttons, these can exist as primary or secondary and in all colour flavours.
    </p>
    <div class="text-center space-x-4">
        <x-bladewind::button.circle icon="bell-alert" />
        <x-bladewind::button.circle outline="true" icon="bell-alert" />
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button.circle icon="bell-alert" /&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button.circle outline="true" icon="bell-alert" /&gt;
        </code>
    </pre>
    <br />
    <p>
        Bladewind determines which button type (primary or secondary) to display based on the <code class="inline text-red-500">type</code> attribute. The circular buttons
        however, set <code class="inline text-red-500">type="circular"</code> so it is technically not possible to define a secondary circular button. A workaround, if you wish to have a
        secondary circular button is to set <code class="inline text-red-500">color="secondary"</code>
    </p>

    <div class="text-center">
        <x-bladewind::button.circle color="secondary" outline="true" icon="bell-alert" />
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button.circle color="secondary" outline icon="bell-alert" /&gt;
        </code>
    </pre>

    <h3 id="outline">Outline Buttons</h3>
    <p>
        Buttons can exist as outlines only. This can be achieved by setting the attribute <code class="inline text-red-500">outline="true"</code>.
        The outline picks up the value of the <code class="inline text-red-500">color</code> attribute if you are using a primary button.
        Secondary buttons just have one colour so a secondary outline button picks up that colour. All other attributes defined on the button like <code class="inline text-red-500">radius</code> are preserved.
        The button only loses its background colour.
    </p>
    <div class="text-center p-4 space-x-3 space-y-3">
        <x-bladewind::button radius="full" outline color="cyan">Cyan Outline</x-bladewind::button>
        <x-bladewind::button type="secondary" radius="full" outline>Secondary Outline</x-bladewind::button>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button radius="full" outline="true" color="cyan">Cyan outline&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button radius="full" outline="true" type="secondary">Secondary outline&lt;/x-bladewind::button&gt;
        </code>
    </pre><br />
    <p>
        By default, outline buttons use the TailwindCSS <code class="inline">border-2</code> width. You can modify the border width
        and specify any of the other supported TailwindCSS border widths without the "border-" prefix by setting the
        <code class="inline text-red-500">border_width</code> attribute.
    </p>
    <div class="text-center p-4 space-x-3 space-y-3">
        <x-bladewind::button outline border_width="2">Border 2</x-bladewind::button>
        <x-bladewind::button outline  border_width="4">Border 4</x-bladewind::button>
        <x-bladewind::button outline border_width="8">Border 8</x-bladewind::button>
    </div>
    <br />
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button outline="true" border_width="2">Border 2&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button outline="true" border_width="4">Border 4&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button outline="true" border_width="8">Border 8&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <h2 id="states">Button States</h2>
    <p>
        BladewindUI buttons can exist in a couple of states. Probably states isn't the right term for these but let's stick with that for lack of a better term/
    </p>
    <h3 id="norings">No Focus Rings</h3>
    <div class="text-center p-4">
        <x-bladewind::button show_focus_ring="false">No Focus Ring</x-bladewind::button>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button show_focus_ring="false"&gt;no focus ring&lt;/x-bladewind::button&gt;
        </code>
    </pre>

    <h3 id="ring-sizes">Different Focus Ring Widths</h3>
    <div class="text-center p-4 space-x-4 space-y-4">
        <x-bladewind::button>Default</x-bladewind::button>
        <x-bladewind::button ring_width="1">Ring 1</x-bladewind::button>
        <x-bladewind::button ring_width="2">Ring 2</x-bladewind::button>
        <x-bladewind::button ring_width="4">Ring 4</x-bladewind::button>
        <x-bladewind::button ring_width="8">Ring 8</x-bladewind::button>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button&gt;default&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button ring_width="1"&gt;ring 1&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button ring_width="2"&gt;ring 2&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button ring_width="4"&gt;ring 4&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button ring_width="8"&gt;ring 8&lt;/x-bladewind::button&gt;
        </code>
    </pre>

    <h3 id="disabled">Disabled Button</h3>
    <div class="text-center space-x-4 space-y-4">
        <x-bladewind::button disabled="true">Disabled</x-bladewind::button>
        <x-bladewind::button disabled="true" type="secondary">Disabled Secondary</x-bladewind::button>
        <x-bladewind::button disabled="true" outline>Disabled Outline</x-bladewind::button>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button disabled="true"&gt;disabled&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::button
                disabled="true"
                type="secondary"&gt;
                disabled secondary
            &lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button disabled outline&gt;disabled outline&lt;/x-bladewind::button&gt;
        </code>
    </pre>

    <h3 id="sizes">Different Sizes</h3>
    <p>
        Each button type has a corresponding size. The available sizes are <code class="inline">tiny</code>
        <code class="inline">small</code> <code class="inline">regular</code> and <code class="inline">big</code>.
        The default size is <code class="inline">regular</code>.
    </p>
    <h4>Tiny</h4>
    <div class="text-center p-4 space-x-3 space-y-3">
        <x-bladewind::button size="tiny">tiny</x-bladewind::button>
        <x-bladewind::button size="tiny" type="secondary">tiny</x-bladewind::button>
        <x-bladewind::button size="tiny" outline>tiny</x-bladewind::button>
        <x-bladewind::button.circle size="tiny" icon="bell-alert" />
        <x-bladewind::button.circle size="tiny" outline icon="bell-alert" />
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button size="tiny"&gt;tiny&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <h4>Small</h4>
    <div class="text-center p-4 space-x-3 space-y-3">
        <x-bladewind::button size="small">small</x-bladewind::button>
        <x-bladewind::button size="small" type="secondary">small</x-bladewind::button>
        <x-bladewind::button size="small" outline>small</x-bladewind::button>
        <x-bladewind::button.circle size="small" icon="bell-alert" />
        <x-bladewind::button.circle size="small" outline icon="bell-alert" />
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button size="small"&gt;small&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <h4>Regular / Default</h4>
    <div class="text-center p-4 space-x-3 space-y-3">
        <x-bladewind::button>default</x-bladewind::button>
        <x-bladewind::button type="secondary">default</x-bladewind::button>
        <x-bladewind::button outline>default</x-bladewind::button>
        <x-bladewind::button.circle icon="bell-alert" />
        <x-bladewind::button.circle outline icon="bell-alert" />
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button size="regular"&gt;default&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button&gt;default&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <h4>Medium</h4>
    <div class="text-center p-4 space-x-3 space-y-3">
        <x-bladewind::button size="medium">medium</x-bladewind::button>
        <x-bladewind::button size="medium" type="secondary">medium</x-bladewind::button>
        <x-bladewind::button size="medium" outline>medium</x-bladewind::button>
        <x-bladewind::button.circle size="medium" icon="bell-alert" />
        <x-bladewind::button.circle size="medium" outline icon="bell-alert" />
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button size="medium"&gt;medium&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button.circle size="medium"&gt;medium&lt;/x-bladewind::button.circle&gt;
        </code>
    </pre>
    <h4>Big</h4>
    <div class="text-center p-4 space-x-3 space-y-3">
        <x-bladewind::button size="big">big</x-bladewind::button>
        <x-bladewind::button size="big" type="secondary">big</x-bladewind::button>
        <x-bladewind::button size="big" outline>big</x-bladewind::button>
        <x-bladewind::button.circle size="big" icon="bell-alert" />
        <x-bladewind::button.circle size="big" outline icon="bell-alert" />
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button size="big"&gt;big&lt;/x-bladewind::button&gt;
        </code><a name="secondary"></a>
    </pre>

    <h3 id="radii">Different Radii</h3>
    <p>
        Different developers have different button radius preferences. The default Bladewind buttons go for a full radius making the buttons very rounded.
        The component provides a way to change the radius of the button by setting the <code class="inline text-red-500">radius</code> attribute.
    </p>
    <div class="text-center p-4 space-x-3 space-y-3">
        <x-bladewind::button radius="none">none</x-bladewind::button>
        <x-bladewind::button radius="small">Small</x-bladewind::button>
        <x-bladewind::button radius="medium">Medium</x-bladewind::button>
        <x-bladewind::button radius="full">Full</x-bladewind::button>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button radius="none">none&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;!-- this is the default so radius="small" can be omitted -->
            &lt;x-bladewind::button radius="small">small&lt;/x-bladewind::button&gt;
            &lt;x-bladewind::button>small&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button radius="medium">medium&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::button radius="full">full&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <div class="text-center p-4 space-x-3 space-y-3">
        <x-bladewind::button type="secondary" radius="none">None</x-bladewind::button>
        <x-bladewind::button type="secondary" radius="small">Small</x-bladewind::button>
        <x-bladewind::button type="secondary" radius="medium">Medium</x-bladewind::button>
        <x-bladewind::button type="secondary" radius="full">Full</x-bladewind::button>
    </div>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button type="secondary" radius="none">none&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button type="secondary" radius="small">small&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::button type="secondary" radius="medium">medium&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::button type="secondary" radius="full">full&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <h2 id="spinning">With Spinners</h2>
    <p>Buttons can have spinners. This is useful when indicating progress of a form submission or progress of any other action.
    The button spinners use the BladewindUI <a href="/component/spinner">Spinner</a> component.</p>
    <p>Spinners can be activated on buttons by setting the <code class="inline text-red-500">has_spinner="true"</code>
    attribute. This creates a button with a spinner but, the spinners are hidden by default. The assumption is, you want a button
    with a spinner but you want to show the spinner when the button is clicked. If you want the spinner to be visible by default you can set the
    attribute <code class="inline text-red-500">show_spinner="true"</code>.</p>
    <div class="text-center space-y-4 space-x-4">
        <x-bladewind::button has_spinner="true" show_spinner="true">Saving ...</x-bladewind::button> &nbsp;&nbsp;
        <x-bladewind::button type="secondary" has_spinner="true" show_spinner="true">Saving ...</x-bladewind::button>
        <x-bladewind::button outline has_spinner="true" show_spinner="true">Saving ...</x-bladewind::button>
    </div>
    <pre class="language-markup line-numbers" data-line="2,3">
        <code>
            &lt;x-bladewind::button
                has_spinner="true"
                show_spinner="true"&gt;
                Saving...
            &lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <p>
        It is possible to trigger the spinning effect when the button is clicked. This can be achieved using the helper functions bundled with BladewindUI.
        In this case you will need to set the <code class="inline text-red-500">name</code> and <code class="inline text-red-500">onclick</code> attributes of the button.
    </p>
    <div class="text-center p-4">
        <x-bladewind::button has_spinner="true" name="save-user" onclick="showButtonSpinner('.save-user')">Click for my spinner</x-bladewind::button> &nbsp;&nbsp;
    </div>

    <pre class="language-markup line-numbers" data-line="2-4">
        <code>
            &lt;x-bladewind::button
                has_spinner="true"
                name="save-user"
                onclick="showButtonSpinner('.save-user')"&gt;
                Click for my spinner
            &lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <h2 id="icons">With Icons</h2>
    <p>Buttons can have <a href="/component/icon">icons</a>.
    To add an icon simply specify the icon name in the <code class="inline text-red-500">icon</code> attribute. Refer to our <a href="/component/icon">Icon</a> component page for details on icon names.
    Icons by default are positioned to the left of the button. You can set <code class="inline text-red-500">icon_right="true"</code> to position the icon to the right of the button.</p>
    <p>
        <x-bladewind::alert show_close_icon="false">If you specify <b>icon_right="true"</b> and <b>has_spinner="true"</b>, your icon will be ignored because the spinner is positioned to the right of the button.</x-bladewind::alert>
    </p>
    <br />
    <div class="text-center">
        <x-bladewind::button icon="arrow-path">Refresh page</x-bladewind::button>
        <x-bladewind::button icon="arrow-path" icon_right="true">Refresh page</x-bladewind::button>
    </div>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::button icon="arrow-path"&gt;
                Refresh Page
            &lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::button icon="arrow-path" icon_right="true"&gt;
                Refresh Page
            &lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <br />
    <div class="text-center space-x-4">
        <x-bladewind::button type="secondary" icon="arrow-small-right" icon_right="true">Next Chapter</x-bladewind::button>
    </div>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::button
                type="secondary"
                icon="arrow-small-right"
                icon_right="true""&gt;
                Next Chapter
            &lt;/x-bladewind::button&gt;
        </code>
    </pre>

    <h2 id="submittable">Form Submission</h2>
    <p>
        By default the button component is rendered as <code class="inline text-red-500">&lt;button type="button"...</code>.
        This default button behavior will not submit forms. To enable form submission, set this attribute on the button,
        <code class="inline text-red-500">can_submit="true"</code>. The resulting html for the button will be
        <code class="inline text-red-500">&lt;button type="submit"...</code>.
    </p>
    <p>
        <x-bladewind::card size="big">
            <form action="" method="get">
                <div class="sm:flex sm:space-x-3">
                    <x-bladewind::input placeholder="First name" name="first_name" required="true" />
                    <x-bladewind::input placeholder="Last name" name="last_name" />
                </div>
                <x-bladewind::input name="email" placeholder="Email" type="email" />
                <x-bladewind::textarea placeholder="Comment"></x-bladewind::textarea>
                <x-bladewind::button can_submit="true" class="mx-auto block mt-2 w-full">click me to submit</x-bladewind::button>
            </form>
        </x-bladewind::card>
    </p>

    <pre class="language-markup line-numbers" data-line="2">
        <code>
            &lt;x-bladewind::button
                can_submit="true"
                class="mx-auto block"&gt;click me to submit&lt;/x-bladewind::button&gt;
        </code>
    </pre>

    <h2 id="coloured">Coloured Button</h2>
    <p>
        Only primary buttons can take on different colours. Ideally you should <a href="/customize/colours">define a primary colour</a> and let your primary buttons stick with that. If you need to in rare cases, use
        other coloured buttons that are different from your primary button colour, this component provides that. An example of such a case is where your primary colour is purple but your delete buttons need to be red for emphasis.
        Set the <code class="inline text-red-500">color</code> attribute to your preferred colour.
    </p>

    <pre class="language-markup" >
        <code>
            &lt;x-bladewind::button color="red"&gt;red button&lt;/x-bladewind::button&gt;
        </code>
    </pre>
    <br/>
    <div class="grid grid-cols-3 gap-6">
        <x-bladewind::button color="red">Red button</x-bladewind::button>
        <x-bladewind::button color="red" outline>Red outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="red" icon="bell-alert" />
            <x-bladewind::button.circle color="red" icon="bell-alert" outline />
        </div>
    </div>
    <br />
    <br />
    <p>
        Simply replace <code class="inline text-red-500">color="red"</code> with your preferred colour.
    </p>
    <br />
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="yellow">Yellow button</x-bladewind::button>
        <x-bladewind::button color="yellow" outline>Yellow outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="yellow" icon="bell-alert" />
            <x-bladewind::button.circle color="yellow" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="green">Green button</x-bladewind::button>
        <x-bladewind::button color="green" outline>Green outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="green" icon="bell-alert" />
            <x-bladewind::button.circle color="green" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="pink">pink button</x-bladewind::button>
        <x-bladewind::button color="pink" outline>pink outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="pink" icon="bell-alert" />
            <x-bladewind::button.circle color="pink" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="purple">purple button</x-bladewind::button>
        <x-bladewind::button color="purple" outline>purple outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="purple" icon="bell-alert" />
            <x-bladewind::button.circle color="purple" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="gray">gray button</x-bladewind::button>
        <x-bladewind::button color="gray" outline>gray outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="gray" icon="bell-alert" />
            <x-bladewind::button.circle color="gray" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="black">black button</x-bladewind::button>
        <x-bladewind::button color="black" outline>black outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="black" icon="bell-alert" />
            <x-bladewind::button.circle color="black" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="orange">orange button</x-bladewind::button>
        <x-bladewind::button color="orange" outline>orange outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="orange" icon="bell-alert" />
            <x-bladewind::button.circle color="orange" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="indigo">indigo button</x-bladewind::button>
        <x-bladewind::button color="indigo" outline>indigo outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="indigo" icon="bell-alert" />
            <x-bladewind::button.circle color="indigo" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="fuchsia">fuchsia button</x-bladewind::button>
        <x-bladewind::button color="fuchsia" outline>fuchsia outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="fuchsia" icon="bell-alert" />
            <x-bladewind::button.circle color="fuchsia" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="violet">violet button</x-bladewind::button>
        <x-bladewind::button color="violet" outline>violet outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="violet" icon="bell-alert" />
            <x-bladewind::button.circle color="violet" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="cyan">cyan button</x-bladewind::button>
        <x-bladewind::button color="cyan" outline>cyan outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="cyan" icon="bell-alert" />
            <x-bladewind::button.circle color="cyan" icon="bell-alert" outline />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <x-bladewind::button color="blue">blue button</x-bladewind::button>
        <x-bladewind::button color="blue" outline>blue outline</x-bladewind::button>
        <div class="space-x-4">
            <x-bladewind::button.circle color="blue" icon="bell-alert" />
            <x-bladewind::button.circle color="blue" icon="bell-alert" outline />
        </div>
    </div>
<br /><br />
    <p>
        The colours above are the only ones precompiled into BladewindUI.
        The default blue colour is tied to the <code class="inline">primary: colors.blue</code> attribute defined in the tailwind.config.js file.
        If you wish to use a different primary button colour, say indigo,
        you will need to define that colour in your project's tailwind.config.js file
        and the primary will automatically pick that colour.
        <a href="/customize/colours">There is more on this here.</a>
    </p>
    <p>
        <pre class="language-js line-numbers" data-line="5">
            <code>
                // your project's tailwind.config.js
                ...
                extend: {
                    colors: {
                        primary: colors.indigo,
                ...
            </code>
        </pre>
    </p>

    <h2 id="events">Button Events</h2>
    <p>
        The Bladewind button component translates to a regular HTML <code class="inline text-red-500">&lt;button...</code> tag.
        This means you can literally append any HTML button event attribute (<em>onclick, onblur, onmouseover, onmouseout</em> etc) to the component and it will be fired.
    </p>
    <div class="text-center p-4">
        <x-bladewind::button onclick="alert('you clicked me')">I have an onclick</x-bladewind::button>
    </div>

    <pre class="language-markup line-numbers" data-line="2">
        <code>
            &lt;x-bladewind::button
                onclick="alert('you clicked me')"&gt;
                click me to submit
            &lt;/x-bladewind::button&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Button component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>type</td>
            <td>primary</td>
            <td>Type of button to display. <br /><br /><code class="inline">primary</code> <code class="inline">secondary</code></td>
        </tr>
        <tr>
            <td>size</td>
            <td>regular</td>
            <td>Specify the size of the button. These sizes match input field sizes to maintain consistency. <br /><br /><code class="inline">tiny</code> <code class="inline">small</code> <code class="inline">regular</code> <code class="inline">medium</code> <code class="inline">big</code></td>
        </tr>
        <tr>
            <td>name</td>
            <td><em>blank</em></td>
            <td>This name is added to the button's <code class="inline">class</code> attribute just for convenience. This name can then be used to access the button via javascript or css.</td>
        </tr>
        <tr>
            <td>has_spinner</td>
            <td>false</td>
            <td>Defines if the button should include a spinner. The value must be a string and not boolean. <br><br /> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>show_spinner</td>
            <td>false</td>
            <td>This only applies if <code class="inline text-red-500">has_spinner="true"</code>. By default the spinner, even if enabled is hidden. This attribute sets the default visibility of the spinner. The value must be a string and not boolean. <br><br /> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>color</td>
            <td>primary</td>
            <td>Set the colour of the button. The default is picked from what has been defined as the primary colour in your tailwind.config.js file. BladewindUI sets the default to blue. <br /><br><br /> <code class="inline">primary</code> <code class="inline">blue</code> <code class="inline">red</code>
            <code class="inline">yellow</code> <code class="inline">green</code><code class="inline">purple</code> <code class="inline">pink</code>
            <code class="inline">orange</code> <code class="inline">black</code> <code class="inline">cyan</code>
            <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code></td>
        </tr>
        <tr>
            <td>uppercasing</td>
            <td>true</td>
            <td>Determines if the button text is all uppercase. If <code class="inline">false</code>, the text will be displayed as you entered it. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>can_submit</td>
            <td>false</td>
            <td>By default the button component is rendered as <code class="inline text-red-500">&lt;button type="button"...</code>.
            This default behavior will not work for submitting forms. To enable form submission, set <code class="inline">can_submit="true"</code>. The resulting html for the button will be <code class="inline text-red-500">&lt;button type="submit"...</code>. . <br><br /> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>disabled</td>
            <td>false</td>
            <td>Defines if the button should be disabled or enabled. <br><br /> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>show_focus_ring</td>
            <td>true</td>
            <td>By default buttons are displayed with a ring around them when they have focus. This attribute can disable that. <br><br /> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>icon</td>
            <td><em>blank</em></td>
            <td>Defines if the button should have an icon. All Heroicons icon names can be specified.</td>
        </tr>
        <tr>
            <td>icon_right</td>
            <td>false</td>
            <td>Defines if the icon should be positioned to the right of the button. Takes effect only is <em>icon</em> is not blank. <br><br /> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>tag</td>
            <td>button</td>
            <td>Specifies which html tag to use in creating the button. <br><br /> <code class="inline">button</code> <code class="inline">a</code> </td>
        </tr>
        <tr>
            <td>radius</td>
            <td>full</td>
            <td>Specifies how round the button should look. <br><br /> <code class="inline">none</code> <code class="inline">small</code> <code class="inline">medium</code> <code class="inline">full</code> </td>
        </tr>
        <tr>
            <td>outline</td>
            <td>false</td>
            <td>Should button be displayed only as an outline. All background colour is lost. <br><br /> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>border_width</td>
            <td>2</td>
            <td>Only used if outline=true. How thick should the button border be. <br><br /> <code class="inline">2</code> <code class="inline">4</code> <code class="inline">8</code></td>
        </tr>
        <tr>
            <td>ring_width</td>
            <td><em>blank</em></td>
            <td>Set the width of the focus ring. <br><br /> <code class="inline">1</code> <code class="inline">2</code> <code class="inline">4</code> <code class="inline">8</code></td>
        </tr>
        <tr>
            <td>button_text_css</td>
            <td><em>blank</em></td>
            <td>The button text colour has been predetermined by the button colour and respective shades. It is however possible to overwrite the colour of the button text.
                If the css you specify has already been precompiled into the BladewindUI css file, it will be used.
                If not, you need to ensure the css you specify exists in your project's css file <br><br /> <code class="inline">any of the TailwindCss styles</code> </td>
        </tr>
    </x-bladewind::table>

    <h3>Button with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::button
                type="secondary"
                size="big"
                name="btn-subscribe"
                has_spinner="true"
                show_spinner="false"
                disabled="false"
                class="mt-0"
                tag="a"
                outline="true"
                border_width="2"
                show_focus_ring="false"
                radius="medium"
                icon="lock-closed"
                icon_right="false"
                button_text_css="font-bold text-black"
                can_submit="false"&gt;
                ...
            &lt;/x-bladewind::button&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > button.blade.php</code>
    </x-bladewind::alert>


    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#types">Button types</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#primary">Primary</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#secondary">Secondary</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#circular">Circular</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#outline">Outline</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#states">Button states</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#norings">No focus rings</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#ring-sizes">Focus ring widths</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#disabled">Disabled</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#sizes">Different sizes</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#radii">Different radii</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#spinning">With spinners</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#icons">With icons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#submittable">Form submission</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#coloured">Coloured button</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#events">Button events</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-button');
        </script>
    </x-slot:scripts>
</x-app>
