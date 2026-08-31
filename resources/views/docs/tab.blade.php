<x-app>
    <x-slot:title>Tab Component</x-slot:title>
    <x-slot:page_title>Tab</x-slot:page_title>

    <p>
        Organize and display data in tabs. The BladewindUI tab component is broken down into two parts.
        The tab headings and the tab content. To prevent erratic behaviour of tabs it is very important to
        provide a value for the <code class="inline text-red-500">name</code> attribute. In fact, the tabs won't be rendered without you specifying a name.
        The example below uses pictures from <a href="https://unsplash.com" target="_blank">Unsplash</a>.
    </p>

    <x-bladewind::tab name="free-pics">

        <x-slot name="headings">
            <x-bladewind::tab.heading name="unsplash-1" label="Lissete Laverde" />
            <x-bladewind::tab.heading name="unsplash-2" label="Marko Pavlichenko" />
            <x-bladewind::tab.heading name="unsplash-3" active="true" label="Yoonbae Cho" />
            <x-bladewind::tab.heading name="unsplash-4" label="Sam Carter" />
        </x-slot>

        <x-bladewind::tab.body>
            <x-bladewind::tab.content name="unsplash-1">
                <img src="/assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg"
                     alt="Picture by Lissete Laverde" />
            </x-bladewind::tab.content>
            <x-bladewind::tab.content name="unsplash-2">
                <img src="/assets/images/marko-pavlichenko-WiBfaVKtbXo-unsplash.jpg"
                     alt="Picture by Marko Pavlichenko" />
            </x-bladewind::tab.content>
            <x-bladewind::tab.content name="unsplash-3" active="true">
                <img src="/assets/images/yoonbae-cho-Fes4eLW4mg0-unsplash.jpg" alt="Picture by Yoonbae Cho" />
            </x-bladewind::tab.content>
            <x-bladewind::tab.content name="unsplash-4">
                <img src="/assets/images/sam-carter-JU1SVl4smHM-unsplash.jpg" alt="Picture by Sam Carter" />
            </x-bladewind::tab.content>
        </x-bladewind::tab.body>

    </x-bladewind::tab>

    <pre class="language-markup line-numbers" data-line="3,17">
        <code>
            &lt;x-bladewind::tab name="free-pics"&gt;

                &lt;x-slot:headings&gt;
                    &lt;x-bladewind::tab.heading
                        name="unsplash-1" label="Lissete Laverde" /&gt;

                    &lt;x-bladewind::tab.heading
                        name="unsplash-2" label="Marko Pavlichenko" /&gt;

                    &lt;x-bladewind::tab.heading
                        name="unsplash-3" active="true" label="Yoonbae Cho" /&gt;

                    &lt;x-bladewind::tab.heading
                        name="unsplash-4" label="Sam Carter" /&gt;
                &lt;/x-slot:headings&gt;

                &lt;x-bladewind::tab.body&gt;

                    &lt;x-bladewind::tab.content name="unsplash-1"&gt;
                        &lt;img src="/path/to/the/image/file"
                            alt="Picture by Lissete Laverde" /&gt;
                    &lt;/x-bladewind::tab.content&gt;

                    &lt;x-bladewind::tab.content name="unsplash-2"&gt;
                        &lt;img src="/path/to/the/image/file"
                            alt="Picture by Marko Pavlichenko" /&gt;
                    &lt;/x-bladewind::tab.content&gt;

                    &lt;x-bladewind::tab.content name="unsplash-3" active="true"&gt;
                        &lt;img src="/path/to/the/image/file"
                            alt="Picture by Yoonbae Cho" /&gt;
                    &lt;/x-bladewind::tab.content&gt;

                    &lt;x-bladewind::tab.content name="unsplash-4"&gt;
                        &lt;img src="/path/to/the/image/file"
                            alt="Picture by Sam Carter" /&gt;
                    &lt;/x-bladewind::tab.content&gt;

                &lt;/x-bladewind::tab.body&gt;

            &lt;/x-bladewind::tab&gt;
        </code>
    </pre>

    <p>
        Let us breakdown what is happening with the tab component. We first define a tab group that will hold all the tab headings
        and tab content. As stated earlier, it is very important to give this tab group a name.
        <code class="inline text-red-500">&lt;x-bladewind::tab name="staff-loans"&gt;</code>.</p>
    <p>
        Next, we need to define the tab headings we will click on to access the tab content. The tab headings are wrapped in a
        <code class="inline">slot</code> named <code class="inline">headings</code>. <code class="inline text-red-500">&lt;x-slot:headings&gt;</code>.
        The next step is to add the individual tab headings using the <code class="inline text-red-500">&lt;x-bladewind::tab.heading /&gt;</code>.
        The individual tab headings also need to be named uniquely. The tab heading you want selected by default should have <code class="inline text-red-500">active="true"</code>.
        This necessarily does not need to be the first tab. If you have four tab headings and the third needs to be selected by default, set <code class="inline text-red-500">active="true"</code> on the third tab heading.
    </p>
    <p>
        The final bit that ties the tab component all together is the <code class="inline text-red-500">&lt;x-bladewind::tab.body&gt;</code>.
        This is the parent component that holds all the content for each corresponding tab heading. Content for each tab heading needs to be
        defined in the <code class="inline text-red-500">&lt;x-bladewind::tab.content&gt;</code> tag that has the <b><em>same name</em></b> as it's corresponding tab heading.
        The tab content that needs to be visible by default also needs to have <code class="inline text-red-500">active="true"</code> set.
    </p>

    <h2 id="colours">Different Colours</h2>
    <p>
        The tab component by default displays the active tab heading and its underline bar as blue. There are nine colours in total to pick from. To set your preferred colour set the <code class="inline text-red-500">color</code> attribute on the <code class="inline text-red-500">&lt;x-bladewind::tab&gt;</code> component.
    </p>
    <x-bladewind::tab name="red-tab" color="red">
        <x-slot name="headings">
            <x-bladewind::tab.heading name="red" active="true" label="Active Red Tab" />
            <x-bladewind::tab.heading name="inactive-red" label="The Other Tab" />
        </x-slot>
        <x-bladewind::tab.body>
            <x-bladewind::tab.content name="red" active="true"></x-bladewind::tab.content>
            <x-bladewind::tab.content name="inactive-red"></x-bladewind::tab.content>
        </x-bladewind::tab.body>
    </x-bladewind::tab>
    <p>
        <x-bladewind::tab name="yellow-tab" color="yellow">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="yellow" active="true" label="Active Yellow Tab" />
                <x-bladewind::tab.heading name="inactive-yellow" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="yellow" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-yellow"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="green-tab" color="green">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="green" active="true" label="Active Green Tab" />
                <x-bladewind::tab.heading name="inactive-green" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="green" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-green"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="pink-tab" color="pink">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="pink" active="true" label="Active Pink Tab" />
                <x-bladewind::tab.heading name="inactive-pink" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="pink" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-pink"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="cyan-tab" color="cyan">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="cyan" active="true" label="Active Cyan Tab" />
                <x-bladewind::tab.heading name="inactive-cyan" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="cyan" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-cyan"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="gray-tab" color="gray">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="gray" active="true" label="Active Gray Tab" />
                <x-bladewind::tab.heading name="inactive-gray" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="gray" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-gray"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="purple-tab" color="purple">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="purple" active="true" label="Active Purple Tab" />
                <x-bladewind::tab.heading name="inactive-purple" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="purple" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-purple"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="orange-tab" color="orange">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="orange" active="true" label="Active Orange Tab" />
                <x-bladewind::tab.heading name="inactive-orange" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="orange" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-orange"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="blue-tab" color="blue">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="blue" active="true" label="Active Blue Tab" />
                <x-bladewind::tab.heading name="inactive-blue" label="Disabled Tab" disabled="true" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="blue" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-blue"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="violet-tab" color="violet">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="violet" active="true" label="Active Violet Tab" />
                <x-bladewind::tab.heading name="inactive-violet" label="Disabled Tab" disabled="true" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="violet" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-violet"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="indigo-tab" color="indigo">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="indigo" active="true" label="Active Indigo Tab" />
                <x-bladewind::tab.heading name="inactive-indigo" label="Disabled Tab" disabled="true" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="indigo" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-indigo"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="fuchsia-tab" color="fuchsia">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="fuchsia" active="true" label="Active Fuchsia Tab" />
                <x-bladewind::tab.heading name="inactive-fuchsia" label="Disabled Tab" disabled="true" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="fuchsia" active="true"></x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-fuchsia"></x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tab name="red-tab" color="red"&gt;
                &lt;x-slot name="headings"&gt;

                    &lt;x-bladewind::tab.heading
                        name="red"
                        active="true"
                        label="Active Red Tab" /&gt;

                    &lt;x-bladewind::tab.heading
                        name="inactive-red"
                        label="The Other Tab" /&gt;

                &lt;/x-slot&gt;

                &lt;x-bladewind::tab.body&gt;

                    &lt;x-bladewind::tab.content
                        name="red"
                        active="true"&gt;&lt;/x-bladewind::tab.content&gt;

                    &lt;x-bladewind::tab.content
                        name="inactive-red"&gt;&lt;/x-bladewind::tab.content&gt;

                &lt;/x-bladewind::tab.body&gt;

            &lt;/x-bladewind::tab&gt;
        </code>
    </pre>


    <h2 id="styles">Other Tab Styles</h2>
    <p>
        The tab components exist in three different styles. You can specify a preferred style by setting the <code class="inline text-red-500">style</code> attribute.
        The available styles are <em>simple</em>, <em>system</em> and <em>pills</em>. The default tab style is <em>simple</em>.
    </p>
    <h3 id="system">System Tab Style</h3>
    <br />
    <x-bladewind::tab name="sys-blue-tab" style="system">
        <x-slot name="headings">
            <x-bladewind::tab.heading name="sys-blue" active="true" label="Blue System Tab" />
            <x-bladewind::tab.heading name="inactive-sys-blue" label="The Other Tab" />
        </x-slot>
        <x-bladewind::tab.body>
            <x-bladewind::tab.content name="sys-blue" active="true">
                <img src="/assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg"
                     alt="Picture by Lissete Laverde" />
            </x-bladewind::tab.content>
            <x-bladewind::tab.content name="inactive-sys-blue">
                <img src="/assets/images/sam-carter-JU1SVl4smHM-unsplash.jpg" alt="Picture by Sam Carter" />
            </x-bladewind::tab.content>
        </x-bladewind::tab.body>
    </x-bladewind::tab>
    <pre class="lang-markup line-numbers" data-line="3">
        <code>
                &lt;x-bladewind::tab
                    name="sys-blue-tab"
                    style="system"&gt;

                    &lt;x-slot:headings&gt;
                        &lt;x-bladewind::tab.heading
                            name="sys-blue" active="true" label="Blue System Tab" /&gt;
                        &lt;x-bladewind::tab.heading
                            name="inactive-sys-blue" label="The Other Tab" /&gt;
                    &lt;/x-slot:headings&gt;

                    &lt;x-bladewind::tab.body&gt;
                        &lt;x-bladewind::tab.content
                            name="sys-blue" active="true"&gt;...&lt;/x-bladewind::tab.content&gt;
                        &lt;x-bladewind::tab.content
                            name="inactive-sys-blue"&gt;...&lt;/x-bladewind::tab.content&gt;
                    &lt;/x-bladewind::tab.body&gt;

                &lt;/x-bladewind::tab&gt;
        </code>
    </pre>
    <br />
    <p>
        <x-bladewind::tab name="sys-yellow-tab" style="system" color="cyan">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="sys-yellow" active="true" label="Active Cyan Tab" />
                <x-bladewind::tab.heading name="inactive-sys-yellow" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="sys-yellow" active="true">
                    <img src="/assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg"
                         alt="Picture by Lissete Laverde" />
                </x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-sys-yellow">
                    <img src="/assets/images/sam-carter-JU1SVl4smHM-unsplash.jpg" alt="Picture by Sam Carter" />
                </x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <p>
        <x-bladewind::tab name="sys-gray-tab" style="system" color="gray">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="sys-gray" active="true" label="System gray Tab" />
                <x-bladewind::tab.heading name="inactive-sys-gray" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="sys-gray" active="true">
                    <img src="/assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg"
                         alt="Picture by Lissete Laverde" />
                </x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-sys-gray">
                    <img src="/assets/images/sam-carter-JU1SVl4smHM-unsplash.jpg" alt="Picture by Sam Carter" />
                </x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <h3 id="pills">Pills tab style</h3>
    <p>
        <x-bladewind::tab name="pills-blue-tab" style="pills">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="pills-blue" active="true" label="Active Blue Tab" />
                <x-bladewind::tab.heading name="inactive-pills-blue" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="pills-blue" active="true">
                    <img src="/assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg"
                         alt="Picture by Lissete Laverde" />
                </x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-pills-blue">
                    <img src="/assets/images/sam-carter-JU1SVl4smHM-unsplash.jpg" alt="Picture by Sam Carter" />
                </x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <pre class="lang-markup line-numbers" data-line="3">
        <code>
                &lt;x-bladewind::tab
                    name="pills-blue-tab"
                    style="pills"&gt;

                    &lt;x-slot:headings&gt;
                        &lt;x-bladewind::tab.heading
                            name="pills-blue" active="true" label="Blue System Tab" /&gt;
                        &lt;x-bladewind::tab.heading
                            name="inactive-pills-blue" label="The Other Tab" /&gt;
                    &lt;/x-slot:headings&gt;

                    &lt;x-bladewind::tab.body&gt;
                        &lt;x-bladewind::tab.content
                            name="pills-blue" active="true"&gt;...&lt;/x-bladewind::tab.content&gt;
                        &lt;x-bladewind::tab.content
                            name="inactive-pills-blue"&gt;...&lt;/x-bladewind::tab.content&gt;
                    &lt;/x-bladewind::tab.body&gt;

                &lt;/x-bladewind::tab&gt;
        </code>
    </pre>
    <br />
    <p>
        <x-bladewind::tab name="pills-pink-tab" color="pink" style="pills">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="pills-pink" active="true" label="Active Pink Tab" />
                <x-bladewind::tab.heading name="inactive-pills-pink" label="The Other Tab" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="pills-pink" active="true">
                    <img src="/assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg"
                         alt="Picture by Lissete Laverde" />
                </x-bladewind::tab.content>
                <x-bladewind::tab.content name="inactive-pills-pink">
                    <img src="/assets/images/sam-carter-JU1SVl4smHM-unsplash.jpg" alt="Picture by Sam Carter" />
                </x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>

    <h2 id="icons">With Icons</h2>
    <p>
        You can display icon prefixes in tab headings. This uses the BladewindUI <a href="/component/icon">Icon component</a> so all Heroicons are supported.
        You can change how the icon looks by setting the <code class="inline text-red-500">icon_css</code> attribute.
        The Heroicons outline icons are used by default. To use the solid icons instead, set <code class="inline text-red-500">icon_type="solid"</code>.
        The <code class="inline text-red-500">icon_dir</code> attribute allows you to specify which directory to pick your custom icons from.
    </p>
    <p>
        <x-bladewind::tab name="tab-icon">
            <x-slot name="headings">
                <x-bladewind::tab.heading name="icon-blue" active="true" icon="shopping-cart" label="Shopping List" />
                <x-bladewind::tab.heading name="icon-inactive" label="Previous Purchases" icon="shopping-bag" />
                <x-bladewind::tab.heading name="icon-solid" label="Solid Icon" icon="shopping-bag" icon_type="solid" />
                <x-bladewind::tab.heading name="icon-solid-css" label="Icon Css Applied" icon="fire" icon_type="solid" icon_css="!rounded-full !bg-orange-500 text-white size-6 p-1" />
            </x-slot>
            <x-bladewind::tab.body>
                <x-bladewind::tab.content name="icon-blue" active="true">
                    <img src="/assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg"
                         alt="Picture by Lissete Laverde" />
                </x-bladewind::tab.content>
                <x-bladewind::tab.content name="icon-inactive">
                    <img src="/assets/images/sam-carter-JU1SVl4smHM-unsplash.jpg" alt="Picture by Sam Carter" />
                </x-bladewind::tab.content>
                <x-bladewind::tab.content name="icon-solid">
                    <img src="/assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg" alt="Picture by Lissete Laverde" />
                </x-bladewind::tab.content>
            </x-bladewind::tab.body>
        </x-bladewind::tab>
    </p>
    <pre class="lang-markup line-numbers" data-line="4,8,11,16">
        <code>
