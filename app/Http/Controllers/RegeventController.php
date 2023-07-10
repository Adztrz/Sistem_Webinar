<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Event;

class RegeventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(REQUEST $request)
    {   
        $data = $request;
        $event = event::where('id',$request->idevent)->first(); 
        return view('rege.regform', compact('data','event'));
    }

    public function store(Request $request)
    {
        
        $event = event::where('id',$request->idevent)->first();
        if($event->isPaid=='1'){
            $validated = $request->validate([
                'idevent' => 'required',
                'uid' => 'required',
                'telp' => 'required|numeric',
                'scam' => 'required',
                'info' => 'required',
                'pay'=> 'required|image',
            ],[
                'idevent.required' => 'Harap pilih event yang sesuai',
                'uid.required' => 'Harap login terlebih dahulu',
                'telp.required' => 'Harap isi nomor telepon',
                'telp.numeric' => 'Harap isi nomor telepon dengan angka saja',
                'scam.required' => 'Harap isi nomor identitas',
                'info.required' => 'Harap isi sumber informasi',
                'pay.required' => 'Harap upload bukti pembayaran',
                'pay.image' => 'Mohon upload dalam bentuk gambar',
            ]);

            $data = [
                'user_id'=>$request->uid,
                'event_id'=>$request->idevent,
                'noidentitas'=>$request->scam,
                'no_telp'=>$request->telp,
                'sumberInfo'=>$request->info,
                'paymentProof'=>$request->pay->store('payment-proof'),
            ];
            registration::create($data);
            return redirect()->to('dashboard/event');
        } 
        else
        {
            $validated = $request->validate([
                'idevent' => 'required',
                'uid' => 'required',
                'telp' => 'required|numeric',
                'scam' => 'required',
                'info' => 'required',
            ],[
                'idevent.required' => 'Harap pilih event yang sesuai',
                'uid.required' => 'Harap login terlebih dahulu',
                'telp.required' => 'Harap isi nomor telepon',
                'telp.numeric' => 'Harap isi nomor telepon dengan angka saja',
                'scam.required' => 'Harap isi nomor identitas',
                'info.required' => 'Harap isi sumber informasi',
            ]);
            $data = [
                'user_id'=>$request->uid,
                'event_id'=>$request->idevent,
                'noidentitas'=>$request->scam,
                'no_telp'=>$request->telp,
                'sumberInfo'=>$request->info,
            ];
            registration::create($data);
            return redirect()->to('dashboard/event');
        } 
        
    }

        


}
