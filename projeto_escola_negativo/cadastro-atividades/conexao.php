<?php

$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$database = "seu_banco_de_dados";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
