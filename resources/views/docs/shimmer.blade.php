<x-app>
    <x-slot:title>Shimmer Component</x-slot:title>
    <x-slot:page_title>Shimmer</x-slot:page_title>

    <p>
        Shimmers or loading placeholders are a great visual cue to tell users that content is loading.
    </p>
    <x-bladewind::shimmer />
    @php
        $shimmerExample1 = <<<'HTML'
            <x-bladewind::shimmer />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$shimmerExample1"></x-bladewind::code-block>
    <br />
    <x-bladewind::shimmer mode="alternate" />
    @php
        $shimmerExample2 = <<<'HTML'
            <x-bladewind::shimmer animation="alternate" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$shimmerExample2"></x-bladewind::code-block>
    <p>
        Shimmers can be used in various ways. For example, you can use them to show a loading state for a list of items, card content, or even a form.
        You can use the <code class="inline text-red-500">circle</code> attribute to create a circular shimmer.
    </p>
    <x-bladewind::shimmer circle="true" />
    @php
        $shimmerExample3 = <<<'HTML'
            <x-bladewind::shimmer circle="true" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" :code="$shimmerExample3"></x-bladewind::code-block>
    <p>
        Since it is impossible to know all the possible layouts users will want to shimmer, the Bladewind Shimmer has been designed to be very simple. You specify your own <code class="inline text-red-500">width</code> and <code class="inline text-red-500">height</code> and stack up as many shimmers as can create the loading layout you want to depict.
        In the example below, we have created a shimmer that is depicting two loading contact cards. One vertical, the other horizontal.
    </p>
    <div class="sm:flex gap-4">
        <x-bladewind::card class="sm:w-1/3">
            <x-bladewind::shimmer :circle="true" align="center" />
            <x-bladewind::shimmer height="h-5" />
            <x-bladewind::shimmer />
            <x-bladewind::shimmer />
            <x-bladewind::shimmer />
        </x-bladewind::card>
        <x-bladewind::card class="sm:w-2/3">
            <div class="flex gap-4">
                <div><x-bladewind::shimmer :circle="true" class="size-40" /></div>
                <div class="grow">
                    <x-bladewind::shimmer height="h-5" />
                    <x-bladewind::shimmer class="w-[90%]" />
                    <x-bladewind::shimmer class="w-[80%]" />
                    <x-bladewind::shimmer />
                    <x-bladewind::shimmer class="w-[80%]" />
                    <x-bladewind::shimmer class="w-[85%]" />
                    <x-bladewind::shimmer class="w-[90%]" />
                    <x-bladewind::shimmer class="w-[80%]" />
                    <x-bladewind::shimmer />
                    <x-bladewind::shimmer />
                </div>
            </div>
        </x-bladewind::card>
    </div>

@php
        $shimmerExample4 = <<<'HTML'
            <x-bladewind::card class="sm:w-1/3">
                <x-bladewind::shimmer :circle="true" align="center" />
                <x-bladewind::shimmer height="h-5" />
                <x-bladewind::shimmer />
                <x-bladewind::shimmer />
                <x-bladewind::shimmer />
            </x-bladewind::card>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$shimmerExample4"></x-bladewind::code-block>
