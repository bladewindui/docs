<x-app>
    <x-slot:title>Table Component</x-slot:title>
    <x-slot:page_title>Table</x-slot:page_title>

    <div>
    <p>Display tabular data beautifully in a simple way. </p>
    <p>This component like all other BladewindUI components is simple to use with a few options to customise the component to suit your app needs. A BladewindUI table consists of two parts. The table header and the table body. </p>

    @php
        $users = include resource_path('views/docs/users.php');
    @endphp
    <p>
        <x-bladewind::table>
            <x-slot name="header">
                <th>Name</th>
                <th>Department</th>
                <th>Email</th>
            </x-slot>
            <tr>
                <td>Alfred Rowe</td>
                <td>Consulting</td>
                <td>
                    alfred@therowe.com
                </td>
            </tr>
            <tr>
                <td>Abigail Edwin</td>
                <td>Quality Assurance</td>
                <td>
                    abigail@edwin.com
                </td>
            </tr>
            <tr>
                <td>Michael K. Ocansey</td>
                <td>Development</td>
                <td>
                    kabutey@gmail.com
                </td>
            </tr>
            <tr>
                <td>John C. Doe</td>
                <td>Virtual Reality</td>
                <td>
                    johncdoe@faked.com
                </td>
            </tr>
        </x-bladewind::table>
    </p>

    <pre class="language-markup line-numbers">
        <code>
             &lt;x-bladewind::table&gt;
                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Name&lt;/th&gt;
                    &lt;th&gt;Department&lt;/th&gt;
                    &lt;th&gt;Email&lt;/th&gt;
                &lt;/x-slot&gt;
                &lt;tr&gt;
                    &lt;td&gt;Alfred Rowe&lt;/td&gt;
                    &lt;td&gt;Outsourcing&lt;/td&gt;
                    &lt;td&gt;alfred@therowe.com&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                    &lt;td&gt;Michael K. Ocansey&lt;/td&gt;
                    &lt;td&gt;Tech&lt;/td&gt;
                    &lt;td&gt;kabutey@gmail.com&lt;/td&gt;
                &lt;/tr&gt;
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>
    <p>
        By default the table component does not display a border around the table. You can enable this by setting.
        <code class="inline text-red-500">has_border="true"</code>
    </p>
 <p>
        <x-bladewind::table has_border>
            <x-slot name="header">
                <th>Name</th>
                <th>Department</th>
                <th>Email</th>
            </x-slot>
            <tr>
                <td>Alfred Rowe</td>
                <td>Consulting</td>
                <td>
                    alfred@therowe.com
                </td>
            </tr>
            <tr>
                <td>Abigail Edwin</td>
                <td>Quality Assurance</td>
                <td>
                    abigail@edwin.com
                </td>
            </tr>
            <tr>
                <td>Michael K. Ocansey</td>
                <td>Development</td>
                <td>
                    kabutey@gmail.com
                </td>
            </tr>
            <tr>
                <td>John C. Doe</td>
                <td>Virtual Reality</td>
                <td>
                    johncdoe@faked.com
                </td>
            </tr>
        </x-bladewind::table>
    </p>

    <pre class="language-markup line-numbers" data-line="2">
        <code>
             &lt;x-bladewind::table
                has_border="true"&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <h2 id="nogaps">No Gaps</h2>
    <p>By default the BladewindUI table  rows are displayed with wide gaps to place more emphasis on each row and it’s content. Each row also has a default hover effect that highlights the left and right borders of the row. These can both be turned off. </p>
    <p>To remove the wide gaps between the table rows you need to set the divider attribute to thin, like this, <code class="inline text-red-500">divider="thin"</code>. </p>

    <x-bladewind::table divider="thin">
        <x-slot name="header">
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
        </x-slot>
        <tr>
            <td>Alfred Rowe</td>
            <td>Consulting</td>
            <td>
                alfred@therowe.com
            </td>
        </tr>
        <tr>
            <td>Abigail Edwin</td>
            <td>Quality Assurance</td>
            <td>
                abigail@edwin.com
            </td>
        </tr>
        <tr>
            <td>Michael K. Ocansey</td>
            <td>Development</td>
            <td>
                kabutey@gmail.com
            </td>
        </tr>
        <tr>
            <td>John C. Doe</td>
            <td>Virtual Reality</td>
            <td>
                johncdoe@faked.com
            </td>
        </tr>
    </x-bladewind::table>

    <pre class="language-markup line-numbers" data-line="2">
        <code>
             &lt;x-bladewind::table
                divider="thin"&gt;
                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Name&lt;/th&gt;
                    ...
                &lt;/x-slot&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <h2 id="nodivider">No Divider</h2>
    <p>It is also possible to completely turn off the divider lines.</p>
    <p>To remove the divider completely, set the divided attribute to false, like this, <code class="inline text-red-500">divided="false"</code>. </p>
    <p>
    <x-bladewind::table divided="false">
        <x-slot name="header">
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
        </x-slot>
        <tr>
            <td>Alfred Rowe</td>
            <td>Consulting</td>
            <td>
                alfred@therowe.com
            </td>
        </tr>
        <tr>
            <td>Abigail Edwin</td>
            <td>Quality Assurance</td>
            <td>
                abigail@edwin.com
            </td>
        </tr>
        <tr>
            <td>Michael K. Ocansey</td>
            <td>Development</td>
            <td>
                kabutey@gmail.com
            </td>
        </tr>
        <tr>
            <td>John C. Doe</td>
            <td>Virtual Reality</td>
            <td>
                johncdoe@faked.com
            </td>
        </tr>
    </x-bladewind::table>

    <pre class="language-markup line-numbers" data-line="2">
        <code>
             &lt;x-bladewind::table
                divided="false"&gt;
                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Name&lt;/th&gt;
                    ...
                &lt;/x-slot&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <h2 id="nohover">No Hover Effect</h2>
    <p>To remove the beautiful green side border effect when users hover on each row, set the hover attribute to false, like this, <code class="inline text-red-500">has_hover="false"</code>. </p>
    <x-bladewind::table has_hover="false" divider="thin">
        <x-slot name="header">
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
        </x-slot>
        <tr>
            <td>Alfred Rowe</td>
            <td>Consulting</td>
            <td>
                alfred@therowe.com
            </td>
        </tr>
        <tr>
            <td>Abigail Edwin</td>
            <td>Quality Assurance</td>
            <td>
                abigail@edwin.com
            </td>
        </tr>
        <tr>
            <td>Michael K. Ocansey</td>
            <td>Development</td>
            <td>
                kabutey@gmail.com
            </td>
        </tr>
        <tr>
            <td>John C. Doe</td>
            <td>Virtual Reality</td>
            <td>
                johncdoe@faked.com
            </td>
        </tr>
    </x-bladewind::table>

    <pre class="language-markup line-numbers" data-line="2">
        <code>
                &lt;x-bladewind::table
                    has_hover="false"
                    divider="thin"&gt;

                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Name&lt;/th&gt;
                    ...
                &lt;/x-slot&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>
    <h2 id="compact">Compact</h2>
    <p>If the table feels too airy and spaced, there is a <code class="inline text-red-500">compact="true"</code> attribute to tighten things up.</p>
    <x-bladewind::table compact="true" divider="thin">
        <x-slot name="header">
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
        </x-slot>
        <tr>
            <td>Alfred Rowe</td>
            <td>Consulting</td>
            <td>
                alfred@therowe.com
            </td>
        </tr>
        <tr>
            <td>Abigail Edwin</td>
            <td>Quality Assurance</td>
            <td>
                abigail@edwin.com
            </td>
        </tr>
        <tr>
            <td>Michael K. Ocansey</td>
            <td>Development</td>
            <td>
                kabutey@gmail.com
            </td>
        </tr>
        <tr>
            <td>John C. Doe</td>
            <td>Virtual Reality</td>
            <td>
                johncdoe@faked.com
            </td>
        </tr>
    </x-bladewind::table>
