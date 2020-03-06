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
        $image = new Image();

        if($request->hasFile('filepath')) {
            $file = $request->file('filepath');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage', $filename);
            $image->filepath = $filename;
        }
        else {
            $image->filepath = 'NoImage';
            return $request;
        }

        $image->save();

        return view('Image/image')->with('image',$image);
    }

}
