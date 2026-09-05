<x-app>
    <x-slot:title>Code Block Component</x-slot:title>
    <x-slot:page_title>Code Block</x-slot:page_title>

    <p>
        The code block component displays a block of source code with syntax highlighting, powered by
        <a href="https://prismjs.com" target="_blank">Prism</a>. It shows a small header with the language and an
        optional filename or title, and a copy button that puts the code on the clipboard with one click.
    </p>
    <p>
        There are two ways to give it code. Pass a <code class="inline">code</code> attribute with a PHP string, or
        write the snippet directly between the opening and closing tags using the default slot. The attribute is
        the easier and safer choice, since Blade escapes it for you automatically. Written as a slot, any
        <code class="inline">&lt;</code> <code class="inline">&gt;</code> or <code class="inline">&amp;</code> in
        the code needs to be written as an HTML entity by hand, the same as any other raw
        <code class="inline">&lt;pre&gt;&lt;code&gt;</code> block.
    </p>

    <h2 id="basic">Basic Usage</h2>
    <x-bladewind::code-block language="php" code="Route::get('/users', [UserController::class, 'index']);"></x-bladewind::code-block>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::code-block language="php" code="Route::get('/users', [UserController::class, 'index']);"&gt;
            &lt;/x-bladewind::code-block&gt;
        </code>
    </pre>

    <h2 id="languages">Languages</h2>
    <p>
        Set <code class="inline">language</code> to any language Prism supports. This component bundles
        <code class="inline">markup</code> <code class="inline">css</code> <code class="inline">javascript</code>
        <code class="inline">php</code> <code class="inline">bash</code> <code class="inline">json</code>
        <code class="inline">sql</code> <code class="inline">python</code> and <code class="inline">yaml</code>.
    </p>
    <x-bladewind::code-block language="javascript" code="const total = items.reduce((sum, item) => sum + item.price, 0);"></x-bladewind::code-block>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::code-block language="javascript" code="const total = items.reduce((sum, item) => sum + item.price, 0);"&gt;
            &lt;/x-bladewind::code-block&gt;
        </code>
    </pre>

    <h2 id="title">Title</h2>
    <p>Give a code block a <code class="inline">title</code> to show a filename or a short label above the code.</p>
    @php
        $routesExample = <<<'PHP'
            Route::get('/users', [UserController::class, 'index']);
            Route::post('/users', [UserController::class, 'store']);
            Route::delete('/users/{user}', [UserController::class, 'destroy']);
            PHP;
    @endphp
    <x-bladewind::code-block language="php" title="routes/web.php" :code="$routesExample"></x-bladewind::code-block>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::code-block language="php" title="routes/web.php" :code="$routesExample"&gt;
            &lt;/x-bladewind::code-block&gt;
        </code>
    </pre>

    <h2 id="line-numbers">Line Numbers</h2>
    <p>Set <code class="inline">line_numbers="true"</code> to number every line, useful for longer snippets.</p>
    <x-bladewind::code-block language="php" line_numbers="true" :code="$routesExample"></x-bladewind::code-block>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::code-block language="php" line_numbers="true" :code="$routesExample"&gt;
            &lt;/x-bladewind::code-block&gt;
        </code>
    </pre>

    <h2 id="highlight">Highlighting Lines</h2>
    <p>
        Set <code class="inline">highlight_lines</code> to draw attention to specific lines, using
        Prism's line-highlight syntax: a single line number, a range, or a comma separated mix of both, for
        example <code class="inline">"2"</code> or <code class="inline">"3-5,8"</code>.
    </p>
    <x-bladewind::code-block language="php" line_numbers="true" highlight_lines="2" :code="$routesExample"></x-bladewind::code-block>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::code-block language="php" line_numbers="true" highlight_lines="2" :code="$routesExample"&gt;
            &lt;/x-bladewind::code-block&gt;
        </code>
    </pre>

    <h2 id="wrap">Wrapping Long Lines</h2>
    <p>
        A code block scrolls horizontally by default when a line is too long to fit. Set
        <code class="inline">wrap="true"</code> to wrap long lines onto the next line instead.
    </p>
    <x-bladewind::code-block language="bash" wrap="true" code="php artisan make:model Product -mfsc --policy --api"></x-bladewind::code-block>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::code-block language="bash" wrap="true" code="php artisan make:model Product -mfsc --policy --api"&gt;
            &lt;/x-bladewind::code-block&gt;
        </code>
    </pre>

    <h2 id="copy">Copy Action</h2>
    <p>
        A copy button is shown by default, in the top right of the header. Set
        <code class="inline">show_copy="false"</code> to hide it.
    </p>
    <x-bladewind::code-block language="json" show_copy="false" code='{"name": "bladewindui/ui", "license": "MIT"}'></x-bladewind::code-block>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::code-block language="json" show_copy="false" code='{"name": "bladewindui/ui", "license": "MIT"}'&gt;
            &lt;/x-bladewind::code-block&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>code</td>
            <td><em>blank</em></td>
            <td>The code to display, as a PHP string. Escaped automatically. Leave blank to write the snippet in the default slot instead.</td>
        </tr>
        <tr>
            <td>language</td>
            <td>markup</td>
            <td><code class="inline">markup</code> <code class="inline">css</code> <code class="inline">javascript</code> <code class="inline">php</code> <code class="inline">bash</code> <code class="inline">json</code> <code class="inline">sql</code> <code class="inline">python</code> <code class="inline">yaml</code></td>
        </tr>
        <tr>
            <td>title</td>
            <td><em>blank</em></td>
            <td>An optional filename or label shown in the header.</td>
        </tr>
        <tr>
            <td>line_numbers</td>
            <td>false</td>
            <td>Numbers every line. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>highlight_lines</td>
            <td><em>blank</em></td>
            <td>Lines to highlight, using Prism's line-highlight syntax, for example <code class="inline">"2"</code> or <code class="inline">"3-5,8"</code>.</td>
        </tr>
        <tr>
            <td>wrap</td>
            <td>false</td>
            <td>Wraps long lines instead of scrolling horizontally. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>show_copy</td>
            <td>true</td>
            <td>Shows a button that copies the code to the clipboard. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>show_language_label</td>
            <td>true</td>
            <td>Shows the language name in the header. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Any additional CSS classes you wish to add.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > code-block.blade.php</code>. Syntax highlighting is powered by <a href="https://prismjs.com" target="_blank">Prism</a>.
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#basic">Basic usage</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#languages">Languages</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#title">Title</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#line-numbers">Line numbers</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#highlight">Highlighting lines</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#wrap">Wrapping long lines</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#copy">Copy action</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-code-block');
        </script>
    </x-slot:scripts>
</x-app>
