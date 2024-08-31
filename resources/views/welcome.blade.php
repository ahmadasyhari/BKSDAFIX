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
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-xl navbar-light" style="background-color: #FFF">
        <div class="container-fluid">
            <img class="logo" src="/images/logo-sm.png" alt="Logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="fw-bold nav-link {{ !isset($menu) ? 'active' : '' }}" aria-current="page"
                            href="/">BERANDA</a>
                    </li>
                    <!--
                    <li class="nav-item dropdown">
                        <a class="fw-bold nav-link" type="button" aria-expanded="false">PROFIL</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item text-wrap" href="/logo">Logo</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Struktur Organisasi</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Visi & Misi</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Tugas Pokok dan Fungsi</a>
                            </li>
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
                    </li>
                -->
                @foreach (Menu::whereNull('parent_id')->get() as $menuItem)
                    @php $dropdownId = 'navbarDropdown' . $menuItem->id; @endphp
                    <li class="nav-item dropdown fw-bold dropdown-item text-wrap">
                        <a class="nav-link dropdown-toggle text-uppercase" href="{{ $menuItem->url ?: route('menu.show', $menuItem->id) }}" id="{{ $dropdownId }}" role="button" aria-expanded="false">
                            {{ $menuItem->title }}
                        </a>

                        @if ($menuItem->children->count())
                            <ul class="dropdown-menu" aria-labelledby="{{ $dropdownId }}">
                                @foreach ($menuItem->children as $child)
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="{{ $child->url ?: route('menu.show', $child->id) }}">
                                            {{ $child->title }}
                                        </a>
                                        @if ($child->children->count())
                                            <ul class="dropdown-menu">
                                                @foreach ($child->children as $subchild)
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item dropdown-toggle" href="{{ $subchild->url ?: route('submenu.show', $subchild->id) }}">
                                                            {{ $subchild->title }}
                                                        </a>
                                                        @if ($subchild->children->count())
                                                            <ul class="dropdown-menu">
                                                                @foreach ($subchild->children as $subsubchild)
                                                                    <li>
                                                                        <a class="dropdown-item" href="{{ $subsubchild->url ?: route('submenu.show', $subsubchild->id) }}">
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
                            <article class="row mx-1">
                                <div class="col-md-12">
                                    <div class="card mb-4 shadow-sm py-3 px-4">
                                        <div class="card-body row g-5">
                                            <header class="col-md-4 d-flex align-items-center">
                                                <img src="/images/image2.png" class="card-img" alt="Berita Image">
                                            </header>
                                            <aside class="col-md-8">
                                                <header class="text-white pb-3">
                                                    <h2 class="card-title" style="color: #FBC834">
                                                        INFORMASI
                                                    </h2>
                                                </header>
                                                <article class="text-white">
                                                    <p class="card-text">Sahabat, pada tahu nggak sih
                                                        kalau kita bisa lihat gajah di dekat Danau Toba? Ayo
                                                        kita ke ANECC!</p>
                                                    <p class="card-text">Ayok kita ke ANECC ! Lokasinya
                                                        deket banget sama Parapat loh! Tepatnya di Jl. Raya
                                                        Lintas Utama Sumatera No.16,
                                                        Sibaganding, Kec. Girsang Sipangan Bolon, Kabupaten
                                                        Simalungun, Sumatera Utara 21174.</p>
                                                    <p class="card-text"><small class="text-muted">1 menit
                                                            yang lalu</small></p>
                                                </article>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <!-- Pagination -->
                            <nav class="page page-short" aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item m-1"><a class="page-link active" href="#">1</a>
                                    </li>
                                    <li class="page-item m-1"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item m-1"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item m-1"><a class="page-link" href="/pengumuman">Lebih Banyak</a>
                                    </li>
                                </ul>
                            </nav>
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

                        <section class="list-artikel pt-5">
                            <article class="container-fluid">
                                <h1 class="mb-3 text-start" style="color: #004165">Artikel</h2>
                                    <div class="row d-flex">
                                        <div class="col-lg-12 text-center mb-5 p-1">
                                            <ul class="nav nav-pills d-flex justify-content-start flex-wrap"
                                                id="artikelTabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bolder active" id="pengelolaan-tab"
                                                        data-toggle="tab" href="#pengelolaan"
                                                        role="tab">Pengelolaan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bolder" id="tsl-tab" data-toggle="tab"
                                                        href="#tsl" role="tab">TSL</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bolder" id="penyuluhan-tab"
                                                        data-toggle="tab" href="#penyuluhan"
                                                        role="tab">Penyuluhan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bolder" id="patroli-tab" data-toggle="tab"
                                                        href="#patroli" role="tab">Patroli</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bolder" id="kepegawaian-tab"
                                                        data-toggle="tab" href="#kepegawaian"
                                                        role="tab">Kepegawaian</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="tab-content" id="artikelTabsContent">
                                        <div class="tab-pane fade show active" id="pengelolaan" role="tabpanel">
                                            <div class="row">
                                                <!-- Artikel 1 -->
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <img src="/images/Rectangle18.png" class="card-img-top"
                                                            alt="Artikel 1">
                                                        <div class="card-body">
                                                            <h5 class="card-title">MENGUNGKAP MISTERI KUSKUS TOTOL
                                                                WAIGEO: SPILOCUSCUS PAPUENSIS</h5>
                                                            <p class="card-text">Body text for whatever you'd like to
                                                                say. Add main takeaway points...</p>
                                                        </div>
                                                        <div class="card-body d-flex align-items-end">
                                                            <a href="/detailartikel"
                                                                class="btn btn-outline-warning px-5 py-2">SELENGKAPNYA</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Artikel 2 -->
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <img src="/images/Rectangle19.png" class="card-img-top"
                                                            alt="Artikel 2">
                                                        <div class="card-body">
                                                            <h5 class="card-title">PERANAN PENTING BURUNG DALAM
                                                                EKOSISTEM HUTAN INDONESIA</h5>
                                                            <p class="card-text">Body text for whatever you'd like to
                                                                say. Add main takeaway points...</p>
                                                        </div>
                                                        <div class="card-body d-flex align-items-end">
                                                            <a href="/detailartikel"
                                                                class="btn btn-outline-warning px-5 py-2">SELENGKAPNYA</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Artikel 3 -->
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <img src="/images/Rectangle29.png" class="card-img-top"
                                                            alt="Artikel 3">
                                                        <div class="card-body">
                                                            <h5 class="card-title">HUTAN DAN MASYARAKAT: KOLABORASI
                                                                PENTING DALAM KONSERVASI SUMBER DAYA ALAM</h5>
                                                            <p class="card-text">Body text for whatever you'd like to
                                                                say. Add main takeaway points...</p>
                                                        </div>
                                                        <div class="card-body d-flex align-items-end">
                                                            <a href="/detailartikel"
                                                                class="btn btn-outline-warning px-5 py-2">SELENGKAPNYA</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Artikel 4 -->
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <img src="/images/Rectangle20.png" class="card-img-top"
                                                            alt="Artikel 3">
                                                        <div class="card-body">
                                                            <h5 class="card-title">KEAJAIBAN POLINATOR: PENJAGA
                                                                EKOSISTEM YANG SERING TIDAK DIANGGAP</h5>
                                                            <p class="card-text">Body text for whatever you'd like to
                                                                say. Add main takeaway points...</p>
                                                        </div>
                                                        <div class="card-body d-flex align-items-end">
                                                            <a href="/detailartikel"
                                                                class="btn btn-outline-warning px-5 py-2">SELENGKAPNYA</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Artikel 5 -->
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <img src="/images/Rectangle21.png" class="card-img-top"
                                                            alt="Artikel 3">
                                                        <div class="card-body">
                                                            <h5 class="card-title">PERAN LABA-LABA DALAM EKOSISTEM
                                                                HUTAN</h5>
                                                            <p class="card-text">Body text for whatever you'd like to
                                                                say. Add main takeaway points...</p>
                                                        </div>
                                                        <div class="card-body d-flex align-items-end">
                                                            <a href="/detailartikel"
                                                                class="btn btn-outline-warning px-5 py-2">SELENGKAPNYA</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Artikel 6 -->
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div class="card h-100">
                                                        <img src="/images/Rectangle28.png" class="card-img-top"
                                                            alt="Artikel 3">
                                                        <div class="card-body">
                                                            <h5 class="card-title">PENTINGNYA JAMUR DALAM EKOSISTEM
                                                                HUTAN</h5>
                                                            <p class="card-text">Body text for whatever you'd like to
                                                                say. Add main takeaway points...</p>
                                                        </div>
                                                        <div class="card-body d-flex align-items-end">
                                                            <a href="/detailartikel"
                                                                class="btn btn-outline-warning px-5 py-2">SELENGKAPNYA</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Pagination -->
                                    <nav class="page" aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item m-1"><a class="page-link active"
                                                    href="#">1</a>
                                            </li>
                                            <li class="page-item m-1"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item m-1"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item m-1"><a class="page-link" href="/artikel">Lebih
                                                    Banyak</a></li>
                                        </ul>
                                    </nav>
                            </article>
                        </section>
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
<style>
    .dropdown-submenu {
    position: relative;
}

.dropdown-submenu > .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}

</style>
</html>
