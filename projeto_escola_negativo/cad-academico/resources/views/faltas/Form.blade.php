@extends('layout.app')

@section('content')
    <h2>Formulário de Falta</h2>
    <form action="{{ isset($falta) ? route('faltas.update', $falta->id) : route('faltas.store') }}" method="POST">
        @csrf
        @if(isset($falta))
            @method('PUT')
        @endif

        <label for="quantidade">Quantidade:</label>
        <input type="text" name="quantidade" value="{{ isset($falta) ? $falta->quantidade : old('quantidade') }}">

        <label for="materia_id">Matéria:</label>
        <select name="materia_id">
            @foreach($materias as $materia)
                <option value="{{ $materia->id }}" {{ isset($falta) && $falta->materia_id == $materia->id ? 'selected' : '' }}>
                    {{ $materia->nome }}
                </option>
            @endforeach
        </select>

        <label for="aluno_id">Aluno:</label>
        <select name="aluno_id">
            @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}" {{ isset($falta) && $falta->aluno_id == $aluno->id ? 'selected' : '' }}>
                    {{ $aluno->nome }}
                </option>
            @endforeach
        </select>

        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('faltas.index') }}">Cancelar</a>
@endsection
