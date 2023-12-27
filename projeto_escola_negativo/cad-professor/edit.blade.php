@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Professor</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('professors.update', $professor->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $professor->nome }}" />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ $professor->email }}" />
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" name="telefone" value="{{ $professor->telefone }}" />
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
