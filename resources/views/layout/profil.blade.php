@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <!-- Begin Page Content -->
            <div class="row justify-content-center">
                <!-- Tugas -->
                <div class="col-xl-4 col-md-6 mb-4 ">
                    <div class="card mt-5">
                        <div class="card-header bg-success">
                            <h5 class="text-center">Profile</h5>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('storage/uploads/user.jpg') }}" width="150" class=" rounded mx-auto d-block"
                                alt="">
                            <h6 class="text-center mt-2">{{ $profil->name }}</h6>

                            <div class="table-responsive">
                                <table class="table table-borderless mt-2">
                                    <tr>
                                        <th>Name</th>
                                        <td class="text-right">{{ $profil->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td class="text-right">{{ $profil->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Level</th>
                                        <td class="text-right">{{ $profil->level }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
