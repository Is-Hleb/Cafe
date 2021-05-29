<?php

namespace App\Http\Controllers\Secure;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PromotionsController extends Controller
{
    public function show()
    {
        return view("secure.add_promotion", ['promotions' => Promotion::all()]);
    }

    public function postAddPromotion(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $file_name = $request->post("name") . "." . $request->file("image")->getClientOriginalExtension();
        $request->file("image")->storeAs("promotion_images", $file_name, "public_uploads");

        Promotion::create([
            'description' => $request->post("description"),
            'image_url' => $file_name,
            'name' => $request->post("name"),
        ]);

        return Redirect::back();
    }

    public function postDeletePromotion(Request $request)
    {
        $request->validate(['id' => 'required']);
        $promotion = Promotion::findOrFail($request->post("id"));
        Storage::disk("public")->delete("promotion_images/".$promotion->image_url);
        $promotion->delete();
        return Redirect::back();
    }
}
