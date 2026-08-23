<x-app>
    <x-slot:title>Card Component</x-slot:title>
    <x:slot:page_title>Card</x:slot:page_title>

    <p>
        This component makes it easy to display content in a card layout. What you get by default is a very basic card.
        Considering different people have very different card needs, the content of the card is absolutely up to the user.
        We have however, made provision for some very specific card use cases. You can specify if the card has a
        <a href="#header-footer">header and a footer</a>.
        There’s also <a href="#contact">contact cards</a> which are very specific for displaying contact details. These options should take care of a lot of card needs.
    </p>
    <div class="dark:hidden">
        <x-bladewind::alert show_close_icon="false">
            The cards stand out much better on a non-white background colour. <a href="javascript:changeCss('.doc-layout', '!bg-gray-100')">Show me</a>
        </x-bladewind::alert>
    </div>
    <h2 id="basic">Basic Card</h2>
    <p>
        This just gives you the card frame with the option to define a heading text or card title.
    </p>
    <x-bladewind::card></x-bladewind::card>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::card&gt;
                // the card content goes here
            &lt;/x-bladewind::card&gt;
        </code>
    </pre>
    <x-bladewind::card title="most recent activity"></x-bladewind::card>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::card title="recent activity"&gt;
                // the card content goes here
            &lt;/x-bladewind::card&gt;
        </code>
    </pre>

    <h2 id="radii">Different Radii</h2>
    <p>
        The card component comes with predefined radii which correspond to specific TailwindUI classes for roundness.
        The default value is <code class="inline">small</code> which corresponds to Tailwind's <code class="inline">rounded-lg</code> class.
        To change the card's border radius, specify the <code class="inline text-red-500">radius</code> attribute.
    </p>
    <x-bladewind::card radius="none">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae sem sit amet velit efficitur faucibus. agna tincidunt sem, a fermentum neque arcu non est. Suspendisse sodales, nunc a hendrerit vestibulum, dui ipsum sagittis felis, vitae efficitur purus justo et mi. Pellentesque at arcu at ipsum semper fringilla. Maecenas at metus sit amet arcu ultricies rutrum. Proin dictum, magna vitae eleifend rhoncus, tellus urna elementum neque, sed dapibus lacus eros id ipsum.</p>
    </x-bladewind::card>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::card radius="none"&gt;
                // lorem ipsum text
            &lt;/x-bladewind::card&gt;
        </code>
    </pre>
<br />
    <x-bladewind::card>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae sem sit amet velit efficitur faucibus. agna tincidunt sem, a fermentum neque arcu non est. Suspendisse sodales, nunc a hendrerit vestibulum, dui ipsum sagittis felis, vitae efficitur purus justo et mi. Pellentesque at arcu at ipsum semper fringilla. Maecenas at metus sit amet arcu ultricies rutrum. Proin dictum, magna vitae eleifend rhoncus, tellus urna elementum neque, sed dapibus lacus eros id ipsum.</p>
    </x-bladewind::card>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::card radius="small"&gt;
                // lorem ipsum text
            &lt;/x-bladewind::card&gt;
        </code>
    </pre>
<br />
    <x-bladewind::card radius="medium">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae sem sit amet velit efficitur faucibus. agna tincidunt sem, a fermentum neque arcu non est. Suspendisse sodales, nunc a hendrerit vestibulum, dui ipsum sagittis felis, vitae efficitur purus justo et mi. Pellentesque at arcu at ipsum semper fringilla. Maecenas at metus sit amet arcu ultricies rutrum. Proin dictum, magna vitae eleifend rhoncus, tellus urna elementum neque, sed dapibus lacus eros id ipsum.</p>
    </x-bladewind::card>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::card radius="medium"&gt;
                // lorem ipsum text
            &lt;/x-bladewind::card&gt;
        </code>
    </pre>
<br />
    <x-bladewind::card radius="large">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae sem sit amet velit efficitur faucibus. agna tincidunt sem, a fermentum neque arcu non est. Suspendisse sodales, nunc a hendrerit vestibulum, dui ipsum sagittis felis, vitae efficitur purus justo et mi. Pellentesque at arcu at ipsum semper fringilla. Maecenas at metus sit amet arcu ultricies rutrum. Proin dictum, magna vitae eleifend rhoncus, tellus urna elementum neque, sed dapibus lacus eros id ipsum.</p>
    </x-bladewind::card>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::card radius="large"&gt;
                // lorem ipsum text
            &lt;/x-bladewind::card&gt;
        </code>
    </pre>
