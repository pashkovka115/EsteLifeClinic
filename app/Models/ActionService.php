<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionService extends Model
{
    use HasFactory;

    protected $table = 'action_service';
    public $timestamps = false;
    protected $fillable = [
        'action_id',
        'service_id'
    ];
}