<br />
    <pre class="language-markup line-numbers" data-line="2">
        <code>
                &lt;x-bladewind::table
                    compact="true"
                    divider="thin"&gt;

                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Name&lt;/th&gt;
                    ...
                &lt;/x-slot&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <h2 id="striped">Striped Table</h2>
    <p>Design experts argue that it is sometimes easier for users to visually scan tabular data if the table has striped rows. We are not challenging the experts. We’ve however made it possible for you to make your BladewindUI tables have striped rows. Set <code class="inline text-red-500">striped="true"</code> on the table component  to get a striped table. </p>

    <x-bladewind::table striped="true" divider="thin">
        <x-slot name="header">
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
        </x-slot>
        <tr>
            <td>Alfred Rowe</td>
            <td>Consulting</td>
            <td>
                alfred@therowe.com
            </td>
        </tr>
        <tr>
            <td>Abigail Edwin</td>
            <td>Quality Assurance</td>
            <td>
                abigail@edwin.com
            </td>
        </tr>
        <tr>
            <td>Michael K. Ocansey</td>
            <td>Development</td>
            <td>
                kabutey@gmail.com
            </td>
        </tr>
        <tr>
            <td>John C. Doe</td>
            <td>Virtual Reality</td>
            <td>
                johncdoe@faked.com
            </td>
        </tr>
        <tr>
            <td>Jane Ama Doe</td>
            <td>Virtual Reality</td>
            <td>
                jane.doe@faked.com
            </td>
        </tr>
    </x-bladewind::table>

    <pre class="language-markup line-numbers" data-line="2">
        <code>
            &lt;x-bladewind::table
                striped="true"
                divider="thin"&gt;

                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Name&lt;/th&gt;
                    ...
                &lt;/x-slot&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <h2 id="celled">Celled Table</h2>
    <p>If you want your tables looking like an excel spreadsheet with each cell having all round borders, set <code class="inline text-red-500">celled="true"</code>. </p>

    <x-bladewind::table celled="true" divider="thin">
        <x-slot name="header">
            <th>Name</th>
            <th>Department</th>
            <th>Earnings</th>
            <th>Tax</th>
            <th>Amt. Due</th>
        </x-slot>
        <tr>
            <td>Alfred Rowe</td>
            <td>Consulting</td>
            <td>1,200</td>
            <td>120</td>
            <td>1,080</td>
        </tr>
        <tr>
            <td>Abigail Edwin</td>
            <td>Quality Assurance</td>
            <td>1,500</td>
            <td>135</td>
            <td>1,365</td>
        </tr>
        <tr>
            <td>Michael K. Ocansey</td>
            <td>Development</td>
            <td>1,390</td>
            <td>125</td>
            <td>1,265</td>
        </tr>
        <tr>
            <td>John C. Doe</td>
            <td>Virtual Reality</td>
            <td>1,100</td>
            <td>98</td>
            <td>98</td>
        </tr>
    </x-bladewind::table>

    <pre class="language-markup line-numbers" data-line="1">
        <code>
            &lt;x-bladewind::table celled="true"&gt;

                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Name&lt;/th&gt;
                    ...
                &lt;/x-slot&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <h2 id="totals">Cells for Totals</h2>
    <p>Accountants have this interesting habit of double underlining their totals. If that’s something that interests you, apply the class <code class="inline">double-underline</code> to the <code class="inline">td</code> that holds the total value you want double underlined. </p>

    <x-bladewind::table striped="true" divider="thin">
        <x-slot name="header">
            <th>Item</th>
            <th class="!text-center">Quantity</th>
            <th class="!text-right">Price (GHS)</th>
        </x-slot>
        <tr>
            <td>Office furniture</td>
            <td class="!text-center">2</td>
            <td class="text-right">4,300.00</td>
        </tr>
        <tr>
            <td>HP Laser Jet Printer</td>
            <td class="!text-center">1</td>
            <td class="text-right">3,000.00</td>
        </tr>
        <tr>
            <td colspan="2" class="text-right"></td>
            <td class="double-underline text-right">
                7,300.00
            </td>
        </tr>
    </x-bladewind::table>

    <pre class="language-markup line-numbers" data-line="10">
        <code>
            &lt;x-bladewind::table striped="true" divider="thin"&gt;

                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Name&lt;/th&gt;
                    ...
                &lt;/x-slot&gt;
                ...
                &lt;tr&gt;
                    &lt;td colspan="2" class="text-right"&gt;&lt;/td&gt;
                    &lt;td class="double-underline text-right"&gt;
                        7,300.00
                    &lt;/td&gt;
                &lt;/tr&gt;
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <h2 id="shadow">Table With Drop Shadow</h2>
    <p>You can add a subtle shadow effect to your BladewindUI tables by setting <code class="inline text-red-500">has_shadow="true"</code></p>

    <x-bladewind::table striped="true" divider="thin" has_shadow="true">
        <x-slot name="header">
            <th>Item</th>
            <th class="text-center">Quantity</th>
            <th class="text-right">Price (GHS)</th>
        </x-slot>
        <tr>
            <td>Office furniture</td>
            <td class="text-center">2</td>
            <td class="text-right">4,300.00</td>
        </tr>
        <tr>
            <td>HP Laser Jet Printer</td>
            <td class="text-center">1</td>
            <td class="text-right">3,000.00</td>
        </tr>
        <tr>
            <td colspan="2" class="text-right"></td>
            <td class="text-right">
                7,300.00
            </td>
        </tr>
    </x-bladewind::table>
    <br />
    <pre class="language-markup line-numbers" data-line="2">
        <code>
            &lt;x-bladewind::table
                has_shadow="true"
                striped="true"
                divider="thin"&gt;

                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Name&lt;/th&gt;
                    ...
                &lt;/x-slot&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <h2 id="selectable">Selectable Rows</h2>
    <p>There are cases you may want to show users which rows they have selected. You can achieve that by setting <code class="inline text-red-500">selectable="true"</code> on the table.
        Now, any time a user clicks on a row it will be selected. Clicking on multiple rows will select them all. Clicking on a row that is already selected will unselect it. The
        cursor changes to <code class="inline">cursor-pointer</code> when a table is defined as selectable. Cool shortcuts like Ctrl+Click or Shift+Click do not work here.</p>

    <x-bladewind::table selectable="true" divider="thin">
        <x-slot:header>
            <th>Item</th>
            <th class="!text-center">Quantity</th>
            <th class="!text-right">Unit Price (GHS)</th>
        </x-slot:header>
        <tr>
            <td>Office furniture</td>
            <td class="text-center">2</td>
            <td class="text-right">4,300.00</td>
        </tr>
        <tr>
            <td>HP Laser Jet Printer</td>
            <td class="text-center">1</td>
            <td class="text-right">3,000.00</td>
        </tr>
        <tr>
            <td>Macbook Pro M3 (13'')</td>
            <td class="text-center">4</td>
            <td class="text-right">24,300.00</td>
        </tr>
        <tr>
            <td>iPhone 15 Pro Max</td>
            <td class="text-center">12</td>
            <td class="text-right">19,000.00</td>
        </tr>
        <tr>
            <td>Laptop Sleeve (Black)</td>
            <td class="text-center">5</td>
            <td class="text-right">800.00</td>
        </tr>
    </x-bladewind::table>
    <br />
    <pre class="language-markup line-numbers" data-line="1">
        <code>
            &lt;x-bladewind::table selectable="true" divider="thin"&gt;
                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Item&lt;/th&gt;
                    &lt;th&gt;Quantity&lt;/th&gt;
                    &lt;th&gt;Unit Price (GHS)&lt;/th&gt;
                &lt;/x-slot&gt;
                &lt;tr&gt;
                    &lt;td&gt;Office furniture&lt;/td&gt;
                    &lt;td class="text-center"&gt;2&lt;/td&gt;
                    &lt;td class="text-right"&gt;4,300.00&lt;/td&gt;
                &lt;/tr&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>
