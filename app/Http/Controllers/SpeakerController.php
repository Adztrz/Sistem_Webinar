<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Speaker;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::all();
        return view ('speaker', compact('speakers'));
    }
}
