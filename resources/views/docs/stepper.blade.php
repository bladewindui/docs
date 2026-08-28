<x-app>
    <x-slot:title>Stepper Component</x-slot:title>
    <x-slot:page_title>Stepper</x-slot:page_title>

    <p>Stepper guides people through a named sequence of related tasks. Each step can reveal its own content panel, which makes the component suitable for account setup, checkout, onboarding, reviews, and other multi-stage forms. The root <code class="inline">current</code> value is the canonical initial selection.</p>

    <x-bladewind::card has-shadow="false">
        <x-bladewind::stepper name="intro-setup" current="profile" aria-label="Account setup progress">
            <x-bladewind::stepper.item name="account" label="Account" state="complete" />
            <x-bladewind::stepper.item name="profile" label="Profile" description="Personal details" />
            <x-bladewind::stepper.item name="security" label="Security" />
            <x-bladewind::stepper.content name="account" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
                <div class="space-y-3"><h4 class="font-semibold">Account created</h4><p>Your email address has been verified and your sign-in details are ready.</p><p class="text-sm text-slate-500">You can return here to change the primary email before completing setup.</p></div>
            </x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="profile" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
                <div class="space-y-3"><h4 class="font-semibold">Complete your profile</h4><p>Add the name, role, and contact details that other workspace members will see.</p><div class="grid gap-3 sm:grid-cols-2"><x-bladewind::input label="Display name" placeholder="Ama Mensah" /><x-bladewind::input label="Role" placeholder="Product manager" /></div></div>
            </x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="security" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
                <div class="space-y-3"><h4 class="font-semibold">Secure your account</h4><p>Choose a verification method and add recovery information.</p><ul class="list-disc space-y-1 pl-5 text-sm"><li>Enable two-step verification</li><li>Save a recovery telephone number</li></ul></div>
            </x-bladewind::card></x-bladewind::stepper.content>
        </x-bladewind::stepper>
    </x-bladewind::card>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::stepper name="account-setup" current="profile" aria-label="Account setup progress"&gt;
    &lt;x-bladewind::stepper.item name="account" label="Account" state="complete" /&gt;
    &lt;x-bladewind::stepper.item name="profile" label="Profile" description="Personal details" /&gt;
    &lt;x-bladewind::stepper.item name="security" label="Security" /&gt;
    &lt;x-bladewind::stepper.content name="account" has-border="false"&gt;
        &lt;x-bladewind::card has-shadow="false"&gt;Account details&lt;/x-bladewind::card&gt;
    &lt;/x-bladewind::stepper.content&gt;
    &lt;x-bladewind::stepper.content name="profile" has-border="false"&gt;
        &lt;x-bladewind::card has-shadow="false"&gt;Profile form&lt;/x-bladewind::card&gt;
    &lt;/x-bladewind::stepper.content&gt;
    &lt;x-bladewind::stepper.content name="security" has-border="false"&gt;
        &lt;x-bladewind::card has-shadow="false"&gt;Security options&lt;/x-bladewind::card&gt;
    &lt;/x-bladewind::stepper.content&gt;
