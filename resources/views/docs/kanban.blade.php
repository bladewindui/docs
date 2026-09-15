<x-app>
    <x-slot:title>Kanban Component</x-slot:title>
    <x-slot:page_title>Kanban</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::kanban</code>, <code class="inline">x-bladewind::kanban.column</code> and
        <code class="inline">x-bladewind::kanban.card</code> build a board of columns holding draggable cards, the
        pattern behind any task tracker. A card can be dragged with the mouse or a touch screen between columns and
        within a column, or moved the same way with the keyboard: focus a card and use the arrow keys, up and down
        to reorder within a column, left and right to move it into the column beside it.
    </p>

    <x-bladewind::kanban>
        <x-bladewind::kanban.column title="To do" id="todo">
            <x-bladewind::kanban.card value="1">Design the onboarding flow</x-bladewind::kanban.card>
            <x-bladewind::kanban.card value="2">Write the API documentation</x-bladewind::kanban.card>
        </x-bladewind::kanban.column>
        <x-bladewind::kanban.column title="In progress" id="in-progress">
            <x-bladewind::kanban.card value="3">Build the payments webhook</x-bladewind::kanban.card>
        </x-bladewind::kanban.column>
        <x-bladewind::kanban.column title="Done" id="done">
            <x-bladewind::kanban.card value="4">Set up the staging environment</x-bladewind::kanban.card>
        </x-bladewind::kanban.column>
    </x-bladewind::kanban>
    @php
        $kanbanExample1 = <<<'HTML'
            <x-bladewind::kanban>
                <x-bladewind::kanban.column title="To do" id="todo">
                    <x-bladewind::kanban.card value="1">Design the onboarding flow</x-bladewind::kanban.card>
                    <x-bladewind::kanban.card value="2">Write the API documentation</x-bladewind::kanban.card>
                </x-bladewind::kanban.column>
                <x-bladewind::kanban.column title="In progress" id="in-progress">
                    <x-bladewind::kanban.card value="3">Build the payments webhook</x-bladewind::kanban.card>
                </x-bladewind::kanban.column>
                <x-bladewind::kanban.column title="Done" id="done">
                    <x-bladewind::kanban.card value="4">Set up the staging environment</x-bladewind::kanban.card>
                </x-bladewind::kanban.column>
            </x-bladewind::kanban>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$kanbanExample1"></x-bladewind::code-block>

    <h2 id="move">Reacting To A Move</h2>
    <p>
        Set <code class="inline">on_move</code> on the board to the name of a JavaScript function. It is called
        after every move, whether by drag or by keyboard, as
        <code class="inline">(cardId, fromColumnId, toColumnId, newIndex)</code>. Use it to save the new position
        with a request to your backend.
    </p>
    @php
        $kanbanExample2 = <<<'HTML'
            <x-bladewind::kanban on_move="saveCardPosition">
                ...
            </x-bladewind::kanban>

            <script>
                function saveCardPosition(cardId, fromColumnId, toColumnId, newIndex) {
                    fetch('/tasks/' + cardId + '/move', {
                        method: 'POST',
                        body: JSON.stringify({ column: toColumnId, position: newIndex }),
                    });
                }
            </script>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$kanbanExample2"></x-bladewind::code-block>

    <h2 id="empty">Empty State</h2>
    <p>A column with no cards shows a short message instead of a blank space. Customise it with <code class="inline">empty_text</code>.</p>
    <x-bladewind::kanban>
        <x-bladewind::kanban.column title="Backlog" id="backlog" empty_text="Nothing queued up yet"></x-bladewind::kanban.column>
    </x-bladewind::kanban>
    @php
        $kanbanExample3 = <<<'HTML'
            <x-bladewind::kanban.column title="Backlog" id="backlog" empty_text="Nothing queued up yet">
            </x-bladewind::kanban.column>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$kanbanExample3"></x-bladewind::code-block>

    <h2 id="loading">Loading State</h2>
    <p>
        Set <code class="inline">loading="true"</code> on a column while its cards are still being fetched. It
        shows a spinner in place of the card list.
    </p>
    <x-bladewind::kanban>
        <x-bladewind::kanban.column title="Review" id="review" loading="true"></x-bladewind::kanban.column>
    </x-bladewind::kanban>
    @php
        $kanbanExample4 = <<<'HTML'
            <x-bladewind::kanban.column title="Review" id="review" loading="true">
            </x-bladewind::kanban.column>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$kanbanExample4"></x-bladewind::code-block>

    <h2 id="actions">Column Actions</h2>
    <p>Give a column an <code class="inline">actions</code> slot for a control shown beside its title, such as an add-card button.</p>
    <x-bladewind::kanban>
        <x-bladewind::kanban.column title="To do" id="todo-actions">
            <x-slot:actions>
                <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-dark-200">
                    <x-bladewind::icon name="plus" class="size-4"/>
                </button>
            </x-slot:actions>
            <x-bladewind::kanban.card value="1">Design the onboarding flow</x-bladewind::kanban.card>
        </x-bladewind::kanban.column>
    </x-bladewind::kanban>
    @php
        $kanbanExample5 = <<<'HTML'
            <x-bladewind::kanban.column title="To do" id="todo">
                <x-slot:actions>
                    <button type="button">
                        <x-bladewind::icon name="plus" />
                    </button>
                </x-slot:actions>
                <x-bladewind::kanban.card value="1">Design the onboarding flow</x-bladewind::kanban.card>
            </x-bladewind::kanban.column>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$kanbanExample5"></x-bladewind::code-block>

    <h2 id="attributes">Full List Of Attributes</h2>
    <h3>Kanban</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>animation</td>
            <td>150</td>
            <td>Animation speed in milliseconds when a card is dropped. 0 disables it.</td>
        </tr>
        <tr>
            <td>on_move</td>
            <td><em>blank</em></td>
            <td>Name of a JavaScript function called after every move as <code class="inline">(cardId, fromColumnId, toColumnId, newIndex)</code>.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Additional CSS classes for the board's wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <h3>Kanban with all attributes defined</h3>
    @php
        $kanbanExample6 = <<<'HTML'
            <x-bladewind::kanban
                animation="150"
                on-move="onCardMove"
                class="ml-2">
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$kanbanExample6"></x-bladewind::code-block>

    <h3>Kanban Column</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>title</td>
            <td><em>blank</em></td>
            <td>The column's heading.</td>
        </tr>
        <tr>
            <td>id</td>
            <td>a slug of the title</td>
            <td>Identifier reported to the move hook. Set it explicitly when the title alone is not a stable, unique key.</td>
        </tr>
        <tr>
            <td>loading</td>
            <td>false</td>
            <td>Hides the card list and shows a spinner instead. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>empty_text</td>
            <td>No cards</td>
            <td>Shown in place of the list when it has no cards and is not loading.</td>
        </tr>
        <tr>
            <td>actions</td>
            <td><em>none</em></td>
            <td>A named slot rendered beside the title.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Additional CSS classes for the column.</td>
        </tr>
    </x-bladewind::table>

    <h3>Kanban Column with all attributes defined</h3>
    @php
        $kanbanExample7 = <<<'HTML'
            <x-bladewind::kanban.column
                title="In Progress"
                id="in-progress"
                loading="false"
                empty-text="No cards"
                class="ml-2">
                <x-slot:actions>...</x-slot:actions>
            </x-bladewind::kanban.column>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$kanbanExample7"></x-bladewind::code-block>

    <h3>Kanban Card</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>value</td>
            <td><em>blank</em></td>
            <td>Identifier reported to the move hook, for example a model id.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Additional CSS classes for the card.</td>
        </tr>
    </x-bladewind::table>

    <h3>Kanban Card with all attributes defined</h3>
    @php
        $kanbanExample8 = <<<'HTML'
            <x-bladewind::kanban.card value="42" class="ml-2">Fix login bug</x-bladewind::kanban.card>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$kanbanExample8"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > kanban > index.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > kanban > column.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > kanban > card.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#move">Reacting to a move</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#empty">Empty state</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#loading">Loading state</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#actions">Column actions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-kanban');
        </script>
    </x-slot:scripts>
</x-app>
