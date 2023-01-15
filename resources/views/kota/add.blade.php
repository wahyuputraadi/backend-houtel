@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Add Kota</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Add Kota</li>
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
            <form action="{{ route('insert-kota') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Kota</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_kota" class="form-control @error('nama_kota') is-invalid @enderror"
                            placeholder="Input Nama">
                        {{-- tampilkan pesan jika ada error --}}
                        @error('nama_kota')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" name="cover">
                        @error('cover')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputRole" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status_publish" class="form-control" id="inputRole">
                            <option value="1">Publish</option>
                            <option value="0">Tidak Publish</option>
                        </select>
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
