@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Pemesanan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Pemesanan</li>
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
                        <a href="" class="btn btn-sm bg-primary text-white mb-4">Tambah Data Pemesanan</a>
                        <table class="table table-borderless datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pemesan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No Telp</th>
                                    <th scope="col">Tipe Kamar</th>
                                    <th scope="col">Metode Pembayaran</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="#">#1</a></th>
                                    <td>Brandon Jacob</td>
                                    <td><a href="#" class="text-primary">Jacob@admin.com</a>
                                    <td>0812 7177 2022</td>
                                    <td>Suite Room</td>
                                    <td>Transfer Bank</td>
                                    <td>Rp 850.000<td>
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
