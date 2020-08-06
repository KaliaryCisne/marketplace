<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function removePhoto(Request $request)
    {

        $photo_name = $request->get('photoName');
        //Remove photo from disk
        if(Storage::disk('public')->exists($photo_name)) {
            Storage::disk('public')->delete($photo_name);
        }

        //Remove image from database
        $remove_photo = ProductPhoto::where('image', $photo_name);
        $remove_photo->delete();


    }
}
