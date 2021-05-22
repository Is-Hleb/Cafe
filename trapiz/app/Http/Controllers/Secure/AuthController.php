<?php

namespace App\Http\Controllers\Secure;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthController extends Controller
{

    public function doLogin(Request $request)
    {
        $validated = \validator($request->post(), [
            "email" => "required",
            "password" => "required",
            "_token" => "required"
        ]);

        if (Auth::attempt($request->only("email", "password")) && !$validated->fails()) {
            return Redirect::route("admin.index");
        } else if ($request->post("email") == env("MAIN_ADMIN_EMAIL") && $request->post("password") == env("MAIN_ADMIN_PASSWORD")) {
            $user = new User([
                "name" => "main_admin",
                "role" => "main_admin",
                "email" => env("MAIN_ADMIN_EMAIL"),
                "password" => Hash::make(env("MAIN_ADMIN_PASSWORD")),
            ]);
            Auth::login($user, true);
            return Redirect::route("admin.index");
        }

        return Redirect::route("auth")->withErrors($validated->getMessageBag());
    }


    public function show()
    {
        return view("secure.auth");
    }
}
