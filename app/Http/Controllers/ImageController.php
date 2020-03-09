<?php


namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ImageController
{
    use ValidatesRequests;

    public function index() {
        $images = Image::all();
        return view('Image/image', ['images', $images]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'filepath' => 'image|max:10000'
        ]);
        $image = new Image();

        $oUpload = $request->file('filepath');
        $sPath = $oUpload->store('public');
        $image->filepath = $sPath;
        $image->name = $oUpload->getClientOriginalName();
        $image->save();
        return redirect()->route('image.index');
    }

}
