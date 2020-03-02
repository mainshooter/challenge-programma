<?php


namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController
{
    public function index() {
        return view('Image/image');
    }
    public function store(Request $request) {
        // $request->validate($request, [
        //     'filepath' => 'file|required'
        // ]);

        // Handle File Upload
        // if($request->hasFile('filepath')) {
          $file = $request->file('photo');
          dd($file);
            // $filenameWithExt = $request->file('filepath')->getClientOriginalImage();
            // $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // $extension = $request->file('filepath')->getOriginalClientExtension();
            // $filenameToStore = $filename.'_'.time().'.'.$extension;
            // $path = $request->file('filepath')->storeAs('public/images', $filenameToStore);
        // }
        // else {
            // $filenameToStore = 'noimage.jpg';
        // }

        $image = new image;
        $image->filepath = $filenameToStore;

        return redirect()->route('image.index');
    }
}
