@extends('layouts.admin')

@section('nav')
    <nav id="sidebar" class="navbar-dark nav-bg-dark" style="min-height:100vh">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-dark">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="container-fluid d-grid justify-content-stretch text-center px-0 py-4">
            <ul class="nav flex-column">
                <li class="nav-item py-3">
                    <img src="/images/profile.png" alt="Logo" width="75" height="auto">
                    <h4 class="my-3">Admin</h4>
                </li>
            </ul>
            <hr style="margin: 0rem;">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link py-3" href="{{ route('home') }}"> Beranda</a>
                </li>
                <hr style="margin: 0rem;">
                <li class="nav-item">
                    <a class="nav-link py-3" href="{{ route('menu.create') }}"> Mengelola Menu</a>
                </li>
                <hr style="margin: 0rem;">
                <li class="nav-item">
                    <a class="nav-link py-3" href="{{ route('pengumuman.index') }}">Mengelola Pengumuman</a>
                </li>
                <hr style="margin: 0rem;">
                <li class="nav-item">
                    <a class="nav-link py-3 active" href="#" aria-current="page">Mengelola Artikel</a>
                </li>
                <hr style="margin: 0rem;">
                <li class="nav-item">
                    <a class="nav-link py-3" href="#">Mengelola Video</a>
                </li>
                <hr style="margin: 0rem;">
                <li class="nav-item">
                    <a class="nav-link py-3" href="#">Mengelola Foto</a>
            </ul>
        </div>
    </nav>
@endsection

@section('content')
    <!-- Main content -->
    <div id="content-header" class="container-fluid d-flex align-items-center px-4 py-3 bg-white mb-4">
        <p class="align-middle p-0 m-0 fs-5">Beranda / Mengelola Artikel</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success mx-4">
            {{ session('success') }}
        </div>
    @endif

    <section id="content" class="px-md-4">
        <div id="content" class="bg-white px-5 py-4">
            <h4 class="py-3">Tambah Artikel</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('artikel.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Artikel</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="konten" class="form-label">Konten Artikel</label>
                    <textarea class="form-control" id="konten" name="konten" rows="10" required></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    @endsection

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#konten',
                height: 300,
                plugins: [
                    'advlist autolink link image lists charmap preview anchor pagebreak',
                    'searchreplace wordcount visualblocks code fullscreen insertdatetime media',
                    'table emoticons help'
                ],
                toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                    'forecolor backcolor emoticons | help',
                menubar: 'file edit view insert format tools table help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
        </script>
    @endsection