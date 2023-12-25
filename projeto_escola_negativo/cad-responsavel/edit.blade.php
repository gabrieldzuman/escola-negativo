<!DOCTYPE html>
<html>
<head>
    <title>Editar Responsável</title>
</head>
<body>

<h2>Editar Responsável</h2>

<form action="{{ route('responsaveis.update', $responsavel->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="{{ $responsavel->nome }}" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $responsavel->email }}" required>
    <br>
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" value="{{ $responsavel->telefone }}" required>
    <br>
    <button type="submit">Atualizar</button>
</form>

</body>
</html>
