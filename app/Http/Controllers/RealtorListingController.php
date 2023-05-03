<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\AuthController;

class RealtorListingController extends Controller
{
    public function index()
    {
        
        return inertia('Realtor/Index', ['listings' => Auth::user()->listings]);
    }
    
}
