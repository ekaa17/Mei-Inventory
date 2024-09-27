<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Pelacakan;
use App\Models\Product;
use Illuminate\Http\Request;

class PelacakanController extends Controller
{
    public function index(Request $request)
    {
        $no = 1;
        $title = 'Pelacakan';
    
        // Ambil filter dari request
        $tanggal = $request->input('tanggal');
        $status = $request->input('jenis');
    
        // Mulai query untuk mengambil data pelacakan
        $query = Pelacakan::query();
    
        // Filter berdasarkan tanggal jika ada
        if ($tanggal) {
            $query->whereDate('created_at', $tanggal);
        }
    
        // Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status', $status);
        }
    
        // Ambil semua data atau yang sudah difilter
        $data = $query->get();
    
        return view('pages.pelacakan.index', compact('no', 'title', 'data'));
    }
    

    public function create()
    {
        $title = 'Pelacakan';
        $produk = Product::all();
        $customer = Customer::all();
        return view('pages.pelacakan.create', compact('title', 'produk', 'customer'));
    }

    public function store(Request $request) {
        // dd($request);    
        $request->validate([
            'produk' => 'required',
            'jumlah_barang' => 'required',
            'customer' => 'required',
        ]);

        $pelacakan = new Pelacakan();
        $pelacakan->id_karyawan = auth()->user()->id;
        $pelacakan->id_customer = $request->customer;
        $pelacakan->id_produk = $request->produk;
        $pelacakan->jumlah_barang = $request->jumlah_barang;
        $pelacakan->total = $request->total;
        $pelacakan->status = 'dikemas';
        $pelacakan->bukti = null;

        $produk = Product::findOrFail($request->produk);
        $customer = Customer::findOrFail($request->customer);


        if ($produk->stok_produk >= $request->jumlah_barang) {
            if ($pelacakan->save()) {
                $produk->decrement('stok_produk', $request->jumlah_barang);
                
                $aliran_barang = new Inventory();
                $aliran_barang->jenis = 'barang keluar';
                $aliran_barang->jumlah_barang = $request->jumlah_barang;
                $aliran_barang->id_produk = $request->produk;
                $aliran_barang->id_karyawan = auth()->user()->id;
                $aliran_barang->pesan = "Pembelian " . $produk->nama_produk . " oleh " . $customer->nama;
                $aliran_barang->save();

                return redirect()->route('pelacakan.index')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->route('pelacakan.index')->with('error', 'Gagal menyimpan data');
            }
        } else {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk produk ' . $produk->nama_produk . ' !');
        }
    }

    public function update1($id) {
        $update = Pelacakan::findOrFail($id);
        $update->status = 'dikirim';

        if ($update->save()) {
            return redirect()->back()->with('success', 'Status berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate status');
        }

    }

    public function update($id, Request $request) {
        // dd($request);    
        $request->validate([
            'bukti' => 'required',
        ]);

        $bukti = $request->file('bukti');
        $imageName = now()->format('YmdHis') . '.' . $bukti->extension();
        $bukti->move(public_path('assets/img/bukti/'), $imageName);

        $update = Pelacakan::findOrFail($id);
        $update->status = 'selesai';
        $update->bukti = $imageName;

        if ($update->save()) {
            return redirect()->back()->with('success', 'Status berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate status');
        }
    }
}
