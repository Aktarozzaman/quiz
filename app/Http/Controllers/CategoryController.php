<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=auth()->user();
        // \dd($user);
   if ($user->is_admin == '1'){ 
        $data['title']="Category List";
        $data['categories']=Category::paginate('3');
        return view('categories.index',$data);
        
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
         $data['title']="Category Create";
         $data['categories']=Category::all();

        return view('categories.create',$data); 
        }
        return redirect()->back()->with("ERROR_MESSAGE",'You Are Not Admin please contact Support');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $formData=$request->validated();
        if(Category::create($formData)){
            return redirect()->route('categories.index')->with('SUCCESS_MESSAGE','Successfully Inserted');
        }
        return redirect()->back()->withInput()->with('ERROR_MESSAGE','Something went Wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   $data['title']='Categories Edit';
        $data=Category::find($id);
       
        return view('categories.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(CategoryRequest $request, $id)
{
    if(Category::findOrFail($id)){
    $category = Category::findOrFail($id);
    $category->name = $request->name;
    $category->save();
    return redirect()->route('categories.index')->with('SUCCESS_MESSAGE','Successfully Updated');
    }
        return redirect()->back()->with('ERROR_MESSAGE','Something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         $category->delete();

    // Redirect back to the categories index page or any other desired location
    return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
