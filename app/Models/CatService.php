<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatService extends Model
{
    use HasFactory;

    protected $table = 'cat_services';
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'meta_description',
        'title',
        'keywords',
        'img',
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
        return $this->hasMany(Service::class, 'cat_service_id');
    }

    /*
     * Дочерние категории
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->with('children');
    }


    /*
    * Отзывы
    */
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'cat_servise_id');
    }
}
