@extends('layout.master')
{{-- @include('layout.sidebar') --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        @if (Auth::user()->level == 'admin')
            {{-- Halaman Admin --}}
            <section class="content-header">
                <h5 class="alert alert-info">Produk</h5>
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                </div>
            </section>
            <section class="content">
                <!-- Default box -->
                @if (session('msg'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('insert'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('insert') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('delete'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-info btn-sm" href="{{ route('barang.create') }}">Tambah Barang</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-border table-sm">
                                <tr align="center">
                                    <th>No</th>
                                    {{-- <th>Foto</th> --}}
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stock</th>
                                    <th>Terjual</th>
                                    <th>Aksi</th>
                                </tr>
                                @forelse ($terjual as $item)
                                    <tr>
                                        <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                        {{-- <td class="align-middle text-center"><img
                                                src="{{ asset('storage/' . $item['gambar']) }}" width="75"
                                                alt="">
                                        </td> --}}
                                        <td class="align-middle text-center">{{ $item['kode'] }}</td>
                                        <td class="align-middle text-center">{{ $item['nama_barang'] }}</td>
                                        <td class="align-middle text-center">Rp.
                                            {{ number_format($item['harga']) }}</td>
                                        <td class="align-middle text-center">{{ $item['jumlah_barang'] }}</td>
                                        <td class="align-middle text-center">{{ $item['total'] }}</td>
                                        <td class="align-middle text-center">
                                            {{-- <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a> --}}
                                            <form action="{{ route('barang.destroy', $item['id']) }}" method="post">
                                                <a class="btn btn-sm btn-warning mb-1"
                                                    href="{{ route('barang.edit', $item['id']) }}"><i
                                                        class="fas fa-pen"></i></a>
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger mb-1" type="submit"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        @else
            {{-- halaman user --}}
            <section class="content-header">
                <h5 class="alert alert-info">Mandar Electronic</h5>
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                </div>
            </section>
            <section class="content">

                @if (session('keranjang'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('keranjang') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('gagal'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('gagal') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('pesananDiterima'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Terimakasih Telah Melakukan Pembelian Di <strong>Mandar Electronic</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('sudahAda'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('sudahAda') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('stockkurang'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('stockkurang') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-dark" style="width: 10rem" href="{{ route('pesanan.index') }}">
                            Keranjang Saya</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($terjual as $item)
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $item['gambar']) }}"
                                            class="card-img-top img-fluid p-3 img-responsive img-center rounded mx-auto d-block"
                                            alt="..." style="width: 50%">
                                        <div class="card-body">
                                            <h4 class="card-title font-weight-bold">{{ $item['nama_barang'] }}</h4>
                                            <p class="card-text text-success">Tersisa : {{ $item['jumlah_barang'] }}<br>
                                                Terjual : {{ $item['total'] }}
                                            </p>
                                            {{-- <p class="card-text"></p> --}}
                                            <a href="#" class="btn btn-info form-control" data-toggle="modal"
                                                data-target="#exampleModal-{{ $item['id'] }}">Add Cart</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </section>
        @endif
        <!-- Main content -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @foreach ($barang as $item)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('pesanan.store') }}" method="post" class="">
                        @csrf
                        <input type="hidden" name="status" value="0">
                        <input type="hidden" name="gambar" value="{{ $item->gambar }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Masukkan Keranjang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card p-3">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-sm mt-2">
                                        <tr>
                                            <th>Kode</th>
                                            <td><input type="text" name="kode" class="kode form-control"
                                                    value="{{ $item->kode }}"></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td><input type="text" name="nama_barang"
                                                    value="{{ $item->nama_barang }}" class="nama_barang form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td><input type="text" name="harga" value="{{ $item->harga }}"
                                                    class="harga form-control"></td>
                                        </tr>
                                        <tr>
                                            <th>Jumlah</th>
                                            <td><input autofocus type="text" value="1" name="jumlah_pesanan"
                                                    class="jumlah_barang form-control">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                style="width: 5rem">Cancel</button>
                            <button type="submit" class="btn btn-primary" style="width: 5rem">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


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
@section('scripts')
    @vite(['resources/js/app.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;
        var pusher = new Pusher('8b0a80f08ae3d6fa166d', {
            cluster: 'ap1'
        });
        var channel = pusher.subscribe('channel-pembayaran');
        channel.bind('channel-pembayaran', function(data) {
            // alert(JSON.stringify(data));
            $.ajax({
                url: "penjualan",
                success: function(result) {
                    $("#result").html(result);
                }
            });
        });
    </script>
@endsection
