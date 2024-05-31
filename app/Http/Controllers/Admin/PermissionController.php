<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $permissions = Permission::all();
            return response()->json([
                'status' => 'success',
                'data' => $permissions,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrive permissions',
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
            ]);

            Permission::create($validated);

            return response()->json([
                'status' => 'success',
                'data' => 'Permission Created',
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
                'message' => 'Failed to create permission',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        try {
            $permission = Permission::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $permission,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'mesage' => 'Permission Not Found',
            ], 500);
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
            $permission = Permission::findOrFail($id);
            $validated = $request->validate([
                'name' => 'required|string|max:50',
            ]);

            $permission->update($validated);

            return response()->json([
                'status' => 'success',
                'mesage' => 'Permission Updated',
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation failed',
                'error' => $e->getMessage(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Update Failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        try {
            Permission::findOrFail($id)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Permission deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to delete permission',
            ],500);
        }
    }
}
