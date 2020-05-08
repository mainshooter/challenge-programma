<?php


namespace App\Http\Controllers;

use App\Image;
use http\Message;
use Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ImageController
{
    use ValidatesRequests;

    public function index() {
        $aImages = Image::all();
        return view('image/image', ['images', $aImages]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'filepath' => 'image|max:10000'
        ]);
        
        $oImage = new Image();
        $oUpload = $request->file('filepath');
        $sPath = $oUpload->store('public');
        $oImage->filepath = $sPath;
        $oImage->name = $oUpload->getClientOriginalName();
        $oImage->save();
        Session::flash('message', 'Image is geupload!');
        return redirect()->route('image.index');
    }
}
