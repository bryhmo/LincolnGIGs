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
            'listings'=>Listing::latest()
            ->filter(request([
                'tag','search']))->paginate(6)
                // ->simplePaginate(2)
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
        // dd($request->file('logo'));
        $formfields = $request->validate([
            'title'=>'required',
            'company'=>['required',Rule::unique('listings','company')],
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);

        //file upload checker 
        if($request->hasFile('logo')){
            $formfields['logo'] = $request->file('logo')
                                  ->store('logos','public');
        }
        if($formfields){
            Listing::create($formfields);
            return redirect('/')
            ->with('success','Listing created successfully');
            // return back()->with('success','you have successfully created a post');
        }
    }
}
