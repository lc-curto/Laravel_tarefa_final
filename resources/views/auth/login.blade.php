@extends('layouts.master')

@section('title', 'Login')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <i class="bi bi-music-note-list fs-1 text-primary"></i>
                        <h1 class="h3 fw-bold mt-2">Iniciar sessão</h1>
                        <p class="text-secondary">Acede à tua conta do CRM Bandas</p>
                    </div>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Palavra-passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>

                    <div class="text-center mt-4">
                        <span class="text-secondary">Ainda não tens conta?</span>
                        <a href="{{ route('register') }}">Registar</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
