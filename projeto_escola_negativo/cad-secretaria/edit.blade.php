<!DOCTYPE html>
<html>
<head>
    <title>Editar Secretaria</title>
</head>
<body>

<h1>Editar Secretaria</h1>

<form method="post" action="{{ route('secretarias.update', $secretaria->id) }}">
    @csrf
    @method('PUT')
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="{{ $secretaria->nome }}" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $secretaria->email }}" required>
    <br>
    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" value="{{ $secretaria->telefone }}" required>
    <br>
    <button type="submit">Salvar</button>
</form>

</body>
</html>
