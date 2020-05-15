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
      $aResults['photoalbum'] = Photoalbum::white('name', '%' . $sSearch . '%')
            ->orWhere('description', '%' . $sSearch . '%')->get();
    }
}
