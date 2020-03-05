<?php


namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ImageController
{
    use ValidatesRequests;

    public function index() {
        return view('Image/image');
    }
    public function store(Request $request) {
         $this->validate($request, [
            'filepath' => 'image|nullable|max:1999'
         ]);

         $filename = null;
         $filepath = null;

         // Handle File Upload
         if($request->hasFile('filepath')) {
             // Get filename with the extension
             $filenameWithExt = $request->file('filepath')->getClientOriginalName();
             // Get just filename
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
             // Get just the extension
             $extension = $request->file('filepath')->getClientOriginalExtension();
             // Filename to store
             $fileNameToStore = $filename.'_'.time().'.'.$extension;
             // Upload image
             $path = $request->file('filepath')->storeAs('public/images', $fileNameToStore);
         }
         else {
             $fileNameToStore = 'noimage.jpg';
         }

        $image = new Image;
        $image->name = $filename;
        if($request->hasFile('filepath')) {
            $image->filepath = $fileNameToStore;
        }
        $image->save();

        return redirect()->route('image.index');
    }
}
