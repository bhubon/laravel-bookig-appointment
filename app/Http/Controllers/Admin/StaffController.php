<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class StaffController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $staff = Staff::with(['user:id,email,name', 'services:id,name'])->latest('id')->get();
            return response()->json([
                'status' => 'success',
                'data' => $staff,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrive staff',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function staff_index() {
        return view('Admin.Pages.staff');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {

        // dd($request->all());

        try {
            $validated = $request->validate([
                'user_id' => 'required|exists:users,id',
                'phone' => 'required|string|max:50',
                'address' => 'required|string',
                'info' => 'required|string',
            ]);

            $user = User::with(['staff','staff.services'])->findOrFail($request->user_id);

            if ($user->role == 'staff' && $user->staff->services->count() > 0) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'User already in staff list',
                ]);
            } else {


                $user->role = 'staff';
                $user->save();


                $staff = Staff::create($validated);

                $staff->services()->sync($request->input('services', []));

                return response()->json([
                    'status' => 'success',
                    'message' => 'Staff created successfully',
                ]);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation failed',
                'error' => $e->errors(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to create staff',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        try {
            $staff = Staff::with(['user:id,email,name', 'services:name,id'])->findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $staff,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No Stuff Found',
                'error' => $e->getMessage(),
            ]);
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

            $staff = Staff::findOrFail($id);

            $validated = $request->validate([
                'phone' => 'required|string|max:50',
                'address' => 'required|string',
                'info' => 'required|string',
            ]);

            $staff->update($validated);

            $staff->services()->sync($request['services']);

            return response()->json([
                'status' => 'success',
                'message' => 'Staff successfully updated',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation failed',
                'error' => $e->errors(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to update staff',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        try {
            $staff = Staff::findOrFail($id);
            $staff->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Staff deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Deletion failed',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
