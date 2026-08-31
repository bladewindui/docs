<x-app>
    <x-slot:title>Calendar Component</x-slot:title>
    <x-slot:page_title>Calendar</x-slot:page_title>

    <p>
        Calendar shows events in a month, a week of dates and a day. This is different from the
        <a href="/component/datepicker">Datepicker</a>, which is a small popup that appears next to a text field so
        someone can type or pick a single date for a form. Use Calendar when you
        want to show a schedule, a set of events, or a range of days that someone can look at and pick from directly.
    </p>
    <p>The component requires a <code class="inline text-red-500">name</code>,
        which is used internally to keep track of the calendar and, later on, to call JavaScript helper functions on it.
        It needs a <code class="inline text-red-500">label</code>, which screen readers announce so a visually
        impaired visitor knows what the grid in front of them is for. Everything else, including the list of events, is optional.</p>


    @php
        $teamEvents = [
            ['date' => now()->startOfMonth()->addDays(4)->toDateString(), 'label' => 'Sprint planning', 'type' => 'info'],
            ['date' => now()->startOfMonth()->addDays(11)->toDateString(), 'end' => now()->startOfMonth()->addDays(13)->toDateString(), 'label' => 'Team offsite', 'type' => 'success'],
            ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Design review', 'type' => 'warning'],
            ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Deploy freeze', 'type' => 'danger'],
            ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Client call', 'type' => 'info'],
            ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Retro', 'type' => 'info'],
            // these last three sit on today itself, so switching this same
            // calendar to week view or day view shows real timed events
            // right away, with no need to navigate to a different date first
            ['date' => now()->format('Y-m-d').' 09:00', 'end' => now()->format('Y-m-d').' 10:00', 'label' => 'Standup', 'type' => 'info'],
            ['date' => now()->format('Y-m-d').' 09:30', 'end' => now()->format('Y-m-d').' 10:30', 'label' => 'Design sync', 'type' => 'success'],
            ['date' => now()->format('Y-m-d').' 14:00', 'end' => now()->format('Y-m-d').' 15:30', 'label' => 'Kenya project review', 'type' => 'warning'],
        ];
    @endphp

    <x-bladewind::calendar name="team-calendar" label="Team calendar" :events="$teamEvents" />
    <br />

    <pre class="language-php line-numbers">
        <code>
            // this data powers the calendar above
            $teamEvents = [
                ['date' => now()->startOfMonth()->addDays(4)->toDateString(), 'label' => 'Sprint planning', 'type' => 'info'],
                ['date' => now()->startOfMonth()->addDays(11)->toDateString(), 'end' => now()->startOfMonth()->addDays(13)->toDateString(), 'label' => 'Team offsite', 'type' => 'success'],
                ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Design review', 'type' => 'warning'],
                ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Deploy freeze', 'type' => 'danger'],
                ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Client call', 'type' => 'info'],
                ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Retro', 'type' => 'info'],
                ['date' => now()->format('Y-m-d').' 09:00', 'end' => now()->format('Y-m-d').' 10:00', 'label' => 'Standup', 'type' => 'info'],
                ['date' => now()->format('Y-m-d').' 09:30', 'end' => now()->format('Y-m-d').' 10:30', 'label' => 'Design sync', 'type' => 'success'],
                ['date' => now()->format('Y-m-d').' 14:00', 'end' => now()->format('Y-m-d').' 15:30', 'label' => 'Kenya project review', 'type' => 'warning'],
            ];
        </code>
    </pre>

    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::calendar name="team-cal" label="Team calendar" :events="$teamEvents" /&gt;</code></pre>

    <h2 id="views">Views</h2>
    <p>The <code class="inline text-red-500">view</code> attribute controls how much of the calendar Calendar shows at once.
        It accepts <code class="inline">month</code>, <code class="inline">week</code>, or <code class="inline">day</code>.
        If you do not set it, Calendar shows month view first, and the three buttons in the header let a visitor switch between views.
        The <code class="inline text-red-500">date</code> attribute tells Calendar which day to center the view on. It should be written as <code class="inline">Y-m-d</code>, for example <code class="inline">2026-08-14</code>, and it defaults to today's date if you leave it out. In month view, Calendar shows the whole month that <code class="inline">date</code> falls in. In week view, Calendar shows the seven days of the week that <code class="inline">date</code> falls in. In day view, Calendar shows only <code class="inline">date</code> itself.</p>
    <p>Week view and day view are not simply shorter versions of month view. They are a full hour by hour schedule, similar to the week and day views you would see in Outlook or Google Calendar, and they share the exact same grid, except, day view is just narrowed down to one column instead of seven.
        There is more about how that works a little <a href="#week-view">further down</a> this page.</p>
    <p>Today's date is always announced to screen readers, but Calendar leaves it visually plain by default. Set <code class="inline text-red-500">highlight-today="true"</code>  to tint today's date in month view and today's whole column in week and day view, so it stands out at a glance.</p>
    <x-bladewind::calendar name="highlight-today-demo" label="Highlighted calendar" view="week" highlight-today="true" :events="$teamEvents" />
    <br />

    <h2 id="selection">Selection</h2>
    <p>
        The <code class="inline text-red-500">selectable</code> attribute controls whether dates can be selected. It supports three values:
    </p>
        <ul>
            <li>* none — The default. Dates cannot be selected.</li>
            <li>* single — Selects one date at a time. Choosing another date replaces the current selection.</li>
            <li>* multiple — Selects multiple dates. Clicking a selected date again removes it.</li>
        </ul>
