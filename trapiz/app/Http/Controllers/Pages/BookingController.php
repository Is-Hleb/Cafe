<?php

namespace App\Http\Controllers\Pages;

use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookingController
{
    public static function main()
    {
        return [
            'restaurants' => Restaurant::all(),
        ];
    }

    public function postAddReservation(Request $request)
    {
        $validator = validator($request->post(), [
            'address' => 'required',
            'name' => 'required:max=50',
            'email' => 'required:max=50',
            'phone' => 'required:max=25',
        ]);

        if (!$validator->fails()) {
            Reservation::create([
                'name' => $request->post('name'),
                'phone' => $request->post("phone"),
                'email' => $request->post('email'),
                'address' => $request->post('address'),
                'restaurant_id' => $request->post('restaurant_id')
            ]);
        }

        return Redirect::route("index");
    }
}
