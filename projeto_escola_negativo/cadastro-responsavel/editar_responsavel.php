<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE responsaveis SET nome = :nome, email = :email WHERE id = :id";
    
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        header("Location: listar_responsaveis.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao editar responsável: " . $e->getMessage();
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM responsaveis WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $responsavel = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: listar_responsaveis.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Responsável</title>
</head>
<body>
    <h1>Editar Responsável</h1>
    <form method="POST" action="editar_responsavel.php">
        <input type="hidden" name="id" value="<?php echo $responsavel['id']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $responsavel['nome']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $responsavel['email']; ?>" required><br>
        <button type="submit">Salvar Alterações</button>
    </form>
    <br>
    <a href="listar_responsaveis.php">Voltar para a Listagem</a>
</body>
</html>
