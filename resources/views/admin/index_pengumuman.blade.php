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
                    <a class="nav-link py-3" href="{{ route('home') }}">Beranda</a>
                </li>
                <hr style="margin: 0rem;">
                <li class="nav-item">
                    <a class="nav-link py-3" href="{{ route('menu.create') }}">Mengelola Menu</a>
                </li>
                <hr style="margin: 0rem;">
                <li class="nav-item">
                    <a class="nav-link py-3 active" href="#" aria-current="page">Mengelola Pengumuman</a>
                </li>
                <hr style="margin: 0rem;">
                <li class="nav-item">
                    <a class="nav-link py-3" href="{{ route('artikel.index') }}">Mengelola Artikel</a>
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
    <div id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6">Beranda / Mengelola Pengumuman</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success mx-4">
            {{ session('success') }}
        </div>
    @endif

    <section id="content" class="px-md-4 mb-4">
        <div id="content" class="bg-white shadow-lg px-5 py-4 mb-4">
            <a href="{{ route('pengumuman.create') }}" class="btn btn-success mb-4">+ Tambah Pengumuman</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengumumans as $pengumuman)
                        <tr>
                            <td>{{ $pengumuman->id }}</td>
                            <td>{{ $pengumuman->judul }}</td>
                            <td>{{ $pengumuman->kategori->nama }}</td>
                            <td>{{ $pengumuman->created_at }}</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
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
    </section>
@endsection

@section('scripts')
    <script>
        // Fungsi untuk menampilkan input yang sesuai
        function toggleContentInput() {
            var type = document.getElementById('type').value;
            if (type === 'url') {
                document.getElementById('url-input').style.display = 'block';
                document.getElementById('rich-text-input').style.display = 'none';
                document.querySelector('textarea[name=content]').style.display = 'none'; // Hide textarea
            } else {
                document.getElementById('url-input').style.display = 'none';
                document.getElementById('rich-text-input').style.display = 'block';
                document.querySelector('textarea[name=content]').style.display = 'block'; // Show textarea

                // Inisialisasi TinyMCE
                if (!tinymce.activeEditor) {
                    tinymce.init({
                        selector: '#editor',
                        width: 600,
                        height: 300,
                        plugins: [
                            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor',
                            'pagebreak',
                            'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen',
                            'insertdatetime', 'media',
                            'table', 'emoticons', 'help'
                        ],
                        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                            'forecolor backcolor emoticons | help',
                        menu: {
                            favs: {
                                title: 'My Favorites',
                                items: 'code visualaid | searchreplace | emoticons'
                            }
                        },
                        menubar: 'favs file edit view insert format tools table help',
                        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
                        setup: function(editor) {
                            editor.on('init', function() {
                                // Transfer the content from the textarea to the editor
                                editor.setContent(document.querySelector('textarea[name=content]')
                                    .value || '');
                            });
                        }
                    });
                }
            }
        }

        // Menyimpan konten TinyMCE ke textarea sebelum form disubmit
        document.querySelector('form').onsubmit = function() {
            if (document.getElementById('type').value === 'rich_text') {
                document.querySelector('textarea[name=content]').value = tinymce.activeEditor.getContent();
            }
        };

        // Call toggleContentInput() on page load to initialize the state
        document.addEventListener('DOMContentLoaded', function() {
            toggleContentInput();
        });
    </script>
@endsection