&lt;/x-bladewind::stepper&gt;</code></pre>

    <h2 id="styles">Visual Styles</h2>
    <p>Use the <code class="inline">style</code> attribute to change how the sequence is presented without changing its content, state, events, or keyboard behavior. The available values are <code class="inline">circles</code>, <code class="inline">chevrons</code>, <code class="inline">bars</code>, and <code class="inline">line</code>. Circles is the default and works with both orientations.</p>
    <x-bladewind::table>
        <x-slot:header><th>Style</th><th>Horizontal</th><th>Vertical</th><th>Behavior</th></x-slot:header>
        <tr><td><code class="inline">circles</code></td><td>Yes</td><td>Yes</td><td>Default numbered or icon indicators with connecting lines.</td></tr>
        <tr><td><code class="inline">chevrons</code></td><td>Yes</td><td>No</td><td>Horizontal-only segmented path. Vertical requests fall back to circles.</td></tr>
        <tr><td><code class="inline">bars</code></td><td>Yes</td><td>Yes</td><td>Top bars horizontally and side bars vertically.</td></tr>
        <tr><td><code class="inline">line</code></td><td>Yes</td><td>Yes</td><td>Compact dots on a horizontal or vertical line.</td></tr>
    </x-bladewind::table>

    <h3>Chevron style</h3>
    <p>Chevrons create a connected, bordered path that suits short application and onboarding flows.</p>
    <x-bladewind::stepper name="chevron-application" current="application" style="chevrons" linear="false" aria-label="Job application">
        <x-bladewind::stepper.item name="job" label="Job details" state="complete" />
        <x-bladewind::stepper.item name="application" label="Application form" />
        <x-bladewind::stepper.item name="preview" label="Preview" />
        <x-bladewind::stepper.content name="job" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Job details confirmed</h4><p>Review the role, location, and employment terms selected for this application.</p><ul class="list-disc space-y-1 pl-5 text-sm"><li>Senior product designer</li><li>Hybrid role in Accra</li><li>Full-time employment</li></ul></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="application" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Application form</h4><p>Provide the information the hiring team needs to assess your application.</p><div class="grid gap-3 sm:grid-cols-2"><x-bladewind::input label="Current role" /><x-bladewind::input label="Years of experience" type="number" /></div></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="preview" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Preview and submit</h4><p>Read the complete application exactly as the hiring team will receive it.</p><p class="text-sm text-slate-500">Return to an earlier stage to correct information before submission.</p></div></x-bladewind::card></x-bladewind::stepper.content>
    </x-bladewind::stepper>

    <h3>Bar style</h3>
    <p>Bars provide strong stage emphasis with compact labels and work well above full-width forms.</p>
    <x-bladewind::stepper name="bar-application" current="form" style="bars" linear="false" aria-label="Application stages">
        <x-bladewind::stepper.item name="details" label="Job details" state="complete" />
        <x-bladewind::stepper.item name="form" label="Application form" />
        <x-bladewind::stepper.item name="preview" label="Preview" />
        <x-bladewind::stepper.content name="details" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Selected opportunity</h4><p>The role summary and requirements have been reviewed.</p><x-bladewind::alert show_close_icon="false">Product designer · Full time · Accra</x-bladewind::alert></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="form" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Candidate information</h4><p>Add your professional summary and preferred contact details.</p><x-bladewind::textarea label="Professional summary" rows="3" placeholder="Describe relevant experience and strengths" /></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="preview" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Application summary</h4><p>Confirm that your contact information, experience, and uploaded documents are current.</p><ul class="list-disc space-y-1 pl-5 text-sm"><li>Contact details complete</li><li>Professional summary added</li><li>Resume ready for submission</li></ul></div></x-bladewind::card></x-bladewind::stepper.content>
    </x-bladewind::stepper>

    <h3>Line style</h3>
    <p>Line uses smaller markers for a quiet progress treatment. It is useful when the form content should carry most of the visual weight.</p>
    <x-bladewind::stepper name="line-contract" current="payment" style="line" linear="false" aria-label="Contract setup">
        <x-bladewind::stepper.item name="general" label="General information" state="complete" />
        <x-bladewind::stepper.item name="payment" label="Payment information" />
        <x-bladewind::stepper.item name="review" label="Review and sign" />
        <x-bladewind::stepper.item name="activate" label="Activate" />
        <x-bladewind::stepper.content name="general" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Contract details</h4><p>The contractor, project dates, and scope have been saved.</p><p class="text-sm text-slate-500">Return here to update the agreement title or working period.</p></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="payment" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Payment information</h4><p>Set the currency, milestones, and amount paid for completed work.</p><div class="grid gap-3 sm:grid-cols-2"><x-bladewind::input label="Currency" placeholder="GHS" /><x-bladewind::input label="Milestone amount" type="number" /></div></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="review" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Review and sign</h4><p>Confirm the scope, payment schedule, and contract terms.</p><p class="text-sm text-slate-500">Both parties receive a signed copy after confirmation.</p></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="activate" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Activate the contract</h4><p>Choose the start date and notify the contractor.</p><p class="text-sm text-slate-500">Activation makes the first milestone available for work.</p></div></x-bladewind::card></x-bladewind::stepper.content>
    </x-bladewind::stepper>

    <h2 id="horizontal">Horizontal Stepper</h2>
    <p>Horizontal is the default orientation and works well when step names are short and the available width is generous. Labels sit below their indicators so connectors remain centred on the circles and never pass through text. When the sequence cannot fit, only the step list scrolls horizontally.</p>
    <x-bladewind::stepper name="horizontal-example" current="delivery" aria-label="Order progress">
        <x-bladewind::stepper.item name="basket" label="Basket" state="complete" />
        <x-bladewind::stepper.item name="delivery" label="Delivery" />
        <x-bladewind::stepper.item name="payment" label="Payment" />
        <x-bladewind::stepper.item name="confirmation" label="Confirmation" />
        <x-bladewind::stepper.content name="basket" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
            <div class="space-y-3"><h4 class="font-semibold">Review your basket</h4><p>Confirm each product, quantity, and price before continuing.</p><x-bladewind::alert show_close_icon="false">2 products · GHS 480.00 before delivery</x-bladewind::alert></div>
        </x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="delivery" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
            <div class="space-y-3"><h4 class="font-semibold">Delivery details</h4><p>Choose where and how the order should be delivered.</p><div class="grid gap-3 sm:grid-cols-2"><x-bladewind::input label="City" placeholder="Accra" /><x-bladewind::input label="Delivery method" placeholder="Standard delivery" /></div></div>
        </x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="payment" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
            <div class="space-y-3"><h4 class="font-semibold">Payment method</h4><p>Select a saved method or add a new card or mobile money account.</p><p class="text-sm text-slate-500">Payment details are confirmed only after the final review.</p></div>
        </x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="confirmation" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
            <div class="space-y-3"><h4 class="font-semibold">Confirm the order</h4><p>Review the delivery address, payment method, and final total.</p><ul class="list-disc space-y-1 pl-5 text-sm"><li>Express delivery to Accra</li><li>Total including delivery: GHS 505.00</li></ul></div>
        </x-bladewind::card></x-bladewind::stepper.content>
    </x-bladewind::stepper>

    <h2 id="vertical">Vertical Stepper</h2>
    <p>Use <code class="inline">orientation="vertical"</code> for narrow regions, longer descriptions, and forms with substantial content. The connector follows the centre of each indicator while the label and description remain in a separate text column.</p>
    <div class="max-w-md">
        <x-bladewind::stepper name="vertical-example" current="review" orientation="vertical" aria-label="Application progress">
            <x-bladewind::stepper.item name="details" label="Your details" description="Contact and identity information" state="complete" />
            <x-bladewind::stepper.item name="review" label="Review" description="Check the supplied information" />
            <x-bladewind::stepper.item name="submit" label="Submit" />
            <x-bladewind::stepper.content name="details" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
                <div class="space-y-3"><h4 class="font-semibold">Personal details saved</h4><p>Your contact and identity information has been captured.</p><p class="text-sm text-slate-500">Edit this step if your legal name, address, or telephone number is incorrect.</p></div>
            </x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="review" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
                <div class="space-y-3"><h4 class="font-semibold">Review the application</h4><p>Compare each answer with your supporting documents before submission.</p><ul class="list-disc space-y-1 pl-5 text-sm"><li>Identity and contact details</li><li>Supporting documents</li><li>Required declarations</li></ul></div>
            </x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="submit" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
                <div class="space-y-3"><h4 class="font-semibold">Submit the application</h4><p>Accept the declaration after confirming that the supplied information is accurate.</p><p class="text-sm text-slate-500">Submission locks the application while it is being reviewed.</p></div>
            </x-bladewind::card></x-bladewind::stepper.content>
        </x-bladewind::stepper>
    </div>

    <h2 id="states">Step States</h2>
    <p>Available states are <code class="inline">complete</code>, <code class="inline">current</code>, <code class="inline">upcoming</code>, <code class="inline">error</code>, and <code class="inline">disabled</code>. Complete and error indicators include icons and screen-reader state text, so meaning does not depend on colour.</p>
    <x-bladewind::stepper name="states-example" current="current" linear="false" aria-label="Stepper states">
        <x-bladewind::stepper.item name="complete" label="Complete" state="complete" />
        <x-bladewind::stepper.item name="current" label="Current" />
        <x-bladewind::stepper.item name="upcoming" label="Upcoming" />
        <x-bladewind::stepper.item name="error" label="Error" state="error" />
        <x-bladewind::stepper.item name="disabled" label="Disabled" disabled="true" />
        <x-bladewind::stepper.content name="complete" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
            <div class="space-y-3"><h4 class="font-semibold">Completed state</h4><p>Use this state after the user has satisfied the requirements for a step.</p><p class="text-sm text-slate-500">The completed icon and screen-reader text communicate status without relying on colour.</p></div>
        </x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="current" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
            <div class="space-y-3"><h4 class="font-semibold">Current state</h4><p>The current item identifies the panel the user is working in now.</p><p class="text-sm text-slate-500">Only one item receives <code class="inline">aria-current="step"</code> at a time.</p></div>
        </x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="upcoming" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
            <div class="space-y-3"><h4 class="font-semibold">Upcoming state</h4><p>This stage belongs to the workflow but has not been started.</p><p class="text-sm text-slate-500">Linear mode decides whether direct navigation to it is currently allowed.</p></div>
        </x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="error" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
            <div class="space-y-3"><h4 class="font-semibold">Error state</h4><p>Use the error state when saved information needs correction.</p><p class="text-sm text-red-600 dark:text-red-300">Explain the actual problem inside the panel and provide a clear recovery action.</p></div>
        </x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="disabled" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false">
            <div class="space-y-3"><h4 class="font-semibold">Disabled state</h4><p>A disabled stage cannot be clicked, focused, or selected by keyboard navigation.</p><p class="text-sm text-slate-500">Use it only when the application can clearly explain how the stage becomes available.</p></div>
        </x-bladewind::card></x-bladewind::stepper.content>
    </x-bladewind::stepper>

    <h2 id="numbers-icons">Numbered and Icon Steps</h2>
    <p>Numbers are shown by default and are assigned in list order. Set an explicit <code class="inline">number</code>, or use <code class="inline">icon</code>, <code class="inline">icon-type</code>, and <code class="inline">icon-dir</code> on an item.</p>
    <div class="space-y-8">
        <x-bladewind::stepper name="numbered-example" current="second" aria-label="Numbered steps">
            <x-bladewind::stepper.item name="first" label="First" number="1" state="complete" />
            <x-bladewind::stepper.item name="second" label="Second" number="2" />
            <x-bladewind::stepper.item name="third" label="Third" number="3" />
            <x-bladewind::stepper.content name="first" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">First numbered stage</h4><p>The first task is complete and retains its explicit number in the public definition.</p><p class="text-sm text-slate-500">Completion can replace the number with the configured completed icon.</p></div></x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="second" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Second numbered stage</h4><p>The explicit number controls indicator content but does not affect panel matching.</p><p class="text-sm text-slate-500">The shared name <code class="inline">second</code> connects this panel to its indicator.</p></div></x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="third" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Third numbered stage</h4><p>Use this panel for the final task in the numbered sequence.</p><p class="text-sm text-slate-500">Calling Next here emits the public completion event.</p></div></x-bladewind::card></x-bladewind::stepper.content>
        </x-bladewind::stepper>
        <x-bladewind::stepper name="icons-example" current="profile" aria-label="Icon steps">
            <x-bladewind::stepper.item name="account" label="Account" icon="user" state="complete" />
            <x-bladewind::stepper.item name="profile" label="Profile" icon="identification" icon-type="solid" />
            <x-bladewind::stepper.item name="security" label="Security" icon="shield-check" />
            <x-bladewind::stepper.content name="account" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Account identity</h4><p>The user icon provides a visual cue for account information.</p><p class="text-sm text-slate-500">The visible label remains required because icons do not replace accessible names.</p></div></x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="profile" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Profile identity</h4><p>The solid identification icon distinguishes this active profile stage.</p><p class="text-sm text-slate-500">Choose icon types consistently across one Stepper unless emphasis is intentional.</p></div></x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="security" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Security settings</h4><p>The shield icon associates this stage with protection and verification.</p><p class="text-sm text-slate-500">Custom icon directories are supported through <code class="inline">icon-dir</code>.</p></div></x-bladewind::card></x-bladewind::stepper.content>
        </x-bladewind::stepper>
    </div>

    <h2 id="labels-descriptions">Labels and Descriptions</h2>
    <p>Every step requires a short label. Descriptions are optional. Long text wraps without expanding the page.</p>
    <x-bladewind::stepper name="labels-example" current="company" aria-label="Organisation setup">
        <x-bladewind::stepper.item name="company" label="Organisation and legal company information" description="Use the registered name shown on official documents." />
        <x-bladewind::stepper.item name="team" label="Invite your team" description="You can skip invitations and return later." />
        <x-bladewind::stepper.item name="finish" label="Finish" />
        <x-bladewind::stepper.content name="company" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Organisation details</h4><p>Enter the registered name, company number, and primary address.</p><p class="text-sm text-slate-500">Long labels wrap below the indicator without crossing the connector.</p></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="team" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Invite your team</h4><p>Add colleagues by email and assign an initial workspace role.</p><p class="text-sm text-slate-500">Invitations can be skipped and completed after setup.</p></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="finish" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Review organisation setup</h4><p>Confirm the organisation details, members, and workspace defaults.</p><ul class="list-disc space-y-1 pl-5 text-sm"><li>Registered details complete</li><li>Member roles reviewed</li></ul></div></x-bladewind::card></x-bladewind::stepper.content>
    </x-bladewind::stepper>

    <h2 id="linear">Linear Wizard</h2>
    <p>Linear mode is enabled by default and is appropriate when each stage depends on the one before it. Users can return to completed steps, but direct activation cannot skip ahead to an inaccessible step. Run application validation first, then call <code class="inline">nextStepperStep()</code> when the current panel is valid.</p>
    <x-bladewind::stepper name="linear-wizard" current="profile" aria-label="Linear account wizard">
        <x-bladewind::stepper.item name="account" label="Account" state="complete" />
        <x-bladewind::stepper.item name="profile" label="Profile" />
        <x-bladewind::stepper.item name="security" label="Security" />
        <x-bladewind::stepper.content name="account" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Account credentials</h4><p>Choose the verified email address and password used to sign in.</p><div class="grid gap-3 sm:grid-cols-2"><x-bladewind::input label="Email address" type="email" /><x-bladewind::input label="Password" type="password" /></div></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="profile" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Public profile</h4><p>Add the personal details shown to other members of the workspace.</p><div class="grid gap-3 sm:grid-cols-2"><x-bladewind::input label="Full name" /><x-bladewind::input label="Job title" /></div></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="security" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Security and recovery</h4><p>Configure verification and account recovery before finishing setup.</p><ul class="list-disc space-y-1 pl-5 text-sm"><li>Authenticator application</li><li>Recovery telephone number</li><li>Backup recovery codes</li></ul></div></x-bladewind::card></x-bladewind::stepper.content>
    </x-bladewind::stepper>
    <div class="mt-4 flex flex-wrap gap-3">
        <x-bladewind::button type="secondary" onclick="previousStepperStep('linear-wizard')">Previous</x-bladewind::button>
        <x-bladewind::button onclick="nextStepperStep('linear-wizard')">Continue</x-bladewind::button>
    </div>

    <h2 id="non-linear">Non-linear and Clickable Workflow</h2>
    <p>Set <code class="inline">linear="false"</code> when the stages are independent and users may complete them in any order. Enabled indicators can then open their associated panels directly. Set root or item <code class="inline">clickable="false"</code> when a stage should be displayed but must be opened by application logic.</p>
    <x-bladewind::stepper name="free-wizard" current="plan" linear="false" aria-label="Plan configuration">
        <x-bladewind::stepper.item name="plan" label="Plan" />
        <x-bladewind::stepper.item name="billing" label="Billing" />
        <x-bladewind::stepper.item name="members" label="Members" clickable="false" />
        <x-bladewind::stepper.content name="plan" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Choose a workspace plan</h4><p>Compare included features, member limits, and billing periods.</p><div class="grid gap-2 sm:grid-cols-2"><x-bladewind::card has-shadow="false" compact="true"><strong>Starter</strong><p class="text-sm">For small teams getting started.</p></x-bladewind::card><x-bladewind::card has-shadow="false" compact="true"><strong>Business</strong><p class="text-sm">For growing teams that need controls.</p></x-bladewind::card></div></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="billing" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Billing information</h4><p>Add the legal billing name and the address shown on invoices.</p><p class="text-sm text-slate-500">Because this workflow is non-linear, you can review the plan again without losing these details.</p></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="members" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Workspace members</h4><p>Invite members and assign the roles they need.</p><p class="text-sm text-slate-500">This indicator is intentionally non-clickable and can be opened by application logic after plan selection.</p></div></x-bladewind::card></x-bladewind::stepper.content>
    </x-bladewind::stepper>

    <h2 id="indicator-only">Indicator-only Usage</h2>
    <p>Content panels are recommended for complete wizard interfaces and are used by every working example on this page. You may still omit them when Stepper only communicates the status of a process that is rendered elsewhere. The indicators, states, events, and keyboard behavior continue to work.</p>
    <pre class="language-markup"><code>&lt;x-bladewind::stepper name="delivery" current="dispatch"&gt;
    &lt;x-bladewind::stepper.item name="paid" label="Paid" state="complete" /&gt;
    &lt;x-bladewind::stepper.item name="dispatch" label="Dispatch" /&gt;
    &lt;x-bladewind::stepper.item name="delivered" label="Delivered" /&gt;
