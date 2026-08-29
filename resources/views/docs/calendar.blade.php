<x-app>
    <x-slot:title>Calendar Component</x-slot:title>
    <x-slot:page_title>Calendar</x-slot:page_title>

    <p>Calendar shows a month or a week of dates in one place on the page, all the time, without needing a click to open it. This makes it different from <a href="/component/datepicker">Datepicker</a>, which is a small popup that appears next to a text field so someone can type or pick a single date for a form. Use Calendar when you want to show a schedule, a set of events, or a range of days that someone can look at and pick from directly. Use Datepicker when you have a form field that needs a date typed into it. Calendar can show events on any day, and it can let someone pick just one date, several separate dates, or no date at all if you only want it to display information.</p>

    @php
        $teamEvents = [
            ['date' => now()->startOfMonth()->addDays(4)->toDateString(), 'label' => 'Sprint planning', 'type' => 'info'],
            ['date' => now()->startOfMonth()->addDays(11)->toDateString(), 'end' => now()->startOfMonth()->addDays(13)->toDateString(), 'label' => 'Team offsite', 'type' => 'success'],
            ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Design review', 'type' => 'warning'],
            ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Deploy freeze', 'type' => 'danger'],
            ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Client call', 'type' => 'info'],
            ['date' => now()->startOfMonth()->addDays(18)->toDateString(), 'label' => 'Retro', 'type' => 'info'],
        ];
    @endphp

    <x-bladewind::calendar name="team-calendar" label="Team calendar" :events="$teamEvents" />

    <p>This is the basic version of the component. It needs a <code class="inline">name</code>, which is used internally to keep track of the calendar and, later on, to call JavaScript helper functions on it. It needs a <code class="inline">label</code>, which screen readers announce so a visually impaired visitor knows what the grid in front of them is for. Everything else, including the list of events, is optional.</p>

    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::calendar
    name="team-calendar"
    label="Team calendar"
    :events="[
        ['date' => '2026-08-14', 'label' => 'Sprint planning', 'type' => 'info'],
        ['date' => '2026-08-18', 'end' => '2026-08-20', 'label' => 'Team offsite', 'type' => 'success'],
    ]" /&gt;</code></pre>

    <h2 id="views">Views</h2>
    <p>The <code class="inline">view</code> attribute controls how much of the calendar Calendar shows at once. It accepts <code class="inline">month</code>, <code class="inline">week</code>, or <code class="inline">day</code>. If you do not set it, Calendar shows month view first, and the three buttons in the header let a visitor switch between all of them whenever they like. The <code class="inline">date</code> attribute tells Calendar which day to center the view on. It should be written as <code class="inline">Y-m-d</code>, for example <code class="inline">2026-08-14</code>, and it defaults to today's date if you leave it out. In month view, Calendar shows the whole month that <code class="inline">date</code> falls in. In week view, Calendar shows the seven days of the week that <code class="inline">date</code> falls in. In day view, Calendar shows only <code class="inline">date</code> itself.</p>
    <p>Week view and day view are not simply shorter versions of month view. They are a full hour by hour schedule, similar to the week and day views you would see in Outlook or Google Calendar, and they share the exact same grid: day view is just that same grid narrowed down to one column instead of seven. There is more about how that works a little further down this page, in the Week and Day View section.</p>

    <h2 id="selection">Selection</h2>
    <p>The <code class="inline">selectable</code> attribute controls whether a visitor can click a date to select it. It accepts three values. <code class="inline">none</code> is the default, and it means Calendar is for looking at only, nothing can be clicked to select it. <code class="inline">single</code> means a visitor can pick exactly one date at a time, and clicking a new date replaces whatever was picked before. <code class="inline">multiple</code> means a visitor can pick several separate dates, and clicking a date that is already picked removes it again.</p>
    <p>You can set which dates start out selected using the <code class="inline">selected</code> attribute. It accepts a single date written as <code class="inline">Y-m-d</code>, several dates separated by commas in one string, or an array of dates. When selection is turned on, Calendar quietly adds hidden form fields behind the scenes, named after the <code class="inline">name</code> attribute (with <code class="inline">[]</code> added at the end for multiple selection), so the dates someone picks are included automatically the next time the surrounding form is submitted. You do not need to write any extra code to make that happen. Try clicking a few of the days below to see it in action.</p>
    <x-bladewind::calendar name="availability" label="Mark your availability" selectable="multiple" :selected="[now()->addDays(2)->toDateString(), now()->addDays(5)->toDateString()]" />
    <x-bladewind::alert show_close_icon="false">Calendar does not have a mode for picking a start date and an end date together as one range. If you need that, Datepicker's <code class="inline">range</code> option already does it well, and it is built for exactly that job: a date range typed into a form field. Calendar is meant for looking at a whole month or week and picking individual days out of it, not for choosing a single continuous range.</x-bladewind::alert>

    <h2 id="events">Events</h2>
    <p>You give Calendar its events through the <code class="inline">events</code> attribute, which is an array. Each item in the array is itself a small array describing one event, and it can have these fields: <code class="inline">date</code>, <code class="inline">end</code>, <code class="inline">label</code>, <code class="inline">type</code>, and <code class="inline">href</code>.</p>
    <p><code class="inline">label</code> is the text shown for the event. <code class="inline">type</code> controls its color, and it accepts <code class="inline">info</code>, <code class="inline">success</code>, <code class="inline">warning</code>, or <code class="inline">danger</code>. <code class="inline">href</code> is optional. If you set it, the event becomes a real clickable link that takes a visitor to that address, which is useful for linking an event straight to its detail page somewhere else in your application.</p>
    <p>The <code class="inline">date</code> field can be written two different ways, and which way you choose changes how the event behaves.</p>
    <p>If you write <code class="inline">date</code> as just a day, like <code class="inline">2026-08-14</code>, the event is an all day event. It does not belong to any particular hour. All day events show up as a small colored marker on that day in month view. If you also set <code class="inline">end</code> as a day, the event stretches across every day from <code class="inline">date</code> to <code class="inline">end</code>, which is useful for things like a multi day conference or someone being on leave for a week. The team offsite in the very first example on this page works this way.</p>
    <p>If you write <code class="inline">date</code> with a time attached, like <code class="inline">2026-08-14 15:00</code>, the event is a timed event. Timed events are meant for meetings and appointments that happen at a specific hour. If you set <code class="inline">end</code> too, also with a time on the same day, that tells Calendar exactly how long the event lasts. If you leave <code class="inline">end</code> out, Calendar assumes the event lasts one hour. Timed events show up in month view too, as a marker with the start time written in front of the label, for example "3:00pm Kenya project review", but they only get positioned properly on a real hour by hour timeline once you switch to week view or day view. That is covered in the next section.</p>
    <p>Because a day in month view is small, Calendar only shows a limited number of markers on each day before it starts hiding the rest. This limit is set by <code class="inline">max-events-per-day</code>, which defaults to 3. Once a day has more events than that, the extra ones are tucked behind a "+N more" button. That button is a real, ordinary button that can be reached with the keyboard and clicked or pressed to reveal the rest, rather than a decoration that only works with a mouse. You can see this in action on the 18th of the example at the top of this page, which has four events packed into it.</p>

    <h2 id="week-view">Week and Day View</h2>
    <p>Switching a calendar to week view replaces the month grid with something closer to a paper diary or a scheduling app: a column for each of the seven days, and a vertical list of hours running down the left side from midnight to midnight. Any all day or multi day events for that week are pinned in a row across the very top, above the hours, so they never get confused with events that belong to a specific time. Day view uses this same grid narrowed down to a single, wider column for just one day, which is useful when a visitor wants to focus on one day's schedule without the rest of the week around it.</p>
    <p>The calendar below opens already switched to week view, with a few example meetings on it. One thing worth trying here: two of the events on the first day overlap in time, and instead of one hiding the other, Calendar places both side by side so you can see and reach them both.</p>
    @php
        $weekAnchor = now()->startOfWeek();
        $weekEvents = [
            ['date' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 09:00', 'end' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 10:00', 'label' => 'Standup', 'type' => 'info'],
            ['date' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 09:30', 'end' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 10:30', 'label' => 'Design sync', 'type' => 'success'],
            ['date' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 14:00', 'end' => $weekAnchor->copy()->addDays(1)->format('Y-m-d').' 15:30', 'label' => 'Kenya project review', 'type' => 'warning'],
            ['date' => $weekAnchor->copy()->addDays(3)->format('Y-m-d'), 'end' => $weekAnchor->copy()->addDays(4)->format('Y-m-d'), 'label' => 'Client visit expected', 'type' => 'warning'],
        ];
    @endphp
    <x-bladewind::calendar name="week-demo" label="Week demo calendar" view="week" :events="$weekEvents" />
    <p>Week view and day view do not scroll to the very top of the day when they open, because very few meetings happen at midnight and scrolling past several empty hours to find the working day would be annoying. Instead they open already scrolled down to a reasonable hour in the morning, so the events people actually care about are visible right away.</p>
    <p>Here is the same set of meetings again, this time on the same day but in day view. Notice that the overlapping meetings are still placed side by side, exactly like in week view, because it is the same layout code underneath, just with one column instead of seven.</p>
    <x-bladewind::calendar name="day-demo" label="Day demo calendar" view="day" :date="$weekAnchor->copy()->addDays(1)->toDateString()" :events="$weekEvents" />

    <h2 id="restricting-dates">Restricting Dates</h2>
    <p>Sometimes you need to stop a visitor from picking certain dates. <code class="inline">min-date</code> and <code class="inline">max-date</code> set the earliest and latest dates Calendar will allow someone to navigate to or select, which is useful for things like a booking calendar that should not allow dates in the past. <code class="inline">disabled-dates</code> lets you turn off specific individual dates within that range too, for example public holidays or days that are already fully booked. Dates that are disabled, whether by the range or by the list, are still shown and can still be reached with the arrow keys, but a visitor cannot click or press Enter to select them.</p>
    <x-bladewind::calendar name="booking" label="Booking calendar" selectable="single"
        :min-date="now()->toDateString()" :max-date="now()->addDays(20)->toDateString()"
        :disabled-dates="[now()->addDays(3)->toDateString(), now()->addDays(4)->toDateString()]" />
    <p>By default, month view also shows a few grayed out days from the previous and next month so every row of the grid stays full. This is controlled by <code class="inline">show-other-month-days</code>, which is <code class="inline">true</code> unless you turn it off. Setting it to <code class="inline">false</code> leaves those cells empty instead of showing the neighboring month's dates.</p>

    <h2 id="height">Fixed Height</h2>
    <p>Calendar keeps the same overall height no matter what you are looking at, and it does this by default without you needing to configure anything. Left to its own devices, a calendar's size would naturally change all the time: some months have four weeks, some have five, some have six, week view is much shorter than month view because it only shows one row of days, and day view is narrower still. Without a fixed height, switching between any of these would make the whole calendar grow or shrink, which looks jumpy and can shift everything else around it on the page.</p>
    <p>To avoid that, Calendar reserves enough room for the largest case it will ever need, a six week month, which comes out to <code class="inline">40rem</code> by default. If what is currently showing needs less room than that, for example a shorter month, week view, or day view, the extra space is simply left empty at the bottom rather than the calendar shrinking to fit. If what is showing needs more room than that, the calendar adds its own scrollbar inside the grid rather than growing past the height you asked for. You can set your own value with the <code class="inline">height</code> attribute, for example <code class="inline">28rem</code>, if the default is not right for your layout. If you would rather Calendar sized itself naturally to whatever it is showing, with no fixed height at all, pass an empty value like <code class="inline">height=""</code>.</p>
    <x-bladewind::calendar name="fixed-height-calendar" label="Fixed-height calendar" height="20rem" :events="$teamEvents" />
    <p>This height rule also applies inside a single day. Each day cell has a fixed height regardless of how many events are packed into it, so one busy day never pushes its own row taller than the days next to it. If a day has more events than <code class="inline">max-events-per-day</code> and someone opens its "+N more" button, the extra events appear in their own small scrolling list inside that one cell, rather than making the whole row grow and pushing every other row down the page.</p>

    <h2 id="navigation">Navigation</h2>
    <p>The Previous, Next, and Today buttons in the header, along with Page Up and Page Down on the keyboard, move Calendar to a different period. Which period depends on the current view: a day at a time in day view, a week at a time in week view, a month at a time in month view. By default this all happens instantly in the browser, using the same list of events you already gave it, without needing to reload the page or wait on a request to your server. If you would rather have your own server decide what to show next instead, for example because you are loading a very large or constantly changing set of events, set <code class="inline">client-navigation="false"</code>. With that turned off, navigating only sends out the <code class="inline">before-navigate</code> and <code class="inline">navigate</code> events described below, and your application is responsible for showing the new period, whether that means loading a fresh page or updating things yourself with Livewire or Inertia. Data Grid offers this same choice for its own sorting and searching, if you have used that component before.</p>

    <h2 id="keyboard">Keyboard Interaction</h2>
    <p>Calendar's grid follows the same accessible pattern used elsewhere in this library: a single Tab stop gets a visitor into the grid, and from there the arrow keys move around inside it, rather than needing to Tab through every single day one at a time. In week view and day view, the same keys move between the day headers running along the top of the grid rather than between day cells, since these views no longer have day cells in the month view sense. Day view has only one day header, so left and right simply move to the previous or next day, bringing it into view.</p>
    <x-bladewind::table><x-slot:header><th>Key</th><th>Action</th></x-slot:header>
        <tr><td><kbd>&larr;</kbd> <kbd>&rarr;</kbd> <kbd>&uarr;</kbd> <kbd>&darr;</kbd></td><td>Move focus by one day, or by seven days at once for up and down. Moving past the edge of what is currently visible navigates to bring the next day into view.</td></tr>
        <tr><td><kbd>Home</kbd> / <kbd>End</kbd></td><td>Jump to the first or last day of the current row.</td></tr>
        <tr><td><kbd>Page Up</kbd> / <kbd>Page Down</kbd></td><td>Go to the previous or next day in day view, week in week view, or month in month view.</td></tr>
        <tr><td><kbd>Shift</kbd> + <kbd>Page Up</kbd> / <kbd>Page Down</kbd></td><td>Go one level further than Page Up and Page Down alone: a week at a time in day view, a month at a time in week view, or a year at a time in month view.</td></tr>
        <tr><td><kbd>Enter</kbd> / <kbd>Space</kbd></td><td>Select the day currently focused, if selection is turned on.</td></tr>
    </x-bladewind::table>
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

    <x-bladewind::alert show_close_icon="false">The source files for this component are available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; calendar</code></x-bladewind::alert>

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
