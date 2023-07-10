<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class DashboardController extends Controller
{
    public function event(Request $request)
    {
        $events = event::all();
        return view('dashboard.event', compact('events'));
    }
}
    