<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $user=auth()->user();
   if ($user->is_admin == '1'){ 
        $data['title']="Questions List";
        $data['categories']=Category::all();
        $data['questions']=Question::paginate(9);
        
        return view('admin.questions.index',$data);
        
        }
         return redirect()->back()->with("ERROR_MESSAGE",'You Are Not Admin please contact Support');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $user=auth()->user();

        if ($user->is_admin == '1'){
         $data['title']="Question Create";
         $data['categories']=Category::all();

        return view('admin.questions.create',$data); 
        }
        return redirect()->back()->with("ERROR_MESSAGE",'You Are Not Admin please contact Support');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['category_id']=$request->category;
        $data['title']=$request->title;
       
        $newquestion=Question::create($data);
        $newquestion_id=$newquestion->id;
           
            return redirect()->route('options.create', ['question_id' => $newquestion_id]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {  
        
    $data['title']="Question Edit";
    $question = Question::find($id);
    $categories = Category::all();
    return view('admin.questions.edit',compact('question','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
    $question = Question::findOrFail($id);
    $question->category_id = $request->category;
    $question->title = $request->title;
    $question->save();
    return redirect()->route('questions.index')->with('SUCCESS_MESSAGE','Successfully Updated');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
       
          $question->delete();

    // Redirect back to the categories index page or any other desired location
    return redirect()->route('questions.index')->with('success', 'Category deleted successfully');
    }
}
