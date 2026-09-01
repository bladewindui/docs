<x-app>
    <x-slot:title>Rating Component</x-slot:title>
    <x-slot:page_title>Rating</x-slot:page_title>
    <p>
        Displays a five star rating system. The number of stars  highlighted match the rating passed.
        There are nine star colors to choose from but the default is <code class="inline text-red-500">orange</code>.
        Where there are multiple ratings on the same page, it is recommended to name each rating component.
        You can either display ratings as stars, hearts or thumbsup.
    </p>
    <p><x-bladewind::rating name="star-rating" /></p>
        <pre class="language-markup">
            <code>
                &lt;x-bladewind::rating name="star-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating type="heart" name="heart-rating" /></p>
        <pre class="language-markup line-numbers" data-line="2">
            <code>
                &lt;x-bladewind::rating
                    type="heart"
                    name="heart-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating type="thumbsup" name="thumb-rating" /></p>
        <pre class="language-markup line-numbers" data-line="2">
            <code>
                &lt;x-bladewind::rating
                    type="thumbsup"
                    name="thumb-rating" /&gt;
            </code>
        </pre>

    <h2 id="colours">Different Colors</h2>
    <p>The BladewindUI tag component allows you to specify different colours. The tags by default are faint in colour with blue being the default colour.
    There are nine colour options to pick from.</p>
    <p><x-bladewind::rating rating="1" color="red" name="red-rating" /></p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="1"
                    color="red"
                    name="red-rating" /&gt;
            </code>
        </pre>
    <p>
        <x-bladewind::rating rating="2" color="yellow" name="yellow-rating" />
    </p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="2"
                    color="yellow"
                    name="yellow-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="3" color="green" name="green-rating" /></p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="3"
                    color="green"
                    name="green-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="4" color="blue" name="blue-rating" /></p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="4"
                    color="blue"
                    name="blue-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="5" color="pink" name="pink-rating" /></p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="5"
                    color="pink"
                    name="pink-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="1" color="cyan" name="cyan-rating" /></p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="1"
                    color="cyan"
                    name="cyan-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating name="orange-rating" /></p>
        <pre class="language-markup">
            <code>
                &lt;x-bladewind::rating name="orange-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="3" color="gray" name="gray-rating" /></p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="3"
                    color="gray"
                    name="gray-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="4" color="purple" name="purple-rating" /></p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="4"
                    color="purple"
                    name="purple-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="4" color="violet" name="violet-rating" /></p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="4"
                    color="violet"
                    name="violet-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="4" color="indigo" name="indigo-rating" /></p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="4"
                    color="indigo"
                    name="indigo-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="4" color="fuchsia" name="fuchsia-rating" /></p>
        <pre class="language-markup line-numbers" data-line="3">
            <code>
                &lt;x-bladewind::rating
                    rating="4"
                    color="fuchsia"
                    name="fuchsia-rating" /&gt;
            </code>
        </pre>

    <h2 id="sizes">Different Sizes</h2>
    <p>The BladewindUI rating component comes not just in colors but also sizes. There are three sizes available. The default size is <code class="inline text-red-500">small</code></p>
    <p><x-bladewind::rating rating="2" name="small-rating" /></p>
        <pre class="language-markup">
            <code>
                &lt;x-bladewind::rating rating="2" name="small-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="3" type="thumbsup" size="medium" name="medium-rating" /></p>
        <pre class="language-markup line-numbers" data-line="2">
            <code>
                &lt;x-bladewind::rating
                    size="medium"
                    type="thumbsup"
                    rating="3"
                    name="medium-rating" /&gt;
            </code>
        </pre>
    <p><x-bladewind::rating rating="2" type="heart" name="big-rating" size="big" /></p>
        <pre class="language-markup line-numbers" data-line="2">
            <code>
                &lt;x-bladewind::rating
                    size="big"
                    type="heart"
                    rating="2"
                    name="big-rating" /&gt;
            </code>
        </pre>

    <h2 id="click">Click Actions</h2>
    <p>
        A hidden input field is created in the background with every rating component that is created. Again, the input field uses the <code class="inline text-red-500">name</code> attribute set for the rating component to uniquely identify and update the hidden input.
        Assuming you named your rating component <code class="inline text-red-500">small-rating</code>, the following hidden input will be created. The name is prefixed with <code class="inline">rating-value-</code> so the resulting name will be <code class="inline">rating-value-small-rating</code>
    </p>
        <pre class="language-markup">
            <code>
                &lt;input type="hidden" class="rating-value-small-rating" value="2" /&gt;
            </code>
        </pre>
    <p>
        You can now access this element via Javascript using the custom function you pass to the <code class="inline text-red-500">onclick</code>.
        Let us assume you have a Javascript function called <code class="inline">saveRating</code> that accepts a parameter of which rating component you wish to save.
        We can end up with the following.
    </p>
        <pre class="language-markup line-numbers" data-line="4">
            <code>
                &lt;x-bladewind::rating
                    rating="2"
                    name="small-rating"
                    onclick="saveRating('small-rating')" /&gt;
            </code>
        </pre>
        <pre class="language-js">
            <code>
                &lt;script&gt;
                    saveRating = function(element) {

                        // element here is the corresponding rating component.
                        // dom_el() is a helper function in BladewindUI
                        // access the value of the element

                        let element_value = dom_el(`::rating-value-${element}`).value;

                        // now that you have the rating value you can save it
                        // maybe via an ajax call.. completely up to you
                        ajaxCall(
                            'post',
                            '/article/rating/save',
                            `rating=${element_value}`
                        );
                    }
                &lt;/script&gt;
            </code>
        </pre>
    <h2 id="no-click">Disabled Click Actions</h2>
    <p>
        In designs we are not always asking users to rate. There are times the user has already rated, and we need to display the ratings as readonly.
        In such cases the hover and click actions need to be disabled so the user won't modify the value of the rating. This can be achieved by setting <code class="inline text-red-500">clickable='false"</code>.
    </p>
    <p>
        <x-bladewind::rating rating="4" clickable="false" />
    </p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::rating rating="4" clickable="false" /&gt;
        </code>
    </pre>

   <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Rating component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>rating</td>
            <td>The name to uniquely identify the component by.</td>
        </tr>
        <tr>
            <td>color</td>
            <td>orange</td>
            <td>
                There are nine colors to choose from. <br />
                <code class="inline">red</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">pink</code>
                <code class="inline">cyan</code> <code class="inline">purple</code> <code class="inline">gray</code> <code class="inline">orange</code>
                <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code>
            </td>
        </tr>
        <tr>
            <td>type</td>
            <td>star</td>
            <td>Determines the type of icon to display ratings as. <br /><code class="inline">star</code> <code class="inline">heart</code></td>
        </tr>
        <tr>
            <td>size</td>
            <td>small</td>
            <td>Determines the size of the stars. <br /><code class="inline">small</code> <code class="inline">medium</code> <code class="inline">big</code></td>
        </tr>
        <tr>
            <td>rating</td>
            <td>0</td>
            <td>Determines the default rating for the component. Any number between 0 and 5. Any number above 0 will result in highlighting of the stars. The number of stars highlighted will depend on the number passed.</td>
        </tr>
        <tr>
            <td>onclick</td>
            <td><em>blank</em></td>
            <td>Javascript function to execute when stars are clicked. </td>
        </tr>
        <tr>
            <td>clickable</td>
            <td>true</td>
            <td>Enable or disable click actions.<br /> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>
    <h3>Rating with all attributes defined</h3>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::rating
                type="heart"
                name="album-rating"
                rating="3"
                color="yellow"
                size="big"
                clickable="true"
                onclick="alert('you clicked on a star')" /&gt;
        </code>
    </pre>

    <h2 id="livewire">Using Rating Inside Livewire</h2>
    <p>
        When a star is picked, the rating value field dispatches a real, native <code class="inline">change</code> event, so
        Livewire's <code class="inline">wire:model</code> picks it up without any extra work on your part. The click and keyboard
        bindings that drive the stars are safe to re-run, so a Livewire re-render will not leave behind duplicate listeners.
    </p>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > rating.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#colours">Different colours</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sizes">Different sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#click">Click actions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#no-click">Disable actions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#livewire">Using Rating inside Livewire</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-rating');
        </script>
    </x-slot>
</x-app>
