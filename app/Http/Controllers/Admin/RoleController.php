<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $roles = Role::with('permissions')->latest()->paginate(10);

            return response()->json([
                'status' => 'success',
                'data' => $roles
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No Role Found',
                'error' => $e->getMessage(),
            ]);
        }
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
            $validated = $request->validate([
                'name' => 'required|string|max:50',
                'permissions' => 'array'
            ]);

            $role = Role::create($validated);
            $role->syncPermissions($validated['permissions']);
            return response()->json([
                'status' => 'success',
                'message' => 'Role created successfully '
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation failed',
                'error' => $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to create role',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        try {
            $role = Role::with('permissions')->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $role
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No Role Found',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        try {
            $role = Role::findOrFail($id);
            $validated = $request->validate([
                'name' => 'required|string|max:50',
                'permissions' => 'array'
            ]);

            $role->update($validated);

            $role->syncPermissions($validated['permissions']);

            return response()->json([
                'status' => 'success',
                'message' => 'Role successfully updated',
                'data' => $role
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation failed',
                'error' => $e->getMessage(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Faield to update role',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        try {
            $role = Role::findOrFail($id);
            $role->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Role deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Faield to delete role',
                'error' => $e->getMessage(),
            ]);
        }
    }
}
