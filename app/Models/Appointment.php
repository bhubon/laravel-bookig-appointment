<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','user_id','service_id','appointment_time','appointment_date','amount','status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
