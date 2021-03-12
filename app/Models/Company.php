<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    protected $fillable = [
        'name',
        'top_slider',
        'middle_slider',
        'bottom_slider',
        'h3',
        'practice',
        'cnt',
        'description',
        'ico1',
        'service1',
        'ico2',
        'service2',
        'ico3',
        'service3',
        'ico4',
        'service4',
    ];



    public function top_sliders()
    {
        return $this->belongsTo(Banner::class, 'top_slider')->with('items');
    }

    public function middle_sliders()
    {
        return $this->belongsTo(Banner::class, 'middle_slider')->with('items');
    }

    public function bottom_sliders()
    {
        return $this->belongsTo(Banner::class, 'bottom_slider')->with('items');
    }
}
