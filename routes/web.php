<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

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
        'listings'=> [
            [
                'id' => 1,
                'title' => 'First List',
                'desc' => 'Escucha las palabras de las brujas'
            ],
            [ 
                'id' => 2,
                'title' => 'Second List',
                'desc' => 'Los secretos escondido en la noche'
            ]
        ]
    ]); //returns a view from views folder
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