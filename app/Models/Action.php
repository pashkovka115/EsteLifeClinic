<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $table = 'actions';
    protected $fillable = [
        'name',
        'type',
        'slogan',
        'discount',
        'big_img',
        'banner_img',
        'short_description',
        'description',
        'start',
        'finish',
        'title',
        'keywords',
        'meta_description',
    ];


    /*
     * Услуги
     */
    public function services()
    {
        return $this->belongsTo(Service::class, 'action_id');
    }

    /*
     * Условия
     */
    public function conditions()
    {
        return $this->hasMany(ConditionsAction::class, 'action_id');
    }
}
