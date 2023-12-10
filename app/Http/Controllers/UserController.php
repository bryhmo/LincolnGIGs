<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show Register/ Create Form
    public function create(){
        return view('users.register');
    }
}
