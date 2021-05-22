<?php

namespace App\Http\Controllers\Secure;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminIndexController extends Controller
{
    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return Redirect::route("index");
    }

    public function show()
    {
        return view("secure.admin_index");
    }
}
