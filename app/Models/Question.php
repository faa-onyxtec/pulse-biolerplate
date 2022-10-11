<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[
        'question',
        'type_id',
        'user_id',
        'category',
        'anonymous'
    ]; 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
     
    public function options()
    {
        return $this->hasMany(Option::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
