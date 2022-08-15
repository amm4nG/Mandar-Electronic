@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <!-- Begin Page Content -->
            <div class="row justify-content-center">
                <!-- Tugas -->
                <div class="col-xl-4 col-md-6 mb-4 ">
                    @if (session('email'))
                        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                            <strong>Gagal</strong>, {{ session('email') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session('telp'))
                        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                            <strong>Gagal</strong>, {{ session('telp') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session('email_sukses'))
                        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                            <strong>Update Success</strong>, {{ session('email_sukses') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card mt-4">
                        <div class="card-header bg-success">

                            <h5 class="text-center">Profile</h5>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/uploads/user.jpg') }}" width="150"
                                class=" rounded mx-auto d-block" alt="">
                            <h5 class="text-center mt-2">{{ $profil->level }}</h5>
                            <form action="{{ route('profil.update', $profil->id) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="email_lama" value="{{ $profil->email }}">
                                <input type="hidden" name="telp_lama" value="{{ $profil->telp }}">
                                <div class="table-responsive">
                                    <table class="table table-border mt-2">
                                        <tr>
                                            <th>Name</th>
                                            <td class="text-right"><input name="name" type="text" class="form-control"
                                                    value="{{ $profil->name }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td class="text-right"><input name="email" type="text" class="form-control"
                                                    value="{{ $profil->email }}"></td>
                                        </tr>
                                        <tr>
                                            <th>Telp</th>
                                            <td class="text-right"><input name="telp" type="text" class="form-control"
                                                    value="{{ $profil->telp }}"></td>
                                        </tr>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-danger form-control">Perbarui</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
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
