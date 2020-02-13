<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Page;

class Cms extends Controller
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

    public function editPage(Request $request, $iId) {
      $oPage = Page::find($iId);
      if (is_null($oPage)) {
        return redirect()->route("cms.index");
      }
      return view("cms/edit", [
        "oPage" => $oPage,
      ]);
    }

    public function edit(Request $request, $iId) {
      $oPage = Page::find($iId);
      if (is_null($oPage)) {
        return redirect()->route("cms.index");
      }

      $oPage->title = $request->page_title;
      $oPage->slug = $request->url_slug;
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
      $sTitle = $request->page_title;
      $sSlug = $request->url_slug;
      $sContent = $request->page_content;
      // replace non letter or digits by -
      $sSlug = preg_replace('~[^\pL\d]+~u', '-', $sSlug);

      // transliterate
      $sSlug = iconv('utf-8', 'us-ascii//TRANSLIT', $sSlug);

      // remove unwanted characters
      $sSlug = preg_replace('~[^-\w]+~', '', $sSlug);

      // trim
      $sSlug = trim($sSlug, '-');

      // remove duplicate -
      $sSlug = preg_replace('~-+~', '-', $sSlug);

      // lowercase
      $sSlug = strtolower($sSlug);

      $oPage = new Page();
      $oPage->title = $sTitle;
      $oPage->slug = $sSlug;
      $oPage->content = $sContent;

      $oPage->save();

      return redirect()->route("cms.index");
    }

    /**
     * All urls are redirected trough here to view the page
     * @param  Request $request
     */
    public function viewPage(Request $request, $slug) {
      $oPage = Page::where('slug', $slug)->first();
      if (is_null($oPage)) {

      }
      else {
        return view("cms/page", [
          'title' => $oPage->title,
          'content' => $oPage->content,
        ]);
      }
    }
}
