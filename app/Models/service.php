<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','duration','price'];

    public function staff(){
        return $this->belongsToMany(Staff::class,'staff_services');
    }
}
