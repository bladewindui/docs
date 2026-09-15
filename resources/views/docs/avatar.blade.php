<x-app>
    <x-slot:title>Avatar Component</x-slot:title>
    <x-slot:page_title>Avatar</x-slot:page_title>

    <p>
        The avatar component allows you to display a rounded picture at different sizes.
        This component can be useful for displaying pictures of logged-in users, a contact list, directory of employees, etc.
        The avatar component can either display a single image or a horizontal stack of images.
        A default placeholder image is used when the <code class="inline">image</code> attribute is either blank or not specified.
    </p>

    <h2 id="single">Single Avatar</h2>
    <div class="text-center">
        <x-bladewind::avatar image="/assets/images/issah.jpg" class="mb-3" />
    </div>
    @php
        $avatarExample1 = <<<'HTML'
            <x-bladewind::avatar image="/path/to/the/image/file" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$avatarExample1"></x-bladewind::code-block>
    <h2 id="sizes">Different Sizes</h2>
    <p>You can specify a size for the avatar. See the full <a href="#attributes">list of attributes</a> for the available sizes. The default size is <code class="inline text-red-500">regular</code></p>
    <div class="text-center space-x-4">
        <x-bladewind::avatar image="/assets/images/edwin.jpeg" size="tiny" />
        <x-bladewind::avatar image="/assets/images/me.jpeg" size="small" />
        <x-bladewind::avatar image="/assets/images/audrey.jpeg" size="medium" />
        <x-bladewind::avatar image="/assets/images/francis.png" />
        <x-bladewind::avatar image="/assets/images/doc.png" size="big" />
        <x-bladewind::avatar image="/assets/images/rowe.jpeg" size="huge" />
        <x-bladewind::avatar image="/assets/images/issah.jpg" size="omg" />
    </div>
    <br />
    @php
        $avatarExample2 = <<<'HTML'
            <x-bladewind::avatar
                image="/path/to/the/image/file"
                size="tiny" />

            <x-bladewind::avatar
                image="/path/to/the/image/file"
                size="small" />

            <x-bladewind::avatar
                image="/path/to/the/image/file"
                size="medium" />

                // this is the default
                <x-bladewind::avatar
                image="/path/to/the/image/file" />

            <x-bladewind::avatar
                image="/path/to/the/image/file"
                size="big" />

            <x-bladewind::avatar
                image="/path/to/the/image/file"
                size="huge" />

            <x-bladewind::avatar
                image="/path/to/the/image/file"
                size="omg" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3,7,11,19,23,27" :code="$avatarExample2"></x-bladewind::code-block>

    <h2 id="stack">Stacked Avatars</h2>
    <p>
        Stacked avatars are a series of avatars overlapping each other. The component will not restrict you from stacking avatars of different sizes but, for a more appealing visual effect, stacking images of the same size is advised.
        You can achieve 'stackability' by using the <code class="inline text-red-500">x-bladewind::avatars</code> component and setting  <code class="inline text-red-500">stacked="true"</code>.
    </p>
    <div class="text-center">
        <x-bladewind::avatars stacked="true">
            <x-bladewind::avatar image="/assets/images/francis.png" />
            <x-bladewind::avatar image="/assets/images/rowe.jpeg" />
            <x-bladewind::avatar image="/assets/images/doc.png" />
            <x-bladewind::avatar image="/assets/images/issah.jpg" />
            <x-bladewind::avatar image="/assets/images/sarpong.png" />
        </x-bladewind::avatars>
    </div>
    <br />
    @php
        $avatarExample3 = <<<'HTML'
            <x-bladewind::avatars stacked="true">
                <x-bladewind::avatar image="/path/to/the/image/file" />
                <x-bladewind::avatar image="/path/to/the/image/file" />
                <x-bladewind::avatar image="/path/to/the/image/file" />
                <x-bladewind::avatar image="/path/to/the/image/file" />
                <x-bladewind::avatar image="/path/to/the/image/file" />
            </x-bladewind::avatars>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="1" :code="$avatarExample3"></x-bladewind::code-block>
    <h3 id="plus">Plus More</h3>
    <p>
        There are cases where you have several avatars but only want to display a specific number and indicate how many more there are to display.
        You can achieve this by setting the  <code class="inline text-red-500">plus</code> attribute to any positive whole number. Setting the
        <code class="inline text-red-500">plus</code> attribute automatically sets  <code class="inline text-red-500">stacked="true"</code>.
        BladewindUI takes this a step further and allows you to specify an action for your "plus more" avatar by specifying the <code class="inline text-red-500">plus_action</code> attribute.
        This accepts a Javascript function.
    </p>
    <div class="text-center">
        <x-bladewind::avatars plus="95" plus_action="alert('show more avatars')">
            <x-bladewind::avatar image="/assets/images/rowe.jpeg" />
            <x-bladewind::avatar image="/assets/images/francis.png" />
            <x-bladewind::avatar image="/assets/images/audrey.jpeg" />
            <x-bladewind::avatar image="/assets/images/doc.png" />
            <x-bladewind::avatar image="/assets/images/issah.jpg" />
        </x-bladewind::avatars>
    </div>
    @php
        $avatarExample4 = <<<'HTML'
            <x-bladewind::avatars
                plus="95"
                plus_action="alert('show more avatars')">
                <x-bladewind::avatar image="/path/to/the/image/file" />
                <x-bladewind::avatar image="/path/to/the/image/file" />
                <x-bladewind::avatar image="/path/to/the/image/file" />
                <x-bladewind::avatar image="/path/to/the/image/file" />
                <x-bladewind::avatar image="/path/to/the/image/file" />
            </x-bladewind::avatars>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$avatarExample4"></x-bladewind::code-block>
    <h2 id="indicator">Dot Indicator</h2>
    <p>
        Avatars can be displayed with a status indicator. These statuses could be online, offline, invisible. To show a dot indicator on an avatar simply set <code class="inline text-red-500">dotted="true"</code>.
    </p>
    <div class="text-center">
        <x-bladewind::avatar dotted="true" image="/assets/images/rowe.jpeg" />
    </div>
    <br />
