<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class PriceDirection extends Model
{
    use HasFactory;
    use HasSlug;


    protected $table = 'price_directions';
    protected $fillable = [
        'name',
        'slug',
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


    public function categories()
    {
        return $this->hasMany(PriceCategory::class, 'price_direction_id');
    }


    public function services()
    {
        return $this->hasManyThrough(
            PriceService::class,
            PriceCategory::class,
            'price_direction_id',
            'price_category_id'
        );
    }
}
