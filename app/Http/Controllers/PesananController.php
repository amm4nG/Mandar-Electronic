<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pengiriman;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{

    public function index()
    {
        $barang = Pesanan::where('email', Auth::user()->email)->get();
        $pembayaran = Pembayaran::where('email', Auth::user()->email)->first();
        $pengiriman = Pengiriman::where('email_pembeli', Auth::user()->email)->first();
        // dd($pesanan);
        return view('pesanan.index', compact(['barang', 'pembayaran', 'pengiriman']));
    }

    public function store(Request $request)
    {
        $barang = Pesanan::where('email', Auth::user()->email)->first();
        $cek_barang = Pesanan::where('email', Auth::user()->email)->get();
        if (optional($barang)->count() == 0) {
            $request->validate([
                'jumlah_pesanan' => 'required'
            ]);
            // dd($request->all());
            Pesanan::create($request->except('_token'));
            $request->session()->flash('keranjang', 'Barang Berhasil Dimasukkan Kedalam Keranjang');
            return redirect('produk');
        } elseif ($barang->count() > 0 && $barang->status == 1) {
            $request->session()->flash('gagal', "Mohon Maaf, Tunggu Sampai Pesanan Sebelumnya Selesai!");
            return redirect('produk');
        } else {
            $request->validate([
                'jumlah_pesanan' => 'required'
            ]);
            foreach ($cek_barang as $cek) {
                if ($cek->kode == $request->kode) {
                    $request->session()->flash('sudahAda', 'Barang Sudah Dimasukkan Kedalam Keranjang');
                    return redirect('produk');
                }
            }
            // dd($request->all());
            Pesanan::create($request->except('_token'));
            $request->session()->flash('keranjang', 'Barang Berhasil Dimasukkan Kedalam Keranjang');
            return redirect('produk');
        }
    }

    public function update(Request $request)
    {
        foreach ($request->kode as $key => $value) {
            $barang = Pesanan::find($key);
            // echo $barang->nama_barang;
            $barang->status = $value;
            $barang->save();
        }
        $request->session()->flash('buatpesanan', 'Pesanan Berhasil Dibuat, Sillahkan Melakukan Pembayaran');
        return redirect('pesanan');
    }

    public function destroy($email, Request $request)
    {
        // delete pesanan
        $pesanan = Pesanan::where('email', $email)->get();
        foreach ($pesanan as $p) {
            $p->delete();
        }
        // hapus bukti pembayaran
        $pembayaran = Pembayaran::where('email', $email)->first();
        $pathFoto = $pembayaran->gambar;
        if ($pathFoto != null || $pathFoto != '') {
            Storage::delete($pathFoto);
        }
        $pembayaran->delete();
        //hapus pengiriman
        $pengiriman = Pengiriman::where('email_pembeli', $email)->first();
        $pengiriman->delete();
        $request->session()->flash('pesananDiterima', "Terimakasih Telah Melakukan Pembelian Di Mandar Electronic");
        return redirect('produk');
    }
}