<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\Time;

class CustomerAppointmentController extends Controller
{


    public function appointmentPage()
    {
        return view('Admin.Pages.appointment-page');
    }


    public function index()
    {
        try {
            $appointments = Appointment::with(['user','customer','customer.user','service'])
            ->whereHas('user', function($query) {
                $query->where('role','staff');
            })
            ->get();

            return response()->json([
                'status' => 'success',
                'data' => $appointments
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Failed to retrieve schedules',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'date' => 'required|date',
                'user_id' => 'required|exists:users,id',
                'service_id' => 'required|exists:services,id',
                'customer_id' => 'required|exists:users,id',
                'time.*' => 'required|string'
            ]);

            $appointment_date = $request->input('date');
            $staff_id = $request->input('user_id');
            $service_id = $request->input('service_id');
            $customer_id = $request->input('customer_id');
            $appointment_time = $request->input('time');

            $check = Appointment::where('customer_id', $customer_id)->where('user_id', $staff_id)
            ->where('appointment_date', $appointment_date)
            ->exists();

            if ($check) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'You have already booked an appointment. Please wait to make next appointment.'
                ], 200);
            }

            $appointment = Appointment::create([
                'customer_id' => $customer_id,
                'user_id' => $staff_id,
                'service_id' => $service_id,
                'appointment_time' => $appointment_time,
                'appointment_date' => $appointment_date,
                'amount' => 50,
            ]);

            if ($appointment) {
                $schedule_id = Schedule::where('user_id', $staff_id)->where('date', $appointment_date)->pluck('id')->first();

                Time::where('schedule_id', $schedule_id)
                ->where('time', $appointment_time)
                ->update(['status' => 1]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Appointment created successfully'
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



    public function show($id)
    {
        try {
            $appointment = Appointment::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => [
                    'id' => $appointment->id,
                    'customer_id' => $appointment->customer_id,
                    'user_id' => $appointment->user_id,
                    'service_id' => $appointment->service_id,
                    'appointment_date' => $appointment->appointment_date,
                    'appointment_time' => $appointment->appointment_time,
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Appointment not found.'
            ], 404);
        }
    }




    public function edit(string $id)
    {
       //
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'date' => 'required|date',
                'user_id' => 'required|exists:users,id',
                'service_id' => 'required|exists:services,id',
                'customer_id' => 'required|exists:customers,id',
                'time' => 'required',
            ]);

            $appointment_date = $request->input('date');
            $staff_id = $request->input('user_id');
            $service_id = $request->input('service_id');
            $customer_id = $request->input('customer_id');
            $appointment_time = $request->input('time');

            $appointment = Appointment::find($id);
            $old_appointment_time =  $appointment->appointment_time;

            if (!$appointment) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Appointment not found',
                ], 404);
            }

            $appointment->appointment_date = $appointment_date;
            $appointment->user_id = $staff_id;
            $appointment->service_id = $service_id;
            $appointment->customer_id = $customer_id;
            $appointment->appointment_time = $appointment_time;
            $appointment->save();

            if ($appointment) {
                $schedule_id = Schedule::where('user_id', $staff_id)
                ->where('date', $appointment_date)
                ->pluck('id')
                ->first();

                Time::where('schedule_id', $schedule_id)
                ->where('time', $old_appointment_time)
                ->where('status', 1)
                ->update(['status' => 0]);

                Time::where('schedule_id', $schedule_id)
                ->where('time', $appointment_time)
                ->where('status', 0)
                ->update(['status' => 1]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Appointment updated successfully',
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while updating the appointment.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }




    public function destroy(string $id)
    {
        try {
            $appointment = Appointment::find($id);
            $old_appointment_time =  $appointment->appointment_time;

            if ($appointment) {
                $schedule_id = Schedule::where('user_id', $appointment->user_id)
                                ->where('date', $appointment->appointment_date)
                                ->pluck('id')
                                ->first();

                Time::where('schedule_id', $schedule_id)
                            ->where('time', $old_appointment_time)
                            ->where('status', 1)
                            ->update(['status' => 0]);
            }

            $appointment->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Appointment deleted successfully'
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
