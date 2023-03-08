<?php

use App\Models\Listing;
use GuzzleHttp\Psr7\Request;
use function PHPSTORM_META\map;

//"import" the model Listing
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Common Resource Routes by convention:
// index - show all 
// show - show single dats
// create - show form to create new
// store - store new
// edit - show form to edit
// update - update data
// destroy - delete 

//List All
Route::get('/', [ListingController::class, 'index']);
//Router::get('/', [controller::class, 'method']);

//Show Create Job List
Route::get('/listings/create', [ListingController::class, 'create']);

//Store Listing Data
Route::post('/listings', [ListingController::class, 'store']);

//Show Edit 
Route::get('listings/{listing}/edit', [ListingController::class,'edit']);

//Update
Route::put('listings/{listing}', [ListingController::class,'update']);

//Delete
Route::delete('listings/{listing}', [ListingController::class,'destroy']);

//Show Single 
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//---------------------

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

//Create New User (Store)
Route::post('/users', [UserController::class, 'store']);

//route in searching or finding a list, leads to listing.blade view
// Route::get('/listings/{id}', function($id){
//     return view('listing', [
//         'listing' => Listing::find($id)
//     ]);
// });

// Route::get('/{id}', function($id){
//     #debugging: ddd == die dump debug
//     #you can also use dd($id)
//     #ddd($id);
//     return response('<h1>helloooooo' . $id . '</h1>');
// });

// --------- Unresolved dependency error
// Route::get('/search', function(Request $request)
// {
//     dd($request);
// });


// Route::get('/search', function(Request $request){
//     return $request;
// });