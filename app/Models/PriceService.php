<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class PriceService extends Model
{
    use HasFactory;
    use HasSlug;


    protected $table = 'priceservices';
    protected $fillable = [
        'type',
        'parent_id',
        'pricedirection_id',
        'name',
        'slug',
        'code',
        'price',
        'discount_price'
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

    public function directions()
    {
        return $this->belongsToMany(
            PriceDirection::class,
            'direction_prices',
            'priceservice_id',
            'pricedirection_id'
        );
    }


    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->with('children');
    }

    public function parents()
    {
        return $this->hasOne(self::class, 'id', 'parent_id')->with('parent');
    }

    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent_id')->with('directions');
    }


    /*public function category()
    {
        return $this->belongsTo(PriceCategory::class, 'pricecategory_id');
    }*/
}
