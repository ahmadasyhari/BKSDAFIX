<?php use App\Models\Menu; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($menu) ? $menu->title : 'Detail Berita' }}</title>
    <link href="https://fonts.cdnfonts.com/css/montserrat-subrayada" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/abeezee" rel="stylesheet">
    <link rel="stylesheet" href="https://www.nerdfonts.com/assets/css/webfont.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    @vite('resources/css/style.css')
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #FFF">
        <div class="container-fluid">
            <img class="logo" src="/images/logo.png" alt="Logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="fw-bold nav-link" href="/">BERANDA</a>
                    </li>
                    <!--<li class="nav-item dropdown">
                        <a class="fw-bold nav-link" type="button" aria-expanded="false">PROFIL</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item" href="/logo">Logo</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Struktur Organisasi</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Visi & Misi</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Tugas Pokok dan Fungsi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="fw-bold nav-link {{ !isset($menu) ? 'active' : '' }}" aria-current="page"
                            type="button" aria-expanded="false">DATA & INFORMASI</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item" href="/perizinan">Perizinan</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Kawasan</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Laporan</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Galery Foto dan Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="fw-bold nav-link" type="button" aria-expanded="false">LAYANAN</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">IZIN BARU / PERPANJANGAN</a>
                            </li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="/simaksi">SIMAKSI</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Lembaga Konservasi</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Penangkaran TSL</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Peredaran TSL</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="fw-bold nav-link" type="button" aria-expanded="false">MITRA KERJA</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item text-wrap" href="/mitra">Lembaga Konservasi</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Penangkaran Tumbuhan dan Satwa
                                    Liar</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Pengedar Tumbuhan dan Satwa
                                    Liar</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Penguatan Fungsi KSA & KPA</a>
                            </li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Pembangunan Strategis yang
                                    tidak dapat dielakan</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Kemitran Konservasi</a></li>
                        </ul>
                    </li>-->

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

    <main class="container-fluid p-0">
        @if (isset($menu))
            <!-- Jika menu dipilih, tampilkan kontennya -->
            <h1>{{ $menu->title }}</h1>
            <div>
                {!! $menu->content !!}
            </div>
        @else
            <section class="detailpengumuman">
                <!-- Header -->
                <article id="carouselExampleslidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="/images/pengumuman.png" class="d-block w-100" alt="...">
                            <div class="header-content" z-index="1">
                                <h2 style="color: #FBC834">Informasi</h2>
                                <h1>PENGUMUMAN DAN BERITA</h1>
                            </div>
                        </div>
                    </div>
                </article>
                <section class="detailpengumuman-card card mx-4 py-5" style="top: -30px; border-radius: 20px;"
                    z-index="2">
                    </div>
                    <article class="card-body pt-lg-4">
                        <div class="container py-3">
                            <div class="card px-3">
                                <div class="row">
                                    <header class="col-md-6 py-3">
                                        <div class="card-block px-6">
                                            <h4 class="card-title fw-bold pt-3">{{ $pengumuman->judul }}</h4>
                                            <h5 class="card-text text-secondary mb-3">{{ $pengumuman->judul }}</h5>
                                            <p class="card-text">{{ $pengumuman->konten }}</p>
                                        </div>
                                    </header>
                                    <aside class="col-md-6 d-flex align-items-center py-3">
                                        <img src="/images/imgplaceholder.png" class="card-img" alt="Berita Image">
                                    </aside>
                                </div>
                            </div>
                        </div>
                </section>
                <footer class="footer text-light py-5">
                    <div class="container">
                        <div class="row">
                            <!-- Temukan Kami Section -->
                            <div class="col-lg-4 col-md-12 mb-4">
                                <h2 class="text-uppercase fw-bold mb-4">Temukan Kami</h2>
                                <p>Sosial Media Resmi dari Balai Besar Konservasi <br> Sumber Daya Alam Sumatra Utara
                                </p>
                                <div class="social-icons">
                                    <a href="#"><img src="/images/facebook.png" alt="Facebook"
                                            class="social-icon"></a>
                                    <a href="#"><img src="/images/youtube.png" alt="YouTube"
                                            class="social-icon"></a>
                                    <a href="#"><img src="/images/instagram.png" alt="Instagram"
                                            class="social-icon"></a>
                                    <a href="#"><img src="/images/twitter.png" alt="Twitter"
                                            class="social-icon"></a>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12 mb-4"></div>
                            <!-- Hubungi Kami Section -->
                            <div class="col-lg-3 col-md-12 mb-4">
                                <h2 class="text-uppercase fw-bold text-lg-end text-md-start mb-4">Hubungi Kami</h2>
                                <h3 class="text-lg-end text-md-start text-wrap align-middle">
                                    <img src="/images/phone.png" alt="Phone Icon" class="contact-icon">CALL CENTRE :
                                    085376699066
                                </h3>
                                </h3>
                            </div>
                        </div>
                    </div>
                </footer>
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