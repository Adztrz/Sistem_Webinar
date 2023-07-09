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
        $validated = $request->validate([
            'name' => 'required',
            'evd' => 'required|date_format:Y-m-d',
            'loc' => 'required',
            'price' => 'required',
            'regsd' => 'required|date_format:Y-m-d',
            'reged' =>'required|date_format:Y-m-d',
            'ct'=>'required|image',
            'pst'=>'required|image',
            'csd' =>'required|date_format:Y-m-d',
            'category' =>'required',
        ],[
            'name.required' => 'Harap isi Nama Event',
            'evd.date_format' => 'Harap masukkan format tanggal yang sesuai YYYY-MM-DD',
            'evd.required' => 'Harap isi Event Date',
            'loc.required' => 'Harap isi Lokasi Event',
            'price.required' => 'Harap isi Harga Tiket Masuk',
            'regsd.date_format' => 'Harap masukkan format tanggal yang sesuai YYYY-MM-DD',
            'regsd.required' => 'Harap isi Registration Start Date',
            'reged.date_format' =>'Harap masukkan format tanggal yang sesuai YYYY-MM-DD',
            'reged.required' =>'Harap isi Registration End Date',
            'ct.required'=>'Harap Upload Template Certificate',
            'ct.image'=>'Harap Upload Template Certificate dalam Format Gambar',
            'pst.required'=>'Harap Upload Poster',
            'pst.image'=>'Harap Upload Poster dalam Format Gambar',
            'csd.date_format' =>'Harap masukkan format tanggal yang sesuai YYYY-MM-DD',
            'csd.required' =>'Harap isi Certificate Start Date',
            'category.required' =>'Harap isi kategori event',
            ]);

        $data = [
            'eventName'=>$request->name,
            'eventDate'=>$request->evd,
            'eventLocation'=>$request->loc,
            'isPaid'=>$request->price,
            'regisStartDate'=>$request->regsd,
            'regisEndDate'=>$request->reged,
            'certificate'=>$request->ct->store('certificate-template'),
            'poster'=>$request->pst->store('poster'),
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
        $data = event::where('id',$id)->first();
        return view('event.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'evd' => 'required|date_format:Y-m-d',
            'loc' => 'required',
            'price' => 'required',
            'regsd' => 'required|date_format:Y-m-d',
            'reged' =>'required|date_format:Y-m-d',
            'ct'=>'required|image',
            'pst'=>'required|image',
            'csd' =>'required|date_format:Y-m-d',
            'category' =>'required',
        ],[
            'name.required' => 'Harap isi Nama Event',
            'evd.date_format' => 'Harap masukkan format tanggal yang sesuai YYYY-MM-DD',
            'evd.required' => 'Harap isi Event Date',
            'loc.required' => 'Harap isi Lokasi Event',
            'price.required' => 'Harap isi Harga Tiket Masuk',
            'regsd.date_format' => 'Harap masukkan format tanggal yang sesuai YYYY-MM-DD',
            'regsd.required' => 'Harap isi Registration Start Date',
            'reged.date_format' =>'Harap masukkan format tanggal yang sesuai YYYY-MM-DD',
            'reged.required' =>'Harap isi Registration End Date',
            'ct.required'=>'Harap Upload Template Certificate',
            'ct.image'=>'Harap Upload Template Certificate dalam Format Gambar',
            'pst.required'=>'Harap Upload Poster',
            'pst.image'=>'Harap Upload Poster dalam Format Gambar',
            'csd.date_format' =>'Harap masukkan format tanggal yang sesuai YYYY-MM-DD',
            'csd.required' =>'Harap isi Certificate Start Date',
            'category.required' =>'Harap isi kategori event',
            ]);

        $data = [
            'eventName'=>$request->name,
            'eventDate'=>$request->evd,
            'eventLocation'=>$request->loc,
            'isPaid'=>$request->price,
            'regisStartDate'=>$request->regsd,
            'regisEndDate'=>$request->reged,
            'certificate'=>$request->ct->store('certificate-template'),
            'poster'=>$request->pst->store('poster'),
            'certificateStartDate'=>$request->csd,
            'kategoriEvent'=>$request->category,
        ];

        event::where('id',$id)->update($data);
        return redirect()->to('/event');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        event::where('id',$id)->delete();
        return redirect()->to('/event');
    }
}
