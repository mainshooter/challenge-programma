<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function index()
    {
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
}
