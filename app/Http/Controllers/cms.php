<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class Cms extends Controller
{
    /**
     * Presents a table with all pages
     * @param  Request $request
     */
    public function index(Request $request) {
      $Pages = Page::all();
      return view("cms/index", [
        "Pages" => $Pages,
      ]);
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

    }

    /**
     * All urls are redirected trough here to view the page
     * @param  Request $request
     */
    public function viewPage(Request $request) {

    }
}
