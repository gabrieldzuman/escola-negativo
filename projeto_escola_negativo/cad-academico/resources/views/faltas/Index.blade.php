@extends('layout.app')

@section('content')
    <h2>Lista de Faltas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Quantidade</th>
                <th>Matéria</th>
                <th>Aluno</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faltas as $falta)
                <tr>
                    <td>{{ $falta->id }}</td>
                    <td>{{ $falta->quantidade }}</td>
                    <td>{{ $falta->materia->nome }}</td>
                    <td>{{ $falta->aluno->nome }}</td>
                    <td>
                        <a href="{{ route('faltas.show', $falta->id) }}">Ver</a>
                        <a href="{{ route('faltas.edit', $falta->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('faltas.create') }}">Nova Falta</a>
@endsection
