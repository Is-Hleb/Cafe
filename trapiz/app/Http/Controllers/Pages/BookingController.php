<?php

namespace App\Http\Controllers\Pages;

use App\Models\Dish;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Psy\Util\Json;

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

       $selected_menu = json_decode($request->post("selected_menu"));
       $out_menu_string = "";

       foreach ($selected_menu as $el)
       {
           $dish = Dish::find($el->id);
           $dish_name = $dish->name;
           $out_menu_string.=$dish_name.'X'.$el->value.', ';
       }

        if (!$validator->fails()) {
            Reservation::create([
                'name' => $request->post('name'),
                'phone' => $request->post("phone"),
                'email' => $request->post('email'),
                'address' => $request->post('address'),
                'restaurant_id' => $request->post('restaurant_id'),
                'selected_menu' => $out_menu_string,
            ]);
        }
        return response($validator->errors());
    }
}
