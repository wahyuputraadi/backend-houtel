@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Kota</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Kota</li>
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
                            <li><a class="dropdown-item" h ref="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        {{-- Menampilkan Pesan error jika ada --}}
                        @if (Session::get('success'))
                            <div class="alert alert-warning fade show" role="alert">
                                <strong>{{ Session::get('success') }}</strong>
                            </div>
                        @endif
                        <h5 class="card-title">Recent Sales <span>| Today</span></h5>
                        <a href="{{ route('add-kota') }}" class="btn btn-sm bg-primary text-white mb-4">Tambah Data Kota</a>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kota</th>
                                    <th scope="col">Cover</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $kota)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $kota->nama_kota }}</td>
                                        <td>
                                            <img class="rounded" src="{{ asset('storage/' . $kota->cover) }}" width="100"
                                                height="100" style="object-fit:cover;">
                                        </td>
                                        <td>{{ $kota->status_publish == '1' ? 'Publish' : 'Not Publish' }}</td>
                                        <td>
                                            {{-- <a href="{{ url('edit-user/' .$edit->id) }}" class="btn btn-sm bg-success text-white">Edit</a> --}}
                                            <a href="{{ route('edit-kota', $kota->id) }}" class="btn btn-sm bg-success text-white">Edit</a>
                                            <a href="{{ route('hapus-kota', $kota->id) }}" class="btn btn-sm bg-danger text-white"
                                                onclick="return confirm('Yakin Hapus Data ?')">Hapus</a>
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
