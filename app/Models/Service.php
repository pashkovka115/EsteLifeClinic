<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'cat_servise_id',
        'name',
        'description',
        'price',
        'img',
        'meta_description',
        'title',
        'keywords',
    ];


    /*
     * Врачи
     */
    public function services()
    {
        return $this->belongsToMany(Doctor::class, 'services_has_doctors');
    }
}
