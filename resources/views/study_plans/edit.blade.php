@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Editar Plano de Estudo</h1>
        <form action="{{ route('study_plans.update', $studyPlan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $studyPlan->title) }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="description">Descrição</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $studyPlan->description) }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="date">Data</label>
                <input type="date" name="date" id="date" class="form-control" 
                    value="{{ old('date', \Carbon\Carbon::parse($studyPlan->date)->format('Y-m-d')) }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="activity">Atividade</label>
                <textarea name="activity" id="activity" class="form-control" rows="3" required>{{ old('activity', $studyPlan->activity) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3 btn-block">Salvar Alterações</button>
        </form>
    </div>
@endsection
