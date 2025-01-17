<?php use App\Models\Menu; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($menu) ? $menu->title : 'Beranda' }}</title>
    <link href="https://fonts.cdnfonts.com/css/montserrat-subrayada" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/abeezee" rel="stylesheet">
    <link rel="stylesheet" href="https://www.nerdfonts.com/assets/css/webfont.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @vite('resources/css/style.css')

    <style>
        .carousel-indicators {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .carousel-indicators button {
            background-color: #FBC834;
            border: none;
            margin: 0 10px;
            /* Menambahkan jarak antar tombol */
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            font-weight: bold;
            font-size: 16px;
            color: #004165;
            /* Warna nomor */
            cursor: pointer;
        }

        .carousel-indicators .active {
            background-color: #004165;
            color: #FFF;
        }

        .carousel-indicators button:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-xl navbar-light" style="background-color: #FFF;">
        <div class="container-fluid">
            <img class="logo" src="/images/logo-sm.png" alt="Logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center d-flex align-items-center">
                    <li class="nav-item">
                        <a class="fw-bold nav-link {{ !isset($menu) ? 'active' : '' }}" aria-current="page"
                            href="/">BERANDA</a>
                    </li>
                    @foreach (Menu::whereNull('parent_id')->get() as $menuItem)
                        @php $dropdownId = 'navbarDropdown' . $menuItem->id; @endphp
                        <li class="nav-item dropdown fw-bold text-wrap">
                            <a class="nav-link dropdown-toggle text-uppercase"
                                href="{{ $menuItem->url ?: route('menu.show', $menuItem->id) }}"
                                id="{{ $dropdownId }}" role="button" aria-expanded="false">
                                {{ $menuItem->title }}
                            </a>

                            @if ($menuItem->children->count())
                                <ul class="dropdown-menu" aria-labelledby="{{ $dropdownId }}">
                                    @foreach ($menuItem->children as $child)
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle text-wrap"
                                                href="{{ $child->url ?: route('menu.show', $child->id) }}">
                                                {{ $child->title }}
                                            </a>
                                            @if ($child->children->count())
                                                <ul class="dropdown-menu">
                                                    @foreach ($child->children as $subchild)
                                                        <li class="dropdown-submenu">
                                                            <a class="dropdown-item dropdown-toggle text-wrap"
                                                                href="{{ $subchild->url ?: route('submenu.show', $subchild->id) }}">
                                                                {{ $subchild->title }}
                                                            </a>
                                                            @if ($subchild->children->count())
                                                                <ul class="dropdown-menu">
                                                                    @foreach ($subchild->children as $subsubchild)
                                                                        <li>
                                                                            <a class="dropdown-item text-wrap"
                                                                                href="{{ $subsubchild->url ?: route('submenu.show', $subsubchild->id) }}">
                                                                                {{ $subsubchild->title }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid p-0">
        @if (isset($menu))
            <!-- Jika menu dipilih, tampilkan kontennya -->
            <h1>{{ $menu->title }}</h1>
            <div>
                {!! $menu->content !!}
            </div>
        @else
            <section>
                <!-- Jika tidak ada menu yang dipilih, tampilkan beranda -->
                <!-- Header -->
                <article id="carouselExampleslidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="/images/bukit_holbung.svg" class="d-block w-100" alt="...">
                            <div class="header-content" z-index="1">
                                <h2 style="color: #FBC834">Informasi</h2>
                                <h1>Bukit Holbung</h1>
                                <h2>Samosir, Sumatera Utara</h2>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <img src="/images/paropo.svg" class="d-block w-100" alt="...">
                            <div class="header-content" z-index="1">
                                <h2 style="color: #FBC834">Informasi</h2>
                                <h1>Poropo</h1>
                                <h2>Silahisabungan, Sumatera Utara</h2>
                            </div>
                        </div>
                    </div>
                </article>
                <section class="card mx-4" style="top: -30px; border-radius: 20px;" z-index="2">
                    <article class="card-body pt-5">
                        <section class="py-md-5">
                            <article class="container-fluid text-center"
                                style="font-family: 'Montserrat Subrayada', sans-serif;">
                                <h1 class="mb-5">Layanan Kami</h1>
                                <div class="layanan row">
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-center align-items-center py-md-4"
                                                style="">
                                                <div class="position-absolute opacity-25 top-0 left-0 w-100 h-100"
                                                    loading="lazy"
                                                    style="background-image: url('/images/satsdn.jpg'); background-size: cover; background-position: center;">
                                                </div>
                                                <h1 class="card-title">SATS-DN</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-center align-items-center py-md-4"
                                                style="">
                                                <div class="position-absolute opacity-25 top-0 left-0 w-100 h-100"
                                                    loading="lazy"
                                                    style="background-image: url('/images/formc.png'); background-size: cover; background-position: center;">
                                                </div>
                                                <h1 class="card-title">FORM-C</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-body d-flex justify-content-center align-items-center py-md-4"
                                                style="">
                                                <div class="position-absolute opacity-25 top-0 left-0 w-100 h-100"
                                                    loading="lazy"
                                                    style="background-image: url('/images/pengepakan.jpg'); background-size: cover; background-position: center;">
                                                </div>
                                                <h1 class="card-title">PENGEPAKAN</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </section>
                        <section class="informasi container-fluid py-5">
                            <h1 class="mb-5 text-center">PENGUMUMAN / BERITA</h1>
                            <div id="informasiCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($pengumumans as $index => $pengumuman)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <article class="row mx-1">
                                                <div class="col-md-12">
                                                    <div class="card mb-4 shadow-sm py-3 px-4">
                                                        <div class="card-body row g-4">
                                                            <header class="col-md-4 d-flex align-items-center">
                                                                <img src="{{ $pengumuman->gambar ? asset('storage/pengumuman_images/' . $pengumuman->gambar) : '/images/imgplaceholder.png' }}"
                                                                class="card-img card-img-top" alt="{{ $pengumuman->judul }}">
                                                            </header>
                                                            <aside class="col-md-8">
                                                                <header class="text-white py-2">
                                                                    <h2 class="card-title" style="color: #FBC834">
                                                                        <a href="{{ route('pengumuman.show', $pengumuman->id) }}"
                                                                            class="text-decoration-none text-reset">
                                                                            {{ strtoupper($pengumuman->judul) }}
                                                                        </a>
                                                                    </h2>
                                                                </header>
                                                                <article class="text-white">
                                                                    <p class="card-text">
                                                                        {!! Str::limit($pengumuman->konten, 400) !!}
                                                                    </p>
                                                                    <p class="card-text"><small
                                                                            class="text-muted">{{ $pengumuman->created_at->diffForHumans() }}</small>
                                                                    </p>
                                                                </article>
                                                            </aside>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Number Indicators -->
                                <nav class="page page-short" aria-label="Page navigation example">
                                    <ul class="pagination d-flex flex-wrap justify-content-center">
                                        @foreach ($pengumumans->take(6) as $index => $pengumuman)
                                            <li class="page-item m-1"><a type="button"
                                                    data-bs-target="#informasiCarousel"
                                                    data-bs-slide-to="{{ $index }}"
                                                    class="page-link {{ $index == 0 ? 'active' : '' }}"
                                                    aria-current="true">
                                                    {{ $index + 1 }}
                                                </a>
                                            </li>
                                        @endforeach
                                        @if ($pengumumans->count() > 6)
                                            <a href="/pengumuman" class="btn btn-outline-warning mx-2">Lebih
                                                Banyak</a>
                                        @endif
                                    </ul>
                                </nav>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#informasiCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#informasiCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </section>
                        <section class="container-fluid">
                            <h1 class="mb-4 text-start align-middle" style="color: #004165"><i
                                    class="fa-brands fa-instagram align-middle" style="font-size: 1.5em"></i>
                                <a href="https://www.instagram.com/bbksda_sumut/"
                                    class="text-decoration-none text-reset">INSTAGRAM</a>
                            </h1>
                            <article class="row g-4 d-flex align-items-center justify-content-center">
                                <!-- Instagram Post 1 -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                                    <div class="instagram-post">
                                        <img src="/images/Rectangle8.png" alt="Instagram 1" class="img-fluid">
                                    </div>
                                </div>
                                <!-- Instagram Post 2 -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                                    <div class="instagram-post">
                                        <img src="/images/Rectangle9.png" alt="Instagram 2" class="img-fluid">
                                    </div>
                                </div>
                                <!-- Instagram Post 3 -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                                    <div class="instagram-post">
                                        <img src="/images/Rectangle17.png" alt="Instagram 3" class="img-fluid">
                                    </div>
                                </div>
                                <!-- Instagram Post 4 -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                                    <div class="instagram-post">
                                        <img src="/images/Rectangle30.png" alt="Instagram 4" class="img-fluid">
                                    </div>
                                </div>
                                <!-- Instagram Post 5 -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                                    <div class="instagram-post">
                                        <img src="/images/Rectangle12.png" alt="Instagram 5" class="img-fluid">
                                    </div>
                                </div>
                                <!-- Instagram Post 6 -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                                    <div class="instagram-post">
                                        <img src="/images/Rectangle13.png" alt="Instagram 6" class="img-fluid">
                                    </div>
                                </div>
                                <!-- Instagram Post 7 -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                                    <div class="instagram-post">
                                        <img src="/images/Rectangle14.png" alt="Instagram 7" class="img-fluid">
                                    </div>
                                </div>
                                <!-- Instagram Post 8 -->
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                                    <div class="instagram-post">
                                        <img src="/images/Rectangle31.png" alt="Instagram 8" class="img-fluid">
                                    </div>
                                </div>
                            </article>
                        </section>

                        <section class="pt-5">
                            <article class="container-fluid">
                                <h1 class="mb-3 text-start" style="color: #004165">Artikel</h2>
                                    <div class="row d-flex">
                                        <div class="col-lg-12 text-center mb-5 p-1">
                                            <ul class="nav nav-pills d-flex justify-content-start flex-wrap"
                                                id="artikelTabs" role="tablist">
                                                @foreach ($kategoris as $index => $kategori)
                                                    <div class="list-artikel">
                                                        <li class="nav-item">
                                                            <a class="nav-link fw-bolder {{ $index == 0 ? 'active' : '' }}"
                                                                id="{{ $kategori->slug }}-tab" data-toggle="tab"
                                                                href="#{{ $kategori->slug }}" role="tab">
                                                                {{ $kategori->nama }}
                                                            </a>
                                                        </li>
                                                    </div>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="tab-content" id="artikelTabsContent">
                                        <div class="tab-pane fade show active" id="pengelolaan" role="tabpanel">
                                            <div class="row">
                                                @foreach ($artikels as $item)
                                                    <div class="col-lg-4 col-md-6 mb-4">
                                                        <div class="card h-100">
                                                            <img src="{{ $item->gambar ? asset('storage/artikel_images/' . $item->gambar) : '/images/imgplaceholder.png' }}" class="card-img-top" alt="{{ $item->judul }}"> 
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{ $item->judul }}</h5>
                                                                <p class="card-text">
                                                                    {!! Str::limit($item->konten, 150) !!}</p>
                                                            </div>
                                                            <div class="card-body d-flex align-items-end">
                                                                <a href="{{ route('artikel.show', $item->id) }}"
                                                                    class="btn btn-outline-warning px-5 py-2">SELENGKAPNYA</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagination -->
                                    <nav class="page page-short mt-3">
                                        <ul class="pagination d-flex flex-wrap justify-content-center">
                                            <!-- Previous Page Link -->
                                            @if ($artikels->onFirstPage())
                                                <li class="page-item m-1 disabled"><span
                                                        class="page-link">Sebelumnya</span></li>
                                            @else
                                                <li class="page-item m-1"><a class="page-link"
                                                        href="{{ $artikels->previousPageUrl() }}">Sebelumnya</a>
                                                </li>
                                            @endif

                                            <!-- Pagination Elements -->
                                            @foreach ($artikels->links()->elements[0] as $page => $url)
                                                <li
                                                    class="page-item m-1 {{ $page == $artikels->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            <!-- Next Page Link -->
                                            @if ($artikels->hasMorePages())
                                                <li class="page-item m-1"><a class="page-link"
                                                        href="{{ $artikels->nextPageUrl() }}">Berikutnya</a>
                                                </li>
                                            @else
                                                <li class="page-item m-1 disabled"><span
                                                        class="page-link">Berikutnya</span></li>
                                            @endif

                                            <!-- "Lebih Banyak" Link -->
                                            @if ($artikels->lastPage() > 3)
                                                <li class="page-item m-1"><a class="page-link" href="/artikel">Lebih
                                                        Banyak</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                            </article>
                        </section>
                    </article>
                </section>
                @include('partials.footer')
                <div class="pelaporan">
                    <div class="container d-flex justify-content-center align-items-center">
                        <img class="icon-pelaporan" src="/images/pelaporan.png" alt="Logo">
                        <a href="#" class="m-0 text-decoration-none">PELAPORAN</a>
                    </div>
                </div>
            </section>
        @endif
    </main>
</body>

</html>
