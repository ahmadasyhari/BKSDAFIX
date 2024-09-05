@extends('layouts.admin')

@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <!-- Main content -->
    <div id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6"><a href="{{ route('home') }}"
            class="text-decoration-none text-reset">Beranda</a> / Mengelola Menu</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success mx-4">
            {{ session('success') }}
        </div>
    @endif

    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4">
            <a href="{{ route('menu.create') }}" class="btn btn-success mb-4">+ Tambah Menu</a>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul Menu</th>
                            <th>URL</th>
                            <th>Konten</th>
                            <th>Induk/Sub-menu</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allMenus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td>{{ $menu->title }}</td>
                                <td>
                                    @if ($menu->url)
                                        <a href="{{ $menu->url }}" target="_blank">{{ $menu->url }}</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($menu->content)
                                        {!! Str::limit(strip_tags($menu->content), 50) !!}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if ($menu->parent_id)
                                        <span class="badge bg-secondary">Sub-menu dari ID:
                                            {{ $menu->parent_id }}</span>
                                    @else
                                        <span class="badge bg-primary">Menu Utama</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Tombol View -->
                                    <a href="{{ route('menu.show', $menu->id) }}" class="btn btn-info btn-sm">View</a>

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <!-- Tombol Hapus -->
                                    <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
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