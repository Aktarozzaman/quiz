<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Option;
use App\Models\Category;
use App\Models\Question;
use App\Models\Quiz_question;
use Illuminate\Http\Request;

class QuizquestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
     $user=auth()->user();
     if ($user->is_admin == '1'){
        $quizId = $request->quiz_id; // Catch the quiz ID
        $category_id=$request->category_id;
        $data['quizzes'] = $quizId;
        $data['categories'] = Category::all();
        $data['questions'] = Question::with('options')->get();
        $data['options'] = Option::all();
        return view('admin.quizquestion.create', $data);
     }
     return redirect()->back()->with("ERROR_MESSAGE",'You Are Not Admin');
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $quizId = $request->quiz_id;
    $selectedQuestions = $request->input('selected_questions');
  // Check if any questions are selected
  if (empty($selectedQuestions)) {
  return redirect()->back()->with('error', 'Please select at least one question.');
  }
// Store the quiz questions
$quizQuestions = [];

foreach ($selectedQuestions as $questionId) {
        $quizQuestions[] = [
        'quiz_id' => $quizId,
        'question_id' => $questionId];
            }
        Quiz_Question::insert($quizQuestions);
        return redirect()->route('quiz.index')->with('SUCCESS_MESSAGE', 'Successfully Created');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
