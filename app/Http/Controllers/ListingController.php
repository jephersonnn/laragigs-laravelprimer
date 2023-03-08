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
            'listings' => Listing::latest()->filter(request((['tag', 'search'])))->paginate(10)
            //if the <a> of a tag is clicked, a request will be sent, and the line above will handle the 
            // /?tag request, and then listing.php will handle it from here.
            // if a search is initiated, then the line above will also handle the request and proceed to listing.php
        ]); //returns a view from views folder
    }

    public function create()
    {
        return view('listings.create');
    }

    //Store 
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', Rule::unique('listings', 'email')],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        } //file upload

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

    public function edit(Listing $listing)
    {
        return view('listings.edit',['listing'=> $listing]);
    }

    //Store 
    public function update(Request $request, Listing $listing)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        } //file upload

        //finally store the filled data
        $listing->update($formFields);

        //Flash message
        return back()->with('message', 'Listing updated successfully!');
    }

    //Delete (Destroy)
    public function destroy(Listing $listing){
        $listing->delete();

        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
}