<h3 id="checkable">Checkable</h3>
    <p>
        We can take the selectable tables one step further by introducing checkboxes for every row. This is achieved by setting <code class="inline text-red-500">checkable="true"</code> on the table.
        Each row should now have a checkbox injected as the first column. If a table heading exists, a checkbox is also injected as the first column in the table heading.
        This becomes the master checkbox for checking or unchecking all other checkboxes at once. The state changes to a partial selected checkbox if some of the checkboxes are checked.
    </p>

        <x-bladewind::table selectable="true" divider="thin" checkable="true">
            <x-slot:header>
                <th>Item</th>
                <th class="!text-center">Quantity</th>
                <th class="!text-right">Unit Price (GHS)</th>
            </x-slot:header>
            <tr>
                <td>Office furniture</td>
                <td class="text-center">2</td>
                <td class="text-right">4,300.00</td>
            </tr>
            <tr>
                <td>HP Laser Jet Printer</td>
                <td class="text-center">1</td>
                <td class="text-right">3,000.00</td>
            </tr>
            <tr>
                <td>Macbook Pro M3 (13'')</td>
                <td class="text-center">4</td>
                <td class="text-right">24,300.00</td>
            </tr>
            <tr>
                <td>iPhone 15 Pro Max</td>
                <td class="text-center">12</td>
                <td class="text-right">19,000.00</td>
            </tr>
            <tr>
                <td>Laptop Sleeve (Black)</td>
                <td class="text-center">5</td>
                <td class="text-right">800.00</td>
            </tr>
        </x-bladewind::table>
        <br />
        <pre class="language-markup line-numbers" data-line="2">
        <code>
            &lt;x-bladewind::table selectable="true" checkable="true" divider="thin"&gt;
                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Item&lt;/th&gt;
                    &lt;th&gt;Quantity&lt;/th&gt;
                    &lt;th&gt;Unit Price (GHS)&lt;/th&gt;
                &lt;/x-slot&gt;
                &lt;tr&gt;
                    &lt;td&gt;Office furniture&lt;/td&gt;
                    &lt;td class="text-center"&gt;2&lt;/td&gt;
                    &lt;td class="text-right"&gt;4,300.00&lt;/td&gt;
                &lt;/tr&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>
    <p>
        Having selectable table rows definitely means you will want to do something with the selected values.
        <strong>You will need to append unique IDs</strong> (<code class="inline text-red-500">data-id="your-uuid-value"</code>)
        <strong>to your table rows in order for Bladewind to recognize and return them.</strong>
    </p>
    <p>
        You will also need to provide a name for the table. This will be the name of the input field that holds the
        comma separated list of table row IDs that are selected.
    </p>
    <br />
    <pre class="language-markup line-numbers" data-line="2,8,13">
        <code>
            &lt;x-bladewind::table selectable="true" checkable="true" divider="thin"
                name="office_supplies"&gt;
                &lt;x-slot name="header"&gt;
                    &lt;th&gt;Item&lt;/th&gt;
                    &lt;th&gt;Quantity&lt;/th&gt;
                    &lt;th&gt;Unit Price (GHS)&lt;/th&gt;
                &lt;/x-slot&gt;
                &lt;tr data-id="1"&gt;
                    &lt;td&gt;Office furniture&lt;/td&gt;
                    &lt;td class="text-center"&gt;2&lt;/td&gt;
                    &lt;td class="text-right"&gt;4,300.00&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr data-id="2"&gt;
                    &lt;td&gt;HP Laser Jet Printer&lt;/td&gt;
                    &lt;td class="text-center"&gt;2&lt;/td&gt;
                    &lt;td class="text-right"&gt;4,300.00&lt;/td&gt;
                &lt;/tr&gt;
                ...
            &lt;/x-bladewind::table&gt;
        </code>
    </pre>
    <br />
    <p>
        We now have a hidden input  injected on the page right after the table.
        <code class="inline">&lt;input type="hidden" name="office_supplies" class="office_supplies" /&gt</code>. We can now
        access the value of this input field using JavaScript or via a form submission if your table is placed within a form.
        In the example below we delete all table rows that are selected. Select more than one row.
    </p>
    <br />
    <x-bladewind::card reduce_padding="true">
        <div class="office-supplies-actions p-3 bg-gray-100/50 dark:bg-dark-700 rounded-lg hidden">
            <x-bladewind::button size="tiny" type="secondary" outline="true" icon="trash" color="red" onclick="deleteRows()">Delete</x-bladewind::button>
        </div>
        <x-bladewind::table selectable="true" divider="thin" checkable="true" name="office_supplies">
            <x-slot:header>
                <th>Item</th>
                <th class="!text-center">Quantity</th>
                <th class="!text-right">Unit Price (GHS)</th>
            </x-slot:header>
            <tr data-id="12">
                <td>Office furniture</td>
                <td class="text-center">2</td>
                <td class="text-right">4,300.00</td>
            </tr>
            <tr data-id="13">
                <td>HP Laser Jet Printer</td>
                <td class="text-center">1</td>
                <td class="text-right">3,000.00</td>
            </tr>
            <tr data-id="14">
                <td>Macbook Pro M3 (13'')</td>
                <td class="text-center">4</td>
                <td class="text-right">24,300.00</td>
            </tr>
            <tr data-id="15">
                <td>iPhone 15 Pro Max</td>
                <td class="text-center">12</td>
                <td class="text-right">19,000.00</td>
            </tr>
            <tr data-id="16">
                <td>Laptop Sleeve (Black)</td>
                <td class="text-center">5</td>
                <td class="text-right">800.00</td>
            </tr>
        </x-bladewind::table>
    </x-bladewind::card>

    <pre class="language-html line-numbers" data-line="14,21">
        <code>
    &lt;x-bladewind::card reduce_padding="true"&gt;
        &lt;!-- the delete button -->
        &lt;div class="office-supplies-actions p-3 bg-gray-100/50 rounded-lg hidden"&gt;
            &lt;x-bladewind::button size="tiny"
                type="secondary" outline="true"
                icon="trash" color="red"
                onclick="deleteRows()"&gt;
                Delete
            &lt;/x-bladewind::button&gt;
        &lt;/div&gt;

        &lt;x-bladewind::table selectable="true" divider="thin"
            checkable="true"
            name="office_supplies"&gt;
            &lt;x-slot:header&gt;
                &lt;th&gt;Item&lt;/th&gt;
                &lt;th class="!text-center"&gt;Quantity&lt;/th&gt;
                &lt;th class="!text-right"&gt;Unit Price (GHS)&lt;/th&gt;
            &lt;/x-slot:header&gt;
            &lt;tr data-id="12"&gt;
                &lt;td&gt;Office furniture&lt;/td&gt;
                &lt;td class="text-center"&gt;2&lt;/td&gt;
                &lt;td class="text-right"&gt;4,300.00&lt;/td&gt;
            &lt;/tr&gt;
            ...
        &lt;/x-bladewind::table&gt;
    &lt;/x-bladewind::card&gt;
        </code>
    </pre>
    <p>
        The above code will draw the table and let Bladewind do its checkboxing magic. You will however, need to write the code
        for working with the values of the selected table rows. The <code class="inline font-bold">deleteRows()</code> Javascript function below is what handles deleting of the
        rows selected by the user from the example above. <code class="inline font-bold">deleteRow()</code> is not a BladewindUI helper function.
    </p>

        <pre class="language-js line-numbers" data-line="14,21">
        <code>
    // domEl(), domEls() and hide() are BladewindUI helper functions
    deleteRows = () => {
        // Our table is named 'office_supplies' so input.office_supplies is
        // the hidden field Bladewind will write IDs of all selected rows to
        const selectedRows = domEl('input.office_supplies').value.split(',');

        // next we loop over all the rows of our 'office_supplies' table and
        // hide any row that's having the value of its 'data-id' attribute
        // in the selected rows array
        const tableRows = domEls('table.office_supplies tr');
        tableRows.forEach(row => {
            if(selectedRows.indexOf(row.getAttribute('data-id')) !== -1) {
                hide(row, true);
                hide('.office-supplies-actions');
                domEl('input.office_supplies').value = '';
            }
        });
    }
        </code>
    </pre>

<p>
    <x-bladewind::alert show_close_icon="false">
        If you want to by default select rows when your table loads, for example, in edit mode you want to display to the user the previous rows they selected.
        Set the <code class="inline text-red-500">selected_value</code> attribute on the table. This accepts a comma separated list of IDs.
    </x-bladewind::alert>
</p>
<pre class="language-html line-numbers" data-line="3">
<code>
&lt;x-bladewind::table selectable="true" divider="thin"
    checkable="true"
    selected_value="2,4,19,23"
    name="office_supplies"&gt;
    ...
</code>
</pre>
    <h2 id="dynamic">Display a Table From Dynamic Data</h2>
    <p>
        There is no point manually building a table tediously when you have an array that contains everything you want to display as a table.
        The table component has a <code class="inline text-red-500">data</code> attribute that accepts a json encoded array. The component builds its
        table headings using the array keys.
    </p>
    <p>
        Let us consider the array below and its resultant table.
    </p>
    <pre class="language-js line-numbers">
        <code>
            $staff = [
                [   'id' => 1,
                    'first_name' => 'Michael',
                    'last_name' => 'Ocansey',
                    'department' => 'Engineering',
                    'marital_status' => 1
                ],
                [
                    'id' => 2,
                    'first_name' => 'Alfred',
                    'last_name' => 'Rowe',
                    'department' => 'Engineering',
                    'marital_status' => 1
                ],
                [
                    'id' => 3,
                    'first_name' => 'Abigail',
                    'last_name' => 'Edwin',
                    'department' => 'Engineering',
                    'marital_status' => 0
                ],
            ];
        </code>
    </pre>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::table :data="$staff" /&gt;
        </code>
    </pre>

    <p>
        <x-bladewind::alert show_close_icon="false">
            Below is an alternative way to pass <code class="inline">data</code> to the component. Note there is no colon before the data attribute and in this case the data is passed as a json encoded string.
        </x-bladewind::alert>
    </p>

    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::table data="&#123;&#123; json_encode($staff) }}" /&gt;
        </code>
    </pre>

    @php
        $staff = [
            [ 'id' => 1, 'first_name' => 'Michael', 'last_name' => 'Ocansey',   'department' => 'Engineering', 'marital_status' => 1 ],
            [ 'id' => 2, 'first_name' => 'Alfred',  'last_name' => 'Rowe',     'department' => 'Engineering', 'marital_status' => 1 ],
            [ 'id' => 3, 'first_name' => 'Abigail',   'last_name' => 'Edwin',    'department' => 'Engineering', 'marital_status' => 0 ],
        ];
        $column_aliases = [ 'id' => 'ref #', 'marital_status' => 'married?' ];
        $action_icons = [
                [
                    'icon'  => 'chat-bubble-bottom-center-text',
                    'tip'   => 'send message',
                    'color' => 'green',
                    'icon_type' => 'solid', // default is outline
                    'button_outline' => false,
                    'click' => "sendMessage('{first_name}')",
                ],
                [
                    'icon'  => 'pencil-square',
                    'click' => "redirect('/user/{id}')",
                ],
                [
                    'icon'  => 'trash',
                    'color' => 'red',
                    'click' => "deleteUser({id}, '{first_name}')",
                ],
            ];
    @endphp
    <p>
        <x-bladewind::table :data="$staff" />
    </p>
    <p>
        As you can tell from the above example, the component simply picks the array passed to it and generates a table.
        You can apply all the <a href="#attributes">table attributes</a> to remove the hover effect, remove the gaps or even make the table striped.
    </p>
    <h3 id="customize-columns">Excluding and Including Columns</h3>
    <p>
        By default, the table picks the keys of the array and generates its table headings.
        Any key with underscores will be replaced with spaces. <b>first_name</b> becomes <b>first name</b>.
        An API will return staff data with the ID of each user, but it is rare to see the IDs displayed in  a table.
        The table component allows you to exclude some columns using the <code class="text-red-500 inline">exclude_columns</code> attribute.
        There is also the <code class="text-red-500 inline">include_columns</code> attribute that lets you specify the only columns to be displayed.
    </p>
    <p>
        If you have an array with 20 fields and you want to display 5 out of the 20 fields, it will be easier to specify the 5 columns in the <code class="inline text-red-500">include_columns</code>
        attribute rather than specifying 15 columns in the <code class="inline text-red-500">exclude_columns</code> attribute.
        Let us exclude <code class="inline">id</code> and <code class="inline">marital_status</code> from our table above.
    </p>
    <p>
        <x-bladewind::alert show_close_icon="false" show_icon="false">
            <code class="text-red-500 inline">include_columns</code> takes precedence over <code class="text-red-500 inline">exclude_columns</code>. If you specify both attributes, <code class="text-red-500 inline">exclude_columns</code> will be ignored.
        </x-bladewind::alert>
    </p>
    <x-bladewind::table :data="$staff" exclude_columns="id, marital_status" />
<pre class="language-markup line-numbers" data-line="2">
<code>
    &lt;x-bladewind::table
        exclude_columns="id, marital_status"
        :data="$staff" /&gt;
</code>
</pre>
    <h3 id="action-icons">Displaying Action Icons</h3>
    <p>
        Using the table component with dynamic data allows you to specify some extra cool attributes.
        You can show action icons by passing a json encoded array in the <code class="text-red-500 inline">action_icons</code> attribute.
        Each action icon can have the name of the icon, the icon type (outline or solid), the icon colour (default is the <a href="/component/button#secondary">secondary button</a> colour), a tooltip and the click action of the icon.
        The icons will be displayed in the order they are entered into the array.
    </p>
        <x-bladewind::alert type="warning" show_close_icon="false">
            This approach of using pipes as separators will be deprecated in v4.0.0. use the array approach instead
        </x-bladewind::alert>
