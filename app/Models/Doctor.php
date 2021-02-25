<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'doctors';
    protected $fillable = [
        'name',
        'education',
        'add_education',
        'level',
        'img',
        'history_work_id',
        'professional_awards',
        'medical_associations',
        'title',
        'meta_description'
    ];


    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


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


    /*
     * До/После
     */
    public function treatment_history()
    {
        return $this->hasMany(TreatmentHistory::class, 'doctor_id');
    }


    /*
     * Отзывы
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
}
