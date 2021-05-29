<?php

namespace App\Http\Controllers\Pages;

use App\Models\Dish;
use Illuminate\Http\Request;

class NoveltyController
{
    public static function main()
    {
        return [
            'promotion_dish' => Dish::where("is_promotion", '=', true)->get(),
        ];
    }
}
