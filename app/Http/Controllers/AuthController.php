<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\forgetPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{




    public function forgetpassword()
    {
        return view('auth.forget');
    }

    public function postForgetPassword(Request $request)
    {
        $user= User::getEmailSingle($request->email);
        if(!empty($user))
        {
            $user->remember_token = Str::random(10);
            $user->save();
            Mail::to($user->email)->send(new forgetPasswordMail($user));
            return back()->with('success','Please check your email and reset your password');
        }
        else{
            return back()->withErrors(['email'=>'Invalid Email'])->onlyInput('email');
        }

    }

    public function reset($remember_token)
    {
        $user= User::getTokenSingle($remember_token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset',$data);

        }
        else{
            abort(404);
        }
    }


    public function Postreset($token, Request $request)
    {
        if($request->password == $request->cpassword)
        {
            $user= User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(10);
            $user->save();
            return redirect()->route('login')->with('success','Password Successfully Reset..You can now Log in');
        }
        else
        {
            return back()->with('error','Password and Confirm Password does not match');
        }

    }

}
