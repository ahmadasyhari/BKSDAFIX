@extends('layouts.admin')

@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <div id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6"><a href="{{ route('home') }}" class="text-decoration-none text-reset">Beranda</a>
            / <a href="{{ route('users.index') }}" class="text-decoration-none text-reset">Manajemen User</a> / Edit User
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mx-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4">
            <h4 class="py-3">Edit User</h4>

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama :</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password :</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan password baru anda"
                       minlength="8" required>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Update</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        @endsection
