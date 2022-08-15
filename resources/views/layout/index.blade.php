@extends('layout.master')
{{-- @include('layout.sidebar') --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{-- <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Home</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section> --}}
        @if (Auth::user()->level == 'admin')
            {{-- Halaman Admin --}}
            <section class="content mt-3">
                <!-- Default box -->
                <div class="card bg-gradient-success collapsed-card">
                    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-store"></i>
                            Mandar Electronic
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button> --}}
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0" style="display: none;">
                        Mandar Electronic
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        @else
            {{-- halaman user --}}
            <section class="content mt-3">
                <!-- Default box -->
                <div class="card bg-info collapsed-card">
                    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-store"></i>
                            Mandar Electronic
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button> --}}
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0" style="display: none;">
                        Selamat Datang Di <strong>Mandar Electronic</strong> , Toko yang menjual segala jenis barang
                        electronic.
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card bg-warning collapsed-card">
                    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                        <h3 class="card-title">
                            <i class="fas fa-store"></i>
                            Diskon
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">
                            <button type="button" class="btn btn-warning btn-sm" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                            {{-- <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button> --}}
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0" style="display: none;">
                        Dapatkan potongan harga hingga 20% dengan minimal total belanja Rp.100,000.
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        @endif
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
@section('script')
    <script></script>
@endsection
