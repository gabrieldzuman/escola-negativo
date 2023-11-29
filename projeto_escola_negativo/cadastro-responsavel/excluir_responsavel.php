<?php
require_once 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM responsaveis WHERE id = :id";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: listar_responsaveis.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao excluir responsável: " . $e->getMessage();
    }
} else {
    header("Location: listar_responsaveis.php");
    exit();
}
?>
