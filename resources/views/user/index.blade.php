@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body">

                       

                        <h5 class="card-title">Recent Sales <span>| Today</span></h5>
                        <a href="{{ route('add-user') }}" class="btn btn-sm bg-primary text-white mb-4">Tambah Data User</a>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $no => $hasil)
                                    <tr>
                                        <th scope="row"><a href="#"></a>{{ $no + 1 }}</th>

                                        <td>{{ $hasil->name }}</td>
                                        <td><a href="#" class="text-primary">{{ $hasil->email }}</a></td>
                                        <td>
                                            {{ $hasil->role == 'Adm' ? 'Admin' : 'Kasir' }}
                                        </td>
                                        <td>
                                            {{-- <a href="{{ url('edit-user/' .$edit->id) }}" class="btn btn-sm bg-success text-white">Edit</a> --}} 
                                            <a href="{{ route('edit-user', $hasil->id) }}"
                                                class="btn btn-sm bg-success text-white">Edit</a>
                                            <a href="{{ route('delete-user', $hasil->id) }}" class="btn btn-sm bg-danger text-white" onclick="return confirm('Yakin Hapus Data ?')">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">Data Tidak Ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Recent Sales -->
        </div>
    </section>
@endsection
