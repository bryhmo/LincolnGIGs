<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/ Create Form
    public function create(){
        return view('users.register');
    }

    //Create New User 
    public function store(Request $request){
        $formFields = $request->validate([
            'name'=>['required','min:3','max:15'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required|confirmed|min:6',
        ]);
        //Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create( $formFields);

        //login 
        auth()->login($user);

        return redirect('/')->with('success','user created and logged in ');

    }
    //logout user 
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success','you have been logged out!');
    }

    //show login form 
    public function login(){
        return view('users.login');
    }

    //Authenticate User login
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'=>['required','email'],
            'password'=>'required',
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            
            return redirect('/')->with('success','you are now logged in');
        }

        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

    }





}



