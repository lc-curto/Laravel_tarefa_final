@extends('layouts.master')

@section('title', 'Bandas')

@section('content')

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    {{-- Cabeçalho --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <h1 class="display-5 fw-bold mb-0">Bandas</h1>

        <a href="{{ route('bands.export') }}" class="btn btn-success">
            <i class="bi bi-file-earmark-excel me-2"></i>
            Exportar Excel
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <span class="badge bg-primary fs-6">
            {{ $bands->count() }} bandas
        </span>

        {{-- Apenas administradores podem adicionar bandas --}}
        @auth
            @if (auth()->user()->role === \App\Models\User::TYPE_ADMIN)
                <a href="{{ route('bands.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>
                    Adicionar banda
                </a>
            @endif
        @endauth

    </div>
    <form action="{{ route('bands.all') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar banda..."
                value="{{ $searchPar }}">

            <button type="submit" class="btn btn-primary">
                Pesquisar
            </button>

            <a href="{{ route('bands.all') }}" class="btn btn-outline-secondary">
                Limpar
            </a>
        </div>
    </form>
    {{-- Tabela de bandas --}}
    <div class="table-responsive">
        <table class="table table-hover align-middle">

            <thead class="table-light">
                <tr>
                    <th>Fotografia</th>
                    <th>Nome da banda</th>
                    <th class="text-center">Número de álbuns</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

                @foreach ($bands as $band)
                    <tr>

                        {{-- Fotografia --}}
                        <td>
                            @if ($band->image)
                                <img src="{{ asset('storage/' . $band->image) }}" alt="{{ $band->name }}" class="rounded"
                                    width="70" height="70">
                            @else
                                <img src="{{ asset('images/noImage.png') }}" alt="Imagem não disponível" class="rounded"
                                    width="70" height="70">
                            @endif
                        </td>

                        {{-- Nome --}}
                        <td class="fw-semibold">
                            {{ $band->name }}
                        </td>

                        {{-- Número de álbuns --}}
                        <td class="text-center">
                            <span class="badge bg-secondary">
                                {{ $band->albums_count }}
                            </span>
                        </td>

                        {{-- Ações --}}
                        <td>
                            <div class="d-flex justify-content-end gap-2">

                                {{-- Todos podem visualizar --}}
                                <a href="{{ route('bands.show', $band->id) }}" class="btn btn-sm btn-primary"
                                    style="width: 63px;">
                                    <i class="bi bi-eye"></i>
                                </a>

                                @auth

                                    {{-- Utilizadores autenticados podem editar --}}
                                    <a href="{{ route('bands.edit', $band->id) }}" class="btn btn-sm btn-success"
                                        style="width: 63px;">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- Apenas administradores podem apagar --}}
                                    @if (auth()->user()->role === \App\Models\User::TYPE_ADMIN)
                                        <form action="{{ route('bands.destroy', $band->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger" style="width: 63px;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endif

                                @endauth

                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>

@endsection
