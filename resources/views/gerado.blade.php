@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Simulado Gerado</h3>
    <form action="{{route('export')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary mb-4">Imprimir</button>
    </form>

    @if (isset($questions) && count($questions) > 0)
        <div class="row">
            @foreach ($questions as $questao)
                <div class="col-md-12 mb-4">
                    <p><strong>Questão:</strong> {!! $questao['question'] !!}</p>
                    <ul class="list-group">
                        @foreach (array_merge([$questao['correct_answer']], $questao['incorrect_answers']) as $opcao)
                            <li class="list-group-item">
                                {{ $opcao }}
                            </li>
                        @endforeach
                    </ul>
                    <p><strong>Resposta correta:</strong> {{ $questao['correct_answer'] }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>Nenhuma questão encontrada para este exame.</p>
    @endif

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
