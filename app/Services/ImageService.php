<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    public static function upload($imageFile, $folderName)
    {
        $fileName = uniqid(rand() . '_') . '.' . $imageFile->getClientOriginalExtension();

        // リサイズ（例: 幅1920px、高さ自動）
        $resizedImage = Image::make($imageFile)
                            ->resize(1920, null, function ($constraint) {
                                $constraint->aspectRatio(); // アスペクト比を保つ
                                $constraint->upsize(); // 小さい画像を無理に拡大しない
                            })
                            ->encode(); // バイナリにエンコード

        // 保存（バイナリをputで保存）
        Storage::put('public/' . $folderName . '/' . $fileName, $resizedImage);

        return '/storage/' . $folderName . '/' . $fileName;
    }
}
