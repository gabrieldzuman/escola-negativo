<?php

session_start();

include 'conexao.php';

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $atividade_id = $_POST['atividade_id'];
    $resposta = $_POST['resposta'];

    if (empty($atividade_id) || empty($resposta)) {
        $error = "Por favor, preencha todos os campos!";
    } else {
        //
        $success = "Resposta enviada com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Responder Atividade - Aluno</title>
</head>
<body>
    <h2>Responder Atividade - Aluno</h2>
    <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <?php if(isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Atividade ID: <input type="text" name="atividade_id"><br>
        Resposta: <textarea name="resposta"></textarea><br>
        <input type="submit" value="Enviar Resposta">
    </form>
</body>
</html>
