<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Staginfo extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'address',
        'phone',
        'university',
        'major',
        'picture_path',
        'report_path',
    ];
}
