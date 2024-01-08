@extends('layout.app')

@section('content')
    <h2>Formulário de Nota</h2>
    <form action="{{ isset($nota) ? route('notas.update', $nota->id) : route('notas.store') }}" method="POST">
        @csrf
        @if(isset($nota))
            @method('PUT')
        @endif

        <label for="valor">Valor:</label>
        <input type="text" name="valor" value="{{ isset($nota) ? $nota->valor : old('valor') }}">

        <label for="materia_id">Matéria:</label>
        <select name="materia_id">
            @foreach($materias as $materia)
                <option value="{{ $materia->id }}" {{ isset($nota) && $nota->materia_id == $materia->id ? 'selected' : '' }}>
                    {{ $materia->nome }}
                </option>
            @endforeach
        </select>

        <label for="aluno_id">Aluno:</label>
        <select name="aluno_id">
            @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}" {{ isset($nota) && $nota->aluno_id == $aluno->id ? 'selected' : '' }}>
                    {{ $aluno->nome }}
                </option>
            @endforeach
        </select>

        <button type="submit">Salvar</button>
    </form>
    <a href="{{ route('notas.index') }}">Cancelar</a>
@endsection
