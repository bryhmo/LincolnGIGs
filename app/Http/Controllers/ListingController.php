<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Validation\Rule;


class ListingController extends Controller
{
    //get and show all listing 
    public function index(){
        // dd(request());
        return view('listings.index',[
            'listings'=>Listing::latest()->filter(request(['tag','search']))->get()
        ]);
    }


    //show single listing 
    public function show(Listing $listing){
        return view('listings.show',
        ['listing'=>$listing]);
    }

    //show create form
    public function create(){
        return view('listings.create');
    }

    //store listing data
    public function store(Request $request){
        // dd($request->input());
        // dd($request->all());

        $formfields = $request->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique('listings','company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);
        if($formfields){
            return back()->with('success','you have successfully created a post');
        }
    }
}
