<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function postReview(Request $request){
        $review = Review::create($request->all());
        return redirect()->back();
    }
}
