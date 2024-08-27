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
            <img class="logo" src="/images/logo-sm.png" alt="Logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="fw-bold nav-link" href="/">BERANDA</a>
                    </li>
                    <li class="nav-item dropdown">
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
                            <li><a class="fw-bold dropdown-item" href="#">Perizinan</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Kawasan</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Laporan</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Galery Foto dan Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="fw-bold nav-link" type="button" aria-expanded="false">LAYANAN</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item" href="#">SIMAKSI</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">SATS-DN</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">FORM-C</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Pengepakan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="fw-bold nav-link" type="button" aria-expanded="false">MITRA KERJA</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Lembaga Konservasi</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Penangkaran Tumbuhan dan Satwa
                                    Liar</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Pengedar Tumbuhan dan Satwa
                                    Liar</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Penguatan Fungsi KSA & KPA</a>
                            </li>
                        </ul>
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
            <section class="detailberita">
                <!-- Header -->
                <article id="carouselExampleslidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="/images/berita.png" class="d-block w-100" alt="...">
                            <div class="header-content" z-index="1">
                                <h2 style="color: #FBC834">Informasi</h2>
                                <h1>PENGUMUMAN DAN BERITA</h1>
                            </div>
                        </div>
                    </div>
                </article>
                <section class="detailberita-card card mx-4 py-5" style="top: -30px; border-radius: 20px;" z-index="2">
                    <article class="card-body pt-lg-4">
                        <div class="container py-3">
                            <div class="card px-3">
                                <div class="row">
                                    <header class="col-md-6 py-3">
                                        <div class="card-block px-6">
                                            <h4 class="card-title fw-bold pt-3">Heading</h4>
                                            <h5 class="card-text text-secondary mb-3">Subheading</h5>
                                            <p class="card-text">Body text for your whole article or post. We’ll put
                                                in some lorem ipsum to show how a filled-out page might look:</p>
                                            <p class="card-text">Excepteur efficient emerging, minim veniam anim
                                                aute carefully curated Ginza conversation exquisite perfect nostrud
                                                nisi intricate Content. Qui international first-class nulla ut.
                                                Punctual adipisicing, essential lovely queen tempor eiusmod irure.
                                                Exclusive izakaya charming Scandinavian impeccable aute quality of
                                                life soft power pariatur Melbourne occaecat discerning. Qui wardrobe
                                                aliquip, et Porter destination Toto remarkable officia Helsinki
                                                excepteur Basset hound. Zürich sleepy perfect consectetur.
                                            </p>
                                        </div>
                                    </header>
                                    <aside class="col-md-6 py-3">
                                        <img src="/images/imgplaceholder.png" class="card-img" alt="Berita Image">
                                    </aside>
                                </div>
                            </div>
                        </div>
                        <div class="container py-3">
                            <div class="card px-3">
                                <div class="row">
                                    <header class="col-md-6 py-3">
                                        <img src="/images/imgplaceholder.png" class="card-img" alt="Berita Image">
                                    </header>
                                    <aside class="col-md-6 px-3">
                                        <div class="card-block px-6">
                                            <h4 class="card-title fw-bold pt-3">Heading</h4>
                                            <h5 class="card-title text-secondary mb-3">Subheading</h5>
                                            <p class="card-text">Body text for your whole article or post. We’ll
                                                put
                                                in some lorem ipsum to show how a filled-out page might look:</p>
                                            <p class="card-text">Excepteur efficient emerging, minim veniam anim
                                                aute carefully curated Ginza conversation exquisite perfect nostrud
                                                nisi intricate Content. Qui international first-class nulla ut.
                                                Punctual adipisicing, essential lovely queen tempor eiusmod irure.
                                                Exclusive izakaya charming Scandinavian impeccable aute quality of
                                                life soft power pariatur Melbourne occaecat discerning. Qui wardrobe
                                                aliquip, et Porter destination Toto remarkable officia Helsinki
                                                excepteur Basset hound. Zürich sleepy perfect consectetur.
                                            </p>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
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
                                                style="color: #FFD43B; font-size: 2.125rem; padding-left: 2px;"></i>
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-auto">
                                            <a href="https://www.instagram.com/bbksda_sumut/"
                                                class="text-white text-start">@bbksda</a>
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
                                            <p class="text-decoration-none text-reset"
                                                style="font-family: 'Montserrat Subrayada', sans-serif;">
                                                CALL CENTRE :<br>085376690666</p>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </section>
        @endif
    </main>
</body>

</html>
