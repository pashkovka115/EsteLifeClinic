<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticalInterest extends Model
{
    use HasFactory;

    protected $table = 'practical_interests';
    protected $fillable = [
        'description',
        'doctor_id',
        'ico'
    ];


    public function usesTimestamps(): bool
    {
        return false;
    }
}
