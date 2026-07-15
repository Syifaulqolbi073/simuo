<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaService
{
    /**
     * Upload File
     */
    public function upload(
        UploadedFile $file,
        string $directory
    ): array {

        $filename = (string) Str::ulid().'.'.$file->getClientOriginalExtension();

        $path = $file->storeAs(
            "questions/{$directory}",
            $filename,
            'public'
        );

        return [

            'file_name' => $file->getClientOriginalName(),

            'file_path' => $path,

            'mime_type' => $file->getMimeType(),

            'file_size' => $file->getSize(),

        ];

    }

    /**
     * Delete File
     */
    public function delete(
        string $path
    ): void {

        Storage::disk('public')->delete($path);

    }
}