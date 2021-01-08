<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $fillable = [
        'name',
        'phone',
        'cat_servise_id',
        'service_id',
        'doctor_id',
        'date',
    ];


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }


    public function cat_servise()
    {
        return $this->belongsTo(CatService::class, 'cat_servise_id');
    }


    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
