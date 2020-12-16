<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'options';
    protected $fillable = [
        'key',
        'val',
        'val2',
    ];


    public function usesTimestamps(): bool
    {
        return false;
    }
}
