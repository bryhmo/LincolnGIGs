<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingController extends Controller
{
    //get and show all listing 
    public function index(Request $request ){
        dd($request);
        $data = Listing::all();
        return view('listings.index',[
            'listings'=>$data
        ]);
    }


    //show single listing 
    public function show(Listing $listing){
        return view('listings.show',
        ['listing'=>$listing]);
    }
}
