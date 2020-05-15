<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Photoalbum;


class SearchController extends Controller
{
    public function index(Request $request) {
      $sSearch = $request->search;
      $aResults = [];
      $aResults['event'] = Event::where('name', 'LIKE', '%' . $sSearch . '%')
            ->orWhere('name', 'LIKE', '%' . $sSearch . '%')->get();
      $aResults['photoalbum'] = Photoalbum::where('name', 'LIKE', '%' . $sSearch . '%')
            ->orWhere('description', '%' . $sSearch . '%')->get();
      return view('search.index', [
        'aResults' => $aResults,
        'sSearch' => $sSearch,
      ]);
    }
}
