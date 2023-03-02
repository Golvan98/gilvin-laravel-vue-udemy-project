<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Foundation\Validation\ValidatesRequests;
class IndexController extends Controller
{
    
    public function index()
    {
        
        return inertia('Index/Index',

                        [ 
                            'message' => 'this is my message, hello'           
                        ]

                      );
    }

    public function show()
    {
        return inertia('Index/Show');
    }

}
