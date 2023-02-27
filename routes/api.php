<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# http://laragigs.test/search?name=Hello&city=CDO ----------------------
// Route::get('/search', function (Request $request) {
//     return $request->name . ' ' . $request->city;
// });

//http://laragigs.test/api/posts ----------------------------------------
//returns a JSON file
// Route::get('/posts', function () {
//     return response()->json([
//         'posts' => [
//             [
//                 'title' => 'Post Title'
//             ]
//         ]
//     ]);
// });