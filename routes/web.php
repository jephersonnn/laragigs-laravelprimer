<?php

use App\Http\Controllers\ListingController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

//"import" the model Listing
use App\Models\Listing; 

use function PHPSTORM_META\map;

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

//List All
Route::get('/', [ListingController::class, 'index']);

//Route model binding, cleaner codes
//function(Listing) goes through if there's a matching listing ID
Route::get('/listings/{listing}', [ListingController::class, 'show']);

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