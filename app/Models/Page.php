<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $fillable = [
        'h1',
        'content',
        'title',
        'meta_description',
        'keywords',
        'img',
    ];


    public function usesTimestamps(): bool
    {
        return false;
    }
}
