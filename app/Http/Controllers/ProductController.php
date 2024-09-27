<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $no = 1;
        $data_product = Product::orderBy('nama_produk')->get();
        return view('pages.data-product.index', compact('no', 'data_product'));
    }

    public function create()
    {
        return view('pages.data-product.create'); // Arahkan ke view form create
    }

    // Metode untuk menyimpan data produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
        ]);

        Product::create([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
        ]);

        return redirect()->route('data-product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data_product = Product::findOrFail($id);
        return view('pages.data-product.edit', compact('product'));
    }

    // Memperbarui data produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string',
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);
        $product->update([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
        ]);

        return redirect()->route('data-product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('data-product.index')->with('success', 'Produk berhasil dihapus.');
    }

}
