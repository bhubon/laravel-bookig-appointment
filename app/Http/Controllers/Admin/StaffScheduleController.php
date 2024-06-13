<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Time;

class StaffScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function schedulePage()
    {
        return view('admin.pages.schedule-page');
    }


    public function staffList()
    {
        try {
            $users = User::where('role', 'staff')->get();
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


    public function index()
    {
        try {
            $schedules = Schedule::with(['times', 'service', 'user'])
                                ->whereHas('user', function($query) {
                                    $query->where('role', 'staff');
                                })
                                ->get();
                                 
            return response()->json([
                'status' => 'success',
                'data' => $schedules
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve schedules',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'service_id' => 'required|exists:services,id',
                'user_id' => 'required|exists:users,id',
                'date' => 'required|date',
                'time' => 'required|array',
                'time.*' => 'required|string'
            ]);

            $user_id = $request->user_id;
            $existingSchedule = Schedule::where('user_id', $user_id)
                                        ->where('date', $request->date)
                                        ->first();
            if ($existingSchedule) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Schedule for this date already exists for the staff.'
                ], 422);
            }

            $schedule = Schedule::create([
                'user_id' => $user_id,
                'service_id' => $request->service_id,
                'date' => $request->date
            ]);

            foreach ($request->time as $time) {
                Time::create([
                    'schedule_id' => $schedule->id,
                    'time' => $time
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Schedule created successfully'
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Failed',
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Schedule creation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $schedule = Schedule::with(['times', 'service', 'user'])->find($id);

            if (!$schedule) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Schedule not found'
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'data' => $schedule
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve schedule',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    try {
        // Log raw input for debugging
        \Log::info('Raw Input', $request->all());

        // Validate request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required|array',
            'time.*' => 'required|string'
        ]);

        // Log the received data for debugging
        \Log::info('Validated Data', [
            'user_id' => $request->input('user_id'),
            'service_id' => $request->input('service_id'),
            'date' => $request->input('date'),
            'times' => $request->input('time')
        ]);

        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Schedule not found'
            ], 404);
        }

        // Check if the combination of user_id and date already exists in other records
        $existingSchedule = Schedule::where('user_id', $request->user_id)
                                ->where('date', $request->date)
                                ->where('id', '!=', $id)
                                ->first();
        if ($existingSchedule) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Schedule for this date already exists for the staff.'
            ], 422);
        }

        // Update the schedule's service and times
        $schedule->update([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'date' => $request->date,
        ]);

        // Delete existing times and create new ones
        $schedule->times()->delete();
        foreach ($request->time as $time) {
            Time::create([
                'schedule_id' => $schedule->id,
                'time' => $time
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Schedule updated successfully'
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
            'message' => 'Schedule update failed',
            'error' => $e->getMessage()
        ], 500);
    }
}


public function updateSchedule(Request $request)
{
    try {

        // Validate request
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required|array',
            'time.*' => 'required|string'
        ]);

        $id=$request->input('id');

        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Schedule not found'
            ], 404);
        }

        // Check if the combination of user_id and date already exists in other records
        $existingSchedule = Schedule::where('user_id', $request->user_id)
                                ->where('date', $request->date)
                                ->where('id', '!=', $id)
                                ->first();
        if ($existingSchedule) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Schedule for this date already exists for the staff.'
            ], 422);
        }

        // Update the schedule's service and times
        $schedule->update([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'date' => $request->date,
        ]);

        // Delete existing times and create new ones
        $schedule->times()->delete();
        foreach ($request->time as $time) {
            Time::create([
                'schedule_id' => $schedule->id,
                'time' => $time
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Schedule updated successfully'
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
            'message' => 'Schedule update failed',
            'error' => $e->getMessage()
        ], 500);
    }
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $schedule = Schedule::find($id);

            if (!$schedule) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Schedule not found'
                ], 404);
            }

            Time::where('schedule_id', $schedule->id)->delete();

            $schedule->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Schedule and related times deleted successfully'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Schedule deletion failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

}
