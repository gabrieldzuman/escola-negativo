<?php
require_once 'conexao.php';

$sql = "SELECT * FROM responsaveis";
$stmt = $conexao->query($sql);
$responsaveis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Responsáveis</title>
</head>
<body>
    <h1>Listagem de Responsáveis</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($responsaveis as $responsavel): ?>
            <tr>
                <td><?php echo $responsavel['id']; ?></td>
                <td><?php echo $responsavel['nome']; ?></td>
                <td><?php echo $responsavel['email']; ?></td>
                <td>
                    <a href="editar_responsavel.php?id=<?php echo $responsavel['id']; ?>">Editar</a>
                    <a href="excluir_responsavel.php?id=<?php echo $responsavel['id']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="adicionar_responsavel.php">Adicionar Responsável</a>
</body>
</html>