<br />
    <x-bladewind::card radius="xl">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vitae sem sit amet velit efficitur faucibus. agna tincidunt sem, a fermentum neque arcu non est. Suspendisse sodales, nunc a hendrerit vestibulum, dui ipsum sagittis felis, vitae efficitur purus justo et mi. Pellentesque at arcu at ipsum semper fringilla. Maecenas at metus sit amet arcu ultricies rutrum. Proin dictum, magna vitae eleifend rhoncus, tellus urna elementum neque, sed dapibus lacus eros id ipsum.</p>
    </x-bladewind::card>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::card radius="xl"&gt;
                // lorem ipsum text
            &lt;/x-bladewind::card&gt;
        </code>
    </pre>
<br />
    <x-bladewind::alert show_close_icon="false">
        If you need to completely overwrite the radius of the card, you can specify any of the Tailwind classes used for roundness in the <code class="inline text-red-500">class</code> attribute.
    </x-bladewind::alert>
    <br />
    <h2 id="examples">Practical Examples</h2>
    <p>
        As explained earlier, the card component has been kept super simple because people have varying uses for cards and forcing specific layouts on them defeats the purpose of having a card component. Below are a few examples of how you can use the BladewindUI Card component for varying content types.
    </p>
    <h3>Invoice Table</h3>
    <p>
        Below is an example of an invoice table sitting in a basic BladewindUI Card. The BladewindUI <a href="/component/table">Table component</a> was used in building the invoice.
    </p>
    <x-bladewind::card title="invoice details">
        <x-bladewind::table striped="true" divider="thin">
            <x-slot name="header">
                <th>Item</th>
                <th width="10%" class="text-center">Quantity</th>
                <th width="20%" class="text-right">Price (USD)</th>
            </x-slot>
            <tr>
                <td>Airpods Max (Black)</td>
                <td class="text-center">1</td>
                <td class="text-right">500.00</td>
            </tr>
            <tr>
                <td>Macbook Pro M1 Pro 16 inch</td>
                <td class="text-center">1</td>
                <td class="text-right">3,500.00</td>
            </tr>
            <tr>
                <td>iPhone Lightning Charger</td>
                <td class="text-center">2</td>
                <td class="text-right">100.00</td>
            </tr>
            <tr>
                <td>iTunes Gift Card</td>
                <td class="text-center">5</td>
                <td class="text-right double-underline">250.00</td>
            </tr>
            <tr>
                <td colspan="2" class="text-right font-bold">Total:</td>
                <td colspan="2" class="text-right font-bold double-underline">4,350.00</td>
            </tr>
        </x-bladewind::table>
    </x-bladewind::card>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::card title="invoice details"&gt;

                &lt;x-bladewind.table striped="true"&gt;
                    &lt;x-slot name="header"&gt;
                        &lt;th&gt;Item&lt;/th&gt;
                        &lt;th width="10%" class="text-center"&gt;Quantity&lt;/th&gt;
                        &lt;th width="20%" class="text-right"&gt;Price (USD)&lt;/th&gt;
                    &lt;/x-slot&gt;
                    &lt;tr&gt;
                        &lt;td&gt;Airpods Max (Black)&lt;/td&gt;
                        &lt;td class="text-center"&gt;1&lt;/td&gt;
                        &lt;td class="text-right"&gt;500.00&lt;/td&gt;
                    &lt;/tr&gt;
                    ...
                &lt;/x-bladewind.table&gt;

            &lt;/x-bladewind::card&gt;
        </code>
    </pre>
    <h3>Huge Navigation Items</h3>
    <p>
        Below is an example of a grid-based navigation that uses cards for its menu items. The hover effect is achieved by adding additional TailwindUI classes to the <code class="inline text-red-500">class</code> attribute of the card.
        The icons used in the design below or anywhere else in our docs are from <a href="https://heroicons.com/" target="_blank">Heroicons</a>.
    </p>

    <div class="sm:grid sm:grid-cols-3 sm:gap-5 space-y-4 sm:space-y-0">
        <x-bladewind::card class="cursor-pointer hover:shadow-gray-300 hover:dark:shadow-slate-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto rounded-full p-3 bg-green-400 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span class="text-center block font-semibold mt-2">Projects</span>
        </x-bladewind::card>
        <x-bladewind::card class="cursor-pointer hover:shadow-gray-300 hover:dark:shadow-slate-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto rounded-full p-3 bg-purple-400 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <span class="text-center block font-semibold mt-2">Tasks</span>
        </x-bladewind::card>
        <x-bladewind::card class="cursor-pointer hover:shadow-gray-300 hover:dark:shadow-slate-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto rounded-full p-3 bg-rose-400 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
            <span class="text-center block font-semibold mt-2">Ideas</span>
        </x-bladewind::card>
    </div>

    <pre class="language-markup line-numbers" data-line="3,8,13">
        <code>
            &lt;div class="grid grid-cols-3 gap-5"&gt;

                &lt;x-bladewind::card class="cursor-pointer hover:shadow-gray-300"&gt;
                    &lt;svg ...&gt;...&lt;/svg&gt;
                    &lt;span class="text-center ..."&gt;Projects&lt;/span&gt;
                &lt;/x-bladewind::card&gt;

                &lt;x-bladewind::card class="cursor-pointer hover:shadow-gray-300"&gt;
                    &lt;svg...&gt;...&lt;/svg&gt;
                    &lt;span class="text-center ..."&gt;Tasks&lt;/span&gt;
                &lt;/x-bladewind::card&gt;

                &lt;x-bladewind::card class="cursor-pointer hover:shadow-gray-300"&gt;
                    &lt;svg...&gt;...&lt;/svg&gt;
                    &lt;span class="text-center ..."&gt;Ideas&lt;/span&gt;
                &lt;/x-bladewind::card&gt;

            &lt;/div&gt;
        </code>
    </pre>
    <h3>Contact List</h3>
    <p>
        Below is an example of a contact list. This does not use the BladewindUI <a href="#contact">contact card component</a>.
        Just a simple list of contacts with action icons.
    </p>

    <div class="sm:grid sm:grid-cols-2 sm:gap-6 space-y-8 md:space-y-0">
        <x-bladewind::card compact="true">
            <div class="flex items-center">
                <div><x-bladewind::avatar image="https://lh3.googleusercontent.com/a-/AOh14GhSotQTt_njzqqq-265MKM5z5iPP9m-_A2myyrGXQ=s288-p-rw-no" /></div>
                <div class="grow pl-2 pt-1">
                    <b>Michael K. Ocansey</b>
                    <div class="text-sm">Senior Developer</div>
                    <div class="text-sm">Tech Team</div>
                </div>
                <div>
                    <a href="javascript:showModal('delete-contact')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 p-1 rounded-full bg-red-200 hover:bg-red-500 hover:text-red-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                </div>
            </div>
        </x-bladewind::card>
        <x-bladewind::card compact="true">
            <div class="flex items-center">
                <div><x-bladewind::avatar image="data:image/jpeg;base64,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" /></div>
                <div class="grow pl-2 pt-1">
                    <b>Grace Adjoa Sedinam</b>
                    <div class="text-sm">Senior Medical Officer</div>
                    <div class="text-sm">Health & Safety Dept.</div>
                </div>
                <div>
                    <a href="javascript:showModal('delete-contact')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 p-1 rounded-full bg-red-200 hover:bg-red-500 hover:text-red-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                </div>
            </div>
        </x-bladewind::card>
        <x-bladewind::card compact="true" has_hover="true">
            <div class="flex items-center">
                <div><x-bladewind::avatar image="data:image/jpeg;base64,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" /></div>
                <div class="grow pl-2 pt-1">
                    <b>Alfred Rowe</b>
                    <div class="text-sm">Senior Developer</div>
                    <div class="text-sm">Tech Team</div>
                </div>
                <div>
                    <a href="javascript:showModal('delete-contact')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 p-1 rounded-full bg-red-200 hover:bg-red-500 hover:text-red-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                </div>
            </div>
        </x-bladewind::card>
        <x-bladewind::card compact="true" has_hover="true">
            <div class="flex items-center">
                <div><x-bladewind::avatar image="https://pbs.twimg.com/profile_images/1388977302583775237/z5uvkwkT_400x400.jpg" /></div>
                <div class="grow pl-2 pt-1">
                    <b>Judith Kabukie</b>
                    <div class="text-sm">Senior Attorney</div>
                    <div class="text-sm">Legal Team</div>
                </div>
                <div>
                    <a href="javascript:showModal('delete-contact')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 p-1 rounded-full bg-red-200 hover:bg-red-500 hover:text-red-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                </div>
            </div>
        </x-bladewind::card>
    </div>
