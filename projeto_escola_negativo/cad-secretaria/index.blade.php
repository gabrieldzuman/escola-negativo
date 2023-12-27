<!DOCTYPE html>
<html>
<head>
    <title>Lista de Secretarias</title>
</head>
<body>

<h1>Lista de Secretarias</h1>

<a href="{{ route('secretarias.create') }}">Adicionar Secretaria</a>

<table border="1">
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
        @foreach($secretarias as $secretaria)
            <tr>
                <td>{{ $secretaria->id }}</td>
                <td>{{ $secretaria->nome }}</td>
                <td>{{ $secretaria->email }}</td>
                <td>{{ $secretaria->telefone }}</td>
                <td>
                    <a href="{{ route('secretarias.edit', $secretaria->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
