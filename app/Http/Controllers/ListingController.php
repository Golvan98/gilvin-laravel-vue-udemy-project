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
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);
        
       

        return inertia(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                  ->filter($filters)
                  ->paginate(10)
                  ->withQueryString()
            ]
        );


    }

    public function show(Listing $listing)
    {
       /* if(Auth::user()->cannot('view', $listing)){
            abort(403);
        } 
       */

       //$this->authorize('view', $listing);
       $listing->load(['images']);
        return inertia('Listing/Show',

        [ 
            'listing' => $listing     
        ]

      );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *2
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    


}
