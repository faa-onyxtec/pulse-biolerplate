<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'address',
        'city',
        'zipcode',
        'email',
        'cell_number',
        'desired_position',
        'available_date',
        'desired_salary',
        'cv',
    ];
}