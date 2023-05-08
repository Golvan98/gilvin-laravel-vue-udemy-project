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

        $filters = ['deleted' => $request->boolean('deleted'),
        ...$request->only(['by' , 'order'])
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
}
