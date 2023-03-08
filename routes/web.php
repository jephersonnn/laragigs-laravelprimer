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
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
//on app.middleware.authenticate; attempting to post a job while logged out will redirect to login

//Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show Edit 
Route::get('listings/{listing}/edit', [ListingController::class,'edit'])->middleware('auth');

//Update
Route::put('listings/{listing}', [ListingController::class,'update'])->middleware('auth');

//Delete
Route::delete('listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Show Single 
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//---------------------

//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
//guest middleware prevents auth'd users to access guest pages
//change http.providers.RouteServiceProvider.php, to public const HOME = '/';

//Create New User (Store)
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//Logout User 
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show Login Form 
Route::get('/login', [UserController::class, 'login'])->name('login');

//Log IN User
Route::post('/users/authenticate', [UserController::class,'authenticate']);



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