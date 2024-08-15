<?php use App\Models\Menu; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($menu) ? $menu->title : 'Beranda' }}</title>
    <link href="https://fonts.cdnfonts.com/css/montserrat-subrayada" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Menampilkan submenu saat menu utama aktif */
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Mengatur dropdown-menu agar terlihat di bawah */
        .dropdown-menu {
            display: none;
            position: absolute;
            z-index: 1000;
        }

        .header-background {
            background-image: url('/images/bukit_holbung.svg');
            /* Ganti dengan path gambar sesuai */
            background-size: cover;
            background-position: center;
            height: 80vh;
            position: relative;
            color: white;
            transition: height 0.5s ease;
            /* Menambahkan transisi untuk perubahan tinggi */
        }

        .header-content {
            position: absolute;
            bottom: 126px;
            left: 96px;
            font-family: 'Montserrat Subrayada', sans-serif;
            transition: all 0.5s ease;
            /* Menambahkan transisi untuk perubahan ukuran font */

            h1 {
                font-size: 40px;
                transition: all 0.5s ease;
                /* Menambahkan transisi untuk perubahan ukuran font pada h1 */
            }

            h2 {
                font-size: 20px;
                transition: all 0.5s ease;
                /* Menambahkan transisi untuk perubahan ukuran font pada h2 */
            }
        }

        @media screen and (max-width: 1000px) {
            .header-background {
                height: 50vh;
            }

            .header-content {
                bottom: 106px;
                left: 76px;
            }

            .header-content h1 {
                font-size: 30px;
            }

            .header-content h2 {
                font-size: 15px;
            }
        }

        @media screen and (max-width: 600px) {
            .header-background {
                height: 50vh;
            }

            .header-content {
                bottom: 96px;
                left: 56px;
            }

            .header-content h1 {
                font-size: 20px;
            }

            .header-content h2 {
                font-size: 10px;
            }
        }
    </style>
</head>

<body style="background-color: #0B1D26;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="/images/logo.png" alt="Logo" width="75" height="auto">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="fw-bold nav-link {{ !isset($menu) ? 'active' : '' }}" aria-current="page"
                            href="/">BERANDA</a>
                    </li>
                    @foreach (Menu::whereNull('parent_id')->get() as $menuItem)
                        @php $dropdownId = 'navbarDropdown' . $menuItem->id; @endphp
                        <li class="nav-item dropdown">
                            @if ($menuItem->url)
                                <a class="nav-link" href="{{ $menuItem->url }}">
                                    {{ $menuItem->title }}
                                </a>
                            @else
                                <a class="nav-link dropdown-toggle" href="#" id="{{ $dropdownId }}"
                                    role="button" aria-expanded="false">
                                    {{ $menuItem->title }}
                                </a>
                            @endif

                            @if ($menuItem->children->count())
                                <ul class="dropdown-menu" aria-labelledby="{{ $dropdownId }}">
                                    @foreach ($menuItem->children as $child)
                                        @if ($child->url)
                                            <li><a class="dropdown-item"
                                                    href="{{ $child->url }}">{{ $child->title }}</a></li>
                                        @else
                                            <li><a class="dropdown-item"
                                                    href="{{ route('menu.show', $child->id) }}">{{ $child->title }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0">
        @if (isset($menu))
            <!-- Jika menu dipilih, tampilkan kontennya -->
            <h1>{{ $menu->title }}</h1>
            <div>
                {!! $menu->content !!}
            </div>
        @else
            <!-- Jika tidak ada menu yang dipilih, tampilkan beranda -->
            <!-- Header -->
            <div class="container-fluid p-0">
                <header class="header-background">
                    <div class="header-content" z-index="1">
                        <h2 style="color: #FBC834">Informasi</h2>
                        <h1>Bukit Holbung</h1>
                        <h2>Samosir, Sumatera Utara</h2>
                    </div>
                </header>
                <div class="card mx-3" style="top: -50px; border-radius: 20px;" z-index="2">
                    <article class="card-body py-5">
                        
                    </article>
                </div>
            </div>
        @endif
    </div>
</body>

</html>
