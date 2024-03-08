<?php
session_start();

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simular autenticação (substitua com sua lógica de autenticação)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar as credenciais do professor (exemplo)
    if ($username === 'professor' && $password === 'senha_professor') {
        // Autenticação bem-sucedida, redirecionar para página do professor
        $_SESSION['professor_loggedin'] = true;
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
    <title>Login do Professor</title>
</head>
<body>
    <h2>Login do Professor</h2>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
