@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Add Hotel</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Add Hotel</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            {{-- Menampilkan Pesan error jika ada --}}
            @if (Session::get('error'))
                <div class="alert alert-warning fade show" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                </div>
            @endif

            <h5 class="card-title">General Form Elements</h5>
            <form action="{{ route('insert-hotel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" name="kota_id" class="form-control @error('kota_id') is-invalid @enderror"
                            placeholder="Input Nama">
                        {{-- tampilkan pesan jika ada error --}}
                        @error('kota_id')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Hotel</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_hotel"
                            class="form-control @error('nama_hotel') is-invalid @enderror" placeholder="Input Nama">
                        {{-- tampilkan pesan jika ada error --}}
                        @error('nama_hotel')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="formFile" name="gambar">
                        @error('gambar')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror"
                            placeholder="Input Nama">
                        @error('harga')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                            placeholder="Input Nama">
                        @error('alamat')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
