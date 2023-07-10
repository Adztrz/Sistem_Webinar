<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{   
    public function dashboard()
    {
        return view('dashboard.home');
    }

    public function index()
    {
        $user = User::orderBy('role', 'asc')
        ->orderBy('name', 'asc')
        ->paginate(20);

        return view('dashboard.user', compact('user'));

    }

    public function update(Request $request, string $id)
    {
        $data = [
            'role'=>$request->role,
        ];
        user::where('id',$id)->update($data);
        return redirect()->to('/dashboard/admin');
    }
}
