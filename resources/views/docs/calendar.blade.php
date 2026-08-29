<x-app>
    <x-slot:title>Calendar Component</x-slot:title>
    <x-slot:page_title>Calendar</x-slot:page_title>

    <p>Calendar is an inline month/week calendar for displaying and selecting dates or events &mdash; distinct from <a href="/component/datepicker">Datepicker</a>, which is a popup calendar bound to a single form input. Calendar is always visible, can show events on any day, and supports single or multiple (non-contiguous) date selection. For a form-bound date range, use Datepicker's <code class="inline">range</code> option instead.</p>

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

    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::calendar
    name="team-calendar"
    label="Team calendar"
    :events="[
        ['date' => '2026-08-14', 'label' => 'Sprint planning', 'type' => 'info'],
        ['date' => '2026-08-18', 'end' => '2026-08-20', 'label' => 'Team offsite', 'type' => 'success'],
    ]" /&gt;</code></pre>

    <h2 id="views">Views</h2>
    <p><code class="inline">view</code> is <code class="inline">month</code> or <code class="inline">week</code> &mdash; both are shown above with a toggle in the header. <code class="inline">date</code> is the anchor day (<code class="inline">Y-m-d</code>, defaults to today): month view shows the month containing it, week view shows the week containing it.</p>

    <h2 id="selection">Selection</h2>
    <p><code class="inline">selectable</code> is <code class="inline">none</code> (display-only, the default, as above), <code class="inline">single</code>, or <code class="inline">multiple</code>. Pass pre-selected dates through <code class="inline">selected</code> as a <code class="inline">Y-m-d</code> string, comma-separated string, or array. When selectable, the component renders hidden inputs under <code class="inline">name</code> (or <code class="inline">name[]</code> for multiple) so the current selection posts with the surrounding form &mdash; try clicking a few days below.</p>
    <x-bladewind::calendar name="availability" label="Mark your availability" selectable="multiple" :selected="[now()->addDays(2)->toDateString(), now()->addDays(5)->toDateString()]" />
    <x-bladewind::alert show_close_icon="false">Calendar deliberately has no <code class="inline">range</code> mode. For a form-bound date range, reach for Datepicker's <code class="inline">range</code> option &mdash; Calendar owns the always-visible surface, Datepicker owns the popup-bound form input.</x-bladewind::alert>

    <h2 id="events">Events</h2>
    <p><code class="inline">events</code> is an array of <code class="inline">['date' => 'Y-m-d', 'end' => optional 'Y-m-d', 'label', 'type' => info|success|warning|danger, 'href' => optional]</code>. <code class="inline">end</code> spans an event across multiple days, as with the team offsite above. Each day shows up to <code class="inline">max-events-per-day</code> (default 3) events; the rest sit behind a real, focusable "+N more" button &mdash; try it on the 18th above, which carries four.</p>

    <h2 id="restricting-dates">Restricting Dates</h2>
    <p><code class="inline">min-date</code> and <code class="inline">max-date</code> bound the navigable/selectable range. <code class="inline">disabled-dates</code> disables specific days (holidays, fully-booked slots) regardless of range. Disabled days stay visible and reachable with the arrow keys, but cannot be selected.</p>
    <x-bladewind::calendar name="booking" label="Booking calendar" selectable="single"
        :min-date="now()->toDateString()" :max-date="now()->addDays(20)->toDateString()"
        :disabled-dates="[now()->addDays(3)->toDateString(), now()->addDays(4)->toDateString()]" />
    <p><code class="inline">show-other-month-days</code> (default <code class="inline">true</code>) renders adjacent-month days to fill the grid, dimmed and disabled; set it to <code class="inline">false</code> to leave those cells empty instead.</p>

    <h2 id="navigation">Navigation</h2>
    <p>Previous/next/today and PageUp/PageDown (Shift+PageUp/PageDown for the year in month view, or the month in week view) rebuild the grid in the browser using the <code class="inline">events</code> already passed in &mdash; no round trip. Set <code class="inline">client-navigation="false"</code> for a server-driven calendar instead: navigation only fires <code class="inline">before-navigate</code>/<code class="inline">navigate</code>, and the application re-renders &mdash; a fresh page, or your own Livewire/Inertia update, the same escape hatch Data Grid gives <code class="inline">client-sort</code>/<code class="inline">client-search</code>.</p>

    <h2 id="keyboard">Keyboard Interaction</h2>
    <p>The grid is a real <code class="inline">role="grid"</code> with <code class="inline">role="gridcell"</code> days and a roving <code class="inline">tabindex</code> &mdash; one Tab stop enters the grid, arrow keys move between days from there.</p>
    <x-bladewind::table><x-slot:header><th>Key</th><th>Action</th></x-slot:header>
        <tr><td><kbd>&larr;</kbd> <kbd>&rarr;</kbd> <kbd>&uarr;</kbd> <kbd>&darr;</kbd></td><td>Move focus by one day, or by seven for up/down. Crossing outside the visible grid navigates there.</td></tr>
        <tr><td><kbd>Home</kbd> / <kbd>End</kbd></td><td>Jump to the first/last day of the focused row.</td></tr>
        <tr><td><kbd>Page Up</kbd> / <kbd>Page Down</kbd></td><td>Previous/next month (or week, in week view).</td></tr>
        <tr><td><kbd>Shift</kbd> + <kbd>Page Up</kbd> / <kbd>Page Down</kbd></td><td>Previous/next year (or month, in week view).</td></tr>
        <tr><td><kbd>Enter</kbd> / <kbd>Space</kbd></td><td>Select the focused day, when selectable.</td></tr>
    </x-bladewind::table>
    <p>Event markers are real, independently focusable links or buttons reached with a normal <kbd>Tab</kbd>, not decorations bolted onto the grid.</p>

    <h2 id="events-js">JavaScript Events</h2>
    <p>Before events are cancelable. Call <code class="inline">preventDefault()</code> to stop the related change. All event names start with <code class="inline">bladewind:calendar:</code>.</p>
    <x-bladewind::table><x-slot:header><th>Event suffix</th><th>When it runs</th></x-slot:header>
        <tr><td><code class="inline">before-navigate</code>, <code class="inline">navigate</code></td><td>Before and after the visible month/week changes.</td></tr>
        <tr><td><code class="inline">before-view-change</code>, <code class="inline">view-change</code></td><td>Before and after switching between month and week.</td></tr>
        <tr><td><code class="inline">before-select</code>, <code class="inline">select</code></td><td>Before and after the selection changes.</td></tr>
    </x-bladewind::table>

    <h2 id="attributes">Full List of Attributes</h2>
    <x-bladewind::table><x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td>name</td><td>Generated</td><td>Unique public helper and DOM scope; also the posted field name when selectable.</td></tr>
        <tr><td>label</td><td>Calendar</td><td>Accessible name for the grid.</td></tr>
        <tr><td>view</td><td>month</td><td>month or week.</td></tr>
        <tr><td>date</td><td>today</td><td>Anchor date (Y-m-d) for the initial month or week shown.</td></tr>
        <tr><td>week-starts</td><td>sunday</td><td>sunday or monday.</td></tr>
        <tr><td>selectable</td><td>none</td><td>none, single, or multiple.</td></tr>
        <tr><td>selected</td><td>[]</td><td>Pre-selected date(s): a Y-m-d string, comma-separated string, or array.</td></tr>
        <tr><td>min-date</td><td>null</td><td>Earliest navigable/selectable date.</td></tr>
        <tr><td>max-date</td><td>null</td><td>Latest navigable/selectable date.</td></tr>
        <tr><td>disabled-dates</td><td>[]</td><td>Specific dates to disable regardless of range.</td></tr>
        <tr><td>events</td><td>[]</td><td>Array of date/end/label/type/href event descriptors.</td></tr>
        <tr><td>max-events-per-day</td><td>3</td><td>Visible events per day before "+N more".</td></tr>
        <tr><td>show-other-month-days</td><td>true</td><td>Render adjacent-month days, dimmed and disabled, to fill the grid.</td></tr>
        <tr><td>show-week-numbers</td><td>false</td><td>Render an ISO week-number column.</td></tr>
        <tr><td>client-navigation</td><td>true</td><td>Rebuild the grid in the browser on navigation. Set false for a server-driven calendar.</td></tr>
        <tr><td>today-label</td><td>Today</td><td>Label for the jump-to-today control.</td></tr>
        <tr><td>previous-label</td><td>Previous</td><td>Accessible label for the previous-period control.</td></tr>
        <tr><td>next-label</td><td>Next</td><td>Accessible label for the next-period control.</td></tr>
    </x-bladewind::table>

    <h2 id="javascript-api">JavaScript API</h2>
    <p>Helpers return true on success or when the requested state already applies. They return false for a missing target or a canceled event.</p>
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
        <div class="flex items-center"><div class="dot"></div><a href="#restricting-dates">Restricting dates</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#navigation">Navigation</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#keyboard">Keyboard interaction</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#events-js">JavaScript events</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full List of Attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#javascript-api">JavaScript API</a></div>
    </x-slot:side_nav>
    <x-slot:scripts><script>selectNavigationItem('.component-calendar');</script></x-slot:scripts>
</x-app>
