<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

trait ImageUploadTrait
{
    public function strReplace($originalString)
    {
        $newString = str_replace(' ', '-', $originalString);
        $fileName = strtolower($newString);
        return $fileName;
    }

    public function getRandomFileName($fileName, $destination)
    {
        $name = $this->strReplace($fileName);
        $randomName = date('Ymdhsi') . '-' . $name;
        $file_name = $destination . '/' . $randomName;
        if (File::exists($file_name)) {
            return $this->getRandomFileName($fileName, $destination);
        }
        return $randomName;
    }

    public function fileUpload($file, $destination)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = $file->getClientOriginalName();
        $filedata = $this->getRandomFileName($fileName, $destination);
        $file->move($destination, $filedata);
        return $filedata;
    }

    public function fileUnlink($file, $destination)
    {
        $path = public_path($destination . '/' . $file);
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
