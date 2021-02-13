<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePriceservic extends Model
{
    use HasFactory;

    protected $table = 'service_priceservice';
    public $timestamps = false;
    protected $fillable = [
        'service_id',
        'priceservice_id'
    ];
}
