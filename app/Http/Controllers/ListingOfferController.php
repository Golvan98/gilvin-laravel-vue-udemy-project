<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Inertia\Inertia;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Middleware\HandleInertiaRequests;  
use Illuminate\Pagination\Paginator;


class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request)
    {

        $this->authorize('view' , $listing); // this is taken from Listing Policy where it determines if the user is t he owner of the listing or if the listing is sold then it cant be viewed

        $listing->offers()->save(
            Offer::make(
                $request->validate([
                    'amount' => 'required|integer|min:1|max:20000000'
                ])
            )->bidder()->associate($request->user())
        );

        return redirect()->back()->with(
            'success',
            'Offer was made!'
        );
    }
}