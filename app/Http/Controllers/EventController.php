<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view ('event', [
            "eventDate" => $eventDate,
            "eventLocation" => $eventLocation,
            "isPaid" => $isPaid,
            "regisStartDate" => $regisStartDate,
            "regisEndDate" => $regisEndDate,
            "certificate" => $certificate,
            "certificateStartDate" => $certificateStartDate,
            "kategoriEvent" => $kategoriEvent            
        ]);
    }
}
