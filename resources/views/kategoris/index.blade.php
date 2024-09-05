@extends('layouts.admin')
@section('nav')
    @include('partials.sidebar')
@endsection
@section('content')
    <div id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6"><a href="{{ route('home') }}" class="text-decoration-none text-reset">Beranda</a>
            / <a>Mengelola Kategori</a>
        </p>
    </div>

    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4">
            <a href="{{ route('kategoris.create') }}" class="btn btn-success mb-4">+ Tambah Ketegori</a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Dibuat Pada</th>
                    <th>Diupdate Pada</th>
                    <th width="21%">Aksi</th>
                </tr>
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->created_at }}</td>
                        <td>{{ $kategori->updated_at }}</td>
                        <td>
                            <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('kategoris.show', $kategori->id) }}">Lihat</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('kategoris.edit', $kategori->id) }}">Ubah</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
