<x-app>
    <x-slot:title>Scheduler Component</x-slot:title>
    <x-slot:page_title>Scheduler</x-slot:page_title>

    @php
        $roomEvents = [
            ['id' => 1, 'resource_id' => 'room-a', 'label' => 'Team standup', 'start' => '2027-03-10 09:00', 'end' => '2027-03-10 09:30', 'color' => 'primary'],
            ['id' => 2, 'resource_id' => 'room-a', 'label' => 'Design review', 'start' => '2027-03-10 11:00', 'end' => '2027-03-10 12:00', 'color' => 'cyan'],
            ['id' => 3, 'resource_id' => 'room-b', 'label' => 'Client call', 'start' => '2027-03-10 10:00', 'end' => '2027-03-10 11:00', 'color' => 'orange'],
            ['id' => 4, 'resource_id' => 'room-b', 'label' => 'Interview', 'start' => '2027-03-10 10:30', 'end' => '2027-03-10 11:30', 'color' => 'violet'],
            ['id' => 5, 'resource_id' => 'room-c', 'label' => 'Retro', 'start' => '2027-03-10 14:00', 'end' => '2027-03-10 15:00', 'color' => 'green'],
        ];
        $weekEvents = [
            ['id' => 1, 'label' => 'Team standup', 'start' => '2027-03-08 09:00', 'end' => '2027-03-08 09:30', 'color' => 'primary'],
            ['id' => 2, 'label' => 'Design review', 'start' => '2027-03-09 11:00', 'end' => '2027-03-09 12:00', 'color' => 'cyan'],
            ['id' => 3, 'label' => 'Client call', 'start' => '2027-03-10 10:00', 'end' => '2027-03-10 11:00', 'color' => 'orange'],
            ['id' => 4, 'label' => 'Retro', 'start' => '2027-03-12 14:00', 'end' => '2027-03-12 15:00', 'color' => 'green'],
        ];
    @endphp

    <p>
        The scheduler component lays out a day or a week as an hour grid and places timed events on it, the pattern
        behind a room booking board, a staff roster, or an appointment calendar. Give it a <code class="inline">date</code>
        and, for day view, a list of <code class="inline">resources</code> such as rooms or staff members. Each
        resource becomes its own column, and events are placed by their start and end time. Two events that overlap
        share their column side by side instead of stacking on top of each other.
    </p>
    <h3>Scheduler vs. Calendar</h3>
    <p>
        Scheduler is not a bigger <a href="/component/calendar">Calendar</a>, it solves a different problem. Calendar displays dates across full months or weeks, with each day showing its scheduled events. Scheduler focuses on a single day or week using an hour-by-hour timeline, positioning events according to their exact start and end times. In day view, it can also divide the timeline into separate columns for each resource.

        Use Calendar when users need to browse schedules and choose dates. Use Scheduler when time and availability are the primary focus, such as for room bookings, staff rosters, appointments, or other resource-based scheduling.
    </p>

    <h2 id="day">Day View With Resources</h2>
    <x-bladewind::scheduler
        date="2027-03-10"
        :resources="[
            ['id' => 'room-a', 'label' => 'Room A'],
            ['id' => 'room-b', 'label' => 'Room B'],
            ['id' => 'room-c', 'label' => 'Room C'],
        ]"
        :events="$roomEvents"
    ></x-bladewind::scheduler>
    @php
        $schedulerExample1 = <<<'HTML'
            <x-bladewind::scheduler
                date="2027-03-10"
                :resources="[
                    ['id' => 'room-a', 'label' => 'Room A'],
                    ['id' => 'room-b', 'label' => 'Room B'],
                    ['id' => 'room-c', 'label' => 'Room C'],
                ]"
                :events="[
                    ['id' => 1, 'resource_id' => 'room-a', 'label' => 'Team standup', 'start' => '2027-03-10 09:00', 'end' => '2027-03-10 09:30', 'color' => 'primary'],
                    ...
                ]">
            </x-bladewind::scheduler>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$schedulerExample1"></x-bladewind::code-block>

    <h2 id="week">Week View</h2>
    <p>
        Set <code class="inline">view="week"</code> to show the seven days of the week containing <code class="inline">date</code>
        as columns instead. Resources are not used in week view.
    </p>
    <x-bladewind::scheduler view="week" date="2027-03-10" :events="$weekEvents"></x-bladewind::scheduler>
    @php
        $schedulerExample2 = <<<'HTML'
            <x-bladewind::scheduler view="week" date="2027-03-10" :events="$events">
            </x-bladewind::scheduler>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$schedulerExample2"></x-bladewind::code-block>

    <h2 id="hours">Visible Hours And Grid Granularity</h2>
    <p>
        Set <code class="inline">start_hour</code> and <code class="inline">end_hour</code> to the range worth
        showing, and <code class="inline">slot_minutes</code> (60, 30, or 15) for finer gridlines.
    </p>
    <x-bladewind::scheduler
        date="2027-03-10"
        start_hour="12"
        end_hour="16"
        slot_minutes="30"
        :resources="[['id' => 'room-a', 'label' => 'Room A']]"
        :events="[['id' => 1, 'resource_id' => 'room-a', 'label' => 'Retro', 'start' => '2027-03-10 14:00', 'end' => '2027-03-10 15:00', 'color' => 'green']]"
    ></x-bladewind::scheduler>
    @php
        $schedulerExample3 = <<<'HTML'
            <x-bladewind::scheduler
                date="2027-03-10"
                start_hour="12"
                end_hour="16"
                slot_minutes="30"
                :resources="..."
                :events="...">
            </x-bladewind::scheduler>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$schedulerExample3"></x-bladewind::code-block>

    <h2 id="hooks">Selection Hooks</h2>
    <p>
        Set <code class="inline">on_slot_click</code> to the name of a JavaScript function to react to a click on
        an empty slot, called as <code class="inline">(columnId, "H:i")</code>, where <code class="inline">columnId</code>
        is a resource id in day view or a date in week view. Set <code class="inline">on_event_click</code> to react
        to a click on an existing event instead, called as <code class="inline">(eventId)</code>. An event given an
        <code class="inline">href</code> renders as a real link and does not fire <code class="inline">on_event_click</code>.
    </p>
    @php
        $schedulerExample4 = <<<'HTML'
            <x-bladewind::scheduler
                date="2027-03-10"
                on_slot_click="proposeBooking"
                on_event_click="showBookingDetails"
                :resources="..."
                :events="...">
            </x-bladewind::scheduler>

            <script>
                function proposeBooking(columnId, time) {
                    console.log('Book', columnId, 'at', time);
                }
                function showBookingDetails(eventId) {
                    console.log('Show booking', eventId);
                }
            </script>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$schedulerExample4"></x-bladewind::code-block>

    <h2 id="timezone">Timezone Label</h2>
    <p>
        This component does not convert times itself. Pass event times already converted to the viewer's timezone,
        and optionally set <code class="inline">timezone</code> to show a label confirming which one is in use.
    </p>
    <x-bladewind::scheduler
        date="2027-03-10"
        timezone="America/New_York"
        :resources="[['id' => 'room-a', 'label' => 'Room A']]"
        :events="[['id' => 1, 'resource_id' => 'room-a', 'label' => 'Client call', 'start' => '2027-03-10 10:00', 'end' => '2027-03-10 11:00', 'color' => 'orange']]"
    ></x-bladewind::scheduler>
    @php
        $schedulerExample5 = <<<'HTML'
            <x-bladewind::scheduler date="2027-03-10" timezone="America/New_York" ...>
            </x-bladewind::scheduler>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$schedulerExample5"></x-bladewind::code-block>

    <h2 id="attributes">Full List Of Attributes</h2>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>view</td>
            <td>day</td>
            <td><code class="inline">day</code> <code class="inline">week</code></td>
        </tr>
        <tr>
            <td>date</td>
            <td>today</td>
            <td>Anchor date (<code class="inline">Y-m-d</code>). Day view shows just that day; week view shows the week containing it.</td>
        </tr>
        <tr>
            <td>resources</td>
            <td><em>empty</em></td>
            <td>Day view's columns: <code class="inline">[['id' => 'r1', 'label' => 'Room A'], ...]</code>. Ignored in week view.</td>
        </tr>
        <tr>
            <td>events</td>
            <td><em>empty</em></td>
            <td><code class="inline">['id', 'label', 'start' => 'Y-m-d H:i', 'end' => 'Y-m-d H:i', 'color', 'resource_id', 'href']</code>. An event outside the visible hour range is clipped to it, not hidden.</td>
        </tr>
        <tr>
            <td>start_hour</td>
            <td>8</td>
            <td>First visible hour (0-23).</td>
        </tr>
        <tr>
            <td>end_hour</td>
            <td>18</td>
            <td>Last visible hour, exclusive (1-24).</td>
        </tr>
        <tr>
            <td>slot_minutes</td>
            <td>30</td>
            <td>Grid line granularity. <code class="inline">60</code> <code class="inline">30</code> <code class="inline">15</code></td>
        </tr>
        <tr>
            <td>week_starts</td>
            <td>1</td>
            <td>First day of the week used by week view. <code class="inline">0</code> (Sunday) or <code class="inline">1</code> (Monday)</td>
        </tr>
        <tr>
            <td>timezone</td>
            <td><em>blank</em></td>
            <td>A display-only label. Convert event times to the viewer's timezone yourself before passing them in.</td>
        </tr>
        <tr>
            <td>on_slot_click</td>
            <td><em>blank</em></td>
            <td>Name of a JavaScript function called as <code class="inline">(columnId, "H:i")</code> when an empty slot is clicked.</td>
        </tr>
        <tr>
            <td>on_event_click</td>
            <td><em>blank</em></td>
            <td>Name of a JavaScript function called as <code class="inline">(eventId)</code> when an event without an <code class="inline">href</code> is clicked.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <h3>Scheduler with all attributes defined</h3>
    @php
        $schedulerExample6 = <<<'HTML'
            <x-bladewind::scheduler
                view="day"
                date="2027-03-10"
                :resources="[['id' => 'r1', 'label' => 'Room A']]"
                :events="$roomEvents"
                start-hour="8"
                end-hour="18"
                slot-minutes="30"
                week-starts="1"
                timezone="GMT"
                on-slot-click="onSlotClick"
                on-event-click="onEventClick"
                class="ml-2" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$schedulerExample6"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > scheduler.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#day">Day view with resources</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#week">Week view</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#hours">Visible hours and grid granularity</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#hooks">Selection hooks</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#timezone">Timezone label</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-scheduler');
        </script>
    </x-slot:scripts>
</x-app>
