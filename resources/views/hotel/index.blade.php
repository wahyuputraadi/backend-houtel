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
                        <a href="" class="btn btn-sm bg-primary text-white mb-4">Tambah Data Hotel</a>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Hotel</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Opsi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="#">#1</a></th>
                                    <td>Agya Duta</td>
                                    <td>
                                        <img class="rounded" src="{{ asset('backend_template/assets/img/news-4.jpg') }}"
                                            width="60" height="60" alt="">
                                    </td>
                                    <td>Rp 850.000</td>
                                    <td>Jln Angkatan 45 - Palembang</td>
                                    <td>
                                        <a href="" class="btn btn-sm bg-success text-white">Edit</a>
                                        <a href="" class="btn btn-sm bg-danger text-white ">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Recent Sales -->
        </div>
    </section>
@endsection
