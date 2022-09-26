<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

if (!function_exists('anyTypeFileUpload')) {
    function anyTypeFileUpload($inputFile, $folderName): string
    {
        $fileName = date('Ymd') . time() . '.' . $inputFile->extension();
        $inputFile->move(storage_path('app/public/' . $folderName), $fileName);
        return $fileName;
    }
}

if (!function_exists('imageUploadWithCustomSize')) {
    function imageUploadWithCustomSize($fileName, $width, $height, $folderName)
    {

        // make unique name
        $currentDate = Carbon::now()->toDateString();
        $imageName = time() . '.' . $fileName->getClientOriginalExtension();

        if (!Storage::disk('public')->exists($folderName)) {
            Storage::disk('public')->makeDirectory($folderName);
        }
        $postImage = Image::make($fileName)->resize($width, $height)->stream();
        Storage::disk('public')->put($folderName . '/' . $imageName, $postImage);
        return $imageName;
    }
}

