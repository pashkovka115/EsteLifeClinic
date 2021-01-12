<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentHistory extends Model
{
    use HasFactory;

    protected $table = 'treatment_history';
    protected $fillable = [
        'doctor_id',
        'cat_service_id',
        'service_id',
        'name',
        'before_images',
        'after_images',
        'description',
        'done',
    ];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }


    public function category()
    {
        return $this->belongsTo(CatService::class, 'cat_service_id');
    }


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
