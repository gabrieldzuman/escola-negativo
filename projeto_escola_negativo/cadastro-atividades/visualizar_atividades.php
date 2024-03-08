<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

include 'conexao.php';

$sql = "SELECT * FROM atividades_complementares";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Atividades Complementares</title>
</head>
<body>
    <h2>Atividades Complementares</h2>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Descrição</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["titulo"]. "</td><td>" . $row["descricao"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Nenhuma atividade encontrada.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
