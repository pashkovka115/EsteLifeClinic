<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerItems extends Model
{
    use HasFactory;

    protected $table = 'banner_items';
    protected $fillable = [
        'banner_id',
        'visibility',
        'title',
        'img',
        'description',
        'full_description',
        'extra',
    ];


    public function usesTimestamps(): bool
    {
        return false;
    }


    public function banner()
    {
        return $this->belongsTo(Banner::class, 'banner_id');
    }
}