<pre class="language-js line-numbers">
<code>
    // this approach of using pipes (|) will be deprecated in v4.0.0
    // use the array approach instead
    $action_icons = [
        "icon:chat | tip:send message | color:green | click:sendMessage('{first_name}')",
        "icon:pencil | click:redirect('/user/{id}')",
        "icon:trash | color:red | click:deleteUser({id}, '{first_name}')",
    ];
</code>
</pre>
    <br />
    <x-bladewind::alert type="info" show_close_icon="false">
        Use the array approach instead
    </x-bladewind::alert>
<pre class="language-js line-numbers">
<code>
    // define the action icons array

    $action_icons = [
    [
        'icon'  => 'chat-bubble-bottom-center-text',
        'tip'   => 'send message',
        'color' => 'green',
        'icon_type' => 'solid', // default is outline
        'button_outline' => false,
        'click' => "sendMessage('{first_name}')",
    ],
    [
        'icon'  => 'pencil-square',
        'click' => "redirect('/user/{id}')",
    ],
    [
        'icon'  => 'trash',
        'color' => 'red',
        'click' => "deleteUser({id}, '{first_name}')",
    ],
];
</code>
</pre>
    <script>
        sendMessage = (first_name) => {
            showModal('send-message');
            domEl('.bw-send-message .modal-title').innerText = `Send Message to ${first_name}`;
        }
        deleteUser = (id, first_name) => {
            showModal('delete-user');
            domEl('.bw-delete-user .title').innerText = `${first_name}`;
        }
        redirect = (url) => {
            window.open(url);
        }
    </script>
    <x-bladewind::modal name="send-message" title="">
        <div class="mb-6">The message will be delivered to their company inbox if they are not currently online</div>
        <x-bladewind::textarea placeholder="Type message here..." rows="5"></x-bladewind::textarea>
    </x-bladewind::modal>
    <x-bladewind::modal name="delete-user" type="error" title="Confirm User Deletion">
        Are you really sure you want to delete <b class="title"></b>?
        This action cannot be reversed.
    </x-bladewind::modal>

<pre class="language-markup line-numbers" data-line="2,4">
<code>
    &lt;x-bladewind::table
        exclude_columns="id, marital_status"
        divider="thin"
        :action_icons="$action_icons"
        :data="$staff" /&gt;
</code>
</pre>
    <p>
        <x-bladewind::table :data="$staff" divider="thin" :action_icons="$action_icons"  exclude_columns="id, marital_status" />
    </p>

    <br />
    <p>
        The icons are displayed from the <code class="inline">$action_icons</code> array above. Let us analyze the first element in the <code class="inline">$action_icons</code> array.
    </p>
    <x-bladewind::table striped="true">
        <tr>
            <td><b>icon</b></td>
            <td>chat-bubble-left</td>
            <td>This will display the <b>chat-bubble-left</b> icon</td>
        </tr>
        <tr>
            <td nowrap="nowrap"><b>icon_type</b></td>
            <td nowrap="nowrap">solid</td>
            <td>The solid version of the icon will be displayed instead of the outline version. <br /><code class="inline">solid</code> <code class="inline">outline</code></td>
        </tr>
        <tr>
            <td nowrap="nowrap"><b>button_outline</b></td>
            <td nowrap="nowrap">true</td>
            <td>If <code class="inline">true</code>, the button will have no background colour. Just an outline matching the value defined for <code class="inline">color</code>. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td nowrap="nowrap"><b>tip</b></td>
            <td nowrap="nowrap">send user a message</td>
            <td>On hover of the icon, the user will see a tooltip that says "send user a message"</td>
        </tr>
        <tr>
            <td><b>click</b></td>
            <td>sendMessage('{first_name}')</td>
            <td>
                When the icon is clicked, the <b>sendMessage</b> Javascript function is triggered. The function name can be any function that exists in your code.
                Two parameters are passed to the function. The parameters can be any of the keys that exists in your array. In our earlier example our array contains
                the <b>first_name</b> key so we pass this to our function. It is important to wrap strings in a single quote.
                The keys also need to be wrapped in curly braces. The table component will replace <em>'{first_name}'</em> with the actual value of first_name from the array.
            </td>
        </tr>
        <tr>
            <td><b>color</b></td>
            <td>green</td>
            <td>The icon and button colour will be green. If <code class="inline">button_outline="false"</code>, the entire button will be green</td>
        </tr>
    </x-bladewind::table>
    <br />
    <p>
        Below are the modals and Javascript functions being called when the icons are clicked. Mind you, the Javascript functions
        below are just for the documentation. THey need to be your own functions that you will call when the action icons are clicked.
    </p>
    <pre class="line-numbers language-markup">
        <code>
            &lt;!-- send message modal -->
            &lt;x-bladewind.modal name="send-message" title=""&gt;
                &lt;div class="mb-6"&gt;
                    The message will be delivered to their company
                    inbox if they are not currently online
                &lt;/div&gt;
                &lt;x-bladewind.textarea
                    placeholder="Type message here..." rows="5" /&gt;
            &lt;/x-bladewind.modal&gt;

            &lt;!-- delete user modal -->
            &lt;x-bladewind.modal
                    name="delete-user"
                    type="error" title="Confirm User Deletion"&gt;
                Are you really sure you want to delete &lt;b class="title"&gt;&lt;/b&gt;?
                This action cannot be reversed.
            &lt;/x-bladewind.modal&gt;
        </code>
    </pre>

    <pre class="language-js line-numbers">
        <code>
        sendMessage = (first_name, last_name) => {
            showModal('send-message');
            domEl('.bw-send-message .modal-title').innerText = `Send Message to ${first_name} ${last_name}`;
        }

        deleteUser = (id, first_name, last_name) => {
            showModal('delete-user');
            domEl('.bw-delete-user .title').innerText = `${first_name} ${last_name}`;
        }

        redirect = (url) => {
            window.open(url);
        }
        </code>
    </pre>

        <h2 id="onclick">Passing Custom Functions onClick</h2>
        <p>
            If the action icons are not enough, you can pass a custom function to the <code class="inline text-red-500">onclick</code> attribute.
            This function will be triggered when a user clicks anywhere on the row. You can use this to redirect users to a profile page or display a modal with more details.
            The function must be any valid function that exists in your code. You can pass any of the keys that exists in your array as parameters to the function.
            The keys need to be wrapped in curly braces. For example: with <code class="inline text-red-500">onclick=('/user/profile/', '{first_name}', '{last_name}')</code>,
            the table component will replace <em>'{first_name}'</em> with the actual value of first_name from your <code class="inline">$data</code> array.
        </p>
        <p>
            <x-bladewind::alert show_close_icon="false">
                Rows with custom click functions have <code>cursor-pointer</code> applied to them.
            </x-bladewind::alert><br />
            <x-bladewind::alert show_close_icon="false">
                To prevent users from accidentally triggering the custom click function when they click on any action icon, the action icons cell does not inherit the custom click function.
            </x-bladewind::alert>
        </p>
        <p>
            <x-bladewind::table :data="$staff" onclick="goToProfile('/user/profile/', '{first_name}', '{last_name}')" :action_icons="$action_icons" />
            <script>
                goToProfile = (url, firstname, lastname) => {
                    alert(`You clicked on ${firstname} ${lastname}. Redirecting to ${url}`);
                }
            </script>
        </p>
<pre class="language-markup line-numbers">
<code>
    &lt;x-bladewind::table :data="$staff"
        onclick="goToProfile('/user/profile', '{first_name'}, '{last_name}')" /&gt;
</code>
    </pre>
        <pre class="language-js line-numbers">
        <code>
            goToProfile = (url, firstname, lastname) => {
                alert(`You clicked on ${firstname} ${lastname}. Redirecting to ${url}`);
            }
        </code>
    </pre>

    <h3 id="nodata">No Data Returned</h3>
    <p>
        When building dynamic table you will most likely be fetching your data from either an API or a database. You will barely be manually creating arrays as we did above.
        Now with dynamic data, it is likely your API or query will return no records. You can display a custom translatable message in such a case. You can set the
        <code class="inline text-red-500">no_data_message</code> to any message you wish to display.
    </p>

    @php
        $no_staff = $column_aliases = [];
        $column_aliases = [ 'id' => 'ref #', 'first_name' => 'first name', 'last_name' => 'last name',  'marital_status' => 'married?' ];
    @endphp
    <p>
        <x-bladewind::table :data="$no_staff" no_data_message="The staff directory is empty" />
    </p>

<pre class="language-html line-numbers" data-line="2,5">
<code>
&lt;x-bladewind::table
    no_data_message="The staff directory is empty"
    :data="$staff"  /&gt;
</code>
</pre>
<br />
    <p>
        The dynamic table builds its column headings from the array keys defined in <code class="inline text-red-500">data</code>.
        When there are no records to display, the array will be empty, thus, there will be no column headings to deduce. This is why there are no columns displayed with the
        <strong>no data message</strong>.
        If you wish to display column headings with the <strong>no data message</strong>, you will need to pass <code class="inline text-red-500">column_aliases</code>.
    </p>
    <p>
        <x-bladewind::table has_border="true" :data="$no_staff" :column_aliases="$column_aliases" no_data_message="The staff directory is empty" />
    </p>

<pre class="language-php line-numbers">
<code>
    $column_aliases = [
        'id' => 'ref #',
        'first_name' => 'first name',
        'last_name' => 'last name',
        'marital_status' => 'married?'
    ];
</code>
</pre>
<pre class="language-html line-numbers" data-line="2,4">
<code>
&lt;x-bladewind::table
    has_border="true"
    no_data_message="The staff directory is empty"
    :column_aliases="$column_aliases"
    :data="$staff"  /&gt;
</code>
</pre>
        <br />
<p>
    Finally, it is possible to display the <strong>no data message</strong> using the <a href="/component/empty-state">Empty State</a> component.
    All the attributes of the component are allowed except <code class="inline text-red-500">message</code> and <code class="inline text-red-500">class</code>, since the table component already has its own class attribute,
    and message here is already <code class="inline text-red-500">no_data_message</code>.
