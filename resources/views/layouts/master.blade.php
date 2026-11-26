<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'CRM Bandas')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">

                {{-- LOGO --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="bi bi-music-note-list me-2"></i>
                    CRM Bandas
                </a>

                {{-- AUTENTICAÇÃO: apenas na página inicial --}}
                <div class="d-flex align-items-center gap-2">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Registar</a>
                    @endguest

                    @auth
                        <span class="text-white me-2">
                            {{ auth()->user()->name }}
                        </span>

                        @if (!request()->routeIs('dashboard'))
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-light">
                                Dashboard
                            </a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">Logout</button>
                        </form>
                    @endauth
                </div>

            </div>
        </nav>
    </header>

    <main class="container py-4">

        {{-- BOTÃO VOLTAR --}}
        @if (!request()->routeIs('bands.all') && !request()->is('/'))

            @if (request()->routeIs('bands.show'))
                <a href="{{ route('bands.all') }}" class="btn btn-outline-secondary mb-3">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            @elseif (request()->routeIs('albums.show', 'albums.edit'))
                <a href="{{ route('bands.show', request()->route('album')->band_id) }}"
                    class="btn btn-outline-secondary mb-3">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            @elseif (request()->routeIs('albums.create'))
                <a href="{{ route('bands.show', request('band_id')) }}" class="btn btn-outline-secondary mb-3">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            @else
                <a href="{{ route('bands.all') }}" class="btn btn-outline-secondary mb-3">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            @endif

        @endif

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
