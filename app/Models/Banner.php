<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';
    protected $fillable = [
        'visibility',
        'name'
    ];


    public function usesTimestamps(): bool
    {
        return false;
    }


    public function items()
    {
        return $this->hasMany(BannerItems::class, 'banner_id');
    }
}
