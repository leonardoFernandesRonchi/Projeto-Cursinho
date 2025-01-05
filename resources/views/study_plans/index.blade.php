@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Meus Planos de Estudo</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Barra de Pesquisa -->
        <div class="mb-4">
            <div class="input-group">
                <input type="text" id="searchInput" class="form-control" placeholder="Pesquisar planos..." aria-label="Pesquisar planos">
            </div>
        </div>

        <div id="studyPlansList" class="list-group">
            @foreach($studyPlans as $plan)
                <div class="list-group-item plan-item">
                    <h5>{{ $plan->title }}</h5>
                    <p>{{ Str::limit($plan->description, 150) }}</p>
                    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($plan->date)->format('d/m/Y') }}</p>
                    <a href="{{ route('study_plans.edit', $plan->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('study_plans.destroy', $plan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </div>
            @endforeach
        </div>

        <a href="{{ route('study_plans.create') }}" class="btn btn-success btn-block mt-3">Criar Novo Plano</a>
    </div>

    <!-- Script diretamente na página Blade -->
    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase(); // Captura o valor do campo de pesquisa
            const plans = document.querySelectorAll('.plan-item'); // Seleciona todos os planos na lista

            plans.forEach(function(plan) {
                const title = plan.querySelector('h5').textContent.toLowerCase(); // Pega o título de cada plano
                const description = plan.querySelector('p').textContent.toLowerCase(); // Pega a descrição de cada plano

                // Se o título ou a descrição não contiverem o texto da pesquisa, o plano será ocultado
                if (title.indexOf(searchInput) === -1 && description.indexOf(searchInput) === -1) {
                    plan.style.display = 'none'; // Esconde o plano
                } else {
                    plan.style.display = ''; // Mostra o plano
                }
            });
        });
    </script>
@endsection
