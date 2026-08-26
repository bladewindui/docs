<x-app>
    <x-slot:title>Accordion Component</x-slot:title>
    <x-slot:page_title>Accordion</x-slot:page_title>
    <p>
        The accordion component allows users to expand or collapse sections of content. It’s commonly used to organize information in a compact, accessible way. Each section typically has a header that can be clicked to toggle the visibility of its associated content.
    </p>

    <x-bladewind::accordion>
        <x-bladewind::accordion.item title="What is BladewindUI?">
            <p>
                BladewindUI is a collection of super simple but elegant Laravel blade-based UI components using TailwindCSS and vanilla Javascript. When I decided to move away from JQuery, that indirectly meant I had to find an alternative to the lovely Semantic UI components I had gotten so used to. Well, that was how these components were born.
            </p>
        </x-bladewind::accordion.item>
        <x-bladewind::accordion.item title="How can I install the latest version of the library?">
            <div>
                At the root of your Laravel project, type the following composer command in your terminal to pull in the package.
                <pre class="language-php line-numbers"><code>composer require bladewindui/bladewindui</code></pre>
                Next you need to publish the package's public assets by running the command below, still at the root of your Laravel project. This will create a vendor/bladewind directory in your public directory.
            </div>
        </x-bladewind::accordion.item>
        <x-bladewind::accordion.item title="How can I customize the library for my theme?">
            <div>
                BladewindUI has been designed to not interfere with the existing components in your project. Probably you just want to take this for a spin before deciding if BladewindUI components will be the only components
                you use in your project. Once installed, all BladewindUI components are invoked by default from your <code class="inline">project's vendor > mkocansey > bladewind</code> directory. Per Laravel convention, this results in you having to type the
                <code class="inline text-red-500">&lt;x-bladewind</code> prefix everytime you want to use a BladewindUI component.
            </div>
        </x-bladewind::accordion.item>
    </x-bladewind::accordion>
<br />
<pre class="language-markup line-numbers" data-line="1,7">
<code>
&lt;x-bladewind::accordion&gt;
    &lt;x-bladewind::accordion.item title="What is BladewindUI?"&gt;
        &lt;p&gt;
            BladewindUI is a collection...
        &lt;/p&gt;
    &lt;/x-bladewind::accordion.item&gt;
    &lt;x-bladewind::accordion.item title="How can I install the latest version of the library?"&gt;
        &lt;div&gt;
            At the root of your Laravel...
        &lt;/div&gt;
    &lt;/x-bladewind::accordion.item&gt;
    &lt;x-bladewind::accordion.item title="How can I customize the library for my theme?"&gt;
        &lt;div&gt;
            BladewindUI has been designed ...
        &lt;/div&gt;
    &lt;/x-bladewind::accordion.item&gt;
&lt;/x-bladewind::accordion&gt;
</code>
</pre>
<br />
<p>
    If the title of your accordion item is not a simple string you can define your content in a title slot.
</p>

<x-bladewind::accordion>
    <x-bladewind::accordion.item>
        <x-slot:title>
            <div class="inline-flex">
                <div><img src="/assets/images/icon.png" class="size-10 rounded-full border-2 border-gray-200 p-1" alt="logo"/></div>
                <div class="ml-2">
                    <div>What is BladewindUI library?</div>
                    <div class="text-sm font-normal opacity-45 -mt-1.5">version 2.8.0</div>
                </div>
            </div>
        </x-slot:title>
        <p>
            BladewindUI is a collection of super simple but elegant Laravel blade-based UI components using TailwindCSS and vanilla Javascript. When I decided to move away from JQuery, that indirectly meant I had to find an alternative to the lovely Semantic UI components I had gotten so used to. Well, that was how these components were born.
        </p>
    </x-bladewind::accordion.item>
    <x-bladewind::accordion.item title="How can I install the latest version of the library?">
        <div>
            At the root of your Laravel project, type the following composer command in your terminal to pull in the package.
            <pre class="language-php line-numbers"><code>composer require bladewindui/bladewindui</code></pre>
            Next you need to publish the package's public assets by running the command below, still at the root of your Laravel project. This will create a vendor/bladewind directory in your public directory.
        </div>
    </x-bladewind::accordion.item>
    <x-bladewind::accordion.item title="How can I customize the library for my theme?">
        <div>
            BladewindUI has been designed to not interfere with the existing components in your project. Probably you just want to take this for a spin before deciding if BladewindUI components will be the only components
            you use in your project. Once installed, all BladewindUI components are invoked by default from your <code class="inline">project's vendor > mkocansey > bladewind</code> directory. Per Laravel convention, this results in you having to type the
            <code class="inline text-red-500">&lt;x-bladewind</code> prefix everytime you want to use a BladewindUI component.
        </div>
    </x-bladewind::accordion.item>
