<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

include 'conexao.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM atividades_complementares WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $success = "Atividade excluída com sucesso!";
    } else {
        $error = "Erro ao excluir atividade: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excluir Atividade Complementar</title>
</head>
<body>
    <h2>Excluir Atividade Complementar</h2>
    <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <?php if(isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        ID da Atividade: <input type="text" name="id"><br>
        <input type="submit" value="Excluir">
    </form>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>
