<?php

namespace App\Http\Controllers\Secure;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function show()
    {
        $restaurant = Restaurant::where('id', '=', Auth::user()->restaurant_id)->first();
        return view("secure.booking", ['reservations' => $restaurant->reservations]);
    }

    public function postDeleteReview(Request $request): \Illuminate\Http\RedirectResponse
    {
        $reservation = Reservation::findOrFail($request->id);
        $reservation->delete();
        return Redirect::back();
    }

}
