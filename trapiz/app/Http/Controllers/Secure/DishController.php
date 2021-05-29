<?php

namespace App\Http\Controllers\Secure;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    public function show()
    {
        return view("secure.add_dish", ['menu_items' => MenuItem::all(), 'dish' => Dish::all()]);
    }

    public function postAddDish(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'is_promotion' => 'required',
            "menu_item_id" => "required",
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $file_name = $request->post("name") . "." . $request->file("image")->getClientOriginalExtension();
        $request->file("image")->storeAs("dish_images", $file_name, "public_uploads");

        Dish::create([
            'menu_item_id' => $request->post("menu_item_id"),
            'description' => $request->post("description"),
            'price' => $request->post('price'),
            'image_url' => $file_name,
            'name' => $request->post("name"),
        ]);

        return Redirect::back();
    }

    public function postDeleteDish(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $id = $request->post('id');

        $dish = Dish::findOrFail($id);

        Storage::disk("public")->delete("dish_images/".$dish->image_url);
        $dish->delete();

        return Redirect::back();

    }

}