&lt;x-bladewind::tab name="tab-icon"&gt;
    &lt;x-slot name="headings"&gt;
        &lt;x-bladewind::tab.heading name="icon-blue" active="true"
            icon="shopping-cart"
            label="Shopping List" /&gt;
        &lt;x-bladewind::tab.heading name="icon-inactive"
            label="Previous Purchases"
            icon="shopping-bag" /&gt;
        &lt;x-bladewind::tab.heading name="icon-solid"
            label="Solid Icon"
            icon="shopping-bag"
            icon_type="solid" /&gt;
        &lt;x-bladewind::tab.heading name="icon-solid-css" label="Icon Css Applied"
            icon="fire"
            icon_type="solid"
            icon_css="!rounded-full !bg-orange-500 text-white size-6 p-1" /&gt;
    &lt;/x-slot&gt;
    &lt;x-bladewind::tab.body&gt;
        &lt;x-bladewind::tab.content name="icon-blue" active="true"&gt;
            &lt;img src="/assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg"
                 alt="Picture by Lissete Laverde" /&gt;
        &lt;/x-bladewind::tab.content&gt;
        &lt;x-bladewind::tab.content name="icon-inactive"&gt;
            &lt;img src="/assets/images/sam-carter-JU1SVl4smHM-unsplash.jpg" alt="Picture by Sam Carter" /&gt;
        &lt;/x-bladewind::tab.content&gt;
        &lt;x-bladewind::tab.content name="icon-solid"&gt;
            &lt;img src="/assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg" alt="Picture by Lissete Laverde" /&gt;
        &lt;/x-bladewind::tab.content&gt;
    &lt;/x-bladewind::tab.body&gt;
