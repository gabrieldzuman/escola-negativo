<?php
$host = "localhost"; // Seu servidor MySQL
$dbname = "sua_base_de_dados";
$username = "seu_usuario";
$password = "sua_senha";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>