<br />
    <pre class="language-markup line-numbers">
        <code>
            &lt;div class="grid grid-cols-2 gap-3"&gt;

                &lt;x-bladewind::card compact="true"&gt;
                    &lt;div class="flex items-center"&gt;
                        &lt;div&gt;
                            &lt;x-bladewind.avatar image="/path/to/the/image/file" /&gt;
                        &lt;/div&gt;
                        &lt;div class="grow pl-2 pt-1"&gt;
                            &lt;b&gt;Michael K. Ocansey&lt;/b&gt;
                            &lt;div class="text-sm"&gt;Senior Developer&lt;/div&gt;
                            &lt;div class="text-sm"&gt;Tech Team&lt;/div&gt;
                        &lt;/div&gt;
                        &lt;div&gt;
                            &lt;a href=""&gt;
                                &lt;svg&gt;
                                    ...
                                &lt;/svg&gt;
                            &lt;/a&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/x-bladewind::card&gt;

                &lt;x-bladewind::card compact="true"&gt;
                    ...
                &lt;/x-bladewind::card&gt;

                &lt;x-bladewind::card compact="true"&gt;
                    ...
                &lt;/x-bladewind::card&gt;

                &lt;x-bladewind::card compact="true"&gt;
                    ...
                &lt;/x-bladewind::card&gt;

            &lt;/div&gt;
        </code>
    </pre>

    <h2 id="contact">Contact Card</h2>
    <p>
        This card component is very specific to rendering contacts. It is not useful for anything else. It saves you from having to manually build a contact card like we did in the earlier examples. A default avatar is used if one is not provided.
    </p>
   <div class="sm:grid sm:grid-cols-2 sm:gap-4 md:space-y-0 space-y-8">
       <x-bladewind::contact-card
           has_hover="true"
           compact="true"
              name="Jane A. Doe"
              mobile="+233.444.456.542"
              image="/assets/images/doc.png"
              position="Senior Medical Officer"
              email="doc@hospital.com"
              birthday="01-May-2000" />
        <x-bladewind::contact-card
            name="Michael K. Ocansey"
            mobile="+233.123.456.789"
            department="Tech Team"
            position="Senior Dev"
            image="/assets/images/male.png"
            email="mike@bladewindui.com"
            birthday="01-May-2000" />
   </div>

