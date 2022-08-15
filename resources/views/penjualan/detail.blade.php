@extends('layout.master')
{{-- @include('layout.sidebar') --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </section>
        {{-- Halaman Admin --}}
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h5 class="font-weight-bold">Detail Pesanan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-border table-sm">
                                    @forelse ($pesanan as $item)
                                        <tr>
                                            <td class="align-middle text-left">{{ $item->nama_barang }}</td>
                                            <td class="align-middle text-right">Rp. {{ number_format($item->harga) }} x
                                                {{ $item->jumlah_pesanan }}</td>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                    <tr>
                                        <td class="align-middle">Alamat</td>
                                        <td class="text-right">
                                            {{ $pembayaran->alamat }}
                                        </td>
                                    </tr>
                                    @foreach ($pesanan as $item)
                                    @endforeach
                                    <tr>
                                        <td class="align-middle">Tanggal Pemesanan</td>
                                        <td class="text-right">
                                            {{ $item->date }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle font-weight-bold">
                                            Total pembayaran
                                        </td>
                                        <td class="align-middle font-weight-bold text-right">Rp.
                                            {{ number_format($pembayaran->total_harga) }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <center> --}}
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-sm-6 bg-light p-3">
                                @if ($pembayaran->status == 0)
                                    <h5 class="mt-2 mb-3 font-weight-bold text-center">Bukti Pembayaran</h5>
                                    <img class="img-fluid" src="{{ asset('storage/' . $pembayaran->gambar) }}"
                                        alt="">
                                    <h5 class="mt-3 font-weight-bold"></h5>
                                    <form action="{{ route('detail.update', $pembayaran->email) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="email" value="{{ $pembayaran->email }}">
                                        <input type="hidden" name="total_harga" value="{{ $pembayaran->total_harga }}">
                                        <input type="hidden" name="gambar" value="{{ $pembayaran->gambar }}">
                                        <input type="hidden" name="status" value="1">
                                        <button type="submit"
                                            class="btn btn-success font-weight-bold btn-sm form-control">Konfirmasi
                                            Pembayaran</button>
                                    </form>
                                @elseif($pembayaran->status == 1)
                                    <form action="{{ route('detail.update', $pembayaran->email) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <label for="" class="text-left">Telp. Kurir</label>
                                        <input type="hidden" name="alamat" value="{{ $pembayaran->alamat }}">
                                        <input autofocus type="text" name="telp_kurir"
                                            class="form-control @error('telp_kurir') is-invalid @enderror">
                                        <input type="hidden" name="email" value="{{ $pembayaran->email }}">
                                        <input type="hidden" name="total_harga" value="{{ $pembayaran->total_harga }}">
                                        <input type="hidden" name="gambar" value="{{ $pembayaran->gambar }}">
                                        <input type="hidden" name="status" value="2">
                                        <button type="submit"
                                            class="font-weight-bold btn btn-primary btn-sm mt-2 form-control">Serahkan
                                            Kekurir</button>
                                    </form>
                                @elseif($pembayaran->status == 2)
                                    <h5 class="font-weight-bold text-center text-info mt-4">Paket telah dikirim
                                    </h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- </center> --}}
                </div>
                {{-- <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer--> --}}
            </div>
            <!-- /.card -->

        </section>
        <!-- Main content -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
@endsection
@section('script')
    <script></script>
@endsection
