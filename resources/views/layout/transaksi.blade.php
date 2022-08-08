@extends('layout.master')
{{-- @include('layout.sidebar') --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h5 class="alert alert-info">Daftar Transaksi</h5>
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

                <div class="card-header">
                    {{-- <h6>Daftar Pembayaran</h6> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-border table-sm">
                            <tr align="center">
                                <th class="align-middle text-center">No</th>
                                <th class="align-middle text-center">Email</th>
                                <th class="align-middle text-center" colspan="2">Transaksi</th>
                                <th></th>
                                {{-- <th></th> --}}
                                <th class="align-middle text-center">Status</th>
                                {{-- <th>Detail</th> --}}
                            </tr>
                            @forelse ($transaksi as $item)
                                <tr>
                                    <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                    <td class="align-middle text-center">{{ $item->email }}</td>
                                    <td class="align-middle text-center" colspan="2">Rp.
                                        {{ number_format($item->transaksi) }}</td>
                                    </td>
                                    <td></td>
                                    {{-- <td></td> --}}
                                    <td class="align-middle text-center">
                                        @if ($item->status == 0)
                                            Proses
                                        @else
                                            Success
                                        @endif
                                        {{-- </td>
                                    <td class="align-middle text-center"> --}}
                                        {{-- <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a> --}}
                                        {{-- <form action="" method="post">
                                            <a class="btn btn-sm btn-info"
                                                href="{{ route('detail.edit', $item->email) }}"><i class="fas fa-info"
                                                    style="width: 1rem"></i></a>
                                            @csrf
                                            @method('delete') --}}
                                        {{-- <button class="btn btn-sm btn-danger disabled mb-1" type="submit"><i
                                                    class="fas fa-trash" style="width: 1rem"></i></button> --}}
                                        {{-- </form>
                                    </td> --}}
                                </tr>
                            @empty
                            @endforelse

                        </table>
                    </div>
                </div>
            </div>
            {{-- <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer--> --}}
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
