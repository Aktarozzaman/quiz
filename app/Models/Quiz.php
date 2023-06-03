<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;
    use HasFactory;
protected $fillable=[
        'category_id',
        'title',
        'quiz_time',
    ];

     public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'quiz_question');
    }

    public function userQuizzes()
    {
        return $this->hasMany(User_Quiz::class);
    }
    public function points()
    {
    return $this->hasMany(Point::class);
    }

}
