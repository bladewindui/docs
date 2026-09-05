<x-app>
    <x-slot:title>Currency Input Component</x-slot:title>
    <x-slot:page_title>Currency Input</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::currency-input</code> wraps <a href="/component/input">Input</a>'s existing
        money-masking (thousands separators, a fixed decimal precision) and adds the one thing that mask alone
        cannot: the correct currency symbol, in the correct position, with separators written the way the given
        locale actually writes them.
    </p>

    <x-bladewind::currency-input name="price" label="Price" />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::currency-input name="price" label="Price" /&gt;
        </code>
    </pre>
    <p>
        The default <code class="inline">currency</code> is <code class="inline">USD</code> and the default
        <code class="inline">locale</code> is <code class="inline">en-US</code>, both overridable globally via
        <code class="inline">config('bladewind.currency_input')</code>.
    </p>

    <h2 id="currency">Currency and locale</h2>
    <p>
        Set <code class="inline">currency</code> to any ISO 4217 code. When PHP's <code class="inline">intl</code>
        extension is installed, <code class="inline">locale</code> (a BCP 47 tag) decides where the symbol sits and
        which characters separate thousands and decimals — for example, French writes
        <code class="inline">1 234,56&nbsp;€</code> where U.S. English writes <code class="inline">$1,234.56</code>,
        for the same amount in the same currency.
    </p>

    <div class="space-y-2">
        <x-bladewind::currency-input name="price_usd" label="US Dollar" currency="USD" locale="en-US" />
        <x-bladewind::currency-input name="price_eur" label="Euro (French formatting)" currency="EUR" locale="fr-FR" />
        <x-bladewind::currency-input name="price_ghs" label="Ghanaian Cedi" currency="GHS" locale="en-GH" />
        <x-bladewind::currency-input name="price_jpy" label="Japanese Yen (no decimals)" currency="JPY" locale="ja-JP" />
    </div>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::currency-input name="price_usd" label="US Dollar" currency="USD" locale="en-US" /&gt;
            &lt;x-bladewind::currency-input name="price_eur" label="Euro (French formatting)" currency="EUR" locale="fr-FR" /&gt;
            &lt;x-bladewind::currency-input name="price_ghs" label="Ghanaian Cedi" currency="GHS" locale="en-GH" /&gt;
            &lt;x-bladewind::currency-input name="price_jpy" label="Japanese Yen (no decimals)" currency="JPY" locale="ja-JP" /&gt;
        </code>
    </pre>
    <p>
        Without the <code class="inline">intl</code> extension, every currency still gets a sensible symbol (a small
        built-in table covers the common ones; anything else falls back to the currency code itself) and the correct
        number of decimal places — zero for currencies like <code class="inline">JPY</code> that have no minor unit,
        two for everything else — always shown as a prefix with <code class="inline">.</code> and
        <code class="inline">,</code> separators.
    </p>

    <h2 id="overrides">Overriding individual parts</h2>
    <p>
        Any part of the derived format can be set explicitly, which always wins over whatever
        <code class="inline">currency</code>/<code class="inline">locale</code> would otherwise produce:
        <code class="inline">symbol</code>, <code class="inline">symbolPosition</code>
        (<code class="inline">prefix</code> or <code class="inline">suffix</code>),
        <code class="inline">decimalSeparator</code>, <code class="inline">thousandsSeparator</code>, and
        <code class="inline">precision</code>.
    </p>

    <x-bladewind::currency-input name="price_custom" label="Custom symbol" symbol="US$" symbol-position="suffix" />

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::currency-input name="price_custom" label="Custom symbol" symbol="US$" symbol-position="suffix" /&gt;
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
            <td>currency</td>
            <td>USD</td>
            <td>Any ISO 4217 currency code.</td>
        </tr>
        <tr>
            <td>locale</td>
            <td>en-US</td>
            <td>A BCP 47 locale tag. Only affects output when PHP's intl extension is installed.</td>
        </tr>
        <tr>
            <td>symbol</td>
            <td><em>derived</em></td>
            <td>Overrides the currency symbol entirely.</td>
        </tr>
        <tr>
            <td>symbolPosition</td>
            <td><em>derived</em></td>
            <td><code class="inline">prefix</code> | <code class="inline">suffix</code></td>
        </tr>
        <tr>
            <td>decimalSeparator</td>
            <td><em>derived</em></td>
            <td>Character separating the decimal part.</td>
        </tr>
        <tr>
            <td>thousandsSeparator</td>
            <td><em>derived</em></td>
            <td>Character grouping thousands.</td>
        </tr>
        <tr>
            <td>precision</td>
            <td><em>derived</em></td>
            <td>Number of decimal places. 0 disables decimals entirely.</td>
        </tr>
        <tr>
            <td>label</td>
            <td><em>(blank)</em></td>
            <td>Label displayed on the field.</td>
        </tr>
        <tr>
            <td>required</td>
            <td>false</td>
            <td>Marks the field as required.</td>
        </tr>
        <tr>
            <td>size</td>
            <td>regular</td>
            <td>Any Input size.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > currency-input.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#currency">Currency and locale</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#overrides">Overriding individual parts</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-currency-input');
        </script>
    </x-slot>
</x-app>
