<?php

namespace App\Http\Controllers;

use App\Photoalbum;
use App\ImageFromAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PhotoalbumController extends Controller
{
    public function index()
    {
        $aPhotoalbum = Photoalbum::all();

        return view('photoalbum.index', ['aPhotoalbum' => $aPhotoalbum]);
    }

    public function overview() {
      $aPhotoalbums = Photoalbum::all();
      return view('photoalbum.overview', ['aPhotoalbums' => $aPhotoalbums]);
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

        $sPath =  public_path() .  '/storage/photoalbum/' . $request->title;
        if (!File::isDirectory($sPath)) {
            File::makeDirectory($sPath, 0777, true, true);
        }

        return redirect()->route('photoalbum.edit', ['id' => $oPhotoalbum->id] );
    }

    public function editPage($iId)
    {
        $oAlbum = Photoalbum::find($iId);

        return view('photoalbum.edit', ['oPhotoalbum' => $oAlbum]);
    }

    public function storePhotoPage(Request $request, Photoalbum $oPhotoalbum) {
      return view('photoalbum/photo/create', [
        'oPhotoalbum' => $oPhotoalbum,
      ]);
    }

    public function storePhoto(Request $request, $iId){
        $this->validate($request, [
            'path' => 'image|max:10000',
            'page_content' => 'string|nullable|min:1',
        ]);

        $oAlbum = Photoalbum::find($iId);

        if (is_null($oAlbum)) {
          return redirect()->route('photoalbum.index');
        }

        $oImage = new ImageFromAlbum();

        $oUpload = $request->file('path');
        $sPath = $oUpload->store('public/photoalbum/'.$oAlbum->title);
        $oImage->path = $sPath;
        $oImage->photoalbum_id = $iId;
        $oImage->save();

        return view('photoalbum.edit', ['oPhotoalbum' => $oAlbum]);
    }
}
