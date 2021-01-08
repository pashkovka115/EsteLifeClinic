<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConditionsAction extends Model
{
    use HasFactory;

    protected $table = 'conditions_actions';
    protected $fillable = [
        'action_id',
        'condition',
    ];


    public function usesTimestamps(): bool
    {
        return false;
    }
}
