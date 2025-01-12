@extends('layouts.main_layout')

@section('content')
    <!-- Card de boas-vindas -->
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
    

    <!-- Card de materiais e links úteis -->
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <h5 class="card-title">Materiais de Estudo</h5>
            <div class="d-flex flex-column">
                <!-- Post-it de apostilas -->
                <div class="p-3 mb-3 bg-warning rounded shadow-sm" style="border-left: 5px solid #f39c12;">
                    <h6 class="text-dark font-weight-bold">Plano de Estudos</h6>
                    <a href="{{route('study_plans.index')}}" class="text-decoration-none text-dark">Clique para acessar</a>
                </div>
                <!-- Post-it de vídeo aulas -->
                <div class="p-3 mb-3 bg-info rounded shadow-sm" style="border-left: 5px solid #17a2b8;">
                    <h6 class="text-dark font-weight-bold">Anotações</h6>
                    <a href="{{route('getAnotacoes')}}" class="text-decoration-none text-dark">Assista agora</a>
                </div>
                <!-- Post-it de simulados -->
                <div class="p-3 mb-3 bg-success rounded shadow-sm" style="border-left: 5px solid #28a745;">
                    <h6 class="text-dark font-weight-bold">Gerador de Exercícios</h6>
                    <a href="{{route('exercicios')}}" class="text-decoration-none text-dark">Comece a praticar</a>
                </div>
            </div>
                </div>
    </div>
@endsection