<pre class="language-markup line-numbers">
<code>
    &lt;x-bladewind.contact-card
        name="Michael K. Ocansey"
        mobile="+233.123.456.789"
        image="/path/to/the/image/file"
        position="Senior Copywriter"
        email="mike@bladewindui.com"
        birthday="01-May-2000" /&gt;
</code>
</pre>
<br />
<p>
    Setting <code class="inline text-red-500">centered="true"</code> reformats the contact card and vertically aligns and centers the content.
</p>
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 md:space-y-0 space-y-12">
        <x-bladewind::contact-card
            centered="true"
            name="Jane C. Doe"
            mobile="+233.444.456.542"
            image="/assets/images/doc.png"
            position="Senior Medical Officer"
            email="doc@hospital.com"
            birthday="01-May-2000" />
        <x-bladewind::contact-card
            centered="true"
            name="Abigail Edwin"
            mobile="+233.444.432.123"
            image="/assets/images/edwin.jpeg"
            position="Senior Mobile Developer"
            email="abi@edwin.com"
            birthday="22-July-1990" />
        <x-bladewind::contact-card
            name="Michael K. Ocansey"
            mobile="+233.123.456.789"
            department="Tech Team"
            image="/assets/images/me.jpeg"
            position="Senior Dev"
            email="mike@bladewindui.com"
            centered="true"
            birthday="01-May-2000" />
    </div>

    <h2 id="header-footer">Header and Footer</h2>
    <p>
        You can specify a header and footer for the card component. This is set up as a slot so there is really no restriction to what goes inside the header and footer.
        Headers and footers are independent so you don't need to explicitly specify both. When the <code class="inline">header</code> slot is set, the main body of the card looses all its padding so you will need to style the card body as you wish. Lets try and create an Instagram-like card.
        The image is from Unsplash and by <a href="https://unsplash.com/@thevisualchef007" target="_blank">Akindele Ibukun</a>
    </p>
   <div class="sm:grid sm:grid-cols-2 sm:gap-4 md:divide-y-0 divide-y-8">
        <x-bladewind::card>
            <x-slot name="header">
                <div class="flex px-4 pt-2 pb-3">
                    <x-bladewind::avatar size="small" image="https://lh3.googleusercontent.com/a-/AOh14GhSotQTt_njzqqq-265MKM5z5iPP9m-_A2myyrGXQ=s288-p-rw-no" />
                    <div class="pl-2">
                        <span class="block font-semibold text-black/70 dark:text-slate-300">mkocansey</span>
                        <span class="block text-xs">Greater Accra, Accra, Ghana</span>
                    </div>
                </div>
            </x-slot>
            <img alt="Photo by Akindele Ibukun from https://unsplash.com/@@thevisualchef007" src="https://images.unsplash.com/photo-1651277167651-9d31e995dd4a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDE4fHx8ZW58MHx8fHw%3D&auto=format&fit=crop&w=500&q=60" />
            <x-slot name="footer">
                <div class="flex justify-between p-4">
                    <div class="flex space-x-4">
                        <x-bladewind::icon name="heart" class="h-[32px] w-[32px] text-gray-500 cursor-pointer hover:text-black hover:dark:text-slate-300" />
                        <x-bladewind::icon name="chat-bubble-oval-left-ellipsis" class="h-[32px] w-[32px] text-gray-500 cursor-pointer hover:text-black hover:dark:text-slate-300" />
                        <x-bladewind::icon name="arrow-uturn-left" class="h-[32px] w-[32px] text-gray-500 cursor-pointer hover:text-black hover:dark:text-slate-300" />
                    </div>
                    <div>
                        <x-bladewind::icon name="bookmark" class="h-[32px] w-[32px] text-gray-500 cursor-pointer hover:text-black hover:dark:text-slate-300" />
                    </div>
                </div>
            </x-slot>
        </x-bladewind::card>
   </div>

    <pre class="language-markup line-numbers" data-line="3, 17">
        <code>
            &lt;x-bladewind::card&gt;

                &lt;x-slot:header&gt;
                    &lt;div class="flex px-4 pt-2 pb-3"&gt;
                        &lt;x-bladewind.avatar
                            size="small"
                            image="/path/to/the/image/file" /&gt;
                        &lt;div class="pl-2"&gt;
                            &lt;span class="block..."&gt;mkocansey&lt;/span&gt;
                            &lt;span class="block..."&gt;Greater Accra, Accra&lt;/span&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/x-slot:header&gt;

                &lt;img src="/path/to/the/image/file" /&gt;

                &lt;x-slot:footer&gt;
                    &lt;div class="flex justify-between p-4"&gt;
                        &lt;div class="flex space-x-4"&gt;
                            &lt;x-bladewind.icon name="heart" class="h-8 w-8..." /&gt;
                            &lt;x-bladewind.icon name="chat-bubble-oval-left-ellipsis" class="h-8 w-8..." /&gt;
                            &lt;x-bladewind.icon name="arrow-uturn-left" class="h-8 w-8..." /&gt;
                        &lt;/div&gt;
                        &lt;div&gt;
                            &lt;svg&gt; ... &lt;/svg&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/x-slot:footer&gt;

            &lt;/x-bladewind::card&gt;
        </code>
    </pre>

    <h2 id="padding">Padding And Radius</h2>
    <p>
        <code class="inline">padding</code> is a scale rather than a switch. It replaces
        reaching for <code class="inline">!p-5</code> and friends when
        <code class="inline">compact</code> is too tight and the default is too loose.
    </p>
    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::card padding="none"&gt;...&lt;/x-bladewind::card&gt;
