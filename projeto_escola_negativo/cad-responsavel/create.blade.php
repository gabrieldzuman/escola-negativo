<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Responsável</title>
</head>
<body>

<h2>Adicionar Responsável</h2>

<form action="{{ route('responsaveis.store') }}" method="POST">
    @csrf
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" required>
    <br>
    <button type="submit">Salvar</button>
</form>

</body>
</html>