@php
        $avatarExample5 = <<<'HTML'
            <x-bladewind::avatar
                dotted="true"
                image="/path/to/the/image/file" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2" :code="$avatarExample5"></x-bladewind::code-block>
    <p>
        By default the dot indicator is displayed at the base of the avatar. To change the position to the top of the avatar, set the <code class="inline text-red-500">dot_position="top"</code> attribute.
    </p>
    <div class="text-center">
    <x-bladewind::avatar dotted="true" dot_position="top" image="/assets/images/doc.png" />
    </div>
    <br />
@php
        $avatarExample6 = <<<'HTML'
            <x-bladewind::avatar
                dotted="true"
                dot_position="top"
                image="/path/to/the/image/file" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3" :code="$avatarExample6"></x-bladewind::code-block>
    <p>
        The dot is available in different colours if you wish to use an indicator that matches your theme. This also allows you to set different colours for different statuses.
        Set the <code class="inline text-red-500">dot_color</code> attribute to any of the nine colours compiled into BladewindUI. See the <a href="#attributes">attributes</a> table below for all colours.
    </p>
    <div class="text-center">
        <x-bladewind::avatars dotted="true" dot_position="top">
            <x-bladewind::avatar dot_color="primary" image="/assets/images/francis.png" />
            <x-bladewind::avatar dot_color="gray" image="/assets/images/rowe.jpeg" />
            <x-bladewind::avatar dot_color="red" image="/assets/images/doc.png" />
        </x-bladewind::avatars>
    </div>
    <br />
@php
        $avatarExample7 = <<<'HTML'
            <x-bladewind::avatars dotted="true">
                <x-bladewind::avatar dot_color="primary" image="..." />
                <x-bladewind::avatar dot_color="gray" image="..." />
                <x-bladewind::avatar dot_color="red" image="..." />
            </x-bladewind::avatars>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$avatarExample7"></x-bladewind::code-block>

    <h2 id="labels">Labels</h2>
    <p>
        You may have seen this on websites where the initials of your name are displayed if you have not set a profile image. You can achieve this here by
        specifying a value for the <code class="inline text-red-500">label</code> attribute. A label is also displayed when the <code class="inline text-red-500">image</code> specified is three or less characters long.
    </p>
    <div class="text-center space-x-3">
        <x-bladewind::avatar dotted="true" label="MO" />
        <x-bladewind::avatar label="MK" />
        <x-bladewind::avatar image="PP" />
    </div>
    <br />
