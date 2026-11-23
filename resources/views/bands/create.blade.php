
@extends('layouts.master')

@section('title', 'Adicionar Banda')

@section('content')

    {{-- Cabeçalho --}}
    <div class="mb-4">
        <h1 class="display-5 fw-bold">Adicionar banda</h1>
        <p class="text-secondary">
            Preenche os campos para registar uma nova banda.
        </p>
    </div>

    {{-- Formulário --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="{{ route('bands.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                {{-- Nome da banda --}}
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Nome da banda
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        placeholder="Ex.: Coldplay"
                        required
                    >
                </div>

                {{-- Imagem da banda --}}
                <div class="mb-4">
                    <label for="image" class="form-label">
                        Imagem da banda
                    </label>

                    <input
                        type="file"
                        class="form-control"
                        id="image"
                        name="image"
                        accept="image/*"
                    >
                </div>

                {{-- Botões --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('bands.all') }}" class="btn btn-outline-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-2"></i>
                        Guardar banda
                    </button>
                </div>

            </form>

        </div>
    </div>

@endsection
