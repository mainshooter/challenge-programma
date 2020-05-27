<?php

namespace App\Http\Controllers;

use App\Photoalbum;
use App\ImageFromAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Event;
use GuzzleHttp\Client;



class PhotoalbumController extends Controller
{
    public function index(Request $request)
    {
        $sSortType = $request->selectSort;

        if($sSortType == "dateNew") {
            $aPhotoalbum = Photoalbum::with('event')->get()->sortBy('event.event_start_date_time', null, true);
        }
        else if($sSortType == "dateOld") {
            $aPhotoalbum = Photoalbum::with('event')->get()->sortBy('event.event_start_date_time', null, false);
        }
        else {
            $aPhotoalbum = Photoalbum::all();
        }
        return view('photoalbum.index', ['aPhotoalbum' => $aPhotoalbum, 'sSortType' => $sSortType]);
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
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'event' => ['nullable', 'exists:event,id'],
        ]);

        $oPhotoalbum = new Photoalbum();
        $oPhotoalbum->name = $request->name;
        $oPhotoalbum->description = $request->description;
        $oPhotoalbum->save();

        $oEvent = Event::find($request->event);
        if (!is_null($oEvent)) {
          $oEvent->photoalbum_id = $oPhotoalbum->id;
          $oEvent->save();
        }

        $sPath =  public_path() .  '/storage/photoalbum/' . $oPhotoalbum->id;
        if (!File::isDirectory($sPath)) {
            File::makeDirectory($sPath, 0755, true, true);
        }

        Session::flash('message', 'Fotoalbum is aangemaakt');
        return redirect()->route('photoalbum.edit', ['id' => $oPhotoalbum->id]);
    }

    public function editPage($iId) {
        $oAlbum = Photoalbum::find($iId);

        $aEvents = Event::where('is_accepted', true)->where('photoalbum_id', NULL)->get();

        if ($oAlbum->photos->isEmpty()) {
            return view('photoalbum.edit.edit-no-photos',
            [
              'oPhotoalbum' => $oAlbum,
              'aEvents' => $aEvents,
            ]);
        } else {
            return view('photoalbum.edit.edit', [
              'oPhotoalbum' => $oAlbum,
              'aEvents' => $aEvents,
            ]);
        }
    }

    public function storePhoto(Request $request, $iId) {
        $this->validate($request, [
            'image' => 'image|max:10000|required',
            'page_content' => 'string|nullable|min:1',
        ]);

        $oImage = new ImageFromAlbum();
        $oAlbum = Photoalbum::find($iId);

        if (is_null($oAlbum)) {
            return redirect()->route('photoalbum.index');
        }

        $oUpload = $request->file('image');
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
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'event' => ['nullable', 'exists:event,id'],
        ]);
        $oAlbum = Photoalbum::find($iId);

        if (is_null($oAlbum)) {
            return redirect()->route('photoalbum.index');
        }

        $oAlbum->name = $request->name;
        $oAlbum->description = $request->description;
        $oAlbum->save();

        $oEvent = Event::find($request->event);
        if (!is_null($oEvent)) {
          $oEvent->photoalbum_id = $oAlbum->id;
          $oEvent->save();
        }
        else if (!is_null($oAlbum->event)) {
          $oAlbum->event->photoalbum_id = null;
          $oAlbum->event->save();
        }

        Session::flash('message', "Album instellingen zijn succesvol opgeslagen.");
        return redirect()->route('photoalbum.edit', ['id' => $oAlbum->id]);
    }

    public function deleteAlbum(Request $request, Photoalbum $oPhotoalbum) {
      $aPhotos = $oPhotoalbum->photos;
      foreach ($aPhotos as $oPhoto) {
        Storage::disk('public')->delete($oPhoto->path);
        $oPhoto->delete();
      }
      $oPhotoalbum->delete();
      Session::flash('message', "Fotoalbum is verwijderd");
      return redirect()->route('photoalbum.overview');
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
                Session::flash('message', "De foto is verwijderd!");
            }
        } else {
            $oImage->delete();
            Session::flash('message', "De foto is verwijderd!");
        }

        return redirect()->route('photoalbum.edit', ['id' => $oImage->photoalbum_id]);
    }

    public function editPhotoPage(ImageFromAlbum $oImage) {
      return view('photoalbum.photo.edit', [
        'oImage' => $oImage,
      ]);
    }

    public function editPhoto(Request $request, ImageFromAlbum $oImage) {
      $this->validate($request, [
          'page_content' => 'string|nullable|min:1',
      ]);

      $oImage->description = $request->page_content;
      $oImage->save();
      return redirect()->route('photoalbum.edit', $oImage->photoalbum);
    }

    public function photoCollection(Request $request, $iId) {
        $oAlbum = Photoalbum::find($iId);

        return view('photoalbum.photos', ['oAlbum' => $oAlbum]);
    }
}
