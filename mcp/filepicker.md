---
title: Filepicker Component
component: x-bladewind::filepicker
url: /component/filepicker
---

# Filepicker

A wrapper around the popular Filepond project by PQINA, including the most broadly applicable features. Supports both dragging and dropping files and browsing for files using the browser's native file picker.

## Basic Usage

```blade
<x-bladewind::filepicker />
```

By default the component provides a random name when none is specified. Set the `name` attribute if you intend to disable automatic uploads or need to access base64 versions of the files.

```blade
<x-bladewind::filepicker name="certs" />
```

## Changing the Placeholder

The default placeholder has two lines: "Browse or drag and drop files" and a second line listing the accepted file types and max size, built from `accepted_file_types` and `max_file_size`.

### Option 1: Text Placeholders

Set `placeholder_line1` and `placeholder_line2` directly.

```blade
<x-bladewind::filepicker
    placeholder_line1="Upload proof of payment"
    placeholder_line2="Only PDF files are allowed" />
```

Include two `%s` placeholders in `placeholder_line2` to have the component dynamically insert `accepted_file_types` and `max_file_size`.

```blade
<x-bladewind::filepicker
    placeholder_line1="Drag and drop proof of payment here"
    placeholder_line2="Files allowed: %s up to %s" />
```

### Option 2: Custom Layout (Default)

