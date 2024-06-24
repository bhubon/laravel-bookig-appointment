<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Models\Schedule;
use App\Models\Time;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $schedules = Schedule::with(['times', 'service'])->get(); 
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'service_id' => 'required|exists:services,id',
                'date' => 'required|date',
                'time' => 'required|array',
                'time.*' => 'required|string'
            ]);

            $staff_id=$request->header('id');
            $existingSchedule = Schedule::where('staff_id', $staff_id)
                                        ->where('date', $request->date)
                                        ->first();
            if ($existingSchedule) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Schedule for this date already exists for the staff.'
                ], 422);
            }

            $schedule = Schedule::create([
                'staff_id' => $staff_id,
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
            $schedule = Schedule::with(['times', 'service'])->find($id);

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
            $request->validate([
                'service_id' => 'required|exists:services,id',
                'date' => 'required|date',
                'time' => 'required|array',
                'time.*' => 'required|string'
            ]);

            $staff_id=$request->header('id');

            $schedule = Schedule::find($id);

            if (!$schedule) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Schedule not found'
                ], 404);
            }

            $existingSchedule = Schedule::where('staff_id', $staff_id)
                                        ->where('date', $request->date)
                                        ->where('id', '!=', $id)
                                        ->first();
            if ($existingSchedule) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Schedule for this date already exists for the staff.'
                ], 422);
            }

            $schedule->update([
                'staff_id' => $staff_id,
                'service_id' => $request->service_id,
                'date' => $request->date
            ]);

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