</p>
    <p>
        To display the message in an empty state, set the attribute <code class="inline text-red-500">message_as_empty_state="true"</code>.
    </p>

    <p>
        <x-bladewind::table has_border="true"
            :data="$no_staff"
            :column_aliases="$column_aliases"
            no_data_message="The staff directory is empty"
            message_as_empty_state="true"
            button_label="add staff member"/>
    </p>
<pre class="language-html line-numbers" data-line="6">
<code>
&lt;x-bladewind::table
    :data="$no_staff"
    has_border="true"
    :column_aliases="$column_aliases"
    no_data_message="The staff directory is empty"
    message_as_empty_state="true"
    button_label="add staff member" /&gt;
</code>
</pre>
    <p>
        <x-bladewind::alert show_close_icon="false">
            Check out the <a href="/component/empty-state">Empty State</a> component for information on how to use its attributes.
        </x-bladewind::alert>
    </p>

    <h3 id="searchable">Searchable Table Data</h3>
    <p>
        The table component provides a very basic way for users to search through table content.
        If the <code class="text-red-500 inline">searchable="true"</code> attribute is set,
        a search field is placed above the table that makes it possible to search through any column of the table.
        The placeholder text for the search input can be replaced by setting the <code class="text-red-500 inline">search_placeholder</code> attribute on the table. Non-dynamic tables can also be searchable.
    </p>
    <x-bladewind::table searchable="true" search_placeholder="Find staff members by name..."
        :data="$staff" divider="thin" :action_icons="$action_icons"
        exclude_columns="id, marital_status" include_columns="first_name, last_name, department" />
<br />
<pre class="language-html line-numbers" data-line="2,5">
<code>
    &lt;x-bladewind::table
        searchable="true"
        :data="$staff"
        divider="thin"
        search_placeholder="Find staff members by name..."
        :action_icons="$action_icons"
        exclude_columns="id, marital_status" /&gt;
</code>
</pre>
<br />
<p>
    The search bar is designed to fill the entire width of the table. There are instances where you may want to place other UI elements next to the search, like, a date range component or filter component.
    You can achieve this by instructing the table to write the search bar into another element, by setting the <code class="text-red-500 inline">search_container</code> attribute on the table. The value of the attribute should be the id or class name of the target element.
    In this case, the search bar is transparent so you can place it on any background you want.
</p>
<div class="flex space-x-4 items-center bg-gray-100 px-3 !-py-3 rounded-lg dark:bg-dark-800">
    <div class="put-search-here p-0.5 border border-gray-300 dark:border-dark-600 dark:bg-transparent bg-white rounded-md grow"></div>
    <div class="pt-3.5">
        <x-bladewind::datepicker range="true" add-clearing="false" />
    </div>
    <div>
        <x-bladewind::button secondary="true">Filter</x-bladewind::button>
    </div>
</div>
<p>
    <x-bladewind::table searchable="true" search_placeholder="Find staff members by name..."
                        :data="$staff" divider="thin" :action_icons="$action_icons" search_container="put-search-here"
                        exclude_columns="id, marital_status" include_columns="first_name, last_name, department" />
</p>
        <br />
<pre class="language-html line-numbers" data-line="2,5">
<code>
    &lt;x-bladewind::table
        searchable="true"
        :data="$staff"
        divider="thin"
        search_container="put-search-here"
        search_placeholder="Find staff members by name..."
        :action_icons="$action_icons"
        exclude_columns="id, marital_status" /&gt;
</code>
</pre>
        <br />
<pre class="language-html line-numbers" data-line="2,3">
<code>
&lt;div class="flex space-x-4 items-center bg-gray-100 px-3 -py-4 rounded-lg"&gt;
    &lt;div class="put-search-here p-0.5 border
    border-gray-300 bg-white rounded-md grow">&lt;/div&gt;
    &lt;div class="pt-3.5"&gt;
        &lt;x-bladewind::datepicker range="true" add-clearing="false" /&gt;
    &lt;/div&gt;
    &lt;div&gt;
        &lt;x-bladewind::button secondary="true">Filter&lt;/x-bladewind::button&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code>
</pre>
        <br />
    <h3 id="column-aliases">Aliasing Column Names</h3>
    <p>
        There are times your array might contain keys that are not user-friendly enough to be column headings. From our array above assuming we wanted to replace
        <code class="inline">marital_status</code> to <code class="inline">married?</code>, we will set the <code class="text-red-500 inline">column_aliases</code> attribute.
        This attributes accepts a json encoded array.
    </p>

<pre class="language-js line-numbers">
<code>
    $column_aliases = [
        'id' => 'ref #',
        'marital_status' => 'married?'
    ];
</code>
</pre>
<pre class="language-markup line-numbers" data-line="5">
<code>
    &lt;x-bladewind::table
        exclude_columns="id"
        divider="thin"
        :action_icons="$action_icons"
        :column_aliases="$column_aliases"
        :data="$staff" /&gt;
</code>
</pre>
    <x-bladewind::table
        :data="$staff" divider="thin" :column_aliases="$column_aliases" selectable="true" checkable="true" />

<br />
    <x-bladewind::alert show_close_icon="false">
        You can define <strong>selectable="true"</strong> and <strong>checkable="true"</strong> on dynamic tables. In this case, the "data-id" attribute
        of each row in the table is automatically set using the "id" value defined in the data array.
    </x-bladewind::alert>

        @php
            $staff = [
                [ 'id' => 1, 'first_name' => 'Michael', 'last_name' => 'Ocansey',   'department' => 'Engineering', 'email' => 'mike@email.com' ],
                [ 'id' => 2, 'first_name' => 'Alfred',  'last_name' => 'Rowe',     'department' => 'Engineering', 'email' => 'alfred@rowe.com' ],
                [ 'id' => 3, 'first_name' => 'Abigail',   'last_name' => 'Edwin',    'department' => 'Engineering', 'email' => 'abi@edwin.com' ],
                [ 'id' => 4, 'first_name' => 'John', 'last_name' => 'Doe',   'department' => 'Sales', 'email' => 'john@doe.com' ],
                [ 'id' => 5, 'first_name' => 'Janet',  'last_name' => 'Doe',     'department' => 'Sales', 'email' => 'jane@email.com' ],
                [ 'id' => 6, 'first_name' => 'Michael',   'last_name' => 'Sarpong',    'department' => 'Sales', 'email' => 'mike@sarpong.com' ],
            ];
        @endphp
    <h3 id="groupby">Grouping Rows</h3>
    <p>
        Let's assume you have a table of employees and wish to group these employees by department, so all staff in Marketing will be under the marketing heading and so on.
        This can be achieved by specifying the <code class="inline text-red-500">groupby</code> attribute on the table.
        The value of <code class="inline text-red-500">groupby</code> will need to be any of the keys in your array .
    </p>
    <p>
        From the employee example above, we will set our grouping on the <code class="inline">department</code> key which happens to be to repeated for our employees. <code class="inline text-red-500">groupby="department"</code>.
    </p>

<pre class="language-js line-numbers">
<code>
    $staff = [
        [
            'id' => 1,
            'first_name' => 'Michael',
            'last_name' => 'Ocansey',
            'department' => 'Engineering',
            'email' => 'mike@email.com'
        ],
    ]
    ...
</code>
</pre>
<pre class="language-markup line-numbers" data-line="4">
<code>
    &lt;x-bladewind::table
        exclude_columns="last_name"
        divider="thin"
        groupby="department"
        :data="$staff" /&gt;
</code>
</pre>
    <x-bladewind::table
        :data="$staff" divider="thin" :column_aliases="$column_aliases" groupby="department" exclude_columns="last_name" />

<br />
    <x-bladewind::alert show_close_icon="false">
        You can define <strong>selectable="true"</strong> and <strong>checkable="true"</strong> on dynamic tables. In this case, the "data-id" attribute
        of each row in the table is automatically set using the "id" value defined in the data array.
    </x-bladewind::alert>
    <h2 id="sorting">Sorting</h2>
    <p>
        A BladewindUI table that accepts dynamic data can become sortable by setting <code class="inline text-red-500">sortable="true"</code>. Automatically, all columns in the table
        can be clicked on to sort the table. Each sortable column has a filter icon next to the column heading.
    </p>
    <x-bladewind::table :data="$users" exclude_columns="member_id,email" :sortable="true" :limit="5" />
<pre class="language-markup line-numbers" data-line="3">
<code>
    &lt;x-bladewind::table
        exclude_columns="member_id, email"
        sortable="true"
        limit="5"
        :data="$users" /&gt;
</code>
</pre>
    <p>
        From the above table you can see every column in the table has a filter icon next to the column heading indicating that the column is sortable.
        There are cases you will want to sort your table using only very specific columns. This can be achieved by setting the <code class="inline text-red-500">sortable_columns</code> attribute to a comma separated list of
        columns you want to make sortable.
    </p>
    <x-bladewind::table :data="$users" exclude_columns="member_id,email" :sortable="true" :limit="5" sortable_columns="first_name, last_name" />
<pre class="language-markup line-numbers" data-line="3,5">
<code>
    &lt;x-bladewind::table
        exclude_columns="member_id, email"
        sortable="true"
        limit="5"
        sortable_columns="first_name, last_name"
        :data="$users" /&gt;
</code>
</pre>
    <h2 id="pagination">Pagination</h2>
    <p>
        Pagination is useful for displaying a long list of data in sizable chunks that make it easy to look over the data.
        The BladewindUI table can be paginated when dealing with dynamic data by setting <code class="inline text-red-500">paginated="true"</code>.
        This will display pagination controls at the end of the table. Multiple tables on the same page can be paginated. The
        <code class="inline text-red-500">page_size</code> attribute determines how many rows are displayed per page. The default value is 25.
    </p>
    <p>
        For convenience, paginated tables can display row numbers to make it easy to validate row counts. This is not enabled by default.
        To turn on row numbers set <code class="inline text-red-500">show_row_numbers="true"</code>.
    </p>
    <x-bladewind::table :data="$users" exclude_columns="member_id,email" :paginated="true" :page_size="5" :show_row_numbers="true" />
