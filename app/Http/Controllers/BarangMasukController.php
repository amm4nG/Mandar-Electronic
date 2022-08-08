<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required'
        ]);

        if ($request->tambah_stock != null || $request->tambah_stock != '') {
            BarangMasuk::create($request->except('_token', 'jumlah_barang'));
        }
        $barang = Barang::where('kode', $request->kode)->first();
        $barang->kode = $request->kode;
        $barang->nama_barang = $request->nama_barang;
        $barang->save();
        $request->session()->flash('msg', 'Perubahan success');
        return redirect('produk');
    }
}