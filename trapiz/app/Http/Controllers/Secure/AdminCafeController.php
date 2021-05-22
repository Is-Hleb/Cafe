<?php

namespace App\Http\Controllers\Secure;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminCafeController extends Controller
{

    public function postDeleteCafe(Request $request): \Illuminate\Http\RedirectResponse
    {
        $restaurant = Restaurant::where("id", $request->post("restaurant_id"));
        $restaurant->delete();
        return Redirect::route("admin.cafe");
    }

    public function postAddCafe(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = \validator($request->post(), [
            "address" => "required",
            "name" => "required",
            "password" => "required",
            "phone" => "required",
            "_token" => "required",
            "email" => "required",
        ]);

        if ($validator->fails())
            return Redirect::route("admin.cafe")->withErrors($validator->errors())->withInput($request->post());

        $data = $request->post();

        if(User::where("email", '=', $data['email'])->count() > 0)
            return Redirect::route("admin.cafe")->withInput($request->post());

        $restaurant = Restaurant::create([
            "address" => $data["address"],
            "phone" => $data["phone"],
        ]);

        $new_admin = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"]),
            "restaurant_id" => $restaurant->id,
            "role" => "admin",
        ]);

        return Redirect::back();

    }

    public function show()
    {
        return view("secure.admin_cafe", ['restaurants' => Restaurant::all()]);
    }
}