<pre class="language-markup line-numbers" data-line="3">
<code>
    &lt;x-bladewind::table
        exclude_columns="member_id, email"
        paginated="true"
        page_size="5"
        show_row_numbers="true"
        :data="$users" /&gt;
</code>
</pre>
<x-bladewind::alert show_close_icon="false">When using <code class="inline text-red-500">show_row_numbers="true"</code> and <code class="inline text-red-500">sortable="true"</code>,
    it is important to note that the row numbering is not reordered to match the sorted data. Row numbers 1, 2, 3, 4 might end up as 4, 1, 2, 3</x-bladewind::alert>
    <br />
<x-bladewind::alert show_close_icon="false">When searching or sorting paginated tables, the search or sorting is only applied to the current page and not the entire table.</x-bladewind::alert>
    <br />
<p>
    You may not always want to start displaying your table rows from page 1. Maybe, the user bookmarked a record that is on page 6 and you want to jump to that on page load.
    This can be achieved by setting the <code class="inline text-red-500">default_page</code> attribute. The value of <code class="inline text-red-500">default_page</code> is
    set to 1 if the value provided is greater than the <code class="inline">total_pages</code>.
</p>
<x-bladewind::table :data="$users" exclude_columns="member_id,email" :paginated="true" :page_size="5" :show_row_numbers="true" default_page="15" />
<pre class="language-markup line-numbers" data-line="3,6">
<code>
    &lt;x-bladewind::table
        exclude_columns="member_id, email"
        paginated="true"
        page_size="5"
        show_row_numbers="true"
        default_page="15"
        :data="$users" /&gt;
</code>
</pre>
    <h2 id="custom-layout">Custom Table Layouts</h2>
    <p>
        Pagination is automagically applied to a BladewindUI table that accepts dynamic data. By default the table layout is flat. Every key in the array/data is created as a column.
        Sometimes you may want to have a custom table layout that merges various columns into one but you still want to enjoy the library's pagination.
        Still set <code class="inline text-red-500">paginated="true"</code> and <code class="inline text-red-500">:data="$your_data"</code> but, in this case you will be responsible for manually setting up a few things on the data rows.
        You will also need to include the pagination component manually. You will also need to set <code class="inline text-red-500">layout="custom"</code>
    </p>
<x-bladewind::table :paginated="true" :page_size="$page_size = 5" :default_page="$default_page = 6" :show_row_numbers="true" :data="$users" layout="custom">
    <x-slot:header>
        <th>ID</th>
        <th>User Details</th>
        <th>Contact Details</th>
    </x-slot:header>
    <tbody>
        @foreach($users as $user)
            @php
                // set avatar url
                $image = ($loop->even) ? 'male.png' : 'female.png';
            @endphp
            <tr {{pagination_row($loop->iteration, $page_size, $default_page)}}>
                <td class="!w-1 !pr-0"><div class="pt-3">{{$user['member_id']}}</div> </td>
                <td>
                    <div class="flex space-x-3">
                        <div><x-bladewind::avatar image="/assets/images/{{$image}}" size="small" /></div>
                        <div>
                            <div class="text-base font-semibold">{{$user['first_name']}} {{$user['last_name']}}</div>
                            <div>{{$user['company_name']}}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div>{{$user['mobile']}} <x-bladewind::icon name="chat-bubble-left-ellipsis" class="!size-4" /></div>
                    <div><a href="#">{{$user['email']}}</a></div>
                </td>
            </tr>
        @endforeach
    </tbody>
</x-bladewind::table>
<pre class="language-markup line-numbers" data-line="2,4,6,22">
<code>
&lt;x-bladewind::table
    layout="custom"
    :paginated="true"
    :page_size="$page_size = 5"
    :data="$users"
    :default_page="$default_page = 6"&gt;

    &lt;x-slot:header&gt;
        &lt;th&gt;Member ID&lt;/th&gt;
        &lt;th&gt;User Details&lt;/th&gt;
        &lt;th&gt;Contact Details&lt;/th&gt;
    &lt;/x-slot:header&gt;

    &lt;tbody&gt;
    @verbatim
        @foreach($users as $user)
            @php
                // set avatar url
                $image = ($loop->even) ? 'male.png' : 'female.png';
            @endphp
            &lt;tr {{pagination_row($loop->iteration, $page_size, $default_page)}} &gt;
                &lt;td class="!w-1 !pr-0"&gt;&lt;div class="pt-3"&gt;{{$user['member_id']}}&lt;/div&gt; &lt;/td&gt;
                &lt;td&gt;
                    &lt;div class="flex space-x-3"&gt;
                        &lt;div&gt;&lt;x-bladewind::avatar image="/assets/images/{{$image}}" size="small" /&gt;&lt;/div&gt;
                        &lt;div&gt;
                            &lt;div class="text-base font-semibold"&gt;{{$user['first_name']}} {{$user['last_name']}}&lt;/div&gt;
                            &lt;div&gt;{{$user['company_name']}}&lt;/div&gt;
                        &lt;/div&gt;
                    &lt;/div&gt;
                &lt;/td&gt;
                &lt;td&gt;
                    &lt;div&gt;{{$user['mobile']}}&lt;/div&gt;
                    &lt;div&gt;&lt;a href="#"&gt;{{$user['email']}}&lt;/a&gt;&lt;/div&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        @endforeach
    @endverbatim
    &lt;/tbody&gt;
&lt;/x-bladewind::table&gt;
</code>
</pre>
<p>
    Let's breakdown the example above. Pay attention to lines 2, 4, 6 and 22. Let's talk about line 22 first.
    The pagination widget relies  on a couple of attributes defined on the data rows to work properly. A typical data row in a
    pagination table looks like this:
</p>
<pre class="language-markup line-numbers">
<code>
    &lt;tr data-id="12" data-page="1" class="hidden"&gt; ... &lt;/tr&gt;
    ...
    &lt;tr data-id="34" data-page="6"&gt; ... &lt;/tr&gt;
    &lt;tr data-id="35" data-page="6"&gt; ... &lt;/tr&gt;
    ...
    &lt;tr data-id="272" data-page="9" class="hidden"&gt; ... &lt;/tr&gt;
</code>
</pre>
<p>
    As we loop to generate the table rows, any row that has its <code class="inline text-red-500">data-page</code> attribute not corresponding to the <code class="inline text-red-500">default_page</code> is set to <code class="inline text-red-500">class="hidden"</code>.
    So from our example above, we set <code class="inline text-red-500">default_page="6"</code>, any row that is not on page 6 will need to be hidden. Generating these attributes required for pagination can be a headache so a helper function is provided.
</p>
<p>
    Adding <code class="inline">pagination_row($row_number, $page_size, $default_page)</code> to each row will generate the attributes required by the pagination widget.<br />
    <code class="inline">$row_number</code> is the current iteration/$index of the loop. Start with 1 not 0.<br />
    <code class="inline">$page_size</code> is how many records should be displayed per page.<br />
    <code class="inline">$default_page</code> is which page to select by default.<br /><br />
    Note how on line 4 we defined <code class="inline text-red-500">:page_size="$page_size = 5"</code>. This simply makes the variable <code class="inline">$page_size</code> available for us to use later when calling
    <code class="inline">pagination_row($row_number, <b>$page_size</b>, $default_page)</code>. This is simply to avoid repetition and nothing more. We could have alternatively decided to do what's below.
</p>
        <pre class="language-markup line-numbers" data-line="3,4,8">
<code>
&lt;x-bladewind::table
    ...
    page_size="5"
    default_page="6"&gt;
    ...
    @verbatim
        @foreach($users as $user)
            &lt;tr {{pagination_row($loop->iteration, 5, 6)}} &gt;
            ...
        @endforeach
    @endverbatim
    &lt;/tbody&gt;
&lt;/x-bladewind::table&gt;
</code>
</pre><br />
<p>
    From the example above, if we later change <code class="inline text-red-500">page_size="20"</code>, we will need to also update <code class="inline">pagination_row($loop->iteration, 20, 6)</code>.
</p>

<h2 id="server-pagination">Paginating A Laravel Query</h2>
<p>
    The pagination described above is client-side: it shows and hides rows already in the DOM.
    That cannot work against a <code class="inline">LengthAwarePaginator</code>, which is how a
    server-rendered Laravel app paginates. Hand the component a paginator and it switches to
    server mode, rendering real links.
</p>
<pre class="language-php line-numbers">
    <code>
// in your controller
$orders = Order::latest()-&gt;paginate(request('per_page', 15));
    </code>
</pre>
<pre class="language-markup line-numbers">
    <code>
&lt;x-bladewind::pagination :paginator="$orders" :per_page_options="[15, 30, 50]" /&gt;
    </code>
</pre>
<p>
    You get three controls, because prev and next alone give the reader no sense of where they
    are: a &ldquo;showing x to y of z&rdquo; summary, an optional per-page selector, and
    windowed page numbers with the first and last page always reachable and an ellipsis
    standing in for the gap.
</p>
<x-bladewind::table striped="true">
    <x-slot name="header">
        <th>Option</th>
        <th>Default</th>
        <th>Available Values</th>
    </x-slot>
    <tr>
        <td>paginator</td>
        <td><em>null</em></td>
        <td>A Laravel paginator. Passing one switches the component to server mode. Works with <code class="inline">paginate()</code> and <code class="inline">simplePaginate()</code>.</td>
    </tr>
    <tr>
        <td>per_page_options</td>
        <td><em>empty</em></td>
        <td>Page sizes offered in a per-page selector, e.g. <code class="inline">[15, 30, 50]</code>. Leave empty to hide the selector.</td>
    </tr>
    <tr>
        <td>per_page_name</td>
        <td>per_page</td>
        <td>The query string parameter the per-page selector writes to.</td>
    </tr>
    <tr>
        <td>on_each_side</td>
        <td>1</td>
        <td>How many page numbers to show either side of the current one. First and last are always shown.</td>
    </tr>