Define your own layout, icons, and colours. Requires setting the `name` attribute. Define a `<div>` with class `placeholder-[$name] hidden` (replacing `[$name]` with the filepicker's name) before the filepicker component.

```blade
<!-- remember to add the hidden CSS class -->
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
<x-bladewind::filepicker name="invoices" />
```

## Allow Drag and Drop Only

Set `can_browse="false"` to disable file browsing and only allow drag & drop.

```blade
<x-bladewind::filepicker placeholder_line1="Drag and drop files" can_browse="false" />
```

## Allow Browsing of Files Only

Set `can_drop="false"` to disable drag & drop and only allow browsing.

```blade
<x-bladewind::filepicker placeholder_line1="Click here to select your file" can_drop="false" />
```

## Disable the Filepicker

```blade
<x-bladewind::filepicker disabled="true" />
```

## Enforce File Sizes

Set `max_file_size` including the unit (bytes, kb, mb, gb, tb). Default is `5mb`. An error is shown if a file exceeds it.

```blade
<x-bladewind::filepicker max_file_size="15kb" />
```

For multiple files, set `max_total_file_size` to restrict the combined size regardless of individual file sizes.

### Error Messages

Customize the messages shown when a file exceeds the allowed size using `max_file_size_exceeded_label` and `max_file_size_label`.

## Enforce File Types

Set `accepted_file_types` to a comma-separated list of MIME types and/or file extensions (extensions need the dot prefix), e.g. `accepted_file_types="image/*, .pdf, .xlsx"`.

```blade
<x-bladewind::filepicker accepted_file_types="application/pdf, .doc, .docx" />
```

## Select Multiple Files

By default only one file can be selected (`max_files="1"`). Set `max_files` higher to allow more. The placeholder stays visible until the maximum is reached; delete a file to select a new one.

```blade
<x-bladewind::filepicker max_files="5" />
```

## Image Manipulation

These features are only exposed when `accepted_file_types` contains image MIME types.

### Image Preview

Enabled by default. Toggle with `show_image_preview`. If the selection mixes images and non-images, only images get previews.

```blade
<x-bladewind::filepicker max_files="3" show_image_preview="false" />
```

### Image Cropping

Disabled by default. Set `can_crop="true"` to enable (integrates Cropper.js).

```blade
<x-bladewind::filepicker can_crop="true" />
```

Set `crop_aspect_ratio` to `16:9` (default), `4:3`, `2:3`, `1:1`, or `free` (lets the user drag the cropper freely).

```blade
<x-bladewind::filepicker can_crop="true" crop_aspect_ratio="4:3" />
```

Clicking Cancel on the Cropper popup cancels only the crop, not the file selection.

### Image Resizing

No visual elements — this provides Filepond with resize instructions before upload. Set `can_resize="true"` and specify `image_resize_width` and/or `image_resize_height`.

## Upload Selected Files to a Server

Files can upload automatically on selection, or manually when the user submits a form. Manual is the default.

### Automatically Upload Selected Files

Set `auto_upload="true"` and `upload_route` to the route handling uploads (uses `POST` by default; override with `upload_method`). Uploaded files can be deleted via the trash icon — the delete route defaults to the upload route, override with `delete_route` (and `delete_method`, default `POST`). Additional headers can be set via `upload_headers` and `delete_headers` (an array); `delete_headers` defaults to `upload_headers` unless set explicitly.

```blade
<x-bladewind::filepicker
    name="auto_upload"
    max_file_size="1mb"
    auto_upload="true"
    upload_route="/upload"
    :upload_headers="$headers"
    delete_route="/upload-delete" />
```

```php
$headers = [
    "Authorization" => "Bearer 67e518a8205b20.18576843",
]
```

```php
// web.php
Route::post('/upload', [FileUploadController::class, 'upload']);
Route::post('/upload-delete', [FileUploadController::class, 'delete']);

// if you set delete_method="DELETE" and delete_route="/upload" on the component
// your route will then look like the line below
Route::delete('/upload', [FileUploadController::class, 'delete']);
```

A barebones controller implementation:

```php
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
```

When deleting a file, the component posts `{ "path" : "path/to/the/file-name-dot-extension" }`.

### Manually Upload Selected Files

The default behaviour. `upload_route` and `upload_method` are ignored since the FORM tag itself handles uploading — remember `enctype="multipart/form-data"` on the form. For multiple manual uploads, the `name` needs to be an array, e.g. `name="idCards[]"`.

```blade
<form method="POST" action="/manual-upload" enctype="multipart/form-data">
    @csrf
    <x-bladewind::filepicker
        name="manual_upload[]"
        max_file_size="1mb"
        max_files="3" />
    <x-bladewind::button can_submit="true">
        Upload Files
    </x-bladewind::button>
</form>
```

```php
// web.php
Route::post('/manual-upload', [FileUploadController::class, 'manual_upload']);
```

```php
// FileUploadController.php
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
    dd($uploadedFiles);
}
```

### Encode Files as base64

Works for single or multiple files. Set `base64="true"`; the base64 field name has `_b64` appended (e.g. `attachment` becomes `attachment_b64`). Set `base64_output` to `string` or `url` (default) to control the returned format.

| Value | Sample Output |
|---|---|
| `string` | /9j/4AAQSkZJRgABAQAAAQABAAD/4gHYSUNDX1BST0ZJTEUAAQEAAA ... |
| `url` | data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/4gHYSUNDX ... |

```blade
<form method="POST" action="/base64-upload" enctype="multipart/form-data">
    @csrf
    <x-bladewind::filepicker name="base64" max_file_size="1mb" max_files="3" :base64="true" required="true" />
    <x-bladewind::button can_submit="true">Upload Files</x-bladewind::button>
</form>
```

```php
// web.php
Route::post('/base64-upload', [FileUploadController::class, 'base64_upload']);
```

```php
// FileUploadController.php
public function base64_upload(Request $request)
{
    $base64Files = $request->input('attachments_b64');
    foreach ($base64Files as $file) {
        dump($file);
    }
}
```

Both the selected files and their base64-encoded versions are available on submission — use either or both.

## Preloading Component with Specific Files (Edit Mode)

Prepopulate with previously selected files so users can remove or add new ones, using the `selected_value` attribute.

```php
$existingFiles = [
    [ 'source' => asset('images/yoonbae-cho-Fes4eLW4mg0-unsplash.jpg') ],
    [ 'source' => asset('images/sam-carter-JU1SVl4smHM-unsplash.jpg') ],
    [ 'source' => asset('images/lissete-laverde-z9Ropm8edsw-unsplash.jpg') ],
];
```

```blade
<x-bladewind::filepicker
    name="edit"
    max_file_size="2mb"
    max_files="2"
    :selected_value="$existingFiles" />
```

Even though `$existingFiles` has 3 elements, only 2 display because `max_files="2"`. Either raise `max_files` to match the array size, or remove it entirely, to load all files.

## Laravel Form State

When validation fails, Laravel redirects back with the submitted values flashed to the session and the messages in `$errors`. The Filepicker component reads the error half for you.

```blade
<x-bladewind::filepicker
    name="avatar"
    show_validation_error="true" />
```

`show_validation_error` gives the field its error state and renders `$errors->first()` underneath it. Add `error_bag` if you validate into a named bag. There is no `fill_from_old` — a file input cannot be repopulated by the browser for security reasons.

Both are off by default. If your form already prints its own validation messages, switching this on without removing them would print every message twice.

### Turning It On for Every Form

```php
// config/bladewind.php
'forms' => [
    'fill_from_old' => true,
    'show_validation_error' => true,
    'error_bag' => null,
],
```

An attribute on a single field always wins over the config, so you can opt one field out with `show_validation_error="false"`.

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | random | Name for the filepicker, e.g. `profile_pic` renders `<input type="file" name="profile_pic" ../>`. |
| accepted_file_types | image/*, audio/*, video/*, application/pdf | Comma-separated MIME types and/or file extensions. |
| placeholder_line1 | Choose files or drag and drop to upload | Placeholder text on line 1. |
| placeholder_line2 | %s up to %s | Placeholder text on line 2. |
| selected_value | [] | Array of file names/sources to preload in edit mode. |
| required | false | Append an asterisk to the placeholder text. `true` \| `false` |
| can_browse | true | Allow launching the native file browser. `true` \| `false` |
| can_drop | true | Allow selecting files by dropping them on the filepicker. `true` \| `false` |
| disabled | false | Disable the filepicker. `true` \| `false` |
| validate_file_size | true | Validate selected file sizes against `max_file_size`. `true` \| `false` |
| base64 | false | Generate base64 versions of selected files. `true` \| `false` |
| base64_output | url | Format for base64 output. `url` \| `string` |
| show_credits | false | Show Filepond credits. `true` \| `false` |
| auto_upload | false | Automatically upload files once selected. `true` \| `false` |
| max_files | 1 | How many files the user can select. Positive integer. |
| max_file_size | 5mb | Maximum size per file, including unit of measure. |
| add_new_files_to | top | Where new selections are placed when files already exist. `top` \| `bottom` |
| max_total_file_size | null | Maximum combined size for all selected files, e.g. `1gb`. |
| show_image_preview | true | Show previews for selected images. `true` \| `false` |
| can_resize_image | false | Allow background image resizing (no UI controls). `true` \| `false` |
| image_resize_width | null | Resize images to this width, maintaining aspect ratio (ignores height if set). Positive integer. |
| image_resize_height | null | Resize images to this height, maintaining aspect ratio (ignores width if set). Positive integer. |
| can_crop | false | Allow image cropping. `true` \| `false` |
| crop_aspect_ratio | 16:9 | Aspect ratio for cropping. `16:9` \| `4:3` \| `2:3` \| `1:1` \| `free` |
| upload_route | null | URL for automatic file uploads. |
| upload_headers | [] | HTTP headers appended when calling `upload_route`. |
| upload_method | POST | HTTP method for automatic uploads. `POST` \| `PUT` \| `PATCH` |
| delete_route | null | URL for deleting automatically uploaded files. |
| delete_headers | null | HTTP headers appended when calling `delete_route`. Defaults to `upload_headers`. |
| delete_method | null | HTTP method for deleting uploaded files. Defaults to `upload_method`. `POST` \| `DELETE` |
| nonce | null | Nonce value for content security policies applied to inline scripts. Can also be set globally via `config/bladewind.php` under the "script" key. |
| show_validation_error | false | Give the field its error state and render `$errors->first()` beneath it. Defaults to `bladewind.forms.show_validation_error`. `true` \| `false` |
| error_bag | null | Which error bag to read when `show_validation_error` is on. Leave unset for Laravel's default bag. |

## Full Example

```blade
<x-bladewind::filepicker
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
    crop_aspect_ratio="free"
    upload_route="/dp/upload"
    upload_method="PATCH"
    :upload_headers="$headers"
    delete_route="/dp/delete"
    delete_method="DELETE"
    :delete_headers="$headers" />
```

To avoid erratic behaviour when using multiple Filepickers on the same page, give each one a unique `name`.

## Using Filepicker Inside Livewire

The component guards against a Livewire re-render building a second FilePond instance (and a second Cropper.js instance when cropping is enabled) around the same field. When base64 mode is used, the hidden field created for each file dispatches a real, native `change` event, so Livewire's `wire:model` picks it up. FilePond manages its own DOM while a file is being added, cropped, or uploaded — wrap the picker in `wire:ignore` if it sits inside a Livewire component that can re-render for unrelated reasons during that time.
