<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Models\Appointment;
use App\Models\Schedule;
use App\Models\Time;
use App\Models\Customer;

class AppointmentController extends Controller
{
    public function dashboard() 
    {
        return view('Frontend.Pages.dashboard');
    }


    public function appointment_page() 
    {
        return view('Frontend.Pages.appointment');
    }


    public function store_appointment(Request $request)
    {
        try {
            $request->validate([
                'date' => 'required|date',
                'user_id' => 'required|exists:users,id',
                'service_id' => 'required|exists:services,id',
                'time' => 'required|string'
            ]);

            $cust_id = $request->header('id');
            $customer_id = Customer::where('user_id',$cust_id)->pluck('id')->first();

            $appointment_date = $request->input('date');
            $staff_id = $request->input('user_id');
            $service_id = $request->input('service_id');
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

    
    public function logout(Request $request) 
    {
        return redirect('/login')->cookie('token','',-1);
    }


}