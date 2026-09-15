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

    @php
        $dropmenuExample1 = <<<'HTML'
            <x-bladewind.table hover_effect="false" divider="thin">
            ...
            <x-bladewind::dropmenu>
                <x-bladewind::dropmenu.item>Invite to Project </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item>Assign Task</x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item>Send Message</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
            ...
            </x-bladewind.table>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3-7" :code="$dropmenuExample1"></x-bladewind::code-block>

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
    @php
        $dropmenuExample2 = <<<'HTML'
            <div class="grid grid-cols-3 gap-6">
                <div class="text-center">
                    <x-bladewind::dropmenu trigger="musical-note-icon">
                        <x-bladewind::dropmenu.item>
                            Add to playlist
                        </x-bladewind::dropmenu.item>
                        <x-bladewind::dropmenu.item>
                            Play again
                        </x-bladewind::dropmenu.item>
                    </x-bladewind::dropmenu>
                </div>
                <div class="text-center">
                    <x-bladewind::dropmenu trigger="arrow-down-circle-icon">
                        <x-bladewind::dropmenu.item>
                            Download file
                        </x-bladewind::dropmenu.item>
                        <x-bladewind::dropmenu.item>
                            Add to library
                        </x-bladewind::dropmenu.item>
                    </x-bladewind::dropmenu>
                </div>
                <div class="text-center">
                    <x-bladewind::dropmenu trigger="cog-6-tooth-icon">
                        <x-bladewind::dropmenu.item>
                            Company settings
                        </x-bladewind::dropmenu.item>
                        <x-bladewind::dropmenu.item>
                            User settings
                        </x-bladewind::dropmenu.item>
                    </x-bladewind::dropmenu>
                </div>
            </div>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3,13,24" :code="$dropmenuExample2"></x-bladewind::code-block>
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
    @php
        $dropmenuExample3 = <<<'HTML'
            <div class="text-center">
                <x-bladewind::dropmenu trigger="musical-note-icon"
                     trigger_css="bg-pink-600 text-white p-2 rounded-full !h-10 !w-10">
                    <x-bladewind::dropmenu.item>
                        Add to playlist
                    </x-bladewind::dropmenu.item>
                    <x-bladewind::dropmenu.item>
                        Play again
                    </x-bladewind::dropmenu.item>
                </x-bladewind::dropmenu>
            </div>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3" :code="$dropmenuExample3"></x-bladewind::code-block>
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
    @php
        $dropmenuExample4 = <<<'HTML'
            <div class="text-center">
                <x-bladewind::dropmenu trigger="musical-note-icon"
                    trigger_css="bg-green-600 text-white p-2 rounded-full !h-10 !w-10"
                    trigger_on="mouseover">
                    <x-bladewind::dropmenu.item>
                        Add to playlist
                    </x-bladewind::dropmenu.item>
                    <x-bladewind::dropmenu.item>
                        Play again
                    </x-bladewind::dropmenu.item>
                </x-bladewind::dropmenu>
            </div>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="4" :code="$dropmenuExample4"></x-bladewind::code-block>
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
    @php
        $dropmenuExample5 = <<<'HTML'
             <div class="grid grid-cols-2 gap-6">
                <div class="text-center">
                    <x-bladewind::dropmenu>
                        <x-slot:trigger>
                            <x-bladewind.button type="secondary" size="tiny">
                                Options
                            </x-bladewind.button>
                        </x-slot:trigger>
                        <x-bladewind::dropmenu.item>
                            Add to playlist
                        </x-bladewind::dropmenu.item>
                        <x-bladewind::dropmenu.item>
                            Play again
                        </x-bladewind::dropmenu.item>
                    </x-bladewind::dropmenu>
                </div>
                <div class="text-center">
                    <x-bladewind::dropmenu>
                        <x-slot:trigger>
                            <div class="flex space-x-2 items-center shadow px-4 rounded-md">
                                <div class="grow">
                                    <x-bladewind.avatar image="/assets/...png" />
                                </div>
                                <div class="grow">
                                    <div><strong>John C. Doe</strong></div>
                                    <div class="text-sm">Tech, IT Support</div>
                                </div>
                                <div>
                                    <x-bladewind.icon name="chevron-down"
                                        class="!h-4 !w-4" />
                                </div>
                            </div>
                        </x-slot:trigger>
                        <x-bladewind::dropmenu.item>
                            Deactivate my account
                        </x-bladewind::dropmenu.item>
                        <x-bladewind::dropmenu.item>
                            Delete Profile
                        </x-bladewind::dropmenu.item>
                    </x-bladewind::dropmenu>
                </div>
            </div>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="4,8,20,34" :code="$dropmenuExample5"></x-bladewind::code-block>
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
    @php
        $dropmenuExample6 = <<<'HTML'
            <x-bladewind::dropmenu trigger="light-bulb-icon"
                trigger_css="bg-yellow-400 ...">
                <x-bladewind::dropmenu.item>
                    <a href="/library" target="_blank">Go to Library</a>
                </x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item onclick="showModal('dropmenu-demo')">
                    Show a Modal
                </x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="4,7" :code="$dropmenuExample6"></x-bladewind::code-block>

    <h2 id="headers">Headers, Icons and Dividers</h2>
    <h3>Headers</h3>
    <p>
        It is possible to define a header for your Dropmenu component. There can be several headers in a Dropmenu. The header is still
        a <code class="inline">x-bladewind::dropmenu.item</code> component so can contain any HTML. The only difference between this and other items is there is no hover effect,
        the cursor displayed is the default pointer and there is a divider separating the header from the next menu item.
        To define a Dropmenu item as a header, set <code class="inline text-red-500">header="true</code>.
    </p>
    @php
        $dropmenuExample7 = <<<'HTML'
            ...
            <x-bladewind::dropmenu.item header="true">
                // define heading here
            </x-bladewind::dropmenu.item>
            ...
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$dropmenuExample7"></x-bladewind::code-block>

    <h3>Icons</h3>
    <p>
        Even though it is possible to define your own icon as part of the Dropmenu item's content, there is a shortcut that allows you to define any of the icons available on <a href="https://heroicons.com" target="_blank">Heroicons</a>.
        This makes use of the BladewindUI <a href="/component/icon">Icon component</a>. This is useful only if you have menu items that fit on one line and you want to prefix each line with an icon.
        To define a Dropmenu item with an icon , set the <code class="inline text-red-500">icon</code> attribute with any icon name from Heroicons. Unlike the icon used in the <code class="inline text-red-500">trigger</code> attribute of the Dropmenu component, items do not require the <strong>-icon</strong> at the end of the icon name.
    </p>
    @php
        $dropmenuExample8 = <<<'HTML'
            ...
            <x-bladewind::dropmenu.item icon="square-pencil">
                Edit Profile
            </x-bladewind::dropmenu.item>
            ...
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$dropmenuExample8"></x-bladewind::code-block>

    <p>
        By default, icons are positioned on the left of the menu item content. To switch the icon position to the right of the menu item content, set <code class="inline text-red-500">icon_right="true"</code>.
        Setting the attribute on the <code class="inline">x-bladewind::dropmenu</code> component will shift all menu items in the menu to the right.
        Alternatively, you can set the attribute on one or more menu items within the Dropmenu component.
    </p>
    @php
        $dropmenuExample9 = <<<'HTML'
            ...
            <x-bladewind::dropmenu icon_right="true">
                <x-bladewind::dropmenu.item>
                ...
                </x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
            ...
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$dropmenuExample9"></x-bladewind::code-block>

    <h3>Dividers</h3>
    <p>
        You may want to logically divider your Dropmenu into sections. You can either do that with headers or dividers.
        A divider is simply a non-clickable line separating menu items. To define a Dropmenu item as a divider , set <code class="inline text-red-500">divider="true"</code>.
         Any text added to the menu item will be ignored.
    </p>
    @php
        $dropmenuExample10 = <<<'HTML'
            ...
            <x-bladewind::dropmenu.item divider="true" />
            ...
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$dropmenuExample10"></x-bladewind::code-block>
    <p>
        By default Dropmenu Items are not divided. You can tell each menu item apart on mouseover. If you prefer to have your menu items separated by a thin gray line you can set
        <code class="inline text-red-500">divided="true"</code> on the Dropmenu component itself (not on the menu items).
    </p>
    @php
        $dropmenuExample11 = <<<'HTML'
            ...
            <x-bladewind::dropmenu divided="true">
                ...
            </x-bladewind::dropmenu>
            ...
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$dropmenuExample11"></x-bladewind::code-block>
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
    @php
        $dropmenuExample12 = <<<'HTML'
            <x-bladewind::dropmenu>

                <x-slot:trigger>
                    <div class="flex space-x-2 items-center rounded-md">
                        <div class="grow">
                            <x-bladewind.avatar image="/assets/...jpg" />
                        </div>
                        <div>
                            <x-bladewind.icon name="chevron-down" class="!h-4 !w-4" />
                        </div>
                    </div>
                </x-slot:trigger>

                <x-bladewind::dropmenu.item header="true">
                    <div class="grow">
                        <div><strong>Jane A. Doe</strong></div>
                        <div class="text-sm">BWATSIGNPLACEHOLDERjane-the-coder</div>
                        <div class="text-sm">janeBWATSIGNPLACEHOLDERbladewindui.com</div>
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
                    <x-bladewind.button color="purple" radius="small" size="small" class="w-full">
                        Sign Out
                    </x-bladewind.button>
                </x-bladewind::dropmenu.item>

            </x-bladewind::dropmenu>
            HTML;
        $dropmenuExample12 = str_replace('BWATSIGNPLACEHOLDER', '@', $dropmenuExample12);
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="14,30,46" :code="$dropmenuExample12"></x-bladewind::code-block>

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
            @php
        $dropmenuExample13 = <<<'HTML'
            <x-bladewind::dropmenu
                position="left">
            ...
            </x-bladewind::dropmenu>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="14,30,46" :code="$dropmenuExample13"></x-bladewind::code-block>
        </div>
        <div>
            <br />
            @php
        $dropmenuExample14 = <<<'HTML'
            <x-bladewind::dropmenu
                position="right">
            ...
            </x-bladewind::dropmenu>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="14,30,46" :code="$dropmenuExample14"></x-bladewind::code-block>
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
    @php
        $dropmenuExample15 = <<<'HTML'
            <x-bladewind::dropmenu scrollable="true">
            ...
            </x-bladewind::dropmenu>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="14,30,46" :code="$dropmenuExample15"></x-bladewind::code-block>

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
        <tr>
            <td>trigger_label</td>
            <td><em>blank</em></td>
            <td>Accessible name for the trigger, exposed as <code class="inline">aria-label</code>. Worth setting whenever the trigger is only an icon, which otherwise reaches a screen reader as an unnamed control.</td>
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

    <h2 id="javascript-api">JavaScript API</h2>
    <p>
        Each dropmenu creates a <code class="inline">BladewindDropmenu</code> instance assigned to a variable named after the
        component's <code class="inline text-red-500">name</code>, so it can be called directly from your own scripts or inline
        handlers. If you set <code class="inline text-red-500">name</code> yourself, use only letters, numbers, and underscores,
        since hyphens are not valid in a JavaScript identifier. The auto-generated default already does this for you.
    </p>
    <x-bladewind::table>
        <x-slot:header><th>Method</th><th>Description</th></x-slot:header>
        <tr><td><code class="inline">name.show()</code></td><td>Open the menu and position it against its trigger.</td></tr>
        <tr><td><code class="inline">name.hide()</code></td><td>Close the menu.</td></tr>
        <tr><td><code class="inline">name.toggle()</code></td><td>Open or close the menu based on its current state.</td></tr>
    </x-bladewind::table>
    @php
        $dropmenuExample16 = <<<'HTML'
            profile_menu.show();
            profile_menu.hide();
            profile_menu.toggle();
            HTML;
    @endphp
    <x-bladewind::code-block language="javascript" :code="$dropmenuExample16"></x-bladewind::code-block>

    <h3>Dropmenu with all attributes defined</h3>
    @php
        $dropmenuExample17 = <<<'HTML'
            <x-bladewind::dropmenu
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
                class="mt-0">

                <x-bladewind::dropmenu.item
                    icon="pencil-square"
                    icon_css="text-red-400"
                    divider="false"
                    padded="false"
                    header="false"
                    hover="false"
                    class="p-2">
                ...
                <x-bladewind::dropmenu.item>

            </x-bladewind::dropmenu>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$dropmenuExample17"></x-bladewind::code-block>

    <h2 id="livewire">Using Dropmenu Inside Livewire</h2>
    <p>
        The menu keeps track of whether it is open or closed outside of the DOM that Livewire manages, so if a Livewire component
        re-renders this markup for a reason that has nothing to do with the menu, the menu resets to closed. If you find that happening,
        wrap the trigger and the menu in <code class="inline">wire:ignore</code> so Livewire leaves that part of the page alone.
        The component also guards against a Livewire re-render creating a second copy of itself, so re-rendering it will not leave
        behind duplicate click listeners on the page.
    </p>

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
        <div class="flex items-center"><div class="dot"></div><a href="#javascript-api">JavaScript API</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#livewire">Using Dropmenu inside Livewire</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-dropmenu');
        </script>
    </x-slot>
</x-app>