&lt;/x-bladewind::stepper&gt;</code></pre>

    <h2 id="content-panels">Content Panels</h2>
    <p>A <code class="inline">stepper.content</code> name connects a panel to the item with the same name. Place one panel beside every item when building a wizard. Only the current panel is visible and keyboard reachable; the others are hidden and inert until selected.</p>
    <p>Stepper content is a semantic panel, not a Card dependency. This keeps the standalone Stepper package small. Its panel has a border by default. Set <code class="inline">has-border="false"</code> when Card or another composed component provides the visible border. Compose Bladewind Card, Input, Textarea, Select, Alert, and other components inside the panel as needed. Every working example on this page uses Card for its visible content surface.</p>
    <x-bladewind::stepper name="panel-example" current="contact" linear="false" aria-label="Contact preferences">
        <x-bladewind::stepper.item name="contact" label="Contact" />
        <x-bladewind::stepper.item name="notifications" label="Notifications" />
        <x-bladewind::stepper.item name="summary" label="Summary" />
        <x-bladewind::stepper.content name="contact" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Contact channels</h4><p>Choose the email address and telephone number used for account messages.</p><div class="grid gap-3 sm:grid-cols-2"><x-bladewind::input label="Contact email" type="email" /><x-bladewind::input label="Telephone" type="tel" /></div></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="notifications" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Notification preferences</h4><p>Choose which product and account updates should reach you.</p><ul class="list-disc space-y-1 pl-5 text-sm"><li>Security and sign-in notices</li><li>Product announcements</li><li>Monthly account summary</li></ul></div></x-bladewind::card></x-bladewind::stepper.content>
        <x-bladewind::stepper.content name="summary" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Preference summary</h4><p>Review the selected contact channels and notification categories.</p><p class="text-sm text-slate-500">Return to either completed stage to make a correction before saving.</p></div></x-bladewind::card></x-bladewind::stepper.content>
    </x-bladewind::stepper>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::stepper.content name="profile" has-border="false"&gt;
    &lt;x-bladewind::card has-shadow="false"&gt;
        &lt;x-bladewind::input label="Display name" /&gt;
        &lt;x-bladewind::textarea label="Biography" /&gt;
    &lt;/x-bladewind::card&gt;
