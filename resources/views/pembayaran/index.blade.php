@extends('layout.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h5 class="alert alert-info">Pembayaran</h5>
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
            @endif
            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($barang as $item)
                        @php
                            $total += $item->jumlah_pesanan * $item->harga;
                        @endphp
                    @endforeach
                    {{-- cek apakah si user ini punya pesanan --}}
                    @if ($barang->count() > 0 && $item->status == 1)
                        {{-- cek lagi apakah dia sudah upload bukti pembayaran --}}
                        @if (optional($pembayaran)->count() == 0)
                            <div class="alert alert-info mt-2">
                                <p class="font-weight-bold">Cara Pembayaran
                                </p>
                                <p class="">Lakukan pembayaran Anda melalui transfer Bank BCA</p>
                                <p>No. Rek 1234567890</p>
                                <p>An. Elektronik Mandar</p>
                            </div>
                            <form action="{{ route('pembayaran.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="total_harga" value="{{ $total }}">
                                <input type="hidden" name="status" value="0">
                                <input type="hidden" name="email" value="{{ $item->email }}">
                                @foreach ($barang as $item)
                                    <input type="hidden" name="kode[{{ $item->kode }}]"
                                        value="{{ $item->jumlah_pesanan }}">
                                @endforeach
                                <label for="">Alamat pengiriman</label>
                                <textarea autofocus class="form-control mb-2 @error('alamat') is-invalid @enderror" name="alamat"
                                    aria-label="With textarea" style="width: 15rem" value="{{ old('alamat') }}">
                                </textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label for="">Bukti Pembayaran</label><br>
                                <input type="file" name="gambar" accept="image/*"
                                    class="@error('gambar') is-invalid @enderror">
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-success mt-2" style="width: 5rem">Upload</button>
                            </form>
                        @else
                            @if ($pembayaran->status == 1)
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Bukti Pembayaran Disetujui</strong>,
                                    Pesanan sedang dikemas
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @elseif($pembayaran->status == 2)
                                <div class="alert alert-info mt-2">
                                    <h6 class="font-weight-bold mt-2">Pesanan anda telah dikirim
                                    </h6>
                                    <p>Telp Kurir : {{ $pengiriman->telp_kurir }}</p>
                                    <p class="font-italic">Harap konfirmasi setelah pesanan diterima</p>
                                    <form action="{{ route('pesanan.destroy', $pembayaran->email) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Pesanan Diterima</button>
                                    </form>
                                </div>
                            @else
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Upload berhasil</strong>, Bukti pembayaran akan dikonfirmasi 5 menit
                                    setelah
                                    diupload, Silahkan akses halaman ini atau di laman <strong>Pesanan</strong> untuk cek
                                    status pesanan
                                    Anda
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        @endif
                    @else
                        <h6 class="">Tidak Ada Pesanan, Klik <a href="{{ url('produk') }}">Disini</a> Untuk Belanja
                        </h6>
                    @endif
                </div>
            </div>
        </section>
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
                url: "pembayaran",
                success: function(result) {
                    $("#result").html(result);
                }
            });
        });
    </script>
@endsection
