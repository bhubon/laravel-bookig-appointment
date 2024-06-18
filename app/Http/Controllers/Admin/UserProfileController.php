<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException; 
use Exception;

class UserProfileController extends Controller
{

    function profilePage()
    {
        return view('Admin.pages.profile-page');
    }

    function UserProfile(Request $request){
        $email=$request->header('email');
        $user=User::where('email','=',$email)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Request Successful',
            'data' => $user
        ],200);
    }

    function UpdateProfile(Request $request){
        try{
            $request->validate([
                'name' => 'required|string|max:50'
            ]);

            $email=$request->header('email');
            $name=$request->input('name');

            User::where('email','=',$email)->update([
                'name'=>$name,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }


    function PasswordPage()
    {
        return view('Admin.pages.password-change-page');
    }


    public function UpdatePassword(Request $request)
    {
        try {
            $request->validate([
                'oldpassword' => 'required|string|min:6',
                'newpassword' => 'required|string|min:6'
            ]);

            $email = $request->header('email');
            $user = User::where('email', $email)->select('password')->first();

            if (!$user) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'User not found',
                ], 404);
            }

            $oldPassword = $request->input('oldpassword');
            $hashedPassword = $user->password;

            if (!Hash::check($oldPassword, $hashedPassword)) {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Old password is incorrect',
                ], 401);
            }

            $newPassword = Hash::make($request->input('newpassword'));
            $updateResult = User::where('email', $email)->update(['password' => $newPassword]);

            if ($updateResult) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Password updated successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => 'fail',
                    'message' => 'Password update failed',
                ], 500);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
