<?php

session_start();

include 'conexao.php';

$limit = 5; // Limitar o número de atividades por página
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM atividades_complementares LIMIT $start, $limit";
$result = $conn->query($sql);

$total_records = mysqli_num_rows($conn->query("SELECT * FROM atividades_complementares"));
$total_pages = ceil($total_records / $limit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Atividades Complementares - Aluno</title>
</head>
<body>
    <h2>Atividades Complementares - Aluno</h2>
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

    <div>
        <?php
        // Links para a paginação
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='visualizar_atividades_aluno.php?page=".$i."'>".$i."</a> ";
        }
        ?>
    </div>
</body>
</html>
