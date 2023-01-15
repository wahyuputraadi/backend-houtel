@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Hotel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Hotel</li>
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
                        <a href="{{ route('add-hotel') }}" class="btn btn-sm bg-primary text-white mb-4">Tambah Data
                            Hotel</a>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Nama Hotel</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Opsi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $hotel)
                                <tr>
                                    <td scope="row">{{ $loop->index + 1 }}</td>
                                    <td>{{ $hotel->kota_id }}</td>
                                    <td>{{ $hotel->nama_hotel }}</td>
                                    <td>
                                        <img class="rounded" src="{{ asset('storage/' . $hotel->gambar) }}"
                                            width="100"  height="100"  style="object-fit:cover;">
                                    </td>
                                    <td>{{ $hotel->harga }}</td>
                                    <td>{{ $hotel->alamat }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm bg-success text-white">Edit</a>
                                        <a href="" class="btn btn-sm bg-danger text-white ">Hapus</a>
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
