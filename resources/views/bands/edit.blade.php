@extends('layouts.master')

@section('title', 'Editar Banda')

@section('content')

    <h1 class="display-5 fw-bold mb-2">Editar Banda</h1>
    <p class="text-secondary mb-4">Banda: {{ $band->name }}</p>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="{{ route('bands.update', $band->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="band_id" value="{{ $band->id }}">

                <div class="mb-3">
                    <label for="name" class="form-label">Nome do álbum</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $band->name }}"
                        required>
                </div>


                <div class="mb-3">
                    <label class="form-label">Imagem da banda</label>

                    @if ($band->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $band->image) }}" alt="{{ $band->name }}" width="150"
                                class="rounded mb-2 d-block">

                            <div class="form-check">
                                <input type="checkbox" name="remove_image" value="1" class="form-check-input"
                                    id="remove_image">

                                <label class="form-check-label" for="remove_image">
                                    Remover imagem
                                </label>
                            </div>
                        </div>
                    @else
                        <img src="{{ asset('images/default-band.png') }}" alt="Imagem predefinida" width="150"
                            class="rounded mb-3 d-block">
                    @endif

                    <input type="file" name="image" class="form-control" accept="image/*">

                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('bands.all', $band->id) }}" class="btn btn-outline-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar alterações</button>
                </div>

            </form>

        </div>
    </div>

@endsection
