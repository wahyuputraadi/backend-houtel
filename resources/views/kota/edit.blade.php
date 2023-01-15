@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Edit Kota</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Edit Kota</li>
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
            <form action="{{ route('update-kota') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $edit->id }}">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama Kota</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_kota" value="{{ $edit->nama_kota }}" class="form-control @error('nama_kota') is-invalid @enderror"
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
                        <input class="form-control" value="{{ $edit->cover }}" type="file" id="formFile" name="cover">
                        <img class="my-2"  src="{{ asset('storage/' . $edit->cover) }}"  width="150" height="150" style="object-fit: contain">
                        @error('cover')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputRole" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10">
                        <select name="status_publish"  class="form-control" id="inputRole">
                            <option value="1" {{ $edit->status_publish == '1' ? 'selected' : '' }}>Publish</option>
                            <option value="0" {{ $edit->status_publish == '0' ? 'selected' : '' }}>Tidak Publish</option>
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
