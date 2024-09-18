@extends('layouts.admin')

@section('title')
    <title>Detail Kategori</title>
@endsection

@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <div id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6"><a href="{{ route('home') }}" class="text-decoration-none text-reset">Beranda</a>
            / <a href="{{ route('kategoris.index') }}" class="text-decoration-none text-reset">Mengelola Kategori</a> / Detail
            Kategori</a></p>
    </div>
    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4">
            <h4 class="py-3">Detail Kategori</h4>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">ID : {{ $kategori->id }}</h5>
                    <h6 class="card-subtitle mb-4 text-muted">Nama: {{ $kategori->nama }}</h6>
                    <p class="card-text m-1">Dibuat: {{ $kategori->created_at }}</p>
                    <p class="card-text m-1">Diubah: {{ $kategori->updated_at }}</p>
                    <a href="{{ route('kategoris.index') }}" class="btn btn-primary mt-4">Kembali</a>
                </div>
            </div>
        </div>
    </section>
@endsection
