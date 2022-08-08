<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function store(Request $request)
    {
        foreach ($request->kode as $key => $value) {
            $pesanan = new BarangKeluar();
            $pesanan->kode = $key;
            $jumlah_pesanan =  Pesanan::where('kode', $key)->first();
            $pesanan->nama_barang = $value;
            $pesanan->jumlah_barang = $jumlah_pesanan->jumlah_pesanan;
            $pesanan->save();
            // echo $pesanan;
        }
        return redirect('/');
    }
}