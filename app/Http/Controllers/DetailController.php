<?php

namespace App\Http\Controllers;

use App\Events\PembayaranEvent;
use App\Models\BarangKeluar;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::all();
        // dd($pembayaran);
        return view('layout.transaksi', compact(['pembayaran']));
    }

    public function edit($email)
    {
        $pesanan = Pesanan::where('email', $email)->get();
        $pembayaran = Pembayaran::where('email', $email)->first();
        return view('penjualan.detail', compact(['pesanan', 'pembayaran']));
    }

    public function update(Request $request)
    {
        if ($request->status == 1) {
            $pesanan = Pesanan::where('email', $request->email)->get();
            foreach ($pesanan as $p) {
                $barang = new BarangKeluar();
                $barang->kode = $p->kode;
                $barang->nama_barang = $p->nama_barang;
                $barang->jumlah_barang = $p->jumlah_pesanan;
                $barang->save();
                // echo $barang;
            }
            $transaksi = Pembayaran::where('email', $request->email)->first();
            $pendapatan = new Transaksi();
            $pendapatan->email = $transaksi->email;
            $pendapatan->transaksi = $transaksi->total_harga;
            $pendapatan->status = 1;
            $pendapatan->save();
        } elseif ($request->status == 2) {
            $request->validate([
                'telp_kurir' => 'required'
            ]);
            $pengiriman = new Pengiriman();
            $pengiriman->email_pembeli = $request->email;
            $pengiriman->telp_kurir = $request->telp_kurir;
            $pengiriman->alamat = $request->alamat;
            $pengiriman->save();
        }

        $pembayaran = Pembayaran::where('email', $request->email)->first();
        $pembayaran->update($request->except('_token', '_method', 'telp_kurir'));
        $request->session()->flash('update', "$request->email");
        PembayaranEvent::dispatch('update status pembayaran');
        return redirect('penjualan');
        dd($pembayaran);
    }
}