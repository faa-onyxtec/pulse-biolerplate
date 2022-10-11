<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPublish extends Model
{
    use HasFactory;

    protected $fillable = [
        'departmentId',
        'title',
        'description',
        'publishDate',
        'noOfVacancies',
    ];

     /**
     * Get the Department that owns Jobs.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}