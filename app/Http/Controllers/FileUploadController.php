<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\NoReturn;

class FileUploadController extends Controller
{
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

    public function base64_upload(Request $request)
    {
        $base64Files = $request->input('base64_b64');
        foreach ($base64Files as $file) {
            dump($file);
        }
    }

    public function upload(Request $request)
    {
        $request->validate([
            'auto_upload' => 'required|mimes:jpg|max:1024',
        ]);

        $path = $request->file('auto_upload')->store('uploads', 'public');

        return response()->json(['path' => $path]);
    }

    #[NoReturn]
    public function delete(Request $request)
    {
        $filePath = $request->input('path');

        if (! $filePath) {
            return response()->json(['error' => 'No file path provided'], 400);
        }

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);

            return response()->json(['message' => 'File deleted']);
        }

        return response()->json(['error' => 'File not found'], 404);
    }
}
