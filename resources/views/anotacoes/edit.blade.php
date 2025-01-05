@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: #ff6f61;">Editar Plano de Estudo</h1>

        <form action="{{ route('update', $anotacoes) }}" method="POST" class="bg-light p-4 rounded shadow">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" style="color: #4CAF50;">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $anotacoes->title) }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="activiy" style="color: #4CAF50;">Descrição</label>
                <textarea name="activity" id="description" class="form-control" rows="5" required>{{ old('activity', $anotacoes->activity) }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="date" style="color: #4CAF50;">Data</label>
                <input type="date" name="date" id="date" class="form-control" 
                    value="{{ old('date', \Carbon\Carbon::parse($anotacoes->date)->format('Y-m-d')) }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-3 btn-block">Salvar Alterações</button>
        </form>
    </div>
@endsection
