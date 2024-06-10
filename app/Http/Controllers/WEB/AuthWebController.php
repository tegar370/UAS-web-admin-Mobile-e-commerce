<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthWebController extends Controller
{
    public function register(Request $request)
    {
        $getUser = User::where("email", $request->email)->first();
        if ($getUser != null) {
            return redirect("/registerIndex")->with("failed", "email sudah terdaftar");
        }

        $data_user =  User::create([
            "name" => $request->name,
            "role" => "admin",
            "email" => $request->email,
            "password" => Hash::make($request->password),
            'remember_token' => Str::random(60),

        ]);





        return redirect("/loginIndex")->with("success", "Berhasil Mendaftar");
    }

    public function login(Request $request)
    {


        $data = User::where("email", $request->email)->first();

        if ($data == null) {

            return redirect("/loginIndex")->with("failed", "gagal login");
        }

        if (Hash::check($request->password, $data->password)) {
            $data->update([
                "remember_token" =>  Str::random(60),
            ]);
            $request->session()->put('name', $data->name);

            $request->session()->put('id', $data->id);

            $request->session()->put('remember_token', $data->remember_token);

            return redirect("/")->with("success", $request->session()->get("remember_token"));
        }



        return redirect("/loginIndex")->with("failed", "gagal login");
    }


    public function logout(Request $request)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "gagal login");
        }
        $request->session()->flush();
        return redirect("/loginIndex")->with("success", "berhasil logout");
    }
}
