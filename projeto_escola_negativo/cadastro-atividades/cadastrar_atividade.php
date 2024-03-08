<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

include 'conexao.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];

    if (empty($titulo) || empty($descricao)) {
        $error = "Por favor, preencha todos os campos!";
    } else {
        $sql = "INSERT INTO atividades_complementares (titulo, descricao) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $titulo, $descricao);

        if ($stmt->execute()) {
            $success = "Atividade cadastrada com sucesso!";
        } else {
            $error = "Erro ao cadastrar atividade: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Atividade Complementar</title>
</head>
<body>
    <h2>Cadastrar Atividade Complementar</h2>
    <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <?php if(isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Título: <input type="text" name="titulo"><br>
        Descrição: <textarea name="descricao"></textarea><br>
        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
