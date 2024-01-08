@extends('layout.app')

@section('content')
    <h2>Lista de Matérias</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materias as $materia)
                <tr>
                    <td>{{ $materia->id }}</td>
                    <td>{{ $materia->nome }}</td>
                    <td>
                        <a href="{{ route('materias.show', $materia->id) }}">Ver</a>
                        <a href="{{ route('materias.edit', $materia->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('materias.create') }}">Nova Matéria</a>
@endsection
