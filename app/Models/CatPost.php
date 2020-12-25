<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatPost extends Model
{
    use HasFactory;

    protected $table = 'cat_posts';
    protected $fillable = [
        'name',
        'content',
        'meta_description',
        'title',
        'keywords',
        'img',
    ];



    public function posts()
    {
        return $this->hasMany(Post::class, 'cat_post_id');
    }
}
