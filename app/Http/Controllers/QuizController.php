<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=auth()->user();
        if ($user->is_admin == '1'){
             $data['title']='Quiz Index';
             $data['categories']=Category::all();
             $data['quizzes']=Quiz::paginate(7);

             return view('quiz.index',$data);
        }
        return redirect()->back()->with("ERROR_MESSAGE",'You Are Not Admin');
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=auth()->user();
        if ($user->is_admin == '1'){
        $data['title']="Create Quiz ";
        $data['categories']=Category::all();
        return \view('quiz.create',$data);
        }
         return redirect()->back()->with("ERROR_MESSAGE",'You Are Not Admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizRequest $request)
    {
        $validateData=$request->validated();
        
        // $category_id=$validateData->category_id;
        
        $newquiz=Quiz::create($validateData);
        $category_id=$newquiz->category_id;
        $quiz_id=$newquiz->id;
          return redirect()->route('quizquestion.create',['quiz_id' =>
          $quiz_id,'category_id' => $category_id]);
        
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
    public function destroy(Quiz $quiz)
    {
        
        $quiz->delete();

        // Redirect back to the categories index page or any other desired location
        return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully');
    }
}
