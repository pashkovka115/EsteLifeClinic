<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatService extends Model
{
    use HasFactory;

    protected $table = 'cat_services';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'meta_description',
        'title',
        'keywords',
        'img',
    ];


    /*
     * Услуги
     */
    public function services()
    {
        return $this->hasMany(Service::class, 'cat_service_id');
    }
}
