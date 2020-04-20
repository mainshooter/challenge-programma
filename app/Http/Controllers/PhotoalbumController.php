<?php

namespace App\Http\Controllers;

use App\Photoalbum;
use App\ImageFromAlbum;
use Illuminate\Http\Request;
use LinkedinShare;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Event;



class PhotoalbumController extends Controller
{
    public function index() {
        $aPhotoalbum = Photoalbum::all();

        $oUser = Auth::user();

        return view('photoalbum.index', ['aPhotoalbum' => $aPhotoalbum, 'oUser' => $oUser]);
    }

    public function createPhotoalbumPage(Request $request) {
        $aEvents = Event::where('is_accepted', true)->where('photoalbum_id', NULL)->get();
        return view('photoalbum.create', [
          'aEvents' => $aEvents,
        ]);
    }

    public function overview()
    {
        $aPhotoalbums = Photoalbum::all();
        return view('photoalbum.overview', ['aPhotoalbums' => $aPhotoalbums]);
    }

    public function create(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'event' => ['nullable', 'exists:event,id'],
        ]);

        $oPhotoalbum = new Photoalbum();
        $oPhotoalbum->title = $request->title;
        $oPhotoalbum->description = $request->description;
        $oPhotoalbum->save();

        $oEvent = Event::find($request->event);
        if (!is_null($oEvent)) {
          $oEvent->photoalbum_id = $oPhotoalbum->id;
          $oEvent->save();
        }

        $sPath =  public_path() .  '/storage/photoalbum/' . $oPhotoalbum->id;
        if (!File::isDirectory($sPath)) {
            File::makeDirectory($sPath, 0777, true, true);
        }

        Session::flash('message', 'Fotoalbum is aangemaakt');
        return redirect()->route('photoalbum.edit', ['id' => $oPhotoalbum->id]);
    }

    public function editPage($iId) {
        $oAlbum = Photoalbum::find($iId);
        $aImages = $oAlbum->photos;

        $aEvents = Event::where('is_accepted', true)->where('photoalbum_id', NULL)->get();

        foreach ($aImages as $image) {
            $image->path = '/storage' . $image->path;
        }

        if ($aImages->isEmpty()) {
            return view('photoalbum.edit.edit-no-photos',
            [
              'oPhotoalbum' => $oAlbum,
              'aEvents' => $aEvents,
            ]);
        } else {
            return view('photoalbum.edit.edit', [
              'oPhotoalbum' => $oAlbum,
              'aImages' => $aImages,
              'aEvents' => $aEvents,
            ]);
        }
    }

    public function storePhoto(Request $request, $iId) {
        $this->validate($request, [
            'path' => 'image|max:10000',
            'page_content' => 'string|nullable|min:1',
        ]);

        $oImage = new ImageFromAlbum();
        $oAlbum = Photoalbum::find($iId);

        if (is_null($oAlbum)) {
            return redirect()->route('photoalbum.index');
        }

        $oUpload = $request->file('path');
        Storage::disk('public')->put('/photoalbum/' . $iId, $oUpload);
        $sPath = '/photoalbum/' . $iId . '/' . $oUpload->hashName();
        $oImage->path = $sPath;
        $oImage->photoalbum_id = $iId;
        $oImage->description = $request->page_content;
        $oImage->save();

        Session::flash('message', "Uw foto is succesvol opgeslagen.");

        return redirect()->route('photoalbum.edit', ['id' => $oAlbum->id]);
    }

    public function editAlbum(Request $request, $iId)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'event' => ['nullable', 'exists:event,id'],
        ]);
        $oAlbum = Photoalbum::find($iId);

        if (is_null($oAlbum)) {
            return redirect()->route('photoalbum.index');
        }

        $oAlbum->title = $request->title;
        $oAlbum->save();

        $oEvent = Event::find($request->event);
        if (!is_null($oEvent)) {
          $oEvent->photoalbum_id = $oAlbum->id;
          $oEvent->save();
        }
        else {
          $oAlbum->event->photoalbum_id = null;
          $oAlbum->event->save();
        }

        Session::flash('message', "Album titel is succesvol opgeslagen.");
        return redirect()->route('photoalbum.edit', ['id' => $oAlbum->id]);
    }

    public function deletePhoto(Request $request, $iId) {
        $oImage = ImageFromAlbum::find($iId);

        if (is_null($oImage)) {
            return redirect()->route('photoalbum.index');
        }

        $sPath =  $oImage->path;

        if (Storage::disk('public')->exists($sPath)) {
            Storage::disk('public')->delete($sPath);
            if (!Storage::disk('public')->exists($sPath)) {
                $oImage->delete();
                Session::flash('message', "De foto is verwijdert!");
            }
        } else {
            $oImage->delete();
            Session::flash('message', "De foto is verwijdert!");
        }

        return redirect()->route('photoalbum.edit', ['id' => $oImage->photoalbum_id]);
    }
}
