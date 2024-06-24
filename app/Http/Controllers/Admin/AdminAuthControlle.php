<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Mail;
use App\Helper\JWTToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;

class AdminAuthControlle extends Controller
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

    public function forgot_password(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = JWTToken::create_token($user->email, $user->id);
            Mail::to($user->email)->send(new ResetPassword($token));
            return response()->json(['message' => 'Password reset link sent.']);
        } else {
            return response()->json(['message' => 'User not found.'], 404);
        }
    }

    public function reset_password(Request $request) {
        $request->validate([
            'token' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $decoded = JWTToken::decode_token($request->token);

        if (!$decoded) {
            return response()->json(['message' => 'Invalid token.'], 400);
        }

        $user = User::find($decoded['sub']);
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['message' => 'Password reset successful.']);
        } else {
            return response()->json(['message' => 'User not found.'], 404);
        }
    }
}
