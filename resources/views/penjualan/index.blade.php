@extends('layout.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h5 class="alert alert-info">Pemesanan</h5>
            <div class="row">
                <div class="col-sm-6">
                </div>
            </div>
        </section>
        {{-- Halaman Admin --}}
        <section class="content">
            <!-- Default box -->
            @if (session('update'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Perubahan status pesanan <strong>{{ session('update') }}</strong> success
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-border table-sm">
                            <tr align="center">
                                <th>No</th>
                                <th>Email</th>
                                <th colspan="2">Total Pembayaran</th>
                                <th></th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                            {{-- <tbody id="result"> --}}
                            @forelse ($penjualan as $item)
                                <tr>
                                    <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                    <td class="align-middle text-center">{{ $item->email }}</td>
                                    <td class="align-middle text-center" colspan="2">Rp.
                                        {{ number_format($item->total_harga) }}</td>
                                    <td></td>
                                    <td class="align-middle text-center">
                                        @if ($item->status == 0)
                                            Menunggu Konfirmasi
                                        @elseif($item->status == 1)
                                            Menunggu pengiriman
                                        @elseif($item->status == 2)
                                            Telah Dikirim
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        {{-- <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a> --}}
                                        <form action="" method="post">
                                            <a class="btn btn-sm btn-info"
                                                href="{{ route('detail.edit', $item->email) }}"><i class="fas fa-info"
                                                    style="width: 1rem"></i></a>
                                            @csrf
                                            @method('delete')
                                            {{-- <button class="btn btn-sm btn-danger disabled mb-1" type="submit"><i
                                                    class="fas fa-trash" style="width: 1rem"></i></button> --}}
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2" class="align-middle text-center">Kosong</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                {{-- </tbody> --}}
                            @endforelse
                        </table>
                    </div>
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
