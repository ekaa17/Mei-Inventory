<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|numeric',
            'stok_produk' => 'required|integer',
        ]);

        User::create([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
        ]);

        return redirect()->route('data-product.index')->with('success', 'Produk berhasil ditambahkan.');
    }
}
