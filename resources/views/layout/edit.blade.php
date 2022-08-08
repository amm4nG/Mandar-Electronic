@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <form action="{{ route('barangMasuk.store') }}" class="mt-3" method="post">
                        @csrf
                        <div class="card p-3 mt-2 bg-light">
                            {{-- <h6 class="mb-3 text-center alert alert-info">Tambah Stock</h6> --}}
                            <center>
                                <img src="{{ asset('storage/' . $barang->gambar) }}" class="mb-3" alt=""
                                    width="200">
                            </center>
                            <label for="">Kode Barang</label>
                            <input type="text" name="kode" value="{{ $barang->kode }}"
                                class="form-control @error('kode') is-invalid @enderror">
                            @error('kode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="" class="mt-2">Nama Barang</label>
                            <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}"
                                class="form-control @error('nama_barang') is-invalid @enderror">
                            @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="" class="mt-2">Tersisa</label>
                            <input type="number" name="jumlah_barang" value="{{ $barang->jumlah_barang }}"
                                class="form-control @error('jumlah_barang') is-invalid @enderror">
                            @error('jumlah_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="" class="mt-2">Tambah Stock</label>
                            <input autofocus type="number" name="tambah_stock" value="{{ old('tambah_stock') }}"
                                class="form-control @error('tambah_stock') is-invalid @enderror">
                            @error('tambah_stock')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <button class="btn btn-success form-control mt-3">Tambah Stock</button>
                            <a class="btn btn-secondary mt-2 form-control" href="{{ url('produk') }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>
@endsection
