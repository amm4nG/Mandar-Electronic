@extends('layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <h5 class="alert alert-info">Pesanan Anda</h5>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                </div>
        </section>
        {{-- halaman user --}}
        <section class="content">
            @if (session('buatpesanan'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('buatpesanan') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session('pembayaran'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('pembayaran') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (optional($pembayaran)->count() > 0)
                @if ($pembayaran->status == 0)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Bukti Pembayaran Sedang Diproses
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif($pembayaran->status == 1)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Paket Anda Sedang Dikemas
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif($pembayaran->status == 2)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Paket anda telah dikirim
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            @endif
            <!-- Default box -->
            <div class="card">
                {{-- <div class="card-header">
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-border table-sm">
                            <tr align="center">
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                            </tr>
                            @forelse ($barang as $item)
                                <tr>
                                    <td class="align-middle text-center">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="align-middle text-center"><img src="{{ asset('storage/' . $item->gambar) }}"
                                            width="75" alt="">
                                    </td>
                                    <td class="align-middle text-center">{{ $item->kode }}</td>
                                    <td class="align-middle text-center">{{ $item->nama_barang }}</td>
                                    <td class="align-middle text-center">Rp.
                                        {{ number_format($item->harga) }}</td>
                                    <td class="align-middle text-center">{{ $item->jumlah_pesanan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Tidak Ada Pesanan</td>

                                </tr>
                            @endforelse
                            <tr>
                                <td class="align-middle" colspan="4">
                                    <h6 class="mt-3 font-weight-bold">Total Pesanan : Rp.
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($barang as $item)
                                            @php
                                                $total += $item->jumlah_pesanan * $item->harga;
                                            @endphp
                                        @endforeach
                                        @php
                                            echo number_format($total);
                                        @endphp
                                    </h6>
                                </td>
                                <td colspan=""></td>
                                <td class="align-middle text-center">
                                    @if ($barang->count() > 0 && $item->status == 0)
                                        <form action="{{ route('pesanan.update', $item->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            @foreach ($barang as $item)
                                                <input type="hidden" name="kode[{{ $item->id }}]" value="1">
                                            @endforeach
                                            <button style="width: 10rem" type="submit"
                                                class="btn btn-success btn-sm mt-3">Buat
                                                Pesanan</button>
                                        </form>
                                    @elseif ($barang->count() > 0 && $item->status == 1)
                                        @if (optional($pembayaran)->count() == 0)
                                            <a class="btn btn-dark btn-sm" href="{{ url('pembayaran') }}"
                                                style="width: 5rem">Bayar</a>
                                        @else
                                            @if ($pembayaran->status == 2)
                                                <form action="{{ route('pesanan.destroy', $pembayaran->email) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button style="width: 10rem" type="submit"
                                                        class="btn btn-danger btn-sm">Pesanan
                                                        Diterima</button>
                                                </form>
                                            @else
                                                <a style="width: 10rem" class="btn btn-danger disabled btn-sm"
                                                    href="{{ url('pembayaran') }}">Pesanan Diterima</a>
                                            @endif
                                        @endif
                                    @else
                                        <a class="btn btn-dark btn-sm" href="{{ url('produk') }}"
                                            style="width: 5rem">Belanja</a>
                                    @endif
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
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
@endsection
