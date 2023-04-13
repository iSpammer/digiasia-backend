<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hrs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'heartrate', 'xacc', 'yacc', 'zacc'
    ];
}
