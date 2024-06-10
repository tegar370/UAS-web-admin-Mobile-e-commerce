<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingApiController extends Controller
{
    public function create(Request $request)
    {

        $get_rating = Rating::where("product_id", $request->product_id)->where("user_id", auth()->user()->id)->first();
        if ($get_rating != null) {
            return response()->json([
                "message" => "anda sudah rating product ini",

            ]);
        }
        Rating::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id,
            'comment' => $request->comment,
            'rate' => $request->rate,
        ]);


        $get_rating_product = Rating::where("product_id", $request->product_id)->get();
        $total_rating = 0;
        foreach ($get_rating_product as $grp) {
            $total_rating += $grp->rate;
        }
        Product::where("id", $request->product_id)->update([
            "total_rating" => $total_rating / count($get_rating_product)
        ]);
        return response()->json([
            "message" => "success rating product",
        ]);
    }
}