</x-bladewind::table>
<p>
    Changing the per-page selector returns to page 1, which is almost always what you want
    &mdash; page 40 of a 15-per-page list does not exist at 50 per page.
</p>
<x-bladewind::alert type="info" show_close_icon="false">
    A <code class="inline">simplePaginate()</code> result gets previous and next only, with no
    numbers and no summary, because it does not know the total.
</x-bladewind::alert>

<h2 id="pagination-styles">Pagination Styles</h2>
<p>
    There are three pagination styles to choose from. The default style is <code class="inline">arrows</code>. The page
    number is displayed by default for the <code class="inline">arrows</code> pagination style.
    When you set the <code class="inline text-red-500">show_total_pages="true"</code> attribute, the page number is displayed as a fraction (a/b),
    where 'a' is the current page and 'b' is the total number of pages.
</p>
<p>
    The pagination totals label (<em>Showing 1 to 5 of 222 records</em>) can be hidden by setting <code class="inline text-red-500">show_total="false"</code>. This is turned on by default.
    Content of the label can be changed by setting the <code class="inline text-red-500">total_label</code> attribute. The default is <code class="inline">Showing :a to :b of :c records</code>.
    There are 3 placeholders, :a, :b, and :c. The alphabets used for the placeholders need to be maintained.
</p>
<p>
    <code class="inline">:a</code> - the starting row number of the current page.<br />
    <code class="inline">:b</code> - the ending row number of the current page.<br />
    <code class="inline">:c</code> - the total records. <br/><br/>

    <code class="inline text-red-500">total_label=":a - :b of :c"</code> will display: <em>1 - 5 of 50</em>
    <br />
    <code class="inline text-red-500">total_label="Showing :a - :b"</code> will display: <em>Showing 1 - 5</em>
</p>
<h3>Arrows</h3>
<x-bladewind::table :data="$users" exclude_columns="member_id,email" :paginated="true" :sortable="true" :page_size="5" :show_row_numbers="true" default_page="15" show_total_pages="true" total_label="Records :a - :b" />
<pre class="language-markup line-numbers" data-line="3,5,7,9">
<code>
    &lt;x-bladewind::table
        exclude_columns="member_id, email"
        paginated="true"
        page_size="5"
        total_label="Records :a - :b"
        show_row_numbers="true"
        pagination_style="arrows"
        :data="$users"
        show_total_pages="true"/&gt;
</code>
</pre>

<h3>Dropdown</h3>
<p>
    Set <code class="inline text-red-500">pagination_style="dropdown"</code> on the table component.
</p>
<x-bladewind::table :data="$users" exclude_columns="member_id,email" :paginated="true" :page_size="5" :show_row_numbers="true" default_page="15" show_total_pages="true" total_label="Records :a - :b" pagination_style="dropdown" />

<h3>Numbers</h3>
<p>
    Set <code class="inline text-red-500">pagination_style="numbers"</code> on the table component.
</p>
<x-bladewind::table :data="$users" exclude_columns="member_id,email" :paginated="true" :page_size="5" :show_row_numbers="true" default_page="15" show_total_pages="true" total_label="Records :a - :b" pagination_style="numbers" />
<pre class="language-markup line-numbers" data-line="7">
<code>
    &lt;x-bladewind::table
        exclude_columns="member_id, email"
        paginated="true"
        page_size="5"
        total_label="Records :a - :b"
        show_row_numbers="true"
        pagination_style="numbers"
        :data="$users"
        show_total_pages="true"/&gt;
</code>
</pre>




    <h2 id="columns">Defining Columns</h2>
    <p>
        Passing <code class="inline">:columns</code> gives the table a column model, so
        alignment, width, sorting and formatting live on the column instead of being
        hand-applied to every cell. The header and body slots stay available as the escape
        hatch, and existing tables are unaffected.
    </p>
    <pre class="language-markup line-numbers">
        <code>
&lt;x-bladewind::table :columns="[
        ['key' =&gt; 'when',   'label' =&gt; 'When',   'width' =&gt; '160px'],
        ['key' =&gt; 'amount', 'label' =&gt; 'Amount', 'align' =&gt; 'right', 'sortable' =&gt; true],
    ]" :rows="$rows"&gt;
    &lt;x-slot:empty&gt;No transactions yet&lt;/x-slot:empty&gt;
&lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <h3 id="column-keys">Column Keys</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Key</th>
            <th>Purpose</th>
        </x-slot>
        <tr><td>key</td><td>The array key to read from each row. Required.</td></tr>
        <tr><td>label</td><td>Heading text. Defaults to the key with underscores turned into spaces.</td></tr>
        <tr><td>align</td><td><code class="inline">left</code> <code class="inline">center</code> <code class="inline">right</code>. Applied to the heading and every cell in the column.</td></tr>
        <tr><td>width</td><td>Any CSS width, applied to the heading as an inline style.</td></tr>
        <tr><td>sortable</td><td>Makes the column sortable and turns on sorting for the table.</td></tr>
        <tr><td>format</td><td>A callable receiving <code class="inline">($value, $row)</code> and returning what to render.</td></tr>
        <tr><td>class</td><td>Extra classes for the heading and the column's cells.</td></tr>
    </x-bladewind::table>

    <h3 id="column-shorthands">Shorthands</h3>
    <p>Most columns need none of those options, so two shorter forms are accepted.</p>
    <pre class="language-markup line-numbers">
        <code>
{{-- keys only; labels are derived --}}
&lt;x-bladewind::table :columns="['when', 'amount']" :rows="$rows" /&gt;

{{-- key =&gt; label --}}
&lt;x-bladewind::table :columns="['when' =&gt; 'Date placed', 'amount' =&gt; 'Total']" :rows="$rows" /&gt;
        </code>
    </pre>

    <h3 id="column-format">Formatting A Column</h3>
    <p>
        <code class="inline">format</code> receives the whole row as well as the value, so a
        column can render something the row does not literally contain.
    </p>
    <pre class="language-php line-numbers">
        <code>
