@extends('layouts.admin')

@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <!-- Main content -->
    <div id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6"><a href="{{ route('home') }}"
            class="text-decoration-none text-reset">Beranda</a> / Mengelola Pengumuman</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success mx-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4">
            <a href="{{ route('pengumuman.create') }}" class="btn btn-success mb-4">+ Tambah Pengumuman</a>
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
                        @foreach ($pengumumans as $pengumuman)
                            <tr>
                                <td>{{ $pengumuman->id }}</td>
                                <td>{{ $pengumuman->judul }}</td>
                                <td>{{ $pengumuman->kategori->nama }}</td>
                                <td>{{ $pengumuman->created_at }}</td>
                                <td>{{ $pengumuman->updated_at }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('pengumuman.show', $pengumuman->id) }}">Lihat</a>
                                    <a href="{{ route('pengumuman.edit', $pengumuman->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('pengumuman.destroy', $pengumuman->id) }}" method="POST"
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