<p>Use the selected attribute to define dates that should be selected initially. It accepts a single date in Y-m-d format, a comma-separated list of dates, or an array of dates.</p>
<p>
    When selection is enabled, Calendar automatically creates hidden form fields using the name attribute. For multiple selections, [] is appended to the field name. This means selected dates are included automatically when the surrounding form is submitted, with no additional code required.
    Try selecting a few dates below to see how it works.
</p>
    <x-bladewind::calendar name="availability" label="Mark your availability" selectable="multiple" :selected="[now()->addDays(2)->toDateString(), now()->addDays(5)->toDateString()]" />
    <pre class="language-markup line-numbers">
<code>
    &lt;x-bladewind::calendar
        name="availability"
        selectable="multiple"
        label="Mark your availability"
        :selected="[now()->addDays(2)->toDateString(), now()->addDays(5)->toDateString()]" /&gt;
</code>
    </pre>
    <br />
    <x-bladewind::alert show_close_icon="false">Calendar does not have a mode for picking a start date and an end date together as one range. If you need that, Datepicker's <code class="inline">range</code> option already does it well, and it is built for exactly that job: a date range typed into a form field. Calendar is meant for looking at a whole month or week and picking individual days out of it, not for choosing a single continuous range.</x-bladewind::alert>

    <h2 id="events">Events</h2>
    <p>You give Calendar its events through the <code class="inline text-red-500">events</code> attribute, which is an array. Each item in the array is itself a small array describing one event, and it can have these fields: <code class="inline">date</code>, <code class="inline">end</code>, <code class="inline">label</code>, <code class="inline">type</code>, and <code class="inline">href</code>.</p>
    <x-bladewind::table has-border="true">
        <x-slot:header>
            <th>Field</th>
            <th>Description</th>
        </x-slot:header>
        <tr>
            <td><code class="inline">label</code></td>
            <td>is the text shown for the event</td>
        </tr>
        <tr>
            <td><code class="inline">type</code></td>
            <td>controls its color, and it accepts <code class="inline">info</code>, <code class="inline">success</code>, <code class="inline">warning</code>, or <code class="inline">danger</code></td>
        </tr>
        <tr>
            <td><code class="inline">href</code></td>
            <td>is optional. If you set it, the event becomes a real clickable link that takes a visitor to that address, which is useful for linking an event straight to its detail page somewhere else in your application.</td>
        </tr>
        <tr>
            <td><code class="inline">date</code></td>
            <td>the date on which an event occurs or should be displayed</td>
        </tr>
        <tr>
            <td><code class="inline">end</code></td>
            <td>date on which event ends. For multiday events.</td>
        </tr>
        <tr>
            <td><code class="inline">description</code></td>
            <td>is optional. If you set it, the event's marker becomes a button that opens a details drawer instead of a plain link or piece of text. See <a href="#event-details">Event Details Drawer</a> below.</td>
        </tr>
    </x-bladewind::table>
