@extends('layouts.main_layout')

@section('content')
<div class="card shadow-lg border-0 mb-4">
    <div class="card-body">
        <h5 class="card-title text-primary">Entrar ou Registrar</h5>
        
        <!-- Abas para Login e Registro -->
        <ul class="nav nav-tabs" id="authTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Registrar</a>
            </li>
        </ul>

        <!-- Conteúdo das Abas -->
        <div class="tab-content mt-3" id="authTabsContent">
            <!-- Formulário de Login -->
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                <form action="/loginSubmit" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="text_username" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="text_username" name="username" placeholder="Digite seu nickname" required>
                    </div>
                    <div class="mb-3">
                        <label for="text_password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="text_password" name="password" placeholder="Digite sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
            </div>

            <!-- Formulário de Registro -->
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                <form action="/registerSubmit" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="text_username" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="text_username" name="username" placeholder="Escolha seu nickname" required>
                    </div>
                    <div class="mb-3">
                        <label for="text_password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="text_password" name="password" placeholder="Escolha sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
