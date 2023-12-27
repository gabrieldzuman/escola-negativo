@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Professores</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professors as $professor)
                    <tr>
                        <td>{{ $professor->id }}</td>
                        <td>{{ $professor->nome }}</td>
                        <td>{{ $professor->email }}</td>
                        <td>{{ $professor->telefone }}</td>
                        <td>
                            <a href="{{ route('professors.show', $professor->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('professors.destroy', $professor->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a href="{{ route('professors.create') }}" class="btn btn-primary">Adicionar Professor</a>
    </div>
@endsection
