<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerWebController extends Controller
{
    public function delete($id)
    {
        $data_user = User::where("id", $id)->first();

        $data_user->delete();
        return redirect("/customer/index")->with("success_delete", "success delete data");
    }
}
