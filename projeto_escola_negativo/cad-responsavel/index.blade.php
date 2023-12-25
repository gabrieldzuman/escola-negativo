<!DOCTYPE html>
<html>
<head>
    <title>Lista de Responsáveis</title>
</head>
<body>

<h2>Lista de Responsáveis</h2>
<a href="{{ route('responsaveis.create') }}">Adicionar Novo Responsável</a>
<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Ações</th>
    </tr>
    @foreach ($responsaveis as $responsavel)
        <tr>
            <td>{{ $responsavel->id }}</td>
            <td>{{ $responsavel->nome }}</td>
            <td>{{ $responsavel->email }}</td>
            <td>{{ $responsavel->telefone }}</td>
            <td>
                <a href="{{ route('responsaveis.edit', $responsavel->id) }}">Editar</a>
                <form action="{{ route('responsaveis.destroy', $responsavel->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
