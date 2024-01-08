@extends('layout.app')

@section('content')
    <h2>Formulário de Matéria</h2>
    <form action="{{ isset($materia) ? route('materias.update', $materia->id) : route('materias.store') }}" method="POST">
        @csrf
        @if(isset($materia))
            @method('PUT')
        @endif

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="{{ isset($materia) ? $materia->nome : old('nome') }}">

        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('materias.index') }}">Cancelar</a>
@endsection
