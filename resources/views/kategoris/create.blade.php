@extends('layouts.admin')
@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <div class="container">
        <h1>Tambah Kategori</h1>

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

        <form action="{{ route('kategoris.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kategori</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Kategori">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
