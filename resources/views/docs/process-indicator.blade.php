<x-app>
    <x-slot:title>Process Indicator Component</x-slot:title>
    <x-slot:page_title>Process Indicator</x-slot:page_title>

    <p>
        Show that a process is in progress. A process can have two possible outcomes. It could either pass or fail. The process indicator can be used within the page but looks cooler when used in a <a href="/component/modal">Modal component</a>.
        There are three parts to using the process indicator component.
    </p>
    <div class="grid grid-cols-3">
        <div class="text-center">
            <code class="inline">processing</code><br />
            <x-bladewind::processing name="processing" message="Deleting pending payment" hide="false" />
        </div>
        <div class="text-center">
            <code class="inline">process passed</code><br />
            <x-bladewind::process-complete name="delete-yes" process_completed_as="passed" button_label="Done"
                button_action="alert('i passed')" message="Pending payment was deleted successfully" hide="false" />
        </div>
        <div class="text-center">
            <code class="inline">process failed</code><br />
            <x-bladewind::process-complete name="delete-no" process_completed_as="failed" button_label="Done"
            button_action="alert('i failed')" message="Pending payment could not be deleted" hide="false" />
        </div>
    </div>
    <p>
        Now that we have seen all three parts that make up this component, let's build a flow that makes use of all three parts. This is heavily dependent on Javascript but nothing scary.
        Let's simulate deleting of a pending payment.
    </p>

    <x-bladewind::button
        onclick="deletePayment('pass')"
        size="small">Delete Payment and Pass</x-bladewind::button> &nbsp;&nbsp;&nbsp;

    <x-bladewind::button onclick="deletePayment('fail')" size="small">Delete Payment and Fail</x-bladewind::button>

    <x-bladewind::modal title="" name="delete-paymentz" show_action_buttons="false">
        <x-bladewind::processing name="processing-delete" message="Deleting pending payment" hide="false" />

        <x-bladewind::process-complete name="delete-payment-yes" process_completed_as="passed" button_label="Done"
            button_action="alert('i passed... closing modal now'); hideModal('delete-paymentz')" message="Pending payment was deleted successfully" />

        <x-bladewind::process-complete name="delete-payment-no" process_completed_as="failed" button_label="Done"
            button_action="alert('i failed... closing modal now'); hideModal('delete-paymentz')" message="Pending payment could not be deleted" />
    </x-bladewind::modal>
    <script>
        var m;
        deletePayment = (mode) => {
            m = mode;
            hide('.processing-delete');
            hide('.delete-payment-yes');
            hide('.delete-payment-no');
            showModal('delete-paymentz');
            unhide('.processing-delete');
            setTimeout(function() {
                hide('.processing-delete');
                hide('.delete-payment-yes');
                hide('.delete-payment-no');
                (m == 'pass') ? unhide('.delete-payment-yes'): unhide('.delete-payment-no');
            }, 3000);
        }
    </script>
    <br /><br />
    <p>
        Let's break down what is happening by first looking at the buttons that triggered the modal.
    </p>

    @php
        $processUindicatorExample1 = <<<'HTML'
            <x-bladewind::button
                onclick="deletePayment('pass')"
                size="small">
                Delete Payment and Pass
            </x-bladewind::button>

            <x-bladewind::button
                onclick="deletePayment('fail')"
                size="small">
                Delete Payment and Fail
            </x-bladewind::button>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="2,8" :code="$processUindicatorExample1"></x-bladewind::code-block>
    <p>
        Next, let's look at the modal element and the two possible process outcomes
    </p>
    @php
        $processUindicatorExample2 = <<<'HTML'
            <x-bladewind::modal
                name="delete-paymentz"
                show_action_buttons="false">

                // this shows that process is in progress
                <x-bladewind::processing
                    name="processing-delete"
                    message="Deleting pending payment"
                    hide="false" />

                // this is shown when process completes with a pass
                <x-bladewind::process-complete
                    name="delete-payment-yes"
                    process_completed_as="passed"
                    button_label="Done"
                    button_action="alert('i passed... closing modal now'); hideModal('delete-paymentz')"
                    message="Pending payment was deleted successfully" />

                // this is shown when process completes with a failure
                <x-bladewind::process-complete
                    name="delete-payment-no"
                    process_completed_as="failed"
                    button_label="Done"
                    button_action="alert('i failed... closing modal now'); hideModal('delete-paymentz')"
                    message="Pending payment could not be deleted" />

            </x-bladewind::modal>
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" highlight_lines="1,6,12,14,20,22" :code="$processUindicatorExample2"></x-bladewind::code-block>
    <p>
        Now let's take a look at the Javascript function both buttons are calling.
    </p>
    @php
        $processUindicatorExample3 = <<<'HTML'
            <script>
                deletePayment = (mode) => {
                    // it is preferred to hide all three elements
                    // and show only the element that needs to be shown
                    // hide the processing delete element
                    hideHideables();

                    // show the modal and the processing delete element
                    // showModal() and unhide() are helper functions
                    // available in BladewindUI
                    showModal('delete-paymentz');
                    unhide('.processing-delete');

                    // this example only shows a specific outcome
                    // after 3 seconds based on which button was clicked.
                    // In your apps you will typically display an outcome
                    // based on some API return value or something similar
                    setTimeout(function() {

                        hideHideables();

                        // determine which process outcome to show
                        (mode == 'pass') ?
                            unhide('.delete-payment-yes') :
                            unhide('.delete-payment-no');
                    }, 3000);
                }

                hideHideables = () => {
                    // hide() is a helper function available in BladewindUI
                    hide('.processing-delete');
                    hide('.delete-payment-yes');
                    hide('.delete-payment-no');
                }
            </script>
            HTML;
    @endphp
    <x-bladewind::code-block language="javascript" line_numbers="true" :code="$processUindicatorExample3"></x-bladewind::code-block>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Process Indicator component.</p>
    @include('docs/announcement')
    <h3>Processing Component Attributes</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>processing</td>
            <td>Unique name for the processing component. Usually useful to prevent erratic behaviour if there are multiple Process Indicators on the same page.</td>
        </tr>
        <tr>
            <td>hide</td>
            <td>true</td>
            <td>The processing component is hidden by default. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>message</td>
            <td><em>blank</em></td>
            <td>Message to display below the spinning icon.</td>
        </tr>
    </x-bladewind::table>
    <h3>Process Complete Component Attributes</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>process-complete</td>
            <td>Unique name for the process complete component. Usually useful to prevent erratic behaviour if there are multiple Process Complete components on the same page.</td>
        </tr>
        <tr>
            <td>process_completed_as</td>
            <td>passed</td>
            <td>There are two possible values. This attribute determines which icon to display based on the outcome. A pass will display a green thumbs up icon. A fail will display a red thumbs down icon. <code class="inline">passed</code> <code class="inline">failed</code></td>
        </tr>
        <tr>
            <td>message</td>
            <td><em>blank</em></td>
            <td>Message to display below the thumbs up or down icon.</td>
        </tr>
        <tr>
            <td>button_label</td>
            <td><em>blank</em></td>
            <td>Label to display on the call to action button when process is complete.</td>
        </tr>
        <tr>
            <td>button_action</td>
            <td><em>blank</em></td>
            <td>Javascript function to call when the call to action button is clicked.</td>
        </tr>
        <tr>
            <td>hide</td>
            <td>true</td>
            <td>The process complete component is hidden by default. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
    </x-bladewind::table>
    <h3>Process Indicator with all attributes defined</h3>
    @php
        $processUindicatorExample4 = <<<'HTML'
            <x-bladewind::processing
                name="processing-delete"
                message="Deleting pending payment"
                hide="false" />

            // this is shown when process completes with a pass
            <x-bladewind::process-complete
                name="delete-payment-yes"
                process_completed_as="passed"
                hide="false"
                button_label="Done"
                button_action="hideModal('delete-paymentz')"
                message="Pending payment was deleted successfully" />

            // this is shown when process completes with a failure
            <x-bladewind::process-complete
                name="delete-payment-no"
                process_completed_as="failed"
                hide="false"
                button_label="Done"
                button_action="hideModal('delete-paymentz')"
                message="Pending payment could not be deleted" />
            HTML;
    @endphp
    <x-bladewind::code-block language="markup" line_numbers="true" :code="$processUindicatorExample4"></x-bladewind::code-block>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > processing.blade.php</code>
        and <code class="inline">resources > views > components > bladewind > process-complete.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-process-indicator');
        </script>
    </x-slot>
</x-app>
