
@extends('layouts.master')

@section('title', 'Registar')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12 col-md-7 col-lg-5">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <i class="bi bi-person-plus fs-1 text-primary"></i>
                        <h1 class="h3 fw-bold mt-2">Criar conta</h1>
                        <p class="text-secondary">Regista-te no CRM Bandas</p>
                    </div>

                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Palavra-passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirmar palavra-passe</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Criar conta</button>
                    </form>

                    <div class="text-center mt-4">
                        <span class="text-secondary">Já tens uma conta?</span>
                        <a href="{{ route('login') }}">Iniciar sessão</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
