<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        // $pesanan = Pesanan::all();
        $penjualan = Pembayaran::all();
        return view('penjualan.index', compact(['penjualan']));
    }
}