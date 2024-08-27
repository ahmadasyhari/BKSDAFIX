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
    @vite('resources/js/app.js')
</head>

<body style="background-color: #0B1D26;">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #FFF">
        <div class="container-fluid">
            <img class="logo" src="/images/logo.png" alt="Logo">
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
                    <li class="nav-item">
                        <a class="fw-bold nav-link" aria-current="page" href="#">DATA & INFORMASI</a>
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

    <main class="container-fluid p-0">
        @if (isset($menu))
            <!-- Jika menu dipilih, tampilkan kontennya -->
            <h1>{{ $menu->title }}</h1>
            <div>
                {!! $menu->content !!}
            </div>
        @else
            <section class="beranda">
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
                <section class="layanan card mx-4" style="top: -30px; border-radius: 20px;" z-index="2">
                    <article class="card-body pt-5">
                        <section class="py-md-5">
                            <article class="container-fluid text-center"
                                style="font-family: 'Montserrat Subrayada', sans-serif;">
                                <h1 class="mb-5">Layanan Kami</h1>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body py-md-4"
                                                style="background-image: url(/images/e-satsdn.png); background-size: crop; background-position: center;">
                                                <div class="row d-flex justify-content-center align-items-center">
                                                    <div class="col-4">
                                                        <i class="icon-layanan nf nf-fa-pencil_square_o text-start"></i>
                                                    </div>
                                                    <div class="col-8 text-start mb-2 p-0">
                                                        <h1 class="card-title">E-SATS-DN</h1>
                                                        <h3 class="card-text">Surat Izin<br>E-SATS-DN</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body py-md-4"
                                                style="background-image: url(/images/e-simaksi.png); background-size: crop; background-position: center;">
                                                <div class="row d-flex justify-content-center align-items-center">
                                                    <div class="col-4">
                                                        <i
                                                            class="icon-layanan nf nf-md-file_document_outline text-start"></i>
                                                    </div>
                                                    <div class="col-8 text-start mb-2 p-0">
                                                        <h1 class="card-title">E-SIMAKSI</h1>
                                                        <h3 class="card-text">Surat Izin Masuk<br>Kawasan
                                                            Konservasi
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body py-md-4"
                                                style="background-image: url(/images/form-c.png); background-size: crop; background-position: center;">
                                                <div class="row d-flex justify-content-center align-items-center">
                                                    <div class="col-4">
                                                        <i class="icon-layanan fa-regular fa-message text-start"></i>
                                                    </div>
                                                    <div class="col-8 text-start mb-2 p-0">
                                                        <h1 class="card-title">Form-C</h1>
                                                        <!--<h2 class="card-text">Formulir untuk Layanan C</h2>-->
                                                    </div>
                                                </div>
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
                                    <div class="card mb-4 shadow-sm py-3 px-3" style="background-color: #0B1D26;">
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
                            <nav class="page" aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item m-1"><a class="page-link active" href="#">1</a>
                                    </li>
                                    <li class="page-item m-1"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item m-1"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item m-1"><a class="page-link" href="/berita">Lebih Banyak</a>
                                    </li>
                                </ul>
                            </nav>
                        </section>
                        <section class="insta container-fluid">
                            <h1 class="mb-4 text-start" style="color: #004165"><i class="fa-brands fa-instagram"></i>
                                <a href="https://www.instagram.com/bbksda_sumut/" class="text-decoration-none text-reset">INSTAGRAM</a></h1>
                            <article class="row g-3 d-flex align-items-center justify-content-center">
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

                        <section class="article pt-5">
                            <article class="container-fluid">
                                <h1 class="mb-4 text-start" style="color: #004165">Artikel</h2>
                                    <div class="row d-flex">
                                        <div class="col-lg-12 text-center mb-4">
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
                <footer class="text-light pt-5">
                    <div class="container-fluid px-5">
                        <div class="row">
                            <!-- Temui Kami -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <h1 class="mb-4">Temui Kami</h5>
                                    <div class="row mb-4">
                                        <div class="col-2 text-center">
                                            <i class="fab fa-facebook-f"
                                                style="color: #FFD43B; font-size: 2.125rem; padding-left: 5px;"></i>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-auto">
                                            <a href="#" class="text-white text-start">bbksda</a>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-2 text-center">
                                            <i class="fab fa-youtube"
                                                style="color: #FFD43B; font-size: 2.125rem;"></i>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-auto">
                                            <a href="#" class="text-white text-start">bbksda</a>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-2 text-center">
                                            <i class="fab fa-instagram"
                                                style="color: #FFD43B; font-size: 2.125rem; padding-left: 3px;"></i>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-auto">
                                            <a href="https://www.instagram.com/bbksda_sumut/" class="text-white text-start">@bbksda</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2 text-center">
                                            <i class="fab fa-twitter"
                                                style="color: #FFD43B; font-size: 2.125rem; padding-left: 0px;"></i>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-auto">
                                            <a href="#" class="text-white">bbksda</a>
                                        </div>
                                    </div>
                            </div>
                            <!-- Tentang Kami -->
                            <div class="col-lg-4 col-md-6 mb-4">
                                <h1 class="mb-4">Tentang Kami</h5>
                                    <p style="font-family: Montserrat">
                                        Penasehat/Pembina:<br>
                                        Kepala Balai Besar KSDA Papua Barat<br>
                                        Kepala Bagian Tata Usaha<br>
                                        Pengarah :<br>
                                        Kepala Subbag. Data, Evlap, dan Kehumasan<br><br>
                                        Penanggung Jawab/Pemimpin Redaksi:<br>Gusta Fitri Adi, S.Hut
                                    </p>
                            </div>
                            <!-- Hubungi Kami -->
                            <div class="col-lg-4 col-md-12 mb-4">
                                <h1 class="mb-4 text-start">Hubungi Kami</h5>
                                    <div class="row">
                                        <div class="col-2 text-center">
                                            <i class="fa-solid fa-phone-volume text-start"
                                                style="color: #FFD43B; font-size: 2.125rem;"></i>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-auto">
                                            <p class="text-decoration-none text-reset" style="font-family: 'Montserrat Subrayada', sans-serif;">
                                                CALL CENTRE :<br>085376690666</p>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <div class="pelaporan">
                    <div class="container d-flex justify-content-center align-items-center">
                        <i class="icon-layanan fa-solid fa-phone-volume text-start"
                            style="font-size: 1.5em; margin-right: 1.5rem;"></i>
                        <a href="#" class="fw-bold m-0 text-decoration-none text-reset">PELAPORAN</a>
                    </div>
                </div>
        @endif
    </main>
</body>

</html>