</x-bladewind::accordion>
<br />

    <pre class="language-markup line-numbers" data-line="1,3">
<code>
&lt;x-bladewind::accordion&gt;
    &lt;x-bladewind::accordion.item&gt;
        &lt;x-slot:title&gt;
            &lt;div class="inline-flex"&gt;
                &lt;div>&lt;img src="/assets/images/icon.png" class="size-10..." alt="logo"/>&lt;/div&gt;
                &lt;div class="ml-2"&gt;
                    &lt;div>What is BladewindUI library?&lt;/div&gt;
                    &lt;div class="text-sm ...">version 2.8.0&lt;/div&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/x-slot:title&gt;
        &lt;p&gt;
            BladewindUI is a collection...
        &lt;/p&gt;
    &lt;/x-bladewind::accordion.item&gt;
    ...
&lt;/x-bladewind::accordion&gt;
</code>
</pre>
    <h2 id="multiple">Open Multiple Accordion Items</h2>
<p>By default only one accordion can stay open at any point in time. You can disable this feature by setting <code class="inline text-red-500">can_open_multiple="true"</code>. Now any closed accordion that is clicked will be opened. Likewise, any accordion that is open will closed when clicked.</p>

    <x-bladewind::accordion :can_open_multiple="true">
        <x-bladewind::accordion.item title="What is BladewindUI?">
            <p>
                BladewindUI is a collection of super simple but elegant Laravel blade-based UI components using TailwindCSS and vanilla Javascript. When I decided to move away from JQuery, that indirectly meant I had to find an alternative to the lovely Semantic UI components I had gotten so used to. Well, that was how these components were born.
            </p>
        </x-bladewind::accordion.item>
        <x-bladewind::accordion.item title="How can I install the latest version of the library?">
            <div>
                At the root of your Laravel project, type the following composer command in your terminal to pull in the package.
                <pre class="language-php line-numbers"><code>composer require bladewindui/bladewindui</code></pre>
                Next you need to publish the package's public assets by running the command below, still at the root of your Laravel project. This will create a vendor/bladewind directory in your public directory.
            </div>
        </x-bladewind::accordion.item>
        <x-bladewind::accordion.item title="How can I customize the library for my theme?">
            <div>
                BladewindUI has been designed to not interfere with the existing components in your project. Probably you just want to take this for a spin before deciding if BladewindUI components will be the only components
                you use in your project. Once installed, all BladewindUI components are invoked by default from your <code class="inline">project's vendor > mkocansey > bladewind</code> directory. Per Laravel convention, this results in you having to type the
                <code class="inline text-red-500">&lt;x-bladewind</code> prefix everytime you want to use a BladewindUI component.
            </div>
        </x-bladewind::accordion.item>
    </x-bladewind::accordion>
    <br />
    <pre class="language-markup line-numbers" data-line="2">
<code>
&lt;x-bladewind::accordion
    can_open_multiple="true"&gt;
    &lt;x-bladewind::accordion.item title="What is BladewindUI?"&gt;
        &lt;p&gt;
            BladewindUI is a collection...
        &lt;/p&gt;
    &lt;/x-bladewind::accordion.item&gt;
    &lt;x-bladewind::accordion.item title="How can I install the latest version of the library?"&gt;
        &lt;div&gt;
            At the root of your Laravel...
        &lt;/div&gt;
    &lt;/x-bladewind::accordion.item&gt;
    &lt;x-bladewind::accordion.item title="How can I customize the library for my theme?"&gt;
        &lt;div&gt;
            BladewindUI has been designed ...
        &lt;/div&gt;
    &lt;/x-bladewind::accordion.item&gt;
&lt;/x-bladewind::accordion&gt;
</code>
</pre>

