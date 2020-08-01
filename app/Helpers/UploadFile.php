<?php

namespace App\Helpers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class UploadFile
{
    public static function uploadImg($img, $str, $str_2) {
        $filename = $str . '-' . md5(date('Y-M-D H:i:s')) . '.' . $img->extension();
        $photo = Image::make($img);
        $store = Storage::disk('public');

        $photo->orientate()->encode();
        $store->put($str. '/'. $str_2. '/original/'. $filename, $photo);

        $photoMedium = $photo->resize(300, 300)->orientate()->encode();
        $store->put($str. '/'. $str_2. '/medium/' . $filename, $photoMedium);

        $photoThumb = $photo->resize(100, 100)->orientate()->encode();
        $store->put($str. '/'. $str_2. '/thumb/' . $filename, $photoThumb);

        return $filename;
    }

    public static function uploadOtherImg($img, $str_1, $str_2 = null, $fileName = null) {
        $name = (!empty($fileName)) ? $fileName : $img->getClientOriginalName();
        $photo = Image::make($img)->orientate()->encode();
        if (!empty($str_2)) {
            Storage::disk('public')->put($str_1. '/'. $str_2. '/'. $name, $photo);
        } else {
            Storage::disk('public')->put($str_1. '/'. $name, $photo);
        }
        return $name;
    }

    public static function destroyFile($img, $str, $str_2) {
        $originalPath = $str. '/'. $str_2. '/original/'. $img;
        $mediumPath = $str. '/'. $str_2. '/medium/'. $img;
        $thumbPath = $str. '/'. $str_2. '/thumb/'. $img;
        if (file_exists($originalPath) && file_exists($mediumPath) && file_exists($thumbPath)) {
            Storage::disk('public')->delete($originalPath);
            Storage::disk('public')->delete($mediumPath);
            Storage::disk('public')->delete($thumbPath);
        }
    }

    public static function destroyOtherFile($img, $str_1, $str_2 = null) {
        if (!empty($str_2)) {
            $path = $str_1. '/'. $str_2. '/'. $img;
        } else {
            $path = $str_1. '/'. $img;
        }
        if (file_exists($path))
            Storage::disk('public')->delete($path);
    }
}
