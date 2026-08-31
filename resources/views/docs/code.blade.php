<x-app>
    <x-slot:title>Verification Code Component</x-slot:title>
    <x-slot:page_title>Verification Code / OTP</x-slot:page_title>

    <p>
        Displays a set of input fields to accept a verification code from a user. It is common place on websites these days to send verification codes via email or mobile.
        These codes range from four to six digits.  The default number of digits displayed by the component is four (4).
        In this documentation, we may interchange the words PIN, PIN code and verification code. We mean the same thing.
    </p>
    <br/>
    <p><x-bladewind::code /></p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::code  /&gt;
        </code>
    </pre>
    <br/>
    <p><x-bladewind::code size="big" /></p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::code size="big"  /&gt;
        </code>
    </pre>
    <br/>
    <p>The verification code component allows you to specify how many boxes you want to display by specifying the
        <code class="inline text-red-500">total_digits</code> attribute. There is no restriction on the maximum
        value you can specify.  In a finance app, you could use this to collect account numbers.
    </p>
    <br/>
    <p><x-bladewind::code total_digits="5"  /></p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::code total_digits="5"  /&gt;
        </code>
    </pre>
    <br />
    <p>
        If you don't want the code being entered to be visible, set the
        <code class="inline text-red-500">hide-input="true"</code> attribute. Each box will then behave like a
        password field, showing a dot instead of the number typed.
    </p>
    <br/>
    <p><x-bladewind::code hide-input="true"  /></p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::code hide-input="true"  /&gt;
        </code>
    </pre>
    <br />
    <p>
        <x-bladewind::alert show_close_icon="false">
            The <code class="inline">mask</code> attribute did the same thing in earlier versions and still works, but
            <code class="inline">hide-input</code> is the name to use going forward. <code class="inline">mask</code> will be removed in a future major release.
        </x-bladewind::alert>
    </p>
    <br />
    <p>
        If you want the boxes split into two groups with a separator between them, similar to how a bank card number
        is often shown, set the <code class="inline text-red-500">has-separator="true"</code> attribute. When the
        total number of boxes does not split evenly, the left group gets the extra box. So seven digits split into a
        group of four on the left and a group of three on the right.
    </p>
    <br/>
    <p><x-bladewind::code total_digits="7" has-separator="true"  /></p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::code total_digits="7" has-separator="true"  /&gt;
        </code>
    </pre>
    <br />
    <p>
        <code class="inline text-red-500">has-separator</code> and <code class="inline text-red-500">hide-input</code> can be combined with each other and with any other attribute.
    </p>
    <br/>
    <p><x-bladewind::code total_digits="7" has-separator="true" hide-input="true"  /></p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::code total_digits="7" has-separator="true" hide-input="true"  /&gt;
        </code>
    </pre>

    <h2 id="code">Access the Verification Code</h2>
    <p>
        What happens after the user enters their verification code? The component creates a hidden input field with the name that was passed as the <code class="inline text-red-500">name</code> attribute.
    </p>
        <pre class="language-markup">
            <code>
                &lt;x-bladewind::code name="pin_code"  /&gt;
            </code>
        </pre>
    <p>The above will create the input fields for the verification codes and create the hidden input below</p>
        <pre class="language-markup">
            <code>
                &lt;input type="hidden" name="pin_code" class="pin_code ..." id="pin_code"  /&gt;
            </code>
        </pre>
    <p>
        You can access the value of <code class="inline">pin_code</code> either via Javascript or via PHP if you intend to post it in a form to your backend.
        The <code class="inline text-red-500">onverify</code> attribute allows you to specify a function that should be called when the user has entered a value into the last verification code field.
        This should just be the function name without parentheses and parameters. If you wish to call <code class="inline">verifyPin()</code> after the user enters the code, just type
        <code class="inline text-red-500">onverify="verifyPin"</code>. The component passes the code entered by the user to your function, as well as the name of the component, so, your function declaration needs to expect one or two parameters.
        Still using the <em>verifyPin</em> example, your function declaration will be:
    </p>
        <pre class="language-js">
            <code>
                // NOTE: this is not a Bladewind helper function
                // it should be a function in your project

                verifyPin = (code, name) => {

                    // do something here with the code
                }
            </code>
        </pre>
    <p>
        Let's consider a practical example. Enter any code in the fields below and get notified of the code you entered.
    </p><br />
    <p>
        <x-bladewind::code onverify="checkPin" />
        <script>
            checkPin = (code) => {
                alert(`You entered: ${code}`);
            }
        </script>
    </p>
        <pre class="language-markup line-numbers">
            <code>
                &lt;x-bladewind::code onverify="checkPin" /&gt;

                &lt;script&gt;
                    checkPin = (code) => {
                        alert(`You entered: ${code}`);
                    }
                &lt;/script&gt;
            </code>
        </pre>

    <h2 id="clearpin">Clear PIN/Code</h2>
    <p>
        There are cases where you will want to clear the verification code input field probably because the user entered a wrong pin and you want them to try entering the pin again.
        Also, in an SPA app where you probably popup a screen for users to enter a code before performing an action, the last entered may still be in the fields.
        <code class="inline">clearPin(name)</code> is a Bladewind helper function that easily lets you reset your verification codes. The example below expects the code <strong>2024</strong>
    </p>
    <p>
        <x-bladewind::notification />
        <x-bladewind::code name="clear_me" onverify="checkPinAndClear" />
        <script>
            checkPinAndClear = (code) => {
                if(code !== 2024) {
                    clearPin('clear_me');
                    showNotification('Wrong Code', 'Please enter your code again', 'error');
                }
            }
        </script>
    </p>
        <pre class="language-markup">
            <code>
                &lt;x-bladewind::code name="clear_me" onverify="checkPinAndClear" /&gt;
            </code>
        </pre>
        <pre class="language-markup line-numbers" data-line="4">
            <code>
                &lt;script&gt;
                    checkPinAndClear = (code) => {
                        if(code !== 2024) {
                            clearPin('clear_me');
                            showNotification('Wrong Code', 'Please enter your code again', 'error');
                        }
                    }
                &lt;/script&gt;
            </code>
        </pre>

    <h2 id="errors">Displaying Errors</h2>
    <p>
        The verification code component comes with a hidden field that has the error message to display when validation fails for the code the user entered.
        To allow for translatable messages, the error message is defined on the component using the <code class="inline text-red-500">error_message</code> attribute.
    </p>
    <p>The example below expects <strong>2024</strong> as the code. </p><br />
    <p>
        <x-bladewind::code name="pcode" error_message="Yoh! check your code" onverify="checkPinShowError" />
    </p>
