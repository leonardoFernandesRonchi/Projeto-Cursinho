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
            <div class="d-flex flex-column">
                <!-- Post-it de apostilas -->
                <div class="p-3 mb-3 bg-warning rounded shadow-sm" style="border-left: 5px solid #f39c12;">
                    <h6 class="text-dark font-weight-bold">Apostilas Gratuitas</h6>
                    <a href="#" class="text-decoration-none text-dark">Clique para acessar</a>
                </div>
                <!-- Post-it de vídeo aulas -->
                <div class="p-3 mb-3 bg-info rounded shadow-sm" style="border-left: 5px solid #17a2b8;">
                    <h6 class="text-dark font-weight-bold">Vídeos de Aulas</h6>
                    <a href="#" class="text-decoration-none text-dark">Assista agora</a>
                </div>
                <!-- Post-it de simulados -->
                <div class="p-3 mb-3 bg-success rounded shadow-sm" style="border-left: 5px solid #28a745;">
                    <h6 class="text-dark font-weight-bold">Simulados Interativos</h6>
                    <a href="#" class="text-decoration-none text-dark">Comece a praticar</a>
                </div>
            </div>
            <a href="#" class="btn btn-success mt-3">Acesse os Materiais</a>
        </div>
    </div>
@endsection
