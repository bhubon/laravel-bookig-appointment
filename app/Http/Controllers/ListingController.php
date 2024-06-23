<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Models\User;
use App\Models\Customer;
use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\Time;

class ListingController extends Controller
{

    public function getStaffList()
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
    

    public function getStaffByDate(Request $request)
    {
        try {
            $date = $request->input('date');
            $staff = User::whereHas('schedules', function($query) use ($date) {
                $query->where('date', $date);
            })->get();

            if ($staff->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'No staff found for the selected date.',
                    'data' => []
                ], 200);
            }

            return response()->json([
                'status' => 'success',
                'data' => $staff
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve staff',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function getScheduleTime(Request $request)
    {
        try {
            $staffId = $request->query('staff_id');
            $date = $request->query('date');

            $schedule = Schedule::where('user_id', $staffId)
            ->where('date', $date)
            ->with(['times' => function ($query) {
                $query->where('status', 0);
            }])
            ->first();

            if (!$schedule || $schedule->times->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'No available times found for the selected staff on this date.',
                    'data' => []
                ], 200);
            }

            return response()->json([
                'status' => 'success',
                'data' => $schedule->times
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve schedule times',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function getUpdateScheduleTime(Request $request)
    {
        $validatedData = $request->validate([
            'staff_id' => 'required|exists:users,id', 
            'date' => 'required|date_format:Y-m-d',
        ]);

        try {
            $staffId = $validatedData['staff_id'];
            $date = $validatedData['date'];

            $schedule = Schedule::where('user_id', $staffId)
            ->whereDate('date', $date)
            ->with('times')
            ->first();

            if (!$schedule) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Schedule not found for the specified staff and date.',
                ], 404);
            }

            $scheduleTimes = $schedule->times->map(function ($time) {
                return [
                    'id' => $time->id,
                    'time' => $time->time,
                ];
            });

            return response()->json([
                'status' => 'success',
                'data' => $scheduleTimes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to fetch schedule times.',
                'error' => $e->getMessage(), 
            ], 500);
        }
    }

    public function getCustomerList()
    {
        try {
            $users = Customer::with('user')->get();
            if ($users->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'No customer found',
                    'data' => []
                ], 200);
            }
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