<h2 id="standalone">Ungrouped Accordions</h2>
<p>
    The examples above showed the accordion items within one card element. Each accordion is separated by a line.
    To separate accordion items so they stand alone, set <code class="inline text-red-500">grouped="false"</code>.

    <x-bladewind::accordion grouped="false">
        <x-bladewind::accordion.item title="What is BladewindUI?">
            <p>
                BladewindUI is a collection of super simple but elegant Laravel blade-based UI components using TailwindCSS and vanilla Javascript. When I decided to move away from JQuery, that indirectly meant I had to find an alternative to the lovely Semantic UI components I had gotten so used to. Well, that was how these components were born.
            </p>
        </x-bladewind::accordion.item>
        <x-bladewind::accordion.item title="How can I install the latest version of the library?">
            <div>
                At the root of your Laravel project, type the following composer command in your terminal to pull in the package.
                <pre class="language-php line-numbers"><code>composer require bladewindui/bladewindui</code></pre>
                Next you need to publish the package's public assets by running the command below, still at the root of your Laravel project. This will create a vendor/bladewind directory in your public directory.
            </div>
        </x-bladewind::accordion.item>
        <x-bladewind::accordion.item title="How can I customize the library for my theme?">
            <div>
                BladewindUI has been designed to not interfere with the existing components in your project. Probably you just want to take this for a spin before deciding if BladewindUI components will be the only components
                you use in your project. Once installed, all BladewindUI components are invoked by default from your <code class="inline">project's vendor > mkocansey > bladewind</code> directory. Per Laravel convention, this results in you having to type the
                <code class="inline text-red-500">&lt;x-bladewind</code> prefix everytime you want to use a BladewindUI component.
            </div>
        </x-bladewind::accordion.item>
    </x-bladewind::accordion>
    <br />
    <pre class="language-markup line-numbers" data-line="2">
<code>
&lt;x-bladewind::accordion
    grouped="false"&gt;
    &lt;x-bladewind::accordion.item title="What is BladewindUI?"&gt;
        &lt;p&gt;
            BladewindUI is a collection...
        &lt;/p&gt;
    &lt;/x-bladewind::accordion.item&gt;
    &lt;x-bladewind::accordion.item title="How can I install the latest version of the library?"&gt;
        &lt;div&gt;
            At the root of your Laravel...
        &lt;/div&gt;
    &lt;/x-bladewind::accordion.item&gt;
    &lt;x-bladewind::accordion.item title="How can I customize the library for my theme?"&gt;
        &lt;div&gt;
            BladewindUI has been designed ...
        &lt;/div&gt;
    &lt;/x-bladewind::accordion.item&gt;
&lt;/x-bladewind::accordion&gt;
</code>
</pre>
<h2 id="colors">Colourful Accordions</h2>
<p>
    You can define the background colour of the accordion by setting the <code class="inline text-red-500">color</code> attribute. This is only enforced if <code class="inline text-red-500">grouped="false"</code>

    <x-bladewind::accordion grouped="false" color="yellow">
        <x-bladewind::accordion.item title="What is BladewindUI?">
            <p>
                BladewindUI is a collection of super simple but elegant Laravel blade-based UI components using TailwindCSS and vanilla Javascript. When I decided to move away from JQuery, that indirectly meant I had to find an alternative to the lovely Semantic UI components I had gotten so used to. Well, that was how these components were born.
            </p>
        </x-bladewind::accordion.item>
        <x-bladewind::accordion.item title="How can I install the latest version of the library?">
            <div>
                At the root of your Laravel project, type the following composer command in your terminal to pull in the package.
                <pre class="language-php line-numbers"><code>composer require bladewindui/bladewindui</code></pre>
                Next you need to publish the package's public assets by running the command below, still at the root of your Laravel project. This will create a vendor/bladewind directory in your public directory.
            </div>
        </x-bladewind::accordion.item>
        <x-bladewind::accordion.item title="How can I customize the library for my theme?">
            <div>
                BladewindUI has been designed to not interfere with the existing components in your project. Probably you just want to take this for a spin before deciding if BladewindUI components will be the only components
                you use in your project. Once installed, all BladewindUI components are invoked by default from your <code class="inline">project's vendor > mkocansey > bladewind</code> directory. Per Laravel convention, this results in you having to type the
                <code class="inline text-red-500">&lt;x-bladewind</code> prefix everytime you want to use a BladewindUI component.
            </div>
        </x-bladewind::accordion.item>
    </x-bladewind::accordion>
    <br />
    <pre class="language-markup line-numbers" data-line="2,3">
<code>
&lt;x-bladewind::accordion
    grouped="false"
    color="yellow"&gt;
    &lt;x-bladewind::accordion.item title="What is BladewindUI?"&gt;
        &lt;p&gt;
            BladewindUI is a collection...
        &lt;/p&gt;
    &lt;/x-bladewind::accordion.item&gt;
