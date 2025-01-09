<?php
namespace App\ulits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class Imagemanger {

    // public static function  UploadSingleImage($request){
    //     $file = $request->logo;
    //     $imageName = Str::uuid() . time() . $file->getClientOriginalExtension();
    //     $path = $file->storeAs('/', $imageName, ['disk' => 'brands']);
    //     return $path;
    // }
    public static function  UploadSingleImage($image,$disk){
        if (File::exists(public_path($image))) {
            File::delete(public_path( $image));
        }
        $file = $image;
        $imageName = Str::uuid() . time() . $file->getClientOriginalExtension();
        $path = $file->storeAs('/', $imageName, ['disk' => $disk]);
        return $path;
    }

    public static function RemovesingleImage($image){
        if (File::exists(public_path($image))) {
            File::delete(public_path($image));
        }
    }
}
