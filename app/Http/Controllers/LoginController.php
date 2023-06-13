<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Supoprt\Facades\Auth;


class LoginController extends Controller
{
    public function create()
    {
        view('login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }
    
    if (Auth::attempt)
}