&lt;x-bladewind::card padding="tiny"&gt;...&lt;/x-bladewind::card&gt;      {{-- p-2 --}}
&lt;x-bladewind::card padding="small"&gt;...&lt;/x-bladewind::card&gt;     {{-- p-4 --}}
&lt;x-bladewind::card padding="regular"&gt;...&lt;/x-bladewind::card&gt;   {{-- p-6, the default --}}
&lt;x-bladewind::card padding="medium"&gt;...&lt;/x-bladewind::card&gt;    {{-- p-8 --}}
&lt;x-bladewind::card padding="big"&gt;...&lt;/x-bladewind::card&gt;       {{-- p-10 --}}
&lt;x-bladewind::card padding="large"&gt;...&lt;/x-bladewind::card&gt;     {{-- p-12 --}}
&lt;x-bladewind::card padding="p-5"&gt;...&lt;/x-bladewind::card&gt;       {{-- or a utility verbatim --}}
        </code>
    </pre>
    <p>
        <code class="inline">compact</code> and <code class="inline">no_padding</code> still
        behave exactly as before; an explicit <code class="inline">padding</code> simply wins
        over both.
    </p>
    <p>
        <code class="inline">radius</code> also covers more ground now:
        <code class="inline">none</code>, <code class="inline">tiny</code>,
        <code class="inline">small</code>, <code class="inline">medium</code>,
        <code class="inline">large</code>, <code class="inline">xl</code>,
        <code class="inline">omg</code> and <code class="inline">full</code>. Anything that
        already looks like a Tailwind radius utility passes straight through, so
        <code class="inline">radius="rounded-l-none"</code> works for attaching a card to
        something on its left.
    </p>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Card component.</p>
    @include('docs/announcement')
    <h3 class="pb-2 ">Card Component Attributes</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>title</td>
            <td><em>blank</em></td>
            <td>Any title provided will become the card heading</td>
        </tr>
        <tr>
            <td>header</td>
            <td><em>blank</em></td>
            <td>Once a header slot is defined, the card splits into two uneven horizontal parts. The content of the header slot will be displayed first.</td>
        </tr>
        <tr>
            <td>footer</td>
            <td><em>blank</em></td>
            <td>Once a footer slot is defined, the content of the slot gets fixed to the base of the card as a footer.</td>
        </tr>
        <tr>
            <td>compact</td>
            <td>false</td>
            <td>This controls how much padding is in the card. Setting this attribute to <code class="inline">true</code> will reduce the padding in the card. This is useful for building cards like the contact list under <a href="#examples">practical examples</a> above.
            This attribute only works if header and footer are not set. <br /><code class="inline">true</code>  <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>no_padding</td>
            <td>false</td>
            <td>This completely removes the padding within the card. Content will touch the edges of the card. <br /><code class="inline">true</code>  <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>has_shadow</td>
            <td>true</td>
            <td>This controls if the card should have a shadow effect. <br /><code class="inline">true</code>  <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>has_hover</td>
            <td>false</td>
            <td>Displays an extra shadow on hover of the card.. <br /><code class="inline">true</code>  <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>url</td>
            <td>null</td>
            <td>Url to visit when the card is clicked. When you specify a url like <b>"/some-url"</b> , it will be opened using the Bladewind <code class="inline">redirect()</code> Javascript helper function.
                Specifying a function call like <b>"performSomeAction(some_id)"</b> will trigger <code class="inline">javascript:performSomeAction(some_id)</code> when the link is clicked.
                Finally, a url like <b>"https://mydomain.com/some-url" will be opened with <code class="inline">window.open()</code>.</td>
        </tr>
        <tr>
            <td>radius</td>
            <td>small</td>
            <td>Increases the roundness of the card. <br /><code class="inline">none</code>  <code class="inline">small</code><code class="inline">medium</code>  <code class="inline">large</code>  <code class="inline">xl</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-card</td>
            <td>Any additional css classes can be added using this attribute. For example if you prefer to have non-rounded cards you can set <code class="inline">class="!rounded-none"</code>.</td>
        </tr>
        <tr>
            <td>padding</td>
            <td><em>blank</em></td>
            <td>Padding scale, or any Tailwind padding utility used verbatim. Wins over <code class="inline">compact</code> and <code class="inline">no_padding</code>.<br /><code class="inline">none</code> <code class="inline">tiny</code> <code class="inline">small</code> <code class="inline">regular</code> <code class="inline">medium</code> <code class="inline">big</code> <code class="inline">large</code></td>
        </tr>
    </x-bladewind::table>

    <h3 class="pb-2 ">Card with all attributes defined</h3>
