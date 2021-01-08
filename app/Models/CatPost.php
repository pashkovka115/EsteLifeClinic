<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class CatPost extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'cat_posts';
    protected $fillable = [
        'name',
        'slug',
        'content',
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



    public function posts()
    {
        return $this->hasMany(Post::class, 'cat_post_id');
    }
}
