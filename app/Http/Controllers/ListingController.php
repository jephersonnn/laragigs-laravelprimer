<?php

namespace App\Http\Controllers;
// <!-- generate with $php artisan make:controller ListingController   -->
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listing
    public function index()
    {
        return view('listings.index', [ //after referencing a view, you can pass variables with an array.
            'listings' => Listing::latest()->filter(request((['tag','search'])))->get()
            //if the <a> of a tag is clicked, a request will be sent, and the line above will handle the 
            // /?tag request, and then listing.php will handle it from here.
            // if a search is initiated, then the line above will also handle the request and proceed to listing.php
        ]); //returns a view from views folder
    }

    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('listings','company')],
            'location'=>'required',
            'email'=>['required', Rule::unique('listings','email')],
            'website'=>'required',
            'tags'=>'required',
            'description'=>'required',
        ]);

        //finally store the filled data
        Listing::create($formFields);

        //Flash message
        return redirect('/')->with('message', 'Listing created successfully!');
    }


    public function show(Listing $listing)
    {
        //Route model binding, cleaner codes
        //function(Listing) goes through if there's a matching listing ID
        return view('listings.show', ['listing' => $listing]);
    }


}
