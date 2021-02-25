<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Action extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'actions';
    protected $fillable = [
        'name',
        'slug',
        'type',
        'slogan',
        'discount',
        'big_img',
        'banner_img',
        'short_description',
        'description',
        'conditions',
        'start',
        'finish',
        'title',
        'keywords',
        'meta_description',
        'show_home'
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
     * Услуги
     */
    public function services()
    {
        return $this->belongsToMany(Service::class)->with('prices');
    }

    /*
     * Условия
     */
    /*public function conditions()
    {
        return $this->hasMany(ConditionsAction::class, 'action_id');
    }*/
}
