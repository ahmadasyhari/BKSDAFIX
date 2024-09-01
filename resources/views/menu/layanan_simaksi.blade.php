<?php use App\Models\Menu; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($menu) ? $menu->title : 'SIMAKSI' }}</title>
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
            <img class="logo" src="/images/logo-sm.png" alt="Logo" width="75" height="auto">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="fw-bold nav-link" href="/">BERANDA</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
                        <a class="fw-bold nav-link" type="button"
                            aria-expanded="false">PROFIL</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item" href="/logo">Logo</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Struktur Organisasi</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Visi & Misi</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Tugas Pokok dan Fungsi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="fw-bold nav-link" type="button" aria-expanded="false">DATA & INFORMASI</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item text-wrap" href="/perizinan">Perizinan</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Kawasan</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Laporan</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Galery Foto dan Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="fw-bold nav-link {{ !isset($menu) ? 'active' : '' }}" type="button" aria-expanded="false">LAYANAN</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">IZIN BARU / PERPANJANGAN</a>
                            </li>
                            <li><a class="fw-bold dropdown-item text-wrap {{ !isset($menu) ? 'active' : '' }}" href="#">SIMAKSI</a></li>
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
                    </li> -->

                    @foreach (Menu::whereNull('parent_id')->get() as $menuItem)
                        @php $dropdownId = 'navbarDropdown' . $menuItem->id; @endphp
                        <li class="nav-item dropdown fw-bold dropdown-item text-wrap">
                            <a class="nav-link dropdown-toggle text-uppercase"
                                href="{{ $menuItem->url ?: route('menu.show', $menuItem->id) }}"
                                id="{{ $dropdownId }}" role="button" aria-expanded="false">
                                {{ $menuItem->title }}
                            </a>

                            @if ($menuItem->children->count())
                                <ul class="dropdown-menu" aria-labelledby="{{ $dropdownId }}">
                                    @foreach ($menuItem->children as $child)
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle"
                                                href="{{ $child->url ?: route('menu.show', $child->id) }}">
                                                {{ $child->title }}
                                            </a>
                                            @if ($child->children->count())
                                                <ul class="dropdown-menu">
                                                    @foreach ($child->children as $subchild)
                                                        <li class="dropdown-submenu">
                                                            <a class="dropdown-item dropdown-toggle"
                                                                href="{{ $subchild->url ?: route('submenu.show', $subchild->id) }}">
                                                                {{ $subchild->title }}
                                                            </a>
                                                            @if ($subchild->children->count())
                                                                <ul class="dropdown-menu">
                                                                    @foreach ($subchild->children as $subsubchild)
                                                                        <li>
                                                                            <a class="dropdown-item"
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
            <section class="hal-logo">
                <!-- Header -->
                <article id="carouselExampleslidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="/images/simaksi.png" class="d-block w-100" alt="...">
                            <div class="header-content" z-index="1">
                                <h2 style="color: #FBC834">LAYANAN</h2>
                                <h1>SIMAKSI</h1>
                            </div>
                        </div>
                    </div>
                </article>
                <section class="logo-card card mx-4 py-5" style="top: -30px; border-radius: 20px; z-index: 2;">
                    <article class="card-body pt-lg-4">
                        <div class="text-center py-4">
                            <img class="img-fluid mx-auto" src="/images/alursimaksi.png" alt="Logo BKSDA SUMUT">
                        </div>
                        <div class="container py-2">
                            <div class="text-center mb-4">
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-7 px-3 text-start">
                                    <h1 class="mb-3">FORM DETIL PERMOHONAN IJIN</h1>
                                    <button class="btn btn-warning" style="width 300px; height 150px">KLIK
                                        DISINI</button>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="height:300px">
                    </article>
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
