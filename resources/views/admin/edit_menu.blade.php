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
                    <a class="nav-link py-3 active" href="{{ route('menu.index') }}" aria-current="page">Mengelola Menu</a>
                </li>
                <hr style="margin: 0rem;">
                <li class="nav-item">
                    <a class="nav-link py-3" href="{{ route('pengumuman.index') }}">Mengelola Pengumuman</a>
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
        <p class="align-middle px-2 m-0 fs-6"><a href="{{ route('home') }}"
                class="text-decoration-none text-reset">Beranda</a> / <a href="{{ route('menu.index') }}"
                class="text-decoration-none text-reset">Mengelola Menu</a> / Edit Menu</a></p>
    </div>

    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4">
            <h4 class="py-3">Edit Menu</h4>

            <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Menu</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $menu->title }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipe Konten</label>
                    <select class="form-control" id="type" name="type" onchange="toggleContentInput()">
                        <option value="url" {{ $menu->url ? 'selected' : '' }}>URL</option>
                        <option value="rich_text" {{ $menu->content ? 'selected' : '' }}>Rich Text</option>
                    </select>
                </div>

                <div id="url-input" class="mb-3" style="{{ $menu->url ? 'display:block;' : 'display:none;' }}">
                    <label for="url" class="form-label">URL Menu</label>
                    <input type="text" class="form-control" id="url" name="url" value="{{ $menu->url }}">
                </div>

                <div id="rich-text-input" class="container-fluid mb-3"
                    style="{{ $menu->content ? 'display:block;' : 'display:none;' }}">
                    <label for="content" class="form-label">Konten Rich Text</label>
                    <textarea class="form-control" id="editor" name="content">{{ $menu->content }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="parent_id" class="form-label">Menu Induk</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="">Tidak Ada (Menu Utama)</option>
                        @foreach ($menus as $parentMenu)
                            <option value="{{ $parentMenu->id }}"
                                {{ $menu->parent_id == $parentMenu->id ? 'selected' : '' }}>
                                {{ $parentMenu->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-grid">
                            <a href="{{ route('menu.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function toggleContentInput() {
            var type = document.getElementById('type').value;
            if (type === 'url') {
                document.getElementById('url-input').style.display = 'block';
                document.getElementById('rich-text-input').style.display = 'none';
                tinymce.get('editor').remove(); // Remove TinyMCE instance if switching to URL
            } else {
                document.getElementById('url-input').style.display = 'none';
                document.getElementById('rich-text-input').style.display = 'block';
                tinymce.init({
                    selector: '#editor',
                    width: 600,
                    height: 300,
                    plugins: [
                        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor',
                        'pagebreak', 'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen',
                        'insertdatetime', 'media', 'table', 'emoticons', 'help'
                    ],
                    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                        'forecolor backcolor emoticons | help',
                    menubar: 'favs file edit view insert format tools table help',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'

                });
            }
        }

        document.querySelector('form').onsubmit = function() {
            if (document.getElementById('type').value === 'rich_text') {
                tinymce.triggerSave(); // Save content of TinyMCE before form submission
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            toggleContentInput();
        });
    </script>
@endsection
