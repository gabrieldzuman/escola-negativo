<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO responsaveis (nome, email) VALUES (:nome, :email)";
    
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        // Adicione mais binds conforme necessário
        $stmt->execute();
        header("Location: listar_responsaveis.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao adicionar responsável: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Responsável</title>
</head>
<body>
    <h1>Adicionar Responsável</h1>
    <form method="POST" action="adicionar_responsavel.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <button type="submit">Adicionar</button>
    </form>
    <br>
    <a href="listar_responsaveis.php">Voltar para a Listagem</a>
</body>
</html>
