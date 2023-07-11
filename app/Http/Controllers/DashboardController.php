<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Event;
use App\Models\Registration;

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

    if(Auth::user()->role == 'User'){
    // Retrieve registrations for the current user
    $registrations = Registration::where('user_id', $user->id)->get();

    // Extract event IDs from registrations
    $eventIds = $registrations->pluck('event_id')->toArray();

    // Retrieve events based on the extracted event IDs
    $events = Event::whereIn('id', $eventIds)->get();

    return view('dashboard.event', compact('events'));
    }else{
        $events = Event::all();
        return view('dashboard.event', compact('events'));
    }

    
    }

    public function pendaftar(Request $request)
    {
        $regist = registration::all();
        $user = user::all();
        $ngevent = event::all();
        return view('dashboard.pendaftar', compact('regist','user','ngevent'));
    }

    public function update(Request $request, string $id)
    {
        $data = [
            'status'=>$request->status,
        ];
        registration::where('id',$id)->update($data);
        return redirect()->to('/dashboard/pendaftar');
    }
}
    