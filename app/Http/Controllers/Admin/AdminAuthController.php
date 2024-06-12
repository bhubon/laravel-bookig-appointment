<?php

namespace App\Http\Controllers\Admin;

use App\Helper\JWTToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class AdminAuthController extends Controller 
{

    public function admin_login_view() {
        return view("Admin.Auth.login");
    }

    public function admin_login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user !== null && Hash::check($request->password, $user->password)) {
            $token = JWTToken::create_token($request->email, $user->id);
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successful',
                'token' => $token,
            ], 200)->cookie('token', $token, 60 * 24 * 30);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function admin_logout(Request $request) {
        return redirect('/admin/login')->cookie('token','',-1);
    }
}
