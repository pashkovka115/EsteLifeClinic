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
        'img',
        'description',
        'start',
        'finish',
    ];


    public function usesTimestamps(): bool
    {
        return false;
    }


    /*
     * Услуги
     */
    public function services()
    {
        return $this->belongsToMany(Service::class, 'services_has_actions');
    }
}
