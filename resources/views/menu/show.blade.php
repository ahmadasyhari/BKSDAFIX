<?php use App\Models\Menu; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $menu->title ?? 'Beranda' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">BKSDA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ !isset($menu) ? 'active' : '' }}" aria-current="page" href="/">Beranda</a>
                    </li>
                    @foreach(Menu::whereNull('parent_id')->get() as $menuItem)
                        @php $dropdownId = 'navbarDropdown' . $menuItem->id; @endphp
                        <li class="nav-item dropdown">
                            @if($menuItem->url)
                                <a class="nav-link" href="{{ $menuItem->url }}">
                                    {{ $menuItem->title }}
                                </a>
                            @else
                                <a class="nav-link dropdown-toggle" href="#" id="{{ $dropdownId }}" role="button" aria-expanded="false">
                                    {{ $menuItem->title }}
                                </a>
                            @endif

                            @if($menuItem->children->count())
                                <ul class="dropdown-menu" aria-labelledby="{{ $dropdownId }}">
                                    @foreach($menuItem->children as $child)
                                        @if($child->url)
                                            <li><a class="dropdown-item" href="{{ $child->url }}">{{ $child->title }}</a></li>
                                        @else
                                            <li><a class="dropdown-item" href="{{ route('menu.show', $child->id) }}">{{ $child->title }}</a></li>
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

    <div class="container mt-5">
        @if(isset($menu))
            <h1>{{ $menu->title }}</h1>
            <div>
                {!! $menu->content !!}
            </div>
        @else
            <h1>Selamat Datang di BKSDA</h1>
            <p>Ini adalah halaman beranda aplikasi BKSDA Anda.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
