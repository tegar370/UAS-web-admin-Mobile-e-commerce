<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'role' => "customer",
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Customer::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        $data = $user->with("customer")->first();

        return response()->json(["message" => "Success Create Account", "data" => $data]);
    }

    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        if ($user == null) {
            return response()->json(["message" => "Failed Login, Email Not Found"]);
        }

        if (Hash::check($request->password, $user->password)) {
            $getUser = User::where('email', $request['email'])->firstOrFail();
            $token = $getUser->createToken('auth_token')->plainTextToken;

            User::where("id", $getUser->id)->update([
                "remember_token" => $token
            ]);
            return response()->json([
                "message" => "Success Login Account",
                "token" => $token,
                "data" => $user
            ]);
        } else {
            return response()->json(["message" => "Failed Login, Wrong Password"]);
        }
    }

    public function logout()
    {
        try {

            auth()->user()->tokens()->delete();
            return [
                'message' => 'You have successfully logged out and the token was successfully deleted',

            ];
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed Register',
                'error' => $th,

            ], 500);
        }
    }
}
