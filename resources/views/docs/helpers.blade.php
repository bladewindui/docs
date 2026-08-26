<x-app>
    <x-slot:title>Helper Functions</x-slot:title>
    <x-slot:page_title>Helper Functions</x-slot:page_title>

    <p>
        The BladewindUI library comes with a couple of Javascript helper functions used by the library itself.
        These functions can also be used in your projects if you have need for them.
    </p>
    <h2 id="addtostorage">addToStorage</h2>
    <p>Adds a key/value pair to either localStorage or sessionStorage. The documentation website uses this to set the dark/light mode settings of the user.</p>
    <pre class="language-js line-numbers">
        <code>
            /* -----------------------------------------------------------
                key:            label of key to store
                val:            value to store for key
                storageType:    where to store key/val pair.
                                localStorage or sessionStorage
            -----------------------------------------------------------*/
            addToStorage(key, val, storageType = 'localStorage');

            // example
            addToStorage('theme', 'dark');

        </code>
    </pre>

    <h2 id="animatecss">animateCss</h2>
    <p>Animates any element in the DOM. Works with any of the <a href="https://animate.style/" target="_blank">animation classes</a> from animate.css by Daniel Eden.
    The animation class names should be used without the <code class="inline">animate__</code> prefix.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                element:     css class that identifies the element to animate
                animation:   animation class to be applied to element
            -----------------------------------------------------------------*/
            animateCss(element, animation);

            // example
            animateCss('.navigation','slideInRight');

        </code>
    </pre>

    <h2 id="changecss">changeCss</h2>
    <p>Add to or remove CSS classes from a single element in the DOM.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                element:    css class that identifies the element to change
                css:        comma separated list of css class names to apply
                mode:       should the css be added or removed
                elementIsDomObject: is the element a dom Object
            -----------------------------------------------------------------*/
            changeCss(element, css, mode = 'add', elementIsDomObject = false);

            // example 1: elementIsDomObject = true
            current_theme = getFromStorage('theme');
            changeCss(document.documentElement, current_theme, 'add', true);

            // example 2: remove list of css from an element
            changeCss('.nav a.active', 'selected, active', 'remove');
        </code>
    </pre>

    <h2 id="changecssfordomarray">changeCssForDomArray</h2>
    <p>
        Very similar to <code class="inline">changeCss</code> but this adds or removes CSS classes from an array of CSS elements in the DOM.
        This targets elements with the same class name or tag name.
    </p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                elements:   css class that identifies the element to change
                css:        comma separated list of css class names to apply
                mode:       should the css be added or removed.
            -----------------------------------------------------------------*/
            changeCssForDomArray(elements, css, mode = 'add');

            // example 1: add list of css classes
            changeCssForDomArray('li', 'underline, my-2');

            // example 2: remove list of css classes
            changeCssForDomArray('.nav a', 'selected, active', 'remove');
        </code>
    </pre>

    <h2 id="comparedates">compareDates</h2>
    <p>
        Performs a validation for two dates.
        Used by the range datepicker to ensure an end date is not less than a start date.
        Returns boolean.
    </p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                date1_field:   name of input field that has the start date
                date2_field:   name of input field that has the end date
                error_message:  message to display if the end date is less than start date
                error_inline:   determines if message is displayed inline. Default is in the notification
            -----------------------------------------------------------------*/
            compareDates(date1_field, date2_field error_message, error_inline);

            compareDates(
                'task_begins',
                'task_ends'
                'Please ensure your task end date is after the task start date',
                1); // uses 0 and 1 for boolean

            // from above
            // 1. the start date datepicker field has the name task_begins
            // 2. the end date datepicker field has the name task_ends
        </code>
    </pre>

    <h2 id="domel">domEl</h2>
    <p>Shortcut for writing Javascript's <code class="inline">document.querySelector</code>. This function has an alias <code class="inline">dom_el</code> that does exactly the same thing.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                element:   css class that identifies the element to target
            -----------------------------------------------------------------*/
            domEl(element);

            // examples
            domEl('input.fname').getAttribute('disabled');
            let data = new FormData(dom_el(form));
        </code>
    </pre>

    <h2 id="domels">domEls</h2>
    <p>Shortcut for writing Javascript's <code class="inline">document.querySelectorAll</code>. This function has an alias <code class="inline">dom_els</code> that does exactly the same thing.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                elements:   css class that identifies the elements to target
                scope:      scope within which to search for &lt;elements&gt;
            -----------------------------------------------------------------*/
            domEls(elements, scope = null);

            // example: find all inputs with css class 'required'
            domEls('input.required').forEach((el) => {
                console.log(el.value);
            });

            // find inputs with class='required' in a form with class='signup'
            domEls('input.required', 'form.signup').forEach((el) => {
                console.log(el.value);
            });
        </code>
    </pre>

    <h2 id="getfromstorage">getFromStorage</h2>
    <p>Retrieve a value from the enduser's localStorage or sessionStorage based on key that is passed.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                key:            key to get value for
                storageType:    storage to fetch the value from
            -----------------------------------------------------------------*/
            getFromStorage(key, storageType = 'localStorage');

            // example
            getFromStorage('theme');
        </code>
    </pre>

    <h2 id="hide">hide</h2>
    <p>Hide an element from/in the DOM .</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                element:    css class that identifies the element to hide
                elementIsDomObject: is the element a dom Object
            -----------------------------------------------------------------*/
            hide(element, elementIsDomObject = false);

            // example
            hide('.top-bar');
            hide(domEl('.top-bar'), true);
        </code>
    </pre>
    <h2 id="hidebuttonspinner">hideButtonSpinner</h2>
    <p>Hide the spinner associated with a button.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                element:    name of the button
            -----------------------------------------------------------------*/
            hideButtonSpinner(element);

            // example
            hideButtonSpinner('.save-user');
        </code>
    </pre>

    <h2 id="hidemodal">hideModal</h2>
    <p>Specifically hides a BladewindUI <a href="/component/modal">Modal</a> component.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                element:    css class that identifies the modal to hide
            -----------------------------------------------------------------*/
            hideModal(element);

            // example
            hideModal('.make-payment');
        </code>
    </pre>

    <h2 id="hidemodalbuttons">hideModalActionButtons</h2>
    <p>Hides the action buttons on a BladewindUI <a href="/component/modal">Modal</a> component.
        The action buttons are the Ok and Cancel buttons. See the <a href="/component/modal#forms">example here</a> for how this is used.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                element:    css class that identifies the modal to hide
            -----------------------------------------------------------------*/
            hideModalActionButtons(element);

            // example
            // this will hide the Cancel and Ok buttons on the make-payment modal
            hideModalActionButtons('make-payment');
        </code>
    </pre>

    <h2 id="isnumberkey">isNumberKey</h2>
    <p>Used by the Bladewind <a href="/component/textbox">Textbox</a> component to restrict user input to only numeric values. You can however use this helper function in your own non-Bladewind textboxes.
    For example to enter verification codes.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                evt:    javascript keypress events
            -----------------------------------------------------------------*/
            isNumberKey(evt);

            // example
            &lt;input type="text" onkeypress="return isNumberKey(event)" /&gt;
        </code>
    </pre>

    <h2 id="removefromstorage">removeFromStorage</h2>
    <p>Remove a key from the enduser's localStorage or sessionStorage.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                key:            key to remove
                storageType:    which storage to remove the  key from
            -----------------------------------------------------------------*/
            removeFromStorage(key, storageType = 'localStorage');

            // example
            removeFromStorage('theme');
        </code>
    </pre>
    <h2 id="serialize">serialize</h2>
    <p>Prepares form data as key/value pairs to send via Ajax posts or requests..</p>

    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                form:  css class that identifies the form to serialize
            -----------------------------------------------------------------*/
            serialize(form);

            // example
            &lt;form class="signup-form"&gt;...&lt;/form&gt;

            serialize('.signup-form');
        </code>
    </pre>

    <h2 id="showbuttonspinner">showButtonSpinner</h2>
    <p>Unhide a spinner associated with a <a href="/component/modal">Button</a> component with <code class="inline">has_spinner="true"</code>.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                element:    name of the button
            -----------------------------------------------------------------*/
            showButtonSpinner(element);

            // example
            showButtonSpinner('.save-user');
        </code>
    </pre>

    <h2 id="showmodal">showModal</h2>
    <p>Specifically unhides a Bladewind <a href="/component/modal">Modal</a> component.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                element:    css class that identifies the modal to unhide
            -----------------------------------------------------------------*/
            showModal(element);

            // example
            showModal('.make-payment');
        </code>
    </pre>

    <h2 id="showmodalbuttons">showModalActionButtons</h2>
    <p>Unhides the action buttons on a BladewindUI <a href="/component/modal">Modal</a> component. The action buttons are the Ok and Cancel buttons.</p>
    <pre class="language-js line-numbers">
        <code>
            /* --------------------------------------------------------------------
                element:    css class that identifies the modal to show buttons for
            --------------------------------------------------------------------*/
            showModalActionButtons(element);

            // example
            // this will show the Cancel and Ok buttons on the make-payment modal
            showModalActionButtons('make-payment');
        </code>
    </pre>
    <h2 id="stringcontains">stringContains</h2>
    <p>Checks to see if a string contains the specified keyword. Returns true if string contains the keyword and
    false if string does not contain the keyword.</p>

    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                str:        main string to check keyword against
                keyword:    keyword to check if it's contained in str
            -----------------------------------------------------------------*/
            stringContains(str, keyword);

            // example
            stringContains(location.href, '/admin');
        </code>
    </pre>

    <h2 id="unhide">unhide</h2>
    <p>Unhides any DOM element.</p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                element:    css class that identifies the element to unhide
                elementIsDomObject: is the element a dom Object
            -----------------------------------------------------------------*/
            unhide(element, elementIsDomObject = false);

            // example
            unhide('.top-bar');
            unhide(domEl('.top-bar'), true);
        </code>
    </pre>

    <h2 id="validateform">validateForm</h2>
    <p>
        Performs a very basic 'not empty' validation on a form that has input fields marked as <code class="inline">required</code>.
        This won't work if the input fields have not been marked as required. If you're using the Bladewind <a href="/component/textbox">Textbox</a> component,
        you will need to set the attribute <code class="inline text-red-500">required="true"</code>. If you want to validate non-Bladewind input fields, add <code class="inline text-red-500">class="required"</code> to your input field.
        At the moment, this function only works on text-based input fields and the textarea field. See the <a href="/component/textbox#validate">Validating Input Fields</a> section of the Textbox component documentation.
        You can either pass a string targeting the class of the HTML form or pass an HTMLFormElement.
    </p>
    <pre class="language-js line-numbers">
        <code>
            /* ---------------------------------------------------------------
                form:    css class of the form or HTMLFormElement to validate
            -----------------------------------------------------------------*/
            validateForm(form);

            // example
            &lt;form class="signup-form"&gt;
                &lt;x-bladewind.input required="true" name="fullname" label="Name" /&gt;
                &lt;x-bladewind.input required="true" name="email" label="Email" /&gt;
                &lt;x-bladewind.input required="true" name="mobile"
                    label="Mobile" numeric="true" /&gt;
            &lt;/form&gt;

            // ---- this option uses the css class name of the form ------------
            domEl('.signup-form').addEventListener('submit', function (e){
                e.preventDefault();
                signUp();
            });

            signUp = () => {
                if ( validateForm('.signup-form') ) {
                    // form is valid.. do this
                    unhide('.btn-signup .bw-spinner');
                    ajaxCall('/user/signup', 'signUpCallback', serialize('.signup-form'));
                }
            }

            // ----- this option uses the HTMLFormElement ------------------------
            // https://github.com/bladewindui/bladewindui/issues/403#issue-2662756420
            const forms = document.getElementsByTagName('form');
            for (let i = 0; i < forms.length; i++) {
                forms[i].addEventListener('submit', function (e) {
                    e.preventDefault();
                    let validationStatus = validateForm(this);
                    if (validationStatus) {
                        this.submit();
                    }
                });
            }
        </code>
    </pre>
    <p>&nbsp;</p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#addtostorage">addToStorage</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#animatecss">animateCss</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#changecss">changeCss</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#changecssfordomarray">changeCssForDomArray</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#comparedates">compareDates</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#domel">domEl</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#domels">domEls</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#getfromstorage">getFromStorage</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#hide">hide</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#hidebuttonspinner">hideButtonSpinner</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#hidemodal">hideModal</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#hidemodalbuttons">hideModalActionButtons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#isnumberkey">isNumberKey</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#removefromstorage">removeFromStorage</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#serialize">serialize</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#showbuttonspinner">showButtonSpinner</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#showmodal">showModal</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#showmodalbuttons">showModalActionButtons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#stringcontains">stringContains</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#unhide">unhide</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#validateform">validateForm</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.extra-helpers');
        </script>
    </x-slot>
</x-app>
