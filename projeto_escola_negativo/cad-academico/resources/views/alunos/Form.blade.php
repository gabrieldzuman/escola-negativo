@extends('layout.app')

@section('content')
    <h2>Formulário de Aluno</h2>
    <form action="{{ isset($aluno) ? route('alunos.update', $aluno->id) : route('alunos.store') }}" method="POST">
        @csrf
        @if(isset($aluno))
            @method('PUT')
        @endif

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="{{ isset($aluno) ? $aluno->nome : old('nome') }}">

        <label for="matricula">Matrícula:</label>
        <input type="text" name="matricula" value="{{ isset($aluno) ? $aluno->matricula : old('matricula') }}">

        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('alunos.index') }}">Cancelar</a>
@endsection
