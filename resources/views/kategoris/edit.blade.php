@extends('layouts.admin')
@section('nav')
    @include('partials.sidebar')
@endsection
@section('content')
    <div id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6"><a href="{{ route('home') }}" class="text-decoration-none text-reset">Beranda</a>
            / <a href="{{ route('kategoris.index') }}" class="text-decoration-none text-reset">Mengelola Kategori</a> / Ubah
            Kategori</a></p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4">
            <form action="{{ route('kategoris.update', $kategori->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nama" class="form-label">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}"
                        placeholder="Nama Kategori">
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid">
                            <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
