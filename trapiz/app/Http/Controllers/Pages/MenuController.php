<?php

namespace App\Http\Controllers\Pages;

use App\Models\Dish;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController
{
    public static function main()
    {
        return [
            'menu_items' => MenuItem::all(),
            'dish' => Dish::all(),
        ];
    }
}
