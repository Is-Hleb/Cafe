<?php

namespace App\Http\Controllers\Pages;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use MongoDB\Driver\Session;
use Psy\Util\Json;

class FeedbackController
{
    public static function main(): array
    {
        return [];
    }

    public function postAddReview(Request $request)
    {
        $validator = validator($request->post(), [
            "email" => 'required',
            'name' => 'required',
            'message' => 'required'
        ]);

        if(!Review::where("email", '=', $request->post("email"))->count())
            if(Review::where("ip_address", '=', \Illuminate\Support\Facades\Request::ip())->count() < 5)
                if(!$validator->fails())
                {
                    Review::create([
                        'ip_address' => \Illuminate\Support\Facades\Request::ip(),
                        'email' => $request->post("email"),
                        'name' => $request->post("name"),
                        'message' => $request->post("message")
                    ]);
                }

        return \response("Мы обязательно свяжемся с вами");
    }

}
