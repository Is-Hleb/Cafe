<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Pages\BookingController;
use App\Http\Controllers\Pages\ContactsController;
use App\Http\Controllers\Pages\FeedbackController;
use App\Http\Controllers\Pages\HeaderController;
use App\Http\Controllers\Pages\MenuController;
use App\Http\Controllers\Pages\NoveltyController;
use App\Http\Controllers\Pages\PromotionController;

class IndexController extends Controller
{

    public function show()
    {
        $data = [];
        $data["header"] = HeaderController::main();
        $data["booking"] = BookingController::main();
        $data["contacts"] = ContactsController::main();
        $data["feedback"] = FeedbackController::main();
        $data["menu"] = MenuController::main();
        $data["novelty"] = NoveltyController::main();
        $data["promotion"] = PromotionController::main();
        return view("index", $data);
    }
}
