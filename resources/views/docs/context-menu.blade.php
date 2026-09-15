<x-app>
    <x-slot:title>Context Menu Component</x-slot:title>
    <x-slot:page_title>Context Menu</x-slot:page_title>
    @php
        $region = <<<'HTML'
        <div class="rounded-lg border border-dashed border-slate-300 dark:border-dark-600 p-3 text-center text-slate-500 dark:text-dark-400 select-none mb-5">Right-click anywhere in this box</div>
        HTML;
    @endphp
    <p>
        Adds a right-click menu to any region or element. It shares the visual style of <a href="/component/dropmenu">Dropmenu</a>
        but opens at the pointer position and supports nested submenus, disabled items, and separators.
        Menus automatically adjust their placement to stay within the viewport, flipping away from edges when needed.
    </p>

    <x-bladewind::context-menu name="basic-menu">
        <x-slot:region>
            {!! $region !!}
        </x-slot:region>
        <x-bladewind::context-menu.item icon="pencil-square">Edit</x-bladewind::context-menu.item>
        <x-bladewind::context-menu.item icon="document-duplicate">Duplicate</x-bladewind::context-menu.item>
        <x-bladewind::context-menu.item divider="true" />
        <x-bladewind::context-menu.item icon="trash" tone="danger">Delete</x-bladewind::context-menu.item>
    </x-bladewind::context-menu>

    @php
        $contextMenuExample = <<<'HTML'
            <x-bladewind::context-menu name="basic-menu">
                <x-slot:region>
                    <div class="rounded-lg border border-dashed ...">Right-click anywhere in this box</div>
                </x-slot:region>

                <x-bladewind::context-menu.item icon="pencil-square">Edit</x-bladewind::context-menu.item>
                <x-bladewind::context-menu.item icon="document-duplicate">Duplicate</x-bladewind::context-menu.item>
                <x-bladewind::context-menu.item divider="true" />
                <x-bladewind::context-menu.item icon="trash" tone="danger">Delete</x-bladewind::context-menu.item>
            </x-bladewind::context-menu>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$contextMenuExample"></x-bladewind::code-block>
    <br />
    <p>
        The <code class="inline text-red-500">region</code> slot defines the area that opens the menu when right-clicked. The keyboard context-menu key works
        automatically because it triggers the same browser <code class="inline">contextmenu</code> event. All other children are treated as menu
        items and appear in the order they are defined.
    </p>

    <h2 id="disabled">Disabled items</h2>
    <p>
        Set <code class="inline text-red-500">disabled="true"</code> on an item to grey it out and remove it from pointer and
        keyboard interaction entirely: it is skipped by arrow-key navigation and cannot be clicked or activated.
    </p>

    <x-bladewind::context-menu name="disabled-menu">
        <x-slot:region>
            {!! $region !!}
        </x-slot:region>
        <x-bladewind::context-menu.item icon="pencil-square">Edit</x-bladewind::context-menu.item>
        <x-bladewind::context-menu.item icon="document-duplicate">Duplicate</x-bladewind::context-menu.item>
        <x-bladewind::context-menu.item divider="true" />
        <x-bladewind::context-menu.item icon="trash" disabled tone="danger">Delete</x-bladewind::context-menu.item>
    </x-bladewind::context-menu>

    @php
        $contextMenuExample = <<<'HTML'
            <x-bladewind::context-menu name="disabled-menu">
                ...
                <x-bladewind::context-menu.item divider="true" />
                <x-bladewind::context-menu.item disabled icon="trash" tone="danger">Delete</x-bladewind::context-menu.item>
            </x-bladewind::context-menu>
            HTML;
    @endphp

    <x-bladewind::code-block language="markup" line_numbers="true" :code="$contextMenuExample"></x-bladewind::code-block>

    <h2 id="tone">Tone</h2>
    <p>
        <code class="inline text-red-500">tone="danger"</code> tints an item's label and icon red, for destructive actions like
        the Delete item above. The default is <code class="inline">normal</code>.
    </p>

    <h2 id="submenus">Nested submenus</h2>
    <p>
        Give an item a <code class="inline">submenu</code> slot containing further
        <code class="inline">x-bladewind::context-menu.item</code> elements to turn it into a submenu trigger. A
        submenu opens on hover, click, or <code class="inline">→</code>, and can itself contain another submenu,
        nesting is unlimited. <code class="inline">←</code> or <code class="inline">Escape</code> closes the deepest
        open submenu and returns focus to its parent item.
    </p>

    <x-bladewind::context-menu name="submenu-example">
        <x-slot:region>
            {!! $region !!}
        </x-slot:region>

        <x-bladewind::context-menu.item icon="folder-plus">
            New
            <x-slot:submenu>
                <x-bladewind::context-menu.item icon="document">File
                    <x-slot:submenu>
                        <x-bladewind::context-menu.item icon="document">Word</x-bladewind::context-menu.item>
                        <x-bladewind::context-menu.item icon="document">Excel</x-bladewind::context-menu.item>
                    </x-slot:submenu>
                </x-bladewind::context-menu.item>
                <x-bladewind::context-menu.item icon="folder">Folder</x-bladewind::context-menu.item>
            </x-slot:submenu>
        </x-bladewind::context-menu.item>
        <x-bladewind::context-menu.item icon="pencil-square">Rename</x-bladewind::context-menu.item>
    </x-bladewind::context-menu>

    @php
        $contextMenuExample = <<<'HTML'
            <x-bladewind::context-menu name="submenu-example">
                <x-slot:region>
                    ...
                <x-bladewind::context-menu.item icon="folder-plus">
                        New
                        <x-slot:submenu>
                            <x-bladewind::context-menu.item icon="document">File
                                <x-slot:submenu>
                                    <x-bladewind::context-menu.item icon="document">Word</x-bladewind::context-menu.item>
                                    <x-bladewind::context-menu.item icon="document">Excel</x-bladewind::context-menu.item>
                                </x-slot:submenu>
                            </x-bladewind::context-menu.item>
                            <x-bladewind::context-menu.item icon="folder">Folder</x-bladewind::context-menu.item>
                        </x-slot:submenu>
                    </x-bladewind::context-menu.item>
                    <x-bladewind::context-menu.item icon="pencil-square">Rename</x-bladewind::context-menu.item>
                </x-bladewind::context-menu>
            </x-bladewind::context-menu>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$contextMenuExample"></x-bladewind::code-block>

    <h2 id="target">Targeting an element elsewhere on the page</h2>
    <p>
        Wrapping an element in the component’s <code class="inline text-red-500">region</code> slot works well for a
        single card or row, but can be inconvenient for larger areas such as the entire page or elements you do not want to restructure.

        The <code class="inline text-red-500">target</code> attribute provides an alternative. Set it to a CSS selector
        or element ID, and the component will listen for right-clicks on that element instead of using a region slot.
        The component can then be placed anywhere on the page, commonly just before the closing <code class="inline"></body></code>
        tag, without requiring any changes to the target element’s markup.
    </p>

    <div id="target-demo" class="rounded-lg border border-dashed border-slate-300 dark:border-dark-600 p-3 text-center text-slate-500 dark:text-dark-400 select-none mb-5">
        Right-click anywhere in this box (targeted, not wrapped in x-slot:region)
    </div>

    <x-bladewind::context-menu name="target-menu" target="target-demo">
        <x-bladewind::context-menu.item icon="pencil-square">Edit</x-bladewind::context-menu.item>
        <x-bladewind::context-menu.item icon="document-duplicate">Duplicate</x-bladewind::context-menu.item>
        <x-bladewind::context-menu.item divider="true" />
        <x-bladewind::context-menu.item icon="trash" tone="danger">Delete</x-bladewind::context-menu.item>
    </x-bladewind::context-menu>

    @php
        $contextMenuExample = <<<'HTML'
            <body>
                <div class="..."
                    id="drive-container">
                    Right-click anywhere in this box (targeted, not wrapped in x-slot:region)
                </div>

                <x-bladewind::context-menu name="targetted"
                    target="drive-container">
                    <x-bladewind::context-menu.item icon="pencil-square">Edit</x-bladewind::context-menu.item>
                    <x-bladewind::context-menu.item icon="document-duplicate">Duplicate</x-bladewind::context-menu.item>
                    <x-bladewind::context-menu.item divider="true" />
                    <x-bladewind::context-menu.item icon="trash" tone="danger">Delete</x-bladewind::context-menu.item>
                </x-bladewind::context-menu>
            </body>
            HTML;
    @endphp

    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="3,8" :code="$contextMenuExample"></x-bladewind::code-block>
    <br />
    <p>
        <code class="inline text-red-500">target</code> accepts either a bare <code class="inline">id</code> or
        <code class="inline">class name</code>, like <code class="inline">drive-container</code> from the example above.
        You can also specify a  CSS ID like <code class="inline">#drive-container</code>, or a full CSS selector such as
        <code class="inline">.drive-row</code> or <code class="inline">[data-file-id="42"]</code> if you need
        something more specific. When <code class="inline text-red-500">target</code> is set, the
        <code class="inline text-red-500">region</code> slot is ignored entirely, since the targeted element takes over that role.
    </p>

    <h2 id="file-list">File list example</h2>
    <p>
        A common use case is a file browser like Dropbox or Google Drive, where right-clicking any row in a list
        opens a menu for that specific row. The rows themselves are a natural fit for
        <a href="/component/list">Listview</a>, and pairing it with <code class="inline text-red-500">target</code>
        keeps the list's own markup untouched: give each row an <code class="inline">id</code>, then define one
        <code class="inline">x-bladewind::context-menu</code> per row after the list, each one targeting its row's
        id. That also avoids nesting the context menu's own wrapper element inside the
        <code class="inline">&lt;ul&gt;</code>/<code class="inline">&lt;li&gt;</code> structure Listview relies on,
        which would otherwise break the rounded corners on the first and last row.
    </p>

    <x-bladewind::card no-padding="true">
        <x-bladewind::listview>
            @foreach ($fileListDemoRows ?? [
                ['id' => 1, 'icon' => 'document-text', 'name' => 'Q3-budget.xlsx'],
                ['id' => 2, 'icon' => 'photo', 'name' => 'team-offsite.jpg'],
                ['id' => 3, 'icon' => 'folder', 'name' => 'Client contracts'],
            ] as $row)
                <x-bladewind::listview.item id="file-row-{{ $row['id'] }}" class="cursor-default select-none hover:bg-gray-50">
                    <x-bladewind::icon name="{{ $row['icon'] }}" class="size-5! text-slate-400 dark:text-dark-500 shrink-0"/>
                    <div class="text-sm text-slate-700 dark:text-dark-200 self-center">{{ $row['name'] }}</div>
                </x-bladewind::listview.item>
            @endforeach
        </x-bladewind::listview>
    </x-bladewind::card>

    @foreach ($fileListDemoRows ?? [
        ['id' => 1, 'icon' => 'document-text', 'name' => 'Q3-budget.xlsx'],
        ['id' => 2, 'icon' => 'photo', 'name' => 'team-offsite.jpg'],
        ['id' => 3, 'icon' => 'folder', 'name' => 'Client contracts'],
    ] as $row)
        <x-bladewind::context-menu :name="'fileRowMenu' . $row['id']" :target="'file-row-' . $row['id']">
            <x-bladewind::context-menu.item icon="arrow-down-tray">Download</x-bladewind::context-menu.item>
            <x-bladewind::context-menu.item icon="pencil-square">Rename</x-bladewind::context-menu.item>
            <x-bladewind::context-menu.item icon="document-duplicate">Make a copy</x-bladewind::context-menu.item>
            <x-bladewind::context-menu.item divider="true" />
            <x-bladewind::context-menu.item icon="trash" tone="danger">Delete</x-bladewind::context-menu.item>
        </x-bladewind::context-menu>
    @endforeach

    @php
        $contextUmenuExample6 = <<<'HTML'
            <x-bladewind::card no-padding="true">
                <x-bladewind::listview compact="true">
                    @foreach ($files as $file)
                        <x-bladewind::listview.item id="file-row-{{ $file->id }}">
                            <x-bladewind::icon name="{{ $file->icon }}" class="size-5"/>
                            <div>{{ $file->name }}</div>
                        </x-bladewind::listview.item>
                    @endforeach
                </x-bladewind::listview>
            </x-bladewind::card>

            @foreach ($files as $file)
                <x-bladewind::context-menu :name="'fileRowMenu' . $file->id" :target="'file-row-' . $file->id">
                    <x-bladewind::context-menu.item icon="arrow-down-tray" wire:click="download({{ $file->id }})">Download</x-bladewind::context-menu.item>
                    <x-bladewind::context-menu.item icon="pencil-square" wire:click="rename({{ $file->id }})">Rename</x-bladewind::context-menu.item>
                    <x-bladewind::context-menu.item icon="document-duplicate" wire:click="duplicate({{ $file->id }})">Make a copy</x-bladewind::context-menu.item>
                    <x-bladewind::context-menu.item divider="true" />
                    <x-bladewind::context-menu.item icon="trash" tone="danger" wire:click="delete({{ $file->id }})">Delete</x-bladewind::context-menu.item>
                </x-bladewind::context-menu>
            @endforeach
            HTML;
    @endphp
    <br />
    <br />
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$contextUmenuExample6"></x-bladewind::code-block>
    <br />
    <p>
        Because <code class="inline">$file->id</code> is baked into the row's <code class="inline">id</code>, the
        menu's <code class="inline">target</code>, and the <code class="inline">wire:click</code> calls on its
        items, each row's menu acts only on that row's file, even though every row and every menu shares the same
        markup. If you are not using Livewire, pass the row's identifier the same way you would for any other
        per-row action, for example through a plain <code class="inline">onclick</code> handler or a form inside the
        item.
    </p>

    <h2 id="keyboard">Keyboard support</h2>
    <x-bladewind::table hover_effect="false" divider="thin">
        <tr>
            <td><code class="inline">↓</code> / <code class="inline">↑</code></td>
            <td>Move focus to the next or previous enabled item.</td>
        </tr>
        <tr>
            <td><code class="inline">→</code></td>
            <td>Open the focused item's submenu, if it has one.</td>
        </tr>
        <tr>
            <td><code class="inline">←</code></td>
            <td>Close the current submenu and refocus its parent item.</td>
        </tr>
        <tr>
            <td><code class="inline">Enter</code> / <code class="inline">Space</code></td>
            <td>Activate the focused item, or open its submenu.</td>
        </tr>
        <tr>
            <td><code class="inline">Home</code> / <code class="inline">End</code></td>
            <td>Jump to the first or last enabled item.</td>
        </tr>
        <tr>
            <td><code class="inline">Escape</code></td>
            <td>Close the current submenu, or the whole menu if none is open.</td>
        </tr>
    </x-bladewind::table>

    <h2 id="attributes">Full List Of Attributes</h2>
    <h3>Context Menu</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td><em>auto-generated</em></td>
            <td>Uniquely identifies this instance in the DOM and its JavaScript.</td>
        </tr>
        <tr>
            <td>disableNative</td>
            <td>true</td>
            <td>false lets the browser's own context menu show and disables this component entirely, useful for turning the feature off conditionally.</td>
        </tr>
        <tr>
            <td>target</td>
            <td><em>(none)</em></td>
            <td>A CSS selector or bare element id for an element elsewhere on the page to open this menu on right-click, instead of the region slot.</td>
        </tr>
        <tr>
            <td>padded</td>
            <td>true</td>
            <td>Padding inside the menu list.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>(blank)</em></td>
            <td>Additional CSS classes for the menu list.</td>
        </tr>
    </x-bladewind::table>
