<x-app>
    <x-slot:title>Dropmenu Component</x-slot:title>
    <x-slot:page_title>Dropmenu</x-slot:page_title>

    <p>
        Useful for displaying menu items in a dropdown. This is very different from the <a href="/component/select">Select component</a>. The Select component can pass values as a form element.
        The Dropmenu does not pass values around and is mostly useful for accessing quick actions.
    </p>

    <x-bladewind::table hover_effect="false" divider="thin">
        <tr>
            <td>John C. Doe</td>
            <td>john@doe.com</td>
            <td>Sales</td>
            <td class="text-right">
                <x-bladewind::dropmenu>
                    <x-bladewind::dropmenu.item>Invite to Project </x-bladewind::dropmenu.item>
                    <x-bladewind::dropmenu.item>Assign Task</x-bladewind::dropmenu.item>
                    <x-bladewind::dropmenu.item>Send Message</x-bladewind::dropmenu.item>
                </x-bladewind::dropmenu>
            </td>
        </tr>
    </x-bladewind::table>

    <pre class="language-markup line-numbers" data-line="3-7">
        <code>
            &lt;x-bladewind.table hover_effect="false" divider="thin"&gt;
            ...
            &lt;x-bladewind::dropmenu&gt;
                &lt;x-bladewind::dropmenu.item&gt;Invite to Project &lt;/x-bladewind::dropmenu.item&gt;
                &lt;x-bladewind::dropmenu.item&gt;Assign Task&lt;/x-bladewind::dropmenu.item&gt;
                &lt;x-bladewind::dropmenu.item&gt;Send Message&lt;/x-bladewind::dropmenu.item&gt;
            &lt;/x-bladewind::dropmenu&gt;
            ...
            &lt;/x-bladewind.table&gt;
        </code>
    </pre>

    <p>
        By default the Dropmenu is triggered using the <code class="inline">horizontal ellipsis</code> icon found on <a href="https://heroicons.com/" target="_blank">Heroicons</a>.
        You can trigger the menu using any other icon from Heroicons or using any other element. To use an icon as the trigger, the trick is to append the word <strong>-icon</strong> to the end of the name of the icon defined on Heroicons.
    </p>
    <br />
    <div class="grid grid-cols-3 gap-6">
        <div class="text-center">
            <x-bladewind::dropmenu trigger="musical-note-icon">
                <x-bladewind::dropmenu.item>Add to playlist</x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item>Play again</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        </div>
        <div class="text-center">
            <x-bladewind::dropmenu trigger="arrow-down-circle-icon">
                <x-bladewind::dropmenu.item>Download file</x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item>Add to library</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        </div>
        <div class="text-center">
            <x-bladewind::dropmenu trigger="cog-6-tooth-icon">
                <x-bladewind::dropmenu.item>Company settings</x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item>User settings</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        </div>
    </div>
    <br />
    <pre class="language-markup line-numbers" data-line="3,13,24">
        <code>
            &lt;div class="grid grid-cols-3 gap-6"&gt;
                &lt;div class="text-center"&gt;
                    &lt;x-bladewind::dropmenu trigger="musical-note-icon"&gt;
                        &lt;x-bladewind::dropmenu.item&gt;
                            Add to playlist
                        &lt;/x-bladewind::dropmenu.item&gt;
                        &lt;x-bladewind::dropmenu.item&gt;
                            Play again
                        &lt;/x-bladewind::dropmenu.item&gt;
                    &lt;/x-bladewind::dropmenu&gt;
                &lt;/div&gt;
                &lt;div class="text-center"&gt;
                    &lt;x-bladewind::dropmenu trigger="arrow-down-circle-icon"&gt;
                        &lt;x-bladewind::dropmenu.item&gt;
                            Download file
                        &lt;/x-bladewind::dropmenu.item&gt;
                        &lt;x-bladewind::dropmenu.item&gt;
                            Add to library
                        &lt;/x-bladewind::dropmenu.item&gt;
                    &lt;/x-bladewind::dropmenu&gt;
                &lt;/div&gt;
                &lt;div class="text-center"&gt;
                    &lt;x-bladewind::dropmenu trigger="cog-6-tooth-icon"&gt;
                        &lt;x-bladewind::dropmenu.item&gt;
                            Company settings
                        &lt;/x-bladewind::dropmenu.item&gt;
                        &lt;x-bladewind::dropmenu.item&gt;
                            User settings
                        &lt;/x-bladewind::dropmenu.item&gt;
                    &lt;/x-bladewind::dropmenu&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        </code>
    </pre>
    <h2 id="trigger">Trigger Properties</h2>
    <h3>trigger_css</h3>
    <p>
        It is also possible to modify the trigger css. This css applies to any item you specify as the trigger but most useful if you specify an icon as the trigger.
        This is achieved by defining TailwindCSS classes for the <code class="text-red-500 inline">trigger_css</code> attribute.
    </p>
    <div class="text-center">
        <x-bladewind::dropmenu trigger="musical-note-icon" trigger_css="bg-pink-600 text-white p-2 rounded-full !h-10 !w-10">
            <x-bladewind::dropmenu.item>Add to playlist</x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item>Play again</x-bladewind::dropmenu.item>
        </x-bladewind::dropmenu>
    </div>
    <br />
    <pre class="language-markup line-numbers" data-line="3">
        <code>
            &lt;div class="text-center"&gt;
                &lt;x-bladewind::dropmenu trigger="musical-note-icon"
                     trigger_css="bg-pink-600 text-white p-2 rounded-full !h-10 !w-10"&gt;
                    &lt;x-bladewind::dropmenu.item&gt;
                        Add to playlist
                    &lt;/x-bladewind::dropmenu.item&gt;
                    &lt;x-bladewind::dropmenu.item&gt;
                        Play again
                    &lt;/x-bladewind::dropmenu.item&gt;
                &lt;/x-bladewind::dropmenu&gt;
            &lt;/div&gt;
        </code>
    </pre>
    <h3>trigger_on</h3>
    <p>
        By default the Dropmenu is displayed when you click on the trigger. It is possible to change this behaviour by defining the
        <code class="text-red-500 inline">trigger_on</code> attribute. There are only two available options: <code class="inline">click</code> and <code class="inline">mouseover</code>.
    </p>
    <div class="text-center">
        <x-bladewind::dropmenu trigger="musical-note-icon" trigger_css="bg-green-600 text-white p-2 rounded-full !h-10 !w-10" trigger_on="mouseover">
            <x-bladewind::dropmenu.item>Add to playlist</x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item>Play again</x-bladewind::dropmenu.item>
        </x-bladewind::dropmenu>
    </div>
    <br />
    <pre class="language-markup line-numbers" data-line="4">
        <code>
            &lt;div class="text-center"&gt;
                &lt;x-bladewind::dropmenu trigger="musical-note-icon"
                    trigger_css="bg-green-600 text-white p-2 rounded-full !h-10 !w-10"
                    trigger_on="mouseover"&gt;
                    &lt;x-bladewind::dropmenu.item&gt;
                        Add to playlist
                    &lt;/x-bladewind::dropmenu.item&gt;
                    &lt;x-bladewind::dropmenu.item&gt;
                        Play again
                    &lt;/x-bladewind::dropmenu.item&gt;
                &lt;/x-bladewind::dropmenu&gt;
            &lt;/div&gt;
        </code>
    </pre>
    <h3>Non Icon Triggers</h3>
    <p>
        To trigger the Dropmenu using any HTML element other than an icon, you will need to define the trigger as a slot.
    </p>
    <div class="grid grid-cols-2 gap-6">
        <div class="text-center">
            <x-bladewind::dropmenu>
                <x-slot:trigger>
                    <x-bladewind::button type="secondary" size="tiny">Options</x-bladewind::button>
                </x-slot:trigger>
                <x-bladewind::dropmenu.item>Add to playlist</x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item>Play again</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        </div>
        <div class="text-center">
            <x-bladewind::dropmenu>
                <x-slot:trigger>
                    <div class="flex space-x-2 items-center shadow px-4 rounded-md">
                        <div class="grow">
                            <x-bladewind::avatar image="/assets/images/francis.png" />
                        </div>
                        <div class="grow">
                            <div><strong>John C. Doe</strong></div>
                            <div class="text-sm">Tech, IT Support</div>
                        </div>
                        <div>
                            <x-bladewind::icon name="chevron-down" class="!h-4 !w-4" />
                        </div>
                    </div>
                </x-slot:trigger>
                <x-bladewind::dropmenu.item>Deactivate my account</x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item>Delete Profile</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        </div>
    </div>
    <br />
    <pre class="language-markup line-numbers" data-line="4,8,20,34">
        <code>
             &lt;div class="grid grid-cols-2 gap-6"&gt;
                &lt;div class="text-center"&gt;
                    &lt;x-bladewind::dropmenu&gt;
                        &lt;x-slot:trigger&gt;
                            &lt;x-bladewind.button type="secondary" size="tiny"&gt;
                                Options
                            &lt;/x-bladewind.button&gt;
                        &lt;/x-slot:trigger&gt;
                        &lt;x-bladewind::dropmenu.item&gt;
                            Add to playlist
                        &lt;/x-bladewind::dropmenu.item&gt;
                        &lt;x-bladewind::dropmenu.item&gt;
                            Play again
                        &lt;/x-bladewind::dropmenu.item&gt;
                    &lt;/x-bladewind::dropmenu&gt;
                &lt;/div&gt;
                &lt;div class="text-center"&gt;
                    &lt;x-bladewind::dropmenu&gt;
                        &lt;x-slot:trigger&gt;
                            &lt;div class="flex space-x-2 items-center shadow px-4 rounded-md"&gt;
                                &lt;div class="grow"&gt;
                                    &lt;x-bladewind.avatar image="/assets/...png" /&gt;
                                &lt;/div&gt;
                                &lt;div class="grow"&gt;
                                    &lt;div&gt;&lt;strong&gt;John C. Doe&lt;/strong&gt;&lt;/div&gt;
                                    &lt;div class="text-sm"&gt;Tech, IT Support&lt;/div&gt;
                                &lt;/div&gt;
                                &lt;div&gt;
                                    &lt;x-bladewind.icon name="chevron-down"
                                        class="!h-4 !w-4" /&gt;
                                &lt;/div&gt;
                            &lt;/div&gt;
                        &lt;/x-slot:trigger&gt;
                        &lt;x-bladewind::dropmenu.item&gt;
                            Deactivate my account
                        &lt;/x-bladewind::dropmenu.item&gt;
                        &lt;x-bladewind::dropmenu.item&gt;
                            Delete Profile
                        &lt;/x-bladewind::dropmenu.item&gt;
                    &lt;/x-bladewind::dropmenu&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        </code>
    </pre>
    <h2 id="menu-items">Dropmenu Item Actions</h2>
    <p>
        The Dropmenu items are the actual line items within your Dropmenu. Each item can contain any piece of HTML code
        so you completely have control over what action is assigned to each menu item. BladewindUI does not interfere.
        For convenience, you can specify an <code class="inline text-red-500">onclick</code> attribute.
    </p>
    <p>
        <x-bladewind::alert show_close_icon="false">Dropmenu Items can contain HTML so their content is all up to you</x-bladewind::alert>
    </p>
    <br />
    <div class="text-center">
        <x-bladewind::dropmenu trigger="light-bulb-icon" trigger_css="bg-yellow-400 text-yellow-800 p-2 rounded-full !h-10 !w-10">
            <x-bladewind::dropmenu.item>
                <a href="/library" target="_blank">Go to Library</a>
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item onclick="showModal('dropmenu-demo')">
                Show a Modal
            </x-bladewind::dropmenu.item>
        </x-bladewind::dropmenu>
    </div>
    <x-bladewind::modal title="Dropmenu Modal Example" name="dropmenu-demo">
        <p>This is just n example of how Dropmenu Items can launch modals</p>
    </x-bladewind::modal>
