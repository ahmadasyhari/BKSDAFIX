@extends('layouts.admin')

@section('title')
    <title>Edit Pengumuman</title>
@endsection

@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <!-- Main content -->
    <div id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6"><a href="{{ route('home') }}" class="text-decoration-none text-reset">Beranda</a>
            / <a href="{{ route('pengumuman.index') }}" class="text-decoration-none text-reset">Mengelola Pengumuman</a> / Edit
            Pengumuman</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success mx-4">
            {{ session('success') }}
        </div>
    @endif

    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4">
            <h4 class="py-3">Edit Pengumuman</h4>

            @if ($errors->any())
                <div class="alert alert-danger mx-4 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Pengumuman</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $pengumuman->judul }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ $pengumuman->kategori_id == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*"
                        onchange="previewImage(event)">

                    <!-- Menampilkan gambar lama jika ada -->
                    @if ($pengumuman->gambar)
                        <div class="mt-3">
                            <img id="oldImage" class="img-thumbnail shadow-sm"
                                src="{{ asset('storage/pengumuman_images/' . $pengumuman->gambar) }}" alt="Gambar Lama"
                                style="max-height: 250px;">
                        </div>
                    @endif

                    <!-- Pratinjau gambar baru yang dipilih -->
                    <div class="mt-3">
                        <img id="preview" class="img-thumbnail shadow-sm"="" alt="Pratinjau Gambar Baru"
                            style="max-height: 250px; display: none;">
                        <!--<p id="filename" style="display: block;">{{ $pengumuman->gambar }}</p>-->
                    </div>
                </div>

                <div class="mb-4">
                    <label for="konten" class="form-label">Konten Pengumuman</label>
                    <textarea class="form-control" id="konten" name="konten" rows="10">{{ $pengumuman->konten }}</textarea>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid">
                            <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    @include('partials.editorscripts')
@endsection
