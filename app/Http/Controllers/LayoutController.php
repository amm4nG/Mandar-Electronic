<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        //ambil semua di table barang
        $barang = Barang::all();
        $terjual = [];
        foreach ($barang as $b) {
            $total = 0;
            //cek semua kode barang yang sama di table barangKeluar
            $bkeluar = BarangKeluar::where('kode', $b->kode)->get();
            if (optional($bkeluar)->count() == 0) {
                array_push($terjual, [
                    'id' => $b->id,
                    'kode' => $b->kode,
                    'nama_barang' => $b->nama_barang,
                    'jumlah_barang' => $b->jumlah_barang,
                    'gambar' => $b->gambar,
                    'harga' => $b->harga,
                    'total' => 0
                ]);
            } else {
                foreach ($bkeluar as $bk) {
                    $total += $bk->jumlah_barang;
                }
                array_push($terjual, [
                    'id' => $b->id,
                    'kode' => $b->kode,
                    'nama_barang' => $b->nama_barang,
                    'jumlah_barang' => $b->jumlah_barang,
                    'gambar' => $b->gambar,
                    'harga' => $b->harga,
                    'total' => $total
                ]);
            }
        }
        // dd($terjual);
        // foreach ($terjual as $t) {
        //     echo $t['kode'];
        // }
        return view('layout.produk', compact(['barang', 'terjual']));
    }

    public function home()
    {
        return view('layout.index');
    }
}