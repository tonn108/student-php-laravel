<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'std';

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'grade',
        'class'
    ];
}
