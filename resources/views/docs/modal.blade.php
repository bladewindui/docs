<x-app>
    <x-slot:title>Modal Component</x-slot:title>
    <x-slot:page_title>Modal</x-slot:page_title>
    <x-bladewind::notification />
    <p>
        The modal component is useful for displaying content that is overlayed on the primary page content.
    </p>

    <h2 id="default">Default Modal</h2>
    <p>
         Modals are mostly displayed when an action is triggered, say when a button is clicked.
        All BladewindUI modals are invoked via a javascript helper function bundled with the component.
        <code class="inline text-red-500">showModal('name-of-modal');</code>. Like with all BladewindUI components,
        the syntax for cooking up a modal is very simple.
    </p>
    <div class="space-x-4">
        <x-bladewind::button onclick="showModal('tnc-agreement')">Basic modal</x-bladewind::button>
        <x-bladewind::button onclick="showModal('tnc-agreement-titled')" class="mt-2 sm:mt-0">Basic modal with a title</x-bladewind::button>
    </div>
    <p>
        <x-bladewind::modal name="tnc-agreement" show_close_icon="true">
            Please agree to the terms and conditions of the agreement before proceeding. By clicking the OKAY button you agree to let your machine explode 💥
        </x-bladewind::modal>
        <x-bladewind::modal name="tnc-agreement-titled" show_close_icon="true" title="Agree or Disagree">
            Please agree to the terms and conditions of the agreement before proceeding.
        </x-bladewind::modal>
    </p>

    <pre class="language-markup line-numbers" data-line="2,3,8,13,19">
        <code>
            &lt;x-bladewind::button
                show_close_icon="true"
                onclick="showModal('tnc-agreement')"&gt;
                Basic modal
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::button
                onclick="showModal('tnc-agreement-titled')"&gt;
                Basic modal with a title
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                name="tnc-agreement"&gt;
                Please agree to the terms and conditions of
                the agreement before proceeding.
            &lt;/x-bladewind::modal&gt;

            &lt;x-bladewind::modal
                name="tnc-agreement-titled"
                title="Agree or Disagree"&gt;
                Please agree to the terms and conditions of
                the agreement before proceeding.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>

    <p>
        <x-bladewind::alert show_close_icon="false">
            IMPORTANT: BladewindUI Modals are created, targeted and invoked using the <code class="inline text-red-500">name</code> attribute.
            You can have several modals on the same page but it is very important to provide unique names for each modal.
        </x-bladewind::alert>
    </p>
    <p>
        Clicking on the backdrop of the modal or on the cancel button will by default dismiss the modal. You probably guessed it. The <code class="inline text-red-500">hideModal('name-of-modal');</code> helper function is called to dismiss modals.
        It is possible to prevent the backdrop or the cancel button from closing the modal. See the <a href="#cant-dismiss">Non-dismissed modal</a> section below.
    </p>

    <h2 id="types">Different Types</h2>
    <p>
        The BladewindUI modal component comes prebuilt with some default types for the common use cases.
        This can be achieved by setting the <code class="inline text-red-500">type</code> attribute on the modal component. The default <code class="inline text-red-500">type=""</code>.
        All the type attribute does is append the appropriate icons that match the type of modal.
    </p>
    <h3 id="info">Info Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">type="info"</code> on the modal component. The default icon changes to a blue info icon.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('info')">Info Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('info')"&gt;
                Info Modal
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                type="info"
                title="General Info"
                name="info"&gt;
                We really think you should buy some Bitcoin
                despite it's ups and dowms. What sayeth thou?
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="error">Error Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">type="error"</code> on the modal component. The default icon changes to a red exclamation mark.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('error')">Error Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('error')"&gt;
                Error Modal
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                type="error"
                title="Delete Not Allowed"
                name="error"&gt;
                You do not have permissions to delete this user.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="warning">Warning Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">type="warning"</code> on the modal component. The default icon changes to a yellow bell icon.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('warning')">Warning Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('warning')"&gt;
                Warning Modal
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                type="warning"
                title="First warning"
                name="warning"&gt;
                Hmmm...This is your first warning.
                Two more warnings and you are off this platform.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="success">Success Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">type="success"</code> on the modal component. The default icon changes to a green thumbs up icon.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('success')">Success Modal</x-bladewind::button>
    </p>

    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('success')"&gt;
                Success Modal
            &lt;/x-bladewind::button&gt;

           &lt;x-bladewind::modal
                type="success"
                title="User Deleted"
                name="success"&gt;
                Yayy.. User deleted successfully
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="stretched">Stretched Action Buttons</h3>
    <p>
        Some users prefer to have their action buttons span the entire width of the modal. To achieve this simply set <code class="inline text-red-500">stretched_action_buttons="true"</code> on the modal component.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('stretched')">Stretched Buttons Modal</x-bladewind::button>
    </p>

    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('stretched')"&gt;
                Success Modal
            &lt;/x-bladewind::button&gt;

           &lt;x-bladewind::modal
                title="Stretched Buttons"
                stretched_action_buttons="true"
                name="stretched"&gt;
                The action buttons in this modal have been stretched.
                This means each button gets its own line. Cool right?
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>

    <h2 id="blur-intensity">Backdrop Blur Intensity</h2>
    <p>
        The backdrop can be customized to have different intensities of the blur by specifying <code class="inline text-red-500">blur_size</code>.
        The available values are <code class="inline">none</code>, <code class="inline">small</code>, <code class="inline">medium</code>, <code class="inline">large</code>, <code class="inline">xl</code>, <code class="inline">xxl</code>, <code class="inline">omg</code>.
    </p>
    <div class="space-y-2 space-x-2">
        <x-bladewind::button onclick="showModal('noblur')">no blur</x-bladewind::button>
        <x-bladewind::button onclick="showModal('smallblur')">small blur</x-bladewind::button>
        <x-bladewind::button onclick="showModal('mediumblur')">medium blur</x-bladewind::button>
        <x-bladewind::button onclick="showModal('largeblur')">large blur</x-bladewind::button>
        <x-bladewind::button onclick="showModal('xlblur')">xl blur</x-bladewind::button>
        <x-bladewind::button onclick="showModal('xxlblur')">xxl blur</x-bladewind::button>
        <x-bladewind::button onclick="showModal('omgblur')">omg blur</x-bladewind::button>
    </div>

    <pre class="language-markup line-numbers" data-line="7">
        <code>
            &lt;x-bladewind::button onclick="showModal('noblur')"&gt;
                No Blur
            &lt;/x-bladewind::button&gt;

           &lt;x-bladewind::modal
                title="See Through Me"
                blur_size="none"
                name="noblur"&gt;
                The backdrop of this modal is not blurred.
                You can see all the content behind the backdrop.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>

    <x-bladewind::modal type="info" title="General Info" name="info">
        There will be eclipse of the moon every couple of years. Just keep looking up, you might see one in action.
    </x-bladewind::modal>
    <x-bladewind::modal type="error" title="Delete Not Allowed" name="error">
        You do not have permissions to delete this user.
    </x-bladewind::modal>
    <x-bladewind::modal type="warning" title="First warning" name="warning">
        Hmmm...This is your first warning. Two more warnings and you are off this platform.
    </x-bladewind::modal>

    <x-bladewind::modal type="success" title="User Deleted" name="success">
        The user info is gone for good. Don't expect to see it in the archives.
    </x-bladewind::modal>

    <x-bladewind::modal title="Stretched Buttons" name="stretched" stretch_action_buttons="true">
        DTOs are the best approach to convert validated data into an object, especially for more complex data structures. They provide type safety, clear structure, and easy validation.
        If you need a quick solution and your data is relatively simple, you can use json_decode() to convert the validated array to an object.
    </x-bladewind::modal>

    <x-bladewind::modal title="See Through Me" name="noblur" blur_size="none">
        The backdrop of this modal is not blurred. You can see all the content behind the backdrop.
    </x-bladewind::modal>

    <x-bladewind::modal title="Small Blur" name="smallblur" blur_size="small">
        The backdrop of this modal is not blurred. You can see all the content behind the backdrop.
    </x-bladewind::modal>

    <x-bladewind::modal title="Medium Blur" name="mediumblur" blur_size="medium">
        The backdrop of this modal is not blurred. You can see all the content behind the backdrop.
    </x-bladewind::modal>

    <x-bladewind::modal title="Large Blur" name="largeblur" blur_size="large">
        The backdrop of this modal is not blurred. You can see all the content behind the backdrop.
    </x-bladewind::modal>

    <x-bladewind::modal title="XL Blur" name="xlblur" blur_size="xl">
        The backdrop of this modal is not blurred. You can see all the content behind the backdrop.
    </x-bladewind::modal>

    <x-bladewind::modal title="XXL Blur" name="xxlblur" blur_size="xxl">
        The backdrop of this modal is not blurred. You can see all the content behind the backdrop.
    </x-bladewind::modal>

    <x-bladewind::modal title="OMG Blur" name="omgblur" blur_size="omg">
        The backdrop of this modal is not blurred. You can see all the content behind the backdrop.
    </x-bladewind::modal>

    <x-bladewind::modal title="Large File Size" name="iconic" icon="folder-arrow-down" icon_css="bg-gray-200 text-gray-700 p-2.5 rounded-full">
        The file you are trying to download is very big. Do you still want to continue with the download?
    </x-bladewind::modal>

    <x-bladewind::modal title="Large File Size" type="warning" name="iconic-warning" icon="folder-arrow-down">
        The file you are trying to download is very big. Do you still want to continue with the download?
    </x-bladewind::modal>
    <x-bladewind::modal title="Submit Bug?" type="error" name="iconic-error" icon="bug-ant" ok-button-label="Submit Bug">
        It appears you stumbled on a bug. Do you want to submit this report to our dev team for fixing?
    </x-bladewind::modal>
    <x-bladewind::modal type="info" name="iconic-info" icon="bolt" title="Lightening Coming">
        There's a terrible storm approaching. Please stay indoors to avoid getting struck by lightening.
    </x-bladewind::modal>
    <x-bladewind::modal type="success" name="iconic-success" icon="calendar-days" title="Event Added">
        Your event, "<b>Meeting with the mobile app developer"</b> has been added successfully.
        <a href="javascript:hideModal('iconic-success')">Go to event</a>
    </x-bladewind::modal>

    <h2 id="icons">Using Different Icons</h2>
    <p>
        The default types use predefined icons. You may want to use your own icons in the modal component to give your context to your message.
        You can set the  <code class="inline text-red-500">icon</code> attribute to any icon name on <a href="https://heroicons.com" target="_blank">Heroicons</a>. This modal icon is displayed using the
        BladewindUI <a href="/component/icon">Icon</a> component. Note the use of the <code class="inline text-red-500">icon_css</code> attribute as well. That is how to apply extra styling to the custom icon.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('iconic')">Custom Icon Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="6,7">
        <code>
            &lt;x-bladewind::button onclick="showModal('iconic')"&gt;
                Custom Icon Modal
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                icon="folder-arrow-down"
                icon_css="bg-gray-500 text-white p-2.5 rounded-full"
                title="Large File Size"
                name="info"&gt;
                The file you are trying to download is very big.
                Do you still want to continue with the download?
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <p>
        You may want to use a custom icon but with one of the predefined states. For example, you may want to display a success modal but you don't like the default <strong>check-circle</strong> icon used.
        It is possible to use a custom icon with any of the predefined states. Simply set both the <code class="inline text-red-500">type</code> and <code class="inline text-red-500">icon</code> attributes.
    </p>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
        <div><x-bladewind::button onclick="showModal('iconic-info')">Info</x-bladewind::button></div>
        <div><x-bladewind::button onclick="showModal('iconic-error')">Error</x-bladewind::button></div>
        <div><x-bladewind::button onclick="showModal('iconic-warning')">Warning</x-bladewind::button></div>
        <div><x-bladewind::button onclick="showModal('iconic-success')">Success</x-bladewind::button></div>
    </div>
    <br />
    <pre class="lang-markup line-numbers" data-line="8,10">
        <code>
            &lt;x-bladewind::button
                onclick="showModal('iconic-info')"&gt;
                Info
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                title="Large File Size"
                type="warning"
                name="iconic-warning"
                icon="folder-arrow-down"&gt;
                The file you are trying to download is very big.
                Do you still want to continue with the download?
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h2 id="sizes">Different Sizes</h2>
    <p>
        <x-bladewind::alert show_close_icon="false">On mobile the modal has just one size</x-bladewind::alert>
    </p>
    <p>
        You could tell the above modals looked quite squashed. The BladewindUI modal component comes with a size option that allows your content to breath in the modals.
        This can be achieved by setting the <code class="inline text-red-500">size</code> attribute on the modal component. The default <code class="inline text-red-500">size="small"</code>.
        Below are all the available sizes. All sizes are the same on mobile.
    </p>
    <h3 id="tiny">Tiny Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">size="tiny"</code> on the modal component.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('tiny-modal')">Tiny Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('tiny-modal')"&gt;
                Tiny Modal
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                size="tiny"
                title="Tiny Modal"
                name="tiny-modal"&gt;
                I am the tiniest in the modal family. Don't hate.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="small">Small Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">size="small"</code> on the modal component.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('small-modal')">Small Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('small-modal')"&gt;
                Small Modal
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                size="small"
                title="Small Modal"
                name="small-modal"&gt;
                I am the smallest in the modal family. Don't hate.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="medium">Medium Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">size="medium"</code> on the modal component.
        This is the default so it is not really necessary to set the attribute on the component if you want to use the medium modal size.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('medium-modal')">Medium Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="7">
        <code>
            &lt;x-bladewind::button onclick="showModal('medium-modal')"&gt;
                Medium Modal
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                title="Medium Modal"
                size="modal"
                name="medium-modal"&gt;
                I am the medium sized modal.
                Also the default if you do not set a size.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="medium">Big Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">size="big"</code> on the modal component.
        This is the default so it is not really necessary to set the attribute on the component if you want to use the big modal size.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('big-modal')">Big Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="7">
        <code>
            &lt;x-bladewind::button onclick="showModal('big-modal')"&gt;
                Big Modal
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                title="Big Modal"
                size="modal"
                name="big-modal"&gt;
                I am the medium sized modal.
                Also the default if you do not set a size.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="large">Large Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">size="large"</code> on the modal component.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('large-modal')">Large Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('large-modal')"&gt;
                Large Modal
            &lt;/x-bladewind::button&gt;

           &lt;x-bladewind::modal
                size="large"
                title="Large Modal"
                name="large-modal"&gt;
                I am the large modal. If I am not large enough to contain
                your needs, check out my xl brother.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="xl">XL Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">size="xl"</code> on the modal component.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('xl-modal')">xl Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('xl-modal')"&gt;
                Xl Modal
            &lt;/x-bladewind::button&gt;

           &lt;x-bladewind::modal
                size="xl"
                title="XL Modal"
                name="xl-modal"&gt;
                I am the extra large modal. How do you like my size now.
                You could fill me up with some much needed content.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="omg">OMG Modal a.k.a Full Width Modal</h3>
    <p>
        This requires that you set <code class="inline text-red-500">size="omg"</code> on the modal component.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('omg-modal')">omg Modal</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('omg-modal')"&gt;
                OMG Modal
            &lt;/x-bladewind::button&gt;

           &lt;x-bladewind::modal
                size="omg"
                title="Full Width Modal"
                name="omg-modal"&gt;
                I am the full width modal. My nickname is OMG.
                I take up the entire screen. I do not know why
                you will need a modal like this but well, like they say,
                it is better to have and not use that need and not have.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3>Modal Size Table</h3>
    <x-bladewind::table>
        <x-slot:header>
            <th>Size</th>
            <th>CSS Class</th>
        </x-slot:header>
        <tr>
            <td>tiny</td>
            <td>sm:w-72</td>
        </tr>
        <tr>
            <td>small</td>
            <td>sm:w-96</td>
        </tr>
        <tr>
            <td>medium</td>
            <td>sm:w-[32rem]</td>
        </tr>
        <tr>
            <td>large</td>
            <td>sm:w-[60rem]</td>
        </tr>
        <tr>
            <td>xl</td>
            <td>sm:w-[86rem]</td>
        </tr>
        <tr>
            <td>omg</td>
            <td>max-w-screen</td>
        </tr>
    </x-bladewind::table>
    <x-bladewind::modal size="tiny" title="Tiny Modal" name="tiny-modal">
        I am the tiniest in the modal family. I am probably rarely used.
    </x-bladewind::modal>
    <x-bladewind::modal size="small" title="Small Modal" name="small-modal">
        I am the smallest in the modal family. I am probably the second most used.
    </x-bladewind::modal>
    <x-bladewind::modal size="medium" title="Medium Modal" name="medium-modal">
        I am the medium sized modal. Also the default if you do not set a size.
    </x-bladewind::modal>
    <x-bladewind::modal size="big" title="Big Modal" name="big-modal">
        English can be quite confusing. How is big different from large? You're the best person to judge!
    </x-bladewind::modal>
    <x-bladewind::modal size="large" title="Large Modal" name="large-modal">
        I am the large modal. If I am not large enough to contain your needs, check out my xl brother.
    </x-bladewind::modal>
    <x-bladewind::modal size="xl" title="XL Modal" name="xl-modal">
        I am the extra large modal. How do you like my size now. You could fill me up with some much needed content.
    </x-bladewind::modal>
    <x-bladewind::modal size="omg" title="Full Width Modal" name="omg-modal">
        I am the full width modal. My nickname is OMG. I take up the entire screen. I do not know why you will need a modal like this but well,
        like they say, it is better to have and not use that need and not have.
    </x-bladewind::modal>

    <h2 id="actions">Action Buttons</h2>
    <p>The modal component by default shows a <code class="inline text-red-500">Cancel</code> and <code class="inline text-red-500">Okay</code> button.
    Both buttons by default close the modal when clicked. It is possible to show either of the buttons or even none of the buttons.</p>
    <p>If you don't want your buttons to say <b>Cancel</b> and <b>Okay</b>, set the <code class="inline text-red-500">cancel_button_label</code> and
    <code class="inline text-red-500">ok_button_label</code> attributes to whatever text you want the buttons to display.</p>
    <p>
        To hide the <code class="inline text-red-500">cancel</code> button, simply set <code class="inline text-red-500">cancel_button_label=""</code>. When the button label is blank, the button won't be displayed.
        In the same way, to hide the primary button, the okay button in this case, simply set <code class="inline text-red-500">ok_button_label=""</code>. When the button label is blank, the button won't be displayed.
    </p>
    <x-bladewind::modal title="No Cancel Button" name="no-cancel" cancel_button_label="">
        I have no cancel button. Just okay and that is fine.
    </x-bladewind::modal>
    <x-bladewind::modal title="No Okay Button" name="no-okay" ok_button_label="">
        I have no okay button. Just cancel this thing and let's all go home.
    </x-bladewind::modal>
    <h3 id="no-cancel">No Cancel Button</h3>
    <p>
        <x-bladewind::button onclick="showModal('no-cancel')">No cancel button</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="8">
        <code>
            &lt;x-bladewind::button onclick="showModal('no-cancel')"&gt;
                No cancel button
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                title="No Cancel Button"
                name="no-cancel"
                cancel_button_label=""&gt;
                I have no cancel button. Just okay and that is fine.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="no-okay">No Okay Button</h3>
    <p>
        <x-bladewind::button onclick="showModal('no-okay')" class="mt-2 sm:mt-0">No okay button</x-bladewind::button>
    </p>
    <pre class="language-markup line-numbers" data-line="8">
        <code>
            &lt;x-bladewind::button onclick="showModal('no-okay')"&gt;
                No okay button
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                title="No Okay Button"
                name="no-okay"
                ok_button_label=""&gt;
                I have no okay button.
                Just cancel this thing and let's all go home.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>

    <h3 id="no-buttons">Hiding Both Action Buttons</h3>
    <p>
        Your guess is right. To hide both the okay and cancel buttons you can set
        <code class="inline text-red-500">cancel_button_label=""</code> and <code class="inline text-red-500">ok_button_label=""</code>. However, there is a shorter way to achieve this.
        Instead, set the <code class="inline text-red-500">show_action_buttons="false"</code> attribute. This will hide both action buttons.
        A no-action-buttons modal can be useful if you want to have a form in a modal with its own button that submits the form.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('no-action-buttons')">No action buttons</x-bladewind::button>
    </p>
    <x-bladewind::modal title="No Action Buttons" name="no-action-buttons" show_action_buttons="false">
        I have no action buttons. Only the backdrop can close me now.
    </x-bladewind::modal>

    <pre class="language-markup line-numbers" data-line="6">
        <code>
            &lt;x-bladewind::button onclick="showModal('no-action-buttons')"&gt;
                No action buttons
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                title="No Action Buttons"
                name="no-action-buttons"
                show_action_buttons="false"&gt;
                I have no action buttons. Only the backdrop can close me now.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <h3 id="btn-actions">Action Button Actions</h3>
    <p>
        By default both action buttons close the modal. It is possible to change these default actions. To achieve this you will need to
        set the <code class="inline text-red-500">cancel_button_action</code> and <code class="inline text-red-500">ok_button_action</code> attributes.
        The default values are <code class="inline text-red-500">cancel_button_action="close"</code> and <code class="inline text-red-500">ok_button_action="close"</code>.
        The attributes expect javascript functions as the values.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('custom-actions')">CLick me for custom actions</x-bladewind::button>
    </p>
    <x-bladewind::modal
        size="big"
        type="warning"
        title="Confirm User Deletion"
        ok_button_action="alert('as you wish')"
        cancel_button_action="alert('good choice')"
        close_after_action="false"
        name="custom-actions"
        ok_button_label="Yes, delete"
        cancel_button_label="don't delete">
        Are you sure you want to delete this user? This action cannot be undone.
    </x-bladewind::modal>
    <pre class="language-markup line-numbers" data-line="9-11">
        <code>
            &lt;x-bladewind::button onclick="showModal('custom-actions')"&gt;
                CLick me for custom actions
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                size="big"
                type="warning"
                title="Confirm User Deletion"
                ok_button_action="alert('as you wish')"
                cancel_button_action="alert('good choice')"
                close_after_action="false"
                name="custom-actions"
                ok_button_label="Yes, delete"
                cancel_button_label="don't delete"&gt;
                Are you sure you want to delete this user? This action cannot be undone.
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>

    <p>
        You will notice from the custom actions example above that we introduced the attribute <code class="inline text-red-500">close_after_action="false"</code>.
        By default, the modal is dismissed after clicking any of the action buttons. Setting this attribute to <code class="inline text-red-500">false</code> will ensure the modal stays open after clicking any of the action buttons.
    </p>
    <h3>Close Icon</h3>
    <p>
        Closing of the modal is delegated mostly to the Cancel or Close button in the footer of the modal. It is, however, possible to close modals using a close icon placed in the top right of the modal.
        To enable this, you will need to set <code class="text-red-500 inline">show_close_icon="true"</code>. <a href="javascript:showModal('tnc-agreement')">Here is an example.</a>
    </p>

    <h3 id="alignment">Alignment of the Action Buttons</h3>
    <p>
        By default the action buttons are right aligned but left aligned if the modal <code class="inline text-red-500">size="tiny"</code>. To change the alignment of the action buttons, set the <code class="inline text-red-500">align_buttons</code> attribute to either left, center or right.
    </p>
    <div class="flex space-x-3">
        <x-bladewind::button onclick="showModal('go-left')">buttons left</x-bladewind::button>
        <x-bladewind::button onclick="showModal('go-center')">buttons center</x-bladewind::button>
        <x-bladewind::button onclick="showModal('go-right')">buttons right</x-bladewind::button>
    </div>
    <x-bladewind::modal type="warning"  title="Confirm User Deletion"  align_buttons="left"  name="go-left">
        Are you sure you want to delete this user? This action cannot be undone.
    </x-bladewind::modal>
    <x-bladewind::modal type="warning"  title="Confirm User Deletion"  align_buttons="center"  name="go-center">
        Are you sure you want to delete this user? This action cannot be undone.
    </x-bladewind::modal>
    <x-bladewind::modal type="warning"  title="Confirm User Deletion"  align_buttons="right"  name="go-right">
        Are you sure you want to delete this user? This action cannot be undone.
    </x-bladewind::modal>
    <h2 id="cant-dismiss">Non-Dismissible Modal</h2>
    <p>By default the modal component can be closed using the backdrop or any of the action buttons. There are cases when you really don't want the user to dismiss the modal until a choice has been made or an action has been performed.</p>
    <p>Getting this result is simple. Just set <code class="inline text-red-500">backdrop_can_close="false"</code>. If you are using the modals with the action buttons you will also need to set the actions of each button. See <a href="#actions">Action Buttons</a> above.</p>
    <p>In this example, we assume your app is very data sensitive and you want users to be able to lock their screens when stepping away from their computers.</p>
    <p>
        <x-bladewind::alert type="warning" show_close_icon="false" show_icon="false">Refresh the page to get out of locked mode</x-bladewind::alert>
    </p>
    <p>
        <x-bladewind::button onclick="showModal('lock-screen')" icon="lock-closed" class="text-white">lock the screen</x-bladewind::button>
    </p>
    <x-bladewind::modal size="medium" show_action_buttons="false" backdrop_can_close="false" name="lock-screen">
            <div class="flex mx-auto justify-center my-2">
                <x-bladewind::avatar size="big"
                    image="https://lh3.googleusercontent.com/a-/AOh14GhSotQTt_njzqqq-265MKM5z5iPP9m-_A2myyrGXQ=s288-p-rw-no" />
            </div>
            <div class="my-4">
                You will need to unlock the screen to continue using this application.
            </div>
            <x-bladewind::input placeholder="Enter your password to unlock" type="password" />
            <x-bladewind::button class="w-full">Check password</x-bladewind::button>

    </x-bladewind::modal>

    <pre class="language-markup line-numbers" data-line="7">
        <code>
            &lt;x-bladewind::button onclick="showModal('lock-screen')"&gt;
                &lt;svg&gt;...&lt;/svg&gt; lock the screen
            &lt;/x-bladewind::button&gt;

            &lt;x-bladewind::modal
                show_action_buttons="false"
                backdrop_can_close="false"
                name="lock-screen"&gt;

                    &lt;div class="flex mx-auto justify-center my-2"&gt;
                        &lt;x-bladewind.avatar class="" image="/path/to/the/image/file" /&gt;
                    &lt;/div&gt;
                    &lt;div class="my-4"&gt;
                        You will need to unlock the screen to continue using this application.
                    &lt;/div&gt;

                    &lt;x-bladewind.input
                        placeholder="Enter your password to unlock"
                        type="password" /&gt;

                    &lt;x-bladewind::button class="w-full"&gt;Check password&lt;/x-bladewind::button&gt;

            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>

    <h2 id="forms">Submitting Form Using Action Button</h2>
    <p>
        There may be instances where you want to load a form in a modal and only submit the form when the user clicks on the Okay or Save action button.
        Submitting the form should also happen ONLY if all validations have passed. The modal component itself does not provide a magical way of achieving this but the code below implements the logic we just described.
    </p>
    <h3 id="validate">Validate and Submit Form</h3>
    <p>
        <x-bladewind::button onclick="showModal('form-mode')" icon="lock" class="text-white">Edit Profile</x-bladewind::button>
    </p>
    <x-bladewind::modal backdrop_can_close="false" name="form-mode" ok_button_action="saveProfile()" ok_button_label="Update" close_after_action="false">
        <form method="get" action="" class="profile-form">
            @csrf
            <b>Edit Your Profile</b>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <x-bladewind::input required="true" name="first_name" label="First name" error_message="Please enter your first name" />
                <x-bladewind::input required="true" name="last_name" label="Last name" error_message="Please enter your last name" />
            </div>
            <x-bladewind::input required="true" name="email" label="Email address" error_message="Please enter your email" />
            <x-bladewind::input numeric="true" name="mobile" label="Mobile" />
            <x-bladewind::select name="gender" placeholder="Select Gender" data="manual">
                <x-bladewind::select.item label="Male" value="male" />
                <x-bladewind::select.item label="Female" value="female" />
                <x-bladewind::select.item label="Prefer not to say" value="other" />
            </x-bladewind::select>
        </form>
    </x-bladewind::modal>
    <script>
        saveProfile = () => {
            if(validateForm('.profile-form')){
                domEl('.profile-form').submit();
            } else {
                return false;
            }
        }
    </script>

    <pre class="language-markup line-numbers" data-line="5">
        <code>
            // the modal and its form
            &lt;x-bladewind::modal
                backdrop_can_close="false"
                name="form-mode"
                ok_button_action="saveProfile()"
                ok_button_label="Update"
                close_after_action="false"
                &gt;

                &lt;form method="post" action="" class="profile-form"&gt;
                    @@csrf
                    &lt;b class="mt-0"&gt;Edit Your Profile&lt;/b&gt;
                    &lt;div class="grid grid-cols-2 gap-4 mt-6"&gt;
                        &lt;x-bladewind::input required="true" name="first_name"
                            error_message="Please enter your first name" label="First name" /&gt;

                        &lt;x-bladewind::input required="true" name="last_name"
                             error_message="Please enter your last name" label="Last name" /&gt;
                    &lt;/div&gt;
                    &lt;x-bladewind::input required="true" name="email"
                         error_message="Please enter your email" label="Email address" /&gt;

                    &lt;x-bladewind::input numeric="true" name="mobile" label="Mobile" /&gt;
                &lt;/form&gt;

            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>

    <pre class="language-js line-numbers" data-line="3">
        <code>
            // the script called by the Update button
            saveProfile = () => {
                if(validateForm('.profile-form')){
                    domEl('.profile-form').submit();
                } else {
                    return false;
                }
            }
        </code>
    </pre>
    <p>
        The "Update" button from the modal above calls a <code class="inline">saveProfile()</code> Javascript function when it is clicked on
        <code class="inline text-red-500">ok_button_action="saveProfile()"</code>. In the Javascript function, we validate the profile form
        <code class="inline">class="profile-form"</code> using the
        <code class="inline">validateForm()</code> helper function available in BladewindUI. We then submit the form if all required fields are not empty.
        The form above uses <code class="inline text-red-500">method="get"</code> so you can see the form fields passed as query strings in the URL.
    </p>
    <p>
        By default BladewindUI modals close when either of the action buttons are clicked. To prevent our modal from closing when the user clicks on the Update button, we
        set the <code class="inline text-red-500">close_after_action="false"</code> attribute.
    </p>
    <h3 id="ajax">Using Ajax</h3>
    <p>
        In the next example our form is submitted via Ajax. The example makes use of the <a href="/component/process-indicator">Process Indicator</a> component to show progress.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('form-mode-ajax')" icon="lock" class="text-white">Edit Profile Ajax</x-bladewind::button>
    </p>
    <x-bladewind::modal backdrop_can_close="false" name="form-mode-ajax" ok_button_action="saveProfileAjax()"  ok_button_label="Update" close_after_action="false">
        <form method="get" action="" class="profile-form-ajax">
            @csrf
            <b>Edit Your Profile</b>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <x-bladewind::input required="true" name="first_name2" label="First name" error_message="Please enter your first name" />
                <x-bladewind::input required="true" name="last_name2" label="Last name" error_message="Please enter your last name" />
            </div>
            <x-bladewind::input required="true" name="email2" label="Email address" error_message="Please enter your email" />
            <x-bladewind::input numeric="true" name="mobile2" label="Mobile" />
        </form>
        <x-bladewind::processing
            name="updating-profile"
            message="Updating your profile." />

        <x-bladewind::process-complete
            name="profile-updated"
            process_completed_as="passed"
            button_label="Done"
            button_action="hideModal('form-mode-ajax')"
            message="Profile updated successfully." />

    </x-bladewind::modal>
    <script>
        saveProfileAjax = () => {
            if(validateForm('.profile-form-ajax')){
                hide('.profile-form-ajax');
                unhide('.updating-profile');
                hideModalActionButtons('form-mode-ajax');
                // make the call
                makeAjaxCall(serialize('.profile-form-ajax'));
            } else {
                return false;
            }
        }

        makeAjaxCall = (formData) => {
            // this is a dummy function but your real function
            // will make a call and post all the data
            setTimeout(() => {
                // do these when your ajax call is done saving your data
                hide('.updating-profile');
                unhide('.profile-updated')
            }, 3000);
        }
    </script>

    <pre class="language-markup line-numbers" data-line="6,8,23,27,31">
        <code>
        // the modal and its form.
        // take note of the processing and process-complete components

        &lt;x-bladewind::modal
            backdrop_can_close="false"
            name="form-mode-ajax"

            ok_button_action="saveProfileAjax()"
            ok_button_label="Update"
            close_after_action="false"&gt;

            &lt;form method="get" action="" class="profile-form-ajax"&gt;
                @@csrf
                &lt;b&gt;Edit Your Profile&lt;/b&gt;
                &lt;div class="grid grid-cols-2 gap-4 mt-6"&gt;
                    &lt;x-bladewind::input required="true" name="first_name2"
                        label="First name" error_message="Please enter your first name" /&gt;
                    &lt;x-bladewind::input required="true" name="last_name2"
                        label="Last name" error_message="Please enter your last name" /&gt;
                &lt;/div&gt;
                &lt;x-bladewind::input required="true" name="email2"
                        label="Email address" error_message="Please enter your email" /&gt;
                &lt;x-bladewind::input numeric="true" name="mobile2" label="Mobile" /&gt;
            &lt;/form&gt;

            &lt;x-bladewind::processing
                name="profile-updating"
                message="Updating your profile." /&gt;

            &lt;x-bladewind::process-complete
                name="profile-update-yes"
                process_completed_as="passed"
                button_label="Done"
                button_action="hideModal('form-mode-ajax')"
                message="Profile updated successfully." /&gt;

        &lt;/x-bladewind::modal&gt;
        </code>
    </pre>

    <pre class="language-js line-numbers" data-line="3">
        <code>
        // the script called by the Update button
        saveProfileAjax = () => {
            if(validateForm('.profile-form-ajax')){
                // show process indicator while you make your ajax call
                unhide('.profile-updating');
                hide('.profile-form-ajax');
                hideModalActionButtons('form-mode-ajax');
                // make the call
                makeAjaxCall(serialize('.profile-form-ajax'));
            } else {
                return false;
            }
        }

        makeAjaxCall = (formData) => {
            // this is a dummy function but your real function
            // will make a call and post all the data
            setTimeout(() => {
                // do these when your ajax call is done saving your data
                hide('.profile-updating');
                unhide('.profile-update-yes')
            }, 5000);
        }
        </code>
    </pre>
    <p>
        The example above follows the same principle as the first, except we submit the form via Ajax.
        When the Update button is clicked the <code class="inline">saveProfileAjax()</code> function is called.
        This validates the form and hides the action buttons of the modal if validation passes.
        We don't want the user canceling the form submission or clicking the Update button a second time.
        The form is also hidden while the process indicator is displayed. Lastly, the form data is passed to the <code class="inline">makeAjaxCall()</code> function.
    </p>
    <p>
        You will need to flesh out the makeAjaxCall() function yourself to make the actual ajax call. The idea however is, once the ajax call returns
        a status, we hide the process indicator and display the <a href="/component/process-indicator">process-complete</a> component. The Done button on the process-complete
        component closes the modal when clicked on (<code class="inline text-red-500">button_action="hideModal('form-mode-ajax')"</code>).
    </p>
    <p>
        This example used only one process-complete component. Normally you will have two process-complete components. One to show if the process failed and the other to show if the process succeeded.
    </p>
    <p>
        <code class="inline">hide()</code>, <code class="inline">unhide()</code>, <code class="inline">hideModalActionButtons()</code>, <code class="inline">serialize()</code> and <code class="inline">validateForm()</code>
        are all <a href="/extra/helper-functions">helper functions</a> available in BladewindUI.
    </p>

    <h3 id="submit">Option 3. Probably the easiest option</h3>
    <p>
        The third and final option is to hide the Okay button of the modal and let the submit button sit in the form itself. The modal will only have a cancel button to close the form if needed.
    </p>
    <p>
        <x-bladewind::button onclick="showModal('form-mode-simple')">Edit Profile Simple</x-bladewind::button>
    </p>
    <x-bladewind::modal backdrop_can_close="false" name="form-mode-simple" ok_button_label="" >
        <form method="get" action="" class="profile-form-simple" onsubmit="return saveProfileSimple()">
            @csrf
            <b>Edit Your Profile</b>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <x-bladewind::input required="true" name="first_name3" label="First name" error_message="Please enter your first name" />
                <x-bladewind::input required="true" name="last_name3" label="Last name" error_message="Please enter your last name" />
            </div>
            <x-bladewind::input required="true" name="email3" label="Email address" error_message="Please enter your email" />
            <x-bladewind::input numeric="true" name="mobile3" label="Mobile" />
            <x-bladewind::button can_submit="true" class="w-full mt-2">Update Profile</x-bladewind::button>
        </form>
    </x-bladewind::modal>
    <script>
        saveProfileSimple = () => {
            if(validateForm('.profile-form-simple')){
                return domEl('.profile-form-simple').submit();
            }
            return false;
        }
    </script>

    <pre class="line-numbers language-markup" data-line="5,9">
        <code>
        // the modal and its form.
        &lt;x-bladewind::modal
            backdrop_can_close="false"
            name="form-mode-simple"
            ok_button_label=""
            &gt;

            &lt;form method="get" action="" class="profile-form-simple"
                  onsubmit="return saveProfileSimple()"&gt;
                @@csrf
                &lt;b&gt;Edit Your Profile&lt;/b&gt;
                &lt;div class="grid grid-cols-2 gap-4 mt-6"&gt;
                    &lt;x-bladewind::input required="true" name="first_name3"
                        label="First name" error_message="Please enter your first name" /&gt;
                    &lt;x-bladewind::input required="true" name="last_name3"
                        label="Last name" error_message="Please enter your last name" /&gt;
                &lt;/div&gt;
                &lt;x-bladewind::input required="true" name="email3"
                        label="Email address" error_message="Please enter your email" /&gt;
                &lt;x-bladewind::input numeric="true" name="mobile3"
                        label="Mobile" /&gt;
                &lt;x-bladewind::button can_submit="true" class="w-full mt-2"&gt;
                    Update Profile
                &lt;/x-bladewind::button&gt;
            &lt;/form&gt;
        &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <pre class="line-numbers language-js" data-line="4">
        <code>
        // the script called by the Update button
        saveProfileSimple = () => {
            if(validateForm('.profile-form-simple')){
                return domEl('.profile-form-simple').submit();
            }
            return false;
        }
        </code>
    </pre>

    <p>
        The example above sets <code class="text-red-500 inline">ok_button_label=""</code> to hide the Okay button.
        We then set the <code class="text-red-500 inline">onsubmit</code> attribute of the form to call a Javascript function when the form is submitted. <code class="inline text-red-500">onsubmit="<b>return</b> saveProfileSimple()"</code>.
        Take note of the <code class="inline">return</code> keyword. Without this, the form will submit when clicked on, even if validation fails.
    </p>
    <p>
        To make the button submittable we added the <code class="inline text-red-500">can_submit="true"</code> attribute to the button component. The Javascript
        function returns false when validation fails or true if otherwise. That is really all we need to do in this case. One of these three options should hopefully serve your use-case.
    </p>

    <h2 id="placeholders">Replacing Placeholders</h2>
    <p>
        There are times you will want to replace placeholders in the content of your modals. An example is when you are deleting a record and want the user to confirm.
        Your message might look something like: <b>Do you really want to delete Michael Ocansey as an admin?</b> Achieving this can be challenging without placeholders, especially when using one modal to handle actions from data that is generated dynamically.
        With placeholders your message will now become, <b>Do you really want to delete :name as an admin?</b>
    </p>

    <x-bladewind::table>
        <x-slot name="header">
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th></th>
        </x-slot>
        <tr>
            <td>Alfred Rowe</td>
            <td>Outsourcing</td>
            <td>alfred@therowe.com</td>
            <td><x-bladewind::button size="tiny" color="red" onclick="showModal('placeholder-example', {auth_user: 'mike', name: 'Alfred Rowe'})">Delete</x-bladewind::button></td>
        </tr>
        <tr>
            <td>Michael K. Ocansey</td>
            <td>Tech</td>
            <td>kabutey@gmail.com</td>
            <td><x-bladewind::button size="tiny" color="red" onclick="showModal('placeholder-example', {auth_user: 'mike', name: 'Michael K. Ocansey'})">Delete</x-bladewind::button></td>
        </tr>
        <tr>
            <td>Adam Nsiah</td>
            <td>Tech</td>
            <td>adam@nsiah.com</td>
            <td><x-bladewind::button size="tiny" color="red" onclick="showModal('placeholder-example', {auth_user: 'mike', name: 'Adam Nsiah'})">Delete</x-bladewind::button></td>
        </tr>
    </x-bladewind::table>
    <p>

    </p>
    <x-bladewind::modal name="placeholder-example" title="Confirm" type="error">
        Hey :auth_user, to delete <b>:name</b>, first delete all the pictures they have uploaded
    </x-bladewind::modal>

    <pre class="line-numbers language-markup" data-line="5,9">
        <code>
        &lt;x-bladewind::modal
            name="placeholder-example"
            title="Confirm"
            type="error"&gt;
            Hey :auth_user, to delete &lt;b&gt;:name&lt;/b&gt;,
            first delete all the pictures they have uploaded
        &lt;/x-bladewind::modal&gt;
        </code>
    </pre>
    <pre class="line-numbers language-markup" data-line="12,13">
        <code>
