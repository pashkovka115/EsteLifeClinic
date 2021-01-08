<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory;


    protected $table = 'posts';
    protected $fillable = [
        'name',
        'slug',
        'content',
        'title',
        'meta_description',
        'excerpt',
        'keywords',
        'img',
        'bg_img',
        'cat_post_id',
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


    public function category()
    {
        return $this->belongsTo(CatPost::class, 'cat_post_id');
    }
}
