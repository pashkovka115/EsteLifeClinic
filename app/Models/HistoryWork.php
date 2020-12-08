<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryWork extends Model
{
    use HasFactory;

    protected $table = 'history_work';
    protected $dates = ['start', 'end', 'created_at', 'updated_at'];
    protected $fillable = [
        'start',
        'end',
        'position',
        'place',
        'doctor_id',
    ];
}
