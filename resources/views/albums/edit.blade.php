
@extends('layouts.master')

@section('title', 'Editar Álbum')

@section('content')

    <h1 class="display-5 fw-bold mb-2">Editar álbum</h1>
    <p class="text-secondary mb-4">Banda: {{ $album->band->name }}</p>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="band_id" value="{{ $album->band->id }}">

                <div class="mb-3">
                    <label for="name" class="form-label">Nome do álbum</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $album->name }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="release_date" class="form-label">Ano de lançamento</label>
                    <input type="number" class="form-control" id="release_date" name="release_date" min="1901"
                        max="{{ date('Y') }}" value="{{ $album->release_date }}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Nova imagem do álbum</label>

                    <input type="file" id="image" name="image" class="form-control" accept="image/*">

                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                @if ($album->image)
                    <div class="form-check mb-3">
                        <input type="checkbox" name="remove_image" value="1" class="form-check-input"
                            id="remove_image">

                        <label class="form-check-label" for="remove_image">
                            Remover imagem atual
                        </label>
                    </div>
                @endif

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('bands.show', $album->band->id) }}"
                        class="btn btn-outline-secondary">Cancelar</a>

                    <button type="submit" class="btn btn-primary">Guardar alterações</button>
                </div>

            </form>

        </div>
    </div>

@endsection
