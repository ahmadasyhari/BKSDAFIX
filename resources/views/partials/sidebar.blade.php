<!-- resources/views/partials/sidebar.blade.php -->
<nav id="sidebar" class="navbar-dark nav-bg-dark" style="min-height:100vh">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-dark">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="container-fluid d-grid justify-content-stretch text-center px-0 py-4">
        <ul class="nav flex-column">
            <li class="nav-item py-3">
                <img src="/images/profile.png" alt="Logo" width="75" height="auto">
                <h4 class="my-3">{{ Auth::user()->name }}</h4>
            </li>
        </ul>
        <hr style="margin: 0rem;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link py-3" href="{{ route('home') }}">Beranda</a>
            </li>
            <hr style="margin: 0rem;">
            <li class="nav-item">
                <a class="nav-link py-3" href="{{ route('menu.index') }}" aria-current="page">Mengelola Menu</a>
            </li>
            <hr style="margin: 0rem;">
            <li class="nav-item">
                <a class="nav-link py-3" href="{{ route('pengumuman.index') }}">Mengelola Pengumuman</a>
            </li>
            <hr style="margin: 0rem;">
            <li class="nav-item">
                <a class="nav-link py-3" href="{{ route('artikel.index') }}">Mengelola Artikel</a>
            </li>
            <hr style="margin: 0rem;">
            <li class="nav-item">
                <a class="nav-link py-3" href="#">Mengelola Video</a>
            </li>
            <hr style="margin: 0rem;">
            <li class="nav-item">
                <a class="nav-link py-3" href="#">Mengelola Foto</a>
            </li>
            <hr style="margin: 0rem;">
            <li class="nav-item">
                <a class="nav-link py-3" href="{{ route('kategoris.index') }}">Mengelola Kategori</a>
            </li>
            <hr style="margin: 0rem;">
            <li class="nav-item">
                <a class="nav-link py-3" href="{{ route('users.index') }}">Manajemen User</a>
            </li>
        </ul>
    </div>
</nav>
