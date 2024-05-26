<?php

namespace App\Http\Controllers\Admin;

use App\Helper\JWTToken;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthControlle extends Controller {
    public function admin_login(Request $request) {

        $user = User::where([
            'email'    => $request->email,
            'password' => $request->password,
        ])->count();

        if ($user == 1) {
              //Login with JWT Token

            $token = JWTToken::create_token($request->email);
            return response()->json([
                'status'  => 'success',
                'message' => 'User Login Successfull',
                'token'   => $token,
            ], 200);

        } else {
            return response()->json([
                'status'  => 'failed',
                'message' => 'unauthorized',
            ], 200);
        }
    }
}
