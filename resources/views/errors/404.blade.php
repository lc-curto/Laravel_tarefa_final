
@extends('layouts.master')

@section('title', '404 | Página não encontrada')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-75">

        <div class="col-12 col-md-10 col-lg-8">

            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body text-center p-4 p-md-5">

                    <div class="mb-4">
                        <span class="text-primary">
                            <i class="bi bi-music-note-list display-1"></i>
                        </span>
                    </div>

                    <h1 class="display-1 fw-bold text-primary">
                        404
                    </h1>

                    <h2 class="fw-bold mb-3">
                        Perdemos o ritmo?
                    </h2>

                    <p class="lead text-secondary mb-4">
                        Parece que esta página saiu de cena.
                        O endereço pode estar incorreto ou o conteúdo
                        que procuras já não está disponível.
                    </p>

                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-2 mb-4">

                        <button
                            type="button"
                            class="btn btn-primary btn-lg"
                            onclick="history.back()"
                        >
                            <i class="bi bi-arrow-left me-2"></i>
                            Voltar atrás
                        </button>

                        <a
                            href="{{ route('bands.all') }}"
                            class="btn btn-outline-secondary btn-lg"
                        >
                            <i class="bi bi-house-door me-2"></i>
                            Ver bandas
                        </a>

                    </div>

                    <hr class="my-4">

                    <div class="text-start">

                        <label for="searchBand" class="form-label fw-semibold">
                            Procuras uma banda específica?
                        </label>

                        <form
                            action="{{ route('bands.all') }}"
                            method="GET"
                        >
                            <div class="input-group input-group-lg">

                                <input
                                    type="search"
                                    id="searchBand"
                                    name="search"
                                    class="form-control"
                                    placeholder="Nome da banda..."
                                    required
                                >

                                <button
                                    type="submit"
                                    class="btn btn-dark"
                                >
                                    <i class="bi bi-search me-2"></i>
                                    Pesquisar
                                </button>

                            </div>
                        </form>

                    </div>

                    <div class="accordion mt-4" id="errorAccordion">

                        <div class="accordion-item border-0">

                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed bg-light rounded-3"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#errorHelp"
                                    aria-expanded="false"
                                    aria-controls="errorHelp"
                                >
                                    <i class="bi bi-lightbulb me-2"></i>
                                    O que posso fazer?
                                </button>
                            </h2>

                            <div
                                id="errorHelp"
                                class="accordion-collapse collapse"
                                data-bs-parent="#errorAccordion"
                            >
                                <div class="accordion-body text-secondary text-start">

                                    <ul class="mb-0">
                                        <li>Verifica se o endereço está correto.</li>
                                        <li>Volta à listagem de bandas.</li>
                                        <li>Pesquisa a banda ou álbum pretendido.</li>
                                    </ul>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <p class="text-center text-secondary small mt-3">
                CRM Bandas · Página não encontrada
            </p>

        </div>
    </div>
</div>

@endsection
