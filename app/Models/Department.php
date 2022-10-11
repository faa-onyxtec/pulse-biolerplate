<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'sick_leaves_allowed',
        'other_leaves_allowed',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
