<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class DashboardController extends Controller
{
    // public function event(Request $request)
    // {
    //     $regs = registration::where('user_id',Auth::user()->id);
    //     $events = event::where('id', $regs->event_id);
    //     return view('dashboard.event', compact('events'));
    // }
    public function event(Request $request)
    {
    $user = Auth::user();

        // Retrieve registrations for the current user
    $registrations = Registration::where('user_id', $user->id)->get();

    // Extract event IDs from registrations
    $eventIds = $registrations->pluck('event_id')->toArray();

    // Retrieve events based on the extracted event IDs
    $events = Event::whereIn('id', $eventIds)->get();

    return view('dashboard.event', compact('events'));
    }
}
    