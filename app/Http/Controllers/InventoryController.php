<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $no = 1;
        $title = 'Inventory';

        // Inisialisasi query Inventory
        $query = Inventory::query();

        // Filter berdasarkan tanggal jika ada
        if ($request->has('tanggal') && $request->tanggal) {
            $query->whereDate('created_at', $request->tanggal);
        }

        // Filter berdasarkan jenis ikan (barang masuk/keluar) jika ada
        if ($request->has('jenis_ikan') && $request->jenis_ikan) {
            $query->where('jenis', $request->jenis_ikan);
        }

        // Ambil data sesuai filter
        $data = $query->get();

        return view('pages.inventory.index', compact('no', 'title', 'data'));
    }

    public function create()
    {
        $title = 'Inventory';
        $produk = Product::all();
        return view('pages.inventory.create', compact('title', 'produk'));
    }

    public function store(Request $request) {
        // dd($request);    
        $request->validate([
            'produk' => 'required',
            'jumlah_barang' => 'required',
            'jenis' => 'required',
        ]);

        $jenis = $request->jenis;

        $aliran_barang = new Inventory();
        $aliran_barang->jenis = $jenis;
        $aliran_barang->jumlah_barang = $request->jumlah_barang;
        $aliran_barang->id_produk = $request->produk;
        $aliran_barang->id_karyawan = auth()->user()->id;
        $aliran_barang->pesan = $request->pesan;

        $produk = Product::findOrFail($request->produk);


        if ($request->jenis === 'barang masuk') {
            if ($aliran_barang->save()) {
                $produk->increment('stok_produk', $request->jumlah_barang);
                return redirect()->route('inventory.index')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->route('inventory.index')->with('error', 'Gagal menyimpan data');
            }
        } else {
            if ($produk->stok_produk >= $request->jumlah_barang) {
                if ($aliran_barang->save()) {
                    $produk->decrement('stok_produk', $request->jumlah_barang);
                    return redirect()->route('inventory.index')->with('success', 'Data berhasil disimpan!');
                } else {
                    return redirect()->route('inventory.index')->with('error', 'Gagal menyimpan data');
                }
            } else {
                return redirect()->back()->with('error', 'Stok tidak mencukupi untuk produk ' . $produk->nama_produk . ' !');
            }
        }
    }
}