<br />
    <pre class="language-markup line-numbers" data-line="4,7">
        <code>
            &lt;x-bladewind::dropmenu trigger="light-bulb-icon"
                trigger_css="bg-yellow-400 ..."&gt;
                &lt;x-bladewind::dropmenu.item&gt;
                    &lt;a href="/library" target="_blank"&gt;Go to Library&lt;/a&gt;
                &lt;/x-bladewind::dropmenu.item&gt;
                &lt;x-bladewind::dropmenu.item onclick="showModal('dropmenu-demo')"&gt;
                    Show a Modal
                &lt;/x-bladewind::dropmenu.item&gt;
            &lt;/x-bladewind::dropmenu&gt;
        </code>
    </pre>

    <h2 id="headers">Headers, Icons and Dividers</h2>
    <h3>Headers</h3>
    <p>
        It is possible to define a header for your Dropmenu component. There can be several headers in a Dropmenu. The header is still
        a <code class="inline">x-bladewind::dropmenu.item</code> component so can contain any HTML. The only difference between this and other items is there is no hover effect,
        the cursor displayed is the default pointer and there is a divider separating the header from the next menu item.
        To define a Dropmenu item as a header, set <code class="inline text-red-500">header="true</code>.
    </p>
    <pre class="language-markup">
        <code>
            ...
            &lt;x-bladewind::dropmenu.item header="true"&gt;
                // define heading here
            &lt;/x-bladewind::dropmenu.item&gt;
            ...
        </code>
    </pre>

    <h3>Icons</h3>
    <p>
        Even though it is possible to define your own icon as part of the Dropmenu item's content, there is a shortcut that allows you to define any of the icons available on <a href="https://heroicons.com" target="_blank">Heroicons</a>.
        This makes use of the BladewindUI <a href="/component/icon">Icon component</a>. This is useful only if you have menu items that fit on one line and you want to prefix each line with an icon.
        To define a Dropmenu item with an icon , set the <code class="inline text-red-500">icon</code> attribute with any icon name from Heroicons. Unlike the icon used in the <code class="inline text-red-500">trigger</code> attribute of the Dropmenu component, items do not require the <strong>-icon</strong> at the end of the icon name.
    </p>
    <pre class="language-markup">
        <code>
            ...
            &lt;x-bladewind::dropmenu.item icon="square-pencil"&gt;
                Edit Profile
            &lt;/x-bladewind::dropmenu.item&gt;
            ...
        </code>
    </pre>

    <p>
        By default, icons are positioned on the left of the menu item content. To switch the icon position to the right of the menu item content, set <code class="inline text-red-500">icon_right="true"</code>.
        Setting the attribute on the <code class="inline">x-bladewind::dropmenu</code> component will shift all menu items in the menu to the right.
        Alternatively, you can set the attribute on one or more menu items within the Dropmenu component.
    </p>
    <pre class="language-markup">
        <code>
            ...
            &lt;x-bladewind::dropmenu icon_right="true"&gt;
                &lt;x-bladewind::dropmenu.item&gt;
                ...
                &lt;/x-bladewind::dropmenu.item&gt;
            &lt;/x-bladewind::dropmenu&gt;
            ...
        </code>
    </pre>

    <h3>Dividers</h3>
    <p>
        You may want to logically divider your Dropmenu into sections. You can either do that with headers or dividers.
        A divider is simply a non-clickable line separating menu items. To define a Dropmenu item as a divider , set <code class="inline text-red-500">divider="true"</code>.
         Any text added to the menu item will be ignored.
    </p>
    <pre class="language-markup">
        <code>
            ...
            &lt;x-bladewind::dropmenu.item divider="true" /&gt;
            ...
        </code>
    </pre>
    <p>
        By default Dropmenu Items are not divided. You can tell each menu item apart on mouseover. If you prefer to have your menu items separated by a thin gray line you can set
        <code class="inline text-red-500">divided="true"</code> on the Dropmenu component itself (not on the menu items).
    </p>
    <pre class="language-markup">
        <code>
            ...
            &lt;x-bladewind::dropmenu divided="true"&gt;
                ...
            &lt;/x-bladewind::dropmenu&gt;
            ...
        </code>
    </pre>
    <p>
        The example below addresses headers, icons and dividers.
    </p>
    <div class="text-center">
        <x-bladewind::dropmenu>
            <x-slot:trigger>
                <div class="flex space-x-2 items-center rounded-md">
                    <div class="grow">
                        <x-bladewind::avatar image="/assets/images/issah.jpg" />
                    </div>
                    <div>
                        <x-bladewind::icon name="chevron-down" class="!h-4 !w-4" />
                    </div>
                </div>
            </x-slot:trigger>
            <x-bladewind::dropmenu.item header="true">
                <div class="grow">
                    <div><strong>Jane A. Doe</strong></div>
                    <div class="text-sm">@jane-the-coder</div>
                    <div class="text-sm">jane@bladewindui.com</div>
                </div>
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item icon="pencil-square">
                Edit Profile
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item icon="trash" icon_css="!text-red-300">
                <span class="text-red-500">Delete Profile</span>
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item divider />
            <x-bladewind::dropmenu.item icon="computer-desktop">
                Your Repositories
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item icon="briefcase">
                Your Projects
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item icon="building-office">
                Your Organizations
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item icon="star">
                Your Stars
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item divider />
            <x-bladewind::dropmenu.item hover="false">
                <x-bladewind::button color="indigo" radius="small" size="small" class="w-full">Sign Out</x-bladewind::button>
            </x-bladewind::dropmenu.item>
        </x-bladewind::dropmenu>
    </div>
