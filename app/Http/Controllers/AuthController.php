<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create()
    {
            return inertia('Auth/Login');
    }

    public function store()
    {

    }

    public function destroy()
    {

    }

    public function update()
    {

    }
}