<pre class="language-markup line-numbers">
<code>
    &lt;x-bladewind::card
        title="recent updates"
        has_shadow="true"
        has_hover="false"
        compact="false"
        no_padding="true"
        radius="large"
        url="/user"
        class="!rounded-none"&gt;

        &lt;x-slot:header&gt;...&lt;/x-slot:header&gt;
        &lt;x-slot:footer&gt;...&lt;/x-slot:footer&gt;

        ...

    &lt;/x-bladewind::card&gt;
</code>
</pre>

    <h3 class="pb-2 ">Contact Card Component Attributes</h3>
    <p>The table below shows a comprehensive list of all the attributes available for the Contact Card component.</p>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td><em>blank</em></td>
            <td>Name of the contact</td>
        </tr>
        <tr>
            <td>department</td>
            <td><em>blank</em></td>
            <td>Department of the contact.</td>
        </tr>
        <tr>
            <td>position</td>
            <td><em>blank</em></td>
            <td>Designation or position of the contact.</td>
        </tr>
        <tr>
            <td>image</td>
            <td><em>bladewind/images/avatar.png</em></td>
            <td>Picture of the contact.</td>
        </tr>
        <tr>
            <td>email</td>
            <td><em>blank</em></td>
            <td>Email of the contact.</td>
        </tr>
        <tr>
            <td>birthday</td>
            <td><em>blank</em></td>
            <td>Birthday of the contact.</td>
        </tr>
        <tr>
            <td>mobile</td>
            <td><em>blank</em></td>
            <td>Mobile of the contact.</td>
        </tr>
        <tr>
            <td>has_shadow</td>
            <td>true</td>
            <td>This controls if the card should have a shadow effect. <br /><code class="inline">true</code>  <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>has_hover</td>
            <td>false</td>
            <td>Displays an extra shadow on hover of the card.. <br /><code class="inline">true</code>  <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>centered</td>
            <td>false</td>
            <td>Displays contact card vertically. <br /><code class="inline">true</code>  <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>no_padding</td>
            <td>false</td>
            <td>This completely removes the padding within the card. Content will touch the edges of the card. <br /><code class="inline">true</code>  <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>url</td>
            <td>null</td>
            <td>Url to visit when the card is clicked. When you specify a url like <b>"/some-url"</b> , it will be opened using the Bladewind <code class="inline">redirect()</code> Javascript helper function.
                Specifying a function call like <b>"performSomeAction(some_id)"</b> will trigger <code class="inline">javascript:performSomeAction(some_id)</code> when the link is clicked.
                Finally, a url like <b>"https://mydomain.com/some-url" will be opened with <code class="inline">window.open()</code>.</td>
        </tr>
        <tr>
            <td>class</td>
            <td>bw-contact-card</td>
            <td>Any additional css classes can be added using this attribute. For example if you prefer to have non-rounded cards you can set <code class="inline">class="!rounded-none"</code>.</td>
        </tr>
    </x-bladewind::table>

    <h3>Contact Card with all attributes defined</h3>
<pre class="language-markup line-numbers">
<code>
    &lt;x-bladewind.contact-card
        name="Michael K. Ocansey"
        mobile="+233.123.456.789"
        image="/path/to/the/image/file"
        position="Senior Copywriter"
        email="mike@bladewindui.com"
        department="Tech"
        birthday="01-May-2000"
        has_hover="true"
        centered="true"
        no_padding="true"
        url="viewUserDetails(id)"
        class="!rounded-none"&gt;

        // you can define additional content here
        ...

    &lt;/x-bladewind.contact-card&gt;
</code>
</pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for the card component is available in <code class="inline">resources > views > components > bladewind > card.blade.php</code>
    </x-bladewind::alert><br />
    <x-bladewind::alert show_close_icon="false">
        The source file for the contact card component is available in <code class="inline">resources > views > components > bladewind > contact-card.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#basic">Basic card</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#radii">Different radii</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#examples">Practical examples</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#contact">Contact card</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#header-footer">Header and footer</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#padding">Padding and radius</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>
    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-card');
        </script>
    </x-slot:scripts>
</x-app>
<x-bladewind::modal
    title="Delete Confirmation"
    type="info"
    name="delete-contact">
    Do you really want to delete this contact? There's no going back.
</x-bladewind::modal>
