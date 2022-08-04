<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImageService
{
    public static function upload($imageFile, $folderName)
    {
        $fileName =$imageFile->getClientOriginalName();//file名取得
        Storage::putFileAs('public/' . $folderName, $imageFile, $fileName);
        $fullFilePath = '/storage/' .  $folderName . '/'. $fileName;

        return $fullFilePath;
    }
}

		//InterventionImage

        // if (is_array($imageFile)) {
        //     $file = $imageFile['image'];
        // } else {
        //     $file = $imageFile;
        // }

        // $fileName = uniqid(rand(). '_');
        // $extension = $file->extension();
        // $fileNameToStore = $fileName. '.' . $extension;
        // $resizedImage = InterventionImage::make($file)->resize(1920, 1080)->encode();

        // Storage::put('public/' . $folderName . '/' .$fileNameToStore, $resizedImage);

        // return $fileNameToStore;