&lt;x-bladewind::table&gt;
    ...
    &lt;tr&gt;
        &lt;td>Alfred Rowe&lt;/td&gt;
        &lt;td>Outsourcing&lt;/td&gt;
        &lt;td>alfred@therowe.com&lt;/td&gt;
        &lt;td>
            &lt;x-bladewind::button
            size="tiny"
            color="red"
            onclick="showModal('placeholder-example', {
                auth_user: 'mike',
                name: 'Alfred Rowe'
            })">Delete&lt;/x-bladewind::button>&lt;/td&gt;
    &lt;/tr&gt;
    ...
&lt;/x-bladewind::table&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Modal component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>type</td>
            <td><em>blank</em></td>
            <td><code class="inline">info</code> <code class="inline">error</code> <code class="inline">warning</code> <code class="inline">success</code></td>
        </tr>
        <tr>
            <td>title</td>
            <td><em>blank</em></td>
            <td>String. Defines the title of the modal.</td>
        </tr>
        <tr>
            <td>name</td>
            <td>'bw-modal-'.uniqid()</td>
            <td>Uniquely identifies a modal. This attribute is very important if you want to prevent erratic behaviour of modals.</td>
        </tr>
        <tr>
            <td>ok_button_label</td>
            <td>okay</td>
            <td>Specify the label to be displayed on the primary action button.</td>
        </tr>
        <tr>
            <td>cancel_button_label</td>
            <td>cancel</td>
            <td>Specify the label to be displayed on the secondary action button.</td>
        </tr>
        <tr>
            <td>ok_button_action</td>
            <td>close</td>
            <td>Expects a javascript function that will be called when the primary action button is clicked.</td>
        </tr>
        <tr>
            <td>cancel_button_action</td>
            <td>close</td>
            <td>Expects a javascript function that will be called when the secondary action button is clicked.</td>
        </tr>
        <tr>
            <td>close_after_action</td>
            <td>true</td>
            <td>Specify whether the modal stays open after any of the action buttons are clicked.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>backdrop_can_close</td>
            <td>true</td>
            <td>Specify whether clicking on the modal backdrop should close the modal.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>blur_size</td>
            <td>medium</td>
            <td>Specify the intensity of the backdrop blur.<br>
                <code class="inline">none</code> <code class="inline">small</code>
                <code class="inline">medium</code> <code class="inline">large</code>
                <code class="inline">xl</code>
                <code class="inline">omg</code>
            </td>
        </tr>
        <tr>
            <td>show_action_buttons</td>
            <td>true</td>
            <td>Specify whether the action buttons should be displayed.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>align_buttons</td>
            <td>right</td>
            <td>Specify how the action buttons should be aligned in the modal footer.<br> <code class="inline">left</code> <code class="inline">center</code> <code class="inline">right</code> </td>
        </tr>
        <tr>
            <td>stretch_action_buttons</td>
            <td>false</td>
            <td>Specify whether the action buttons should stretch the entire width of the modal. Each button will be on its own line.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>size</td>
            <td>big</td>
            <td>Defines the size of the modal. Arranged from smallest to largest. <br> <code class="inline">tiny</code> <code class="inline">small</code> <code class="inline">medium</code>
             <code class="inline">large</code> <code class="inline">xl</code> <code class="inline">omg</code></td>
        </tr>
        <tr>
            <td>show_close_icon</td>
            <td>false</td>
            <td>Display a close icon in the top right corner of the modal window. Clicking on this will close the modal or behave the same as the Cancel button if it exists in the modal footer.
            <br><br><code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>body_css</td>
            <td><em>blank</em></td>
            <td>Any extra css classes to add to the modal body.</td>
        </tr>
        <tr>
            <td>footer_css</td>
            <td><em>blank</em></td>
            <td>Any extra css classes to add to the modal footer.</td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>

    <h3>Modal with all attributes defined</h3>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::modal
                type="warning"
                title="Modal with all features"
                name="full-modal"
                ok_button_label="yes"
                cancel_button_label="no"
                close_after_action="false"
                ok_button_action="alert('say ok')"
                cancel_button_action="alert('say nay')"
                backdrop_can_close="false"
                show_action_buttons="false"
                show_close_icon="true"
                blur_size="xxl"

                size="medium"
                class="shadow-sm"&gt;
                ...
            &lt;/x-bladewind::modal&gt;
        </code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source files for this component are available in <code class="inline">resources > views > components > bladewind > modal.blade.php</code> and
        <code class="inline">resources > views > components > bladewind > modal-icon.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#default">Default modal</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#types">Different types</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#info">Info</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#error">Error</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#warning">Warning</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#success">Success</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#stretched">Stretched buttons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#blur-intensity">Backdrop Blur Intensity</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#icons">Other icons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#sizes">Different sizes</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#tiny">Tiny</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#small">Small</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#medium">Medium</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#big">Big</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#large">Large</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#xl">XL</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#omg">Full width</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#actions">Action buttons</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#no-cancel">No cancel button</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#no-okay">No okay button</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#no-buttons">No buttons</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#btn-actions">Custom actions</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#alignment">Button alignment</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#cant-dismiss">Non-dismissible modal</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#forms">Form submissions</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#validate">Validate & submit</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#ajax">Ajax example</a></div>
        <div class="flex items-center pl-5"><div class="dot"></div><a href="#submit">Submit button in form</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#placeholders">Replacing placeholders</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-modal');
        </script>
    </x-slot>
</x-app>
