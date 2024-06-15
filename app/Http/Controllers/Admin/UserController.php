<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Exception;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $users = User::all();
            return response()->json([
                'status' => 'success',
                'data' => $users
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve users',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function user_index() {
        return view('Admin.Pages.user');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        try {
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users,email',
                'password' => 'string|min:6',
                'role' => 'required|in:admin,staff,customer',
            ]);

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'password' => Hash::make($request->input('password')),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User Successfully Added.'
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Failed',
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Registration Failed',
                'error' => $e->getMessage()
            ], 500);
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $user
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'User not found',
                //'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        try {
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:6',
                'role' => 'required|in:admin,staff,customer',
            ]);

            if (isset($validatedData['password'])) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }

            $user->update($validatedData);

            return response()->json([
                'status' => 'success',
                'message' => 'User updated successfully.',
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Failed',
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Update Failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'User deleted successfully.'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Deletion Failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Non staff user
    public function get_users(){
        try {
            $users = User::whereIn('role', ['customer'])->latest('id')->get();
            return response()->json([
                'status' => 'success',
                'data' => $users
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve users',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
