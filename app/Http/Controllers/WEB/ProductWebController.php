<?php

namespace App\Http\Controllers\WEB;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    public function create(Request $request)
    {

        $image_url = UploadFile::upload("product_image", $request->file("image_url"));

        Product::create([
            'name' => $request->name,
            'image_url' => $image_url,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'qty' => 0,
            'total_rating' => 0,

        ]);

        return redirect("/product/index")->with("success_create", "success create data");
    }
    public function update(Request $request)
    {


        Product::where("id", $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'qty' => 0,
            'total_rating' => 0,

        ]);
        $data_product = Product::where("id", $request->id)->first();
        if ($request->file("image_url") != null) {
            DeleteFile::delete($data_product->image_url);
            $image_url =  UploadFile::upload("foto_ktp", $request->file("image_url"));
            $data_product->update([
                'image_url' => $image_url,
            ]);
        }

        return redirect("/product/index")->with("success_update", "success update data");
    }

    public function delete($id)
    {
        $data_product = Product::where("id", $id)->first();
        DeleteFile::delete($data_product->image_url);
        $data_product->delete();
        return redirect("/product/index")->with("success_delete", "success delete data");
    }
}
