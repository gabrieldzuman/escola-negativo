@extends('layout.app')

@section('content')
    <h2>Lista de Alunos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->id }}</td>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->matricula }}</td>
                    <td>
                        <a href="{{ route('alunos.show', $aluno->id) }}">Ver</a>
                        <a href="{{ route('alunos.edit', $aluno->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('alunos.create') }}">Novo Aluno</a>
@endsection