@php
        $shimmerExample5 = <<<'HTML'
            <x-bladewind::card class="sm:w-2/3">
                <div class="flex gap-4">
                    <div><x-bladewind::shimmer :circle="true" class="size-40" /></div>
                    <div class="grow">
                        <x-bladewind::shimmer height="h-5" />
                        <x-bladewind::shimmer class="w-[90%]" />
                        <x-bladewind::shimmer class="w-[80%]" />
                        <x-bladewind::shimmer />
                        <x-bladewind::shimmer class="w-[80%]" />
                        <x-bladewind::shimmer class="w-[85%]" />
                        <x-bladewind::shimmer class="w-[90%]" />
                        <x-bladewind::shimmer class="w-[80%]" />
                        <x-bladewind::shimmer />
                        <x-bladewind::shimmer />
                    </div>
                </div>
            </x-bladewind::card>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$shimmerExample5"></x-bladewind::code-block>
    <p>
        If the shimmer is at its full width (w-full), you can use the <code class="inline text-red-500">align</code> attribute
        to position the shimmer to the <code class="inline">center</code> or <code class="inline">right</code> of its parent container.
        The shimmer by default is set to <code class="inline">w-full</code> and aligned to the <code class="inline">left</code> if width is not <code class="inline">w-full</code>.
    </p>
    <h3>Alternating Animation</h3>
    <p>
        By default the animation moves from left to right. You can change this by setting the <code class="inline text-red-500">animation</code> attribute to <code class="inline">alternate</code>.
        This will cause the shimmer to animate from left to right and then right to left, creating a back and forth effect.
    </p>
    <div class="sm:flex gap-4">
        <x-bladewind::card class="sm:w-1/3">
            <x-bladewind::shimmer animation="alternate" :circle="true" align="center" />
            <x-bladewind::shimmer animation="alternate" height="h-5" />
            <x-bladewind::shimmer animation="alternate" />
            <x-bladewind::shimmer animation="alternate" />
            <x-bladewind::shimmer animation="alternate" />
        </x-bladewind::card>
        <x-bladewind::card class="sm:w-2/3">
            <div class="flex gap-4">
                <div><x-bladewind::shimmer animation="alternate" :circle="true" class="size-40" /></div>
                <div class="grow">
                    <x-bladewind::shimmer animation="alternate" height="h-5" />
                    <x-bladewind::shimmer animation="alternate" class="w-[90%]" />
                    <x-bladewind::shimmer animation="alternate" class="w-[80%]" />
                    <x-bladewind::shimmer animation="alternate" />
                    <x-bladewind::shimmer animation="alternate" class="w-[80%]" />
                    <x-bladewind::shimmer animation="alternate" class="w-[85%]" />
                    <x-bladewind::shimmer animation="alternate" class="w-[90%]" />
                    <x-bladewind::shimmer animation="alternate" class="w-[80%]" />
                    <x-bladewind::shimmer animation="alternate" />
                    <x-bladewind::shimmer animation="alternate" />
                </div>
            </div>
        </x-bladewind::card>
    </div>

    @php
        $shimmerExample6 = <<<'HTML'
            <x-bladewind::card class="sm:w-1/3">
                <x-bladewind::shimmer animation="alternate" :circle="true" align="center" />
                <x-bladewind::shimmer animation="alternate" height="h-5" />
                <x-bladewind::shimmer animation="alternate" />
                <x-bladewind::shimmer animation="alternate" />
                <x-bladewind::shimmer animation="alternate" />
            </x-bladewind::card>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$shimmerExample6"></x-bladewind::code-block>
    @php
        $shimmerExample7 = <<<'HTML'
            <x-bladewind::card class="sm:w-2/3">
                <div class="flex gap-4">
                    <div><x-bladewind::shimmer animation="alternate" :circle="true" class="size-40" /></div>
                    <div class="grow">
                        <x-bladewind::shimmer animation="alternate" height="h-5" />
                        <x-bladewind::shimmer animation="alternate" class="w-[90%]" />
                        <x-bladewind::shimmer animation="alternate" class="w-[80%]" />
                        <x-bladewind::shimmer animation="alternate" />
                        <x-bladewind::shimmer animation="alternate" class="w-[80%]" />
                        <x-bladewind::shimmer animation="alternate" class="w-[85%]" />
                        <x-bladewind::shimmer animation="alternate" class="w-[90%]" />
                        <x-bladewind::shimmer animation="alternate" class="w-[80%]" />
                        <x-bladewind::shimmer animation="alternate" />
                        <x-bladewind::shimmer animation="alternate" />
                    </div>
                </div>
            </x-bladewind::card>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$shimmerExample7"></x-bladewind::code-block>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Shimmer component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>circle</td>
            <td>false</td>
            <td>Display the shimmer as a circle.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>duration</td>
            <td>1.5s</td>
            <td>Determines how long it takes for the animation to complete. You can say, the speed of the animation. The bigger the value the slower the animation. Must include 's' for seconds.</td>
        </tr>
        <tr>
            <td>width</td>
            <td>w-full</td>
            <td>How wide the shimmer goes. Width must be a valid TailwindCss width. Examples: w-90, w-[100px], w-[80%]</td>
        </tr>
        <tr>
            <td>height</td>
            <td>h-2.5</td>
            <td>Height of the shimmer. This must be a valid TailwindCss height. Examples: h-10, h-[10px], h-[2%]</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional css classes can be added using this attribute.</td>
        </tr>
        <tr>
            <td>animation</td>
            <td>normal</td>
            <td>Determine the direction of the animation. <br /><code class="inline">normal</code> <code class="inline">alternate</code></td>
        </tr>
    </x-bladewind::table>

    <h3>Shimmer with all attributes defined</h3>
    @php
        $shimmerExample8 = <<<'HTML'
            <x-bladewind::shimmer
                animation="alternate"
                circle="true"
                duration="3s"
                width="w-90"
                height="h-90"
                align="right" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$shimmerExample8"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > shimmer.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-shimmer');
        </script>
    </x-slot:scripts>
</x-app>
