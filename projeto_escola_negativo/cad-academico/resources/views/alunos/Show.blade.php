@extends('layout.app')

@section('content')
    <h2>Detalhes do Aluno</h2>
    <p>ID: {{ $aluno->id }}</p>
    <p>Nome: {{ $aluno->nome }}</p>
    <p>Matrícula: {{ $aluno->matricula }}</p>
    <a href="{{ route('alunos.index') }}">Voltar para a lista de alunos</a>
@endsection
