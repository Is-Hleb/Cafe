<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Pages\BookingController;
use App\Http\Controllers\Pages\ContactsController;
use App\Http\Controllers\Pages\FeedbackController;
use App\Http\Controllers\Pages\HeaderController;
use App\Http\Controllers\Pages\MenuController;
use App\Http\Controllers\Pages\NoveltyController;
use App\Http\Controllers\Pages\PromotionController;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $data = [];

    public function show()
    {
        $this->data["header"] = HeaderController::main();
        $this->data["booking"] = BookingController::main();
        $this->data["contacts"] = ContactsController::main();
        $this->data["feedback"] = FeedbackController::main();
        $this->data["menu"] = MenuController::main();
        $this->data["novelty"] = NoveltyController::main();
        $this->data["promotion"] = PromotionController::main();
        return view("index", $this->data);
    }
}
