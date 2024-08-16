<?php use App\Models\Menu; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($menu) ? $menu->title : 'Beranda' }}</title>
    <link href="https://fonts.cdnfonts.com/css/montserrat-subrayada" rel="stylesheet">
    <link rel="stylesheet" href="https://www.nerdfonts.com/assets/css/webfont.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
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
            /*background-image: url('/images/bukit_holbung.svg');
            background-size: cover;
            background-position: center;*/
            height: 80vh;
            position: relative;
            color: white;
            transition: height 0.5s ease;
            /* Menambahkan transisi untuk perubahan tinggi */
        }

        .header-content {
            color: #FFF;
            position: absolute;
            bottom: 126px;
            left: 96px;
            font-family: 'Montserrat Subrayada', sans-serif;
            transition: all 0.5s ease;
            /* Menambahkan transisi untuk perubahan ukuran font */
        }

        h1 {
            font-family: 'Montserrat Subrayada', sans-serif;
            font-size: 2.5rem;
            transition: all 0.5s ease;
            /* Menambahkan transisi untuk perubahan ukuran font pada h1 */
        }

        h2 {
            font-size: 1.25rem;
            transition: all 0.5s ease;
            /* Menambahkan transisi untuk perubahan ukuran font pada h2 */
        }

        h3 {
            font-size: 1.0rem;
            transition: all 0.5s ease;
            /* Menambahkan transisi untuk perubahan ukuran font pada h2 */
        }

        .carousel-inner .carousel-item {
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .card {
            border-radius: 20px;
        }

        @media screen and (max-width: 1000px) {
            .header-background {
                height: 70vh;
            }

            .header-content {
                bottom: 106px;
                left: 76px;
            }

            h1 {
                font-size: 1.875rem;
            }

            h2 {
                font-size: 0.9375rem;
            }

            h3 {
                font-size: 0.9375rem;
            }
        }

        @media screen and (max-width: 600px) {
            .header-background {
                height: 60vh;
            }

            .header-content {
                bottom: 46px;
                left: 56px;
            }

            h1 {
                font-size: 1.25rem;
            }

            h2 {
                font-size: 0.625rem;
            }

            h3 {
                font-size: 0.625rem;
            }
        }
    </style>
</head>

<body style="background-color: #0B1D26;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF">
        <div class="container-fluid">
            <img src="/images/logo.png" alt="Logo" width="60" height="auto">
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
                <div id="carouselExampleslidesOnly" class="carousel slide" data-bs-ride="carousel">
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
                                <h2>Samosir, Sumatera Utara</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mx-4" style="top: -30px; border-radius: 20px;" z-index="2">
                    <article class="card-body">
                        <section class="py-5">
                            <div class="container text-center" style="font-family: 'Montserrat Subrayada', sans-serif;">
                                <h1 class="mb-4">Layanan Kami</h2>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 shadow-sm">
                                                <div class="card-body py-2"
                                                    style="background-image: url(/images/e-satsdn.png); background-size: crop; background-position: center;">
                                                    <h1 class="card-title">E-SATS-DN</h1>
                                                    <h2 class="card-text">Surat Izin E-SATS-DN</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 shadow-sm">
                                                <div class="card-body py-2"
                                                    style="background-image: url(/images/e-simaksi.png); background-size: crop; background-position: center;">
                                                    <h1 class="card-title">E-SIMAKSI</h1>
                                                    <h2 class="card-text">Surat Izin Masuk Kawasan Konservasi</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="card h-100 shadow-sm">
                                                <div class="card-body py-2"
                                                    style="background-image: url(/images/form-c.png); background-size: crop; background-position: center;">
                                                    <h1 class="card-title">Form-C</h1>
                                                    <h2 class="card-text">Formulir untuk Layanan C</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </section>
                        <section>
                            <div class="container-fluid py-5">
                                <h1 class="mb-4 text-center">
                                    Pengumuman / Berita</h2>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card mb-4 shadow-sm" style="background-color: #0B1D26">
                                                <div class="mx-5 my-3">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-4">
                                                            <img src="/images/image2.png" class="card-img"
                                                                alt="Berita Image">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body text-white">
                                                                <h1 class="card-title" style="color: #FBC834">
                                                                    INFORMASI
                                                                </h1>
                                                                <h3 class="card-text">Sahabat, pada tahu nggak sih
                                                                    kalau
                                                                    kita
                                                                    bisa
                                                                    lihat
                                                                    gajah di dekat Danau Toba? Ayo kita ke ANECC!</h3>
                                                                <h3 class="card-text">Ayok kita ke ANECC ! Lokasinya
                                                                    deket
                                                                    banget sama Parapat loh!
                                                                    Tepatnya di Jl. Raya Lintas Utama Sumatera No.16,
                                                                    Sibaganding, Kec. Girsang Sipangan Bolon, Kabupaten
                                                                    Simalungun, Sumatera Utara 21174.</h3>
                                                                <h3 class="card-text"><small class="text-muted">1
                                                                        menit
                                                                        yang
                                                                        lalu</small></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Lebih
                                                    Banyak</a>
                                            </li>
                                        </ul>
                                    </nav>
                            </div>
                        </section>
                        <section class="py-5">
                            <div class="container-fluid align-items-center justify-content-center">
                                <h1 class="mb-4 text-start" style="color: #004165"><i
                                        class="fa-brands fa-instagram"></i> INSTAGRAM</h2>
                                    <div class="row g-3">
                                        <!-- Instagram Post 1 -->
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="instagram-post">
                                                <img src="/images/Rectangle8.png" alt="Instagram 1"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <!-- Instagram Post 2 -->
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="instagram-post">
                                                <img src="/images/Rectangle9.png" alt="Instagram 2"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <!-- Instagram Post 3 -->
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="instagram-post">
                                                <img src="/images/Rectangle17.png" alt="Instagram 3"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <!-- Instagram Post 4 -->
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="instagram-post">
                                                <img src="/images/Rectangle30.png" alt="Instagram 4"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <!-- Instagram Post 5 -->
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="instagram-post">
                                                <img src="/images/Rectangle12.png" alt="Instagram 5"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <!-- Instagram Post 6 -->
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="instagram-post">
                                                <img src="/images/Rectangle13.png" alt="Instagram 6"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <!-- Instagram Post 7 -->
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="instagram-post">
                                                <img src="/images/Rectangle14.png" alt="Instagram 7"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <!-- Instagram Post 8 -->
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="instagram-post">
                                                <img src="/images/Rectangle31.png" alt="Instagram 8"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </section>
                        <section class="py-5">
                            <div class="container-fluid">
                                <h1 class="mb-4 text-center" class="py-5">Artikel</h2>
                                    <div class="row">
                                        <div class="col-lg-12 text-center mb-4">
                                            <ul class="nav nav-tabs justify-content-center" id="artikelTabs"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pengelolaan-tab" data-toggle="tab"
                                                        href="#pengelolaan" role="tab">Pengelolaan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tsl-tab" data-toggle="tab"
                                                        href="#tsl" role="tab">TSL</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="penyuluhan-tab" data-toggle="tab"
                                                        href="#penyuluhan" role="tab">Penyuluhan</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="patroli-tab" data-toggle="tab"
                                                        href="#patroli" role="tab">Patroli</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="kepegawaian-tab" data-toggle="tab"
                                                        href="#kepegawaian" role="tab">Kepegawaian</a>
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
                                                            <a href="#" class="btn btn-primary">Selengkapnya</a>
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
                                                            <a href="#" class="btn btn-primary">Selengkapnya</a>
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
                                                            <a href="#" class="btn btn-primary">Selengkapnya</a>
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
                                                            <a href="#" class="btn btn-primary">Selengkapnya</a>
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
                                                            <a href="#" class="btn btn-primary">Selengkapnya</a>
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
                                                            <a href="#" class="btn btn-primary">Selengkapnya</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Pagination -->
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Lebih
                                                    Banyak</a></li>
                                        </ul>
                                    </nav>
                            </div>
                        </section>
                    </article>
                </div>
            </div>
        @endif
    </div>
    <footer class="text-light py-5">
        <div class="container">
            <div class="row">
                <!-- Temui Kami -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h1 class="mb-4">Temui Kami</h5>
                        <table class="table table-borderless dt[-head|-body] text-start align-middle">
                            <tr>
                                <th width="35%">
                                    <li><i class="fab fa-facebook-f"
                                            style="color: #FFD43B; font-size: 3.125rem; padding-left: 10px;"></i>
                                <td class="text-white"><a href="#" class="text-white text-start"
                                        style="text-decoration: none;">bbksda</a>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <li><i class="fab fa-youtube" style="color: #FFD43B; font-size: 3.125rem;"></i>
                                </th>
                                <td class="text-white"><a href="#" class="text-white text-start"
                                        style="text-decoration: none;">bbksda</a>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <li><i class="fab fa-instagram"
                                            style="color: #FFD43B; font-size: 3.125rem; padding-left: 5px;"></i>
                                </th>
                                <td><a href="#" class="text-white text-start"
                                        style="text-decoration: none;">@bbksda</a>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <li><i class="fab fa-twitter" style="color: #FFD43B; font-size: 3.125rem;"></i>
                                </th>
                                <td class="text-white"><a href="#" class="text-white text-start"
                                        style="text-decoration: none;">bbksda</a>
                                </td>
                            </tr>
                        </table>
                </div>
                <!-- Tentang Kami -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h1 class="mb-4">Tentang Kami</h5>
                        <p>
                            Penasehat/Pembina:<br>
                            Kepala Balai Besar KSDA Papua Barat<br>
                            Kepala Bagian Tata Usaha:<br>
                            Pengarah<br>
                            Kepala Subbag. Data, Evlap, dan Kehumasan<br><br>
                            Penanggung Jawab/Pemimpin Redaksi:<br>Gusta Fitri Adi, S.Hut
                        </p>
                </div>
                <!-- Hubungi Kami -->
                <div class="col-lg-4 col-md-12 mb-4">
                    <h1 class="mb-4 text-end">Hubungi Kami</h5>
                        <table class="table table-borderless dt[-head|-body] text-start align-middle">
                            <tr>
                                <th width="35%">
                                    <li><i class="fa-solid fa-phone-volume text-center"
                                            style="color: #FFD43B; font-size: 3.125rem; padding-left: 10px;"></i>
                                <td class="text-white">
                                    <h2
                                        style="text-decoration: none; font-family: 'Montserrat Subrayada', sans-serif;">
                                        CALL CENTRE :<br>085376690666</h2>
                                </td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="mb-0">&copy; 2024 BKSDA SUMUT. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>
