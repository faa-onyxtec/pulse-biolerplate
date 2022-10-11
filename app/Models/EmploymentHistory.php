<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'employer_name',
        'from',
        'to',
        'position',
        'salary',
        'reason',
    ];
}