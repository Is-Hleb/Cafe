<?php

namespace App\Http\Controllers\Secure;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FeedbackController extends Controller
{
    public function show()
    {
        return view("secure.feedback", ["reviews" => Review::all()]);
    }

    public function postDeleteFeedback(Request $request)
    {
        $request->validate(['id' => 'required']);

        $review = Review::findOrFail($request->post('id'));
        $review->delete();

        return Redirect::back();
    }
}
