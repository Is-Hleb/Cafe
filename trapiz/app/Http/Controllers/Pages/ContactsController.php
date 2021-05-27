<?php

namespace App\Http\Controllers\Pages;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class ContactsController
{
    public static function main()
    {
        return [
            'restaurants' => Restaurant::all(),
            'main_admin' => User::where("restaurant_id", '=', '0')->first(),
        ];
    }
}
