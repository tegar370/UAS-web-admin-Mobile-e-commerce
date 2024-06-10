<?php

namespace App\Http\Controllers\API;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function getAll()
    {
        $data_product = Product::get();

        return response()->json([
            "message" => "success get all",
            "data" => $data_product
        ]);
    }
    public function getById($id)
    {


        $data_product = Product::where("id", $id)->first();

        return response()->json([
            "message" => "success get by id",
            "data" => $data_product
        ]);
    }
    public function create(Request $request)
    {
        $image_url = UploadFile::upload("product_image", $request->file("image_url"));
        $data_product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'qty' => $request->qty,
            "image_url" => $image_url,
            'total_rating' => 0,
        ]);

        return response()->json([
            "message" => "success create",
            "data" => $data_product
        ]);
    }
    public function delete($id)
    {
        $data_product = Product::where("id", $id)->first();
        if ($data_product->image_url != null) {
            DeleteFile::delete($data_product->image_url);
        }
        $data_product->delete();

        return response()->json([
            "message" => "success delete",

        ]);
    }
}
