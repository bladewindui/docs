<x-app>
    <x-slot:title>Empty State Component</x-slot:title>
    <x-slot:page_title>Empty State</x-slot:page_title>

    <p>
        Display this when there is nothing to display. This prevents your users from seeing boring blank pages with one liners like "no users to display".
        Similar to all the other BladewindUI components, the empty state component has been kept very minimal, bearing in mind that different users have different empty state preferences.
        In fact, each application will have its own specific empty state requirements.
    </p>

    <x-bladewind::empty-state
        message="Awesome! You have no documents to approve."
        button_label="Go to Dashboard"
        onclick="alert('you clicked me')">
    </x-bladewind::empty-state>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::empty-state
                message="Awesome! You have no documents to approve."
                button_label="Go to Dashboard"
                onclick="alert('you clicked me')"&gt;
            &lt;/x-bladewind::empty-state&gt;
        </code>
    </pre>
    <p>
        The above example uses the default empty state image that comes bundled with BladewindUI. This image is available at <code class="inline">public > vendor > bladewind > images > empty-state.svg</code>.
        The default image is used if you leave out the <code class="inline text-red-500">image</code> attribute of the Empty State component. You can use your own images by setting the
        <code class="inline text-red-500">image</code> attribute. Bladewind searches for your file from the <code class="inline">public</code> directory.
    </p>
    <x-bladewind::empty-state
        message="You have not saved any gists to your GitHub account"
        image="/assets/images/no-code.svg"
        button_label="Create Gist"
        onclick="alert('you clicked me')"></x-bladewind::empty-state>
    <pre class="language-markup line-numbers" data-line="3">
        <code>
            &lt;x-bladewind::empty-state
                message="You have not saved any gists to your GitHub account"
                image="/assets/images/no-code.svg"
                button_label="Create Gist"
                onclick="alert('you clicked me')"&gt;
            &lt;/x-bladewind::empty-state&gt;
        </code>
    </pre>
    <p>
        There are times you will want your empty state to have a heading to let the user know immediately what is happening, without having to read the full message.
        To achieve this set the <code class="inline text-red-500">heading</code> attribute of the Empty State component.
    </p>
    <x-bladewind::empty-state
        message="You have not saved any gists to your GitHub account"
        image="/assets/images/no-code.svg"
        button_label="Create Gist"
        heading="Create Gists Now"
        onclick="alert('you clicked me')">
    </x-bladewind::empty-state>
    <pre class="language-markup line-numbers" data-line="3">
        <code>
            &lt;x-bladewind::empty-state
                message="You have not saved any gists to your GitHub account"
                heading="Create Gists Already"
                image="/assets/images/no-code.svg"
                button_label="Create Gist"
                onclick="alert('you clicked me')"&gt;
            &lt;/x-bladewind::empty-state&gt;
        </code>
    </pre>

    <p>
        The examples above use the attributes of the empty state component to build the empty state content. It is also possible to ignore all attributes and dump your content right in to the empty state component.
        In this case you will need to set <code class="inline text-red-500">show_image="false"</code>.
    </p>
    <x-bladewind::empty-state show_image="false">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto text-red-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
        </svg>
        <div class="pb-3">You have no biometric data available</div>
        <x-bladewind::button color="red" size="small">
            Add biometric info
        </x-bladewind::button>
    </x-bladewind::empty-state>
    <pre class="language-markup line-numbers" data-line="2">
        <code>
            &lt;x-bladewind::empty-state
                show_image="false"&gt;

                &lt;svg&gt;
                    ...
                &lt;/svg&gt;
                &lt;p class="pt-2"&gt;You have no biometric data available&lt;/p&gt;
                &lt;x-bladewind.button color="red" size="small"&gt;
                    Add biometric info
                &lt;/x-bladewind.button&gt;

            &lt;/x-bladewind::empty-state&gt;
        </code>
    </pre>

    <p>
        You can also have empty states with no call to action buttons. For example, a "Recent Activities" section that fills up when users perform activities throughout the app. An empty state for a case like that will necessarily need no action to be performed.
        To achieve this, you should leave out the <code class="inline text-red-500">button_label</code> attribute or set it to an empty string.
    </p>

    <x-bladewind::card title="Recent Activities" css="w-3/4 mx-auto">
        <x-bladewind::empty-state
            image="/assets/images/no-activity.svg"
            message="Your recent activities list will take shape as<br/> soon as your organization has some activity">
        </x-bladewind::empty-state>
    </x-bladewind::card>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind.card title="Recent Activities" css="w-3/4 mx-auto"&gt;
                &lt;br /&gt;

                &lt;x-bladewind::empty-state
                    image="/assets/images/no-activity.svg"
                    message="Your recent activities list will take shape as
                            &lt;br/&gt; soon as your organization has some activity"&gt;
                &lt;/x-bladewind::empty-state&gt;

            &lt;/x-bladewind.card&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Empty State component.</p>
    @include('docs/announcement')
    <x-bladewind::table>
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>image</td>
            <td>/vendor/bladewind/images/empty-state.svg</td>
            <td>Image to display.</td>
        </tr>
        <tr>
            <td>show_image</td>
            <td>true</td>
            <td>Specifies whether the image should be displayed or not. Set this to <code>false</code> if you intend to control the entire content of the empty state component. <code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>image_size</td>
            <td>medium</td>
            <td>Specifies the size of the image. <br /><code class="inline">small</code><code class="inline">medium</code><code class="inline">large</code><code class="inline">xl</code><code class="inline">omg</code></td>
        </tr>
        <tr>
            <td>for_select</td>
            <td>false</td>
            <td>Is the empty state going to be used by a select component. When <code class="inline">true</code>, the empty state is hidden and only visible in the select component that references the <code class="inline">name</code> of this empty state. <br /><br /><code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>button_label</td>
            <td><em>blank</em></td>
            <td>Text to display on the call to action button.</td>
        </tr>
        <tr>
            <td>onclick</td>
            <td><em>blank</em></td>
            <td>
                Action to perform when the call to action button is clicked. This could be a block of javascript or a function call. Example:
                <code class="inline text-red-500">onclick="location.href='/dashboard'"</code> or if you have a javascript helper function for accessing URLs you can do
                <code class="inline text-red-500">onclick="goToRoute('dashboard')"</code>
            </td>
        </tr>
        <tr>
            <td>heading</td>
            <td><em>blank</em></td>
            <td>Empty state heading.</td>
        </tr>
        <tr>
            <td>message</td>
            <td><em>blank</em></td>
            <td>Empty state message.</td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-empty-state</td>
            <td>Any additional css classes can be added using this attribute.</td>
        </tr>
        <tr>
            <td>image_css</td>
            <td><em>blank</em></td>
            <td>Any additional css classes to be applied to the image.</td>
        </tr>
    </x-bladewind::table>

    <h3>Empty State with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::empty-state
                message="Hey!! You cleaned up your inbox nicely"
                button_label="Compose a message"
                onclick="goToRoute('new-message')"
                image="/assets/images/empty-inbox.png"
                show_image="true"
                heading="Nothing to see here"
                size="xl"
                image_css="!h-32"
                class="shadow-sm"&gt;
            &lt;/x-bladewind::empty-state&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > empty-state.blade.php</code>
    </x-bladewind::alert><br/>
    <x-bladewind::alert show_close_icon="false">
        Illustrations used above were taken from <a href="https://undraw.co/" target="_blank">https://undraw.co/</a></code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-empty-state');
        </script>
    </x-slot>
</x-app>
