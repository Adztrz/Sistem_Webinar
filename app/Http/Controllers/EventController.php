<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $events = event::all();
        return view('event.event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'eventName'=>$request->name,
            'eventDate'=>$request->evd,
            'eventLocation'=>$request->loc,
            'isPaid'=>$request->price,
            'regisStartDate'=>$request->regsd,
            'regisEndDate'=>$request->reged,
            'certificate'=>$request->ct->store('certificate-template'),
            'poster'=>$request->ct->store('poster'),
            'certificateStartDate'=>$request->csd,
            'kategoriEvent'=>$request->category,
        ];

        event::create($data);
        return redirect()->to('event');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
