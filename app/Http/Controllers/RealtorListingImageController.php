<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\ListingImage;

class RealtorListingImageController extends Controller
{
    public function create(Listing $listing)
    {
        return inertia(
            'Realtor/ListingImage/Create',
            ['listing' => $listing]
        );
    }

    public function store(Listing $listing, Request $request)
    {
        dd('work test');
    }
}
