<x-app>
    <x-slot:title>Chat Component</x-slot:title>
    <x-slot:page_title>Chat</x-slot:page_title>

    <p>
        <code class="inline">x-bladewind::chat</code> and <code class="inline">x-bladewind::chat.message</code>
        build a message thread. A message sits on the left as one received from someone else, or on the right,
        in your brand colour, as one sent by the current user. Each message can carry a sender name, an avatar,
        a timestamp, a delivery state, and attachments.
    </p>

    <h2 id="basic">Basic Usage</h2>
    <x-bladewind::chat class="border border-gray-200 dark:border-dark-700 rounded-lg">
        <x-bladewind::chat.message sender="Jane Cooper" time="10:02 AM">
            Hey, are we still on for the call this afternoon?
        </x-bladewind::chat.message>
        <x-bladewind::chat.message outgoing="true" time="10:04 AM" status="read">
            Yes, 3pm works for me. I will send the link shortly.
        </x-bladewind::chat.message>
        <x-bladewind::chat.message sender="Jane Cooper" time="10:05 AM">
            Perfect, see you then.
        </x-bladewind::chat.message>
    </x-bladewind::chat>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::chat&gt;
                &lt;x-bladewind::chat.message sender="Jane Cooper" time="10:02 AM"&gt;
                    Hey, are we still on for the call this afternoon?
                &lt;/x-bladewind::chat.message&gt;
                &lt;x-bladewind::chat.message outgoing="true" time="10:04 AM" status="read"&gt;
                    Yes, 3pm works for me. I will send the link shortly.
                &lt;/x-bladewind::chat.message&gt;
                &lt;x-bladewind::chat.message sender="Jane Cooper" time="10:05 AM"&gt;
                    Perfect, see you then.
                &lt;/x-bladewind::chat.message&gt;
            &lt;/x-bladewind::chat&gt;
        </code>
    </pre>

    <h2 id="grouped">Grouping Consecutive Messages</h2>
    <p>
        Set <code class="inline">grouped="true"</code> on a message that follows another one from the same
        sender. It hides the repeated avatar and sender name and pulls the message closer to the one above it.
    </p>
    <x-bladewind::chat class="border border-gray-200 dark:border-dark-700 rounded-lg">
        <x-bladewind::chat.message sender="Jane Cooper" time="10:02 AM">
            Quick update on the proposal.
        </x-bladewind::chat.message>
        <x-bladewind::chat.message sender="Jane Cooper" time="10:02 AM" grouped="true">
            I have added the pricing section you asked for.
        </x-bladewind::chat.message>
        <x-bladewind::chat.message sender="Jane Cooper" time="10:03 AM" grouped="true">
            Let me know what you think.
        </x-bladewind::chat.message>
    </x-bladewind::chat>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::chat.message sender="Jane Cooper" time="10:02 AM"&gt;
                Quick update on the proposal.
            &lt;/x-bladewind::chat.message&gt;
            &lt;x-bladewind::chat.message sender="Jane Cooper" time="10:02 AM" grouped="true"&gt;
                I have added the pricing section you asked for.
            &lt;/x-bladewind::chat.message&gt;
        </code>
    </pre>

    <h2 id="status">Delivery Status</h2>
    <p>
        Set <code class="inline">status</code> on an outgoing message to show how far it got:
        <code class="inline">sending</code> <code class="inline">sent</code> <code class="inline">delivered</code>
        <code class="inline">read</code> or <code class="inline">failed</code>. It is only shown on outgoing
        messages, since a received message has no delivery state of its own to report.
    </p>
    <x-bladewind::chat class="border border-gray-200 dark:border-dark-700 rounded-lg">
        <x-bladewind::chat.message outgoing="true" time="9:58 AM" status="sending">Uploading the file now.</x-bladewind::chat.message>
        <x-bladewind::chat.message outgoing="true" time="9:59 AM" status="sent">Here you go.</x-bladewind::chat.message>
        <x-bladewind::chat.message outgoing="true" time="10:00 AM" status="delivered">Let me know if it opens fine.</x-bladewind::chat.message>
        <x-bladewind::chat.message outgoing="true" time="10:01 AM" status="read">Great, thanks!</x-bladewind::chat.message>
        <x-bladewind::chat.message outgoing="true" time="10:02 AM" status="failed">This one did not go through.</x-bladewind::chat.message>
    </x-bladewind::chat>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::chat.message outgoing="true" status="sending"&gt;Uploading the file now.&lt;/x-bladewind::chat.message&gt;
            &lt;x-bladewind::chat.message outgoing="true" status="sent"&gt;Here you go.&lt;/x-bladewind::chat.message&gt;
            &lt;x-bladewind::chat.message outgoing="true" status="delivered"&gt;Let me know if it opens fine.&lt;/x-bladewind::chat.message&gt;
            &lt;x-bladewind::chat.message outgoing="true" status="read"&gt;Great, thanks!&lt;/x-bladewind::chat.message&gt;
            &lt;x-bladewind::chat.message outgoing="true" status="failed"&gt;This one did not go through.&lt;/x-bladewind::chat.message&gt;
        </code>
    </pre>

    <h2 id="attachments">Attachments</h2>
    <p>Give a message an <code class="inline">attachments</code> slot for files, images, or anything else it carries.</p>
    <x-bladewind::chat class="border border-gray-200 dark:border-dark-700 rounded-lg">
        <x-bladewind::chat.message sender="Jane Cooper" time="2:14 PM">
            Here is the signed contract.
            <x-slot:attachments>
                <a href="#" class="flex items-center gap-2 rounded-lg border border-gray-200 dark:border-dark-600 px-3 py-2 text-xs hover:bg-gray-50 dark:hover:bg-dark-800">
                    <x-bladewind::icon name="document-text" class="size-4"/>
                    contract-signed.pdf
                </a>
            </x-slot:attachments>
        </x-bladewind::chat.message>
    </x-bladewind::chat>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::chat.message sender="Jane Cooper" time="2:14 PM"&gt;
                Here is the signed contract.
                &lt;x-slot:attachments&gt;
                    &lt;a href="#"&gt;contract-signed.pdf&lt;/a&gt;
                &lt;/x-slot:attachments&gt;
            &lt;/x-bladewind::chat.message&gt;
        </code>
    </pre>

    <h2 id="height">Scrollable Thread</h2>
    <p>
        Set <code class="inline">height</code> on the thread to cap it at a fixed height with its own scrollbar,
        useful when the chat sits inside a fixed-height panel instead of growing the page.
    </p>
    <x-bladewind::chat height="220px" class="border border-gray-200 dark:border-dark-700 rounded-lg">
        <x-bladewind::chat.message sender="Jane Cooper" time="9:40 AM">Morning! Ready for the standup?</x-bladewind::chat.message>
        <x-bladewind::chat.message outgoing="true" time="9:41 AM" status="read">Yep, joining now.</x-bladewind::chat.message>
        <x-bladewind::chat.message sender="Jane Cooper" time="9:52 AM">Thanks for covering the release notes.</x-bladewind::chat.message>
        <x-bladewind::chat.message outgoing="true" time="9:53 AM" status="delivered">No problem at all.</x-bladewind::chat.message>
        <x-bladewind::chat.message sender="Jane Cooper" time="9:55 AM">Catch you at the retro.</x-bladewind::chat.message>
    </x-bladewind::chat>
    <pre class="language-markup line-numbers">
        <code>
            &lt;x-bladewind::chat height="220px"&gt;
                ...
            &lt;/x-bladewind::chat&gt;
        </code>
    </pre>

    <h2 id="attributes">Full List Of Attributes</h2>
    <h3>Chat</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>height</td>
            <td><em>blank</em></td>
            <td>Any valid CSS height value, for example <code class="inline">"400px"</code>. The thread grows with its content when left blank.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Additional CSS classes for the wrapper element.</td>
        </tr>
    </x-bladewind::table>

    <h3>Chat Message</h3>
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>outgoing</td>
            <td>false</td>
            <td>Right-aligns the bubble as a message sent by the current user. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>sender</td>
            <td><em>blank</em></td>
            <td>The sender's name, shown above an ungrouped incoming message and used for the avatar's initials fallback.</td>
        </tr>
        <tr>
            <td>avatar</td>
            <td><em>blank</em></td>
            <td>URL to the sender's avatar image.</td>
        </tr>
        <tr>
            <td>time</td>
            <td><em>blank</em></td>
            <td>A timestamp shown beneath the bubble.</td>
        </tr>
        <tr>
            <td>status</td>
            <td><em>blank</em></td>
            <td>Delivery state, shown only when <code class="inline">outgoing</code> is true. <code class="inline">sending</code> <code class="inline">sent</code> <code class="inline">delivered</code> <code class="inline">read</code> <code class="inline">failed</code></td>
        </tr>
        <tr>
            <td>grouped</td>
            <td>false</td>
            <td>Hides the avatar and sender name for a message following another from the same sender. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>show_avatar</td>
            <td>true</td>
            <td>Determines if incoming messages show an avatar at all. <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>attachments</td>
            <td><em>none</em></td>
            <td>A named slot for files, images, or anything else the message carries.</td>
        </tr>
        <tr>
            <td>class</td>
            <td><em>blank</em></td>
            <td>Additional CSS classes for the message row.</td>
        </tr>
    </x-bladewind::table>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > chat > index.blade.php</code>,
        <code class="inline">resources > views > components > bladewind > chat > message.blade.php</code>
    </x-bladewind::alert>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#basic">Basic usage</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#grouped">Grouping consecutive messages</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#status">Delivery status</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attachments">Attachments</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#height">Scrollable thread</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot:scripts>
        <script>
            selectNavigationItem('.component-chat');
        </script>
    </x-slot:scripts>
</x-app>
