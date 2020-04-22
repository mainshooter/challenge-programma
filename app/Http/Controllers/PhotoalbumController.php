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
use GuzzleHttp\Client;



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
        else if (!is_null($oAlbum->event)) {
          $oAlbum->event->photoalbum_id = null;
          $oAlbum->event->save();
        }

        Session::flash('message', "Album instellingen zijn succesvol opgeslagen.");
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

    public function publishPrepare(Request $request, $iId) {
      $oAlbum = Photoalbum::find($iId);
      if ($oAlbum->is_published == true) {
        return redirect()->route('photoalbum.edit', $oAlbum);
      }
      if (env('LINKEDIN_SHARE_CLIENT_ID', false)) {
        $request->session()->put('album-id', $oAlbum->id);
        return redirect()->route('linkedin.login');
      }

      return redirect()->route('photoalbum.edit', $oAlbum);
    }

    public function publish(Request $request) {
      if ($request->session()->exists('album-id') && $request->session()->exists('linkedin-token')) {
        $sToken = $request->session()->pull('linkedin-token');
        $iId = $request->session()->pull('album-id');
        $oAlbum = Photoalbum::find($iId);
        $oAlbum->is_published = true;
        $sText = $oAlbum->description . ' bekijk hier het fotoalbum ' . route('photoalbum.photos', $oAlbum->id);
        $sLink = route('photoalbum.photos', $oAlbum->id);
        try {
          $client = new Client(['base_uri' => 'https://api.linkedin.com']);
          $response = $client->request('POST', '/v2/shares', [
              'headers' => [
                  "Authorization" => "Bearer " . $sToken,
                  "Content-Type"  => "application/json",
                  "x-li-format"   => "json"
              ],
              'owner' => 'urn:li:organization:43351756',
              'content' => [
                'title' => $oAlbum->title,
                'subject' => $oAlbum->title,
                'text' => [
                  'text' => $sText,
                ]
              ]
          ]);
          $oAlbum->save();
          Session::flash('message', "Album is gepubliceerd");
        } catch (\Exception $e) {
          Session::flash('error', 'Het is niet gelukt het album te publiseren naar linkedin');
        }

        return redirect()->route('photoalbum.edit', $oAlbum);
      }

      return redirect()->route('photoalbum.index');
    }
}
