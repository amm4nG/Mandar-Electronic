<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

class BarangController extends Controller
{
    public function create()
    {
        return view('layout.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:barang,kode',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'gambar' => 'required|mimes:png,jpg,jpeg|image',
            'harga' => 'required'
        ]);

        //ubah filesystem_disk nya jadi public ketika mau menampilkan gambar
        if ($request->hasFile('gambar')) {
            //jika ada gambar yang dikirim maka buat folder uploads dan filenya akan di enscripsi
            $path = $request->file('gambar')->store('uploads');
        } else {
            $path = '';
        }

        // Barang::create($request->except('_token'));
        $barang = new Barang();
        $barang->kode = $request->kode;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga = $request->harga;
        $barang->jumlah_barang = $request->jumlah_barang;
        $barang->gambar = $path;
        $barang->save();
        $request->session()->flash('insert', 'Barang Berhasil Ditambahkan');
        return redirect('produk');
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('layout.edit', compact(['barang']));
    }

    public function destroy($id, Request $request)
    {

        $barang = Barang::find($id);
        $pathFoto = $barang->gambar;

        if ($pathFoto != null || $pathFoto != '') {
            Storage::delete($pathFoto);
        }
        $barang->delete();
        $request->session()->flash('delete', 'Barang Berhasil Dihapus');
        return redirect('produk');
    }
}