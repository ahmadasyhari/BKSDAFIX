@extends('layouts.admin')

@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <!-- Main content -->
    <div id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6"><a href="{{ route('home') }}"
                class="text-decoration-none text-reset">Beranda</a> / <a href="{{ route('menu.index') }}"
                class="text-decoration-none text-reset">Mengelola Menu</a> / Tambah Menu</a></p>
    </div>

    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
            <form action="{{ route('menu.forceDelete', session('menu_id')) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </form>
            <a href="{{ route('menu.create') }}" class="btn btn-secondary">Batal</a>
        </div>
    @endif

    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4">
            <h4 class="py-3">Tambah Menu</h4>

            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Menu</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipe Konten</label>
                    <select class="form-control" id="type" name="type" onchange="toggleContentInput()">
                        <option value="url">URL</option>
                        <option value="rich_text">Rich Text</option>
                    </select>
                </div>

                <div id="url-input" class="mb-3" style="display: block;">
                    <label for="url" class="form-label">URL Menu</label>
                    <input type="text" class="form-control" id="url" name="url">
                </div>

                <div id="rich-text-input" class="container-fluid mb-3" style="display:none;">
                    <label for="content" class="form-label">Konten Rich Text</label>
                    <textarea class="form-control" id="editor" name="content"></textarea>
                </div>

                <div class="mb-4">
                    <label for="parent_id" class="form-label">Menu Induk</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="">Tidak Ada (Menu Utama)</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                            @if ($menu->children->count())
                                @foreach ($menu->children as $child)
                                    <option value="{{ $child->id }}">-- {{ $child->title }}</option>
                                    @if ($child->children->count())
                                        @foreach ($child->children as $subchild)
                                            <option value="{{ $subchild->id }}">---- {{ $subchild->title }}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-8">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Simpan</button>
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
                // Periksa apakah instance TinyMCE sudah ada sebelum dihapus
                if (tinymce.get('editor')) {
                    tinymce.get('editor').remove(); // Hapus instance TinyMCE jika beralih ke URL
                }
            } else {
                document.getElementById('url-input').style.display = 'none';
                document.getElementById('rich-text-input').style.display = 'block';
                // Inisialisasi TinyMCE pada textarea #editor
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
                tinymce.triggerSave(); // Simpan konten TinyMCE ke textarea sebelum submit
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            toggleContentInput();
        });
    </script>
@endsection
