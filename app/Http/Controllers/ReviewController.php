<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller {
  
    public function index() {
        $aReviews = Review::all();

        $nRating = 0;
        if (count($aReviews) > 0) {
            foreach ($aReviews as $review) {
                $nRating += $review->rating;
            }
            $nRating = round($nRating / count($aReviews));
        }
        return view('review/index', ['aReviews' => $aReviews, 'avgRating' => $nRating]);
    }

    public function ratingsHighLow()
    {
        $aReviews = Review::orderBy('rating', 'desc')->get();
        $nRating = 0;
        if (count($aReviews) > 0) {
            foreach ($aReviews as $review) {
                $nRating += $review->rating;
            }
            $nRating = round($nRating / count($aReviews));
        }
        return view('review/index', ['aReviews' => $aReviews, 'avgRating' => $nRating]);
    }

    public function ratingsLowHigh()
    {
        $aReviews = Review::orderBy('rating', 'asc')->get();
        $nRating = 0;
        if (count($aReviews) > 0) {
            foreach ($aReviews as $review) {
                $nRating += $review->rating;
            }
            $nRating = round($nRating / count($aReviews));
        }
        return view('review/index', ['aReviews' => $aReviews, 'avgRating' => $nRating]);
    }

    public function addReviewPage() {
      return view('review/add');
    }

    public function addReview(Request $request) {
      $validateData = $request->validate([
          'page_content' => 'required|max:255',
          'review_stars' => 'required|integer',
      ]);
      $sContent = $request->page_content;
      $oUser = Auth::user();
      $oReview = new Review();
      $oReview->body = $sContent;
      $oReview->rating = $request->review_stars;
      $oReview->company()->associate($oUser);
      $oReview->save();
      return redirect()->route("event.index");
    }
}
