<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'feedback',
        'anonymous',
        'from_user_id',
        'about_user_id',
    ];
    protected $casts=[
        'feedback'=>'array'
        
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function from_user()
    {
        return $this->belongsTo(User::class,'from_user_id','id');
    }
    public function about_user()
    {
        return $this->belongsTo(User::class,'about_user_id','id');
    }
    
}
