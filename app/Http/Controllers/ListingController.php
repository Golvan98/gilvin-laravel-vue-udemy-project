<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Inertia\Middleware;
use Inertia\Inertia;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Middleware\HandleInertiaRequests;  

class ListingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

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

        return redirect()->route('listing.index')->with('success', 'Listing was created');
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

    public function edit(Listing $listing)
    {
        return inertia('Listing/Edit',

        [ 
            'listing' => $listing     
        ]

      );
    }


    public function update(Request $request, Listing $listing)
    {
        $listing->update($request->validate([ 
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'area' => 'required|integer|min:0|max:20',
            'city' => 'required', 
            'code' => 'required',
            'street' => 'required',
            'street_nr' => 'required|integer|min:0|max:1000',
            'price' => 'required|integer|min:0|max:2000000',
        ]));

        return redirect()->route('listing.index')->with('success', 'Listing EDITED');
        
    }


    public function destroy(Listing $listing)
    {

        
        $listing->delete();
        
        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
    
}
