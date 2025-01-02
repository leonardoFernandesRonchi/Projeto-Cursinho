@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Buscar Simulado</h3>
    <form action="{{ route('getExam') }}" method="POST">
        @csrf <!-- Token CSRF -->
        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select class="form-control" id="category" name="category" required>
                <option value="9">General Knowledge</option>
                <option value="11">Entertainment: Film</option>
                <option value="17">Science: Computers</option>
                <option value="18">Science: Nature</option>
                <option value="21">Sports</option>
                <!-- Adicione outras categorias conforme necessário -->
            </select>
        </div>
        <div class="mb-3">
            <label for="difficulty" class="form-label">Dificuldade</label>
            <select class="form-control" id="difficulty" name="difficulty" required>
                <option value="easy">Fácil</option>
                <option value="medium">Média</option>
                <option value="hard">Difícil</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Buscar Simulado</button>
    </form>
</div>
@endsection
