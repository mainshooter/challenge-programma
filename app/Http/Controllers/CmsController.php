<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Page;

class CmsController extends Controller
{
    /**
     * Presents a table with all pages
     * @param  Request $request
     */
    public function index(Request $request) {
      $aPages = Page::all();
      return view("cms/index", [
        "Pages" => $aPages,
      ]);
    }

    /**
     * Presents the view to edit the page
     * @param  Request $request [description]
     * @param  int  $iId        The id of the page you want to edit
     */
    public function editPage(Request $request, $iId) {
      $oPage = Page::find($iId);
      if (is_null($oPage)) {
        return redirect()->route("cms.index");
      }
      return view("cms/edit", [
        "oPage" => $oPage,
      ]);
    }

    /**
     * Updates the changes to the page based on new edits
     * @param  Request $request [description]
     * @param  int  $iId        id of the page
     */
    public function edit(Request $request, $iId) {
      $validateData = $request->validate([
        'page_title' => 'required|max:255',
        'url_slug' => 'required|max:100',
        'page_content' => 'required',
      ]);

      $oPage = Page::find($iId);
      if (is_null($oPage)) {
        return redirect()->route("cms.index");
      }

      $oPage->title = $request->page_title;
      $oPage->slug = slugify($request->url_slug);
      $oPage->content = $request->page_content;

      $oPage->save();

      return redirect()->route("cms.index");
    }

    /**
     * Get method to view create page
     * @param  Request $request
     */
    public function createPage(Request $request) {
      return view("cms/create");
    }

    /**
     * Post method to handle post request to create page
     * @param  Request $request
     */
    public function create(Request $request) {
      $validateData = $request->validate([
        'page_title' => 'required|max:255',
        'url_slug' => 'required|max:100',
        'page_content' => 'required',
      ]);
      $sTitle = $request->page_title;
      $sSlug = slugify($request->url_slug);
      $sContent = $request->page_content;
      // replace non letter or digits by -


      $oPage = new Page();
      $oPage->title = $sTitle;
      $oPage->slug = $sSlug;
      $oPage->content = $sContent;

      $oPage->save();

      return redirect()->route("cms.index");
    }

    /**
     * Deletes the page if it exists
     * @param  Request $request
     * @param  int  $iId        Id of the page
     */
    public function delete(Request $request, $iId) {
      $oPage = Page::find($iId);

      if (!is_null($oPage)) {
        $oPage->delete();
      }
      return redirect()->route("cms.index");
    }

    /**
     * All urls are redirected trough here to view the page
     * @param  Request $request
     */
    public function viewPage(Request $request, $slug) {
      $oPage = Page::where('slug', $slug)->first();
      if (is_null($oPage)) {
        abort(404);
      }
      else {
        return view("cms/page", [
          'title' => $oPage->title,
          'content' => $oPage->content,
        ]);
      }
    }
}
