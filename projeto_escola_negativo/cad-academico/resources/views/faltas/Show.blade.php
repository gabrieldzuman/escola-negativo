@extends('layout.app')

@section('content')
    <h2>Detalhes da Falta</h2>
    <p>ID: {{ $falta->id }}</p>
    <p>Quantidade: {{ $falta->quantidade }}</p>
    <p>Matéria: {{ $falta->materia->nome }}</p>
    <p>Aluno: {{ $falta->aluno->nome }}</p>
    <a href="{{ route('faltas.index') }}">Voltar para a lista de faltas</a>
@endsection
