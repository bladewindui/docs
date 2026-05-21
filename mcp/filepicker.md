---
title: Filepicker Component
component: x-bladewind::filepicker
url: /component/filepicker
---

# Filepicker

A wrapper around the popular [Filepond](https://pqina.nl/filepond/) file picker by PQINA. Supports drag-and-drop and click-to-browse. Includes image preview, cropping, resizing, automatic and manual uploads, base64 encoding, and multiple file selection.

## Basic Usage

```blade
<x-bladewind::filepicker />

{{-- with a name (required for manual uploads and base64) --}}
<x-bladewind::filepicker name="certs" />
```

## Placeholder

The default placeholder shows "Browse or drag and drop files" with accepted file types and max size on the second line. Customise with `placeholder_line1` and `placeholder_line2`.

```blade
<x-bladewind::filepicker
    placeholder_line1="Upload proof of payment"
    placeholder_line2="Only PDF files are allowed" />

{{-- use %s to dynamically inject accepted_file_types and max_file_size --}}
<x-bladewind::filepicker
    placeholder_line1="Drag and drop proof of payment here"
    placeholder_line2="Files allowed: %s up to %s" />
```

For a fully custom placeholder layout, define a hidden `div` with class `placeholder-[$name]` before the filepicker:

```blade
<div class="placeholder-invoices hidden flex space-y-2 align-middle py-3">
    <x-bladewind::icon name="receipt-percent" class="!size-14 rounded-full p-3 bg-purple-400 text-purple-100"/>
    <div class="text-left pl-2.5 pt-1.5">
        <div>Drag & Drop Invoices</div>
        <div class="!text-xs opacity-70"><u>PDFs</u> only. Max of <u>10mb</u></div>
    </div>
</div>
<x-bladewind::filepicker name="invoices" />
```

## Drag-and-Drop or Browse Only

```blade
{{-- drag and drop only --}}
<x-bladewind::filepicker can_browse="false" placeholder_line1="Drag and drop files" />

{{-- browse only --}}
<x-bladewind::filepicker can_drop="false" placeholder_line1="Click here to select your file" />
```

## File Size Limits

```blade
<x-bladewind::filepicker max_file_size="15kb" />

{{-- total size limit across all selected files --}}
<x-bladewind::filepicker max_files="3" max_total_file_size="30kb" />
```

## File Type Restrictions

```blade
<x-bladewind::filepicker accepted_file_types="application/pdf, .doc, .docx" />
```

## Multiple Files

```blade
<x-bladewind::filepicker max_files="5" />
```

## Image Manipulation

```blade
{{-- disable image preview --}}
<x-bladewind::filepicker max_files="3" show_image_preview="false" />

{{-- enable cropping --}}
<x-bladewind::filepicker can_crop="true" />

{{-- cropping with aspect ratio --}}
<x-bladewind::filepicker can_crop="true" crop_aspect_ratio="4:3" />

{{-- resize in background before upload --}}
<x-bladewind::filepicker can_resize_image="true" image_resize_width="1024" />
```

Available `crop_aspect_ratio` values: `16:9` `4:3` `2:3` `1:1` `free`

## Automatic Upload

```blade
<x-bladewind::filepicker
    name="auto_upload"
    auto_upload="true"
    upload_route="/upload"
    :upload_headers="$headers"
    delete_route="/upload-delete"
    max_file_size="1mb" />
```

The upload route receives a POST request. The delete route is called when a user removes an uploaded file, also via POST. The component passes `{ "path": "path/to/file" }` when deleting.

```php
// web.php
Route::post('/upload', [FileUploadController::class, 'upload']);
Route::post('/upload-delete', [FileUploadController::class, 'delete']);
```

## Manual Upload (Form Submission)

Manual upload is the default. Use an array name for multiple files. Add `enctype="multipart/form-data"` to the form.

```blade
<form method="POST" action="/manual-upload" enctype="multipart/form-data">
    @csrf
    <x-bladewind::filepicker name="manual_upload[]" max_file_size="1mb" max_files="3" />
    <x-bladewind::button can_submit="true">Upload Files</x-bladewind::button>
</form>
```

## Base64 Encoding

```blade
<x-bladewind::filepicker name="attachments" base64="true" max_files="3" />
```

The base64 data is written to an input named `attachments_b64`. Use `base64_output="string"` or `base64_output="url"` (default) to control the format.

## Edit Mode (Preloading Files)

```blade
@php
$existingFiles = [
    [ 'source' => asset('images/photo1.jpg') ],
    [ 'source' => asset('images/photo2.jpg') ],
];
@endphp

<x-bladewind::filepicker name="edit" max_files="2" :selected_value="$existingFiles" />
```

## Attributes

| Attribute | Default | Description |
|---|---|---|
| name | random | Name for the file input field |
| accepted_file_types | image/\*, audio/\*, video/\*, application/pdf | MIME types or file extensions (comma-separated) |
| placeholder_line1 | Choose files or drag and drop to upload | First line of placeholder text |
| placeholder_line2 | %s up to %s | Second line of placeholder text. `%s` is replaced with file types and max size |
| selected_value | [] | Array of `{ source: url }` objects to preload in edit mode |
| required | false | Append asterisk to placeholder. `true` \| `false` |
| can_browse | true | Allow click-to-browse. `true` \| `false` |
| can_drop | true | Allow drag-and-drop. `true` \| `false` |
| disabled | false | Disable the filepicker. `true` \| `false` |
| max_files | 1 | Maximum number of files the user can select |
| max_file_size | 5mb | Max size per file (include unit: `kb`, `mb`, `gb`) |
| max_total_file_size | null | Max total size across all selected files |
| validate_file_size | true | Validate file sizes. `true` \| `false` |
| add_new_files_to | top | Where to insert newly added files. `top` \| `bottom` |
| auto_upload | false | Automatically upload on selection. `true` \| `false` |
| upload_route | null | URL for automatic uploads (POST) |
| upload_method | POST | HTTP method for uploads. `POST` \| `PUT` \| `PATCH` |
| upload_headers | [] | HTTP headers for upload requests |
| delete_route | null | URL for deletion of uploaded files |
| delete_method | null | HTTP method for deletion. Defaults to `upload_method` |
| delete_headers | null | HTTP headers for delete requests. Defaults to `upload_headers` |
| show_image_preview | true | Show image previews. `true` \| `false` |
| can_crop | false | Enable image cropping. `true` \| `false` |
| crop_aspect_ratio | 16:9 | Cropping aspect ratio. `16:9` \| `4:3` \| `2:3` \| `1:1` \| `free` |
| can_resize_image | false | Resize image before upload (no UI). `true` \| `false` |
| image_resize_width | null | Target width for resizing |
| image_resize_height | null | Target height for resizing |
| base64 | false | Generate base64 versions of selected files. `true` \| `false` |
| base64_output | url | Format of base64 output. `url` \| `string` |
| show_credits | false | Show Filepond credits. `true` \| `false` |
| nonce | null | Nonce value for Content Security Policy |

## Full Example

```blade
<x-bladewind::filepicker
    name="profile_pic"
    required="false"
    placeholder_line1="Choose a profile picture"
    placeholder_line2="Only jpg files allowed"
    accepted_file_types=".jpg, .png"
    disabled="false"
    base64="false"
    base64_output="string"
    can_crop="false"
    can_drop="true"
    can_browse="true"
    validate_file_size="true"
    auto_upload="true"
    max_files="2"
    max_file_size="1mb"
    max_total_file_size="2mb"
    add_new_files_to="bottom"
    show_image_preview="true"
    can_resize_image="true"
    image_resize_width="1024"
    upload_route="/dp/upload"
    upload_method="PATCH"
    :upload_headers="$headers"
    delete_route="/dp/delete"
    delete_method="DELETE"
    :delete_headers="$headers" />
```