&lt;/x-bladewind::tab&gt;
        </code>
    </pre>
    <br />


    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Tab component.</p>
    @include('docs/announcement')
    <h3>Tab Group Component Attributes</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td><em>blank</em></td>
            <td>Unique name to identify the tab component by in case there are multiple tab groups on the same page.</td>
        </tr>
        <tr>
            <td>style</td>
            <td>simple</td>
            <td>Choose a tab style. <br /><code class="inline">simple</code> <code class="inline">system</code> <code class="inline">pills</code></td>
        </tr>
        <tr>
            <td>headings</td>
            <td><em>blank</em></td>
            <td>This is a slot that accepts one or more <code class="inline">&lt;x-bladewind::tab.heading&gt;</code> components</td>
        </tr>
        <tr>
            <td>color</td>
            <td>blue</td>
            <td>
                There are nine colors to choose from. <br />
                <code class="inline">primary</code> <code class="inline">red</code> <code class="inline">yellow</code> <code class="inline">green</code> <code class="inline">blue</code> <code class="inline">pink</code>
                <code class="inline">cyan</code> <code class="inline">purple</code> <code class="inline">gray</code> <code class="inline">orange</code>
                <code class="inline">violet</code> <code class="inline">indigo</code> <code class="inline">fuchsia</code>
            </td>
        </tr>
    </x-bladewind::table>

    <h3>Tab Heading Component Attributes</h3>

    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>tab</td>
            <td>Unique name to identify the tab heading.</td>
        </tr>
        <tr>
            <td>label</td>
            <td>tab</td>
            <td>Text to display as the tab heading. This is what the user clicks on to switch tabs.</td>
        </tr>
        <tr>
            <td>active</td>
            <td>false</td>
            <td>Specifies if the tab should be selected by default. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>disabled</td>
            <td>false</td>
            <td>Specifies if the tab should be disabled by default. Disabled tabs are faded out and do nothing when clicked on. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>url</td>
            <td>default</td>
            <td>By default tabs switch to their respective content. If you prefer your tab headings to load other urls when clicked on, set this attribute.
            This url is called using <code class="inline">location.href</code></td>
        </tr>
        <tr>
            <td>icon</td>
            <td>null</td>
            <td>Specify the icon prefix to display with the tab heading. See <a href="/component/icon">the Icon component</a> for what icons can be used.</td>
        </tr>
        <tr>
            <td>icon_css</td>
            <td><em>blank</em></td>
            <td>Additional CSS to modify the look of the icon.</td>
        </tr>
        <tr>
            <td>icon_dir</td>
            <td><em>blank</em></td>
            <td>If you have your own custom icons you wish to use instead of Heroicons, specify the directory to load the icons from.
                See the <code class="inline text-red-500">dir</code> attribute in <a href="/component/icon">the Icon component</a> for how to reference your paths.</td>
        </tr>
        <tr>
            <td>icon_type</td>
            <td>outline</td>
            <td>Choose if you prefer outline or solid icons.
            <br /> <code class="inline">solid</code> <code class="inline">outline</code></td>
        </tr>
    </x-bladewind::table>

    <h3>Tab Body Component Attributes</h3>

    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional Tailwind CSS classes to apply to the tab body container. This is the container all tab contents sit in.</td>
        </tr>
    </x-bladewind::table>

    <h3>Tab Content Component Attributes</h3>

    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>tab</td>
            <td>This name must be the same as name given to this content's tab heading.</td>
        </tr>
        <tr>
            <td>active</td>
            <td>false</td>
            <td>Specifies if the tab should be selected by default. If this content's corresponding tab heading is active, this must also be set to active. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional Tailwind CSS classes to apply to the tab content container. Applies to a specific tab content.</td>
        </tr>
    </x-bladewind::table>

    <h3>Tab with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::tab name="red-tab" color="red" style="system"&gt;
                &lt;x-slot name="headings"&gt;

                    &lt;x-bladewind::tab.heading
                        name="red"
                        active="true"
                        label="Active Red Tab" /&gt;

                    &lt;x-bladewind::tab.heading
                        name="inactive-red"
                        disabled="true"
                        active="false"
                        url="/profile/settings"
                        label="The Other Tab" /&gt;

                &lt;/x-slot&gt;

                &lt;x-bladewind::tab.body class="p-2"&gt;

                    &lt;x-bladewind::tab.content
                        name="red"
                        class="border border-gray-100"
                        active="true"&gt;...&lt;/x-bladewind::tab.content&gt;

                    &lt;x-bladewind::tab.content
                        name="inactive-red"&gt;...&lt;/x-bladewind::tab.content&gt;

                &lt;/x-bladewind::tab.body&gt;

            &lt;/x-bladewind::tab&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source files for this component are available in <code class="inline">resources > views > components > bladewind > tab > index.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > tab > heading.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > tab > body.blade.php</code> and
        <code class="inline">resources > views > components > bladewind > tab > content.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#colours">Different colours</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#styles">Other tab styles</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#system">System</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#pills">Pills</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#icons">With icons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-tab');
        </script>
    </x-slot>
</x-app>
