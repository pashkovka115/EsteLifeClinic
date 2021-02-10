<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class PriceCategory extends Model
{
    use HasFactory;
    use HasSlug;


    protected $table = 'price_categories';
    protected $fillable = [
        'price_direction_id',
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


    public function direction()
    {
        return $this->belongsTo(PriceDirection::class, 'price_direction_id');
    }


    public function services()
    {
        return $this->hasMany(PriceService::class, 'price_category_id');
    }
}
