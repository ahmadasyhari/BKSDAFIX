<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        .ql-toolbar.ql-snow {
            border: 1px solid #ccc;
        }
        .ql-container.ql-snow {
            border: 1px solid #ccc;
            height: 300px; /* Tinggi editor */
        }
        .ql-editor iframe {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <!-- Navbar with toggle button -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('menu.create') }}">
                                Tambah Menu
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Daftar Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pengaturan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lainnya</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Menampilkan pesan peringatan jika ada -->
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
                                                <span class="badge bg-secondary">Sub-menu dari ID: {{ $menu->parent_id }}</span>
                                            @else
                                                <span class="badge bg-primary">Menu Utama</span>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?');">
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
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
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
                                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                                [{ 'indent': '-1'}, { 'indent': '+1' }],
                                ['clean'],                                         
                                ['table']
                            ]
                        }
                    });
                }
            }
        }

        // Menyimpan konten Quill ke textarea sebelum form disubmit
        document.querySelector('form').onsubmit = function() {
            if (document.getElementById('type').value === 'rich_text') {
                document.querySelector('textarea[name=content]').value = quill.root.innerHTML;
            }
        };

        // Call toggleContentInput() on page load to initialize the state
        document.addEventListener('DOMContentLoaded', function() {
            toggleContentInput();
        });
    </script>
</body>
</html>
