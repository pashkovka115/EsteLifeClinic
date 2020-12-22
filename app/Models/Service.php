<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'cat_service_id',
        'type',
        'name',
        'description',
        'price',
        'img',
        'meta_description',
        'title',
        'keywords',
    ];


    /*
     * Врачи
     */
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'services_has_doctors');
    }


    /*
     * Категория услуги
     */
    public function category()
    {
        return $this->belongsTo(CatService::class, 'cat_service_id');
    }


    /*
     * Акции и скидки
     */
    public function actions()
    {
        return $this->belongsToMany(Service::class, 'services_has_actions');
    }


    /*
     * Отзывы
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'service_id');
    }
}
