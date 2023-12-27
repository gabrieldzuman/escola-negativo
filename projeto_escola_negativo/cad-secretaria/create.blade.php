<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Secretaria</title>
</head>
<body>

<h1>Adicionar Secretaria</h1>

<form method="post" action="{{ route('secretarias.store') }}">
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
