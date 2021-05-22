<?php

namespace App\Http\Controllers\Secure;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class CourierController extends Controller
{
    public function showAddForm()
    {
        return view("secure.add_courier_form");
    }

    public function postAddCourier(Request $request)
    {
        $validator = validator($request->post(), [
           "email" => "required",
           "_token" => "required",
           "password" => "required",
        ]);

        $user = Auth::user();
        $data = $request->only("email", "password", "name");

        if($validator->fails())
            return Redirect::back()->withErrors($validator->errors());

        User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"]),
            "restaurant_id" => $user->restaurant->id,
            "role" => "courier"
        ]);

        return Redirect::route("admin.index");
    }

}
