<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'cat_service_id',
        'name',
        'content',
        'visibility'
    ];


    public function category()
    {
        return $this->belongsTo(CatService::class, 'cat_service_id');
    }

    public function usesTimestamps(): bool
    {
        return false;
    }
}
