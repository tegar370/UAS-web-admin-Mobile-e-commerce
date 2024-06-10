<?php

namespace App\Http\Controllers\API;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function profile()
    {
        try {

            $user = User::where("id", auth()->user()->id)->with("customer")->first();
            return [
                'isSuccess' => true,
                'message' => 'Success Get Profile',
                'data' => $user
            ];
        } catch (\Throwable $th) {
            return response()->json([
                'isSuccess' => false,
                'message' => 'Failed Register',
                'error' => $th
            ], 500);
        }
    }

    public function editProfile(Request $request)
    {

        $user = User::where("id",  auth()->user()->id)->update([
            "email" => $request->email,

        ]);

        Customer::where("user_id", auth()->user()->id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        return response()->json([
            'isSuccess' => true,
            "message" => "Success Update Profile",
        ]);
    }

    public function editPhotoProfile(Request $request)
    {

        $getUser = User::where("id", auth()->user()->id)->first();

        DeleteFile::delete($getUser->photo_profile_url);

        $photo_profile_url = UploadFile::upload("profile_image", $request->file('photo_profile_url'));

        User::where("id", auth()->user()->id)->update([
            "photo_profile_url" => $photo_profile_url
        ]);

        return response()->json([
            'isSuccess' => true,
            'message' => "success edit photo profil"
        ]);
    }
    public function deletePhotoProfile()
    {

        $getUser = User::where("id", auth()->user()->id)->first();

        DeleteFile::delete($getUser->photo_profile_url);

        User::where("id", auth()->user()->id)->update([
            "photo_profile_url" => null
        ]);

        return response()->json([
            'isSuccess' => true,
            'message' => "success delete photo profil"
        ]);
    }
}