...
&lt;/x-bladewind::accordion&gt;
</code>
</pre>
    <br />
    <x-bladewind::accordion grouped="false" color="pink">
        <x-bladewind::accordion.item title="What is BladewindUI?">
            <p>
                BladewindUI is a collection of super simple but elegant Laravel blade-based UI components using TailwindCSS and vanilla Javascript. When I decided to move away from JQuery, that indirectly meant I had to find an alternative to the lovely Semantic UI components I had gotten so used to. Well, that was how these components were born.
            </p>
        </x-bladewind::accordion.item>
        <x-bladewind::accordion.item title="How can I install the latest version of the library?">
            <div>
                At the root of your Laravel project, type the following composer command in your terminal to pull in the package.
                <pre class="language-php line-numbers"><code>composer require bladewindui/bladewindui</code></pre>
                Next you need to publish the package's public assets by running the command below, still at the root of your Laravel project. This will create a vendor/bladewind directory in your public directory.
            </div>
        </x-bladewind::accordion.item>
        <x-bladewind::accordion.item title="How can I customize the library for my theme?">
            <div>
                BladewindUI has been designed to not interfere with the existing components in your project. Probably you just want to take this for a spin before deciding if BladewindUI components will be the only components
                you use in your project. Once installed, all BladewindUI components are invoked by default from your <code class="inline">project's vendor > mkocansey > bladewind</code> directory. Per Laravel convention, this results in you having to type the
                <code class="inline text-red-500">&lt;x-bladewind</code> prefix everytime you want to use a BladewindUI component.
            </div>
        </x-bladewind::accordion.item>
    </x-bladewind::accordion>


    <pre class="language-markup line-numbers" data-line="2,3">
<code>
&lt;x-bladewind::accordion
    grouped="false"
    color="pink"&gt;
...
&lt;/x-bladewind::accordion&gt;
</code>
</pre>
    <br />
    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Accordion component.</p>
    @include('docs/announcement')
    <h3>Accordion Component</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>grouped</td>
            <td>true</td>
            <td>Should the accordion items be grouped within one card container. If <code class="inline">true</code>, the accordions are  divided by lines and grouped in one big container. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>can_open_multiple</td>
            <td>false</td>
            <td>Should the accordion allow opening of items without first closing what is open. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>color</td>
            <td><em>blank</em></td>
            <td>The accordion background. Applicable when <code class="inline text-red-500">grouped="false"</code><br /><br><code class="inline">primary</code> <code class="inline">blue</code> <code class="inline">red</code>
                <code class="inline">yellow</code> <code class="inline">green</code><code class="inline">purple</code> <code class="inline">pink</code>
                <code class="inline">orange</code> <code class="inline">black</code> <code class="inline">cyan</code>
                <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code></td>
        </tr>
        <tr>
            <td>no_padding</td>
            <td>false</td>
            <td>Specifies if there should be air around the accordion group. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>content_can_close</td>
            <td>true</td>
            <td>Determines if clicking on the accordion content will close it when it is open. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional css classes can be added using this attribute. For example to make your accordion more rounded you can add <code class="inline">class="rounded-2xl"</code>.</td>
        </tr>
    </x-bladewind::table>
    <h3>Accordion Item Component</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>open</td>
            <td>false</td>
            <td>Should the accordion items be opened or closed by default. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>title</td>
            <td><em>blank</em></td>
            <td>Label to display as the title of the accordion.</td>
        </tr>
        <tr>
            <td>color</td>
            <td><em>blank</em></td>
            <td>The accordion background. Applicable when <code class="inline text-red-500">grouped="false"</code><br /><br><code class="inline">primary</code> <code class="inline">blue</code> <code class="inline">red</code>
                <code class="inline">yellow</code> <code class="inline">green</code><code class="inline">purple</code> <code class="inline">pink</code>
                <code class="inline">orange</code> <code class="inline">black</code> <code class="inline">cyan</code>
                <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional css classes can be added using this attribute. For example to make your accordion more rounded you can add <code class="inline">class="rounded-2xl"</code>.</td>
        </tr>
        <tr>
            <td>no_padding</td>
            <td>false</td>
            <td>Specifies if there should be air around each accordion item. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>content_can_close</td>
            <td>true</td>
            <td>Determines if clicking on the accordion content will close it when it is open. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>

    <h3>Accordion with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::accordion
                grouped="false"
                can_open_multiple="false"
                color="pink"
                class="rounded-lg shadow-sm"&gt;
            ...
            &lt;/x-bladewind::accordion&gt;
        </code>
    </pre>
    <h3>Accordion Item with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::accordion.item
                color="blue"
                open="false"
                title="What is BladewindUI?"
                class="shadow"&gt;
            ...
            &lt;/x-bladewind::accordion.item&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > accordion > [index.blade.php, item.blade.php]</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#multiple">Open multiple accordions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#standalone">Standalone accordions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#colors">Colourful accordions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-accordion');
        </script>
    </x-slot:scripts>
</x-app>
