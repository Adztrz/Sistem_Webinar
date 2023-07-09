<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    // public function login()
    // {
    //     return view('login');
    // }

    public function index()
    {
        return view('login_register.index', [
            'title' => 'Login'
        ]);
    }
}
