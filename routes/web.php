<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Listing;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//All listing
Route::get('/', function () {
    //lets just say we want a heading 
    return view('listings',[
        'heading'=>'Latest listings',
        'listings'=>Listing::all()
    ]);
});

//single listing 
Route::get('/listings/{listing}',function(Listing $listing){
    return view('listing',['listing'=>$listing]);
});


Route::get('/hello',function(){
    return "hello word";
});

Route::get('/hi/{id}',function($id){
    return response('you enter '.$id);
})->where('id','[0-9]+');

Route::get('/hii/{id}',function($id){
    // dd($id);
    // ddd($id);
    return response('you typed  '.$id);
})->where('id','[A-Za-z]+');



Route::get('/hye',function(){
    return response('<h1>welcome to my website </h1>',200)
    ->header('Content-Type','text/plain')
    ->header('laravel-version','laravel 10');
    
});


//helper methods for debugging
/* dd(); die dump
ddd(); die dump and debug */


//Request response
Route::get('/search', function(Request $request){
    // dd($request);
    dd($request->name.' '.$request->city);
});




