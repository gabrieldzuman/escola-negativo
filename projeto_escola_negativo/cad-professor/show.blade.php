@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalhes do Professor</h2>

        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $professor->id }}</td>
            </tr>
            <tr>
                <th>Nome:</th>
                <td>{{ $professor->nome }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $professor->email }}</td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td>{{ $professor->telefone }}</td>
            </tr>
        </table>

        <a href="{{ route('professors.index') }}" class="btn btn-primary">Voltar</a>
    </div>
@endsection