<pre class="language-markup line-numbers">
<code>
    &lt;x-bladewind::code
        name="pcode"
        error_message="Yoh! check your code"
        onverify="checkPinShowError" /&gt;
</code>
</pre>
    <script>
        checkPinShowError = (code) => {
            if( code !== '2022') {
                clearPin('pcode');
                showPinError('pcode');
                //
            }
        }
    </script>

    <pre class="language-markup line-numbers" data-line="4">
        <code>
            &lt;script&gt;
                checkPinShowError = (code) => {
                    if( code !== 2024) {
                        clearPin('pcode');
                        showPinError('pcode');
                    }
                }
            &lt;/script&gt;
        </code>
    </pre>
<br />
    <p>
        The error message is displayed by invoking the Javascript helper function <code class="inline">showPinError(name)</code>.
        It accepts the name provided to the code component as a parameter. The error message is automatically hidden by calling the
        <code class="inline">hidePinError(name)</code> Javascript helper function. The second parameter to this function is what controls
        the automatic hiding of the error message. If you do not want to automatically close the error message, set the parameter to false.
    </p>
    <pre class="language-markup line-numbers" data-line="5">
        <code>
            &lt;script&gt;
                checkPinShowError = (code) => {
                    ...
                    // the error message will not hide after 10 seconds
                    showPinError('pcode', false);
                    ...
                }
            &lt;/script&gt;
        </code>
    </pre>
    <p>
        <x-bladewind::alert show_close_icon="false">
            From the <a href="#clearpin">Clear PIN</a> example, the error message was displayed in a notification instead of using the inline error. This is also an option.
        </x-bladewind::alert>
    </p>
    <h2 id="spinner">Show the Spinner</h2>
    <p>
        The verification code component comes with a hidden spinner that can be made visible by invoking the <code class="inline">showSpinner(name)</code> Javascript helper function.
        It accepts the name provided to the code component as a parameter. The verification code spinner can be useful if your verification is done via an ajax call to an API that may take a second or two.
        Showing the spinner will let the user know you are performing an action.
    </p><br />
    <p>
        <x-bladewind::code name="spin_me" onverify="validatePin" />
    </p>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::code name="spin_me" onverify="validatePin"  /&gt;
        </code>
    </pre>
        <script>
           validatePin = (code, name) => {
                showSpinner(name);
            }
        </script>

    <pre class="language-markup line-numbers" data-line="3">
        <code>
            &lt;script&gt;
                validatePin = (code, name) => {
                    showSpinner(name);
                    ajaxCall('/verify/pin', `code=${code}`, ...
                }
            &lt;/script&gt;
        </code>
    </pre>
    <br />
    <p>
        Since Bladewind does not know how long your Ajax call might take or when your process is complete, it cannot automatically hide the spinner for you. You can do that
        by calling <code class="inline">hideSpinner(name)</code>, where <code class="inline">name</code> is the name of your verification code field.
    </p>
    <pre class="language-markup line-numbers" data-line="3">
        <code>
            &lt;script&gt;
                ...
                hideSpinner('spin_me');
                ...
            &lt;/script&gt;
        </code>
    </pre>

    <h2 id="success">Show Success Icon</h2>
    <p>
        The verification code component also comes with a hidden checkmark to show when a pin is valid. This can be invoked using the <code class="inline">showPinSuccess(name)</code> Javascript helper function.
        It accepts the name provided to the code component as a parameter. In the example  below, the spinner shows after the code is entered and disappears to give way to the checkmark after 5 seconds.
    </p><br />
    <p>
        <x-bladewind::code name="spin_me_yes" onverify="spinAndSucceed" />
    </p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::code name="spin_me_yes" onverify="spinAndSucceed"  /&gt;
        </code>
    </pre>
    <script>
        spinAndSucceed = (code, name) => {
           showSpinner(name);
           setTimeout(()=>{
               showPinSuccess(name);
           }, 5000);
        }
    </script>
<pre class="language-markup line-numbers" data-line="4">
<code>
    &lt;script&gt;
        spinAndSucceed = (code, name) => {
            showSpinner(name);
            setTimeout( () => { showPinSuccess(name); }, 5000);
        }
    &lt;/script&gt;
</code>
</pre>
    <h2 id="timer">Countdown To Resend Code</h2>
    <p>
        This can be useful for two scenarios. The user never received the code you sent so they will need to request another.
        The user received a code that somehow does not seem to work and will need to request for a new one. Specifying a value for the
        <code class="inline text-red-500">timer</code> attribute automatically shows a countdown timer. The attributes accepts number of seconds to countdown to.
    </p>
    <p>
        Bladewind expects you to have an HTML element on your page with <code class="inline">class="bw-code-timer-done"</code>.
        Ideally this should be hidden. The innerHTML (content) of that element is what will be displayed when the timer is done. This approach provides you the flexibility
        of handling your code resend anyway you want.
    </p>
    <br />
    <div class="bw-code-timer-done hidden">
        <x-bladewind::button name="send-code" size="tiny" type="secondary" has_spinner="true" onclick="sendNewCode()">
            send me another code
        </x-bladewind::button>
    </div>
    <p>
        <x-bladewind::code name="time_me" timer="30" />
    </p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::code name="time_me" timer="30"  /&gt;
        </code>
    </pre>
    <pre class="language-markup line-numbers" data-line="3,8">
        <code>
            &lt;!-- the DIV that contains the content to display when timer is done -->

            &lt;div class="bw-code-timer-done hidden"&gt;
                &lt;x-bladewind.button
                    name="send-code"
                    size="tiny"
                    type="secondary"
                    has_spinner="true"
                    onclick="sendNewCode()"&gt;
                    send me another code
                &lt;/x-bladewind.button&gt;
            &lt;/div&gt;
        </code>
    </pre>
    <script>
        sendNewCode = () => {
           showButtonSpinner('.bw-time_me-pin-timer .done .send-code');
           setTimeout(()=>{
               showNotification('Code Sent','Please check your email or SMS for a new verification code');
               hideButtonSpinner('.bw-time_me-pin-timer .done .send-code');
               hide('.bw-time_me-pin-timer .done .send-code')
               setFocus('time_me');
           }, 5000);
        }
    </script>
<pre class="language-markup line-numbers" data-line="5">
<code>
    &lt;script&gt;
        sendNewCode = () => {
           showButtonSpinner('.bw-time_me-timer .done .send-code');
           setTimeout( () => {
               showNotification('Code Sent','Please check your email or SMS for a new verification code');
                hideButtonSpinner('.bw-time_me-pin-timer .done .send-code');
                hide('.bw-time_me-pin-timer .done .send-code')
                setFocus('time_me');
                clearTimeout();
           }, 5000);
        }
    &lt;/script&gt;
</code>
</pre>
    <p>
        Once the countdown is done, the content of your <code class="inline">bw-code-timer-done</code> DIV is copied into a DIV that can be accessed using the class <code class="inline">.bw-[name-of-code-field]-pin-timer .done</code>.
        From our above example, our resend code content will be copied into a DIV accessible with <code class="inline">.bw-time_me-pin-timer .done</code>. That is how come our <code class="inline">showButtonSpinner()</code>
        line was targeting the button at <code class="inline">.bw-time_me-pin-timer .done .send-code</code>.
    </p>
    <h3 id="trigger-timer">Manually Trigger the Timer</h3>
    <p>
        There are cases where you may want to manually trigger the timer. For example, you first want the user to have at least entered the code wrongly once or twice before you trigger a countdown.
        You can do this by calling the <code class="inline">showTimer(name, duration)</code> helper function. The example below expects 2024 as the code. Enter it wrongly two times to trigger the timer.
    </p>
    <br />
    <p>
        <x-bladewind::code name="trigger_me" onverify="triggerTimerManually" />
    </p>
    <script>
        let attempts = 0;
        triggerTimerManually = (code, name) => {
            if(parseInt(code) !== 2024) {
                attempts++
                showPinError(name);
                clearPin(name);
            }
            if(attempts >= 2) showTimer(name, 15);
        }
    </script>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::code name="trigger_me" onverify="triggerTimerManually"  /&gt;
        </code>
    </pre>
    <pre class="language-js line-numbers" data-line="8">
<code>
let attempts = 0;
triggerTimerManually = (code, name) => {
    if(parseInt(code) !== 2024) {
        attempts++
        showPinError(name);
        clearPin(name);
    }
    if(attempts >= 2) showTimer(name, 15);
}
</code>
</pre>
    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Spinner component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>pin-code-{uniqid()}</td>
            <td>Unique name for the component. The code entered by the enduser will be available in an input field with the specified name. If for example you named your component <code class="inline">vcode</code>,
            the following input will be created and have the value of the full code the user entered <code class="inline"><input type="hidden" name="vcode" /></code>.</td>
        </tr>
        <tr>
            <td>total_digits</td>
            <td>4</td>
            <td>Determines number of input boxes to be created for entry of the verification code. Any realistic number.</td>
        </tr>
        <tr>
            <td>size</td>
            <td>small</td>
            <td>Displays the input boxes at either small or big sizes. Default is small.<br /> <code class="inline">small</code> <code class="inline">big</code> </td>
        </tr>
        <tr>
            <td>onverify</td>
            <td><em>blank</em></td>
            <td>
                Function to call after user has finished entering the codes. When passed, this function will be triggered when the user enters a number into the last input field.
                This should just be the function name without parentheses and parameters. If you wish to call <code class="inline">verifyPin()</code> after the user enters the pin,
                just type <code class="inline text-red-500">onverify="verifyPin"</code>. The component passes the code to your function, so, your function declaration needs to expect one parameter.
                Still using the <code>verifyPin</code> example, your function declaration should be <code class="inline">verifyPin = (code) => { ... }</code>
            </td>
        </tr>
        <tr>
            <td>error_message</td>
            <td>Verification code is invalid</td>
            <td>Error message to display when the verification code entered is invalid</td>
        </tr>
        <tr>
            <td>hide_input</td>
            <td>false</td>
            <td>Should the text being entered be hidden like a password field. <br /><code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>mask</td>
            <td>false</td>
            <td>Older name for <code class="inline">hide_input</code>, kept for backward compatibility. Use <code class="inline">hide_input</code> instead, this attribute will be removed in a future major release. <br /><code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>has_separator</td>
            <td>false</td>
            <td>Splits the boxes into two groups with a dash between them. When <code class="inline">total_digits</code> does not split evenly, the left group gets the extra box. <br /><code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>timer</td>
            <td>null</td>
            <td>Determines if the component should automatically display a timer for user to resend verification code. Accepts any positive integer. Counted in seconds. 90 means countdown 90 seconds. Of course the component converts the seconds to user friendly minutes and seconds.</td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>
    <h3>Verification Code with all attributes defined</h3>
<pre class="language-markup line-numbers">
<code>
    &lt;x-bladewind::code
        name="pin-code"
        total_digits="5"
        onverify="verifyPin"
        has_spinner="false"
        hide_input="false"
        has_separator="false"
        timer="15"
        error_message="please enter the correct code"  /&gt;
</code>
</pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > code.blade.php</code>
    </x-bladewind::alert>
    <p>&nbsp;</p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#code">Access the verification code</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#clearpin">Clear PIN/code</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#errors">Displaying errors</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#spinner">Show the spinner</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#success">Show success icon</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#timer">Countdown timer</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#trigger-timer">Manually trigger the timer</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-code');
            function verifyPin(pin){
                console.log(pin);
            }
        </script>
    </x-slot>
</x-app>
