@extends('layouts.master')

@section('title', 'Álbuns')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    {{-- Cabeçalho --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <h1 class="display-5 fw-bold mb-0">
            Álbuns — {{ $band->name }}
        </h1>

        <a href="{{ route('albums.export') }}" class="btn btn-success">
            <i class="bi bi-file-earmark-excel me-2"></i>
            Exportar Excel
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <span class="badge bg-primary fs-6">
            {{ $albums->count() }} álbuns
        </span>

        {{-- Apenas administradores podem adicionar --}}
        @auth
            @if (auth()->user()->role === \App\Models\User::TYPE_ADMIN)
                <a href="{{ route('albums.create', ['band_id' => $band->id]) }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>Adicionar álbum
                </a>
            @endif
        @endauth

    </div>
    <form action="{{ route('bands.show', $band->id) }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar álbum..."
                value="{{ $searchPar }}">

            <button type="submit" class="btn btn-primary">
                Pesquisar
            </button>

            <a href="{{ route('bands.show', $band->id) }}" class="btn btn-outline-secondary">
                Limpar
            </a>
        </div>
    </form>
    {{-- Cards de álbuns --}}
    <div class="row g-4">

        @foreach ($albums as $album)
            <div class="col-12 col-md-6 col-lg-4">

                <div class="card h-100 shadow-sm">

                    {{-- Fotografia --}}
                    @if ($album->image)
                        <img src="{{ asset('storage/' . $album->image) }}" class="card-img-top" alt="{{ $album->name }}"
                            height="220">
                    @else
                        <img src="{{ asset('images/noDisc.png') }}" class="card-img-top" alt="Imagem não disponível"
                            height="220">
                    @endif

                    <div class="card-body">

                        {{-- Nome do álbum --}}
                        <h5 class="card-title fw-bold">
                            {{ $album->name }}
                        </h5>

                        {{-- Data de lançamento --}}
                        <p class="card-text text-secondary mb-3">
                            <i class="bi bi-calendar3 me-2"></i>
                            {{ $album->release_date }}
                        </p>

                        {{-- Ações --}}
                        <div class="d-flex gap-2">

                            {{-- Todos podem visualizar --}}
                            <a href="{{ route('albums.show', $album->id) }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-eye"></i>
                            </a>

                            @auth

                                {{-- Utilizadores autenticados podem editar --}}
                                <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                {{-- Apenas administradores podem apagar --}}
                                @if (auth()->user()->role === \App\Models\User::TYPE_ADMIN)
                                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @endif

                            @endauth

                        </div>

                    </div>
                </div>

            </div>
        @endforeach

    </div>

@endsection
