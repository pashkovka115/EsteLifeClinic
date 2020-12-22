<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryWork extends Model
{
    use HasFactory;

    protected $table = 'history_work';
    protected $dates = ['start', 'end'];
    protected $fillable = [
        'start',
        'end',
        'position',
        'place',
        'doctor_id',
    ];

    public function usesTimestamps(): bool
    {
        return false;
    }
}
