<?php use App\Models\Menu; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($menu) ? $menu->title : 'Perizinan' }}</title>
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
                            <li><a class="fw-bold dropdown-item {{ !isset($menu) ? 'active' : '' }}"
                                    href="/perizinan">Perizinan</a></li>
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
            <section class="perizinan">
                <!-- Header -->
                <article id="carouselExampleslidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="/images/paropo.svg" class="d-block w-100" alt="...">
                            <div class="header-content" z-index="1">
                                <h2 style="color: #FBC834">Informasi</h2>
                                <h1>PERIZINAN</h1>
                            </div>
                        </div>
                    </div>
                </article>
                <section class="card mx-4 py-5" style="top: -30px; border-radius: 20px;" z-index="2">
                    <div class="card-body pt-lg-4 ">
                        <article class="container-fluid text-center">
                            <div class="row px-4">
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card shadow-sm"
                                        style="background-color:#0B1D26; border-radius:10px; height: 130px">
                                        <div class="row card-body d-flex justify-content-center text-white"
                                            style="">
                                            <h5 class="card-title p-0 m-0">Title</h5>
                                            <p>Body text</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card shadow-sm"
                                        style="background-color:#E5A000; border-radius:10px; height: 130px">
                                        <div class="row card-body d-flex justify-content-center" style="">
                                            <h5 class="card-title p-0 m-0">Title</h5>
                                            <p>Body text</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card shadow-sm"
                                        style="background-color:#E5A000; border-radius:10px; height: 130px">
                                        <div class="row card-body d-flex justify-content-center" style="">
                                            <h5 class="card-title p-0 m-0">Title</h5>
                                            <p>Body text</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card shadow-sm"
                                        style="background-color:#E5A000; border-radius:10px; height: 130px">
                                        <div class="row card-body d-flex justify-content-center" style="">
                                            <h5 class="card-title p-0 m-0">Title</h5>
                                            <p>Body text</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div class="container py-3">
                            <div class="card px-3" style="border: none;">
                                <div class="row">
                                    <article class="col-md-6 py-3">
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
                                    </article>
                                    <aside class="col-md-6 py-3">
                                        <img src="/images/imgplaceholder.png" class="card-img" alt="Berita Image">
                                    </aside>
                                </div>
                            </div>
                        </div>
                        <div class="container py-3">
                            <div class="card px-3" style="border: none;">
                                <div class="row">
                                    <article class="col-md-6 py-3">
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
                                    </article>
                                    <aside class="col-md-6 py-3">
                                        <img src="/images/imgplaceholder.png" class="card-img" alt="Berita Image">
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
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
