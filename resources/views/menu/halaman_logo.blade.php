<?php use App\Models\Menu; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($menu) ? $menu->title : 'Logo BKSDA' }}</title>
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
                    <li class="nav-item dropdown">
                        <a class="fw-bold nav-link {{ !isset($menu) ? 'active' : '' }}" type="button"
                            aria-expanded="false">PROFIL</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item {{ !isset($menu) ? 'active' : '' }}"
                                    href="#">Logo</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Struktur Organisasi</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Visi & Misi</a></li>
                            <li><a class="fw-bold dropdown-item" href="#">Tugas Pokok dan Fungsi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="fw-bold nav-link" type="button" aria-expanded="false">DATA & INFORMASI</a>
                        <ul class="dropdown-menu">
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Perizinan</a></li>
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
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">SIMAKSI</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Lembaga Konservasi</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Penangkaran TSL</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Peredaran TSL</a></li>
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
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Pembangunan Strategis yang
                                    tidak dapat dielakan</a></li>
                            <li><a class="fw-bold dropdown-item text-wrap" href="#">Kemitran Konservasi</a></li>
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
            <section class="hal-logo">
                <!-- Header -->
                <article id="carouselExampleslidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="/images/paropo.svg" class="d-block w-100" alt="...">
                            <div class="header-content" z-index="1">
                                <h2 style="color: #FBC834">PROFIL</h2>
                                <h1>LOGO</h1>
                            </div>
                        </div>
                    </div>
                </article>
                <section class="logo-card card mx-4 py-5" style="top: -30px; border-radius: 20px; z-index: 2;">
                    <article class="card-body pt-lg-4">
                        <div class="text-center">
                            <h1>MAKNA LOGO</h1>
                            <h1>BALAI BESAR KSDA SUMATRA UTARA</h1>
                            <img class="img-fluid mx-auto" src="/images/logo.png" alt="Logo BKSDA SUMUT">
                        </div>
                        <div class="container bg-big py-2" style="background-image: url('/images/logo-big.png');"">
                            <div class="text-center mb-4">
                                <h1 style="color: #E5A000;">MAKNA LOGO</h1>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-7 px-3 text-start">
                                    <h2 class="mb-3">MAKNA LOGO</h2>
                                    <p> Sebagai lambang universal dengan makna yang luas, dan melambangakan keterbukaan
                                        tampa batasan dalam menerima hal hal baru yang berkesinambungan. Disamping itu
                                        bentuk bulat tanpa awal atau akhir, tanpa sisi atau sudut, bentuk geometris ini
                                        menceritakan tentang kesempurnaan, satu kesatuan, spiritualitas, dan kehidupan
                                        yang
                                        dinamis. Dengan demikian Balai Besar KSDA Sumatera Utara mampu menerima/menyerap
                                        inovasi dan hal hal baru yang positif untuk membangun kesempurnaan, satu
                                        kesatuan,
                                        spiritualitas, dan kehidupan yang dinamis, sehingga mampu mengemban tugas dan
                                        fungsinya dalam konservasi sumber daya alam.
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col offset-md-5 align-self-end px-3 text-end">
                                    <h2 class="mb-3">POHON FICUS/BERINGIN</h2>
                                    <p> Pohon yang memiiki fungsi konservasi tinggi untuk sumber pakan, perlindungan
                                        siklus
                                        air dan koservasi tanah. Diharapkan Balai Besar KSDA Sumatera Utara mampu
                                        mejalankan
                                        fungsinya sebagai pengelolaan Konservasi sumber daya alam.
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-7 px-3 text-start">
                                    <h2 class="mb-3">AKAR</h2>
                                    <p> Akar yang menguat mencengkeram memberikan harapan agar Balai Besar KSDA Sumatera
                                        Utara mempu kuat memberikan kekuatan bagi konservasi sumber daya alam sehingga
                                        kualitas kehidupan dapat dipertahakan bahkan ditingkatkan.
                                    </p>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col offset-md-5 align-self-end  px-3 align-self-end text-end">
                                    <h2 class="mb-3">SILUET HARIMAU, ORANGUTAN DAN GAJAH</h2>
                                    <p> Melambangkan potensi di Sumatera Utara sebagai habitat bagi satwa prioritas
                                        yaitu :
                                        Harimau sumatera, Orangutan sumatera, orangutan tapanuli dan Gajah sumatera.
                                        Ketiganya merupakan species yang menjadi unggulan dan prioritas utama Indonesia
                                        untuk dilestarikan.
                                    </p>
                                </div>
                            </div>
                            <div class="text-center mb-5 mx-5 d-flex justify-content-center">
                                <h1 style="color: #E5A000;">MAKNA WARNA</h1>
                            </div>
                            <div class="px-5">
                                <div class="row mb-4">
                                    <div class="col-2 text-center">
                                        <img class="logo" src="/images/hijau.png" alt="orange">
                                    </div>
                                    <div class="col-md-10 d-flex align-items-center">
                                        <p> Hijau diartikan sebagai sumber kehidupan, kesegaran, dan rasa aman. Hijau
                                            juga
                                            memiliki arti kesuburan, warna hijau juga memberikan kesan ambisi, uang, dan
                                            kekayaan.
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2 text-center">
                                        <img class="logo" src="/images/orange.png" alt="hijau">
                                    </div>
                                    <div class="col-md-10 d-flex align-items-center">
                                        <p> Orange membawa kesan kreatif, bahagia, kebebasan dan kepercayaan diri.
                                            Disamping warna orange yang memberikan kehangatan dan semangat. Warna Orange
                                            juga merupakan perwujudan symbol petualangan, kepercayaan diri, kemampuan
                                            diri, kemampuan bersosialisasi serta ketenangan dan suatu hubungan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