@php
        $avatarExample8 = <<<'HTML'
            <x-bladewind::avatar dotted="true" label="MO" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$avatarExample8"></x-bladewind::code-block>
@php
        $avatarExample9 = <<<'HTML'
            <x-bladewind::avatar label="MK" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$avatarExample9"></x-bladewind::code-block>
@php
        $avatarExample10 = <<<'HTML'
            <x-bladewind::avatar image="PP" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$avatarExample10"></x-bladewind::code-block>
<br />
<br />
<div class="text-center">
    <x-bladewind::avatars stacked="true" dotted="true" plus="34">
        <x-bladewind::avatar label="SF" />
        <x-bladewind::avatar label="ZH" />
        <x-bladewind::avatar label="RB" />
    </x-bladewind::avatars>
</div>
<br />
@php
        $avatarExample11 = <<<'HTML'
            <x-bladewind::avatars stacked="true" dotted="true" plus="34">
                <x-bladewind::avatar label="SF" />
                <x-bladewind::avatar label="ZH" />
                <x-bladewind::avatar label="RB" />
            </x-bladewind::avatars>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3" :code="$avatarExample11"></x-bladewind::code-block>
<br />
<br />
<div class="text-center">
    <x-bladewind::avatars dotted="true" class="space-x-4">
        <x-bladewind::avatar label="SF" bg_color="orange" dot_color="orange" />
        <x-bladewind::avatar label="ZH" bg_color="blue" dot_color="blue" />
        <x-bladewind::avatar label="RB" bg_color="purple" dot_color="purple" />
    </x-bladewind::avatars>
</div>
@php
        $avatarExample12 = <<<'HTML'
            <x-bladewind::avatars dotted="true" class="space-x-4">
                <x-bladewind::avatar label="SF" bg_color="orange" dot_color="orange" />
                <x-bladewind::avatar label="ZH" bg_color="blue" dot_color="blue" />
                <x-bladewind::avatar label="RB" bg_color="purple" dot_color="purple" />
            </x-bladewind::avatars>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$avatarExample12"></x-bladewind::code-block>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Avatar component.</p>
    @include('docs/announcement')
    <h3 class="pb-2 ">Avatars Component Attributes</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>size</td>
            <td>regular</td>
            <td>Specifies the size of all the avatars in the group. <br><code class="inline">tiny</code> <code class="inline">small</code> <code class="inline">medium</code><code class="inline">regular</code> <code class="inline">big</code><code class="inline">huge</code> <code class="inline">omg</code></td>
        </tr>
        <tr>
            <td>stacked</td>
            <td>false</td>
            <td>Specifies if the avatars are displayed as a stack. <br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>dotted</td>
            <td>false</td>
            <td>Specifies if the avatars have dot indicators. <br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>dot_color</td>
            <td>green</td>
            <td>Specifies what colour to use as the dot indicator. Only relevant if <em>dotted=true</em>.<br><br>
                <code class="inline">primary</code>
                <code class="inline">blue</code> <code class="inline">red</code>
                <code class="inline">yellow</code> <code class="inline">green</code><code class="inline">purple</code> <code class="inline">pink</code>
                <code class="inline">orange</code> <code class="inline">gray</code> <code class="inline">cyan</code>
            </td>
        </tr>
        <tr>
            <td>dot_position</td>
            <td>bottom</td>
            <td>Specifies where the dot indicator should be placed. Only relevant if <em>dotted=true</em>.<br> <code class="inline">top</code> <code class="inline">bottom</code> </td>
        </tr>
        <tr>
            <td>show_ring</td>
            <td>true</td>
            <td>By default avatars show a ring around them. Setting this can turn it off or back on. <br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>plus</td>
            <td>null</td>
            <td>Display a last avatar with +XX in the box indicating how many more avatars are there. Must be a positive integer greater than zero.</td>
        </tr>
        <tr>
            <td>plus_action</td>
            <td>null</td>
            <td>The Javascript action to perform when the +XX avatar is clicked.</td>
        </tr>
        <tr>
            <td>bg_color</td>
            <td>null</td>
            <td>Display background colour when displaying avatars as labels. This sets the ring colour too. <br><br /> <code class="inline">primary</code> <code class="inline">blue</code> <code class="inline">red</code>
                <code class="inline">yellow</code> <code class="inline">green</code><code class="inline">purple</code> <code class="inline">pink</code>
                <code class="inline">orange</code> <code class="inline">black</code> <code class="inline">cyan</code>
                <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td>mr-2 mt-2</td>
            <td>Any additional css classes can be added using this attribute. This only affects the avatars container.</td>
        </tr>
    </x-bladewind::table>
    <p>&nbsp;</p>
    <h3 class="pb-2 ">Avatars with all attributes defined</h3>
