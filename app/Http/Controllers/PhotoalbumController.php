<?php

namespace App\Http\Controllers;

use App\Photoalbum;
use App\ImageFromAlbum;
use Illuminate\Http\Request;
use LinkedinShare;
use Illuminate\Support\Facades\File;
use Auth;
use Session;

class PhotoalbumController extends Controller
{
    public function index()
    {
        $aPhotoalbum = Photoalbum::all();

        $oUser = Auth::user();

        return view('photoalbum.index', ['aPhotoalbum' => $aPhotoalbum, 'oUser' => $oUser]);
    }

    public function createPhotoalbumPage(Request $request)
    {
        return view('photoalbum.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description'=>['required', 'string'],
        ]);

        $oPhotoalbum = new Photoalbum();
        $oPhotoalbum->title = $request->title;
        $oPhotoalbum->description = $request->description;
        $oPhotoalbum->save();

        $sPath =  public_path() .  '/storage/photoalbum/' . $oPhotoalbum->id;
        if (!File::isDirectory($sPath)) {
            File::makeDirectory($sPath, 0777, true, true);
        }

        return redirect()->route('photoalbum.edit', ['id' => $oPhotoalbum->id] );
    }

    public function editPage($iId)
    {
        $oAlbum = Photoalbum::find($iId);
        $allImages = ImageFromAlbum::all();
        $aImages = [];
        foreach($allImages as $image){
            if($image->photoalbum_id == $iId){
                $image->path = str_replace('public','/storage',$image->path);
                $aImages[] = $image;
            }
        }
        return view('photoalbum.edit', ['oPhotoalbum' => $oAlbum, 'aImages' => $aImages]);
    }

    public function storePhoto(Request $request, $iId){
        $this->validate($request, [
            'path' => 'image|max:10000'
        ]);

        $oImage = new ImageFromAlbum();
        $oAlbum = Photoalbum::find($iId);
        $oUpload = $request->file('path');

        if(is_null($oAlbum)){
            return redirect()->route('photoalbum.index');
        }

        $sPath = $oUpload->store('public/photoalbum/' . $iId);
        $oImage->path = $sPath;
        $oImage->photoalbum_id = $iId;
        $oImage->save();

        Session::flash('message', "Uw foto is succesvol opgeslagen.");
        return redirect()->route('photoalbum.edit', ['id' => $oAlbum->id] );    
    }
}