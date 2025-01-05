@extends('layouts.main_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4" style="color: #ff6f61;">Visualizar Plano de Estudo</h1>

        <div class="bg-light p-4 rounded shadow">
            <div class="form-group">
                <label for="title" style="color: #4CAF50;">Título</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $anotacoes->title) }}" readonly>
            </div>

            <div class="form-group mt-3">
                <label for="description" style="color: #4CAF50;">Descrição</label>
                <textarea name="description" id="description" class="form-control" rows="5" readonly>{{ old('activity', $anotacoes->activity) }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="date" style="color: #4CAF50;">Data</label>
                <input type="date" name="date" id="date" class="form-control" 
                    value="{{ old('date', \Carbon\Carbon::parse($anotacoes->date)->format('Y-m-d')) }}" readonly>
            </div>

            <a href="{{ route('getAnotacoes') }}" class="btn btn-secondary mt-3 btn-block">Voltar</a>
        </div>
    </div>
@endsection
