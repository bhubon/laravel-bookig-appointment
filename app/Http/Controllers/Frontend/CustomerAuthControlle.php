<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Helper\JWTToken;
use App\Models\User;
use App\Models\Customer;

class CustomerAuthControlle extends Controller
{

    public function customer_registration() 
    {
        return view("Frontend.Auth.registration");
    }


    public function store_customer_registration(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users,email',
                'password' => 'required|string|min:3|confirmed'
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => 'customer'
            ]);

            if ($user) {
                // Create the Customer record
                $customer = Customer::create([
                    'user_id' => $user->id
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Customer created successfully',
                    'data' => [
                        'user' => $user,
                        'customer' => $customer
                    ]
                ], 201);
            } else {
                throw new \Exception('Failed to create user');
            }
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Customer creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function customer_login() 
    {
        return view("Frontend.Auth.login");
    }

    public function store_customer_login(Request $request) 
    {
        try {
            $request->validate([
                'email' => 'required|email|exists:users,email',
                'password' => 'required|string|min:3'
            ]);

            $user = User::where('email', $request->email)->first();

            if ($user !== null && Hash::check($request->password, $user->password)) {
                $token = JWTToken::create_token($request->email, $user->id, $user->name);
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
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Login failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }




}
