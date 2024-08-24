<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Tambah Menu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script defer src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    @vite('resources/css/nav.css')
    @vite('resources/js/nav.js')
    <style>
        .ql-toolbar.ql-snow {
            border: 1px solid #ccc;
        }

        .ql-container.ql-snow {
            border: 1px solid #ccc;
            height: 300px;
            /* Tinggi editor */
        }

        .ql-editor iframe {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <main class="wrapper d-flex align-items-stretch">
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
                        <a class="nav-link active py-3" aria-current="page" href="{{ route('menu.create') }}">
                            Beranda
                        </a>
                    </li>
                    <hr style="margin: 0rem;">
                    <li class="nav-item">
                        <a class="nav-link active py-3" aria-current="page" href="{{ route('menu.create') }}">
                            Mengelola Menu
                        </a>
                    </li>
                    <hr style="margin: 0rem;">
                    <li class="nav-item">
                        <a class="nav-link py-3" href="#">Mengelola Pengumuman</a>
                    </li>
                    <hr style="margin: 0rem;">
                    <li class="nav-item">
                        <a class="nav-link py-3" href="#">Mengelola Artikel</a>
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

        <!-- Section Block -->
        <section class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg nav-bg-dark px-2">
                <div class="container-fluid">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center p-0" href="#"><span
                                    class="material-symbols-outlined text-white fs-2">settings
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <section id="content" class="p-4 p-md-5">
                <p class="mb-4">Beranda / Mengelola Menu</p>
                <!-- Main content -->
                @if(session('warning'))
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

                <h3>Form Tambah Menu</h3>
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

                    <div id="url-input" class="mb-3">
                        <label for="url" class="form-label">URL Menu</label>
                        <input type="text" class="form-control" id="url" name="url">
                    </div>

                    <div id="rich-text-input" class="mb-3" style="display:none;">
                        <label for="content" class="form-label">Konten Rich Text</label>
                        <div id="editor"></div>
                        <textarea class="form-control" id="content" name="content" style="display:none;"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="parent_id" class="form-label">Menu Induk</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="">Tidak Ada (Menu Utama)</option>
                            @foreach($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Menu</button>
                </form>

                <!-- Menampilkan daftar menu yang sudah dibuat dalam bentuk tabel responsif -->
                <div class="mt-5">
                    <h3>Daftar Menu</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul Menu</th>
                                    <th>URL</th>
                                    <th>Konten</th>
                                    <th>Induk/Sub-menu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allMenus as $menu)
                                <tr>
                                    <td>{{ $menu->id }}</td>
                                    <td>{{ $menu->title }}</td>
                                    <td>
                                        @if($menu->url)
                                        <a href="{{ $menu->url }}" target="_blank">{{ $menu->url }}</a>
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if($menu->content)
                                        {!! Str::limit($menu->content, 50) !!}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if($menu->parent_id)
                                        <span class="badge bg-secondary">Sub-menu dari ID: {{ $menu->parent_id
                                            }}</span>
                                        @else
                                        <span class="badge bg-primary">Menu Utama</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST"
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
        </section>
        <script>
            var quill;

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

                    // Inisialisasi Quill editor hanya jika belum diinisialisasi
                    if (!quill) {
                        quill = new Quill('#editor', {
                            theme: 'snow',
                            modules: {
                                toolbar: [
                                    [{ 'header': [1, 2, 3, false] }],
                                    [{ 'align': [] }],
                                    ['bold', 'italic', 'underline', 'strike'],
                                    ['link', 'image', 'video'],
                                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                                    [{ 'indent': '-1' }, { 'indent': '+1' }],
                                    ['clean'],
                                    ['table']
                                ]
                            }
                        });
                    }
                }
            }

            // Menyimpan konten Quill ke textarea sebelum form disubmit
            document.querySelector('form').onsubmit = function () {
                if (document.getElementById('type').value === 'rich_text') {
                    document.querySelector('textarea[name=content]').value = quill.root.innerHTML;
                }
            };

            // Call toggleContentInput() on page load to initialize the state
            document.addEventListener('DOMContentLoaded', function () {
                toggleContentInput();
            });
        </script>
    </main>
</body>

</html>