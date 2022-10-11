<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type',
        'leave_hours', //4-Half day , 8-Full day
        'date',
        'status', //pending , approved , denied
        'comment',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
