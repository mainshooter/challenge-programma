<?php

namespace App\Http\Controllers;

use App\Photoalbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PhotoalbumController extends Controller
{
    public function index()
    {
        $aPhotoalbum = Photoalbum::all();

        return view('photoalbum.index', ['aPhotoalbum' => $aPhotoalbum]);
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

        return view('photoalbum.edit');
    }

    public function editPage()
    {
        return view('photoalbum.index');
    }
}
