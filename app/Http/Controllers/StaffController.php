<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $no = 1;
        $data = User::orderBy('name')->get();
        return view('pages.data-staff.index', compact('no', 'data'));
    }

    public function create()
    {
        return view('pages.data-staff.create'); // Arahkan ke view form create
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'role' => 'required',
            'password' => 'required'
        ]);

       if ($request->hasFile('profile')) {
        $profile = $request->file('profile');
        $imageName = now()->format('YmdHis') . $request->email . '.' . $profile->extension();
        $profile->move(public_path('assets/img'), $imageName);
       } else {
        $imageName=null;
       }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'profile' => $imageName ,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('data-staff.index')->with('success', 'Produk berhasil ditambahkan.');
    }
}
