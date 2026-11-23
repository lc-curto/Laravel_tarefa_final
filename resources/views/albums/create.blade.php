
@extends('layouts.master')

@section('title', 'Adicionar Álbum')

@section('content')

    <h1 class="display-5 fw-bold mb-2">Adicionar álbum</h1>
    <p class="text-secondary mb-4">Banda: {{ $band->name }}</p>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="band_id" value="{{ $band->id }}">

                <div class="mb-3">
                    <label for="name" class="form-label">Nome do álbum</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="release_date" class="form-label">Ano de lançamento</label>
                    <input type="number" class="form-control" id="release_date" name="release_date" min="1901" max="{{ date('Y') }}" required>
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Imagem do álbum</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('bands.show', $band->id) }}" class="btn btn-outline-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar álbum</button>
                </div>

            </form>

        </div>
    </div>

@endsection