@php
        $avatarExample13 = <<<'HTML'
            <x-bladewind::avatars
                size="big"
                show_ring="false"
                dotted="true"
                dot_color="red"
                dot_position="top"
                plus="33"
                plus_action="showMorePictures()"
                stacked="true"
                class="ring-blue-200 ring-offset-2" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$avatarExample13"></x-bladewind::code-block>

    <p>&nbsp;</p>
    <h3 class="pb-2 ">Avatar Component Attributes</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>image</td>
            <td><em class="text-xs">public/vendor/bladewind/images/avatar.png</em></td>
            <td>The url to the image file. By default a generic headshot image is used if no url is passed. The image will be displayed as a label if it is three characters long or less.</td>
        </tr>
        <tr>
            <td>alt</td>
            <td>image</td>
            <td>The text to display as the value for the image's alt attribute.</td>
        </tr>
        <tr>
            <td>size</td>
            <td>regular</td>
            <td>Specifies the size of the avatar. <br><code class="inline">tiny</code> <code class="inline">small</code> <code class="inline">medium</code><code class="inline">regular</code> <code class="inline">big</code><code class="inline">huge</code> <code class="inline">omg</code></td>
        </tr>
        <tr>
            <td>stacked</td>
            <td>false</td>
            <td>Specifies if the avatar images are displayed as a stack. <br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>dotted</td>
            <td>false</td>
            <td>Specifies if the avatar images have dot indicators. <br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>dot_color</td>
            <td>green</td>
            <td>Specifies what colour to use as the dot indicator. Only relevant if <em>dotted=true</em>.<br><br>
                <code class="inline">primary</code>
                <code class="inline">blue</code> <code class="inline">red</code>
                <code class="inline">yellow</code> <code class="inline">green</code><code class="inline">purple</code> <code class="inline">pink</code>
                <code class="inline">orange</code> <code class="inline">gray</code> <code class="inline">cyan</code>
            </td>
        </tr>
        <tr>
            <td>dot_position</td>
            <td>bottom</td>
            <td>Specifies where the dot indicator should be placed. Only relevant if <em>dotted=true</em>.<br> <code class="inline">top</code> <code class="inline">bottom</code> </td>
        </tr>
        <tr>
            <td>label</td>
            <td>null</td>
            <td>Text to display in place of an image. Usually two characters.</td>
        </tr>
        <tr>
            <td>show_ring</td>
            <td>true</td>
            <td>By default avatars show a ring around them. Setting this can turn it off or back on. <br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>class</td>
            <td>mr-2 mt-2</td>
            <td>Any additional css classes can be added using this attribute.</td>
        </tr>
    </x-bladewind::table>
    <p>&nbsp;</p>
    <h3 class="pb-2 ">Avatar with all attributes defined</h3>
@php
        $avatarExample14 = <<<'HTML'
            <x-bladewind::avatar
                image="/path/to/the/image/file"
                alt="company logo"
                size="big"
                stacked="true"
                dotted="true"
                bg_color="cyan"
                show_ring="false",
                dot_color="red",
                dot_position="top"
                class="ring-blue-200 ring-offset-2" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$avatarExample14"></x-bladewind::code-block>

    <p>&nbsp;</p>
    <p>
        <x-bladewind::alert show_close_icon="false">
            The source file for this component is available in <code class="inline">resources > views > components > bladewind > avatars.blade.php</code> and/or <code class="inline">resources > views > components > bladewind > avatar.blade.php</code>.
            The default image displayed when no image is passed is <code class="inline">public > vendor > bladewind > images > avatar.png</code>
        </x-bladewind::alert>
    </p>
    <p>&nbsp;</p>
    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#single">Single avatar</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sizes">Different sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#stack">Stacked avatars</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#plus">Plus more</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#indicator">Dot Indicator</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#labels">Labels</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-avatar');
        </script>
    </x-slot:scripts>
</x-app>