<br />
    <pre class="language-markup line-numbers" data-line="14,30,46">
        <code>
            &lt;x-bladewind::dropmenu&gt;

                &lt;x-slot:trigger&gt;
                    &lt;div class="flex space-x-2 items-center rounded-md"&gt;
                        &lt;div class="grow"&gt;
                            &lt;x-bladewind.avatar image="/assets/...jpg" /&gt;
                        &lt;/div&gt;
                        &lt;div&gt;
                            &lt;x-bladewind.icon name="chevron-down" class="!h-4 !w-4" /&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/x-slot:trigger&gt;

                &lt;x-bladewind::dropmenu.item header="true"&gt;
                    &lt;div class="grow"&gt;
                        &lt;div&gt;&lt;strong&gt;Jane A. Doe&lt;/strong&gt;&lt;/div&gt;
                        &lt;div class="text-sm"&gt;@jane-the-coder&lt;/div&gt;
                        &lt;div class="text-sm"&gt;jane@bladewindui.com&lt;/div&gt;
                    &lt;/div&gt;
                &lt;/x-bladewind::dropmenu.item&gt;

                &lt;x-bladewind::dropmenu.item icon="pencil-square"&gt;
                    Edit Profile
                &lt;/x-bladewind::dropmenu.item&gt;
                &lt;x-bladewind::dropmenu.item icon="trash" icon_css="!text-red-300"&gt;
                    &lt;span class="text-red-500"&gt;Delete Profile&lt;/span&gt;
                &lt;/x-bladewind::dropmenu.item&gt;

                &lt;x-bladewind::dropmenu.item divider /&gt;

                &lt;x-bladewind::dropmenu.item icon="computer-desktop"&gt;
                    Your Repositories
                &lt;/x-bladewind::dropmenu.item&gt;
                &lt;x-bladewind::dropmenu.item icon="briefcase"&gt;
                    Your Projects
                &lt;/x-bladewind::dropmenu.item&gt;
                &lt;x-bladewind::dropmenu.item icon="building-office"&gt;
                    Your Organizations
                &lt;/x-bladewind::dropmenu.item&gt;
                &lt;x-bladewind::dropmenu.item icon="star"&gt;
                    Your Stars
                &lt;/x-bladewind::dropmenu.item&gt;

                &lt;x-bladewind::dropmenu.item divider /&gt;

                &lt;x-bladewind::dropmenu.item hover="false"&gt;
                    &lt;x-bladewind.button color="purple" radius="small" size="small" class="w-full"&gt;
                        Sign Out
                    &lt;/x-bladewind.button&gt;
                &lt;/x-bladewind::dropmenu.item&gt;

            &lt;/x-bladewind::dropmenu&gt;
        </code>
    </pre>

    <h2 id="positions">Menu Position</h2>
    <p>
        The Dropmenu component for now supports two menu positions. Left and right. This is achieved by setting the
        <code class="inline text-red-500">position</code> attribute on the Dropmenu component. The default position is <code>right</code> so
        you can ignore this attribute if you intend to use the component as is.
    </p>
    <div class="grid grid-cols-2 gap-4">
        <div class="text-center">
            <x-bladewind::dropmenu position="left">
                <x-slot:trigger>
                    <div class="flex space-x-2 items-center rounded-md">
                        <div class="grow">
                            <x-bladewind::avatar image="/assets/images/issah.jpg" />
                        </div>
                        <div>
                            <x-bladewind::icon name="chevron-down" class="!h-4 !w-4" />
                        </div>
                    </div>
                </x-slot:trigger>
                <x-bladewind::dropmenu.item header="true">
                    <div class="grow">
                        <div><strong>Jane A. Doe</strong></div>
                        <div class="text-sm">@jane-the-coder</div>
                        <div class="text-sm">jane@bladewindui.com</div>
                    </div>
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item icon="pencil-square">
                    Edit Profile
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item icon="trash" icon_css="!text-red-300">
                    <span class="text-red-500">Delete Profile</span>
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item divider />
                <x-bladewind::dropmenu.item icon="computer-desktop">
                    Your Repositories
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item icon="briefcase">
                    Your Projects
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item icon="building-office">
                    Your Organizations
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item icon="star">
                    Your Stars
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item divider />
                <x-bladewind::dropmenu.item hover="false">
                    <x-bladewind::button color="purple" radius="small" size="small" class="w-full">Sign Out</x-bladewind::button>
                </x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        </div>
        <div class="text-center">
            <x-bladewind::dropmenu>
                <x-slot:trigger>
                    <div class="flex space-x-2 items-center rounded-md">
                        <div class="grow">
                            <x-bladewind::avatar image="/assets/images/issah.jpg" />
                        </div>
                        <div>
                            <x-bladewind::icon name="chevron-down" class="!h-4 !w-4" />
                        </div>
                    </div>
                </x-slot:trigger>
                <x-bladewind::dropmenu.item header="true">
                    <div class="grow">
                        <div><strong>Jane A. Doe</strong></div>
                        <div class="text-sm">@jane-the-coder</div>
                        <div class="text-sm">jane@bladewindui.com</div>
                    </div>
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item icon="pencil-square">
                    Edit Profile
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item icon="trash" icon_css="!text-red-300">
                    <span class="text-red-500">Delete Profile</span>
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item divider />
                <x-bladewind::dropmenu.item icon="computer-desktop">
                    Your Repositories
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item icon="briefcase">
                    Your Projects
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item icon="building-office">
                    Your Organizations
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item icon="star">
                    Your Stars
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item divider />
                <x-bladewind::dropmenu.item hover="false">
                    <x-bladewind::button color="purple" radius="small" size="small" class="w-full">Sign Out</x-bladewind::button>
                </x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        </div>
        <div>
            <br />
            <pre class="language-markup line-numbers" data-line="14,30,46">
                <code>
                    &lt;x-bladewind::dropmenu
                        position="left"&gt;
                    ...
                    &lt;/x-bladewind::dropmenu&gt;
                </code>
            </pre>
        </div>
        <div>
            <br />
            <pre class="language-markup line-numbers" data-line="14,30,46">
                <code>
                    &lt;x-bladewind::dropmenu
                        position="right"&gt;
                    ...
                    &lt;/x-bladewind::dropmenu&gt;
                </code>
            </pre>
        </div>
    </div>

    <h2 id="scrollable">Scrollable Menu Items</h2>
    <p>
        You could have a long list of menu items in your Dropmenu. If you don't want all items showing,
        you can set <code class="inline text-red-500">scrollable="true"</code> on the Dropmenu component.
        This will reduce the menu items container to a default height of <code class="inline">200px</code> and scroll
        every menu item outside this view area. If the default height does not meet your needs, you can define your own
        height by setting the <code class="inline text-red-500">height</code> attribute. This takes any positive integer without the "px".
    </p>
    <div class="text-center">
        <x-bladewind::dropmenu scrollable>
            <x-slot:trigger>
                <div class="flex space-x-2 items-center rounded-md">
                    <div class="grow">
                        <x-bladewind::avatar image="/assets/images/issah.jpg" />
                    </div>
                    <div>
                        <x-bladewind::icon name="chevron-down" class="!h-4 !w-4" />
                    </div>
                </div>
            </x-slot:trigger>
            <x-bladewind::dropmenu.item header="true">
                <div class="grow">
                    <div><strong>Jane A. Doe</strong></div>
                    <div class="text-sm">@jane-the-coder</div>
                    <div class="text-sm">jane@bladewindui.com</div>
                </div>
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item icon="pencil-square">
                Edit Profile
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item icon="trash" icon_css="!text-red-300">
                <span class="text-red-500">Delete Profile</span>
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item divider />
            <x-bladewind::dropmenu.item icon="computer-desktop">
                Your Repositories
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item icon="briefcase">
                Your Projects
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item icon="building-office">
                Your Organizations
            </x-bladewind::dropmenu.item>
            <x-bladewind::dropmenu.item icon="star">
                Your Stars
            </x-bladewind::dropmenu.item>
        </x-bladewind::dropmenu>
    </div>


    <br />
    <pre class="language-markup line-numbers" data-line="14,30,46">
        <code>
            &lt;x-bladewind::dropmenu scrollable="true"&gt;
            ...
            &lt;/x-bladewind::dropmenu&gt;
        </code>
    </pre>

    <p>
        <x-bladewind::alert show_close_icon="false">
            If you have multiple Dropmenus on your page and experience issues with only the first Dropmenu showing and
            subsequent ones not showing, set modular="true" on the very first Dropmenu component on your page.
        </x-bladewind::alert>
    </p>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Dropmenu component.</p>
    @include('docs/announcement')
    <h3>Dropmenu Attributes</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>uniqid('bw-dropmenu-')</td>
            <td>Optional unique name for the component. Usually useful if you wish to target a menu from CSS to define overwriting styles.</td>
        </tr>
        <tr>
            <td>trigger</td>
            <td>ellipsis-horizontal-icon</td>
            <td>The element to trigger the menu. Usually what a user will click on to show the menu.</td>
        </tr>
        <tr>
            <td>trigger_css</td>
            <td><em>blank</em></td>
            <td>Additional css to apply to the trigger.</td>
        </tr>
        <tr>
            <td>trigger_on</td>
            <td>click</td>
            <td>Which event should trigger the menu.<br /><code class="inline">click</code> <code class="inline">mouseover</code></td>
        </tr>
        <tr>
            <td>divided</td>
            <td>false</td>
            <td>Should menu items have lines dividing them. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>scrollable</td>
            <td>false</td>
            <td>Should menu items scroll after 200px. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>height</td>
            <td>200</td>
            <td>Default height for menu items container. When scrollable=true, menu items container will be restricted to this height. <br /><code class="inline">positive integer</code></td>
        </tr>
        <tr>
            <td>hide_after_click</td>
            <td>true</td>
            <td>Should the menu be hidden after clicking on any of the menu items. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>icon_right</td>
            <td>false</td>
            <td>Align the icon to the right of the menu item. Applies to all items in the menu.<br /> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Additional css for the menu items container</td>
        </tr>
        <tr>
            <td>position</td>
            <td>right</td>
            <td>How should the menu items be positioned relative to the trigger. <br /><code class="inline">right</code> <code class="inline">left</code></td>
        </tr>
        <tr>
            <td>padded</td>
            <td>false</td>
            <td>Should the container for the menu items be padded.
                <br/><code class="inline">true</code>  <code class="inline">true</code>
            </td>
        </tr>
        <tr>
            <td>modular</td>
            <td>false</td>
            <td>Determines if script tags used within the component should have <code class="inline text-red-500">type="module"</code>. Useful sometimes when working with Vite js.
                <br/><code class="inline">true</code>  <code class="inline">true</code>
            </td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>
    <h3>Dropmenu Item Component Attributes</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>icon</td>
            <td><em>blank</em></td>
            <td>Any Heroicon icon to display as prefix to the menu item.</td>
        </tr>
        <tr>
            <td>dir</td>
            <td><em>blank</em></td>
            <td>Directory to load the icon from. See the <a href="/component/icon#custom-dir">Icon</a> component for usage.</td>
        </tr>
        <tr>
            <td>icon_css</td>
            <td><em>blank</em></td>
            <td>Additional css to apply to the icon.</td>
        </tr>
        <tr>
            <td>icon_right</td>
            <td>false</td>
            <td>Align the icon to the right of the menu item. Applies to the menu item the attribute is declared on.<br /> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>divider</td>
            <td>false</td>
            <td>Is this menu item a divider.<br /> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>header</td>
            <td>false</td>
            <td>Is this menu item a header.<br /> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>hover</td>
            <td>true</td>
            <td>Should this menu item change its background colour on mouseover.<br /> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>padded</td>
            <td>false</td>
            <td>Should the menu item be padded.
                <br/><code class="inline">true</code>  <code class="inline">true</code>
            </td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Additional css to add to the menu item.</td>
        </tr>
    </x-bladewind::table>

    <h3>Dropmenu with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::dropmenu
                trigger="pencil-square-icon"
                name="profile-menu"
                trigger_css="!bg-yellow-400"
                trigger_on="mouseover"
                divided="true"
                scrollable="true"
                padded="true"
                height="150"
                hide_after_click="true"
                position="left"
                class="mt-0"&gt;

                &lt;x-bladewind::dropmenu.item
                    icon="pencil-square"
                    icon_css="text-red-400"
                    divider="false"
                    padded="false"
                    header="false"
                    hover="false"
                    class="p-2"&gt;
                ...
                &lt;x-bladewind::dropmenu.item&gt;

            &lt;/x-bladewind::dropmenu&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > dropmenu > index.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > dropmenu > item.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#trigger">Trigger properties</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#menu-items">Dropmenu item actions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#headers">Headers, icons & dividers</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#positions">Menu positions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#scrollable">Scrollable items</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-dropmenu');
        </script>
    </x-slot>
</x-app>
