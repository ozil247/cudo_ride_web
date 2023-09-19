<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HelperController extends Controller
{
    public static function uploadFile($file, $type, $location = 'files')
    {
        // $file = str_replace('data:image/png;base64,', '', $file);
        $file = str_replace(' ', '+', $file);
        $imageName =  time() .'-'. $type . '.' . 'pdf';

        \File::put(storage_path() . '/app/public/'.$location.'/' . $imageName, base64_decode($file));

        return "/storage/files/$imageName";
    }


    public static function uploadImage($file, $type, $location = 'images')
    {
        $image = $file;
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName =  \Str::slug(Auth::user()->name) .'-'. $type . '.' . 'png';

        \File::put(storage_path() . '/app/public/'.$location.'/' . $imageName, base64_decode($image));

        return "/storage/images/$imageName";
    }
}
