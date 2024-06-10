<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailApiController extends Controller
{
    public function getByUser()
    {
        $data_transaction_detail = TransactionDetail::where("user_id", auth()->user()->id)->with(["user", "product"])->get();
        return [
            'isSuccess' => true,
            'message' => 'Success Get Transaction Detail',
            'data' => $data_transaction_detail
        ];
    }

    public function create(Request $request)
    {

        $data_product = Product::where("id", $request->product_id)->first();



        $data_transaction_detail = TransactionDetail::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id,
            'qty' => $request->qty,
            'total_price' => $request->total_price,
            'pembayaran' => $request->pembayaran,
        ]);

        $data_product->update([
            "qty" => $data_product->qty + $request->qty,
            "stock" => $data_product->stock - $request->qty,
        ]);

        return [
            'isSuccess' => true,
            'message' => 'Success Create Transaction Detail',
            'data' => $data_transaction_detail
        ];
    }
}
