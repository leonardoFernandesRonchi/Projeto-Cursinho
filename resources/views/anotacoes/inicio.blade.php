@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: #ff6f61;">Área de Anotações</h1>
        <div class="mb-4">
            <div class="input-group">
                <input type="text" id="searchInput2" class="form-control" placeholder="Pesquisar planos..." aria-label="Pesquisar planos">
            </div>
        </div>
        <form method="POST" action="/anotacoes/saveNote" class="bg-light p-4 rounded shadow mb-4">
            @csrf
            <div class="form-group">
                <label for="note-title" style="color: #4CAF50;">Título</label>
                <input type="text" id="note-title" name="title" class="form-control" placeholder="Digite o título da anotação" required>
            </div>
            <div class="form-group">
                <label for="note-content" style="color: #4CAF50;">Conteúdo</label>
                <textarea id="note-content" name="activity" class="form-control" placeholder="Digite sua anotação aqui" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block">Salvar Anotação</button>
        </form>

        <h2 class="text-center mb-4" style="color: #4CAF50;">Minhas Anotações</h2>
        <ul class="list-group">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if ($anotacoes && $anotacoes->count() > 0)
                @foreach($anotacoes as $anotacao)
                    <li class="list-group-item d-flex justify-content-between align-items-center plan-item2 anotacao">
                        <div class='anotacao'>
                            <h5>{{ $anotacao->title }}</h5>
                            <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($anotacao->date)->format('d/m/Y') }}</p>
                        </div>
                        <div class="btn-group" role="group">
                            <a href="{{ route('edit', $anotacao->id) }}" class="btn btn-warning btn-sm">Editar</a>

                            <form action="{{ route('destroy', $anotacao->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>

                            <a href="{{ route('getInformation', $anotacao->id) }}" class="btn btn-info btn-sm">Ver</a>
                        </div>
                    </li>
                @endforeach
            @else
                <div class="alert alert-warning">Não há anotações ainda.</div>
            @endif
        </ul>
    </div>

    <!-- Script diretamente na página Blade -->
    <script>
       document.getElementById('searchInput2').addEventListener('input', function() {
    const searchInput = this.value.toLowerCase(); // Corrigido aqui
    const plans = document.querySelectorAll('.plan-item2'); // Seleciona todos os planos na lista

    plans.forEach(function(plan) {
        const title = plan.querySelector('h5').textContent.toLowerCase(); // Pega o título de cada plano

        // Se o título não contiver o texto da pesquisa, o plano será ocultado
        if (title.indexOf(searchInput) === -1) {
            anotacao.style.display = 'none'; // Esconde o plano
        } else {
            anotacao.style.display = ''; // Mostra o plano
        }
    });
});

    </script>
@endsection
