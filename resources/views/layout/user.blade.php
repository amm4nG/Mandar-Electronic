@extends('layout.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <h5 class="alert alert-info mt-3">Daftar User</h5>
            <div class="card p-3">
                <div class="table-responsive">
                    <table class="table table-sm table-border">
                        <tr>
                            <th class="align-middle text-center">No</th>
                            <th class="align-middle text-center">Nama</th>
                            <th class="align-middle text-center">Email</th>
                            <th class="align-middle text-center">Telp</th>
                            <th class="align-middle text-center">Action</th>
                            {{-- <th></th> --}}
                        </tr>
                        @foreach ($user as $s)
                            @if ($s->level == 'user')
                                <tr>
                                    <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                    <td class="align-middle text-center">{{ $s->name }}</td>
                                    <td class="align-middle text-center">{{ $s->email }}</td>
                                    <td class="align-middle text-center">{{ $s->telp }}</td>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-info btn-sm mb-1" href="" style="width: 2rem"><i
                                                class="fas fa-comments"></i></a>
                                        <a class="btn btn-danger mb-1 btn-sm" href="" style="width: 2rem"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
