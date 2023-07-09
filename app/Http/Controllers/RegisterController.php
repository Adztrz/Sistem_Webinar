<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function index()
    {
        return view('login_register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'max:255']
        ]);
        
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        
        $request -> session()->flash('Registrasi Sukses'); 

        return redirect('/login');
    }







    // public function create()
    // {
    //     return view('session.register');
    // }

    // public function store()
    // {
    //     $attributes = request()->validate([
    //         'name'=>['required', 'max:50'],
    //         'email'=>['required', 'email', 'max:50', Rule::unique('users', 'email')],
    //         'password'=>['required', 'min:8']
    //     ]);
    //     $attributes['password'] = bcrypt($attributes['password']);
    //     $attributes['is_admin'] = false;

    //     session()->flash('succes', 'Akun anda berhasil dibuat.');
    //     $user = User::create($attributes);
    //     return redirect('/login')->with('succes', 'Anda dapat masuk dengan akun yang telah dibuat.');
    // }
}
