<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        // dd($request);
        // $request->validate([
        //     'email' => 'required',
        //     'password'=> 'required' 
        //  ], [
        //     'email.required' => 'Kolom Email tidak boleh kosong.',
        //     'password.required' => 'Kolom Password tidak boleh kosong.',
        // ]);


         if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            
            if ($user->role === 'Admin' || $user->role === 'Karyawan') {
                return redirect('/dashboard');
            } else {
                return redirect('/')->with('wrong', 'Role tidak Ditemukan !');
            }
        } else {
            return redirect('/')->with('wrong', 'Email dan password tidak tersedia');
        }
    }

    public function logout() {
        if (Auth::check()) {
            $role = Auth::user()->role;
    
           if ($role === 'Admin' || $role === 'Karyawan') {
                Auth::logout();
            }
        } 
        return redirect('/');
    }
}
