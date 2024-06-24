<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\Time;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $appointments = Appointment::with(['customer', 'staff', 'service'])->get();
            $count = Appointment::count();
            return response()->json([
                'status' => 'success',
                'count' => $count,
                'data' => $appointments,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve appointments',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not typically used in API controllers
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    try {
        $request->validate([
            'staff_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'appointment_time' => 'required|string',
            'appointment_date' => 'required|date',
            'amount' => 'required|string',
        ]);

        $customer_id = $request->header('id');
        $staff_id = $request->input('staff_id');
        $service_id = $request->input('service_id');
        $date = $request->input('appointment_date');
        $time = $request->input('appointment_time');

        $check = Appointment::where('customer_id', $customer_id)->where('user_id', $staff_id)
            ->where('appointment_date', $date)
            ->exists();

        if ($check) {
            return response()->json([
                'status' => 'success',
                'message' => 'You have already booked an appointment. Please wait to make next appointment.'
            ], 200);
        }

        $appointment = Appointment::create([
            'customer_id' => $customer_id,
            'staff_id' => $staff_id,
            'service_id' => $service_id,
            'appointment_time' => $time,
            'appointment_date' => $date,
            'amount' => $request->input('amount'),
        ]);

        if ($appointment) {
            $schedule_id = Schedule::where('user_id', $staff_id)->where('date', $date)->pluck('id')->first();

            Time::where('schedule_id', $schedule_id)
                ->where('time', $time)
                ->update(['status' => 1]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Appointment Success.',
            'data' => $appointment
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
            'message' => 'Appointment Failed',
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
            $appointment = Appointment::with(['customer', 'staff', 'service'])->findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $appointment
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Appointment not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Not typically used in API controllers
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'staff_id' => 'required|exists:users,id',
                'service_id' => 'required|exists:services,id',
                'appointment_time' => 'required|string',
                'appointment_date' => 'required|date',
                'amount' => 'required|string',
            ]);

            $customer_id = $request->header('id');
            $staff_id = $request->input('staff_id');
            $service_id = $request->input('service_id');
            $date = $request->input('appointment_date');
            $time = $request->input('appointment_time');


            $appointment = Appointment::findOrFail($id);
            $previousTime = $appointment->appointment_time;

            $updateSuccess = $appointment->update([
                'staff_id' => $staff_id,
                'service_id' => $service_id,
                'appointment_time' => $time,
                'appointment_date' => $date,
                'amount' => $request->input('amount'),
                'status' => $request->input('status', $appointment->status),
            ]);

            if ($updateSuccess) {
                $schedule_id = Schedule::where('staff_id', $staff_id)->where('date', $date)->pluck('id')->first();

                $timeUpdateSuccess = Time::where('schedule_id', $schedule_id)
                    ->where('time', $time)
                    ->update(['status' => 1]);

                if ($timeUpdateSuccess) {
                    Time::where('schedule_id', $schedule_id)
                        ->where('time', $previousTime)
                        ->update(['status' => 0]);
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Appointment updated successfully',
                'data' => $appointment
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
                'message' => 'Appointment update failed',
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
            $appointment = Appointment::findOrFail($id);
            $previousTime = $appointment->appointment_time;
            $schedule_id = Schedule::where('staff_id', $appointment->staff_id)->where('date', $appointment->appointment_date)->pluck('id')->first();

            Time::where('schedule_id', $schedule_id)
                ->where('time', $previousTime)
                ->update(['status' => 0]);

            $appointment->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Appointment deleted successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Appointment deletion failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}