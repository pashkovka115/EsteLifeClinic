<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'home';
    protected $fillable = [
        'top_slider',
        'two_slider',
        'action_slider',
        'medical_center_slider',
        'count_doctors_list',
        'count_news',
    ];


    /*
     * Верхний(главный) слайдер
     */
    public function top_sliders()
    {
        return $this->belongsTo(Banner::class, 'top_slider')->with('items');
    }


    /*
     * Второй(полезные советы) слайдер
     */
    public function useful_tips()
    {
        return $this->belongsTo(Banner::class, 'two_slider')->with('items');
    }


    /*
     * Медицинский центр(нижний) слайдер
     */
    public function medical_center_sliders()
    {
        return $this->belongsTo(Banner::class, 'medical_center_slider')->with('items');
    }
}
