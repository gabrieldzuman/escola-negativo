@extends('layout.app')

@section('content')
    <h2>Detalhes da Matéria</h2>
    <p>ID: {{ $materia->id }}</p>
    <p>Nome: {{ $materia->nome }}</p>
    <a href="{{ route('materias.index') }}">Voltar para a lista de matérias</a>
@endsection
