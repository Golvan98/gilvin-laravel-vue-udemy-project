<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\AuthController;
use App\Models\Listing;

class RealtorListingController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index()
    {
        
        return inertia('Realtor/Index', ['listings' => Auth::user()->listings]);
    }
    

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();       

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
