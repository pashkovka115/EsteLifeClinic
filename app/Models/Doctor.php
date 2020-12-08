<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $fillable = [
        'name',
        'education',
        'add_education',
        'level',
        'img',
        'history_work_id'
    ];


    /*
     * Специализации
     */
    public function professions()
    {
        return $this->belongsToMany(Profession::class, 'doctors_has_professions');
    }

    /*
     * Карьера
     */
    public function jobs()
    {
        return $this->hasMany(HistoryWork::class);
    }


    /*
     * Услуги
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'services_has_doctors');
    }


    /*
     * Практические интересы
     * На фронте место только для четырёх
     */
    public function interests()
    {
        return $this->hasMany(PracticalInterest::class)->limit(4);
    }
}
