<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class AuthController extends Controller
{
    public function signin()
    {
        $data['title']="Signin";
        return  view('auth.signin',$data); 
    }
    public function post_signin(SigninRequest $request)
    {
        $user=User::where('email',$request->get('email'))->first();

        if(!$user){
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['email'=>'The Email dosn\'t match Our records']);
        }
        if(!Hash::check($request->get('password'),$user->password)){
            return redirect()
            ->back()
            ->withInput()
            ->withErrors(['email'=>'Incorrect Username Or Password']);
        }
    $credentials = $request->only('email', 'password');
    
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        
        if ($user->is_admin==1) {
            // Admin user
            return \redirect()->route('categories.index');
        } else {
            
            // Regular user
            return redirect()->route('test');
        }
    } else {
        // Invalid credentials
        return back()->withErrors(['email' => 'Invalid email or password.']);
    }
    }
    public function signup()
    {
        $data['title']="Signup";
        return view('auth.signup',$data);
    }
    public function post_signup(SignupRequest $request)
    {
        $validateData=$request->validated();
        if(User::create($validateData)){
        return redirect()
        ->route('signin')
        ->with('SUCCESS_MESSAGE','You Have been successfuly Registired'); 
        }
        return redirect()
        ->back()
        ->withInput()
        ->with('ERROR_MESSAGE','Something Went Wrong! .Please Try again');
    
    }
    public function signout()
    {
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('signin')->with("SUCCESS_MESSAGE",'Log Out Successfully');
    }

}
