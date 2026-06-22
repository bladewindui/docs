<x-app>
    <x-slot:title>Filepicker Component</x-slot:title>
    <x-slot:page_title>Filepicker</x-slot:page_title>

    <p>
        This component is a wrapper for the very popular <a href="https://pqina.nl/filepond/" target="_blank">Filepond</a> filepicker project by PQINA. We have tried to include the most important features Filepond offers.
        Most important here refers to the features applicable to most projects and serves most use-cases. The component allows both dragging and dropping of files on the control as well as browsing for files using the browser's default file picker.
    </p>
    <x-bladewind::filepicker required="true" />

    <pre class="language-markup">
        <code>
            &lt;x-bladewind::filepicker /&gt;
        </code>
    </pre>
    <p>
        By default the Filepicker component provides a random name when no name attribute is specified. If you intend to disable automatic file uploads or will need to
        grab the base64 version of your files, set the <code class="text-red-500 inline">name</code> attribute.
    </p>
    <pre class="language-markup">
        <code>
            &lt;x-bladewind::filepicker name="certs" /&gt;
        </code>
    </pre>
    <h2 id="placeholder">Changing the Placeholder</h2>
    <p>The filepicker loads with a placeholder that is broken into two lines. The first line reads, <code class="inline">Browse or drag and drop files</code>.
    The second line reads, <code class="inline">IMAGE, VIDEO, AUDIO, PDF up to 5mb</code>.
        The second line contains the values specified for the <code class="text-red-500 inline">accepted_file_types</code> (image/*, video/*, audio/*, .pdf)
        and <code class="text-red-500 inline">max_file_size</code> (5mb) attributes. The default placeholder will always use the values specified for these two attributes.
    </p>
    <h3>Option 1</h3>
    <p>To change the placeholder text to your preferred text (preferably translated), set the <code class="inline text-red-500">placeholder_line1</code>
    and <code class="inline text-red-500">placeholder_line2</code> attributes.</p>
    <x-bladewind::filepicker
        placeholder_line1="Upload proof of payment"
        placeholder_line2="Only PDF files are allowed"  />

<pre class="language-markup line-numbers" data-line="2,3">
<code>
&lt;x-bladewind::filepicker
    placeholder_line1="Upload proof of payment"
    placeholder_line2="Only PDF files are allowed"  /&gt;
</code>
</pre>
<p>
    In the example above, we typed out everything for placeholder lines 1 and 2. As mentioned earlier, the default <code class="inline text-red-500">placeholder_line2</code> contains the values specified for
    <code class="text-red-500 inline">accepted_file_types</code> and <code class="text-red-500 inline">max_file_size</code>. The component replaces image/* with the text images, video/* with the text videos, audio/*
    with the text audios. If you want the component to dynamically replace your <code class="text-red-500 inline">accepted_file_types</code>
    and <code class="text-red-500 inline">max_file_size</code> in your <code class="text-red-500 inline">placeholder_line2</code>, include two <code class="inline">%s</code> placeholders in your text.
</p>
    <x-bladewind::filepicker
        placeholder_line1="Drag and drop proof of payment here"
        placeholder_line2="Files allowed: %s up to %s"  />

    <pre class="language-markup line-numbers" data-line="3">
<code>
&lt;x-bladewind::filepicker
    placeholder_line1="Drag and drop proof of payment here"
    placeholder_line2="Files allowed: %s up to %s"  /&gt;
</code>
</pre>

    <h3>Option 2</h3>
    <p>
        This is the default option used by the component. This provides you with the flexibility to define your own layout for how the placeholder should look.
        You can use your own icons and colours. This option requires you to definitely set the <code class="text-red-500 inline">name</code> attribute of the filepicker.
        Simply define a DIV element with the class <code class="inline">placeholder-[$name] hidden</code>. Replace [$name] with the actual name of the filepicker.
        This DIV will need to exist before you define the filepicker component.
    </p>

    <div class="placeholder-invoices space-y-2 flex hidden align-middle py-3">
        <div>
            <x-bladewind::icon
                name="receipt-percent"
                class="!size-14 rounded-full p-3 bg-purple-400 stroke-2 text-purple-100"/>
        </div>
        <div class="text-left pl-2.5 pt-1.5">
            <div>Drag & Drop Invoices</div>
            <div class="!text-xs tracking-wider opacity-70">
                <u>PDFs</u> only. Max of <u>10mb</u>
            </div>
        </div>
    </div>
    <p><x-bladewind::filepicker name="invoices" /></p>
<pre class="language-markup line-numbers" data-line="1">
<code>
&lt;!-- remember to add the hidden CSS class -->
&lt;div class="placeholder-invoices space-y-2 flex hidden align-middle py-3"&gt;
    &lt;div&gt;
        &lt;x-bladewind::icon
            name="receipt-percent"
            class="!size-14 rounded-full p-3 bg-purple-400 text-purple-100"/&gt;
    &lt;/div&gt;
    &lt;div class="text-left pl-2.5 pt-1.5"&gt;
        &lt;div&gt;Drag & Drop Invoices&lt;/div&gt;
        &lt;div class="!text-xs tracking-wider opacity-70"&gt;
            &lt;u&gt;PDFs&lt;/u&gt; only. Max of &lt;u&gt;10mb&lt;/u&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code>
</pre>

<pre class="language-markup line-numbers" data-line="3">
<code>
&lt;x-bladewind::filepicker name="invoices" /&gt;
</code>
</pre>

    <h2 id="draggable">Allow Drag and Drop Only</h2>
    <p>
        By default the filepicker component allows users to both drag & drop files or browse to select files. You can turn off  file browsing by setting
         <code class="inline text-red-500">can_browse="false"</code>.
    </p>
    <x-bladewind::filepicker placeholder_line1="Drag and drop files" can_browse="false"  />

<pre class="language-markup line-numbers" data-line="4">
<code>
&lt;x-bladewind::filepicker
    can_browse="false"
    placeholder_line1="Drag and drop files" /&gt;
</code>
</pre>

    <h2 id="browseable">Allow Browsing of Files Only</h2>
    <p>
        By default the filepicker component allows users to both drag & drop files or browse to select files. You can turn off drag & drop by setting
         <code class="inline text-red-500">can_drop="false"</code>.
    </p>
    <x-bladewind::filepicker placeholder_line1="Click here to select your file" can_drop="false"  />

<pre class="language-markup line-numbers" data-line="4">
<code>
&lt;x-bladewind::filepicker
    can_drop"false"
    placeholder_line1="Drag and drop files" /&gt;
</code>
</pre>

    <h2 id="disable">Disable the Filepicker</h2>
    <p>
        Set <code class="inline text-red-500">disabled="true"</code>.
    </p>
    <x-bladewind::filepicker disabled="true"  />

<pre class="language-markup line-numbers" data-line="4">
<code>
&lt;x-bladewind::filepicker disabled"true" /&gt;
</code>
</pre>

    <h2 id="file-sizes">Enforce File Sizes</h2>
    <p>
        You can restrict the size of files your users are allowed to upload by defining the <code class="inline text-red-500">max_file_size</code> attribute.
        It is expected that you add the file measure, example, bytes, kb, mb, tb. The default is 5mb.
        The component will display an error if the user uploads a file larger than what is specified in <code class="inline text-red-500">max_file_size</code>.
        If you expect your users to upload really huge files, remember to set this attribute so your users don't get restricted by the default of 5mb.
    </p>
    <x-bladewind::filepicker max_file_size="15kb"  />

    <pre class="language-markup line-numbers" data-line="4">
<code>
&lt;x-bladewind::filepicker max_file_size="15kb"/&gt;
</code>
</pre>
    <p>
        In cases where you allow users to upload multiple files, you can set <code class="inline text-red-500">max_total_file_size</code> to restrict
        the total size your users are allowed to upload without necessarily bothering about the size of individual files.
    </p>
    <h3>Error Messages</h3>
    <p>
        When a selected file exceeds the size allowed, two error messages are displayed. You can change these by setting the
        <code class="inline text-red-500">max_file_size_exceeded_label</code> and  <code class="inline text-red-500">max_file_size_label</code> attributes to the appropriate messages.
    </p>
    <x-bladewind::table divider="thin" has_border="true" has_hover="false">
        <tr>
            <td>max_file_size_exceeded_label</td>
            <td>File size is too large</td>
        </tr>
        <tr>
            <td>max_file_size_label</td>
            <td>Maximum file size is 15kb</td>
        </tr>
    </x-bladewind::table>

    <h2 id="file-types">Enforce File Types</h2>
    <p>
        You can restrict the types of files your users are allowed to upload by defining the <code class="inline text-red-500">accepted_file_types</code> attribute.
        You can either specify one or a comma separated list of any of the <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types" target="_blank">MIME types available here</a>.
        You can either specify MIME types or file extensions. You can have a comma separated mixture of file extensions and MIME types.
        Note however, the file extensions need to have the dot prefix. Example: <code class="inline text-red-500">accepted_file_types="image/*, .pdf, .xlsx"</code>
    </p>
    <x-bladewind::filepicker accepted-file-types="application/pdf, .doc, .docx"  />

<pre class="language-markup line-numbers" data-line="4">
<code>
&lt;x-bladewind::filepicker
    accepted_file_types="application/pdf, .doc, .docx"/&gt;
</code>
</pre>

    <h2 id="multiple">Select Multiple Files</h2>
    <p>
        By default the filepicker allows users to select only one file because the attribute <code class="inline text-red-500">max_files="1"</code>.
        To allow selection of multiple files set the <code class="inline text-red-500">max_files</code> attribute to a value other than one (1).
        The placeholder is always visible even when the user has already selected files. This makes it possible to select other files.
        The placeholder gets hidden when the maximum number of files are selected. To select a new file, the user will need to delete one of the selecte files.
        The example below allows for a selection of 5 files.
    </p>
    <x-bladewind::filepicker max_files="5"  />

<pre class="language-markup line-numbers" data-line="4">
<code>
&lt;x-bladewind::filepicker max_files="5" /&gt;
</code>
</pre>

    <h2>Image Manipulation</h2>
    <p>
        Filepond comes with an awesome array of image manipulation features that we have included in BladewindUI as well.
        These features are only exposed if <code class="text-red-500 inline">accepted_file_types</code> contains image related MIME types.
    </p>
    <h3 id="image-preview">Image Preview</h3>
    <p>
        By default the filepicker allows users to see previews of images they select. This can be turned on or off by setting the <code class="inline text-red-500">show_image_preview</code> attribute to
        <code class="inline">true</code> or <code class="inline">false</code>. You can leave out the attribute if you always want to display image previews since that's the default behaviour.
        If the selected files are a mixture of images and non images, only the images will have previews if <code class="inline text-red-500">show_image_preview="true"</code>.
    </p>
    <x-bladewind::filepicker max_files="3" show_image_preview="false"  />

<pre class="language-markup line-numbers" data-line="2">
<code>
&lt;x-bladewind::filepicker max_files="3"
    show_image_preview="false" /&gt;
</code>
</pre>

<x-bladewind::filepicker max_files="3"  />
<pre class="language-markup line-numbers" data-line="4">
<code>
&lt;x-bladewind::filepicker max_files="3" /&gt;
</code>
</pre>

    <h3 id="image-crop">Image Cropping</h3>
    <p>
        Cropping is disabled by default and can be enabled by setting <code class="inline text-red-500">can_crop="true"</code>.
        The filepicker component's cropping feature integrates <a href="https://github.com/fengyuanchen/cropperjs/blob/main/README.md#options" target="_blank">Cropper.js</a>.
    </p>
    <x-bladewind::filepicker can_crop="true"  />

<pre class="language-markup line-numbers" data-line="4">
<code>
&lt;x-bladewind::filepicker can_crop="true" /&gt;
</code>
</pre>
<br />
    <p>
        When cropping is enabled it is important to set the aspect ratio.
        This defines how the cropping should be done. To define the aspect ratio set the <code class="inline text-red-500">crop_aspect_ratio</code> attribute
        to a any of these: <code class="inline">16:9</code>, <code class="inline">4:3</code>, <code class="inline">2:3</code>, <code class="inline">1:1</code>
        or <code class="inline">free</code>. The <code class="inline">free</code> aspect ratio allows the user to drag the cropper across the image to crop to their preferred dimensions.
        The default aspect ratio is <code class="inline">16:9</code>.
    </p>
    <p><x-bladewind::filepicker can_crop="true" crop_aspect_ratio="4:3" /></p>

<pre class="language-markup">
<code>
&lt;x-bladewind::filepicker can_crop="true" crop_aspect_ratio="4:3" /&gt;
</code>
</pre>
    <p>
        <x-bladewind::alert show_close_icon="false">
            Clicking on the 'Cancel' button from the Cropper popup window does not cancel the file selection.
            It only cancels the user's option to crop.
        </x-bladewind::alert>
    </p>

<h3 id="image-resize">Image Resizing</h3>
<p>
    There are no visual elements to this. This setting simply provides Filepond with information required to resize the image
    before it gets uploaded to the server. Assume you are building a shopping website and need all product images to have the
    same dimensions. You can use this option to resize all images uploaded using the filepicker to the required dimensions.
    Set <code class="inline text-red-500">can_resize="true"</code> to allow image resizing and then set the preferred width and/or
    height by setting the <code class="inline text-red-500">image_resize_width</code> and <code class="inline text-red-500">image_resize_height</code> attributes.
</p>

<h2>Upload Selected Files to a Server</h2>
<p>Files selected with the filepicker can either be uploaded automatically when the user selects the files or manually when the user clicks on a button to submit a form.
The default behaviour is to manually upload files.</p>
<h3 id="upload-auto">Automatically Upload Selected Files</h3>
<p>
    Files can automatically be uploaded when they are selected in the filepicker by setting <code class="inline text-red-500">auto_upload="true"</code>.
    Next, you will need to tell the filepicker component which route is responsible for file uploads in your project by setting the <code class="inline text-red-500">upload_route</code> attribute.
    File are automatically uploaded using the <code class="inline">POST</code> method. You can specify a different method by setting the <code class="inline text-red-500">upload_method</code> attribute.
</p>
    <p>
        When files are selected and automatically uploaded, the filepicker component allows users to delete uploaded files by clicking on the trash icon.
        By default, the route for deleting files is the same as the route for uploading files. You can overwrite this by setting the <code class="inline text-red-500">delete_route</code> attribute.
        When deleting files, the <code class="inline">POST</code> method is used, just like with uploading a file. You can change this by setting the <code class="inline text-red-500">delete_method</code> attribute.
        Only the <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods" target="_blank">approved HTTP verbs</a> can be used.
    </p>
    <p>
        If your routes require additional headers you can specify them with <code class="inline text-red-500">upload_headers</code> or <code class="inline text-red-500">delete_headers</code>.
        These need to be defined as an array of headers. By default the <code class="inline text-red-500">delete_headers</code> are the same as the <code class="inline text-red-500">upload_headers</code>
        unless you explicitly set a different value.
    </p>
    @php
        $headers = [
            "Authorization" => "Bearer ".uniqid('',true),
        ]
    @endphp
    <p>
        <x-bladewind::filepicker
            :auto_upload="true"
            upload_route="/upload"
            name="auto_upload"
            delete_route="/upload-delete"
            max_file_size="1mb"
            :upload_headers="$headers" />
    </p>
    <pre class="language-php line-numbers">
<code>
$headers = [
    "Authorization" => "Bearer 67e518a8205b20.18576843",
]
</code>
</pre>
<pre class="language-markup line-numbers">
<code>
&lt;x-bladewind::filepicker
    name="auto_upload"
    max_file_size="1mb"
    auto_upload="true"
    upload_route="/upload"
    :upload_headers="$headers"
    delete_route="/upload-delete" /&gt;
</code>
</pre>
<p>
    When a file is selected, it will automatically be uploaded to the route specified. The routes and controller below handle this example upload.
</p>
<pre class="language-php line-numbers">
<code>
// web.php
Route::post('/upload', [FileUploadController::class, 'upload']);
Route::post('/upload-delete', [FileUploadController::class, 'delete']);

// if you set delete_method="DELETE" and delete_route="/upload" on the component
// your route will then look like the line below
Route::delete('/upload', [FileUploadController::class, 'delete']);
</code>
</pre>
    <p>
        This is a very barebones implementation of file uploading in Laravel to give you a sense of what's happening in the controller.
    </p>
    <x-bladewind::alert show_close_icon="false" type="error">
        When deleting a file the component passes the JSON structure below.
        <code class="inline">{ "path" : "path/to/the/file-name-dot-extension" }</code> example: <br />
        <code class="inline">{ "path" : "uploads\/cqzbVgA5ydeQBvNkuBP4cZCGcpBTl3tt9dtufnKK.jpg" }</code>
    </x-bladewind::alert>
<pre class="language-php line-numbers">
<code>
// FileUploadController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'auto_upload' => 'required|mimes:jpg|max:1024',
        ]);

        $path = $request->file('auto_upload')->store('uploads', 'public');

        return response()->json(['path' => $path]);
    }

    public function delete(Request $request)
    {
        // path: will always contain the path to the file being deleted
        $filePath = $request->input('path');

        if (!$filePath) {
            return response()->json(['error' => 'No file path provided'], 400);
        }

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return response()->json(['message' => 'File deleted']);
        }
        return response()->json(['error' => 'File not found'], 404);
    }
}
</code>
</pre>

<h3 id="upload-manual">Manually Upload Selected Files</h3>
<p>
    This is the default option for the component. In some cases, you will want your user to trigger the actual upload of the files after they have probably finished filling a form with other fields.
    This is implemented when <code class="inline text-red-500">auto_upload="false"</code> .You don't need to set this attribute since manual uploading is the default behaviour.

    The <code class="inline text-red-500">upload_route</code> and <code class="inline text-red-500">upload_method</code> attributes are ignored for manual uploads since it is expected that these should be set on your FORM tag.
    Remember to add the <code class="inline text-red-500">enctype="multipart/form-data"</code> attribute on your form for uploads to work.
</p>
<p>
    To support manual upload of multiple files, the <code class="inline text-red-500">name</code> of the component will need to be an array. Example: <code class="inline text-red-500">name="idCards[]"</code>
</p>
    <br />
    <form method="POST" action="/manual-upload" enctype="multipart/form-data" target="_blank" class="text-center">
        @csrf
        <x-bladewind::filepicker required="true" name="manual_upload[]" max_file_size="1mb" max_files="3" class="border-red-200" />
        <x-bladewind::button can_submit="true">Upload Files</x-bladewind::button>
    </form>
<br />
<pre class="language-markup line-numbers">
<code>
&lt;form method="POST" action="/manual-upload" enctype="multipart/form-data"&gt;
    @@csrf
&lt;x-bladewind::filepicker
        name="manual_upload[]"
        max_file_size="1mb"
        max_files="3" /&gt;
    &lt;x-bladewind::button can_submit="true"&gt;
        Upload Files
    &lt;/x-bladewind::button&gt;
&lt;/form&gt;
</code>
</pre>

<pre class="language-php line-numbers">
<code>
// web.php
Route::post('/manual-upload', [FileUploadController::class, 'manual_upload']);
</code>
</pre>

<pre class="language-php line-numbers">
<code>
// FileUploadController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    ...
    public function manual_upload(Request $request)
    {
        $request->validate([
            'files.*' => 'mimes:jpg|max:1024',
        ]);

        $uploadedFiles = [];
        foreach ($request->file('manual_upload') as $file) {
            $path = $file->store('uploads', 'public');
            $uploadedFiles[] = $path;
        }
        dd($uploadedFiles);}
}
</code>
</pre>
<h3 id="base64">Encode Files as base64</h3>
<p>
    The component allows for files to be retrieved in base64 format. This works for uploading single files or multiple files.
    To encode uploaded files as base64, set <code class="inline text-red-500">base64="true"</code>. The name of input field for storing the base64 files has <code class="inline">_b64</code> appended to it.
    So if the name of your filepicker field is <code class="inline">attachment</code>, the base64 encoded files will be written to <code class="inline">attachment_b64</code>.
</p>
    <p>
        You also need to specify how the encoded data should be returned using the <code class="inline text-red-500">base64_output</code> attribute.
        The two values available for that attribute are <code class="inline">string</code> and <code class="inline">url</code> (default). The value to choose depends on your use case.
        The table below shows a sample of how each value's data is returned.
    </p>
    <p>
        <x-bladewind::table divider="thin" has_border="true">
            <x-slot:header>
                <tr><th>Value</th><th>Sample Output</th></tr>
            </x-slot:header>
                <tr>
                    <td><code class="inline">string</code></td>
                    <td>/9j/4AAQSkZJRgABAQAAAQABAAD/4gHYSUNDX1BST0ZJTEUAAQEAAA ...</td>
                </tr>
                <tr>
                    <td><code class="inline">url</code></td>
                    <td>data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gHYSUNDX ...</td>
                </tr>
        </x-bladewind::table>
    </p>
    <br />
    <form method="POST" action="/base64-upload" enctype="multipart/form-data" target="_blank" class="text-center">
        @csrf
        <x-bladewind::filepicker name="base64" max_file_size="1mb" max_files="3" :base64="true" required="true" />
        <x-bladewind::button can_submit="true">Upload Files</x-bladewind::button>
    </form>
<br />
<pre class="language-markup line-numbers" data-line="4,6">
<code>
&lt;form method="POST" action="/base64-upload" enctype="multipart/form-data"&gt;
    @@csrf
&lt;x-bladewind::filepicker
        name="attachments"
        max_file_size="1mb"
        base64="true"
        max_files="3" /&gt;
    &lt;x-bladewind::button can_submit="true"&gt;
        Upload Files
    &lt;/x-bladewind::button&gt;
&lt;/form&gt;
</code>
</pre>

<pre class="language-php line-numbers">
<code>
// web.php
Route::post('/base64-upload', [FileUploadController::class, 'base64_upload']);
</code>
</pre>

<pre class="language-php line-numbers">
<code>
// FileUploadController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    ...
    public function base64_upload(Request $request)
    {
        $base64Files = $request->input('attachments_b64');
        foreach ($base64Files as $file) {
            dump($file);
        }
    }
</code>
</pre>
<br />
<x-bladewind::alert show_close_icon="false" type="info">
    Both the selected files and their encoded base64 versions are available when the form is submitted. You can either use both or just focus on the base64 versions.
</x-bladewind::alert>

    <h2 id="edit-mode">Preloading Component with Specific Files</h2>
    <p>
        In edit mode you will typically want to prepopulate the component with files the user selected earlier, so they can remove and/or add new files.
        Below is how you need to structure the list of files you pass to the filepicker's <code class="inline text-red-500">selected_value</code> attribute
    </p>
@php
$existingFiles = [
    [ 'source' => asset('assets/images/yoonbae-cho-Fes4eLW4mg0-unsplash.jpg') ],
    [ 'source' => asset('assets/images/sam-carter-JU1SVl4smHM-unsplash.jpg') ],
    [ 'source' => asset('assets/images/lissete-laverde-z9Ropm8edsw-unsplash.jpg') ],
];
@endphp
<pre class="language-php line-numbers">
<code>
$existingFiles = [
    [ 'source' => asset('images/yoonbae-cho-Fes4eLW4mg0-unsplash.jpg') ],
    [ 'source' => asset('images/sam-carter-JU1SVl4smHM-unsplash.jpg') ],
    [ 'source' => asset('images/lissete-laverde-z9Ropm8edsw-unsplash.jpg') ],
];
</code>
</pre>
  <br />
    <x-bladewind::filepicker name="edit" max_file_size="2mb" max_files="2" :selected_value="$existingFiles" />
<br />
    <pre class="language-php line-numbers">
<code>
&lt;x-bladewind::filepicker
    name="edit"
    max_file_size="2mb"
    max_files="2"
    :selected_value="$existingFiles" /&gt;
</code>
</pre>
<p>
<x-bladewind::alert show_close_icon="false">
    Note from the above example that even though the <b>$existingFiles</b> array has 3 elements (files), the Filepicker displays only 2 files. This is
    because the Filepicker has been set to <code class="inline text-red-500">max_files="2"</code>. To ensure all files are loaded in the Filepicker,
    either set <code class="inline text-red-500">max_files</code> to the number of elements in your <code class="inline text-red-500">selected_value</code>
    array or remove the <code class="inline text-red-500">max_files</code> attribute entirely.
</x-bladewind::alert>
</p>
    <h2 id="attributes">Full List Of Attributes</h2>
    <p>The table below shows a comprehensive list of all the attributes available for the Filepicker component.</p>
    @include('docs/announcement')
    <x-bladewind::table striped="true">
        <x-slot name="header">
            <th>Option</th>
            <th>Default</th>
            <th>Available Values</th>
        </x-slot>
        <tr>
            <td>name</td>
            <td>random</td>
            <td>Name for the filepicker. So if you named the filepicker <code>profile_pic</code>, the resulting html will be
            <code class="inline text-red-500">&lt;input type="file" name="profile_pic" ../&gt;</code></td>
        </tr>
        <tr>
            <td>accepted_file_types</td>
            <td>image/*, audio/*, video/*, application/pdf</td>
            <td>One or a comma separated list of any of the mimetypes <a href="https://developer.mozilla.org/en-US/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Common_types" target="_blank">available here</a>.</td>
        </tr>
        <tr>
            <td>placeholder_line1</td>
            <td>Choose files or drag and drop to upload</td>
            <td>Placeholder text to display on line 1</td>
        </tr>
        <tr>
            <td>placeholder_line2</td>
            <td>%s up to %s</td>
            <td>Placeholder text to display on line 2</td>
        </tr>
        <tr>
            <td>selected_value</td>
            <td>[]</td>
            <td>An array of file names to preload in the filepicker when in edit mode</td>
        </tr>
        <tr>
            <td>required</td>
            <td>false</td>
            <td>Determines if the placeholder text should have an asterisk appended to it or not.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>can_browse</td>
            <td>true</td>
            <td>Should user be able to click to launch the native file browser to select files. <br /> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>can_drop</td>
            <td>true</td>
            <td>Should user be able to select files by dropping them on filepicker. <br /> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>disabled</td>
            <td>false</td>
            <td>Should filepicker be disabled. <br /> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>validate_file_size</td>
            <td>true</td>
            <td>Should all selected files have their sizes validated against what's been set for <code class="text-red-500 inline">max_file_size</code>. <br /> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>base64</td>
            <td>false</td>
            <td>Should base64 versions of the selected files be generated.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>base64_output</td>
            <td>url</td>
            <td>Should base64 versions of the selected files be generated.<br> <code class="inline">url</code> <code class="inline">string</code> </td>
        </tr>
        <tr>
            <td>show_credits</td>
            <td>false</td>
            <td>Show Filepond credits.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>auto_upload</td>
            <td>false</td>
            <td>Automatically upload files once they are selected.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>max_files</td>
            <td>1</td>
            <td>How many files can the user select.<br> <code class="inline">positive integer</code></td>
        </tr>
        <tr>
            <td>max_file_size</td>
            <td>5mb</td>
            <td>Maximum size for each file. Must include the unit of measure bytes, kb, mb, gb, tb. <br> <code class="inline">string</code></td>
        </tr>
        <tr>
            <td>auto_upload</td>
            <td>false</td>
            <td>Automatically upload files once they are selected.<br> <code class="inline">true</code> <code class="inline">false</code> </td>
        </tr>
        <tr>
            <td>add_new_files_to</td>
            <td>top</td>
            <td>When files already exist in the filepicker, any new selections should be placed in this position.<br> <code class="inline">top</code> <code class="inline">bottom</code></td>
        </tr>
        <tr>
            <td>max_total_file_size</td>
            <td>null</td>
            <td>Maximum size allowed for all files selected. Must include the unit of measure bytes, kb, mb, gb, tb. <br> Example: <code class="inline">1gb</code></td>
        </tr>
        <tr>
            <td>selected_value</td>
            <td>[]</td>
            <td>Files to automatically display when the component is loaded.</td>
        </tr>
        <tr>
            <td>show_image_preview</td>
            <td>true</td>
            <td>Show image previews when images are selected.<br> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>can_resize_image</td>
            <td>false</td>
            <td>Allow image resizing in the background. This does not display any UI resizing controls.<br> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>image_resize_width</td>
            <td>null</td>
            <td>Images should be resized to this width. An aspect ratio is maintained if this is defined and the height is ignored. <br> <code class="inline">positive integer</code></td>
        </tr>
        <tr>
            <td>image_resize_height</td>
            <td>null</td>
            <td>Images should be resized to this height. An aspect ratio is maintained if this is defined and the width is ignored. <br> <code class="inline">positive integer</code></td>
        </tr>
        <tr>
            <td>can_crop</td>
            <td>false</td>
            <td>Allow image cropping.<br> <code class="inline">true</code> <code class="inline">false</code></td>
        </tr>
        <tr>
            <td>crop_aspect_ratio</td>
            <td>16:9</td>
            <td>Aspect ratio used for image cropping.<br> <code class="inline">top</code> <code class="inline">16:9</code> <code class="inline">4:3</code> <code class="inline">2:3</code> <code class="inline">1:1</code> <code class="inline">free</code></td>
        </tr>
        <tr>
            <td>upload_route</td>
            <td>null</td>
            <td>URL for automatic file uploads. See <a href="/component/filepicker#upload-auto">example</a>.</td>
        </tr>
        <tr>
            <td>upload_headers</td>
            <td>[]</td>
            <td>HTTP headers to append when calling $upload_route. See <a href="/component/filepicker#upload-auto">example</a>.</td>
        </tr>
        <tr>
            <td>upload_method</td>
            <td>POST</td>
            <td>HTTP method for automatically uploading files.<br> <code class="inline">POST</code> <code class="inline">PUT</code> <code class="inline">PATCH</code></td>
        </tr>
        <tr>
            <td>delete_route</td>
            <td>null</td>
            <td>URL for deleting files automatically uploaded. See <a href="/component/filepicker#upload-auto">example</a>.</td>
        </tr>
        <tr>
            <td>delete_headers</td>
            <td>null</td>
            <td>HTTP headers to append when calling $delete_route. Defaults to what was set for <code class="inline text-red-500">upload_headers</code> See <a href="/component/filepicker#upload-auto">example</a>.</td>
        </tr>
        <tr>
            <td>delete_method</td>
            <td>null</td>
            <td>HTTP method for deleting files automatically uploaded. Defaults to what was set for <code class="inline text-red-500">upload_method</code>.<br> <code class="inline">POST</code> <code class="inline">DELETE</code></td>
        </tr>
        <tr>
            <td>nonce</td>
            <td>null</td>
            <td>Used when implementing context security policies and require to pass a nonce to inline scripts. For convenience, you can set your <code class="inline">nonce</code> value in the <code class="inline">config/bladewind.php</code> file under the "script" key. This value will be used everywhere nonce is required. </td>
        </tr>
    </x-bladewind::table>

    <h3>Filepicker with all attributes defined</h3>
    <pre class="language-markup line-numbers">
<code>
&lt;x-bladewind::filepicker
    name="profile_pic"
    required="false"
    placeholder_line1="Choose a profile picture"
    placeholder_line2="Only jpg files allowed"
    accepted_file_types=".jpg, .png"
    selected_value=""
    disabled="false"
    base64="false"
    base64_output="string"
    can_crop="false"
    can_drop="false"
    can_browse="true"
    validate_file_size="true"
    show_credits="true"
    auto_upload="true"
    max_files="2"
    max_file_size="1mb"
    max_total_file_size="2mb"
    add_new_files_to="bottom"
    show_image_preview="true"
    can_resize_image="true"
    image_resize_width="1024"
    image_resize_height=""
    can_crop="false"
    crop_aspect_ratio="free"
    upload_route="/dp/upload"
    upload_method="PATCH"
    :upload_headers="$headers"
    delete_route="/dp/delete"
    delete_method="DELETE"
    :delete_headers="$headers" /&gt;
</code>
    </pre>

    <x-bladewind::alert show_close_icon="false">
        The source file for this component is available in <code class="inline">resources > views > components > bladewind > filepicker.blade.php</code>
    </x-bladewind::alert>
    <p>
        <x-bladewind::alert type="info" show_close_icon="false">
            To prevent erratic behaviour when using multiple Filepickers on the same page, you should give each Filepicker a unique name. You can do this by setting the <code class="inline">name</code> attribute on the filepicker.
        </x-bladewind::alert>
    </p>

    <x-slot:side_nav>
        <div class="flex items-center"><div class="dot"></div><a href="#placeholder">Change placeholder</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#draggable">Allow drag and drop only</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#browseable">Allow browsing of files only</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#disable">Disable filepicker</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#file-sizes">Enforce file sizes</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#file-types">Enforce file types</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#multiple">Multiple files</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#image-preview">Image manipulation</a></div>
        <div class="flex items-center pl-4"><div class="dot"></div><a href="#image-preview">Preview</a></div>
        <div class="flex items-center pl-4"><div class="dot"></div><a href="#image-crop">Crop</a></div>
        <div class="flex items-center pl-4"><div class="dot"></div><a href="#image-resize">Resize</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#upload-auto">Upload files to server</a></div>
        <div class="flex items-center pl-4"><div class="dot"></div><a href="#upload-auto">Automatic upload</a></div>
        <div class="flex items-center pl-4"><div class="dot"></div><a href="#upload-manual">Manual upload</a></div>
        <div class="flex items-center pl-4"><div class="dot"></div><a href="#base64">Base64 encode files</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#edit-mode">Edit mode</a></div>
        <div class="flex items-center"><div class="dot"></div><a href="#attributes">Full list of attributes</a></div>
    </x-slot:side_nav>

    <x-slot name="scripts">
        <script>
            selectNavigationItem('.component-filepicker');
        </script>
    </x-slot>
</x-app>
