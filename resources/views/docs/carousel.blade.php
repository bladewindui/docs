<x-app>
    <x-slot:title>Carousel Component</x-slot:title>
    <x-slot:page_title>Carousel</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::carousel</code> and <code class="inline">x-bladewind::carousel.slide</code>
        step through a set of slides one at a time. Each slide can hold anything, an image, a card, a testimonial,
        a promo banner. Visitors can move between slides with the arrow buttons, the dot indicators, the left and
        right arrow keys, or by swiping on a touch screen.
    </p>

    <h2 id="basic">Basic Usage</h2>
    <x-bladewind::carousel height="220px">
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-primary-500 text-white text-xl font-semibold">Slide 1</div>
        </x-bladewind::carousel.slide>
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-cyan-500 text-white text-xl font-semibold">Slide 2</div>
        </x-bladewind::carousel.slide>
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-violet-500 text-white text-xl font-semibold">Slide 3</div>
        </x-bladewind::carousel.slide>
    </x-bladewind::carousel>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::carousel height="220px"&gt;
                &lt;x-bladewind::carousel.slide&gt;
                    ...
                &lt;/x-bladewind::carousel.slide&gt;
                &lt;x-bladewind::carousel.slide&gt;
                    ...
                &lt;/x-bladewind::carousel.slide&gt;
                &lt;x-bladewind::carousel.slide&gt;
                    ...
                &lt;/x-bladewind::carousel.slide&gt;
            &lt;/x-bladewind::carousel&gt;
        </code>
    </pre>

    <h2 id="autoplay">Autoplay</h2>
    <p>
        Set <code class="inline">autoplay="true"</code> to advance slides automatically on an
        <code class="inline">interval</code>, given in milliseconds. Autoplay pauses while the pointer is over the
        carousel, and is switched off entirely for a visitor whose system has requested reduced motion.
    </p>
    <x-bladewind::carousel height="220px" autoplay="true" interval="3000">
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-orange-500 text-white text-xl font-semibold">Slide 1</div>
        </x-bladewind::carousel.slide>
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-pink-500 text-white text-xl font-semibold">Slide 2</div>
        </x-bladewind::carousel.slide>
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-green-500 text-white text-xl font-semibold">Slide 3</div>
        </x-bladewind::carousel.slide>
    </x-bladewind::carousel>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::carousel height="220px" autoplay="true" interval="3000"&gt;
                ...
            &lt;/x-bladewind::carousel&gt;
        </code>
    </pre>

    <h2 id="no-loop">Without Looping</h2>
    <p>
        By default the carousel loops, so the next arrow from the last slide returns to the first. Set
        <code class="inline">loop="false"</code> to stop at either end instead, disabling the corresponding arrow.
    </p>
    <x-bladewind::carousel height="220px" loop="false">
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-slate-600 text-white text-xl font-semibold">Slide 1</div>
        </x-bladewind::carousel.slide>
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-slate-700 text-white text-xl font-semibold">Slide 2</div>
        </x-bladewind::carousel.slide>
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-slate-800 text-white text-xl font-semibold">Slide 3</div>
        </x-bladewind::carousel.slide>
    </x-bladewind::carousel>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::carousel height="220px" loop="false"&gt;
                ...
            &lt;/x-bladewind::carousel&gt;
        </code>
    </pre>

    <h2 id="no-arrows">Without Arrows Or Indicators</h2>
    <p>
        Set <code class="inline">arrows="false"</code> or <code class="inline">indicators="false"</code> to hide
        either control. Swiping and the arrow keys keep working either way.
    </p>
    <x-bladewind::carousel height="220px" arrows="false" indicators="false">
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-indigo-500 text-white text-xl font-semibold">Slide 1</div>
        </x-bladewind::carousel.slide>
        <x-bladewind::carousel.slide>
            <div class="h-full flex items-center justify-center bg-red-500 text-white text-xl font-semibold">Slide 2</div>
        </x-bladewind::carousel.slide>
    </x-bladewind::carousel>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::carousel height="220px" arrows="false" indicators="false"&gt;
                ...
            &lt;/x-bladewind::carousel&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <h3>Carousel</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>arrows</td>
            <td>true</td>
            <td>Shows previous/next arrow buttons. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>indicators</td>
            <td>true</td>
            <td>Shows a row of dot indicators, one per slide. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>autoplay</td>
            <td>false</td>
            <td>Advances slides automatically. Disabled for a visitor whose system requests reduced motion. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>interval</td>
            <td>5000</td>
            <td>Milliseconds between slides when autoplay is on.</td>
        </tr>
        <tr>
            <td>loop</td>
            <td>true</td>
            <td>Wraps from the last slide back to the first, and vice versa. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>swipe</td>
            <td>true</td>
            <td>Enables touch and pointer swiping to change slides. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>height</td>
            <td><em>blank</em></td>
            <td>Any valid CSS height value, for example <code class="inline">"320px"</code>. The carousel takes the height of its tallest slide when left blank.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <h3>Slide</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Additional CSS classes for the slide.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > carousel > index.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > carousel > slide.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#basic">Basic usage</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#autoplay">Autoplay</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#no-loop">Without looping</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#no-arrows">Without arrows or indicators</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-carousel');
        </script>
    </x-slot:scripts>
</x-app>
