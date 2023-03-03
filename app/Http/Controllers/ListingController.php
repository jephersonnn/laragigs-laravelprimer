<?php

namespace App\Http\Controllers;
// <!-- generate with $php artisan make:controller ListingController   -->
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //show all listing
    public function index()
    {
        return view('listings.index', [ //after referencing a view, you can pass variables with an array.
            // in this case, the string heading holds the word 'Trending'
            'heading' => 'Trending',
            'listings' => Listing::all()
        ]); //returns a view from views folder
    }

    public function show(Listing $listing)
    {
        //Route model binding, cleaner codes
        //function(Listing) goes through if there's a matching listing ID
        return view('listings.show', ['listing' => $listing]);
    }
}
