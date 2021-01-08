<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class CatService extends Model
{
    use HasFactory;

    protected $table = 'cat_services';
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'before_after',
        'description',
        'meta_description',
        'title',
        'keywords',
        'img',
    ];


    public function getSlugOptions() : SlugOptions
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
     * Услуги
     */
    public function services()
    {
        return $this->hasMany(Service::class, 'cat_service_id');
    }

    /*
     * Дочерние категории
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->with('children');
    }


    /*
    * Записаны на приём в этой категории
    */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'cat_servise_id');
    }
}
