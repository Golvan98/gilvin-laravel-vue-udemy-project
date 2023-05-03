<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RealtorListingController extends Controller
{
    public function index()
    {
        return inertia('Realtor/Index');
    }
}