<br />
    <h3 id="all-day-events">Event Dates</h3>
    <p>The <code class="inline">date</code> field can be written two different ways, and which way you choose changes how the event behaves.</p>
    <p>If you write <code class="inline">date</code> as just a day, like <code class="inline">2026-08-14</code>, the event is an all day event. It does not belong to any particular hour. All day events show up as a small colored marker on that day in month view. If you also set <code class="inline">end</code> as a day, the event stretches across every day from <code class="inline">date</code> to <code class="inline">end</code>, which is useful for things like a multi day conference or someone being on leave for a week. The team offsite in the very first example on this page works this way.</p>

    <p>If you write <code class="inline">date</code> with a time attached, like <code class="inline">2026-08-14 15:00</code>, the event is a timed event. Timed events are meant for meetings and appointments that happen at a specific hour. If you set <code class="inline">end</code> too, also with a time on the same day, that tells Calendar exactly how long the event lasts. If you leave <code class="inline">end</code> out, Calendar assumes the event lasts one hour. Timed events show up in month view too, as a marker with the start time written in front of the label, for example "3:00pm Kenya project review", but they only get positioned properly on a real hour by hour timeline once you switch to week view or day view.</p>
    <p>Because a day in month view is small, Calendar only shows a limited number of markers on each day before it starts hiding the rest. This limit is set by <code class="inline text-red-500">max-events-per-day</code>, which defaults to 3. When a day has more events than that, the extra ones are tucked behind a "+N more" button. That button is a real, ordinary button that can be reached with the keyboard and clicked or pressed to reveal the rest, rather than a decoration that only works with a mouse.</p>

    <h3 id="event-details">Event Details Drawer</h3>
    <p>Give an event a <code class="inline text-red-500">description</code> and its marker turns into a button. Clicking it opens a drawer showing the event's date and time, its label, the description you gave it, and, if you also set <code class="inline">href</code>, a "View full details" link to send the visitor to that event's own page. Nothing needs to be turned on for this. It happens automatically for any event that has a description, in month view, week view, and day view alike.</p>
    <p>This drawer stays inside the calendar's own box rather than covering the whole page, and it does not dim or block the rest of the calendar behind it. That means you can click straight from one event to the next and the drawer's content just swaps, without having to close it first. Escape or its own close button dismiss it.</p>
    @php
        $meetingEvents = [
            ['date' => now()->format('Y-m-d').' 11:00', 'end' => now()->format('Y-m-d').' 11:30', 'label' => 'Design review', 'type' => 'info', 'href' => '/component/calendar', 'description' => "Walk through the new event details drawer with the team.\nBring the latest screenshots."],
        ];
    @endphp
    <x-bladewind::calendar name="event-details-demo" label="Event details demo calendar" :events="$meetingEvents" />
    <br />
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::calendar
    name="team-calendar"
    :events="[
        [
            'date' => '2026-08-14 11:00',
            'end' => '2026-08-14 11:30',
            'label' => 'Design review',
            'type' => 'info',
            'href' => '/component/calendar',
            'description' => "Walk through the new event details drawer with the team.\nBring the latest screenshots.",
        ],
    ]" /&gt;</code></pre>

    <h2 id="week-view">Week and Day View</h2>
    <p>Switching the calendar to week view replaces the month grid with a detailed weekly schedule. Each of the seven days has its own column, while the hours run vertically from midnight to midnight. All-day and multi-day events appear in a dedicated row at the top, keeping them separate from events scheduled for specific times.</p>
    <p>Day view uses the same layout but focuses on a single day, giving it a wider column and more space to view the day’s schedule in detail.</p>
    <p>The example below opens in week view with some sample meetings. Notice that two events on the first day overlap. Instead of hiding one behind the other, the calendar displays them side by side, making both events easy to see and access.</p>

    @php
        $weekAnchor = now()->startOfWeek();
        $weekEvents = [
            ['date' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 09:00', 'end' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 10:00', 'label' => 'Standup', 'type' => 'info'],
            ['date' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 09:30', 'end' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 10:30', 'label' => 'Design sync', 'type' => 'success'],
            ['date' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 14:00', 'end' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 15:30', 'label' => 'Kenya project review', 'type' => 'warning'],
            ['date' => $weekAnchor->copy()->addDays(3)->format('Y-m-d'), 'end' => $weekAnchor->copy()->addDays(4)->format('Y-m-d'), 'label' => 'Client visit expected', 'type' => 'warning'],
        ];
    @endphp
    <x-bladewind::calendar name="week-demo" label="Week demo calendar" view="week" :events="$teamEvents" />

    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::calendar
    name="week-demo" label="Week demo calendar" view="week" :events="$teamEvents" /&gt;</code></pre>
    <br />
    <p>Week and day views do not open at midnight. Since most events happen during the day, the calendar automatically scrolls to a practical morning hour, bringing the most relevant part of the schedule into view immediately.</p>
    <p>The example below shows the same meetings in day view. Overlapping events are displayed side by side, just as they are in week view. Both views use the same underlying layout, with day view simply displaying one wider column instead of seven.</p>

    <x-bladewind::calendar name="day-demo" label="Day demo calendar" view="day" :date="$weekAnchor->copy()->addDays(1)->toDateString()" :events="$weekEvents" />
    <pre class="language-php line-numbers"><code>$weekAnchor = now()->startOfWeek();</code></pre>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::calendar
    name="day-demo" label="Day demo calendar" view="day" :events="$teamEvents"
    :date="$weekAnchor->copy()->addDays(1)->toDateString()" /&gt;</code></pre>
    <br />

    <h2 id="restricting-dates">Restricting Dates</h2>
    <p>Sometimes you need to stop a visitor from picking certain dates. <code class="inline">min-date</code> and <code class="inline">max-date</code> set the earliest and latest dates Calendar will allow someone to navigate to or select, which is useful for things like a booking calendar that should not allow dates in the past. <code class="inline">disabled-dates</code> lets you turn off specific individual dates within that range too, for example public holidays or days that are already fully booked. Dates that are disabled, whether by the range or by the list, are still shown and can still be reached with the arrow keys, but a visitor cannot click or press Enter to select them.</p>
    <x-bladewind::calendar name="booking" label="Booking calendar" selectable="single"
        :min-date="now()->toDateString()" :max-date="now()->addDays(20)->toDateString()"
        :disabled-dates="[now()->addDays(3)->toDateString(), now()->addDays(4)->toDateString()]" />
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::calendar name="booking" label="Booking calendar"
    selectable="single"
    :min-date="now()->toDateString()"
    :max-date="now()->addDays(20)->toDateString()"
    :disabled-dates="[now()->addDays(3)->toDateString(), now()->addDays(4)->toDateString()]" /&gt;</code></pre>
    <br />
    <p>By default, month view also shows a few grayed out days from the previous and next month so every row of the grid stays full. This is controlled by <code class="inline">show-other-month-days</code>, which is <code class="inline">true</code> unless you turn it off. Setting it to <code class="inline">false</code> leaves those cells empty instead of showing the neighboring month's dates.</p>

    <h2 id="height">Fixed Height</h2>
    <p>Calendar maintains a consistent height across month, week, and day views by default. Without this, its size would change whenever you switched views or moved between months, causing the surrounding page content to shift. By default, Calendar reserves <code class="inline">40rem</code>, enough space for a six-week month. When the current view needs less space, the remaining area is left empty rather than shrinking the calendar. If the content needs more space, the calendar scrolls internally instead of growing beyond its set height.</p>
    <p>You can customize the height using the <code class="inline text-red-500">height</code> attribute. Example <code class="inline">height="28rem"</code>. To let Calendar grow and shrink naturally based on its content, pass an empty value: <code class="inline">height=""</code></p>

    <x-bladewind::calendar name="fixed-height-calendar" label="Fixed-height calendar" height="20rem" :events="$teamEvents" />
    <br />
    <p>This height rule also applies inside a single day. Each day cell has a fixed height regardless of how many events are packed into it, so one busy day never pushes its own row taller than the days next to it. If a day has more events than <code class="inline text-red-500">max-events-per-day</code> and someone opens its "+N more" button, the extra events appear in their own small scrolling list inside that one cell, rather than making the whole row grow and pushing every other row down the page.</p>

    <h2 id="navigation">Navigation</h2>
    <p>The Previous, Next, and Today buttons in the header, along with Page Up and Page Down on the keyboard, move
        Calendar to a different period. Which period depends on the current view: a day at a time in day view, a
        week at a time in week view, a month at a time in month view. By default this all happens instantly in the
        browser, using the same list of events you already gave it, without needing to reload the page or wait on
        a request to your server. If you would rather have your own server decide what to show next instead, for
        example because you are loading a very large or constantly changing set of events,
        set <code class="inline text-red-500">client-navigation="false"</code>. With that turned off, navigating only
        sends out the <code class="inline">before-navigate</code> and <code class="inline">navigate</code> events
        described below, and your application is responsible for showing the new period, whether that means loading a fresh page or updating things yourself with Livewire or Inertia. Data Grid offers this same choice for its own sorting and searching, if you have used that component before.</p>

    <h2 id="keyboard">Keyboard Interaction</h2>
    <p>Calendar's grid follows the same accessible pattern used elsewhere in this library: a single Tab stop gets a visitor into the grid, and from there the arrow keys move around inside it, rather than needing to Tab through every single day one at a time. In week view and day view, the same keys move between the day headers running along the top of the grid rather than between day cells, since these views no longer have day cells in the month view sense. Day view has only one day header, so left and right simply move to the previous or next day, bringing it into view.</p>
    <x-bladewind::table><x-slot:header><th>Key</th><th>Action</th></x-slot:header>
        <tr><td><kbd>&larr;</kbd> <kbd>&rarr;</kbd> <kbd>&uarr;</kbd> <kbd>&darr;</kbd></td><td>Move focus by one day, or by seven days at once for up and down. Moving past the edge of what is currently visible navigates to bring the next day into view.</td></tr>
        <tr><td><kbd>Home</kbd> / <kbd>End</kbd></td><td>Jump to the first or last day of the current row.</td></tr>
        <tr><td><kbd>Page Up</kbd> / <kbd>Page Down</kbd></td><td>Go to the previous or next day in day view, week in week view, or month in month view.</td></tr>
        <tr><td><kbd>Shift</kbd> + <kbd>Page Up</kbd> / <kbd>Page Down</kbd></td><td>Go one level further than Page Up and Page Down alone: a week at a time in day view, a month at a time in week view, or a year at a time in month view.</td></tr>
        <tr><td><kbd>Enter</kbd> / <kbd>Space</kbd></td><td>Select the day currently focused, if selection is turned on.</td></tr>
    </x-bladewind::table>
    <br />
    <p>Every event marker, including the timed events placed on week view and day view's hour by hour grid, is a genuine link or button that can be reached with an ordinary Tab press and activated like any other control on the page. Nothing here is a decoration that only responds to a mouse.</p>

    <h2 id="events-js">JavaScript Events</h2>
    <p>Calendar announces what it is doing by firing browser events, which your own JavaScript can listen for. Events whose name starts with "before" are cancelable, meaning you can call <code class="inline">preventDefault()</code> on them inside your listener to stop whatever change was about to happen. Every event name Calendar uses starts with <code class="inline">bladewind:calendar:</code>.</p>
    <x-bladewind::table><x-slot:header><th>Event suffix</th><th>When it runs</th></x-slot:header>
        <tr><td><code class="inline">before-navigate</code>, <code class="inline">navigate</code></td><td>Just before, and then just after, the visible day, week, or month changes.</td></tr>
        <tr><td><code class="inline">before-view-change</code>, <code class="inline">view-change</code></td><td>Just before, and then just after, switching between month view, week view, and day view.</td></tr>
        <tr><td><code class="inline">before-select</code>, <code class="inline">select</code></td><td>Just before, and then just after, the selected date or dates change.</td></tr>
    </x-bladewind::table>

    <h2 id="attributes">Full List of Attributes</h2>
    <x-bladewind::table><x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>name</td><td>Generated</td><td>Unique identifier used internally and, when selectable, as the name of the posted form field.</td></tr>
        <tr><td>label</td><td>Calendar</td><td>Accessible name announced by screen readers for the grid.</td></tr>
        <tr><td>view</td><td>month</td><td>month, week, or day.</td></tr>
        <tr><td>date</td><td>today</td><td>Anchor date (Y-m-d) for the month, week, or day initially shown.</td></tr>
        <tr><td>week-starts</td><td>sunday</td><td>sunday or monday.</td></tr>
        <tr><td>selectable</td><td>none</td><td>none, single, or multiple.</td></tr>
        <tr><td>selected</td><td>[]</td><td>Date or dates selected at the start: a Y-m-d string, a comma-separated string, or an array.</td></tr>
        <tr><td>min-date</td><td>null</td><td>Earliest date a visitor can navigate to or select.</td></tr>
        <tr><td>max-date</td><td>null</td><td>Latest date a visitor can navigate to or select.</td></tr>
        <tr><td>disabled-dates</td><td>[]</td><td>Specific dates to turn off regardless of the min and max range.</td></tr>
        <tr><td>events</td><td>[]</td><td>Array of event descriptors, each with date, end, label, type, and href fields.</td></tr>
        <tr><td>max-events-per-day</td><td>3</td><td>How many event markers a day shows in month view before the rest are tucked behind "+N more".</td></tr>
        <tr><td>show-other-month-days</td><td>true</td><td>Whether to fill the grid with dimmed, disabled days from the neighboring months.</td></tr>
        <tr><td>show-week-numbers</td><td>false</td><td>Whether to show an ISO week number next to each row.</td></tr>
        <tr><td>highlight-today</td><td>false</td><td>Whether to tint today's date in month view and today's whole column in week and day view.</td></tr>
        <tr><td>height</td><td>40rem</td><td>Fixed height for the grid, with its own scrollbar if the content needs more room. Pass an empty value to size the calendar naturally instead.</td></tr>
        <tr><td>client-navigation</td><td>true</td><td>Whether navigating rebuilds the grid in the browser automatically. Set to false to hand navigation off to your own server-driven calendar.</td></tr>
        <tr><td>today-label</td><td>Today</td><td>Text label for the jump-to-today button.</td></tr>
        <tr><td>previous-label</td><td>Previous</td><td>Accessible label for the previous-period button.</td></tr>
        <tr><td>next-label</td><td>Next</td><td>Accessible label for the next-period button.</td></tr>
    </x-bladewind::table>

    <h2 id="javascript-api">JavaScript API</h2>
    <p>Every helper function listed here returns true once it succeeds, or if the state it was asked for was already true. It returns false if the calendar it was pointed at could not be found, or if a cancelable event you are listening for called <code class="inline">preventDefault()</code> and stopped the change from happening.</p>
    <pre class="language-javascript"><code>nextCalendarPeriod('team-calendar');
