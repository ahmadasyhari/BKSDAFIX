<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Gunakan versi CDN TinyMCE yang tidak membutuhkan API Key -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
    @vite('resources/css/nav.css')
    @vite('resources/css/custom-buttons.css')
    @vite('resources/js/nav.js')
</head>

<body>
    <main class="wrapper d-flex align-items-stretch">
        @yield('nav')
        <!-- Section Block -->
        <section class="container-fluid p-0" style="background-color: #F0F0F0;">
            <section id="content">
                <nav class="navbar navbar-expand-lg nav-bg-dark px-2">
                    <div class="container-fluid">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <!-- Settings icon -->
                                <a class="nav-link d-flex align-items-center p-0 dropdown-toggle" href="#"
                                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="material-symbols-outlined text-white fs-2">settings</span>
                                </a>
                                <!-- Dropdown Menu -->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item text-center" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span><i
                                                    class="fa-solid fa-right-from-bracket"
                                                    style="padding-right: 7px"></i></span>
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>
                                <!-- Logout -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
                @yield('content')
            </section>
        </section>
    </main>
    @yield('scripts')
</body>

</html>
