@extends('layouts.main_layout')

@section('content')
<div class="container-fluid">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Site Enem</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registrar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <div class="row mt-4">
        <!-- Menu lateral -->
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item active bg-success text-white border-0">Redações</li>
                <li class="list-group-item list-group-item-action bg-light border-0"><a href="#" class="text-decoration-none text-dark">Simulados</a></li>
                <li class="list-group-item list-group-item-action bg-light border-0"><a href="#" class="text-decoration-none text-dark">Exercícios</a></li>
                <li class="list-group-item list-group-item-action bg-light border-0"><a href="#" class="text-decoration-none text-dark">Aulas</a></li>
                <li class="list-group-item list-group-item-action bg-light border-0"><a href="#" class="text-decoration-none text-dark">Plano de Estudos</a></li>
            </ul>
        </div>

        <!-- Área de conteúdo -->
        <div class="col-md-9">
            <div class="card shadow-lg border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title text-primary">Bem-vindo ao Site Enem</h5>
                    <p class="text-muted">
                        Este é o espaço ideal para você se preparar para o ENEM! Explore as opções no menu lateral e
                        encontre ferramentas para organizar seus estudos, fazer simulados e melhorar sua redação.
                    </p>
                    <div class="alert alert-info" role="alert">
                        Dica: Organize seus estudos e faça os simulados regularmente para melhorar seu desempenho!
                    </div>
                </div>
            </div>

            <!-- Card com informações adicionais -->
            <div class="card shadow-lg border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title">Como Melhorar sua Redação</h5>
                    <p>Leia as melhores dicas e exemplos de redação para se destacar no ENEM. Não deixe para estudar na última hora!</p>
                    <a href="#" class="btn btn-primary">Leia as Dicas</a>
                </div>
            </div>

            <!-- Card de materiais e links úteis -->
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5 class="card-title">Materiais de Estudo</h5>
                    <ul>
                        <li><a href="#" class="text-decoration-none">Apostilas Gratuitas</a></li>
                        <li><a href="#" class="text-decoration-none">Vídeos de Aulas</a></li>
                        <li><a href="#" class="text-decoration-none">Simulados Interativos</a></li>
                    </ul>
                    <a href="#" class="btn btn-success mt-3">Acesse os Materiais</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