previousCalendarPeriod('team-calendar');
goToCalendarToday('team-calendar');
goToCalendarMonth('team-calendar', 2026, 12);
setCalendarView('team-calendar', 'week');
selectCalendarDate('team-calendar', '2026-08-14');
clearCalendarSelection('team-calendar');
calendarSelectedDates('team-calendar'); // ['2026-08-14']</code></pre>

    <h3>Calendar with all attributes defined</h3>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::calendar
    name="team-calendar"
    label="Team calendar"
    view="week"
    date="2026-08-14"
    week-starts="monday"
    selectable="multiple"
    :selected="['2026-08-10', '2026-08-14']"
    min-date="2026-01-01"
    max-date="2026-12-31"
    :disabled-dates="['2026-12-25']"
    :events="[
        [
            'date' => '2026-08-14 15:00',
            'end' => '2026-08-14 16:00',
            'label' => 'Sprint planning',
            'type' => 'info',
            'href' => '/events/sprint-planning',
            'description' => 'Review the roadmap and assign owners for Q3.',
        ],
    ]"
    max-events-per-day="3"
    show-other-month-days="true"
    show-week-numbers="false"
    highlight-today="true"
    height="40rem"
    client-navigation="true"
    today-label="Today"
    previous-label="Previous"
    next-label="Next"
    class="shadow-sm" /&gt;</code></pre>

    <x-bladewind::alert show_close_icon="false">The source files for this component are available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; calendar.blade.php</code></x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#views">Views</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#selection">Selection</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#events">Events</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#week-view">Week and day view</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#restricting-dates">Restricting dates</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#height">Fixed height</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#navigation">Navigation</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#keyboard">Keyboard interaction</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#events-js">JavaScript events</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full List of Attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#javascript-api">JavaScript API</a></div>
    </x-slot:side_nav>
    <x-slot:scripts><script>selectNavigationItem('.component-calendar');</script></x-slot:scripts>
</x-app>
