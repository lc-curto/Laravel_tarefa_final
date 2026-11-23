
@extends('layouts.master')

@section('title', 'Detalhes do Álbum')

@section('content')

    <div class="mb-4">
        <h1 class="display-5 fw-bold">{{ $album->name }}</h1>
        <p class="text-secondary">Detalhes do álbum</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            @if ($album->image)
                <img src="{{ asset('storage/' . $album->image) }}" alt="{{ $album->name }}" width="200" class="mb-3">
            @endif

            <h3>{{ $album->name }}</h3>

            <p>Data de lançamento: {{ $album->release_date }}</p>

            <p>Banda: {{ $album->band->name }}</p>

            {{-- Apenas utilizadores autenticados podem editar --}}
            @auth
                <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-outline-primary">
                    <i class="bi bi-pencil"></i>
                </a>
            @endauth

        </div>
    </div>

@endsection
