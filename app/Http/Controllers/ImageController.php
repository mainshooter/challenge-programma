<?php


namespace App\Http\Controllers;

use App\Image;
use http\Message;
use Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Storage;

class ImageController
{
    use ValidatesRequests;

    public function index()
    {
        $aImages = Image::all();

        return view('image/image', [
            'aImages' => $aImages
        ]);
    }

    public function store(Request $request)
    {
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

    public function delete(Request $request, $iId)
    {
        $oImage = Image::find($iId);

        if (is_null($oImage)) {
            return redirect()->route('image.index');
        }

        $sPath =  str_replace('/public', '', $oImage->filepath);

        if (Storage::disk('public')->exists($sPath)) {
            Storage::disk('public')->delete($sPath);
        }

        $oImage->delete();
        Session::flash('message', "De foto is verwijderd!");

        return redirect()->route('image.index');
    }
}