$columns = [
    ['key' =&gt; 'amount', 'align' =&gt; 'right',
     'format' =&gt; fn ($value) =&gt; 'GHS ' . number_format($value, 2)],

    ['key' =&gt; 'first_name', 'label' =&gt; 'Name',
     'format' =&gt; fn ($value, $row) =&gt; $value . ' ' . $row['last_name']],
];
        </code>
    </pre>
    <p>A key missing from a row renders an empty cell rather than failing.</p>

    <h3 id="empty-slot">The Empty Slot</h3>
    <p>
        When <code class="inline">rows</code> is empty the <code class="inline">empty</code>
        slot renders in place of the body, spanning the full width of the table including the
        row-number and actions columns. Without the slot you get the usual
        <code class="inline">no_data_message</code> or empty state.
    </p>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Table component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>'tbl-'.uniqid()</td>
            <td>Name of the table. Useful if you want to target the table via Javascript. The name is added in the class="" attribute of the table.</td>
        </tr>
        <tr>
            <td>striped</td>
            <td>false</td>
            <td>Determines if the table rows are striped. Even rows get the stripes. The value should be passed as a string, not boolean. <br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>divided</td>
            <td>true</td>
            <td>
                Determines if the table rows show the lines that divide them. The value should be passed as a string, not boolean. <br /><code class="inline">true</code> <code class="inline">false</code>
            </td>
        </tr>
        <tr>
            <td>divider</td>
            <td>regular</td>
            <td>Determines how wide the gaps are between table rows. <br /><code class="inline">regular</code> <code class="inline">thin</code></td>
        </tr>
        <tr>
            <td>has_hover</td>
            <td>false</td>
            <td>Determines if the borders of the table rows light up when hovered over. The value should be passed as a string, not boolean.<br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>has_shadow</td>
            <td>true</td>
            <td>Determines if the table has a drop shadow effect. The value should be passed as a string, not boolean.<br /> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>compact</td>
            <td>false</td>
            <td>If set to true, the spacing between the TRs are reduced.<br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>header</td>
            <td><em>blank</em></td>
            <td>This slot holds your table header information.</td>
        </tr>
        <tr>
            <td>uppercasing</td>
            <td>true</td>
            <td>Determines if the table headings should be all uppercase. If <code class="inline">false</code>, the text will be displayed as you entered it. <br /><br /><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>:data</td>
            <td>null</td>
            <td>Array of elements to generate the table from. When this has a value, there is no need to manually build the table. Ignore this attribute if you prefer to use <code class="inline">data</code> instead.</td>
        </tr>
        <tr>
            <td>data</td>
            <td>null</td>
            <td><b>Json encoded</b> array of elements to generate the table from. When this has a value, there is no need to manually build the table. Ignore this attribute if you prefer to use <code class="inline">:data</code> instead..</td>
        </tr>
        <tr>
            <td>layout</td>
            <td>auto</td>
            <td>Determines if the component should automatically build the table or not.<br /> <code class="inline">auto</code> <code class="inline">custom</code></td>
        </tr>
        <tr>
            <td>exclude_columns</td>
            <td><em>null</em></td>
            <td>Comma separated list of columns to exclude when generating the table. The 'columns' need to match keys in your array.</td>
        </tr>
        <tr>
            <td>include_columns</td>
            <td><em>null</em></td>
            <td>Comma separated list of columns to include when generating the table. This list overwrites any columns specified in <em>exclude_columns</em>. In fact, the keys specified in this list will be the only ones used to generate the table.</td>
        </tr>
        <tr>
            <td>:action_icons</td>
            <td><em>null</em></td>
            <td>
                Array of icon actions that will be displayed on each row of the table. Only used when <em>data</em> is not null. By default no action icons are displayed if value is <em>null</em>
                This can also be passed as <code class="inline">action_icons</code> without the colon but then the array will need to be Json encoded.
            </td>
        </tr>
        <tr>
            <td>actions_title</td>
            <td>actions</td>
            <td>Heading of the column that shows the actions.</td>
        </tr>
        <tr>
            <td>:column_aliases</td>
            <td>[]</td>
            <td>Array of column aliases. Aliases are column names to use in place of what is defined in the <em>data</em> array. For example you may want a <em>date_of_birth</em> key to be displayed as <em>birthday</em>.
                This can also be passed as <code class="inline">column_aliases</code> without the colon but then the array will need to be Json encoded.</td>
        </tr>
        <tr>
            <td>searchable</td>
            <td>false</td>
            <td>Specify if the table is searchable. When <code class="inline">true</code>, a search input is placed above the table.<br /><br/><code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>search_placeholder</td>
            <td>Search table below...</td>
            <td>Only used when <code class="inline">searchable="true"</code>. Specifies the text to display in the search input field.</td>
        </tr>
        <tr>
            <td>no_data_message</td>
            <td>No records to display</td>
            <td>Message to display when there is no dynamic data to display.</td>
        </tr>
        <tr>
            <td>message_as_empty_state</td>
            <td>false</td>
            <td>When there is no dynamic data to display, should the message be displayed as an empty state. <br /><code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>image</td>
            <td class="whitespace-nowrap">empty-state.svg</td>
            <td>Image to display in the empty state component when no dynamic data is available.</td>
        </tr>
        <tr>
            <td>heading</td>
            <td><em>blank</em></td>
            <td>Text to display as heading in empty state when no data is available for the dynamic table.</td>
        </tr>
        <tr>
            <td>button_label</td>
            <td><em>blank</em></td>
            <td>Label to display on empty state call to action button.</td>
        </tr>
        <tr>
            <td>celled</td>
            <td>false</td>
            <td>Display each cell with borders all round. Like you get in an excel sheet.<br /> <code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>show_image</td>
            <td>true</td>
            <td>Should the empty state component image be displayed.<br /> <code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>transparent</td>
            <td>false</td>
            <td>Should the empty table be transparent. ALl background colours are removed to enable the table sit well on any dark mode background colour.<br /> <code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>onclick</td>
            <td><em>blank</em></td>
            <td>Action to perform on the empty state component call to action button. Only used when displaying dynamic data.</td>
        </tr>
        <tr>
            <td>groupby</td>
            <td><em>blank</em></td>
            <td>Key of column to group rows by. The key needs to exist in the array you are displaying your data from. Works only for dynamic tables.</td>
        </tr>
        <tr>
            <td>selected_value</td>
            <td>null</td>
            <td>Comma separated list of row IDs to select when the table is rendered.</td>
        </tr>
        <tr>
            <td>show_row_numbers</td>
            <td>false</td>
            <td>Should each row have its number displayed as the first column. <br/><code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>sortable</td>
            <td>false</td>
            <td>Should the table be sortable. <br /> <code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>sortable_columns</td>
            <td>[]</td>
            <td>By default you can click on all columns to sort the table if <code class="inline text-red-500">sortable="true"</code>. To restrict this behaviour, provide a comma separated list of columns that should be clickable for sorting..</td>
        </tr>
        <tr>
            <td>paginated</td>
            <td>false</td>
            <td>Should the table be paginated.  <br/><code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>pagination_style</td>
            <td>arrows</td>
            <td>How should the pagination controls be displayed. <br/> <code class="inline">arrows</code><code class="inline">dropdown</code><code class="inline">numbers</code></td>
        </tr>
        <tr>
            <td>page_size</td>
            <td>25</td>
            <td>How many rows should be displayed per page.</td>
        </tr>
        <tr>
            <td>show_total</td>
            <td>true</td>
            <td>Should the pagination total be displayed. <br/><code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>show_page_number</td>
            <td>true</td>
            <td>This only applies when <code class="inline text-red-500">pagination_style="arrows"</code>. Should the current page number be displayed between the previous and next buttons. <br/><code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>show_total_pages</td>
            <td>false</td>
            <td>By default only the current page number is displayed. When this is <code class="inline">true</code>, the page number will be displayed as currentPage/totalPages. Example: 3/20. meaning on page 3 out of 20. <br/><code class="inline">true</code><code class="inline">false</code></td>
        </tr>
        <tr>
            <td>default_page</td>
            <td>1</td>
            <td>When <code class="inline text-red-500">pagination="true"</code>, what should be the default selected page. Useful if you want to load any page other than 1.</td>
        </tr>
        <tr>
            <td>limit</td>
            <td>null</td>
            <td>How many rows should be displayed in total. You can have a total of 100 rows but want to explicitly set the table to display ONLY 20. Set <code class="inline text-red-500">limit="20"</code>.</td>
        </tr>
        <tr>
            <td>total_label</td>
            <td>Showing :a to :b of :c records</td>
            <td>Applicable when <code class="inline text-red-500">show_total="true"</code>. How should the label be displayed. Note there are 3 placeholders, :a, :b, and :c. These placeholders need to exist in your label to properly replace the values.<br/>
                :a - the starting row number of the current page.<br />
                :b - the ending row number of the current page. <br />
                :c - the total records. <br/><br/>
                <code class="inline text-red-500">total_label=":a - :b of :c"</code> <br/>will become: <strong>1 - 5 of 50</strong><br /><br/>
                <code class="inline text-red-500">total_label="Showing :a - :b"</code> <br />will become: <strong>Showing 1 - 5</strong>
            </td>
        </tr>
        <tr>
            <td>layout</td>
            <td>auto</td>
            <td> This allows you to build your own complex layout. Applicable when <code class="inline text-red-500">data</code> is not manual. By default the library builds a flat table from the array data. Each array key becomes its own column heading.<br/>
                <code class="inline">auto</code>
                <code class="inline">custom</code>
            </td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
        <tr>
            <td>columns</td>
            <td><em>empty</em></td>
            <td>Column model. An array of column definitions, or one of the two shorthands. Accepts the keys <code class="inline">key, label, align, width, sortable, format, class</code>. See <a href="#columns">Defining columns</a>.</td>
        </tr>
        <tr>
            <td>rows</td>
            <td><em>null</em></td>
            <td>The rows to render against <code class="inline">columns</code>. An alias for <code class="inline">data</code>.</td>
        </tr>
        <tr>
            <td>empty <em>(slot)</em></td>
            <td><em>null</em></td>
            <td>Rendered in place of the table body when there are no rows. Falls back to <code class="inline">no_data_message</code>.</td>
        </tr>
    </x-bladewind::table>

    <h3>Table with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::table
                striped="true"
                divided="true"
                divider="thin"
                has_shadow="true"
                has_border="true"
                compact="true"
                transparent="true"
                searchable="false"
                search_placeholder=""
                name="staff-table"
                :data="$data"
                :column_aliases="$column_aliases"
                include_columns="first_name, last_name, email"
                exclude_columns="id,picture"
                :action_icons="$action_icons"
                action_title=""
                no_data_message="The staff directory is empty"
                message_as_empty_state="true"
                button_label="add staff member"
                image="asset('images/no-data.png')"
                heading="No Staff"
                groupby="department"
                selected_value="2,3,4"
                onclick="alert('add a staff')"
                sortable="false",
                paginated="false",
                pagination_style="arrows",
                page_size="25",
                show_row_numbers="false",
                show_page_number="false",
                show_total="true",
                limit="40"
                layout="custom"
                total_label="Showing :a to :b of :c records",
                has_hover="true"&gt;

                &lt;x-slot name="header"&gt;
                    ...
                &lt/x-slot&gt;

                &lt;tr&gt;
                ...
                &lt;/tr&gt;

            &lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > table.blade.php</code> and <code class="inline">public > vendor > bladewind > js > table.js</code>
    </x-bladewind::alert>
<br />
    <x-bladewind::alert type="error" show_close_icon="false">
        The table component requires its corresponding Javascript file to be included in your project. The file is located at <code class="inline">public/vendor/bladewind/js/table.js</code>. Publish the file using <code class="inline">php artisan vendor:publish --tag=bladewind-public</code>.
    </x-bladewind::alert>
    </div>
<p>&nbsp;</p>
    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#nogaps">No Gaps</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#nodivider">No divider</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#nohover">No hover effect</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#compact">Reduce Paddings</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#striped">Striped table</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#celled">Celled table</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#totals">Cells for totals</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#shadow">With drop shadow</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#selectable">Selectable rows</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#checkable">Checkable rows</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#dynamic">Dynamic data</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#customize-columns">Customizing columns</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#action-icons">Action icons</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#onclick">Custom click functions</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#nodata">No data message</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#searchable">Searchable data</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#column-aliases">Column aliases</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#groupby">Group rows</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#sorting">Sorting <x-bladewind::icon name="bolt" type="solid" class="text-pink-600 !size-4" /></a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#pagination">Pagination <x-bladewind::icon name="bolt" type="solid" class="text-pink-600 !size-4" /></a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#server-pagination">Laravel paginators</a></div>
        <div class="flex items-center pl-10"><div class="dot"></div><a href="#custom-layout">Custom layout</a></div>
        <div class="flex items-center pl-10"><div class="dot"></div><a href="#pagination-styles">Styles</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#columns">Column model</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>
    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-table');

            domEl('input.office_supplies').addEventListener('change', (event) => {
                (event.target.value !== '') ? unhide('.office-supplies-actions') : hide('.office-supplies-actions');
            });

            deleteRows = () => {
                let selectedRows = domEl('input.office_supplies').value.split(',');
                let tableRows = domEls('table.office_supplies tr');
                tableRows.forEach(row => {
                    if(selectedRows.indexOf(row.getAttribute('data-id')) !== -1) {
                        hide(row, true);
                        hide('.office-supplies-actions');
                        domEl('input.office_supplies').value = '';
                    }
                });
            }
        </script>
    </x-slot>
</x-app>
