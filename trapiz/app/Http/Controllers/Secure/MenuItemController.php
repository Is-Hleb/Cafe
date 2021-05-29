<?php

namespace App\Http\Controllers\Secure;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MenuItemController extends Controller
{
    public function show()
    {
        return view("secure.add_menu_item", ["menu_items" => MenuItem::all()]);
    }

    public function postDeleteMenuItem(Request $request)
    {
        $menu_item = MenuItem::where("id", '=', $request->post("menu_item_id"));
        $menu_item->delete();
        return Redirect::back();
    }

    public function postAddMenuItem(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = validator($request->post(), [
           "name" => "required",
           "_token" => "required",
        ]);

        if($validator->fails())
        {
            return Redirect::route("admin.menu_item")->withErrors($validator->errors())->withInput($request->post());
        }

        MenuItem::create([
           'name' => $request->post("name"),
        ]);

        return Redirect::route("admin.menu_item");
    }
}
