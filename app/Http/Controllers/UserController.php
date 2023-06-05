<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Category;
use App\Models\Point;
use App\Models\Question;
use App\Models\Quiz_question;
use App\Models\User_quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function testQuiz()
   {
   $quizzes = Quiz::all();

   return view('user.userpage', compact('quizzes'));
   }

public function show(Request $request)
{
$quizId = $request->quiz_id; // Catch the quiz ID
$category_id = $request->category_id;

$quiz = Quiz::find($quizId);
$duration = $quiz->quiz_time;
$data['duration'] = $duration * 60;
$questionIds = Quiz_question::where('quiz_id', $quizId)->pluck('question_id');

$data['quiz_id'] = $quizId;
$data['categories'] = Category::all();
$data['questions'] = Question::with('options')->whereIn('id', $questionIds)->get();
$data['options'] = Option::all();

return view('user.show', $data);

}


public function submit(Request $request)
{
$quizId = $request->input('quiz_id');
$answers = $request->input('answers');

if ($answers !== null) {
$totalQuestions = count($answers); // Calculate the total number of questions
$score = 0;

foreach ($answers as $questionId => $optionId) {
// Process the answers and calculate the score
$question = Question::find($questionId);
$option = Option::find($optionId);
$userId = auth()->user()->id;

// Check if the selected option is correct
if ($option && $option->is_correct) {
$score++;
}

$userAnswer = new User_quiz();
$userAnswer->user_id = $userId;
$userAnswer->quiz_id = $quizId;
$userAnswer->save();
}

$points = new Point();
$points->user_id = $userId;
$points->quiz_id = $quizId;
$points->points = $score;
$points->total_question = $totalQuestions; // Save the total number of questions
$points->save();

// You can redirect to a result page or display the score on the same page
return view('user.result', ['score' => $score, 'totalQuestions' => $totalQuestions])->with('SUCCESS_MESSAGE', 'Thank you
for taking the quiz.');
} else {
// No answers were submitted
return redirect()->back()->with('error', 'Please answer at least one question.');
}
}
public function points( Request $request)
{
        $user=Auth::user();
        $user_id=$user->id;
        $quizPoints = Point::with('quiz')->where('user_id', $user_id)->get();
        // $quizPoints= Point::where('user_id',$user_id)->get(); // Retrieve all quiz points from the Point model
        return view('user.pointtable',['quizPoints' => $quizPoints]);
        
        
}






}
