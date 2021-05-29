<?php

namespace App\Http\Controllers\Pages;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController
{
    public static function main()
    {
        return [
            'promotions' => Promotion::all(),
        ];
    }
}
