<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $para = "professor@exemplo.com"; // Endereço de e-mail do professor
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];
    
    // Configuração para enviar e-mail via PHP
    $cabecalho = "From: aluno@exemplo.com"; // Endereço de e-mail do remetente
    $cabecalho .= "\r\nReply-To: aluno@exemplo.com"; // E-mail para resposta
    $cabecalho .= "\r\nX-Mailer: PHP/".phpversion();

    // Enviar e-mail
    if (mail($para, $assunto, $mensagem, $cabecalho)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat com o Professor</title>
</head>
<body>
    <h1>Chat com o Professor</h1>

    <form method="POST" action="chat-professor.php">
        <label for="assunto">Assunto:</label>
        <input type="text" name="assunto" required><br><br>
        <label for="mensagem">Mensagem:</label><br>
        <textarea name="mensagem" rows="4" cols="50" required></textarea><br><br>
        <button type="submit">Enviar Mensagem</button>
    </form>
</body>
</html>