<br />
    <h3>Context Menu Item</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>icon</td>
            <td><em>(blank)</em></td>
            <td>Any <a href="https://heroicons.com/" target="_blank">Heroicons</a> name.</td>
        </tr>
        <tr>
            <td>disabled</td>
            <td>false</td>
            <td>Greys the item out and removes it from pointer and keyboard interaction.</td>
        </tr>
        <tr>
            <td>tone</td>
            <td>normal</td>
            <td><code class="inline">normal</code> | <code class="inline">danger</code></td>
        </tr>
        <tr>
            <td>divider</td>
            <td>false</td>
            <td>Renders a separator line instead of an item; ignores every other prop.</td>
        </tr>
        <tr>
            <td>submenu</td>
            <td><em>(none)</em></td>
            <td>A named slot of further items, turning this item into a submenu trigger.</td>
        </tr>
    </x-bladewind::table>

    <h3>Context Menu with all attributes defined</h3>
    @php
        $contextUmenuExample4 = <<<'HTML'
            <x-bladewind::context-menu
                name="basicMenu"
                disable-native="true"
                padded="true"
                class="ml-2">
            HTML;
    @endphp

    <x-bladewind::code-block language="markup" line_numbers="true" :code="$contextUmenuExample4"></x-bladewind::code-block>

    <h3>Context Menu Item with all attributes defined</h3>
    @php
        $contextUmenuExample5 = <<<'HTML'
            <x-bladewind::context-menu.item
                icon="folder-plus"
                disabled="false"
                tone="danger"
                divider="false">
                New
                <x-slot:submenu>
                    <x-bladewind::context-menu.item icon="document">File</x-bladewind::context-menu.item>
                </x-slot:submenu>
            </x-bladewind::context-menu.item>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$contextUmenuExample5"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > context-menu > index.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > context-menu > item.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#disabled">Disabled items</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#tone">Tone</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#submenus">Nested submenus</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#target">Targeting specific elements</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#file-list">File list example</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#keyboard">Keyboard support</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-context-menu');
        </script>
    </x-slot>
</x-app>
