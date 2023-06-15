<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name'=>['required', 'max:50'],
            'email'=>['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password'=>['required', 'min:8']
        ]);
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['is_admin'] = false;

        session()->flash('succes', 'Akun anda berhasil dibuat.');
        $user = User::create($attributes);
        return redirect('/login')->with('succes', 'Anda dapat masuk dengan akun yang telah dibuat.');
    }
}
