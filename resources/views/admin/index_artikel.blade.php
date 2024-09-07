@extends('layouts.admin')

@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <!-- Main content -->
    <div id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6"><a href="{{ route('home') }}"
                class="text-decoration-none text-reset">Beranda</a> / Mengelola Artikel</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success mx-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4">
            <a href="{{ route('artikel.create') }}" class="btn btn-success mb-4">+ Tambah Artikel</a>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Dibuat Pada</th>
                            <th>Diupdate Pada</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikels as $artikel)
                            <tr>
                                <td>{{ $artikel->id }}</td>
                                <td>{{ $artikel->judul }}</td>
                                <td>{{ $artikel->kategori->nama }}</td>
                                <td>{{ $artikel->created_at }}</td>
                                <td>{{ $artikel->updated_at }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('artikel.show', $artikel->id) }}">Lihat</a>
                                    <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
