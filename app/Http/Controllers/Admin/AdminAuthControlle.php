<?php

namespace App\Http\Controllers\Admin;

use App\Helper\JWTToken;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthControlle extends Controller {
    public function admin_login(Request $request) {

        $user = User::where([
            'email' => $request->email,
            'password' => $request->password,
        ])->select('id')->first();

        if ($user !== null) {
            //Login with JWT Token

            $token = JWTToken::create_token($request->email, $user->id);
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successfull',
            ], 200)->cookie('token', $token, 60 * 24 * 30);

        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized',
            ], 200);
        }
    }

    public function admin_logout(Request $request) {
        //Logout
        return response()->json([
            'status'=> 'success',
            'message'=> 'User Logout',
        ])->cookie('token','',-1);
    }
}