&lt;/x-bladewind::stepper.content&gt;</code></pre>

    <h2 id="navigation-helpers">Previous, Next, Direct Navigation, and Reset</h2>
    <p>Use the public helpers from buttons, form handlers, or other application code. All helpers return <code class="inline">true</code> on success and <code class="inline">false</code> when the stepper, step, or requested movement is unavailable. A successful move updates the indicator, panel, ARIA relationships, state, and focus together.</p>
    <pre class="language-javascript"><code>previousStepperStep('account-setup');
nextStepperStep('account-setup');
showStepperStep('account-setup', 'security');
resetStepper('account-setup');</code></pre>

    <h2 id="validation">Validation Event</h2>
    <p>Listen for the cancelable <code class="inline">bladewind:stepper:before-change</code> event and call <code class="inline">preventDefault()</code> when the current panel is invalid. The Stepper owns navigation state but does not impose form rules, so validation remains application-owned.</p>
    <pre class="language-javascript line-numbers"><code>document.querySelector('[data-name="account-setup"]')
    .addEventListener('bladewind:stepper:before-change', (event) =&gt; {
        if (!profileFormIsValid()) event.preventDefault();
    });</code></pre>

    <h2 id="multiple">Multiple Steppers</h2>
    <p>Each helper resolves one named root. State, panels, focus, and events do not leak between instances. Use a unique root name for every Stepper, even when the step names inside them are identical.</p>
    <div class="grid gap-8 lg:grid-cols-2">
        <x-bladewind::stepper name="shipping-wizard" current="address" linear="false" aria-label="Shipping setup">
            <x-bladewind::stepper.item name="address" label="Address" />
            <x-bladewind::stepper.item name="method" label="Method" />
            <x-bladewind::stepper.content name="address" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Shipping address</h4><p>Enter the destination for this order.</p><p class="text-sm text-slate-500">This state belongs only to the shipping Stepper.</p></div></x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="method" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Shipping method</h4><p>Choose standard or express delivery.</p><p class="text-sm text-slate-500">Changing this Stepper does not move the payment Stepper.</p></div></x-bladewind::card></x-bladewind::stepper.content>
        </x-bladewind::stepper>
        <x-bladewind::stepper name="payment-wizard" current="address" linear="false" aria-label="Payment setup">
            <x-bladewind::stepper.item name="address" label="Address" />
            <x-bladewind::stepper.item name="method" label="Method" />
            <x-bladewind::stepper.content name="address" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Billing address</h4><p>Enter the address associated with the payment method.</p><p class="text-sm text-slate-500">The repeated step name remains isolated by the unique Stepper name.</p></div></x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="method" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">Payment method</h4><p>Choose card, bank transfer, or mobile money.</p><p class="text-sm text-slate-500">The shipping Stepper remains unchanged when this panel opens.</p></div></x-bladewind::card></x-bladewind::stepper.content>
        </x-bladewind::stepper>
    </div>

    <h2 id="responsive-theme-rtl">Responsive Behavior, Dark Mode, and RTL</h2>
    <p>Horizontal lists scroll inside the component on narrow screens, while content panels remain within the page width. Vertical layouts stay fluid. Colours follow the active theme. In RTL, horizontal ordering and Left and Right Arrow behavior follow visual direction. Reduced-motion preferences remove transition timing without disabling navigation.</p>
    <x-bladewind::card has-shadow="false" class="dark !bg-slate-950" dir="rtl">
        <x-bladewind::stepper name="rtl-example" current="details" linear="false" aria-label="مسار الإعداد">
            <x-bladewind::stepper.item name="account" label="الحساب" state="complete" />
            <x-bladewind::stepper.item name="details" label="التفاصيل" />
            <x-bladewind::stepper.item name="finish" label="الإنهاء" />
            <x-bladewind::stepper.content name="account" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">معلومات الحساب</h4><p>تم حفظ البريد الإلكتروني وبيانات تسجيل الدخول.</p><p class="text-sm text-slate-400">يمكنك الرجوع إلى هذه الخطوة لتحديث المعلومات.</p></div></x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="details" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">تفاصيل الملف الشخصي</h4><p>راجع الاسم ومعلومات الاتصال قبل المتابعة.</p><p class="text-sm text-slate-400">يتبع ترتيب الخطوات واتجاه الأسهم اتجاه الصفحة.</p></div></x-bladewind::card></x-bladewind::stepper.content>
            <x-bladewind::stepper.content name="finish" has-border="false" class="!bg-transparent !p-0"><x-bladewind::card has-shadow="false"><div class="space-y-3"><h4 class="font-semibold">إكمال الإعداد</h4><p>تحقق من المعلومات ثم احفظ إعدادات الحساب.</p><p class="text-sm text-slate-400">يمكنك العودة إلى أي خطوة متاحة للتعديل.</p></div></x-bladewind::card></x-bladewind::stepper.content>
        </x-bladewind::stepper>
    </x-bladewind::card>

    <h2 id="accessibility">Accessibility and Keyboard Guidance</h2>
    <ul>
        <li>Provide a specific <code class="inline">aria-label</code> for each stepper landmark.</li>
        <li>The current item uses <code class="inline">aria-current="step"</code>. Disabled items use native and ARIA disabled semantics.</li>
        <li>Left and Right Arrow move focus in horizontal layouts. Up and Down Arrow move focus in vertical layouts.</li>
        <li>Home and End move to the first and last enabled indicators. Disabled steps are skipped.</li>
        <li>Enter and Space activate a focused clickable indicator.</li>
        <li>Initial rendering does not steal focus. Explicit navigation moves focus to the new indicator.</li>
    </ul>

    <h2 id="attributes">Full List of Attributes</h2>
    <h3>Stepper Attributes</h3>
    <x-bladewind::table>
        <x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        @foreach([
            ['name', 'generated', 'Unique public name used by helpers and events.'],
            ['current', 'first enabled step', 'Canonical initial current step name.'],
            ['orientation', 'horizontal', 'horizontal or vertical.'],
            ['style', 'circles', 'circles, chevrons, bars, or line.'],
            ['linear', 'true', 'Block direct forward navigation when true.'],
            ['clickable', 'true', 'Allow enabled indicators to activate steps.'],
            ['show-numbers', 'true', 'Show ordered step numbers when an item has no icon.'],
            ['completed-icon', 'check', 'Icon used for complete steps.'],
            ['error-icon', 'exclamation-triangle', 'Icon used for error steps.'],
            ['aria-label', 'Progress', 'Accessible name for the navigation landmark.'],
            ['class', '', 'Classes merged onto the root nav.'],
        ] as [$attribute, $default, $description])
            <tr><td><code class="inline">{{ $attribute }}</code></td><td>{{ $default }}</td><td>{{ $description }}</td></tr>
        @endforeach
    </x-bladewind::table>

    <h3>Stepper Item Attributes</h3>
    <x-bladewind::table>
        <x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        @foreach([
            ['name', 'required', 'Step name shared with an optional content panel.'],
            ['label', 'required', 'Visible step label.'],
            ['description', '', 'Optional supporting text.'],
            ['state', 'upcoming', 'complete, current, upcoming, error, or disabled.'],
            ['disabled', 'false', 'Disable activation and keyboard focus.'],
            ['clickable', 'root value', 'Override clickability for this item.'],
            ['number', 'list position', 'Explicit indicator number.'],
            ['icon', '', 'Icon component name.'],
            ['icon-type', 'outline', 'outline or solid.'],
            ['icon-dir', '', 'Custom public icon directory.'],
            ['class', '', 'Classes merged onto the indicator button.'],
        ] as [$attribute, $default, $description])
            <tr><td><code class="inline">{{ $attribute }}</code></td><td>{{ $default }}</td><td>{{ $description }}</td></tr>
        @endforeach
    </x-bladewind::table>

    <h3>Stepper Content Attributes</h3>
    <x-bladewind::table>
        <x-slot:header><th>Attribute</th><th>Default</th><th>Description</th></x-slot:header>
        <tr><td><code class="inline">name</code></td><td>required</td><td>Matches the associated item name.</td></tr>
        <tr><td><code class="inline">has-border</code></td><td>true</td><td>Shows the panel border. Set to false when a nested Card supplies the visible border.</td></tr>
        <tr><td><code class="inline">class</code></td><td></td><td>Classes merged onto the panel section.</td></tr>
        <tr><td>Any HTML attribute</td><td></td><td>Forwarded through the Blade attribute bag.</td></tr>
    </x-bladewind::table>

    <h2 id="slots">Slots</h2>
    <x-bladewind::table>
        <x-slot:header><th>Component and slot</th><th>Description</th></x-slot:header>
        <tr><td><code class="inline">stepper default</code></td><td>Stepper items and optional content panels.</td></tr>
        <tr><td><code class="inline">stepper.item default</code></td><td>Custom indicator content that replaces the number or icon.</td></tr>
        <tr><td><code class="inline">stepper.content default</code></td><td>Wizard panel content.</td></tr>
    </x-bladewind::table>

    <h2 id="javascript-api">JavaScript API</h2>
    <x-bladewind::table>
        <x-slot:header><th>Function or event</th><th>Description</th></x-slot:header>
        <tr><td><code class="inline">showStepperStep(stepperName, stepName)</code></td><td>Select an accessible step and synchronize its panel.</td></tr>
        <tr><td><code class="inline">nextStepperStep(stepperName)</code></td><td>Move to the next enabled step. On the final step, emit completion.</td></tr>
        <tr><td><code class="inline">previousStepperStep(stepperName)</code></td><td>Move to the previous enabled step.</td></tr>
        <tr><td><code class="inline">resetStepper(stepperName)</code></td><td>Restore initial states and the canonical initial current step.</td></tr>
        <tr><td><code class="inline">bladewind:stepper:before-change</code></td><td>Cancelable bubbling event before navigation.</td></tr>
        <tr><td><code class="inline">bladewind:stepper:changed</code></td><td>Bubbling event after a successful change.</td></tr>
        <tr><td><code class="inline">bladewind:stepper:complete</code></td><td>Bubbling event when Next is called on the final enabled step.</td></tr>
    </x-bladewind::table>
    <p>Navigation event details contain <code class="inline">stepperName</code>, <code class="inline">previousStep</code>, <code class="inline">nextStep</code>, and <code class="inline">direction</code>.</p>

    <h3>Stepper with all attributes defined</h3>
    <pre class="language-markup line-numbers"><code>&lt;x-bladewind::stepper
    name="account-setup"
    current="profile"
    orientation="horizontal"
    style="circles"
    linear="true"
    clickable="true"
    show-numbers="true"
    completed-icon="check"
    error-icon="exclamation-triangle"
    aria-label="Account setup progress"
    class="account-stepper"&gt;
    &lt;x-bladewind::stepper.item
        name="profile"
        label="Profile"
        description="Personal details"
        state="current"
        disabled="false"
        clickable="true"
        number="2"
        icon="user"
        icon-type="solid"
        icon-dir=""
        class="profile-step" /&gt;
    &lt;x-bladewind::stepper.content name="profile" has-border="false" class="profile-panel"&gt;
        &lt;x-bladewind::card has-shadow="false"&gt;
            &lt;x-bladewind::input label="Display name" /&gt;
        &lt;/x-bladewind::card&gt;
    &lt;/x-bladewind::stepper.content&gt;
&lt;/x-bladewind::stepper&gt;</code></pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources &gt; views &gt; components &gt; bladewind &gt; stepper &gt; index.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#styles">Visual styles</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#horizontal">Horizontal stepper</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#vertical">Vertical stepper</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#states">Step states</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#numbers-icons">Numbers and icons</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#labels-descriptions">Labels and descriptions</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#linear">Linear wizard</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#non-linear">Non-linear workflow</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#indicator-only">Indicator-only usage</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#content-panels">Content panels</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#navigation-helpers">Navigation helpers</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#validation">Validation event</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#multiple">Multiple steppers</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#responsive-theme-rtl">Responsive, dark, RTL</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#accessibility">Accessibility</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Attributes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#slots">Slots</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#javascript-api">JavaScript API</a></div>
    </x-slot:side_nav>
    <x-slot:scripts><script>selectNavigationItem('.component-stepper');</script></x-slot:scripts>
</x-app>
