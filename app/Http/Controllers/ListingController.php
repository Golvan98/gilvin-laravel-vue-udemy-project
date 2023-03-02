<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Inertia\Middleware;
use Inertia\Inertia;
use App\Http\Middleware\HandleInertiaRequests;  
use Illuminate\Foundation\Validation\ValidatesRequests;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Listing/Index',

        [ 
            'listings' => Listing::all()      
        ]

        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Listing/Create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *2
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Listing::create($request->validate([ 
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'area' => 'required|integer|min:0|max:20',
            'city' => 'required', 
            'code' => 'required',
            'street' => 'required',
            'street_nr' => 'required|integer|min:0|max:1000',
            'price' => 'required|integer|min:0|max:2000000',
        ]));

        return redirect()->route('listing.create')->with('success', 'Listing was created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        return inertia('Listing/Show',

        [ 
            'listing' => $listing     
        ]

      );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
