<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Supoprt\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        view('login');
    }
}
