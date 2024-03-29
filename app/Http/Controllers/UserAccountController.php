<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

use App\Http\Controllers\Register;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {

        
       $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]));



        Auth::login($user);
        event(new Registered($user));

        

        return redirect()->route('listing.index')->with('success', 'Account Created');
    }
}
