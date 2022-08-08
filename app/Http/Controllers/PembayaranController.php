<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function index()
    {
        $barang = Pesanan::where('email', Auth::user()->email)->get();
        $pembayaran = Pembayaran::where('email', Auth::user()->email)->first();
        $pengiriman = Pengiriman::where('email_pembeli', Auth::user()->email)->first();
        return view('pembayaran.index', compact(['barang', 'pembayaran', 'pengiriman']));
        // dd($pembayaran);
    }

    public function store(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg|image',
        ]);

        // $total_harga = 0;
        // foreach ($request->kode as $key => $value) {
        //     $pesanan = Pesanan::where('kode', $key)->first();
        //     $total_harga += $pesanan->harga * $pesanan->jumlah_pesanan;
        // }
        if ($request->hasFile('gambar')) {
            //jika ada gambar yang dikirim maka buat folder uploads dan filenya akan di enscripsi
            $path = $request->file('gambar')->store('uploads');
        } else {
            $path = '';
        }
        $pembayaran = new Pembayaran();
        $pembayaran->email = $request->email;
        $pembayaran->alamat = $request->alamat;
        $pembayaran->total_harga = $request->total_harga;
        $pembayaran->gambar = $path;
        $pembayaran->status = $request->status;
        // dd($pembayaran);
        $pembayaran->save();
        $request->session()->flash('pembayaran', 'Upload berhasil');
        return redirect('pembayaran');
    }
}