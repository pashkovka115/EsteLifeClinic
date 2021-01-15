<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class OnlineConsultation extends Model
{
    use HasFactory;


    protected $table = 'online_consultations';
    protected $fillable = [
        'name',
        'phone',
        'cat_servise_id',
        'service_id',
        'doctor_id',
        'date',
        'time',
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
