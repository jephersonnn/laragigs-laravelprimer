<?php

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

Route::get('/', function () {
    return view('listings', [ //after referencing a view, you can pass variables with an array.
    // in this case, the string heading holds the word 'Trending'
        'heading' => 'Trending',
        'listings'=> Listing::all()
    ]); //returns a view from views folder
});

//route in searching or finding a list
Route::get('/listings/{id}', function($id){
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});

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