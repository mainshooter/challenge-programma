<?php


namespace App\Http\Controllers;

use App\Image;

class ImageController
{
    public function index() {
        return view('Image/image');
    }
    public function store(Request $request) {
        $this->validate($request, [
            'filepath' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('filepath')) {
            $filenameWithExt = $request->file('filepath')->getClientOriginalImage();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('filepath')->getOriginalClientExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('filepath')->storeAs('public/images', $filenameToStore);
        }
        else {
            $filenameToStore = 'noimage.jpg';
        }

        $image = new image;
        $image->filepath = $filenameToStore;

        return view('Image/image');
    }
}
