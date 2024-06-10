<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductTransactionDetail;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    public function getByUser()
    {
        $data_cart = Cart::where("user_id", auth()->user()->id)->with("product")->get();
        return response()->json([
            "message" => "success get cart",
            "data" => $data_cart,

        ]);
    }
    public function checkout(Request $request)
    {
        $data_cart = Cart::where("user_id", auth()->user()->id)->with("product")->get();
        $data_transaction_detail = TransactionDetail::create([
            'user_id' => auth()->user()->id,
            'total_price' => $request->total_price,
            'pembayaran' => $request->pembayaran,
        ]);
        foreach ($data_cart as $dtc) {

            ProductTransactionDetail::create([
                'product_id' => $dtc->product_id,
                'transaction_detail_id' => $data_transaction_detail->id,
                'qty' => $dtc->qty,
                'total_price' => $dtc->total_price,
            ]);
        }
        return response()->json([
            "message" => "success checkout",
        ]);
    }
    public function addCart(Request $request)
    {
        $get_cart = Cart::where("user_id", auth()->user()->id)->where("product_id", $request->product_id)->first();
        if ($get_cart != null) {
            return response()->json([
                "message" => "product sudah ada di cart",

            ]);
        }

        $data_product = Product::where("id", $request->product_id)->first();

        $data_cart = Cart::create([
            "user_id" => auth()->user()->id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'total_price' => $data_product->price * $request->qty,

        ]);
        return response()->json([
            "message" => "success add cart",
            "data" => $data_cart,

        ]);
    }

    public function delete($id)
    {
        Cart::where("id", $id)->delete();
        return response()->json([
            "message" => "success delete cart",


        ]);
    }
}
