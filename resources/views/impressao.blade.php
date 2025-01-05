@extends('layouts.main_layout')

@section('content')
<div class="container mt-4">
    <h1>Exercícios do Enem ({{ env('APP_NAME') }})</h1>
    <hr>

    @foreach ($exercises as $exercise)
        <h2><small>{{ $exercise['question'] }} » </small></h2>
    @endforeach

    <hr>
    <small>Soluções</small><br>
    @foreach ($exercises as $exercise)
        <small>{{ $exercise['correct_answer'] }} » </small><br>
    @endforeach
</div>
@endsection
