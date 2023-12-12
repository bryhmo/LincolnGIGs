<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Http\Controllers\UserController;



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

// Common Resource Routes convention:
/*
index - show all listings 
show - show single listing 
create -   show form to create new listing 
store - store new listing 
edit - show form to edit listing
update - update listing
destroy - delete listing

*/



//All Listing 
Route::get('/',[ListingController::class,'index']);



//Show create Form
Route::get('/listings/create',[ListingController::class,'create']);

//Store  Listings Data
Route::post('/listings',[ListingController::class,'store']);

//Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit']);


//Update Listing
Route::put('/listings/{listing}',[ListingController::class,'update']);


//Update Listing
Route::delete('/listings/{listing}',[ListingController::class,'destroy']);


//Single Listings
Route::get('/listings/{listing}',[ListingController::class,'show']);


//Show Register/Create Form
Route::get('/register',[UserController::class,'create']);


//Create New User
Route::post('/users',[UserController::class,'store']);

//log user out 
Route::post('/logout',[UserController::class,'logout']);

//show login form 
Route::get('/login', [UserController::class,'login']);


//login user 
Route::post('users/authenticate',[UserController::class,'authenticate']);

//All listing
// Route::get('/', function () {
//     //lets just say we want a heading 
    
// });

//single listing 
// Route::get('/listings/{listing}',function(Listing $listing){
    
// });


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




Route::get('/about.com/{name}',function($name){
    echo "welcome .$name";
});

