@extends('layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>Edit User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Edit User</li>
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
            <form action="{{ route('update-user') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $edit->id }}">
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $edit->name }}" placeholder="Input Nama">
                        {{-- tampilkan pesan jika ada error --}}
                        @error('name')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" disabled
                            value="{{ $edit->email }}" >
                        @error('email')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="inputPassword">
                        @error('password')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputRole" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select name="role" class="form-control" id="inputRole">
                            <option value="Adm" @if ($edit->role == 'Adm') {{ 'selected' }} @endif>Admin
                            </option>
                            <option value="Ksr" @if ($edit->role == 'Ksr') {{ 'selected' }} @endif>Kasir
                            </option>
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
