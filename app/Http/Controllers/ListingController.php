<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Inertia\Middleware;
use Inertia\Inertia;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Middleware\HandleInertiaRequests;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class ListingController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return inertia('Listing/Index',

        [ 
            'filters' => $request->only([ 'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo']),
            'listings' => Listing::orderByDesc('created_at')->paginate(10)->withQueryString()   
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
       // $this->authorize('create', Listing::class);
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
        
        $request->user()->listings()->create($request->validate([ 
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
       /* if(Auth::user()->cannot('view', $listing)){
            abort(403);
        } 
       */

       //$this->authorize('view', $listing);
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
