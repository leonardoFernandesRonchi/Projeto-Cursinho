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

        <div class="list-group">
            @foreach($studyPlans as $plan)
                <div class="list-group-item">
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
@endsection
