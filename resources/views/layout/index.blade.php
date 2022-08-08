@extends('layout.master')
{{-- @include('layout.sidebar') --}}
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Home</h1>
                    </div>
                    {{-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
                            </ol>
                        </div> --}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if (Auth::user()->level == 'admin')
            {{-- Halaman Admin --}}
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        Halaman Admin
                    </div>
                    {{-- <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer--> --}}
                </div>
                <!-- /.card -->

            </section>
        @else
            {{-- halaman user --}}
            <section class="content">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        Halaman User
                    </div>
                </div>
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
