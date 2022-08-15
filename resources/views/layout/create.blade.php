@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <form action="{{ route('barang.store') }}" class="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card p-3 mt-2">
                            <div class="card-header">
                                <h6 class="text-center alert alert-danger">Form Tambah Barang</h6>
                            </div>
                            <label class="mt-2" for="">Kode Barang <span class="text-danger">*</span></label>
                            <input autofocus type="text" value="{{ old('kode') }}" name="kode"
                                class="form-control @error('kode') is-invalid @enderror">
                            @error('kode')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label class="mt-2" for="">Nama Barang <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('nama_barang') }}" name="nama_barang"
                                class="form-control @error('nama_barang') is-invalid @enderror">
                            @error('nama_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label class="mt-2" for="">Harga Barang <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('harga') }}" name="harga"
                                class="form-control @error('harga') is-invalid @enderror">
                            @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label class="mt-2" for="">Jumlah Barang <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('jumlah_barang') }}" name="jumlah_barang"
                                class="form-control @error('jumlah_barang') is-invalid @enderror">
                            @error('jumlah_barang')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label class="mt-2" for="">Foto <span class="text-danger">*</span></label>
                            <input type="file" name="gambar" class="@error('gambar') is-invalid @enderror">
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <button class="btn btn-success btn-sm mt-3 form-control">Simpan</button>
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
