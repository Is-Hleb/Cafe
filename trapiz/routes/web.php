<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [\App\Http\Controllers\IndexController::class, "show"])->name("index");
Route::get("/login", [\App\Http\Controllers\Secure\AuthController::class, "show"])->name("auth")->middleware("guest");
Route::post("/do/login", [\App\Http\Controllers\Secure\AuthController::class, "doLogin"])->name("doLogin");
Route::post("/feedback", [\App\Http\Controllers\Pages\FeedbackController::class, "postAddReview"])->name("post_add_review");
Route::post("/reservation/add", [\App\Http\Controllers\Pages\BookingController::class, "postAddReservation"])->name("post_add_reservation");


Route::group(["middleware" => "auth", "as" => "admin.", "prefix" => "/secure"], function() {

    Route::get("/", [\App\Http\Controllers\Secure\AdminIndexController::class, "show"])->name("index");
    Route::get("/logout", [\App\Http\Controllers\Secure\AdminIndexController::class, "logout"])->name("logout");

    Route::get("/cafe/add", [\App\Http\Controllers\Secure\AdminCafeController::class, "show"])->name("cafe")->middleware("main_admin");
    Route::post("/post/cafe/add", [\App\Http\Controllers\Secure\AdminCafeController::class, "postAddCafe"])->name("post_add_cafe")->middleware("main_admin");
    Route::post("/post/cafe/delete", [\App\Http\Controllers\Secure\AdminCafeController::class, "postDeleteCafe"])->name('post_delete_cafe')->middleware("main_admin");

    Route::get("/courier/add", [\App\Http\Controllers\Secure\CourierController::class, "showAddForm"])->name("add_courier")->middleware("only_admin");
    Route::post("/post/courier/add", [\App\Http\Controllers\Secure\CourierController::class, "postAddCourier"])->name("post_add_courier")->middleware("only_admin");

    Route::get("/menuitems", [\App\Http\Controllers\Secure\MenuItemController::class, "show"])->name("menu_item")->middleware("main_admin");
    Route::post("/post/menuitem/add", [\App\Http\Controllers\Secure\MenuItemController::class, "postAddMenuItem"])->name("post_add_menu_item")->middleware("main_admin");
    Route::post("/post/menuitem/delete", [\App\Http\Controllers\Secure\MenuItemController::class, "postDeleteMenuItem"])->name("post_delete_menu_item")->middleware("main_admin");

    Route::get("/dish", [\App\Http\Controllers\Secure\DishController::class, "show"])->name("dish")->middleware("main_admin");
    Route::post("/post/dish/add", [\App\Http\Controllers\Secure\DishController::class, "postAddDish"])->name("post_add_dish")->middleware("main_admin");
    Route::post("/post/dish/delete", [\App\Http\Controllers\Secure\DishController::class, "postDeleteDish"])->name("post_delete_dish")->middleware("main_admin");

    Route::get("/feedback", [\App\Http\Controllers\Secure\FeedbackController::class, "show"])->name("feedback")->middleware("main_admin");
    Route::post("/post/feedback/delete", [\App\Http\Controllers\Secure\FeedbackController::class, "postDeleteFeedback"])->name("post_delete_feedback")->middleware("main_admin");

    Route::get('/promotion', [\App\Http\Controllers\Secure\PromotionsController::class, 'show'])->name("promotion")->middleware("main_admin");
    Route::post("/post/promotions/add", [\App\Http\Controllers\Secure\PromotionsController::class, 'postAddPromotion'])->name("post_add_promotion")->middleware("main_admin");
    Route::post("/post/promotions/delete", [\App\Http\Controllers\Secure\PromotionsController::class, 'postDeletePromotion'])->name("post_delete_promotion")->middleware("main_admin");


    Route::get("/booking", [\App\Http\Controllers\Secure\BookingController::class, "show"])->name("booking")->middleware("courier");
    Route::post("/review/delete", [\App\Http\Controllers\Secure\BookingController::class, "postDeleteReview"])->name("post_delete_review")->middleware("courier");
});


