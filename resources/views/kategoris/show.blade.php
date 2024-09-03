@extends('layouts.admin')
@section('nav')
    @include('partials.sidebar')
@endsection
@section('content')
    <div class="container">
        <h1>Detail Kategori</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $kategori->id }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Nama: {{ $kategori->nama }}</h6>
                <p class="card-text">Dibuat: {{ $kategori->created_at }}</p>
                <p class="card-text">Diubah: {{ $kategori->updated_at }}</p>
                <a href="{{ route('kategoris.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
