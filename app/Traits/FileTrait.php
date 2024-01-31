<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileTrait
{

    public function fileUpload(string $file, string $path = 'upload/photos'): string
    {
        if($file) {
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $fileName, 'public');
        }
        return $fileName ?? "";
    }


    public function fileDelete(string $filePath): void
    {
        $filePath = storage_path($filePath);
        if (Storage::disk('local')->exists($filePath)) {
            File::delete($filePath);
        }
    }
}
