@extends('layouts.admin')

@section('title')
    <title>Beranda Admin</title>
@endsection

@section('nav')
    @include('partials.sidebar')
@endsection

@section('content')
    <!-- Main content -->
    <section id="content-header" class="container-fluid bg-white shadow-sm d-flex align-items-center px-4 py-3 mb-4">
        <p class="align-middle px-2 m-0 fs-6">Beranda</p>
    </section>

    @if (session('success'))
        <div class="alert alert-success mx-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <section id="content" class="px-md-4 mb-4">
        <div id="content-header" class="bg-white shadow-lg px-5 py-4 mb-4">
            <div class="row d-flex">
                <div class="col">
                    <h4 class="py-3 mb-4">{{ __('Anda berhasil login!') }}</h4>
                </div>
                <div class="col text-end align-content-center mb-4">
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span><i
                                class="fa-solid fa-right-from-bracket" style="padding-right: 7px"></i>
                            {{ __('Logout') }}
                    </a>
                    <!-- Logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="row g-4 mb-4">
                <div class="col-md-8">
                    <section class="row row-cols-2 g-3 d-flex justify-content-between">
                        <article class="col">
                            <a href="{{ route('menu.index') }}" class="animated-button">
                                <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                                <span class="text text-decoration-none">Kelola Menu</span>
                                <span class="circle"></span>
                                <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                            </a>
                        </article>
                        <article class="col">
                            <a href="{{ route('pengumuman.index') }}" class="animated-button">
                                <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                                <span class="text">Kelola Pengumuman</span>
                                <span class="circle"></span>
                                <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                            </a>
                        </article>
                        <article class="col">
                            <a href="{{ route('artikel.index') }}" class="animated-button">
                                <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                                <span class="text">Kelola Artikel</span>
                                <span class="circle"></span>
                                <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                            </a>
                        </article>
                        <article class="col">
                            <a href="#" class="animated-button">
                                <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                                <span class="text text-decoration-none">Kelola Video</span>
                                <span class="circle"></span>
                                <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                            </a>
                        </article>
                        <article class="col">
                            <a href="#" class="animated-button">
                                <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                                <span class="text text-decoration-none">Kelola Foto</span>
                                <span class="circle"></span>
                                <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                            </a>
                        </article>
                        <article class="col">
                            <a href="{{ route('kategoris.index') }}" class="animated-button">
                                <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                                <span class="text text-decoration-none">Kelola Kategori</span>
                                <span class="circle"></span>
                                <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                            </a>
                        </article>
                        <article class="col">
                            <a href="{{ route('users.index') }}" class="animated-button">
                                <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                                <span class="text text-decoration-none">Manajemen User</span>
                                <span class="circle"></span>
                                <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                            </a>
                        </article>
                        <article class="col">
                            <a href="/" class="animated-button">
                                <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                                <span class="text">Lihat Website</span>
                                <span class="circle"></span>
                                <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                    </path>
                                </svg>
                            </a>
                        </article>
                    </section>
                </div>
                <div id="anim" class="col-md-4 d-flex justify-content-center">
                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
                    <dotlottie-player src="https://lottie.host/bcf4b845-b7f6-4e8d-9cf2-cf7f26e588d9/0diNfzI8w6.json"
                        background="transparent" speed="1" style="width: 300px; height: 300px;" loop
                        autoplay></dotlottie-player>
                </div>
            </div>
        </div>
    </section>
@endsection
