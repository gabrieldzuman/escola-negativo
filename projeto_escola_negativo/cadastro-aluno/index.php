<?php
require_once 'conexao.php';

// Consulta de informações gerais do aluno
$id_aluno = 1; // Substitua pelo ID do aluno atual, por exemplo, após o login
$sql_aluno = "SELECT * FROM alunos WHERE id = :id";
$stmt_aluno = $conexao->prepare($sql_aluno);
$stmt_aluno->bindParam(':id', $id_aluno, PDO::PARAM_INT);
$stmt_aluno->execute();
$aluno = $stmt_aluno->fetch(PDO::FETCH_ASSOC);

// Consulta de matérias por disciplina cursada
$sql_disciplinas = "SELECT disciplinas.nome AS disciplina, matriculas.* FROM matriculas
    JOIN disciplinas ON matriculas.id_disciplina = disciplinas.id
    WHERE matriculas.id_aluno = :id_aluno";
$stmt_disciplinas = $conexao->prepare($sql_disciplinas);
$stmt_disciplinas->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
$stmt_disciplinas->execute();
$matriculas = $stmt_disciplinas->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel do Aluno</title>
</head>
<body>
    <h1>Painel do Aluno - Bem-vindo, <?php echo $aluno['nome']; ?></h1>

    <h2>Suas Disciplinas</h2>
    <ul>
        <?php foreach ($matriculas as $matricula): ?>
            <li><?php echo $matricula['disciplina']; ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="./prova-atividade.php">Agenda de Provas e Atividades</a>

    <a href="./matricula-materia.php">Matrículas em Matérias Extras</a>

    <a href="./chat-professor.php">Chat com o Professor</a>

</body>
</html>
