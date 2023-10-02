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

// Consulta de agenda de provas e atividades
$sql_agenda = "SELECT tipo, descricao, data FROM agenda WHERE id_aluno = :id_aluno";
$stmt_agenda = $conexao->prepare($sql_agenda);
$stmt_agenda->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
$stmt_agenda->execute();
$agenda = $stmt_agenda->fetchAll(PDO::FETCH_ASSOC);
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

    <h2>Agenda de Provas e Atividades</h2>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agenda as $evento): ?>
                <tr>
                    <td><?php echo $evento['tipo']; ?></td>
                    <td><?php echo $evento['descricao']; ?></td>
                    <td><?php echo $evento['data']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
