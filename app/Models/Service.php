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
        'action_id',
        'type',
        'name',
        'description',
        'short_description',
        'price',
        'img',
        'meta_description',
        'title',
        'ico1',
        'service1',
        'ico2',
        'service2',
        'ico3',
        'service3',
        'ico4',
        'service4',
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
    public function action()
    {
        return $this->belongsTo(Action::class, 'action_id');
    }


    /*
     * Отзывы
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'service_id');
    }

    /*
     * До/После
     */
    public function treatment_history()
    {
        return $this->hasMany(TreatmentHistory::class, 'service_id');
    }
}
