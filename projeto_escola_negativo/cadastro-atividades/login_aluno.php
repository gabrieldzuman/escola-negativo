<?php
session_start();

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simular autenticação (substitua com sua lógica de autenticação)
    $matricula = $_POST['matricula'];
    $password = $_POST['password'];

    // Verificar as credenciais do aluno (exemplo)
    if ($matricula === '123456' && $password === 'senha_aluno') {
        // Autenticação bem-sucedida, redirecionar para página do aluno
        $_SESSION['aluno_loggedin'] = true;
        header("Location: index.php");
        exit;
    } else {
        // Credenciais inválidas, exibir mensagem de erro
        $error = "Credenciais inválidas!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login do Aluno</title>
</head>
<body>
    <h2>Login do Aluno</h2>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Matrícula: <input type="text" name="matricula"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
