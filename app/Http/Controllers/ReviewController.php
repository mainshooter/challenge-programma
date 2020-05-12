<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function index(Request $request)
    {
        $sSortType = $request->selectSort;

        if ($sSortType == "highlow") {
            $aReviews = Review::orderBy('rating', 'desc')->get();
        } else if ($sSortType == 'lowhigh') {
            $aReviews = Review::orderBy('rating', 'asc')->get();
        } else {
            $aReviews = Review::all();
        }

        $nRating = 0;
        if (count($aReviews) > 0) {
            foreach ($aReviews as $review) {
                $nRating += $review->rating;
            }
            $nRating = round($nRating / count($aReviews));
        }
        return view('review/index', ['aReviews' => $aReviews, 'avgRating' => $nRating, 'sSortType'=> $sSortType]);
    }

    public function addReviewPage()
    {
        return view('review/add');
    }

    public function overview() {
      $aReviews = Review::all();
      return view('review.overview', [
        'aReviews' => $aReviews,
      ]);
    }

    public function addReview(Request $request)
    {
        $request->validate([
            'page_content' => 'required|max:255|min:12',
            'review_stars' => 'required|integer',
        ]);
        $oUser = Auth::user();
        $oReview = new Review();
        $oReview->body = $request->page_content;
        $oReview->rating = $request->review_stars;
        $oReview->company()->associate($oUser);
        $oReview->save();
        return redirect()->route("reviews.index");
    }

    public function deletePage(request $request, $iId) {
        $oReview = Review::find($iId);
        return view("review.delete", ["oReview" => $oReview]);
    }

    public function deleteReview(Request $request, $iId) {
        $oReviewDelete = Review::find($iId);
        if (!is_null($oReviewDelete)) {
            $oReviewDelete->delete();
        }

        return redirect()->route("review.overview");
    }
}
