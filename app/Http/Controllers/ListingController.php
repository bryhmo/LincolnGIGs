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


    //store Listing Data
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
            $formfields['logo'] = $request->file('logo')->store('logos','public');
        }
        //setting the user that is on session and created a listing with the listing id 
        $formfields['user_id'] = auth()->id();
        if($formfields){
            Listing::create($formfields);
            return redirect('/')->with('success','Listing created successfully');
            // return back()->with('success','you have successfully created a post');
        }
    }

    //Show Edit Form 
    public function edit(Listing $listing){
        // dd($listing);
        // dd($listing->title);
        return view('listings.edit',['listing'=>$listing]);
    }

    //Update Listing Data
    public function update(Request $request,Listing $listing){
        // dd($request->input());
        // dd($request->all());
        // dd($request->file('logo'));
        $formfields = $request->validate([
            'title'=>'required',
            'company'=>'required',
            'location'=>'required',
            'website'=>'required',
            'email'=>['required','email'],
            'tags'=>'required',
            'description'=>'required'
        ]);

        //file upload checker 
        if($request->hasFile('logo')){
            $formfields['logo'] = $request->file('logo')->store('logos','public');
        }
        if($formfields){
            $listing->update($formfields);
            return back()->with('success','Listing Upadted successfully');
            // return back()->with('success','you have successfully created a post');
        }
    }

    //Delete listing 
    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with('success',"Listing deleted successfully");
    }
}
