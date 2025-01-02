@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Criar Plano de Estudo</h1>
        
        <form action="{{ route('study_plans.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="date">Data</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="activity">Atividade</label>
                <textarea name="activity" id="activity" class="form-control" rows="3" required>{{ old('activity') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3 btn-block">Criar Plano</button>
        </form>
    </div>
@endsection
