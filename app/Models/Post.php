<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    protected $table = 'posts';
    protected $fillable = [
        'name',
        'content',
        'title',
        'meta_description',
        'keywords',
        'img',
        'cat_post_id',
    ];


    public function category()
    {
        return $this->belongsTo(CatPost::class, 'cat_post_id');
    }
}
