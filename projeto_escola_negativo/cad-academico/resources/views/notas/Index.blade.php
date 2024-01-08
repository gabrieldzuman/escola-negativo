
@extends('layout.app')

@section('content')
    <h2>Lista de Notas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Valor</th>
                <th>Matéria</th>
                <th>Aluno</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $nota)
                <tr>
                    <td>{{ $nota->id }}</td>
                    <td>{{ $nota->valor }}</td>
                    <td>{{ $nota->materia->nome }}</td>
                    <td>{{ $nota->aluno->nome }}</td>
                    <td>
                        <a href="{{ route('notas.show', $nota->id) }}">Ver</a>
                        <a href="{{ route('notas.edit', $nota->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('notas.create') }}">Nova Nota</a>
@endsection
