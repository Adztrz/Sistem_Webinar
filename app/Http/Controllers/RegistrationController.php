<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Registration;

class RegistrationController extends Controller
{
    public function index()
    {
        $registartions = Registration::all();
        return view ('registration', compact('registrations'));
    }
}
