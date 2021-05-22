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
Route::get("/login", [\App\Http\Controllers\Secure\AuthController::class, "show"])->name("auth");
Route::post("/do/login", [\App\Http\Controllers\Secure\AuthController::class, "doLogin"])->name("doLogin");
Route::post("/feedback", [\App\Http\Controllers\Pages\FeedbackController::class, "postAddReview"])->name("post_add_review");
Route::post("/reservation/add", [\App\Http\Controllers\Pages\BookingController::class, "postAddReservation"])->name("post_add_reservation");


Route::group(["middleware" => "admin", "as" => "admin.", "prefix" => "/secure"], function() {

    Route::get("/", [\App\Http\Controllers\Secure\AdminIndexController::class, "show"])->name("index");
    Route::get("/logout", [\App\Http\Controllers\Secure\AdminIndexController::class, "logout"])->name("logout");

    Route::get("/cafe/add", [\App\Http\Controllers\Secure\AdminCafeController::class, "show"])->name("cafe")->middleware("main_admin");
    Route::post("/post/cafe/add", [\App\Http\Controllers\Secure\AdminCafeController::class, "postAddCafe"])->name("post_add_cafe")->middleware("main_admin");
    Route::post("/post/cafe/delete", [\App\Http\Controllers\Secure\AdminCafeController::class, "postDeleteCafe"])->name('post_delete_cafe')->middleware("main_admin");

    Route::get("/courier/add", [\App\Http\Controllers\Secure\CourierController::class, "showAddForm"])->name("add_courier")->middleware("only_admin");
    Route::post("/post/courier/add", [\App\Http\Controllers\Secure\CourierController::class, "postAddCourier"])->name("post_add_courier")->middleware("only_admin");
});


