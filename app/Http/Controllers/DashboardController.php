<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Event;
use App\Models\Registration;

class DashboardController extends Controller
{
    public function event(Request $request)
    {
        $regs = registration::where('user_id',Auth::user()->id);
        $events = event::where('id', $regs->event_id);
        return view('dashboard.event', compact('events'));
    }
}
    