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

    // $fullFilePath = '/storage/' .  $folderName . '/'. $fileName;
    // /なしでedit表示　update表示されない

}
