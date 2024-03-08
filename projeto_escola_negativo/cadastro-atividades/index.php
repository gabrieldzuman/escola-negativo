<?php
session_start();

// Verificar se o professor está logado
if (isset($_SESSION['professor_loggedin']) && $_SESSION['professor_loggedin'] === true) {
    $professor_loggedin = true;
} else {
    $professor_loggedin = false;
}

// Verificar se o aluno está logado
if (isset($_SESSION['aluno_loggedin']) && $_SESSION['aluno_loggedin'] === true) {
    $aluno_loggedin = true;
} else {
    $aluno_loggedin = false;
}

// Logout para professor
if (isset($_GET['professor_logout'])) {
    unset($_SESSION['professor_loggedin']);
    session_destroy();
    header("Location: index.php");
    exit;
}

// Logout para aluno
if (isset($_GET['aluno_logout'])) {
    unset($_SESSION['aluno_loggedin']);
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Área de Atividades</title>
</head>
<body>
    <h1>Bem-vindo à Área de Atividades</h1>

    <?php if (!$professor_loggedin && !$aluno_loggedin): ?>
        <!-- Formulário de login para professor -->
        <h2>Login do Professor</h2>
        <form action="login_professor.php" method="post">
            Username: <input type="text" name="username"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Login">
        </form>

        <!-- Formulário de login para aluno -->
        <h2>Login do Aluno</h2>
        <form action="login_aluno.php" method="post">
            Matrícula: <input type="text" name="matricula"><br>
            Password: <input type="password" name="password"><br>
            <input type="submit" value="Login">
        </form>
    <?php endif; ?>

    <?php if ($professor_loggedin): ?>
        <!-- Mostrar links e botão de logout para professor -->
        <ul>
            <li><a href="cadastrar_atividade.php">Cadastrar Atividade</a></li>
            <li><a href="visualizar_atividades.php">Visualizar Atividades</a></li>
        </ul>
        <a href="?professor_logout=true">Logout</a>
    <?php endif; ?>

    <?php if ($aluno_loggedin): ?>
        <!-- Mostrar link e botão de logout para aluno -->
        <ul>
            <li><a href="visualizar_atividades_aluno.php">Visualizar Atividades</a></li>
        </ul>
        <a href="?aluno_logout=true">Logout</a>
    <?php endif; ?>
</body>
</html>
