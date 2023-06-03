<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\OptionRequest;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['questions'] = Question::with('options')->get();
        $data['options']=Option::all();
        return \view('admin.options.index',$data);
        
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request)
    {  $user=auth()->user();
         $question_id = $request->input('question_id');
        

        if ($user->is_admin == '1'){
         $data['title']="Options Create";
         $questions=Question::find($question_id);
        // dd($questions->title);
        return view('admin.options.create',compact('questions','data')); 
        }
        return redirect()->back()->with("ERROR_MESSAGE",'You Are Not Admin please contact Support');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionRequest $request)
    {
        $validatedData = $request->validated();
    foreach ($validatedData['options'] as $key => $optionText) {
        $option = new Option();
        $option->question_id = $validatedData['question_id'];
        $option->name = $optionText;
        $iscorrect=($key + 1) == $validatedData['correct_answer'];
        $option->is_correct=$iscorrect;
        $option->save();
        }
            return redirect()->route('options.index')->with('SUCCESS_MESSAGE','Successfully Inserted');
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
         $user=auth()->user();

        if ($user->is_admin == '1'){
         $data['title']="Options Create";
         $data['questions']=Question::find($id);
         $data['options']=Option::all();
         \dd($data);
        return view('admin.options.edit',$data); 
        }
        
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
