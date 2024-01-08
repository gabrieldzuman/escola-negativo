@extends('layout.app')

@section('content')
    <h2>Detalhes da Nota</h2>
    <p>ID: {{ $nota->id }}</p>
    <p>Valor: {{ $nota->valor }}</p>
    <p>Matéria: {{ $nota->materia->nome }}</p>
    <p>Aluno: {{ $nota->aluno->nome }}</p>
    <a href="{{ route('notas.index') }}">Voltar para a lista de notas</a>
@endsection
