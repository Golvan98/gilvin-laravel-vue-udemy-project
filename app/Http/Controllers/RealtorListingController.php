<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\AuthController;
use App\Models\Listing;
use Illuminate\Pagination\Paginator;

class RealtorListingController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {

        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];
        
        return inertia('Realtor/Index', [
            'filters' => $filters, 
            'listings' => Auth::user()->listings()->filter($filters)->paginate(5)->withQueryString() ]);
        //->mostRecent()
    }
    

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();       

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }

    public function edit(Listing $listing)
    {
        return inertia('Realtor/Edit',

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

        return redirect()->route('realtor.listing.index')->with('success', 'Listing EDITED');
        
    }

    public function create()
    {
       // $this->authorize('create', Listing::class);
        return inertia('Realtor/Create');
        //
    }

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

        return redirect()->route('realtor.listing.index')->with('success', 'Listing was created');
    }

    public function restore(Listing $listing)
    {
        $listing->restore();
        return redirect()->back()->with('success', 'listing restored');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
