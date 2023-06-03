<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz_question extends Model
{
    use HasFactory;
    protected $fillable=[
    'quiz_id' => 'required|exists:quizzes,id',
    'question_id'=>'required',
    'selected_questions' => 'required|array',
    'selected_questions.*' => 'exists:questions,id',
    
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
}
