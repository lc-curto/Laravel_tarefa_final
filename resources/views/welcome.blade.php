@extends('layouts.master')

@section('title', 'CRM Bandas')

@section('content')

    {{-- APRESENTAÇÃO PRINCIPAL --}}
    <section class="py-4 py-lg-5">

        <div class="row align-items-center">

            <div class="col-lg-9">

                <span class="badge bg-primary-subtle text-primary mb-3">
                    CRM Musical
                </span>

                <h1 class="display-4 fw-bold mb-3">
                    O universo das bandas, organizado num só lugar.
                </h1>

                <p class="fs-5 text-secondary mb-4">
                    Consulta bandas, explora álbuns e acompanha toda a informação
                    musical através de uma plataforma simples e organizada.
                </p>

            </div>

        </div>

    </section>


    {{-- FUNCIONALIDADES --}}
    <section class="mt-5 mb-4">

        <h2 class="h3 fw-bold mb-2">
            Conhece a plataforma
        </h2>

        <p class="text-secondary">
            Explora as principais funcionalidades do CRM.
            Entra na plataforma para aceder aos conteúdos.
        </p>

    </section>


    {{-- CARTÕES DAS FUNCIONALIDADES --}}
    <div class="row g-4">

        {{-- BANDAS --}}
        <div class="col-md-6">

            <a href="#" class="text-decoration-none text-dark d-block h-100">

                <div class="card h-100 border-0 shadow-sm overflow-hidden">

                    <img src="https://images.unsplash.com/photo-1524368535928-5b5e00ddc76b" alt="Banda em concerto"
                        class="card-img-top" style="height: 240px; object-fit: cover;" loading="lazy">

                    <div class="card-body p-4">

                        <h3 class="h5 fw-bold">
                            Bandas
                        </h3>

                        <p class="text-secondary mb-3">
                            Consulta informações, imagens e dados
                            das bandas registadas na plataforma.
                        </p>


                    </div>

                </div>

            </a>

        </div>


        {{-- ÁLBUNS --}}
        <div class="col-md-6">

            <a href="#" class="text-decoration-none text-dark d-block h-100">

                <div class="card h-100 border-0 shadow-sm overflow-hidden">

                    <img src="https://images.unsplash.com/photo-1461360228754-6e81c478b882" alt="Coleção de música"
                        class="card-img-top" style="height: 240px; object-fit: cover;" loading="lazy">

                    <div class="card-body p-4">

                        <h3 class="h5 fw-bold">
                            Álbuns
                        </h3>

                        <p class="text-secondary mb-3">
                            Descobre álbuns, capas e respetivas
                            datas de lançamento.
                        </p>

                    </div>

                </div>

            </a>

        </div>

    </div>


    {{-- RODAPÉ --}}
    <footer class="mt-5 pt-4 pb-3 border-top text-center">

        <p class="text-secondary small mb-0">
            CRM Bandas &copy; {{ date('Y') }}.
            Todos os direitos reservados.
        </p>

    </footer>

@endsection
