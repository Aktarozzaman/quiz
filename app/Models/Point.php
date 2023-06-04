<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $fillable=[
    'user_id',
    'quiz_id',
    'points',
    'total_question'
    ];
    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function quiz()
    {
    return $this->belongsTo(Quiz::class);
    }

}
