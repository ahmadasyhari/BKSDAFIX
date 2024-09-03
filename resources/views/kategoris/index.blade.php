@extends('layouts.admin')
@section('nav')
    @include('partials.sidebar')
@endsection
@section('content')
    <div class="container">
        <h1>Daftar Kategori</h1>
        <a href="{{ route('kategoris.create') }}" class="btn btn-primary">Tambah Kategori</a>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered mt-3">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th width="280px">Aksi</th>
            </tr>
            @foreach ($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->id }}</td>
                <td>{{ $kategori->nama }}</td>
                <td>{{ $kategori->created_at }}</td>
                <td>{{ $kategori->updated_at }}</td>
                <td>
                    <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('kategoris.show', $kategori->id) }}">Tampilkan</a>
                        <a class="btn btn-primary" href="{{ route('kategoris.edit', $kategori->id) }}">Ubah</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
